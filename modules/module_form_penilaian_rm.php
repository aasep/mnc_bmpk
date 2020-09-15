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
        "sAjaxSource": "../medicapps/modules/server_side/server_processing_penilaian_rm.php?act1=<?php echo "$act1&srcby=$srcby&srckey=$srckey&module=$module&pm=$pm";?>",
        "iDisplayLength": 10,
        "iDisplayStart": <?php echo $displayStart;?>
    });

    
    
}); // document ready   $(document).ready(function() {
</script> 

<?php
if ( isset($_GET['ext']) && ($_GET['ext'] =="detail")) {

/*print_r("<pre>");
print_r(getRekamMedikNew($_GET['id']));
print_r("</pre>");
*/
$rec=getRekamMedikNew($_GET['id']);

?>

<div class="portlet light portlet-fit portlet-form bordered"  id="pagenilai" >
                                <div class="portlet-title">
                                        <div class="caption">
                                                    <i class="icon-settings font-dark"></i>
                                                    <span class="caption-subject font-dark sbold uppercase"><?=getNamaMenu($module);?> </span>
                                        </div>       
                                </div>
                        <div class="portlet-body">

                            <!-- BEGIN FORM-->
                            <form action="<?php echo "modules/actions_master.php?module=$module&pm=$pm&act=penilaian_rm"; ?>" id="form_sample_3" class="form-horizontal"  method="POST" enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="alert alert-danger display-hide">
                                        <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                    <div class="alert alert-success display-hide">
                                        <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                                                       
                                        
<!--                             <div class="portlet box green">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="fa fa-cogs"></i> </div>
                                                
                                            </div>
                                            <div class="portlet-body">
                                                <div class="table-scrollable">
                                                <table class="table table-bordered table-striped table-condensed flip-content">
                                                    <thead class="flip-content">
                                                       
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td width="2%" class="active"></td>
                                                            <td width="30%" class="active" align="right"> <b>Nama Mahasiswa </b></td>
                                                            <td width="2%" class="active"> <i class="fa fa-hospital-o"></i> </td>
                                                            <td width="66%" class="active"> Joko Susilo</td>
                                                            
                                                        </tr>
                                                        <tr>
                                                            <td width="2%" class="active"></td>
                                                            <td width="30%" class="active" align="right"> <b>NIM  </b></td>
                                                            <td width="2%" class="active">  <i class="fa fa-user"></i> </td>
                                                            <td width="66%" class="active"> Joko Susilo</td>
                                                            
                                                        </tr>
                                                        
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                            </div>
                                        </div> -->
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label bold">Nama Mahasiswa
                                                                <span class="required">  </span>
                                                            </label>
                                                            <div class="col-md-3">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-user"></i>
                                                                    </span>
                                                                    <input type="text" name="nama_pasienx" value="<?=mhsName($rec['username'])?>" class="form-control" disabled="disabled"> </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label bold">NIM
                                                                <span class="required">  </span>
                                                            </label>
                                                            <div class="col-md-3">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-user"></i>
                                                                    </span>
                                                                    <input type="text" name="nama_pasienx" value="<?=$rec['username']?>" class="form-control" disabled="disabled"> </div>
                                                            </div>
                                                        </div>


                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label bold">No.Rekam Medik
                                                                <span class="required">  </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-hospital-o"></i>
                                                                    </span>
                                                                    <input type="text" name="no_rmx" value="<?=$rec['no_rek_medis']?>" data-required="1" class="form-control" disabled="disabled"/> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label bold">Nama Pasien
                                                                <span class="required"> </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-user"></i>
                                                                    </span>
                                                                    <input type="text" name="nama_pasienx" value="<?=$rec['nama_pasien']?>" class="form-control" disabled="disabled"> </div>
                                                            </div>
                                                        </div>
                                                       <div class="form-group">
                                                            <label class="control-label col-md-4 bold">Sex
                                                                <span class="required" >  </span>
                                                            </label>
                                                            <div class="col-md-1">
                                                                <select class="form-control" name="sexx" id="sex" disabled="disabled">
                                                                    
                                                                    <option value="<?=$rec['sex']=="L" ? "L" : "P"?>"> <?=$rec['sex']=="L" ? "L" : "P"?> </option>
                                                                    

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label bold">Age
                                                                <span class="required"> </span>
                                                            </label>
                                                            <div class="col-md-1">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-child"></i>
                                                                    </span>
                                                                    <input type="text" name="agex" value="<?=$rec['age']?>" class="form-control" disabled="disabled"> </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4 bold">Division
                                                                <span class="required">  </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <select class="form-control" name="divisionx" id="division" disabled="disabled">
                                                                    <option value="">Select...</option>

                                                            <?php
                                                                $query="select * from division order by divname asc";
                                                                $RS  = $db->Execute($query);
                                                                while(!$RS->EOF){
                                                                    if($RS->fields['divid']==$rec['divid']){
                                                                         echo "<option value='".$RS->fields['divid']."' selected='selected'>".$RS->fields['divname']."</option>";
                                                                    }
                                                                   
                                                                    $RS->MoveNext();
                                                                }
                                                            ?>
                                                                        
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4 bold">Diagnosis
                                                                <span class="required">  </span>
                                                            </label>
                                                            <div class="col-md-6">
                                                                <textarea class="form-control" rows="4" name="diagnosisx"  data-error-container="#editor1_error" disabled="disabled"><?=$rec['diagnosis']?></textarea>
                                                                <div id="editor1_error"> </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label bold">Management
                                                                <span class="required">  </span>
                                                            </label>
                                                            <div class="col-md-6">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-tags"></i>
                                                                    </span>
                                                                    <input type="text" name="managementx" value="<?=$rec['management']?>" class="form-control" placeholder="Management" disabled="disabled"> </div>
                                                            </div>
                                                        </div>
                                                        
                                                        

                                                        <div class="form-group">
                                                            <label class="control-label col-md-4 bold">Consultant
                                                                <span class="required">  </span>
                                                            </label>
                                                            <div class="col-md-4">
                                                                <select class="form-control select2me" name="consultantx" id="consultant" disabled="disabled">
                                                    
                                                    <?php 
                                                    echo "<option value='".consultantName($rec['id_dosen'])."' selected='selected'>".consultantName($rec['id_dosen'])."</option>";
                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>

                                                                <div class="form-group">
                            <label class="control-label col-md-4 bold">Action Capture 
                                  <span class="required">  </span>
                            </label>                    

                            <div class="portfolio-content portfolio-1 col-md-8">
                                <div id="js-grid-juicy-projects" class="cbp">
                                        <div class="cbp-item graphic col-md-4">
                                            <div class="cbp-caption">
                                                <div class="cbp-caption-defaultWrap" id="thumbx" >
                                                   <img src="images/img_pict1/<?=$rec[before_img]?>" alt="">  
                                                </div>
                                                <div class="cbp-caption-activeWrap">
                                                    <div class="cbp-l-caption-alignCenter">
                                                        <div class="cbp-l-caption-body" id="thumbx1">
                                                            <!-- <a href="assets/global/plugins/cubeportfolio/ajax/project1.html" class="cbp-singlePage cbp-l-caption-buttonLeft btn red uppercase btn red uppercase" rel="nofollow">more info</a> -->
                                                             <a href="images/img_pict1/<?=$rec[before_img]?>" class="cbp-lightbox cbp-l-caption-buttonRight btn red uppercase btn red uppercase" data-title="Before Action<br>by <?=mhsName($rec['username'])?>">view larger</a> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cbp-l-grid-projects-title uppercase text-center uppercase text-center">Before Action</div>
                                            <!-- <div class="cbp-l-grid-projects-desc uppercase text-center uppercase text-center">Web Design / Graphic</div> -->
                                        </div>
                                        <div class="cbp-item graphic col-md-4">
                                            <div class="cbp-caption">
                                                <div class="cbp-caption-defaultWrap" id="thumby">
                                                   <img src="images/img_pict2/<?=$rec[after_img]?>" alt="">
                                                </div>
                                                <div class="cbp-caption-activeWrap">
                                                    <div class="cbp-l-caption-alignCenter">
                                                        <div class="cbp-l-caption-body" id="thumby1" >
                                                           <!--  <a href="assets/global/plugins/cubeportfolio/ajax/project1.html" class="cbp-singlePage cbp-l-caption-buttonLeft btn red uppercase btn red uppercase" rel="nofollow">more info</a> -->
                                                            <a href="images/img_pict2/<?=$rec[after_img]?>" class="cbp-lightbox cbp-l-caption-buttonRight btn red uppercase btn red uppercase" data-title="After Action<br>by <?=mhsName($rec['username'])?>">view larger</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cbp-l-grid-projects-title uppercase text-center uppercase text-center">After Action</div>
                                            <!-- <div class="cbp-l-grid-projects-desc uppercase text-center uppercase text-center">Web Design / Graphic</div> -->
                                        </div>
                                </div>
                            </div>
                            </div>


                                             


                                    <div class="form-group">
                                                            <label class="control-label col-md-4 bold">Nilai
                                                                <span class="required" > * </span>
                                                            </label>
                                                            <div class="col-md-2">
                                                                <select class="form-control" name="nilai" id="nilai" >
                                                                    <option value="">Pilih Nilai...</option>
                                                                    <option value="A">  A </option>
                                                                    <option value="B">  B </option>
                                                                    <option value="C">  C </option>
                                                                    <option value="D">  D </option>
                                                                    <option value="E">  E </option>
                                                                </select>
                                                            </div>
                                    </div>
                                    <div class="form-group">
                                                            <label class="control-label col-md-4 bold">Recommendation/Comment
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <textarea class="form-control" rows="4" name="recomendation" id="recomendation" data-error-container="#editor1_error" ></textarea>
                                                                <div id="editor1_error"> </div>
                                                            </div>
                                    </div>


                                    <input type="hidden" name="rek_id" value="<?=$rec['rek_id']?>" >

                                                       
                                </div>

                                


                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" class="btn green">Submit</button>
                                                                <!-- <input type="submit" value="submit" class="btn green"> -->
                                                                <a href="<?=$page?>">
                                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    
                            </form>
                            <!-- END FORM-->
                        </div>
                        <!-- END VALIDATION STATES-->
                        </div> 




<?php
}else {

?>













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
 



<?php
}

