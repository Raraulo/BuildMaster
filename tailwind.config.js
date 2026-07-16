import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    darkMode: 'class',

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    50: '#FFF5E6',
                    100: '#FFE6CC',
                    200: '#FFCC99',
                    300: '#FFB266',
                    400: '#FF9933',
                    500: '#FF8C00', // main orange
                    600: '#CC7200',
                    700: '#995800',
                    800: '#664000',
                    900: '#332800',
                },
                neutral: {
                    DEFAULT: '#1F2937', // dark gray for background/text
                },
            },
        },
    },

    plugins: [forms],
};

