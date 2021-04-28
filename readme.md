# WordPress Theme Structure

Hit the ground running the next time you hand code a WordPress theme using my WordPress Theme Structure. This is a very minimal theme skeleton that includes all the things I tend to use in most themes. This theme structure allows me to move through the repetitive bits more quickly, so I can jump into building out the custom parts of the theme.

## Update News

04-28-2021: I'll be releasing a fairly major update for this theme skeleton as soon as possible.

## Includes

* **404.php** with a basic not found message
* **footer.php** with a copyright statement with auto-updating year
* **functions.php** with code to enqueue scripts and styles, add featured image support and image sizes, add support for WordPress block editor features, create WordPress menus and create a dynamic sidebars
* **gulpfile.babel.js** with code to support:
  * Sass, style autoprefixing, CSS minification and mapping
  * ECMAScript 6 (ES 6), JS file concatenation, JS minification and mapping
  * SVG sprite creation and insertion
  * image compression
  * BrowserSync server with file watching
* **header.php** with viewport settings, social sharing meta tags, favicon image, Google Analytics placeholder and a header that includes a logo and WordPress menu
* **htaccess.txt** for renaming to .htaccess
* **index.php** that pulls in title and content
* **package.json** with project information and dependencies
* **page-home.php** template for the homepage, including a wp_query for posts
* **page.php** that pulls in title and content
* **screenshot.png** placeholder image
* **sidebar.php** with code to create a dynamic sidebar
* **single.php** that pulls in title and content
* **src/images** directory with placeholder favicon PNG and logo SVG, as well as corresponding /images directory for processed images
* **src/js** directory with scripts.js that includes ES 6 document ready function, as well as corresponding /js directory for processed script
* **src/scss** directory that includes normalize.css and a few basic styles and variables, as well as a corresponding /css directory for processed styles
* **style.css** with WordPress theme information

## How To Use

* Add the WordPress Theme Structure directory to your /themes directory.
* Rename the directory and change the name and other details in style.css, if desired.
* Code away! Add, change and remove things in pursuit of theme perfection. Work within the /src directory for images, scripts and styles, then run Gulp tasks to process those files:
  * `gulp compileSass`: Compiles /src/scss/styles.scss to CSS, then autoprefixes, minifies and maps the code. The processed file is placed in the css directory. Runs the same process for /src/scss/editor-styles.scss. Notifies on task completion.
  * `gulp compileJS`: Converts all JS files in the /src/js directory from ES 6 to browser-supported JS, then concatenates, uglifies and maps the code. The processed file is placed in the /js directory. Notifies on task completion.
  * `gulp processSVG`: Deletes existing sprite.svg file from the /images, if it exists, then converts all SVG files in the /src/images/svg-sprite directory to one sprite file. The processed file is placed in the /images directory and injected into the header.php file. SVG files that are not intended to be part of the sprite are copied from the /src/images directory to the /images directory. Notifies on task completion.
  * `gulp processIMG`: Deletes existing JPG and PNG files from the /images directory, if they exist, then optimizes all JPG and PNG files in the /src/images directory. The processed files are placed in the /images directory. Notifies on task completion.
  * `gulp server`: Initializes a BrowserSync server, which opens in a new browser tab / window. Watches for changes to Sass files in /src/scss, JS files in /src/js and PHP files in the main directory. If it finds changes to the Sass or JS files, it will run the appropriate tasks and reload the browser window. If it finds changes to the PHP files, it will simply reload the browser window.
  * `gulp`: Runs the default task, which includes the `compileSass`, `compileJS` and `server` tasks.

## Considerations

* Custom post types and taxonomies are not included in functions.php, as it's better practice to include them as a plugin. Check out my [WordPress Custom Post Types and Taxonomies Plugin](https://github.com/asheabbott/wordpress-custom-post-types-taxonomies) if you're looking for an easy way to build that out.
* Custom meta boxes are not included in functions.php, as it's better practice to include them as a plugin. I recommend the robust and well supported [Advanced Custom Fields](https://wordpress.org/plugins/advanced-custom-fields) plugin for this purpose.
* My WordPress Theme Structure does not include comments functionality, as I tend not to use them, but they can be easily included by adding `<?php comments_template(); ?>` where you want them to appear in the single.php file.

## Changelog

### Potential Roadmap for Future Updates
* More robust styles
* Responsive grid / column layout

### v2.0
* ALL: Modernized theme structure and code to utilize Autoprefixer, Babel, BrowserSync, CleanCSS, Concat, Del, ECMAScript 6 (ES 6), FS, Gulp, ImageMin, ImageMin - MozJpeg, ImageMin - PNGQuant, Inject, Node / NPM, Notify, Sass, Sourcemaps, SVG Sprite, Uglify
* ALL: Updated files to use two spaces for indentation instead of four spaces
* PHP: (functions.php) Deregistered standard jQuery and jQuery Migrate versions, updated to jQuery 3.3.1 and jQuery Migrate 3.0.1
* PHP: (functions.php) Added support for block editor (Gutenberg) features
* PHP: (functions.php) Added Google Fonts integration
* PHP: (functions.php) Added Font Awesome integration
* PHP: (header.php) Changde logo placeholder from image to SVG
* PHP: (header.php) Updated social meta description tag to use the_excerpt() rather than the_content()
* PHP: (header.php) Updated social meta tags to prevent countable() error on PHP 7.2 caused by calling the_excerpt() outside the loop
* CSS: Discontinued use of ITCSS methodology with shift to Sass
* CSS: Updated normalize.css to v8.0.1
* ETC: (screenshot.png) Updated from white background with no text to grey background with "screenshot" text
* ETC: (readme.md) Updated throughout

### v1.1
* PHP: (header.php) Added social meta tags
* PHP: (header.php) Changed `#logo` and `#content` to classes
* PHP: (footer.php) Added copyright line with auto-updating year
* PHP: (functions.php) Added some comments
* PHP: (page.php) Removed "post" class
* JS:  Added comments in document ready function
* CSS: Organized style.css file using ITCSS methodology
* CSS: Updated normalize.css to v7.0.0
* CSS: Removed the asterisk universal selector rule that was applying `box-sizing: border-box` to everything
* CSS: Reduced "unmobile" breakpoint from 768px to 600px
* ETC: Updated readme.md


### v1.0
Initial commit.
