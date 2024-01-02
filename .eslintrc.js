module.exports = {
  root: true,
  env: {
    browser: true,
    es2021: true,
    node: true,
  },
  extends: [
    'eslint:recommended',
  ],
  parserOptions: {
    ecmaVersion: 12,
    sourceType: 'module',
  },
  rules: {
    // Customize ESLint rules based on your preferences
    'no-console': 'off', // Allow console.log for development
    'no-unused-vars': 'warn', // Warn about unused variables
    // Add more rules as needed
  },
};
