<?php
/**
 * Plugin Name: Batil - WordPress Notification Bar
 * Plugin URI: https://addonmaster.com/plugins/batil
 * Description: Responsive Header Promotional/Notification Bar with Text, Coupon Code, Countdown Timer and Social Share for your Wordpress 
 * Author: Devshuvo
 * Text Domain: batil
 * Domain Path: /lang/
 * Author URI: https://akhtarujjaman.com
 * Tags: wordpress, bar, promobar, topbar, bottombar, social-share, countdown, timer, coupon, notification, alert
 * Version: 1.0.4
 */

define( 'BATIL_PLUGIN_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );

define( 'BATIL_PLUGIN_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );


// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
* Including Plugin file for security
* Include_once
* 
* @since 1.0.0
*/
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

/**
* Loading Text Domain and Redux Framework
* 
*/
function batil_load_plugin_textdomain() {
	//Internationalization 
	load_plugin_textdomain( 'batil', false, dirname( plugin_basename(__FILE__) ) . '/lang/' );
	
	//Redux Framework calling
	if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/inc/redux-framework/ReduxCore/framework.php' ) ) {
	    require_once( dirname( __FILE__ ) . '/inc/redux-framework/ReduxCore/framework.php' );
	}
	if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/inc/batil-options.php' ) ) {
	    require_once( dirname( __FILE__ ) . '/inc/batil-options.php' );
	}

}
add_action('plugins_loaded', 'batil_load_plugin_textdomain');

/**
 *	batil Layout
 */
require_once( dirname( __FILE__ ) . '/inc/batil-layout.php' );

/**
 *	batil Custom css
 */
require_once( dirname( __FILE__ ) . '/inc/batil-custom-css.php' );

/**
 *	batil Custom css
 */
require_once( dirname( __FILE__ ) . '/inc/batil-custom-js.php' );

/**
 *	Enqueue batil scripts
 *
 */
function wobar_enqueue_scripts(){
	global $batil_opt;

	if( $batil_opt['batil-counter-style'] == '4' ){
		wp_enqueue_script('flipclock', plugin_dir_url( __FILE__ ).'assets/js/flipclock.js', array( 'jquery' ), '', true );
		wp_enqueue_style('flipclock',plugin_dir_url(__FILE__).'assets/css/flipclock.css' );
	}

	wp_enqueue_style('font-awesome', plugin_dir_url( __FILE__ ).'assets/css/font-awesome.min.css' );

	wp_enqueue_style('batil-styles', plugin_dir_url( __FILE__ ).'assets/css/styles.css' );

	wp_enqueue_script('batil-script', plugin_dir_url( __FILE__ ).'assets/js/scripts.js', array( 'jquery' ), '', true );

    wp_localize_script( 'batil-script', 'batil_object',
        array( 
            'years' => __( 'Years', 'batil' ),
            'months' => __( 'Month', 'batil' ),
            'days' => __( 'Days', 'batil' ),
            'hours' => __( 'Hrs', 'batil' ),
            'minutes' => __( 'Mins', 'batil' ),
            'seconds' => __( 'Secs', 'batil' ),
        )
    );

}
add_filter( 'wp_enqueue_scripts', 'wobar_enqueue_scripts', 100 ,2 );

/**
 *	Plugin Deactivate Confirmation
 *
 */
if( !function_exists('batil_plugin_deactivate') ){
	function batil_plugin_deactivate(){
		ob_start();
		?>
		<script type="text/javascript">
			window.onload = function() {
			    document.querySelector('[data-slug="batil"] a').addEventListener('click', function(event) {
			        event.preventDefault()
			        var urlRedirect = document.querySelector('[data-slug="batil"] a').getAttribute('href');
			        if ( confirm( 'Are you sure ?\n( You will lose your saved options )' ) ) {
			            window.location.href = urlRedirect;
			        } else {
			            //what else ?
			        }
			    })
			}
		</script>
		<?php
		echo ob_get_clean();

	}
}
add_action( 'admin_footer', 'batil_plugin_deactivate' );