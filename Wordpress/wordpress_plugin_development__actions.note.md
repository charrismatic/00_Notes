# Plugin API / Action Reference

https://codex.wordpress.org/Plugin_API/Action_Reference

An Action is a PHP function that is executed at specific points throughout the WordPress Core.

Developers can create a custom Action using the Action API to add or remove code from an existing Action by specifying any existing Hook.

This process is called "hooking".

Actions allow you to add or remove code from existing Actions.

---

__Contents__

1 Actions Run During a Typical Request
2 Actions Run During an Admin Page Request
3 Post, Page, Attachment, and Category Actions (Admin)
    3.1 Taxonomy and Terms
4 Comment, Ping, and Trackback Actions
5 Blogroll Actions
6 Feed Actions
7 Template Actions
8 Administrative Actions
    8.1 Dashboard "Right Now" Widget Actions
9 Advanced Actions
10 Further Reading
---


## Actions Run During a Typical Request

These actions are called when a logged-in user opens the home page in Version 3.3.1.

This list may show only the first time each action is called, and in many cases no function is hooked to the action.
Themes and plugins can cause actions to be called multiple times and at differing times during a request.
As proof of this, you can see action calls specific to the Twenty Eleven theme on this list.
Cron tasks may also fire when a user visits the site, adding additional action calls.
This list should be viewed as a guide line or approximation of WordPress action execution order, and not a concrete specification.

Actions are called with the function `do_action()`, except those marked (ref array), which are called with the function `do_action_ref_array()`


---
__muplugins_loaded__`	            | After must-use plugins are loaded.  `
__registered_taxonomy__` 	        | For category, post_tag, etc.  `
__registered_post_type__` 	      | For post, page, etc.  `
__plugins_loaded__` 	            | After active plugins and pluggable functions are loaded.  `
__sanitize_comment_cookies__` 	  | When comment cookies are sanitized.  `
__setup_theme__` 	                | Before the theme is loaded.  `
__load_textdomain__` 	            | For the default d  `
__after_setup_theme__` 	          | Generally used to initialize theme settings/options.  `
`                                 | This is the first action hook available to themes, triggered immediately after the active theme's functions.php file is loaded.`  
`                                 | add_theme_support() should be called here, since the init action hook is too late to add some features.`  
`                                 | At this stage, the current user is not yet authenticated.`  
__auth_cookie_malformed__` 	      |  `
__auth_cookie_valid__` 	          |  `
__set_current_user__` 	          |  `
__init__` 	                      | Typically used by plugins to initialize. The current user is already authenticated by this time.  `
__└─ widgets_init__` 	            | Used to register sidebars. Fired at 'init' priority 1 (and so before 'init' actions with priority ≥ 1!  `
__register_sidebar__` 	          | For each sidebar and footer a  `
__wp_register_sidebar_widget__`   | For each w  `
__wp_default_scripts__` 	        | (ref array)  `
__wp_default_styles__` 	          | (ref array)  `
__admin_bar_init__` 	            |  `
__add_admin_bar_menus__` 	        |  `
__wp_loaded__` 	                  | After WordPress is fully l  `
__parse_request__` 	              | Allows manipulation of HTTP request handling (ref array)  `
__send_headers__` 	              | Allows customization of HTTP headers (ref array)  `
__parse_query__` 	                | After query variables are set (ref array)  `
__pre_get_posts__` 	              | Exposes the query-variables object before a query is executed. (ref array)  `
__posts_selection__` 	            | Used by caching plugins.  `
__wp__` 	                        | After WP object is set up (ref array)  `
__template_redirect__` 	          | Before determining which template to load.  `
__get_header__` 	                | Before the header template file is loaded.  `
__wp_enqueue_scripts__` 	        | When scripts and styles are enqueued.  `
__wp_head__` 	                    | Used to print scripts or data in the head tag on the front end.  `
__wp_print_styles__` 	            | Before styles in the $handles queue are printed.  `
__wp_print_scripts__` 	          | Before scripts in the $handles queue are printed.  `
__get_search_form__` 	            |  `
__loop_start__` 	                | (ref array)  `
__the_post__` 	                  | (ref array) Allows modification of the post object immediately after q  `
__get_template_part_content__`    | Template part for the c  `
__loop_end__` 	                  | (ref array)  `
__get_sidebar__` 	                | Before the sidebar template file is loaded.  `
__dynamic_sidebar__` 	            | Before a widget’s display callback is called.  `
__get_search_form__` 	            |  `
__pre_get_comments__` 	          | (ref array)  `
__wp_meta__` 	                    | Before displaying echoed content in the sidebar.  `
__get_footer__` 	                | Before the footer template file is loaded.  `
__get_sidebar__` 	                | Before the sidebar template file is loaded.  `
__wp_footer__` 	                  | Before determining which template to load.  `
__wp_print_footer_scripts__` 	    | When footer scripts are printed.  `
__admin_bar_menu__` 	            | (ref array)  `
__wp_before_admin_bar_render__`   | Before the admin bar is rendered.  `
__wp_after_admin_bar_render__`    | After the admin bar is rendered.  `
__shutdown__` 	                  | Before PHP execution is about to end.  `

