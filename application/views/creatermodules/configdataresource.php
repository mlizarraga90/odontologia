<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <p>Selecciona tabla de la base de datos la cúal se alimentara el modulo a crear:</p>        
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-sm-12">
    <div class="treeview w-20 border" >
        <h6 class="pt-3 pl-3">TABLAS DE BASE DE DATOS DISPONIBLES:</h6>
        <hr>
        <ul class="mb-1 pl-3 pb-2" id="treeDataTables">
            <li>
                <?php
                    $ul='';
                    if(isset($dataBaseTables) && count($dataBaseTables)>0){
                        $ul='<ul class="nested">';
                          foreach($dataBaseTables as $row){
                              $ul.='<li class="inside"><div class="custom-control custom-radio mb-3"><input type="radio" id="rdb'.$row->Tables_in_boutique.'" name="dbTableSource" class="custom-control-input tableSource" data-nombre="'.$row->Tables_in_boutique.'"><label class="custom-control-label" for="rdb'.$row->Tables_in_boutique.'"><i class="ni ni-ungroup"></i><span>&nbsp;'.$row->Tables_in_boutique.'</label></div></li>';
                          }
                    }
                    $ul.='</ul>';
                    echo $ul;
                ?>                                                              
            </li>                                           
        </ul>
    </div>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-sm-12">
    <div class="treeview w-20 border" >
          <h6 class="pt-3 pl-3" id="infoDataTable">TABLAS DE BASE DE DATOS DISPONIBLES:</h6>
          <hr>
          <ul class="mb-1 pl-3 pb-2" id="treeDataTableFields"></ul>
    </div>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 col-sm-12">
    <div class="treeview w-20 border" >
          <h6 class="pt-3 pl-3" id="infoDataTable">CAMPOS VISIBLES EN LA TABLA:</h6>
          <hr>
          <ul class="mb-1 pl-3 pb-2" id="visibleTbaleFields"></ul>
    </div>
</div>