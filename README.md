========================
    Documentación
========================

- api/crud -> Funcionalidad de los diferentes endpoints a desarrollar.
- api/modelos -> Representación de las entidades de la base de datos.

- api/index.php -> Acceso de entrada  a la API.

- todoSql.sql: Script de la base de datos mysql utilizada en este proyecto. Se ha añadido una nueva columna
                a la tabla 'todo' llamada 'eliminado' para guardar el estado de la tarea.

La API se ha probado en un entorno de Apache con XAMPP con directorio raiz apuntando a la carpeta 'api'.

Toda petición a la API se queda bloqueada al no poder retornar a la pagina inicial. Una forma de ver el resultado es volviendo atrás en el navegador y refrescando la página para ver los resultados.