import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    prefix: 'tw-',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: 'class',
    theme: {
        extend: {
            fontFamily: {
                'sans': ['Figtree', ...defaultTheme.fontFamily.sans],
                'raleway': ['Raleway', ...defaultTheme.fontFamily.sans],
                'akaya': ['Akaya', ...defaultTheme.fontFamily.sans],
                'roboto': ['Roboto', ...defaultTheme.fontFamily.sans],
                'wittgenstein': ['Wittgenstein', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'dark_gray': '#a9a9a9',
                'gray': '#f0f0f0',
                'gray_text': '#a9a9a9', 
                'dark_blue': '#111827',
                'blue': '#1f2937',
                'green': '#04ff00', 
                'red': '#ff0202',
                'black_blue': '#030c1b',
                'purple_blue': '#16193a',
            },
            borderRadius: {
                'default': "8px",
                'double': "16px",
                'triple': "24px",
                'none': "0px",
            },
            screens:{
                "sm": "576px",
                "md": "960px",
                "lg": "1280px",
                "xl": "1440px",
            },
            // gridTemplateColumns:{
            //     'custom-2-1-1-1': '2fr 1fr 1fr 1fr',
            // },
            animation: {
                'marquee': 'marquee 10s linear infinite',
            },
            keyframes:{
                'marquee':{
                    from: {transform: 'translateX(0)'},
                    to: {transform: 'translateX(-100%)'}, 
                },
            },
        },
    },
    plugins: [],
};

