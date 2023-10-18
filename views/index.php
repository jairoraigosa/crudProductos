<?php include_once('./header.php'); ?>
<div class="row" style="margin: 20px">
    <div class="col-12">
        <button class="btn btn-info pull-rigth" onClick="modalNuevoProducto()">Nuevo producto</button>
    </div>
    <div class="col-12 table-responsive">
        <table 
            data-toggle="table" 
            id="tableProductos"
            data-toolbar="#toolbar"
            data-search="true"
            data-pagination="true"
            data-unique-id="pr_id"
        ></table>   
    </div>
</div>
<div class="modal fade bd-example-modal-lg" id="modalAddEditProduct" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <form id="frmAddEditProduct" action="#" onSubmit="javascript: guardarEditarProducto(event)">
                    <input type="hidden" id="fn" name="fn" value="guardar">
                    <input type="hidden" id="pr_id" name="pr_id" value="">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Nombre</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="control-label">Precio</label>
                                <input type="number" name="price" id="price" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="control-label">Descripción</label>
                                <textarea name="description" id="description" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12 text-center">
                            <button type="submit" id="btnGuardarActualizar" class="btn btn-success">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<script src="../resources/js/controllers/productos.js?v=<?=rand(100,999)?>"></script>
<?php include_once('./footer.php'); ?>