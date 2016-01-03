<?php 
add_action( 'cmb2_after_form', 'your_prefix_admin_scripts' , 10, 4 );
    function your_prefix_admin_scripts () {        
	     wp_enqueue_script(
	     	'metabox-tab',
	     	get_stylesheet_directory_uri() . '/inc/metabox/tab.js',
	     	array( 'jquery' )
	     	);
	     wp_enqueue_style(
	     	'metabox-tab',
	     	get_stylesheet_directory_uri() . '/inc/metabox/metabox.css'
	     	);
}



add_action( 'cmb2_admin_init', 'fn_page_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_admin_init' or 'cmb2_init' hook.
 */
function fn_page_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_page_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_page = new_cmb2_box( array(
		'id'            => $prefix . 'metabox',
		'title'         => __( 'Page Options', 'cmb2' ),
		'object_types'  => array( 'page', 'post' ), // Post type
		// 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
	) );

	

	$cmb_page->add_field( array(
	           'name' => 'Layout',
	           'id'   => 'layout',
	           'type' => 'title',
	           'before_row' => '<div id="tab-1" class="metabox-tab-container">',
	           'before_field'  => '<button type="button" class="handlediv button-link" aria-expanded="true"><span class="screen-reader-text">Toggle panel: Test Metabox</span><span class="toggle-indicator" aria-hidden="true"></span></button>',
	       ) );

	$cmb_page->add_field( array(
	    'name'             => 'Sidebar Position',
	    'desc'             => 'Select an option',
	    'id'               => $prefix .'sidebar_position',
	    'before_row' => '<div class="metabox-tab-content">', // start tab
	    'type'             => 'select',
	    'default'          => 'right',
	    'options'          => array(
	        'right' => __( 'Right Position', 'cmb2' ),
	        'left'     => __( 'Left Position', 'cmb2' ),
	    ),
	) );

	$cmb_page->add_field( array(
	            'name'    => 'Hide sidebar',
	            'id'      => $prefix .'hide_sidebar',
	            'type'    => 'checkbox', 
	            'after_row' => '</div></div>', //close  tab       
	        ) );

	
	$cmb_page->add_field( array(
	           'name' => 'Header Options',
	           'id'   => 'header-options',
	           'type' => 'title',
	           'before_field'  => '<button type="button" class="handlediv button-link" aria-expanded="true"><span class="screen-reader-text">Toggle panel: Test Metabox</span><span class="toggle-indicator" aria-hidden="true"></span></button>',
	           'before_row' => '<div id="tab-2" class="metabox-tab-container">'
	       ) );
	$cmb_page->add_field( array(
	            'name'    => 'Display Header',
	            'id'      => $prefix . 'display-header',
	            'type'    => 'text',
	           	'before_row' => '<div class="metabox-tab-content">' // tab start
	        ) );
	$cmb_page->add_field( array(
	            'name'    => 'Header width',
	            'id'      => $prefix . 'header-width',
	            'type'    => 'select',
	            'show_option_none' => true,
	            'options'          => array(
	            	'standard' => __( '100% width', 'cmb2' ),
	            	'containerwidth'   => __( 'Container width', 'cmb2' ),
	            ),          
	        ) );

	$cmb_page->add_field( array(
	            'name'    => 'Banner Image',
	            'id'      => $prefix . 'banner-image',
	            'type'    => 'file',           
	        ) );
	$cmb_page->add_field( array(
	            'name'    => 'Banner Title',
	            'id'      => $prefix . 'banner-title',
	            'type'    => 'text',
	        ) );

	$cmb_page->add_field( array(
	            'name'    => 'Banner Captions',
	            'id'      => $prefix . 'banner-captions',
	            'type'    => 'textarea',
	        ) );
	$cmb_page->add_field( array(
	            'name'    => 'Main navigation menu',
	            'id'      => $prefix . 'main-menu',
	            'type'    => 'select',
	            'after_row' => '</div></div>', //close  tab
	            'options' => array (
	            		'defaultmenu' => __('Default Menu', 'cmb2')
	            	),
	        ) );

	$cmb_page->add_field( array(
	           'name' => 'Footer Options',
	           'id'   => 'foter-options',
	           'type' => 'title',
	           'before_field'  => '<button type="button" class="handlediv button-link" aria-expanded="true"><span class="screen-reader-text">Toggle panel: Test Metabox</span><span class="toggle-indicator" aria-hidden="true"></span></button>',
	           'before_row' => '<div id="tab-2" class="metabox-tab-container">'
	       ) );
	$cmb_page->add_field( array(
	            'name'    => 'Footer width',
	            'id'      => $prefix . 'footer-width',
	            'before_row' => '<div class="metabox-tab-content">', // tab start
	            'type'    => 'select',
	            'options'          => array(
	            	'standard' => __( '100% width', 'cmb2' ),
	            	'containerwidth'   => __( 'Container width', 'cmb2' ),
	            ),          
	        ) );
	$cmb_page->add_field( array(
	            'name'    => 'Display widget area',
	            'id'      => $prefix . 'footer-widget-area',
	            'type'    => 'checkbox',
	        ) );
	$cmb_page->add_field( array(
	            'name'    => 'Display copyright bar',
	            'id'      => $prefix . 'copyright-bar',
	            'type'    => 'checkbox',
	            'after_row' => '</div></div>', //close  tab
	        ) );

}
