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
                        <!-- <div class="note note-success"> -->
                        <div class="m-heading-1 border-green m-bordered">
                                     <h1> <i class="icon-settings"></i> <?php echo getParentMenuName(getParentMenu($module));?>   <i class="fa fa-angle-right"></i> <?php echo getNamaMenu($module);?> </h1> 

                                                    <p>Detail Information for " <?php echo getNamaMenu($module);?> "</p>
                                                </div>

                                    
                        </div>

                    <!-- </div> -->

 <?php
    if (isset($_GET['message']) && ($_GET['message']=="success")){
        echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong> Successful Inserted Reserve...! </strong> </div>";
     }
    if (isset($_GET['message']) && ($_GET['message']=="error")){
        echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong> Failed Inserted Reserve...!</strong> </div>";
    }
 /*   if (isset($_GET['message']) && ($_GET['message']=="error1")){
        echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong> Failed Insert Already Exist Username $_GET[var] ...!</strong> </div>";
    }*/
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
        echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>ALREADY PRODUCT...!</strong> </div>";
    }

/*    if (isset($_GET['message']) && ($_GET['message']=="success4")){
        echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong> Successful Approved ....! </strong> </div>";
    }
    if (isset($_GET['message']) && ($_GET['message']=="error4")){
        echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>failed Approved ....!</strong> </div>";
    }*/


?>
    
<a class="btn green btn-outline sbold" data-toggle="modal" href="#basic"> ADD <?php echo getNamaMenu($module);?> <i class="icon-user-follow"></i> </a>

<br>
<br>
  <!-- modal insert -->   
        <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title"></h4>
                            </div>
                    <div class="modal-body">

                        <div class="portlet light portlet-fit portlet-form bordered">
                                <div class="portlet-title">
                                        <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase"> Input Mapp Product  </span>
                                        </div>       
                                </div>
                        <div class="portlet-body">
                            <!-- BEGIN FORM-->
                            <form action="<?php echo "modules/actions_master.php?module=$module&pm=$pm&act=insert_mapp_product"; ?>" id="form_sample_3" class="form-horizontal"  method="POST" >
                                <div class="form-body">
                                    <div class="alert alert-danger display-hide">
                                        <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                    <div class="alert alert-success display-hide">
                                        <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                                                       
                                                        
                                                        
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label bold">Nama Product
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-gears"></i>
                                                                    </span>
                                                                    <input type="text" name="product" id="product" class="form-control" placeholder="Product Name" data-required="1"> </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4 bold">Keterangan
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <select class="form-control select2me" name="prod_type" id=prod_type">
                                                                    <option value="">Select...</option>
                                                                    <option value="ANGSURAN"> ANGSURAN </option>
                                                                    <option value="NON-ANGSURAN"> NON-ANGSURAN </option>

                                                    
                                                                </select>
                                                            </div>
                                                        </div>
                                                <div class="form-group">
                                                            <label class="control-label col-md-4 bold">Nama Divisi 
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <select class="form-control select2me" name="id_div" id=id_div">
                                                                    <option value="">Select...</option>

                                                    <?php
                                                        $query_group="select * from master_division";
                                                        $RS  = $db->Execute($query_group);
                                                        while(!$RS->EOF){
                                                            echo "<option value='".$RS->fields['id_div']."'>".$RS->fields['nama_divisi']."</option>";
                                                            $RS->MoveNext();
                                                        }
                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        

                                                       
                                </div>
                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" class="btn green">Submit</button>
                                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                        <!-- END VALIDATION STATES-->
                        </div>   

                    </div>
                                                            <div class="modal-footer">
                                                                
                                                                
                                                            </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
  <!-- modal end insert -->
  <!-- modal end insert -->




        <!-- modal edit -->
            <div class="modal fade" id="view-edit" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title"></h4>
                            </div>
                    <div class="modal-body">

                        <div class="portlet light portlet-fit portlet-form bordered">
                                <div class="portlet-title">
                                        <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">EDIT <?php echo getNamaMenu($module);?> </span>
                                        </div>       
                                </div>
                        <div class="portlet-body">
                            <!-- BEGIN FORM-->
                            <form action="<?php echo "modules/actions_master.php?module=$module&pm=$pm&act=edit_reserve_bmpk"; ?>" id="form_sample_2" class="form-horizontal" method="POST">
                                <div class="form-body">
                                    <div class="alert alert-danger display-hide">
                                        <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                  
                                                         <!-- <input type="hidden" name="ed_id_kurs" id="ed_id_kurs" />  --> 

