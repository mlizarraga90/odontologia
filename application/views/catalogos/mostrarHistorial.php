<?php $this->load->view('header');?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/boostraptags.css">

<link rel="stylesheet" type="text/css" href="https://datoweb.com/visor/css/fresco/fresco.css" />
<style>
	.card {
		border: 1px solid #eaf0f7;
	}
	#btnGuardar{float:right;}
	#frmPaciente{display:none;}
    .ojo {
        position: relative;
        width: 110px;
        height: 108px;
        border:1px solid white;
        
    }
    .ojo img{width: 100%;height: 100%;}
    .infoOjo{position: absolute;z-index: 10;}
    .imgItem{width: 100%;}
    /*imagen grande*/
    #myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
<div class="col-lg-9 col-md-9  col-sm-8  col-xs-6">&nbsp;</div>
<div class="table-responsive py-4">
	<div id="tblContainer">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-2 .d-xs-none ">&nbsp;</div>
            <div class="col-lg-3 col-md-3 col-sm-5 col-xs-6"><button type="button" class="btn btn-success" id="btnImprimir">IMPRIMIR</button></div>
            <div class="col-lg-3 col-md-3 col-sm-5 col-xs-6"><button type="button" class="btn btn-primary" id="btnRegresar">REGRESAR</button></div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2 id="exampleModalLabel"></h2>
            </div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">&nbsp;</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="accordion" id="acordion">
					<div class="card">
                            <div class="card-header" id="tabG" data-toggle="collapse" data-target="#tabGeneral " aria-expanded="true" aria-controls="tabGeneral ">
                                <h5 class="mb-0">INTERROGATORIO</h5>
                            </div>
                            <div id="tabGeneral " class="collapse show" aria-labelledby="tabG" data-parent="#tabGeneral">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="txtPadecimiento" class="form-control-label">Padecimiento actual</label>
                                            <textarea class="form-control" placeholder="Padecimiento actual" id="txtPadecimientoH" name="padeciActual"  rows="3"></textarea>
                                        </div>
                                        
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="txtAnteOculares" class="form-control-label">Antecedentes oculares</label>
                                            <textarea class="form-control" placeholder="Antecedentes oculares" id="txtAnteOcularesH" name="anteceOculares" rows="3"></textarea>
                                        </div>
                                        
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="txtAnteOculares" class="form-control-label">Antecedentes patológicos</label>
                                            <textarea class="form-control" placeholder="Antecedentes patológicos" id="txtAntePatoloH" name="antecePatologi" rows="3"></textarea>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label for="txtMeAler" class="form-control-label">Medicamentos y alergías</label>
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px">
                                                <input type="text" class="form-control form-control-sm" data-role="tagsinput" id="txtMeAlerH" name="medicamenAlergi" >
                                            </div>
                                            <!--<textarea class="form-control" placeholder="Medicamentos y alergías" id="txtMeAler" name="medicaAlergias" data-role="tagsinput" rows="3"></textarea>-->
                                            
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">&nbsp;</div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <h5>GRADUACIÓN ANTERIOR</h5>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                    <label for="txtGraduEsfereIz" class="form-control-label">Esfera</label>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Esfera" id="txtGraduEsfereIzH" name="esferaIz">
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                    <label for="txtGraduCilindroIz" class="form-control-label">Cilindro</label>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Cilindro" id="txtGraduCilindroIzH" name="cilindroIz">
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                    <label for="txtGraduEjeIz" class="form-control-label">Eje</label>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Eje" id="txtGraduEjeIzH" name="ejeIz">
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                    <label for="txtGraduAdicionIz" class="form-control-label">Adición</label>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Adición" id="txtAdicionjeIzH" name="adicionIz">
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">&nbsp;</div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <h5>GRADUACIÓN ANTERIOR</h5>
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                    <label for="txtGraduEsferedere" class="form-control-label">Esfera</label>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Esfera" id="txtGraduEsferedereH" name="esferaDere">
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                    <label for="txtGraduCilindrodere" class="form-control-label">Cilindro</label>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Cilindro" id="txtGraduCilindrodereH" name="cilindroDere">
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                    <label for="txtGraduEjedere" class="form-control-label">Eje</label>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Eje" id="txtGraduEjedereH" name="ejeDere">
                                                </div>
                                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                    <label for="txtGraduAdiciondere" class="form-control-label">Adición</label>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Adición" id="txtAdicionjedereH" name="adicionDere">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="card">
                            <div class="card-header" id="headingTwo" data-toggle="collapse" data-target="#tabExploOftal" aria-expanded="false" aria-controls="tabExploOftal">
                                <h5 class="mb-0">EXPLORACIÓN OFTALMOLOGA</h5>
                            </div>
                            <div id="tabExploOftal" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                   <div class="row">
                                        <!--DERECHO OJO-->
                                            <!--DERECHO-->
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 title">
                                                    <h5>OJO DERECHO</h5>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <label for="txtAgudezaVisuIz" class="form-control-label">Agudeza visual</label>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Agudeza visual" id="txtAgudezaVisuDereH" name="agudezaVisualDere">
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <label for="txtCapaVisualIz" class="form-control-label">Capacidad visual</label>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Capacidad visual" id="txtCapaVisualDereH" name="capacidadVisualDere">
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="row">
                                                        <div class="col-lg-8 col-md-5 col-sm-6 col-xs-4">&nbsp;</div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 title">
                                                            <h5>REFRACCIÓN</h5>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                            <label for="txtRefraEsferedere" class="form-control-label">Esfera</label>
                                                            <input type="text" class="form-control form-control-sm" placeholder="Esfera" id="txtRefraEsfereDereH" name="refraEsferaDere">
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                            <label for="txtRefraCilindrodere" class="form-control-label">Cilindro</label>
                                                            <input type="text" class="form-control form-control-sm" placeholder="Cilindro" id="txtRefraCilindroDereH" name="refraCilindroDere">
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                            <label for="txtRefraEjedere" class="form-control-label">Eje</label>
                                                            <input type="text" class="form-control form-control-sm" placeholder="Eje" id="txtRefraEjeDereH" name="refraEjeDere">
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                            <label for="txtRefraAdicionjedere" class="form-control-label">Adición</label>
                                                            <input type="text" class="form-control form-control-sm" placeholder="Adición" id="txtRefraAdicionjeDereH" name="refraAdicionDere">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="row">
                                                        <div class="col-lg-8 col-md-5 col-sm-6 col-xs-4">&nbsp;</div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 title">
                                                            <h5>RETINOSCOPIA</h5>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                            <label for="txtRetinosEsferedere" class="form-control-label">Esfera</label>
                                                            <input type="text" class="form-control form-control-sm" placeholder="Esfera" id="txtRetinosEsfereDereH" name="retinosEsferaDere">
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                            <label for="txtRetinosCilindrodere" class="form-control-label">Cilindro</label>
                                                            <input type="text" class="form-control form-control-sm" placeholder="Cilindro" id="txtRetinosCilindroDereH" name="retinosCilindroDere">
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                            <label for="txtRetinosEjedere" class="form-control-label">Eje</label>
                                                            <input type="text" class="form-control form-control-sm" placeholder="Eje" id="txtRetinosEjeDereH" name="RetinosEjeDere">
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                            <label for="txtRetinosAdicionjedere" class="form-control-label">Adición</label>
                                                            <input type="text" class="form-control form-control-sm" placeholder="Adición" id="txtRetinosAdicionjeDereH" name="retinosAdicionDere">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-lg-8 col-md-5 col-sm-6 col-xs-4">&nbsp;</div>
                                                    <label for="txtParpaCejaIz" class="form-control-label">Parpados/ cejas/ pestañas</label>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Parpados/ cejas/ pestañas" id="txtParpaCejaDereH" name="parpadosCejasDere">
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <label for="txtConjuntivaIz" class="form-control-label">Conjuntiva</label>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Conjuntiva" id="txtConjuntivaDereH" name="conjuntivaDere">
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <label for="txtcorneaIz" class="form-control-label">Córnea</label>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Córnea" id="txtcorneaDereH" name="corneaDere">
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <label for="txtCamaraAnteriorIz" class="form-control-label">Camara anterior</label>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Camara anterior" id="txtCamaraAnteriorDereH" name="camaraAnteriorDere">
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <label for="txtIrisIz" class="form-control-label">Iris(forma/reflejos /rubeosis)</label>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Iris(forma/reflejos /rubeosis)" id="txtIrisDereH" name="irisDere">
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <label for="txtCristalinoIz" class="form-control-label">Crístalino</label>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Crístalino" id="txtCristalinoDereH" name="cristalinoDere">
                                                </div>
                                                
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-lg-8 col-md-5 col-sm-6 col-xs-4">&nbsp;</div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 title">
                                                        <h5 >Gineoscopia</h5>
                                                    </div><br>
                                                    <div class="ojo ojo-uno-derecho">
                                                        <img src="<?php echo base_url();?>assets/images/ojo1izquierdo.png" alt="" class="ojo1izquierdo" id="ojo1IzquierdoImg" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-5 col-sm-6 col-xs-4">&nbsp;</div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <label for="txtPresionIntraIz" class="form-control-label">Presión intraocular</label>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Presión intraocular" id="txtPresionIntraDereH" name="presionIntraIz">
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <label for="txtHumorVitroIz" class="form-control-label">Humor vitreo</label>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Humor vitreo" id="txtHumorVitroDereH" name="humorVitroIz">
                                                </div>
                                            </div>
                                        </div>
                                    <!--IZQUIERDO-->
                                       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 title">
                                                    <h5>OJO IZQUIERDO</h5>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <label for="txtAgudezaVisuIz" class="form-control-label">Agudeza visual</label>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Agudeza visual" id="txtAgudezaVisuIzH" name="agudezaVisualIz">
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <label for="txtCapaVisualIz" class="form-control-label">Capacidad visual</label>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Capacidad visual" id="txtCapaVisualIzH" name="capacidadVisualIz">
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-2 col-xs-12">&nbsp;</div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 title">
                                                            <h5>REFRACCIÓN</h5>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                            <label for="txtRefraEsferedere" class="form-control-label">Esfera</label>
                                                            <input type="text" class="form-control form-control-sm" placeholder="Esfera" id="txtRefraEsfereIzH" name="refraEsferaIz">
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                            <label for="txtRefraCilindrodere" class="form-control-label">Cilindro</label>
                                                            <input type="text" class="form-control form-control-sm" placeholder="Cilindro" id="txtRefraCilindroIzH" name="refraCilindroIz">
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                            <label for="txtRefraEjedere" class="form-control-label">Eje</label>
                                                            <input type="text" class="form-control form-control-sm" placeholder="Eje" id="txtRefraEjeIzH" name="refraEjeIz">
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                            <label for="txtRefraAdicionjedere" class="form-control-label">Adición</label>
                                                            <input type="text" class="form-control form-control-sm" placeholder="Adición" id="txtRefraAdicionjeIzH" name="refraAdicionIz">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-2 col-xs-12">&nbsp;</div>
                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 title">
                                                            <h5>RETINOSCOPIA</h5>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                            <label for="txtRetinosEsferedere" class="form-control-label">Esfera</label>
                                                            <input type="text" class="form-control form-control-sm" placeholder="Esfera" id="txtRetinosEsfereIzH" name="retinosEsferaIz">
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                            <label for="txtRetinosCilindrodere" class="form-control-label">Cilindro</label>
                                                            <input type="text" class="form-control form-control-sm" placeholder="Cilindro" id="txtRetinosCilindroIzH" name="retinosCilindroIz">
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                            <label for="txtRetinosEjedere" class="form-control-label">Eje</label>
                                                            <input type="text" class="form-control form-control-sm" placeholder="Eje" id="txtRetinosEjeIzH" name="RetinosEjeIz">
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                                            <label for="txtRetinosAdicionjedere" class="form-control-label">Adición</label>
                                                            <input type="text" class="form-control form-control-sm" placeholder="Adición" id="txtRetinosAdicionjeIzH" name="retinosAdicionIz">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-lg-6 col-md-6 col-sm-2 col-xs-12">&nbsp;</div>
                                                    <label for="txtParpaCejaIz" class="form-control-label">Parpados/ cejas/ pestañas</label>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Parpados/ cejas/ pestañas" id="txtParpaCejaIzH" name="parpadosCejasIz">
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <label for="txtConjuntivaIz" class="form-control-label">Conjuntiva</label>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Conjuntiva" id="txtConjuntivaIzH" name="conjuntivaIz">
                                                </div>

                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <label for="txtcorneaIz" class="form-control-label">Córnea</label>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Córnea" id="txtcorneaIzH" name="corneaIz">
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <label for="txtCamaraAnteriorIz" class="form-control-label">Camara anterior</label>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Camara anterior" id="txtCamaraAnteriorIzH" name="camaraAnteriorIz">
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <label for="txtIrisIz" class="form-control-label">Iris(forma/reflejos /rubeosis)</label>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Iris(forma/reflejos /rubeosis)" id="txtIrisIzH" name="irisIz">
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <label for="txtCristalinoIz" class="form-control-label">Crístalino</label>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Crístalino" id="txtCristalinoIzH" name="cristalinoIz">
                                                </div>
                                                <div class="col-lg-8 col-md-5 col-sm-6 col-xs-4">&nbsp;</div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 title">
                                                        <h5>Gineoscopia</h5>
                                                    </div><br>
                                                    <div class="ojo ojo-uno-izquierdo">
                                                        <img src="<?php echo base_url();?>assets/images/ojo1izquierdo.png" alt="" class="ojo1izquierdo" id="ojo1IzquierdoImg" />
                                                    </div>
                                                </div>
                                                
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <label for="txtPresionIntraIz" class="form-control-label">Presión intraocular</label>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Presión intraocular" id="txtPresionIntraIzH" name="presionIntraIz">
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <label for="txtHumorVitroIz" class="form-control-label">Humor vitreo</label>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Humor vitreo" id="txtHumorVitroIzH" name="humorVitroIz">
                                                </div>
                                            </div>
                                        </div>
                                        
                                   </div>
                                </div>
                            </div>
                    </div>
                    <div class="card">
                            <div class="card-header" id="exploFondo" data-toggle="collapse" data-target="#tabExploracionFondo" aria-expanded="false" aria-controls="tabExploracionFondo">
                                <h5 class="mb-0">EXPLORACIÓN DE FONDO DE OJO</h5>
                            </div>
                            <div id="tabExploracionFondo" class="collapse show" aria-labelledby="exploFondo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="row">
                                        <!--OJO DERECHO-->
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 title">
                                                    <h5>OJO DERECHO</h5>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">&nbsp;</div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <label for="txtReflejoFondoIz" class="form-control-label">Reflejo de fono</label>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Reflejo de fono" id="txtReflejoFondoDereH" name="reflejoFondoDere">
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                      <input type="radio" id="presenteReflejoDere" name="reflejoDe" class="custom-control-input" value="1">
                                                      <label class="custom-control-label" for="presenteReflejoDere">Presente</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                      <input type="radio" id="ausenteReflejoDere" name="reflejoDe" class="custom-control-input" value="2">
                                                      <label class="custom-control-label" for="ausenteReflejoDere">Ausente</label>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <label for="txtExcavacionIz" class="form-control-label">Excavación</label>
                                                        <input type="text" class="form-control form-control-sm" placeholder="Excavación" id="txtExcavacionDereH" name="excavacionDere">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-2 col-xs-12">&nbsp;</div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <label for="txtReflejoRojoIz" class="form-control-label">Reflejo rojo de fondo</label>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Reflejo rojo de fondo" id="txtReflejoRojoDereH" name="reflejoFondoRojoDere">
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <label for="txtPapilaIz" class="form-control-label">Papila</label>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Papila" id="txtPapilaDereH" name="papilaDere">
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <label for="txtRetinaIz" class="form-control-label">Retina(hemorragias/exudados/desgarros/neoformaciones)</label>
                                                    <textarea class="form-control" placeholder="Retina(hemorragias/exudados/desgarros/neoformaciones)" id="txtRetinaDereH" name="retinaDere"  rows="3"></textarea>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <label for="txtAreaMecularIz" class="form-control-label">Area macular</label>
                                                    <textarea class="form-control" placeholder="Area macular" id="txtAreaMecularDereH" name="areaMecularDere"  rows="3"></textarea>
                                                </div>
                                                <!--FALTA HACER EL OJO AQUI #2-->
                                                <div class="col-lg-6 col-md-6 col-sm-2 col-xs-12">
                                                    <div class="ojo ojo-dos-derecho" >
                                                        <!--<div class="circulo-iz" id="ojo2-izquierdo"></div>  
                                                        <div class="circulo-small-iz"></div>    -->
                                                        <img src="<?php echo base_url();?>assets/images/ojoizquierdo.png" alt="" class="img-ojo2-izquierdo" id="ojo2-izquierdo">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <label for="txtExploEstuAdiIz" class="form-control-label">Otras exploraciones/estudios adicionales</label>
                                                    <textarea class="form-control" placeholder="Otras exploraciones/estudios adicionales" id="txtExploEstuAdiDereH" name="exploestuadicionaDere"  rows="3"></textarea>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <label for="txtImpreDiagnoIz" class="form-control-label">Impresión diagnóstica</label>
                                                    <textarea class="form-control" placeholder="Impresión diagnóstica" id="txtImpreDiagnoDereH" name="impreDiagnoDere"  rows="3"></textarea>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <label for="txtPlanSeguimientoIz" class="form-control-label">Plan seguimiento</label>
                                                    <textarea class="form-control" placeholder="Plan seguimiento" id="txtPlanSeguimientoDereH" name="planSeguiDere"  rows="3"></textarea>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <!--OJO DEREHO-->
                                        <!--ojo izquierdo-->
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 title">
                                                    <h5>OJO IZQUIERDO</h5>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">&nbsp;</div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <label for="txtReflejoFondoIz" class="form-control-label">Reflejo de fono</label>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Reflejo de fono" id="txtReflejoFondoIzH" name="reflejoFondoIz">
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                      <input type="radio" id="presenteReflejoIz" name="reflejoIz" class="custom-control-input" value="3">
                                                      <label class="custom-control-label" for="presenteReflejoIz">Presente</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                      <input type="radio" id="ausenteReflejoIzqui" name="reflejoIz" class="custom-control-input"  value="4">
                                                      <label class="custom-control-label" for="ausenteReflejoIzqui">Ausente</label>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <label for="txtExcavacionIz" class="form-control-label">Excavación</label>
                                                        <input type="text" class="form-control form-control-sm" placeholder="Excavación" id="txtExcavacionIzH" name="excavacionIz">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-2 col-xs-12">&nbsp;</div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <label for="txtReflejoRojoIz" class="form-control-label">Reflejo rojo de fondo</label>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Reflejo rojo de fondo" id="txtReflejoRojoIzh" name="reflejoFondoRojoIz">
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <label for="txtPapilaIz" class="form-control-label">Papila</label>
                                                    <input type="text" class="form-control form-control-sm" placeholder="Papila" id="txtPapilaIzh" name="papilaIz">
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <label for="txtRetinaIz" class="form-control-label">Retina(hemorragias/exudados/desgarros/neoformaciones)</label>
                                                    <textarea class="form-control" placeholder="Retina(hemorragias/exudados/desgarros/neoformaciones)" id="txtRetinaIzh" name="retinaIz"  rows="3"></textarea>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <label for="txtAreaMecularIz" class="form-control-label">Area macular</label>
                                                    <textarea class="form-control" placeholder="Area macular" id="txtAreaMecularIzh" name="areaMecularIz"  rows="3"></textarea>
                                                </div>
                                                <!--FALTA HACER EL OJO AQUI #2-->
                                                <div class="col-lg-6 col-md-6 col-sm-2 col-xs-12">
                                                    <div class="ojo ojo-dos-izquierdo" >
                                                        <img src="<?php echo base_url();?>assets/images/ojoderecho.png" alt="" class="img-ojo2-izquierdo" id="ojo2-izquierdo">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <label for="txtExploEstuAdiIz" class="form-control-label">Otras exploraciones/estudios adicionales</label>
                                                    <textarea class="form-control" placeholder="Otras exploraciones/estudios adicionales" id="txtExploEstuAdiIzh" name="exploestuadicionaIz"  rows="3"></textarea>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <label for="txtImpreDiagnoIz" class="form-control-label">Impresión diagnóstica</label>
                                                    <textarea class="form-control" placeholder="Impresión diagnóstica" id="txtImpreDiagnoIzh" name="impreDiagnoIz"  rows="3"></textarea>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <label for="txtPlanSeguimientoIz" class="form-control-label">Plan seguimiento</label>
                                                    <textarea class="form-control" placeholder="Plan seguimiento" id="txtPlanSeguimientoIzh" name="planSeguiIz"  rows="3"></textarea>
                                                </div>
                                                
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="tagImages" data-toggle="collapse" data-target="#tabImages" aria-expanded="false" aria-controls="tabImages">
                                <h5 class="mb-0">IMAGENES</h5>
                            </div>
                            <div id="tabImages" class="collapse show" aria-labelledby="tagImages" data-parent="#tabImages">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="imagesContainer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-2 .d-xs-none">&nbsp;</div>
					<div class="col-lg-4 col-md-4 col-sm-5 col-xs-6">
						<button type="button" class="btn btn-primary" id="btnPrevious" data-index /> <i class="fa fa-angle-left"></i> ANTERIOR </button>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-5 col-xs-6">
	            		<button type="button" class="btn btn-primary" id="btnNext" data-index />SIGUIENTE <i class="fa fa-angle-right"></i></button>
					</div>	
				</div>
				
			</div>
		</div>
	</div>
