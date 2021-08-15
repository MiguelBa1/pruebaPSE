# Prueba placetopay conexión con PSE
Este proyecto simula la conexión entre un comercio y la redireción a PSE mediante Placetopay.
## Instalación y requerimientos
Para ejecutar el proyecto en Windows necesita una instalación de [Xampp](https://www.apachefriends.org/download.html). Este paquete instalará PHP, el servidor web Apache y también MySQL  en el sistema.
Luego de la instalación debe clonar este repositorio con el comando
```
git clone https://github.com/barramiguel/pruebaPSE.git
```
Y mover el proyecto dentro de la carpeta `htdocs` en la ruta `C:\xampp\htdocs`.
### SOAP
Este proyecto realiza la conexión a Placetopay mediante Soap Client, para habilitar esta función en PHP se debe modificar el archivo `php.ini` que se encuentra en la ruta `C:\xampp\php\php.ini`, removiendo el `;` al inicio de la linea 935 `extension=soap`, e igualmente en la linea 962 `extension=php_ftp.dll`
### Base de datos
Después de activar Apache y Mysql en el panel de control de Xampp se debe generar la base de datos del proyecto.
Primero debe ingresar a phpmyadmin y crear una base de datos llamada `pruebapse` y cargamos el script SQL que se encuentra en la carpeta del proyecto llamado `db.sql`, se deben haber creado 3 tablas `bancos`, `productos` y `usuarios`.
## Acceso al proyecto
Hechos estos pasos ya se puede entrar a la pagina de login escribiendo en el navegador la ruta de [http://localhost/pruebaPSE/login](http://localhost/pruebaPSE/login)
Las credenciales para logearse son:
- Usuario : admin
- Contraseña: test123