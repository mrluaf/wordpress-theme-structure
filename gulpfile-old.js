var gulp = require('gulp'),
autoprefixer = require('gulp-autoprefixer'),
browserSync = require('browser-sync').create(),
cleanCSS = require('gulp-clean-css'),
concat = require('gulp-concat'),
del = require('del'),
imagemin = require('gulp-imagemin'),
inject = require('gulp-inject'),
notify = require('gulp-notify'),
reload = browserSync.reload,
sass = require('gulp-sass'),
sourcemaps = require('gulp-sourcemaps'),
svgSprite = require('gulp-svg-sprite'),
uglify = require('gulp-uglify');

// compile scss
gulp.task('sass', function() {
  gulp.src('src/scss/styles.scss')
    .pipe(sourcemaps.init())
    .pipe(sass({
      outputStyle: 'expanded',
      sourceComments: 'map',
      sourceMap: 'sass',
      outputStyle: 'nested'
    }).on('error', sass.logError))
    .pipe(autoprefixer('last 2 versions'))
    .pipe(cleanCSS())
    .pipe(sourcemaps.write('maps'))
    .pipe(gulp.dest('css'))
    .pipe(browserSync.stream())
    .pipe(notify({
      message: 'SASS Status: Compiled'
    }));
});

// compile js
gulp.task('js', function() {
  gulp.src('src/js/*.js')
    .pipe(sourcemaps.init())
    .pipe(concat('scripts.js'))
    .pipe(uglify())
    .pipe(sourcemaps.write('maps'))
    .pipe(gulp.dest('js'))
    .pipe(browserSync.stream())
    .pipe(notify({
      message: 'JS Status: Compiled'
    }));
});

// process svg
gulp.task('svg', function() {
  // delete existing sprite from images folder
  del('images/sprite.svg', { force: true });

  // save svgSprite config in a variable
  var config = {
    mode: {
      defs: {
        'dest': '.',
        'sprite': 'sprite.svg'
      },
      inline: true
    }
  };

  // process svgs
  // save in the images folder
  gulp.src('src/images/svg-sprite/*.svg')
    .pipe(svgSprite(config))
    .pipe(gulp.dest('images'));

  // inject svg sprite code into files
  gulp.src('header.php')
    .pipe(inject(gulp.src('images/sprite.svg'), {
      starttag: '<!-- inject:{{ext}} -->',
      transform: function (filePath, file) {
        return file.contents.toString();
      }
    }))
    .pipe(gulp.dest('.'));

  // copy non-sprite svgs to images
  gulp.src('src/images/*.svg')
    .pipe(gulp.dest('images'));
});

// compress images
gulp.task('images', function() {
  del('images/*.{png,jpg}', { force: true });

  gulp.src('src/images/**/*.{png,jpg}')
    .pipe(imagemin())
    .pipe(gulp.dest('images'))
    .pipe(notify({
      message: 'IMG Status: Optimized'
    }));
  });

// run browsersync server and watch code for updates
gulp.task('server', ['sass', 'js'], function() {
  browserSync.init({
    server: {
      baseDir: './'
    } // adjust to match your dev environment
  });

  gulp.watch('./src/scss/*.scss', ['sass', reload]);
  gulp.watch('./src/js/*.js', ['js', reload]);
  gulp.watch('./*.php').on('change', reload);
});

gulp.task('server', ['build'], function(){
  browser.init({server: './_site', port: port});
});

gulp.task('server', gulp.series('build', function(){
  browser.init({server: './_site', port: port});
}));

// gulp.task('default', ['server']);

gulp.task('default', function(){
  console.log("It's working!");
});
