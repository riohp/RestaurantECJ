# RestaurantECJ

Sistema integral de gestión para restaurantes desarrollado con Laravel 9.

## Descripción

RestaurantECJ es una plataforma completa para la administración de operaciones de restaurante, incluyendo gestión de mesas, facturación, pedidos delivery, reservaciones y control de inventario de platos.

## Características

- **Gestión de Mesas** - Control de disponibilidad, capacidad y ubicación
- **Sistema de Facturación** - Creación de facturas con detalle de items y totales
- **Pedidos Delivery** - Registro de entregas con datos del cliente y dirección
- **Reservaciones** - Administración de reservas con fecha, hora y mesa asignada
- **Catálogo de Platos** - Organización por categorías con precios y costos
- **Control de Cancelaciones** - Auditoría de facturas canceladas con motivos
- **Autenticación Segura** - Sistema de usuarios con Laravel Sanctum

## Stack Tecnológico

| Capa | Tecnología |
|------|------------|
| Backend | Laravel 9, PHP 8.0+ |
| Frontend | Vite 4, JavaScript, CSS |
| Base de Datos | MySQL |
| Autenticación | Laravel Sanctum |
| HTTP Client | Axios |

## Requisitos

- PHP 8.0.2 o superior
- Composer
- Node.js y pnpm
- MySQL

## Instalación

```bash
# Clonar el repositorio
git clone https://github.com/tu-usuario/RestaurantECJ.git
cd RestaurantECJ

# Instalar dependencias PHP
composer install

# Instalar dependencias Node.js
pnpm install

# Configurar entorno
cp .env.example .env
php artisan key:generate

# Configurar base de datos en .env
# DB_DATABASE=restaurante_ecj
# DB_USERNAME=tu_usuario
# DB_PASSWORD=tu_password

# Ejecutar migraciones
php artisan migrate

# Compilar assets
pnpm dev

# Iniciar servidor
php artisan serve
```

La aplicación estará disponible en `http://localhost:8000`

## Estructura del Proyecto

```
RestaurantECJ/
├── app/
│   ├── Http/Controllers/    # Controladores
│   └── Models/              # Modelos Eloquent
│       ├── User.php
│       ├── Invoice.php
│       ├── ItemInvoice.php
│       ├── Table.php
│       ├── Plate.php
│       ├── Category.php
│       ├── Reservations.php
│       ├── Delivery.php
│       └── CancelledInvoice.php
├── database/
│   ├── migrations/          # Migraciones de BD
│   └── seeders/             # Datos de prueba
├── resources/
│   ├── views/               # Vistas Blade
│   ├── css/                 # Estilos
│   └── js/                  # JavaScript
├── routes/
│   ├── web.php              # Rutas web
│   └── api.php              # Rutas API
└── config/                  # Configuración
```

## Modelo de Datos

```
Users
  └── Invoices (responsible_id)
        ├── ItemInvoices → Plates → Categories
        ├── Deliveries
        └── CancelledInvoices

Tables
  └── Reservations
```

### Tablas Principales

| Tabla | Descripción |
|-------|-------------|
| `users` | Usuarios del sistema |
| `categories` | Categorías de platos |
| `plates` | Platos del menú |
| `tables` | Mesas del restaurante |
| `invoices` | Facturas de venta |
| `item_invoices` | Detalle de items por factura |
| `deliveries` | Entregas a domicilio |
| `reservations` | Reservaciones de mesas |
| `cancelled_invoices` | Registro de cancelaciones |

## Scripts Disponibles

```bash
# Desarrollo (con hot reload)
pnpm dev

# Producción
pnpm build

# Servidor local
php artisan serve

# Ejecutar migraciones
php artisan migrate

# Rollback migraciones
php artisan migrate:rollback

# Ejecutar seeders
php artisan db:seed

# Ejecutar tests
php artisan test
```

## Contribuir

1. Fork el repositorio
2. Crear rama feature (`git checkout -b feature/nueva-funcionalidad`)
3. Commit cambios (`git commit -m 'Agregar nueva funcionalidad'`)
4. Push a la rama (`git push origin feature/nueva-funcionalidad`)
5. Crear Pull Request

## Licencia

Este proyecto está bajo la Licencia MIT.
