<?php
/**
 * kingster_school functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kingster_school
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'kingster_school_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function kingster_school_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on kingster_school, use a find and replace
		 * to change 'kingster_school' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'kingster_school', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
        add_image_size( 'news-thumb', 400, 245, true ); // (cropped)
        add_image_size( 'news-thumb-small', 80, 80, true ); // (cropped)

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'kingster_school' ),
				'menu-2' => esc_html__( 'Secondary', 'kingster_school' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'kingster_school_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

	}
endif;
add_action( 'after_setup_theme', 'kingster_school_setup' );

function add_additional_class_on_a($classes, $Event, $args)
{
	if (isset($args->add_a_class)) {
		$classes['class'] = $args->add_a_class;
	}
	return $classes;
}

add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3);


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kingster_school_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kingster_school_content_width', 640 );
}
add_action( 'after_setup_theme', 'kingster_school_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kingster_school_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'kingster_school' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'kingster_school' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget 1', 'kingster_school' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'kingster_school' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget 2', 'kingster_school' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'kingster_school' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Widget 3', 'kingster_school' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'kingster_school' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Header Widget', 'kingster_school' ),
			'id'            => 'header-1',
			'description'   => esc_html__( 'Add widgets here.', 'kingster_school' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		)
	);
}
add_action( 'widgets_init', 'kingster_school_widgets_init' );
/**
 * Enqueue scripts and styles.
 */
  function kingster_school_scripts()
{
    $uri = get_theme_file_uri();
    wp_register_style('kingster-school-combine',$uri.'/plugins/goodlayers-core/plugins/combine/style.css',array(),null);
    wp_register_style('kingster-school-page-builder',$uri.'/plugins/goodlayers-core/include/css/page-builder.css',array(),null);
    wp_register_style('kingster-school-sett',$uri.'/plugins/revslider/public/assets/css/settings.css',array(),null);
    wp_register_style('kingster-school-style',$uri.'/css/style-core.css',array(),null);
    wp_register_style('kingster-school-customizer',$uri.'/css/kingster-style-custom.css',array(),null);
    wp_enqueue_style('kingster-school-combine');
    wp_enqueue_style('kingster-school-page-builder');
    wp_enqueue_style('kingster-school-sett');
    wp_enqueue_style('kingster-school-style');
    wp_enqueue_style('kingster-school-customizer');
    wp_register_script('kingster-school-jquery',$uri.'/js/jquery/jquery.js',array('jquery'),null,true);
    wp_register_script('kingster-school-jquery-migrate',$uri.'/js/jquery/jquery-migrate.min.js',array('jquery'),null,true);
    wp_register_script('su_custom',$uri.'/js/customizer.js',[],null,true);
	wp_register_script('kingster-school-revolution',$uri.'/plugins/revslider/public/assets/js/jquery.themepunch.revolution.min.js',[],null,true);
	wp_register_script('kingster-school-slideanims',$uri.'/plugins/revslider/public/assets/js/extensions/revolution.extension.slideanims.min.js',[],null,true);
	wp_register_script('kingster-school-layeranimation',$uri.'/plugins/revslider/public/assets/js/extensions/revolution.extension.layeranimation.min.js',[],null,true);
	wp_register_script('kingster-school-kenburn',$uri.'/plugins/revslider/public/assets/js/extensions/revolution.extension.kenburn.min.js',[],null,true);
	wp_register_script('kingster-school-navigation1',$uri.'/plugins/revslider/public/assets/js/extensions/revolution.extension.navigation.min.js',[],null,true);
	wp_register_script('kingster-school-parallax',$uri.'/plugins/revslider/public/assets/js/extensions/revolution.extension.parallax.min.js',[],null,true);
	wp_register_script('kingster-school-actions',$uri.'/plugins/revslider/public/assets/js/extensions/revolution.extension.actions.min.js',[],null,true);
	wp_register_script('kingster-school-video',$uri.'/plugins/revslider/public/assets/js/extensions/revolution.extension.video.min.js',[],null,true);
	wp_register_script('kingster-school-scr',$uri.'/plugins/goodlayers-core/plugins/combine/script.js',[],null,true);
	wp_register_script('kingster-school-build',$uri.'/plugins/goodlayers-core/include/js/page-builder.js',[],null,true);
	wp_register_script('kingster-school-effect',$uri.'/js/jquery/ui/effect.min.js',array('jquery'),null,true);
	wp_register_script('kingster-school-pjs',$uri.'/js/plugins.min.js',[],null,true);
	wp_enqueue_script('kingster-school-jquery');
	wp_enqueue_script('kingster-school-jquery-migrate');
	wp_enqueue_script('kingster-school-revolution');
	wp_enqueue_script('kingster-school-slideanims');
	wp_enqueue_script('kingster-school-layeranimation');
	wp_enqueue_script('kingster-school-kenburn');
	wp_enqueue_script('kingster-school-navigation1');
	wp_enqueue_script('kingster-school-parallax');
	wp_enqueue_script('kingster-school-actions');
	wp_enqueue_script('kingster-school-video');
	wp_enqueue_script('kingster-school-scr');
	wp_enqueue_script('kingster-school-build');
	wp_enqueue_script('kingster-school-effect');
	wp_enqueue_script('kingster-school-pjs');

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'kingster_school_scripts');
function register_events() {
    $labels = array(
        'name'                  => 'Events',
        'singular_name'         => 'Event',
        'menu_name'             => 'Events',
        'name_admin_bar'        => 'Events',
        'archives'              => 'Events Archives',
        'attributes'            => 'Event Attributes',
        'parent_Event_colon'     => 'Parent Event:',
        'all_Events'             => 'All Events',
        'add_new_Event'          => 'Add New Event',
        'add_new'               => 'Add New Event',
        'new_Event'              => 'New Event',
        'edit_Event'             => 'Edit Event',
        'update_Event'           => 'Update Event',
        'view_Event'             => 'View Event',
        'view_Events'            => 'View Events',
        'search_Events'          => 'Search Event',
        'not_found'             => 'Not found',
        'not_found_in_trash'    => 'Not found in Trash',
        'featured_image'        => 'Featured Image',
        'set_featured_image'    => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image'    => 'Use as featured image',
        'insert_into_Event'      => 'Insert into Event',
        'uploaded_to_this_Event' => 'Uploaded to this Event',
        'Events_list'            => 'Events list',
        'Events_list_navigation' => 'Events list navigation',
        'filter_Events_list'     => 'Filter Events list',
    );
    $labels1 = array(
        'name'                  => 'Services',
        'singular_name'         => 'Service',
        'menu_name'             => 'Services',
        'name_admin_bar'        => 'Services',
        'archives'              => 'Services Archives',
        'attributes'            => 'Service Attributes',
        'parent_Event_colon'     => 'Parent Service:',
        'all_Events'             => 'All Services',
        'add_new_Event'          => 'Add New Service',
        'add_new'               => 'Add New Service',
        'new_Event'              => 'New Service',
        'edit_Event'             => 'Edit Service',
        'update_Event'           => 'Update Service',
        'view_Event'             => 'View Service',
        'view_Events'            => 'View Services',
        'search_Events'          => 'Search Service',
        'not_found'             => 'Not found',
        'not_found_in_trash'    => 'Not found in Trash',
        'featured_image'        => 'Featured Image',
        'set_featured_image'    => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image'    => 'Use as featured image',
        'insert_into_Event'      => 'Insert into Service',
        'uploaded_to_this_Event' => 'Uploaded to this Service',
        'Events_list'            => 'Services list',
        'Events_list_navigation' => 'Services list navigation',
        'filter_Events_list'     => 'Filter Services list',
    );
    $labels2 = array(
        'name'                  => 'Features',
        'singular_name'         => 'Feature',
        'menu_name'             => 'Features',
        'name_admin_bar'        => 'Features',
        'archives'              => 'Features Archives',
        'attributes'            => 'Feature Attributes',
        'parent_Event_colon'     => 'Parent Feature :',
        'all_Events'             => 'All Features',
        'add_new_Event'          => 'Add New Feature',
        'add_new'               => 'Add New Feature',
        'new_Event'              => 'New Feature',
        'edit_Event'             => 'Edit Feature',
        'update_Event'           => 'Update Feature',
        'view_Event'             => 'View Feature',
        'view_Events'            => 'View Features',
        'search_Events'          => 'Search Features',
        'not_found'             => 'Not found',
        'not_found_in_trash'    => 'Not found in Trash',
        'featured_image'        => 'Featured Image',
        'set_featured_image'    => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image'    => 'Use as featured image',
        'insert_into_Event'      => 'Insert into Service',
        'uploaded_to_this_Event' => 'Uploaded to this Service',
        'Events_list'            => 'Services list',
        'Events_list_navigation' => 'Services list navigation',
        'filter_Events_list'     => 'Filter Services list',
    );
    $labels3 = array(
        'name'                  => 'Work',
        'singular_name'         => 'Work',
        'menu_name'             => 'Work',
        'name_admin_bar'        => 'Work',
        'archives'              => 'Work Archives',
        'attributes'            => 'Work Attributes',
        'parent_Event_colon'     => 'Parent New :',
        'all_Events'             => 'All Work',
        'add_new_Event'          => 'Add New Work',
        'add_new'               => 'Add New Work',
        'new_Event'              => 'New Work',
        'edit_Event'             => 'Edit Work',
        'update_Event'           => 'Update Work',
        'view_Event'             => 'View Work',
        'view_Events'            => 'View Work',
        'search_Events'          => 'Search Work',
        'not_found'             => 'Not found',
        'not_found_in_trash'    => 'Not found in Trash',
        'featured_image'        => 'Featured Image',
        'set_featured_image'    => 'Set featured image',
        'remove_featured_image' => 'Remove featured image',
        'use_featured_image'    => 'Use as featured image',
        'insert_into_Event'      => 'Insert into Service',
        'uploaded_to_this_Event' => 'Uploaded to this Service',
        'Events_list'            => 'Services list',
        'Events_list_navigation' => 'Services list navigation',
        'filter_Events_list'     => 'Filter Services list',
    );
    $args = array(
        'label'                 => 'Events',
        'description'           => 'Post Type Description',
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies'            => array( 'event_category' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
    $args1 = array(
        'label'                 => 'Services',
        'description'           => 'Post Type Description',
        'labels'                => $labels1,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies'            => array( 'service_category' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
    $args2 = array(
        'label'                 => 'Features',
        'description'           => 'Post Type Description',
        'labels'                => $labels2,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies'            => array( 'feature_category' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
    $args3 = array(
        'label'                 => 'Work',
        'description'           => 'Post Type Description',
        'labels'                => $labels3,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies'            => array( 'work_category' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
    register_post_type( 'kg_events', $args );
    register_post_type( 'kg_services', $args1 );
    register_post_type( 'kg_features', $args2 );
    register_post_type( 'kg_work', $args3 );
    $labels_cat = array(
		'name' => _x('Event Categories', 'taxonomy general name'),
		'singular_name' => _x('Event', 'taxonomy singular name'),
		'search_items' =>  __('Search Categories'),
		'all_items' => __('All Categories'),
		'parent_item' => __('Parent Topic'),
		'parent_item_colon' => __('Parent Category:'),
		'edit_item' => __('Edit Category'),
		'update_item' => __('Update Category'),
		'add_new_item' => __('Add New Category'),
		'new_item_name' => __('New Product Categories Name'),
		'menu_name' => __('Event Categories'),

	);
	register_taxonomy('event_categories', array('kg_events'), array(
		'name' => 'Event Categories',
		'singular_name' => 'Event Category',
		'hierarchical' => true,
		'labels' => $labels_cat,
		'show_ui' => true,
		'view_item' => 'View Category',
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'event_categories'),
	));
    //register taxonomy for custom post tags
    register_taxonomy(
        'custom-tag', //taxonomy
        'my-custom-post', //post-type
        array(
            'hierarchical'  => false,
            'label'         => __( 'My Custom Tags','taxonomy general name'),
            'singular_name' => __( 'Tag', 'taxonomy general name' ),
            'rewrite'       => true,
            'query_var'     => true
        ));
    //register custom posts type
    $snippet_pt_args = array(
        'labels' => array(
            'name' => 'News',
            'singular_name' => 'News',
        ),
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies' => array('custom-tag'),
        'public' => true,
        'menu_icon'   => 'dashicons-groups',
        'show_ui' => true,
        'rewrite' => array('slug'  => 'custom-post-slug',
            'with_front'     =>false,
            'menu_position'     => null),
        'label'     => 'News'
    );

    register_post_type( 'my-custom-post', $snippet_pt_args);

} add_action( 'init', 'register_events', 0 );
function return_day($date){
    // positive limit
   $day =  explode('-',$date,3);
   echo '  <span class="gdlr-core-date">';
   echo $day[2];
   echo '</span>';
}
add_action('wp_return_day', 'return_day');
function return_month($date){
    // positive limit
   $month =  explode('-',$date,3);
   echo '   <span class="gdlr-core-month">';
   if ($month[1] == 7){
       echo "Jul";
   }
   else{
       echo $month[1];
   }
   echo '</span>';
}
add_action('wp_return_month', 'return_month');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



