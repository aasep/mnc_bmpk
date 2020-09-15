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
 <?php if (isTreasuryApp() || isBgApv() ) { ?>
<a class="btn red btn-outline sbold pull-right" data-toggle="modal" data-target="#approval-modal" href="#basic" id="approval"> APPROVAL  <?=getNamaMenu($module);?> <i class="icon-check"></i> </a>
<?php  } ?>
<br>
<br>                       
<br>
<br>
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
        echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Successful Approval ....! </strong> </div>";
    }
    if (isset($_GET['message']) && ($_GET['message']=="error4")){
        echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong>Data Gagal Approval...!</strong> </div>";
    }

//echo session_id();

?>
    
<!-- <a class="btn green btn-outline sbold" data-toggle="modal" href="#basic"> ADD <?=getNamaMenu($module);?> <i class="icon-user-follow"></i> </a> -->
<!-- <br>
<br> -->


 <?php if ( isTreasuryInp() || isBgInp()) { ?>

<!-- INPUT BIASA -->
                        <div class="portlet light portlet-fit portlet-form bordered">
                                <div class="portlet-title">
                                        <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">ADD <?=getNamaMenu($module);?> </span>
                                        </div>    
                                        <a href="data/download/format/format_bg.xlsx" class="btn green pull-right" download=""> <i class="fa fa-download"></i> <b>Download Format Excel </b> </a>    
                                </div>
                        <div class="portlet-body">
                            <!-- BEGIN FORM-->
                            <form action="" id="form_sample_7" class="form-horizontal"  method="POST" >
                                <div class="form-body">
                                    <div class="alert alert-danger display-hide">
                                        <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                    <div class="alert alert-success display-hide">
                                        <button class="close" data-close="alert"></button> Your form validation is successful! </div>
 
                                                    <div class="form-group">
                                                    <label class="control-label col-md-4 bold">File <span class="required">
                                                    * </span>
                                                    </label>
                                                    <div class="col-md-4">
                                                        <input type="file" name="nama_file" id="nama_file" class="form-control" required/>
                                                        <input type="hidden" name="file1" id="file1" class="form-control" >
                                                        
                                                    </div>
                                                </div>
                                                       
                                </div>
                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" class="btn green">Submit</button>
                                                                <!-- <input type="submit" value="submit" class="btn green"> -->
                                                                <!-- <button type="submit" class="btn green-haze" id="export-excel">  Upload Excel </button> -->
                                                            </div>
                                                        </div>
                                                    </div>
                            </form>
                            <!-- END FORM-->
                        </div>


<div id="targetLayer"> </div>


                    <div class="portlet light grey-steel bordered " id="mytable" style="display:none">
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
                                <th><b>Nama Debitur </b></th>
                                <th><b>Jenis Fasilitas</b></th>
                                <th><b>Plafon</b></th>
                                <th><b>Outstanding</b></th>
                                <th><b>Unused </b></th>
                                <th><b>Cash Colateral </b></th>
                                <th><b>Status </b></th>
                                <th><b>Ket </b></th>
                                <th><b>Last Update</b></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            $query =" select * from bmpk_bank_guarantee order by id_bg asc ";
                            //echo $query;
                            $RS2  = $db->Execute($query);
                           
                            while(!$RS2->EOF){
                            if($RS2->fields['status']=="0"){
                                 $status="<a href='#' class='btn red' disabled> <b> PENDING </b> </a>";
                            }else {
                                 $status="<a href='#' class='btn green' disabled> <b> APPROVED </b> </a>";
                            }
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td><b> $currency ".$RS2->fields['nama_debitur']." </b></td>";
                            echo "<td><b> ".$RS2->fields['jenis_fasilitas']." </b> </td>";
                            echo "<td><b>  ".number_format($RS2->fields['plfond'],2,".",",")." </b></td>";
                            echo "<td><b>  ".number_format($RS2->fields['outstanding'],2,".",",")." </b></td>";
                            echo "<td><b> ".number_format($RS2->fields['unused'],2,".",",")." </b></td>";
                            echo "<td><b> ".number_format($RS2->fields['cash_colateral'],2,".",",")." </b></td>";
                            echo "<td><b> ".$status." </b></td>";
                            echo "<td><b> ".$RS2->fields['keterangan']." </b></td>";
                            echo "<td><b> ".date('d-m-Y H:i:s',strtotime($RS2->fields['adddt']))." </b></td>";

                            echo "</tr>";
                            $i++;
                            $RS2->MoveNext();
                                    }
                            ?>


                            </tbody>
                            </table>
                        </div>
                    </div>


                        <!-- END VALIDATION STATES-->
                        </div>  
<!-- END INPUT BIASA -->
 <?php } else if (isTreasuryApp() || isBgApv() ) { ?>

                    <div class="portlet light grey-steel bordered " id="mytable" >
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
                        
                            
                            <table class="table table-striped table-bordered table-hover" id="sample_3">
                            <thead>
                            <tr>
                                <th><b>No</b></th>
                                <th><b>Nama Debitur </b></th>
                                <th><b>Jenis Fasilitas</b></th>
                                <th><b>Plafon</b></th>
                                <th><b>Outstanding</b></th>
                                <th><b>Unused </b></th>
                                <th><b>Cash Colateral </b></th>
                                <th><b>Status </b></th>
                                <th><b>Ket </b></th>
                                <th><b>Last Update</b></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            $query =" select * from bmpk_bank_guarantee order by id_bg asc ";
                            //echo $query;
                            $RS2  = $db->Execute($query);
                           
                            while(!$RS2->EOF){
                            if($RS2->fields['status']=="0"){
                                 $status="<a href='#' class='btn red' disabled> <b> PENDING </b> </a>";
                            }else {
                                 $status="<a href='#' class='btn green' disabled> <b> APPROVED </b> </a>";
                            }
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td><b> $currency ".$RS2->fields['nama_debitur']." </b></td>";
                            echo "<td><b> ".$RS2->fields['jenis_fasilitas']." </b> </td>";
                            echo "<td><b>  ".number_format($RS2->fields['plfond'],2,".",",")." </b></td>";
                            echo "<td><b>  ".number_format($RS2->fields['outstanding'],2,".",",")." </b></td>";
                            echo "<td><b> ".number_format($RS2->fields['unused'],2,".",",")." </b></td>";
                            echo "<td><b> ".number_format($RS2->fields['cash_colateral'],2,".",",")." </b></td>";
                            echo "<td><b> ".$status." </b></td>";
                            echo "<td><b> ".$RS2->fields['keterangan']." </b></td>";
                            echo "<td><b> ".date('d-m-Y H:i:s',strtotime($RS2->fields['adddt']))." </b></td>";

                            echo "</tr>";
                            $i++;
                            $RS2->MoveNext();
                                    }
                            ?>


                            </tbody>
                            </table>
                        </div>
                    </div>

<?php }  ?>

