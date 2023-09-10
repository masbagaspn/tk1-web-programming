/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                raleway: ["Raleway", "sans-serif"],
            },
            keyframes: {
                alert: {
                    "0%": {
                        opacity: 0,
                        visibility: "visible",
                        transform: "translateX(200%)",
                    },
                    "10%": { opacity: 1, transform: "translateX(200%)" },
                    "20%": { transform: "translateX(0)" },
                    "80%": { transform: "translateX(0)" },
                    "90%": { opacity: 1, transform: "translateX(200%)" },
                    "100%": {
                        opacity: 0,
                        visibility: "hidden",
                        transform: "translateX(200%)",
                    },
                },
            },
            animation: {
                alert: "alert 3s ease-in-out",
            },
        },
    },
    plugins: [],
};
