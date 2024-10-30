<?php
/**
 * Hayat Developers
 *
 * @package     Wp Plugin Box
 * @author      Hayat Developers
 * @copyright   2021 Wp Plugin Box
 * @license     GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name: Inline Crypto Price 
 
 * Description: Display crptocurrency to fiat currency exchange rates within a line of text on your page/post.

 * Version:     2.1.0
 * Author:      Hayat Developers | Wp Plugin Box
 * Author URI:  https://wppluginbox.com
 * Text Domain: Inline Crypto Price 
 * License:     GPL v2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

include __DIR__.'/functions.php';
$short_code = 'ICP-BTCUSD';


register_activation_hook(__FILE__, 'ICP_ActivateStatus');
register_deactivation_hook(__FILE__, 'ICP_DeactivateStatus');


add_action( 'admin_enqueue_scripts', 'ICP_css' );
add_action('admin_menu', 'ICP_menu');

add_action('wp_enqueue_scripts', 'ICP_scripts',11);


$web_url =  $_SERVER['REQUEST_URI'];
$filter_w = 'wp-admin';
if(strpos($web_url, $filter_w) !== false){return 0;} else {
add_shortcode($short_code, 'ICP_initiate');
}


?>