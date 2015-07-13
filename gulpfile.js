var gulp = require('./node_modules/gulp');
var sass = require('./node_modules/gulp-sass');

gulp.task('sass-primary', function() {
    gulp.src('./assets/scss/realia-bootstrap.scss')
        .pipe(sass())
        .pipe(gulp.dest('./assets/css/'));
});

gulp.task('watch', function() {
    gulp.watch('./assets/scss/*.scss', ['sass-primary']);
    gulp.watch('./assets/scss/helpers/*.scss', ['sass-primary']);
});