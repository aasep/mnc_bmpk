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
        echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Successful Approved ....! </strong> </div>";
    }
    if (isset($_GET['message']) && ($_GET['message']=="error3")){
        echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Data Gagal Diapprove...!</strong> </div>";
    }

    if (isset($_GET['message']) && ($_GET['message']=="success4")){
        echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong> Successful Approved ....! </strong> </div>";
    }
    if (isset($_GET['message']) && ($_GET['message']=="error4")){
        echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>failed Approved ....!</strong> </div>";
    }


?>
    



<!--  Start Approval  -->


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
                                                    <span class="caption-subject font-dark sbold uppercase"><?=getNamaMenu($module);?> </span>
                                        </div>       
                                </div>
                        <div class="portlet-body">
                            <!-- BEGIN FORM-->
                            <form action="<?php echo "modules/actions_master.php?module=$module&pm=$pm&act=approve_map_cashcoll"; ?>" class="form-horizontal" method="POST" class="form-horizontal">
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
                                                                <button type="submit" class="btn red">Approve</button>
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



<!--  end Approval  -->





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

                        <table class="table table-striped table-bordered table-hover" id="sample_3">
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
                            if($RS2->fields['status']=="1"){
                            echo "<td><a href='#' > <button class='btn dark' disabled='disabled' > <b> Approve  </b></button></a></td>";    
                            }else{
                            echo "<td><a href='#'  data-toggle='modal' id-cif='".$RS2->fields['cfcif']."' data-target='#delete-modal' class='detailDelete' > <button class='btn red'> <b> Approve  </b></button></a></td>";

                            }
                            
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


    $('.detailDelete').click(function() {
        var id_cif = $(this).attr('id-cif');
            $("#list-user").empty();
            $("#list-user").append( 
                '<tr>'+
                '<td>'+'<div class="alert alert-danger"><h5> Yakin Anda Akan Mengapprove Cash Collateral  CIF   '+'<strong>' + id_cif +'</strong> ! </h5></div>'+
                '<input type="hidden" name="id_cif" value="'+id_cif+'">'+
                '</td></tr>');
    });




}); // document ready   $(document).ready(function() {

    </script>