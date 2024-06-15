<style>
    @white: #fff;
@blue: #4b84fe;
@colorDark: #1b253d;
@colorLight: #99a0b0;
@red: #fa5b67;
@yellow: #ffbb09;
@bg: #f5f5fa;
@bgDark: #ede8f0;

* {
	box-sizing: border-box;
}

html,
body {
	color: @colorLight;
	width: 100%;
	height: 100%;
	overflow: hidden;
	background: @bg;
	font-size: 16px;
	line-height: 120%;
	font-family: Open Sans, Helvetica, sans-serif;
}

.dashboard {
	display: grid;
	width: 100%;
	height: 100%;
	grid-gap: 0;
	grid-template-columns: 300px auto;
	grid-template-rows: 80px auto;
  grid-template-areas: 'menu search'
												'menu content';
}

.search-wrap {
	grid-area: search;
	background: @white;
	border-bottom: 1px solid @bgDark;
	display: flex;
	align-items: center;
	justify-content: space-between;
	padding: 0 3em;

	.search {
		height: 40px;

		label {
			display: flex;
			align-items: center;
			height: 100%;

			svg {
				display: block;

				path,
				circle {
					fill: lighten(@colorLight, 10%);
					transition: fill .15s ease;
				}
			}

			input {
				display: block;
				padding-left: 1em;
				height: 100%;
				margin: 0;
				border: 0;

				&:focus {
					background: @bg;
				}
			}

			&:hover {
				svg {
					path,
					circle {
						fill: lighten(@colorDark, 10%);
					}
				}
			}
		}
	}

	.user-actions {
		button {
			border: 0;
			background: none;
			width: 32px;
			height: 32px;
			margin: 0;
			padding: 0;
			margin-left: 0.5em;

			svg {
				position: relative;
				top: 2px;

				path,
				circle {
					fill: lighten(@colorLight, 10%);
					transition: fill .15s ease;
				}
			}

			&:hover {
				svg {
					path,
					circle {
						fill: lighten(@colorDark, 10%);
					}
				}
			}
		}
	}
}

.menu-wrap {
	grid-area: menu;
	padding-bottom: 3em;
	overflow: auto;
	background: @white;
	border-right: 1px solid @bgDark;

	.user {
		height: 80px;
		display: flex;
		align-items: center;
		justify-content: flex-start;
		margin: 0;
		padding: 0 3em;

		.user-avatar {
			width: 40px;
			height: 40px;
			border-radius: 50%;
			overflow: hidden;

			img {
				display: block;
				width: 100%;
				height: 100%;
				object-fit: cover;
			}
		}

		figcaption {
			margin: 0;
			padding: 0 0 0 1em;
			color: @colorDark;
			font-weight: 700;
			font-size: 0.875em;
			line-height: 100%;
		}
	}

	nav {
		display: block;
		padding: 0 3em;

		section {
			display: block;
			padding: 3em 0 0;
		}

		h3 {
			margin: 0;
			font-size: .875em;
			text-transform: uppercase;
			color: @blue;
			font-weight: 600;
		}

		ul {
			display: block;
			padding: 0;
			margin: 0;
		}

		li {
			display: block;
			padding: 0;
			margin: 1em 0 0;

			a {
				display: flex;
				align-items: center;
				justify-content: flex-start;
				color: @colorLight;
				text-decoration: none;
				font-weight: 600;
				font-size: .875em;
				transition: color .15s ease;

				svg {
					display: block;
					margin-right: 1em;

					path,
					circle {
						fill: lighten(@colorLight, 10%);
						transition: fill .15s ease;
					}
				}

				&:hover {
					color: @colorDark;

					svg {
						path,
						circle  {
							fill: lighten(@colorDark, 10%);
						}
					}
				}

				&.active {
					color: @blue;

					svg {
						path,
						circle  {
							fill: @blue;
						}
					}
				}
			}
		}
	}
}

.content-wrap {
	grid-area: content;
	padding: 3em;
	overflow: auto;

	.content-head	{
		display: flex;
		align-items: center;
		justify-content: space-between;

		h1 {
			font-size: 1.375em;
			line-height: 100%;
			color: @colorDark;
			font-weight: 500;
			margin: 0;
			padding: 0;
		}

		.action {
			button {
				border: 0;
				background: @blue;
				color: @white;
				width: auto;
				height: 3.5em;
				padding: 0 2.25em;
				border-radius: 3.5em;
				font-size: 1em;
				text-transform: uppercase;
				font-weight: 600;
				transition: background-color .15s ease;

				&:hover {
					background-color: darken(@blue, 10%);

					&:active {
						background-color: darken(@blue, 20%);
						transition: none;
					}
				}
			}
		}
	}

	.info-boxes {
		padding: 3em 0 2em;
		display: grid;
		grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
		grid-gap: 2em;

		.info-box {
			background: @white;
			height: 160px;
			display: flex;
			align-items: center;
			justify-content: flex-start;
			padding: 0 3em;
			border: 1px solid @bgDark;
			border-radius: 5px;

			.box-icon {
				svg {
					display: block;
					width: 48px;
					height: 48px;

					path,
					circle {
						fill: @colorLight;
					}
				}
			}

			.box-content {
				padding-left: 1.25em;
				white-space: nowrap;

				.big {
					display: block;
					font-size: 2em;
					line-height: 150%;
					color: @colorDark;
				}
			}

			&.active {
				svg {
					circle,
					path {
						fill: @blue;
					}
				}
			}
		}
	}

	.person-boxes {
		padding: 0;
		display: grid;
		grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
		grid-gap: 2em;

		.person-box {
			background: @white;
			height: 320px;
			text-align: center;
			padding: 3em;
			border: 1px solid @bgDark;
			border-radius: 5px;

			&:nth-child(2n) {
				.box-avatar {
					.no-name {
						background: @blue;
					}
				}
			}

			&:nth-child(5n) {
				.box-avatar {
					.no-name {
						background: @yellow;
					}
				}
			}

			.box-avatar {
				width: 100px;
				height: 100px;
				border-radius: 50%;
				margin: 0px auto;
				overflow: hidden;

				img {
					display: block;
					width: 100%;
					height: 100%;
					object-fit: cover;
				}

				.no-name {
					display: flex;
					align-items: center;
					justify-content: center;
					text-align: center;
					color: @white;
					font-size: 1.5em;
					font-weight: 600;
					text-transform: uppercase;
					width: 100%;
					height: 100%;
					background: @red;
				}
			}

			.box-bio {
				white-space: no-wrap;

				.bio-name {
					margin: 2em 0 .75em;
					color: @colorDark;
					font-size: 1em;
					font-weight: 700;
					line-height: 100%;
				}

				.bio-position {
					margin: 0;
					font-size: .875em;
					line-height: 100%;
				}
			}

			.box-actions {
				margin-top: 1.25em;
				padding-top: 1.25em;
				width: 100%;
				border-top: 1px solid @bgDark;
				display: flex;
				align-items: center;
				justify-content: space-between;

				button {
					border: 0;
					background: none;
					width: 32px;
					height: 32px;
					margin: 0;
					padding: 0;

					svg {
						position: relative;
						top: 2px;

						path,
						circle {
							fill: lighten(@colorLight, 10%);
							transition: fill .15s ease;
						}
					}

					&:hover {
						svg {
							path,
							circle {
								fill: lighten(@colorDark, 10%);
							}
						}
					}
				}
			}
		}
	}
}
</style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>   
