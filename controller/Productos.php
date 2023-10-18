<?php
class Productos{
    private $model;
    function __construct(){
        include_once('../model/Productos_model.php');
        $this->model = new Productos_model();
    }

    public function consultarProductos($pr_id=false){
        $productos = $this->model->consultarProductos($pr_id=false);
        echo json_encode($productos);
    }

    public function guardarProducto(){
        $guardar = $this->model->guardarProductos($_POST);
        $rst = [
            'trans' => $guardar,
            'msg' => $guardar ? 'Se ha guardado el producto exitosamente.' : 'Error al intentar guardar el producto.'
        ];
        echo json_encode($rst);
    }

    public function eliminarProducto($pr_id){
        $eliminar = $this->model->eliminarProductos($pr_id);
        $rst = [
            'trans' => $eliminar,
            'msg' => $eliminar ? 'Se ha eliminado el producto exitosamente.' : 'Error al intentar eliminar el producto.'
        ];
        echo json_encode($rst);
    }

    public function actualizarProducto($data){
        $actualizar = $this->model->actualizarProductos($data);
        $rst = [
            'trans' => $actualizar,
            'msg' => $actualizar ? 'Se ha actualizado el producto exitosamente.' : 'Error al intentar actualizar el producto.'
        ];
        echo json_encode($rst);
    }
}

$method = $_SERVER['REQUEST_METHOD'];
if($method==="GET"){
    $fn = isset($_GET['fn']) ? $_GET['fn'] : false;
}else{
    $fn = isset($_POST['fn']) ? $_POST['fn'] : false;
}
$prod = new Productos();
if($fn==='consultarProductos'){
    $pr_id = isset($_GET['pr_id']) ? $_GET['pr_id'] : false;
    $prod->consultarProductos($pr_id);
}else if($fn === 'guardar'){
    $prod->guardarProducto();
}else if($fn === 'eliminar'){
    $pr_id = $_POST['pr_id'];
    $prod->eliminarProducto($pr_id);
}else if($fn === 'actualizar'){
    $data = $_POST;
    $prod->actualizarProducto($data);
}