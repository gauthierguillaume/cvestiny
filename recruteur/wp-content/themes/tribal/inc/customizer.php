<?php
/**
 * tribal Theme Customizer
 *
 * @package tribal
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function tribal_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	
	
	//Logo Settings
	$wp_customize->add_section( 'title_tagline' , array(
	    'title'      => __( 'Title, Tagline & Logo', 'tribal' ),
	    'priority'   => 30,
	) );
	
	$wp_customize->add_setting( 'tribal_logo' , array(
	    'default'     => '',
	    'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control(
	    new WP_Customize_Image_Control(
	        $wp_customize,
	        'tribal_logo',
	        array(
	            'label' => __('Upload Logo','tribal'),
	            'section' => 'title_tagline',
	            'settings' => 'tribal_logo',
	            'priority' => 5,
	        )
		)
	);
		
	function tribal_logo_enabled($control) {
		$option = $control->manager->get_setting('tribal_logo');
		return $option->value() == true;
	}
	
	
	
	//Replace Header Text Color with, separate colors for Title and Description
	//Override tribal_site_titlecolor
	$wp_customize->remove_control('display_header_text');
	$wp_customize->remove_setting('header_textcolor');
	$wp_customize->add_setting('tribal_site_titlecolor', array(
	    'default'     => '#FFFFFF',
	    'sanitize_callback' => 'sanitize_hex_color',
	));
	
	$wp_customize->add_control(new WP_Customize_Color_Control( 
		$wp_customize, 
		'tribal_site_titlecolor', array(
			'label' => __('Site Title Color','tribal'),
			'section' => 'colors',
			'settings' => 'tribal_site_titlecolor',
			'type' => 'color'
		) ) 
	);
	
	//Settings For Logo Area
	
	$wp_customize->add_setting(
		'tribal_hide_title_tagline',
		array( 'sanitize_callback' => 'tribal_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'tribal_hide_title_tagline', array(
		    'settings' => 'tribal_hide_title_tagline',
		    'label'    => __( 'Hide Title and Tagline.', 'tribal' ),
		    'section'  => 'title_tagline',
		    'type'     => 'checkbox',
		)
	);
	
	function tribal_title_visible( $control ) {
		$option = $control->manager->get_setting('tribal_hide_title_tagline');
	    return $option->value() == false ;
	}
	
		
	// Layout and Design
	$wp_customize->add_panel( 'tribal_design_panel', array(
	    'priority'       => 40,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '',
	    'title'          => __('Design & Layout','tribal'),
	) );
	
		
	$wp_customize->add_section(
	    'tribal_design_options',
	    array(
	        'title'     => __('Blog Layout','tribal'),
	        'priority'  => 0,
	        'panel'     => 'tribal_design_panel'
	    )
	);
	
	
	$wp_customize->add_setting(
		'tribal_blog_layout',
		array( 'sanitize_callback' => 'tribal_sanitize_blog_layout' )
	);
	
	function tribal_sanitize_blog_layout( $input ) {
		if ( in_array($input, array('tribal','tribal_3_col','tribal_4_col','tribal_basichover') ) )
			return $input;
		else 
			return '';	
	}
	
	$wp_customize->add_control(
		'tribal_blog_layout',array(
				'label' => __('Select Layout','tribal'),
				'settings' => 'tribal_blog_layout',
				'section'  => 'tribal_design_options',
				'type' => 'select',
				'choices' => array(
						'tribal' => __('Default Layout','tribal'),
						'tribal_basichover' => __('Default Layout with Basic Hover Effect','tribal'),
						'tribal_4_col' => __('4 Column','tribal'),
						'tribal_3_col' => __('3 Column (with Basic Hover Effect)','tribal'),

					)
			)
	);
	
	$wp_customize->add_section(
	    'tribal_sidebar_options',
	    array(
	        'title'     => __('Sidebar Layout','tribal'),
	        'priority'  => 0,
	        'panel'     => 'tribal_design_panel'
	    )
	);
	
	$wp_customize->add_setting(
		'tribal_disable_sidebar',
		array( 'sanitize_callback' => 'tribal_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'tribal_disable_sidebar', array(
		    'settings' => 'tribal_disable_sidebar',
		    'label'    => __( 'Disable Sidebar Everywhere.','tribal' ),
		    'section'  => 'tribal_sidebar_options',
		    'type'     => 'checkbox',
		    'default'  => false
		)
	);
	
	$wp_customize->add_setting(
		'tribal_disable_sidebar_home',
		array( 'sanitize_callback' => 'tribal_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'tribal_disable_sidebar_home', array(
		    'settings' => 'tribal_disable_sidebar_home',
		    'label'    => __( 'Disable Sidebar on Blog & Archives.','tribal' ),
		    'section'  => 'tribal_sidebar_options',
		    'type'     => 'checkbox',
		    'active_callback' => 'tribal_show_sidebar_options',
		    'default'  => false
		)
	);
	
	$wp_customize->add_setting(
		'tribal_disable_sidebar_front',
		array( 'sanitize_callback' => 'tribal_sanitize_checkbox' )
	);
	
	$wp_customize->add_control(
			'tribal_disable_sidebar_front', array(
		    'settings' => 'tribal_disable_sidebar_front',
		    'label'    => __( 'Disable Sidebar on Front Page.','tribal' ),
		    'section'  => 'tribal_sidebar_options',
		    'type'     => 'checkbox',
		    'active_callback' => 'tribal_show_sidebar_options',
		    'default'  => false
		)
	);
	
	
	$wp_customize->add_setting(
		'tribal_sidebar_width',
		array(
			'default' => 3,
		    'sanitize_callback' => 'tribal_sanitize_positive_number' )
	);
	
	$wp_customize->add_control(
			'tribal_sidebar_width', array(
		    'settings' => 'tribal_sidebar_width',
		    'label'    => __( 'Sidebar Width','tribal' ),
		    'description' => __('Min: 25%, Default: 33%, Max: 40%','tribal'),
		    'section'  => 'tribal_sidebar_options',
		    'type'     => 'range',
		    'active_callback' => 'tribal_show_sidebar_options',
		    'input_attrs' => array(
		        'min'   => 3,
		        'max'   => 5,
		        'step'  => 1,
		        'class' => 'sidebar-width-range',
		        'style' => 'color: #0a0',
		    ),
		)
	);
	
	/* Active Callback Function */
	function tribal_show_sidebar_options($control) {
	   
	    $option = $control->manager->get_setting('tribal_disable_sidebar');
	    return $option->value() == false ;
	    
	}
	
	class Tribal_Custom_CSS_Control extends WP_Customize_Control {
	    public $type = 'textarea';
	 
	    public function render_content() {
	        ?>
	            <label>
	                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	                <textarea rows="8" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
	            </label>
	        <?php
	    }
	}
	
	$wp_customize-> add_section(
    'tribal_custom_codes',
    array(
    	'title'			=> __('Custom CSS','tribal'),
    	'description'	=> __('Enter your Custom CSS to Modify design.','tribal'),
    	'priority'		=> 11,
    	'panel'			=> 'tribal_design_panel'
    	)
    );
    
	$wp_customize->add_setting(
	'tribal_custom_css',
	array(
		'default'		=> '',
		'capability'           => 'edit_theme_options',
		'sanitize_callback'    => 'wp_filter_nohtml_kses',
		'sanitize_js_callback' => 'wp_filter_nohtml_kses'
		)
	);
	
	$wp_customize->add_control(
	    new Tribal_Custom_CSS_Control(
	        $wp_customize,
	        'tribal_custom_css',
	        array(
	            'section' => 'tribal_custom_codes',
	            

	        )
	    )
	);
	
	function tribal_sanitize_text( $input ) {
	    return wp_kses_post( force_balance_tags( $input ) );
	}
	
	$wp_customize-> add_section(
    'tribal_custom_footer',
    array(
    	'title'			=> __('Custom Footer Text','tribal'),
    	'description'	=> __('Enter your Own Copyright Text.','tribal'),
    	'priority'		=> 11,
    	'panel'			=> 'tribal_design_panel'
    	)
    );
    
	$wp_customize->add_setting(
	'tribal_footer_text',
	array(
		'default'		=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		)
	);
	
	$wp_customize->add_control(	 
	       'tribal_footer_text',
	        array(
	            'section' => 'tribal_custom_footer',
	            'settings' => 'tribal_footer_text',
	            'type' => 'text'
	        )
	);	
	
	$wp_customize->add_section(
	    'tribal_typo_options',
	    array(
	        'title'     => __('Google Web Fonts','tribal'),
	        'priority'  => 41,
	        'description' => __('Defaults: Pacifico, Montserrat.','tribal')
	    )
	);
	
	$font_array = array('Pacifico','Montserrat','Open Sans','Bitter','Raleway','Khula','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','Ubuntu','Lobster','Arimo','Bitter','Noto Sans');
	$fonts = array_combine($font_array, $font_array);
	
	$wp_customize->add_setting(
		'tribal_title_font',
		array(
			'default'=> 'Pacifico',
			'sanitize_callback' => 'tribal_sanitize_gfont' 
			)
	);
	
	function tribal_sanitize_gfont( $input ) {
		if ( in_array($input, array('Pacifico','Montserrat','Open Sans','Bitter','Raleway','Khula','Droid Sans','Droid Serif','Roboto','Roboto Condensed','Lato','Bree Serif','Oswald','Slabo','Lora','Source Sans Pro','PT Sans','Ubuntu','Lobster','Arimo','Bitter','Noto Sans') ) )
			return $input;
		else
			return '';	
	}
	
	$wp_customize->add_control(
		'tribal_title_font',array(
				'label' => __('Title','tribal'),
				'settings' => 'tribal_title_font',
				'section'  => 'tribal_typo_options',
				'type' => 'select',
				'choices' => $fonts,
			)
	);
	
	$wp_customize->add_setting(
		'tribal_body_font',
			array(	'default'=> 'Montserrat',
					'sanitize_callback' => 'tribal_sanitize_gfont' )
	);
	
	$wp_customize->add_control(
		'tribal_body_font',array(
				'label' => __('Body','tribal'),
				'settings' => 'tribal_body_font',
				'section'  => 'tribal_typo_options',
				'type' => 'select',
				'choices' => $fonts
			)
	);
	
	// Social Icons
	$wp_customize->add_section('tribal_social_section', array(
			'title' => __('Social Icons','tribal'),
			'priority' => 44 ,
	));
	
	$social_networks = array( //Redefinied in Sanitization Function.
					'none' => __('-','tribal'),
					'facebook' => __('Facebook','tribal'),
					'twitter' => __('Twitter','tribal'),
					'google-plus' => __('Google Plus','tribal'),
					'instagram' => __('Instagram','tribal'),
					'rss' => __('RSS Feeds','tribal'),
					'vimeo-square' => __('Vimeo','tribal'),
					'youtube' => __('Youtube','tribal'),
				);
				
	$social_count = count($social_networks);
				
	for ($x = 1 ; $x <= ($social_count - 3) ; $x++) :
			
		$wp_customize->add_setting(
			'tribal_social_'.$x, array(
				'sanitize_callback' => 'tribal_sanitize_social',
				'default' => 'none'
			));

		$wp_customize->add_control( 'tribal_social_'.$x, array(
					'settings' => 'tribal_social_'.$x,
					'label' => __('Icon ','tribal').$x,
					'section' => 'tribal_social_section',
					'type' => 'select',
					'choices' => $social_networks,			
		));
		
		$wp_customize->add_setting(
			'tribal_social_url'.$x, array(
				'sanitize_callback' => 'esc_url_raw'
			));

		$wp_customize->add_control( 'tribal_social_url'.$x, array(
					'settings' => 'tribal_social_url'.$x,
					'description' => __('Icon ','tribal').$x.__(' Url','tribal'),
					'section' => 'tribal_social_section',
					'type' => 'url',
					'choices' => $social_networks,			
		));
		
	endfor;
	
	function tribal_sanitize_social( $input ) {
		$social_networks = array(
					'none' ,
					'facebook',
					'twitter',
					'google-plus',
					'instagram',
					'rss',
					'vimeo-square',
					'youtube',
				);
		if ( in_array($input, $social_networks) )
			return $input;
		else
			return '';	
	}
	
	
	/* Sanitization Functions Common to Multiple Settings go Here, Specific Sanitization Functions are defined along with add_setting() */
	function tribal_sanitize_checkbox( $input ) {
	    if ( $input == 1 ) {
	        return 1;
	    } else {
	        return '';
	    }
	}
	
	function tribal_sanitize_positive_number( $input ) {
		if ( ($input >= 0) && is_numeric($input) )
			return $input;
		else
			return '';	
	}
	
	function tribal_sanitize_category( $input ) {
		if ( term_exists(get_cat_name( $input ), 'category') )
			return $input;
		else 
			return '';	
	}
	
	
}
add_action( 'customize_register', 'tribal_customize_register' );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function tribal_customize_preview_js() {
	wp_enqueue_script( 'tribal_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'tribal_customize_preview_js' );
