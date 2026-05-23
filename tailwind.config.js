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
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                premium: {
                    navy: '#0f172a',    // slate-900
                    primary: '#4f46e5', // indigo-600
                    secondary: '#06b6d4', // cyan-500
                    light: '#f8fafc',   // slate-50
                    glass: 'rgba(255, 255, 255, 0.7)',
                }
            }
        },
    },

    plugins: [forms],
};
