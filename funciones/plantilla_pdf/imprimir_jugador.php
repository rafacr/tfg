<?php
    include ("../funciones_usuario.php");
$idConsulta=$_GET['id'];
$resultado=dameConsulta("SELECT * from jugador where id='$idConsulta'");
$mostrar=mysqli_fetch_array($resultado);    

require_once '../includes/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf=new Dompdf();

ob_start();

?>
<!DOCTYPE html>
<style>
/*! CSS Used from: http://localhost:81/tfg/css/estilo_tfg.css */
*,*::before,*::after{box-sizing:border-box;}
[tabindex="-1"]:focus:not(:focus-visible){outline:0!important;}
h1,h4,h5{margin-top:0;margin-bottom:0.5rem;}
p{margin-top:0;margin-bottom:1rem;}
ul{margin-top:0;margin-bottom:1rem;}
b,strong{font-weight:bolder;}
a{color:#4e73df;text-decoration:none;background-color:transparent;}
a:hover{color:#224abe;text-decoration:underline;}
img{vertical-align:middle;border-style:none;}
table{border-collapse:collapse;}
th{text-align:inherit;text-align:-webkit-match-parent;}
label{display:inline-block;margin-bottom:0.5rem;}
button{border-radius:0;}
button:focus:not(:focus-visible){outline:0;}
input,button{margin:0;font-family:inherit;font-size:inherit;line-height:inherit;}
button,input{overflow:visible;}
button{text-transform:none;}
button,[type="button"]{-webkit-appearance:button;}
button:not(:disabled),[type="button"]:not(:disabled){cursor:pointer;}
h1,h4,h5,.h3{margin-bottom:0.5rem;font-weight:400;line-height:1.2;}
h1{font-size:2.5rem;}
.h3{font-size:1.75rem;}
h4{font-size:1.5rem;}
h5{font-size:1.25rem;}
.container-fluid,.container-xl{width:100%;padding-right:0.75rem;padding-left:0.75rem;margin-right:auto;margin-left:auto;}
@media (min-width: 1200px){
.container-xl{max-width:1140px;}
}
.row{display:flex;flex-wrap:wrap;margin-right:-0.75rem;margin-left:-0.75rem;}
.col,.col-sm-6,.col-md-6,.col-md-auto,.col-xl-4,.col-xl-8{position:relative;width:100%;padding-right:0.75rem;padding-left:0.75rem;}
.col{flex-basis:0;flex-grow:1;max-width:100%;}
@media (min-width: 576px){
.col-sm-6{flex:0 0 50%;max-width:50%;}
}
@media (min-width: 768px){
.col-md-auto{flex:0 0 auto;width:auto;max-width:100%;}
.col-md-6{flex:0 0 50%;max-width:50%;}
}
@media (min-width: 1200px){
.col-xl-4{flex:0 0 33.33333%;max-width:33.33333%;}
.col-xl-8{flex:0 0 66.66667%;max-width:66.66667%;}
}
.table{width:100%;margin-bottom:1rem;color:#858796;}
.table th,.table td{padding:0.75rem;vertical-align:top;border-top:1px solid #e3e6f0;}
.table thead th{vertical-align:bottom;border-bottom:2px solid #e3e6f0;}
.table-bordered{border:1px solid #e3e6f0;}
.table-bordered th,.table-bordered td{border:1px solid #e3e6f0;}
.table-bordered thead th{border-bottom-width:2px;}
.table-responsive{display:block;width:100%;overflow-x:auto;-webkit-overflow-scrolling:touch;}
.table-responsive > .table-bordered{border:0;}
.form-control{display:block;width:100%;height:calc(1.5em + 0.75rem + 2px);padding:0.375rem 0.75rem;font-size:1rem;font-weight:400;line-height:1.5;color:#6e707e;background-color:#fff;background-clip:padding-box;border:1px solid #d1d3e2;border-radius:0.35rem;transition:border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;}
@media (prefers-reduced-motion: reduce){
.form-control{transition:none;}
}
.form-control:focus{color:#6e707e;background-color:#fff;border-color:#bac8f3;outline:0;box-shadow:0 0 0 0.2rem rgba(78, 115, 223, 0.25);}
.form-control::placeholder{color:#858796;opacity:1;}
.form-control:disabled{background-color:#eaecf4;opacity:1;}
.form-group{margin-bottom:1rem;}
.btn{display:inline-block;font-weight:400;color:#858796;text-align:center;vertical-align:middle;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;background-color:transparent;border:1px solid transparent;padding:0.375rem 0.75rem;font-size:1rem;line-height:1.5;border-radius:0.35rem;transition:color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;}
@media (prefers-reduced-motion: reduce){
.btn{transition:none;}
}
.btn:hover{color:#858796;text-decoration:none;}
.btn:focus{outline:0;box-shadow:0 0 0 0.2rem rgba(78, 115, 223, 0.25);}
.btn:disabled{opacity:0.65;}
.btn:not(:disabled):not(.disabled){cursor:pointer;}
.btn-secondary{color:#fff;background-color:#858796;border-color:#858796;}
.btn-secondary:hover{color:#fff;background-color:#717384;border-color:#6b6d7d;}
.btn-secondary:focus{color:#fff;background-color:#717384;border-color:#6b6d7d;box-shadow:0 0 0 0.2rem rgba(151, 153, 166, 0.5);}
.btn-secondary:disabled{color:#fff;background-color:#858796;border-color:#858796;}
.btn-secondary:not(:disabled):not(.disabled):active{color:#fff;background-color:#6b6d7d;border-color:#656776;}
.btn-secondary:not(:disabled):not(.disabled):active:focus{box-shadow:0 0 0 0.2rem rgba(151, 153, 166, 0.5);}
.btn-success{color:#fff;background-color:#1cc88a;border-color:#1cc88a;}
.btn-success:hover{color:#fff;background-color:#17a673;border-color:#169b6b;}
.btn-success:focus{color:#fff;background-color:#17a673;border-color:#169b6b;box-shadow:0 0 0 0.2rem rgba(62, 208, 156, 0.5);}
.btn-success:disabled{color:#fff;background-color:#1cc88a;border-color:#1cc88a;}
.btn-success:not(:disabled):not(.disabled):active{color:#fff;background-color:#169b6b;border-color:#149063;}
.btn-success:not(:disabled):not(.disabled):active:focus{box-shadow:0 0 0 0.2rem rgba(62, 208, 156, 0.5);}
.btn-warning{color:#fff;background-color:#f6c23e;border-color:#f6c23e;}
.btn-warning:hover{color:#fff;background-color:#f4b619;border-color:#f4b30d;}
.btn-warning:focus{color:#fff;background-color:#f4b619;border-color:#f4b30d;box-shadow:0 0 0 0.2rem rgba(247, 203, 91, 0.5);}
.btn-warning:disabled{color:#fff;background-color:#f6c23e;border-color:#f6c23e;}
.btn-warning:not(:disabled):not(.disabled):active{color:#fff;background-color:#f4b30d;border-color:#e9aa0b;}
.btn-warning:not(:disabled):not(.disabled):active:focus{box-shadow:0 0 0 0.2rem rgba(247, 203, 91, 0.5);}
.btn-danger{color:#fff;background-color:#e74a3b;border-color:#e74a3b;}
.btn-danger:hover{color:#fff;background-color:#e02d1b;border-color:#d52a1a;}
.btn-danger:focus{color:#fff;background-color:#e02d1b;border-color:#d52a1a;box-shadow:0 0 0 0.2rem rgba(235, 101, 88, 0.5);}
.btn-danger:disabled{color:#fff;background-color:#e74a3b;border-color:#e74a3b;}
.btn-danger:not(:disabled):not(.disabled):active{color:#fff;background-color:#d52a1a;border-color:#ca2819;}
.btn-danger:not(:disabled):not(.disabled):active:focus{box-shadow:0 0 0 0.2rem rgba(235, 101, 88, 0.5);}
.fade{transition:opacity 0.15s linear;}
@media (prefers-reduced-motion: reduce){
.fade{transition:none;}
}
.fade:not(.show){opacity:0;}
.input-group{position:relative;display:flex;flex-wrap:wrap;align-items:stretch;width:100%;}
.input-group > .form-control{position:relative;flex:1 1 auto;width:1%;min-width:0;margin-bottom:0;}
.input-group > .form-control:focus{z-index:3;}
.input-group-lg > .form-control:not(textarea){height:calc(1.5em + 1rem + 2px);}
.input-group-lg > .form-control{padding:0.5rem 1rem;font-size:1.25rem;line-height:1.5;border-radius:0.3rem;}
.nav{display:flex;flex-wrap:wrap;padding-left:0;margin-bottom:0;list-style:none;}
.nav-link{display:block;padding:0.5rem 1rem;}
.nav-link:hover,.nav-link:focus{text-decoration:none;}
.nav-tabs{border-bottom:1px solid #dddfeb;}
.nav-tabs .nav-link{margin-bottom:-1px;border:1px solid transparent;border-top-left-radius:0.35rem;border-top-right-radius:0.35rem;}
.nav-tabs .nav-link:hover,.nav-tabs .nav-link:focus{border-color:#eaecf4 #eaecf4 #dddfeb;}
.nav-tabs .nav-link.active{color:#6e707e;background-color:#fff;border-color:#dddfeb #dddfeb #fff;}
.tab-content > .tab-pane{display:none;}
.tab-content > .active{display:block;}
.card{position:relative;display:flex;flex-direction:column;min-width:0;word-wrap:break-word;background-color:#fff;background-clip:border-box;border:1px solid #e3e6f0;border-radius:0.35rem;}
.card-body{flex:1 1 auto;min-height:1px;padding:1.25rem;}
.card-title{margin-bottom:0.75rem;}
.card-text:last-child{margin-bottom:0;}
.card-header{padding:0.75rem 1.25rem;margin-bottom:0;background-color:#f8f9fc;border-bottom:1px solid #e3e6f0;}
.card-header:first-child{border-radius:calc(0.35rem - 1px) calc(0.35rem - 1px) 0 0;}
.modal{position:fixed;top:0;left:0;z-index:1050;display:none;width:100%;height:100%;overflow:hidden;outline:0;}
.modal-dialog{position:relative;width:auto;margin:0.5rem;pointer-events:none;}
.modal.fade .modal-dialog{transition:transform 0.3s ease-out;transform:translate(0, -50px);}
@media (prefers-reduced-motion: reduce){
.modal.fade .modal-dialog{transition:none;}
}
.modal-content{position:relative;display:flex;flex-direction:column;width:100%;pointer-events:auto;background-color:#fff;background-clip:padding-box;border:1px solid rgba(0, 0, 0, 0.2);border-radius:0.3rem;outline:0;}
.modal-header{display:flex;align-items:flex-start;justify-content:space-between;padding:1rem 1rem;border-bottom:1px solid #e3e6f0;border-top-left-radius:calc(0.3rem - 1px);border-top-right-radius:calc(0.3rem - 1px);}
.modal-title{margin-bottom:0;line-height:1.5;}
.modal-body{position:relative;flex:1 1 auto;padding:1rem;}
.modal-footer{display:flex;flex-wrap:wrap;align-items:center;justify-content:flex-end;padding:0.75rem;border-top:1px solid #e3e6f0;border-bottom-right-radius:calc(0.3rem - 1px);border-bottom-left-radius:calc(0.3rem - 1px);}
.modal-footer > *{margin:0.25rem;}
@media (min-width: 576px){
.modal-dialog{max-width:500px;margin:1.75rem auto;}
}
.justify-content-center{justify-content:center!important;}
.shadow-sm{box-shadow:0 0.125rem 0.25rem 0 rgba(58, 59, 69, 0.2)!important;}
.shadow{box-shadow:0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15)!important;}
.mb-1{margin-bottom:0.25rem!important;}
.mt-3{margin-top:1rem!important;}
.mb-3{margin-bottom:1rem!important;}
.mt-4{margin-top:1.5rem!important;}
.mb-4{margin-bottom:1.5rem!important;}
.py-3{padding-top:1rem!important;}
.py-3{padding-bottom:1rem!important;}
.px-4{padding-right:1.5rem!important;}
.px-4{padding-left:1.5rem!important;}
@media (min-width: 1200px){
.mb-xl-0{margin-bottom:0!important;}
}
.text-center{text-align:center!important;}
.text-white{color:#fff!important;}
.text-white-50{color:rgba(255, 255, 255, 0.5)!important;}
@media print{
*,*::before,*::after{text-shadow:none!important;box-shadow:none!important;}
a:not(.btn){text-decoration:underline;}
thead{display:table-header-group;}
tr,img{page-break-inside:avoid;}
p{orphans:3;widows:3;}
.table{border-collapse:collapse!important;}
.table td,.table th{background-color:#fff!important;}
.table-bordered th,.table-bordered td{border:1px solid #dddfeb!important;}
}
a:focus{outline:none;}
.container-fluid,.container-xl{padding-left:1.5rem;padding-right:1.5rem;}
.bg-gradient-primary{background-color:#4e73df;background-image:linear-gradient(180deg, #4e73df 10%, #224abe 100%);background-size:cover;}
.bg-gradient-secondary{background-color:#858796;background-image:linear-gradient(180deg, #858796 10%, #60616f 100%);background-size:cover;}
.bg-gradient-success{background-color:#1cc88a;background-image:linear-gradient(180deg, #1cc88a 10%, #13855c 100%);background-size:cover;}
.bg-gradient-warning{background-color:#f6c23e;background-image:linear-gradient(180deg, #f6c23e 10%, #dda20a 100%);background-size:cover;}
.bg-gradient-danger{background-color:#e74a3b;background-image:linear-gradient(180deg, #e74a3b 10%, #be2617 100%);background-size:cover;}
.text-gray-800{color:#5a5c69!important;}

</style>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tu Scouting PRO </title>
    <link rel="shortcut icon" type="image/png" href="../../img/logo.png">

    </head>

<body id="page-top">
<div class="container">


<div class="container-xl px-4 mt-4">
    <div class="row">
        <div class="col">
        <h1 class="h3 mb-3 text-gray-800 "><b><?php echo $mostrar["nombre"]." ".$mostrar["apellidos"]?></b></h1>
        </div>
        
		</div>

    
     <div class="row">
                       
                           
                                          
										  
                            <div class="card mb-4 mb-xl-0 ">
                                    <div class="card-header text-center text-gray-800"><b>FOTO DE PERFIL</b></div>
                                    <div class="card-body text-center">
                                        <!-- Imagen del jugador-->
                                        <?php $imagenBase64 = "data:image/png;base64," . base64_encode(file_get_contents("../../img/".$mostrar['img_perfil'])); ?>
                                        <img class="img-account-profile width="300" height="300"" src="<?php echo $imagenBase64?>" alt="">
                                    </div>
                                    <div class="card-header text-center text-gray-800"><b>DATOS</b></div>
                                    <div class="card-body">
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="mb-1 text-gray-800"><b>Peso (KG)</b></label>
                                                <p class="card-text"><?php echo $mostrar['peso']?></p>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="mb-1 text-gray-800"><b>Altura (CM)</b></label>
                                                <p class="card-text"><?php echo $mostrar['altura']?></p>
                                            </div>
                                        </div>
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="mb-1 text-gray-800"><b>Posición</b></label>
                                                <p class="card-text"><?php echo $mostrar['posicion']?></p> 
                                            </div>
                                               
                                                <div class="col-md-6">
                                                <label class="mb-1 text-gray-800"><b>Categoría</b></label>
                                                <p class="card-text"><?php echo $mostrar['categoria']?></p> 
                                                </div>
                                        </div>
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="mb-1 text-gray-800"><b>Pierna</b></label>
                                                <p class="card-text"><?php echo $mostrar['pierna']?></p> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            
                                <!-- Card de información del jugador-->
                                <div class="card mb-4">
                                    <div class="card-header text-center text-gray-800"><b>INFORMACIÓN DEL JUGADOR</b></div>
                                    <div class="card-body">                                            
                                            <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                
                                                <div class="col-md-6">
                                                <label class="mb-1 text-gray-800"><b>Nombre</b></label>
                                                    <p class="card-text"><?php echo $mostrar['nombre']?></p>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                <label class="mb-1 text-gray-800"><b>Apellidos</b></label>
                                                <p class="card-text"><?php echo $mostrar['apellidos']?></p>
                                                </div>
                                            </div>
                                            <!-- Form Row-->
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                <label class="mb-1 text-gray-800"><b>Año de nacimiento</b></label>
                                                <p class="card-text"><?php echo $mostrar['yearNacimiento']?></p>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                <label class="mb-1 text-gray-800"><b>Equipo</b></label>
                                                <p class="card-text"><?php echo $mostrar['equipo']?></p>
                                                </div>
                                            </div>
                                            
                                            <div class="row gx-3 mb-3">
                                                
                                                <div class="col-md-6">
                                                <label class="mb-1 text-gray-800"><b>Salario</b></label>
                                                <p class="card-text"><?php echo $mostrar['salario']?></p>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                <label class="mb-1 text-gray-800"><b>Fin de contrato</b></label>
                                                <p class="card-text"><?php echo $mostrar['fin_contrato']?></p>
                                                </div>
                                            </div>

                                            <div class="row gx-3 mb-3">
                                                
                                                <div class="col-md-6">
                                                    <label class="mb-1 text-gray-800"><b>Debut</b></label>
                                                    <p class="card-text"><?php echo $mostrar['debut']?></p>
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="mb-1 text-gray-800"><b>Residencia</b></label>
                                                    <p class="card-text"><?php echo $mostrar['residencia']?></p>
                                                </div>
                                            </div>
                                            
                                            <div class="row gx-3 mb-3">
                                                
                                                <div class="col-md-6">
                                                    <label class="mb-1 text-gray-800"><b>Idiomas</b></label>
                                                    <p class="card-text"><?php echo $mostrar['idiomas']?></p>
                                                </div>
                                                
                                            </div>
                                            
                                            
                                    </div>
                                </div>
                          

                            
                            
                            
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="card-header text-center text-gray-800"><b>HISTORIAL DEL JUGADOR</b></div>
                                        <div class="card-body">
                                            <div class="row">
                                                
                                                    <div class="card">
                                                        <div class="card-body">
                                                        <h5 class="card-title text-center bg-gradient-secondary text-white">Equipos</h5>
                                                            <p class="card-text"><?php echo $mostrar['historial_equipos']?></p>
                                                            
                                                            
                                                        </div>
                                                   
                                                </div>
                                                
                                                    <div class="card">
                                                        <div class="card-body">
                                                        <h5 class="card-title text-center bg-gradient-secondary text-white">Lesiones</h5>
                                                            <p class="card-text"><?php echo $mostrar['historial_lesiones']?></p>
                                                        </div>
                                                    </div>
                                                
                                           
                                           
                                                
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-center bg-gradient-secondary text-white">Sanciones</h5>
                                                            <p class="card-text"><?php echo $mostrar['historial_sanciones']?></p>
                                                                                                                       
                                                        </div>
                                                    </div>
                                                
                                                
                                                    <div class="card">
                                                        <div class="card-body">
                                                        <h5 class="card-title text-center bg-gradient-secondary text-white">Palmarés</h5>
                                                            <p class="card-text"><?php echo $mostrar['historial_palmares']?></p>
                                                        </div>
                                                    </div>
                                                
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                 
                           
                         <div class="card mb-4">
                                    <div class="card-header text-center text-gray-800"><b>DAFO DEL JUGADOR</b></div>
                                        <div class="card-body">
                                            <div class="row">
                                                
                                                    <div class="card">
                                                        <div class="card-body">
                                                        <h5 class="card-title text-center bg-gradient-warning text-white">Debilidades</h5>
                                                            <p class="card-text"><?php echo $mostrar['dafo_debilidades']?></p>
                                                            
                                                        </div>
                                                    </div>
                                                
                                               
                                                    <div class="card">
                                                        <div class="card-body">
                                                        <h5 class="card-title text-center bg-gradient-danger text-white">Amenazas</h5>
                                                            <p class="card-text"><?php echo $mostrar['dafo_amenazas']?></p>
                                                        </div>
                                                    </div>
                                                
                                            
                                                
                                                    <div class="card">
                                                        <div class="card-body">
                                                        <h5 class="card-title text-center bg-gradient-primary text-white">Fortalezas</h5>
                                                            <p class="card-text"><?php echo $mostrar['dafo_fortalezas']?></p>
                                                            
                                                        </div>
                                                    </div>
                                                
                                                
                                                    <div class="card">
                                                        <div class="card-body">
                                                        <h5 class="card-title text-center bg-gradient-success text-white">Oportunidades</h5>
                                                            <p class="card-text"><?php echo $mostrar['dafo_oportunidades']?></p>
                                                        </div>
                                                    </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                

                            
</div>
</div>
</div>

</body>
                </html>



<?php


$html=ob_get_clean();
//echo $html;



$dompdf->loadHtml($html);

$dompdf->setPaper('letter');
$dompdf->setPaper('A4','landscape');

$dompdf->render();

$dompdf->stream("archivo.pdf",array("Attachment"=>false));

$contenido = $dompdf->output();


?>

