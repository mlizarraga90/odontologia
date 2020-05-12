<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <h4>CONTROLADOR</h4>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group">
            <label class="form-control-label" for="txtNombreController">NOMBRE CONTROLADOR(ARCHIVO)</label>
            <input type="text" class="form-control" id="txtNombreController" placeholder="NOMBRE CONTROLADOR">
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="treeview w-20 border">
              <h6 class="pt-3 pl-3">GUARDAR EN:</h6>
              <hr>
              <ul class="mb-1 pl-3 pb-2">
                <li>
                    <div class="custom-control custom-radio mb-3">
                        <input type="radio" id="rdbcontrollers" name="rdbController" class="custom-control-input" data-nombre="controllers">
                        <label class="custom-control-label" for="rdbcontrollers"><i class="ni ni-folder-17"></i><span>&nbsp;controllers </span></label>
                    </div>
                    
                    <?php
                    $ul='';
                        if(isset($controllersFolders) && count($controllersFolders)>0){
                            $ul='<ul class="nested">';
                            foreach($controllersFolders as $row){
                                $ul='<li class="inside">
                                    <div class="custom-control custom-radio mb-3">
                                      <input type="radio" id="rdb'.$row.'" name="rdbController" class="custom-control-input" data-nombre="'.$row.'" >
                                      <label class="custom-control-label" for="rdb'.$row.'"><i class="ni ni-folder-17"></i><span>&nbsp;'.$row.'</label>
                                    </div>
                                </li>';
                            }
                        }
                        $ul.='</ul>';
                        echo $ul;
                    ?>
                      
                </li>
               
              </ul>
        </div>
    </div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <h4>MODELO</h4>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group">
            <label class="form-control-label" for="txtNombreModelo">NOMBRE MODELO(ARCHIVO)</label>
            <input type="text" class="form-control" id="txtNombreModelo" placeholder="NOMBRE MODELO">
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="treeview w-20 border">
              <h6 class="pt-3 pl-3">GUARDAR EN:</h6>
              <hr>
              <ul class="mb-1 pl-3 pb-2">
                <li>
                    <div class="custom-control custom-radio mb-3">
                        <input type="radio" id="rdbmodels" name="rdbModelo" class="custom-control-input" data-nombre="models">
                        <label class="custom-control-label" for="rdbmodels"><i class="ni ni-folder-17"></i><span>&nbsp;models </span></label>
                    </div>
                    
                    <?php
                    $ul='';
                        if(isset($modelsFolders) && count($modelsFolders)>0){
                            $ul='<ul class="nested">';
                            foreach($modelsFolders as $row){
                                $ul.='<li class="inside">
                                    <div class="custom-control custom-radio mb-3">
                                      <input type="radio" id="rdb'.$row.'" name="rdbModelo" class="custom-control-input" data-nombre="'.$row.'" >
                                      <label class="custom-control-label" for="rdb'.$row.'"><i class="ni ni-folder-17"></i><span>&nbsp;'.$row.'</label>
                                    </div>
                                </li>';
                            }
                        }
                        $ul.='</ul>';
                        echo $ul;
                    ?>
                      
                </li>
               
              </ul>
        </div>
    </div>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
     <h4>VISTA</h4>
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <div class="form-group">
             <label class="form-control-label" for="txtNombreView">NOMBRE VISTA(ARCHIVO)</label>
             <input type="text" class="form-control" id="txtNombreView" placeholder="NOMBRE VISTA">
         </div>
     </div>
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <div class="form-group">
             <label class="form-control-label" for="txtTituloModulo">TÍTULO MODULO</label>
             <input type="text" class="form-control" id="txtTituloModulo" placeholder="TÍTULO MODULO">
         </div>
     </div>
     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <div class="treeview w-20 border">
               <h6 class="pt-3 pl-3">GUARDAR EN:</h6>
               <hr>
               <ul class="mb-1 pl-3 pb-2">
                 <li>
                     <div class="custom-control custom-radio mb-3">
                         <input type="radio" id="rdbviews" name="rdbView" class="custom-control-input" data-nombre="views">
                         <label class="custom-control-label" for="rdbviews"><i class="ni ni-folder-17"></i><span>&nbsp;views </span></label>
                     </div>
                     
                     <?php
                     $ul='';
                         if(isset($viewsFolders) && count($viewsFolders)>0){
                             $ul='<ul class="nested">';
                             foreach($viewsFolders as $row){
                                 $ul.='<li class="inside">
                                     <div class="custom-control custom-radio mb-3">
                                       <input type="radio" id="rdb'.$row.'" name="rdbView" class="custom-control-input" data-nombre="'.$row.'">
                                       <label class="custom-control-label" for="rdb'.$row.'"><i class="ni ni-folder-17"></i><span>&nbsp;'.$row.'</label>
                                     </div>
                                 </li>';
                             }
                         }
                         $ul.='</ul>';
                         echo $ul;
                     ?>
                       
                 </li>
                
               </ul>
         </div>
     </div>
</div>