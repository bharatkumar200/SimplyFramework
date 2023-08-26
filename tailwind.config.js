/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/**/templates/*.phtml",
    "./src/**/templates/**/*.phtml"
  ],
  theme: {
    extend: {},
    fontFamily: {
      "sans": ["Inter", "sans-serif"]
    }
  },
  plugins: [
    require("@tailwindcss/typography")
  ],
}

