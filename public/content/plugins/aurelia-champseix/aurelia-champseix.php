<?php
/**
 * Plugin Name: Aurélia Champseix
 * Description: Custom Post Type : Les thérapies
 * Version: 0.1
 * Author: Loïc Tran
 */

use Aurelia\Plugin;

require __DIR__ . '/vendor-aurelia/autoload.php';

$aurelia = new Plugin();

register_activation_hook(__FILE__, [$aurelia, 'activate']);
register_deactivation_hook( __FILE__, [$aurelia, 'deactivate']);
