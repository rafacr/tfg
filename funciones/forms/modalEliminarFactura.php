<!-- Ventana modal para eliminar -->
<div class="modal fade" id="eliminarModal<?php echo $mostrar['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">
                ¿Realmente deseas eliminar la factura?
            </h4>
        </div>

        <div class="modal-body">
          <strong style="text-align: center !important"> 
            Si confirmas el borrado se eliminará de la base de datos definitivamente.        
          </strong>
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <a href="../funciones/funcion_eliminarRegistro.php?id=<?php echo $mostrar['id']; ?>&tab=factura">
                <button type="button"  class="btn btn-danger">Confirmar</button>
             </a>
        </div>
        
        </div>
      </div>
</div>
<!---fin ventana eliminar--->