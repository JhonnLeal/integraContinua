# 🏥 CitasMedicas - Sistema de Gestión de Citas Médicas

[![Backend CI](https://github.com/mateoploma/integraContinua/workflows/Backend%20CI%20Pipeline/badge.svg)](https://github.com/mateoploma/integraContinua/actions)
[![Frontend CI](https://github.com/mateoploma/integraContinua/workflows/Frontend%20CI%20Pipeline/badge.svg)](https://github.com/mateoploma/integraContinua/actions)

Sistema web para la gestión de citas médicas desarrollado en PHP con MySQL, containerizado con Docker y CI/CD automatizado.

## 📁 Estructura del Proyecto

```
integraContinua/
├── Backend/                    # API Backend (PHP 8.1 + Apache + Composer)
│   ├── Models/                 # Modelos de datos
│   │   ├── Login.php           # Autenticación de usuarios
│   │   ├── Paciente.php        # Gestión de pacientes
│   │   ├── Permiso.php         # Sistema de permisos
│   │   └── Usuarios.php        # Gestión de usuarios
│   ├── controlador/            # Controladores API REST
│   │   ├── crtLogin.php        # Endpoint de autenticación
│   │   ├── crtPacientes.php    # API de pacientes
│   │   └── crtUsuarios.php     # API de usuarios
│   ├── config/                 # Configuración del sistema
│   │   ├── Conexion.php        # Conexión a base de datos
│   │   └── global.php          # Variables globales y utilidades
│   ├── tests/                  # Tests PHPUnit
│   │   ├── ConexionTest.php    # Tests de conexión y configuración
│   │   └── PacienteTest.php    # Tests del modelo Paciente
│   ├── vendor/                 # Dependencias Composer (ignorado)
│   ├── composer.json           # Configuración de dependencias PHP
│   ├── composer.lock           # Lock file de dependencias
│   └── Dockerfile              # Imagen Docker Backend
├── Frontend/                   # Frontend Web (PHP + Apache + Node.js)
│   ├── Vista/                  # Páginas HTML
│   │   ├── login.html          # Página de login
│   │   ├── pacientes/          # Gestión de pacientes
│   │   ├── usuarios/           # Gestión de usuarios
│   │   ├── home/               # Dashboard principal
│   │   └── noacceso/           # Página de acceso denegado
│   ├── public/                 # Recursos estáticos
│   │   ├── css/                # Hojas de estilo CSS
│   │   ├── js/                 # JavaScript del frontend
│   │   ├── img/                # Imágenes y assets
│   │   └── archivos/           # Archivos subidos por usuarios
│   ├── tests/                  # Tests Jest
│   │   ├── dom.test.js         # Tests de DOM y validaciones
│   │   └── functions.test.js   # Tests de funciones JavaScript
│   ├── package.json            # Configuración Node.js y Jest
│   └── Dockerfile.frontend     # Imagen Docker Frontend
├── .github/                    # GitHub Actions CI/CD
│   └── workflows/
│       ├── ci_backend.yml      # Pipeline Backend (Tests + Build + Push)
│       └── ci_frontend.yml     # Pipeline Frontend (Tests + Build + Push)
├── .gitignore                  # Archivos ignorados por Git
├── docker-compose.yml          # Orquestación de servicios
├── BD_citasmedicas.sql         # Schema de base de datos
├── index.php                   # Punto de entrada principal
└── README.md                   # Documentación del proyecto
```

## 🚀 Guía de Instalación y Configuración

### Prerrequisitos

#### **🪟 Windows**
```powershell
# Opción 1: Docker Desktop (Recomendado)
# Descargar e instalar Docker Desktop desde: https://www.docker.com/products/docker-desktop/

# Opción 2: Chocolatey
choco install docker-desktop

# Opción 3: Winget (Windows 11)
winget install Docker.DockerDesktop

# Verificar instalación
docker --version
docker-compose --version
```

#### **🍎 macOS**
```bash
# Opción 1: Docker Desktop
# Descargar desde: https://www.docker.com/products/docker-desktop/

# Opción 2: Homebrew (Recomendado)
brew install docker docker-compose

# Opción 3: MacPorts
sudo port install docker docker-compose

# Verificar instalación
docker --version
docker-compose --version
```

#### **🐧 Linux (Ubuntu/Debian)**
```bash
# Actualizar repositorios
sudo apt update

# Instalar Docker
sudo apt install docker.io docker-compose

# Agregar usuario al grupo docker
sudo usermod -aG docker $USER

# Reiniciar sesión y verificar
docker --version
docker-compose --version
```

### 1. Clonar el Repositorio

#### **🪟 Windows (PowerShell/CMD)**
```powershell
# Git Bash o PowerShell
git clone https://github.com/tu-usuario/integraContinua.git
cd integraContinua

# O usando Command Prompt
git clone https://github.com/tu-usuario/integraContinua.git
chdir integraContinua
```

#### **🍎 macOS / 🐧 Linux**
```bash
git clone https://github.com/tu-usuario/integraContinua.git
cd integraContinua
```

### 2. Configuración del Entorno

#### Variables de Entorno (Opcional)

**🪟 Windows (PowerShell)**
```powershell
# PowerShell
@"
DB_HOST=db
DB_NAME=BD-citasmedicas
DB_USERNAME=root
DB_PASSWORD=rootpassword
MYSQL_ROOT_PASSWORD=rootpassword
"@ | Out-File -FilePath .env -Encoding utf8

# Command Prompt
echo DB_HOST=db > .env
echo DB_NAME=BD-citasmedicas >> .env
echo DB_USERNAME=root >> .env
echo DB_PASSWORD=rootpassword >> .env
echo MYSQL_ROOT_PASSWORD=rootpassword >> .env
```

**🍎 macOS / 🐧 Linux**
```bash
# Crear archivo .env para configuración personalizada
cat > .env << EOF
DB_HOST=db
DB_NAME=BD-citasmedicas
DB_USERNAME=root
DB_PASSWORD=rootpassword
MYSQL_ROOT_PASSWORD=rootpassword
EOF
```

### 3. Levantar los Servicios

#### Desarrollo (con hot-reload)
```bash
# Construir y ejecutar todos los servicios (Todos los SO)
docker-compose up -d --build

# Ver logs en tiempo real
docker-compose logs -f

# Solo logs del backend
docker-compose logs -f backend

# Solo logs del frontend
docker-compose logs -f frontend
```

#### Producción
```bash
# Usar imágenes pre-construidas (Todos los SO)
docker-compose -f docker-compose.yml up -d
```

### 4. Verificar la Instalación

#### Servicios Activos
```bash
# Verificar que todos los contenedores estén ejecutándose (Todos los SO)
docker-compose ps

# Debe mostrar:
# - frontend: UP (puerto 8080)
# - backend: UP (puerto 8081)  
# - db: UP (puerto 3306)
```

#### Pruebas de Conectividad

**🪟 Windows (PowerShell)**
```powershell
# Frontend
Invoke-WebRequest -Uri http://localhost:8080

# Backend API  
Invoke-WebRequest -Uri http://localhost:8081/controlador/crtLogin.php

# O usando curl si está instalado
curl http://localhost:8080
curl http://localhost:8081/controlador/crtLogin.php

# Base de datos
docker-compose exec db mysql -u root -prootpassword -e "SHOW DATABASES;"
```

**🍎 macOS / 🐧 Linux**
```bash
# Frontend
curl http://localhost:8080

# Backend API
curl http://localhost:8081/controlador/crtLogin.php

# Base de datos
docker-compose exec db mysql -u root -prootpassword -e "SHOW DATABASES;"
```

## 🌐 Acceso a la Aplicación

| Servicio | URL | Descripción |
|----------|-----|-------------|
| **Frontend** | http://localhost:8080 | Aplicación web completa |
| **Backend API** | http://localhost:8081 | Endpoints REST API |
| **Base de Datos** | localhost:3306 | MySQL (externo) |
| **phpMyAdmin** | *Opcional* | Administración BD |

### Credenciales por Defecto
- **Base de datos MySQL**:
  - Usuario: `root`
  - Contraseña: `rootpassword`
  - Base: `BD-citasmedicas`

## 🧪 Testing y Calidad de Código

### Ejecutar Tests Localmente

#### Backend (PHPUnit)

**🪟 Windows (PowerShell)**
```powershell
# Instalar dependencias
Set-Location Backend
docker-compose exec backend composer install --dev

# Ejecutar tests
docker-compose exec backend vendor/bin/phpunit tests

# Con coverage
docker-compose exec backend vendor/bin/phpunit tests --coverage-text

# Volver al directorio principal
Set-Location ..
```

**🍎 macOS / 🐧 Linux**
```bash
# Instalar dependencias
cd Backend
docker-compose exec backend composer install --dev

# Ejecutar tests
docker-compose exec backend vendor/bin/phpunit tests

# Con coverage
docker-compose exec backend vendor/bin/phpunit tests --coverage-text

# Volver al directorio principal
cd ..
```

#### Frontend (Jest)

**🪟 Windows (PowerShell)**
```powershell
# Instalar dependencias
Set-Location Frontend
docker-compose exec frontend npm install

# Ejecutar tests
docker-compose exec frontend npm test

# Modo watch
docker-compose exec frontend npm test -- --watch

# Volver al directorio principal
Set-Location ..
```

**🍎 macOS / 🐧 Linux**
```bash
# Instalar dependencias
cd Frontend
docker-compose exec frontend npm install

# Ejecutar tests
docker-compose exec frontend npm test

# Modo watch
docker-compose exec frontend npm test -- --watch

# Volver al directorio principal
cd ..
```

#### Tests Integrados (Script Automatizado)

**🪟 Windows (PowerShell)**
```powershell
# Crear script de tests (run_all_tests.ps1)
@"
Write-Host "🧪 Ejecutando tests Backend (PHPUnit)..."
docker-compose exec backend vendor/bin/phpunit tests

Write-Host "🧪 Ejecutando tests Frontend (Jest)..."
docker-compose exec frontend npm test

Write-Host "✅ Tests completados!"
"@ | Out-File -FilePath run_all_tests.ps1 -Encoding utf8

# Ejecutar script
.\run_all_tests.ps1
```

**🍎 macOS / 🐧 Linux**
```bash
# Crear y ejecutar script
cat > run_all_tests.sh << 'EOF'
#!/bin/bash
echo "🧪 Ejecutando tests Backend (PHPUnit)..."
docker-compose exec backend vendor/bin/phpunit tests

echo "🧪 Ejecutando tests Frontend (Jest)..."
docker-compose exec frontend npm test

echo "✅ Tests completados!"
EOF

chmod +x run_all_tests.sh
./run_all_tests.sh
```

### CI/CD Pipeline

El proyecto incluye **GitHub Actions** que se ejecutan automáticamente:

#### En Pull Requests
- ✅ **Tests Backend** (PHPUnit) - Valida código PHP
- ✅ **Tests Frontend** (Jest) - Valida JavaScript
- ❌ **NO Build** - Solo validación, no construcción

#### En Push a `main`
- ✅ **Tests Backend** + **Build & Push** imagen Docker
- ✅ **Tests Frontend** + **Build & Push** imagen Docker
- 🏷️ **Tags**: `latest` y `commit-sha`
- 📦 **Registry**: GitHub Container Registry (ghcr.io)

## 🛠️ Comandos de Desarrollo

### Docker Compose (Todos los SO)
```bash
# Iniciar servicios
docker-compose up -d

# Reconstruir imágenes
docker-compose up -d --build

# Ver logs
docker-compose logs -f [servicio]

# Reiniciar un servicio específico
docker-compose restart frontend

# Parar servicios
docker-compose down

# Parar y eliminar volúmenes (CUIDADO: borra datos)
docker-compose down -v

# Ejecutar comandos dentro de contenedores
docker-compose exec backend php -v
docker-compose exec frontend node -v
docker-compose exec db mysql -u root -p
```

### Base de Datos

**🪟 Windows (PowerShell)**
```powershell
# Backup de la base de datos
docker-compose exec db mysqldump -u root -prootpassword BD-citasmedicas | Out-File -FilePath backup.sql -Encoding utf8

# Restaurar backup
Get-Content backup.sql | docker-compose exec -T db mysql -u root -prootpassword BD-citasmedicas

# Acceso directo a MySQL
docker-compose exec db mysql -u root -prootpassword BD-citasmedicas

# Ver tablas
docker-compose exec db mysql -u root -prootpassword -e "USE BD-citasmedicas; SHOW TABLES;"
```

**🍎 macOS / 🐧 Linux**
```bash
# Backup de la base de datos
docker-compose exec db mysqldump -u root -prootpassword BD-citasmedicas > backup.sql

# Restaurar backup
docker-compose exec -T db mysql -u root -prootpassword BD-citasmedicas < backup.sql

# Acceso directo a MySQL
docker-compose exec db mysql -u root -prootpassword BD-citasmedicas

# Ver tablas
docker-compose exec db mysql -u root -prootpassword -e "USE BD-citasmedicas; SHOW TABLES;"
```

## 🏗️ Arquitectura y Flujo de Datos

### Arquitectura de Microservicios
```
┌─────────────────┐    ┌─────────────────┐    ┌─────────────────┐
│    Frontend     │────│     Backend     │────│    Database     │
│  (PHP + Node)   │    │   (PHP + API)   │    │    (MySQL)      │
│   Port: 8080    │    │   Port: 8081    │    │   Port: 3306    │
└─────────────────┘    └─────────────────┘    └─────────────────┘
```

### Flujo de la Aplicación
1. **Usuario** → Accede a `http://localhost:8080`
2. **Frontend** → Sirve `Vista/login.html` con estilos y scripts
3. **JavaScript** → Hace peticiones AJAX a `http://localhost:8081/controlador/`
4. **Backend** → Procesa datos, consulta BD, devuelve JSON
5. **Frontend** → Actualiza DOM con respuesta del API

### Estructura del Backend API
```
Backend/controlador/
├── crtLogin.php       # POST /login - Autenticación
├── crtPacientes.php   # CRUD pacientes
│   ├── GET    - Listar pacientes
│   ├── POST   - Crear paciente  
│   ├── PUT    - Actualizar paciente
│   └── DELETE - Eliminar paciente
└── crtUsuarios.php    # CRUD usuarios
    ├── GET    - Listar usuarios
    ├── POST   - Crear usuario
    ├── PUT    - Actualizar usuario
    └── DELETE - Eliminar usuario
```

## 🔒 Seguridad y Mejores Prácticas

### Implementado
- ✅ **Contraseñas hasheadas** con SHA256
- ✅ **Sistema de roles y permisos** granular
- ✅ **Validación de entrada** con `limpiarCadena()`
- ✅ **Sesiones PHP** para mantener autenticación
- ✅ **Variables de entorno** para credenciales
- ✅ **Gitignore** completo para archivos sensibles

### Recomendaciones Adicionales
- 🔄 Migrar de SHA256 a **bcrypt** o **Argon2**
- 🔐 Implementar **JWT tokens** para API
- 🛡️ Agregar **rate limiting** a endpoints
- 📝 **Logs de auditoría** para acciones críticas
- 🔒 **HTTPS** en producción con certificados SSL

## 📊 Base de Datos

### Esquema Principal
```sql
-- Tablas principales
pacientes              # Información de pacientes médicos
maestra_roll          # Roles del sistema (admin, doctor, etc.)
permiso               # Permisos específicos por funcionalidad  
usuario_permiso       # Relación many-to-many usuario-permisos
maestra_especialidad  # Especialidades médicas disponibles
```

### Comandos SQL Útiles
```sql
-- Ver estructura de una tabla
DESCRIBE pacientes;

-- Contar registros por tabla
SELECT COUNT(*) FROM pacientes;
SELECT COUNT(*) FROM maestra_roll;

-- Ver permisos de un usuario
SELECT u.nombre, p.descripcion 
FROM usuarios u 
JOIN usuario_permiso up ON u.id = up.usuario_id
JOIN permiso p ON up.permiso_id = p.id
WHERE u.id = 1;
```

## 📈 Monitoreo y Debugging

### Logs de Aplicación (Todos los SO)
```bash
# Ver logs del frontend
docker-compose logs -f frontend

# Ver logs del backend  
docker-compose logs -f backend

# Ver logs de la base de datos
docker-compose logs -f db

# Logs con timestamp
docker-compose logs -f -t frontend
```

### Debug del Sistema

**🪟 Windows (PowerShell)**
```powershell
# Verificar recursos del sistema
docker stats

# Ver uso de espacio de volúmenes
docker system df

# Inspeccionar configuración de contenedor
docker-compose config

# Ver variables de entorno de un servicio
docker-compose exec backend Get-ChildItem Env: | Select-Object Name, Value

# Verificar conectividad entre servicios
docker-compose exec frontend ping backend
docker-compose exec backend ping db
```

**🍎 macOS / 🐧 Linux**
```bash
# Verificar recursos del sistema
docker stats

# Ver uso de espacio de volúmenes
docker system df

# Inspeccionar configuración de contenedor
docker-compose config

# Ver variables de entorno de un servicio
docker-compose exec backend env

# Verificar conectividad entre servicios
docker-compose exec frontend ping backend
docker-compose exec backend ping db
```

## 🚀 Despliegue en Producción

### Preparación

**🪟 Windows (PowerShell)**
```powershell
# 1. Configurar variables de entorno de producción
Copy-Item .env.example .env.production

# 2. Modificar docker-compose para producción
Copy-Item docker-compose.yml docker-compose.prod.yml

# 3. Usar imágenes del registry
# Editar docker-compose.prod.yml para usar:
# - ghcr.io/tu-usuario/integracontinua-frontend:latest
# - ghcr.io/tu-usuario/integracontinua-backend:latest
```

**🍎 macOS / 🐧 Linux**
```bash
# 1. Configurar variables de entorno de producción
cp .env.example .env.production

# 2. Modificar docker-compose para producción
cp docker-compose.yml docker-compose.prod.yml

# 3. Usar imágenes del registry
# Editar docker-compose.prod.yml para usar:
# - ghcr.io/tu-usuario/integracontinua-frontend:latest
# - ghcr.io/tu-usuario/integracontinua-backend:latest
```

### Despliegue (Todos los SO)
```bash
# Producción con imágenes pre-construidas
docker-compose -f docker-compose.prod.yml up -d

# Verificar estado
docker-compose -f docker-compose.prod.yml ps
docker-compose -f docker-compose.prod.yml logs
```

## 🤝 Contribución

### Flujo de Desarrollo
1. **Fork** del repositorio
2. **Crear rama** para feature: `git checkout -b feature/nueva-funcionalidad`
3. **Desarrollar** con tests incluidos
4. **Ejecutar tests** localmente antes del commit
5. **Crear Pull Request** hacia `main`
6. **CI/CD** ejecuta tests automáticamente
7. **Review** y merge si tests pasan

### Estándares de Código
- **PHP**: PSR-4 autoloading, PSR-12 coding style
- **JavaScript**: ESLint con configuración estándar
- **Tests**: Cobertura mínima 70%
- **Commits**: Conventional Commits format

### Comandos para Contribuidores

**🪟 Windows (PowerShell)**
```powershell
# Setup para desarrollo
git clone tu-fork
Set-Location integraContinua
docker-compose up -d --build

# Antes de commit
Set-Location Backend
docker-compose exec backend composer test
Set-Location ..\Frontend  
docker-compose exec frontend npm test
Set-Location ..

# Crear Pull Request
git push origin feature/nueva-funcionalidad
# Ir a GitHub y crear PR
```

**🍎 macOS / 🐧 Linux**
```bash
# Setup para desarrollo
git clone tu-fork
cd integraContinua
docker-compose up -d --build

# Antes de commit
cd Backend && docker-compose exec backend composer test
cd ../Frontend && docker-compose exec frontend npm test
cd ..

# Crear Pull Request
git push origin feature/nueva-funcionalidad
# Ir a GitHub y crear PR
```

---

## 📞 Soporte

- **Issues**: [GitHub Issues](https://github.com/tu-usuario/integraContinua/issues)
- **Documentación**: Este README y comentarios en código
- **CI/CD Status**: [GitHub Actions](https://github.com/tu-usuario/integraContinua/actions)

**Versión**: 2.0.0 | **Última actualización**: Junio 2024

### 💻 Compatibilidad de Sistema Operativo
- ✅ **Windows 10/11** (PowerShell, CMD, Git Bash)
- ✅ **macOS** (Terminal, iTerm2)
- ✅ **Linux** (Ubuntu, Debian, CentOS, Arch)
- ✅ **Docker Desktop** en todos los SO
