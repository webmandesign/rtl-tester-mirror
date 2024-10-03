<?php if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Plugin Name:  RTL Tester Mirror by WebMan
 * Plugin URI:   https://www.webmandesign.eu/portfolio/rtl-tester-mirror-wordpress-plugin/
 * Description:  Makes it easy for LTR language speaker to test the RTL website layout by mirroring it with CSS transform so it looks like LTR. Works great with RTL Tester plugin.
 * Version:      1.0.5
 * Author:       WebMan Design, Oliver Juhas
 * Author URI:   https://www.webmandesign.eu/
 * License:      GPL-3.0-or-later
 * License URI:  http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:  rtl-tester-mirror
 * Domain Path:  /languages
 *
 * Requires PHP:       7.0
 * Requires at least:  6.0
 *
 * @copyright  WebMan Design, Oliver Juhas
 * @license    GPL-3.0, http://www.gnu.org/licenses/gpl-3.0.html
 *
 * @link  http://www.webmandesign.eu
 *
 * @package  WebMan RTL Tester Mirror
 */

/**
 * Mirror the RTL site
 *
 * @since    1.0
 * @version  1.0.3
 */
function rtl_tester_mirror_styles() {

	// Requirements check

		if ( ! is_rtl() ) {
			return;
		}


	// Helper variables

		$styles = '';


	// Processing

		// Mirror the site

			$styles .= 'html {
					transform: scaleX(-1);
				}';

		// Display notice

			$styles .= 'html::after {
					content: "' . esc_attr__( 'Mirrored RTL', 'rtl-tester-mirror' ) . '";
					position: fixed;
					display: inline-block;
					left: 50%;
					top: -3px;
					padding: 10px 20px;
					font-size: 12px;
					font-family: sans-serif;
					text-transform: uppercase;
					background: #21759b;
					color: #fff;
					white-space: nowrap;
					z-index: 9999999;
					border-radius: 3px;
					transform: scaleX(-1) translateX(50%);
					transform-origin: 50% 0;
				}';

		// WP toolbar fix

			$styles .= '#wpadminbar { margin-top: -32px; }';
			$styles .= '.wp-admin #wpadminbar { margin-top: 0; }';


	// Output

		echo '<style type="text/css" media="screen">' . $styles . '</style>';

} // /rtl_tester_mirror_styles

add_action( 'wp_head',            'rtl_tester_mirror_styles', 9999 );
add_action( 'admin_print_styles', 'rtl_tester_mirror_styles', 9999 );
