<?php
$module=$_GET['module'];
$pm=$_GET['pm'];
$page_tmp = $_SERVER['PHP_SELF']."?module=$module&pm=$pm";
$page=str_replace(".php","",$page_tmp);

###########################################################
        if($_POST['cif']){
        $cif=$_POST['cif']; 
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
        echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong> Successful Inserted Bobot ...! </strong> </div>";
     }
    if (isset($_GET['message']) && ($_GET['message']=="error")){
        echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong> Failed Inserted bobot or Not Balance ...!</strong> </div>";
    }
    if (isset($_GET['message']) && ($_GET['message']=="error1")){
        echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong> Failed Insert Already Exist Username $_GET[var] ...!</strong> </div>";
    }
    if (isset($_GET['message']) && ($_GET['message']=="success2")){
        echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong> Successful  Deleted ....! </strong> </div>";
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
    
<!-- <a class="btn green btn-outline sbold" data-toggle="modal" href="#basic"> ADD <?=getNamaMenu($module);?> <i class="icon-user-follow"></i> </a> -->
<?php if (2==1) { ?>
<a class="btn red btn-outline sbold pull-right" data-toggle="modal" data-target="#approval-modal" href="#basic" id="approval"> APPROVAL  <?=getNamaMenu($module);?> <i class="icon-check"></i> </a>
<?php  } ?>
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
                                                    <span class="caption-subject font-dark sbold uppercase">ADD <?=getNamaMenu($module);?> </span>
                                        </div>       
                                </div>
                        <div class="portlet-body">
                            <!-- BEGIN FORM-->
                            <form action="<?php echo "modules/actions_master.php?module=$module&pm=$pm&act=add_pro_modal"; ?>" id="form_sample_3x" class="form-horizontal"  method="POST" >
                                <div class="form-body">
                                    <div class="alert alert-danger display-hide">
                                        <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                    <div class="alert alert-success display-hide">
                                        <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                                                       
                                                        
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label bold">CIF
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-gears"></i>
                                                                    </span>
                                                                    <input type="text" name="xcifno" id="xcifno" class="form-control" disabled> 
                                                                    <input type="hidden" name="cifno" id="cifno" class="form-control" ></div>
                                                            </div>
                                                        </div>
                                                                                                                <div class="form-group">
                                                        <label class="col-md-4 control-label bold">Account Number
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-6">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-gears"></i>
                                                                    </span>
                                                                    <input type="text" name="xacctno" id="xacctno" class="form-control" disabled> 
                                                                    <input type="hidden" name="acc_number" id="acc_number" class="form-control" ></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label bold">Prosentase (%)
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-money"></i>
                                                                    </span>
                                                                    <input type="text" name="prosentase" id="prosentase" class="form-control" placeholder="Prosentase.."> </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label bold">Dari Cash Collateral
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-money"></i>
                                                                    </span>
                                                                    <input type="text" name="xcash_coll" id="xcash_coll" class="form-control" disabled="disabled">
                                                                    <input type="hidden" name="cash_coll" id="cash_coll" class="form-control" > </div>
                                                            </div>
                                                        </div>
<!--                                                          <div class="form-group">
                                                            <label class="control-label col-md-4 bold"> Dari Modal 
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <select class="form-control select" name="cash_coll" id="cash_coll">
                                                                    <option value="">Select...</option>

                                                    <?php
                                                        $query_group="select * from modal_bank";
                                                        $RS  = $db->Execute($query_group);
                                                        while(!$RS->EOF){
                                                            echo "<option value='".$RS->fields['id_modal']."'>".$RS->fields['nama_modal']."</option>";
                                                            $RS->MoveNext();
                                                        }

                                                        echo "<option value='99'> Total Modal Bank </option>";
                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div> -->
      

<!--                                                         <div class="form-group">
                                                            <label class="control-label col-md-4 bold">Status Kurs 
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
                                                    <span class="caption-subject font-dark sbold uppercase">EDIT <?=getNamaMenu($module);?> </span>
                                        </div>       
                                </div>
                        <div class="portlet-body">
                            <!-- BEGIN FORM-->
                            <form action="<?php echo "modules/actions_master.php?module=$module&pm=$pm&act=edit_pro_modal"; ?>" id="form_sample_2x" class="form-horizontal" method="POST">
                                <div class="form-body">
                                    <div class="alert alert-danger display-hide">
                                        <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                  
                                                         <div class="form-group">
                                                            <label class="col-md-3 control-label bold">Nama Tipe
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-gears"></i>
                                                                    </span>
                                                                    <input type="text" name="ed_nama_tipe" id="ed_nama_tipe" class="form-control" placeholder="Nama Tipe Peminjam" disabled="disabled"> </div>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="ed_nama_tipe2" id="ed_nama_tipe2">
                                                        <input type="hidden" name="ed_id_pro" id="ed_id_pro">
                                                        <div class="form-group">
                                                            <label class="col-md-3 control-label bold">Prosentase (%)
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-9">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-money"></i>
                                                                    </span>
                                                                    <input type="text" name="ed_prosentase" id="ed_prosentase" class="form-control" placeholder="Prosentase.."> </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3 bold"> Dari Modal 
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <select class="form-control select" name="ed_fr_modal" id="ed_fr_modal">
                                                                    <option value="">Select...</option>

                                                    <?php
                                                        $query_group="select * from modal_bank";
                                                        $RS  = $db->Execute($query_group);
                                                        while(!$RS->EOF){
                                                            echo "<option value='".$RS->fields['id_modal']."'>".$RS->fields['nama_modal']."</option>";
                                                            $RS->MoveNext();
                                                        }

                                                        echo "<option value='99'> Total Modal Bank </option>";
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
                            <form action="<?php echo "modules/actions_master.php?module=$module&pm=$pm&act=delete_map_cashcoll"; ?>" class="form-horizontal" method="POST" class="form-horizontal">
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
                            <form action="<?php echo "modules/actions_master.php?module=$module&pm=$pm&act=approve_pro_modal"; ?>" class="form-horizontal" method="POST" class="form-horizontal">
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
                                <form action="<?php echo $page ?>" id="form_sample_3" class="form-horizontal"  method="POST" >
                                <div class="form-body">
                                    <div class="alert alert-danger display-hide">
                                        <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                    <div class="alert alert-success display-hide">
                                        <button class="close" data-close="alert"></button> Your form validation is successful! </div>
 
                                    <div class="form-group">
                                                            <label class="col-md-3 control-label bold">CIF 
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-2">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-gears"></i>
                                                                    </span>
                                                                    <input type="text" name="cif" id="cif" class="form-control" value="<?php echo $cif;?>" placeholder="CIF Number" data-required="1"> </div>
                                                                    <input type="hidden" name="module" value="<?php echo $module;?>"> 
                                                                    <input type="hidden" name="mypost" value="1"></div>
                                                            </div>
                                                        </div>
                                                       
                                    </div>
                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" class="btn green"> <b>Check </b></button>
                                                                <!-- <input type="submit" value="submit" class="btn green"> -->
                                                                <!-- <button type="submit" class="btn green-haze" id="export-excel">  Upload Excel </button> -->
                                                            </div>
                                                        </div>
                                                    </div>
                            </form>

                            <form action="<?php echo "modules/actions_master.php?module=$module&pm=$pm&act=inp_bobot"; ?>" id="form_sample_2" class="form-horizontal"  method="POST" >
                                <div class="form-body">
                                <div class="alert alert-danger display-hide">
                                        <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                <!--  start location post --->
<?php
        if( $_POST['cif'] && $_POST['mypost']=="1" ){
        $cif=$_POST['cif']; 
        $module=$_POST['module']; 
                                                    
  
            $query =" SELECT cfcif,acctno,cfsnme,ccolateral from pihak_terkait WHERE cfcif='$cif'  ";
            $query.=" AND cfcif not in (select cfcif from mapp_cashcoll  )  ";
            $query.=" UNION ALL  ";
            $query.=" SELECT cfcif,acctno,cfsnme,ccolateral from pihak_tdk_terkait WHERE cfcif='$cif'  ";
            $query.=" AND cfcif not in (select cfcif from mapp_cashcoll  )  ";
            //echo $query;

            $RS  = $db->Execute($query);
            $found=$RS->Rowcount();
            if ($found>=1) {               
                $i=1;
                /*echo "<hr>";
                echo "<br>";
                echo "<br>";
                echo "<div class='alert alert-success pull-right'><b> Total Cash Collateral =  [".getValasCashColl($cif)."]  ".number_format(getCashColl($cif),2,".",",")." </b> </div>";*/
?>

<div class="table-scrollable">
                                        <table class="table table-striped table-bordered table-advance table-hover" id="list_cif" width="100%">
                                            <thead>
                                                <tr>
                                                    <th width="5%"><b> NO</b> </th>
                                                    <th width="10%"><b> CIF </b> </th>
                                                    <th width="15%"><b> ACCOUNT NUMBER </b> </th>
                                                    <th width="25%"><b> ACCOUNT NAME</b> </th>
                                                    <th width="15%"><b> BOBOT (%)</b> </th>
                                                    <th width="30%"><b> CASH COLLATERAL </b>  <button class="btn dark" disabled="disabled"> <?php echo "<b>[".getValasCashColl($cif)."]  ".number_format(getCashColl($cif),2,".",",")." </b>"; ?> </button> </th>
                                                </tr>
                                            </thead>
                                            <tbody>

<?php


                while(!$RS->EOF){

                     echo "<tr>";
                     echo "<td><b> $i .</b></td>";
                     echo "<td><b>".$RS->fields['cfcif']."</b></td>";
                     echo "<td><b>".$RS->fields['acctno']."</b></td>";
                     echo "<td><b>".$RS->fields['cfsnme']."</b></td>";
                     /*echo "<td align='right'><b>".number_format($RS->fields['ccolateral'],2,".",",")."</b></td>";*/
                     echo "<td align='right'> <div class='col-md-8'><input type='text' name='bobot_$i' id='bobot_$i' class='form-control' data-required='1' ></div></td>";
                     echo "<td align='right'> <div class='col-md-8'><input type='hidden' name='cash_coll_$i' id='cash_coll_$i' class='form-control'>
                     <input type='text' name='xcash_coll_$i' id='xcash_coll_$i' class='form-control' disabled> </div></td>";
/*                     echo "<td><a href='#' class='detailEdit' data-toggle='modal' data-target='#basic' id-cif='".$RS->fields['cfcif']."  id-acctno='".$RS->fields['acctno']." id-cfsnme='".$RS->fields['cfsnme']." id-ccolateral='".$RS->fields['ccolateral']." '> <button class='btn blue' > <i class='fa fa-share'></i> <b> Input Bobot </b>
                            </button></a> </td>";*/
                     echo "</tr>";

                     ///-------------------------------input tambahan --------------------------------
                     echo "<input type='hidden' name='acct_$i' value='".$RS->fields['acctno']."' class='form-control'>";
                     ///-------------------------------------------------------------------------------





                $i++;
                $RS->MoveNext();
                }
                $jml_input=$i-1;

?>


                                               

                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <input type="hidden" id='id_valas' name='id_valas' value="<?php echo getValasCashColl($cif);?>" >
                                    <input type="hidden" id='jml_input' name='jml_input' value="<?php echo $jml_input;?>" >
                                    <input type="hidden" id='tot_cash_coll' name='tot_cash_coll'  value="<?php echo getCashColl($cif);?>" >  
                                    <input type="hidden" name='xcif' value="<?php echo $cif;?>" > 
                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" class="btn red"> <b>Submit >>>></b></button>
                                                                <!-- <input type="submit" value="submit" class="btn green"> -->
                                                                <!-- <button type="submit" class="btn green-haze" id="export-excel">  Upload Excel </button> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                

<?php

}else{

    echo "<div class='alert alert-danger'><b> Data Tidak Ditemukan.....  ! </b> </div>";
}

}else {
    if (!isset($_POST['mypost'])){

        
    }else{
        echo "<div class='alert alert-danger'><b>CIF Tidak Boleh Kosong.....  ! </b> </div>";
    }
    

}  
?>





                                <!-- end location post -->
                            <div class="varcif" > </div>  
                            </div>  
                            </form>
                        </div>
                        <br>
                        <br>
<hr>

                                                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                            <thead>
                            <tr>
                                <th><b>No</b></th>
                                <th><b>CIF</b></th>
                                <th><b>ACCTNO</b></th>
                                <th><b>BOBOT [%] </b></th>
                                <th><b>CASH COLLATERAL</b></th>
                                <th><b>STATUS</b></th>
                                <th><b>ADD DATE</b></th>
                                <th><b>ADD BY</b></th>
                                <th><b>APPROVE DATE</b></th>
                                <th><b>APPROVE BY</b></th>
                                <th><b>ACTION</b></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            $query =" select * from mapp_cashcoll  ";
                            //echo $query;
                            $RS2  = $db->Execute($query);
                           
                            while(!$RS2->EOF){
                            if($RS2->fields['status']=="0"){
                                 $status="<a href='#' class='btn red' disabled> <b> PENDING </b> </a>";
                            }else {
                                 $status="<a href='#' class='btn green' disabled> <b> APPROVED </b> </a>";
                            }
                            $r= ($RS2->fields['updatedt']==NULL) ? " - " : date('d-m-Y H:i:s',strtotime($RS2->fields['updatedt']));
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td><b> $currency ".$RS2->fields['cfcif']." </b></td>";
                            echo "<td><b> ".$RS2->fields['acctno']." </b> </td>";
                            echo "<td><b>  ".number_format($RS2->fields['prosentase'],2,".",",")." </b></td>";
                            echo "<td><b>  ".number_format($RS2->fields['cash_coll'],2,".",",")." </b></td>";
                            echo "<td><b> ".$status." </b></td>";
                            echo "<td><b> ".date('d-m-Y H:i:s',strtotime($RS2->fields['adddt']))." </b></td>";
                            echo "<td><b> ".$RS2->fields['addby']." </b></td>";
                            echo "<td><b> ". $r." </b></td>";
                            echo "<td><b> ".$RS2->fields['updateby']." </b></td>";
                            echo "<td><a href='#'  data-toggle='modal' id-cif='".$RS2->fields['cfcif']."' data-target='#delete-modal' class='detailDelete' > <button class='btn red'> <b> Delete </b></button></a></td>";
                            echo "</tr>";
                            $i++;
                            $RS2->MoveNext();
                                    }
                            ?>


                            </tbody>
                            </table>




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

            $("#bobot_1").keyup(function() { 
                 var jml= document.getElementById('jml_input').value;
                 var tot_cash_coll= document.getElementById('tot_cash_coll').value;
                     bobot1 = document.getElementById('bobot_1').value;
                     cashcoll1=(bobot1 /100)*tot_cash_coll ;
                     document.getElementById('cash_coll_1').value=cashcoll1;
                     document.getElementById('xcash_coll_1').value=cashcoll1;
            //alert('okeeh');
            });
            $("#bobot_2").keyup(function() { 
                 var jml= document.getElementById('jml_input').value;
                 var tot_cash_coll= document.getElementById('tot_cash_coll').value;
                     bobot2 = document.getElementById('bobot_2').value;
                     cashcoll2=(bobot2 /100)*tot_cash_coll ;
                     document.getElementById('cash_coll_2').value=cashcoll2;
                     document.getElementById('xcash_coll_2').value=cashcoll2;
            //alert('okeeh');
            });

            $("#bobot_3").keyup(function() { 
                 var jml= document.getElementById('jml_input').value;
                 var tot_cash_coll= document.getElementById('tot_cash_coll').value;
                     bobot3 = document.getElementById('bobot_3').value;
                     cashcoll3=(bobot3 /100)*tot_cash_coll ;
                     document.getElementById('cash_coll_3').value=cashcoll3;
                     document.getElementById('xcash_coll_3').value=cashcoll3;
            //alert('okeeh');
            });

            $("#bobot_4").keyup(function() { 
                 var jml= document.getElementById('jml_input').value;
                 var tot_cash_coll= document.getElementById('tot_cash_coll').value;
                     bobot4 = document.getElementById('bobot_4').value;
                     cashcoll4=(bobot4 /100)*tot_cash_coll ;
                     document.getElementById('cash_coll_4').value=cashcoll4;
                     document.getElementById('xcash_coll_4').value=cashcoll4;
            //alert('okeeh');
            });

            $("#bobot_5").keyup(function() { 
                 var jml= document.getElementById('jml_input').value;
                 var tot_cash_coll= document.getElementById('tot_cash_coll').value;
                     bobot5 = document.getElementById('bobot_5').value;
                     cashcoll5=(bobot5 /100)*tot_cash_coll ;
                     document.getElementById('cash_coll_5').value=cashcoll5;
                     document.getElementById('xcash_coll_5').value=cashcoll5;
            //alert('okeeh');
            });
//-------------------------------------------------------------------------------
            $("#bobot_6").keyup(function() { 
                 var jml= document.getElementById('jml_input').value;
                 var tot_cash_coll= document.getElementById('tot_cash_coll').value;
                     bobot5 = document.getElementById('bobot_6').value;
                     cashcoll5=(bobot5 /100)*tot_cash_coll ;
                     document.getElementById('cash_coll_6').value=cashcoll5;
                     document.getElementById('xcash_coll_6').value=cashcoll5;
            //alert('okeeh');
            });
            $("#bobot_7").keyup(function() { 
                 var jml= document.getElementById('jml_input').value;
                 var tot_cash_coll= document.getElementById('tot_cash_coll').value;
                     bobot5 = document.getElementById('bobot_7').value;
                     cashcoll5=(bobot5 /100)*tot_cash_coll ;
                     document.getElementById('cash_coll_7').value=cashcoll5;
                     document.getElementById('xcash_coll_7').value=cashcoll5;
            //alert('okeeh');
            });
            $("#bobot_8").keyup(function() { 
                 var jml= document.getElementById('jml_input').value;
                 var tot_cash_coll= document.getElementById('tot_cash_coll').value;
                     bobot5 = document.getElementById('bobot_8').value;
                     cashcoll5=(bobot5 /100)*tot_cash_coll ;
                     document.getElementById('cash_coll_8').value=cashcoll5;
                     document.getElementById('xcash_coll_8').value=cashcoll5;
            //alert('okeeh');
            });
            $("#bobot_9").keyup(function() { 
                 var jml= document.getElementById('jml_input').value;
                 var tot_cash_coll= document.getElementById('tot_cash_coll').value;
                     bobot5 = document.getElementById('bobot_9').value;
                     cashcoll5=(bobot5 /100)*tot_cash_coll ;
                     document.getElementById('cash_coll_9').value=cashcoll5;
                     document.getElementById('xcash_coll_9').value=cashcoll5;
            //alert('okeeh');
            });
            $("#bobot_10").keyup(function() { 
                 var jml= document.getElementById('jml_input').value;
                 var tot_cash_coll= document.getElementById('tot_cash_coll').value;
                     bobot5 = document.getElementById('bobot_10').value;
                     cashcoll5=(bobot5 /100)*tot_cash_coll ;
                     document.getElementById('cash_coll_10').value=cashcoll5;
                     document.getElementById('xcash_coll_10').value=cashcoll5;
            //alert('okeeh');
            });
            $("#bobot_11").keyup(function() { 
                 var jml= document.getElementById('jml_input').value;
                 var tot_cash_coll= document.getElementById('tot_cash_coll').value;
                     bobot5 = document.getElementById('bobot_5').value;
                     cashcoll5=(bobot5 /100)*tot_cash_coll ;
                     document.getElementById('cash_coll_11').value=cashcoll5;
                     document.getElementById('xcash_coll_11').value=cashcoll5;
            //alert('okeeh');
            });
            $("#bobot_12").keyup(function() { 
                 var jml= document.getElementById('jml_input').value;
                 var tot_cash_coll= document.getElementById('tot_cash_coll').value;
                     bobot5 = document.getElementById('bobot_12').value;
                     cashcoll5=(bobot5 /100)*tot_cash_coll ;
                     document.getElementById('cash_coll_12').value=cashcoll5;
                     document.getElementById('xcash_coll_12').value=cashcoll5;
            //alert('okeeh');
            });
            $("#bobot_13").keyup(function() { 
                 var jml= document.getElementById('jml_input').value;
                 var tot_cash_coll= document.getElementById('tot_cash_coll').value;
                     bobot5 = document.getElementById('bobot_13').value;
                     cashcoll5=(bobot5 /100)*tot_cash_coll ;
                     document.getElementById('cash_coll_13').value=cashcoll5;
                     document.getElementById('xcash_coll_13').value=cashcoll5;
            //alert('okeeh');
            });
            $("#bobot_14").keyup(function() { 
                 var jml= document.getElementById('jml_input').value;
                 var tot_cash_coll= document.getElementById('tot_cash_coll').value;
                     bobot5 = document.getElementById('bobot_14').value;
                     cashcoll5=(bobot5 /100)*tot_cash_coll ;
                     document.getElementById('cash_coll_14').value=cashcoll5;
                     document.getElementById('xcash_coll_14').value=cashcoll5;
            //alert('okeeh');
            });
            $("#bobot_15").keyup(function() { 
                 var jml= document.getElementById('jml_input').value;
                 var tot_cash_coll= document.getElementById('tot_cash_coll').value;
                     bobot5 = document.getElementById('bobot_15').value;
                     cashcoll5=(bobot5 /100)*tot_cash_coll ;
                     document.getElementById('cash_coll_15').value=cashcoll5;
                     document.getElementById('xcash_coll_15').value=cashcoll5;
            //alert('okeeh');
            });
            $("#bobot_16").keyup(function() { 
                 var jml= document.getElementById('jml_input').value;
                 var tot_cash_coll= document.getElementById('tot_cash_coll').value;
                     bobot5 = document.getElementById('bobot_16').value;
                     cashcoll5=(bobot5 /100)*tot_cash_coll ;
                     document.getElementById('cash_coll_16').value=cashcoll5;
                     document.getElementById('xcash_coll_16').value=cashcoll5;
            //alert('okeeh');
            });
            $("#bobot_17").keyup(function() { 
                 var jml= document.getElementById('jml_input').value;
                 var tot_cash_coll= document.getElementById('tot_cash_coll').value;
                     bobot5 = document.getElementById('bobot_17').value;
                     cashcoll5=(bobot5 /100)*tot_cash_coll ;
                     document.getElementById('cash_coll_17').value=cashcoll5;
                     document.getElementById('xcash_coll_17').value=cashcoll5;
            //alert('okeeh');
            });
            $("#bobot_18").keyup(function() { 
                 var jml= document.getElementById('jml_input').value;
                 var tot_cash_coll= document.getElementById('tot_cash_coll').value;
                     bobot5 = document.getElementById('bobot_18').value;
                     cashcoll5=(bobot5 /100)*tot_cash_coll ;
                     document.getElementById('cash_coll_18').value=cashcoll5;
                     document.getElementById('xcash_coll_18').value=cashcoll5;
            //alert('okeeh');
            });
            $("#bobot_19").keyup(function() { 
                 var jml= document.getElementById('jml_input').value;
                 var tot_cash_coll= document.getElementById('tot_cash_coll').value;
                     bobot5 = document.getElementById('bobot_19').value;
                     cashcoll5=(bobot5 /100)*tot_cash_coll ;
                     document.getElementById('cash_coll_19').value=cashcoll5;
                     document.getElementById('xcash_coll_19').value=cashcoll5;
            //alert('okeeh');
            });
            $("#bobot_20").keyup(function() { 
                 var jml= document.getElementById('jml_input').value;
                 var tot_cash_coll= document.getElementById('tot_cash_coll').value;
                     bobot5 = document.getElementById('bobot_20').value;
                     cashcoll5=(bobot5 /100)*tot_cash_coll ;
                     document.getElementById('cash_coll_20').value=cashcoll5;
                     document.getElementById('xcash_coll_20').value=cashcoll5;
            //alert('okeeh');
            });
            $("#bobot_21").keyup(function() { 
                 var jml= document.getElementById('jml_input').value;
                 var tot_cash_coll= document.getElementById('tot_cash_coll').value;
                     bobot5 = document.getElementById('bobot_21').value;
                     cashcoll5=(bobot5 /100)*tot_cash_coll ;
                     document.getElementById('cash_coll_21').value=cashcoll5;
                     document.getElementById('xcash_coll_21').value=cashcoll5;
            //alert('okeeh');
            });












/*            $("#bobot_1").keyup(function() { 
            alert('okeeh');
            });*/

/*    $('#division').on('change', function() {

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
       
    });*/

    $('.detailDelete').click(function() {
        var id_cif = $(this).attr('id-cif');
            $("#list-user").empty();
            $("#list-user").append( 
                '<tr>'+
                '<td>'+'<div class="alert alert-danger"><h5> Yakin Anda Akan Mendelete CIF   '+'<strong>' + id_cif +'</strong> ! </h5></div>'+
                '<input type="hidden" name="id_cif" value="'+id_cif+'">'+
                '</td></tr>');
    });

    $('#approval').click(function() {
            $("#list-user2").empty();
            $("#list-user2").append( 
                '<tr>'+
                '<td>'+'<div class="alert alert-info"><h5>  Yakin Anda Akan Melakukan Approve<strong> Prosentase Modal </strong> ! </h5></div>'+
                '</td></tr>');
    });




}); // document ready   $(document).ready(function() {


