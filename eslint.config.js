import js from '@eslint/js';
import globals from 'globals';
import tseslint from 'typescript-eslint';

export default tseslint.config(
  { ignores: ['dist', 'node_modules', 'coverage'] },
  js.configs.recommended,
  ...tseslint.configs.strict,
  {
    languageOptions: {
      globals: { ...globals.browser },
    },
    rules: {
      // Data must always be rendered as text, never parsed as HTML.
      'no-restricted-properties': [
        'error',
        { property: 'innerHTML', message: 'Use textContent / el() instead.' },
        { property: 'outerHTML', message: 'Use textContent / el() instead.' },
      ],
    },
  },
);
