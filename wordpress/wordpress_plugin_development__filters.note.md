# Plugin API / Filter Reference

https://codex.wordpress.org/Plugin_API/Filter_Reference


A Filter is a function that is associated with an existing Action by specifying any existing Hook.

Developers can create custom Filters using the Filter API to replace code from an existing Action.

This process is called "hooking".

Filters allow you to replace specific data (such as a variable) found within an existing Action.


`add_filter( string $tag, callable $function_to_add, int $priority = 10, int $accepted_args = 1 )`

---

__Contents__

1 Post, Page, and Attachment (Upload) Filters
    1.1 Database Reads
    1.2 Database Writes
2 Comment, Trackback, and Ping Filters
    2.1 Database Reads
    2.2 Database Writes
3 Category and Term Filters
    3.1 Database Reads
    3.2 Database Writes     
4 Link Filters      
5 Date and Time Filters
6 Author and User Filters
    6.1 Database Reads
    6.2 Database Writes     
7 Blogroll Filters      
8 Blog Information and Option Filters
9 General Text Filters
10 Administrative Filters
11 Rich Text Editor Filters
12 Template Filters
    12.1 Kubrick Filters
13 Registration & Login Filters
14 Redirect/Rewrite Filters
15 WP_Query Filters
16 Media Filters
17 Advanced WordPress Filters
18 Widgets
19 Admin Bar
20 Further Reading
---


## Post, Page, and Attachment (Upload) Filters

__See Also:__

- `#Category and Term Filters`
- `#Author and User Filters`
- `#Link Filters`
- `#Date and Time Filters`
- `#Administrative Filters`


### Database Reads

Filters in this section are applied to information read from the database, prior to displaying on a page or editing screen.

__attachment_fields_to_edit__
    applied to the form fields to be displayed when editing an attachment.
    Called in the get_attachment_fields_to_edit function. Filter function arguments: an array of form fields, the post object.

__attachment_icon__
    applied to the icon for an attachment in the get_attachment_icon function. Filter function arguments: icon file as an HTML IMG tag, attachment ID.

__attachment_innerHTML__
    applied to the title to be used for an attachment if there is no icon, in the get_attachment_innerHTML function. Filter function arguments: inner HTML (defaults to the title), attachment ID.

__author_edit_pre__
    applied to post author prior to display for editing.

__body_class__
    applied to the classes for the HTML <body> element. Called in the get_body_class function.
    Filter function arguments: an array of class names and an array of additional class names that were added to the first array.

__content_edit_pre__
    applied to post content prior to display for editing.

__content_filtered_edit_pre__
    applied to post content filtered prior to display for editing.

__excerpt_edit_pre__
    applied to post excerpt prior to display for editing.

__date_edit_pre__
    applied to post date prior to display for editing.

__date_gmt_edit_pre__
    applied to post date prior to display for editing.

__get_attached_file__
    applied to the attached file information retrieved by the get_attached_file function.
    Filter function arguments: file information, attachment ID.

__get_enclosed__
    applied to the enclosures list for a post by the get_enclosed function.

__get_pages__
    applied to the list of pages returned by the get_pages function.
    Filter function arguments: list of pages (each item of which contains a page data array), get_pages function argument list (telling which pages were requested).

__get_pung__
    applied to the list of pinged URLs for a post by the get_pung function.

__get_the_archive_title__
    applied to the archive's title in the get_the_archive_title function.

__get_the_excerpt__
    applied to the post's excerpt in the get_the_excerpt function.

__get_the_guid__
    applied to the post's GUID in the get_the_guid function.

__get_to_ping__
    applied to the list of URLs to ping for a post by the get_to_ping function.

__icon_dir__
    applied to the template's image directory in several functions. Basically allows a plugin to specify that icons for MIME types should come from a different location.

__icon_dir_uri__
    applied to the template's image directory URI in several functions. Basically allows a plugin to specify that icons for MIME types should come from a different location.

__image_size_names_choose__
    applied to the list of image sizes selectable in the Media Library. Commonly used to make custom image sizes selectable.

__mime_type_edit_pre__
    applied to post mime type prior to display for editing.

__modified_edit_pre__
    applied to post modification date prior to display for editing.

__modified_gmt_edit_pre__
    applied to post modification gmt date prior to display for editing.

__no_texturize_shortcodes__
    applied to registered shortcodes. Can be used to exempt shortcodes from the automatic texturize function.

__parent_edit_pre__
    applied to post parent id prior to display for editing.

__password_edit_pre__
    applied to post password prior to display for editing.

__post_class__
    applied to the classes of the outermost HTML element for a post. Called in the get_post_class function. Filter function arguments: an array of class names, an array of additional class names that were added to the first array, and the post ID.

__pre_kses__
    applied to various content prior to being processed/sanitized by KSES. This hook allows developers to customize what types of scripts/tags should either be allowed in content or stripped.

__prepend_attachment__
    applied to the HTML to be prepended by the prepend_attachment function.


__protected_title_format__
    Used to the change or manipulate the post title when the post is password protected.

__private_title_format__
    Used to the change or manipulate the post title when its status is private.
__sanitize_title__
    applied to a post title by the sanitize_title function, after stripping out HTML tags.

__single_post_title__
    applied to the post title when used to create a blog page title by the wp_title and single_post_title functions.

__status_edit_pre__
    applied to post status prior to display for editing.

__the_content__
    applied to the post content retrieved from the database, prior to printing on the screen (also used in some other operations, such as trackbacks).

__the_content_rss__
    (Deprecated)
    Applied to the post content prior to including in an RSS feed.

__the_content_feed__
    applied to the post content prior to including in an RSS feed.

__the_editor_content__
    applied to post content before putting it into a rich editor window.

__the_excerpt__
    applied to the post excerpt (or post content, if there is no excerpt) retrieved from the database, prior to printing on the screen (also used in some other operations, such as trackbacks).

__the_excerpt_rss__
    applied to the post excerpt prior to including in an RSS feed.

__the_password_form__
    applied to the password form for protected posts.

__the_tags__
    applied to the tags retrieved from the database, prior to printing on the screen.

__the_title__
    applied to the post title retrieved from the database, prior to printing on the screen (also used in some other operations, such as trackbacks).

