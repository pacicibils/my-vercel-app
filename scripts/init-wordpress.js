const { vercel } = require('@vercel/node');

// Handler para inicializar WordPress en primer acceso
async function handler(request, response) {
  try {
    const url = new URL(request.url);
    
    // Redirigir al asistente de configuración de WordPress
    const setupPath = '/wp-admin/setup-config.php?new=1';
    
    response.writeHead(302, {
      'Location': `https://${url.hostname}${setupPath}`
    });
    response.end();
  } catch (error) {
    console.error('Error in WordPress handler:', error);
    response.status = 500;
    response.end('Error initializing WordPress');
  }
}

module.exports = {
  handlers: [handler]
};