'use strict';

var gulp         = require('gulp');
var stylus       = require('gulp-stylus');
var postcss      = require('gulp-postcss');
var cssnano      = require('cssnano');
var rename       = require('gulp-rename');
var uglify       = require('gulp-uglify');
var browserify   = require('browserify');
var babelify     = require('babelify');
var source       = require('vinyl-source-stream');
var autoprefixer = require('autoprefixer');

var dir = {
  src: {
    css : 'src/stylus',
    js  : 'src/js',
    font: 'src/font'
  },
  dist: {
    css : 'assets/css',
    js  : 'assets/js',
    font: 'assets/font'
  }
}

/**
 * Build CSS
 */
gulp.task('css', function() {
  return stylusCompile(dir.src.css + '/*.styl', dir.dist.css);
});

function stylusCompile(src, dest) {
  return gulp.src(src)
    .pipe(stylus({
      'resolve url nocheck': true
    }))
    .pipe(postcss([
      autoprefixer({
        browsers: ['last 2 versions'],
        cascade: false
      })
    ]))
    .pipe(gulp.dest(dest))
    .pipe(postcss([
      cssnano({
        'zindex': false
      })
    ]))
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest(dest))
}

/**
 * Build javascript
 */
gulp.task('js', function() {
  return browserify(dir.src.js + '/app.js')
    .transform('babelify', {presets: ['es2015']})
    .transform('browserify-shim')
    .bundle()
    .pipe(source('app.js'))
    .pipe(gulp.dest(dir.dist.js))
    .on('end', function() {
      gulp.src([dir.dist.js + '/app.js'])
        .pipe(uglify())
        .pipe(rename({suffix: '.min'}))
        .pipe(gulp.dest(dir.dist.js));
    });
});

/**
 * Font
 */
gulp.task('font', function() {
  return gulp.src(dir.src.font + '/**')
    .pipe(gulp.dest(dir.dist.font));
});

gulp.task('build', ['css', 'js', 'font']);

gulp.task('default', ['build']);
