var gulp = require('gulp'),
sass = require('gulp-sass'),
prefix = require('gulp-autoprefixer'),
uglify = require('gulp-uglify'),
concat = require('gulp-concat'),
babel = require('gulp-babel');

gulp.task('styles', function() {
  gulp.src('src/styles/**/*.scss')
  .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
  .pipe(prefix({
    browsers: ['last 2 versions'],
    cascade: false
  }))
  .pipe(gulp.dest('./'));
});

gulp.task('js', function() {
  gulp.src([
    'src/js/main.js',
    'src/js/mapbox.js'        
    ])
  .pipe(babel({
    presets: ['es2015']
  }))
  .pipe(uglify())
  .pipe(concat('main.min.js'))
  .pipe(gulp.dest('./'))
});   

gulp.task('watch', function () {
  gulp.watch('src/styles/**/*.scss',['styles']);
  gulp.watch('src/js/*.js',['js']);
});

gulp.task('default', ['styles', 'js']);
gulp.task('start', ['watch']);
