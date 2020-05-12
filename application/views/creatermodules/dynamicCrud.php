
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link href="/assets/img/brand/favicon.png" rel="icon" type="image/png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <link href="/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- Argon CSS -->
    <link type="text/css" href="<?php echo base_url();?>assets/css/argon.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/nucleo.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bouqitue.css">

    <!--DATA TABLES-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <!--DATA TABLES-->

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/fonts.css">
    <style>
        ul li{list-style:none;}
        .inside{padding-left: 15px;}
        #treeDataTables,#visibleTbaleFields,#treeDataTableFields{position: relative;max-height: 450px;overflow: auto;}
        form{width: 100%;}
    </style>
    
</head>
<body>
    <div class="main-content" id="panelAgenaAdmin">
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row">
            <div class="col-xl-12 col-lg-12"><h1 class="text-white text-uppercase">CONFIGURACIÓN MODULO</h1></div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7">
        <div class="col-xl-12 mb-12 mb-xl-12">
            <div class="card card-calendar">
                <div class="card-header">
                    <div class="card-body p-0">
                        <!--TABLA -->
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <h5 class="mb-0">CONFIGURACIÓN GENERAL</h5>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="row"><?php $this->load->view('creatermodules/generalconfigmmodule')?></div>
                                </div>
                          </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <h5 class="mb-0">BASE DE DATOS</h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="row">
                                            <?php $this->load->view('creatermodules/configdataresource');?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <h5 class="mb-0">CONFIGURACIÓN DATATABLE</h5>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="row">
                                            <?php $this->load->view('creatermodules/configformelements');?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <button type="button" class="btn btn-success" id="btnCrearModulo">CREAR CATALOGO</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="dlgFormElementConfig" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmCrud">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">LABEL</label>
                        <input class="form-control" type="text" placeholder="LABEL" id="label" name="label">
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">ID</label>
                        <input class="form-control" type="text" placeholder="ID" id="id" name="id">
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">NAME</label>
                        <input class="form-control" type="text" placeholder="NAME" id="name" name="placeholder">
                    </div>
                </div>
              
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">PLACEHOLDER</label>
                        <input class="form-control" type="text" placeholder="PLACEHOLDER" id="placeholder" name="placeholder">
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="form-group">
                        <label for="example-text-input" class="form-control-label">COLS CONTAINER</label>
                        <input class="form-control" type="text" placeholder="COLS CONTAINER" id="classcontainer" name="classcontainer">
                    </div>
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnsaveconfigelemnt">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!--FOOTER-->
<!--<div class="blockScreen">
    <img src="<?php echo base_url();?>/assets/img/loadgif.gif" class="loadGif">
</div>-->

<script src="<?php echo base_url();?>assets/js/jquery3.4.1.min.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.dataTables.js"></script>

<!--DATA TABLE-->
<script src="<?php echo base_url();?>assets/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>assets/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/js/dataTables.select.min.js"></script>
<!--DATA TABLE-->

<script src="<?php echo base_url();?>assets/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>assets/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>assets/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url();?>assets/js/buttons.print.min.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap-notify.min.js"  ></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"  ></script>

<script src="<?php echo base_url();?>assets/js/dinamycForms.js"></script>

