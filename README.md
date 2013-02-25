ilc-shortbar
============

Class for WordPress that creates creates multiple sidebars that can be called using a related shortcode.

Installation
-----------

1. Download the zip
2. In WP Admin, go to Plugins > Add New > Upload and select the zip file
3. Upload and Activate it

Usage
------

1. Go to Appearance > Widgets and drag some widgets to one of the sidebars called by shortcodes
2. In posts or pages, use the corresponding shortcode, for example [shortbar2]
3. In PHP templates, use

    <?php echo do_shortcode('[shortbar2]'); ?>
