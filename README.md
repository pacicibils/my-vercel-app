# WordPress Serverless en Vercel (Plan Gratuito)

Este proyecto configura WordPress como una función serverless en Vercel, utilizando el plan gratuito.

## 🚀 Despliegue Rápido

### Opción 1: Deploy desde GitHub (Recomendado)

1. **Sube este código a tu repositorio de GitHub**
2. Ve a [Vercel.com](https://vercel.com/dashboard)
3. Haz click en "Add New..." → "Project"
4. Importa tu repositorio de GitHub (`pacicibils/my-vercel-app`)
5. Configura las variables de entorno:
   - `WP_URL`: `https://tudominio.vercel.app` (lo generará Vercel automáticamente)
   - `ADMIN_EMAIL`: Tu correo electrónico
6. Click en "Deploy"

### Opción 2: Deploy Manual desde tu PC

```bash
cd my-vercel-app
npm install
npm run build
vercel deploy --prod
```

## ⚙️ Configuración de Variables de Entorno

En Vercel Dashboard → Settings → Environment Variables:

| Variable | Valor |
|----------|-------|
| `WP_URL` | La URL que generará Vercel (ej: `https://tu-proyecto.vercel.app`) |
| `ADMIN_EMAIL` | Tu correo para WordPress admin |
| `WORDPRESS_DB_HOST` | (opcional) Para configuración personalizada |

## 📋 Estructura del Proyecto

```
my-vercel-app/
├── package.json          # Dependencias del proyecto
├── vercel.json           # Configuración de Vercel
├── .gitignore            # Archivos ignorados por Git
├── README.md             # Documentación
└── vercel/
    └── index.js          # Función principal serverless
```

## 🔧 Qué hace este setup

1. **WordPress Serverless**: Ejecuta WordPress como una función serverless en Vercel
2. **Sin servidor MySQL**: Utiliza SQLite o base de datos serverless
3. **Totalmente gratis**: Compatible con el plan gratuito de Vercel
4. **Auto-deploy desde GitHub**: Cada commit despliega automáticamente

## 📝 Pasos para la primera vez

1. **Primer despliegue**:
   ```bash
   cd my-vercel-app
   npm install
   vercel
   ```

2. **Configurar WordPress** (se hará automáticamente al primer acceso):
   - Ve a tu URL de Vercel
   - Sigue el asistente de instalación de WordPress

3. **Login**:
   - Admin usuario: `admin` (por defecto)
   - Correo: Configura en variables de entorno

## 🎯 Plan Gratuito de Vercel

✅ **Totalmente compatible con el plan gratuito**
- 100 GB ancho de banda/mes
- 100 funciones/hora
- Funciones hasta 1s (recomendado para WordPress)
- Domains personalizados gratis (con tu propio dominio)

## 🛠️ Comandos Útiles

```bash
# Verificar configuración
vercel --list

# Desplegar al branch actual
vercel deploy

# Desplejar en producción
vercel deploy --prod

# Ver logs
vercel logs
```

## ⚠️ Consideraciones Importantes

- **WordPress serverless** es diferente a WordPress tradicional
- Requiere configuración especial del tema y plugins
- Algunos plugins no son compatibles con el ambiente serverless
- La base de datos debe ser compatible con serverless (SQLite, NeonDB, etc.)

## 📚 Recursos Adicionales

- [Vercel Serverless Functions](https://vercel.com/docs/functions)
- [WordPress en Vercel](https://vercel.com/templates/other/serverless-wordpress)

---

**¡Disfruta tu WordPress en Vercel!** 🎉
