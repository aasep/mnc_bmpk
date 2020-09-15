<?php
$module=$_GET['module'];
$pm=$_GET['pm'];
$page_tmp = $_SERVER['PHP_SELF']."?module=$module&pm=$pm";
$page=str_replace(".php","",$page_tmp);

###########################################################

?>


<div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        
                        <div class="m-heading-1 border-green m-bordered">
                                     <h1> <i class="fa fa-home"></i> Dashboard </h1> 

                                     <p> Dashboard Information </p>
                                        <!-- <a class="btn red btn-outline" href="http://jqueryvalidation.org"
                                            target="_blank">the official documentation</a> -->
                                    
                                </div>
                        <!-- Sidebar Toggle Button -->
                       
                        <!-- Sidebar Toggle Button -->
                    </div>
                   
                    <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered dashboard-stat dark">
                                <h4 class="widget-thumb-heading">Modal Inti Bank</h4>
                                <div class="widget-thumb-wrap">
                                    
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle"><button class="btn dark"> <i class="icon-fire font-yellow"></i> <span class="text-uppercase title bold font-yellow"><?php echo "IDR ". number_format(JmlModalInti(),2,".",",");?> </span> </button></span>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                    </div>
                    
                    
                    <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered dashboard-stat dark">
                                <h4 class="widget-thumb-heading">Modal Pelengkap</h4>
                                <div class="widget-thumb-wrap">
                                    
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle"><button class="btn dark"> <i class="icon-fire font-yellow"></i> <span class="text-uppercase title bold font-yellow"> <?php echo "IDR ".number_format(JmlModalPelengkap(),2,".",",");?> </span> </button></span>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                    </div>
                 
                  
                    <div class="col-md-6">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered dashboard-stat dark">
                                <h4 class="widget-thumb-heading">Prosentase Modal</h4>
                                <div class="widget-thumb-wrap">
                                    
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle"><button class="btn dark"> <i class="icon-fire font-yellow"></i> <span class="text-uppercase title bold font-yellow"> Pihak Terkait : </span> </button></span>
                                        <span class="widget-thumb-subtitle"><button class="btn dark"> <i class="icon-fire font-yellow"></i> <span class="text-uppercase title bold font-yellow"> Pihak Tidak Terkait Kelompok Peminjam : </span> </button></span>
                                        <span class="widget-thumb-subtitle"><button class="btn dark"> <i class="icon-fire font-yellow"></i> <span class="text-uppercase title bold font-yellow"> Pihak Tidak Terkait Bukan Kelompok Peminjam : </span> </button></span>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                    </div>
                   
<!--                     <div class="col-md-3">
                           
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                <h4 class="widget-thumb-heading">Weekly Sales</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-red icon-layers"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">USD</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="1,293">1,293</span>
                                    </div>
                                </div>
                            </div>
                           
                        </div> -->


                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat blue">
                                <div class="visual">
                                    <i class="fa fa-group"></i>
                                </div>
                                <div class="details">
                                    <div class="number bold">
                                        <span data-counter="counterup" data-value="1349"><?php echo JmlPihakTerkait(); ?></span>
                                    </div>
                                    <div class="desc bold"> Pihak Terkait </div>
                                </div>
                                <a class="more bold" data-toggle="modal" data-target='#general_pt'> Detail Pihak Terkait <i class="m-icon-swapright m-icon-white"></i> </a>
                                <!-- <a class="more bold" data-toggle="modal" href="#basic"> Detail Pihak Terkait <i class="m-icon-swapright m-icon-white"></i> </a> -->
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat red">
                                <div class="visual">
                                    <i class="fa fa-cogs"></i>
                                </div>
                                <div class="details">
                                    <div class="number bold">
                                        <span data-counter="counterup" data-value="12,5"><?php echo JmlPihakTdkTerkait(); ?></span></div>
                                    <div class="desc bold"> Pihak Tidak Terkait Group </div>
                                </div>
                                <a class="more bold" data-toggle="modal" data-target='#pttgroupname' > Detail Pihak Tidak Terkait Group
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat green">
                                <div class="visual">
                                    <i class="fa fa-recycle"></i>
                                </div>
                                <div class="details">
                                    <div class="number bold">
                                        <span data-counter="counterup" data-value="549"><?php echo JmlPihakTdkTerkaitNg(); ?></span>
                                    </div>
                                    <div class="desc bold"> Pihak Tidak Terkait Individu  </div>
                                </div>
                                <a class="more bold" data-toggle="modal" data-target='#pttngroup' > Detail Pihak Tidak Terkait Non Group
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="dashboard-stat purple">
                                <div class="visual">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <div class="details">
                                    <div class="number bold"> 
                                        <span data-counter="counterup" data-value="89">890000</div>
                                    <div class="desc bold"> Credit Card </div>
                                </div>
                                <a class="more bold" href="javascript:;"> View more
                                    <i class="m-icon-swapright m-icon-white"></i>
                                </a>
                            </div>
                        </div>
                    </div>



                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->

                    <!-- END SIDEBAR CONTENT LAYOUT -->
                
    </div>


