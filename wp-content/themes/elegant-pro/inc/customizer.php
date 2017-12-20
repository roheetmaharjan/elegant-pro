<?php
/**
 * bloggerbuz-pro Theme Customizer
 *
 * @package bloggerbuz-pro
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
 
 function bloggerbuz_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	require get_template_directory() . '/inc/admin-panel/sanitize.php';

// bloggerbug posts list.

$bloggerbuz_category_lists 	=	bloggerbuz_category_lists();
$posts_list = bloggerbuz_post_list();
$bloggerbuz_page_lists  = bloggerbuz_page_lists();
$bloggerbuz_text_transform = bloggerbuz_text_transform();
$bloggerbuz_font_size = bloggerbuz_font_size();
$bloggerbuz_fonts_list = bloggerbuz_fonts_list();

$wp_customize->add_panel('bloggerbug_color_settings', array(
      'capabitity' => 'edit_theme_options',
      'priority' => 1,
      'title' => esc_html__('Theme Color', 'bloggerbuz-pro')
   ));
  // THEME COLOR
  $wp_customize->add_section(
          'bloggerbuz_theme_color_section',
            array(
                'title'   => esc_html__( 'Theme Color Section', 'bloggerbuz-pro' ),
                'panel'     => 'bloggerbug_color_settings',
                'priority'  => 1,
            )
      );
   $wp_customize->add_setting(
      'bloggerbuz_theme_color',
          array(
                'default' => '#0288d1',
                'sanitize_callback' => 'sanitize_text_field',
                'transport' => 'postMessage'
            )
        );
    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
          'bloggerbuz_theme_color',
          array(
              'label'=>esc_html__('Theme Color','bloggerbuz-pro'),
               'section'    => 'bloggerbuz_theme_color_section',
                'settings'   => 'bloggerbuz_theme_color',
                'priority' => 39
               )
           )
        );
      //DEMO IMPORT SETTING STARTING
      $wp_customize->add_panel('bloggerbug_demo_import', array(
          'capabitity' => 'edit_theme_options',
          'priority' => 1,
          'title' => esc_html__('Demo Import', 'bloggerbuz-pro')
        ));
       /** Demo Import Section **/
        $wp_customize->add_section(
            'bloggerbuz_demo_import_section',
            array(
                'title' => esc_html__('Demo Import','bloggerbuz-pro'),
                'priority' => 1,
                'capability' => 'edit_theme_options',
                'theme_support' => '',
                'panel' => 'bloggerbug_demo_import',
            )
        );
        $wp_customize->add_setting( 'demo_import_one', array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field') );
        $wp_customize->add_control( new WP_Customize_Demo_import_one( $wp_customize, 'demo_import_one', array(
            'label' => esc_html__( 'Import Demo One', 'bloggerbuz-pro' ),
            'section' => 'bloggerbuz_demo_import_section',
            'settings' => 'demo_import_one',
            'priority' => 1,
            )
        ) );

        $wp_customize->add_setting( 'demo_import_two', array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field') );
            $wp_customize->add_control( new WP_Customize_Demo_import_two( $wp_customize, 'demo_import_two', array(
                'label' => esc_html__( 'Import Demo Two', 'bloggerbuz-pro' ),
                'section' => 'bloggerbuz_demo_import_section',
                'settings' => 'demo_import_two',
                'priority' => 2,
                )
        ) );

        $wp_customize->add_setting( 'demo_import_three', array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field') );
            $wp_customize->add_control( new WP_Customize_Demo_import_three( $wp_customize, 'demo_import_three', array(
                'label' => esc_html__( 'Import Demo Three', 'bloggerbuz-pro' ),
                'section' => 'bloggerbuz_demo_import_section',
                'settings' => 'demo_import_three',
                'priority' => 3,
                )
        ) ); 

        $wp_customize->add_setting( 'demo_import_four', array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field') );
            $wp_customize->add_control( new WP_Customize_Demo_import_four( $wp_customize, 'demo_import_four', array(
                'label' => esc_html__( 'Import Demo Four', 'bloggerbuz-pro' ),
                'section' => 'bloggerbuz_demo_import_section',
                'settings' => 'demo_import_four',
                'priority' => 3,
                )
        ) );  

         $wp_customize->add_setting( 'demo_import_five', array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field') );
            $wp_customize->add_control( new WP_Customize_Demo_import_five( $wp_customize, 'demo_import_five', array(
                'label' => esc_html__( 'Import Demo Five', 'bloggerbuz-pro' ),
                'section' => 'bloggerbuz_demo_import_section',
                'settings' => 'demo_import_five',
                'priority' => 3,
                )
        ) );    
//DEAFAULT SETTING 

  $wp_customize->add_panel('bloggerbuz_default_setting',array(
      'priority' => 1,
      'title' => esc_html__('Default/Basic Setting', 'bloggerbuz-pro'),
      'panel' => 'bloggerbuz_default_setting'
      ));
  $wp_customize->get_section('title_tagline')->panel = 'bloggerbuz_default_setting'; //priority 20
  $wp_customize->get_section('colors')->panel = 'bloggerbuz_default_setting'; //priority 40
  $wp_customize->get_section('header_image')->panel = 'bloggerbuz_default_setting'; //priority 60
  $wp_customize->get_section('background_image')->panel = 'bloggerbuz_default_setting'; //priority 80
  $wp_customize->get_section('static_front_page')->panel = 'bloggerbuz_default_setting'; //priority 120

   //BLOGGERBUZ HEADER SETTING 
  //LOGO SETTING
   $wp_customize->add_panel('bloggerbug_header_settings', array(
      'capabitity' => 'edit_theme_options',
      'priority' => 10,
      'title' => esc_html__('Header Setting', 'bloggerbuz-pro')
  ));
  
   //starting logo alignment 
    $wp_customize->add_section('bloggerbuz_logo_alignment', array(
        'priority' => 50,
        'title' => esc_html__('Logo Alignment', 'bloggerbuz-pro'),
        'panel' => 'bloggerbug_header_settings'
  ));
    $wp_customize->add_setting('bloggerbuz_logo_alignment', array(
      'default' => 'Left',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'bloggerbuz_pro_radio_sanitize_alignment_logo',
    ));

    $wp_customize->add_control('bloggerbuz_logo_alignment', array(
      'type' => 'radio',
      'label' => esc_html__('Choose the layout that you want','bloggerbuz-pro'),
      'section' => 'bloggerbuz_logo_alignment',
      'setting' => 'bloggerbuz_logo_alignment',
      'choices' => array(
         'left'=>esc_html__('Left', 'bloggerbuz-pro'),
         'center'=>esc_html__('Center','bloggerbuz-pro'),
      )
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'the_multiple_logo_upload', array(
    'label' => esc_html__('Upload logo for your site', 'bloggerbuz-pro'),
    'section' => 'bloggerbuz_logo_alignment',
    'setting' => 'the_multiple_logo_upload'
  )));
   $wp_customize->add_section('bloggerbuz_header_menu_layout',array(
    'priority' => '10',
    'capability' => 'edit_theme_options',
    'theme_supports' => '',
    'title' => esc_html__('Header Menu Laout ','bloggerbuz-pro'),
    'description' => esc_html__('Manage general setting for the site','bloggerbuz-pro'),
    'panel' => 'bloggerbug_header_settings'
    ));
    $wp_customize->add_setting(
          'bloggerbuz_header_layout',
          array(
              'default'           => 'layout-1',
              'sanitize_callback' => 'sanitize_text_field',
          )
      );      
    $wp_customize->add_control(
          'bloggerbuz_header_layout',
              array(
                  'label'    => esc_html__( 'Header Menu Layout', 'bloggerbuz-pro' ),
                  'section'  => 'bloggerbuz_header_menu_layout',
                    'type' => 'radio',
                  'choices'  => array(
                        'layout-1' => esc_html__( 'Layout 1', 'bloggerbuz-pro' ),
                        'layout-2' => esc_html__( 'Layout 2', 'bloggerbuz-pro' ),
                            'layout-3' => esc_html__( 'Layout 3', 'bloggerbuz-pro' ),
                ),
                'priority' => 6
              )
      );
	// SEARCH SETTING
    
    $wp_customize->add_section('bloggerbuz_header_search',array(
		'title' => esc_html__('Header Search Setting','bloggerbuz-pro'),
		'priority' => '30',
		'panel' => 'bloggerbug_header_settings'
		));
	$wp_customize->add_setting('bloggerbuz_hide_header_search',array(
		'default' => '0',
		'sanitize_callback' => 'bloggerbuz_sanitize_radio_integer',
		));
	$wp_customize->add_control('bloggerbuz_hide_header_search',array(
		'type' => 'radio',
		'label' => esc_html__('Hide Search From Header','bloggerbuz-pro'),
		'description' => esc_html__('Selecting Yes will Hide Search Bar From Header','bloggerbuz-pro'),
		'section' => 'bloggerbuz_header_search',
		'choices' => array(
			'1' => esc_html__('Yes','bloggerbuz-pro'),
			'0' => esc_html__('No','bloggerbuz-pro')
			)
		));
  
  //Bredcrumbs Setting for bloggerbuz
  $wp_customize->add_section('bloggerbuz_bredcrumb',array(
    'title' => esc_html__('Page Breadcrumb','bloggerbuz-pro'),
    'priority' => '40',
    'panel' => 'bloggerbug_header_settings'
    ));

  $wp_customize->add_setting(
    'bloggerbuz_page_bg_image',
    array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw'
    )
   );
  $wp_customize->add_control(
       new WP_Customize_Image_Control(
           $wp_customize,
           'bloggerbuz_page_bg_image',
           array(
               'label'      => __( 'Page Breadcrumb Backgeound Image', 'bloggerbuz-pro' ),
               'section'    => 'bloggerbuz_bredcrumb',
               'settings'   => 'bloggerbuz_page_bg_image',
               'priority' => 10,
           )
       )
   );
  
    //PANEL HOMEPAGE SECTION 
   $wp_customize->add_panel('bloggerbug_homepage_settings', array(
      'capabitity' => 'edit_theme_options',
      'priority' => 30,
      'title' => esc_html__('Homepage Settings', 'bloggerbuz-pro')
   ));
   
   //SLIDER SECTION
   $wp_customize->add_section('bloggerbuz_slider_setting', 
                array(
                'priority' => 10,
                'title' => esc_html__('Slider Section', 'bloggerbuz-pro'),
                'panel' => 'bloggerbug_homepage_settings',
          ));

   // SLIDER ENABLE/DISBLE
   
    $wp_customize->add_setting(
		            'bloggerbuz_homepage_setting_slider_section_option',
                    array(
		                'default'           =>  'no',
		                'sanitize_callback' =>  'bloggerbuz_sanitize_radio_yes_no',
		                )
		            );
   $wp_customize->add_control(
		            'bloggerbuz_homepage_setting_slider_section_option',array(
		                'description'   =>  esc_html__('Do you want to enable this section?','bloggerbuz-pro'),
		                'section'       =>  'bloggerbuz_slider_setting',
		                'setting'       =>  'bloggerbuz_homepage_setting_slider_section_option',
		                'priority'      =>  5,
		                'type'          =>  'radio',
		                'choices'        =>  array(
		                    'yes'   =>  esc_html__('Yes','bloggerbuz-pro'),
		                    'no'    =>  esc_html__('No','bloggerbuz-pro')
		                    )
		                )                   
		            );
   $wp_customize->add_setting(
          'bloggerbuz_slider_layout',
          array(
              'default'           => 'layout-1',
              'sanitize_callback' => 'sanitize_text_field',
          )
      );      
      $wp_customize->add_control(
          'bloggerbuz_slider_layout',
              array(
                  'label'    => esc_html__( 'Slider Layout', 'bloggerbuz-pro' ),
                  'section'  => 'bloggerbuz_slider_setting',
                    'type' => 'radio',
                  'choices'  => array(
                        'layout-1' => esc_html__( 'Layout 1', 'bloggerbuz-pro' ),
                        'layout-2' => esc_html__( 'Layout 2', 'bloggerbuz-pro' ),
                        'layout-3' => esc_html__( 'Layout 3', 'bloggerbuz-pro' ),
                            'revolution' => esc_html__( 'Revolution Slider', 'bloggerbuz-pro' ),
                ),
                'priority' => 6
              )
      );
    //SELECT CATEORY FOR SLIDER
  $wp_customize->add_setting(
		            'bloggerbuz_homepage_setting_slider_section_category',array(
		                'default'           =>  '0',
		                'sanitize_callback' =>  'bloggerbuz_sanitize_category_select',
		                )
		            );
  $wp_customize->add_control(
		            'bloggerbuz_homepage_setting_slider_section_category',array(
		                'priority'      =>  6,
		                'label'         =>  esc_html__('Select category','bloggerbuz-pro'),
		                'section'       =>  'bloggerbuz_slider_setting',
		                'setting'       =>  'bloggerbuz_homepage_setting_slider_section_category',
		                'type'          =>  'select',  
		                'choices'       =>  $bloggerbuz_category_lists
		                )                                     
		            );     

    //SLIDER BUTTON TEXT
   $wp_customize->add_setting(
		            'bloggerbuz_homepage_setting_slider_section_readmore',array(
		                'default'           =>  esc_html__('Get Started','bloggerbuz-pro'),
		                'sanitize_callback' =>  'sanitize_text_field',
		                )
		            );

   $wp_customize->add_control(
		            'bloggerbuz_homepage_setting_slider_section_readmore',array(
		                'priority'      =>  7,
		                'label'         =>  esc_html__('Read more text','bloggerbuz-pro'),
		                'section'       =>  'bloggerbuz_slider_setting',
		                'setting'       =>  'bloggerbuz_homepage_setting_slider_section_readmore',
		                'type'          =>  'text',  
		                )                                     
		            );
     
                   
     $wp_customize->add_setting(
            'rev_slider_shortcode', 
                array(
                    'default' => '',
                    'sanitize_callback' => 'sanitize_text_field',
              )
        );
        $wp_customize->add_control(
            'rev_slider_shortcode',
                array(
                  'type' => 'text',
                  'label' => esc_html__( 'Revolution Slider Shortcode', 'bloggerbuz-pro' ),
                  'section' => 'bloggerbuz_slider_setting',
                  'priority' => 10,
                      'active_callback' => 'bloggerbuz_slider_layout_revolution'
                )
        );      

    //FEATURE SECTION
   $wp_customize->add_section('bloggerbuz_feature_section',array(
               	'priority' => 15  ,
               	'title' => esc_html__('Feature Section', 'bloggerbuz-pro'),
               	'panel' => 'bloggerbug_homepage_settings',
        	));
    //ENABLE/DISABLE FEATURE SECTION
   $wp_customize->add_setting('bloggerbuz_option',array(
              'default' => 'disable',
              'capability' => 'edit_theme_options',
              'sanitize_callback' => 'bloggerbuz_radio_sanitize_enabledisable',
           ));

   $wp_customize->add_control('bloggerbuz_option',array(
              'type' => 'radio',
              'label' => esc_html__('Enable Disable Feature Section', 'bloggerbuz-pro'),
              'section' => 'bloggerbuz_feature_section',
              'setting' => 'bloggerbuz_option',
              'choices' => array(
                 'enable' => esc_html__('Enable', 'bloggerbuz-pro'),
                 'disable' => esc_html__('Disable', 'bloggerbuz-pro'),
              )
           ));

    $wp_customize->add_setting(
          'bloggerbuz_feature_layout',
          array(
              'default'           => 'layout-1',
              'sanitize_callback' => 'sanitize_text_field',
          )
      );      
    $wp_customize->add_control(
          'bloggerbuz_feature_layout',
              array(
                  'label'    => esc_html__( 'Feature Section Layout', 'bloggerbuz-pro' ),
                  'section'  => 'bloggerbuz_feature_section',
                    'type' => 'radio',
                  'choices'  => array(
                        'layout-1' => esc_html__( 'Layout 1', 'bloggerbuz-pro' ),
                        'layout-2' => esc_html__( 'Layout 2', 'bloggerbuz-pro' ),
                            'layout-3' => esc_html__( 'Layout 3', 'bloggerbuz-pro' ),
                ),
                'priority' => 15
              )
      );

    //FEATURE CATEGORY
   $wp_customize->add_setting(
                'bloggerbuz_homepage_setting_feature_section_category',array(
                    'default'           =>  '0',
                    'sanitize_callback' =>  'bloggerbuz_sanitize_category_select',
                    )
                );

   $wp_customize->add_control(
                'bloggerbuz_homepage_setting_feature_section_category',array(
                    'priority'      =>  25,
                    'label'         =>  esc_html__('Select category','bloggerbuz-pro'),
                    'section'       =>  'bloggerbuz_feature_section',
                    'setting'       =>  'bloggerbuz_homepage_setting_feature_section_category',
                    'type'          =>  'select',  
                    'choices'       =>  $bloggerbuz_category_lists
                    )                                     
                );
                
   // HIGHLIGHTED   SECTION
   $wp_customize->add_section('bloggerbuz_highlighted_section', array(
        'priority' => 16  ,
        'title' => esc_html__('Highlighted Section', 'bloggerbuz-pro'),
        'panel' => 'bloggerbug_homepage_settings',
    ));
    
    //ENABLE/DISABLE HIGHLIGHTED SECTION
   $wp_customize->add_setting('bloggerbuz_highlighted_option', array(
      'default' => 'disable',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'bloggerbuz_radio_sanitize_enabledisable',
   ));

   $wp_customize->add_control('bloggerbuz_highlighted_option', array(
      'type' => 'radio',
      'label' => esc_html__('Enable Disable Highlighted Section', 'bloggerbuz-pro'),
      'section' => 'bloggerbuz_highlighted_section',
      'setting' => 'bloggerbuz_highlighted_option',
      'choices' => array(
         'enable' => esc_html__('Enable', 'bloggerbuz-pro'),
         'disable' => esc_html__('Disable', 'bloggerbuz-pro'),
      )
   ));
   $wp_customize->add_setting(
          'bloggerbuz_highlighted_layout',
          array(
              'default'           => 'layout-1',
              'sanitize_callback' => 'sanitize_text_field',
          )
      );      
    $wp_customize->add_control(
          'bloggerbuz_highlighted_layout',
              array(
                  'label'    => esc_html__( 'Slider Layout', 'bloggerbuz-pro' ),
                  'section'  => 'bloggerbuz_highlighted_section',
                    'type' => 'radio',
                  'choices'  => array(
                        'layout-1' => esc_html__( 'Layout 1', 'bloggerbuz-pro' ),
                        'layout-2' => esc_html__( 'Layout 2', 'bloggerbuz-pro' ),
                        'layout-3' => esc_html__( 'Layout 3', 'bloggerbuz-pro' ),
                ),
              
              )
      );

  //HIGHLIGHTED SECTION POST
  $wp_customize->add_setting('bloggerbuz_highlighted_setting_post',array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'bloggerbuz_integer_sanitize',
        'transport' => 'postMessage'
   ));
   
   $wp_customize->add_control('bloggerbuz_highlighted_setting_post', array(
        'type' => 'select',
        'label' => esc_html__('Select a Post to show in Highlighted Secion','bloggerbuz-pro'),
        'section' => 'bloggerbuz_highlighted_section',
        'setting' => 'bloggerbuz_highlighted_option',
        'choices' => $posts_list
    ));
   $wp_customize->add_setting( 'bloggerbuz_highlighted_posts', array(
          'sanitize_callback' => 'blogerbuz_sanitize_repeater',
          'default' => json_encode(
            array(
                array(
                    'feature_icon' => 'Feature Icon' ,
                  )
            )
          )
        ));
   // Video Section
   $wp_customize->add_section(
    'bloggerbuz_video_section',
    array(
        'title' => esc_html__('Video Section','bloggerbuz-pro'),
        'priority' => 17,
        'panel' => 'bloggerbug_homepage_settings',
        'capability' => 'edit_theme_options',
        'theme_support' => ''
    )
   );
   
    //ENABLE/DISABLE VIDEO SECTION
   $wp_customize->add_setting('bloggerbuz_video_section_option', array(
      'default' => 'disable',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'bloggerbuz_radio_sanitize_enabledisable',
   ));

   $wp_customize->add_control('bloggerbuz_video_section_option', array(
      'type' => 'radio',
      'label' => esc_html__('Enable Disable Video Section', 'bloggerbuz-pro'),
      'priority' => 1,
      'section' => 'bloggerbuz_video_section',
      'setting' => 'bloggerbuz_video_section_option',
      'choices' => array(
         'enable' => esc_html__('Enable', 'bloggerbuz-pro'),
         'disable' => esc_html__('Disable', 'bloggerbuz-pro'),
      )
   ));
   $wp_customize->add_setting(
          'bloggerbuz_video_layout',
          array(
              'default'           => 'layout-1',
              'sanitize_callback' => 'sanitize_text_field',
          )
      );      
    $wp_customize->add_control(
          'bloggerbuz_video_layout',
              array(
                  'label'    => esc_html__( 'Video Layout', 'bloggerbuz-pro' ),
                  'priority' => 2,
                  'section'  => 'bloggerbuz_video_section',
                    'type' => 'radio',
                  'choices'  => array(
                        'layout-1' => esc_html__( 'Layout 1', 'bloggerbuz-pro' ),
                        'layout-2' => esc_html__( 'Layout 2', 'bloggerbuz-pro' ),
                        'layout-3' => esc_html__( 'Layout 3', 'bloggerbuz-pro' ),
                ),
              
              )
      );
   $wp_customize->add_setting(
    'bloggerbuz_video_title',
    array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    )
   );
  $wp_customize->add_control(
    'bloggerbuz_video_title',
    array(
        'label' => esc_html__('video Section Title','bloggerbuz-pro'),
        'type' => 'text',
        'priority' => 4,
        'section' => 'bloggerbuz_video_section'
    )
  );

  $wp_customize->add_setting(
    'bloggerbuz_video_sub_title',
    array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    )
 );
 $wp_customize->add_control(
    'bloggerbuz_video_sub_title',
    array(
        'label' => esc_html__('video Section Sub Title','bloggerbuz-pro'),
        'type' => 'text',
        'priority' => 6,
        'section' => 'bloggerbuz_video_section'
    )
  );
  $wp_customize->add_setting(
    'bloggerbuz_video_description',
    array(
        'default' => '',
        'transport'=>'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    )
 );
 $wp_customize->add_control(
    'bloggerbuz_video_description',
    array(
        'label' => esc_html__('video Section Description','bloggerbuz-pro'),
        'type' => 'textarea',
        'priority' => 8,
        'section' => 'bloggerbuz_video_section'
    )
   );
   $wp_customize->add_setting(
    'bloggerbuz_video_iframe_page',
    array(
        'default' => '',
        'sanitize_callback' => 'bloggerbuz_sanitize_page_list',
    )
 );
 $wp_customize->add_control(
    'bloggerbuz_video_iframe_page',
    array(
        'label' => esc_html__('Video Iframe Page','bloggerbuz-pro'),
        'priority' => 15,
        'type' => 'select',
        'choices' => $bloggerbuz_page_lists,
        'section' => 'bloggerbuz_video_section'
    )
 );
  $wp_customize->add_setting('bloggerbuz_video_bkgimage', array(
    'default' => '',
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw'
    ));

  $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'bloggerbuz_video_bkgimage', array(
    'label' => esc_html__('Backround Image for Video Section', 'bloggerbuz-pro'),
    'section' => 'bloggerbuz_video_section',
    'setting' => 'bloggerbuz_video_bkgimage'
    )));
   // Recent Blog SECTION
   $wp_customize->add_section('bloggerbuz_recent_blog_section', array(
        'priority' => 30  ,
        'title' => esc_html__('Recent Blog Section', 'bloggerbuz-pro'),
        'panel' => 'bloggerbug_homepage_settings',
    ));
    
   // Blog Esclude
   $wp_customize->add_setting( 'bloggerbuz_exclude_category', array( 
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    
   $wp_customize->add_control( new bloggerbuz_WP_Customize_Cat_Exclude_Control(
       $wp_customize,
       'bloggerbuz_exclude_category',
       array(
           'label'      => esc_html__( 'Exclude Category', 'bloggerbuz-pro' ),
           'description' => esc_html__('Exclude Categories From Recent Post', 'bloggerbuz-pro'),
           'section'    => 'bloggerbuz_recent_blog_section',
           'settings'   => 'bloggerbuz_exclude_category',
       )
   ));
    
    // DESIGN SETTING
   $wp_customize -> add_panel(
        'bloggerbuz_design_setting_panel',array(
            'priority' => 35,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => esc_html__('Design Setting', 'bloggerbuz-pro')
        )
    );     
        
    $wp_customize -> add_section(
        'bloggerbuz_home_page_layout_section',array(
            'title' => esc_html__('Home Page Layout','bloggerbuz-pro'),
            'priority' => 20,
            'panel' => 'bloggerbuz_design_setting_panel'
        )
    );

	$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'bloggerbuz_logo_upload', array(
		'label' => esc_html__('Upload logo for your site', 'bloggerbuz-pro'),
		'section' => 'bloggerbuz_logo_setting',
		'setting' => 'bloggerbuz_logo_upload'
	)));
    
 //ADD WEBPAGE LAYOUT
    $wp_customize->add_section(
        'bloggerbuz_design_web_layout',array(
        'title'         =>  esc_html__('Web Layout', 'bloggerbuz-pro'),
        'panel'         =>  'bloggerbuz_design_setting_panel'
            )        
        );
        
   $wp_customize->add_setting('bloggerbuz_design_web_layout', array(
      'default' => 'fullwidth',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'bloggerbuz_radio_sanitize_webpagelayout',
   ));

   $wp_customize->add_control('bloggerbuz_design_web_layout', array(
      'type' => 'radio',
      'label' => esc_html__('Choose the layout that you want', 'bloggerbuz-pro'),
      'section' => 'bloggerbuz_design_web_layout',
      'setting' => 'bloggerbuz_design_web_layout',
      'choices' => array(
         'fullwidth' => esc_html__('Full Width', 'bloggerbuz-pro'),
         'boxed' => esc_html__('Boxed', 'bloggerbuz-pro')
         
      )
   ));
   
