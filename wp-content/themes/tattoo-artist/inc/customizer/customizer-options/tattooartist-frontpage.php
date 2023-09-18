<?php
function tattooartist_blog_setting( $wp_customize ) {
$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	$wp_customize->add_panel(
		'tattooartist_frontpage_sections', array(
			'priority' => 32,
			'title' => esc_html__( 'Frontpage Sections', 'tattoo-artist' ),
		)
	);
	


	/*=========================================
	Slider Section
	=========================================*/
	$wp_customize->add_section(
		'slider_setting', array(
			'title' => esc_html__( 'Slider Section', 'tattoo-artist' ),
			'description'=> __('<a>Note :</a> Image Size Should Be 1500*800','tattoo-artist'),
			'priority' => 1,
			'panel' => 'tattooartist_frontpage_sections',
		)
	);



	$wp_customize->add_setting('tattooartist_slider_tabs', array(
	   'sanitize_callback' => 'wp_kses_post',
	));

	$wp_customize->add_control(new tattooartist_Tab_Control($wp_customize, 'tattooartist_slider_tabs', array(
	   'section' => 'slider_setting',
	   'priority' => 2,
	   'buttons' => array(
	      array(
         	'name' => esc_html__('General', 'tattoo-artist'),
            'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
            	'slider1',
            	'slider2',
            	'slider3',
            	'slider4',
            	'slider5',
            	'slider6'
            ),
            'active' => true,
         ), 
	      array(
            'name' => esc_html__('Style', 'tattoo-artist'),
        	'icon' => 'dashicons dashicons-art',
            'fields' => array(
                'slider_titlecolor',
                'slider_descriptioncolor',
                'slider_btntxt1color',
				'slider_btnbgcolor',
				'slider_btntxthovercolor'

            ),
     	)
	    
    	),
	))); 


	

	// General Tab

	// Slider 1
	$wp_customize->add_setting( 
    	'slider1',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'slider1',
		array(
		    'label'   		=> __('Slider 1','tattoo-artist'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);		



	// Slider 2
	$wp_customize->add_setting(
    	'slider2',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);	

	$wp_customize->add_control( 
		'slider2',
		array(
		    'label'   		=> __('Slider 2','tattoo-artist'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);	


	// Slider 3
	$wp_customize->add_setting(
    	'slider3',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 5,
		)
	);	

	$wp_customize->add_control( 
		'slider3',
		array(
		    'label'   		=> __('Slider 3','tattoo-artist'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);	


	// Slider 4
	$wp_customize->add_setting(
    	'slider4',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 6,
		)
	);	

	$wp_customize->add_control( 
		'slider4',
		array(
		    'label'   		=> __('Slider 4','tattoo-artist'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);



	// Slider 5
	$wp_customize->add_setting(
    	'slider5',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 7,
		)
	);	

	$wp_customize->add_control( 
		'slider5',
		array(
		    'label'   		=> __('Slider 5','tattoo-artist'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);

	// Slider 6
	$wp_customize->add_setting(
    	'slider6',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 7,
		)
	);	

	$wp_customize->add_control( 
		'slider6',
		array(
		    'label'   		=> __('Slider 6','tattoo-artist'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);




	// Style setting

	// slider title Color
	$slidertitlecolor = esc_html__('#000', 'tattoo-artist' );
	$wp_customize->add_setting(
    	'slider_titlecolor',
    	array(
			'default' => $slidertitlecolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'slider_titlecolor',
		array(
		    'label'   		=> __('Title Color','tattoo-artist'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);


	// slider description Color
	$sliderdescriptioncolor = esc_html__('#000', 'tattoo-artist' );
	$wp_customize->add_setting(
    	'slider_descriptioncolor',
    	array(
			'default' => $sliderdescriptioncolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'slider_descriptioncolor',
		array(
		    'label'   		=> __('Description Color','tattoo-artist'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// slider btntxt1 Color
	$sliderbtntxt1color = esc_html__('#fff', 'tattoo-artist' );
	$wp_customize->add_setting(
    	'slider_btntxt1color',
    	array(
			'default' => $sliderbtntxt1color,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'slider_btntxt1color',
		array(
		    'label'   		=> __('Button Text Color','tattoo-artist'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// slider btnbg Color
	$sliderbtnbgcolor = esc_html__('#000', 'tattoo-artist' );
	$wp_customize->add_setting(
    	'slider_btnbgcolor',
    	array(
			'default' => $sliderbtnbgcolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'slider_btnbgcolor',
		array(
		    'label'   		=> __('Button BG Color','tattoo-artist'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	

	// slider btntxthover Color
	$sliderbtntxthovercolor = esc_html__('#E7DB13', 'tattoo-artist' );
	$wp_customize->add_setting(
    	'slider_btntxthovercolor',
    	array(
			'default' => $sliderbtntxthovercolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'slider_btntxthovercolor',
		array(
		    'label'   		=> __('Button Text Hover Color','tattoo-artist'),
		    'section'		=> 'slider_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);


	/*=========================================
	Service Section
	=========================================*/
	$wp_customize->add_section(
		'Service_setting', array(
			'title' => esc_html__( 'Service Section', 'tattoo-artist' ),
			'priority' => 2,
			'panel' => 'tattooartist_frontpage_sections',
		)
	);



	$wp_customize->add_setting('tattooartist_Service_tabs', array(
	   'sanitize_callback' => 'wp_kses_post',
	));

	$wp_customize->add_control(new tattooartist_Tab_Control($wp_customize, 'tattooartist_Service_tabs', array(
	   'section' => 'Service_setting',
	   'priority' => 2,
	   'buttons' => array(
	      array(
         	'name' => esc_html__('General', 'tattoo-artist'),
            'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
            	'service_disable_section',
            	'service_heading',
            	'Service1',
            	'Service2',
            	'Service3',
            	'Service4',
            	'Service5',
            	'Service6'
            ),
            'active' => true,
         ),
	      array(
            'name' => esc_html__('Style', 'tattoo-artist'),
        	'icon' => 'dashicons dashicons-art',
            'fields' => array(
            	'service_headingcolor',
            	'service_boxtitlecolorcolor',
            	'service_boxdescriptioncolorcolor',
            	'service_buttontextcolor'
            ),
     	),
  		array(
	        'name' => esc_html__('Layout', 'tattoo-artist'),
	        'icon' => 'dashicons dashicons-layout',
	        'fields' => array(
	            'tattoo_artist_service_section_width',
	            'tattooartist_service_padding',
	            'tattoo_artist_service_top_padding',
	            'tattoo_artist_service_bottom_padding'
	        ),
     	)
	    
    	),
	))); 



	// General

	// hide show service section
	$wp_customize->add_setting(
        'service_disable_section',
        array(
            'sanitize_callback' => 'wp_kses_post',
        )
    ); 
    $wp_customize->add_control(
        new tattooartist_Toggle_Switch_Custom_Control(
            $wp_customize,
            'service_disable_section',
            array(
                'settings'      => 'service_disable_section',
                'section'       => 'Service_setting',
                'label'         => __( 'Disable Section', 'tattoo-artist' ),
                'on_off_label'  => array(
                    'on' => __( 'Yes', 'tattoo-artist' ),
                    'off' => __( 'No', 'tattoo-artist' )
                ),
            )
        )
    );


	

    // service title
	$wp_customize->add_setting(
    	'service_heading',
    	array(
			'default' => '',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 1,
		)
	);	

	$wp_customize->add_control( 
		'service_heading',
		array(
		    'label'   		=> __('Heading','tattoo-artist'),
		    'section'		=> 'Service_setting',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);	


	// Service 1
	$wp_customize->add_setting( 
    	'Service1',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 1,
		)
	);	

	$wp_customize->add_control( 
		'Service1',
		array(
		    'label'   		=> __('Service 1','tattoo-artist'),
		    'section'		=> 'Service_setting',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);		


	// service 1 icon
	$wp_customize->add_setting(
    	'service_icon1',
    	array(
			'default' => 'fa fa-pencil',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 1,
		)
	);	

	$wp_customize->add_control( 
		'service_icon1',
		array(
		    'label'   		=> __('Icon 1','tattoo-artist'),
		    'section'		=> 'Service_setting',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);	
	

	// Service 2
	$wp_customize->add_setting(
    	'Service2',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 2,
		)
	);	

	$wp_customize->add_control( 
		'Service2',
		array(
		    'label'   		=> __('Service 2','tattoo-artist'),
		    'section'		=> 'Service_setting',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);	

	// service 2 icon
	$wp_customize->add_setting(
    	'service_icon2',
    	array(
			'default' => 'fa fa-pencil',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 2,
		)
	);	

	$wp_customize->add_control( 
		'service_icon2',
		array(
		    'label'   		=> __('Icon 2','tattoo-artist'),
		    'section'		=> 'Service_setting',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);	


	// Service 3
	$wp_customize->add_setting(
    	'Service3',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'Service3',
		array(
		    'label'   		=> __('Service 3','tattoo-artist'),
		    'section'		=> 'Service_setting',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);	

	// service 3 icon
	$wp_customize->add_setting(
    	'service_icon3',
    	array(
			'default' => 'fa fa-pencil',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'service_icon3',
		array(
		    'label'   		=> __('Icon 3','tattoo-artist'),
		    'section'		=> 'Service_setting',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);	


	// Service 4
	$wp_customize->add_setting(
    	'Service4',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);	

	$wp_customize->add_control( 
		'Service4',
		array(
		    'label'   		=> __('Service 4','tattoo-artist'),
		    'section'		=> 'Service_setting',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);

	// service 4 icon
	$wp_customize->add_setting(
    	'service_icon4',
    	array(
			'default' => 'fa fa-pencil',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);	

	$wp_customize->add_control( 
		'service_icon4',
		array(
		    'label'   		=> __('Icon 4','tattoo-artist'),
		    'section'		=> 'Service_setting',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);	


	// Service 5
	$wp_customize->add_setting(
    	'Service5',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 5,
		)
	);	

	$wp_customize->add_control( 
		'Service5',
		array(
		    'label'   		=> __('Service 5','tattoo-artist'),
		    'section'		=> 'Service_setting',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);

	// service 5 icon
	$wp_customize->add_setting(
    	'service_icon5',
    	array(
			'default' => 'fa fa-pencil',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 5,
		)
	);	

	$wp_customize->add_control( 
		'service_icon5',
		array(
		    'label'   		=> __('Icon 5','tattoo-artist'),
		    'section'		=> 'Service_setting',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);	

	// Service 6
	$wp_customize->add_setting(
    	'Service6',
    	array(
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 5,
		)
	);	

	$wp_customize->add_control( 
		'Service6',
		array(
		    'label'   		=> __('Service 6','tattoo-artist'),
		    'section'		=> 'Service_setting',
			'type' 			=> 'dropdown-pages',
			'transport'         => $selective_refresh,
		)  
	);

	// service 6 icon
	$wp_customize->add_setting(
    	'service_icon6',
    	array(
			'default' => 'fa fa-pencil',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 6,
		)
	);	

	$wp_customize->add_control( 
		'service_icon6',
		array(
		    'label'   		=> __('Icon 6','tattoo-artist'),
		    'section'		=> 'Service_setting',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);	


	// style

	// service headingcolor color
	$serviceheadingcolor = esc_html__('#000', 'tattoo-artist' );
	$wp_customize->add_setting(
    	'service_headingcolor',
    	array(
			'default' => $serviceheadingcolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);	

	$wp_customize->add_control( 
		'service_headingcolor',
		array(
		    'label'   		=> __('Heading Color','tattoo-artist'),
		    'section'		=> 'Service_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);


	// service boxtitlecolor color
	$serviceboxtitlecolorcolor = esc_html__('#000', 'tattoo-artist' );
	$wp_customize->add_setting(
    	'service_boxtitlecolorcolor',
    	array(
			'default' => $serviceboxtitlecolorcolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);	

	$wp_customize->add_control( 
		'service_boxtitlecolorcolor',
		array(
		    'label'   		=> __('Title Color','tattoo-artist'),
		    'section'		=> 'Service_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// service boxdescriptioncolor color
	$serviceboxdescriptioncolorcolor = esc_html__('#000', 'tattoo-artist' );
	$wp_customize->add_setting(
    	'service_boxdescriptioncolorcolor',
    	array(
			'default' => $serviceboxdescriptioncolorcolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);	

	$wp_customize->add_control( 
		'service_boxdescriptioncolorcolor',
		array(
		    'label'   		=> __('Description Color','tattoo-artist'),
		    'section'		=> 'Service_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);


	// service buttontext color
	$servicebuttontextcolor = esc_html__('#fff', 'tattoo-artist' );
	$wp_customize->add_setting(
    	'service_buttontextcolor',
    	array(
			'default' => $servicebuttontextcolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 4,
		)
	);	

	$wp_customize->add_control( 
		'service_buttontextcolor',
		array(
		    'label'   		=> __('Button Text Color','tattoo-artist'),
		    'section'		=> 'Service_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);



	// layout setting
	$wp_customize->add_setting('tattoo_artist_service_section_width',array(
        'default' => 'Box Width',
        'sanitize_callback' => 'tattooartist_sanitize_choices',
    ));
    $wp_customize->add_control('tattoo_artist_service_section_width',array(
        'type' => 'select',
        'label' => __('Section Width','tattoo-artist'),
        'choices' => array (
            'Box Width' => __('Box Width','tattoo-artist'),
            'Full Width' => __('Full Width','tattoo-artist')
        ),
        'section' => 'Service_setting',
    ));


    // service section padding 
	$wp_customize->add_setting('tattooartist_service_padding',array(
      'sanitize_callback'   => 'esc_html'
    ));
    $wp_customize->add_control('tattooartist_service_padding',array(
      'label' => __('Section Padding','tattoo-artist'),
      'section' => 'Service_setting'
    ));

    $wp_customize->add_setting('tattoo_artist_service_top_padding',array(
        'default' => '5',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('tattoo_artist_service_top_padding',array(
	    'type' => 'number',
	    'label' => __('Top','tattoo-artist'),
	    'section' => 'Service_setting',
    ));

 	$wp_customize->add_setting('tattoo_artist_service_bottom_padding',array(
        'default' => '2',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('tattoo_artist_service_bottom_padding',array(
	    'type' => 'number',
	    'label' => __('Bottom','tattoo-artist'),
	    'section' => 'Service_setting',
    ));



    /*=========================================
	Blog Section
	=========================================*/
	$wp_customize->add_section(
		'blog_setting', array(
			'title' => esc_html__( 'Blog Section', 'tattoo-artist' ),
			'priority' => 3,
			'panel' => 'tattooartist_frontpage_sections',
		)
	);



	

	$wp_customize->add_setting('tattooartist_blog_tabs', array(
	   'sanitize_callback' => 'wp_kses_post',
	));

	$wp_customize->add_control(new tattooartist_Tab_Control($wp_customize, 'tattooartist_blog_tabs', array(
	   'section' => 'blog_setting',
	   'priority' => 2,
	   'buttons' => array(
	      array(
         	'name' => esc_html__('General', 'tattoo-artist'),
            'icon' => 'dashicons dashicons-welcome-write-blog',
            'fields' => array(
            	'blog_heading'
            ),
            'active' => true,
         ), 
	      array(
            'name' => esc_html__('Style', 'tattoo-artist'),
        	'icon' => 'dashicons dashicons-art',
            'fields' => array(
                'blog_headingcolor',
                'blog_titlecolor',
                'blog_descriptioncolor',
                'blog_btntextcolor',
                'blog_datetextcolor'

            ),
     	)
	    
    	),
	))); 


	// General Tab

	// blog subheading Color
	$wp_customize->add_setting(
    	'blog_heading',
    	array(
			'default' => '',
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 1,
		)
	);	

	$wp_customize->add_control( 
		'blog_heading',
		array(
		    'label'   		=> __('Heading','tattoo-artist'),
		    'section'		=> 'blog_setting',
			'type' 			=> 'text',
			'transport'         => $selective_refresh,
		)  
	);	


	// Style setting

	// blog heading Color
	$blogheadingcolor = esc_html__('#000', 'tattoo-artist' );
	$wp_customize->add_setting(
    	'blog_headingcolor',
    	array(
			'default' => $blogheadingcolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'blog_headingcolor',
		array(
		    'label'   		=> __('Heading Color','tattoo-artist'),
		    'section'		=> 'blog_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);


	// blog title Color
	$blogtitlecolor = esc_html__('#000', 'tattoo-artist' );
	$wp_customize->add_setting(
    	'blog_titlecolor',
    	array(
			'default' => $blogtitlecolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'blog_titlecolor',
		array(
		    'label'   		=> __('Title Color','tattoo-artist'),
		    'section'		=> 'blog_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// blog description Color
	$blogdescriptioncolor = esc_html__('#000', 'tattoo-artist' );
	$wp_customize->add_setting(
    	'blog_descriptioncolor',
    	array(
			'default' => $blogdescriptioncolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'blog_descriptioncolor',
		array(
		    'label'   		=> __('Description Color','tattoo-artist'),
		    'section'		=> 'blog_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);


	// blog btntext Color
	$blogbtntextcolor = esc_html__('#fff', 'tattoo-artist' );
	$wp_customize->add_setting(
    	'blog_btntextcolor',
    	array(
			'default' => $blogbtntextcolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'blog_btntextcolor',
		array(
		    'label'   		=> __('Button Text Color','tattoo-artist'),
		    'section'		=> 'blog_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);

	// blog datetext Color
	$blogdatetextcolor = esc_html__('#000', 'tattoo-artist' );
	$wp_customize->add_setting(
    	'blog_datetextcolor',
    	array(
			'default' => $blogdatetextcolor,
			'capability'     	=> 'edit_theme_options',
			'sanitize_callback' => 'wp_kses_post',
			'priority'      => 3,
		)
	);	

	$wp_customize->add_control( 
		'blog_datetextcolor',
		array(
		    'label'   		=> __('Date & Comments Color','tattoo-artist'),
		    'section'		=> 'blog_setting',
			'type' 			=> 'color',
			'transport'         => $selective_refresh,
		)  
	);



	$wp_customize->register_control_type('tattooartist_Tab_Control');

}

add_action( 'customize_register', 'tattooartist_blog_setting' );

// service selective refresh
function tattooartist_blog_section_partials( $wp_customize ){	
	// blog_title
	$wp_customize->selective_refresh->add_partial( 'blog_title', array(
		'selector'            => '.home-blog .title h6',
		'settings'            => 'blog_title',
		'render_callback'  => 'tattooartist_blog_title_render_callback',
	
	) );
	
	// blog_subtitle
	$wp_customize->selective_refresh->add_partial( 'blog_subtitle', array(
		'selector'            => '.home-blog .title h2',
		'settings'            => 'blog_subtitle',
		'render_callback'  => 'tattooartist_blog_subtitle_render_callback',
	
	) );
	
	// blog_description
	$wp_customize->selective_refresh->add_partial( 'blog_description', array(
		'selector'            => '.home-blog .title p',
		'settings'            => 'blog_description',
		'render_callback'  => 'tattooartist_blog_description_render_callback',
	
	) );	
	}

add_action( 'customize_register', 'tattooartist_blog_section_partials' );

// blog_title
function tattooartist_blog_title_render_callback() {
	return get_theme_mod( 'blog_title' );
}

// blog_subtitle
function tattooartist_blog_subtitle_render_callback() {
	return get_theme_mod( 'blog_subtitle' );
}

// service description
function tattooartist_blog_description_render_callback() {
	return get_theme_mod( 'blog_description' );
}


