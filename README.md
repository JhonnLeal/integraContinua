# 🏥 CitasMedicas - Sistema de Gestión de Citas Médicas

Sistema web para la gestión de citas médicas desarrollado en PHP con MySQL.

## 📁 Estructura del Proyecto

```
integraContinua/
├── Backend/                 # Backend PHP
│   ├── Dockerfile          # Configuración Docker para Backend
│   ├── Models/             # Modelos de datos
│   │   ├── Login.php       # Autenticación
│   │   ├── Paciente.php    # Gestión de pacientes
│   │   ├── Permiso.php     # Sistema de permisos
│   │   └── Usuarios.php    # Gestión de usuarios
│   ├── controlador/        # Controladores API
│   │   ├── crtLogin.php    # API de login
│   │   ├── crtPacientes.php # API de pacientes
│   │   └── crtUsuarios.php # API de usuarios
│   └── config/             # Configuración
│       ├── Conexion.php    # Conexión a BD
│       └── global.php      # Variables globales
├── docker-compose.yml      # Orquestación de servicios
├── BD_citasmedicas.sql    # Schema de base de datos
└── README.md              # Este archivo
```

## 🚀 Inicio Rápido

### Requisitos
- Docker
- Docker Compose

### 1. Clonar y ejecutar
```bash
# Clonar el repositorio
git clone <tu-repo>
cd integraContinua

# Ejecutar con Docker
docker-compose up -d
```

### 2. Acceder a la aplicación
- **Backend API**: http://localhost:8080
- **Base de datos**: localhost:3306

## 🔧 Configuración

### Credenciales de Base de Datos
- **Host**: `db` (dentro de Docker) / `localhost` (externo)
- **Usuario**: `root`
- **Contraseña**: `rootpassword`
- **Base de datos**: `BD-citasmedicas`

### Variables de Entorno
El sistema usa las siguientes variables (definidas en docker-compose.yml):
- `DB_HOST=db`
- `DB_NAME=BD-citasmedicas`
- `DB_USERNAME=root`
- `DB_PASSWORD=rootpassword`

## 📊 Base de Datos

### Tablas principales:
- `pacientes` - Información de pacientes
- `maestra_roll` - Roles del sistema
- `permiso` - Permisos de usuario
- `usuario_permiso` - Relación usuario-permisos
- `maestra_especialidad` - Especialidades médicas

### Inicialización
La base de datos se inicializa automáticamente con `BD_citasmedicas.sql` al primer arranque.

## 🛠️ Comandos Útiles

```bash
# Iniciar servicios
docker-compose up -d

# Ver logs
docker-compose logs -f

# Detener servicios
docker-compose down

# Reiniciar solo el backend
docker-compose restart web

# Eliminar todo (incluyendo datos)
docker-compose down -v
```

## 🏗️ Desarrollo

### Estructura del Backend
- **Models/**: Clases que representan entidades de negocio
- **controlador/**: APIs REST que manejan las peticiones
- **config/**: Configuración de conexión y variables globales

### Agregar nuevos endpoints
1. Crear modelo en `Backend/Models/`
2. Crear controlador en `Backend/controlador/`
3. Actualizar rutas según sea necesario

## 🔒 Seguridad

- Contraseñas hasheadas con SHA256
- Sistema de permisos por roles
- Validación de entrada con `limpiarCadena()`
- Sesiones PHP para autenticación

## 📝 Notas Técnicas

- **PHP 8.1** con Apache
- **MySQL 8.0**
- Extensiones: `mysqli`, `pdo`, `pdo_mysql`
- Volúmenes persistentes para datos de BD
- Hot reload para desarrollo (archivos montados como volumen)
