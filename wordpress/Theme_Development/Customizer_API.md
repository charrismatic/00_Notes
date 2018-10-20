

https://developer.wordpress.org/themes/customize-api/the-customizer-javascript-api/

# The Customizer JavaScript API | Theme Developer Handbook | WordPress Developer Resources

---------------------------
Browse: [Home](https://developer.wordpress.org "WordPress Developer Resources") / [Theme Handbook](https://developer.wordpress.org/themes/) / [Theme Options – The Customize API](https://developer.wordpress.org/themes/customize-api/ "Theme Options – The Customize API") / The Customizer JavaScript API

# The Customizer JavaScript API

.toc-jump { text-align: right; font-size: 12px; } .page .toc-heading { margin-top: -50px; padding-top: 50px !important; }

## Topics

-   [Preview JS and Controls JS](#preview-js-and-controls-js)
-   [Models for Controls, Sections, and Panels](#models-for%c2%a0controls-sections-and-panels)
-   [Relating Controls, Sections, and Panels together](#relating-controls-sections-and-panels-together)
-   [Contextual Panels, Sections, and Controls](#contextual-panels-sections-and-controls)
-   [Focusing UI Objects](#focusing-ui-objects)
-   [Priorities](#priorities)
-   [Custom Controls, Panels, and Sections](#custom%c2%a0controls-panels-and-sections)

In WordPress 4.1, newly-expanded JavaScript APIs were introduced for all customizer objects. The entire JavaScript API is currently located in a single file, [wp-admin/js/customize-controls.js](https://core.trac.wordpress.org/browser/trunk/src/wp-admin/js/customize-controls.js), which contains models for all objects, core custom controls, and more.

## Preview JS and Controls JS [#Preview JS and Controls JS](#preview-js-and-controls-js)

The customizer app is currently split into two distinct areas: the customizer controls “pane” and the customize preview. The preview is currently in an iframe, meaning that all JS runs either in the controls pane or in the preview. The postMessage API is used to communicate between the preview and the controls.

Most themes only implement JavaScript in the customize preview, and use it to implement instant previewing of settings via postMessage. However, JS on the controls side can be used for many things, such as dynamically showing and hiding controls based on the values of other settings, changing the previewed URL, focusing parts of the preview, and more. Here’s an example from core of controls-side JS that interacts with the preview, in this case changing the previewed URL when the page for posts changes:

| 
1

2

3

4

5

6

7

8

9

 | 

`// Change the previewed URL to the selected page when changing the page_for_posts.`

`wp.customize(` `'page_for_posts'``,` `function``( setting ) {`

`setting.bind(` `function``( pageId ) {`

`pageId = parseInt( pageId, 10 );`

`if` `( pageId > 0 ) {`

`api.previewer.previewUrl.set( api.settings.url.home +` `'?page_id='` `+ pageId );`

`}`

`});`

`});`



 |

Similar logic can be used to `activate` UI objects based on the value of a setting. The Twenty Seventeen theme includes some useful examples for leveraging the customize JS API for improved user experience. Note that there is one JS file for the controls pane, named `customize-controls.js` and one file for the customize preview, named customize-preview.js. For clarity, all themes and plugins are recommended to follow this naming convention, even if customize JS is only provided in the controls or preview but not both.

The rest of this page is dedicated primarily to the controls-side JS API that was built-out in WordPress 4.1.

[Top ↑](#top)

## Models for Controls, Sections, and Panels [#Models for Controls, Sections, and Panels](#models-for%c2%a0controls-sections-and-panels)

As in PHP, each Customizer object type has a corresponding object in JavaScript. There are `wp.customize.Control,` `wp.customize.Panel,` and `wp.customize.Section `models, as well as `wp.customize.panel,` `wp.customize.section, and ``wp.customize.control` collections (yes, they are singular) that store all control instances. You can iterate over panels, sections, and controls via:

| 
1

2

3

 | 

`wp.customize.panel.each(` `function` `( panel ) {` `/* ... */` `} );`

`wp.customize.section.each(` `function` `( section ) {` `/* ... */` `} );`

`wp.customize.control.each(` `function` `( control ) {` `/* ... */` `} );`



 |

[Top ↑](#top)

## Relating Controls, Sections, and Panels together [#Relating Controls, Sections, and Panels together](#relating-controls-sections-and-panels-together)

When registering a new control in PHP, you pass in the parent section ID:

| 
1

2

3

4

 | 

`$wp_customize``->add_control(` `'blogname'``,` `array``(`

`'label'` `=> __(` `'Site Title'` `),`

`'section'` `=>` `'title_tagline'``,`

`) );`



 |

In the JavaScript API, a control’s section can be obtained predictably:

| 
1

 | 

`id = wp.customize.control(` `'blogname'` `).section();` `// returns title_tagline by default`



 |

To get the section object from the ID, look up the section by the ID as normal: `wp.customize.section( id )`.

You can move a control to another section using this `section` state as well, here moving it to the Navigation section:

| 
1

 | 

`wp.customize.control(` `'blogname'` `).section(` `'nav'` `);`



 |

Likewise, you can get a section’s panel ID in the same way:

| 
1

 | 

`id = wp.customize.section(` `'sidebar-widgets-sidebar-1'` `).panel();` `// returns widgets by default`



 |

You can go the other way as well, to get the children of panels and sections:

| 
1

2

 | 

`sections = wp.customize.panel(` `'widgets'` `).sections();`

`controls = wp.customize.section(` `'title_tagline'` `).controls();`



 |

You can use these to move all controls from one section to another:

| 
1

2

3

 | 

`_.each( wp.customize.section(` `'title_tagline'` `).controls(),` `function` `( control ) {`

`control.section(` `'nav'` `);`

`});`



 |

[Top ↑](#top)

## Contextual Panels, Sections, and Controls [#Contextual Panels, Sections, and Controls](#contextual-panels-sections-and-controls)

`Control,` `Panel,` and `Section` instances have an `active` state (a `wp.customize.Value` instance). When the `active` state changes, the panel, section, and control instances invoke their respective `onChangeActive` method, which by default slides the container element up and down, if `false` and `true` respectively. There are also `activate()` and `deactivate()` methods now for manipulating this `active` state, for panels, sections, and controls. The primary purpose of these states is to show or hide the object without removing it entirely from the Customizer.

| 
1

2

3

4

5

6

 | 

`wp.customize.section(` `'nav'` `).deactivate();` `// slide up`

`wp.customize.section(` `'nav'` `).activate({ duration: 1000 });` `// slide down slowly`

`wp.customize.section(` `'colors'` `).deactivate({ duration: 0 });` `// hide immediately`

`wp.customize.section(` `'nav'` `).deactivate({ completeCallback:` `function` `() {`

`wp.customize.section(` `'colors'` `).activate();` `// show after nav hides completely`

`} });`



 |

Note that manually changing the `active` state would only stick until the preview refreshes or loads another URL. The `activate()`/`deactivate()` methods are designed to follow the pattern of the new `expanded` state.

[Top ↑](#top)

## Focusing UI Objects [#Focusing UI Objects](#focusing-ui-objects)

Building upon the `expand()`/`collapse()` methods for panels, sections, and controls, these models also support a `focus()` method which not only expands all of the necessary elements, but also scrolls the target container into view and puts the browser focus on the first focusable element in the container. For instance, to expand the “Static Front Page” section and focus on select dropdown for the “Front page”:

| 
1

 | 

`wp.customize.control(` `'page_on_front'` `).focus()`



 |

The focus functionality is used to implement [autofocus](https://core.trac.wordpress.org/ticket/28650 "#28650: Allow Customizer elements (controls, sections, and panels) to be deep-linked"): deep-linking to panels, sections, and controls inside of the customizer. Consider these URLs:

-   …/wp-admin/customize.php?autofocus\[panel\]=widgets
-   …/wp-admin/customize.php?autofocus\[section\]=colors
-   …/wp-admin/customize.php?autofocus\[control\]=blogname

This is used in WordPress core to [add a link](https://core.trac.wordpress.org/ticket/28032 "#28032: Headers, Backgrounds, and Widgets in the Customizer are not discoverable from their separate admin screens.") on the widgets admin page to link directly to the widgets panel within the customizer, as well as to connect visible edit shortcuts in the customize preview with the associated controls in the customize pane.

[Top ↑](#top)

## Priorities [#Priorities](#priorities)

When registering a panel, section, or control in PHP, you can supply a `priority` parameter. This value is stored in a `wp.customize.Value` instance for each respective `Panel`, `Section`, and `Control` instance. For example, you can obtain the priority for the widgets panel via:

| 
1

 | 

`priority = wp.customize.panel(` `'widgets'` `).priority();` `// returns 110 by default`



 |

You can then dynamically change the priority and the Customizer UI will automatically re-arrange to reflect the new priorities:

| 
1

 | 

`wp.customize.panel(` `'widgets'` `).priority( 1 );` `// move Widgets to the top`



 |

[Top ↑](#top)

## Custom Controls, Panels, and Sections [#Custom Controls, Panels, and Sections](#custom%c2%a0controls-panels-and-sections)

When working with custom Customizer objects in JS, it is usually easiest to examine the custom objects in WordPress core to understand the code structure. See [wp-admin/js/customize-controls.js](https://core.trac.wordpress.org/browser/trunk/src/wp-admin/js/customize-controls.js), particularly the wp.customize.Panel|Section|Control models. Note several examples in the core code, particularly in the media controls, which build on each others’ functionality though object hierarchy.

# Handbook navigation

[← Tools for Improved User Experience](https://developer.wordpress.org/themes/customize-api/tools-for-improved-user-experience/)[JavaScript/Underscore.js-Rendered Custom Controls →](https://developer.wordpress.org/themes/customize-api/javascriptunderscore-js-rendered-custom-controls/)