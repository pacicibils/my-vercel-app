# Configuración con NeonDB Serverless (Gratis)

NeonDB es una base de datos PostgreSQL serverless gratuita que funciona perfectamente con Vercel.

## 🔗 Crear cuenta en NeonDB

1. Ve a [https://neon.tech](https://neon.tech)
2. Haz click en "Sign up" o "Start for Free"
3. Conecta con GitHub o email

## 📋 Obtener credenciales

Una vez en el dashboard de NeonDB:

1. Haz click en tu proyecto (ej: `vercel-demo`)
2. Ve a la pestaña **Settings** → **Connections**
3. Copia las credenciales:

```env
NEON_HOST=ep-something-postgresql.vercel.internal
NEON_PORT=5432
NEON_DB_NAME=vercel
NEON_USER=your_username
NEON_PASSWORD=your_password_here
```

## 🔧 Configurar en Vercel

En tu dashboard de Vercel:

1. Ve a Settings → Environment Variables
2. Agrega estas variables:

| Variable | Valor |
|----------|-------|
| `WORDPRESS_DB_HOST` | `$NEON_HOST:$NEON_PORT` |
| `WORDPRESS_DB_NAME` | `$NEON_DB_NAME` |
| `WORDPRESS_DB_USER` | `$NEON_USER` |
| `WORDPRESS_DB_PASSWORD` | `$NEON_PASSWORD` |
| `WORDPRESS_DB_CHARSET` | `utf8mb4` |

## 📝 Ejemplo completo de variables de entorno

```env
# Variables mínimas (obligatorias)
WP_URL=https://tu-proyecto.vercel.app
ADMIN_EMAIL=tu@email.com

# Variables opcionales - RECOMENDADO USAR NEONDB
WORDPRESS_DB_HOST=ep-something-postgresql.vercel.internal:5432
WORDPRESS_DB_NAME=vercel
WORDPRESS_DB_USER=your_username
WORDPRESS_DB_PASSWORD=your_password_here
WORDPRESS_DB_CHARSET=utf8mb4

# Variables de Vercel
VERCEL_ENV=production
```

## ✅ Ventajas de usar NeonDB con Vercel

- **100% Gratis** (plan gratuito)
- **Serverless**: Se escala automáticamente
- **PostgreSQL moderno**: Compatible con la mayoría de plugins de WordPress
- **Branches automáticos**: Git branching gratis
- **Backup automático**: Incluido en el plan gratuito
- **Migraciones fáciles**: Usa comandos SQL estándar

## 🚀 Desplejar con NeonDB

1. Configura las variables en Vercel Dashboard
2. Haz deploy normal: `vercel deploy --prod`
3. WordPress se conectará automáticamente a la base de datos

## 📊 Dashboard de NeonDB

- [https://neon.tech/dashboard](https://neon.tech/dashboard) - Panel principal
- Verifica que el status sea "Ready"
- Revisa los logs para debugging

---

**NeonDB es altamente recomendado para WordPress en Vercel Free Tier!** 🎉