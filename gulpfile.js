const gulp = require('gulp');
const sass = require('gulp-sass')
const notify = require("gulp-notify");
var browserSync = require('browser-sync').create();
const prefix = require('gulp-autoprefixer');
var plumber = require('gulp-plumber');
var reload      = browserSync.reload;


gulp.task('serve', ['stream'], function() {

    browserSync.init({
        proxy: "http://maks.ru",
     	logLevel: 'debug',
        logConnections: true
    });

    gulp.watch("resources/assets/sass/*.scss", ['stream']);
    gulp.watch("resources/views/*.php").on('change', reload);
});

gulp.task('stream', function () {    
    	return gulp.src('resources/assets/sass/*.scss')
        .pipe(plumber({
            errorHandler:notify.onError(function(err){
            return {message: err.message }
        })
        }))
        .pipe(sass({outputStyle: 'compressed'}))
        .pipe(prefix({
            
            cascade: false
        }))
    	.pipe(gulp.dest('public/css'))
    	.pipe(reload({stream:true}))
         


});