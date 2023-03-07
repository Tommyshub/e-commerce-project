const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
    ],
    daisyui: {
        themes: [
            {
                ecp: {
                    primary: "#ad0000",

                    secondary: "#c60505",

                    accent: "#34d399",

                    neutral: "#191D24",

                    "base-100": "#2f3038",

                    "base-200": "#252732",

                    info: "#3198e6",

                    success: "#65c948",

                    warning: "#FBBD23",

                    error: "#e60000",
                },
            },
        ],
    },

    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require("@tailwindcss/forms"), require("daisyui")],
};
