=== Frontier Restrict Backend ===
Contributors: finnj
Donate link: 
Tags: Backend, Access, Admin, Frontier  
Requires at least: 3.4.0
Tested up to: 4.7.2
Stable tag: 1.2.1
License: GPL v3 or later
 
Frontier Restrict Backend will restrict users from access to the backend (admin area) 
== Description ==
 
Frontier Restrict Backend will restrict users from access to the backend (admin area) 

= Main Features =
* Users without the capability manage_options (Administrators) will not have access to the backend (admin area, and will be redirected to the home url).
* Frontier Restrict Backend allows AJAX call such as upload files, but restricted users will not be allowed to access the backend area.
* Access level chan be changed using a filter - Please see FAQ to allow authors and above to access the back end

= Frontier plugins =
* [Frontier Post](http://wordpress.org/plugins/frontier-post/)  - Complete frontend management of posts
* [Frontier Query](http://wordpress.org/plugins/frontier-query/)  - Display lists and groupings of posts in post/pages and widgets.
* [Frontier Buttons](http://wordpress.org/plugins/frontier-buttons/)  - Full control of tinymce toolbars and buttons buttons
* [Frontier Set Featured ](http://wordpress.org/plugins/frontier-set-featured/)  - Set featured image aut. based on post images 
* [Frontier Restrict Media ](http://wordpress.org/plugins/frontier-restrict-media/)  - Restrict media access to users own media
* [Frontier Restrict Backend ](http://wordpress.org/plugins/frontier-restrict-backend/)  - Restrict access to the backend (wp-admin)
 
== Installation ==

1. ftp the plugin to the `/wp-content/plugins/`  directory or install it from plugin install on your site
2. Activate the plugin through the 'Plugins' menu in WordPress

== Frequently Asked Questions ==

You can change the level that Frontier Restrict Backend blocks, by applying a filter in your functions.php

Per default all other than admin users are blocked, see below example of how to allow Admins, Editors and Authors.


* manage_options      = Administrators
* edit_others_posts   = Editors
* publish_posts       = Authors
* edit_posts          = Contributors
* read                = Subscribers

// ****- Set restrict to allow Author and above -****
function my_restrict_backend_level($min_allow_capability)	
	{
	return "publish_posts";
  	}
add_filter('restrict_backend_min_cap', "my_restrict_backend_level",10,1);


´
The above mentioned capabilities that are allowed.


== Screenshots ==

none - Plugin works on activation and has no user interface.

== Changelog ==

= 1.3.0 =
* Fixed issue with Featured image by allowing bypass for async-upload.php & admin-ajax.php

= 1.2.1 =
* Tested with 4.7

= 1.2.0 =
* Added option to control access level from filter - see FAQ .

= 1.1.0 =
* Tested with 4.5
* Readme update

= 1.0.3 =
* Removed error_log messages


= 1.0.2 =
* Initial release


== Upgrade Notice ==
None