?>










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

//alert("oke");


        $("#pagenilai").show();
        $("#thumb1").show();
        $("#thumb2").show();
        $("#pagelist").hide();

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
       

        //alert(before_img);


        document.getElementById('no_rm').value=no_rek_medis;
        document.getElementById('nama_pasien').value=nama_pasien;
        document.getElementById('age').value=age;
        document.getElementById('division').value=divid;
        document.getElementById('sex').value=sex;
        document.getElementById('diagnosis').value=diagnosis;

         $("#thumb1").empty();
         $("#thumb1").append( '<img src="images/img_pict1/'+before_img+'" alt=""/>');
         $("#thumb2").empty();
         $("#thumb2").append( '<img src="images/img_pict2/'+after_img+'" alt=""/>');

/*
         $("#thumbx").empty();
         $("#thumbx").append( '<img src="images/img_pict1/'+before_img+'" alt=""/>');
         //alert('<img src="images/img_pict1/'+before_img+'" alt=""/>');
         $("#thumbx1").empty();
         $("#thumbx1").append( '<a href="images/img_pict1/'+before_img+'" class="cbp-lightbox cbp-l-caption-buttonRight btn red uppercase btn red uppercase" data-title="Dashboard<br>by Paul Flavius Nechita">view larger</a>');
         $("#thumby").empty();
         $("#thumby").append( '<img src="images/img_pict2/'+after_img+'" alt=""/>');
         $("#thumby1").empty();
         $("#thumby1").append( '<a href="images/img_pict2/'+after_img+'" class="cbp-lightbox cbp-l-caption-buttonRight btn red uppercase btn red uppercase" data-title="Dashboard<br>by Paul Flavius Nechita">view larger</a>');*/


         var dataString5 = 'id='+divid;
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