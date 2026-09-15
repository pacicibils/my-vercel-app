# WordPress Serverless en Vercel - Free Tier Compatible

**GitHub:** [pacicibils/my-vercel-app](https://github.com/pacicibils/my-vercel-app)  
**Estado:** ✅ Listo para desplegar en Vercel Free Tier

---

## 🚀 Desplejar en Vercel (Rápido - 5 minutos)

### Paso 1: Ir al Dashboard de Vercel

```
https://vercel.com/dashboard
```

### Paso 2: Importar Repositorio

1. Click en **"Add New..."** → **"Project"**
2. Busca: `pacicibils/my-vercel-app`
3. Click en **"Deploy with Vercel"**

### Paso 3: Configurar Variables (ANTES del deploy)

En la pantalla de configuración → Settings → Environment Variables:

| Variable | Valor | Descripción |
|----------|-------|-------------|
| `WP_URL` | Auto-detected | URL generada por Vercel |
| `ADMIN_EMAIL` | admin@example.com | Correo para login WordPress |

### Paso 4: Click en "Deploy" ✅

Vercel desplejará tu proyecto automáticamente!

---

## 📋 Variables de Entorno Necesarias

```env
# Mínimas (obligatorias)
WP_URL=https://tudominio.vercel.app
ADMIN_EMAIL=admin@example.com

# Opcionales
WORDPRESS_DB_HOST=/var/task/wp-content/db.sqlite
VERCEL_ENV=production
```

---

## 🎯 Vercel Free Tier Compatible

✅ 100 GB ancho de banda/mes  
✅ 100 funciones serverless/hora  
✅ Funciones hasta 1s (perfecto para WordPress)  
✅ Domains personalizados gratis  

---

## 📝 Instrucciones Rápidas

### Deploy desde CLI:

```bash
cd my-vercel-app
npm install
vercel deploy --prod
```

### Post-Deploy:

1. Accede a tu URL de Vercel
2. Configura WordPress siguiendo el asistente
3. Login: Usuario `admin`, correo en variables

---

## 🔗 Enlaces Útiles

- [Dashboard Vercel](https://vercel.com/dashboard)
- [Serverless Functions](https://vercel.com/docs/functions)
- [Vercel Pricing](https://vercel.com/pricing)

---

**¡Disfruta tu WordPress en Vercel!** 🎉
