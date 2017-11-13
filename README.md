# WP Base

## Installatie
- Clone repository en zet een Wordpress installatie in de map
- Maak een bestand /config.php aan met de database gegevens, als dit bestand bestaat zijn we in een develop omgeving
- Voer `npm install` uit om alle Grunt dependencies te installeren

## WP includes
- **[CMB2](https://github.com/CMB2/CMB2)**
- **Post types template**
	- Standaard snippet voor [register_post_type()](https://codex.wordpress.org/Function_Reference/register_post_type)
	- Aparte bestanden voor elk posttype + meta boxes
	- Archive parameter
- **Register menu's template**
	- Standaard snippet voor [register_nav_menu()](https://codex.wordpress.org/Function_Reference/register_nav_menus)
- **Image sizes template**
	- Standaard snippet voor [add_image_size()](https://developer.wordpress.org/reference/functions/add_image_size/)
- **Editor styles template**
	- Standaard snippet voor editor styles
- **Options pagina template**
	- Standaard snippet voor opties pagina met [register_setting()](https://codex.wordpress.org/Function_Reference/register_setting)
- **Register sidebar**
	- Standaard snippet voor widgets met [register_sidebar](https://codex.wordpress.org/Function_Reference/register_sidebar)


## Basis functies
- **File upload lowercase**
	- Sanitize bestandsnaam met file upload
- **Get image id from url**
- **Disable XMLRPC**
	- XMLRPC geeft beveiligingsproblemen
- **Disable auto update**
- **Toevoeging YLT**
	- Voeg YLT linkjes toe aan Wordpress branding


## Style
- [Bootstrap](http://getbootstrap.com/)
- [Fontawesome](http://fontawesome.io/)


## Grunt

- [SASS](http://sass-lang.com/)
- [Uglify (JS)](https://github.com/gruntjs/grunt-contrib-uglify)
- [JSHint](https://github.com/gruntjs/grunt-contrib-jshint)
- [PHPLint](https://www.npmjs.com/package/grunt-phplint)
	- **Let op:** php moet in PATH staan


## Extra's
- **htaccess whitelist**
	- IP whitelist wp-admin
- **htaccess exclude files**
	- In wp-content en uploads
- **Automatische installatie plugins**
	- [TGM Plugin Activation](http://tgmpluginactivation.com/)
- **[Iconifier.net](http://iconifier.net/)**
	- Standaard afbeelding links in de header
- **[Open Graph Data](http://ogp.me/)**
- **screenshot.png**
	- Standaard afbeelding YLT logo


## Templates
- front-page.php
- search.php
- 404.php


## Plugins
- YLT preview
- Contact form 7
- Regenerate Thumbnails
- TinyMCE Advanced
- Intuitive Custom Post Order
- Redirection
- Breadcrumb NavXT
- WPML


## Todo

### Style

- [Bourbon?](http://bourbon.io/)
- [Neat?](http://neat.bourbon.io/)
- [Bitters?](http://bitters.bourbon.io)

### Testing

- [PHPUnit](https://www.npmjs.com/package/grunt-phpunit)
- JavaScript unit test
  - [Jest?](https://facebook.github.io/jest/)

### Plugins

- [Advanced Custom Fields?](https://www.advancedcustomfields.com/)