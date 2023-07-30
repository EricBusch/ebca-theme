const theme = require('./theme.json');
const tailpress = require("@jeffreyvr/tailwindcss-tailpress");
const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './*.php',
        './**/*.php',
        './resources/css/*.css',
        './resources/js/*.js',
        './safelist.txt'
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                heading: ['Jost', ...defaultTheme.fontFamily.sans],
                handwriting: ['Caveat', ...defaultTheme.fontFamily.serif],
            },
            letterSpacing: {
                'md': '.15em',
                'lg': '.20em',
                'xl': '.30em',
                '2xl': '.35em',
                '3xl': '.40em',
                '4xl': '.45em',
                '5xl': '.5em',
            },
            maxWidth: {
                '8xl': '88rem',
                '9xl': '96rem',
            }
        },
    },
    plugins: [
        tailpress.tailwind,
        require('@tailwindcss/typography'),
    ]
};