---

## Actions Run During an Admin Page Request

These actions are run when a logged-in user opens the Posts page in Version 3.3.1.  
This list shows only the first time an action is called, and in many cases no function is hooked to the action.  
Each admin page has a different list of actions depending upon the purpose of the page and the plugins installed.  
This list should be viewed as a guide line or approximation, and not a concrete specification.  

In these actions, (hookname) depends on the page.

For the Posts page it is edit.php, or for a theme's Background page it is `appearance_page_custom-background`

Actions are called with the function do_action(), except those marked (ref array),  
which are called with the function `do_action_ref_array()`  



__muplugins_loaded__`                | After must-use plugins are loaded`  
__registered_taxonomy__`             | For category, post_tag, etc.`  
__registered_post_type__`            | For post, page, etc.`  
__plugins_loaded__`                  | After active plugins and pluggable functions are loaded`  
__sanitize_comment_cookies__`        |`  
__setup_theme__`                     |`  
__load_textdomain__`                 | For domain default`  
__after_setup_theme__`               | At this stage, the current user is not yet authenticated.`  
__load_textdomain__`                 | For domain twentyeleven`  
__auth_cookie_valid__`               |`  
__set_current_user__`                |`  
__init__`                            | Typically used by plugins to initialize. The current user is already authenticated by this time.`  
__└─ widgets_init__`                 | Used to register sidebars. This is fired at 'init', with a priority of 1.`  
__register_sidebar__`                | For each sidebar`  
__wp_register_sidebar_widget__`      | For each widget`  
__wp_default_scripts__`              | (ref array)`  
__wp_default_styles__`               | (ref array)`  
__admin_bar_init__`                  |`  
__add_admin_bar_menus__`             |`  
__wp_loaded__`                       | After WordPress is fully loaded`  
__auth_cookie_valid__`               |`  
__auth_redirect__`                   |`  
__\_admin_menu__`                    | See also: _user_admin_menu, _network_admin_menu`  
__admin_menu__`                      | See also: user_admin_menu, network_admin_menu`  
__admin_init__`                      |`  
__current_screen__`                  |`  
__load-(page)__`                     |`  
__send_headers__`                    | Where custom HTTP headers can be added`  
__pre_get_posts__`                   | Exposes the query-variables object before a query is executed. (ref array)`  
__posts_selection__`                 |`  
__wp__`                              | After WP object is set up (ref array)`  
__admin_xml_ns__`                    |`  
__admin_xml_ns__`                    |`  
__admin_enqueue_scripts__`           |`  
__admin_print_styles-(hookname)__`   |`  
__admin_print_styles__`              |`  
__admin_print_scripts-(hookname)__`  |`  
__admin_print_scripts__`             |`  
__wp_print_scripts__`                |`  
__admin_head-(hookname)__`           |`  
__admin_head__`                      |`  
__adminmenu__`                       |`  
__in_admin_header__`                 |`  
__admin_notices__`                   |`  
__all_admin_notices__`               |`  
__(hookname)__`                      |`  
__restrict_manage_posts__`           |`  
__the_post__`                        | (ref array)`  
__pre_user_query__`                  | (ref array)`  
__in_admin_footer__`                 |`  
__admin_footer__`                    |`  
__admin_bar_menu__`                  | (ref array)`  
__wp_before_admin_bar_render__`      |`  
__wp_after_admin_bar_render__`       |`  
__admin_print_footer_scripts__`      |`  
__admin_footer-(hookname)__`         | Admin page footer`  
__shutdown__`                        | PHP execution is about to end`  
__wp_dashboard_setup__`              | Allows customization of admin Dashboard`  


---

## Post, Page, Attachment, and Category Actions (Admin)

__post_submitbox_misc_actions__
    Runs when an editing page gets generated to add some content
    (eg. fields) to the submit box (where the publish button is shown).
    No function arguments.

__add_attachment__
    Runs when an attached file is first added to the database.
    Action function arguments:
        attachment ID

__add_category__
    Same as create_category.

__category_add_form_fields__
    Runs when category add form is cerated in admin. Useful to add a field in this form before the submit button

__category_edit_form__
    Runs when category edit form is created in admin. Useful to add a new field to this form

__clean_post_cache__
    Runs when post cache is cleaned.
    Action function arguments:
        post ID. See clean_post_cache().

