import { defineConfig, type Plugin } from 'vitest/config';

// Applied to production builds only: the dev server injects inline styles and scripts.
const CONTENT_SECURITY_POLICY = [
  "default-src 'self'",
  "script-src 'self'",
  "style-src 'self'",
  "img-src 'self' data:",
  "font-src 'self' data:",
  "connect-src 'self'",
  "object-src 'none'",
  "base-uri 'self'",
  "form-action 'self'",
].join('; ');

function contentSecurityPolicy(): Plugin {
  return {
    name: 'content-security-policy',
    apply: 'build',
    transformIndexHtml: () => [
      {
        tag: 'meta',
        attrs: { 'http-equiv': 'Content-Security-Policy', content: CONTENT_SECURITY_POLICY },
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
      },
    },
  },
  test: {
    include: ['tests/**/*.test.ts'],
  },
});
