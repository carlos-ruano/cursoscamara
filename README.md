<!-- # cursoscamara

Sitio web creado por: 
- Carlos Domínguez-Rodiño Ruano
- Pablo Bueno Duque

Este sitio web es un proyecto de prácticas para la Cámara de Comercio de Toledo.
Somos alumnos de un curso de certificado de profesionalidad de desarrollo de 
aplicaciones con tecnología web. 

Para poder subir la página a un host es necesario:
- Crear una bbdd en el host llamada `cursoscamara`.
- Exportar el archivo `cursoscamara.sql`en la bbdd.
- Configurar el archivo ConfigDB con el DNS del host, el usuario y la contraseña
para poder hacer las conexiones.
- Finalmente subir la carpeta completa al host y acceder a ella desde `www.host.com/cursoscamara`;
- Se puede configurar todas las url desde la clase router, pero al hacerlo será necesario editar
los enlaces que se utilizan en los controladores y las vistas para navegar por las diferentes 
páginas.

Si se quieren hacer pruebas en local:
- Crear una bbdd en el host llamada `cursoscamara`.
- Exportar el archivo `cursoscamara.sql`en la bbdd.
- Descomentar el archivo ConfigDB y comentar lo que no está comentado.
- En index.php llamar a Config-dev.php en vez de Config.php
- Configurar el Config-dev según el software que se utilice. Nosotros hemos utilizado XAMPP. -->
