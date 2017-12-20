<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bloggerbuz
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11"> 
    <?php wp_head(); ?>
    
</head>
<body <?php body_class(); ?>>
    <?php  $bloggerbuz_header_layout = get_theme_mod('bloggerbuz_header_layout','layout-1');?> 
   <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'bloggerbuz-pro' ); ?></a>    
         <?php  
               $bt_logo_alignment = '';
                $bt_nav_alignment = '';                              
                if($bt_nav=='left'){
                    $bt_logo_alignment = 'logo-left';
                    $bt_nav_alignment = 'menu-left';
                } 
                else{
                    $bt_logo_alignment = 'logo-center';
                    $bt_nav_nav_alignment = 'menu-center';
                } 
            ?>   
            <?php  $bt_logo_alignment = get_theme_mod('bloggerbuz_logo_alignment','left');?>
        <header id="masthead" class="site-header <?php echo esc_attr($bt_logo_alignment);?>  <?php echo esc_attr($bloggerbuz_header_layout); ?> " role="banner">
               <?php if($bloggerbuz_header_layout == 'layout-3' ){ ?>
                        <div class="header_social_search_wrap clearfix">
                            <div class="container">
                                <div class="footer_social_icon_front_footer">
                                 <?php 
                                 $bloggerbuz_header_social_link = get_theme_mod('bloggerbuz_footer_social_icon_enable');
                                 if($bloggerbuz_header_social_link){
                                 do_action('bloggerbuz_header_footer_social_link_action');
                                 } ?>
                              </div>
                                <?php if(get_theme_mod('bloggerbuz_hide_header_search')!='1'){ ?>
                                    <div class="header-search ">
                                        <div class="search-button"> 
                                            <a href="" class="search-toggle" data-selector="#masthead"> </a>
                                        </div>
                                        <?php get_search_form();?>
                                    </div>   
                                <?php } ?> 
                             </div>   
                        </div>
                           <?php  $bt_logo_alignment = get_theme_mod('bloggerbuz_logo_alignment','left');?>
                           <div class="logo-wrp">
                            <div class="container">
                                <div class="site-text">
                                        <?php if(get_theme_mod('custom_logo')){
                                            the_custom_logo();
                                        }else{ ?>
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                            <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
                                            <p class="site-description"><?php bloginfo( 'description' ); ?></p>
                                        </a>
                                        <?php } ?>
                                    </div>
                                    <label for="toggle" class="icon">
                                            <span class="ham"> </span>
                                    </label>
                                </div>
                            </div>
                    <?php } ?>
		    <nav id="site-navigation" class="main-navigation" role="navigation">
                <div class="container">
                     <?php if($bloggerbuz_header_layout == 'layout-3' ){ ?>
                      <?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
                       <?php } ?>
                      <?php if($bloggerbuz_header_layout != 'layout-3' ){ ?>
                        <div class="site-text">
                            <?php if(get_theme_mod('custom_logo')){
                                the_custom_logo();
                            }else{ ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
                                <p class="site-description"><?php bloginfo( 'description' ); ?></p>
                            </a>
                            <?php } ?>
                            <?php } ?>
                        </div>
                        
                         <?php if($bloggerbuz_header_layout != 'layout-3' ){ ?>
                            <div class="menu-search-wrp">
                            <?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
                            <label for="toggle" class="icon">
                                <span class="ham"> </span>
                            </label>
                            <div class="header_social_search_wrap clearfix">
                              <?php if(get_theme_mod('bloggerbuz_hide_header_search')!='1'){ ?>
                                    <div class="header-search ">
                                      <?php } ?>
                                        <div class="search-button"> 
                                            <a href="#" class="search-toggle" data-selector="#masthead"></a>
                                        </div>
                                        <?php get_search_form();?>
                                    </div>
                                <?php } ?>
                                </div> 
                            </div>
                    </div>
            </nav><!-- #site-navigation -->  
         </header><!-- #masthead -->      
<div id="content" class="site-content">
<?php 
if(!is_home() && !is_front_page()){
    do_action('bloggerbuz_title'); 
}
?>