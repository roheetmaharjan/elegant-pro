<?php
/**
 * bloggerbuz functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bloggerbuz
 */ 
    
if ( ! function_exists( 'bloggerbuz_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bloggerbuz_setup() {


	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on bloggerbuz, use a find and replace
	 * to change 'bloggerbuz' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'bloggerbuz-pro', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'bloggerbuz-pro' ),
	) );
    
    add_image_size ('bloggerbuz-slider-thumb', 1155, 513, true);
    add_image_size ('bloggerbuz-recent-post-thumb', 510, 340, true);
    add_image_size ('bloggerbuz-feature-thumb', 380, 255, true);
    add_image_size ('bloggerbuz-grid-thumb', 660, 445, true);
    add_image_size ('bloggerbuz-author-thumb', 355, 455, true);
    add_image_size ('bloggerbuz-list-thumb', 338, 318, true);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
    
    //Custom Logo
    add_theme_support( 'custom-logo', array(
		'height'      => 55,
		'width'       => 225,
		'flex-width' => true,
        'flex-height' => true,
	) );
    
	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'bloggerbuz_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add themepor support for selective refresh for widgets.
	/*add_theme_supt( 'customize-selective-refresh-widgets' );*/
add_theme_support( 'customize-selective-refresh-widgets' );	
}
endif;
add_action( 'after_setup_theme', 'bloggerbuz_setup' );

function bloggerbuz_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url', 'display' ) );
	}
}
add_action( 'wp_head', 'bloggerbuz_pingback_header' );

/** Content Width Define **/
function bloggerbuz_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bloggerbuz_content_width', 800 );
}
add_action( 'after_setup_theme', 'bloggerbuz_content_width', 0 );