<!-- modal General Info Pihak Terkait -->   
        <div class="modal fade" id="general_pt" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog-lg">
                <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title"></h4>
                            </div>
                    <div class="modal-body">

                        <div class="portlet light portlet-fit portlet-form bordered">

                        <div class="portlet-body">
                            <!-- BEGIN FORM-->
                                                    <!--  portlet box grey-gallery -->
                        <div class="portlet light grey-steel bordered ">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-equalizer font-red-sunglo"></i>
                                            <span class="caption-subject font-red-sunglo bold uppercase"> Pihak Terkait </span>
                                            <span class="caption-helper"> </span>
                                        </div>
                                        <a class="more bold" data-toggle="modal" href="#basic"> Detail Pihak Terkait <i class="m-icon-swapright m-icon-white"></i> </a>
                                        <div class="actions">
                                            
                                        </div>
                                    </div>
                    <div class="row">
                    <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered dashboard-stat dark">
                                <h4 class="widget-thumb-heading">Modal Inti Bank</h4>
                                <div class="widget-thumb-wrap">
                                    
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle"><button class="btn dark"> <i class="icon-fire font-yellow"></i> <span class="text-uppercase title bold font-yellow">IDR 1,111,974,000,002.00 </span> </button></span>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                    </div>
                   
 
                    <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered dashboard-stat dark">
                                <h4 class="widget-thumb-heading">Modal Pelengkap</h4>
                                <div class="widget-thumb-wrap">
                                    
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle"><button class="btn dark"> <i class="icon-fire font-yellow"></i> <span class="text-uppercase title bold font-yellow"> IDR 90,000,000.00 </span> </button></span>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                    </div>              
                    <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered dashboard-stat dark">
                                <h4 class="widget-thumb-heading">Total Plafon</h4>
                                <div class="widget-thumb-wrap">
                                    
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle"><button class="btn dark"> <i class="icon-fire font-yellow"></i> <span class="text-uppercase title bold font-yellow">IDR 1,111,974,000,002.00 </span> </button></span>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                    </div>
                   
 
                    <div class="col-md-3">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered dashboard-stat dark">
                                <h4 class="widget-thumb-heading">Total Ouststanding</h4>
                                <div class="widget-thumb-wrap">
                                    
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle"><button class="btn dark"> <i class="icon-fire font-yellow"></i> <span class="text-uppercase title bold font-yellow"> IDR 90,000,000.00 </span> </button></span>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                    </div>  
                </div>

                    </div>
                            <!-- END FORM-->
                        </div>
                        <!-- END VALIDATION STATES-->
                        </div>   

                    </div>
                                                            <div class="modal-footer">
                                                                
                                                                <button type="button" class="btn dark btn-outline bold" data-dismiss="modal"> Close </button>
                                                            </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

<!-- end modal General Info Pihak Terkait -->   




