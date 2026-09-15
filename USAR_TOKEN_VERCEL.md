# 🔑 Uso de Token de Vercel - Configuración Manual

## ⚠️ Importante: Configurar Variables en el Dashboard

Para usar tu token de Vercel y desplegar manualmente, sigue estos pasos:

---

## 📋 Pasos para Configurar Variables con Vercel Free Tier

### Paso 1: Ir al Dashboard de Vercel

```
https://vercel.com/dashboard
```

### Paso 2: Importar Repositorio

1. Click en **"Add New..."** → **"Project"**
2. Busca el repositorio: **`pacicibils/my-vercel-app`**
3. Click en **"Deploy with Vercel"**

### Paso 3: Configurar Variables (ANTES del deploy)

En la pantalla de configuración del proyecto:

1. Ve a **Settings** → **Environment Variables**

2. Agrega estas variables obligatorias:

| Variable | Valor Sugerido | Descripción |
|----------|----------------|-------------|
| `WP_URL` | Auto-detected | URL generada automáticamente por Vercel |
| `ADMIN_EMAIL` | admin@example.com | Correo para login de WordPress admin |

3. Click en **"Add"** para cada variable

### Paso 4: Desplejar

1. Click en el botón **"Deploy"**
2. Espera a que Vercel compile y despliegue tu proyecto automáticamente ✅
3. Estado final debe ser **"Ready"**

---

## 📊 Configuración de Variables Recomendada

Para personalizar las variables, usa esta configuración:

```env
# URL del proyecto (Vercel generará esto automáticamente)
WP_URL=https://tu-proyecto.vercel.app

# Correo para la cuenta admin de WordPress
ADMIN_EMAIL=admin@example.com

# Base de datos SQLite local (opcional)
WORDPRESS_DB_HOST=/var/task/wp-content/db.sqlite

# Modo producción
VERCEL_ENV=production
```

---

## 🔧 Configuración Avanzada (Opcional)

Si quieres usar una base de datos externa (NeonDB - gratis):

### Paso 1: Crear cuenta en NeonDB

1. Ve a: [https://neon.tech](https://neon.tech)
2. Click en "Start for Free"
3. Conecta con GitHub

### Paso 2: Obtener credenciales de NeonDB

En el dashboard de NeonDB:

1. Haz click en tu proyecto (ej: `vercel-demo`)
2. Ve a **Settings** → **Connections**
3. Copia las credenciales:

```env
NEON_HOST=ep-something-postgresql.vercel.internal
NEON_PORT=5432
NEON_DB_NAME=vercel
NEON_USER=your_username
NEON_PASSWORD=your_password_here
```

### Paso 3: Configurar en Vercel Dashboard

En Settings → Environment Variables:

| Variable | Valor |
|----------|-------|
| `WORDPRESS_DB_HOST` | `$NEON_HOST:$NEON_PORT` |
| `WORDPRESS_DB_NAME` | `$NEON_DB_NAME` |
| `WORDPRESS_DB_USER` | `$NEON_USER` |
| `WORDPRESS_DB_PASSWORD` | `$NEON_PASSWORD` |

---

## ✅ Verificar Despliegue Exitoso

Tu despliegue fue exitoso cuando:

✅ Estado del deploy: "Ready"  
✅ URL accesible en tu navegador  
✅ WordPress asistente funcionando  
✅ Sin errores en los logs  

---

## 🎯 Plan Gratuito de Vercel

**Tu proyecto está 100% compatible con el plan gratuito:**

- ✅ 100 GB ancho de banda/mes
- ✅ 100 funciones serverless/hora
- ✅ Funciones hasta 1s (perfecto para WordPress)
- ✅ Domains personalizados gratis

---

## 💡 Tips Importantes para Free Tier

### Para optimizar en Vercel Free:

1. **Funciones < 1s:** Mantén las funciones rápidas (< 1 segundo)
2. **Base de datos externa:** Usa NeonDB o Supabase (gratis)
3. **Plugins compatibles:** Testea cada plugin antes de producción
4. **Cron jobs:** Configura en una función serverless que se ejecute cada X minutos

---

## 📊 Verificar Logs del Deploy

Si necesitas revisar los logs:

```bash
vercel logs --env=production
```

O desde el dashboard de Vercel:
- Dashboard → Deployment → Click en el deploy más reciente
- Scroll down para ver "Logs"

---

## 🔗 Enlaces Útiles

| Servicio | URL |
|----------|-----|
| **Dashboard Vercel** | https://vercel.com/dashboard |
| **Configuración Variables** | https://vercel.com/settings/environment |
| **Deployments** | https://vercel.com/deployments |
| **Serverless Functions** | https://vercel.com/docs/functions |

---

## 📝 Instrucciones Rápidas (Resumen)

### Paso 1: Dashboard Vercel
```
https://vercel.com/dashboard
```

### Paso 2: Importar Repositorio
- Add New → Project
- Importa: `pacicibils/my-vercel-app`

### Paso 3: Configurar Variables (OBLIGATORIO)
Settings → Environment Variables:
- WP_URL: Auto-detected
- ADMIN_EMAIL: admin@example.com

### Paso 4: Click en Deploy
Vercel desplejará automáticamente ✅

---

## 🎉 ¡Listo!

Una vez desplegado:

1. Accede a tu sitio con la URL generada por Vercel
2. Configura WordPress siguiendo el asistente
3. Crea tu cuenta admin con el correo configurado

---

**¡Disfruta tu WordPress en Vercel Free Tier!** 🎉
