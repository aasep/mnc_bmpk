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


//echo session_id();

?>
    
<!-- <a class="btn green btn-outline sbold" data-toggle="modal" href="#basic"> ADD <?=getNamaMenu($module);?> <i class="icon-user-follow"></i> </a> -->
<!-- <br>
<br> -->




<!-- INPUT BIASA -->
                        <div class="portlet light portlet-fit portlet-form bordered">
                                <div class="portlet-title">
                                        <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase">ADD <?=getNamaMenu($module);?> </span>
                                        </div>  
                                        <a href="data/download/format/format_cc.xlsx" class="btn green pull-right" download=""> <i class="fa fa-download"></i> <b>Download Format Excel </b> </a>      
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
                        <!-- END VALIDATION STATES-->
                        </div>  
<!-- END INPUT BIASA -->
<div id="targetLayer"> </div>

<div class="progress progress-striped active" id="progress"  >  </div>
<div id="message" >  </div>

<br><br>    








                    <!-- END SIDEBAR CONTENT LAYOUT -->
                </div>

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
        $.ajax({
            url: "modules/ajax/ajax_upload_cc.php",
            type: "POST",
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            success: function(html)
            {
            $("#targetLayer").show();
            $("#targetLayer").html(html);
            document.getElementById('nama_file').value="";
            //$("#loading").hide();
            }

       });


        timer = window.setInterval(refreshProgress, 100);
            

    }));


}); // document ready   $(document).ready(function() {

    </script>