<!-- modal List Pihak Terkait -->   
        <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog-lg">
                <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title"></h4>
                            </div>
                    <div class="modal-body">

                        <div class="portlet light portlet-fit portlet-form bordered">
                                <!-- <div class="portlet-title">
                                        <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">ADD <?=getNamaMenu($module);?> </span>
                                        </div>       
                                </div> -->
                        <div class="portlet-body">
                            <!-- BEGIN FORM-->
                                                    <!--  portlet box grey-gallery -->
                        <div class="portlet light grey-steel bordered ">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-equalizer font-red-sunglo"></i>
                                            <span class="caption-subject font-red-sunglo bold uppercase"> Pihak Terkait </span>
                                            <span class="caption-helper"> </span>
                                        </div>
                                        <div class="actions">
                                            
                                        </div>
                                    </div>

                        <div class="portlet-body form">
                        
                            
                            <table class="table table-striped table-bordered table-hover" id="sample_2">
                            <thead>
                            <tr>
                                <th><b>No</b></th>
                                <th><b>Pihak Terkait</b></th>
                                <th><b>Group</b></th>
                                <th><b>Plafon</b></th>
                                <th><b>Outstanding</b></th>
                                <!-- <th><b>Modified By </b></th> -->
                                <th><b>Action</b></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            $query =" select * from pihak_terkait order by cpgdes asc ";
                            //echo $query;
                            $RS2  = $db->Execute($query);
                           
                            while(!$RS2->EOF){
/*                                 if ($RS2->fields['status']=='1'){
                                    $status=" <a href='#' class='btn green' disabled> <b> <i class='fa fa-check-square'> </i> Active </b></a> ";
                                 } else { $status=" <a href='#' class='btn red' disabled> <b> <i class='fa fa-warning'> </i> Pending </b></a> "; }
                             //$currency =" "; 
                            switch (strtoupper($RS2->fields['kode_kurs'])) {
                                case 'AUD':
                                case 'SGD':
                                case 'HKD':
                                case 'USD':
                                    $currency ="<i class='fa fa-usd'> </i>";
                                    break;
                                case 'EUR':
                                    $currency ="<i class='fa fa-eur'> </i>";
                                    break;
                                case 'CNY':
                                    $currency ="<i class='fa fa-cny'> </i>";
                                    break;
                                case 'JPY':
                                     $currency ="<i class='fa fa-jpy'> </i>";
                                    break;
                                default:
                                     $currency =" ";
                                    break;
                            }*/
                            $group     = ($RS2->fields['cpgdes']!="" && $RS2->fields['cpgdes'] != NULL) ? $RS2->fields['cpgdes'] : " - ";


                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td> <b> $currency ".$RS2->fields['cfsnme']." </b></td>";
                            echo "<td><b> ".$group." </b></td>";
                            echo "<td align='right'><a href='#' class='btn default' disabled> <b>".number_format($RS2->fields['cpplaf'],2,".",",")."</b></a></td>";
                            echo "<td align='right'><a href='#' class='btn default' disabled> <b>".number_format($RS2->fields['cpouts'],2,".",",")."</b></a></td>";
                            echo "<td>  <b>  <button class='btn default'><b> <i class='fa fa-user-secret'> </i> Detail</b></button> </b> </td>";
/*                            echo "<td><a class='detailEdit' data-toggle='modal' data-target='#view-edit' href='#' id-id_kurs='".$RS2->fields['id_kurs']."'   id-kode_kurs='".$RS2->fields['kode_kurs']."' 
 id-status='".trim($RS2->fields['status'])."'   id-nominal='".$RS2->fields['nominal']."' ><button class='btn default'><b>Edit</b></button></a></a> <a href='#'  data-toggle='modal' id-id_kurs='".$RS2->fields['id_kurs']."'   id-kode_kurs='".$RS2->fields['kode_kurs']."' 
 id-status='".trim($RS2->fields['status'])."'   id-nominal='".$RS2->fields['nominal']."' data-target='#delete-modal' class='detailDelete' > <button class='btn red'><b>Delete</b></button></a></td>";*/
                            echo "</tr>";
                            $i++;
                            $RS2->MoveNext();
                                    }
                            ?>


                            </tbody>
                            </table>
                        </div>
                    </div>
                            <!-- END FORM-->
                        </div>
                        <!-- END VALIDATION STATES-->
                        </div>   

                    </div>
                                                            <div class="modal-footer">
                                                                
                                                                <button type="button" class="btn dark btn-outline bold" data-dismiss="modal"> Close </button>
                                                            </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

<!-- end modal pihak tidak  --> 


