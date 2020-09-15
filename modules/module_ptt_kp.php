<?php
$module=$_GET['module'];
$pm=$_GET['pm'];
$page_tmp = $_SERVER['PHP_SELF']."?module=$module&pm=$pm";
$page=str_replace(".php","",$page_tmp);

###########################################################
if (isset($_GET['iDisplayStart']) && ($_GET['iDisplayStart'] !='0')  ) {
    $displayStart=$_GET['iDisplayStart'];
} else {
    $displayStart=0;
}

?>

<div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        <!-- <div class="note note-success"> -->
                        <div class="m-heading-1 border-green m-bordered">
                                     <h1> <i class="icon-settings"></i> <?php echo getParentMenuName(getParentMenu($module));?>   <i class="fa fa-angle-right"></i> <?=getNamaMenu($module);?> </h1> 

                                                    <p>Detail Information for " <?=getNamaMenu($module);?> "</p>
                                                </div>

                                    
                        </div>

                    <!-- </div> -->

 <?php
    if (isset($_GET['message']) && ($_GET['message']=="success")){
        echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong> Anda Berhasil Menginput Nilai....! </strong> </div>";
     }
    if (isset($_GET['message']) && ($_GET['message']=="error")){
        echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong> Anda Gagal Menginput Nilai....!</strong> </div>";
    }
    if (isset($_GET['message']) && ($_GET['message']=="error1")){
        echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong> Data Tidak ditemukan ...!</strong> </div>";
    }
    if (isset($_GET['message']) && ($_GET['message']=="success2")){
        echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong> Successful Deleted ....! </strong> </div>";
    }
    if (isset($_GET['message']) && ($_GET['message']=="error2")){
        echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Data Gagal Dihapus...!</strong> </div>";
    }
    if (isset($_GET['message']) && ($_GET['message']=="success3")){
        echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Successful Updated ....! </strong> </div>";
    }
    if (isset($_GET['message']) && ($_GET['message']=="error3")){
        echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Data Gagal Diupdate...!</strong> </div>";
    }




?>
    
<!-- <a class="btn green btn-outline sbold" data-toggle="modal" href="#basic"> <?=getNamaMenu($module);?> <i class="icon-note"></i> </a> -->
<br>
<br>
  <!-- modal insert -->   

  <!-- 
        <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title"></h4>
                            </div>
                    <div class="modal-body">
                    </div>
                                                            <div class="modal-footer">  
                                                            </div>
                </div>
               
            </div>
           
        </div> -->
  
        



<!--  end delete modal -->

<!-- <link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/> -->


<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>

<!--<script type="text/javascript" src="../assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>-->


<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/table-advanced.js"></script>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/chosen.css">
    
    <style type="text/css" class="init">
    </style>
    <script type="text/javascript" language="javascript" src="media/js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" language="javascript" src="extensions/TableTools/js/dataTables.tableTools.js"></script>
    <script type="text/javascript" language="javascript" src="examples/resources/syntax/shCore.js"></script>
    <script type="text/javascript" language="javascript" src="examples/resources/demo.js"></script>

<!-- <script type="text/javascript" charset="utf-8">


    


$(document).ready( function() {
    
    $('#list_pttkp').dataTable({
        "bFilter": true,
        "bInfo": true,      
        "processing": true,
        "serverSide": true,
        "sAjaxSource": "../bmpk.id/modules/server_side/server_processing_pttg.php?act1=<?php echo "$act1&srcby=$srcby&srckey=$srckey&module=$module&pm=$pm";?>",
        "iDisplayLength": 10,
        "iDisplayStart": <?php echo $displayStart;?>
    });

    
    
}); 
</script>  -->





                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
                     <div class="page-content-container" id="pagelist">
                        <div class="page-content-row">
                           
                          
                           
                            <div class="page-content-col">
                             
                                
                            
                                
                        <div class="row">
                        <div class="col-md-12">

                        
                        <div class="portlet light grey-steel bordered ">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-equalizer font-red-sunglo"></i>
                                            <span class="caption-subject font-red-sunglo bold uppercase"> List Of <?=getNamaMenu($module);?> </span>
                                            <span class="caption-helper"> </span>
                                        </div>
                                        <div class="actions">
                                            
                                        </div>
                                    </div>

                        <div class="portlet-body form">
                        
                            