__create_category__
    Runs when a new category is created.
    Action function arguments:
        category ID.

__delete_attachment__
    Runs just before an attached file is deleted from the database.
    Action function arguments:
        attachment ID.
    (Prior to version 2.8 this hook was triggered after attachment was deleted.)

__delete_category__
    Runs just after a category is deleted from the database and its corresponding links/posts are updated to remove the category.
    Action function arguments:
        category ID.

__wp_trash_post__
    Runs when a post or page is about to be trashed.
    Action function arguments:
        post or page ID.

__trashed_post__
    Runs just after a post or page is trashed.
    Action function arguments:
        post or page ID.

__untrash_post__
    Runs just before undeletion, when a post or page is restored.
    Action function arguments:
        post or page ID.

__untrashed_post__
    Runs just after undeletion, when a post or page is restored.
    Action function arguments:
        post or page ID.

__before_delete_post__
    Runs when a post or page is about to be deleted.
    Comments, attachments and metadata are still available.
    Action function arguments:
        post or page ID.

__delete_post__
    Runs when a post or page is about to be deleted.
    Comments, attachments and metadata are already deleted.
    Action function arguments:
        post or page ID.

__deleted_post__
    Runs just after a post or page is deleted.
    Action function arguments:
        post or page ID.

__edit_attachment__
    Runs when an attached file is edited/updated to the database.
    Action function arguments:
        attachment ID.

__edit_category__
    Runs when a category is updated/edited,
    including when a post or blogroll link is added/deleted
    or its categories are updated (which causes the count for the category to update).
    Action function arguments:
        category ID.

__edit_post__
    Runs when a post or page is updated/edited,
    including when a comment is added or updated (which causes the comment count for the post to update).
    Action function arguments:
        post or page ID.

__pre_post_update__
    Runs just before a post or page is updated.
    Action function arguments:
        post or page ID.

__post_updated__
    Runs after a post or page is updated.
    Action function arguments:
        post or page ID,
        WP_Post object of the post before the update and after the update.

__transition_post_status__
    Runs when any post status transition occurs.
    Action function arguments:
        $new_status,
        $old_status,
        $post object.
    (See also Post Status Transitions.)

__(old status)_to_(new status)__
    Runs when a post changes status from $old_status to $new_status.
    Action function arguments:
        $post object.
    (See also Post Status Transitions.)

__(status)_(post_type)__
    Runs when a post of type $post_type is transitioned to $status from any other status.
    Action function arguments:
        post ID,
        $post object. (See also Post Status Transitions.)

__publish_post (not deprecated)__
    Runs when a post is published, or if it is edited and its status is changed to "published".
    This action hook conforms to the `(status)_(post_type)` action hook type.
    Action function arguments:
        post ID
        $post object
    See also Post Status Transitions.

__publish_page__
    Runs when a page is published, or if it is edited and its status is changed to "published".
    This action hook conforms to the `(status)_(post_type)` action hook type.
    Action function arguments:
        post ID
        $post object
    See also Post Status Transitions

__publish_phone__
    Runs just after a post is added via email. Action function argument: post ID.

__publish_future_post__
    Runs when a future post or page is published.
    Action function arguments:
        post ID.

__save_post__
    Runs whenever a post or page is created or updated,
    which could be from an import, post/page edit form, xmlrpc, or post by email.
    Action function arguments:
        post ID
        post object
    Runs after the data is saved to the database.
    Note that post ID may reference a post revision and not the last saved post.
    Use `wp_is_post_revision()` to get the ID of the real post.

__updated_postmeta__
    Runs when a metadata has been updated.

__wp_insert_post__
    Same as save_post, runs immediately afterwards.

__xmlrpc_publish_post__
    Runs when a post is published via XMLRPC request,
    or if it is edited via XMLRPC and its status is "published".
    Action function arguments: post ID.

---

## Taxonomy and Terms

__create_term__
    Runs after a new term is created, before the term cache is cleaned.

__created_term__
    Runs after a new term is created, and after the term cache has been cleaned.

__create_$taxonomy__
    Runs after a new term is created for a specific taxonomy.

__created_$taxonomy__
    Runs after a new term in a specific taxonomy is created, and after the term cache has been cleaned.

__add_term_relationship (Since version 2.9.0)__
    Runs before an object-term relationship is added.

__added_term_relationship (Since version 2.9.0)__
    Runs after an object-term relationship is added.

__set_object_terms (Since version 2.8.0)__
    Runs after an object's terms have been set.

__edit_terms (Since version 2.9.0)__
    Runs before the given terms are edited.

__edited_terms__
    Runs after saving taxonomy/category change in the database.

__edit_term_taxonomy__
    Runs before a term-taxonomy relationship is updated.

__edited_term_taxonomy__
    Runs after a term-taxonomy relationship is updated.

