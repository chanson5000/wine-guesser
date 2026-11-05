import { defineConfig, type Plugin } from 'vitest/config';
import { FIREBASE_ORIGINS } from './src/account/firebase';

// Applied to production builds only: the dev server injects inline styles and scripts.
const contentSecurityPolicyFor = (connectSrc: string[]) => [
  "default-src 'self'",
  "script-src 'self'",
  "style-src 'self'",
  "img-src 'self' data:",
  "font-src 'self' data:",
  ["connect-src 'self'", ...connectSrc].join(' '),
  "object-src 'none'",
  "base-uri 'self'",
  "form-action 'self'",
].join('; ');

// Only the account deletion page may talk to the mobile app's Firebase project.
const EXTRA_CONNECT_SRC: Record<string, string[]> = {
  '/deductive-wine-taster/delete-account.html': FIREBASE_ORIGINS,
};

function contentSecurityPolicy(): Plugin {
  return {
    name: 'content-security-policy',
    apply: 'build',
    transformIndexHtml: (_html, { path }) => [
      {
        tag: 'meta',
        attrs: { 'http-equiv': 'Content-Security-Policy', content: contentSecurityPolicyFor(EXTRA_CONNECT_SRC[path] ?? []) },
        injectTo: 'head-prepend',
      },
      { tag: 'meta', attrs: { name: 'referrer', content: 'strict-origin-when-cross-origin' }, injectTo: 'head' },
    ],
  };
}

export default defineConfig({
  // Relative base so the build works from any path (e.g. GitHub Pages project sites).
  base: './',
  plugins: [contentSecurityPolicy()],
  build: {
    target: 'es2022',
    rollupOptions: {
      input: {
        main: 'index.html',
        // Deductive Wine Taster's store listings link to this path.
        privacy: 'deductive-wine-taster/privacy-policy.html',
        // Entered in Play Console as the app's account deletion link.
        deleteAccount: 'deductive-wine-taster/delete-account.html',
      },
    },
  },
  test: {
    include: ['tests/**/*.test.ts'],
  },
});