__the_title_rss__
    applied to the post title before including in an RSS feed (after first filtering with the_title.

__title_edit_pre__
    applied to post title prior to display for editing.

__type_edit_pre__
    applied to post type prior to display for editing.

__wp_dropdown_pages__
    applied to the HTML dropdown list of WordPress pages generated by the wp_dropdown_pages function.

__wp_list_pages__
    applied to the HTML list generated by the wp_list_pages function.

__wp_list_pages_excludes__
    applied to the list of excluded pages (an array of page IDs) in the wp_list_pages function.

__wp_get_attachment_metadata__
    applied to the attachment metadata retrieved by the wp_get_attachment_metadata function. Filter function arguments: meta data, attachment ID.

__wp_get_attachment_thumb_file__
    applied to the attachment thumbnail file retrieved by the wp_get_attachment_thumb_file function. Filter function arguments: thumbnail file, attachment ID.

__wp_get_attachment_thumb_url__
    applied to the attachment thumbnail URL retrieved by the wp_get_attachment_thumb_URL function. Filter function arguments: thumbnail URL, attachment ID.

__wp_get_attachment_url__
    applied to the attachment URL retrieved by the wp_get_attachment_url function. Filter function arguments: URL, attachment ID.

__wp_mime_type_icon__
    applied to the MIME type icon for an attachment calculated by the wp_mime_type_icon function. Filter function arguments: icon URI calculated, MIME type, post ID.

__wp_title__
    applied to the blog page title before sending to the browser in the wp_title function.


### Database Writes

Filters in this section are applied to information prior to saving to the database.

__add_ping__
    applied to the new value of the pinged field on a post when a ping is added, prior to saving the new information in the database.

__attachment_fields_to_save__
    applied to fields associated with an attachment prior to saving them in the database. Called in the media_upload_form_handler function. Filter function arguments: an array of post attributes, an array of attachment fields including the changes submitted from the form.

__attachment_max_dims__
    applied to the maximum image dimensions before reducing an image size. Filter function input (and return value) is either false (if no maximum dimensions have been specified) or a two-item list (width, height).

__category_save_pre__
    applied to post category comma-separated list prior to saving it in the database (also used for attachments).

__comment_status_pre__
    applied to post comment status prior to saving it in the database (also used for attachments).

__content_filtered_save_pre__
    applied to filtered post content prior to saving it in the database (also used for attachments).

__content_save_pre__
    applied to post content prior to saving it in the database (also used for attachments).

__excerpt_save_pre__
    applied to post excerpt prior to saving it in the database (also used for attachments).

__image_save_pre (deprecated)__
    use image_editor_save_pre instead.

__jpeg_quality (deprecated)__
    use wp_editor_set_quality or WP_Image_Editor::set_quality() instead.

__name_save_pre (Deprecated)__
    applied to post name prior to saving it in the database (also used for attachments).

__phone_content__
    applied to the content of a post submitted by email, before saving.

__ping_status_pre__
    applied to post ping status prior to saving it in the database (also used for attachments).

__post_mime_type_pre__
    applied to the MIME type for an attachment prior to saving it in the database.

__status_save_pre__
    applied to post status prior to saving it in the database.

__thumbnail_filename__
    applied to the file name for the thumbnail when uploading an image.

__title_save_pre__
    applied to post title prior to saving it in the database (also used for attachments).

__update_attached_file__
    applied to the attachment information prior to saving in post metadata in the update_attached_file function. Filter function arguments: attachment information, attachment ID.

__wp_create_thumbnail__
    (deprecated)

__wp_delete_file__
    applied to an attachment file name just before deleting.

__wp_generate_attachment_metadata__
    applied to the attachment metadata array before saving in the database.

__wp_save_image_file (deprecated)__
    use wp_save_image_editor_file instead.

__wp_thumbnail_creation_size_limit__
    applied to the size of the thumbnail when uploading an image. Filter function arguments: max file size, attachment ID, attachment file name.

__wp_thumbnail_max_side_length__
    applied to the size of the thumbnail when uploading an image. Filter function arguments: image side max size, attachment ID, attachment file name.

__wp_update_attachment_metadata__
    applied to the attachment metadata just before saving in the wp_update_attachment_metadata function. Filter function arguments: meta data, attachment ID.

---

## Comment, Trackback, and Ping Filters

__See also__

- `#Author and User Filters`
- `#Link Filters`
- `#Date and Time Filters`
- `#Administrative Filters`


### Database Reads

Filters in this section are applied to information read from the database, prior to displaying on a page or editing screen.

__comment_excerpt__
    applied to the comment excerpt by the comment_excerpt function. See also get_comment_excerpt.

__comment_flood_filter__
    applied when someone appears to be flooding your blog with comments. Filter function arguments: already blocked (true/false, whether a previous filtering plugin has already blocked it; set to true and return true to block this comment in a plugin), time of previous comment, time of current comment.

__comment_post_redirect__
    applied to the redirect location after someone adds a comment. Filter function arguments: redirect location, comment info array.

__comment_text__
    applied to the comment text before displaying on the screen by the comment_text function, and in the admin menus.

__comment_text_rss__
    applied to the comment text prior to including in an RSS feed.

__comments_array__
    applied to the array of comments for a post in the comments_template function. Filter function arguments: array of comment information structures, post ID.

__comments_number__
    applied to the formatted text giving the number of comments generated by the comments_number function. See also get_comments_number.

__get_comment_excerpt__
    applied to the comment excerpt read from the database by the get_comment_excerpt function (which is also called by comment_excerpt. See also comment_excerpt.

__get_comment_ID__
    applied to the comment ID read from the global $comments variable by the get_comment_ID function.

__get_comment_text__
    applied to the comment text of the current comment in the get_comment_text function, which is also called by the comment_text function.

__get_comment_type__
    applied to the comment type ("comment", "trackback", or "pingback") by the get_comment_type function (which is also called by comment_type).

__get_comments_number__
    applied to the comment count read from the $post global variable by the get_comments_number function (which is also called by the comments_number function; see also comments_number filter).

__post_comments_feed_link__
    applied to the feed URL generated for the comments feed by the comments_rss function.


### Database Writes

Filters in this section are applied to information prior to saving to the database.

__comment_save_pre__
    applied to the comment data just prior to updating/editing comment data. Function arguments: comment data array, with indices "comment_post_ID", "comment_author", "comment_author_email", "comment_author_url", "comment_content", "comment_type", and "user_ID".

__pre_comment_approved__
    applied to the current comment's approval status (true/false) to allow a plugin to override. Return true/false and set first argument to true/false to approve/disapprove the comment, and use global variables such as $comment_ID to access information about this comment.

__pre_comment_content__
    applied to the content of a comment prior to saving the comment in the database.

__preprocess_comment__
    applied to the comment data prior to any other processing, when saving a new comment in the database. Function arguments: comment data array, with indices "comment_post_ID", "comment_author", "comment_author_email", "comment_author_url", "comment_content", "comment_type", and "user_ID".

__wp_insert_post_data__
    applied to modified and unmodified post data in wp_insert_post() prior to update or insertion of post into database. Function arguments: modified and extended post array and sanitized post array.


### Category and Term Filters

See also
- `#Administrative Filters`


### Database Reads

Filters in this section are applied to information read from the database, prior to displaying on a page or editing screen.

__category_description__
    applied to the "description" field categories by the category_description and wp_list_categories functions. Filter function arguments: description, category ID when called from category_description; description, category information array (all fields from the category table for that particular category) when called from wp_list_categories.

__category_feed_link__
    applied to the feed URL generated for the category feed by the get_category_feed_link function.

__category_link__
    applied to the URL created for a category by the get_category_link function. Filter function arguments: link URL, category ID.

__get_ancestors__
    applied to the list of ancestor IDs returned by the get_ancestors function (which is in turn used by many other functions). Filter function arguments: ancestor IDs array, given object ID, given object type.

__get_categories__
    applied to the category list generated by the get_categories function (which is in turn used by many other functions). Filter function arguments: category list, get_categories options list.

__get_category__
    applied to the category information that the get_category function looks up, which is basically an array of all the fields in WordPress's category table for a particular category ID.

__list_cats__
    called for two different purposes:
    _wp_list_categories_ function applies it to the category names.

    Filter function arguments:
    - category name,
    - category information list (all fields from the category table for that particular category).

    _wp_dropdown_categories_ function uses it to filter the `show_option_all` and `show_option_none` arguments
    function arguments
    - (which are used to put options "All" and "None" in category drop-down lists).
    - No additional filter


__list_cats_exclusions__
    applied to the SQL WHERE statement giving the categories to be excluded by the get_categories function. Typically, a plugin would add to this list, in order to exclude certain categories or groups of categories from category lists. Filter function arguments: excluded category WHERE clause, get_categories options list.

__single_cat_title__
    applied to the category name when used to create a blog page title by the wp_title and single_cat_title functions.

__the_category__
    applied to the list of categories (an HTML list with links) created by the get_the_category_list function. Filter function arguments: generated HTML text, list separator being used (empty string means it is a default LI list), parents argument to get_the_category_list.

__the_category_rss__
    applied to the category list (a list of category XML elements) for a post by the get_the_category_rss function, before including in an RSS feed. Filter function arguments are the list text and the type ("rdf" or "rss" generally).

__wp_dropdown_cats__
    applied to the drop-down category list (a text string containing HTML option elements) generated by the wp_dropdown_categories function.

__wp_list_categories__
    applied to the category list (an HTML list) generated by the wp_list_categories function.

__wp_get_object_terms__
    applied to the list of terms (an array of objects) generated by the wp_get_object_terms function, which is called by a number of category/term related functions, such as get_the_terms and get_the_category.


### Database Writes

Filters in this section are applied to information prior to saving to the database.

__pre_category_description__
    applied to the category desription prior to saving in the database.

__wp_update_term_parent__
    filter term parent before update to term is applied, hook to this filter to see if it will cause a hierarchy loop.

__edit_terms__
    (actually an action, but often used like a filter) hooked in prior to saving taxonomy/category change in the database

__pre_category_name__
    applied to the category name prior to saving in the database.

__pre_category_nicename__
    applied to the category nice name prior to saving in the database.


### Link Filters

This section contains filters related to 'links to posts, pages, archives, feeds, etc.'

For blogroll links, see the #Blogroll Filters section below.

__attachment_link__
    applied to the calculated attachment permalink by the get_attachment_link function. Filter function arguments: link URL, attachment ID.

__author_feed_link__
    applied to the feed URL generated for the author feed by the get_author_rss_link function.

__author_link__
    applied to the author's archive permalink created by the get_author_posts_url function. Filter function arguments: link URL, author ID, author's "nice" name. Note that get_author_posts_url is called within functions wp_list_authors and the_author_posts_link.

__comment_reply_link__
    applied to the link generated for replying to a specific comment by the get_comment_reply_link function which is called within function comments_template. Filter function arguments: link (string), custom options (array), current comment (object), current post (object).

__day_link__
    applied to the link URL for a daily archive by the get_day_link function. Filter function arguments: URL, year, month number, day number.

__feed_link__
    applied to the link URL for a feed by the get_feed_link function. Filter function arguments: URL, type of feed (e.g. "rss2", "atom", etc.).

__get_comment_author_link__
    applied to the HTML generated for the author's link on a comment, in the get_comment_author_link function (which is also called by comment_author_link. Action function arguments: user name

__get_comment_author_url_link__
    applied to the HTML generated for the author's link on a comment, in the get_comment_author_url_link function (which is also called by comment_author_link).

__month_link__
    applied to the link URL for a monthly archive by the get_month_link function. Filter function arguments: URL, year, month number.

__page_link__
    applied to the calculated page URL by the get_page_link function. Filter function arguments: URL, page ID.
    Note that there is also an internal filter called `_get_page_link` that can be used to filter the URLS of pages
    that are not designated as the blog's home page (same arguments).
    Note that this only applies to WordPress pages, not posts, custom post types, or attachments.

__post_link__
    applied to the calculated post permalink by the get_permalink function,
    which is also called by the the_permalink, post_permalink, `previous_post_link`,
    and next_post_link functions. Filter function arguments: permalink URL, post data list.
    Note that this only applies to WordPress default posts, and not custom post types (nor pages or attachments).

__post_type_link__
    applied to the calculated custom post type permalink by the get_post_permalink function.

__the_permalink__
    applied to the permalink URL for a post prior to printing by function the_permalink.

__year_link__
    applied to the link URL for a yearly archive by the get_year_link function. Filter function arguments: URL, year.

__tag_link__
    applied to the URL created for a tag by the get_tag_link function. Filter function arguments: link URL, tag ID.

__term_link__
    applied to the URL created for a term by the get_term_link function. Filter function arguments: term link URL, term object and taxonomy slug.



### Date and Time Filters

See also `#Link Filters` above.

__get_comment_date__
    applied to the formatted comment date generated by the get_comment_date function (which is also called by comment_date).

__get_comment_time__
    applied to the formatted comment time in the get_comment_time function (which is also called by comment_time).

__get_the_modified_date__
    applied to the formatted post modification date generated by the get_the_modified_date function (which is also called by the the_modified_date function).

__get_the_modified_time__
    applied to the formatted post modification time generated by the get_the_modified_time and get_post_modified_time functions (which are also called by the the_modified_time function).

__get_the_time__
    applied to the formatted post time generated by the get_the_time and get_post_time functions (which are also called by the the_time function).

__the_date__
    applied to the formatted post date generated by the the_date function.

__the_modified_date__
    applied to the formatted post modification date generated by the the_modified_date function.

__the_modified_time__
    applied to the formatted post modification time generated by the the_modified_time function.

__the_time__
    applied to the formatted post time generated by the the_time function.

__the_weekday__
    applied to the post date weekday name generated by the the_weekday function.

__the_weekday_date__
    applied to the post date weekday name generated by the the_weekday_date function. Function arguments are the weekday name, before text, and after text (before text and after text are added to the weekday name if the current post's weekday is different from the previous post's weekday).


### Author and User Filters

See also `#Link Filters` and `#Administrative Filters`

__login_body_class__
    Allows filtering of the body class applied to the login screen in login_header().

__login_redirect__
    applied to the redirect_to post/get variable during the user login process.

__user_contactmethods__
    applied to the contact methods fields on the user profile page. (old page is here: contactmethods)

__update_(meta_type)_metadata__
    applied before a (user) metadata gets updated.


### Database Reads

Filters in this section are applied to information read from the database, prior to displaying on a page or editing screen.

__author_email__
    applied to the comment author's email address retrieved from the database by the comment_author_email function. See also get_comment_author_email.

__comment_author__
    applied to the comment author's name retrieved from the database by the comment_author function. See also get_comment_author.
__comment_author_rss__
    applied to the comment author's name prior to including in an RSS feed.

__comment_email__
    applied to the comment author's email address retrieved from the database by the comment_author_email_link function.

__comment_url__
    applied to the comment author's URL retrieved from the database by the comment_author_url function (see also get_comment_author_url).

__get_comment_author__
    applied to the comment author's name retrieved from the database by get_comment_author, which is also called by comment_author. See also comment_author.

__get_comment_author_email__
    applied to the comment author's email address retrieved from the database by get_comment_author_email, which is also called by comment_author_email. See also author_email.

__get_comment_author_IP__
    applied to the comment author's IP address retrieved from the database by the get_comment_author_IP function, which is also called by comment_author_IP.

__get_comment_author_url__
    applied to the comment author's URL retrieved from the database by the get_comment_author_url function, which is also called by comment_author_url. See also comment_url.

__login_errors__
    applied to the login error message printed on the login screen.

__login_headertitle__
    applied to the title for the login header URL (Powered by WordPress by default) printed on the login screen.

__login_headerurl__
    applied to the login header URL (points to wordpress.org by default) printed on the login screen.

__login_message__
    applied to the login message printed on the login screen.

__role_has_cap__
    applied to a role's capabilities list in the WP_Role->has_cap function. Filter function arguments are the capabilities list to be filtered, the capability being questioned, and the role's name.

__sanitize_user__
    applied to a user name by the sanitize_user function. Filter function arguments: user name (after some cleaning up), raw user name, strict (true or false to use strict ASCII or not).

__the_author__
    applied to a post author's displayed name by the get_the_author function, which is also called by the the_author function.

__the_author_email__
    applied to a post author's email address by the the_author_email function.

__user_search_columns__
    applied to the list of columns in the wp_users table to include in the WHERE clause inside WP_User_Query.


### Database Writes

Filters in this section are applied to information prior to saving to the database.

__pre_comment_author_email__
    applied to a comment author's email address prior to saving the comment in the database.

__pre_comment_author_name__
    applied to a comment author's user name prior to saving the comment in the database.

__pre_comment_author_url__
    applied to a comment author's URL prior to saving the comment in the database.

__pre_comment_user_agent__
    applied to the comment author's user agent prior to saving the comment in the database.

__pre_comment_user_ip__
    applied to the comment author's IP address prior to saving the comment in the database.

__pre_user_id__
    applied to the comment author's user ID prior to saving the comment in the database.

__pre_user_description__
    applied to the user's description prior to saving in the database.

__pre_user_display_name__
    applied to the user's displayed name prior to saving in the database.

__pre_user_email__
    applied to the user's email address prior to saving in the database.

__pre_user_first_name__
    applied to the user's first name prior to saving in the database.

__pre_user_last_name__
    applied to the user's last name prior to saving in the database.

__pre_user_login__
    applied to the user's login name prior to saving in the database.

__pre_user_nicename__
    applied to the user's "nice name" prior to saving in the database.

__pre_user_nickname__
    applied to the user's nickname prior to saving in the database.

__pre_user_url__
    applied to the user's URL prior to saving in the database.

__registration_errors__
    applied to the list of registration errors generated while registering a user for a new account.

__user_registration_email__
    applied to the user's email address read from the registration page, prior to trying to register the person as a new user.

__validate_username__
    applied to the validation result on a new user name. Filter function arguments: valid (true/false), user name being validated.



### Blogroll Filters

This section contains filters related to blogroll links.

For filters related to links to 'posts, pages, categories, etc.', see section `#Link Filters` above.

__get_bookmarks__
    applied to link/blogroll database query results by the get_bookmarks function. Filter function arguments: database query results list, get_bookmarks arguments list.

__link_category__
    applied to the link category by the get_links_list and wp_list_bookmarks functions (as of WordPress 2.2).

__link_description__
    applied to the link description by the get_links and wp_list_bookmarks functions (as of WordPress 2.2).

__link_rating__
    applied to the link rating number by the get_linkrating function.

__link_title__
    applied to the link title by the get_links and wp_list_bookmarks functions (as of WordPress 2.2)

__pre_link_description__
    applied to the link description prior to saving in the database.

__pre_link_image__
    applied to the link image prior to saving in the database.

__pre_link_name__
    applied to the link name prior to saving in the database.

__pre_link_notes__
    applied to the link notes prior to saving in the database.

__pre_link_rel__
    applied to the link relation information prior to saving in the database.

__pre_link_rss__
    applied to the link RSS URL prior to saving in the database.

__pre_link_target__
    applied to the link target information prior to saving in the database.

__pre_link_url__
    applied to the link URL prior to saving in the database.


### Blog Information and Option Filters

__all_options__
    applied to the option list retrieved from the database by the get_alloptions function.

__all_plugins__
    applied to the list of plugins retrieved for display in the plugins list table.

__bloginfo__
    applied to the blog option information retrieved from the database by the bloginfo function, after first retrieving the information with the get_bloginfo function. A second argument $show gives the name of the bloginfo option that was requested. Note that bloginfo("url"), bloginfo("directory") and bloginfo("home") do not use this filtering function (see bloginfo_url).

__bloginfo_rss__
    applied to the blog option information by function get_bloginfo_rss (which is also called from bloginfo_rss), after first retrieving the information with the get_bloginfo function, stripping out HTML tags, and converting characters appropriately. A second argument $show gives the name of the bloginfo option that was requested.

__bloginfo_url__
    applied to the the output of bloginfo("url"), bloginfo("directory") and bloginfo("home") before returning the information.

__loginout__
    applied to the HTML link for logging in and out (generally placed in the sidebar) generated by the wp_loginout function.

__lostpassword_url__
    applied to the URL that allows users to reset their passwords.

__option_(option name)__
    applied to the option value retrieved from the database by the get_option function, after unserializing (which decodes array-based options). To use this filter, you will need to add filters for specific options names, such as "option_foo" to filter the output of get_option("foo").

__pre_get_space_used__
    applied to the get_space_used() function to provide an alternative way of displaying storage space used. Returning false from this filter will revert to default display behavior (used wp_upload_dir() directory space in megabytes).

__pre_option_(option name)__
    applied to the option value retrieved from the database by the get_alloptions function, after unserializing (which decodes array-based options). To use this filter, you will need to add filters for specific options names, such as "pre_option_foo" to filter the option "foo".

__pre_update_option_(option name)__
    applied the option value before being saving to the database to allow overriding the value to be stored. To use this filter, you will need to add filters for specific options names, such as "pre_update_option_foo" to filter the option "foo".

__register__
    applied to the sidebar link created for the user to register (if allowed) or visit the admin panels (if already logged in) by the wp_register function.

__upload_dir__
    applied to the directory to be used for uploads calculated by the wp_upload_dir function. Filter function argument is an array with components "dir" (the upload directory path), "url" (the URL of the upload directory), and "error" (which you can set to true if you want to generate an error).

__upload_mimes__
    allows a filter function to return a list of MIME types for uploads, if there is no MIME list input to the wp_check_filetype function. Filter function argument is an associated list of MIME types whose component names are file extensions (separated by vertical bars) and values are the corresponding MIME types.


### General Text Filters

__attribute_escape__
    applied to post text and other content by the attribute_escape function, which is called in many places in WordPress to change certain characters into HTML attributes before sending to the browser.

__js_escape__
    applied to JavaScript code before sending to the browser in the js_escape function.

__sanitize_key__
    applied to key before using it for your settings, field, or other needs, generated by sanitize_key function


---

## Administrative Filters

The filters in this section are related to the administration screens of WordPress

Including content editing screens

__admin_user_info_links__
    applied to the user profile and info links in the WordPress admin quick menu.

__autosave_interval__
    applied to the interval for auto-saving posts.

__bulk_actions__
    applied to an array of bulk items in admin bulk action dropdowns.

__bulk_post_updated_messages__
    applied to an array of bulk action updated messages.

__cat_rows__
    applied to the category rows HTML generated for managing categories in the admin menus.

__comment_edit_pre__
    applied to comment content prior to display in the editing screen.

__comment_edit_redirect__
    applied to the redirect location after someone edits a comment in the admin menus. Filter function arguments: redirect location, comment ID.

__comment_moderation_subject__
    applied to the mail subject before sending email notifying the administrator of the need to moderate a new comment. Filter function arguments: mail subject, comment ID. Note that this happens inside the default wp_notify_moderator function, which is a "pluggable" function, meaning that plugins can override it; see Plugin API).

__comment_moderation_text__
    applied to the body of the mail message before sending email notifying the administrator of the need to moderate a new comment. Filter function arguments: mail body text, comment ID. Note that this happens inside the default wp_notify_moderator function, which is a "pluggable" function, meaning that plugins can override it; see Plugin API).

