var gulp = require('gulp'),
    concatCss = require('gulp-concat-css'),
    minifyCss = require('gulp-minify-css'),
    rename = require('gulp-rename'),
    autoprefixer = require('gulp-autoprefixer'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat'),
    eslint = require('gulp-eslint'),
    plato = require('gulp-plato'),
    stylus = require('gulp-stylus'),
    source = require('./source.js').returnSource,
    karma = require('karma').server,
    jasmine = require('gulp-jasmine');


gulp.task('stylus', function () {
  return gulp.src('./public/styl/*.styl')
    .pipe(stylus({linenos: false}))
    .pipe(concatCss('styl.css'))
    .pipe(gulp.dest('./public/css/'));
});

gulp.task('css', function() {
    return gulp.src('./public/css/*.css')
        .pipe(concatCss('bundle.css'))
        .pipe(autoprefixer())
        .pipe(minifyCss())
        .pipe(rename('bundle.min.css'))
        .pipe(gulp.dest('./public/prodaction'));
});

gulp.task('js', function() {
    return gulp.src(source())
        /*.pipe(eslint({
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
        }))*/
        /*.pipe(eslint.format())
        .pipe(eslint.failAfterError())
        .pipe(plato('report'))*/
        .pipe(concat('bundle.js'))
        .pipe(gulp.dest('./public/jasmine/src/'))
        .pipe(uglify({
            mangle: false
        }))
        .pipe(rename('bundle.min.js'))
        .pipe(gulp.dest('./public/prodaction'))
        
});


gulp.task('js_lib', function() {
    return gulp.src('./public/js/_lib/*.js')
        .pipe(uglify({
            mangle: false
        }))
        .pipe(gulp.dest('./public/js/_lib/'))       
});


/*gulp.task('tests', function (done) {
    return karma.start({
    configFile: __dirname + '/karma.conf.js',
    singleRun: false
  }, done);
});*/

gulp.task('watch', function() {
    gulp.watch("./public/css/*.css", ['css']);
    gulp.watch("./public/styl/*.styl", ['stylus']);
    gulp.watch("./public/js/*.js", ['js']);
    gulp.watch("./public/js/_block/*.js", ['js']);
    /*gulp.watch("./public/jasmine/src/bundle.js", ['tests']);*/
});

gulp.task('default', ['watch']);
