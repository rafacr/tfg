<!-- Ventana modal para eliminar -->
<div class="modal fade" id="activarModal<?php echo $mostrar['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">
                ¿Realmente deseas activar la cuenta?
            </h4>
        </div>

        <div class="modal-body">
          <strong style="text-align: center !important"> 
            Si confirmas la activación, el usuario podrá volver a acceder al sistema.        
          </strong>
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <a href="../funciones/funcion_reactivacion.php?id=<?php echo $mostrar['id']; ?>">
                <button type="button"  class="btn btn-danger">Confirmar</button>
             </a>
        </div>
        
        </div>
      </div>
</div>
<!---fin ventana eliminar--->