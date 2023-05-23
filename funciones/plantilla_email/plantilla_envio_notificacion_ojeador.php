<?php 


function plantilla_notificacion_ojeador_email($evento,$fecha,$texto){

$mensaje_correo = '<TABLE BORDER="0" CELLPADDING="0" CELLSPACING="0" WIDTH="100%">
  <TR>
    <TD bgcolor="#f7f7f7" align="center">
      <STYLE type="text/css">
        IMG {
          display: block;
          border: 0 none;
          height: auto;
          width: 100%;
          max-width: 600px;
        }

        @media only screen and (min-width:900px) {.wrapper{width:900px!important;} .container{width:700px!important;}}

      </STYLE>
      <TABLE class="container" BORDER="0" CELLPADDING="40" CELLSPACING="0" style="background-color: #ffffff;">
        <TR>
          <TD align="center">
            <TABLE class="wrapper" BORDER="0" CELLPADDING="0" CELLSPACING="0">
              <TR>
                <TD>
                  <TABLE BORDER="0" CELLPADDING="0" CELLSPACING="0" style="width:100%;">
                    <TR>
                      <TD align="center">
                        <H1 style="color:#f02323;"> ¡Notificación de Tu Scouting!</H1>
                        <P>
                          ¡Hola! El responsable de tu equipo te acaba de enviar una notificación.
                        </P>
                        <P>
                        Evento de la notificación: '.$evento.'
                        </P>
                        <P>
                        Fecha de la tarea: '.$fecha.'
                        </P>
                        <TABLE BORDER="0" CELLPADDING="20" CELLSPACING="0">
                          <TR>
                            <TD align="center">
                              Mensaje: '.$texto.'
                              </A>
                            </TD>
                          </TR>
                        </TABLE>

                        <P>Si tiene alguna duda, póngase en contacto con su responsable de scouting.</P>
                      </TD>
                    </TR>
                  </TABLE>
                </TD>
              </TR>
            </TABLE>
          </TD>
        </TR>
      </TABLE>
    </TD>
  </TR>

</TABLE>';

    return $mensaje_correo;
}
?>

