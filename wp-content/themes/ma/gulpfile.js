var gulp = require('gulp');
var sass = require('gulp-sass');
const autoprefixer = require('autoprefixer');
const sourcemaps = require('gulp-sourcemaps');
const postcss = require('gulp-postcss');
var pxtoviewport = require('postcss-px-to-viewport');
var inject = require('gulp-inject-string');
var rename = require('gulp-rename');

gulp.task('mob', function () {
    return gulp.src('assets/style.css')
        .pipe(sourcemaps.init())
        .pipe(postcss([ autoprefixer() ]))
        .pipe(gulp.dest('assets/dist'));
});

gulp.task('mob_vw', function () {
    return gulp.src('assets/dist/style.css')
        .pipe(sourcemaps.init())
        .pipe(postcss([ autoprefixer() ]))
        .pipe(postcss([
            pxtoviewport({
                viewportWidth: 480,
                viewportUnit: 'vw',
                minPixelValue: 2,
                selectorBlackList: [
                    // /\.b-progress-bar/,
                    // /\.b-progress-bar__smartline/,
                    // /\.b-progress-bar__smartline::after/,
                    // /\.b-progress-bar__info/,
                ],
            })
        ]))
        .pipe(inject.wrap('@media (max-width: 1024px) {\n', '\n}'))
        .pipe(rename('style_mob_vw.css'))
        .pipe(gulp.dest('assets/dist'));
});

gulp.task('dsk', function () {
    return gulp.src('assets/style_dsk.css')
        .pipe(sourcemaps.init())
        .pipe(postcss([ autoprefixer() ]))
        .pipe(gulp.dest('assets/dist'));
});

gulp.task('dsk_vw', function () {
    return gulp.src('assets/dist/style_dsk.css')
        .pipe(sourcemaps.init())
        .pipe(postcss([ autoprefixer() ]))
        .pipe(postcss([
            pxtoviewport({
                viewportWidth: 1280,
                viewportUnit: 'vw',
                minPixelValue: 2,
                selectorBlackList: [
                    // /\.b-progress-bar/,
                    // /\.b-progress-bar__smartline/,
                    // /\.b-progress-bar__smartline::after/,
                    // /\.b-progress-bar__info/,
                ],
            })
        ]))
        .pipe(inject.wrap('@media (min-width: 1025px) and (max-width: 1280px) {\n', '\n}'))
        .pipe(rename('style_dsk_vw.css'))
        .pipe(gulp.dest('assets/dist'));
});

gulp.task('dsk_px', function () {
    return gulp.src('assets/dist/style_dsk.css')
        .pipe(sourcemaps.init())
        .pipe(postcss([ autoprefixer() ]))
        .pipe(inject.wrap('@media (min-width: 1281px) {\n', '\n}'))
        .pipe(rename('style_dsk_px.css'))
        .pipe(gulp.dest('assets/dist'));
});

gulp.task('default', gulp.series('mob', 'mob_vw', 'dsk', 'dsk_vw', 'dsk_px'));
