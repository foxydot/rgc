<?php
/** Start the engine */
include_once( get_template_directory() . '/lib/init.php' );

/** Create additional color style options */
add_theme_support( 'genesis-style-selector', array( 'associate-white' => 'White', 'associate-gray' => 'Gray', 'associate-green' => 'Green', 'associate-red' => 'Red' ) );

/** Child theme (do not remove) */
define( 'CHILD_THEME_NAME', 'Associate Theme' );
define( 'CHILD_THEME_URL', 'http://my.studiopress.com/themes/associate' );

$content_width = apply_filters( 'content_width', 580, 0, 910 );

/** Unregister 3-column site layouts */
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );
genesis_unregister_layout( 'sidebar-content-sidebar' );

/** Add new featured image sizes */
add_image_size( 'home-bottom', 150, 130, TRUE );
add_image_size( 'home-middle', 287, 120, TRUE );

/** Add suport for custom background */
add_theme_support( 'custom-background' );

/** Add support for custom header */
add_theme_support( 'genesis-custom-header', array( 
	'width'	=> 960, 
	'height'	=> 120 
) );

/** Add support for structural wraps */
add_theme_support( 'genesis-structural-wraps', array( 'header', 'nav', 'subnav', 'inner', 'footer-widgets', 'footer' ) );

/** Add support for 3-column footer widgets */
add_theme_support( 'genesis-footer-widgets', 3 );

/** Register widget areas */
genesis_register_sidebar( array(
	'id'			=> 'featured',
	'name'			=> __( 'Featured', 'associate' ),
	'description'	=> __( 'This is the featured section.', 'associate' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-middle-1',
	'name'			=> __( 'Home Middle #1', 'associate' ),
	'description'	=> __( 'This is the first column of the home middle section.', 'associate' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-middle-2',
	'name'			=> __( 'Home Middle #2', 'associate' ),
	'description'	=> __( 'This is the second column of the home middle section.', 'associate' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-middle-3',
	'name'			=> __( 'Home Middle #3', 'associate' ),
	'description'	=> __( 'This is the third column of the home middle section.', 'associate' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-bottom-1',
	'name'			=> __( 'Home Bottom #1', 'associate' ),
	'description'	=> __( 'This is the first column of the home bottom section.', 'associate' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-bottom-2',
	'name'			=> __( 'Home Bottom #2', 'associate' ),
	'description'	=> __( 'This is the second column of the home bottom section.', 'associate' ),
) );

/*
 * Add some header tools
 */
add_action('genesis_header_right','msdlab_add_header_tools');
function msdlab_add_header_tools(){
    print '<div class="header_tools"><!-- .header_social_block -->
            <div class="header_social_block header_tool_block head_hided">
                <a class="header_social_toggler header_tool_toggler" href="javascript:void(0)"></a>
                <div class="header_social_content">
                        ';
                        do_shortcode('[msd-social]');
    print '            </div>
            </div><!-- .header_social_block -->
                <div class="header_search_block header_tool_block">
                    <a class="header_search_toggler header_tool_toggler" href="javascript:void(0)"></a>
                    <div class="header_search_content">
                        '.genesis_search_form().'
                    </div>
            </div>
            </div>';
}


/*
 * Add styles and scripts
*/
//add_action('wp_enqueue_scripts', 'msdlab_add_styles');
add_action('wp_enqueue_scripts', 'msdlab_add_scripts');

function msdlab_add_styles() {
    global $is_IE;
    if(!is_admin()){
        //use cdn        
            wp_enqueue_style('bootstrap-style','//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.no-icons.min.css');
            wp_enqueue_style('font-awesome-style','//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css',array('bootstrap-style'));
        //use local
            //wp_enqueue_style('bootstrap-style',get_stylesheet_directory_uri().'/lib/bootstrap/css/bootstrap.css');
            //wp_enqueue_style('font-awesome-style',get_stylesheet_directory_uri().'/lib/font-awesome/css/font-awesome.css',array('bootstrap-style'));
        wp_enqueue_style('msd-style',get_stylesheet_directory_uri().'/lib/css/style.css',array('bootstrap-style','font-awesome-style'));
        if($is_IE){
            wp_enqueue_script('ie-style',get_stylesheet_directory_uri().'/lib/css/ie.css');
        }
        if(is_front_page()){
            wp_enqueue_style('msd-homepage-style',get_stylesheet_directory_uri().'/lib/css/homepage.css',array('bootstrap-style','font-awesome-style'));
        }
    }
}

function msdlab_add_scripts() {
    global $is_IE;
    if(!is_admin()){
        //use cdn
            //wp_enqueue_script('bootstrap-jquery','//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js',array('jquery'));
        //use local
            //wp_enqueue_script('bootstrap-jquery',get_stylesheet_directory_uri().'/lib/bootstrap/js/bootstrap.min.js',array('jquery'));
        wp_enqueue_script('msd-jquery',get_stylesheet_directory_uri().'/js/theme-jquery.js',array('jquery'));
        //wp_enqueue_script('equalHeights',get_stylesheet_directory_uri().'/lib/js/jquery.equal-height-columns.js',array('jquery'));
        if($is_IE){
           // wp_enqueue_script('columnizr',get_stylesheet_directory_uri().'/lib/js/jquery.columnizer.js',array('jquery'));
            //wp_enqueue_script('ie-fixes',get_stylesheet_directory_uri().'/lib/js/ie-jquery.js',array('jquery'));
        }
        if(is_front_page()){
            //wp_enqueue_script('msd-homepage-jquery',get_stylesheet_directory_uri().'/lib/js/homepage-jquery.js',array('jquery','bootstrap-jquery'));
        }
    }
    }

/*
* A useful troubleshooting function. Displays arrays in an easy to follow format in a textarea.
*/
if(!function_exists('ts_data')){
    function ts_data($data){
        $ret = '<textarea class="troubleshoot" rows="20" cols="100">';
        $ret .= print_r($data,true);
        $ret .= '</textarea>';
        print $ret;
    }
}
/*
* A useful troubleshooting function. Dumps variable info in an easy to follow format in a textarea.
*/
if(!function_exists('ts_var')){
    function ts_var($var){
        ts_data(var_export( $var , true ));
    }
}