</body>
</html>
<script>
    $(document).ready(function(){
        var formulario=frm.setId("frmCrud"),
        infoModulo={
            controller:{
                nombre:'',
                url:''
            },
            view:{
                nombre:'',
                titulo:'',
                url:''
            },
            form:{
                id:'',
                elements:''
            },
            modelName:'',
            dataBaseTable:'',
            dataBaseFieds:[],
            dataTableFields:[],
        };
        $("#treeDataTables").on('click','.tableSource',function(){
            if( $(this).prop('checked') )
                getFieldsTable($(this).data('nombre'));
        });
        $("#btnAgregar").click(function(){
            if($("#txtIdFormulario").val()!=""){
                if( $("#"+$("#txtIdFormulario").val()).length==0 )
                    $("#formElementsContainer").append('<form id="'+$("#txtIdFormulario").val()+'"></form>');

                $("#dlgFormElementConfig").modal('show');
            }
           
        });
        $("#btnsaveconfigelemnt").click(function(){
            createElement();
        });
        $("#btnCrearModulo").click(function(){
            infoModulo.controller.name=$("#txtNombreController").val();
            infoModulo.controller.url=$("input[name='rdbController']").data('nombre');
            infoModulo.view.name=$("#txtNombreView").val();
            infoModulo.view.url=$("input[name='rdbView']").data('nombre');
            infoModulo.view.titulo=$("#txtTituloModulo").val();
            infoModulo.modelName=$("#txtNombreModelo").val();
            infoModulo.dataBaseTable=$("input[name='dbTableSource']").data('nombre');
            infoModulo.form.id=$("#txtIdFormulario").val();
            infoModulo.form.elements=$("#"+$("#txtIdFormulario").val())[0].innerHTML;
            getBaseFieds();
            getdataTableFields();
            $.ajax({
                type:'post',
                url:'<?php echo base_url();?>index.php/dynamiccrud/createModule',
                data:'info='+JSON.stringify(infoModulo),
                success:function(response){

                }
            })

        });
        function getBaseFieds(){
            $("#treeDataTableFields").find('input[type="checkbox"]').each(function(){
                if($(this).prop('checked'))
                    infoModulo.dataBaseFieds.push($(this).data('nombre'));
            }); 
            
        }
        function getdataTableFields(){
            $("#visibleTbaleFields").find('input[type="checkbox"]').each(function(){
                if($(this).prop('checked'))
                    infoModulo.dataTableFields.push($(this).data('nombre'));
            }); 
            
        }
        function createElement(){
            var element=$("#cmdTipoElemento").val(),
            type=(element==1)?'text':(element==4)?'password':(element==5)?'email':(element==6)?'hidden':'';

            switch(element){
                case '1':
                    case '4':
                        case '5':
                             case '6':
                    $("#"+$("#txtIdFormulario").val()).append('<div class="'+$("#classcontainer").val()+'"><label for="'+$("#id").val()+'" class="form-control-label">'+$("#label").val()+'</label><input type="'+type+'" class="form-control form-control-sm" placeholder="'+$("#placeholder").val()+'" id="'+$("#id").val()+'" name="'+$("#name").val()+'" /></div>');
                break;
                case '2':
                    return 
                break;
                case '3':
                    return 
                break;
                case '7':
                   $("#"+$("#txtIdFormulario").val()).append('<div class="'+$("#classcontainer").val()+'"><label for="'+$("#id").val()+'" class="form-control-label">'+$("#label").val()+'</label><textarea class="form-control form-control-sm" placeholder="'+$("#placeholder").val()+'" id="'+$("#id").val()+'" name="'+$("#name").val()+'" rows="3" resize="none"></textarea> </div>');
                break;
            }
        }
        
        function getFieldsTable(table){
            $("#infoDataTable").html('CAMPOS DE LA TABLA <b>'+table.toUpperCase()+'</b> DISPONIBLES');
            $.ajax({
                type:'post',
                url:'<?php echo base_url();?>index.php/dynamiccrud/getFieldsTable',
                data:'table='+table,
                success:function(response){
                    var fields=$.parseJSON(response);
                    $("#treeDataTableFields li,#visibleTbaleFields li").remove();
                    if(!isEmptyJSON(fields)){
                        var vueltas=fields.length;
                        for(var i=0;i<vueltas;i++){
                            $("#visibleTbaleFields").append('<li> <div class="custom-control custom-checkbox"><input type="checkbox" id="rdbVisibleFields'+fields[i].Field+'" name="chktblFiledsV" class="custom-control-input chkVisibleTableFields" data-nombre="'+fields[i].Field+'"><label class="custom-control-label" for="rdbVisibleFields'+fields[i].Field+'"><i class="ni ni-folder-17"></i><span>&nbsp;'+fields[i].Field+'</label></div></li>');

                            $("#treeDataTableFields").append('<li> <div class="custom-control custom-checkbox"><input type="checkbox" id="rdb'+fields[i].Field+'" name="chkDataTable" class="custom-control-input chkFieldsTable" data-nombre="'+fields[i].Field+'"><label class="custom-control-label" for="rdb'+fields[i].Field+'"><i class="ni ni-folder-17"></i><span>&nbsp;'+fields[i].Field+'</label></div></li>');
                        }
                    }
                }
            })
        }
    });
</script>