/**
 * WordPress Serverless on Vercel - Free Tier Setup
 * 
 * Esta función inicializa WordPress como una función serverless en Vercel.
 * Compatible con el plan gratuito de Vercel.
 */

const { vercel } = require('@vercel/node');

// Configuración inicial
const VERCEL_DIR = '/var/task/www'; // Ruta donde se instala WordPress en Vercel

/**
 * Función principal de inicialización
 */
async function initWordPress(request, response) {
  try {
    const url = new URL(request.url, `https://${process.env.VERCEL_URL}`);
    
    console.log('🚀 Initializing WordPress Serverless...');
    console.log('Environment:', process.env.VERCEL_ENV);
    console.log('URL:', url.href);
    
    // Redirigir al asistente de configuración de WordPress
    const redirectPath = '/wp-admin/setup-config.php?new=1';
    
    response.writeHead(302, {
      'Location': `https://${url.hostname}${redirectPath}`,
      'Content-Type': 'text/html'
    });
    
    response.end('Redirecting to WordPress Setup...');
    
  } catch (error) {
    console.error('❌ Error initializing WordPress:', error);
    
    response.writeHead(500, {
      'Content-Type': 'text/html'
    });
    
    response.end(`
      <html>
        <body>
          <h1>Error Initializing WordPress</h1>
          <p>Error: ${error.message}</p>
          <p>Try refreshing the page or check Vercel logs.</p>
        </body>
      </html>
    `);
  }
}

/**
 * Exportar el handler de Vercel
 */
module.exports = {
  handlers: [
    initWordPress
  ],
  // Configuración adicional para Vercel
  functions: {
    'vercel/index.js': {
      maxDuration: 10
    }
  }
};

/**
 * Nota importante:
 * 
 * Para desplegar WordPress en Vercel Free Tier:
 * 
 * 1. Usa una base de datos externa (NeonDB, Supabase, etc.)
 * 2. O usa SQLite serverless
 * 3. Configura las variables de entorno adecuadas
 * 
 * Variables necesarias:
 * - WP_URL: Tu URL en Vercel
 * - ADMIN_EMAIL: Correo para la cuenta admin
 * - WORDPRESS_DB_HOST: Host de la base de datos (opcional)
 * - WORDPRESS_DB_NAME: Nombre de la base de datos
 * - WORDPRESS_DB_USER: Usuario de la base de datos
 * - WORDPRESS_DB_PASSWORD: Contraseña de la base de datos
 */
