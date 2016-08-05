var gulp = require('gulp');
var cssmin = require('gulp-cssmin');
var rename = require('gulp-rename');
var autoprefixer = require('gulp-autoprefixer');
var jsmin = require('gulp-jsmin');
var sass = require('gulp-sass');
var browserSync = require('browser-sync');


// ディレクトリ設定
var dir = {
    src: './', // _srcフォルダ置き換え
    dist: 'dist/theme' // destフォルダ置き換え
};

// タスクの設定
gulp.task("browserSyncTask", function () {
    browserSync.init({
        server: {
            baseDir: "./", // ルートとなるディレクトリを指定
            proxy: ""
        }
    });
});





gulp.task('cssmin', function () {
  gulp.src('css/**/*.css')
  .pipe(autoprefixer(["last 2 version", "ie 8", "ie 7"]))
  .pipe(cssmin())
  .pipe(rename({suffix: '.min'}))
  .pipe(gulp.dest('dist/theme'));
});



gulp.task('sass', function () {
  gulp.src('css/**/*.scss')
    .pipe(sass())
    .pipe(autoprefixer(["last 2 version", "ie 8", "ie 7"]))
    .pipe(gulp.dest(dist/theme))
    .pipe(cssmin())
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('dist/theme'));
});


gulp.task('jsmin', function () {
  gulp.src('js/**/*.js')
    .pipe(jsmin())
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('dist/theme'));
});


// srcフォルダ以下のファイルを監視
gulp.task('watch',function(){
  browserSync.init({
      proxy: "vccw.dev"
  });

  gulp.watch(['./css/**/*.scss'], ['scss']);
  gulp.watch(['./**/*.html'], browserSync.reload);
  gulp.watch(['./**/*.php'], browserSync.reload);
  gulp.watch(['./js/**/**.js'], ['jshint',browserSync.reload]);
  gulp.watch(['./images/**/*'], browserSync.reload);
});

gulp.task('default',['watch']);
