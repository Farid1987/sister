process.env.DISABLE_NOTIFIER = true;
var gulp = require('gulp');
var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    // mix.sass('app.scss');

  //   mix.scripts(
	// 	[
	// 		"jquery.min.js",
	// 		"bootstrap.min.js",
	// 		"bootstrap-notify.js",
	// 		"bootstrap-datepicker.min.js",
	// 		"mustache.js",
	// 		"jquery-ui.min.js",
  //     "main.js"
	// 	],
	// 	"public/js/app.js"
	// ).styles(
	// 	[
	// 		"bootstrap.min.css",
  //     "core.css",
  //     "components.css",
  //     "icons.css",
  //     "pages.css",
  //     "menu.css",
  //     "responsive.css",
  //     "jquery-ui.min.css",
  //     "admin-style.css"
	// 	],
	// 	"public/css/app.css"
	// ).styles(
  //   [
  //     "bootstrap.min.css",
  //     "page-style.css"
  //   ],
  //   "public/css/page.css"
  // ).styles(
  //   [
	// 		"bootstrap.min.css",
  //     "page-styleAU.css",
  //     "page-styleFA.css",
  //     "page-styleMember.css",
  //     "page-styleProgram.css"
  //   ],
  //   "public/css/app2.css"
  // ).version(
	// 	[
	// 		"js/app.js",
  //     "js/main.js",
	// 		"css/app.css",
  //     "css/app2.css",
  //     "css/page.css"
	// 	],
	// 	"public/build"
	// ).copy(
	// 	"resources/assets/fonts",
	// 	"public/build/fonts"
  // ).copy(
  //   "resources/assets/images",
  //   "public/build/images"
  // );
});
