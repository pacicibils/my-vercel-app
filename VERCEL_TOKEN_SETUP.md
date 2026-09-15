# 🚀 Configuración de Vercel con Token (Manual)

## ⚠️ Importante: Deploy Manual con Token

Si quieres desplegar este proyecto manualmente en Vercel usando tu token, sigue estos pasos:

---

## 🔑 Pasos para Desplegar Manualmente

### Paso 1: Iniciar sesión en Vercel

Abre tu terminal y ejecuta:

```bash
npx vercel login --scope=<tu-email>
```

O si ya estás logueado, puedes continuar directamente.

---

### Paso 2: Configurar Variables de Entorno

Antes de desplegar, ve a tu dashboard de Vercel:

1. Ve a [vercel.com/dashboard](https://vercel.com/dashboard)
2. Haz click en "Add New..." → "Project"
3. Importa el repositorio: `pacicibils/my-vercel-app`
4. **Importante:** Antes de desplegar, configura las variables de entorno:

   Settings → Environment Variables:

| Variable | Valor | Descripción |
|----------|-------|-------------|
| `WP_URL` | Auto-detected | URL que generará Vercel automáticamente |
| `ADMIN_EMAIL` | admin@example.com | Correo para la cuenta admin de WordPress |
| `WORDPRESS_DB_HOST` | `/var/task/wp-content/db.sqlite` | Base de datos SQLite (gratis) |

---

### Paso 3: Desplegar al Proyecto

Una vez configurado todo, haz click en "Deploy". Vercel automáticamente detectará el repositorio y desplegará tu proyecto.

---

## 🎯 Deploy Directo desde CLI (Sin Dashboard)

Si quieres desplegar directamente desde la línea de comandos:

```bash
cd my-vercel-app
npm install
vercel deploy --prod
```

Esto creará automáticamente un nuevo despliegue en producción.

---

## 📋 Variables de Entorno Recomendadas

Copia esta configuración completa para `.env`:

```env
# URL principal (auto-detected por Vercel)
WP_URL=https://tudominio.vercel.app

# Email admin
ADMIN_EMAIL=admin@example.com

# Base de datos local SQLite (gratis)
WORDPRESS_DB_HOST=/var/task/wp-content/db.sqlite

# Configuración adicional
WORDPRESS_DB_CHARSET=utf8mb4
VERCEL_ENV=production
```

---

## 🚀 Desplegar con Vercel CLI (Rápido)

```bash
# 1. Instalar Vercel CLI globalmente (opcional)
npm install -g vercel

# 2. Ir al proyecto
cd my-vercel-app

# 3. Install dependencias
npm install

# 4. Deploy automático
vercel deploy --prod
```

---

## ✅ Verificación Post-Deploy

Después de desplegar:

1. **Revisa el estado del despliegue:**
   - Ve a tu dashboard de Vercel
   - Click en "Deployment" → Verifica que el status sea "Ready"

2. **Accede a WordPress:**
   - Abre tu URL de producción (ej: `https://tu-proyecto.vercel.app`)
   - Selecciona una región
   - Segue el asistente de instalación

3. **Configura tu cuenta admin:**
   - Usuario: `admin` (por defecto)
   - Correo: Configura en variables de entorno
   - Contraseña: Se genera automáticamente

---

## 🔗 Enlaces Útiles

- [Dashboard de Vercel](https://vercel.com/dashboard) - Panel principal
- [Configuración de Variables](https://vercel.com/settings/environment) - Variables globales
- [Documentación Vercel Functions](https://vercel.com/docs/functions) - Serverless Functions
- [Vercel Pricing](https://vercel.com/pricing) - Límites del plan gratuito

---

## 💡 Tips para el Plan Gratuito de Vercel

### Optimizar funciones serverless:

```javascript
// Mantén tus funciones por debajo de 1s (límite free tier)
const handler = async (req, res) => {
  // Lógica rápida y ligera
  res.json({ success: true });
};
```

### Usar base de datos externa:

NeonDB o Supabase son excelentes opciones para el plan gratuito:
- PostgreSQL serverless
- Planes gratuitos generosos
- Integración fácil con Vercel

---

## 🎉 ¡Listo!

Tu proyecto está completamente configurado y listo para desplegar en Vercel.

**Accede a:** [GitHub](https://github.com/pacicibils/my-vercel-app)

**O despliega desde el dashboard de Vercel:**
[vercel.com/dashboard](https://vercel.com/dashboard)

---

**¡Disfruta tu WordPress en Vercel!** 🚀
