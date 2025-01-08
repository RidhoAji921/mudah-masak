import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            animation: {
                'scroll-bounce': 'scroll-bounce 25s infinite ease-in-out',
            },
            keyframes: {
                'scroll-bounce': {
                    '0%, 100%': { transform: 'translateX(0)' },
                    '50%': { transform: 'translateX(-15%)' },
                },
            },
            backgroundImage: {
                'vignette': 'radial-gradient(circle, rgba(0,0,0,0.4) 60%, rgba(0,0,0,0.8) 100%)',
            },
        },
    },
    plugins: [],
};
