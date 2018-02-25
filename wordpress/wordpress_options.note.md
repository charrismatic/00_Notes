# WP Options 

https://codex.wordpress.org/Option_Reference

Options are pieces of data that WordPress uses to store various preferences and configuration settings. 

Listed below are the options, along with some of the default values from the current WordPress install. 

By using the appropriate function, options can be added, changed, removed, and retrieved, from the wp_options table. 

Or, you may use All Settings Screen to view and change options. 

This list reflects the WordPress 2.9 release, and does not include options that were deprecated by that version.

Definitions are normally typed, possible option-values are bolded, and option-value definitions are italicized. Data types are given after the possible values (if those are given) like this:

Data type: Integer



## View By Category

### Discussion

__blacklist_keys__
When a comment contains any of these words in its content, name, URL, e-mail, or IP, it will be marked as spam. One word or IP per line. It will match inside words, so "press" will match "WordPress."
Default: NULL
Data type: String (possibly multi-line)


__comment_max_links__
Hold a comment in the queue if it contains the value of this option or more.
Default: 2
Data type: Integer


__comment_moderation__ 
Before a comment appears, an administrator must always approve the comment.
1 : Yes
0 : False (default)
Data type: Integer


__comments_notify__ 
E-mail me when anyone posts a comment.
1 : Yes (default)
0 : No
Data type: Integer


__default_comment_status__ 
Allow comments (can be overridden with individual posts)
open : Allow comments (default)
closed : Disallow comments
Data type: String


__default_ping_status__ 
Allow link notifications from other blogs (pingbacks and trackbacks).
open : Allow pingbacks and trackbacks from other blogs (default)
closed : Disallow pingbacks and trackbacks from other blogs
Data type: String


__default_pingback_flag__ 
Attempt to notify any blogs linked to from the article (slows down posting).
1 : Yes (default)
0 : No
Data type: Integer


__moderation_keys__ 
When a comment contains any of these words in its content, name, URL, e-mail, or IP, it will be held in the moderation queue. One word or IP per line. It will match inside words, so "press" will match "WordPress."
Default: NULL
Data type: String (possibly multi-line)


__moderation_notify__ 
E-mail me when a comment is held for moderation.
1 : Yes (default)
0 : No
Data type: Integer


__require_name_email__ 
Before a comment appears, the comment author must fill out his/her name and email.
1 : Yes (default)
0 : No
Data type: Integer


__thread_comments__ 
Enable WP-native threaded (nested) comments.
1 : Yes
0 : No (default)
Data type: Integer


__thread_comments_depth__ 
Set the number of threading levels for comments.
1 thru 10 : levels
Default: 5
Data type: Integer


__show_avatars__
Avatar Display
1 : (default) Show Avatars
0 : Do not show Avatars
Data type: Integer


__avatar_rating__
Maximum Rating
G : (default) Suitable for all audiences
PG : Possibly offensive, usually for audiences 13 and above
R : Intended for adult audiences above 17
X : Even more mature than above
Data type: String


__avatar_default__
Default Avatar
mystery : (default) Mystery Man
blank : Blank
gravatar_default : Gravatar Logo
identicon : Identicon (Generated)
wavatar : Wavatar (Generated)
monsterid : MonsterID (Generated)
retro : Retro (Generated)
Data type: String


__close_comments_for_old_posts__
Automatically close comments on old articles
1 : Yes
0 : No (default)
Data type: Integer


__close_comments_days_old__
Automatically close comments on articles older than x days
Default: 14
Data type: Integer


__page_comments__
Break comments into pages
1 : Yes (default)
0 : No
Data type: Integer


__comments_per_page__
Default: 50
Data type: Integer


__default_comments_page__
Default: 'newest'
Data type: String


__comment_order__
asc : (default)
desc :
Data type: String


__comment_whitelist__
Comment author must have a previously approved comment
1 : Yes (default)
0 : No
Data type:


__General__
admin_email 
Administrator email
Default: 'you@example.com'
Data type: String


__blogdescription__ 
Blog tagline
Default: `__('Just another WordPress weblog')`
Data type: String


__blogname__ 
Blog title
Default: `__('My Blog')`
Data type: String


__comment_registration__ 
Users must be registered and logged in to comment
1 : Yes
0 : No (default)
Data type: Integer


