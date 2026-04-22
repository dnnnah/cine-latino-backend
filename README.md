# CineLatino — Backend API

REST API desarrollada con Laravel 13 para gestionar un catálogo de películas en español. Forma parte del proyecto académico CineLatino, una aplicación web full-stack desarrollada para la materia de Desarrollo de Aplicaciones Web.

## Stack tecnológico

- **PHP** 8.5
- **Laravel** 13
- **MySQL** 9.6
- **Eloquent ORM**
- **Laravel CORS** (allowed origins: *)

## Requisitos previos

- PHP >= 8.2
- Composer
- MySQL

## Instalación local

1. Clona el repositorio:
```bash
   git clone https://github.com/tu-usuario/cinelatino-backend.git
   cd cinelatino-backend
```

2. Instala dependencias:
```bash
   composer install
```

3. Copia el archivo de entorno:
```bash
   cp .env.example .env
```

4. Genera la clave de la aplicación:
```bash
   php artisan key:generate
```

5. Configura tu base de datos en `.env`:
```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=laravel
   DB_USERNAME=root
   DB_PASSWORD=
```

6. Ejecuta las migraciones:
```bash
   php artisan migrate
```

7. Ejecuta el seeder con las 20 películas:
```bash
   php artisan db:seed --class=MoviesTableSeeder
```

8. Inicia el servidor:
```bash
   php artisan serve
```

El servidor corre en `http://127.0.0.1:8000`

## Endpoints de la API

Base URL: `http://127.0.0.1:8000/api`

| Método | Endpoint | Descripción |
|--------|----------|-------------|
| GET | `/movies` | Lista todas las películas |
| GET | `/movies/{id}` | Obtiene una película por ID |
| POST | `/movies` | Crea una nueva película |
| PUT | `/movies/{id}` | Actualiza una película |
| DELETE | `/movies/{id}` | Elimina una película |

### Ejemplo de respuesta GET `/movies`

```json
[
  {
    "id": 1,
    "title": "El Padrino",
    "synopsis": "El patriarca de una dinastía del crimen organizado...",
    "year": 1972,
    "cover": "https://m.media-amazon.com/images/...",
    "created_at": "2026-04-15T07:47:07.000000Z",
    "updated_at": "2026-04-15T07:47:07.000000Z"
  }
]
```

### Ejemplo de body POST `/movies`

```json
{
  "title": "Nombre de la película",
  "synopsis": "Descripción de la película",
  "year": 2024,
  "cover": "https://url-de-la-imagen.jpg"
}
```

## Estructura del proyecto

```
catalogo/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── MovieController.php   # CRUD completo
│   └── Models/
│       └── Movie.php                 # Modelo con $fillable
├── config/
│   └── cors.php                      # CORS habilitado
├── database/
│   ├── migrations/
│   │   ├── create_users_table.php
│   │   ├── create_cache_table.php
│   │   ├── create_jobs_table.php
│   │   └── create_movies_table.php   # Estructura de la tabla
│   └── seeders/
│       ├── DatabaseSeeder.php
│       └── MoviesTableSeeder.php     # 20 películas en español
├── routes/
│   ├── api.php                       # Rutas RESTful
│   └── web.php
├── .env.example
├── artisan
├── composer.json
└── README.md
```

## Modelo Movie

```php
protected $fillable = [
    'title',
    'synopsis',
    'year',
    'cover'
];
```

## Base de datos

La tabla `movies` tiene la siguiente estructura:

| Campo | Tipo | Descripción |
|-------|------|-------------|
| id | bigint unsigned | Clave primaria |
| title | varchar(255) | Título de la película |
| synopsis | text | Sinopsis |
| year | int | Año de lanzamiento |
| cover | varchar(255) | URL de la portada |
| created_at | timestamp | Fecha de creación |
| updated_at | timestamp | Fecha de actualización |

## CORS

La API tiene CORS habilitado para todos los orígenes (`*`), permitiendo que el frontend Angular consuma los endpoints sin restricciones durante el desarrollo.

```php
// config/cors.php
'allowed_origins' => ['*'],
```

## Frontend relacionado

Este backend está diseñado para trabajar en conjunto con el frontend de CineLatino desarrollado en Angular 21.

Repositorio frontend: [cinelatino-frontend](https://github.com/tu-usuario/cinelatino-frontend)

## Autor

| | |
|---|---|
| **Estudiante** | Donnovan Trejo Corona |
| **Código** | 224065707 |
| **Materia** | Desarrollo de Aplicaciones Web |
| **Año** | 2026 |
| **Contacto** | donnovan.trejo6570@gmail.com |