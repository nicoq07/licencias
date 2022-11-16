
## Preparación del entorno

Una vez descargado el código de "licencia", podremos usar opcionalmente (recomendado) Homestead.
Para usar Homestead se debe instalar [Vagrant](https://developer.hashicorp.com/vagrant/downloads) y [VirtualBox](https://www.virtualbox.org/wiki/Downloads).

Luego, crear una carpeta al mismo nivel que el del código:
 
    Repositorio
    --Homestead
    --licencia
     
 
### Dentro de Homestead, ejecutar

    git clone https://github.com/laravel/homestead.git
    git checkout release

    # macOS / Linux...
    bash init.sh
    
    # Windows...
    init.bat


### Editar Homestead.yaml

Reemplazar la linea, por:

    folders:
    - map: ./../licencias
      to: /home/vagrant/code


### Levantar Vagrant y comprobar

Dentro de Homestead

    vagrant up

Una vez termine el proceso de instalación, ir  [Index](http://192.168.56.56) y deberíamos ver la página de bienvenida de Laravel.

## Instalación de Laravel

Ubicarse en la carpeta "licencias" y ejecutar

    composer install

Renombrar el archivo .env.example a .env y copiar:

    DB_CONNECTION=mysql
    DB_HOST=192.168.56.56
    DB_PORT=3306
    DB_DATABASE=homestead
    DB_USERNAME=homestead
    DB_PASSWORD=secret

## Ejecutar Migraciones y Seeder

Abrir una terminal en la carpeta "licencias" y ejecutar:

    Si es la primera vez:
    php artisan migrate --seed

    En caso de querer volver a generar datos:
    php artisan migrate:fresh --seed

## Datos de prueba

Se puede usar como ejemplo para las pruebas

    tipo_documento_id: 1
    documento: 38776090
    utiliza_anteojos: 1/0

## Postman

Importar el archivo JSON de Postman.
Crear un Enviroment en Postman

    clave: url
    value: 192.168.56.56/api

Para probar, se puede ejecutar request Home.

## Jobs

Hay un Jobs programado diariamente para borrar los exámenes creados una semana atrás.
Para ejecutar el job de manera manual, ejecutar:

    php artisan job:dispatchNow BorrarExamenes

