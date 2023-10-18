# Base de Datos
En la carpeta sql se encuentra el script sql con la creacion de la base de datos y con la creacion de la tabla productos (unica tabla)

Para configurar los datos de conexión a la base de datos se debe abrir la ruta /model/Conexion.php y ajustar la variable $conn

# CRUD Productos
CRUD de productos básico donde se podrán adicionar cualquier producto con su respectivo nombre, descripción, precio.

La base de datos fue creada en MySQL, el script SQL se encuentra dentro de la carpeta SQL, el nombre de la base de datos es: productos

Desarrollo realizado en php puro, en el frontend se utilizó Jquery como apoyo en el codigo js adicionalmente un poco de librerias de terceros como Bootstrap, BootstrapTable, Jquery, SweetAlert2.

La funcionalidad no cuanta con ningún tipo de seguridad, no tiene loguin y los archivos no estan protegidos con htaccess ni nada por el estilo.