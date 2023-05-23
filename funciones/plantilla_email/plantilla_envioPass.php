<?php 


function plantilla_recuperarPass($nombre, $pass){

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
                        <H1 style="color:#f02323;"> ¡Recuperación de contraseña en Tu Scouting!</H1>
                        <P>
                          Estimado/a '.$nombre.'
                        </P>
                        <P>
                        Te proporcionamos tu contraseña con la intención de que puedas acceder a tu cuenta y la cambies lo antes posible por motivos de seguridad.
                        </P>
                        <P>
                        Tu constraseña de acceso es: '.$pass.'
                        </P>
                        <TABLE BORDER="0" CELLPADDING="20" CELLSPACING="0">
                          <TR>
                            <TD align="center">
                              <A href="http://localhost:81/tfg/index.php" style="display: inline-block; padding: 10px 20px; margin: 15px 0; background-color:#241CC4; font-size:16px;color:#FFF;text-decoration:none;">
                                Iniciar Sesión
                              </A>
                            </TD>
                          </TR>
                        </TABLE>

                        <P>Si tiene alguna pregunta, por favor no dude en contactarnos.</P>
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

