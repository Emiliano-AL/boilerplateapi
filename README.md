<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>


## API Laravel

Sistema de Autenticación API Rest:

- Installar passport: composer require laravel/passport.
- Realizar la migración: php artisan migrate.
- Crear llaves de encripción: php artisan passport:install.
- Installar passport: composer require laravel/passport.


[Fuente: Seguridad API ](https://medium.com/@cvallejo/sistema-de-autenticaci%C3%B3n-api-rest-con-laravel-5-6-240be1f3fc7d)


## Docs

> **Nota:** Para la correcta utilización, hay que configurar las siguientes dos cabeceras:
>  - Content-Type: application/json  
>  - X-Requested-With: XMLHttpRequest

### Crear usuario
**POST** http://boilerplateapi.test/api/v1/signup
 - name
 - email
 - password
 - password_confirmation
 
 ### Login user
**POST**  http://boilerplateapi.test/api/v1/login

    {
    	"email":"usuario@mail.com",
    	"password":"contraseña",
    	"remeber_me":true
    }

### Get User
**GET** http://boilerplateapi.test/api/v1/user

### Logout
**GET** http://boilerplateapi.test/api/v1/logout

### Get Customer
**GET** http://boilerplateapi.test/api/v1/customers/3


[Fuente: API Laravel 6](https://kode-blog.io/laravel-5-rest-api)