// HOMEPAGE SIDE BAR LAYOUT
  $wp_customize->add_section(
        'bloggerbuz_homepage_sidebar_setting',array(
          'title' => esc_html__('Home Sidebar Layout', 'bloggerbuz-pro'),
          'panel' => 'bloggerbuz_design_setting_panel'
          )
      );
  $wp_customize->add_setting(
      'bloggerbuz_sidebar_layout',array(
        'default' =>  'sidebar-right',
        'sanitize_callback' =>  'bloggerbuz_radio_sanitize_sidebar'
        )
      );  
    $wp_customize->add_control(
      'bloggerbuz_sidebar_layout',array(
        'description' => esc_html__('Choose the sidebar Layout for the home page','bloggerbuz-pro'),
        'section' => 'bloggerbuz_homepage_sidebar_setting',
        'type'    =>  'radio',
        'choices' =>  array(
            'sidebar-left' =>  esc_html__('Left Sidebar','bloggerbuz-pro'),
            'sidebar-right' =>  esc_html__('Right Sidebar','bloggerbuz-pro'),
            'no-sidebar' =>  esc_html__('No Sidebar','bloggerbuz-pro'),
          )
        )
      );
   //HOMEPAGE LAYOUT
    $wp_customize -> add_section(
        'bloggerbuz_home_page_layout_section',
        array(
            'title' => esc_html__('Home Page Layout','bloggerbuz-pro'),
            'priority' => 20,
            'panel' => 'bloggerbuz_design_setting_panel'
        )
    );
    
    $wp_customize -> add_setting(
        'bloggerbuz_home_page_layout_setting',
        array(
            'default' => 'fullwidth-home',
            'sanitize_callback' => 'bloggerbuz_sanitize_homelayout_radio'
        )
    );
    
    $wp_customize -> add_control(
        'bloggerbuz_home_page_layout_setting',
        array(
            'label' => esc_html__('Home Layout Option', 'bloggerbuz-pro'),
            'section' => 'bloggerbuz_home_page_layout_section',
            'type' => 'radio',
            'choices' => array(
                            'fullwidth-home' => esc_html__('FullWidth','bloggerbuz-pro'),
                            'gridview-home' => esc_html__('Grid view','bloggerbuz-pro'),
                             'alternate-home' => esc_html__('Alternate View','bloggerbuz-pro'),
                             'list-home' => esc_html__('List View','bloggerbuz-pro'),
                             'masonry-home' => esc_html__('Masonry View','bloggerbuz-pro'),
                        )
        )
    );
   