<!--                             <table class="table table-striped table-bordered table-hover" id="list_pttkp" width="100%">
                            <thead>
                            <tr>
                                <th width="5%"><b>No</b></th>
                                <th width="25%"><b>Pihak Terkait</b></th>
                                <th width="20%"><b>Group</b></th>
                                <th width="15%" align='right'><b>Plafon</b></th>
                                <th width="15%" align='right'><b>Outstanding</b></th>
                                <th width="10%"><b>Status </b></th> 
                                <th width="10%"><b>Action</b></th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            </table> -->

                            <table class="table table-striped table-bordered table-hover" id="sample_3" width="100%">
                            <thead>
                            <tr>
                                <th width="5%"><b>No</b></th>
                                <th width="5%"><b>CIF</b></th>
                                <th width="15%"><b>Acc.Number</b></th>
                                <th width="20%"><b>Debitur</b></th>
                                <th width="5%"><b>BR#</b></th>
                                <th width="20%"><b>Group</b></th>
                                <th width="20%"><b>Plafon</b></th>
                                <th width="20%"><b>Outstanding</b></th>
                                <th width="20%"><b>Cash Collateral</b></th>
                                <th width="10%"><b>Product</b></th>
                                <th width="5%"><b>Jenis</b></th>
                                <th width="5%"><b>BIHUB</b></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            $query =" select * from pihak_tdk_terkait  order by cpgdes   asc ";
                            //echo $query;
                            $RS2  = $db->Execute($query);
                           
                            while(!$RS2->EOF){

                                $kode_kurs=trim(strtoupper($RS2->fields['currency']));
                                $nominalValas =( $kode_kurs !="IDR" ) ? kursValas($kode_kurs) : 1 ; 

                            $group     = ($RS2->fields['cpgdes']!="" && $RS2->fields['cpgdes'] != NULL) ? $RS2->fields['cpgdes'] : " - ";


                            echo "<tr>";
                            echo "<td width='5%' style='font-size:12px'>$i</td>";
                            echo "<td width='5%' style='font-size:12px'> <b>".$RS2->fields['cfcif']." </b></td>";
                            echo "<td width='15%' style='font-size:12px'> <b>".$RS2->fields['acctno']." </b></td>";
                            echo "<td width='20%' style='font-size:12px'><a href='#' class='btn default' disabled> <b>".$RS2->fields['cfsnme']." </b> </a></td>";
                            echo "<td width='5%' style='font-size:12px'> <b>".$RS2->fields['cfbrnn']." </b></td>";
                            echo "<td width='20%' style='font-size:12px'><a href='#' class='btn default' disabled> <b>".$group." </b> </a></td>";
                            echo "<td width='20%' style='font-size:12px' align='right'><a href='#' class='btn default' disabled> <b>".number_format($RS2->fields['cpplaf']*$nominalValas,2,".",",")."</b></a></td>";
                            echo "<td width='20%' style='font-size:12px' align='right'><a href='#' class='btn default' disabled> <b>".number_format($RS2->fields['cpouts']*$nominalValas,2,".",",")."</b></a></td>";
                            echo "<td width='20%' style='font-size:12px' align='right'><a href='#' class='btn default' disabled> <b>".number_format(getCashCollFix($RS2->fields['acctno']),2,".",",")."</b></a></td>";
                            echo "<td width='10%' style='font-size:12px' > <b>".$RS2->fields['type']." </b></td>";
                            echo "<td width='5%' style='font-size:12px'> <b>".$RS2->fields['jenis']." </b></td>";
                            echo "<td width='5%' style='font-size:12px'><b> ".$RS2->fields['bihub1']." </b></td>";
                            /*echo "<td>  <b>  <button class='btn default'><b> <i class='fa fa-user-secret'> </i> Detail</b></button> </b> </td>";*/

                            echo "</tr>";
                            $i++;
                            $RS2->MoveNext();
                                    }
                            ?>


                            </tbody>
                            </table>






                        </div>
                    </div>
                    
             
                                        
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
 











                    <!-- END SIDEBAR CONTENT LAYOUT -->
                </div>



                <!-- <script type="text/javascript" src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
                <script type="text/javascript" src="assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>  -->

                
<!--                 <script src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>  --> 
               <!--  <script src="assets/pages/scripts/form-validation.min.js" type="text/javascript"></script> -->
                <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
