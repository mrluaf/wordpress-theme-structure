import { gulp, series, parallel, watch } from 'gulp';
import autoprefixer from 'gulp-autoprefixer';
import browserSync from 'browser-sync';
import cleanCSS from 'gulp-clean-css';
import concat from 'gulp-concat';
import del from 'del';
import fs from 'fs';
import imagemin from 'gulp-imagemin';
import inject from 'gulp-inject';
import notify from 'gulp-notify';
import sass from 'gulp-sass';
import sourcemaps from 'gulp-sourcemaps';
import svgSprite from 'gulp-svg-sprite';
import uglify from 'gulp-uglify';

const reload = browserSync.reload;

// compile scss
const compileSass = (cb) => {
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
  
  cb();
};

// compile js
const compileJS = (cb) => {
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

    cb();
};

// process svg
const processSVG = (cb) => {
  // delete existing sprite from images directory
  fs.access('images/sprite.svg', (err) => {
    if (err) {
      del('images/sprite.svg', { force: true });
    }
  });

  // save svgSprite config in a variable
  const config = {
    mode: {
      defs: {
        'dest': '.',
        'sprite': 'sprite.svg'
      },
      inline: true
    }
  };

  // save sprite in the images directory
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

  // copy non-sprite svgs to images directory
  gulp.src('src/images/*.svg')
    .pipe(gulp.dest('images'));
  
  cb();
};

// compress images
const processIMG = (cb) => {
  fs.access('images/*.{png,jpg}', (err) => {
    if (err) {
      del('images/*.{png,jpg}', { force: true });
    }
  });

  gulp.src('src/images/**/*.{png,jpg}')
    .pipe(imagemin())
    .pipe(gulp.dest('images'))
    .pipe(notify({
      message: 'IMG Status: Optimized'
    }));
  
  cb();
};

// run browsersync server and watch code for updates
const server = (cb) => {
  series(compileSass, compileJS);

  browserSync.init({
    server: {
      baseDir: './'
    } // adjust to match your dev environment
  });

  // FIX WATCH TASKS

  // watch('./src/scss/*.scss', ['compileSass', reload]);
  // watch('./src/js/*.js', ['compileJS', reload]);
  // watch('./*.php').on('change', reload);
};

const defaultTask = (cb) => {
  // place code for your default task here
  console.log('it works!');
  cb();
}

export {
  compileSass,
  compileJS,
  processSVG,
  processIMG,
  server
//   compile,
//   compileMarkup,
//   compileScript,
//   compileStyle,
//   serve,
//   watch,
//   watchMarkup,
//   watchScript,
//   watchStyle,
}

export default defaultTask