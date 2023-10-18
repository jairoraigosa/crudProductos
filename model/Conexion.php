<?php
class Conexion {
    function conexion(){
        /*Crear la conexión*/
        $conn = new mysqli('localhost', 'root', '', 'productos');

        // $conn = new PDO('mysql:host=localhost;dbname=productos', 'root', '');
        return $conn;
        // $sth = $mbd->query('SELECT * FROM foo');
    }
}