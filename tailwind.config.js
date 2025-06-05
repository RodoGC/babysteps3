/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./src/**/*.{js,jsx,ts,tsx}",
    "./index.html",
    "./php/**/*.php",
    "./includes/**/*.php"
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          light: '#5b9bd5',
          DEFAULT: '#4a89dc',
          dark: '#3b7dd3',
        },
        secondary: {
          light: '#f7c46c',
          DEFAULT: '#f5b342',
          dark: '#f3a118',
        },
        accent: {
          light: '#e57373',
          DEFAULT: '#e57373',
          dark: '#c62828',
        },
      },
      fontFamily: {
        sans: ['Open Sans', 'sans-serif'],
        heading: ['Montserrat', 'sans-serif'],
      },
    },
  },
  plugins: [],
} 