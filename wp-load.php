<?php
/**
 * wp-load.php - WordPress "Loader" for Vercel Serverless
 * 
 * Este archivo es esencial para cargar WordPress en un entorno serverless.
 */

// Definir ABSPATH si no existe
if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

// Cargar wp-config.php si existe
if ( file_exists( dirname( __FILE__ ) . '/.wp-config.php' ) ) {
    require_once dirname( __FILE__ ) . '/.wp-config.php';
} else {
    // Crear configuración por defecto para Vercel
    define( 'WP_USE_SQLITE', true );
}

// Definir rutas necesarias
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/wp-content' );
define( 'WP_PLUGIN_DIR', WP_CONTENT_DIR . '/plugins' );
define( 'WP_THEME_DIR', WP_CONTENT_DIR . '/themes' );

/**
 * Función para inicializar WordPress en primer acceso
 */
function init_wordpress_vercel() {
    // Redirigir al setup si es necesario
    $setup_url = '/wp-admin/setup-config.php?new=1';
    
    global $wpdb;
    
    // Verificar si base de datos está vacía
    if ( ! isset( $wpdb->users ) || empty( get_option('siteurl') ) ) {
        return true; // Necessita inicialización
    }
    
    return false; // WordPress ya está configurado
}

/**
 * Cargar WordPress completo si es posible
 */
try {
    if ( file_exists( dirname( __FILE__ ) . '/wp-settings.php' ) ) {
        require_once dirname( __FILE__ ) . '/wp-settings.php';
    }
    
    // Si no existe wp-settings.php, cargar la instalación mínima
    if ( ! class_exists( 'WP' ) ) {
        // Inicializar WordPress básico
        global $wpdb;
        
        // Configurar tablas de base de datos si no existen
        if ( ! isset( $wpdb->charset ) ) {
            $wpdb->charset = 'utf8mb4';
            $wpdb->collate = 'utf8mb4_unicode_ci';
        }
        
        // Definir nombres de tablas
        $wpdb->prefix = 'wp_';
        $wpdb->comments = $wpdb->prefix . "comments";
        $wpdb->commentmeta = $wpdb->prefix . "commentmeta";
        $wpdb->postmeta = $wpdb->prefix . "postmeta";
        $wpdb->posts = $wpdb->prefix . "posts";
        $wpdb->terms = $wpdb->prefix . "terms";
        $wpdb->term_taxonomy = $wpdb->prefix . "term_taxonomy";
        $wpdb->term_relationships = $wpdb->prefix . "term_relationships";
        $wpdb->term_taxonomy_hierarchy = $wpdb->prefix . "term_taxonomy_hierarchy";
        $wpdb->links = $wpdb->prefix . "links";
        $wpdb->netlinks = $wpdb->prefix . "netlinks";
        $wpdb->wp_usermeta = $wpdb->prefix . "usermeta";
        
    }
} catch ( Exception $e ) {
    // Error al cargar WordPress, continuar con modo básico
}

/**
 * Exportar funciones para uso en Vercel Functions
 */
if ( ! function_exists( 'init_wordpress' ) ) {
    function init_wordpress() {
        global $wpdb;
        
        // Inicializar configuración básica
        $wpdb->charset = 'utf8mb4';
        $wpdb->collate = 'utf8mb4_unicode_ci';
        
        // Configurar tabla de opciones básicas
        $sql = "CREATE TABLE IF NOT EXISTS `{$wpdb->options}` (
            `option_id` bigint(21) unsigned NOT NULL AUTO_INCREMENT,
            `option_name` varchar(64) NOT NULL DEFAULT '',
            `option_value` longtext NOT NULL,
            `autoload` varchar(20) NOT NULL DEFAULT 'yes',
            PRIMARY KEY  (`option_id`),
            UNIQUE KEY `option_name` (`option_name`)
        )";
        
        if ( ! $wpdb->query( $sql ) && $wpdb->last_error ) {
            echo "Warning: Could not create options table\n";
        }
        
        // Redirigir al setup de WordPress
        redirect_to_wordpress_setup();
    }
}

/**
 * Función para redirigir al setup de WordPress
 */
function redirect_to_wordpress_setup() {
    $server = isset( $_SERVER['SERVER_NAME'] ) ? $_SERVER['SERVER_NAME'] : 'localhost';
    
    if ( is_ssl() ) {
        header( "Location: https://$server/wp-admin/setup-config.php?new=1" );
    } else {
        header( "Location: http://$server/wp-admin/setup-config.php?new=1" );
    }
}

// Determinar si es SSL
function is_ssl() {
    return ! empty( $_SERVER['HTTPS'] ) && ( strtolower( $_SERVER['HTTPS'] ) === 'on' || isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' );
}

/**
 * Exportar para uso en funciones serverless
 */
return [
    'ABSPATH' => dirname( __FILE__ ),
    'WP_CONTENT_DIR' => WP_CONTENT_DIR,
    'WP_PLUGIN_DIR' => WP_PLUGIN_DIR,
    'is_vercel' => true,
];

?>