var gulp = require('gulp'), 
concatCss = require('gulp-concat-css'), 
minifyCss = require('gulp-minify-css'), 
rename = require('gulp-rename'),
myth = require('gulp-myth'),
autoprefixer = require('gulp-autoprefixer'),
uglify = require('gulp-uglify'),
concat = require('gulp-concat');

gulp.task('css', function () {
  return gulp.src('css/*.css')
  .pipe(concatCss('bundle.css'))
  .pipe(myth())
  .pipe(minifyCss())
  .pipe(rename('bundle.min.css'))
  .pipe(gulp.dest('prodaction'));
});

gulp.task('js', function() {
  return gulp.src(['js/bootstrap.min.js', 'js/jquery.liMarquee.js', 'js/move.min.js', 'js/change_category.js', 'js/grid-and-top-slider.js', 'js/default.js', 'js/weather.js', 'js/currency.js', 'js/jquery.pickmeup.js'])
    .pipe(concat('bundle.js'))
    .pipe(uglify())
    .pipe(rename('bundle.min.js'))
    .pipe(gulp.dest('prodaction'));
});

gulp.task('watch', function(){
  gulp.watch("css/*.css", ['css']);
  gulp.watch("js/*.js", ['js']);
});

gulp.task('default', ['watch']);



















