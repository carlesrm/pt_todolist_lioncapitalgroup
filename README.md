Prerequisitos para iniciar aplicación:
- php v8.4.4^
- composer v2.8.3^
- XAMPP v3.3.0^ con el modulo de MySQL en marcha
- node v20.17.0^
- npm v10.8.2^

Crear el .env con el archivo adjuntado en el correo antes de proseguir.

Para la instalación y ejecución del proyecto, hay que ejecutar los siguientes comandos.

- Instalación
  - Este es el comando principal
    - `npm install && composer install && npm run build && php artisan key:generate && php artisan migrate:fresh --seed`
  - Si no funciona el anterior, prueba con el siguiente
    - `npm install; composer install; npm run build; php artisan key:generate; php artisan migrate:fresh --seed`
- Ejecución de proyecto
  - `php artisan serve`

Usuarios creados para la prueba con tareas preasignadas:
- Admin User
  - admin@example.com
  - adminpass
- Test User
  - test@example.com
  - testpass
- Jane Doe
  - jane@example.com
  - janepass
