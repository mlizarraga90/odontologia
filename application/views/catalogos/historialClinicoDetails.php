



<div class="modal fade" id="dlgHistorial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">HISTORIAL CLINICO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
        
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="accordion" id="dlgAcordion">
                        <div class="card">
                            <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#TABiNTERROGATORIO" aria-expanded="true" aria-controls="TABiNTERROGATORIO">
                                <h5 class="mb-0">INTERROGATORIO</h5>
                            </div>
                            <div id="TABiNTERROGATORIO" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
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
                            <div id="tabExploOftal" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
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
                                                        <h5 >Ginioscopia</h5>
                                                    </div><br>
                                                    <div class="ojo ojo-uno-izquierdo">
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
                                                        <h5>Ginioscopia</h5>
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
                        <!---->
                        <div class="card">
                            <div class="card-header" id="headingThree" data-toggle="collapse" data-target="#tabExploFondo" aria-expanded="false" aria-controls="tabExploFondo">
                                <h5 class="mb-0">EXPLORACIÓN DE FONDO DE OJO</h5>
                            </div>
                            <div id="tabExploFondo" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
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
                                                      <input type="radio" id="presenteReflejoDere2" name="reflejoDe" class="custom-control-input" value="1">
                                                      <label class="custom-control-label" for="presenteReflejoDere">Presente</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                      <input type="radio" id="ausenteReflejoDere2" name="reflejoDe" class="custom-control-input" value="2">
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
                                                    <label for="txtAreaMecularIz" class="form-control-label">Área macular</label>
                                                    <textarea class="form-control" placeholder="Area macular" id="txtAreaMecularDereH" name="areaMecularDere"  rows="3"></textarea>
                                                </div>
                                                <!--FALTA HACER EL OJO AQUI #2-->
                                                <div class="col-lg-6 col-md-6 col-sm-2 col-xs-12">
                                                    <div class="ojo ojo-dos-izquierdo" >
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
                                                      <input type="radio" id="presenteReflejoIz2" name="reflejoIz" class="custom-control-input" value="3">
                                                      <label class="custom-control-label" for="presenteReflejoIz">Presente</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                      <input type="radio" id="ausenteReflejoIzqui2" name="reflejoIz" class="custom-control-input"  value="4">
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
                                                    <label for="txtAreaMecularIz" class="form-control-label">Área macular</label>
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
                        <div class="card" id="tabNotass">
                            <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapsNotes" aria-expanded="false" aria-controls="collapsNotes">
                                <h5 class="mb-0">NOTAS</h5>
                            </div>
                            <div id="collapsNotes" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="txtPadecimiento" class="form-control-label">Impresión diagnóstica</label>
                                            <input type="text" class="form-control form-control-sm" placeholder="Impresión diagnóstica" id="txtImprecion2" name="">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="txtPadecimiento" class="form-control-label">Tratamiento</label>
                                            <textarea class="form-control" placeholder="Tratamiento" id="txtTratamiento2" name=""  rows="15"></textarea>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <label for="txtPadecimiento" class="form-control-label">Plan</label>
                                            <textarea class="form-control" placeholder="Plan" id="txtPlan2" name=""  rows="15"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="tagImages2" data-toggle="collapse" data-target="#tabImages2" aria-expanded="false" aria-controls="tabImages2">
                                <h5 class="mb-0">IMAGENES</h5>
                            </div>
                            <div id="tabImages" class="collapse show" aria-labelledby="tagImages2" data-parent="#tabImages2">
                                <div class="card-body">
                                    <div class="row">

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="imagesContainer2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">CERRAR</button>
            <button type="button" class="btn btn-primary" id="btnPrevious" data-index /> <i class="fa fa-angle-left"></i> ANTERIOR </button>
            <button type="button" class="btn btn-primary" id="btnNext" data-index />SIGUIENTE <i class="fa fa-angle-right"></i></button>
          </div>
        </div>
    </div>
</div>
<a id="verimagenes" class='fresco' data-fresco-group='grupo'></a> 

<div id="myModall" class="modal">
  <span class="close">&times;</span>
  <img class="modall-content" id="img01">
  <div id="caption"></div>
</div>