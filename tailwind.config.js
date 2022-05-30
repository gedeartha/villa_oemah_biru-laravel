module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        colors: {
            primary: "#130F79",
            secondary: "#BAC0CB",
            tertiary: "#ecebff",
            quaternary: "#E0BCAE",
            background: "#F1F4FD",
            biru: "#42a2e8",
        },
    },
    plugins: [require("flowbite/plugin")],
};