// FOOTER SECTION
     $wp_customize -> add_panel(
        'bloggerbuz_footer_setting_panel',array(
            'priority' => 35,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => esc_html__('Footer Setting', 'bloggerbuz-pro')
        )
    );
  
//FOTTER SECTION
  $wp_customize -> add_panel(
        'bloggerbuz_social_setting_panel',array(
            'priority' => 36,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => esc_html__('Social Link Setting', 'bloggerbuz-pro')
        )
    ); 


  $wp_customize->add_section(
        'bloggerbuz_social_link',array(
            'title' =>esc_html__('Footer Social Link','bloggerbuz-pro'),
            'panel' =>'bloggerbuz_social_setting_panel',
        )
    );
    
// SETTING FOR SOCIAL LINK
   $wp_customize->add_setting(
        'bloggerbuz_footer_social_icon_enable',array(
                'default' => '',
                'sanitize_callback'=>'bloggerbuz_sanitize_checkbox'
            )
    );
    $wp_customize->add_control(
        'bloggerbuz_footer_social_icon_enable',array(
            'label' => esc_html__('Footer/Header(Only for menu layout 3)Social Link','bloggerbuz-pro'),
            'section' => 'bloggerbuz_social_link',
            'type' => 'checkbox',
            'priority' => 2
        )
    );
    $wp_customize->add_setting(
        'bloggerbuz_facebook_text',array(
                'default'=>'',
                'sanitize_callback' => 'esc_url_raw',
            )
    );
    $wp_customize->add_setting(
        'bloggerbuz_twitter_text',array(
                'default'=>'',
                'sanitize_callback' => 'esc_url_raw',
            )
    );
    $wp_customize->add_setting(
        'bloggerbuz_googleplus_text',array(
                'default'=>'',
                'sanitize_callback' => 'esc_url_raw',
            )
    );
    $wp_customize->add_setting(
        'bloggerbuz_youtube_text',array(
                'default'=>'',
                'sanitize_callback' => 'esc_url_raw',
            )
    );
    $wp_customize->add_setting(
        'bloggerbuz_pinterest_text',array(
                'default'=>'',
                'sanitize_callback' => 'esc_url_raw',
            )
    );
   
    $wp_customize->add_setting(
        'bloggerbuz_linkedin_text',array(
                'default'=>'',
                'sanitize_callback' => 'esc_url_raw',
            )
    );
     $wp_customize->add_setting(
        'bloggerbuz_instagram_text',array(
                'default'=>'',
                'sanitize_callback' => 'esc_url_raw',
            )
    );
   $wp_customize->add_control(
        'bloggerbuz_facebook_text', array(
                'label' => esc_html__('Facebook Link','bloggerbuz-pro'),
                'section' => 'bloggerbuz_social_link',
                'type' => 'text',
            )
    );
    $wp_customize->add_control(
        'bloggerbuz_twitter_text',array(
                'label' => esc_html__('Twitter Link','bloggerbuz-pro'),
                'section' => 'bloggerbuz_social_link',
                'type' => 'text',
            )
    );
    $wp_customize->add_control(
        'bloggerbuz_googleplus_text',array(
                'label' => esc_html__('GooglePlus Link','bloggerbuz-pro'),
                'section' => 'bloggerbuz_social_link',
                'type' => 'text',
            )
    );

    $wp_customize->add_control(
        'bloggerbuz_youtube_text',array(
                'label' => esc_html__('Youtube Link','bloggerbuz-pro'),
                'section' => 'bloggerbuz_social_link',
                'type' => 'text',
            )
    );
    $wp_customize->add_control(
        'bloggerbuz_pinterest_text',array(
                'label' => esc_html__('Pinterest Link','bloggerbuz-pro'),
                'section' => 'bloggerbuz_social_link',
                'type' => 'text',
            )
    );
    $wp_customize->add_control(
        'bloggerbuz_linkedin_text',array(
                'label' => esc_html__('Linkedin Link','bloggerbuz-pro'),
                'section' => 'bloggerbuz_social_link',
                'type' => 'text',
            )
    );
    $wp_customize->add_control(
        'bloggerbuz_instagram_text',array(
                'label' => esc_html__('Instagram Link','bloggerbuz-pro'),
                'section' => 'bloggerbuz_social_link',
                'type' => 'text',
            )
    );
    
      //Typography Panel
    $wp_customize->add_panel(
            'bloggerbuz_typography',
            array(
                'title' => esc_html__('Typography Setting','bloggerbuz-pro'),
                'priority' => 40,
            )
        );  
      // Typography Sections
     $wp_customize->add_section(
            'bloggerbuz_body_typography',
            array(
                'title' => esc_html__('Body Typography Setting','bloggerbuz-pro'),
                'priority' => 2,
                'capability' => 'edit_theme_options',
                'theme_support' => '',
                'panel' => 'bloggerbuz_typography'
            )
        ); 
      $wp_customize->add_section(
            'bloggerbuz_h1_typography',
            array(
                'title' => esc_html__('Heading 1 Typography Setting','bloggerbuz-pro'),
                'priority' => 4,
                'capability' => 'edit_theme_options',
                'theme_support' => '',
                'panel' => 'bloggerbuz_typography'
            )
        );
        $wp_customize->add_section(
            'bloggerbuz_h2_typography',
            array(
                'title' => esc_html__('Heading 2 Typography Setting','bloggerbuz-pro'),
                'priority' => 6,
                'capability' => 'edit_theme_options',
                'theme_support' => '',
                'panel' => 'bloggerbuz_typography'
            )
        );
        $wp_customize->add_section(
            'bloggerbuz_h3_typography',
            array(
                'title' => esc_html__('Heading 3 Typography Setting','bloggerbuz-pro'),
                'priority' => 8,
                'capability' => 'edit_theme_options',
                'theme_support' => '',
                'panel' => 'bloggerbuz_typography'
            )
        );
        $wp_customize->add_section(
            'bloggerbuz_h4_typography',
            array(
                'title' => esc_html__('Heading 4 Typography Setting','bloggerbuz-pro'),
                'priority' => 9,
                'capability' => 'edit_theme_options',
                'theme_support' => '',
                'panel' => 'bloggerbuz_typography'
            )
        );
        $wp_customize->add_section(
            'bloggerbuz_h5_typography',
            array(
                'title' => esc_html__('Heading 5 Typography Setting','bloggerbuz-pro'),
                'priority' => 10,
                'capability' => 'edit_theme_options',
                'theme_support' => '',
                'panel' => 'bloggerbuz_typography'
            )
        );
        $wp_customize->add_section(
            'bloggerbuz_h6_typography',
            array(
                'title' => esc_html__('Heading 6 Typography Setting','bloggerbuz-pro'),
                'priority' => 11,
                'capability' => 'edit_theme_options',
                'theme_support' => '',
                'panel' => 'bloggerbuz_typography'
            )
        );
        // Typography Setting Control
        $wp_customize->add_setting(
            'bloggerbuz_body_font_size',
            array(
                'default' => '',
                'transport'=>'postMessage',
                'sanitize_callback'=>'absint'
            )
        );
         $wp_customize->add_control(
            'bloggerbuz_body_font_size',
            array(
                'label' => esc_html__('Body Font Size','bloggerbuz-pro'),
                'priority' => 2,
                'type' => 'select',
                'choices' => $bloggerbuz_font_size,
                'section' => 'bloggerbuz_body_typography'
            )
         );
        $wp_customize->add_setting(
            'bloggerbuz_h1_font_size',
            array(
                'default' => '',
                'transport'=>'postMessage',
                'sanitize_callback'=>'absint'
            )
        );
        $wp_customize->add_control(
            'bloggerbuz_h1_font_size',
            array(
                'label' => esc_html__('Heading 1 Font Size','bloggerbuz-pro'),
                'priority' => 2,
                'type' => 'select',
                'choices' => $bloggerbuz_font_size,
                'section' => 'bloggerbuz_h1_typography'
            )
         );
        $wp_customize->add_setting(
            'bloggerbuz_h2_font_size',
            array(
                'default' => '',
                'transport'=>'postMessage',
                'sanitize_callback'=>'absint'
            )
        );
        $wp_customize->add_control(
            'bloggerbuz_h2_font_size',
            array(
                'label' => esc_html__('Heading 2 Font Size','bloggerbuz-pro'),
                'priority' => 2,
                'type' => 'select',
                'choices' => $bloggerbuz_font_size,
                'section' => 'bloggerbuz_h2_typography'
            )
         );
        $wp_customize->add_setting(
            'bloggerbuz_h3_font_size',
            array(
                'default' => '',
                'transport'=>'postMessage',
                'sanitize_callback'=>'absint'
            )
        );
        $wp_customize->add_control(
            'bloggerbuz_h3_font_size',
            array(
                'label' => esc_html__('Heading 3 Font Size','bloggerbuz-pro'),
                'priority' => 2,
                'type' => 'select',
                'choices' => $bloggerbuz_font_size,
                'section' => 'bloggerbuz_h3_typography'
            )
         );
        $wp_customize->add_setting(
            'bloggerbuz_h4_font_size',
            array(
                'default' => '',
                'transport'=>'postMessage',
                'sanitize_callback'=>'absint'
            )
        );
        $wp_customize->add_control(
            'bloggerbuz_h4_font_size',
            array(
                'label' => esc_html__('Heading 4 Font Size','bloggerbuz-pro'),
                'priority' => 2,
                'type' => 'select',
                'choices' => $bloggerbuz_font_size,
                'section' => 'bloggerbuz_h4_typography'
            )
         );
        $wp_customize->add_setting(
            'bloggerbuz_h5_font_size',
            array(
                'default' => '',
                'transport'=>'postMessage',
                'sanitize_callback'=>'absint'
            )
        );
        $wp_customize->add_control(
            'bloggerbuz_h5_font_size',
            array(
                'label' => esc_html__('Heading 5 Font Size','bloggerbuz-pro'),
                'priority' => 2,
                'type' => 'select',
                'choices' => $bloggerbuz_font_size,
                'section' => 'bloggerbuz_h5_typography'
            )
         );
        $wp_customize->add_setting(
            'bloggerbuz_h6_font_size',
            array(
                'default' => '',
                'transport'=>'postMessage',
                'sanitize_callback'=>'absint'
            )
        );
        $wp_customize->add_control(
            'bloggerbuz_h6_font_size',
            array(
                'label' => esc_html__('Heading 6 Font Size','bloggerbuz-pro'),
                'priority' => 2,
                'type' => 'select',
                'choices' => $bloggerbuz_font_size,
                'section' => 'bloggerbuz_h6_typography'
            )
         );
      $wp_customize->add_setting(
            'bloggerbuz_body_font',
            array(
                'default' => '',
                'transport'=>'postMessage',
                'sanitize_callback'=>'sanitize_text_field'
            )
        );
        $wp_customize->add_control(
            'bloggerbuz_body_font',
            array(
                'label' => esc_html__('Body Font','bloggerbuz-pro'),
                'priority' => 4,
                'type' => 'select',
                'choices' => $bloggerbuz_fonts_list,
                'section' => 'bloggerbuz_body_typography'
            )
         );
        $wp_customize->add_setting(
            'bloggerbuz_h1_font',
            array(
                'default' => '',
                'transport'=>'postMessage',
                'sanitize_callback'=>'sanitize_text_field'
            )
        );
        $wp_customize->add_control(
            'bloggerbuz_h1_font',
            array(
                'label' => esc_html__('Heading 1 Font','bloggerbuz-pro'),
                'priority' => 4,
                'type' => 'select',
                'choices' => $bloggerbuz_fonts_list,
                'section' => 'bloggerbuz_h1_typography'
            )
         );
        $wp_customize->add_setting(
            'bloggerbuz_h2_font',
            array(
                'default' => '',
                'transport'=>'postMessage',
                'sanitize_callback'=>'sanitize_text_field'
            )
        );
        $wp_customize->add_control(
            'bloggerbuz_h2_font',
            array(
                'label' => esc_html__('Heading 2 Font','bloggerbuz-pro'),
                'priority' => 4,
                'type' => 'select',
                'choices' => $bloggerbuz_fonts_list,
                'section' => 'bloggerbuz_h2_typography'
            )
         );
        $wp_customize->add_setting(
            'bloggerbuz_h3_font',
            array(
                'default' => '',
                'transport'=>'postMessage',
                'sanitize_callback'=>'sanitize_text_field'
            )
        );
        $wp_customize->add_control(
            'bloggerbuz_h3_font',
            array(
                'label' => esc_html__('Heading 3 Font','bloggerbuz-pro'),
                'priority' => 4,
                'type' => 'select',
                'choices' => $bloggerbuz_fonts_list,
                'section' => 'bloggerbuz_h3_typography'
            )
         );
        $wp_customize->add_setting(
            'bloggerbuz_h4_font',
            array(
                'default' => '',
                'transport'=>'postMessage',
                'sanitize_callback'=>'sanitize_text_field'
            )
        );
        $wp_customize->add_control(
            'bloggerbuz_h4_font',
            array(
                'label' => esc_html__('Heading 4 Font','bloggerbuz-pro'),
                'priority' => 4,
                'type' => 'select',
                'choices' => $bloggerbuz_fonts_list,
                'section' => 'bloggerbuz_h4_typography'
            )
         );
        $wp_customize->add_setting(
            'bloggerbuz_h5_font',
            array(
                'default' => '',
                'transport'=>'postMessage',
                'sanitize_callback'=>'sanitize_text_field'
            )
        );
        $wp_customize->add_control(
            'bloggerbuz_h5_font',
            array(
                'label' => esc_html__('Heading 5 Font','bloggerbuz-pro'),
                'priority' => 4,
                'type' => 'select',
                'choices' => $bloggerbuz_fonts_list,
                'section' => 'bloggerbuz_h5_typography'
            )
         );
        $wp_customize->add_setting(
            'bloggerbuz_h6_font',
            array(
                'default' => '',
                'transport'=>'postMessage',
                'sanitize_callback'=>'sanitize_text_field'
            )
        );
        $wp_customize->add_control(
            'bloggerbuz_h6_font',
            array(
                'label' => esc_html__('Heading 6 Font','bloggerbuz-pro'),
                'priority' => 4,
                'type' => 'select',
                'choices' => $bloggerbuz_fonts_list,
                'section' => 'bloggerbuz_h6_typography'
            )
         );
          $wp_customize->add_setting(
            'bloggerbuz_body_font_transform',
            array(
                'default' => '',
                'transport'=>'postMessage',
                'sanitize_callback'=>'sanitize_text_field'
            )
        );
        $wp_customize->add_control(
            'bloggerbuz_body_font_transform',
            array(
                'label' => esc_html__('Body Font Transform','bloggerbuz-pro'),
                'priority' => 4,
                'type' => 'select',
                'choices' => $bloggerbuz_text_transform,
                'section' => 'bloggerbuz_body_typography'
            )
         );
        $wp_customize->add_setting(
            'bloggerbuz_h1_font_transform',
            array(
                'default' => '',
                'transport'=>'postMessage',
                'sanitize_callback'=>'sanitize_text_field'
            )
        );
        $wp_customize->add_control(
            'bloggerbuz_h1_font_transform',
            array(
                'label' => esc_html__('Heading 1 Font Transform','bloggerbuz-pro'),
                'priority' => 4,
                'type' => 'select',
                'choices' => $bloggerbuz_text_transform,
                'section' => 'bloggerbuz_h1_typography'
            )
        );
        $wp_customize->add_setting(
            'bloggerbuz_h2_font_transform',
            array(
                'default' => '',
                'transport'=>'postMessage',
                'sanitize_callback'=>'sanitize_text_field'
            )
        );
        $wp_customize->add_control(
            'bloggerbuz_h2_font_transform',
            array(
                'label' => esc_html__('Heading 2 Font Transform','bloggerbuz-pro'),
                'priority' => 4,
                'type' => 'select',
                'choices' => $bloggerbuz_text_transform,
                'section' => 'bloggerbuz_h2_typography'
            )
        );
        $wp_customize->add_setting(
            'bloggerbuz_h3_font_transform',
            array(
                'default' => '',
                'transport'=>'postMessage',
                'sanitize_callback'=>'sanitize_text_field'
            )
        );
        $wp_customize->add_control(
            'bloggerbuz_h3_font_transform',
            array(
                'label' => esc_html__('Heading 3 Font Transform','bloggerbuz-pro'),
                'priority' => 4,
                'type' => 'select',
                'choices' => $bloggerbuz_text_transform,
                'section' => 'bloggerbuz_h3_typography'
            )
        );
        $wp_customize->add_setting(
            'bloggerbuz_h4_font_transform',
            array(
                'default' => '',
                'transport'=>'postMessage',
                'sanitize_callback'=>'sanitize_text_field'
            )
        );
        $wp_customize->add_control(
            'bloggerbuz_h4_font_transform',
            array(
                'label' => esc_html__('Heading 4 Font Transform','bloggerbuz-pro'),
                'priority' => 4,
                'type' => 'select',
                'choices' => $bloggerbuz_text_transform,
                'section' => 'bloggerbuz_h4_typography'
            )
        );
        $wp_customize->add_setting(
            'bloggerbuz_h5_font_transform',
            array(
                'default' => '',
                'transport'=>'postMessage',
                'sanitize_callback'=>'sanitize_text_field'
            )
        );
        $wp_customize->add_control(
            'bloggerbuz_h5_font_transform',
            array(
                'label' => esc_html__('Heading 5 Font Transform','bloggerbuz-pro'),
                'priority' => 4,
                'type' => 'select',
                'choices' => $bloggerbuz_text_transform,
                'section' => 'bloggerbuz_h5_typography'
            )
        );
        $wp_customize->add_setting(
            'bloggerbuz_h6_font_transform',
            array(
                'default' => '',
                'transport'=>'postMessage',
                'sanitize_callback'=>'sanitize_text_field'
            )
        );
        $wp_customize->add_control(
            'bloggerbuz_h6_font_transform',
            array(
                'label' => esc_html__('Heading 6 Font Transform','bloggerbuz-pro'),
                'priority' => 4,
                'type' => 'select',
                'choices' => $bloggerbuz_text_transform,
                'section' => 'bloggerbuz_h6_typography'
            )
        );
        
        
}
add_action( 'customize_register', 'bloggerbuz_customize_register' );


function bloggerbuz_customize_backend_scripts() {
  
  wp_enqueue_style( 'bloggerbuz-customizer-style', get_template_directory_uri() . '/inc/css/customizer-style.css' );
  
}
add_action( 'customize_controls_enqueue_scripts', 'bloggerbuz_customize_backend_scripts', 10 );