<?php
/**
 * Feature Section 
*/
//starting Feature section

        if(get_theme_mod('bloggerbuz_option','disable') == 'enable'):
            $bloggerbuz_feature_layout = get_theme_mod('bloggerbuz_feature_layout','layout-1');
            $feature_cat = esc_attr(get_theme_mod('bloggerbuz_homepage_setting_feature_section_category',''));
            if($feature_cat):
                $args_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' =>3, 'category_name' => $feature_cat));  
                if ($args_query->have_posts()) :
                    $i=0;
                    ?>
                    <section id="feature-section" class="feature-slider-section <?php echo esc_attr($bloggerbuz_feature_layout); ?>">
                        <div class="bloggerbuz-feature<?php if($i%5==0){echo " nomargin";} echo ' client-post-'.$i;?> wow fadeInLeft" data-wow-delay="<?php echo $i*0.6;?>">
                            <?php if($bloggerbuz_feature_layout != 'layout-2' ){ ?>
                            <div class="container">
                                <ul class="feature-slider">
                                    <?php } ?>
                                    <?php
                                    while ($args_query->have_posts()):
                                        $args_query->the_post();
                                        $feature_slider_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'bloggerbuz-feature-thumb');
                                        ?>
                                        <div class="slide">
                                            <div class="slide-caption">
                                                    <?php if(has_post_thumbnail()): ?>
                                                    <div class="feature-image">
                                                        <img src="<?php echo esc_url($feature_slider_image[0]); ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" />
                                                    </div>
                                                    <?php endif; ?>
                                                    
                                                    <div class="slide-content">
                                                        <?php if(get_the_title()){ ?>
                                                            <h3 class="featute-slider-caption">
                                                               <a class="caption-title" href="<?php the_permalink(); ?>"><?php the_title();?></a>
                                                            </h3>
                                                        <?php } ?>
                                                        <div class="wrap11">
                                                            <span class="date-post"><?php echo esc_attr(get_the_date()); ?></span>
                                                            <span class="author-post"><?php echo esc_attr(get_the_author()); ?></span>              
                                                        </div>
                                                    </div> 
                                            </div>
                                            </div>
                                        <?php
                                    endwhile;
                                    wp_reset_postdata();
                                    ?>
                                
                                </ul>
                            </div>
                        </div>    
                    </section>
                    
                    <?php 
                endif;
            endif;
        endif;
        
        ?>