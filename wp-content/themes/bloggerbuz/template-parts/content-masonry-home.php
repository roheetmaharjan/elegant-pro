<?php
/**
 * The template used for displaying latest post in full width in home page
 *
 * @package Bloggerbuz
 */
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('post_content_article'); ?>>
    
        <?php
        $bloggerbuz_comment_count = get_comments_number();
        $bloggerbuz_cat = get_the_category();?>
        <div class="masonry-layout-home clearfix <?php if($i%5==0){echo " nomargin";} echo ' client-post-'.$i;?> wow fadeInUp" data-wow-delay="<?php echo $i*0.6;?>">
            <?php
                $bloggerbuz_img_src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'bloggerbuz-masonry-thumb');
                if($bloggerbuz_img_src){ 
              $i=0;
            ?>  <div class="bloggerbuz_img_wrap">
                  <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($bloggerbuz_img_src[0]); ?>" /></a>
                </div>
                  <?php } ?>
                <div class="content_wrap_list">
                    <div class="bloggerbuz-cat-wrap">
                        <h4><a class="bloggerbuz_cat" href="<?php echo esc_url(get_category_link( $bloggerbuz_cat[0]->term_id )); ?>"><?php echo $bloggerbuz_cat[0]->name;?></a></h4>
                    </div> 
                    <div class="title_cat_wrap">
                      <a class="bloggerbuz_post_title" href="<?php the_permalink(); ?>"><?php echo esc_attr(get_the_title()); ?></a>
                    </div>
                        <div class="date_comment_author">
                            <div class="wrap11">
                                <span class="date_post"><?php echo esc_attr(get_the_date(get_option('date_format'))); ?></span>
                                <span class="author_post"><?php  echo esc_url(the_author_posts_link()); ?></span>
                                <div class="bt-comments">   
                                   <?php comments_number(0); ?>
                                   <i class="fa fa-comment-o"></i>
                                </div>
                            </div>        
                        </div>
                     <div class="excerpt_post_content"><?php
                              echo apply_filters('the_content' , wp_kses_post(wp_trim_words(get_the_content(),30,'...')));?>
                      </div>
                     <div class="read_more_share">
                          <a class="continue_link" href="<?php the_permalink(); ?>"><?php  esc_html_e('Continue Reading...','bloggerbuz-pro'); ?></a>
                      </div>
              </div>
       </div><!-- .entry-content -->
    </article><!-- #post-## -->