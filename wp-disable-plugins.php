<?php

/**
 * Plugin Name: Disable Plugin on Admin Pages
 * Plugin URI: https://smkonline.co/
 * Description: Permite desactivar plugin para que no tengan efecto sobre las vistas de administrador.
 * Version: 1.0.0
 * Author: SMK Online
 * Author URI: https://smkonline.co/
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * Text Domain: wp-disable-plugins
 * Domain Path: /lenguages
 */

$active_plugins = get_option('active_plugins');

$modified_admin_url = array_search('wps-hide-login/wps-hide-login.php', $active_plugins);

if ($modified_admin_url) {

    $is_admin = (strpos($_SERVER['REQUEST_URI'], '/emc_celsia-admin') || strpos($_SERVER['REQUEST_URI'], '/wp-admin')) ? true : false;

    $disable_plugin_admin = array(
        'wp-multilang' => 'wp-multilang/wp-multilang.php'
    );

    if ($is_admin) {
        foreach ($disable_plugin_admin as $key => $plugin) {
            unset($plugin);
        }
    }

}
