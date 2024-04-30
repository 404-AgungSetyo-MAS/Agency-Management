/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "resources/filament/**/*.{php}",
  ],
  theme: {
    extend: {

    },
  },
  plugins: [
    require('tailwindcss'),
    require('autoprefixer'),
  ],
}