__date_format__ 
Default date format (see Formatting Date and Time)
Default: `__('F j, Y')`
Data type: String


__default_role__ 
The default role of users who register at the blog.
subscriber : (default)
administrator :
editor :
author :
contributor :
Data type: String


__gmt_offset__ 
Times in the blog should differ by this value.
-6 : GMT -6 (aka Central Time, USA)
0 : GMT (aka Greenwich Mean Time)
Default: date('Z') / 3600
Data type: Integer


__home__ 
Blog address (URL)
Default: wp_guess_url()
Data type: String (URI)


__siteurl__ 
WordPress address (URL)
Default: wp_guess_url()
Data type: String (URI)


__start_of_week__ 
The starting day of the week.
0 : Sunday
1 : Monday (default)
2 : Tuesday
3 : Wednesday
4 : Thursday
5 : Friday
6 : Saturday
Data type: Integer


__time_format__ 
Default time format (see Formatting Date and Time)
Default: `__('g:i a')`
Data type: String


__timezone_string__
Timezone
Default: NULL
Data type: String


__users_can_register__ 
Anyone can register
1 : Yes
0 : No (default)
Data type: Integer


__Links__
links_updated_date_format
Default: `__('F j, Y g:i a')`
Data type: String


__links_recently_updated_prepend__
Default: ''
Data type: String


__links_recently_updated_append__
Default: ''
Data type: String


__links_recently_updated_time__
Default: 120
Data type: Integer


__Media__
thumbnail_size_w
Default: 150
Data type: Integer


__thumbnail_size_h__
Default: 150
Data type: Integer


__thumbnail_crop__
Crop thumbnail to exact dimensions (normally thumbnails are proportional)
1 : Yes (default)
0 : No
Data type: Integer


__medium_size_w__
Default: 300
Data type: Integer


__medium_size_h__
Default: 300
Data type: Integer


__large_size_w__
Default: 1024
Data type: Integer


__large_size_h__
Default: 1024
Data type: Integer


__embed_autourls__
Attempt to automatically embed all plain text URLs
Default: 1
Data type: Integer


__embed_size_w__
Default: NULL
Data type: Integer


__embed_size_h__
Default: 600
Data type: Integer


__Miscellaneous__
hack_file 
Use legacy my-hacks.php file support
1 : Yes
0 : No (default)
Data type: Integer


__html_type__ 
Default MIME type for blog pages (text/html, text/xml+html, etc.)
Default: 'text/html'
Data type: String (MIME type)


__secret__ 
Secret value created during installation used with salting, etc.
Default: wp_generate_password(64)
Data type: String (MD5)


__upload_path__ 
Store uploads in this folder (relative to the WordPress root)
Default: NULL
Data type: String (relative path)


