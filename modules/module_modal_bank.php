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
                                     <h1> <i class="icon-settings"></i> <?php echo getParentMenuName(getParentMenu($module));?>   <i class="fa fa-angle-right"></i> <?=getNamaMenu($module);?> </h1> 

                                                    <p>Detail Information for " <?=getNamaMenu($module);?> "</p>
                                                </div>

                                    
                        </div>

                    <!-- </div> -->

 <?php
    if (isset($_GET['message']) && ($_GET['message']=="success")){
        echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong> Successful Inserted User ...! </strong> </div>";
     }
    if (isset($_GET['message']) && ($_GET['message']=="error")){
        echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong> Failed Inserted User...!</strong> </div>";
    }
    if (isset($_GET['message']) && ($_GET['message']=="error1")){
        echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong> Failed Insert Already Exist Username $_GET[var] ...!</strong> </div>";
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

    if (isset($_GET['message']) && ($_GET['message']=="success4")){
        echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong> Successful Approved ....! </strong> </div>";
    }
    if (isset($_GET['message']) && ($_GET['message']=="error4")){
        echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>failed Approved ....!</strong> </div>";
    }


?>
<?php if (isFinconModal()==false) { ?>     
<!-- <a class="btn green btn-outline sbold" data-toggle="modal" href="#basic"> ADD <?=getNamaMenu($module);?> <i class="icon-user-follow"></i> </a> -->
<?php  } ?>
<?php if (isFinconModal()) { ?>
<a class="btn red btn-outline sbold pull-right" data-toggle="modal" data-target="#approval-modal" href="#basic" id="approval"> APPROVAL  <?=getNamaMenu($module);?> <i class="icon-check"></i> </a>
<?php  } ?>
<br>
<br>
  <!-- modal insert -->   
        <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
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
                                                    <span class="caption-subject font-dark sbold uppercase">ADD <?=getNamaMenu($module);?> </span>
                                        </div>       
                                </div>
                        <div class="portlet-body">
                            <!-- BEGIN FORM-->
                            <form action="<?php echo "modules/actions_master.php?module=$module&pm=$pm&act=add_modal_bank"; ?>" id="form_sample_3" class="form-horizontal"  method="POST" >
                                <div class="form-body">
                                    <div class="alert alert-danger display-hide">
                                        <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                    <div class="alert alert-success display-hide">
                                        <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                                                       
                                                        
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label bold">Nama Modal Bank
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-gears"></i>
                                                                    </span>
                                                                    <input type="text" name="nama_modal" id="nama_modal" class="form-control" placeholder="Nama Modal"> </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label bold">Nominal 
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-money"></i>
                                                                    </span>
                                                                    <input type="text" name="nominal" id="nominal" class="form-control" placeholder="Nominal.."> </div>
                                                            </div>
                                                        </div>
                                                       
                                                
      
<!-- 
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4 bold">Status Modal 
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <select class="form-control" name="status" id="status">
                                                                     <option value="">Select...</option> 
                                                                     <option value="1"> Aktif </option>
                                                                    <option value="0"> Pending </option> 
                                                                </select>
                                                            </div>
                                                        </div> -->
                                                       
                                </div>
                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" class="btn green">Submit</button>
                                                                <!-- <input type="submit" value="submit" class="btn green"> -->
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
                                                    <span class="caption-subject font-dark sbold uppercase">EDIT <?=getNamaMenu($module);?> </span>
                                        </div>       
                                </div>
                        <div class="portlet-body">
                            <!-- BEGIN FORM-->
                            <form action="<?php echo "modules/actions_master.php?module=$module&pm=$pm&act=edit_modal_bank"; ?>" id="form_sample_2" class="form-horizontal" method="POST">
                                <div class="form-body">
                                    <div class="alert alert-danger display-hide">
                                        <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                   <!--  <div class="alert alert-success display-hide">
                                        <button class="close" data-close="alert"></button> Your form validation is successful! </div> -->
                                                       
                                                        <!-- <div class="form-group">
                                                            <label class="col-md-4 control-label bold">Nama Modal Bank
                                                                <span class="required">  </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-user"></i>
                                                                    </span>
                                                                    <input type="text" name="username1" id="username1" data-required="1" class="form-control" placeholder="Username"/ disabled="disabled"> 
                                                                    <input type="hidden" name="username" id="ed_username" data-required="1" class="form-control" placeholder="Username"/> 
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <input type="hidden" name="ed_id_modal" id="ed_id_modal" /> 
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label bold">Nama Modal Bank
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-gears"></i>
                                                                    </span>
                                                                    <input type="text" name="ed_nama_modal" id="ed_nama_modal" class="form-control" placeholder="Nama Modal"> </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label bold">Nominal 
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-money"></i>
                                                                    </span>
                                                                    <input type="text" name="ed_nominal" id="ed_nominal" class="form-control" placeholder="Nominal.."> </div>
                                                            </div>
                                                        </div>
                                                       
                                                
      

                                                       <!--  <div class="form-group">
                                                            <label class="control-label col-md-4 bold">Status Modal 
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <select class="form-control" name="ed_status" id="ed_status">
                                                                  
                                                                </select>
                                                            </div>
                                                        </div> -->
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
                                                    <span class="caption-subject font-dark sbold uppercase">DELETE <?=getNamaMenu($module);?> </span>
                                        </div>       
                                </div>
                        <div class="portlet-body">
                            <!-- BEGIN FORM-->
                            <form action="<?php echo "modules/actions_master.php?module=$module&pm=$pm&act=delete_modal_bank"; ?>" class="form-horizontal" method="POST" class="form-horizontal">
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


<!--  Start Approval  -->


                <div class="modal fade" id="approval-modal" tabindex="-1" role="basic" aria-hidden="true">
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
                                                    <span class="caption-subject font-dark sbold uppercase">APPROVAL <?=getNamaMenu($module);?> </span>
                                        </div>       
                                </div>
                        <div class="portlet-body">
                            <!-- BEGIN FORM-->
                            <form action="<?php echo "modules/actions_master.php?module=$module&pm=$pm&act=approve_modal_bank"; ?>" class="form-horizontal" method="POST" class="form-horizontal">
                                <div class="form-body">
                                    <div class="alert alert-danger display-hide">
                                        <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                    <div class="alert alert-success display-hide">
                                        <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                                                       
                                                        <div  class="alert alert-info" id="list-user2">
                                                            
                                                        </div>
                                                        
                                </div>
                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" class="btn red"><b> Approve </b></button>
                                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal"><b> Cancel </b></button>
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



<!--  end Approval -->



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
                                            <span class="caption-subject font-red-sunglo bold uppercase"> List Of <?=getNamaMenu($module);?> </span>
                                            <span class="caption-helper"> </span>
                                        </div>
                                        <div class="actions">
                                            
                                        </div>
                                    </div>

                        <div class="portlet-body form">
                        
                            
                            <table class="table table-striped table-bordered table-hover" id="sample_2">
                            <thead>
                            <tr>
                                <th> <b>No</b></th>
                                <th><b>Nama Modal</b></th>
                                <th><b>Nominal Modal</b></th>
                                <th><b>Status Modal</b></th>
                                <th><b>Modified Date</b></th>
                                <th><b>Modified By </b></th>
                                
                                <th><b>Action</b></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            $query =" select * from modal_bank ";
                            //echo $query;
                            $RS2  = $db->Execute($query);
                           
                            while(!$RS2->EOF){
                                 if ($RS2->fields['status']=='1'){
                                    $status=" <a href='#' class='btn green' disabled> <b> <i class='fa fa-check-square'> </i> Active </b></a> ";
                                 } else { $status=" <a href='#' class='btn red' disabled> <b> <i class='fa fa-warning'> </i> Pending </b></a> "; }
                              


                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td><a href='#' class='btn yellow' disabled> <b> <i class='fa fa-bank'></i> ".$RS2->fields['nama_modal']." </b></a></td>";
                            echo "<td align='right'><a href='#' class='btn default' disabled> <b>".number_format($RS2->fields['nominal'],2,".",",")."</b></a></td>";
                            echo "<td>$status</td>";
                            echo "<td><a href='#' class='btn default' disabled><b>".date('d-m-Y H:i',strtotime($RS2->fields['updatedt']))."</b></td>";
                            echo "<td> <a href='#' class='btn default' disabled> <b> <i class='fa fa-user-secret'> </i> ".$RS2->fields['updateby']." </b></a> </td>";
                            /*echo "<td><a class='detailEdit' data-toggle='modal' data-target='#view-edit' href='#' id-id_modal='".$RS2->fields['id_modal']."'   id-nama_modal='".$RS2->fields['nama_modal']."' 
 id-status='".trim($RS2->fields['status'])."'   id-nominal='".$RS2->fields['nominal']."' ><button class='btn default'><b>Edit</b></button></a></a> <a href='#'  data-toggle='modal' id-id_modal='".$RS2->fields['id_modal']."'   id-nama_modal='".$RS2->fields['nama_modal']."' 
 id-status='".trim($RS2->fields['status'])."'   id-nominal='".$RS2->fields['nominal']."' data-target='#delete-modal' class='detailDelete' > <button class='btn red'><b>Delete</b></button></a></td>";*/

                            echo "<td><a class='detailEdit' data-toggle='modal' data-target='#view-edit' href='#' id-id_modal='".$RS2->fields['id_modal']."'   id-nama_modal='".$RS2->fields['nama_modal']."' 
 id-status='".trim($RS2->fields['status'])."'   id-nominal='".$RS2->fields['nominal']."' ><button class='btn default'><b>Edit</b></button></a></td>";
                            echo "</tr>";
                            $i++;
                            $RS2->MoveNext();
                                    }
                            echo "<tr>";
                            echo "<td>3</td>";
                            echo "<td><a href='#' class='btn yellow' disabled> <b> <i class='fa fa-bank'></i> Total Modal Bank </b></a></td>";
                            echo "<td align='right'><a href='#' class='btn default' disabled> <b>".number_format((JmlModalInti()+JmlModalpelengkap()),2,".",",")."</b></a></td>";
                            echo "<td colspan=4><a href='#' class='btn green' disabled> <b> <i class='fa fa-check-square'> </i> Active </b></a> </td>";
                            
                            echo "</tr>";




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
        var id_modal = $(this).attr('id-id_modal');
        var nama_modal = $(this).attr('id-nama_modal');
          //alert(id_user);
            $("#list-user").empty();
            $("#list-user").append( 
                '<tr>'+
                '<td>'+'<div class="alert alert-danger"><h5> Yakin Anda Akan Mendelete Jenis  '+'<strong>' + nama_modal +'</strong> ! </h5></div>'+
                '<input type="hidden" name="id_modal" value="'+id_modal+'">'+
                '</td></tr>');
    });

    $('#approval').click(function() {
            $("#list-user2").empty();
            $("#list-user2").append( 
                '<tr>'+
                '<td>'+'<div class="alert alert-info"><h5>  Yakin Anda Akan Melakukan Approve<strong> MODAL BANK </strong> ! </h5></div>'+
                '</td></tr>');
    });



    $('.detailEdit').click(function() {


        var id_modal = $(this).attr('id-id_modal');
        var nama_modal = $(this).attr('id-nama_modal');
        //var status = $(this).attr('id-status');
        var nominal = $(this).attr('id-nominal');

       //alert(id_modal);
        //alert(id_group.trim());


       // document.getElementById('username1').value=id_user;
        document.getElementById('ed_nama_modal').value=nama_modal;
        //document.getElementById('ed_status').value=status;
        document.getElementById('ed_nominal').value=nominal;
        document.getElementById('ed_id_modal').value=id_modal;
        //document.getElementById('ed_group_user').value=id_group;


            $("#ed_status").empty();
            if (status=='1'){
                //alert(status_account);
                $("#ed_status").append( '<option value="1" selected="selected"> Active </option>');
                $("#ed_status").append( '<option value="0" > Pending </option>');
            } else {
                //alert(status_account);
                $("#ed_status").append( '<option value="1" > Active </option>');
                $("#ed_status").append( '<option value="0" selected="selected"> Pending </option>');
              }

        
       // var dataString3 = 'id='+id_group;
        
        //alert(dataString3);

/*        $.ajax({
                type: "POST",
                url: "modules/security_setting/ajax/ajax_group_user.php",
                data: dataString3,
                cache: false,
                success: function(html)
                {
                    $("#ed_group_user").html(html);
                } 
            }); 

        var dataString4 = 'id='+Branch;
        //alert(dataString4);
        $.ajax({
                type: "POST",
                url: "modules/security_setting/ajax/ajax_Branch.php",
                data: dataString4,
                cache: false,
                success: function(html)
                {
                    $("#ed_BranchCode").html(html);
                } 
            });*/


        //var dataString4 = 'id='+BranchCode;

            //alert (dataString)
/*        var dataString5 = 'id='+Branch+'&id2='+SubBranch;
        $.ajax({
                type: "POST",
                url: "modules/security_setting/ajax/ajax_subBranch2.php",
                data: dataString5,
                cache: false,
                success: function(html){
                        $("#ed_SBranchCode").html(html);
                    } 
            }); 
*/


            }); 

}); // document ready   $(document).ready(function() {

    </script>