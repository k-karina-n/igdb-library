const defaultTheme = require('tailwindcss/defaultTheme')

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/**/*.blade.php',
  ],
  theme: {
    extend: {
      fontFamily: {
        serif: ['Latin Modern Roman', 'Times New Roman', 'Noto Serif SC', 'serif', ...defaultTheme.fontFamily.serif]
      },

      colors: {
        'dark': '#212A3E',
        'blue': '#394867',
        'gray': '#9BA4B5',
        'white': '#F1F6F9'
      }
    },
  },
  plugins: [],
}