__comment_notification_headers__
    applied to the mail headers before sending email notifying the post author of a new comment. Filter function arguments: mail header text, comment ID. Note that this happens inside the default wp_notify_postauthor function, which is a "pluggable" function, meaning that plugins can override it; see Plugin API).

__comment_notification_subject__
    applied to the mail subject before sending email notifying the post author of a new comment. Filter function arguments: mail subject, comment ID. Note that this happens inside the default wp_notify_postauthor function, which is a "pluggable" function, meaning that plugins can override it; see Plugin API).

__comment_notification_text__
    applied to the body of the mail message before sending email notifying the post author of a new comment. Filter function arguments: mail body text, comment ID. Note that this happens inside the default wp_notify_postauthor function, which is a "pluggable" function, meaning that plugins can override it; see Plugin API).

__comment_row_actions__
    applied to the list of action links under each comment row (like Reply, Quick Edit, Edit).

__cron_request__
    Allows filtering of the URL, key and arguments passed to wp_remote_post() in spawn_cron().

__cron_schedules__
    applied to an empty array to allow a plugin to generate cron schedules in the wp_get_schedules function.

__custom_menu_order__
    used to activate the 'menu_order' filter.

__default_content__
    applied to the default post content prior to opening the editor for a new post.

__default_excerpt__
    applied to the default post excerpt prior to opening the editor for a new post.

