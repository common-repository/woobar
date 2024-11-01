<?php 
/**
 *	Custom CSS function 
 *
 */
if( !function_exists( 'batil_custom_css' ) ){
	function batil_custom_css(){

		global $batil_opt;
		$display_rules = $batil_opt['display-rule'];
		
    	$output = '';

		if( $batil_opt['batil-display-position'] == 'fixed-top' ) :
			if ( is_admin_bar_showing() ) :
				$output .= '
				.batil-container{
					position:fixed;
					top:32px;
				}
				';
			else:
				$output .= '
				.batil-container{
					position:fixed;
					top:0;
				}
				';
			endif;
		endif;

		if( $batil_opt['batil-display-position'] == 'scroll-top' ) :
			if ( is_admin_bar_showing() ) :
				$output .= '
				.batil-container{
					position:absolute;
					top:32px;
				}
				';
			else:
				$output .= '
				.batil-container{
					position:absolute;
					top:0;
				}
				';
			endif;
		endif;

		if( $batil_opt['batil-display-position'] == 'fixed-bottom' ) :
			$output .= '
			.batil-container{
				position:fixed;
				bottom:0;
				top:auto;
			}
			';
		endif;

		if( $batil_opt['batil-counter-typo'] ) :
			$output .= '
			.flip-clock-wrapper ul li a div div.inn,
			.batil-countdown-wrapper .batil-countdown-item .batil-countdown-number{
				font-size: '.$batil_opt['batil-counter-typo']['font-size'].';
			}
			';
		endif;

		if( $batil_opt['batil-counter-style'] == '4' && $batil_opt['counter-text-color'] ) :
			$output .= '
			.batil-countdown-wrapper .flip-clock-wrapper ul li a div div.inn{
				text-shadow: 0 1px 2px '.$batil_opt['counter-text-color'].';
			}
			.batil-countdown-wrapper .flip-clock-wrapper ul li a div div.inn,
			.batil-countdown-wrapper .flip-clock-label{
				color: '.$batil_opt['counter-text-color'].';
			}

			.batil-countdown-wrapper .flip-clock-dot{
				background-color: '.$batil_opt['counter-text-color'].';
			}

			.batil-countdown-wrapper .flip-clock-wrapper ul,
			.batil-countdown-wrapper .flip-clock-wrapper ul li a div div.inn{
				background-color: '.$batil_opt['counter-bg-color'].';
			}
			';
		endif;

		if( $batil_opt['batil-coupon-text-color'] ) :
			$output .= '
			.batil-inner #batil-promo-code{
				color: '.$batil_opt['batil-coupon-text-color'].';
				border-color: '.$batil_opt['batil-coupon-text-color'].';
			}
			';
		endif;

		if( $batil_opt['batil-height'] ) :
			$output .= '
			.batil-container{
				min-height: '.$batil_opt['batil-height'].'px;
			}
			';
		endif;

		if( $batil_opt['when-to-display'] == 'immediately' && $batil_opt['where-to-display'] == 'show_selected' && !empty( $batil_opt['matched-url-show'] ) ) :
			$output .= '
			.batil-container{
				display:none !important;
			}';

			foreach( $batil_opt['matched-url-show'] as $key ) :
				$output .= '			
				div.batil-container[data-url*="'.$key.'"]{
					display: table !important;
				}';
			endforeach;
		endif;

		if( $batil_opt['where-to-display'] == 'not_show_selected' && !empty( $batil_opt['matched-url-not-show'] ) ) :	
			foreach( $batil_opt['matched-url-not-show'] as $key ) :
				$output .= '			
				div.batil-container[data-url*="'.$key.'"]{
					display: none !important;
				}';
			endforeach;
		endif;	

		if( $display_rules['xl'] == '1' ) :
			$output .= '
			@media (min-width: 1200px) {
				.batil-container,
				.batil-container.showing-immediately,
				.batil-container.showing-on-scroll,
				.batil-container.showing-on-time{
					display:none;
				}
				html{
					margin-top:0 !important;
				}
			}
			';
		endif;

		if( $display_rules['lg'] == '1' ) :
			$output .= '
			@media (min-width: 992px) and (max-width: 1199.98px) {
				.batil-container,
				.batil-container.showing-immediately,
				.batil-container.showing-on-scroll,
				.batil-container.showing-on-time{
					display:none;
				}
				html{
					margin-top:0 !important;
				}
			}
			';
		endif;

		if( $display_rules['md'] == '1' ) :
			$output .= '
			@media (min-width: 768px) and (max-width: 991.98px) {
				.batil-container,
				.batil-container.showing-immediately,
				.batil-container.showing-on-scroll,
				.batil-container.showing-on-time{
					display:none;
				}
				html{
					margin-top:0 !important;
				}
			}
			';
		endif;

		if( $display_rules['sm'] == '1' ) :
			$output .= '
			@media (max-width: 767.98px) {
				.batil-container,
				.batil-container.showing-immediately,
				.batil-container.showing-on-scroll,
				.batil-container.showing-on-time{
					display:none;
				}
				html{
					margin-top:0 !important;
				}
			}
			';
		endif;

		if( $batil_opt['batil-custom-css'] ) :
			$output .= $batil_opt['batil-custom-css']; //Custom css
		endif;

		wp_add_inline_style( 'batil-styles', $output );
	}
	add_action( 'wp_enqueue_scripts', 'batil_custom_css', 200 );
}
