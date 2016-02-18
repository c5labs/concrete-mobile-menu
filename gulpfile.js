var gulp = require('gulp'),
    less = require('gulp-less'),
    LessPluginAutoPrefix = require('less-plugin-autoprefix'),
    prefix = new LessPluginAutoPrefix({ browsers: ["last 5 versions"] }),
    minifyCSS = require('gulp-minify-css');

gulp.task('default', function() {
  gulp.src('assets/styles.less')
    .pipe(less({
        plugins: [prefix]
    }))
    .pipe(minifyCSS())
    .pipe(gulp.dest('assets/'));
});