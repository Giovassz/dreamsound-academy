# DreamSound Academy - Sistema de Gestión

Sistema de gestión completo para DreamSound Academy que incluye autenticación, gestión de roles, usuarios, alumnos, instrumentos y clases.

## Descripción

Sistema de gestión completo para **DreamSound Academy** que permite gestionar:
- **Usuarios y roles**: Administradores, personal (staff) y clientes (alumnos)
- **Alumnos**: Gestión completa de estudiantes
- **Instrumentos**: Catálogo de instrumentos musicales
- **Clases**: Gestión de clases y horarios

## Requisitos

- PHP >= 8.1
- Composer
- MySQL o MariaDB
- Node.js y NPM (para assets)

## Instalación

1. **Clonar el repositorio**
   ```bash
   git clone <url-del-repositorio>
   cd escuelademusica
   ```

2. **Instalar dependencias de PHP**
   ```bash
   composer install
   ```

3. **Configurar el archivo .env**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   
   Editar `.env` y configurar la base de datos:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=escuela_musica
   DB_USERNAME=root
   DB_PASSWORD=tu_contraseña
   ```

4. **Ejecutar migraciones y seeders**
   ```bash
   php artisan migrate --seed
   ```

5. **Instalar dependencias de Node.js (opcional, para desarrollo)**
   ```bash
   npm install
   npm run dev
   ```

6. **Iniciar el servidor**
   ```bash
   php artisan serve
   ```

   El sistema estará disponible en: `http://localhost:8000`

## Usuario de Prueba (Admin)

- **Email**: admin@escuela.com
- **Contraseña**: password

## Roles del Sistema

- **admin**: Acceso completo al sistema, puede gestionar usuarios, roles, alumnos, instrumentos y clases
- **staff**: Personal de la escuela, puede gestionar alumnos, instrumentos y clases
- **client**: Cliente/alumno, acceso limitado a su propia información

## Estructura del Proyecto

- `app/Http/Controllers/`: Controladores del sistema
- `app/Models/`: Modelos Eloquent
- `app/Http/Middleware/`: Middlewares personalizados
- `database/migrations/`: Migraciones de base de datos
- `database/seeders/`: Seeders para datos iniciales
- `resources/views/`: Vistas Blade
- `routes/`: Definición de rutas

## Funcionalidades

### Autenticación
- Login y registro de usuarios
- Logout
- Redirección a dashboard según rol

### Gestión de Usuarios
- Listado paginado de usuarios
- Crear nuevos usuarios con asignación de rol
- Editar usuarios (nombre, email, rol, estado)
- Desactivar usuarios

### Gestión de Alumnos
- CRUD completo de alumnos
- Asignación de instrumentos y clases

### Gestión de Instrumentos
- CRUD completo de instrumentos
- Categorización de instrumentos

### Gestión de Clases
- CRUD completo de clases
- Asignación de alumnos e instrumentos

## Tecnologías Utilizadas

- Laravel 10
- PHP 8.1+
- MySQL
- Blade Templates
- Bootstrap (para estilos)

## Logo de la Academia

Para agregar el logo de DreamSound Academy:
1. Coloca tu archivo de logo en: `public/images/logo.png`
2. El logo aparecerá automáticamente en el navbar, login y dashboards
3. Si el logo no se encuentra, se mostrará un icono musical como respaldo
4. Ver más detalles en `INSTRUCCIONES_LOGO.md`

## Autor

Desarrollado como proyecto académico para la gestión de DreamSound Academy.