__edit_term_taxonomies (Since version 2.9.0)__
    Runs before a term to deletes children are reassigned a parent.

__edited_term_taxonomies (Since version 2.9.0)__
    Runs after a term to deletes children are reassigned a parent.

__edit_$taxonomy__
    Runs after a term is edited for a specific taxonomy.

__edited_$taxonomy__
    Runs after a term in a specific taxonomy is edited, and after the term cache has been cleaned.

__pre_delete_term (Since version 4.1.0)__
    Runs before any modifications are made to posts or terms.

__delete_term_taxonomy (Since version 2.9.0)__
    Runs before a term taxonomy ID is deleted from database (after having change chidrens term).

__deleted_term_taxonomy (Since version 2.9.0)__
    Runs after a term taxonomy ID is deleted.

__delete_term (Since version 2.5.0)__
    Runs after a term is deleted from the database and the cache is cleaned.  
    Parameters:
        $Term_ID,
        $Term_taxonomy_ID,
        $Taxonomy_slug,
        $already_deleted_term

__delete_$taxonomy (Since version 2.3.0)__
    Runs after a term in a specific taxonomy is deleted.
    Parameters:
        $Term_ID,
        $Term_taxonomy_ID,
        $already_deleted_term

__deleted_$taxonomy__
    Runs after a term in a specific taxonomy is deleted, and after the term cache has been cleaned.

__delete_term_relationships (Since version 2.9.0)__
    Runs before an object-term relationship is deleted.

__deleted_term_relationships (Since version 2.9.0)__
    Runs after an object-term relationship is deleted.

__clean_object_term_cache (Since version 2.5.0)__
    Runs after the object term cache has been cleaned.

__clean_term_cache (Since version 2.5.0)__
    Runs after each taxonomy's term cache has been cleaned.

__split_shared_term (Since version 4.2.0)__
    Runs after a previously shared taxonomy term is split into two separate terms.

---

## Comment, Ping, and Trackback Actions

__comment_closed__
    Runs when the post is marked as not allowing comments while trying to display comment entry form.
    Action function argument: post ID.

__comment_id_not_found__
    Runs when the post ID is not found while trying to display comments or comment entry form.
    Action function argument: post ID.

__comment_flood_trigger__
    Runs when a comment flood is detected,
    just before `wp_die` is called to stop the comment from being accepted.
    Action function arguments:
        time of previous comment
        time of current comment

__comment_(old status)_to_(new status)__
    Runs when a comment status transition occurs.
    Action function arguments:
        Comment object

__comment_on_draft__
    Runs when the post is a draft while trying to display a comment entry form or comments.
    Action function argument:
        post ID

__comment_post__
    Runs just after a comment is saved in the database.
    Action function arguments:
        comment ID,
        approval status ("spam", or 0/1 for disapproved/approved).

__edit_comment__
    Runs after a comment is updated/edited in the database.
    Action function arguments:
        comment ID.

__delete_comment__
    Fires immediately before a comment is deleted from the database.
    Action function arguments:
        comment ID.

__deleted_comment__
    Fires immediately after a comment is deleted from the database.
    Action function arguments:
        comment ID.

__trash_comment__
    Fires immediately before a comment is sent to the Trash.
    Action function arguments:
        comment ID.

__trashed_comment__
    Fires immediately after a comment is sent to Trash.
    Action function arguments:
        comment ID.

__untrash_comment__
    Fires immediately before a comment is restored from the Trash.
    Action function arguments:
        comment ID.

__untrashed_comment__
    Fires immediately after a comment is restored from the Trash.
    Action function arguments:
        comment ID.

__spam_comment__
    Fires immediately before a comment is marked as Spam.
    Action function arguments:
        comment ID.

__spammed_comment__
    Fires immediately after a comment is marked as Spam.
    Action function arguments:
        comment ID.

__unspam_comment__
    Fires immediately before a comment is unmarked as Spam.
    Action function arguments:
        comment ID.

__unspammed_comment__
    Fires immediately after a comment is unmarked as Spam.
    Action function arguments:
        comment ID.

__pingback_post__
    Runs when a ping is added to a post. Action function argument: comment ID.

__pre_ping__
    Runs before a ping is fully processed.
    Action function arguments:
        array of the post links to be processed,
        the "pung" setting for the post.

__trackback_post__
    Runs when a trackback is added to a post.
    Action function argument:
        comment ID.

__wp_blacklist_check__
    Runs to check whether a comment should be blacklisted.
    Action function arguments:
        author name,
        author email,
        author URL,
        comment text,
        author IP address,
        author's user agent (browser).
    Your function can execute a `wp_die` to reject the comment,
    or perhaps modify one of the input arguments so that it will contain one of the blacklist keywords set in the WordPress options.

