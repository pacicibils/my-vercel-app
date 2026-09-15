# 🚀 Instrucciones para Desplegar en Vercel

## ⚡ Acción Rápida (5 minutos)

### Paso 1: Ir al Dashboard de Vercel

Abre tu navegador y ve a:
```
https://vercel.com/dashboard
```

---

### Paso 2: Iniciar Sesión

Haz click en "Sign in with GitHub" para iniciar sesión con tu cuenta de GitHub.

---

### Paso 3: Importar Repositorio

1. Haz click en **"Add New..."** → **"Project"**
2. En el buscador, escribe o selecciona: **`pacicibils/my-vercel-app`**
3. Click en **"Deploy with Vercel"**

---

### Paso 4: Configurar Variables de Entorno (IMPORTANTE)

Antes de hacer deploy, configura las variables:

1. En la pantalla de configuración del proyecto:
   - Ve a **Settings** → **Environment Variables**
   
2. Agrega estas variables:

| Variable | Valor | Descripción |
|----------|-------|-------------|
| `WP_URL` | Auto-detected | Vercel generará automáticamente esta URL |
| `ADMIN_EMAIL` | admin@example.com | Correo para login de WordPress admin |

3. Click en **"Add"** para cada variable

---

### Paso 5: Desplejar

1. Haz click en el botón **"Deploy"**
2. Vercel comenzará a analizar y desplejar tu proyecto automáticamente ✅

---

## 📋 Configuración Completa de Variables

Si quieres personalizar las variables, usa esta configuración:

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

## ✅ Post-Deploy

Después de que Vercel termine el despliegue:

1. **Revisa el estado:** Debe decir "Ready" ✅
2. **Accede a tu sitio:** Click en **"Visit"** o usa la URL generada
3. **Configura WordPress:** Sigue el asistente de instalación
4. **Login inicial:** Usuario `admin`, correo configurado arriba

---

## 🔗 Enlaces Útiles

- [Dashboard Vercel](https://vercel.com/dashboard) - Panel principal
- [Configuración de Variables](https://vercel.com/settings/environment) - Variables globales
- [Deployments](https://vercel.com/deployments) - Ver historial de deploys

---

## 🎯 Plan Gratuito de Vercel

**Tu proyecto está 100% compatible con el plan gratuito:**

✅ 100 GB ancho de banda/mes  
✅ 100 funciones serverless/hora  
✅ Funciones hasta 1s (perfecto para WordPress)  
✅ Domains personalizados gratis  

---

## 💡 Tips Importantes

### Para Vercel Free Tier:

- **Funciones < 1s:** Mantén las funciones rápidas (< 1 segundo)
- **Base de datos externa:** Usa NeonDB o Supabase (gratis)
- **Plugins compatibles:** Testea cada plugin antes de producción

---

## 📊 Verificar Despliegue Exitoso

Tu despliegue fue exitoso cuando:

✅ Estado del deploy: "Ready"  
✅ URL accesible en tu navegador  
✅ WordPress asistente funcionando  
✅ Sin errores en los logs  

---

## 🚀 ¡Listo para Usar!

**Una vez desplegado, accede a:**
```
https://tu-proyecto.vercel.app
```

O usa el enlace que generará Vercel automáticamente.

---

**¡Disfruta tu WordPress en Vercel Free Tier!** 🎉
