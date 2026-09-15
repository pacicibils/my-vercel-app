# WordPress Serverless en Vercel (Free Tier)

**GitHub:** [pacicibils/my-vercel-app](https://github.com/pacicibils/my-vercel-app)  
**Estado:** ✅ Listo para desplegar en Vercel Free Tier

---

## 🚀 Despliegue Rápido en Vercel

### Opción 1: Deploy desde Dashboard (Recomendado)

1. **Ve al dashboard de Vercel:**
   - [vercel.com/dashboard](https://vercel.com/dashboard)
   
2. **Importa el repositorio:**
   - Click en "Add New..." → "Project"
   - Busca: `pacicibils/my-vercel-app`
   - Click en "Deploy with Vercel"

3. **Configura variables de entorno** (antes del deploy):
   
   Settings → Environment Variables:

| Variable | Valor | Descripción |
|----------|-------|-------------|
| `WP_URL` | Auto-detected | URL que generará Vercel automáticamente |
| `ADMIN_EMAIL` | admin@example.com | Correo para login admin de WordPress |

4. **Click en "Deploy"** - Vercel desplejará tu proyecto automáticamente! ✅

### Opción 2: Deploy desde CLI

```bash
cd my-vercel-app
npm install
vercel deploy --prod
```

---

## 📋 Variables de Entorno Necesarias

Antes de desplegar, configura estas variables en Vercel Dashboard:

```env
# Mínimas (obligatorias)
WP_URL=https://tudominio.vercel.app      # Auto-detected por Vercel
ADMIN_EMAIL=admin@example.com            # Correo para login admin

# Opcionales
WORDPRESS_DB_HOST=/var/task/wp-content/db.sqlite    # SQLite local
VERCEL_ENV=production                                # Modo producción
```

---

## 🎯 Características del Plan Gratuito de Vercel

✅ **Totalmente compatible con el plan gratuito:**
- 100 GB ancho de banda/mes
- 100 funciones serverless/hora
- Funciones hasta 1s (suficiente para WordPress simple)
- Domains personalizados gratis

---

## 📝 Estructura del Proyecto

```
my-vercel-app/
├── package.json              # Dependencias npm
├── vercel.json               # Configuración principal de Vercel
├── .gitignore                # Archivos ignorados por Git
├── .env.example              # Plantilla de variables de entorno
├── README.md                 # Esta documentación
├── DEPLOYMENT.md             # Guía completa de despliegue
└── vercel/
    └── index.js              # Función principal serverless
```

---

## 🔧 Pasos para Desplegar (Resumen)

### Paso 1: Configurar Variables en Vercel Dashboard

Antes de desplegar, ve a Settings → Environment Variables y agrega:

| Variable | Valor |
|----------|-------|
| `WP_URL` | Auto-detected (Vercel lo configura) |
| `ADMIN_EMAIL` | admin@example.com |

### Paso 2: Importar Repositorio en Vercel

1. Dashboard → Add New → Project
2. Busca: `pacicibils/my-vercel-app`
3. Click en "Deploy"

### Paso 3: Esperar el Deploy

Vercel automáticamente:
- Detectará tu repositorio de GitHub ✅
- Compilará tu proyecto ✅
- Desplejará a producción ✅

---

## 🎉 Post-Deploy

Después del despliegue exitoso:

1. **Accede a tu sitio:** `https://tu-proyecto.vercel.app`
2. **Configura WordPress:** Sigue el asistente de instalación
3. **Cuenta admin:** Usuario `admin`, correo configurado en variables

---

## 🔗 Enlaces Útiles

- [Dashboard Vercel](https://vercel.com/dashboard) - Panel principal
- [Vercel Serverless Functions](https://vercel.com/docs/functions) - Documentación
- [WordPress Template Oficial](https://vercel.com/templates/other/serverless-wordpress)
- [Vercel Pricing](https://vercel.com/pricing) - Límites del plan gratuito

---

## 📊 Estado Actual

- **GitHub:** ✅ Repositorio creado y configurado
- **Estructura:** ✅ Lista para Vercel Serverless
- **Variables:** ⚙️ Deben configurarse antes del deploy
- **Estado:** 🚀 Listo para desplegar en Vercel Free Tier

---

## 💡 Consejos

- Usa **NeonDB** o **Supabase** como base de datos externa (gratis)
- Mantén las funciones serverless por debajo de 1s
- Testea cada plugin antes de producción

---

**¡Disfruta tu WordPress en Vercel!** 🎉
