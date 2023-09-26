[<< Back To README](./README.md)

## Requirements
- Laravel 10
- PHP 8.2
- Node 18.18.0
- Composer 2.6.3

## Optional
XAMPP or docker with docker-compose

## Configuration Windows Xampp
- In file "C:\xampp\apache\conf\extra\httpd-vhosts.conf":
```apache
<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/projetos_pessoais/cursoLaravel10/public"
    ServerName laravel
    DirectoryIndex index.php
    <Directory "C:/xampp/htdocs/projetos_pessoais/cursoLaravel10/public">
        Options All
        AllowOverride All
        Order Allow,Deny
        Allow from all
    </Directory>
    ErrorLog "logs/curso-laravel10-error.log"
    CustomLog "logs/curso-laravel10-access.log" common
</VirtualHost>
```
- In file "C:\Windows\System32\drivers\etc\hosts" (edit with admin):
```
127.0.0.1	laravel
```

## Configuration Docker
- Rename file docker/sample.env to .env
- Run docker-compose:

```
$ docker-compose up -d
```

## Instalation
```
composer install
npm install
```