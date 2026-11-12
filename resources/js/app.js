// Reproductor SIMULADO: sin audio. El estado se guarda en sessionStorage para
// que la reproducción siga al cambiar de pantalla.
const pistas = window.pistas ?? [];
const $$ = (s) => [...document.querySelectorAll(s)];
const fmt = (s) => `${String(Math.floor(s / 60)).padStart(2, '0')}:${String(s % 60).padStart(2, '0')}`;

const estado = { i: 0, t: 0, play: false, gustos: [] };
try { Object.assign(estado, JSON.parse(sessionStorage.getItem('sonora') ?? '{}')); } catch (_) { }
if (!pistas[estado.i]) { estado.i = 0; estado.t = 0; }
let timer = null;
let portadaDe = -1;

const guardar = () => { try { sessionStorage.setItem('sonora', JSON.stringify(estado)); } catch (_) { } };

function pintar() {
  const p = pistas[estado.i];
  if (!p) return;
  const textos = { titulo: p.titulo, artista: p.artista, meta: `${p.artista} · ${p.album}`, tiempo: fmt(estado.t), duracion: fmt(p.dur) };
  $$('[data-campo]').forEach((el) => { el.textContent = textos[el.dataset.campo] ?? el.textContent; });
  const pct = (estado.t / p.dur) * 100;
  $$('[data-relleno]').forEach((el) => { el.style.width = `${pct}%`; });
  $$('[data-barra]').forEach((el) => {
    el.setAttribute('aria-valuenow', Math.round(pct));
    el.setAttribute('aria-valuetext', `${fmt(estado.t)} de ${fmt(p.dur)}`);
  });
  $$('[data-marcar]').forEach((f) => {
    if (Number(f.dataset.pista) === estado.i) f.setAttribute('aria-current', 'true');
    else f.removeAttribute('aria-current');
  });
  if (portadaDe !== estado.i) {
    portadaDe = estado.i;
    $$('[data-portada]').forEach((el) => {
      el.innerHTML = p.barras.map((h) => `<i class="flex-1 rounded-pill bg-accent" style="height:${h}%"></i>`).join('');
    });
  }
  $$('[data-accion="megusta"]').forEach((b) => b.setAttribute('aria-pressed', String(estado.gustos.includes(estado.i))));
  $$('[data-accion="alternar"]').forEach((b) => {
    b.setAttribute('aria-label', estado.play ? 'Pausar' : 'Reproducir');
    b.querySelector('[data-icono="play"]').classList.toggle('hidden', estado.play);
    b.querySelector('[data-icono="pausa"]').classList.toggle('hidden', !estado.play);
  });
}

function arrancar() {
  clearInterval(timer);
  timer = setInterval(() => {
    estado.t++;
    if (estado.t >= pistas[estado.i].dur) cambiar(estado.i + 1);
    guardar();
    pintar();
  }, 1000);
}

function reproducir() { estado.play = true; arrancar(); guardar(); pintar(); }
function pausar() { estado.play = false; clearInterval(timer); guardar(); pintar(); }
function cambiar(n) { estado.i = (n + pistas.length) % pistas.length; estado.t = 0; guardar(); pintar(); }
function ir(seg) { estado.t = Math.max(0, Math.min(pistas[estado.i].dur - 1, Math.round(seg))); guardar(); pintar(); }

document.addEventListener('click', (e) => {
  const accion = e.target.closest('[data-accion]')?.dataset.accion;
  if (accion === 'alternar') return estado.play ? pausar() : reproducir();
  if (accion === 'siguiente') return cambiar(estado.i + 1);
  if (accion === 'anterior') return cambiar(estado.i - 1);
  if (accion === 'megusta') {
    estado.gustos = estado.gustos.includes(estado.i) ? estado.gustos.filter((g) => g !== estado.i) : [...estado.gustos, estado.i];
    guardar();
    return pintar();
  }
  const fila = e.target.closest('[data-pista]');
  if (fila) { cambiar(Number(fila.dataset.pista)); reproducir(); }
});

// Barra de progreso: clic y flechas del teclado
document.addEventListener('pointerdown', (e) => {
  const barra = e.target.closest('[data-barra]');
  if (!barra) return;
  const r = barra.getBoundingClientRect();
  ir(((e.clientX - r.left) / r.width) * pistas[estado.i].dur);
});
document.addEventListener('keydown', (e) => {
  if (!e.target.matches?.('[data-barra]')) return;
  const paso = { ArrowRight: 5, ArrowUp: 5, ArrowLeft: -5, ArrowDown: -5 }[e.key];
  if (paso !== undefined) { e.preventDefault(); ir(estado.t + paso); }
  if (e.key === 'Home') { e.preventDefault(); ir(0); }
});

// Chips de filtro de la pantalla de inicio
$$('[data-filtro]').forEach((chip) => chip.addEventListener('click', () => {
  $$('[data-filtro]').forEach((c) => c.setAttribute('aria-pressed', String(c === chip)));
  $$('[data-seccion]').forEach((s) => { s.hidden = chip.dataset.filtro !== 'todo' && s.dataset.seccion !== chip.dataset.filtro; });
}));

// Tema claro/oscuro, recordado en el navegador
const raiz = document.documentElement;
$$('[data-tema]').forEach((b) => b.addEventListener('click', () => {
  raiz.dataset.theme = raiz.dataset.theme === 'dark' ? 'light' : 'dark';
  try { localStorage.setItem('tema', raiz.dataset.theme); } catch (_) { }
}));

pintar();
if (estado.play) arrancar();