<!-- modal pihak tidak terkait nama group -->   
        <div class="modal fade" id="pttgroupname" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title"></h4>
                            </div>
                    <div class="modal-body">

                        <div class="portlet light portlet-fit portlet-form bordered">
                                <!-- <div class="portlet-title">
                                        <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">ADD <?=getNamaMenu($module);?> </span>
                                        </div>       
                                </div> -->
                        <div class="portlet-body">
                            <!-- BEGIN FORM-->
                                                    <!--  portlet box grey-gallery -->
                        <div class="portlet light grey-steel bordered ">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-equalizer font-red-sunglo"></i>
                                            <span class="caption-subject font-red-sunglo bold uppercase"> Pihak Tidak Terkait Group </span>
                                            <span class="caption-helper"> </span>
                                        </div>
                                        <div class="actions">
                                            
                                        </div>
                                    </div>

                        <div class="portlet-body form">
                        
                            
                            <table class="table table-striped table-bordered table-hover" id="sample_1" width="100%">
                            <thead>
                            <tr>
                                <th width="5%"><b>No</b></th>
                                <th width="40%"><b>Nama Group </b></th>
                                <th width="5%" align="right"><b>Jumlah </b></th>
                                <th width="50%"><b>Action</b></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            $query =" select count(cfcif) as jmlg ,cpgdes from pihak_tdk_terkait group by cpgdes order by cpgdes asc ";
                            //echo $query;
                            $RS2  = $db->Execute($query);
                           
                            while(!$RS2->EOF){

                            $group     = ($RS2->fields['cpgdes']!="" && $RS2->fields['cpgdes'] != NULL) ? $RS2->fields['cpgdes'] : " - ";

                            echo "<tr>";
                            echo "<td width='5%'><b>$i</b></td>";
                            echo "<td width='40%'><button class='btn red'> <b> <i class='fa fa-tags'></i> ".$group."</b> </button> </td>";
                            echo "<td width='5%' align='right'><button type='button' class='btn btn-circle green'><b> ".$RS2->fields['jmlg']." </b> </button></td>";
                            echo "<td width='50%'><a href='?pttg=".urlencode($group)."&idx=2'  <b>  <button class='btn default'><b> <i class='fa fa-user-secret'> </i> Detail</b></button> </b> </a></td>";
/*                            echo "<td><a class='detailEdit' data-toggle='modal' data-target='#view-edit' href='#' id-id_kurs='".$RS2->fields['id_kurs']."'   id-kode_kurs='".$RS2->fields['kode_kurs']."' 
 id-status='".trim($RS2->fields['status'])."'   id-nominal='".$RS2->fields['nominal']."' ><button class='btn default'><b>Edit</b></button></a></a> <a href='#'  data-toggle='modal' id-id_kurs='".$RS2->fields['id_kurs']."'   id-kode_kurs='".$RS2->fields['kode_kurs']."' 
 id-status='".trim($RS2->fields['status'])."'   id-nominal='".$RS2->fields['nominal']."' data-target='#delete-modal' class='detailDelete' > <button class='btn red'><b>Delete</b></button></a></td>";*/
                            echo "</tr>";
                            $i++;
                            $RS2->MoveNext();
                                    }
                            ?>


                            </tbody>
                            </table>
                        </div>
                    </div>
                            <!-- END FORM-->
                        </div>
                        <!-- END VALIDATION STATES-->
                        </div>   

                    </div>
                                                            <div class="modal-footer">
                                                                
                                                                <button type="button" class="btn dark btn-outline bold" data-dismiss="modal"> Close </button>
                                                            </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>





<!-- modal pihak tidak terkait individu -->   
        <div class="modal fade" id="pttngroup" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title"></h4>
                            </div>
                    <div class="modal-body">

                        <div class="portlet light portlet-fit portlet-form bordered">
                                <!-- <div class="portlet-title">
                                        <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">ADD <?=getNamaMenu($module);?> </span>
                                        </div>       
                                </div> -->
                        <div class="portlet-body">
                            <!-- BEGIN FORM-->
                                                    <!--  portlet box grey-gallery -->
                        <div class="portlet light grey-steel bordered ">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-equalizer font-red-sunglo"></i>
                                            <span class="caption-subject font-red-sunglo bold uppercase"> Pihak Tidak Terkait Non Group </span>
                                            <span class="caption-helper"> </span>
                                        </div>
                                        <div class="actions">
                                            
                                        </div>
                                    </div>

                        <div class="portlet-body form">
                        
                            
                            <table class="table table-striped table-bordered table-hover" id="sample_1" width="100%">
                            <thead>
                            <tr>
                                <th width="5%"><b>No</b></th>
                                <th width="40%"><b>Nama Group </b></th>
                                <th width="5%" align="right"><b>Jumlah </b></th>
                                <th width="50%"><b>Action</b></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            $query =" select count(cfcif) as jmlg ,cpgdes from pihak_tdk_terkait group by cpgdes order by cpgdes asc ";
                            //echo $query;
                            $RS2  = $db->Execute($query);
                           
                            while(!$RS2->EOF){

                            $group     = ($RS2->fields['cpgdes']!="" && $RS2->fields['cpgdes'] != NULL) ? $RS2->fields['cpgdes'] : " - ";

                            echo "<tr>";
                            echo "<td width='5%'><b>$i</b></td>";
                            echo "<td width='40%'><button class='btn red'> <b> <i class='fa fa-tags'></i> ".$group."</b> </button> </td>";
                            echo "<td width='5%' align='right'><button type='button' class='btn btn-circle green'><b> ".$RS2->fields['jmlg']." </b> </button></td>";
                            echo "<td width='50%'><a href='?pttg=".urlencode($group)."&idx=2'  <b>  <button class='btn default'><b> <i class='fa fa-user-secret'> </i> Detail</b></button> </b> </a></td>";
/*                            echo "<td><a class='detailEdit' data-toggle='modal' data-target='#view-edit' href='#' id-id_kurs='".$RS2->fields['id_kurs']."'   id-kode_kurs='".$RS2->fields['kode_kurs']."' 
 id-status='".trim($RS2->fields['status'])."'   id-nominal='".$RS2->fields['nominal']."' ><button class='btn default'><b>Edit</b></button></a></a> <a href='#'  data-toggle='modal' id-id_kurs='".$RS2->fields['id_kurs']."'   id-kode_kurs='".$RS2->fields['kode_kurs']."' 
 id-status='".trim($RS2->fields['status'])."'   id-nominal='".$RS2->fields['nominal']."' data-target='#delete-modal' class='detailDelete' > <button class='btn red'><b>Delete</b></button></a></td>";*/
                            echo "</tr>";
                            $i++;
                            $RS2->MoveNext();
                                    }
                            ?>


                            </tbody>
                            </table>
                        </div>
                    </div>
                            <!-- END FORM-->
                        </div>
                        <!-- END VALIDATION STATES-->
                        </div>   

                    </div>
                                                            <div class="modal-footer">
                                                                
                                                                <button type="button" class="btn dark btn-outline bold" data-dismiss="modal"> Close </button>
                                                            </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>






















