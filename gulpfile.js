'use strict';
const gulp = require('gulp');
const connect = require('gulp-connect');
const concat = require('gulp-concat');
const minifyCss = require('gulp-minify-css');
const plumber = require('gulp-plumber');
const sass = require('gulp-sass');
const uglify = require('gulp-uglify');
const prefix = require('gulp-autoprefixer');
const watch = require('gulp-watch');
const jshint = require('gulp-jshint');

const src = {
	sass: 'resources/sass/index.sass',
	js: 'resources/js/**/*.js'
};

// Destinations
const dist = {
	css: 'assets/css',
	js: 'assets/js'
};

// File Name After Render
const min = {
	css: 'main.css',
	js: 'functions.js'
};

//----------------------------------------------
// Error Handler
const onError = function (error) {
	console.log(error);
	this.emit('end');
};

gulp.task('sass', () => {
	return gulp.src(src.sass)
		.pipe(plumber({errorHandler: onError}))
		.pipe(sass())
		.pipe(prefix('last 2 versions'))
		.pipe(concat(min.css))
		.pipe(minifyCss())
		.pipe(gulp.dest(dist.css))
		.pipe(connect.reload());
});

gulp.task('js', () => {
	return gulp.src(src.js)
		.pipe(plumber({errorHandler: onError}))
		.pipe(uglify())
		.pipe(concat(min.js))
		.pipe(gulp.dest(dist.js))
		.pipe(connect.reload());
});

gulp.task('connect', () => {
	connect.server({
		port: 9090, // Default 8080
		root: '/',
		livereload: true
	});
});

gulp.task('watch', () => {
	gulp.watch(src.sass, ['sass']);
	gulp.watch(src.js, ['js']);
});

gulp.task('default', [
	'js',
	'sass',
	'watch',
	'connect'
]);
