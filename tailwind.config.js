import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            container: {
                center: true,
                padding: '1.5rem',
                screens: {
                    '2xl': '1320px',
                },
            },
            colors: {
                gold: {
                    DEFAULT: '#D4AF37',
                    dark: '#B8860B',
                },
                navy: {
                    DEFAULT: '#2C3E50',
                },
                dark: {
                    DEFAULT: '#1A1A1A',
                }
            },
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
