/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,php,js}"],
  theme: {
    extend: {
      colors: {
        primary: "#2563EB",
        danger: "#DC3545",
        success: "#28A745",
        body: "#F9FAFB",
        outline: "#AAAAAA",
      },
    },
  },
  plugins: [],
};
