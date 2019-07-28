```
// Set content width value based on the theme's design
if ( ! isset( $content_width ) )
	$content_width = 1200;

if ( ! function_exists('custom_theme_features') ) {

// Register Theme Features
function custom_theme_features()  {

	// Add theme support for Automatic Feed Links
	add_theme_support( 'automatic-feed-links' );

	// Add theme support for Post Formats
	add_theme_support( 'post-formats', array( 'status', 'quote', 'gallery', 'image', 'video', 'audio', 'link', 'aside', 'chat' ) );

	// Add theme support for Featured Images
	add_theme_support( 'post-thumbnails', array( 'developer_projects' ) );

	 // Set custom thumbnail dimensions
	set_post_thumbnail_size( 200, 200, true );

	// Add theme support for Custom Background
	$background_args = array(
		'default-color'          => 'fff',
		'default-image'          => '/image.jpg',
		'default-repeat'         => 'no-repeat',
		'default-position-x'     => '0',
		'wp-head-callback'       => 'head_callback',
		'admin-head-callback'    => 'admin_head_callback',
		'admin-preview-callback' => 'admin_preview_callback',
	);
	add_theme_support( 'custom-background', $background_args );

	// Add theme support for Custom Header
	$header_args = array(
		'default-image'          => '',
		'width'                  => 1600,
		'height'                 => 900,
		'flex-width'             => true,
		'flex-height'            => true,
		'uploads'                => true,
		'random-default'         => false,
		'header-text'            => true,
		'default-text-color'     => 'black',
		'wp-head-callback'       => 'Head_Callback',
		'admin-head-callback'    => 'Admin_Head_Callback',
		'admin-preview-callback' => 'Admin_Preview_Callback',
		'video'                  => true,
		'video-active-callback'  => 'Video_Callback',
	);
	add_theme_support( 'custom-header', $header_args );

	// Add theme support for HTML5 Semantic Markup
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

	// Add theme support for document Title tag
	add_theme_support( 'title-tag' );

	// Add theme support for custom CSS in the TinyMCE visual editor
	add_editor_style();

	// Add theme support for Translation
	load_theme_textdomain( 'text_domain', get_template_directory() . '/language' );
}
add_action( 'after_setup_theme', 'custom_theme_features' );

}
```
