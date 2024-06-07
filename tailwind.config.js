import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/views/index.blade.php',
        './resources/views/auth/**/*.blade.php',
        './resources/views/auth/*.blade.php',

        './resources/views/layouts/**/*.blade.php',

        './resources/js/**/*.vue',
        './resources/js/**/*.js',
        './resources/css/**/*.css',
        './resources/sass/**/*.scss',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