__default_title__
    applied to the default post title prior to opening the editor for a new post.

__editable_slug__
    applied to the post, page, tag or category slug by the get_sample_permalink function.

__explain_nonce_(verb)-(noun)__
    allows a filter function to define text to be used to explain a nonce that is otherwise not explained by the WordPress core code. You will need to define specific verb/noun filters to use this. For instance, if your plugin defines a nonce for updating a tag, you would define a filter for "explain_nonce_update-tag". Filter function arguments: text to display (defaults to a generic "Are you sure you want to do this?" message) and extra information from the end of the action URL. In the example here, your function might simply return the string "Are you sure you want to update this tag?".

__format_to_edit__
    applied to post content, excerpt, title, and password by the format_to_edit function, which is called by the admin menus to set up a post for editing. Also applied to when editing comments in the admin menus.

__format_to_post__
    applied to post content by the format_to_post function, which is not used in WordPress by default.

__manage_edit-${post_type}_columns__
    applied to the list of columns to print on the manage posts screen for a custom post type. Filter function argument/return value is an associative array where the element key is the name of the column, and the value is the header text for that column. See also action manage_${post_type}_posts_custom_column, which puts the column information into the edit screen.

__manage_link-manager_columns__
    was manage_link_columns until wordpress 2.7. applied to the list of columns to print on the blogroll management screen. Filter function argument/return value is an associative list where the element key is the name of the column, and the value is the header text for that column. See also action manage_link_custom_column, which puts the column information into the edit screen.

