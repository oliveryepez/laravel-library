# Laravel Library

Proyecto realizado por una prueba para entrar en una empresa y como pidieron tener el codigo, decidi hacerlo publico.

## Comenzando

Este proyecto fue realizado a traves de Laravel 5.2.23 y consiste en el mantenimiento basico de una libreria, con 
manejo de usuarios


### Pre-requisitos

Para ver este proyecto de forma local es necesario tener las siguientes apps:

- [VirtualBox](https://www.virtualbox.org/wiki/Downloads)
- [Vagrant](https://www.vagrantup.com/downloads.html)


### Instalacion

Una vez descargados los pre-requisitos siga estos pasos para configurar el ambiente.

1. Instalar Virtualbox
2. Instalar Vagrant
3. ``` git clone https://github.com/oliveryepez/laravel-library.git ```
4. ``` cd ruta/donde/esta/clonado/el/repositorio ```
5. ``` vagrant up ```
6. ``` vagrant ssh ```
7. ``` chmod -R 777 /var/www/library/storage/ ```
8. ``` cd /var/www/library/ ```
9. ``` php artisan migrate ```
10. Editar el archivo host a ``` local.cyberfuel.com ``` 
    - Windows - ``` cd %systemroot%\system32\drivers\etc\ ``` 
    - Mac - cd ``` /private/etc/ ``` 
    - Linux - ``` /etc/ ``` 
11. En el browser colocar ``` local.cyberfuel.com```
12. HAVE FUN!


## Autor

* **Oliver Yepez** - *Test work* - [oliveryepez](https://github.com/oliveryepez)
