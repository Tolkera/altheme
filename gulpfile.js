'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('sass:main', function () {
  return gulp.src('./styles/tolkera.scss')
      .pipe(sass({}).on('error', sass.logError))
      .pipe(gulp.dest('./'));
});

gulp.task('watch', function () {
  gulp.watch(
      ['./styles/*.scss', './styles/*/*.scss'],
      ['sass:main']);
});

gulp.task('default', ['watch']);