__manage_posts_columns__
    applied to the list of columns to print on the manage posts screen. Filter function argument/return value is an associative array where the element key is the name of the column, and the value is the header text for that column. See also action manage_posts_custom_column, which puts the column information into the edit screen. (see Scompt's tutorial for examples and use.)

__manage_pages_columns__
    applied to the list of columns to print on the manage pages screen. Filter function argument/return value is an associative array where the element key is the name of the column, and the value is the header text for that column. See also action manage_pages_custom_column, which puts the column information into the edit screen.

        manage_users_columns

        manage_users_custom_column

        manage_users_sortable_columns

__media_row_actions__
    applied to the list of action links under each file in the Media Library (like View, Edit).

__menu_order__
    applied to the array for the admin menu order. Must be activated with the 'custom_menu_order' filter before.

__nonce_life__
    applied to the lifespan of a nonce to generate or verify the nonce. Can be used to generate nonces which expire earlier. The value returned by the filter should be in seconds.

__nonce_user_logged_out__
    applied to the current user ID used to generate or verify a nonce when the user is logged out.

__plugin_row_meta__
    add additional links below each plugin on the plugins page.

__postmeta_form_limit__
    applied to the number of post-meta information items shown on the post edit screen.

__post_row_actions__
    applied to the list of action links (like Quick Edit, Edit, View, Preview) under each post in the Posts > All Posts section.

__post_updated_messages__
    applied to the array storing user-visible administrative messages when working with posts, pages and custom post types. This filter is used to change the text of said messages, not to trigger them. See "customizing the messages" in the register_post_type documentation.

__pre_upload_error__
    applied to allow a plugin to create an XMLRPC error for uploading files.

__preview_page_link__
    applied to the link on the page editing screen that shows the page preview at the bottom of the screen.

__preview_post_link__
    applied to the link on the post editing screen that shows the post preview at the bottom of the screen.

__richedit_pre__
    applied to post content by the wp_richedit_pre function, before displaying in the rich text editor.

__schedule_event__
    applied to each recurring and single event as it is added to the cron schedule.

__set-screen-option__
    Filter a screen option value before it is set.

__show_password_fields__
    applied to the true/false variable that controls whether the user is presented with the opportunity to change their password on the user profile screen (true means to show password changing fields; false means don't).

__terms_to_edit__
    applied to the CSV of terms (for each taxonomy) that is used to show which terms are attached to the post.

__the_editor__
    applied to the HTML DIV created to house the rich text editor, prior to printing it on the screen. Filter function argument/return value is a string.

__user_can_richedit__
    applied to the calculation of whether the user's browser has rich editing capabilities, and whether the user wants to use the rich editor, in the user_can_richedit function. Filter function argument and return value is true/false if the current user can/cannot use the rich editor.

__user_has_cap__
    applied to a user's capabilities list in the WP_User->has_cap function (which is called by the current_user_can function). Filter function arguments are the capabilities list to be filtered, the capability being questioned, and the argument list (which has things such as the post ID if the capability is to edit posts, etc.)

__wp_handle_upload_prefilter__
    applied to the upload information when uploading a file. Filter function argument: array which represents a single element of `$_FILES`

__wp_handle_upload__
    applied to the upload information when uploading a file. Filter function argument: array with elements "file" (file name), "url", "type".

__wp_revisions_to_keep__
    alters how many revisions are kept for a given post. Filter function arguments: number representing desired revisions saved (default is unlimited revisions), the post object.

__wp_terms_checklist_args__
    applied to arguments of the wp_terms_checklist() function. Filter function argument: array of checklist arguments, post ID.

__wp_upload_tabs__
    applied to the list of custom tabs to display on the upload management admin screen.
    Use action upload_files_(tab) to display a page for your custom tab (see Plugin API/Action Reference).

__media_upload_tabs__
    applied to the list of custom tabs to display on the upload management admin screen.
    Use action upload_files_(tab) to display a page for your custom tab (see Plugin API/Action Reference).

__plugin_action_links_(plugin file name)__
    applied to the list of links to display on the plugins page (beside the activate/deactivate links).

__views_edit-post__
    applied to the list posts eg All (30) | Published (22) | Draft (5) | Pending (2) | Trash (1)


### Rich Text Editor Filters

These filters modify the configuration of the rich text editor, TinyMCE.

__mce_spellchecker_languages__
    applied to the language selection available in the spell checker.

__mce_buttons, mce_buttons_2, mce_buttons_3, mce_buttons_4__
    applied to the rows of buttons for the rich editor toolbar (each is an array of button names).

__mce_css__
    applied to the CSS file URL for the rich text editor.

__mce_external_plugins__
    applied to the array of external plugins to be loaded by the rich text editor.

__mce_external_languages__
    applied to the array of language files loaded by external plugins, allowing them to use the standard translation method (see tinymce/langs/wp-langs.php for reference).

__tiny_mce_before_init__
    applied to the whole init array for the editor.


---

## Template Filters

This section contains links related to themes, templates, and style files.

__locale_stylesheet_uri__
    applied to the locale-specific stylesheet URI returned by the get_locale_stylesheet_uri function. Filter function arguments: URI, stylesheet directory URI.

__stylesheet__
    applied to the stylesheet returned by the get_stylesheet function.

__stylesheet_directory__
    applied to the stylesheet directory returned by the get_stylesheet_directory function. Filter function arguments: stylesheet directory, stylesheet.

__stylesheet_directory_uri__
    applied to the stylesheet directory URI returned by the get_stylesheet_directory_uri function. Filter function arguments: stylesheet directory URI, stylesheet.

__stylesheet_uri__
    applied to the stylesheet URI returned by the get_stylesheet_uri function. Filter function arguments: stylesheet URI, stylesheet.

__template__
    applied to the template returned by the get_template function.

__template_directory__
    applied to the template directory returned by the get_template_directory function. Filter function arguments: template directory, template.

__template_directory_uri__
    applied to the template directory URI returned by the get_template_directory_uri function. Filter function arguments: template directory URI, template.

__theme_root__
    applied to the theme root directory (normally wp-content/themes) returned by the get_theme_root function.

__theme_root_uri__
    applied to the theme root directory URI returned by the get_theme_root_uri function. Filter function arguments: URI, site URL.


---

You can also replace individual template files from your theme, by using the following filter hooks.

See also the `template_redirect` action hook.

Each of these filters takes as input the path to the corresponding template file in the current theme.

A plugin can modify the file to be used by returning a new path to a template file.

### 404_template

__archive_template__
    You can use this for example to enforce a specific template for a custom post type archive.
    This way you can keep all the code in a plugin.

__attachment_templat__

__author_templat__

__category_templat__

__comments_popup_templat__

__comments_template__
    The "comments_template" filter can be used to load a custom template form a plugin which replace the themes default comment template.

__date_template__

__home_template__

__page_template__

__paged_template__

__search_template__

__single_template__

    You can use this for example to enforce a specific template for a custom post type. This way you can keep all the code in a plugin.

__shortcut_link__
    applied to the "Press This" bookmarklet link.

__template_include__

__wp_nav_menu_args__
    applied to the arguments of the wp_nav_menu function.

__wp_nav_menu_items__
    Filter the HTML list content for navigation menus.

### Kubrick Filters

These filters were present in the pre-3.0 default theme kubrick.

__kubrick_header_color__
    applied to the color for the header of the kubrick theme.

__kubrick_header_display__
    applied to the display option for the header of the kubrick theme.

__kubrick_header_image__
    applied to the header image file for the kubrick theme.

---

## Registration & Login Filters

__authenticate__
    allows basic authentication to be performed on login based on username and password.

__registration_errors__
    applied to the list of registration errors generated while registering a user for a new account.

__user_registration_email__
    applied to the user's email address read from the registration page, prior to trying to register the person as a new user.

__validate_username__
    applied to the validation result on a new user name. Filter function arguments: valid (true/false), user name being validated.

__wp_authenticate_user__
    applied when a user attempted to log in, after WordPress validates username and password, but before validation errors are checked.

---

## Redirect/Rewrite Filters

These advanced filters relate to WordPress’s handling of rewrite rules.

__allowed_redirect_hosts__
    applied to the list of host names deemed safe for redirection. wp-login.php uses this to defend against a dangerous 'redirect_to' request parameter

__author_rewrite_rules__
    applied to the author-related rewrite rules after they are generated.

__category_rewrite_rules__
    applied to the category-related rewrite rules after they are generated.

__comments_rewrite_rules__
    applied to the comment-related rewrite rules after they are generated.

__date_rewrite_rules__
    applied to the date-related rewrite rules after they are generated.

__mod_rewrite_rules__
    applied to the list of rewrite rules given to the user to put into their .htaccess file
    when they change their permalink structure. (Note: replaces deprecated filter rewrite_rules.)

__page_rewrite_rules__
    applied to the page-related rewrite rules after they are generated.

__post_rewrite_rules__
    applied to the post-related rewrite rules after they are generated.

__redirect_canonical__
    Can be used to cancel a "canonical" URL redirect.
    Accepts 2 parameters: $redirect_url, $requested_url.
    To cancel the redirect return FALSE, to allow the redirect return $redirect_url

__rewrite_rules_array__
    applied to the entire rewrite rules array after it is generated.

__root_rewrite_rules__
    applied to the root-level rewrite rules after they are generated.

__search_rewrite_rules__
    applied to the search-related rewrite rules after they are generated.

__wp_redirect__
    applied to a redirect URL by the default wp_redirect function.
    Filter function arguments: URL, HTTP status code.
    Note that wp_redirect is also a "pluggable" function, meaning that plugins can override it; see Plugin API).

__wp_redirect_status__
    applied to the HTTP status code when redirecting by the default wp_redirect function. Filter function arguments: HTTP status code, URL. Note that wp_redirect is also a "pluggable" function, meaning that plugins can override it; see Plugin API).



