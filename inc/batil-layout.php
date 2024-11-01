<?php

/**
 *	woobar Layout Design Function
 * 
 * @var $current_page_url for getting current page url for advance display rule
 *
 */
if( !function_exists( 'batil_layout_functions' ) ){
	function batil_layout_functions( $atts, $content = null ){
		global $batil_opt;

		if( $batil_opt['batil-share-page-url'] ) {
			$share_page_url = $batil_opt['batil-share-page-url'];
		} else {
			$share_page_url = get_permalink();
		}

		if( is_front_page() && is_home() ){
			$current_page_url = home_url();
		} else {
			$current_page_url = get_permalink();
		}
							
		ob_start(); 
		?>
   			<div class="batil-container" data-url="<?php echo $current_page_url; ?>">
   				<div class="batil-inner">
   					<a class="batil-dissmiss-btn"><i class="fa fa-close"></i></a>
   					<!-- START MESSAGE TEXT -->
   					<div class="message-text">
   						<?php echo $batil_opt['batil-message']; ?>
   						<?php if( $batil_opt['batil-coupon-text'] ) : ?>
   							<span id="batil-promo-code"><?php echo $batil_opt['batil-coupon-text']; ?></span>
   						<?php endif; ?>
   					</div>
   					<!-- END MESSAGE TEXT -->

   					<!-- START COUNTDOWN WRAPPER -->
					<?php if( $batil_opt['batil-counter-switch'] == '1' ) : ?>
						<div data-date="<?php echo $batil_opt['batil-count-date']; ?>" data-style-id="<?php echo $batil_opt['batil-counter-style']; ?>" class="batil-countdown-wrapper style-<?php echo $batil_opt['batil-counter-style']; ?>">
							<?php if( $batil_opt['batil-counter-style'] == '4' ) : ?>
								<div class="clock"></div>
							<?php else: ?>
								<div class="batil-countdown-item">
									<div id="day-item" class="batil-countdown-number day-item"></div>
									<div class="batil-countdown-label days-label"><?php esc_html_e( 'Days', 'woobar' ); ?></div>
								</div>
								<div class="batil-countdown-item">
									<div id="hours-item" class="batil-countdown-number hour-item"></div>
									<div class="batil-countdown-label hrs-label"><?php esc_html_e( 'Hrs', 'woobar' ); ?></div>
								</div>
								<div class="batil-countdown-item">
									<div id="minutes-item" class="batil-countdown-number minute-item"></div>
									<div class="batil-countdown-label mins-label"><?php esc_html_e( 'Mins', 'woobar' ); ?></div>
								</div>
								<div class="batil-countdown-item">
									<div id="second-item" class="batil-countdown-number second-item"></div>
									<div class="batil-countdown-label secs-label"><?php esc_html_e( 'Secs', 'woobar' ); ?></div>
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>
   					<!-- END COUNTDOWN WRAPPER -->

   					<!-- START MESSAGE TERM WRAPPER -->
   					<div class="batil-term-message">
   						<?php if( $batil_opt['batil-get-btn'] ) : ?>
   							<a target="<?php echo $batil_opt['batil-get-btn-link-target']; ?>" href="<?php echo $batil_opt['batil-get-btn-link']; ?>" class="batil-info-link"><?php echo $batil_opt['batil-get-btn']; ?></a>
   						<?php endif; ?>
   					</div>
   					<!-- END MESSAGE TERM WRAPPER -->

   					<!-- START SHARE BUTTON WRAPPER -->
	   				<?php if( $batil_opt['social-switch'] == '1'): ?>
	   					<div class="batil-share-buttons style-<?php echo $batil_opt['batil-social-style']; ?>">
	   						<ul>
		   						<?php if( $batil_opt['batil-fb'] == '1' ) : ?>
		   							<li>
		   								<a class="batil-fb" href="http://facebook.com/sharer.php?u=<?php echo $share_page_url;?>" target="_blank"><i class="fa fa-facebook"></i> <span><?php _e( 'Share', 'woobar' ) ?></span></a>
		   							</li>
		   						<?php endif; ?>

		   						<?php if( $batil_opt['batil-tw'] == '1' ) : ?>
		   							<li>
		   								<a class="batil-tw" href="http://twitter.com/share?url=<?php echo $share_page_url; ?>" target="_blank"><i class="fa fa-twitter"></i> <span><?php _e( 'Tweet', 'woobar' ) ?></span></a>
		   							</li>
		   						<?php endif; ?>

		   						<?php if( $batil_opt['batil-pin'] == '1' ) : ?>
		   							<li>
		   								<a class="batil-pin" href="http://pinterest.com/pin/create/button/?url=<?php echo $share_page_url; ?>" target="_blank"><i class="fa fa-pinterest-p"></i> <span><?php _e( 'Pin it', 'woobar' ) ?></span></a>
		   							</li>
		   						<?php endif; ?>

		   						<?php if( $batil_opt['batil-linkedin'] == '1' ) : ?>
		   							<li>
		   								<a class="batil-linkedin" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $share_page_url; ?>" target="_blank"><i class="fa fa-linkedin"></i> <span><?php _e( 'Share', 'woobar' ) ?></span></a>
		   							</li>
		   						<?php endif; ?>

		   						<?php if( $batil_opt['batil-tumblr'] == '1' ) : ?>
		   							<li>
		   								<a class="batil-tumblr" href="http://tumblr.com/share/link?url=<?php echo $share_page_url; ?>" target="_blank"><i class="fa fa-tumblr"></i> <span><?php _e( 'Tumblr', 'woobar' ) ?></span></a>
		   							</li>
		   						<?php endif; ?>

		   						<?php if( $batil_opt['batil-reddit'] == '1' ) : ?>
		   							<li>
		   								<a class="batil-reddit" href="http://reddit.com/submit?url=<?php echo $share_page_url; ?>" target="_blank"><i class="fa fa-reddit-alien"></i> <span><?php _e( 'Reddit', 'woobar' ) ?></span></a>
		   							</li>
		   						<?php endif; ?>

	   						</ul>
	   					</div>
	   				<?php endif;?>
   					<!-- END SHARE BUTTON WRAPPER -->

   				</div>
   			</div>
		<?php
		echo ob_get_clean();		
	}
}
add_action( 'wp_footer', 'batil_layout_functions' );