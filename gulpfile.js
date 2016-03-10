var gulp = require('gulp'),
    concatCss = require('gulp-concat-css'),
    minifyCss = require('gulp-minify-css'),
    rename = require('gulp-rename'),
    myth = require('gulp-myth'),
    autoprefixer = require('gulp-autoprefixer'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    eslint = require('gulp-eslint'),
    plato = require('gulp-plato');


gulp.task('stylus', function () {
  return gulp.src('./public/styl/*.styl')
    .pipe(stylus({linenos: false}))
    .pipe(concatCss('styl.css'))
    .pipe(gulp.dest('./public/css/'));
});

gulp.task('css', function() {
    return gulp.src('./public/css/*.css')
        .pipe(concatCss('bundle.css'))
        .pipe(myth())
        .pipe(minifyCss())
        .pipe(rename('bundle.min.css'))
        .pipe(gulp.dest('./public/prodaction'));
});

gulp.task('js', function() {
    return gulp.src([
                    './public/js/helper.js', 
                    './public/js/model.js', 
                    './public/js/controller.js', 
                    './public/js/_block/_slider.js', 
                    './public/js/_block/_iframe_load.js', 
                    './public/js/_block/_stycky_accordeon.js', 
                    './public/js/_block/_modal.js', 
                    './public/js/_block/_currency.js', 
                    './public/js/_block/_weather.js',
                    './public/js/_block/_ajax_loader_index_page_category.js',
                    './public/js/_block/_ajax_loader_single_category.js',
                    './public/js/_block/_ajax_loader_multimedia.js'
                    ])
        .pipe(eslint({
            ecmaFeatures: {
                'modules': true
            },
            rules: {
                'strict': 2,
                'no-console': 2,
                'no-alert': 2,
                'no-dupe-keys': 2,
                'no-duplicate-case' : 2,
                'no-empty' : 2,
                'no-caller': 2,
                'no-extra-semi' : 2,
                'no-invalid-regexp' : 2,
                'no-regex-spaces' : 2,
                'no-sparse-arrays' : 2,
                'no-unreachable' : 2,
                'use-isnan' : 2,
                'valid-typeof' : 2,
                'no-multi-spaces' : 2,
                'complexity': [2, {'maximum': 8}],
                'no-irregular-whitespace' : 2,
                'curly': 2,
                'no-redeclare': 2,
                'no-unused-expressions': [2, {'allowTernary': true }],
                'camelcase': [2, {'properties': 'always'}],
                'no-multiple-empty-lines': [2, {'max': 2}],
                'semi': [2, 'always']
            },
            envs: [
                'browser'
            ]
        }))
        .pipe(eslint.format())
        .pipe(eslint.failAfterError())
        .pipe(plato('report'))
        .pipe(concat('bundle.js'))
        .pipe(uglify())
        .pipe(rename('bundle.min.js'))
        .pipe(gulp.dest('./public/prodaction'))
        .pipe(gulp.dest('./public/jasmine/src/'))
});

gulp.task('watch', function() {
    gulp.watch("./public/css/*.css", ['css']);
    gulp.watch("./public/styl/*.styl", ['stylus']);
    gulp.watch("./public/js/*.js", ['js']);
    gulp.watch("./public/js/_block/*.js", ['js']);
});

gulp.task('default', ['watch']);
