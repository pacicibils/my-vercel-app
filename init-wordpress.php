<?php
/**
 * Initializador de WordPress para Vercel Serverless
 * 
 * Este script inicializa WordPress en un entorno serverless
 */

// Configuración básica
$WP_URL = getenv('WP_URL') ?: 'https://tudominio.vercel.app';
$ADMIN_EMAIL = getenv('ADMIN_EMAIL') ?: 'admin@example.com';

echo "🚀 Inicializando WordPress Serverless...\n";
echo "URL: $WP_URL\n";
echo "Admin Email: $ADMIN_EMAIL\n\n";

// Crear base de datos SQLite por defecto
$db_file = '/vercel/wp-content/db.sqlite';

if (!file_exists($db_file)) {
    echo "📦 Creando base de datos SQLite...\n";
    
    // Usar SQLite para Vercel Free Tier
    $sqlite_db = new PDO('sqlite:' . $db_file);
    
    // Crear tablas necesarias
    $sqlite_db->exec("CREATE TABLE IF NOT EXISTS wp_users (id INTEGER PRIMARY KEY AUTOINCREMENT, user_login varchar(60) NOT NULL DEFAULT 'admin', display_name varchar(250), user_email varchar(100))");
    
    echo "✅ Base de datos SQLite creada\n";
} else {
    echo "✅ Base de datos ya existe\n";
}

echo "\n✨ WordPress Serverless inicializado correctamente!\n";
echo "📝 Para finalizar, accede a: $WP_URL/wp-admin/setup-config.php?new=1\n";

?>