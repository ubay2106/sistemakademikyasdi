/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    container: {
      center: true,
      padding: '16px',
    },
    extend: {
      colors: {
        primary: '#14532d'
      },
      animation: {
        'goyang' : 'goyang 1s ease-in-out infinite', 
        'ping-slow' : 'ping 3s ease-in-out infinite'
      },
      keyframes: {
        goyang : {
          '0%, 100%' : {
            transform: 'rotate(-4deg)'
          },
          '50%' : {
            transform: 'rotate(4deg)'
          }
        }
      }
    },
  },
  plugins: [],
}

