# Inicio Rapido

## Ejecuta las migraciones y los seeders
```sh
php artisan migrate:fresh --seed
```

## Crear link simbolico para las imagenes
```sh
php artisan storage:link
```

Ahora puedes iniciar sesion con el usuario:

email: admin@forcesgym.com
<br>
contraseña: password

# Desarrollo

* Solo si agregaste un nuevo modelo a la base de datos [migracion] ejecuta:

```sh
php artisan shield:seeder --generate
```
