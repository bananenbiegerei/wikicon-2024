const plugin = require('tailwindcss/plugin');

module.exports = {
	content: ['./**/*.php'],
	theme: {
		// Helper pixel to rem calc: https://nekocalc.com/de/px-zu-rem-umrechner
		fontSize: {
			xs: '0.75rem', // 12px
			sm: '0.875rem', // 14px
			base: '1rem', // 16px
			lg: '1.125rem', // 18px
			xl: '1.25rem', // 20px
			'2xl': '1.5rem', // 24px
			'3xl': '1.875rem', // 30px
			'4xl': '2.25rem', // 36px
			'5xl': '3rem', // 48px
		},
		fontFamily: {
			alt: ['Montserrat', 'sans-serif'],
			sans: ['Roboto', 'sans-serif'],
		},
		fontWeight: {
			normal: 400,
			medium: 500,
			semibold: 700,
			bold: 900,
		},
		extend: {
			boxShadow: {
				'navbar-dropdown': '0px 20px 25px -5px rgba(0, 0, 0, 0.1), 0px -10px 10px rgba(0, 0, 0, 0.04)',
			},
		},
	},
	corePlugins: {
		//	aspectRatio: false,
	},
	plugins: [
		// Disabled because we can use Tailwind's new aspect-ratio features
		//require('@tailwindcss/aspect-ratio'),
		plugin(function ({ addBase }) {
			addBase({
				//				html: { fontSize: '6px' },
			});
		}),
		require('@tailwindcss/forms'),
		require('tailwindcss-themer')({
			defaultTheme: {
				// put the default values of any config you want themed
				// just as if you were to extend tailwind's theme like normal https://tailwindcss.com/docs/theme#extending-the-default-theme
				extend: {
					// colors is used here for demonstration purposes <--- ????
					colors: {
						primary: {
							50: '#e5eeff',
							100: '#cfe0ff',
							200: '#a9c3ff',
							300: '#7599ff',
							400: '#3f5dff',
							500: '#1423ff',
							600: '#0008ff',
							700: '#0009ff',
							800: '#0008e3',
							900: '#000068',
							DEFAULT: '#000068',
						},
						secondary: {
							50: '#f7f7f7',
							DEFAULT: '#f7f7f7',
							100: '#e3e3e3',
							200: '#c8c8c8',
							300: '#a4a4a4',
							400: '#818181',
							500: '#666666',
							600: '#515151',
							700: '#434343',
							800: '#383838',
							900: '#000000',
						},
						focus: {
							50: '#e7f6ff',
							100: '#d3efff',
							200: '#b0dfff',
							300: '#81c8ff',
							400: '#4fa1ff',
							500: '#2878ff',
							DEFAULT: '#2878ff',
							600: '#044bff',
							700: '#0049ff',
							800: '#0038c4',
							900: '#0b3aa4',
						},
						red: {
							50: '#fff0f2',
							100: '#ffe2e6',
							200: '#ffc9d4',
							300: '#ff9db1',
							400: '#ff6688',
							500: '#ff3164',
							600: '#f21b5a',
							DEFAULT: '#f21b5a',
							700: '#cb0544',
							800: '#aa0740',
							900: '#910a3d',
						},
						gray: {
							50: '#f7f7f7',
							100: '#e3e3e3',
							200: '#c8c8c8',
							300: '#a4a4a4',
							400: '#797979',
							DEFAULT: '#797979',
							500: '#666666',
							600: '#515151',
							700: '#434343',
							800: '#383838',
							900: '#313131',
						},
					},
				},
			},
			// if needed add custom themes here…
			// themes: [
			// {
			//   name: 'my-theme',
			//   extend: {
			// 	colors: {
			// 	  primary: 'blue'
			// 	}
			//   }
			// }
			// ]
		}),
	],
};