/** Widget Area **/
function bloggerbuz_widgets_init(){
	register_sidebar( array(
        'name' => esc_html__('Right Sidebar','bloggerbuz-pro'),
        'id' => 'bloggerbuz-right-side-bar',
        'description' => esc_html__('Appears in  footer area','bloggerbuz-pro'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
     
   register_sidebar( array(
        'name' => esc_html__('Left Sidebar','bloggerbuz-pro'),
        'id' => 'bloggerbuz-sidebar-left',
        'description' => esc_html__('Appears in the footer area','bloggerbuz-pro'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    
	register_sidebar( array(
        'name' => esc_html__('Footer One','bloggerbuz-pro'),
        'id' => 'bloggerbuz-footer-one',
        'description' => esc_html__('Appears in the buttom of footer area','bloggerbuz-pro'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    
    register_sidebar( array(
        'name' => esc_html__('Footer Two','bloggerbuz-pro'),
        'id' => 'bloggerbuz-footer-two',
        'description' => esc_html__('Appears in the footer area','bloggerbuz-pro'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    
    register_sidebar( array(
        'name' => esc_html__('Footer Three','bloggerbuz-pro'),
        'id' => 'bloggerbuz-footer-three',
        'description' => esc_html__('Appears in the footer area','bloggerbuz-pro'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );

}
add_action('widgets_init','bloggerbuz_widgets_init');

/** Enqueue function **/
function bloggerbuz_scripts() {

        wp_enqueue_script( 'google-font-ajax','https://ajax.googleapis.com/ajax/libs/webfont/1.5.18/webfont.js');
        $bloggerbuz_font_args = array(
        'family' => 'Open+Sans:400,600,700,800,300|PT+Sans:400,700|Lato:400,700,300|BenchNine:300|Roboto+Slab:300|Source+Sans+Pro:400,300,600,700|Raleway:400,500,600,700,800,300|Roboto:400,500,600,700,800,300|Rubik:400,500,700|Roboto+Slab:300,400,700|Hind:400,500,600,700|Questrial|Great+Vibes|Libre+Baskerville:400,400i,700',
    );
    wp_enqueue_style( 'bloggerbuz-google-fonts', add_query_arg( $bloggerbuz_font_args, "//fonts.googleapis.com/css" ) );
        wp_enqueue_style( 'bloggerbuz-google-fonts', add_query_arg($bloggerbuz_font_query_args, "//fonts.googleapis.com/css"));
        wp_enqueue_style('font-awesome',get_template_directory_uri().'/css/fawesome/css/font-awesome.css');
         wp_enqueue_style('animate',get_template_directory_uri().'/js/animate/animate.css');
        wp_enqueue_style('owl-carousel',get_template_directory_uri().'/js/owl-carousel/owl.carousel.css');
        wp_enqueue_style('bloggerbuz-style', get_stylesheet_uri() );
        wp_enqueue_style('bloggerbuz-responsive', get_template_directory_uri() . '/css/responsive.css');
        
        wp_enqueue_script('owl-carousel',get_template_directory_uri().'/js/owl-carousel/owl.carousel.js',array('jquery'));
        wp_enqueue_script('parallax',get_template_directory_uri().'/js/parallax.min.js',array('jquery'));
        wp_enqueue_script('theia-sticky-sidebar',get_template_directory_uri().'/js/theia-sticky-sidebar/theia-sticky-sidebar.js',array('jquery'));

        wp_enqueue_script( 'bloggerbuz-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
        wp_enqueue_script('bloggerbuz-custom-js',get_template_directory_uri().'/js/custom.js', array('jquery'), '',true);
        wp_enqueue_script( 'the-multiple-wow', get_template_directory_uri() . '/js/wow.js', array('jquery'), '1.1.3', true );
        
    	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    		wp_enqueue_script( 'comment-reply' );
    	}
}
add_action( 'wp_enqueue_scripts', 'bloggerbuz_scripts' );

/** Customizer Enqueue **/
function bloggerbuz_customizer_enqueue() {
       wp_enqueue_script( 'bloggerbuz-customizer-script', get_template_directory_uri() . '/js/bloggerbuz-customizer-script.js', array( 'jquery', 'customize-controls' ), false );
        wp_enqueue_script('bloggerbuz-admin-script',get_template_directory_uri().'/inc/js/admin.js',array('jquery', 'customize-controls'), true);
   }
add_action( 'customize_controls_enqueue_scripts', 'bloggerbuz_customizer_enqueue' );

/** Custoizer Live Preview Enqueue Fsunction **/
function bloggerbuz_customize_preview_js() {
	wp_enqueue_script( 'bloggerbuz-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'bloggerbuz_customize_preview_js' );

/** Metaboxe **/
require get_template_directory() . '/inc/bloggerbuz-metabox.php';

/** Custom template tags for this theenqume. **/
require get_template_directory() . '/inc/template-tags.php';

/** Recent Post Widget **/
require get_template_directory() . '/inc/widgets/widgets-recent-post.php';

/** Recent Post Widget **/
require get_template_directory() . '/inc/widgets/widgets-author.php';

/** Widget Fields **/
require get_template_directory() . '/inc/widgets/widgets-field.php';

/** Extra Functions **/
require get_template_directory() . '/inc/extras.php';


/** Customizer Option **/
require get_template_directory() . '/inc/customizer.php';

/** Customizer Classes **/
require get_template_directory() . '/inc/customizer-classes.php';

/**
 * Dynamic Style
 */
require  get_template_directory()  . '/css/dynamic-style.php';


/* Google Font List*/
require get_template_directory() . '/inc/bloggerbuz-google-fonts.php';

/**
 * Demo Importer
 */
require get_template_directory() . '/inc/demo-import/demo-importer.php';

// Enable shortcodes in text widgets
add_filter('widget_text','do_shortcode');

/** Sidebar Functions **/
if( ! function_exists( 'bloggerbuz_get_sidebar' ) ):
    function bloggerbuz_get_sidebar() {
        $sidebar_meta_option = 'sidebar-right';
        global $post;
        if (is_home() && is_front_page()){
            
            $sidebar_meta_option = get_theme_mod( 'bloggerbuz_sidebar_layout', 'sidebar-right' );
            if( $sidebar_meta_option == 'sidebar-right' || $sidebar_meta_option == 'sidebar-both' || $sidebar_meta_option == '') {
                get_sidebar();
            }
            if($sidebar_meta_option == 'sidebar-left' || $sidebar_meta_option == 'sidebar-both'){
                get_sidebar('left');
            }
        }
        elseif(is_archive()){
            get_sidebar();
        }else{
        
            if( 'post' === get_post_type() ) {
                $sidebar_meta_option = get_post_meta( $post->ID, 'bloggerbuz_sidebar_layout', true );
            }
        
            if( 'page' === get_post_type() ) {
            	$sidebar_meta_option = get_post_meta( $post->ID, 'bloggerbuz_sidebar_layout', true );
            }
            
            if( $sidebar_meta_option == 'sidebar-right' || $sidebar_meta_option == 'sidebar-both' || $sidebar_meta_option == '') {
                get_sidebar();
            }
            
            if($sidebar_meta_option == 'sidebar-both' || $sidebar_meta_option == 'sidebar-left'){
                get_sidebar( 'left' );
            }
        
        }
    
    }
endif;

/** Bloggerbuz category **/
function bloggerbuz_category_lists(){
  $category 	=	get_categories();
  $cat_list 	=	array();
  $cat_list[0]=	esc_html__('Select category','bloggerbuz-pro');
  foreach ($category as $cat) {
     $cat_list[$cat->slug]	=	$cat->name;
  }
 return $cat_list;
}

/** BLoggerbuz Posts List **/
function bloggerbuz_post_list(){
    $options_posts = array();
    $options_posts_obj = get_posts('posts_per_page=-1');
    $options_posts[''] = esc_html__('Select a Post:','bloggerbuz-pro');
    foreach ($options_posts_obj as $post) {
        $options_posts[$post->ID] = $post->post_title;
    }
    return $options_posts;
}

/** Font Size List **/
function bloggerbuz_font_size(){
     $font_size[''] = esc_html__('Default','bloggerbuz-pro');
    for($i=12;$i<=70;$i++)
    {
        $font_size[$i] = $i;
    }
   
    return $font_size;
}

/** Text Transform Function **/
function bloggerbuz_text_transform(){
    return $bloggerbuz_text_transform = array(
        '' => esc_html__('--Default--','bloggerbuz-pro'),
        'inherit' => 'Normal',
        'uppercase' => 'Uppercase',
        'lowercase' => 'Lowercase',
        'capitalize' => 'Capitalize',
    );
}
//** Fonts List **/

function bloggerbuz_fonts_list(){
    $bloggerbuz_fonts = get_option('bloggerbuz_fontlist');
    $bloggerbuz_fonts_list = array();
    $bloggerbuz_fonts_list[''] = esc_html__('--Default--','bloggerbuz-pro');
    foreach($bloggerbuz_fonts as $bloggerbuz_font){
        $bloggerbuz_font_family = $bloggerbuz_font['family'];
        $bloggerbuz_fonts_list[$bloggerbuz_font_family] = $bloggerbuz_font_family;
    }
    return $bloggerbuz_fonts_list;
}
/** Slider Funtion **/
function bloggerbuz_home_slider_cb(){
  
    if(get_theme_mod('bloggerbuz_homepage_setting_slider_section_option','no') == 'yes'):
        $bloggerbuz_slider_layout = get_theme_mod('bloggerbuz_slider_layout','layout-1');
        $slider_cat =   esc_attr(get_theme_mod('bloggerbuz_homepage_setting_slider_section_category',''));
        $slider_readmore = get_theme_mod('bloggerbuz_homepage_setting_slider_section_readmore',esc_html__('Get Started','bloggerbuz-pro'));
        if(!empty($slider_cat) || $slider_cat!= 0):
            $args = array('post_type' => 'post', 'posts_per_page' =>-1, 'category_name' => $slider_cat);
    
            $args_query = new WP_Query($args);  
            if ($args_query->have_posts()) :        
                ?>
    
                <section id="slider" class="header-slider <?php echo esc_attr($bloggerbuz_slider_layout); ?>">
                 <?php if($bloggerbuz_slider_layout  == 'layout-2'){ ?>
                <div class="main-slider-up">
                    <?php } ?>
                    <?php if($bloggerbuz_slider_layout != 'layout-2' ){ ?>
                   <ul class="main-slider">
                    <?php } ?>
                        <?php
                         if($bloggerbuz_slider_layout == 'revolution'){
                             $rev_slider_shortcode = get_theme_mod('rev_slider_shortcode');
                                echo $rev_slider_shortcode;
                            }
                        while ($args_query->have_posts()):
                            $args_query->the_post();
                            $main_slider_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'bloggerbuz-slider-thumb');
                        ?>
                            <div class="slide">
                                    <div class="container">
                                        <?php if(has_post_thumbnail()): ?>
                                        <div class="slider-image">
                                            <img src="<?php echo esc_url($main_slider_image[0]); ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" />
                                        </div>
                                        <?php endif; ?>
                                        <div class="bt-slider-content">                                        
                                            <h2 class="caption-title"><?php the_title();?></h2>
                                            <div class="slider-desc">
                                                <?php echo esc_attr(wp_trim_words(get_the_content(),30,'&hellip;')); ?>
                                            </div>
                                            <?php if($bloggerbuz_slider_layout  == 'layout-3'){ ?>
                                        <div class="date_comment_author">
                                           <div class="wrap11">
                                                <span class="date_post"><?php echo esc_attr(get_the_date(get_option('date_format'))); ?></span>
                                                <span class="author_post"><?php  echo esc_url(the_author_posts_link()); ?></span>
                                            </div>        
                                           </div>
                                         <?php } ?>
                                            <?php if($bloggerbuz_slider_layout != 'layout-3' ){ ?>
                                            <div class="read-more">
                                            <?php
                                            if(!empty($slider_readmore)){
                                            ?>
                                            <a href="<?php the_permalink();?>" class="slide-readmore"><?php echo esc_html($slider_readmore);?></a>
                                            <?php
                                            }
                                            ?>
                                            </div>
                                            <?php } ?>
                                        </div>

                                    </div>
                            </div>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        ?> 
                    </ul>
                    </div>
                </section>
            <?php 
            endif;
        endif;
    endif;
}
add_action('bloggerbuz_home_slider','bloggerbuz_home_slider_cb',10);

// function to add social icons
function bloggerbuz_header_footer_social_link(){
        $facebooklink =  get_theme_mod('bloggerbuz_facebook_text');
        $twitterlink =  get_theme_mod('bloggerbuz_twitter_text');
        $google_pluslink =  get_theme_mod('bloggerbuz_googleplus_text');
        $youtubelink = get_theme_mod('bloggerbuz_youtube_text');
        $pinterestlink = get_theme_mod('bloggerbuz_pinterest_text');
        $linkedinlink = get_theme_mod('bloggerbuz_linkedin_text');
        $instagramlink =  get_theme_mod('bloggerbuz_instagram_text');
      ?>
        <div class="social-icons ">
            <?php if(!empty($facebooklink)){?>
                <a href="<?php echo esc_url($facebooklink); ?>" class="facebook" target="_blank"><i class="fa fa-facebook"></i><span></span></a>
                <?php } ?>
                
            <?php if(!empty($twitterlink)){?>
            <a href="<?php echo esc_url($twitterlink); ?>" class="twitter" target="_blank"><i class="fa fa-twitter"></i><span></span></a>
            <?php } ?>

            <?php if(!empty($google_pluslink)){?>
            <a href="<?php echo esc_url($google_pluslink); ?>" class="gplus" target="_blank"><i class="fa fa-google-plus"></i><span></span></a>
            <?php } ?>

            <?php if(!empty($youtubelink)){ ?>
            <a href="<?php echo esc_url($youtubelink); ?>" class="youtube" target="_blank"><i class="fa fa-youtube"></i><span></span></a>
            <?php } ?>

            <?php if(!empty($pinterestlink)){ ?>
            <a href="<?php echo esc_url($pinterestlink); ?>" class="pinterest"  target="_blank"><i class="fa fa-pinterest"></i><span></span></a>
            <?php } ?>

            <?php if(!empty($linkedinlink)){ ?>
            <a href="<?php echo esc_url($linkedinlink); ?>" class="linkedin"target="_blank"><i class="fa fa-linkedin"></i><span></span></a>
            <?php } ?>

            <?php if(!empty($instagramlink)){ ?>
            <a href="<?php echo esc_url($instagramlink); ?>" class="instagram" target="_blank"><i class="fa fa-instagram"></i><span></span></a>
            <?php } ?>

        </div>
        <?php
}
add_action('bloggerbuz_header_footer_social_link_action','bloggerbuz_header_footer_social_link');

if ( class_exists( 'WP_Customize_Control' ) ) {
    class WP_Customize_Demo_import_one extends WP_Customize_Control{
        public function render_content() {?>
            <label>
                <?php if ( ! empty( $this->label ) ) : ?>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <?php endif; ?>
                <div class="first-demo">
                    <a href="#" class="demo-import-button"  id="demo-1"><?php echo esc_html__('Demo One','bloggerbuz-pro'); ?></a>
                    <div class=""></div>
                    <div class="info-importing"><?php echo esc_html__('Click On "Demo One" Button to import Demo One','bloggerbuz-pro'); ?></div>
                </div>
            </label>
            <?php
        }
    }

    class WP_Customize_Demo_import_two extends WP_Customize_Control{
        public function render_content() {?>
            <label>
                <?php if ( ! empty( $this->label ) ) : ?>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <?php endif; ?>
                <div class="second-demo">
                    <a href="#" class="demo-import-button"  id="demo-2"><?php echo esc_html__('Demo Two','bloggerbuz-pro'); ?></a>
                    <div class=""></div>
                    <div class="info-importing"><?php echo esc_html__('Click On "Demo Two" Button to import Demo Two','bloggerbuz-pro'); ?></div>
                </div>
            </label>
            <?php
        }
    }
     class WP_Customize_Demo_import_three extends WP_Customize_Control{
        public function render_content() {?>
            <label>
                <?php if ( ! empty( $this->label ) ) : ?>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <?php endif; ?>
                <div class="third-demo">
                    <a href="#" class="demo-import-button"  id="demo-3"><?php echo esc_html__('Demo Three','bloggerbuz-pro'); ?></a>
                    <div class=""></div>
                    <div class="info-importing"><?php echo esc_html__('Click On "Demo Three" Button to import Demo Three','bloggerbuz-pro'); ?></div>
                </div>
            </label>
            <?php
        }
    }

    class WP_Customize_Demo_import_four extends WP_Customize_Control{
        public function render_content() {?>
            <label>
                <?php if ( ! empty( $this->label ) ) : ?>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <?php endif; ?>
                <div class="four-demo">
                    <a href="#" class="demo-import-button"  id="demo-4"><?php echo esc_html__('Demo Four','bloggerbuz-pro'); ?></a>
                    <div class=""></div>
                    <div class="info-importing"><?php echo esc_html__('Click On "Demo Four" Button to import Demo Four','bloggerbuz-pro'); ?></div>
                </div>
            </label>
            <?php
        }
    }

     class WP_Customize_Demo_import_five extends WP_Customize_Control{
        public function render_content() {?>
            <label>
                <?php if ( ! empty( $this->label ) ) : ?>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <?php endif; ?>
                <div class="four-five">
                    <a href="#" class="demo-import-button"  id="demo-5"><?php echo esc_html__('Demo five','bloggerbuz-pro'); ?></a>
                    <div class=""></div>
                    <div class="info-importing"><?php echo esc_html__('Click On "Demo Five" Button to import Demo Five','bloggerbuz-pro'); ?></div>
                </div>
            </label>
            <?php
        }
    }
}
/** Exclude Categories On Recent Post **/
function bloggerbuz_exclude_category_front_page($query) {
    
   $exclude_category = esc_attr(get_theme_mod('bloggerbuz_exclude_category')); 
   $ex_cats = explode(',', $exclude_category);
   array_pop($ex_cats);
   
   if ( $query->is_home() ) {
       $query->set('category__not_in', $ex_cats);
   }
   return $query;
   
}
add_filter('pre_get_posts', 'bloggerbuz_exclude_category_front_page');

function bloggerbuz_page_lists(){
    $pages = get_pages();
    $page_lists = array();
    $page_lists[0] = esc_html__('Select Page', 'bloggerbuz-pro'); 
    foreach($pages as $page) :
        $page_lists[$page->ID] = $page->post_title;
    endforeach;
    return $page_lists;
}
