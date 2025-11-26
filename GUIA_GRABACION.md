# 🎥 Guía para la Grabación de Pantalla - DreamSound Academy

## 📋 Requisitos de la Grabación

Según los requisitos de la tarea, debes mostrar:
1. ✅ **Login**
2. ✅ **Listado de usuarios**
3. ✅ **Módulo del dominio (listado y formulario)**

---

## 🎬 SCRIPT DE GRABACIÓN (3-5 minutos)

### **PARTE 1: LOGIN (30-45 segundos)**

1. **Abrir el navegador**
   - Mostrar la URL: `http://localhost:8000`
   - O mostrar que estás en la página de login

2. **Mostrar la página de login**
   - Enfocar en el formulario de login
   - Mostrar el diseño profesional
   - Mencionar brevemente: "Sistema de DreamSound Academy"

3. **Hacer login**
   - Email: `admin@escuela.com`
   - Contraseña: `password`
   - Clic en "Iniciar Sesión"
   - Mostrar la redirección al dashboard

4. **Mostrar el dashboard de admin**
   - Enfocar en las estadísticas (usuarios, alumnos, instrumentos, clases)
   - Mostrar el navbar con el nombre "DreamSound Academy"
   - Mencionar: "Dashboard del administrador con acceso completo"

---

### **PARTE 2: LISTADO DE USUARIOS (45-60 segundos)**

1. **Navegar al módulo de usuarios**
   - Clic en "Usuarios" en el navbar
   - O navegar directamente a: `http://localhost:8000/admin/users`

2. **Mostrar el listado de usuarios**
   - Enfocar en la tabla con los usuarios
   - Mostrar las columnas: ID, Nombre, Email, Rol, Estado
   - Mencionar: "Listado paginado de usuarios del sistema"

3. **Destacar información importante**
   - Mostrar los diferentes roles (admin, staff, client)
   - Mostrar estados (Activo/Inactivo)
   - Mostrar los botones de acción (Editar, Desactivar)

4. **Opcional: Mostrar paginación**
   - Si hay más de 15 usuarios, mostrar los controles de paginación

---

### **PARTE 3: MÓDULO DEL DOMINIO - ALUMNOS (90-120 segundos)**

#### **3.1. Listado de Alumnos (30-40 segundos)**

1. **Navegar al módulo de alumnos**
   - Clic en "Gestión" → "Alumnos" en el navbar
   - O navegar a: `http://localhost:8000/admin/alumnos`

2. **Mostrar el listado**
   - Enfocar en la tabla de alumnos
   - Mostrar columnas: ID, Nombre Completo, Email, Teléfono, Instrumentos, Estado
   - Mencionar: "Listado de alumnos de la academia"

3. **Destacar características**
   - Mostrar los instrumentos asignados a cada alumno (badges)
   - Mostrar estados activos/inactivos

#### **3.2. Formulario de Crear Alumno (40-50 segundos)**

1. **Abrir formulario de creación**
   - Clic en el botón "Nuevo Alumno" (botón verde grande)
   - O navegar a: `http://localhost:8000/admin/alumnos/create`

2. **Mostrar el formulario completo**
   - Enfocar en todos los campos:
     - Nombre y Apellido
     - Email
     - Teléfono
     - Fecha de Nacimiento
     - Dirección
     - **Instrumentos** (checkboxes - importante mostrar esto)
     - Estado activo/inactivo

3. **Llenar el formulario (opcional pero recomendado)**
   - Llenar algunos campos de ejemplo:
     - Nombre: "Juan"
     - Apellido: "García"
     - Email: "juan.garcia@example.com"
     - Seleccionar 2-3 instrumentos (ej: Piano, Guitarra)
   - **NO es necesario guardar**, solo mostrar que el formulario funciona

4. **Mencionar características**
   - "Formulario completo para crear nuevos alumnos"
   - "Asignación de múltiples instrumentos"
   - "Validación de campos"

#### **3.3. Formulario de Editar (Opcional - 20-30 segundos)**

