<!--HIGHLIGHTED SECTION STARTING-->

                    <?php
                    if (get_theme_mod('bloggerbuz_highlighted_option','disable')=='enable') {
                        $post_id = get_theme_mod('bloggerbuz_highlighted_setting_post');
                        $bloggerbuz_highlighted_layout = get_theme_mod('bloggerbuz_highlighted_layout','layout-1');
                        if($post_id):
                           $i=0;
                            ?>
                            <section class="highlighted <?php echo esc_attr($bloggerbuz_highlighted_layout); ?>">
                               <div class="client-block<?php if($i%5==0){echo " nomargin";} echo ' client-post-'.$i;?> wow fadeInUp" data-wow-delay="<?php echo $i*0.6;?>">
                                <?php
                                $highlighted_query = new WP_Query(array('post_type'=>'post', 'post__in' => array($post_id), 'post_status' => 'publish'));
                                if ($highlighted_query->have_posts()):
                                    while ($highlighted_query->have_posts()):
                                        $highlighted_query->the_post();
                                        $image_highlighted = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'bloggerbuz-slider-thumb',true); 
                                        ?>
                                        
                                        <?php if ($image_highlighted[0]): ?>
                                            <a href="<?php the_permalink();?>">
                                               <?php if($bloggerbuz_highlighted_layout != 'layout-3' ){ ?>
                                                <figure class="highlighted-img" >
                                                        <img src="<?php echo esc_url($image_highlighted[0]); ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" />
                                                </a>
                                                <?php if($bloggerbuz_highlighted_layout != 'layout-2' ){ ?>
                                                <div class="date_comment_author">
                                                    <div class="wrap11">
                                                        <span class="date_post"><?php echo esc_attr(get_the_date(get_option('date_format'))); ?></span>
                                                        <span class="author_post"><?php  echo esc_url(the_author_posts_link()); ?></span>
                                                        <span class="cmts"><?php comments_number(0); ?></span>
                                                    </div>        
                                                 </div>
                                                 <?php } ?>
                                                 <?php } ?>
                                                </figure>
                                        <?php endif; ?>
                                           <?php if(get_the_title()){ ?>
                                            <div class="highlighted-content">
                                                <?php if($bloggerbuz_highlighted_layout == 'layout-2' ){ ?>
                                                <div class="wrap11">
                                                    <span class="bd"></span>
                                                     <span class="date_post-layout-two"><?php echo esc_attr(get_the_date(get_option('date_format'))); ?></span>
                                                     <span class="author_post-layout-two"><?php  echo esc_url(the_author_posts_link()); ?></span>
                                                     <span class="cmts"><?php comments_number(0); ?></span>
                                                     
                                                </div> 
                                               <?php } ?>
                                               <?php if($bloggerbuz_highlighted_layout != 'layout-3' ){ ?>
                                               <div class="highlighted-right">
                                                    <h2>
                                                      <a class="title home-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                    </h2>
                                                    <p class="highlighted-section-desc">
                                                        <?php echo esc_attr(wp_trim_words(get_the_content(),70,'&hellip;')); ?>
                                                    </p>
                                                </div>
                                                 <?php } ?>
                                            </div>
                                        <?php } ?>
                                        <?php if($bloggerbuz_highlighted_layout == 'layout-3' ){ ?>
                                         <h2><a class="title home-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                         <div class="date_comment_author">
                                                <div class="wrap11">
                                                    <span class="date_post"><?php echo esc_attr(get_the_date(get_option('date_format'))); ?></span>
                                                        <span class="author_post"><?php  echo esc_url(the_author_posts_link()); ?></span>
                                                        <span class="cmts"><?php comments_number(0); ?></span>
                                                    </div>        
                                          </div>
                                         <img src="<?php echo esc_url($image_highlighted[0]); ?>" title="<?php the_title_attribute(); ?>" alt="<?php the_title_attribute(); ?>" />
                                        </a>
                                        
                                        <p class="highlighted-section-desc">
                                           <?php echo esc_attr(wp_trim_words(get_the_content(),70,'&hellip;')); ?>
                                        </p>
                                        <div class="read_more_share">
                                            <a class="continue_link" href="<?php the_permalink(); ?>"><?php  esc_html_e('Continue Reading...','bloggerbuz-pro'); ?> <i class="fa fa-angle-right"></i></a>
                                        </div>
                                        <?php } ?>
                                        <?php
                                    endwhile;
                                    wp_reset_postdata();
                                endif;
                                    ?>
                                <?php if(get_the_content()){ ?>
                                    <div class="recent_post_content"><?php the_excerpt(); ?></div>
                                <?php } ?>
                                </div>
                            </section>
                            <?php
                        endif;
                    }