/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/js/**/*.{vue,js,ts,jsx,tsx}',
    ],
    theme: {
        extend: {
            colors: {
                primary: {
                    100: '#FFFFFF',
                    200: '#E3EEFF',
                    300: '#C6DEFF',
                    400: '#AACDFF',
                    500: '#8EBDFF',
                    600: '#71ACFF',
                    700: '#559CFF',
                    800: '#398BFF',
                    900: '#1C7BFF',
                    1000: '#006AFF',
                },
            },
        },
    },
    plugins: [],
}