---

## WP_Query Filters

These are filters run by the WP_Query object in the course of building and executing a query to retrieve posts.

See also #Advanced WordPress Filters for queries relating to users, meta values, and more generic queries.

__found_posts__
    applied to the list of posts, just after querying from the database.

__found_posts_query__
    after the list of posts to display is queried from the database, WordPress selects rows in the query results.
    This filter allows you to do something other than SELECT FOUND_ROWS() at that step.

__post_limits__
    applied to the LIMIT clause of the query that returns the post array.

__posts_clauses__
    applied to the entire SQL query, divided into a keyed array for each clause type,
    that returns the post array. Can be easier to work with than posts_request.

__posts_distinct__
    allows a plugin to add a DISTINCTROW clause to the query that returns the post array.

__posts_fields__
    applied to the field list for the query that returns the post array.

__posts_groupby__
    applied to the GROUP BY clause of the query that returns the post array (normally empty).

__posts_join__
    applied to the JOIN clause of the query that returns the post array.
    This is typically used to add a table to the JOIN, in combination with the posts_where filter.

__posts_join_paged__
    applied to the JOIN clause of the query that returns the post array,
    after the paging is calculated (though paging does not affect the JOIN,
      so this is actually equivalent to posts_join).

__posts_orderby__
    applied to the ORDER BY clause of the query that returns the post array.

