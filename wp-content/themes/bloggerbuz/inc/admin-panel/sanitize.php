<?php

    /**
     * SANITIZATION
     */
     
function bloggerbuz_sanitize_radio_yes_no($input){
        $option = array(
                'yes'   =>  esc_html__('Yes','bloggerbuz-pro'),
                'no'    =>  esc_html__('No','bloggerbuz-pro')
            );
        if(array_key_exists($input, $option)){
            return $input;
        }
        else
            return '';
    }
    
function bloggerbuz_sanitize_radio_integer( $input){
	$valid_keys = array(
		'1' => esc_html__('Yes','bloggerbuz-pro'),
		'0' => esc_html__('No','bloggerbuz-pro')
		);
	if ( array_key_exists( $input, $valid_keys ) ) {
		return $input;
	} else {
		return '';
	}
}

//integer sanitize
function bloggerbuz_integer_sanitize($input){
    return intval( $input );
}  
   
function bloggerbuz_radio_sanitize_sidebar($input) {
    $valid_keys = array(
        'sidebar-left' =>  esc_html__('Left Sidebar','bloggerbuz-pro'),
        'sidebar-right' =>  esc_html__('Right Sidebar','bloggerbuz-pro'),
        'no-sidebar' =>  esc_html__('No Sidebar','bloggerbuz-pro'),
    );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}
  
function bloggerbuz_sanitize_category_select($input){
    $bloggerbuz_category_lists = bloggerbuz_category_lists();
    if(array_key_exists($input,$bloggerbuz_category_lists)){
        return $input;
    }else{
        return '';
    }
}
    
function bloggerbuz_radio_sanitize_webpagelayout($input) {
    $valid_keys = array(
        'fullwidth' => esc_html__('Full Width', 'bloggerbuz-pro'),
        'boxed' => esc_html__('Boxed', 'bloggerbuz-pro')
    );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}
    
function bloggerbuz_sanitize_checkbox( $input ) {
        if ( $input == 1 ) {
            return 1;
        } else {
            return '';
        }
    }

function bloggerbuz_radio_sanitize_enabledisable($input) {
      $valid_keys = array(
        'enable'=> esc_html__('Enable', 'bloggerbuz-pro'),
        'disable'=> esc_html__('Disable', 'bloggerbuz-pro')
      );
      if ( array_key_exists( $input, $valid_keys ) ) {
         return $input;
      } else {
         return '';
      }
   }
   
function bloggerbuz_sanitize_homelayout_radio($input){
    $valid_keys = array(
    		'fullwidth-home' => esc_html__('fullwidth-home', 'bloggerbuz-pro'),
    		'gridview-home' => esc_html__('gridview-home', 'bloggerbuz-pro'),
            'alternate-home' => esc_html__('alternate-home', 'bloggerbuz-pro'),
            'list-home' => esc_html__('list-home', 'bloggerbuz-pro'),
            'masonry-home' => esc_html__('masonry-home', 'bloggerbuz-pro'),
		);
	if ( array_key_exists( $input, $valid_keys)) {
		return $input;

	} else {
		return '';
	}
}

//logo alignment
function bloggerbuz_pro_radio_sanitize_alignment_logo($input) {
      $valid_keys = array(
        'left'=>esc_html__('Left', 'bloggerbuz-pro'),
        'center'=>esc_html__('Center', 'bloggerbuz-pro'),
      );
      if ( array_key_exists( $input, $valid_keys ) ) {
         return $input;
      } else {
         return '';
      }
   }
function bloggerbuz_slider_layout_normal( $control ) {
    if ( $control->manager->get_setting('bloggerbuz_slider_layout')->value() == 'layout-1' || $control->manager->get_setting('bloggerbuz_slider_layout')->value() == 'layout-2' ) {
        return true;
    } else {
        return false;
    }
}
function bloggerbuz_slider_layout_revolution( $control ) {
    if ( $control->manager->get_setting('bloggerbuz_slider_layout')->value() == 'revolution') {
        return true;
    } else {
        return false;
    }
}
/**
 * Repeater Sanitize
*/
function blogerbuz_sanitize_repeater($input){
    $input_decoded = json_decode( $input, true );
    $allowed_html = array(
        'br' => array(),
        'em' => array(),
        'strong' => array(),
        'a' => array(
            'href' => array(),
            'class' => array(),
            'id' => array(),
            'target' => array()
        ),
        'button' => array(
            'class' => array(),
            'id' => array()
        )
    );    
    
    if(!empty($input_decoded)) {
        foreach ($input_decoded as $boxes => $box ){
            foreach ($box as $key => $value){
                $input_decoded[$boxes][$key] = sanitize_text_field( $value );
            }
        }
        return json_encode($input_decoded);
    }    
    return $input;
}

/** Customizer Page List Sanitize **/
function bloggerbuz_sanitize_page_list($input){
    $bloggerbuz_page_lists = bloggerbuz_page_lists();
    if(array_key_exists($input,$bloggerbuz_page_lists)){
        return $input;
    }
    else{
        return '';
    }
}