<?php  if (isset($_GET['idx']) && $_GET['idx']=='2' ) { ?>

<!-- modal pihak tidak terkait group detail group -->   
        <div class="modal show" id="pttg" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog-lg">
                <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title"></h4>
                            </div>
                    <div class="modal-body">

                        <div class="portlet light portlet-fit portlet-form bordered">
                                <!-- <div class="portlet-title">
                                        <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">ADD <?=getNamaMenu($module);?> </span>
                                        </div>       
                                </div> -->
                        <div class="portlet-body">
                            <!-- BEGIN FORM-->
                                                    <!--  portlet box grey-gallery -->
                        <div class="portlet light grey-steel bordered ">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-equalizer font-red-sunglo"></i>
                                            <span class="caption-subject font-red-sunglo bold uppercase"> Pihak Tidak Terkait Group </span>
                                            <span class="caption-helper"> </span>
                                        </div>
                                        <div class="actions">
                                            
                                        </div>
                                    </div>

                        <div class="portlet-body form">
                        
                            
                            <table class="table table-striped table-bordered table-hover" id="sample_3">
                            <thead>
                            <tr>
                                <th><b>No</b></th>
                                <th><b>Pihak Terkait</b></th>
                                <th><b>Group</b></th>
                                <th><b>Type</b></th>
                                <th><b>Plafon</b></th>
                                <th><b>Outstanding</b></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            $query =" select * from pihak_tdk_terkait where cpgdes='".urldecode($_GET['pttg'])."'  order by cpgdes asc ";
                            //echo $query;
                            $RS2  = $db->Execute($query);
                           
                            while(!$RS2->EOF){

                            $group     = ($RS2->fields['cpgdes']!="" && $RS2->fields['cpgdes'] != NULL) ? $RS2->fields['cpgdes'] : " - ";

                            $status= ($RS2->fields['status']=="CASA") ? "btn green" :"btn red";

                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td> <b> $currency ".$RS2->fields['cfsnme']."</b></td>";
                            echo "<td><b> ".$group." </b></td>";
                            echo "<td><b> ". " <a href='#' class='$status' disabled ><b>".$RS2->fields['status']."</b></a> </b></td>";
                            echo "<td align='right'><a href='#' class='btn default' disabled> <b>".number_format($RS2->fields['cpplaf'],2,".",",")."</b></a></td>";
                            echo "<td align='right'><a href='#' class='btn default' disabled> <b>".number_format($RS2->fields['cpouts'],2,".",",")."</b></a></td>";
                            
                            echo "</tr>";
                            $i++;
                            $RS2->MoveNext();
                                    }
                            ?>


                            </tbody>
                            </table>
                        </div>
                    </div>
                            <!-- END FORM-->
                        </div>
                        <!-- END VALIDATION STATES-->
                        </div>   

                    </div>
                                                            <div class="modal-footer">
                                                                
                                                                <a href="home"><button type="button" class="btn dark btn-outline bold" data-dismiss="modal"> Back To Home </button></a>
                                                            </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

<?php }  ?>
               <!--  <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script> -->