__wp_insert_comment__
    Runs whenever a comment is created.

__wp_set_comment_status__
    Runs when the status of a comment changes.
    Action function arguments:
        comment ID
        status string indicating the new status ("delete", "approve", "spam", "hold")

---

## Blogroll Actions

__add_link__
    Runs when a new blogroll link is first added to the database.
    Action function arguments:it
        link ID.

__delete_link__
    Runs when a blogroll link is deleted.
    Action function arguments:
        link ID.

__edit_link__
    Runs when a blogroll link is edited.
    Action function arguments:
        link ID.

---

## Feed Actions

__atom_entry__
    Runs just after the entry information has been printed (but before closing the entry tag) for each blog entry in an atom feed.

__atom_head__
    Runs just after the blog information has been printed in an atom feed, just before the first entry.

__atom_ns__
    Runs inside the root XML element for an atom feed (to add namespaces).

__commentrss2_item__
    Runs just after a single comment's information has been printed in a comment feed (but before closing the item tag).
    Action function arguments:
        comment ID, post ID.

__do_feed_(feed)__
    Runs when a feed is generated,
    where feed is the type of feed (rss2, atom, rdf, etc.).
    Use priority less than 10 to run before printing the feed.
    Action function argument:
        true if the feed is for comments
        false if it is for posts

__rdf_header__
    Runs just after the blog information has been printed in an RDF feed,
    just before the first entry.

__rdf_item__
    Runs just after the entry information has been printed (but before closing the item tag) for each blog entry in an RDF feed.

__rdf_ns__
    Runs inside the root XML element in an RDF feed (to add namespaces).

__rss_head__
    Runs just after the blog information has been printed in an RSS feed, just before the first entry.

__rss_item__
    Runs just after the entry information has been printed (but before closing the item tag) for each blog entry in an RSS feed.

__rss2_head__
    Runs just after the blog information has been printed in an RSS 2 feed, just before the first entry.

__rss2_item__
    Runs just after the entry information has been printed
    (but before closing the item tag) for each blog entry in an RSS 2 feed.

__rss2_ns__
    Runs inside the root XML element in an RSS 2 feed (to add namespaces).


---

## Template Actions


__after_setup_theme__
    Runs during a themes initialization.
    Is generally used to perform basic `setup`, `registration`, and `init` actions for a theme.

__comment_form__
    Runs at the bottom of a comment form rendered by comment_form(), right before the closing </form>.
    Action function argument:
        the post ID

__comment_form_after__
    Runs after the comment form is rendered by `comment_form()`,
    right after the closing `</div>`.

__do_robots__
    Runs when the template file chooser determines that it is a `robots.txt` request.

__do_robotstxt__
    Runs in the `do_robots()` function before it prints out the Disallow lists for the `robots.txt` file.

__get_footer__
    Runs when the template calls the `get_footer()` function, just before the footer.php template file is loaded.

__get_header__
    Runs when the template calls the `get_header()` function, just before the header.php template file is loaded.

__switch_theme__
    Runs when the blog's theme is changed.
    Action function argument:
        name of the new theme.
    If used in a theme, it only works if the theme that adds action is the one being disabled.

__after_switch_theme__
    Runs when the blog's theme is changed.
    Action function argument:
        name of the new theme.
    If used in a theme, it only works if the theme that adds action is the one being enabled.
    Can be used to run certain code when enabling a theme.

__load-themes.php__
    Runs when the theme is activate or deactivate (replace by an other).

__template_redirect__
    Runs before the determination of the template file to be used to display the requested page.

__wp_footer__
    Runs when the template calls the `wp_footer()` function,
    generally near the bottom of the blog page.

__wp_head__
    Runs when the template calls the `wp_head()` function.
    This hook is generally placed near the top of a page template between <head> and </head>.
    This hook does not take any parameters.

__wp_meta__
    Runs when the sidebar.php template file calls the wp_meta() function,
    to allow the plugin to insert content into the sidebar.

__wp_print_scripts__
    Runs just before WordPress prints registered JavaScript scripts into the page header.


---

## Administrative Actions


__activate_(plugin file name)__
    Runs when the plugin is first activated.
    See `Function_Reference/register_activation_hook`

__activity_box_end__
    Runs at the end of the activity box on the admin Dashboard screen.

__add_category_form_pre__
    Runs before the add category form is put on the screen in the admin menus.

__add_option_(option_name)__
    Runs after a WordPress option has been added by the `add_option()` function.
    Action function arguments:
        option name,
        option value.
    You must add an action for the specific options that you want to respond to,
    such as `add_option_foo` to respond when option `foo` has been added.

__add_option__
    Runs before an option gets added to the database.

__added_option__
    Runs after an an option has been added.

