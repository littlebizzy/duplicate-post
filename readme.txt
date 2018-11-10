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

* [**Join our FREE Facebook group for support!**](https://www.facebook.com/groups/littlebizzy/)
* [Plugin Homepage](https://www.littlebizzy.com/plugins/duplicate-post)
* [Plugin GitHub](https://github.com/littlebizzy/duplicate-post)
* [SlickStack](https://slickstack.io)
* [WP Lite Boilerpate](https://wplite.org)
* [Starter Theme](https://starter.littlebizzy.com)

#### The Long Version ####

Zero settings page to worry about, simply adds a "Duplicate" link to the post listings and page listings area. After you click duplicate on any post type, it will automatically generate a cloned post into Draft mode, and refresh the page.

#### Compatibility ####

This plugin has been designed for use on LEMP (Nginx) web servers with PHP 7.0 and MySQL 5.7 to achieve best performance. All of our plugins are meant for single site WordPress installations only; for both performance and security reasons, we highly recommend against using WordPress Multisite for the vast majority of projects.

#### Plugin Features ####

* Settings Page: No
* Premium Version Available: No
* Includes Media (Images, Icons, Etc): No
* Includes CSS: No
* Database Storage: Yes
  * Transients: No
  * Options: Yes
  * Creates New Tables: No
* Database Queries: Backend Only (Options API)
* Must-Use Support: Yes (Use With [Autoloader](https://github.com/littlebizzy/autoloader))
* Multisite Support: No
* Uninstalls Data: Yes

#### Code Inspiration ####

This plugin was partially inspired either in "code or concept" by the open-source software and discussions mentioned below:

* [Duplicate Page](https://wordpress.org/plugins/duplicate-page/)
* [Post Duplicator](https://wordpress.org/plugins/post-duplicator/)
* [Duplicate Post](https://wordpress.org/plugins/duplicate-post/)

== Installation ==

1. Upload to `/wp-content/plugins/duplicate-post-littlebizzy`
2. Activate via WP Admin > Plugins
3. Test plugin is working:

After plugin activation, browse within WP Admin to the list of Posts or Pages and there should be a new hover link called Duplicate that you can click on which will refresh the page and copy any given post into a new Draft.

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
