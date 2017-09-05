# Wordpress Theme Structure

Hit the ground running the next time you hand code a Wordpress theme using my phone-first Wordpress Theme Structure. This is a very minimal theme skeleton that includes all the things I tend to use in most themes, allowing me to move through the repetitive bits more quickly, so I can jump into building out the custom parts of the theme.

## Includes

* 404.php with a basic not found message
* footer.php
* functions.php with code to enqueue scripts and styles, add featured image support and thumbnail sizes, create a Wordpress menu and create a dynamic sidebar
* header.php with viewport settings, favicon link, google analytics placeholder and a header that includes a logo and Wordpress menu
* htaccess.txt for renaming to .htaccess
* images folder with placeholder images for the favicon and logo
* index.php that pulls in title and content
* js folder with scripts.js that includes document ready function
* page.php that pulls in title and content
* page-home.php template for the home page, including a wp_query for posts
* screenshot.png placeholder image
* sidebar.php with code to create a dynamic sidebar
* single.php that pulls in title and content
* style.css that includes normalize.css and a few basic styles for formatting and responsiveness, as well as a media query to unmobile your styles for tablet and desktop

## How To Use

* Upload the Wordpress Theme Structure folder to your themes directory.
* Rename the folder and change the name and other details in style.css, if desired.
* Code away! Add, change and remove things in pursuit of theme perfection.

## Considerations

* Custom post types and taxonomies are not included in functions.php, as it's a better practice to include them as a plugin. Check out my [Wordpress Custom Post Types and Taxonomies Plugin](https://github.com/asheabbott/wordpress-custom-post-types-taxonomies) if you're looking for an easy way to build that out.
* Custom meta boxes are not included in functions.php, as it's better practice to include them as a plugin. Check out my [Wordpress Meta Boxes Plugin](https://github.com/asheabbott/wordpress-meta-boxes) if you're looking for an easy way to build that out.
* My Wordpress Theme Structure does not include comments functionality, as I tend not to use them, but they can be easily included by adding `<?php comments_template(); ?>` where you want them to appear in the single.php file.

## Changelog

### Potential Roadmap for Future Updates
* Responsive grid / column layout
* Font Awesome integration
* Forking for more robust theme development

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