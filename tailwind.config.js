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
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                rojo: '#5c0f21',
                crema: 'rgba(253,244,237,1)',
                grisrojo: '#937e7d',
                blanco: '#ffffff',
                negro: '#000000',
                gris: '#B0B0B0',
                dorado: '#C4A300',
                verde: '#3A5A40',
                azul: '#1D3557',
                beige: '#F5F5DC'
            },

        },
    },

    plugins: [forms],
};
