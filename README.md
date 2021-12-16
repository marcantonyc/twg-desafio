
# Desafio TWGROUP

## Requerimientos
se require instalar previamente composer y php 7.4 o superior

|  Requerimiento | Link |
| ------ | ------ |
| PHP >= v7.4 | https://www.php.net/downloads.php |
| Composer | https://getcomposer.org/download/ |

Se requiere montar una base de datos con las siguientes credenciales
| Base de datos     |               |
| ------            | ------        |
| DB_CONNECTION     | mysql         |
| DB_HOST           | 127.0.0.1     |
| DB_PORT           | 3306          |
| DB_DATABASE       | twgroup       |
| DB_USERNAME       | root          |
| DB_PASSWORD       |               |

> Nota 1 : Algunas versiones de PHP vienen con la extension "fileinfo" desactivada, esto puede producir errores en la instalacion. Por favor asegurece de que este habilitada en el archivo php.ini : `extension=fileinfo`


## Instalacion del proyecto
#### Clonar desde github

```sh
git clone  https://github.com/marcantonyc/desafiotwgroup.git
```
#### instalar dependencias
```sh
cd desafiotwgroup
composer install
npm install
npm run dev
php artisan migrate:fresh --seed
```