__admin_head__
    Runs in the HTML <head> section of the admin panel.

__admin_head-(page_hook) or admin_head-(plugin_page)__
    Runs in the HTML `<head>` section of a specific admin page
    or the admin panel of a plugin-generated page.

__admin_init__
    Runs at the beginning of every admin page before the page is rendered.
    See `wp-admin/admin.php`, `wp-admin/admin-post.php`, and `wp-admin/admin-ajax.php`.

__admin_footer-(plugin_page)__
    Runs at the end of the <body> section of the admin panel of a plugin-generated page.

__admin_post_(action)__
    also: `admin_post_nopriv_(action)`  
    Runs a handler for an unspecified GET or POST request.

__admin_footer__
    Runs at the end of the admin panel inside the body tag

__admin_enqueue_scripts__
    Runs in the HTML header so a plugin or theme can enqueue JavaScript and CSS to all admin pages.

__admin_print_scripts__
    Runs in the HTML header so a plugin can add JavaScript scripts to all admin pages.

__admin_print_scripts-(page_hook) or admin_print_scripts-(plugin_page)__
    Runs to print JavaScript scripts in the HTML head section of a specific plugin-generated admin page.
    The (page_hook) is returned when using any of the functions
    that add plugin menu items to the admin menu: `add_management_page()`, `add_options_page()`, etc.

    _Example:_
    ```
    function myplugin_menu() {
      if ( function_exists('add_management_page') ) {
        $page = add_management_page( 'myplugin', 'myplugin', 'manage_options', 'myplugin_slug', 'myplugin_admin_page' );
        add_action( "admin_print_scripts-$page", 'myplugin_admin_head' );
      }
    }
    ```

__admin_print_styles__
    Runs in the HTML header so a plugin can add CSS/Stylesheets to all admin pages.

__admin_print_styles-(page_hook)__ or __admin_print_style-(plugin_page)__
    Runs when styles should be enqueued with `wp_enqueue_style()` for a particular admin page.
    Use the return value of a function such as `add_submenu_page()` to determine the value of (page_hook).

__check_passwords__
    Runs to validate the double-entry of password when creating a new user
    Action function arguments:
        array of login name   
        first password   
        second password  

__dbx_page_advanced__
    Runs at the bottom of the "advanced" section on the page editing screen in the admin menus.

__dbx_page_sidebar__
    Runs at the bottom of the sidebar on the page editing screen in the admin menus.

__dbx_post_advanced__
    Runs at the bottom of the "advanced" section on the post editing screen in the admin menus.

__dbx_post_sidebar__
    Runs at the bottom of the sidebar on the post editing screen in the admin menus.
    Use `add_meta_box()` in Wordpress 2.5 and higher.

__deactivate_(plugin file name)__
    Runs when a plugin is deactivated.

__delete_option_(option_name)__
    Runs after a WordPress option has been deleted by the `delete_option()` function.
    Action function arguments:
        option name  
    You must add an action for the specific options that you want to respond to,
    such as `delete_option_foo` to respond when option `foo` has been deleted.

__delete_option__
    Runs before an option gets deleted from the database.

__deleted_option__
    Runs after an an option has been deleted.

__delete_user__
    Runs when a user is deleted.
    Action function arguments:
        user ID

__edit_category_form__
    Runs after the add/edit category form is put on the screen (but before the end of the HTML form tag).

__edit_category_form_pre__
    Runs before the edit category form is put on the screen in the admin menus.

__edit_tag_form__
    Runs after the add/edit tag form is put on the screen (but before the end of the HTML form tag).

__edit_tag_form_pre__
    Runs before the edit tag form is put on the screen in the admin menus.

__edit_form_top__
    Runs inside the form before the title on WordPress post edit screen (and Custom Post Types),
    but after the inital hidden fields (user_ID, action, etc.)

__edit_form_after_title__
    Runs after the title on WordPress post edit screen (and Custom Post Types)
    but before the built in WordPress content area.

__edit_form_after_editor__
    Runs just after the WordPress post editor but before all other meta boxes.
    also available in Custom Post Types.

__edit_form_advanced__
    Runs just before the "advanced" section of the post editing form in the admin menus.

__edit_page_form__
    Runs just before the "advanced" section of the page editing form in the admin menus.

__edit_user_profile__
    Runs near the end of the user profile editing screen in the admin menus.

__load-(page)__
    Runs when an administration menu page is loaded.
    This action is not usually added directly  
    see [Adding Administration Menus}() for more details of how to add admin menus.
    If you do want to use it directly, the return value from `add_options_page()`
    and similar functions gives you the "(page)" part of the action name.

__login_form__
    Runs just before the end of the login form.

__login_head__
    Runs just before the end of the HTML head section of the login page.

