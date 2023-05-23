<!-- Ventana modal para eliminar -->
<div class="modal fade" id="eliminarModal<?php echo $mostrar['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">
                ¿Realmente deseas desactivar al usuario?
            </h4>
        </div>

        <div class="modal-body">
          <strong style="text-align: center !important"> 
            Si continúas se desactivará el acceso al usuario.        
          </strong>
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <a href="../funciones/funcion_eliminarRegistro.php?id=<?php echo $mostrar['id']; ?>&tab=usuario">
                <button type="button"  class="btn btn-danger">Confirmar</button>
             </a>
        </div>
        
        </div>
      </div>
</div>
<!---fin ventana eliminar--->