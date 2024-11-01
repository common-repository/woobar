<?php 
/**
 *	Custom JS function 
 *
 */
if( !function_exists( 'batil_custom_js' ) ){
	function batil_custom_js(){

		global $batil_opt;

		$output = "
		(function($) {
    		'use strict';
    		jQuery(document).ready(function() { ";

    		/*if( $batil_opt['when-to-display'] == 'immediately' ) :
    			$output .= " $('.batil-container').addClass( function(index){
    				$(document).trigger( 'batil_init' );
    				console.log('showing');
    				return 'showing-immediately';
    			}); ";    			
    		endif;*/

    		if( $batil_opt['when-to-display'] == 'immediately' ) :
    			$output .= " $('.batil-container').addClass('showing-immediately').trigger( 'batil_init' ); ";    			
    		endif;

			if( $batil_opt['when-to-display'] == 'onscroll' ) :
				if( $batil_opt['where-to-display'] == 'show_selected' && !empty( $batil_opt['matched-url-show'] ) ) :				
					$output .= "
				    	$(window).on('scroll', function() {
				    	    if ( $(window).scrollTop() >= $(document).height()*0.".$batil_opt['display-after-scroll']." ) { ";
				    	    foreach( $batil_opt['matched-url-show'] as $url ) :
				    	    	$url = '"'.$url.'"';
				    	        $output .= "$('div.batil-container[data-url*=".$url."]').addClass( 'showing-on-scroll' ).trigger( 'batil_init' );";
				    	    endforeach;
				    	$output .= "
				        	}
				    	});
					";
				else:
					$output .= "
				    $(window).on('scroll', function() {
				        if ( $(window).scrollTop() >= $(document).height()*0.".$batil_opt['display-after-scroll']." ) {
				            $('.batil-container').addClass( 'showing-on-scroll' ).trigger( 'batil_init' );
				        }
				    });
					";
				endif;
			endif;

			if( $batil_opt['when-to-display'] == 'ontime' ) :
				if( $batil_opt['where-to-display'] == 'show_selected' && !empty( $batil_opt['matched-url-show'] ) ) :				
					$output .= "
						setTimeout(function(){ ";
						foreach( $batil_opt['matched-url-show'] as $url ) :
							$url = '"'.$url.'"';
							$output .= "$('div.batil-container[data-url*=".$url."]').addClass( 'showing-on-time' ).trigger( 'batil_init' );";
						endforeach;
						$output .= "
						}, 1000*".$batil_opt['display-after-time'].");
					";
				else:
					$output .= "
					setTimeout(function(){
						$('.batil-container').addClass( 'showing-on-time' ).trigger( 'batil_init' );
					}, 1000*".$batil_opt['display-after-time'].");
					";
				endif;
			endif;
	
		$output .= "    
			});
		})(jQuery);" ;

		wp_add_inline_script( 'batil-script', $output );
	}
	add_action( 'wp_enqueue_scripts', 'batil_custom_js', 200 );
}
