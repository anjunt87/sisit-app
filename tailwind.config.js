import defaultTheme from 'tailwindcss/defaultTheme'
import colors from 'tailwindcss/colors'
import forms from '@tailwindcss/forms'
import lineClamp from '@tailwindcss/line-clamp'

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/js/**/*.js',
  ],
  safelist: [
    // Efek transisi dan filter
    'grayscale', 'hover:grayscale-0', 'filter', 'transition', 'duration-300',

    // === WARNA DINAMIS ===

    // GREEN
    'bg-green-500', 'text-green-500', 'hover:bg-green-500',
    'bg-green-600', 'text-green-600', 'border-green-200',
    'from-green-50', 'to-green-100',

    // PURPLE
    'bg-purple-500', 'text-purple-500', 'hover:bg-purple-500',
    'bg-purple-600', 'text-purple-600', 'border-purple-200',
    'from-purple-50', 'to-purple-100',

    // YELLOW
    'bg-yellow-500', 'text-yellow-500', 'hover:bg-yellow-500',
    'bg-yellow-600', 'text-yellow-600', 'border-yellow-200',
    'from-yellow-50', 'to-yellow-100',

    // RED
    'bg-red-500', 'text-red-500', 'hover:bg-red-500',
    'bg-red-600', 'text-red-600', 'border-red-200',
    'from-red-50', 'to-red-100',

    // PINK
    'bg-pink-500', 'text-pink-500', 'hover:bg-pink-500',
    'bg-pink-600', 'text-pink-600', 'border-pink-200',
    'from-pink-50', 'to-pink-100',

    // TEAL
    'bg-teal-500', 'text-teal-500', 'hover:bg-teal-500',
    'bg-teal-600', 'text-teal-600', 'border-teal-200',
    'from-teal-50', 'to-teal-100',

    // INDIGO
    'bg-indigo-500', 'text-indigo-500', 'hover:bg-indigo-500',
    'bg-indigo-600', 'text-indigo-600', 'border-indigo-200',
    'from-indigo-50', 'to-indigo-100',

    // LIME
    'bg-lime-500', 'text-lime-500', 'hover:bg-lime-500',
    'bg-lime-600', 'text-lime-600', 'border-lime-200',
    'from-lime-50', 'to-lime-100',

    // ROSE
    'bg-rose-500', 'text-rose-500', 'hover:bg-rose-500',
    'bg-rose-600', 'text-rose-600', 'border-rose-200',
    'from-rose-50', 'to-rose-100',

    // BLUE
    'bg-blue-500', 'text-blue-500', 'hover:bg-blue-500',
    'bg-blue-600', 'text-blue-600', 'border-blue-200',
    'from-blue-50', 'to-blue-100',

    // ORANGE
    'bg-orange-500', 'text-orange-500', 'hover:bg-orange-500',
    'bg-orange-600', 'text-orange-600', 'border-orange-200',
    'from-orange-50', 'to-orange-100',
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Figtree', ...defaultTheme.fontFamily.sans],
      },
      colors: {
        primary: '#16610E',
        orangeAccent: '#F97A00',
        goldAccent: '#FED16A',
        lightGold: '#FFF4A4',
        lightGreen: '#F5FFF0',

        emerald: {
          450: '#10d9a3',
        },

        islamic: {
          50: '#ecfdf5',
          100: '#d1fae5',
          200: '#a7f3d0',
          300: '#6ee7b7',
          400: '#34d399',
          500: '#10b981',
          600: '#059669',
          700: '#047857',
          800: '#065f46',
          900: '#064e3b',
        },
        amber: {
          50: '#fffbeb',
          100: '#fef3c7',
          200: '#fde68a',
          300: '#fcd34d',
          400: '#fbbf24',
          500: '#f59e0b',
          600: '#d97706',
          700: '#b45309',
          800: '#92400e',
          900: '#78350f',
        },

        // Aktifkan semua bawaan Tailwind
        green: colors.green,
        purple: colors.purple,
        yellow: colors.yellow,
        red: colors.red,
        pink: colors.pink,
        teal: colors.teal,
        indigo: colors.indigo,
        lime: colors.lime,
        rose: colors.rose,
        blue: colors.blue,
        orange: colors.orange,
      },
      backdropBlur: {
        xs: '2px',
      },
      animation: {
        'float': 'float 8s ease-in-out infinite',
        'float-delayed': 'float 8s ease-in-out infinite 2s',
        'float-delayed-2': 'float 8s ease-in-out infinite 4s',
        'slide-in-left': 'slide-in-left 0.8s ease',
        'slide-in-right': 'slide-in-right 0.8s ease 0.2s',
        'fade-up': 'fade-up 0.6s ease-out',
        'fade-up-delayed': 'fade-up 0.6s ease-out 0.3s both',
        'pulse-gentle': 'pulse-gentle 3s ease-in-out infinite',
        'shimmer': 'shimmer 2s linear infinite',
        'bounce-gentle': 'bounce-gentle 2s ease-in-out infinite',
        'scale-in': 'scale-in 0.4s ease',
        'ripple': 'ripple 0.6s linear',
        'glow': 'glow 2s ease-in-out infinite alternate',
        'islamic-pattern': 'islamicPattern 20s linear infinite',
      },
      keyframes: {
        float: {
          '0%, 100%': { transform: 'translateY(0px) rotate(0deg)' },
          '33%': { transform: 'translateY(-30px) rotate(2deg)' },
          '66%': { transform: 'translateY(-10px) rotate(-1deg)' },
        },
        'slide-in-left': {
          '0%': { transform: 'translateX(-100px)', opacity: '0' },
          '100%': { transform: 'translateX(0)', opacity: '1' },
        },
        'slide-in-right': {
          '0%': { transform: 'translateX(100px)', opacity: '0' },
          '100%': { transform: 'translateX(0)', opacity: '1' },
        },
        'fade-up': {
          '0%': { transform: 'translateY(30px)', opacity: '0' },
          '100%': { transform: 'translateY(0)', opacity: '1' },
        },
        'pulse-gentle': {
          '0%, 100%': { opacity: '1', transform: 'scale(1)' },
          '50%': { opacity: '0.8', transform: 'scale(1.05)' },
        },
        shimmer: {
          '0%': { backgroundPosition: '-200% 0' },
          '100%': { backgroundPosition: '200% 0' },
        },
        'bounce-gentle': {
          '0%, 100%': { transform: 'translateY(0px)' },
          '50%': { transform: 'translateY(-10px)' },
        },
        'scale-in': {
          '0%': { transform: 'scale(0.8)', opacity: '0' },
          '100%': { transform: 'scale(1)', opacity: '1' },
        },
        ripple: {
          '0%': { transform: 'scale(0)', opacity: '1' },
          '100%': { transform: 'scale(4)', opacity: '0' },
        },
        glow: {
          '0%': { boxShadow: '0 0 10px rgba(255,255,255,0.3)' },
          '100%': { boxShadow: '0 0 30px rgba(255,255,255,0.6)' },
        },
        islamicPattern: {
          '0%': { transform: 'rotate(0deg)' },
          '100%': { transform: 'rotate(360deg)' },
        },
      },
      transitionTimingFunction: {
        'bounce-in': 'cubic-bezier(0.68, -0.55, 0.265, 1.55)',
        'smooth': 'cubic-bezier(0.4, 0, 0.2, 1)',
      },
    },
  },
  plugins: [
    forms,
    lineClamp,
  ],
}
