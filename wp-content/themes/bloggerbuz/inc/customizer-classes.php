<?php
       if( class_exists( 'WP_Customize_Control' ) ):
        /** Exclude Multiple Category Control **/
       class bloggerbuz_WP_Customize_Cat_Exclude_Control extends WP_Customize_Control {
           public function render_content() {
            
               $category_post = $this->bloggerbuz_cat_list();
               $values = $this->value();
               
               if ( empty( $category_post ) )
               return;
               ?>
               <label>
                   <?php if ( ! empty( $this->label ) ) : ?>
                       <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                   <?php endif;
                   if ( ! empty( $this->description ) ) : ?>
                       <span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
                   <?php endif; ?>
                   
                   <?php if ( ! empty( $this->label ) ) : ?>
                       <div class="exclude-cat-wrap">
                       
                           <?php $category_array = explode(',', $values); array_pop($category_array); $count = 1; ?>
                           <?php foreach($category_post as $id => $label) : ?>
                               <div class="chk-group <?php if($count++%2 == 0){echo "right";}else{echo "left";} ?>">
                                   <input id="exclude-cat-<?php echo absint($id); ?>" type="checkbox" value="<?php echo absint($id); ?>" <?php if(in_array($id,$category_array)){ echo "checked"; }; ?> />
                                   <label for="exclude-cat-<?php echo absint($id); ?>"><?php echo esc_attr($label); ?></label>
                               </div>
                           <?php endforeach; ?>
                           
                       </div>
                       <input type="hidden" <?php $this->input_attrs(); ?> value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
                   <?php endif; ?>    
               </label>
               <?php
           }
           
           public function bloggerbuz_cat_list() {
               $catlist = array();
               $categories = get_categories( array('hide_empty' => 0) );
               
               foreach($categories as $cat){
                   $catlist[$cat->term_id] = $cat->name;
               }
               
               return $catlist;
           }
       }
    endif;