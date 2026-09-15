#!/bin/bash

# Script de despliegue para WordPress en Vercel Free Tier
# Uso: ./deploy.sh [environment]

ENV="${1:-production}"

echo "========================================="
echo "  WordPress Serverless Deploy Script"
echo "========================================="
echo ""
echo "Desplegando a: $ENV"

cd /my-vercel-app || exit 1

# Instalar dependencias
echo "📦 Instalando dependencias..."
npm install

# Construir proyecto
echo "🏗️  Construyendo proyecto..."
npm run build

# Desplegar a Vercel
echo "🚀 Desplegando a Vercel..."
vercel deploy --prod

echo ""
echo "✅ ¡Despliegue completado!"
echo "========================================="