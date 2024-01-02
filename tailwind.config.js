/** @type {import('tailwindcss').Config} */
module.exports = {
	content: ["*.php", "query/*.php", "template/*.php", "user/*.php"],
	darkMode: "class",
	theme: {
		container: {
			center: true,
			padding: "16px",
		},
		extend: {
			colors: {
				primary: "#457b9d",
				secondary: "#a8dadc",
				dark: "#0f172a",
				backgr: "#f1faee",
				bcg: "rgb(31 42 55 )",
			},
			screens: {
				"2xl": "1320px",
			},
		},
	},
	plugins: [],
};
