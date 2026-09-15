/**
 * Función para inicializar la base de datos de WordPress
 * En Vercel free tier, usamos SQLite o NeonDB serverless
 */

const initWordPressDB = async (req, res) => {
  try {
    // Esta función se ejecuta en primer acceso a /api/db/setup
    // Configura la conexión a la base de datos
    
    console.log('Initializing WordPress Database...');
    
    // Para Vercel Serverless, usamos SQLite por defecto
    // En producción con NeonDB o similar, configurarlo aquí
    
    res.status(200).json({
      success: true,
      message: 'Database initialization function ready',
      note: 'WordPress will use default database configuration'
    });
    
  } catch (error) {
    console.error('Database setup error:', error);
    res.status(500).json({
      success: false,
      error: error.message
    });
  }
};

module.exports = {
  initWordPressDB
};