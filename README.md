# Web Fast Bundle

Paginas Web Rapidas


## Instalar
Agregar la libreria mediante composer 
```
composer require antoniosam/webfastbundle
```
Y agregamos el bundle en el AppKernel o bundles.php
```
$bundles = [
    ...
    new Ast\WebfastBundle\WebfastBundle(),
]
```

## Uso

Solo se deberia de usar  1 vez para iniciar el proyecto
 
```
php bin/console webfastbundle:create:entitys -folder-entitys -entitys-namespace -prefix-tables -folder-fastquery
```
Ejemplo

```
php bin/console webfastbundle:create:entitys
```
Si no se colocan parametros se exportara por default en las carpetas

Symfony 4

src/Entitys/Clases
src/Utils/

Symfony 3

src/AppBundle/Entitys/
src/AppBundle/Utils/

ej. Symfony 3 Comandos
Despues de crear el Bundle AdminBundle
```
php bin/console webfast:create:entitys --folder-entitys=AdminBundle/Entity --entitys-namespace='AdminBundle\Entity'

```