__posts_request__
    applied to the entire SQL query that returns the post array, just prior to running the query.

__posts_results__
    allows you to manipulate the resulting array returned from the query.

__posts_search__
    applied to the search SQL that is used in the WHERE clause of WP_Query.

__posts_where__
    applied to the WHERE clause of the query that returns the post array.

__posts_where_paged__
    applied to the WHERE clause of the query that returns the post array,
    after the paging is calculated (though paging does not affect the WHERE, so this is actually equivalent to posts_where).

__the_posts__
    applied to the list of posts queried from the database after minimal processing for permissions and draft status on single-post pages.

---

## Media Filters

This section contains media filters that are used to integrated different types of media.

- __disable_captions__
- __editor_max_image_size__
- __embed_defaults__
- __embed_googlevideo__
- __gallery_style__
- __get_image_tag__
- __get_image_tag_class__
- __icon_dir__
- __image_downsize__
- __image_resize_dimensions__
- __image_size_names_choose__
- __img_caption_shortcode__
- __intermediate_image_sizes__
- __(adjacent)_image_link__
- __load_default_embeds__
- __media_upload_tabs__
- __media_view_settings__
- __media_view_strings__
- __plupload_default_params__
- __plupload_default_settings__
- __post_gallery__
- __upload_size_limit__
- __use_default_gallery_style__
- __wp_get_attachment_image_attributes__
- __wp_image_editors__
- __wp_prepare_attachment_for_js__
- __wp_handle_upload_prefilter__