<!--                                                         <div class="form-group">
                                                            <label class="control-label col-md-4 bold">Nama Divisi 
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <select class="form-control select2me" name="ed_id_div" id=ed_id_div">
                                                                   <option value="">Select...</option>

                                                  <!--   <?php
                                                        $query_group="select * from master_division";
                                                        $RS2  = $db->Execute($query_group);
                                                        while(!$RS2->EOF){
                                                            echo "<option value='".$RS2->fields['id_div']."'>".$RS2->fields['nama_divisi']."</option>";
                                                            $RS2->MoveNext();
                                                        }
                                                    ?> -->
                                                            <!--     </select>
                                                            </div>
                                                        </div> --> 
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label bold">Nama Divisi
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-gears"></i>
                                                                    </span>
                                                                    <input type="text" name="ed_nmdiv" id="ed_nmdiv" class="form-control" disabled="disabled"> </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label bold">Amount
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-gears"></i>
                                                                    </span>
                                                                    <input type="text" name="ed_nominal" id="ed_nominal" class="form-control" placeholder="Amount "> </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label bold">Remarks
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-gears"></i>
                                                                    </span>
                                                                    <input type="text" name="ed_remarks" id="ed_remarks" class="form-control" placeholder="Remarks"> </div>
                                                            </div>
                                                        </div>
                                                        

                                                <input type="hidden" name="ed_id_reserve" id="ed_id_reserve" >
      

                                </div>
                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" class="btn green">Submit</button>
                                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                        <!-- END VALIDATION STATES-->
                        </div>   

                    </div>
                                                            <div class="modal-footer">
                                                                
                                                                
                                                            </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>


        <!-- end modal edit -->




<!--  delete modal  -->


                <div class="modal fade" id="delete-modal" tabindex="-1" role="basic" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title"></h4>
                            </div>
                    <div class="modal-body">

                        <div class="portlet light portlet-fit portlet-form bordered">
                                <div class="portlet-title">
                                        <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">DELETE <?php echo getNamaMenu($module);?> </span>
                                        </div>       
                                </div>
                        <div class="portlet-body">
                            <!-- BEGIN FORM-->
                            <form action="<?php echo "modules/actions_master.php?module=$module&pm=$pm&act=delete_mapp_product"; ?>" class="form-horizontal" method="POST" class="form-horizontal">
                                <div class="form-body">
                                    <div class="alert alert-danger display-hide">
                                        <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                    <div class="alert alert-success display-hide">
                                        <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                                                       
                                                        <div  class="alert alert-danger" id="list-user">
                                                            
                                                        </div>
                                                        
                                </div>
                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" class="btn red">Submit</button>
                                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                            </form>
                            <!-- END FORM-->
                        </div>
                        <!-- END VALIDATION STATES-->
                        </div>   

                    </div>
                                                            <div class="modal-footer">
                                                                
                                                                
                                                            </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>



