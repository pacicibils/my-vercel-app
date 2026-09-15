# 🚀 Despliegue de WordPress en Vercel - Guía Completa

## ⚡ Instrucciones Rápidas (5 minutos)

### Paso 1: Preparar el proyecto localmente

```bash
cd my-vercel-app
npm install
```

### Paso 2: Crear archivo `.env` con tus variables

```bash
cp .env.example .env

# Editar .env y agregar:
echo "WP_URL=https://tu-proyecto.vercel.app" >> .env
echo "ADMIN_EMAIL=tu@email.com" >> .env
echo "WORDPRESS_DB_HOST=/var/task/wp-content/db.sqlite" >> .env
```

### Paso 3: Desplejar a Vercel

```bash
vercel deploy --prod
```

¡Listo! Tu WordPress estará en línea. 🎉

---

## 📋 Configuración de Variables de Entorno (OBLIGATORIO)

### Mínimas (Requeridas):

| Variable | Valor Sugerido | Descripción |
|----------|----------------|-------------|
| `WP_URL` | Auto-detected | URL donde estará WordPress |
| `ADMIN_EMAIL` | admin@example.com | Correo para login admin |

### Recomendadas:

| Variable | Valor | Descripción |
|----------|-------|-------------|
| `WORDPRESS_DB_HOST` | `/var/task/wp-content/db.sqlite` | Base de datos local SQLite |
| `VERCEL_ENV` | production | Modo producción de Vercel |

---

## 🎯 Método 1: Deploy desde GitHub (Automático) - RECOMENDADO

### Opción A: Usar template de Vercel oficial (Más fácil)

1. **Ve a este repositorio oficial:**
   ```
   https://github.com/vercel/examples/tree/main/serverless-wordpress
   ```

2. **Haz fork del repositorio** a tu cuenta de GitHub

3. **Importa el repositorio en Vercel:**
   - Ve a [vercel.com/dashboard](https://vercel.com/dashboard)
   - Click en "Add New..." → "Project"
   - Importa tu repositorio: `pacicibils/my-vercel-app`

4. **Configura variables de entorno:**
   - Vercel Dashboard → Settings → Environment Variables
   - Agrega las variables mencionadas arriba

5. **Click en "Deploy"** ✅

### Opción B: Deploy manual con tu proyecto actual

1. **Sube este código a GitHub:**
   ```bash
   cd my-vercel-app
   git init
   git add .
   git commit -m "Initial WordPress Serverless setup"
   git push origin main
   ```

2. **Importa en Vercel:**
   - Dashboard → Add New → Project
   - Importa: `pacicibils/my-vercel-app`

3. **Configura variables de entorno** (antes del deploy)

4. **Click en "Deploy"** ✅

---

## 🎯 Método 2: Deploy directo desde Vercel (Sin GitHub)

### Opción A: Deploy interactivo desde CLI

```bash
cd my-vercel-app

# Iniciar interactiva de Vercel
vercel
```

Esto te pedirá:
- Project name: `my-vercel-app`
- Link to git repo: Skip (N/A)
- Framework preset: Blank
- Which directory is your code inside? Root
- What's your output directory? (Leave blank)

### Opción B: Deploy rápido con variables de entorno

```bash
# Crear archivo .env
cat > .env << EOF
WP_URL=https://my-vercel-app.vercel.app
ADMIN_EMAIL=admin@example.com
VERCEL_ENV=production
EOF

# Desplejar
vercel deploy --prod
```

---

## 📊 Variables de Entorno Detalladas

### Estructura recomendada para `.env`:

```bash
# URL principal (auto-detected por Vercel)
WP_URL=https://tudominio.vercel.app

# Email admin
ADMIN_EMAIL=admin@example.com

# Base de datos (elige uno de estos)
WORDPRESS_DB_HOST=/var/task/wp-content/db.sqlite  # SQLite local
# O usa NeonDB:
# WORDPRESS_DB_HOST=ep-xxx-postgresql.vercel.internal:5432
# WORDPRESS_DB_NAME=vercel
# WORDPRESS_DB_USER=your_username
# WORDPRESS_DB_PASSWORD=your_password_here

# Configuración adicional
WORDPRESS_DB_CHARSET=utf8mb4
VERCEL_ENV=production
```

---

## 🎨 Personalización de tu proyecto

### Cambiar el nombre del proyecto:

En Vercel Dashboard, antes de deploy:

1. Settings → General
2. Project name: `tu-proyecto-vercel`

### Configurar dominio personalizado (gratis):

1. Settings → Domains
2. Agrega tu dominio
3. Pointe tu DNS a los certificados de Vercel

---

## ✅ Checklist Antes de Desplejar

- [ ] Archivos `.env.example` con las variables mínimas
- [ ] `vercel.json` configurado correctamente
- [ ] `package.json` con dependencias necesarias
- [ ] `.gitignore` creado para evitar commit de `node_modules`
- [ ] Documentación (`README.md`, `DEPLOYMENT.md`) incluida

---

## 📦 Estructura Final del Proyecto

```
my-vercel-app/
├── .env.example                          # Plantilla variables de entorno
├── .gitignore                            # Archivos a ignorar
├── .neon.env.example                     # Plantilla NeonDB (opcional)
├── DEPLOYMENT.md                         # Instrucciones de despliegue
├── NEONDB_SETUP.md                       # Configuración NeonDB
├── README.md                             # Documentación general
├── VERCEL_DEPLOYMENT.md                  # Esta guía completa
├── deploy.sh                             # Script de despliegue
├── package.json                          # Dependencias npm
├── vercel.json                           # Configuración Vercel
├── .wp-config.php                        # Configuración WordPress
├── wp-load.php                           # Loader para serverless
├── wp-content/
│   ├── db.sqlite                         # Base de datos SQLite
│   └── init-wordpress.php                # Script inicializador
├── vercel/
│   └── index.js                          # Función principal
└── scripts/
    └── init-wordpress.js                 # Scripts auxiliares
```

---

## 🚀 Comandos Útiles Post-Deploy

### Verificar despliegue:

```bash
cd my-vercel-app
git status
vercel --list
```

### Ver logs de producción:

```bash
vercel logs --env=production
```

### Re-deployar después de cambios:

```bash
git add .
git commit -m "Actualización WordPress"
git push origin main
# Vercel despleará automáticamente
```

---

## 🎯 Próximos Pasos Después del Deploy

1. **Accede a tu sitio:** `https://tu-proyecto.vercel.app`
2. **Sigue el asistente de instalación de WordPress**
3. **Configura tu cuenta admin**
4. **Instala temas y plugins necesarios**
5. **Publica tu contenido** 🎉

---

## 💡 Recursos Adicionales

- [Vercel Docs](https://vercel.com/docs) - Documentación oficial
- [WordPress Serverless Template](https://vercel.com/templates/other/serverless-wordpress)
- [NeonDB Documentation](https://docs.neon.tech)
- [Vercel Free Tier Limits](https://vercel.com/pricing)

---

**¡Disfruta tu WordPress en Vercel!** 🎉

¿Necesitas ayuda? Revisa los logs en `vercel logs` o consulta la documentación oficial.