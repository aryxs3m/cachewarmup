# cachewarmup
Simple cache warmer with multiple website support. It uses sitemap.xml. I'm using Varnish HTTP Cache a lot and i needed a fast way to cache every page fast.

## Requirements
- PHP
- php-xml
- php-curl

## How to use?
- Open ```cwup.php``` in your favorite editor
- Add sitemap.xml URLs to the 'SITEMAP_XMLS' array at the beginning of the file
- Run it using ```php cwup.php```
