'use strict';

const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const del = require('del');
const rename = require('gulp-rename');

gulp.task('make-global', () => {
    return gulp.src('sass/**/global.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe( rename('style.css') )
        .pipe(gulp.dest('.'));
});

gulp.task('default', () => {
    gulp.watch('./sass/**/*.scss', gulp.series(['make-global']));
});
