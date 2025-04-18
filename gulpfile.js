import { src, dest, watch, series, parallel } from "gulp";
import gulpSass from "gulp-sass";
import * as sass from "sass";
import cleanCSS from "gulp-clean-css";
import uglify from "gulp-uglify";
import concat from "gulp-concat";
import autoprefixer from "gulp-autoprefixer";
import imagemin from "gulp-imagemin";
import imageminPngquant from "imagemin-pngquant";

const sassCompiler = gulpSass(sass);

const paths = {
  styles: {
    src: "assets/css/style.scss",
    dest: "dist/css",
  },
  scripts: {
    vendors: {
      list: [
        "node_modules/jquery/dist/jquery.min.js",
        "node_modules/bootstrap/dist/js/bootstrap.bundle.min.js",
        "node_modules/owl.carousel/dist/owl.carousel.min.js",
        "node_modules/@fortawesome/fontawesome-free/js/all.min.js",
        "node_modules/toastify-js/src/toastify.js",
        "node_modules/aos/dist/aos.js",
      ],
      dest: "dist/js",
      filename: "vendors.min.js",
    },
    main: {
      src: "assets/js/script.js",
      dest: "dist/js",
      filename: "script.min.js",
    },
  },
  css: {
    vendors: {
      list: [
        "node_modules/bootstrap/dist/css/bootstrap.min.css",
        "node_modules/owl.carousel/dist/assets/owl.carousel.css",
        "node_modules/@fortawesome/fontawesome-free/css/all.min.css",
        "node_modules/toastify-js/src/toastify.css",
        "node_modules/aos/dist/aos.css",
      ],
      dest: "dist/css",
      filename: "vendors.min.css",
    },
  },
  images: {
    src: "assets/img/*",
    dest: "dist/img",
  },

  tinymce: {
    src: "node_modules/tinymce/**/*",
    dest: "dist/tinymce-text-editor",
  },
};

const styles = () =>
  src(paths.styles.src)
    .pipe(
      sassCompiler().on("error", (err) => {
        console.error("Sass Compilation Error:", err.message);
        this.emit("end");
      })
    )
    .pipe(autoprefixer({ cascade: false }))
    .pipe(cleanCSS({ compatibility: "ie8" }))
    .pipe(dest(paths.styles.dest));

const vendorScripts = () =>
  src(paths.scripts.vendors.list)
    .pipe(uglify())
    .pipe(concat(paths.scripts.vendors.filename))
    .pipe(dest(paths.scripts.vendors.dest));

const vendorStyles = () =>
  src(paths.css.vendors.list)
    .pipe(cleanCSS())
    .pipe(concat(paths.css.vendors.filename))
    .pipe(dest(paths.css.vendors.dest));

const mainScripts = () =>
  src(paths.scripts.main.src)
    .pipe(uglify())
    .pipe(concat(paths.scripts.main.filename))
    .pipe(dest(paths.scripts.main.dest));

const minifyImages = () =>
  src(paths.images.src, { encoding: false })
    .pipe(
      imagemin(
        [
          imageminPngquant({
            quality: [0.6, 0.8],
          }),
        ],
        {
          verbose: true,
        }
      )
    )
    .pipe(dest(paths.images.dest));

const tinymceTask = () => src(paths.tinymce.src).pipe(dest(paths.tinymce.dest));

const watchFiles = () => {
  watch("assets/css/**/*.scss", styles);
  watch("assets/js/**/*.js", mainScripts);
};

const build = series(styles, vendorScripts, vendorStyles, mainScripts, minifyImages, tinymceTask);
export { build };
export default parallel(build, watchFiles);
