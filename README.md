# doublev-partners-backend

Laravel backend for the technical test of the full-stack developer position at Double V Partners

## Aclaraciones y Comentarios

-

## Despliegue en Local y Producción (sin Docker)

1. clonar el repositorio
2. Instalar composer
3. ejecutar `composer install` para instalar dependencias
4. configurar base de datos.
5. reemplazar credenciales en el .env
6. ejecutar `php artisan migrate:fresh --seed` para correr migraciones y llenar con datos de prueba
7. ejecutar `php artisan serve --host=0.0.0.0 --port=8000` para correr el servidor

## Despliegue en Local y Producción (con Docker)

1. clonar el repositorio
2. Instalar Docker
3. ejecutar `docker-compose up --build -d` para construir los containers
4. ejecutar `docker-compose up` para inicalizar los containers

## Demo

https://sebastian-trujillo.me/doublevpartners-backend

## Tecnologías utilizadas

-   Laravel (PHP 8.0)
-   Docker

