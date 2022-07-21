module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],

  theme: {
    colors:{
      trasnparent: 'transparent',
      current: 'currentColor',
      'PinkLavander': '#CDB4DB',
      'OrchidPink': '#FFC8DD',
      'Rosa': '#FFAFCC',
      'AzulUrano': '#BDE0FE',
      'BabyBlue': '#A2D2FF',
      "AureolinYellow": '#FFEE32',
    }, 
    extend: {

    },
  },

  corePlugins:{
    aspectRatio: true,
  },
  plugins: [
    require('@tailwindcss/aspect-ratio'),
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
  ],
}
