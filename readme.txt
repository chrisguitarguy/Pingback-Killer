=== Pingback Killer ===
Contributors: chrisguitarguy, agencypmg
Donate link: http://www.pwsausa.org/give.htm
Tags: pingbacks, trackbacks, comments
Requires at least: 3.2
Tested up to: 3.3
Stable tag: 1.0

Pingback Killer disables all of WordPress' pingback functionality.

== Description ==

Hate Pingbacks and Trackbacks?  Me too.  Pingback Killer disables of of WordPress' built in pingback functionality. 

This is a very simple plugin that...
1. Removes the `X-Pingback` header WordPress sends
2. Causes any `bloginfo('ping_backurl')` call to return an empty string
3. Hijacks the two options relating to pingbacks
4. Removes the /trackback/ rewrite rules

There are no options pages, it just works.

Bugs?  Problems?  [Get in touch](http://pmg.co/contact).

== Installation ==

1. Download the `pingback-killer.zip` file and unzip it
2. Upload the `pingback-killer` folder to your `wp-content/plugins` directory
3. In the WordPress admin area, click "Plugins" and activate Pingback Killer

= A Note about Deactivation =

After deactivating this plugin, you may have to visit the permalinks settings page and hit "save" to get the trackback rewrite rules back.


== Frequently Asked Questions ==

None so far.

== Screenshots ==

Nothing to see!

== Changelog ==

= 1.0 =
The first (and probalby only?) version

== Upgrade Notice ==

= 1.0 =
* Pingbacks suck, so you should disable them.