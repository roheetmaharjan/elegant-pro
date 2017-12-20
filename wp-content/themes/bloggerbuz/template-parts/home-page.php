<?php
/**
 * Template Name: Home Page
 */
get_header(); ?> 
<!-- SLIDER SECTION -->
    <?php
    if(is_home() || is_front_page() ):
        $bloggerbuz_slider_enable = get_theme_mod('bloggerbuz_homepage_setting_slider_section_option','no');
        if($bloggerbuz_slider_enable == 'yes'){ 
            $bloggerbuz_slider_cat = get_theme_mod('bloggerbuz_homepage_setting_slider_section_category');?>
            <div class="bloggerbuz-slider-wrapper">
                <div class="bloggerbuz-container">
                    <?php do_action('bloggerbuz_home_slider'); ?>
                </div>
            </div>
        <?php }
    endif; ?>
    <div class="feature-wrap">
        <div class="container">
        <?php
        /** Feature Section **/
        get_template_part( 'template-parts/sections/section', 'feature' );
        ?>
        </div>
    </div>
    <div class="post-wrp">
      <div class="container">
           <div id="primary" class="content-area">
              <?php
               /** Highlighted Section **/
              get_template_part( 'template-parts/sections/section', 'highlighted' );
               /** Video Section **/
              get_template_part( 'template-parts/sections/section', 'video' );
              ?>
                    <div class="bloggerbuz-wrapper default_home">
            		     <main id="main" class="site-main clearfix" role="main">
                          
                          <?php
                             $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $home_query = new WP_Query(array('post_type' => 'post','paged' => $paged));
                           if ( $home_query->have_posts() ) :
                              while ($home_query-> have_posts() ) : $home_query->the_post(); 
                                    $bloggerbuz_layout_home = get_theme_mod('bloggerbuz_home_page_layout_setting');
                                    if($bloggerbuz_layout_home == ''){
                                        $bloggerbuz_layout_home = 'fullwidth-home';
                                    }
                                        get_template_part( 'template-parts/content', $bloggerbuz_layout_home );
                                    
                                    endwhile;
                                    
                                   ?>
                                <?php
                                    else :
                                        get_template_part( 'template-parts/content', 'none' );
                                    wp_reset_postdata(); ?>    

                          <?php endif; ?>
                         </main><!-- #main -->
                          <?php $total_pages = $home_query->max_num_pages; ?>
                                <div class="nav-pagination">
                                    <nav class="pagination-wrap">
                                        <?php
                                        if ($total_pages > 1){
                                            $current_page = max(1, get_query_var('paged'));
                                            echo paginate_links(array(
                                                'base' => get_pagenum_link(1) . '%_%',
                                                'format' => '/page/%#%',
                                                'current' => $current_page,
                                                'total' => $total_pages,
                                                'prev_text'    => ('<'),
                                                'next_text'    => ('>'),
                                            ));
                                        }
                                        ?>
                                    </nav>
                                </div>
                    </div>
           </div><!-- #primary -->
           <?php bloggerbuz_get_sidebar();?> 
         </div>
       </div>

<?php get_footer();?>