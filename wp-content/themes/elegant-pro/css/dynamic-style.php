<?php
/** Dynamic css function **/
function bloggerbuz_dynamic_style(){
    $bloggerbuz_theme_color = get_theme_mod('bloggerbuz_theme_color');
    $bloggerbuz_style_css = '';
    
    if($bloggerbuz_theme_color){
        $bloggerbuz_style_css .= " .bloggerbuz-slider-wrapper .slide-readmore,.header-slider.layout-2 .slide-readmore,.highlighted.layout-2 span.date_post-layout-two, .highlighted.layout-2 span.author_post-layout-two, .highlighted.layout-2 span.cmts,.video-section-wrap.layout-3 .section-title::after,.content_wrap_full a.continue_link:hover,.widget_search input.search-field:focus,.comment-form textarea:focus, .comment-form input:focus, .page .wpcf7 input:focus, .single .wpcf7 input:focus{border-color:$bloggerbuz_theme_color}";
        $bloggerbuz_style_css .= " .highlighted.layout-3 .continue_link{outline-color:$bloggerbuz_theme_color}";
        $bloggerbuz_style_css .= " .bloggerbuz-slider-wrapper .slide-readmore,.highlighted-img .date_comment_author,.header-slider.layout-2 .slide-readmore,.widget_search input.search-submit,.highlighted.layout-2 span.date_post-layout-two, .highlighted.layout-2 span.author_post-layout-two, .highlighted.layout-2 span.cmts,.highlighted.layout-3 .continue_link,#footer-one .widget-title:after, #footer-two .widget-title:after, #footer-three .widget-title:after,#ed-top,.form-submit .submit, .wpcf7-form-control .wpcf7-submit,article.post_content_article .date_comment_author::after,.main-navigation input.search-submit,.tagcloud .tag-cloud-link:hover,.list-home .bloggerbuz_cat,.list-home article.post_content_article .date_comment_author::after{background:$bloggerbuz_theme_color}";
        $bloggerbuz_style_css .= ".site-title,.site-description,.fa-angle-right:before,.feature-slider-section.layout-3 .slide-content a.caption-title:hover,.highlighted.layout-1 .highlighted-content a.home-title:hover,.title_cat_wrap a:hover,.owl-next, .owl-next, .owl-prev, .owl-prev,.footer_btm_left a,.feature-slider-section .slide-content a:hover,.highlighted.layout-3 .title:hover,a.continue_link:hover,.widget_pages ul li a:hover,.header-banner #bloggerbuz-breadcrumb a, .header-banner #bloggerbuz-breadcrumb,.widget ul li a abbr,.widget ul li a:hover,.content_wrap_full a.continue_link:hover,.feature-slider-section.layout-2 .slide-content a.caption-title:hover,.main-navigation .current_page_item > a, .main-navigation .current-menu-item > a, .main-navigation .current_page_ancestor > a, .main-navigation .current-menu-ancestor > a,.highlighted.layout-2 a.title.home-title:hover,.site-header.layout-2 .menu li a:hover,.list-layout-home a.continue_link:hover,.comments-area a,.recent-post-content a:hover,.main-navigation a:hover, .main-navigation a:focus{color:$bloggerbuz_theme_color}";
        $bloggerbuz_style_css .= "{text-shadow: 1px 1px 1px $bloggerbuz_theme_color}";
         $bloggerbuz_style_css .= ".highlighted.layout-3 .continue_link{box-shadow: 1px 1px 1px $bloggerbuz_theme_color}";
    }
    
    /** Dynamic Fonts Size **/
     $bloggerbuz_body_font_size = get_theme_mod('bloggerbuz_body_font_size');
    if($bloggerbuz_body_font_size){
        $bloggerbuz_style_css .= "body,.site-title,.site-description,.excerpt_post_content p{font-size:".$bloggerbuz_body_font_size."px}";
    }
    
    $bloggerbuz_h1_font_size = get_theme_mod('bloggerbuz_h1_font_size');
    if($bloggerbuz_h1_font_size){
        $bloggerbuz_style_css .= "h1,{font-size:".$bloggerbuz_h1_font_size."px}";
    }
    $bloggerbuz_h2_font_size = get_theme_mod('bloggerbuz_h2_font_size');
    if($bloggerbuz_h2_font_size){
        $bloggerbuz_style_css .= "h2,.highlighted.layout-3 .title,.highlighted.layout-2 a.title.home-title,.bt-slider-content .caption-title, .header-slider.layout-2 .bt-slider-content .caption-title{font-size:".$bloggerbuz_h2_font_size."px !important}";
    }
     $bloggerbuz_h3_font_size = get_theme_mod('bloggerbuz_h3_font_size');
    if($bloggerbuz_h3_font_size){
        $bloggerbuz_style_css .= "h3,.feature-slider-section .slide-content a,.title_cat_wrap a,.feature-slider-section.layout-2 .slide-content a.caption-title,.feature-slider-section.layout-3 .slide-content a.caption-title{font-size:".$bloggerbuz_h3_font_size."px}";
    }
    $bloggerbuz_h4_font_size = get_theme_mod('bloggerbuz_h4_font_size');
    if($bloggerbuz_h4_font_size){
        $bloggerbuz_style_css .= "h4, .masonry-home .bloggerbuz_cat{font-size:".$bloggerbuz_h4_font_size."px}";
    }
    
    $bloggerbuz_h5_font_size = get_theme_mod('bloggerbuz_h5_font_size');
    if($bloggerbuz_h5_font_size){
        $bloggerbuz_style_css .= "h5, {font-size:".$bloggerbuz_h5_font_size."px}";
    }
    
    $bloggerbuz_h6_font_size = get_theme_mod('bloggerbuz_h6_font_size');
    if($bloggerbuz_h6_font_size){
        $bloggerbuz_style_css .= "h6, {font-size:".$bloggerbuz_h6_font_size."px}";
    }
    /** Dynamic Fonts **/
    $bloggerbuz_body_font = get_theme_mod('bloggerbuz_body_font');
    if($bloggerbuz_body_font){
        wp_register_style('beetech-pro-body-font', '//fonts.googleapis.com/css?family='.esc_attr($bloggerbuz_body_font));
        wp_enqueue_style( 'beetech-pro-body-font');
        $bloggerbuz_style_css .= "body,.site-title,.site-description,.highlighted.layout-3 .date_comment_author .author_post a,.video-inner-content .section-title h5,.date_comment_author .author_post a,.masonry-home .bloggerbuz_cat,.bloggerbuz_cat,.alternate-home .bloggerbuz_cat,.highlighted.layout-2 .author_post-layout-two a{font-family:$bloggerbuz_body_font}";
    }
    $bloggerbuz_h1_font = get_theme_mod('bloggerbuz_h1_font');
    if($bloggerbuz_h1_font){
        wp_register_style('bloggerbuz-pro-h1-font', '//fonts.googleapis.com/css?family='.esc_attr($bloggerbuz_h1_font));
        wp_enqueue_style( 'bloggerbuz-pro-h1-font');
        $bloggerbuz_style_css .= "h1,{font-family:$bloggerbuz_h1_font}";
    }
    
    
    $bloggerbuz_h2_font = get_theme_mod('bloggerbuz_h2_font');
    if($bloggerbuz_h2_font){
        wp_register_style('bloggerbuz-pro-h2-font', '//fonts.googleapis.com/css?family='.esc_attr($bloggerbuz_h2_font));
        wp_enqueue_style( 'bloggerbuz-pro-h2-font');
        $bloggerbuz_style_css .= "h2,.main-slider .owl-item.active .caption-title,.highlighted.layout-2 a.title.home-title,.highlighted.layout-1  .highlighted-content a.home-title,.highlighted.layout-3 .title{font-family:".$bloggerbuz_h2_font." !important}";
    }

    $bloggerbuz_h3_font = get_theme_mod('bloggerbuz_h3_font');
    if($bloggerbuz_h3_font){
        wp_register_style('bloggerbuz-pro-h3-font', '//fonts.googleapis.com/css?family='.esc_attr($bloggerbuz_h3_font));
        wp_enqueue_style( 'bloggerbuz-pro-h3-font');
        $bloggerbuz_style_css .= "h3, .feature-slider-section.layout-2 .slide-content a.caption-title,.feature-slider-section .slide-content a,.feature-slider-section.layout-3 .slide-content a.caption-title,.title_cat_wrap a{font-family:$bloggerbuz_h3_font}";
    }
    
    $bloggerbuz_h4_font = get_theme_mod('bloggerbuz_h4_font');
    if($bloggerbuz_h4_font){
        wp_register_style('bloggerbuz-pro-h4-font', '//fonts.googleapis.com/css?family='.esc_attr($bloggerbuz_h4_font));
        wp_enqueue_style( 'bloggerbuz-pro-h4-font');
        $bloggerbuz_style_css .= "h4,.masonry-home .bloggerbuz_cat{font-family:$bloggerbuz_h4_font}";
    }
    $bloggerbuz_h5_font = get_theme_mod('bloggerbuz_h5_font');
    if($bloggerbuz_h5_font){
        wp_register_style('bloggerbuz-pro-h5-font', '//fonts.googleapis.com/css?family='.esc_attr($bloggerbuz_h5_font));
        wp_enqueue_style( 'bloggerbuz-pro-h5-font');
        $bloggerbuz_style_css .= "h5{font-family:$bloggerbuz_h5_font}";
    }
    
    $bloggerbuz_h6_font = get_theme_mod('bloggerbuz_h6_font');
    if($bloggerbuz_h6_font){
        wp_register_style('beetech-pro-h6-font', '//fonts.googleapis.com/css?family='.esc_attr($bloggerbuz_h6_font));
        wp_enqueue_style( 'beetech-pro-h6-font');
        $bloggerbuz_style_css .= "h6, {font-family:$bloggerbuz_h6_font}";
    }
    

    /** Text Transform **/
    $bloggerbuz_body_font_transform = get_theme_mod('bloggerbuz_body_font_transform');
    if($bloggerbuz_body_font_transform){
        $bloggerbuz_style_css .= "body,.site-title,.site-description{text-transform:$bloggerbuz_body_font_transform}";
    }
    
    $bloggerbuz_h1_font_transform = get_theme_mod('bloggerbuz_h1_font_transform');
    if($bloggerbuz_h1_font_transform){
        $bloggerbuz_style_css .= "h1,{text-transform:$bloggerbuz_h1_font_transform}";
    }
    
    $bloggerbuz_h2_font_transform = get_theme_mod('bloggerbuz_h2_font_transform');
    if($bloggerbuz_h2_font_transform){
        $bloggerbuz_style_css .= "h2,h2,.main-slider .owl-item.active .caption-title,.highlighted.layout-3 .title,.highlighted.layout-2 a.title.home-title,.highlighted.layout-1  .highlighted-content a.home-title,.video-section-wrap.layout-3 .section-title{text-transform:$bloggerbuz_h2_font_transform}";
    }
    $bloggerbuz_h3_font_transform = get_theme_mod('bloggerbuz_h3_font_transform');
    if($bloggerbuz_h3_font_transform){
        $bloggerbuz_style_css .= "h3, .feature-slider-section .slide-content a,.feature-slider-section.layout-2 .slide-content a.caption-title,.title_cat_wrap a,#footer-one .widget-title, #footer-two .widget-title, #footer-three .widget-title,.widget-title{text-transform:$bloggerbuz_h3_font_transform}";
    }
    $bloggerbuz_h4_font_transform = get_theme_mod('bloggerbuz_h4_font_transform');
    if($bloggerbuz_h4_font_transform){
        $bloggerbuz_style_css .= "h4, .masonry-home .bloggerbuz_cat{text-transform:$bloggerbuz_h4_font_transform}";
    }
     $bloggerbuz_h5_font_transform = get_theme_mod('bloggerbuz_h5_font_transform');
    if($bloggerbuz_h5_font_transform){
        $bloggerbuz_style_css .= "h5, {text-transform:$bloggerbuz_h5_font_transform}";
    }
    
    $bloggerbuz_h6_font_transform = get_theme_mod('bloggerbuz_h6_font_transform');
    if($bloggerbuz_h6_font_transform){
        $bloggerbuz_style_css .= "h6, {text-transform:$bloggerbuz_h6_font_transform}";
    }
    wp_add_inline_style( 'bloggerbuz-style', $bloggerbuz_style_css );
}
add_action('wp_enqueue_scripts','bloggerbuz_dynamic_style');