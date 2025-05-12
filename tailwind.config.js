/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary: {
                    50: "#f0f9f9",
                    100: "#d0eeee",
                    200: "#a1dddd",
                    300: "#67c3c4",
                    400: "#38a3a5",
                    500: "#2a8486",
                    600: "#236b6d",
                    700: "#1f5759",
                    800: "#1d4648",
                    900: "#1a3c3e",
                },
                secondary: {
                    50: "#f8f7f2",
                    100: "#efece0",
                    200: "#ded6c0",
                    300: "#c9bd9a",
                    400: "#b3a477",
                    500: "#a08d61",
                    600: "#8d7756",
                    700: "#75614a",
                    800: "#624f3f",
                    900: "#514237",
                },
                accent: {
                    50: "#fcf7ee",
                    100: "#f7ebd5",
                    200: "#eed6ab",
                    300: "#e4bb77",
                    400: "#dba44f",
                    500: "#d18f33",
                    600: "#bd742a",
                    700: "#9c5726",
                    800: "#7f4525",
                    900: "#673b21",
                },
            },
            fontFamily: {
                kufi: ["Scheherazade New", "serif"],
                naskh: ["Amiri", "serif"],
            },
        },
    },
    plugins: [require("@tailwindcss/typography")],
};