<div class="progress progress-striped active" id="progress"  >  </div>
<div id="message" >  </div>

<br><br>    








                    <!-- END SIDEBAR CONTENT LAYOUT -->
                </div>









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
                            <form action="<?php echo "modules/actions_master.php?module=$module&pm=$pm&act=approve_bank_guarantee"; ?>" class="form-horizontal" method="POST" class="form-horizontal">
                                <div class="form-body">
                                    <div class="alert alert-danger display-hide">
                                        <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                    <div class="alert alert-success display-hide">
                                        <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                                                       
                                                        <div  class="alert alert-info" id="list-user2">

                                                           <b> Apakah Anda Yakin Akan Melakukan Approve Bank Guarantee ! </b>
                                                            
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





                <!-- <script type="text/javascript" src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
                <script type="text/javascript" src="assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>  -->

                
<!--                 <script src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>  --> 
               <!--  <script src="assets/pages/scripts/form-validation.min.js" type="text/javascript"></script> -->
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script>

/*PROGRESS BAR */

   var timer;
 
    // The function to refresh the progress bar.
    function refreshProgress() {
        $("#progress").show();
        $("#message").show();
      // We use Ajax again to check the progress by calling the checker script.
      // Also pass the session id to read the file because the file which storing the progress is placed in a file per session.
      // If the call was success, display the progress bar.
      $.ajax({
        url: "modules/ajax/checker.php?file=<?php echo session_id() ?>",
        success:function(data){
          $("#progress").html('<div class="bar" style="width:' + data.percent + '%"></div>');
          $("#progress").html('<div  class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:'+ data.percent+'%"><span class="countdown-holder">' +data.percent +' % </span></div>');

                                        
          $("#message").html(data.message);
          // If the process is completed, we should stop the checking process.
          if (data.percent >= 100) {
            window.clearInterval(timer);
            timer = window.setInterval(completed, 100);
            $("#progress").hide(); 

          }
        }
      });
    }
 
    function completed() {
      //$("#message").html("Completed");
      $("#progress").hide();
      $("#message").hide(); 
      window.clearInterval(timer);
    }

/*END PROGRESS BAR */


$(document).ready(function (e) {
    $("#form_sample_7").on('submit',(function(e) {
        e.preventDefault();
        $("#progress").hide(); 
        $("#message").hide(); 
        $("#targetLayer").hide();
        $("#mytable").hide(); 
        //$("#mytable").empty();
        $.ajax({
            url: "modules/ajax/ajax_upload_bg.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(html)
            {
            $("#targetLayer").show();
            $("#targetLayer").html(html);
            $("#mytable").show();
            document.getElementById('nama_file').value="";
            $("#sample_2").load(location.href+" #sample_2>*","");
            //$("#loading").hide();
            }

       });


        timer = window.setInterval(refreshProgress, 100);
            

    }));


}); // document ready   $(document).ready(function() {

    </script>