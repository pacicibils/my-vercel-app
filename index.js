/**
 * WordPress Serverless Handler for Vercel Free Tier
 */

const { vercel } = require('@vercel/static');

// Redirigir a la configuración de WordPress
export async function GET(request, event) {
  const redirectUrl = '/wp-admin/setup-config.php?new=1';
  
  return Response.redirect(`${event.headers.host}${redirectUrl}`, 302);
}
