import '@fontsource/oswald/latin-500.css';
import '@fontsource/oswald/latin-600.css';
import './styles.css';
import type { View } from './dom';
import { WINE_TYPES, type WineType } from './types';
import { aboutView } from './views/about';
import { guessFormView } from './views/guessForm';
import { homeView } from './views/home';
import { resultsView } from './views/results';
import { browseView, notFoundView, wineView } from './views/wine';

const isWineType = (s: string | undefined): s is WineType => WINE_TYPES.includes(s as WineType);

function route(hash: string): View {
  const [path = '', query = ''] = hash.replace(/^#/, '').split('?', 2);
  let segments: string[];
  try {
    segments = path.split('/').filter(Boolean).map(decodeURIComponent);
  } catch {
    return notFoundView(); // malformed percent-encoding in a hand-edited or truncated link
  }
  const [page, type, id] = segments;

  if (!page) return homeView();
  if (page === 'about') return aboutView();
  if (!isWineType(type)) return notFoundView();
  if (page === 'guess') return guessFormView(type, query);
  if (page === 'results') return resultsView(type, query);
  if (page === 'wines') return browseView(type);
  if (page === 'wine' && id) return wineView(type, id, query);
  return notFoundView();
}

const app = document.getElementById('app');
let firstRender = true;

function render(): void {
  if (!app) return;
  const view = route(location.hash);
  document.title = view.title;
  app.replaceChildren(view.content);
  window.scrollTo(0, 0);
  // Move focus to the new page heading so screen readers announce navigation.
  if (!firstRender) app.querySelector<HTMLElement>('h1')?.focus();
  firstRender = false;
}

// The router owns the hash, so the skip link moves focus instead of navigating.
document.getElementById('skip-link')?.addEventListener('click', (event) => {
  event.preventDefault();
  app?.focus();
});

window.addEventListener('hashchange', render);
render();
