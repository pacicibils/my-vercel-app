# 🚀 Despliegue de WordPress en Vercel (Plan Gratuito)

## Instrucciones Rápidas para Desplegar

### Opción 1: Deploy desde GitHub (Automático)

1. **Sube este código a tu repositorio de GitHub**
   - Repositorio creado: `https://github.com/pacicibils/my-vercel-app`

2. **Ve al dashboard de Vercel**
   - [vercel.com/dashboard](https://vercel.com/dashboard)
   - Inicia sesión con tu cuenta de GitHub

3. **Importa el repositorio**
   - Haz click en "Add New..." → "Project"
   - Busca y selecciona: `pacicibils/my-vercel-app`
   - Click en "Import"

4. **Configura las variables de entorno** (antes de deploy):
   
   Ve a Settings → Environment Variables:

   | Variable | Valor | Descripción |
   |----------|-------|-------------|
   | `WP_URL` | `https://tudominio.vercel.app` | URL que generará Vercel automáticamente |
   | `ADMIN_EMAIL` | `tu@email.com` | Correo para la cuenta admin de WordPress |
   | `WORDPRESS_DB_HOST` | `/var/task/wp-content/db.sqlite` | Base de datos SQLite (gratis) |
   | `VERCEL_ENV` | `production` | Modo de producción |

5. **Desplegar**
   - Click en el botón "Deploy"
   - Vercel compilará y desplegará tu proyecto automáticamente

### Opción 2: Deploy Manual desde tu PC

```bash
# 1. Ir al repositorio localmente
cd my-vercel-app

# 2. Instalar dependencias
npm install

# 3. Crear archivo .env con tus variables
cp .env.example .env
echo "WP_URL=https://tudominio.vercel.app" >> .env
echo "ADMIN_EMAIL=tu@email.com" >> .env

# 4. Desplegar a Vercel
vercel deploy --prod
```

## 📋 Variables de Entorno Necesarias

### Mínimas (Obligatorias):

| Variable | Valor por defecto | Descripción |
|----------|-------------------|-------------|
| `WP_URL` | Auto-detected | Tu URL en Vercel |
| `ADMIN_EMAIL` | admin@example.com | Correo para login admin |

### Opcionales (Recomendadas):

| Variable | Valor sugerido | Descripción |
|----------|----------------|-------------|
| `WORDPRESS_DB_HOST` | `/var/task/wp-content/db.sqlite` | Ruta a SQLite |
| `VERCEL_ENV` | `production` | Modo de Vercel |
| `VERCEL_URL` | Auto-detected | URL en producción |

## 🔧 Estructura del Proyecto

```
my-vercel-app/
├── package.json              # Dependencias del proyecto
├── vercel.json               # Configuración principal de Vercel
├── .gitignore                # Archivos ignorados por Git
├── .env.example              # Plantilla de variables de entorno
├── deploy.sh                 # Script de despliegue manual
├── DEPLOYMENT.md             # Esta documentación
├── README.md                 # Documentación general
├── init-wordpress.php        # Script inicializador
└── vercel/
    └── index.js              # Función principal serverless
```

## 🎯 Características del Plan Gratuito de Vercel

✅ **Totalmente compatible con el plan gratuito:**
- 100 GB ancho de banda/mes
- 100 funciones serverless/hora
- Funciones hasta 1s (suficiente para WordPress simple)
- Domains personalizados gratis

⚠️ **Consideraciones importantes:**
- El tiempo máximo de función es 1s en el plan free
- Base de datos debe ser externa (SQLite, NeonDB, Supabase, etc.)
- Algunos plugins no son compatibles con serverless

## 📝 Pasos Posteriores al Deploy

### 1. Verificar despliegue exitoso

Ve a tu dashboard de Vercel y verifica que el estado sea "Ready".

### 2. Configurar WordPress

Cuando por primera vez visites tu URL:
- Verás la pantalla de bienvenida de WordPress
- Click en "Install WordPress" o accede directamente a `/wp-admin/setup-config.php?new=1`

### 3. Login inicial

- Usuario: `admin` (por defecto)
- Correo: Configura en variables de entorno
- Contraseña: Se generará automáticamente durante la instalación

## 🛠️ Comandos Útiles

```bash
# Verificar configuración actual
vercel --list

# Ver logs del último deploy
vercel logs

# Verificar que todo está bien
cd my-vercel-app && npm install && vercel --info

# Ver el estado del build
vercel ls

# Desplejar en un branch específico (dev)
git checkout dev
vercel deploy --prod --branch=dev
```

## 📊 Dashboard de Vercel

Una vez desplegado, ve a:
- [Dashboard](https://vercel.com/dashboard): Estado general del proyecto
- [Settings](https://vercel.com/settings): Configuración avanzada
- [Environment Variables](https://vercel.com/settings/environment): Variables de entorno
- [Analytics](https://vercel.com/analytics): Métricas y performance

## 🔗 Enlaces Útiles

- [Vercel Dashboard](https://vercel.com/dashboard) - Panel principal
- [Vercel Functions](https://vercel.com/docs/functions) - Documentación oficial
- [WordPress Serverless Template](https://vercel.com/templates/other/serverless-wordpress) - Plantilla oficial
- [Vercel Free Tier Limits](https://vercel.com/pricing) - Límites del plan gratuito

## 💡 Consejos para Vercel Free Tier

### Optimización de funciones:
```javascript
// Mantén tus funciones por debajo de 1s (límite free tier)
// Ejemplo:
const handler = async (req, res) => {
  const data = await someFastOperation(); // < 1s
  res.json(data);
};
```

### Base de datos externa recomendada:
- **NeonDB** (PostgreSQL serverless - gratis)
- **Supabase** (PostgreSQL con Firebase API - gratis)
- **SQLite** en file system (solo desarrollo)

### Plugins compatibles:
- Optimiza plugins ligeros
- Evita plugins con websockets o cron jobs pesados
- Testea cada plugin antes de producción

## 🚨 Solución de Problemas Comunes

### Error: "Function timeout exceeded 1000ms"
**Solución:** Divide tu lógica en múltiples funciones más pequeñas

### Error: "Database connection failed"
**Solución:** Usa NeonDB o Supabase como base de datos externa

### Error: "Permission denied"
**Solución:** Verifica que las variables de entorno estén configuradas correctamente

## 📞 Soporte

- **Vercel Docs**: [vercel.com/docs](https://vercel.com/docs)
- **WordPress Stack Overflow**: [wordpress.stackexchange.com](https://wordpress.stackexchange.com)
- **Vercel Support**: Abre un ticket desde tu dashboard

---

**¡Disfruta tu WordPress Serverless en Vercel!** 🎉
