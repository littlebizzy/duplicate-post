=== Duplicate Post ===

Contributors: littlebizzy
Donate link: https://www.patreon.com/littlebizzy
Tags: duplicate, clone, copy, post, page
Requires at least: 4.4
Tested up to: 5.0
Requires PHP: 7.0
Multisite support: No
Stable tag: 1.1.0
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Prefix: DPLCTP

Easily duplicate (clone) any post, custom post, or page which are then saved in Draft mode, saving you tons of time and headache (no settings page).

== Description ==

Easily duplicate (clone) any post, custom post, or page which are then saved in Draft mode, saving you tons of time and headache (no settings page).

* [**Join our FREE Facebook group for support**](https://www.facebook.com/groups/littlebizzy/)
* [**Worth a 5-star review? Thank you!**](https://wordpress.org/support/plugin/duplicate-post-littlebizzy/reviews/?rate=5#new-post)
* [Plugin Homepage](https://www.littlebizzy.com/plugins/duplicate-post)
* [Plugin GitHub](https://github.com/littlebizzy/duplicate-post)

#### Current Features ####

Zero settings page to worry about, simply adds a "Duplicate" link to the post listings and page listings area. After you click duplicate on any post type, it will automatically generate a cloned post into Draft mode, and refresh the page automatically. Then you can edit the new Draft cloned post as you wish, no settings page exists (no settings required).

#### Compatibility ####

This plugin has been designed for use on [SlickStack](https://slickstack.io) web servers with PHP 7.2 and MySQL 5.7 to achieve best performance. All of our plugins are meant for single site WordPress installations only; for both performance and usability reasons, we highly recommend avoiding WordPress Multisite for the vast majority of projects.

Any of our WordPress plugins may also be loaded as "Must-Use" plugins by using our free [Autoloader](https://github.com/littlebizzy/autoloader) script in the `mu-plugins` directory.

#### Defined Constants ####

    /* Plugin Meta */
    define('DISABLE_NAG_NOTICES', true);

#### Technical Details ####

* Prefix: DPLCTP
* Parent Plugin: [**Dev Tools**](https://www.littlebizzy.com/plugins/dev-tools)
* Disable Nag Notices: [Yes](https://codex.wordpress.org/Plugin_API/Action_Reference/admin_notices#Disable_Nag_Notices)
* Settings Page: No
* PHP Namespaces: No
* Object-Oriented Code: No
* Includes Media (images, icons, etc): No
* Includes CSS: No
* Database Storage: Yes
  * Transients: No
  * WP Options Table: Yes
  * Other Tables: No
  * Creates New Tables: No
  * Creates New WP Cron Jobs: No
* Database Queries: Backend Only (Options API)
* Must-Use Support: [Yes](https://github.com/littlebizzy/autoloader)
* Multisite Support: No
* Uninstalls Data: Yes

#### Special Thanks ####

[Alex Georgiou](https://www.alexgeorgiou.gr), [Automattic](https://automattic.com), [Brad Touesnard](https://bradt.ca), [Daniel Auener](http://www.danielauener.com), [Delicious Brains](https://deliciousbrains.com), [Greg Rickaby](https://gregrickaby.com), [Matt Mullenweg](https://ma.tt), [Mika Epstein](https://halfelf.org), [Mike Garrett](https://mikengarrett.com), [Samuel Wood](http://ottopress.com), [Scott Reilly](http://coffee2code.com), [Jan Dembowski](https://profiles.wordpress.org/jdembowski), [Jeff Starr](https://perishablepress.com), [Jeff Chandler](https://jeffc.me), [Jeff Matson](https://jeffmatson.net), [Jeremy Wagner](https://jeremywagner.me), [John James Jacoby](https://jjj.blog), [Leland Fiegel](https://leland.me), [Luke Cavanagh](https://github.com/lukecav), [Mike Jolley](https://mikejolley.com), [Pau Iglesias](https://pauiglesias.com), [Paul Irish](https://www.paulirish.com), [Rahul Bansal](https://profiles.wordpress.org/rahul286), [Roots](https://roots.io), [rtCamp](https://rtcamp.com), [Ryan Hellyer](https://geek.hellyer.kiwi), [WP Chat](https://wpchat.com), [WP Tavern](https://wptavern.com)

#### Disclaimer ####

We released this plugin in response to our managed hosting clients asking for better access to their server, and our primary goal will remain supporting that purpose. Although we are 100% open to fielding requests from the WordPress community, we kindly ask that you keep these conditions in mind, and refrain from slandering, threatening, or harassing our team members in order to get a feature added, or to otherwise get "free" support. The only place you should be contacting us is in our free [**Facebook group**](https://www.facebook.com/groups/littlebizzy/) which has been setup for this purpose, or via GitHub if you are an experienced developer. Thank you!

#### Our Philosophy ####

> "Decisions, not options." -- WordPress.org

> "Everything should be made as simple as possible, but not simpler." -- Albert Einstein, et al

> "Write programs that do one thing and do it well... write programs to work together." -- Doug McIlroy

> "The innovation that this industry talks about so much is bullshit. Anybody can innovate... 99% of it is 'Get the work done.' The real work is in the details." -- Linus Torvalds

#### Search Keywords ####

clone, clone custom post, clone custom post type, clone post, copy, copy custom post, copy custom post type, copy post, duplicate, duplicate custom post, duplicate custom post type, duplicate page, duplicate post, post duplicator

== Installation ==

1. Upload to `/wp-content/plugins/duplicate-post-littlebizzy`
2. Activate via WP Admin > Plugins
3. Test plugin is working:

After plugin activation, browse within WP Admin to the list of Posts or Pages and there should be a new link when you hover over any given post called Duplicate that you can click on, which will refresh the page and copy any given post into a new Draft.

== Frequently Asked Questions ==

= How can I change this plugin's settings? =

There are no settings to change, and therefore no settings page either. This makes the plugin function much smoother and faster performance overall.

= I have a suggestion, how can I let you know? =

Please avoid leaving negative reviews in order to get a feature implemented. Instead, join our free Facebook group.

== Changelog ==

= 1.1.0 =
* tested with WP 5.0
* updated plugin meta

= 1.0.4 =
* updated plugin meta

= 1.0.3 =
* added warning for Multisite installations
* updated recommended plugins

= 1.0.2 =
* tested with WP 4.9
* added support for `DISABLE_NAG_NOTICES`
* added recommended plugins notice
* added rating request notice

= 1.0.1 =
* fixed plugin title

= 1.0.0 =
* initial release
* tested with PHP 7.0