---

## Advanced WordPress Filters

This section contains advanced filters related to internationalization, miscellaneous queries, and other fundamental WordPress functions.

__create_user_query__
    applied to the query used to save a new user's information to the database, just prior to running the query.

__get_editable_authors__
    applied to the list of post authors that the current user is authorized to edit in the get_editable_authors function.

__get_next_post_join__
    in function get_next_post (which finds the post after the currently-displayed post), applied to the SQL JOIN clause (which normally joins to the category table if user is viewing a category archive). Filter function arguments: JOIN clause, stay in same category (true/false), list of excluded categories.

__get_next_post_sort__
    in function get_next_post (which finds the post after the currently-displayed post), applied to the SQL ORDER BY clause (which normally orders by post date in ascending order with a limit of 1 post). Filter function arguments: ORDER BY clause.

__get_next_post_where__
    in function get_next_post (which finds the post after the currently-displayed post), applied to the SQL WHERE clause (which normally looks for the next dated published post). Filter function arguments: WHERE clause, stay in same category (true/false), list of excluded categories.

__get_previous_post_join__
    in function get_previous_post (which finds the post before the currently-displayed post), applied to the SQL JOIN clause (which normally joins to the category table if user is viewing a category archive). Filter function arguments: join clause, stay in same category (true/false), list of excluded categories.

__get_previous_post_sort__
    in function get_previous_post (which finds the post before the currently-displayed post), applied to the SQL ORDER BY clause (which normally orders by post date in descending order with a limit of 1 post). Filter function arguments: ORDER BY clause.

__get_previous_post_where__
    in function get_previous_post (which finds the post before the currently-displayed post), applied to the SQL WHERE clause (which normally looks for the previous dated published post). Filter function arguments: WHERE clause, stay in same category (true/false), list of excluded categories.

__gettext__
    applied to the translated text by the `translation()` function
     which is called by functions like the `__()` and `_e()` internationalization functions
    Filter function arguments:
        - translated text
        - untranslated text  
        - text domain
    Gets applied even if internationalization is not in effect or if the text domain has not been loaded.

__override_load_textdomain__

__get_meta_sql__
    in function `WP_Meta_Query::get_sql`
    which generates SQL clauses to be appended to a main query for advanced meta queries
    applied to the SQL JOIN and WHERE clause generated by the advanced meta query.
    Filter function arguments:
```
        array(
            compact( 'join', 'where' ),
            $this->queries,
            $type,
            $primary_table,
            $primary_id_column,
            $context
        )
```
__get_others_drafts__
    applied to the query that selects the other users' drafts for display in the admin menus.

__get_users_drafts__
    applied to the query that selects the users' drafts for display in the admin menus.

__locale__
    applied to the locale by the `get_locale` function.

__query__
    applied to all queries (at least all queries run after plugins are loaded).

__query_string__
    deprecated
    use `query_vars` or request instead.

__query_vars__
    applied to the list of public WordPress query variables before the SQL query is formed.
    Useful for removing extra permalink information the plugin has dealt with in some other manner.

__request__
    like query_vars, but applied after "extra" and private query variables have been added.

__excerpt_length__
    Defines the length of a single-post excerpt.

__excerpt_more__
    Defines the more string at the end of the excerpt.

__post_edit_form_tag__
    Allows you to append code to the form tag in the default post/page editor.

__update_user_query__
    applied to the update query used to update user information, prior to running the query.

__uploading_iframe_src (*removed since WP 2.5)__
    applied to the HTML src tag for the uploading iframe on the post and page editing screens.

__xmlrpc_methods__
    applied to list of defined XMLRPC methods for the XMLRPC server.

__wp_mail_from__
    applied before any mail is sent by the wp_mail function.
    Supplied value is the calculated from address which is wordpress at the current hostname
    set by `$_SERVER['SERVER_NAME'])`
    The filter should return an email address or name/email combo in the form "user@example.com" or "Name <user@example.com>" (without the quotes!).

__wp_mail_from_name__
    applied before any mail is sent by the w`p_mail` function.
    The filter should return a name string to be used as the email from name.

__update_(meta_type)_metadata__
    applied before a metadata gets updated.
    For example if a user metadata gets updated the hook would be `update_user_metadata`


---

## Widgets

This section contains filters added by widgets present in WordPress core.

__dynamic_sidebar_params__
    applied to the arguments passed to the widgets_init function in the WordPress widgets.

__widget_archives_dropdown_args__
    applied to the arguments passed to the `wp_get_archives()` function in the WordPress Archives widget.

__widget_categories_args__
    applied to the arguments passed to the `wp_list_categories()` function in the WordPress Categories widget.

__widget_links_args__
    applied to the arguments passed to the `wp_list_bookmarks()` function in the WordPress Links widget.

__widget_nav_menu_args__
    applied to the arguments passed to the `wp_nav_menu()` function in the WordPress Custom Menu widget.

__widget_pages_args__
    applied to the arguments passed to the `wp_list_pages()` function in the WordPress Pages widget.

__widget_tag_cloud_args__
    applied to the arguments passed to the `wp_tag_cloud()` function in the WordPress Pages widget.

__widget_text__
    applied to the widget text of the WordPress Text widget.
    May also apply to some third party widgets as well.

__widget_title__
    applied to the widget title of any user editable WordPress Widget.
    May also apply to some third party widgets as well.

---

## Admin Bar

This section contains filters added by the Admin Bar added in WordPress 3.1.0.

__wp_admin_bar_class__
    allows changing the default `WP_Admin_Bar` class
    in the `_wp_admin_bar_init()` function in wp-includes/admin-bar.php
