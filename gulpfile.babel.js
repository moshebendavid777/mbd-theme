import gulp from 'gulp';
import gulpSass from 'gulp-sass';
import autoprefixer from 'autoprefixer';
import postcss from 'gulp-postcss';
import babelify from 'babelify';
import browserify from 'browserify';
import source from 'vinyl-source-stream';
import uglify from 'gulp-uglify';
import terser from 'gulp-terser';
import buffer from 'gulp-buffer';
import rename from 'gulp-rename';
import sassGlob from 'gulp-sass-glob';
import concat from 'gulp-concat';
import header from 'gulp-header'; // Added gulp-header import

const sass = gulpSass(require('sass'));

// Compile SCSS to CSS
gulp.task('styles', () => {
  return gulp.src('src/styles/main.scss')
    .pipe(sassGlob())
    .pipe(sass({
      outputStyle: 'compressed',
      includePaths: ['node_modules/bootstrap/scss'],
    }))
    .pipe(postcss([autoprefixer()]))
    .pipe(rename('style.css'))
    .pipe(header(`
/**
 * Theme Name: MDB Theme
 * Theme URI: https://moshebendavid.codes
 * Author: Moshe Ben-David
 * Author URI: https://moshebendavid.codes
 * Description: Moshe Ben-David Starter WP Theme
 * Version: 1.0.2
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: your-text-domain
 */
`))
    .pipe(gulp.dest('./'));
});

// Minify and bundle JavaScript using Browserify and Babelify
gulp.task('scripts', () => {
  return browserify({
    entries: 'src/js/main.js',
    debug: true,
  })
    .transform(babelify.configure({
      presets: ['@babel/preset-env'],
    }))
    .bundle()
    .pipe(source('main.js'))
    .pipe(buffer())
    .pipe(uglify())
    .pipe(rename('main.min.js'))
    .pipe(gulp.dest('dist/js'));
});

// Watch for changes in SCSS and JavaScript files
gulp.task('watch', () => {
  gulp.watch('src/styles/**/*.scss', gulp.series('styles'));
  gulp.watch('src/js/**/*.js', gulp.series('scripts'));
});

// Default task: run 'gulp' in the terminal to execute this task
gulp.task('default', gulp.parallel('styles', 'scripts', 'watch'));
