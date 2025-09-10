# 🚲 Proyecto Vip2Cars

Este repositorio contiene un proyecto desarrollado en **Laravel 12**.
A continuación se detallan los pasos y requisitos para ponerlo en marcha.

---

## 🔧 Requisitos del entorno

- **PHP**: 8.2
- **Base de datos**: MySQL 8.x
- **Composer**: 2.x
- **Node.js**: >=18 (para Vite y dependencias frontend)
- **npm - yarn - pnpm - bun**

---

## 🧰 Instalación y configuración

1. Clonar el repositorio y acceder al directorio del proyecto:
   ```bash
   git clone https://github.com/algmdev/vip2cars-sistema
   cd vip2cars-sistema

2. Instalar dependencias:
   ```bash
   composer install
   ```

3. Crear la base de datos y la tabla de usuarios:
   ```bash
   php artisan migrate --seed
   ```

4. Crear el archivo de configuración de la aplicación:
   ```bash
   cp .env.example .env
   ```

5. Configurar la base de datos en el archivo `.env`:
   ```bash
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=vip2cars
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. Generar un archivo de claves de seguridad:
   ```bash
   php artisan key:generate
   ```

7. Levantar el servidor de desarrollo:
   ```bash
   php artisan serve
   ```

8. Credenciales de acceso:

   - **Usuario**: admin
   - **Contraseña**: password
