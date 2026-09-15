<?php
/* WordPress Configuration for Vercel Serverless - FREE TIER COMPATIBLE */

// Definir ABSPATH si no existe
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

// Configuración de base de datos para Vercel
define( 'DB_NAME', getenv( 'WORDPRESS_DB_NAME' ) ?: 'wordpress_dev' );

// Usar SQLite por defecto en Vercel Free Tier (opcional)
if ( ! defined( 'WP_USE_SQLITE' ) ) {
    define( 'WP_USE_SQLITE', true );
}

// Desactivar WordPress multisite para simplificar
define( 'WP_ALLOW_MULTISITE', false );

// Desactivar la verificación de seguridad estricta
if ( ! defined( 'WP_DEBUG' ) ) {
    define( 'WP_DEBUG', getenv( 'WORDPRESS_DEBUG' ) === 'true' ? true : false );
}

if ( ! defined( 'WP_DEBUG_LOG' ) ) {
    define( 'WP_DEBUG_LOG', false );
}

// Desactivar las actualizaciones automáticas si es necesario
define( 'AUTOMATIC_UPDATER_WP', true );

/**
 * Función para redirigir al setup de WordPress
 */
function redirect_to_wordpress_setup() {
    $server = isset( $_SERVER['SERVER_NAME'] ) ? $_SERVER['SERVER_NAME'] : 'localhost';
    $url = trailingslashit( WP_USE_SQLITE ? '/wp' : '/wp-admin/setup-config.php?new=1' );
    
    if ( is_ssl() ) {
        header( "Location: https://$server$url" );
    } else {
        header( "Location: http://$server$url" );
    }
}

// Si no se ha definido la base de datos, redirigir al setup
if ( ! defined( 'DB_NAME' ) || empty( DB_NAME ) ) {
    redirect_to_wordpress_setup();
}

/**
 * Inicialización del asistente de WordPress
 */
add_action( 'init', function() {
    // Solo ejecutar si es la primera vez
    if ( ! isset( $wpdb->users ) && ! $wpdb->get_var( "SELECT ID FROM wp_users LIMIT 1" ) ) {
        
        global $wp_version;
        
        // Mostrar pantalla de bienvenida
        echo '<!DOCTYPE html>';
        echo '<html><head><title>WordPress Installation</title></head><body>';
        echo '<h1>🚀 WordPress Serverless Setup</h1>';
        echo '<p>Configuring WordPress...</p>';
        
        // Configurar base de datos y archivos
        $wpdb->charset = 'utf8mb4';
        $wpdb->collate = 'utf8mb4_unicode_ci';
        
        // Crear la base de datos si no existe
        global $wpdb;
        $sql = "CREATE TABLE IF NOT EXISTS `{$wpdb->options}` (
            `option_id` bigint(21) unsigned NOT NULL AUTO_INCREMENT,
            `option_name` varchar(64) NOT NULL DEFAULT '',
            `option_value` longtext NOT NULL,
            `autoload` varchar(20) NOT NULL DEFAULT 'yes',
            PRIMARY KEY  (`option_id`),
            UNIQUE KEY `option_name` (`option_name`)
        )";
        
        if ( ! $wpdb->query( $sql ) ) {
            echo '<p>Creating database tables...</p>';
        }
        
        // Redirigir al asistente de configuración
        redirect_to_wordpress_setup();
    }
});

/**
 * Función para configurar WordPress en primer acceso
 */
add_action( 'plugins_loaded', function() {
    // Redirigir al setup si es necesario
    if ( ! isset( $_GET['new'] ) && empty( get_option('siteurl') ) ) {
        redirect_to_wordpress_setup();
    }
});

/**
 * Configuración de constantes de seguridad
 */
if ( ! defined( 'WP_CONTENT_DIR' ) ) {
    define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/wp-content' );
}

if ( ! defined( 'WP_PLUGIN_DIR' ) ) {
    define( 'WP_PLUGIN_DIR', dirname( __FILE__ ) . '/wp-content/plugins' );
}

/**
 * Redirigir todas las rutas al setup de WordPress
 */
add_action('template_redirect', function() {
    if ( ! isset( $wpdb->users ) && ! $wpdb->get_var( "SELECT ID FROM wp_users LIMIT 1" ) ) {
        redirect_to_wordpress_setup();
    }
});

// Exportar la función para Vercel
if ( defined( 'ABSPATH' ) ) {
    require_once dirname( __FILE__ ) . '/wp-load.php';
} else {
    // Función standalone para Vercel Serverless
    function init_wordpress_handler() {
        global $wpdb;
        
        // Redirigir al setup de WordPress
        redirect_to_wordpress_setup();
    }
}

?>