__lost_password__
    Runs before the "retrieve your password by email" form is printed on the login screen.

__lostpassword_form__
    Runs at the end of the form used to retrieve a user's password by email,
    to allow a plugin to supply extra fields.

__lostpassword_post__
    runs when the user has requested an email message to retrieve their password  
    to allow a plugin to modify the PHP `$_POST` variable before processing.

__manage_link_custom_column__
    Runs when there is an unknown column name for the blogroll managing admin screen.
    Action function arguments:
        column name,
        link ID
    See also filter `manage_link_columns` in the `Plugin API/Filter Reference` which adds custom columns.

__manage_posts_custom_column__
    Runs when there is an unknown column name for the managing posts admin screen.
    Action function arguments:
        column name
        post ID
    See also filter `manage_posts_columns` in the `Plugin API/Filter Reference`
    which adds custom columns. (see Scompt's tutorial for examples and use.)

__manage_pages_custom_column__
    Runs when there is an unknown column name for the managing pages admin screen.
    Action function arguments:
        column name,
        page ID.
    See also filter manage_pages_columns in the Plugin API/Filter Reference, which adds custom columns.

__manage_media_custom_column__
    Runs when there is an unknown column name for the managing media admin screen.
    Action function arguments:
        column name
        page ID
    See also filter manage_media_columns in the Plugin API/Filter Reference, which adds custom columns.

__manage_{$post_type}_posts_custom_column__
    Runs when there is an unknown column name for the managing custom post type admin screen.
    Action function arguments:
        column name
        post ID
    See also filter manage_${post_type}_posts_columns in the Plugin API/Filter Reference, which adds custom columns for custom post types.

__password_reset__
    Runs before the user's password is reset to a random new password.

__personal_options_update__
    Runs when a user updates personal options from the admin screen.

__plugins_loaded__
    Runs after all plugins have been loaded.

__profile_personal_options__
    Runs at the end of the Personal Options section of the user profile editing screen.

__profile_update__
    Runs when a user's profile is updated.
    Action function argument:
        user ID.

__quick_edit_custom_box__
    Runs when there is an unknown column name when creating the quick editor.

__register_form__
    Runs just before the end of the new user registration form.

__register_post__
    Runs before a new user registration request is processed.

__restrict_manage_posts__
    Runs before the list of posts to edit is put on the screen in the admin menus.

__retrieve_password__
    Runs when a user's password is retrieved, to send them a reminder email.
    Action function argument:
        login name.

__set_current_user__
    Runs after the user has been changed by the default `wp_set_current_user()` function.
    Note that `wp_set_current_user()` is also a "pluggable" function,
    meaning that plugins can override it; see Plugin API).

__show_user_profile__
    Runs near the end of the user profile editing screen.

__sidebar_admin_page__
    Runs after the main content on the widgets admin page.

__sidebar_admin_setup__
    Runs early when editing the widgets displayed in sidebars.

