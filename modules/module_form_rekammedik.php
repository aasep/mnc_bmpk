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
        echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong> Successful Inserted ".getNamaMenu($module)."....! </strong> </div>";
     }
    if (isset($_GET['message']) && ($_GET['message']=="error")){
        echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong> Failed Inserted ".getNamaMenu($module)."...!</strong> </div>";
    }
    if (isset($_GET['message']) && ($_GET['message']=="error1")){
        echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong> Failed Insert Already Exist ".getNamaMenu($module)." $_GET[var] ...!</strong> </div>";
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
    
<a class="btn green btn-outline sbold" data-toggle="modal" href="#basic"> <?=getNamaMenu($module);?> <i class="icon-note"></i> </a>
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
                                                    <span class="caption-subject font-dark sbold uppercase"><?=getNamaMenu($module);?> </span>
                                        </div>       
                                </div>
                        <div class="portlet-body">
                            <!-- BEGIN FORM-->
                            <form action="<?php echo "modules/actions_master.php?module=$module&pm=$pm&act=rekam_medik"; ?>" id="form_sample_3" class="form-horizontal"  method="POST" enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="alert alert-danger display-hide">
                                        <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                    <div class="alert alert-success display-hide">
                                        <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                                                       
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label bold">No.Rekam Medik
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-hospital-o"></i>
                                                                    </span>
                                                                    <input type="text" name="no_rm" data-required="1" class="form-control" placeholder="No.Rekam Medik"/> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label bold">Nama Pasien
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-user"></i>
                                                                    </span>
                                                                    <input type="text" name="nama_pasien" class="form-control" placeholder="Nama Pasien"> </div>
                                                            </div>
                                                        </div>
                                                       <div class="form-group">
                                                            <label class="control-label col-md-4 bold">Sex
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-2">
                                                                <select class="form-control select2me" name="sex">
                                                                    <option value="">Select...</option>
                                                                    <option value="L">  L </option>
                                                                    <option value="P">  P </option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label bold">Age
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-2">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-child"></i>
                                                                    </span>
                                                                    <input type="text" name="age" class="form-control" placeholder="Usia"> </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4 bold">Division
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-6">
                                                                <select class="form-control select2me" name="division" id="division">
                                                                    <option value="">Select...</option>

                                                            <?php
                                                                $query="select * from division order by divname asc";
                                                                $RS  = $db->Execute($query);
                                                                while(!$RS->EOF){
                                                                    echo "<option value='".$RS->fields['divid']."'>".$RS->fields['divname']."</option>";
                                                                    $RS->MoveNext();
                                                                }
                                                            ?>
                                                                        
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4 bold">Diagnosis
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-6">
                                                                <textarea class="wysihtml5 form-control" rows="4" name="diagnosis" data-error-container="#editor1_error"></textarea>
                                                                <div id="editor1_error"> </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label bold">Management
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-6">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-tags"></i>
                                                                    </span>
                                                                    <input type="text" name="management" class="form-control" placeholder="Management"> </div>
                                                            </div>
                                                        </div>
                                                        
                                                        

                                                        <div class="form-group">
                                                            <label class="control-label col-md-4 bold">Consultant
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <select class="form-control select2me" name="consultant" id="consultant">
                                                                    <!-- <option value="">Select...</option> -->

                                                    <?php
                                                       /* $query_group="select * from group_user";
                                                        $RS  = $db->Execute($query_group);
                                                        while(!$RS->EOF){
                                                            echo "<option value='".$RS->fields['groupid']."'>".$RS->fields['groupname']."</option>";
                                                            $RS->MoveNext();
                                                        }*/
                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                        <label class="control-label col-md-4 bold">Picture1 (* Before) </label>
                                        <div class="col-md-6">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                    <?php if (isset($row_cek['image'])) { 
                                                    $random=rand(1,999999999);
                                                    echo "<img src='images/img-promnews/$row_cek[image]?var=$random' alt=''/>";
                                                } else {
                                                    ?>
                                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
                                                    <?php 
                                                        }
                                                    ?>  
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                                </div>
                                                <div>
                                                    <span class="btn default btn-file">
                                                    <span class="fileinput-new">
                                                    Select image </span>
                                                    <span class="fileinput-exists">
                                                    Change </span>
                                                    <input type="file" name="file_img" id="file_img">
                                                    </span>
                                                    <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">
                                                    Remove </a>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>


                                                <div class="form-group">
                                        <label class="control-label col-md-4 bold">Picture2 (* After) </label>
                                        <div class="col-md-6">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                    <?php if (isset($row_cek['image'])) { 
                                                    $random=rand(1,999999999);
                                                    echo "<img src='images/img-promnews/$row_cek[image]?var=$random' alt=''/>";
                                                } else {
                                                    ?>
                                                    <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
                                                    <?php 
                                                        }
                                                    ?>  
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                                </div>
                                                <div>
                                                    <span class="btn default btn-file">
                                                    <span class="fileinput-new">
                                                    Select image </span>
                                                    <span class="fileinput-exists">
                                                    Change </span>
                                                    <input type="file" name="file_img2" id="file_img2">
                                                    </span>
                                                    <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">
                                                    Remove </a>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>



                                                       
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
        





 <!-- modal EDIT  -->   
        <div class="modal fade" id="basic2" tabindex="-1" role="basic" aria-hidden="true">
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
                                                    <span class="caption-subject font-dark sbold uppercase"><?=getNamaMenu($module);?> </span>
                                        </div>       
                                </div>
                        <div class="portlet-body">
                            <!-- BEGIN FORM-->
                            <form action="<?php echo "modules/actions_master.php?module=$module&pm=$pm&act=rekam_medik"; ?>" id="form_sample_2" class="form-horizontal"  method="POST" enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="alert alert-danger display-hide">
                                        <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                    <div class="alert alert-success display-hide">
                                        <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                                                       
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label bold">No.Rekam Medik
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-hospital-o"></i>
                                                                    </span>
                                                                    <input type="text" name="no_rm" id="no_rm" data-required="1" class="form-control" placeholder="No.Rekam Medik"/> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label bold">Nama Pasien
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-user"></i>
                                                                    </span>
                                                                    <input type="text" name="nama_pasien" id="nama_pasien" class="form-control" placeholder="Nama Pasien"> </div>
                                                            </div>
                                                        </div>
                                                       <div class="form-group">
                                                            <label class="control-label col-md-4 bold">Sex
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-2">
                                                                <select class="form-control" name="sex" id="sex">
                                                                    <option value="">Select...</option>
                                                                    <option value="L">  L </option>
                                                                    <option value="P">  P </option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label bold">Age
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-2">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-child"></i>
                                                                    </span>
                                                                    <input type="text" name="age" id="age" class="form-control" placeholder="Usia"> </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4 bold">Division
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-6">
                                                                <select class="form-control" name="division" id="division2">
                                                                    <option value="">Select...</option>

                                                            <?php
                                                                $query="select * from division order by divname asc";
                                                                $RS  = $db->Execute($query);
                                                                while(!$RS->EOF){
                                                                    echo "<option value='".$RS->fields['divid']."'>".$RS->fields['divname']."</option>";
                                                                    $RS->MoveNext();
                                                                }
                                                            ?>
                                                                        
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4 bold">Diagnosis
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-6">
                                                                <textarea class="form-control" rows="4" name="diagnosis" id="diagnosis" data-error-container="#editor1_error"></textarea>
                                                                <div id="editor1_error"> </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label bold">Management
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-6">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-tags"></i>
                                                                    </span>
                                                                    <input type="text" name="management" id="management" class="form-control" placeholder="Management"> </div>
                                                            </div>
                                                        </div>
                                                        
                                                        

                                                        <div class="form-group">
                                                            <label class="control-label col-md-4 bold">Consultant
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <select class="form-control select2me" name="consultant" id="consultant2">
                                                                    <!-- <option value="">Select...</option> -->

                                                    <?php
                                                       /* $query_group="select * from group_user";
                                                        $RS  = $db->Execute($query_group);
                                                        while(!$RS->EOF){
                                                            echo "<option value='".$RS->fields['groupid']."'>".$RS->fields['groupname']."</option>";
                                                            $RS->MoveNext();
                                                        }*/
                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                        <label class="control-label col-md-4 bold">Picture1 (* Before) </label>
                                        <div class="col-md-6">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" id="thumb1" style="width: 200px; height: 150px;">
                                                    
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" id="thumb1new" style="max-width: 200px; max-height: 150px;">
                                                </div>
                                                <div>
                                                    <span class="btn default btn-file">
                                                    <span class="fileinput-new">
                                                    Select image </span>
                                                    <span class="fileinput-exists">
                                                    Change </span>
                                                    <input type="file" name="file_img" id="file_img">
                                                    </span>
                                                    <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">
                                                    Remove </a>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>


                                                <div class="form-group">
                                        <label class="control-label col-md-4 bold">Picture2 (* After) </label>
                                        <div class="col-md-6">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" id="thumb2" style="width: 200px; height: 150px;">
                                                   
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" id="thumb2new" style="max-width: 200px; max-height: 150px;">
                                                </div>
                                                <div>
                                                    <span class="btn default btn-file">
                                                    <span class="fileinput-new">
                                                    Select image </span>
                                                    <span class="fileinput-exists">
                                                    Change </span>
                                                    <input type="file" name="file_img2" id="file_img2">
                                                    </span>
                                                    <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">
                                                    Remove </a>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>



                                                       
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
  <!-- modal EDIT -->







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
                            <form action="<?php echo "modules/actions_master.php?module=$module&pm=$pm&act=delete_user"; ?>" class="form-horizontal" method="POST" class="form-horizontal">
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

    <link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>


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

<script type="text/javascript" charset="utf-8">


    


$(document).ready( function() {
    
    $('#list_rekmedik').dataTable({
        "bFilter": true,
        "bInfo": true,      
        "processing": true,
        "serverSide": true,
        "sAjaxSource": "../medicapps/modules/server_side/server_processing_rek_medik.php?act1=<?php echo "$act1&srcby=$srcby&srckey=$srckey&module=$module&pm=$pm";?>",
        "iDisplayLength": 10,
        "iDisplayStart": <?php echo $displayStart;?>
    });

    


    
    
    
}); // document ready   $(document).ready(function() {
</script> 




                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
                     <div class="page-content-container">
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
                        
                            
                            <table class="table table-striped table-bordered table-hover" id="list_rekmedik" width="100%">
                            <thead>
                            <tr>
                               <!--  <th> <b>No</b></th> -->
                                <th><b>REK ID <br>NO.REK MEDIK <br> USERNAME</b></th>
                                <th><b>PASIEN <br> AGE</b></th>
                                <th><b>DIAGNOSIS</b></th>
                                <th><b>DIVISION</b></th>
                                <th><b>DOSEN</b></th>
                                <th><b>Action</b></th>
                            </tr>
                            </thead>
                            <tbody>
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

<script>
$(document).ready(function() {


  $(document).on('click', '.detailEdit', function(){

        var username = $(this).attr('id-username');
        var rek_id = $(this).attr('id-rek_id');
        var no_rek_medis = $(this).attr('id-no_rek_medis');
        var nama_pasien = $(this).attr('id-nama_pasien');
        var age = $(this).attr('id-age');
        var sex = $(this).attr('id-sex');
        var diagnosis = $(this).attr('id-diagnosis');
        var divid = $(this).attr('id-divid');
        var id_dosen = $(this).attr('id-id_dosen');
        var before_img = $(this).attr('id-before_img');
        var after_img = $(this).attr('id-after_img');

        //alert(id_group.trim());

//alert(diagnosis);
        document.getElementById('no_rm').value=no_rek_medis;
        document.getElementById('nama_pasien').value=nama_pasien;
        document.getElementById('age').value=age;
        document.getElementById('division2').value=divid;
        document.getElementById('sex').value=sex;
        document.getElementById('diagnosis').value=diagnosis;

        //$('#diagnosis').contents().find('.wysihtml5').html(diagnosis);
         

         $("#thumb1").empty();
         $("#thumb1").append( '<img src="images/img_pict1/'+before_img+'" alt=""/>');
         $("#thumb2").empty();
         $("#thumb2").append( '<img src="images/img_pict2/'+after_img+'" alt=""/>');


         /*$("#thumb1new").empty();
         $("#thumb2new").empty();*/
         
         var dataString5 = 'id='+divid;
                $.ajax({
                        type: "POST",
                        url: "modules/ajax/ajax_consultant.php",
                        data: dataString5,
                        cache: false,
                        success: function(html){
                                $("#consultant2").html(html);
                        } 
                    }); 



            }); 


     $('#division').on('change', function() {

        //alert( this.value );
        var iddiv=this.value;
             var dataString5 = 'id='+iddiv;
                $.ajax({
                        type: "POST",
                        url: "modules/ajax/ajax_consultant.php",
                        data: dataString5,
                        cache: false,
                        success: function(html){
                                $("#consultant").html(html);
                        } 
                    }); 
       
        });

}); // document ready   $(document).ready(function() {

    </script>

 echo "<img src='images/img-promnews/$row_cek[image]?var=$random' alt=''/>";