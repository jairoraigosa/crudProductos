var $table
function consultarProductos(){
    $table = $('#tableProductos').bootstrapTable({
        url: '../controller/Productos.php?fn=consultarProductos',
        pagination: true,
        search: true,
        locale: 'es-ES',
        columns: [
            {
                field: 'pr_id',
                title: 'Código'
            },
            {
                field: 'pr_name',
                title: 'Nombre'
            },
            {
                field: 'pr_description',
                title: 'Descripcion'
            },
            {
                field: 'pr_price',
                title: 'Precio'
            },
            {
                title: 'Opciones',
                formatter: (value, row, index) => {
                    return `<a class="btn btn-info" href="javascript:modalEditarProducto(${row.pr_id})" title="Editar">
                                Editar
                            </a>
                            <a class="btn btn-danger" href="javascript:eliminarProducto(${row.pr_id})" title="Eliminar">
                                Eliminar
                            </a>`;
                  }
            }
        ]
      })
}

function guardarEditarProducto(e){
    e.preventDefault();
    const fn = $("#fn").val();
    const name = $("#name").val();
    const price = $("#price").val();
    const description = $("#description").val();
    if(name.trim()===''){
        Swal.fire('¡Error!', 'Debe ingresar el nombre del producto.', 'error');
        return false;
    }
    if(price.trim()===''){
        Swal.fire('¡Error!', 'Debe ingresar el precio del producto.', 'error');
        return false;
    }
    if(isNaN(price)){
        Swal.fire('¡Error!', 'El precio del producto debe ser un valor numérico.', 'error');
        return false;
    }
    if(price<1){
        Swal.fire('¡Error!', 'El precio del producto debe ser un valor numérico mayor a 0.', 'error');
        return false;
    }
    if(description.trim()===''){
        Swal.fire('¡Error!', 'Debe ingresar la descripción del producto.', 'error');
        return false;
    }
    $("#btnGuardarActualizar").attr('disabled', true);
    $.ajax({
        type: 'POST',
        url: '../controller/Productos.php',
        data: $("#frmAddEditProduct").serialize(),
        success: function(result){
            const rst = JSON.parse(result);
            if(rst['trans']){
                Swal.fire('¡Exito!', rst['msg'], 'success');
                $('#tableProductos').bootstrapTable('refresh');
                if(fn==="guardar"){
                    $("#frmAddEditProduct").trigger('reset');
                }
                $("#modalAddEditProduct").modal('hide');
                $("#btnGuardarActualizar").removeAttr('disabled');
            }else{
                Swal.fire('¡Error!', rst['trans'], 'error');
            }
        }
    });
}

function eliminarProducto(pr_id){
    Swal.fire({
        title: '¿Eliminar producto?',
        showCancelButton: true,
        confirmButtonText: 'Eliminar',
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'POST',
                url: '../controller/Productos.php',
                data: {
                    pr_id,
                    fn: 'eliminar'
                },
                success: function(result){
                    const rst = JSON.parse(result);
                    if(rst['trans']){
                        Swal.fire('¡Exito!', rst['msg'], 'success');
                        $('#tableProductos').bootstrapTable('refresh');
                    }else{
                        Swal.fire('¡Error!', rst['trans'], 'error');
                    }
                }
            });
        }
      })
}

function modalEditarProducto(pr_id){
    const {pr_name, pr_description, pr_price} = $table.bootstrapTable('getRowByUniqueId', pr_id);
    $("#fn").val('actualizar');
    $("#pr_id").val(pr_id);
    $("#btnGuardarActualizar").text('Actualizar');
    $("#name").val(pr_name);
    $("#description").val(pr_description);
    $("#price").val(pr_price);
    $("#modalAddEditProduct").modal('show');
}

function modalNuevoProducto(){
    $("#fn").val('guardar');
    $("#pr_id").val('');
    $("#btnGuardarActualizar").text('Guardar');
    $("#frmAddEditProduct").trigger('reset');
    $("#modalAddEditProduct").modal('show');
}

document.addEventListener("DOMContentLoaded", function(event) {
    consultarProductos();
})