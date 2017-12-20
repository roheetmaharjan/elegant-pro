
           <?php     
     if(get_theme_mod('bloggerbuz_video_section_option','disable') == 'enable'):
     $bloggerbuz_video_title = get_theme_mod('bloggerbuz_video_title');
     $bloggerbuz_video_sub_title = get_theme_mod('bloggerbuz_video_sub_title');
     $bloggerbuz_video_description = get_theme_mod('bloggerbuz_video_description');
     $bloggerbuz_video_bkgimage = get_theme_mod('bloggerbuz_video_bkgimage');
     $bloggerbuz_video_iframe_page = get_theme_mod('bloggerbuz_video_iframe_page');
     $bloggerbuz_video_layout = get_theme_mod('bloggerbuz_video_layout','layout-1');
     $i=0;
     ?>
    <section class="video-section-wrap <?php echo esc_attr($bloggerbuz_video_layout); ?>">
         <div class="container">  
            <div class="bloggerbuz-video<?php if($i%5==0){echo " nomargin";} echo ' client-post-'.$i;?> wow fadeInUp" data-wow-delay="<?php echo $i*0.6;?>">   
                      <?php if($bloggerbuz_video_layout == 'layout-3' ){ ?>
                    <div class="third-video-image">
                        <?php if($bloggerbuz_video_bkgimage){ ?><img src="<?php echo esc_url($bloggerbuz_video_bkgimage); ?>" title="<?php echo esc_html('Video BG','bloggerbuz-pro'); ?>" alt="<?php echo esc_html('Video BG','bloggerbuz-pro'); ?>" />
                        <div class="bloggerbuz-play-button">
                            <a href="#!" data-action="modal-open" id="myBtn"><img alt="<?php echo esc_html('Play Button','bloggerbuz-pro'); ?>" title="<?php echo esc_html('Playgg Button','bloggerbuz-pro'); ?>" src="<?php echo get_template_directory_uri().'/css/images/play.png'; ?>" /> 
                            </a>
                            </div>
                        <?php } ?>
                    </div>
                    <?php } ?>
                    <div class="video-content">
                        <div class="video-inner-content">
                                 <?php if($bloggerbuz_video_title || $bloggerbuz_video_sub_title){ ?>
                                    <div class="section-titles-wrap">
                                        <?php if($bloggerbuz_video_title){ ?>
                                            <?php if($bloggerbuz_video_layout != 'layout-2' ){ ?>
                                            <div class="section-title"><h2><?php echo esc_attr($bloggerbuz_video_title); ?></h2>
                                            </div>
                                             <?php } ?>
                                             <?php } ?>

                                            <?php if($bloggerbuz_video_sub_title){ ?>
                                            <div class="video-content-two">
                                                       <?php if($bloggerbuz_video_layout != 'layout-2' ){ ?>
                                                    <div class="section-sub-title"><h2><?php echo esc_attr($bloggerbuz_video_sub_title); ?></h2></div>
                                                   <?php } ?>
                                            </div>
                                           <?php } ?>
                                         </div>
                                        <?php } ?>
                                        <?php if($bloggerbuz_video_layout == 'layout-2' ){ ?>
                                                    <div class="bloggerbuz-play-button-two">
                                                       <a href="#!" data-action="modal-open" id="myBtn"><img alt="<?php echo esc_html('Play Button','bloggerbuz-pro'); ?>" title="<?php echo esc_html('Playgg Button','bloggerbuz-pro'); ?>" src="<?php echo get_template_directory_uri().'/css/images/play.png'; ?>" /> 
                                                          </a>
                                                    </div>
                                                    <?php } ?>
                                    <?php if($bloggerbuz_video_description){ ?>
                                      <p class="bloggerbuz-video-content"><?php echo esc_html($bloggerbuz_video_description); ?></p>
                                    <div class="date_comment_author">
                                        <div class="wrap11">
                                            <span class="date_post"><?php echo esc_attr(get_the_date(get_option('date_format'))); ?></span>
                                            <span class="cmts"><?php comments_number(0); ?></span>
                                            <span class="author_post"><?php  echo esc_url(the_author_posts_link()); ?></span>
                                        </div>  
                                    </div>
                                   <?php } ?>   
                                  <?php if($bloggerbuz_video_layout != 'layout-2' ){ ?>
                                  <?php if($bloggerbuz_video_layout != 'layout-3' ){ ?>
                                 <div class="read_more_share">
                                    <a class="continue_link" href="<?php the_permalink(); ?>"><?php  esc_html_e('Continue Reading...','bloggerbuz-pro'); ?>
                                    </a>
                                </div>  
                                   <?php } ?>   
                            <?php } ?>                              
                        </div><!-- video-inner-content -->
                    </div><!-- video-content -->
                    <div class="video-image">
                            <?php if($bloggerbuz_video_layout != 'layout-2' ){?>
                                <?php if($bloggerbuz_video_layout != 'layout-3' ){ ?>
                            <div class="play-button">
                                    <a href="#!" data-action="modal-open" id="myBtn"><img alt="<?php echo esc_html('Play Button','bloggerbuz-pro'); ?>" title="<?php echo esc_html('Play Button','bloggerbuz-pro'); ?>" src="<?php echo get_template_directory_uri().'/css/images/play.png'; ?>" /> 
                                    </a>
                            </div>
                                   <?php } ?>  
                             <?php } ?>
                             <?php if($bloggerbuz_video_layout != 'layout-3' ){     ?> 
                            <div class="third-video-image">
                                <?php if($bloggerbuz_video_bkgimage){ ?><img src="<?php echo esc_url($bloggerbuz_video_bkgimage); ?>" title="<?php echo esc_html('Video BG','bloggerbuz-pro'); ?>" alt="<?php echo esc_html('Video BG','bloggerbuz-pro'); ?>" /><?php } ?>
                            </div>
                            <?php } ?>
                            <?php $bloggerbuz_iframe_query = new WP_Query(array('post_type'=>'page','post__in'=>array($bloggerbuz_video_iframe_page)));
                            if($bloggerbuz_iframe_query->have_posts()){ ?>
                               <?php } ?>
                    </div>                   
                    <div id="myModal" class="modale">
                        <!-- Modal content -->
                        <div class="modal-content">
                            <span class="close">&times;</span>
                            <?php 
                                while($bloggerbuz_iframe_query->have_posts()){
                                    $bloggerbuz_iframe_query->the_post();
                                    the_content();
                                }
                             ?>
                        </div>
                    </div>
                </div>    
        </div>
    </section>
   <?php endif; ?>