<!--  end delete modal -->




                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
                    <div class="page-content-container">
                        <div class="page-content-row">
                            <!-- BEGIN PAGE SIDEBAR -->
                          
                            <!-- END PAGE SIDEBAR -->
                            <div class="page-content-col">
                                <!-- BEGIN PAGE BASE CONTENT -->
                                
                            
                                
                        <div class="row">
                        <div class="col-md-12">

                        <!--  portlet box grey-gallery -->
                        <div class="portlet light grey-steel bordered ">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-equalizer font-red-sunglo"></i>
                                            <span class="caption-subject font-red-sunglo bold uppercase"> List Of <?php echo getNamaMenu($module);?> </span>
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
                                <th><b>Nama Product </b></th>
                                <th><b>Tipe Product</b></th>
                                <th><b>Divisi</b></th>
                                <th><b>Create Date</b></th>
                                <th><b>Create By</b></th>
                                <th><b>Action</b></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $ix=1;
                            $query_reserve =" select a.id_product,a.product,a.prod_type,b.nama_divisi,a.adddt,a.addby from mapp_product a ";
                            $query_reserve.=" left join  master_division b on b.id_div=a.divisi ";
                           
                            $RS_RES  = $db->Execute($query_reserve);
                           
                            while(!$RS_RES->EOF){
                            echo "<tr>";
                            echo "<td>$ix </td>";
                            echo "<td> <a href='#' class='btn green' disabled > <b> ".$RS_RES->fields['product']."</b> </a></td>";
                            echo "<td> <a href='#' class='btn green' disabled > <b> ".$RS_RES->fields['prod_type']."</b> </a></td>";
                            echo "<td> <a href='#' class='btn green' disabled > <b> ".$RS_RES->fields['nama_divisi']."</b> </a></td>";
                            echo "<td ><a href='#' class='btn default' disabled> <b>".date('d-m-Y H:i',strtotime($RS_RES->fields['adddt']))."</b></a></td>";
                            echo "<td><b> ". " <a href='#' class='btn green' disabled ><b>".$RS_RES->fields['addby']."</b></a> </b></td>";
                            echo "<td> <a href='#'  data-toggle='modal' id_product='".trim($RS_RES->fields['id_product'])."'   product='".$RS_RES->fields['product']."' prod_type='".$RS_RES->fields['prod_type']."' data-target='#delete-modal' class='detailDelete' > <button class='btn red'><b>Delete</b></button></a></td>";
                           /* echo "<td><a class='detailEdit' data-toggle='modal' data-target='#view-edit' href='#' id_reserve='".$RS_RES->fields['id_reserve']."' id-id_div='".trim($RS_RES->fields['id_div'])."'   id-nama_divisi='".getNamaDivisi($RS_RES->fields['id_div'])."' id_nominal='".$RS_RES->fields['amount']."' id_remarks='".$RS_RES->fields['remarks']."'   ><button class='btn default'><b>Edit</b></button></a></a> <a href='#'  data-toggle='modal' id_reserve='".$RS_RES->fields['id_reserve']."' id-id_div='".$RS_RES->fields['id_div']."'   id-nama_divisi='".getNamaDivisi($RS_RES->fields['id_div'])."' id_nominal='".number_format($RS_RES->fields['amount'],2,".",",")."' data-target='#delete-modal' class='detailDelete' > <button class='btn red'><b>Delete</b></button></a></td>";*/
                           /*<a class='detailEdit' data-toggle='modal' data-target='#view-edit' href='#'  id-id_product='".trim($RS_RES->fields['id_product'])."'   id-product='".$RS_RES->fields['product']."' id-prod_type='".$RS_RES->fields['prod_type']."'   ><button class='btn default'><b>Edit</b></button></a>*/
                            echo "</tr>";
                            $ix++;
                            $RS_RES->MoveNext();
                                    }
                            ?>


                            </tbody>
                            </table>
                            
                        </div>
                    </div>
                    
                    <!-- END EXAMPLE TABLE PORTLET-->
 




                                        
                                    </div>
                                </div>
                                <!-- END PAGE BASE CONTENT -->
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
<script>
$(document).ready(function() {

    $('.detailDelete').click(function() {


        var id_product = $(this).attr('id_product');
        var product = $(this).attr('product');
        var prod_type = $(this).attr('prod_type');
          //alert(id_user);
            $("#list-user").empty();
            $("#list-user").append( 
                '<tr>'+
                '<td>'+'<div class="alert alert-danger"><h5> Yakin Anda Akan Mendelete  '+'<strong>' + product +'</strong> dg Type ' + prod_type +' !  </h5></div>'+
                '<input type="hidden" name="id_product" value="'+id_product+'">'+
                '</td></tr>');
    });

    $('#approval').click(function() {
            $("#list-user2").empty();
            $("#list-user2").append( 
                '<tr>'+
                '<td>'+'<div class="alert alert-info"><h5>  Yakin Anda Akan Melakukan Approve<strong> NILAI KURS BANK </strong> ! </h5></div>'+
                '</td></tr>');
    });



    $('.detailEdit').click(function() {

        //alert ($(this).attr('id_remarks'));

        var divid = $(this).attr('id-id_div');
        var nama_divisi = $(this).attr('id-nama_divisi');
        var ed_id_reserve = $(this).attr('id_reserve');
        var ed_nominal = $(this).attr('id_nominal');
        var ed_remarks = $(this).attr('id_remarks');
        //alert (nama_divisi);
       //alert(kode_kurs);
        //alert(id_group.trim());
         document.getElementById('ed_nominal').value=ed_nominal;
         document.getElementById('ed_remarks').value=ed_remarks;
         document.getElementById('ed_id_reserve').value=ed_id_reserve;
         document.getElementById('ed_nmdiv').value=nama_divisi;
        // document.getElementById('ed_id_div').value=divid;
       // document.getElementById('ed_id_div').value=divid;
/*        document.getElementById('ed_nominal').value=ed_nominal;
        document.getElementById('ed_remarks').value=ed_remarks;
        document.getElementById('ed_id_reserve').value=ed_id_reserve;*/


            }); 

}); // document ready   $(document).ready(function() {

    </script>