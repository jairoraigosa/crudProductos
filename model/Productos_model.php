<?php
class Productos_model {
    private $conn;
    function __construct(){
        include_once('Conexion.php');
        $db = new Conexion();
        $this->conn = $db->conexion();
    }

    function consultarProductos($pr_id = false){
        $where = $pr_id!==false ? " WHERE pr_id = $pr_id" : "";
        $resultado = $this->conn->query("SELECT * FROM productos $where;");
        // echo $resultado->num_rows;
        $this->conn->close();
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    function guardarProductos($data){
        $sql = "INSERT INTO productos (
                                        pr_name,
                                        pr_description,
                                        pr_price
                                    ) 
                            VALUES (
                                        '".addslashes($data['name'])."',
                                        '".addslashes($data['description'])."',
                                        '".addslashes($data['price'])."'
                                    );";
        $guardar = $this->conn->query($sql);
        $this->conn->close();
        return $guardar;
    }
    
    function eliminarProductos($pr_id){
        $eliminar = $this->conn->query("DELETE FROM productos WHERE pr_id = $pr_id;");
        $this->conn->close();
        return $eliminar;
    }

    function actualizarProductos($data){
        $sql = "UPDATE productos 
                SET pr_name = '".addslashes($data['name'])."',
                    pr_description = '".addslashes($data['description'])."',
                    pr_price = '".addslashes($data['price'])."'
                WHERE pr_id = ".$data['pr_id'];
        $actualizar = $this->conn->query($sql);
        $this->conn->close();
        return $actualizar;
    }
}