$(document).ready(function (e) {
    $("#form_sample_7").on('submit',(function(e) {
        e.preventDefault();

       //alert("ok");
        //$('#basic').modal('show');

//        $("#progress").hide(); 
//        $("#message").hide(); 
//        $("#targetLayer").hide();
//        $("#mytable").hide(); 
        //$("#mytable").empty();

        $.ajax({
            url: "modules/ajax/ajax_check_cif.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(html)
            {
                $(".varcif").html(html);
            //$("#targetLayer").show();
            //$("#targetLayer").html(html);
            //$("#mytable").show();
            //document.getElementById('nama_file').value="";
            //$("#sample_2").load(location.href+" #sample_2>*","");
            //$("#loading").hide();
            }

       });


            

    }));



/*
            $("#form_sample_8").on('submit',(function(e) { e.preventDefault();

                                 var jml= document.getElementById('jml_input').value;
                                 var tot_cash_coll= document.getElementById('tot_cash_coll').value;


                                 if (jml==1){
                                     bobot1 = document.getElementById('bobot_1').value;
                                     cashcoll1=(parseFloat(bobot1) /100)*parseFloat(tot_cash_coll) ;
                                        if(tot_cash_coll != cashcoll1){
                                            alert('Jumlah Cash Coll tidak Sama....');
                                           // throw 'Jumlah Cash Coll tidak Sama.... ';
                                        }

                                 }

                                 if (jml==2){
                                     bobot1 = document.getElementById('bobot_1').value;
                                     bobot2 = document.getElementById('bobot_2').value;
                                     cashcoll1 = document.getElementById('cash_coll_1').value;
                                     cashcoll2 = document.getElementById('cash_coll_2').value;
                                     //cashcoll=((bobot1+bobot2)/100)*(tot_cash_coll) ;
                                     cashcoll=(parseFloat(cashcoll1)+parseFloat(cashcoll2)) ;
                                     //cashcoll1=(bobot1 /100)*tot_c()sh_coll ;
                                        if(tot_cash_coll != cashcoll){
                                            // alert(cashcoll);
                                            alert('Jumlah Cash Coll tidak Sama.... '+cashcoll);
                                            //throw 'Jumlah Cash Coll tidak Sama.... ';
                                        }

                                 }

                                 if (jml==3){
                                     cashcoll1 = document.getElementById('cash_coll_1').value;
                                     cashcoll2 = document.getElementById('cash_coll_2').value;
                                     cashcoll3 = document.getElementById('cash_coll_3').value;
                                     cashcoll=(parseFloat(cashcoll1)+parseFloat(cashcoll2)+parseFloat(cashcoll3)) ;
                                        if(tot_cash_coll != cashcoll){
                                            // alert(cashcoll);
                                           alert('Jumlah Cash Coll tidak Sama.... '+cashcoll);
                                           //throw 'Jumlah Cash Coll tidak Sama.... ';
                                        }

                                 }

                                 if (jml==4){
                                     cashcoll1 = document.getElementById('cash_coll_1').value;
                                     cashcoll2 = document.getElementById('cash_coll_2').value;
                                     cashcoll3 = document.getElementById('cash_coll_3').value;
                                     cashcoll4 = document.getElementById('cash_coll_4').value;
                                     cashcoll=(parseFloat(cashcoll1)+parseFloat(cashcoll2)+parseFloat(cashcoll3)+parseFloat(cashcoll4)) ;
                                        if(tot_cash_coll != cashcoll){
                                            // alert(cashcoll);
                                           alert('Jumlah Cash Coll tidak Sama.... '+cashcoll);
                                           //throw 'Jumlah Cash Coll tidak Sama.... ';
                                        }

                                 }

                                 if (jml==5){
                                     cashcoll1 = document.getElementById('cash_coll_1').value;
                                     cashcoll2 = document.getElementById('cash_coll_2').value;
                                     cashcoll3 = document.getElementById('cash_coll_3').value;
                                     cashcoll4 = document.getElementById('cash_coll_4').value;
                                     cashcoll5 = document.getElementById('cash_coll_5').value;
                                     cashcoll=(parseFloat(cashcoll1)+parseFloat(cashcoll2)+parseFloat(cashcoll3)+parseFloat(cashcoll4)+parseFloat(cashcoll5)) ;
                                        if(tot_cash_coll != cashcoll){
                                            // alert(cashcoll);
                                           alert('Jumlah Cash Coll tidak Sama.... '+cashcoll);
                                           //throw 'Jumlah Cash Coll tidak Sama.... ';
                                        }

                                 }
                           
                                    
                            

    }));*/


}); // document ready   $(document).ready(function() {








    </script>