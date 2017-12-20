/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );
    
    wp.customize( 'bloggerbuz_footer_text_setting', function( value ) {
		value.bind( function( to ) {
			$( '.footer_text' ).html( to );
		} );
	} ); 

	wp.customize( 'bloggerbuz_body_font_size', function( value ) {
		value.bind( function( font_size ) {
			$('body, .bt-section-faq p, section#bt-section-cta p, .bt-section-header p').css({'font-size':font_size+'px'});
		} );
	} );
    
    wp.customize( 'bloggerbuz_h1_font_size', function( value ) {
		value.bind( function( font_size ) {
			$('h1').css({'font-size':font_size+'px'});
		} );
	} );
    
    wp.customize( 'bloggerbuz_h2_font_size', function( value ) {
		value.bind( function( font_size ) {
			$('h2').css({'font-size':font_size+'px'});
		} );
	} );
    
    wp.customize( 'bloggerbuz_h3_font_size', function( value ) {
		value.bind( function( font_size ) {
			$('h3').css({'font-size':font_size+'px'});
		} );
	} );
    
    wp.customize( 'bloggerbuz_h4_font_size', function( value ) {
		value.bind( function( font_size ) {
			$('h4').css({'font-size':font_size+'px'});
		} );
	} );
    
    wp.customize( 'bloggerbuz_h5_font_size', function( value ) {
		value.bind( function( font_size ) {
			$('h5').css({'font-size':font_size+'px'});
		} );
	} );
    
    wp.customize( 'bloggerbuz_body_font', function( value ) {
		value.bind( function( newval ) {
			if(newval){
    			$( 'body, .bt-section-faq p, section#bt-section-cta p, .bt-section-header p' ).css( {'font-family':newval});
                WebFont.load({
                    google: {
                      families: [newval]
                    }
            });
          }
		} );
	} );
    
    wp.customize( 'bloggerbuz_h1_font', function( value ) {
		value.bind( function( newval ) {
			if(newval){
    			$( 'h1' ).css( {'font-family':newval});
                WebFont.load({
                    google: {
                      families: [newval]
                    }
            });
          }
		} );
	} );
    
    wp.customize( 'bloggerbuz_h2_font', function( value ) {
		value.bind( function( newval ) {
			if(newval){
    			$( 'h2' ).css( {'font-family':newval});
                WebFont.load({
                    google: {
                      families: [newval]
                    }
            });
          }
		} );
	} );
    
    wp.customize( 'bloggerbuz_h3_font', function( value ) {
		value.bind( function( newval ) {
			if(newval){
    			$( 'h3' ).css( {'font-family':newval});
                WebFont.load({
                    google: {
                      families: [newval]
                    }
            });
          }
		} );
	} );
    
    wp.customize( 'bloggerbuz_h4_font', function( value ) {
		value.bind( function( newval ) {
			if(newval){
    			$( 'h4' ).css( {'font-family':newval});
                WebFont.load({
                    google: {
                      families: [newval]
                    }
            });
          }
		} );
	} );
    
    wp.customize( 'bloggerbuz_h5_font', function( value ) {
		value.bind( function( newval ) {
			if(newval){
    			$( 'h5' ).css( {'font-family':newval});
                WebFont.load({
                    google: {
                      families: [newval]
                    }
            });
          }
		} );
	} );
    
    wp.customize( 'bloggerbuz_body_font_transform', function( value ) {
		value.bind( function( text_transform ) {
			$('body, .bt-section-faq p, section#bt-section-cta p, .bt-section-header p').css({'text-transform':text_transform});
		} );
	} );
    
    wp.customize( 'bloggerbuz_h1_font_transform', function( value ) {
		value.bind( function( text_transform ) {
			$('h1').css({'text-transform':text_transform});
		} );
	} );
    
    wp.customize( 'bloggerbuz_h2_font_transform', function( value ) {
		value.bind( function( text_transform ) {
			$('h2').css({'text-transform':text_transform});
		} );
	} );
    
    wp.customize( 'bloggerbuz_h3_font_transform', function( value ) {
		value.bind( function( text_transform ) {
			$('h3').css({'text-transform':text_transform});
		} );
	} );
    
    wp.customize( 'bloggerbuz_h4_font_transform', function( value ) {
		value.bind( function( text_transform ) {
			$('h4').css({'text-transform':text_transform});
		} );
	} );
    
    wp.customize( 'bloggerbuz_h5_font_transform', function( value ) {
		value.bind( function( text_transform ) {
			$('h5').css({'text-transform':text_transform});
		} );
	} );
    
} )( jQuery );
