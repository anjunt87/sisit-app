import defaultTheme from 'tailwindcss/defaultTheme';
import colors from 'tailwindcss/colors';
import forms from '@tailwindcss/forms';
import lineClamp from '@tailwindcss/line-clamp';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],
    safelist: [
        // ⚙️ Efek transisi & filter
        'grayscale', 'hover:grayscale-0', 'filter', 'transition', 'duration-300',

        // ✅ Warna dinamis dari fasilitas dan program (bg, text, border, gradient)
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

        // BLUE (dipakai di program tahfidz)
        'bg-blue-500', 'text-blue-500', 'hover:bg-blue-500',
        'bg-blue-600', 'text-blue-600', 'border-blue-200',
        'from-blue-50', 'to-blue-100',

        // ORANGE (program bahasa internasional)
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

                // Aktifkan full color palette Tailwind agar bisa digunakan
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
        },
    },
    plugins: [
        forms,
        lineClamp,
    ],
};