__upload_url_path__ 
URL path to upload folder (will be blank by default - Editable in All Settings Screen.
Data type: String (URL path)


__uploads_use_yearmonth_folders__ 
Organize my uploads into month- and year-based folders
1 : Yes (default)
0 : No (default for safe mode)
Data type: Integer


__use_linksupdate__ 
Track links' update times
1 : Yes
0 : No (default)
Data type: Integer


__Permalinks__
permalink_structure 
The desired structure of your blog's permalinks. Some examples:
/%year%/%monthnum%/%day%/%postname%/ : Date and name based
/archives/%post_id%/ : Numeric
/%postname%/ : Post name-based
You can see more examples by viewing Using Permalinks.
Default: NULL
Data type: String


__category_base__
The default category base of your blog categories permalink.
Default: NULL
Data type: String


__tag_base__
The default tag base for your blog tags permalink.
Default: NULL
Data type: String


__Privacy__
blog_public
1 : I would like my blog to be visible to everyone, including search engines (like Google, Sphere, Technorati) and archivers. (default)
0 : I would like to block search engines, but allow normal visitors.
Data type: Integer


__Reading__
blog_charset 
Encoding for pages and feeds. The character encoding you write your blog in (UTF-8 is recommended).
Default: 'UTF-8'
Data type: String


__gzipcompression__ 
WordPress should compress articles (with gzip) if browsers ask for them.
1 : Yes
0 : No (default)
Data type: Integer


__page_on_front__ 
The ID of the page that should be displayed on the front page. Requires show_on_front's value to be page.
Data type: Integer


__page_for_posts__ 
The ID of the page that displays posts. Useful when show_on_front's value is page.
Data type: Integer


__posts_per_page__ 
Show at most x many posts on blog pages.
Default: 10
Data type: Integer


__posts_per_rss__ 
Show at most x many posts in RSS feeds.
Default: 10
Data type: Integer


__rss_language__ 
Language for RSS feeds (metadata purposes only)
Default: 'en'
Data type: String (ISO two-letter language code)


__rss_use_excerpt__ 
Show an excerpt instead of the full text of a post in RSS feeds
1 : Yes
0 : No (default)
Data type: Integer


__show_on_front__ 
What to show on the front page
posts : Your latest posts (default)
page : A static page (see page_on_front)
Data type: String


__Themes__
template 
The slug of the currently activated theme (how it is accessed by path, ex. /wp-content/themes/some-theme: some-theme would be the value)
Default: 'default'
Data type: String


__stylesheet__ 
The slug of the currently activated stylesheet (style.css) (how it is accessed by path, ex. /wp-content/themes/some-style: some-style would be the value)
Default: 'default'
Data type: String


__Writing__
default_category 
ID of the category that posts will be put in by default
Default: 1
Data type: Integer


__default_email_category__ 
ID of the category that posts will be put in by default when written via e-mail
Default: 1
Data type: Integer


__default_link_category__ 
ID of the category that links will be put in by default
Default: 2
Data type: Integer


__default_post_edit_rows__ 
Size of the post box (in lines)
Default: 10
Data type: Integer


__mailserver_login__ 
Mail server username for posting to WordPress by e-mail
Default: 'login@example.com'
Data type: String


__mailserver_pass__ 
Mail server password for posting to WordPress by e-mail
Default: 'password'
Data type: String


__mailserver_port__ 
Mail server port for posting to WordPress by e-mail
Default: 110
Data type: Integer


__mailserver_url__ 
Mail server for posting to WordPress by e-mail
Default: 'mail.example.com'
Data type: String


__ping_sites__ 
When you publish a new post, WordPress automatically notifies the following site update services. For more about this, see Update Services. 
Separate multiple service URLs with line breaks. Requires blog_public to have a value of 1.
Default: 'http://rpc.pingomatic.com/'
Data type: String (possibly multi-line)


__use_balanceTags__ 
Correct invalidly-nested XHTML automatically
1 : Yes
0 : No (default)
Data type: Integer


__use_smilies__ 
Convert emoticons like :-) and :P to graphics when displayed
1 : Yes (default)
0 : No
Data type: Integer


__use_trackback__ 
Enable sending and receiving of trackbacks
1 : Yes
0 : No (default)
enable_app
Enable the Atom Publishing Protocol
1 : Yes
0 : No (default)
Data type: Integer


__enable_xmlrpc__
Enable the WordPress, Movable Type, MetaWeblog and Blogger XML-RPC publishing protocols
1 : Yes
0 : No (default)
Data type: Integer


__Uncategorized__
active_plugins 
Returns an array of strings containing the path of the main php file of the plugin.
The path is relative to the plugins folder. An example of path in the array : 'myplugin/mainpage.php'.
Default: array()
Data type: Array


__advanced_edit__
Default: 0
Data type: Integer


__recently_edited__
Default: NULL
Data type:


__image_default_link_type__
Default: 'file'
Data type: 'file', 'none'


__image_default_size__
Default: NULL
Data type: 'thumbnail', 'medium', 'large' or Custom size: https://codex.wordpress.org/Function_Reference/add_image_size


__image_default_align__
Default: NULL
Data type: 'left', 'right', 'center', 'none'


__sidebars_widgets__ 
Returns array of sidebar states (list of active and inactive widgets).
Default:
Data type: Array


__sticky_posts__
Default: array()
Data type:


__widget_categories__
Default: array()
Data type:


__widget_text__
Default: array()
Data type:


__widget_rss__
Default: array()
Data type: 



## All Settings Screen

WordPress Version 3.0 removed `Settings -> Miscellaneous` 

screen and some of options cannot be reached (ex. upload_url_path).

You may use All Settings Screen to view and change almost all options listed in above