</div>
<a id="verimagenes" class='fresco' data-fresco-group='grupo'></a> 

<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>
<?php $this->load->view('footer');?>
<script>
	$(document).ready(function(){
		var historialClinico=$.parseJSON('<?php echo json_encode($historialMedico)?>'),
		index=0;
		if(historialClinico.length>0)
			getDetalleHistorial(historialClinico[0].id);

		$("#btnNext").click(function(){
			if(index<historialClinico.length){
				index++;
				getDetalleHistorial(historialClinico[index].id);
			}
		});
		$("#btnPrevious").click(function(){
			if(index>0){
				index--;
				getDetalleHistorial(historialClinico[index].id);	
			}
			
		});
        $("#btnImprimir").click(function(){
            if(parseInt($(this).data('idconsulta'))>0)
                window.location.href=BASEURL+"index.php/catalogos/pacientes/imprimirReceta/"+$(this).data('idpaciente')+"/"+$(this).data('idconsulta');
            else
                warningMessage("No hay receta para imprimir");
        });
		$("#btnRegresar").click(function(){
			window.location.href=BASEURL+"index.php/catalogos/pacientes";
		});



        function fillImages(imagenes){
            var vueltas=imagenes.length;

            $("#imagesContainer").empty();
            if(vueltas>0){
                for(var i=0;i<vueltas;i++){
                    $("#imagesContainer").append('<div class="col-lg-3 col-md-3 col-sm-4 col-xs-6"><img src="<?php echo base_url();?>assets/files/'+imagenes[i].archivo+'" class="rounded mx-auto d-block imgItem" alt="..."></div>');
                }
            }else{

                $("#imagesContainer").append('<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><h4 style="text-align:center;color: #ed7f7f;">SIN IMAGENES POR MOSTRAR</h4></div>');
            }
            $('#imagesContainer ').on('click','img',function(){
               // Get the modal
                var modal = document.getElementById("myModal");

                // Get the image and insert it inside the modal - use its "alt" text as a caption
                
                var modalImg = document.getElementById("img01");
                var captionText = document.getElementById("caption");
                
                  modal.style.display = "block";
                  modalImg.src = $(this).attr('src');
                  captionText.innerHTML = $(this).attr('alt');
                

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() { 
                  modal.style.display = "none";
                }
            })
        }
		function getDetalleHistorial(idConsulta){
      $("#presenteReflejoIz,#ausenteReflejoIzqui,#presenteReflejoDere,#ausenteReflejoDere").prop('checked',false);
      
			$.ajax({
				type:'post',
				url:'<?php echo base_url();?>index.php/catalogos/consultarEmpleado/getHistoDetalle',
				data:'idConsulta='+idConsulta,
				success:function(response){
					var detalle=$.parseJSON(response);
					if(!isEmptyJSON(detalle)){
                        $("#btnImprimir").attr('data-idpaciente',detalle.consulta[0].idPaciente);
                        $("#btnImprimir").attr('data-idconsulta',detalle.consulta[0].id);
                        if(!isEmptyJSON(detalle.images)){
                            fillImages(detalle.images);
                        }else{
                            $("#imagesContainer").append('<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><h4 style="text-align:center;color: #ed7f7f;">SIN IMAGENES POR MOSTRAR</h4></div>');
                        }
						if(!isEmptyJSON(detalle.consulta)){
							$("#exampleModalLabel").html('FOLIO: <b>'+detalle.consulta[0].folio+'</b>'+'<br>HISTORIAL CLINICO DEL '+detalle.consulta[0].fechaRegistro);
							$("#txtPadecimientoH").val(detalle.consulta[0].padeciActual);
							$("#txtAnteOcularesH").val(detalle.consulta[0].anteceOculares);
							$("#txtAntePatoloH").val(detalle.consulta[0].antecePatologi);
							$("#txtMeAlerH").tagsinput('add',detalle.consulta[0].medicamenAlergi);
						}
						if(!isEmptyJSON(detalle.graduacionIzquierda)){
							$("#txtGraduEsfereIzH").val(detalle.graduacionIzquierda[0].esfera);
							$("#txtGraduCilindroIzH").val(detalle.graduacionIzquierda[0].cilindro);
							$("#txtGraduEjeIzH").val(detalle.graduacionIzquierda[0].eje);
							$("#txtAdicionjeIzH").val(detalle.graduacionIzquierda[0].adicion);
						}
						if(!isEmptyJSON(detalle.graduacionDerecha)){
							$("#txtGraduEsferedereH").val(detalle.graduacionDerecha[0].esfera);
							$("#txtGraduCilindrodereH").val(detalle.graduacionDerecha[0].cilindro);
							$("#txtGraduEjedereH").val(detalle.graduacionDerecha[0].eje);
							$("#txtAdicionjedereH").val(detalle.graduacionDerecha[0].adicion);
						}

						/*exploracion oftalmologa izquierda*/
						if(!isEmptyJSON(detalle.exploraOftalIzquierda)){
							$("#txtAgudezaVisuIzH").val(detalle.exploraOftalIzquierda[0].agudezaVisual);
							$("#txtCapaVisualIzH").val(detalle.exploraOftalIzquierda[0].capacidadVisual);
							$("#txtParpaCejaIzH").val(detalle.exploraOftalIzquierda[0].parpadosCejas);
							$("#txtConjuntivaIzH").val(detalle.exploraOftalIzquierda[0].conuntiva);
							$("#txtcorneaIzH").val(detalle.exploraOftalIzquierda[0].cornea);
							$("#txtCamaraAnteriorIzH").val(detalle.exploraOftalIzquierda[0].camaraAnterior);
							$("#txtIrisIzH").val(detalle.exploraOftalIzquierda[0].iris);
							$("#txtCristalinoIzH").val(detalle.exploraOftalIzquierda[0].cristalino);
							$("#txtPresionIntraIzH").val(detalle.exploraOftalIzquierda[0].presionIntraocular);
							$("#txtHumorVitroIzH").val(detalle.exploraOftalIzquierda[0].humorVitreo);
						}
						if(!isEmptyJSON(detalle.refraccionIzquierda)){
							$("#txtRefraEsfereIzH").val(detalle.refraccionIzquierda[0].esfera);
							$("#txtRefraCilindroIzH").val(detalle.refraccionIzquierda[0].cilindro);
							$("#txtRefraEjeIzH").val(detalle.refraccionIzquierda[0].eje);
							$("#txtRefraAdicionjeIzH").val(detalle.refraccionIzquierda[0].adicion);
						}
						if(!isEmptyJSON(detalle.retinosIzquierda)){
							$("#txtRetinosEsfereIzH").val(detalle.retinosIzquierda[0].esfera);
							$("#txtRetinosCilindroIzH").val(detalle.retinosIzquierda[0].cilindro);
							$("#txtRetinosEjeIzH").val(detalle.retinosIzquierda[0].eje);
							$("#txtRetinosAdicionjeIzH").val(detalle.retinosIzquierda[0].adicion);
						}
						/*exploracion oftalmologa derecha*/
						if(!isEmptyJSON(detalle.exploraOftalDerecha)){
							$("#txtAgudezaVisuDereH").val(detalle.exploraOftalDerecha[0].agudezaVisual);
							$("#txtCapaVisualDereH").val(detalle.exploraOftalDerecha[0].capacidadVisual);
							$("#txtParpaCejaDereH").val(detalle.exploraOftalDerecha[0].parpadosCejas);
							$("#txtConjuntivaDereH").val(detalle.exploraOftalDerecha[0].conuntiva);
							$("#txtcorneaDereH").val(detalle.exploraOftalDerecha[0].cornea);
							$("#txtCamaraAnteriorDereH").val(detalle.exploraOftalDerecha[0].camaraAnterior);
							$("#txtIrisDereH").val(detalle.exploraOftalDerecha[0].iris);
							$("#txtCristalinoDereH").val(detalle.exploraOftalDerecha[0].cristalino);
							$("#txtPresionIntraDereH").val(detalle.exploraOftalDerecha[0].presionIntraocular);
							$("#txtHumorVitroDereH").val(detalle.exploraOftalDerecha[0].humorVitreo);
						}

						if(!isEmptyJSON(detalle.refraccionDerecha)){
							$("#txtRefraEsfereDereH").val(detalle.refraccionDerecha[0].esfera);
							$("#txtRefraCilindroDereH").val(detalle.refraccionDerecha[0].cilindro);
							$("#txtRefraEjeDereH").val(detalle.refraccionDerecha[0].eje);
							$("#txtRefraAdicionjeDereH").val(detalle.refraccionDerecha[0].adicion);
						}
						if(!isEmptyJSON(detalle.retinosDerecha)){
							$("#txtRetinosEsfereDereH").val(detalle.retinosDerecha[0].esfera);
							$("#txtRetinosCilindroDereH").val(detalle.retinosDerecha[0].cilindro);
							$("#txtRetinosEjeDereH").val(detalle.retinosDerecha[0].eje);
							$("#txtRetinosAdicionjeDereH").val(detalle.retinosDerecha[0].adicion);
						}
						/*exploracion fodno izquierdo*/

						if(!isEmptyJSON(detalle.exploraFondoIzquierda)){
							$("#txtReflejoFondoIzH").val(detalle.exploraFondoIzquierda[0].reflejoFondo);
							$("#txtExcavacionIzH").val(detalle.exploraFondoIzquierda[0].excavacion);
							$("#txtReflejoRojoIzh").val(detalle.exploraFondoIzquierda[0].reflejoFondoRojo);
							$("#txtPapilaIzh").val(detalle.exploraFondoIzquierda[0].papila);
							$("#txtRetinaIzh").val(detalle.exploraFondoIzquierda[0].retina);
							$("#txtAreaMecularIzh").val(detalle.exploraFondoIzquierda[0].areaMecular);
							$("#txtExploEstuAdiIzh").val(detalle.exploraFondoIzquierda[0].exploestuadiciona);
							$("#txtImpreDiagnoIzh").val(detalle.exploraFondoIzquierda[0].impreDiagno);
							$("#txtPlanSeguimientoIzh").val(detalle.exploraFondoIzquierda[0].planSegui);

              if(detalle.exploraFondoIzquierda[0].presente==1){
                  $("#presenteReflejoIz").prop('checked',true);
              }else if(detalle.exploraFondoIzquierda[0].ausente==1){
                $("#ausenteReflejoIzqui").prop('checked',true);
              }
							//$("#presenteReflejoIzH").val(detalle.exploraFondoIzquierda[0].);
							//$("#ausenteReflejoIzH").val(detalle.exploraFondoIzquierda[0].);
							
							
						}
						if(!isEmptyJSON(detalle.exploraFondoDerecha)){
							$("#txtReflejoFondoDereH").val(detalle.exploraFondoDerecha[0].reflejoFondo);
							$("#txtExcavacionDereH").val(detalle.exploraFondoDerecha[0].excavacion);
							$("#txtReflejoRojoDereH").val(detalle.exploraFondoDerecha[0].reflejoFondoRojo);
							$("#txtPapilaDereH").val(detalle.exploraFondoDerecha[0].papila);
							$("#txtRetinaDereH").val(detalle.exploraFondoDerecha[0].retina);
							$("#txtAreaMecularDereH").val(detalle.exploraFondoDerecha[0].areaMecular);
							$("#txtExploEstuAdiDereH").val(detalle.exploraFondoDerecha[0].exploestuadiciona);
							$("#txtImpreDiagnoDereH").val(detalle.exploraFondoDerecha[0].impreDiagno);
							$("#txtPlanSeguimientoDereH").val(detalle.exploraFondoDerecha[0].planSegui);

              if(detalle.exploraFondoDerecha[0].presente==1){
                  $("#presenteReflejoDere").prop('checked',true);
              }else if(detalle.exploraFondoDerecha[0].ausente==1){
                $("#ausenteReflejoDere").prop('checked',true);
              }
							//$("#presenteReflejoIzH").val(detalle.exploraFondoIzquierda[0].);
							//$("#ausenteReflejoIzH").val(detalle.exploraFondoIzquierda[0].);
							
							
						}

                         if(!isEmptyJSON(detalle.ginescopiaIzquierda)){
                            $('.ojo-uno-izquierdo i').remove();
                            var vueltas=detalle.ginescopiaIzquierda.length;
                            for(var i=0;i<vueltas;i++){
                                img='<i class="ni ni-pin-3 infoOjo" data-index="'+i+'" data-info="'+detalle.ginescopiaIzquierda[i].nota+'" data-toggle="tooltip" data-placement="right" title="'+detalle.ginescopiaIzquierda[i].nota+'" style="top:'+detalle.ginescopiaIzquierda[i].positionTop+'px; left:'+detalle.ginescopiaIzquierda[i].positionLeft+'px;"></i>';
                                $('.ojo-uno-izquierdo').append(img);
                            }

                        }

                        if(!isEmptyJSON(detalle.ginescopiaDerecha)){
                            $('.ojo-uno-derecho i').remove();
                            var vueltas=detalle.ginescopiaDerecha.length;
                            for(var i=0;i<vueltas;i++){
                                img='<i class="ni ni-pin-3 infoOjo" data-index="'+i+'" data-info="'+detalle.ginescopiaDerecha[i].nota+'" data-toggle="tooltip" data-placement="right" title="'+detalle.ginescopiaDerecha[i].nota+'" style="top:'+detalle.ginescopiaDerecha[i].positionTop+'px; left:'+detalle.ginescopiaDerecha[i].positionLeft+'px;"></i>';
                                $('.ojo-uno-derecho').append(img);
                            }

                        }
                        if(!isEmptyJSON(detalle.mecularIzquierda)){
                            $('.ojo-dos-izquierdo i').remove();
                            var vueltas=detalle.mecularIzquierda.length;
                            for(var i=0;i<vueltas;i++){
                                img='<i class="ni ni-pin-3 infoOjo" data-index="'+i+'" data-info="'+detalle.mecularIzquierda[i].nota+'" data-toggle="tooltip" data-placement="right" title="'+detalle.mecularIzquierda[i].nota+'" style="top:'+detalle.mecularIzquierda[i].positionTop+'px; left:'+detalle.mecularIzquierda[i].positionLeft+'px;"></i>';
                                $('.ojo-dos-izquierdo').append(img);
                            }

                        }
                        if(!isEmptyJSON(detalle.mecularIzquierda)){
                            $('.ojo-dos-derecho i').remove();
                            var vueltas=detalle.mecularDerecha.length;
                            for(var i=0;i<vueltas;i++){
                                img='<i class="ni ni-pin-3 infoOjo" data-index="'+i+'" data-info="'+detalle.mecularDerecha[i].nota+'" data-toggle="tooltip" data-placement="right" title="'+detalle.mecularDerecha[i].nota+'" style="top:'+detalle.mecularDerecha[i].positionTop+'px; left:'+detalle.mecularDerecha[i].positionLeft+'px;"></i>';
                                $('.ojo-dos-derecho').append(img);
                            }

                        }
                       
					}
				}
			})
		}
	});
</script>