1. **Volver al listado y editar**
   - Volver a `/admin/alumnos`
   - Clic en el botón de editar (lápiz amarillo) de cualquier alumno
   - Mostrar el formulario de edición
   - Mencionar: "Formulario de edición con los datos precargados"

---

### **PARTE 4: OTRO MÓDULO DEL DOMINIO (Opcional - 30-40 segundos)**

**Mostrar rápidamente otro módulo para demostrar que hay múltiples módulos:**

1. **Navegar a Clases o Instrumentos**
   - Clic en "Clases" o "Instrumentos" en el menú
   - Mostrar el listado
   - Mencionar: "Sistema completo con múltiples módulos: alumnos, instrumentos y clases"

---

## 📝 RESUMEN DE LO QUE DEBES MOSTRAR

### ✅ OBLIGATORIO (Según requisitos):

1. **Login** ✅
   - Página de login
   - Ingresar credenciales
   - Redirección al dashboard

2. **Listado de usuarios** ✅
   - Tabla con usuarios
   - Mostrar roles y estados
   - Paginación (si aplica)

3. **Módulo del dominio - Listado** ✅
   - Listado de alumnos (o instrumentos/clases)
   - Mostrar la tabla con datos

4. **Módulo del dominio - Formulario** ✅
   - Formulario de crear alumno
   - Mostrar todos los campos
   - Mostrar asignación de instrumentos

### 🎯 RECOMENDADO (Para impresionar):

- Dashboard con estadísticas
- Formulario de edición
- Navegación entre módulos
- Diseño profesional del sistema

---

## ⏱️ DURACIÓN SUGERIDA

- **Mínimo**: 3 minutos (solo lo obligatorio)
- **Recomendado**: 4-5 minutos (con extras)
- **Máximo**: 5 minutos (según requisitos)

---

## 🎬 TIPS PARA LA GRABACIÓN

1. **Habla claro y pausado**
   - Explica brevemente lo que estás haciendo
   - Usa frases como: "Aquí vemos...", "Ahora vamos a...", "Como podemos observar..."

2. **Enfoca en elementos importantes**
   - Acércate a formularios y tablas
   - Resalta botones y acciones importantes

3. **Muestra el flujo completo**
   - No cortes entre acciones importantes
   - Muestra transiciones suaves

4. **Destaca características técnicas**
   - Menciona "paginación", "validación", "roles", "middleware"
   - Muestra que es un sistema profesional

5. **Muestra el diseño**
   - Enfoca en el diseño profesional
   - Menciona que es un sistema moderno y bien diseñado

---

## 📋 CHECKLIST ANTES DE GRABAR

- [ ] El servidor está corriendo (`php artisan serve`)
- [ ] Tienes datos en la base de datos (usuarios, alumnos, instrumentos)
- [ ] Conoces las credenciales: `admin@escuela.com` / `password`
- [ ] Tienes una herramienta de grabación (OBS, Windows Game Bar, etc.)
- [ ] El audio está funcionando (si vas a narrar)
- [ ] La resolución de pantalla es adecuada

---

## 🎥 HERRAMIENTAS DE GRABACIÓN

**Windows:**
- Windows + G (Game Bar) - Gratis, incluido en Windows
- OBS Studio - Gratis, profesional
- Camtasia - De pago, muy profesional

**Recomendación**: Windows Game Bar es suficiente y fácil de usar.

---

## 📄 ESTRUCTURA FINAL DEL VIDEO

```
[0:00-0:30]  - Introducción y Login
[0:30-1:15]  - Listado de Usuarios
[1:15-2:30]  - Módulo Alumnos (Listado + Formulario)
[2:30-3:00]  - Otros módulos (opcional)
[3:00-3:30]  - Cierre y resumen
```

---

## ✅ VERIFICACIÓN FINAL

Antes de entregar, verifica que el video muestre:
- ✅ Login funcionando
- ✅ Listado de usuarios con datos
- ✅ Listado de alumnos (o módulo del dominio)
- ✅ Formulario de crear alumno con todos los campos
- ✅ Diseño profesional visible
- ✅ Duración entre 3-5 minutos

¡Listo para grabar! 🎬