__simple_edit_form__
    Runs at the end of the "simple" post editing form in the admin menus
    (by default the simple form is used only for bookmarklets -- it doesn't have the "advanced" sections).

__update_option_(option_name)__
    Runs after a WordPress option has been updated by the update_option() function.
    Action function arguments:
        old option value
        new option value

__update_option__
    Runs before an option gets updated to the database.

__updated_option__
    Runs after an option has been updated.

__upload_files_(tab)____
    Runs to print a screen on the upload files admin screen;
    "tab" is the name of the custom action tab.
    Define custom tabs using the `wp_upload_tabs` filter

__user_new_form__
    Runs near the end of the "Add New" user screen.
    Action function argument:
        Passes the string "add-existing-user" on multisite
        or "add-new-user" on single site and for network admins.

__user_profile_update_errors__
    Runs just before updated user details are committed to the database.

__wpmu_new_user__
    Runs when a user's profile is first created in a Multisite environment.
    Action function argument:
        user ID.
    If not in Multisite then use `user_register`.

__user_register__
    Runs when a user's profile is first created. Action function argument: user ID.

__welcome_panel__
    Allows you to hide the Welcome Panel in the Dashboard.
    This is also a smart filter, which hides the related `Screen Option`.

__wp_ajax_(action)__
    also: `wp_ajax_nopriv_(action)`
    Runs to do an unknown type of AJAX request handler.

__wp_authenticate__
    Runs to authenticate a user when they log in.
    Action function arguments:
        array with user name and password

__wp_login__
    Runs when a user logs in.

__wp_logout__
    Runs when a user logs out.


---


### Dashboard "Right Now" Widget Actions

__right_now_content_table_end__
    Adds table rows at the bottom the content column of the Right Now Dashboard widget.

__right_now_table_end__
    Called after displaying the number of Spam comments in the Discussion column of the Right Now Dashboard widget.

__right_now_discussion_table_end__
    Called after displaying the number of Spam comments
    and after the `right_now_table_end` action
    in the Discussion column of the Right Now Dashboard widget.

__right_now_end__
    Called after the current version information is displayed on the Right Now Dashboard widget.
    (Note: In v3.4, this is actually `rightnow_end`. See ticket #21046.)

__activity_box_end__
    Last action called on the Right Now Dashboard widget.

---

## Advanced Actions

This section contains actions related to the queries WordPress uses to figure out what posts to display,
the WordPress loop, activating plugins, and other fundamental-level WordPress code.

__activated_plugin__
    Runs any time any plugin is successfully activated

__add_meta_boxes__
    Runs when "edit post" page loads. (3.0+)

__admin_menu__
    Runs after the basic admin panel menu structure is in place.

__network_admin_notices__
    Runs after the admin menu is printed to network admin screens.

__user_admin_notices__
    Runs after the admin menu is printed to user admin screens.

__admin_notices__
    Runs after the admin menu is printed to screens that aren't network- or user-admin screens.

__all_admin_notices__
    Runs after the admin menu is printed to all screens.

__blog_privacy_selector__
    Runs after the default blog privacy options are printed on the screen.

__check_admin_referer__
    Runs in the default `check_admin_referrer()` function after the nonce has been checked for security purposes,
    to allow a plugin to force WordPress to die for extra security reasons.
    Note that `check_admin_referrer` is also a "pluggable" function, meaning that plugins can override it

__check_ajax_referer__
    Runs in the default `check_ajax_referer()` function
    which is called when an AJAX request goes to the `wp-admin/admin-ajax.php` script
    after the user's login and password have been successfully validated from cookies,
    to allow a plugin to force WordPress to die for extra security reasons.
    Note that `check_ajax_referer` is also a "pluggable" function, meaning that plugins can override it

__customize_controls_enqueue_scripts__
    triggered after the WP Theme Customizer after `customize_controls_init` was called,
    its actions/callbacks executed,
    and its own styles and scripts enqueued,
    so you can use this hook to register your own scripts and styles for WP Theme Customizer.
    For use with the `Theme Customization API` (as of Version 3.4).

__customize_register__
    Runs on every request, allowing developers to register new theme options
    and controls for use with the `Theme Customization API` (as of Version 3.4).

__customize_preview_init__
    Allows you to enqueue assets (such as javascript files) directly in the Theme Customizer only.
    For use with the `Theme Customization API` (as of Version 3.4).

__deactivated_plugin__
    Runs any time any plugin is successfully de-activated

__generate_rewrite_rules__
    Runs after the rewrite rules are generated.
    Action function arguments:
        WP_Rewrite object ($wp_rewrite) by reference.
    Note that it is easier to use the `rewrite_rules_array` filter
    instead of this action, to modify the rewrite rules.

__init__
    Runs after WordPress has finished loading but before any headers are sent.
    Useful for intercepting `$_GET` or `$_POST` triggers.

__loop_end__
    Runs after the last post of the WordPress loop is processed.

__loop_start__
    Runs before the first post of the WordPress loop is processed.

__network_admin_menu__
    Runs when the basic menu structure is prepared for the Network administration page.
    (Administration Menus)

__parse_query__
    Runs at the end of query parsing in the main query
    or any instance of WP_Query, such as query_posts, get_posts, or get_children.
    Action function arguments:
        WP_Query object by reference.

__parse_request__
    Runs after the query request is parsed inside the main WordPress function wp.
    Action function argument:
        WP object (`$wp`) by reference

__pre_get_posts__
    Runs before a query is executed in the main query or any instance of WP_Query,
    such as query_posts(), get_posts(), or get_children().
    This hook is called after the query variable object is created,
    but before the query is actually run,
    and can be used to to alter the primary query before it is run.
    Also see `is_main_query()`
    Action function arguments:
        WP_Query object by reference.

__sanitize_comment_cookies__
    Runs after cookies have been read from the HTTP request

__send_headers__
    Runs after the basic HTTP headers are sent inside the main WordPress function wp().
    Action function argument:
        WP object ($wp) by reference

__shutdown__
    Runs when the page output is complete.

__update_(meta_type)_meta__
    Runs when a metadata gets saved.

__updated_(meta_type)_meta__
    Runs when a metadata has been updated.

__upgrader_process_complete__
    Runs when the plugin downloader/upgrader class finishes running

__wp_loaded__
    This hook is fired once WP, all plugins,
    and the theme are fully loaded and instantiated.

__wp__
    Executes after the query has been parsed and post(s) loaded,
    but before any template execution, inside the main WordPress function wp().
    Useful if you need to have access to post data but can't use templates for output.
    Action function argument:
        WP object ($wp) by reference
