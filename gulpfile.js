// Gulp Config
var gulp            = require("gulp"),
    connect         = require("gulp-connect"),
    concat          = require("gulp-concat"),
    minify_css      = require("gulp-minify-css"),
    plumber         = require("gulp-plumber"),
    sass            = require("gulp-sass"),
    uglify          = require("gulp-uglify"),
    watch           = require("gulp-watch"),
    prefix          = require("gulp-autoprefixer"),
    jshint          = require("gulp-jshint");


// ----------------------------------------------
// Source
var src = {
    sass    : '_resources/sass/index.sass',
    js      : '_resources/js/**/*.js'
};

// Destinations
var dist = {
    css     : 'assets/css',
    js      : 'assets/js'
};


// File Name After Render
var min = {
    css  : "main.css",
    js   : "functions.js"
};

//----------------------------------------------
// Error Handler
var onError = function(error) {
    console.log(error);
    this.emit('end');
};
//----------------------------------------------
// SASS TASK
gulp.task('sass', function() {
    return gulp.src(src.sass)
        .pipe(plumber({ errorHandler: onError }))
        .pipe(sass())
        .pipe(prefix('last 2 versions'))
        .pipe(concat(min.css))
        .pipe(minify_css())
        .pipe(gulp.dest(dist.css))
        .pipe(connect.reload());
});

//----------------------------------------------
// JS TASK
gulp.task('js', function() {
    return gulp.src(src.js)
        .pipe(plumber({ errorHandler: onError }))
        .pipe(uglify())
        .pipe(concat(min.js))
        .pipe(gulp.dest(dist.js))
        .pipe(connect.reload());
});

//----------------------------------------------
// CONNECT TASK
gulp.task('connect', function() {
    connect.server({
      // Port Default 8080
      // port        : 9090,
      root        : '/',
      livereload  : true
    });
});

//----------------------------------------------
// WATCH TASK
gulp.task('watch', function() {
    gulp.watch(src.sass, ['sass']);
    gulp.watch(src.js, ['js']);
});


//----------------------------------------------
// DEFAULT TASK
gulp.task('default', [
    'js',
    'sass',
    'watch',
    'connect'
]);
