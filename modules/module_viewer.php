<?php
$module=$_GET['module'];
$pm=$_GET['pm'];
$page_tmp = $_SERVER['PHP_SELF']."?module=$module&pm=$pm";
$page=str_replace(".php","",$page_tmp);

###########################################################

########### STATUS COMPLIANCE REGULATOR ###################
$totalPlafon=TotalPlafonPT();
//----- pihak terkait -------
//$status_PT_Regulator=TotalmodalBank()*(10/100)
//$limit_bmpk_regulator = TotalmodalBank()*(10/100);
//$limit_bmpk_internal  = (TotalmodalBank()*(10/100))*(90/100);

//limitBMPK_PTKP()
//limitBMPK_PTBKP()
$limit_bmpk_regulator = limitBMPK_PT();
$limit_bmpk_internal  = (limitBMPK_PT())*(90/100);
$limit_bmpk_regulatorPTKP = limitBMPK_PTKP();
$limit_bmpk_internalPTKP  = (limitBMPK_PTKP())*(90/100);
$limit_bmpk_regulatorPTBKP = limitBMPK_PTBKP();
$limit_bmpk_internalPTBKP  = (limitBMPK_PTBKP())*(90/100);
############################################## NON BDS #########################################
$totalcreditCard    = TotalcreditCard();
$totalTreasury      = Totaltreasury();
$totalBankGuarantee = TotalbankGuarantee();

//outstanding
//ccollateral
//plafon



$total_all_pt_ccol   = TotalCcollateralBDS_PT() + $totalcreditCard["ccollateral"] + $totalTreasury["ccollateral"] + $totalBankGuarantee["ccollateral"];
$total_all_pt_plaf   = TotalPlafonPT() + $totalcreditCard["plafon"] + $totalTreasury["plafon"] + $totalBankGuarantee["plafon"];
$total_all_pt_outs   = TotalOutstandingBDS() + $totalcreditCard["outstanding"] + $totalTreasury["outstanding"] + $totalBankGuarantee["outstanding"];

$total_ekp_pt_plaf   = ($totalPlafon-TotalCcollateralBDS_PT()) + ($totalTreasury["plafon"]-$totalTreasury["ccollateral"]) + ($totalcreditCard["plafon"]-$totalcreditCard["ccollateral"]) + ($totalBankGuarantee["plafon"]-$totalBankGuarantee["ccollateral"]);
$total_ekp_pt_outs   = (TotalOutstandingBDS()-TotalCcollateralBDS_PT()) + ($totalTreasury["outstanding"]-$totalTreasury["ccollateral"]) + ($totalcreditCard["outstanding"]-$totalcreditCard["ccollateral"]) + ($totalBankGuarantee["outstanding"]-$totalBankGuarantee["ccollateral"]);

$total_ekp_pt   = (TotalEkpsBMPK_bdsPT()) + (TotalEkpsBMPK_trPT()) + ($totalcreditCard["plafon"]-$totalcreditCard["ccollateral"]) + (TotalEkpsBMPK_bgPT());


if( $total_ekp_pt > $limit_bmpk_regulator ){
    $status_PT_Regulator="YES";
    $colorPTReg="danger";
}else{
    $status_PT_Regulator="NO";
    $colorPTReg="success";
}

if( $total_ekp_pt > $limit_bmpk_internal ){
    $status_PT_Internal="YES";
    $colorPTInt="danger";
}else{
    $status_PT_Internal="NO";
    $colorPTInt="success";
}
######################################### PIHAK TIDAK TERKAIT KELOMPOK PEMINJAM ##############################################3

$total_PTTKP    = TotalPTTkp();
$totPlafonPTTKP = $total_PTTKP["plafon"];
$totOutsPTTKP   = $total_PTTKP["outstanding"];

$totEkspPTTKP=TotalEkpsBMPK_bdsPTTKP();

if( $totEkspPTTKP > $limit_bmpk_regulatorPTKP ){
    $status_PTTKP_Regulator="YES";
    $colorPTTKPReg="danger";
}else{
    $status_PTTKP_Regulator="NO";
    $colorPTTKPReg="success";
}

if( $totEkspPTTKP > $limit_bmpk_internalPTKP ){
    $status_PTTKP_Internal="YES";
    $colorPTTKPInt="danger";
}else{
    $status_PTTKP_Internal="NO";
    $colorPTTKPInt="success";
}


//die();
$prosentase_ekpsBMPK_PTreg = ($limit_bmpk_regulator-$total_ekp_pt) * 100 /($limit_bmpk_regulator);
if ( $prosentase_ekpsBMPK_PTreg >100 ){
     $prosentase_ekpsBMPK_PTreg=100;
}else if( $prosentase_ekpsBMPK_PTreg < 0 ){
     $prosentase_ekpsBMPK_PTreg=0;
}else{
     $prosentase_ekpsBMPK_PTreg=$prosentase_ekpsBMPK_PTreg;
}

$prosentase_ekpsBMPK_PTint = ($limit_bmpk_internal-$total_ekp_pt) * 100 /($limit_bmpk_internal);
if ( $prosentase_ekpsBMPK_PTint >100 ){
     $prosentase_ekpsBMPK_PTint=100;
}else if( $prosentase_ekpsBMPK_PTint < 0 ){
     $prosentase_ekpsBMPK_PTint=0;
}else{
     $prosentase_ekpsBMPK_PTint=$prosentase_ekpsBMPK_PTint;
}


?>

<?php 
if (!isset($_GET['id'])) {

?>
<!-- =============== START HOME FRONT ============ -->

<div class="page-content">
     <?php
    if (isset($_GET['message']) && ($_GET['message']=="success-reserve")){
        echo "<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong> Successful Inserted Reserve ...! </strong> </div>";
     }
    if (isset($_GET['message']) && ($_GET['message']=="error-reserve")){
        echo "<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'></button><strong> Failed Inserted Reserve...!</strong> </div>";
    }
    ?>
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        
                        <div class="m-heading-1 border-green m-bordered">
                                     <h1> <i class="fa fa-home"></i> HOME Dashboard </h1> 

                                     <p> Dashboard Information </p>
                                        <!-- <a class="btn red btn-outline" href="http://jqueryvalidation.org"
                                            target="_blank">the official documentation</a> -->
                                    
                                </div>
                        <!-- Sidebar Toggle Button -->
                       
                        <!-- Sidebar Toggle Button -->
                    </div>

                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-social-dribbble font-blue-sharp"></i>
                                        <span class="caption-subject font-blue-sharp bold uppercase"> MODAL BANK </span>
                                    </div>
                                    
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-hover table-striped table-bordered" width="100%">
                                        <tbody>
                                        <tr class="success">
                                            <td width="15%"> <i class="fa fa-forward"> </i> <b>Modal Inti Bank</b> </td>
                                            <td width="15%" align="right"><b><?=number_format(JmlModalInti(),2,".",",")?></b></td>
                                            <td width="70%"><?php 
                                            if (ModalBankStatus("1")){
                                                echo "<button class='btn dark' disabled='disabled'><i class='fa fa-check-square font-green'></i> <b>Updated </b></button>";
                                            }else{
                                                echo "<button class='btn red' disabled='disabled'><i class='fa fa-warning font-yellow-crusta' ></i> <b> Waiting Approval </b></button>";
                                            } 
                                            ?></td>
                                        </tr>
                                        <tr class="success">
                                            <td width="15%"> <i class="fa fa-forward"> </i> <b>Modal Pelengkap </b> </td>
                                            <td width="15%" align="right"><b><?=number_format(JmlModalpelengkap(),2,".",",")?></b></td>
                                            <td width="70%"><?php 
                                            if (ModalBankStatus("4")){
                                                echo "<button class='btn dark' disabled='disabled'><i class='fa fa-check-square font-green'></i> <b>Updated </b></button>";
                                            }else{
                                                echo "<button class='btn red' disabled='disabled'><i class='fa fa-warning font-yellow-crusta' ></i> <b> Waiting Approval </b></button>";
                                            } 
                                            ?></td>
                                        </tr>
                                        <tr class="success">
                                            <td width="15%"> <i class="fa fa-stop"> </i> <b>Total Modal</b> </td>
                                            <td width="15%" align="right"><b><?=number_format(TotalmodalBank(),2,".",",")?></b></td>
                                            <td width="70%"> <!-- <button class="btn dark" disabled="disabled"><i class="fa fa-check-square font-blue"></i> <b>Updated </b></button> --></td>
                                        </tr>
                                        
                                    </tbody></table>
                                </div>
                            </div>
                   
<div class="portlet light bordered">
                    <div class="table-scrollable">
                                        <table class="table table-striped table-bordered table-advance table-hover">
                                            <thead>
                                                <tr class="active">
                                                <td rowspan="2" width="30%" align="center"><b></b></td>
                                                <td colspan="2" width="30%" align="center"><b>BMPK REGULATOR </b></td>
                                                <td colspan="2" width="30%" align="center"><b>BMPK INTERNAL MNC </b></td>
                                                <td rowspan="2" width="10%" align="center"><b>DETAIL </b></td>
                                                </tr>
                                                <tr class="active">
                                                <td width="15%" align="center"><b>LIMIT</b></td>
                                                <td width="15%" align="center"><b>COMPLIANCE </b></td>
                                                
                                                <td width="15%" align="center"><b>LIMIT</b></td>
                                                <td width="15%" align="center"><b>COMPLIANCE </b></td>
                                                <!-- <td width="15%" align="center"><b>Sub Total 1 </b></td> -->
                                                
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="highlight"><div class="btn-group btn-group btn-group-justified">
                                                                <a href="javascript:;" class="btn dark"> <b>PIHAK TERKAIT BANK </b><br><i>Pihak terkait MNC Bank Internasional</i></a>
                                                            </div></td>
                                                    <td class="hidden-xs" align="right"><h5><b><?=number_format($limit_bmpk_regulator,2,".",",")?></b></h5> <br> <span class="label label-primary"> <?php echo prosentase_limitBMPK_PT();?> % dari <?php echo getNamaModal(getIdModal("1")); ?> </span></td>
                                                    <td class="<?=$colorPTReg?>" align="center"> <h2><b><?=$status_PT_Regulator ?> </b></h2></td>
                                                    <td class="hidden-xs" align="right"><h5><b><?=number_format($limit_bmpk_internal,2,".",",")?></b></h5> <br> <span class="label label-primary"> 90 % dari limit regulator </span></td>
                                                    <td class="<?=$colorPTInt?>" align="center"> <h2><b><?=$status_PT_Internal?></b></h2></td>
                                                    <td> <a href="<?php echo "$page&id=1"?>" class="btn dark btn-sm btn-outline sbold uppercase">
                                                            <i class="fa fa-share"></i> View </a></td>
                                                </tr>
                                                <tr>
                                                    <td class="highlight"><div class="btn-group btn-group btn-group-justified">
                                                                <a href="javascript:;" class="btn dark"> <b>PIHAK TIDAK TERKAIT BANK </b>
                                                                    <br> <i>Kelompok Peminjam</i> </a>
                                                            </div></td>
                                                    <td class="hidden-xs" align="right"><h5><b><?=number_format($limit_bmpk_regulatorPTKP,2,".",",")?></b></h5> <br> <span class="label label-primary"> <?php echo prosentase_limitBMPK_PTKP();?> % dari <?php echo getNamaModal(getIdModal("12")); ?> </span></td>
                                                    <td class="<?=$colorPTTKPReg?>" align="center"> <h2><b><?=$status_PTTKP_Regulator ?> </b></h2></td>
                                                    <td class="hidden-xs" align="right"><h5><b><?=number_format($limit_bmpk_internalPTKP,2,".",",")?></b></h5> <br> <span class="label label-primary"> 90 % dari limit regulator </span></td>
                                                    <td class="<?=$colorPTTKPInt?>" align="center"> <h2><b><?=$status_PTTKP_Internal ?> </b></h2></td>
                                                    <td> <!-- <a href="<?php echo "$page&id=2"?>" class="btn dark btn-sm btn-outline sbold uppercase" disabled="disabled">
                                                            <i class="fa fa-share"></i> View </a> --></td>
                                                </tr>
                                                <tr>
                                                    <td class="highlight"><div class="btn-group btn-group btn-group-justified">
                                                                <a href="javascript:;" class="btn dark"> <b>PIHAK TIDAK TERKAIT BANK </b>
                                                                <br> <i>Bukan Kelompok Peminjam</i></a>
                                                            </div></td>
                                                    <td class="hidden-xs" align="right"><h5><b><?=number_format($limit_bmpk_regulatorPTBKP,2,".",",")?></b></h5> <br> <span class="label label-primary"> <?php echo prosentase_limitBMPK_PTBKP();?> % dari <?php echo getNamaModal(getIdModal("13")); ?> </span></td>
                                                     <td class="success" align="center"> <h2><b>NO </b></h2></td>
                                                    <td class="hidden-xs" align="right"><h5><b><?=number_format($limit_bmpk_internalPTBKP,2,".",",")?></b></h5> <br> <span class="label label-primary"> 90 % dari limit regulator </span></td>
                                                    <td class="success" align="center"> <h2><b>NO </b></h2></td>
                                                    <td> <!-- <a href="<?php echo "$page&id=3"?>" class="btn dark btn-sm btn-outline sbold uppercase" disabled="disabled">
                                                            <i class="fa fa-share"></i> View </a> --></td>
                                                </tr>
                                               
                                            </tbody>
                                        </table>
                    </div>
</div>

                    <div class="breadcrumbs">
                        
                        <div class="m-heading-1 border-red m-bordered">
                                     <h1 class="font-red"> <i class="fa fa-warning font-red bold"></i> <b>RESERVED </b> </h1> 

                                     <!-- <p class="font-red bold" > 1,170,853,399,912 </p> --> 
                                     <a href="#" class="btn btn red sbold uppercase bold" disabled> IDR 
                                     <?php echo number_format(getTotalReserve(),2,".",",") ;?> </a> 
                                    <a href="#" class="btn btn green sbold uppercase" data-toggle="modal" data-target="#list-reserves" > 
                                    <i class="fa fa-info-circle"></i>  VIEW LIST RESERVE  </a>
                                    <?php if (getGroupUser()=='14') {  ?>
                                    <a href="#" class="btn btn blue sbold uppercase" data-toggle="modal" data-target="#input-reserve">
                                    <i class="fa fa-share"></i> INPUT RESERVE  <i class="fa fa-reply"></i> </a>
                                    <?php }  ?>
                                    
                                </div>
                        <!-- Sidebar Toggle Button -->
                       
                        <!-- Sidebar Toggle Button -->
                    </div>

    </div>

<!-- =============== END HOME FRONT ============ -->
<?php 
}

?>


<?php 
if (isset($_GET['id']) && $_GET['id']=="1") {

?>
<!-- ==========($_GET['id']==== START HOME FRONT ============ -->

<div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        
                        <div class="m-heading-1 border-green m-bordered">
                                     <h1> <i class="fa fa-home"></i> PIHAK TERKAIT BANK  </h1> 

                                     <p> Dashboard Information Pihak Terkait </p>
                                    
                                </div>
                        <!-- Sidebar Toggle Button -->
                       
                        <!-- Sidebar Toggle Button -->
                    </div>

                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-social-dribbble font-blue-sharp"></i>
                                        <span class="caption-subject font-blue-sharp bold uppercase"> MODAL BANK = IDR <?php echo number_format(TotalmodalBank(),2,".",",");?></span>
                                    </div>
                                    
                                </div>
                                <div class="portlet-body">
                                    
                                </div>
                            </div>
                   
<div class="portlet light bordered">
                    <div class="table-scrollable">
                                        <table class="table table-striped table-bordered table-advance table-hover">
                                            <thead>
                                                <tr class="active">
                                                <td rowspan="2" colspan="2" width="40%" align="center"><b>LIMIT BMPK REGULATOR</b></td>
                                                <td colspan="2" width="30%" align="center"><b>Available Limit by Ekposure BMPK </b></td>
                                                <!-- <td colspan="2" width="30%" align="center"><b>Available Limit by Outstanding </b></td> -->
                                                
                                                </tr>
                                                <tr class="active">
                                                <td width="15%" align="center"><b>Amount</b></td>
                                                <td width="15%" align="center"><b>% </b></td>
                                                
                                                <!-- <td width="15%" align="center"><b>Amount</b></td>
                                                <td width="15%" align="center"><b>% </b></td> -->
                                                <!-- <td width="15%" align="center"><b>Sub Total 1 </b></td> -->
                                                
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td width="20%" class="highlight"><div class="btn-group btn-group btn-group-justified">
                                                                <a href="javascript:;" class="btn dark"> <b>Regulator </b><br> Bank Indonesia (BI) </a>
                                                            </div></td>
                                                     <td  width="20%" class="hidden-xs" align="right"><b><?=number_format($limit_bmpk_regulator,2,".",",")?></b> <br><br> <span class="label label-primary"> <?php echo prosentase_limitBMPK_PT();?> % dari <?php echo getNamaModal(getIdModal("1")); ?> </span></td>
                                                    <td width="15%" class="hidden-xs" align="right"><b><?=number_format($limit_bmpk_regulator-$total_ekp_pt,2,".",",")?></b></td>
                                                    <td width="15%" class="hidden-xs" align="right"><b><?=number_format($prosentase_ekpsBMPK_PTreg,2,".",",")?></b></td>
                                                    <!-- <td width="15%" class="hidden-xs" align="right"><b><?=number_format($limit_bmpk_regulator-$total_ekp_pt_outs,2,".",",")?></b></td> -->
                                                    <!-- <td width="15%" class="hidden-xs" align="right"><b><?=number_format(($limit_bmpk_regulator-$total_ekp_pt_outs) * 100 /($limit_bmpk_regulator),2,".",",")?></b></td> -->
                                                    
                                                </tr>
                                                <tr>
                                                    <td class="highlight"><div class="btn-group btn-group btn-group-justified">
                                                                <a href="javascript:;" class="btn dark"> <b>Internal </b> <br> Bank MNC Internasional
                                                                     </a>
                                                            </div></td>
                                                    <td class="hidden-xs" align="right"><b><?=number_format($limit_bmpk_internal,2,".",",")?></b><br><br> <span class="label label-primary"> 90 % dari limit regulator </span></td>
                                                    <td class="hidden-xs" align="right"><b><?=number_format($limit_bmpk_internal-$total_ekp_pt,2,".",",")?></b></td>
                                                    <td class="hidden-xs" align="right"><b><?=number_format($prosentase_ekpsBMPK_PTint,2,".",",")?></b></td>
                                                    <!-- <td class="hidden-xs" align="right"><b><?=number_format($limit_bmpk_internal-$total_ekp_pt_outs,2,".",",")?></b></td> -->
                                                    <!-- <td class="hidden-xs" align="right"><b><?=number_format(($limit_bmpk_internal-$total_ekp_pt_outs)*100/($limit_bmpk_internal),2,".",",")?></b></td>
 -->                                                </tr>
                                                
                                               
                                            </tbody>
                                        </table>
                    </div>
</div>


<div class="portlet light bordered">
                    <div class="table-scrollable">
                                        <table class="table table-striped table-bordered table-advance table-hover">
                                            <thead>
                                                <tr class="active">
                                                <td width="20%" align="center"><b>SUMBER INFORMASI</b></td>
                                                <td width="15%" align="center"><b>Cash Collateral </b></td>
                                                <td width="15%" align="center"><b>Plafond </b></td><!-- 
                                                <td width="15%" align="center"><b>Eksposure BMPK Plafond </b></td> -->
                                                <td width="15%" align="center"><b>Outstanding </b></td>
                                                <td width="15%" align="center"><b>Total Eksposure BMPK </b></td>
                                                <td width="5%" align="center"><b>Detail</b></td>

                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="highlight"><div class="btn-group btn-group btn-group-justified">
                                                                <a href="javascript:;" class="btn dark"> <b>System BDS </b>
                                                                     </a>
                                                            </div></td>
                                                    <td class="hidden-xs bold" align="right"><?=number_format(TotalCcollateralBDS_PT(),2,".",",")?></td>
                                                    <td class="hidden-xs bold" align="right"><?=number_format($totalPlafon,2,".",",")?></td>
                                                    <!-- <td class="hidden-xs bold" align="right"><?=number_format($totalPlafon-TotalCcollateralBDS_PT(),2,".",",")?></td> -->
                                                    <td class="hidden-xs bold" align="right"><?=number_format(TotalOutstandingBDS(),2,".",",")?></td>
                                                    <td class="hidden-xs bold" align="right"><?=number_format(TotalEkpsBMPK_bdsPT(),2,".",",")?> </td>
                                                    <td> <a href="<?php echo "$page&id=11"?>" class="btn dark btn-sm btn-outline sbold uppercase">
                                                            <i class="fa fa-share"></i> View </a></td>
                                                </tr>
                                                <tr>
                                                    <td class="highlight"><div class="btn-group btn-group btn-group-justified">
                                                                <a href="javascript:;" class="btn dark"> <b>Treasury </b>
                                                                     </a>
                                                            </div></td>
                                                    <td class="hidden-xs bold" align="right"><?=number_format($totalTreasury["ccollateral"],2,".",",")?></td>
                                                    <td class="hidden-xs bold" align="right"><?=number_format($totalTreasury["plafon"],2,".",",")?></td>
                                                   <!--  <td class="hidden-xs bold" align="right"><?=number_format($totalTreasury["plafon"]-$totalTreasury["ccollateral"],2,".",",")?></td> -->
                                                    <td class="hidden-xs bold" align="right"><?=number_format($totalTreasury["outstanding"],2,".",",")?></td>
                                                    <td class="hidden-xs bold" align="right"><?=number_format(TotalEkpsBMPK_trPT(),2,".",",")?></td>
                                                    <td> <a href="<?php echo "$page&id=12"?>" class="btn dark btn-sm btn-outline sbold uppercase">
                                                            <i class="fa fa-share"></i> View </a></td>
                                                </tr>
                                                 <tr>
                                                    <td class="highlight"><div class="btn-group btn-group btn-group-justified">
                                                                <a href="javascript:;" class="btn dark"> <b>Kartu Kredit </b>
                                                                     </a>
                                                            </div></td>
                                                    <td class="hidden-xs bold" align="right"><?=number_format($totalcreditCard["ccollateral"],2,".",",")?></td>
                                                    <td class="hidden-xs bold" align="right"><?=number_format($totalcreditCard["plafon"],2,".",",")?></td>
                                                   <!--  <td class="hidden-xs bold" align="right"><?=number_format($totalcreditCard["plafon"]-$totalcreditCard["ccollateral"],2,".",",")?></td> -->
                                                    <td class="hidden-xs bold" align="right"><?=number_format($totalcreditCard["outstanding"],2,".",",")?></td>
                                                    <td class="hidden-xs bold" align="right"><?=number_format($totalcreditCard["plafon"]-$totalcreditCard["ccollateral"],2,".",",")?></td>
                                                    <td> <a href="<?php echo "$page&id=13"?>" class="btn dark btn-sm btn-outline sbold uppercase">
                                                            <i class="fa fa-share"></i> View </a></td>
                                                </tr>
                                                 <tr>
                                                    <td class="highlight"><div class="btn-group btn-group btn-group-justified">
                                                                <a href="javascript:;" class="btn dark"> <b>Bank Guarantee </b>
                                                                     </a>
                                                            </div></td>
                                                    <td class="hidden-xs bold" align="right"><?=number_format($totalBankGuarantee["ccollateral"],2,".",",")?></td>
                                                    <td class="hidden-xs bold" align="right"><?=number_format($totalBankGuarantee["plafon"],2,".",",")?></td>
                                                   <!--  <td class="hidden-xs bold" align="right"><?=number_format($totalBankGuarantee["plafon"]-$totalBankGuarantee["ccollateral"],2,".",",")?></td> -->
                                                    <td class="hidden-xs bold" align="right"><?=number_format($totalBankGuarantee["outstanding"],2,".",",")?></td>
                                                    <td class="hidden-xs bold" align="right"><?=number_format(TotalEkpsBMPK_bgPT(),2,".",",")?></td>
                                                    <td> <a href="<?php echo "$page&id=14"?>" class="btn dark btn-sm btn-outline sbold uppercase">
                                                            <i class="fa fa-share"></i> View </a></td>
                                                </tr>
                                                 <tr class="active">


 

                                                    <td class="hidden-xs bold" align="center"> <b>Total </b></a></td>
                                                    <td class="hidden-xs bold" align="right"><?=number_format($total_all_pt_ccol,2,".",",")?></td>
                                                    <td class="hidden-xs bold" align="right"><?=number_format($total_all_pt_plaf,2,".",",")?></td>
                                                    <!-- <td class="hidden-xs bold" align="right"><?=number_format($total_ekp_pt_plaf,2,".",",")?></td> -->
                                                    <td class="hidden-xs bold" align="right"><?=number_format($total_all_pt_outs,2,".",",")?></td>
                                                    <td class="hidden-xs bold" align="right"><?=number_format($total_ekp_pt,2,".",",")?></td>
                                                    <td class="hidden-xs" align="right"></td>
                                                </tr>
                                                 
                                               
                                            </tbody>
                                        </table>
                    </div>
</div>


                    <div class="breadcrumbs">
                        
                        <div class="m-heading-1 border-red m-bordered">
                                     <h1 class="font-red"> <i class="fa fa-warning font-red bold"></i> <b>RESERVED </b> </h1> 

                                     <!-- <p class="font-red bold" > 1,170,853,399,912 </p> --> 
                                     <a href="#" class="btn btn red sbold uppercase bold" disabled> IDR 
                                     <?php echo number_format(getTotalReserve(),2,".",",") ;?> </a> 
                                    <a href="#" class="btn btn green sbold uppercase" data-toggle="modal" data-target="#list-reserves" > 
                                    <i class="fa fa-info-circle"></i>  VIEW LIST RESERVE  </a>
                                    <?php if (getGroupUser()=='14') {  ?>
                                    <a href="#" class="btn btn blue sbold uppercase" data-toggle="modal" data-target="#input-reserve">
                                    <i class="fa fa-share"></i> INPUT RESERVE  <i class="fa fa-reply"></i> </a>
                                    <?php   }   ?>
                                </div>
                        <!-- Sidebar Toggle Button -->
                       
                        <!-- Sidebar Toggle Button -->
                    </div>
                           




    </div>

<!-- =============== END HOME FRONT ============ -->
<?php 
}

?>









<?php 
if (isset($_GET['id']) && $_GET['id']=="2") {

?>
<!-- =============== START HOME PIHAK TIDAK TERKAIT KELOMPOK PEMINJAM ============ -->

<div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        
                        <div class="m-heading-1 border-green m-bordered">
                                     <h1> <i class="fa fa-home"></i> PIHAK TIDAK TERKAIT BANK  </h1> 

                                     <p> Kelompok Peminjam </p>
                                        <!-- <a class="btn red btn-outline" href="http://jqueryvalidation.org"
                                            target="_blank">the official documentation</a> -->
                                    
                                </div>
                        <!-- Sidebar Toggle Button -->
                       
                        <!-- Sidebar Toggle Button -->
                    </div>
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-social-dribbble font-blue-sharp"></i>
                                        <span class="caption-subject font-blue-sharp bold uppercase"> MODAL BANK </span>
                                    </div>

                                </div>
                                <div class="portlet-body">
                                    <table class="table table-hover table-striped table-bordered" width="100%">
                                        <tbody>
                                        <tr>
                                            <td width="15%"> <i class="fa fa-forward"> </i> <b>Modal Inti Bank</b> </td>
                                            <td width="15%" align="right"><b><?=number_format(JmlModalInti(),2,".",",")?></b></td>
                                            <td width="70%"></td>
                                        </tr>
                                        <tr>
                                            <td width="15%"> <i class="fa fa-stop"> </i><i class="fa fa-forward"> </i>  <b>Regulator </b> </td>
                                            <td width="15%" align="right"><b><?=number_format($limit_bmpk_regulatorPTKP,2,".",",")?></b></td>
                                            <td width="70%"></td>
                                        </tr>
                                        <tr>
                                            <td width="15%"> <i class="fa fa-stop"> </i><i class="fa fa-forward"> </i>  <b>Internal</b> </td>
                                            <td width="15%" align="right"><b><?=number_format($limit_bmpk_internalPTKP,2,".",",")?></b></td>
                                            <td width="70%"></td>
                                        </tr>
                                        
                                    </tbody></table>
                                </div>
                            </div>
                                                    <!--  portlet box grey-gallery -->
                        <div class="portlet light grey-steel bordered "> 
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-equalizer font-red-sunglo"></i>
                                            <span class="caption-subject font-red-sunglo bold uppercase"> Pihak Tidak Terkait Kelompok Peminjam </span>
                                            <span class="caption-helper"> <!-- <a href="http://<?php  echo $_SERVER['SERVER_ADDR'].":".$_SERVER['SERVER_PORT'].str_replace("home.php", "", $_SERVER['PHP_SELF'])."data/download/Pihak_tidak_terkait_kp.xls" ; ?>" class="btn green ceter" download=""> <i class="fa fa-download"></i> <b>Download Excel </b> </a> --></span>

                                        </div>
                                        
                                        <div class="actions">
                                            
                                        </div>
                                    </div>

                        <div class="portlet-body form">
                        
                            
                            <table class="table table-striped table-bordered table-hover" id="sample_2" width="125%">
                            <thead>
                            <tr>
                                <th width='5%'><b>No</b></th>
                                <!-- <th><b>CIFGroup</b></th> -->
                                <th width="25%"><b>Group Debitur</b></th>
                                <!-- <th width="5%"><b>JENIS</b></th> -->
                                <th width="15%"><b>Cash Collateral</b></th>
                                <th width="15%"><b>Plafond</b></th>
                                <th width="15%"><b>Eksposur BMPK [Plafond]</b></th>
                                <th width="10%"><b>Flag</b></th>
                                <th width="15%"><b>Oustanding</b></th>
                                <th width="15%"><b>Eksposur BMPK [O/S]</b></th>
                                <th width="10%"><b>Flag</b></th>
                                <th width="10%"><b>Detail</b></th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                           

                            $i=1;
                            //$query =" select distinct cfcif,cpgcde,cpgdes,jenis from pihak_tdk_terkait ";
                            $query =" select distinct cfcif,cpgcde,cpgdes from pihak_tdk_terkait ";
                            //echo $query;
                            $RS2  = $db->Execute($query);
                           
                            while(!$RS2->EOF){
                                $list_PTTKP     = GroupPTTkp($RS2->fields['cpgcde'],$RS2->fields['cfcif'],$RS2->fields['jenis']);
                                $flag1=$list_PTTKP["plafon"]-CcollateralBDS_PTTKP($RS2->fields['cfcif']);
                                //$flag2=$RS2->fields['cpouts']-$RS2->fields['ccolateral'];
                                if($flag1 < $limit_bmpk_regulator && $flag1 < $limit_bmpk_internal ){
                                    $class1="success";
                                }else if ($flag1 >= $limit_bmpk_internal &&  $flag1 < $limit_bmpk_regulator ){
                                    $class1="warning";
                                }else{ $class1="danger"; }
                            echo "<tr>";
                            echo "<td width='5%'>$i</td>";
                            /*echo "<td> <b>".$RS2->fields['cpgcde']." </b></td>";*/

                            echo "<td  width='25%'><a href='#' class='btn default' disabled> <b>".$RS2->fields['cpgdes']." </b> </a></td>";
                           
                            echo "<td align='right' width='15%'><a href='#' class='btn default' disabled> <b>".number_format(CcollateralBDS_PTTKP($RS2->fields['cfcif']),2,".",",")."</b></a></td>";
                            echo "<td align='right' width='15%'><a href='#' class='btn default' disabled> <b>".number_format($list_PTTKP["plafon"] ,2,".",",")."</b></a></td>";
                            echo "<td align='right' width='15%'><a href='#' class='btn default' disabled> <b>".number_format($list_PTTKP["plafon"]-CcollateralBDS_PTTKP($RS2->fields['cpgcde']),2,".",",")."</b></a></td>";
                            echo "<td width='10%' class='$class1'> </td>";
                            echo "<td align='right' width='15%'><a href='#' class='btn default' disabled> <b>".number_format($list_PTTKP["outstanding"],2,".",",")."</b></a></td>";
                            echo "<td align='right' width='15%'><a href='#' class='btn default' disabled> <b>".number_format($list_PTTKP["outstanding"]-CcollateralBDS_PTTKP($RS2->fields['cpgcde']),2,".",",")."</b></a></td>";
                            echo "<td width='10%' class='$class1'></b></td>";
                            echo "<td width='10%'><b> <a href='$page&id=21&cifg=".$RS2->fields['cpgcde']."' class='btn dark btn-sm btn-outline sbold uppercase'>
                                <i class='fa fa-share'></i> Detail </a> </b></td>";
                            echo "</tr>";
                            $i++;
                            $RS2->MoveNext();
                                    }
                            ?>


                            </tbody>
                            </table>
                        </div>
                    </div>
                    <a href="<?php echo "$page&id=1"?>" class="btn btn dark" >
                                    <b> BACK  </b>  <i class="fa fa-reply"></i> </a>
    </div>

<!-- =============== END HOME FRONT ============ -->
<?php 
}

?>



<?php 
if (isset($_GET['id']) && $_GET['id']=="21") {

?>
<!-- =============== START HOME PIHAK TIDAK TERKAIT KELOMPOK PEMINJAM ============ -->

<div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        
                        <div class="m-heading-1 border-green m-bordered">
                                     <h1> <i class="fa fa-home"></i> PIHAK TIDAK TERKAIT BANK  </h1> 

                                     <p> Kelompok Peminjam </p>
                                        <!-- <a class="btn red btn-outline" href="http://jqueryvalidation.org"
                                            target="_blank">the official documentation</a> -->
                                    
                                </div>
                        <!-- Sidebar Toggle Button -->
                       
                        <!-- Sidebar Toggle Button -->
                    </div>
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-social-dribbble font-blue-sharp"></i>
                                        <span class="caption-subject font-blue-sharp bold uppercase"> MODAL BANK </span>
                                    </div>

                                </div>
                                <div class="portlet-body">
                                    <table class="table table-hover table-striped table-bordered" width="100%">
                                        <tbody>
                                        <tr>
                                            <td width="15%"> <i class="fa fa-forward"> </i> <b>Modal Inti Bank</b> </td>
                                            <td width="15%" align="right"><b><?=number_format(JmlModalInti(),2,".",",")?></b></td>
                                            <td width="70%"></td>
                                        </tr>
                                        <tr>
                                            <td width="15%"> <i class="fa fa-stop"> </i><i class="fa fa-forward"> </i>  <b>Regulator </b> </td>
                                            <td width="15%" align="right"><b><?=number_format($limit_bmpk_regulatorPTKP,2,".",",")?></b></td>
                                            <td width="70%"></td>
                                        </tr>
                                        <tr>
                                            <td width="15%"> <i class="fa fa-stop"> </i><i class="fa fa-forward"> </i>  <b>Internal</b> </td>
                                            <td width="15%" align="right"><b><?=number_format($limit_bmpk_internalPTKP,2,".",",")?></b></td>
                                            <td width="70%"></td>
                                        </tr>
                                        
                                    </tbody></table>
                                </div>
                            </div>
                                                    <!--  portlet box grey-gallery -->
                        <div class="portlet light grey-steel bordered ">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-equalizer font-red-sunglo"></i>
                                            <span class="caption-subject font-red-sunglo bold uppercase"> Pihak Tidak Terkait Kelompok Peminjam "<?=NamaGroupCIF($_GET["cifg"])?>" </span>
                                            <span class="caption-helper"> </span>
                                        </div>
                                        <div class="actions">
                                            
                                        </div>
                                    </div>

                        <div class="portlet-body form">
                        
                            
                            <table class="table table-striped table-bordered table-hover" id="sample_2" width="125%">
                            <thead>
                            <tr>
                                <th width='5%'><b>No</b></th>
                                <!-- <th><b>CIFGroup</b></th> -->
                                <th width="25%"><b>Group Debitur</b></th>
                                <th width="5%"><b>Jenis</b></th>
                                <th width="15%"><b>Collateral</b></th>
                                <th width="15%"><b>Plafon</b></th>
                                <th width="15%"><b>Eksposur BMPK [O/S]</b></th>
                                <th width="10%"><b>Flag</b></th>
                                <th width="15%"><b>Oustanding</b></th>
                                <th width="15%"><b>Eksposur BMPK [O/S]</b></th>
                                <th width="10%"><b>Flag</b></th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;


                            $query =" select * from pihak_tdk_terkait where cpgcde='".$_GET["cifg"]."'";
                            
                            //echo $query;
                            $RS2  = $db->Execute($query);
                           
                            while(!$RS2->EOF){
                               
                                $flag1=$RS2->fields['cpplaf']-$RS2->fields['ccolateral'];
                                $flag2=$RS2->fields['cpouts']-$RS2->fields['ccolateral'];
                                if($flag1 < $limit_bmpk_regulatorPTKP && $flag1 < $limit_bmpk_internalPTKP ){
                                    $class1="success";
                                }else if ($flag1 >= $limit_bmpk_internalPTKP &&  $flag1 < $limit_bmpk_regulatorPTKP ){
                                    $class1="warning";
                                }else{ $class1="danger"; }
                               
                                /*if($flag2 < $modal_regulator && $flag2 < $modal_internal ){
                                    $class2="sucess";
                                }else if ($flag2 >= $modal_internal &&  $flag2 < $modal_regulator ){
                                    $class2="warning";
                                }else{ $class2="danger"; }*/

                            echo "<tr>";
                            echo "<td width='5%'>$i</td>";
                            

                            echo "<td  width='25%'> <b>".$RS2->fields['cfsnme']." </b></td>";
                            echo "<td  width='5%'> <b>".$RS2->fields['jenis']." </b></td>";
                            echo "<td align='right' width='15%'><a href='#' class='btn default' disabled> <b>".number_format($RS2->fields['ccolateral'],2,".",",")."</b></a></td>";
                            echo "<td align='right' width='15%'><a href='#' class='btn default' disabled> <b>".number_format($RS2->fields['cpplaf'],2,".",",")."</b></a></td>";
                            echo "<td align='right' width='15%'><a href='#' class='btn default' disabled> <b>".number_format($RS2->fields['cpplaf']-$RS2->fields['ccolateral'],2,".",",")."</b></a></td>";
                            echo "<td width='10%' class='$class1'></td>";
                            echo "<td align='right' width='15%'><a href='#' class='btn default' disabled> <b>".number_format($RS2->fields['cpouts'],2,".",",")."</b></a></td>";
                            echo "<td align='right' width='15%'><a href='#' class='btn default' disabled> <b>".number_format($RS2->fields['cpouts']-$RS2->fields['ccolateral'],2,".",",")."</b></a></td>";
                            echo "<td width='10%' class='$class1'> </td>";
                            echo "</tr>";
                            $i++;
                            $RS2->MoveNext();
                                    }
                            ?>


                            </tbody>
                            </table>
                        </div>
                    </div>
                    <a href="<?php echo "$page&id=2"?>" class="btn btn dark" >
                                    <b> BACK  </b>  <i class="fa fa-reply"></i> </a>
    </div>

<!-- =============== END HOME FRONT ============ -->
<?php 
}

?>


<?php 
if (isset($_GET['id']) && $_GET['id']=="3") {

?>
<!-- =============== START HOME PIHAK TIDAK TERKAIT BUKAN KELOMPOK PEMINJAM ============ -->
 
<div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        
                        <div class="m-heading-1 border-green m-bordered">
                                     <h1> <i class="fa fa-home"></i> PIHAK TIDAK TERKAIT BANK [ Individu ]  </h1> 

                                     <p> Bukan Kelompok Peminjam </p>
                                        <!-- <a class="btn red btn-outline" href="http://jqueryvalidation.org"
                                            target="_blank">the official documentation</a> -->
                                    
                                </div>
                        <!-- Sidebar Toggle Button -->

                        <!-- Sidebar Toggle Button -->
                    </div>
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-social-dribbble font-blue-sharp"></i>
                                        <span class="caption-subject font-blue-sharp bold uppercase"> MODAL BANK </span>
                                    </div>
                                    
                                </div>
                                                                <div class="portlet-body">
                                    <table class="table table-hover table-striped table-bordered" width="100%">
                                        <tbody>
                                        <tr>
                                            <td width="15%"> <i class="fa fa-forward"> </i> <b>Modal Inti Bank</b> </td>
                                            <td width="15%" align="right"><b><?=number_format(JmlModalInti(),2,".",",")?></b></td>
                                            <td width="70%"></td>
                                        </tr>
                                        <tr>
                                            <td width="15%"> <i class="fa fa-stop"> </i><i class="fa fa-forward"> </i>  <b>Regulator </b> </td>
                                            <td width="15%" align="right"><b><?=number_format($limit_bmpk_regulatorPTBKP,2,".",",")?></b></td>
                                            <td width="70%"></td>
                                        </tr>
                                        <tr>
                                            <td width="15%"> <i class="fa fa-stop"> </i><i class="fa fa-forward"> </i>  <b>Internal</b> </td>
                                            <td width="15%" align="right"><b><?=number_format($limit_bmpk_internalPTBKP,2,".",",")?></b></td>
                                            <td width="70%"></td>
                                        </tr>
                                        
                                    </tbody></table>
                                </div>
                            </div>
                   
                                                    <!--  portlet box grey-gallery -->
                        <div class="portlet light grey-steel bordered ">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-equalizer font-red-sunglo"></i>
                                            <span class="caption-subject font-red-sunglo bold uppercase"> Pihak Tidak Terkait Individu </span>
                                            <span class="caption-helper"> <a href="http://<?php  echo $_SERVER['SERVER_ADDR'].":".$_SERVER['SERVER_PORT'].str_replace("home.php", "", $_SERVER['PHP_SELF'])."data/download/Pihak_tidak_terkait_bkp.xls" ; ?>" class="btn green ceter" download=""> <i class="fa fa-download"></i> <b>Download Excel </b> </a></span>
                                        </div>
                                        <div class="actions">
                                            
                                        </div>
                                    </div>

                        <div class="portlet-body form">
                        
                            
                            <table class="table table-striped table-bordered table-hover" id="sample_2">
                            <thead>
                            <tr>
                                <th><b>No</b></th>
                                <th><b>CIF</b></th>
                                <th><b>Debitur</b></th>
                                <th><b>Jenis</b></th>
                                <th><b>Class</b></th>
                                <th><b>Plafon</b></th>
                                <th><b>Outstanding</b></th>
                                <th><b>CCollateral</b></th>
                                <th><b>Valas</b></th>
                                <th><b>STATUS </b></th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            $query =" select a.cfcif,a.cfsnme,a.plafon,a.outs,b.ccolateral,a.currency,a.status,a.cfclas,a.jenis from(
                                        select cfcif,cfsnme,currency,sum(cpplaf) as plafon ,sum(cpouts) as outs,status,cfclas,jenis from pihak_tdk_terkait_ng
                                        group by cfcif,cfsnme,currency,status,cfclas,jenis
                                        ) a
                                      left join (select distinct cfcif,ccolateral from pihak_terkait) b on a.cfcif=b.cfcif ";
                            
                            //echo $query;
                            $RS2  = $db->Execute($query);
                           
                            while(!$RS2->EOF){
                                $class_pt     = ($RS2->fields['cfclas']=="A" ) ? "PERORANGAN" : "CORPORATE";
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td> <b> $currency ".$RS2->fields['cfcif']." </b></td>";
                            echo "<td> <b> $currency ".$RS2->fields['cfsnme']." </b></td>";
                            echo "<td> <b> $currency ".$RS2->fields['jenis']." </b></td>";
                            echo "<td> <b>".$class_pt." </b></td>";
                            echo "<td align='right'><a href='#' class='btn default' disabled> <b>".number_format($RS2->fields['plafon'],2,".",",")."</b></a></td>";
                            echo "<td align='right'><a href='#' class='btn default' disabled> <b>".number_format($RS2->fields['outs'],2,".",",")."</b></a></td>";
                            echo "<td align='right'><a href='#' class='btn default' disabled> <b>".number_format($RS2->fields['ccolateral'],2,".",",")."</b></a></td>";
                            echo "<td> <b>".$RS2->fields['currency']." </b></td>";
                            echo "<td><b> ".$RS2->fields['status']." </b></td>";
                            
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
                    <a href="http://<?php echo $_SERVER['SERVER_ADDR'].":".$_SERVER['SERVER_PORT'].str_replace("/home.php", "", $_SERVER['PHP_SELF'])."";?>" class="btn btn dark" >
                                    <b> BACK  </b>  <i class="fa fa-reply"></i> </a>

    </div>

<!-- =============== END HOME FRONT ============ -->
<?php 
}

?>




<?php 
if (isset($_GET['id']) && $_GET['id']=="11") {

?>
<!-- =============== START HOME PIHAK TIDAK TERKAIT BUKAN KELOMPOK PEMINJAM ============ -->
 
<div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        
                        <div class="m-heading-1 border-green m-bordered">
                                     <h1> <i class="fa fa-home"></i> PIHAK  TERKAIT BANK  </h1> 

                                     <p> Pihak Terkait Bank </p>
                                        <!-- <a class="btn red btn-outline" href="http://jqueryvalidation.org"
                                            target="_blank">the official documentation</a> -->
                                    
                                </div>
                        <!-- Sidebar Toggle Button -->
                       
                        <!-- Sidebar Toggle Button -->
                    </div>

                   
                                                    <!--  portlet box grey-gallery -->
                        <div class="portlet light grey-steel bordered ">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-equalizer font-red-sunglo"></i>
                                            <span class="caption-subject font-red-sunglo bold uppercase"> Pihak Terkait </span>
                                            <span class="caption-helper"> <!-- <a href="http://<?php  echo $_SERVER['SERVER_ADDR'].":".$_SERVER['SERVER_PORT'].str_replace("home.php", "", $_SERVER['PHP_SELF'])."data/download/Pihak_terkait.xls" ; ?>" class="btn green ceter" download=""> <i class="fa fa-download"></i> <b>Download Excel </b> </a> --> </span>
                                        </div>
                                        <div class="actions">
                                            
                                        </div>
                                    </div>

                        <div class="portlet-body form">
                        
                            
                            <table class="table table-striped table-bordered table-hover" id="sample_2">
                            <thead>
                            <tr>
                                <th><b>No</b></th>
                                <th><b>CIF</b></th>
                                <th><b>Pihak Terkait</b></th>
                                <!-- <th><b>Jenis</b></th> -->
                                <th><b>Class</b></th>
                                <th><b>Plafond</b></th>
                                <th><b>Outstanding</b></th>
                                <th><b>Cash Collateral</b></th>
                                <th><b>Valas</b></th>
                                <!-- <th><b>STATUS </b></th> -->
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            $query =" select a.cfcif,a.cfsnme,a.plafon,a.outs,b.ccolateral,a.currency,a.cfclas from(
                                        select cfcif,cfsnme,currency,sum(cpplaf) as plafon ,sum(cpouts) as outs,cfclas from pihak_terkait
                                        group by cfcif,cfsnme,currency,cfclas
                                        ) a
                                      left join (select distinct cfcif,ccolateral from pihak_terkait) b on a.cfcif=b.cfcif ";
                            
                            //echo $query;
                            $RS2  = $db->Execute($query);
                           
                            while(!$RS2->EOF){
                                $class_pt     = ($RS2->fields['cfclas']=="A" ) ? "PERORANGAN" : "CORPORATE";
                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td> <b> $currency ".$RS2->fields['cfcif']." </b></td>";
                            echo "<td> <b> $currency ".$RS2->fields['cfsnme']." </b></td>";
                            /*echo "<td> <b> $currency ".$RS2->fields['jenis']." </b></td>";*/
                            echo "<td> <b>".$class_pt." </b></td>";
                            echo "<td align='right'><a href='#' class='btn default' disabled> <b>".number_format($RS2->fields['plafon'],2,".",",")."</b></a></td>";
                            echo "<td align='right'><a href='#' class='btn default' disabled> <b>".number_format($RS2->fields['outs'],2,".",",")."</b></a></td>";
                            echo "<td align='right'><a href='#' class='btn default' disabled> <b>".number_format($RS2->fields['ccolateral'],2,".",",")."</b></a></td>";
                            echo "<td> <b>".$RS2->fields['currency']." </b></td>";
                           /* echo "<td><b> ".$RS2->fields['status']." </b></td>";*/
                            
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
                    <a href="<?php echo "$page&id=1"?>" class="btn btn dark" >
                                    <b> BACK  </b>  <i class="fa fa-reply"></i> </a>

    </div>

<!-- =============== END HOME FRONT ============ -->
<?php 
}

?>

<?php 
if (isset($_GET['id']) && $_GET['id']=="12") {

?>
<!-- =============== START HOME PIHAK TIDAK TERKAIT BUKAN KELOMPOK PEMINJAM ============ -->
 
<div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        
                        <div class="m-heading-1 border-green m-bordered">
                                     <h1> <i class="fa fa-home"></i> PIHAK  TERKAIT TREASURY </h1> 

                                     <p> Pihak Terkait Bank Treasury </p>
                                        <!-- <a class="btn red btn-outline" href="http://jqueryvalidation.org"
                                            target="_blank">the official documentation</a> -->
                                    
                                </div>
                        <!-- Sidebar Toggle Button -->
                       
                        <!-- Sidebar Toggle Button -->
                    </div>

                   
                                                    <!--  portlet box grey-gallery -->
                        <div class="portlet light grey-steel bordered ">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-equalizer font-red-sunglo"></i>
                                            <span class="caption-subject font-red-sunglo bold uppercase"> Pihak Terkait Treasury </span>
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
                                <th><b>Nama Debitur</b></th>
                                <th><b>Fasilitas</b></th>
                                <th><b>Plafond</b></th>
                                <th><b>Outstanding</b></th>
                                <th><b>Cash Collateral</b></th>
                                <th><b>Status</b></th>
                                <th><b>Unused</b></th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            $query =" select * from bmpk_bank_treasury order by nama_debitur asc ";
                            
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
                            echo "<td> <b>".$RS2->fields['nama_debitur']." </b></td>";
                            echo "<td> <b>".$RS2->fields['jenis_fasilitas']." </b></td>";
                            echo "<td align='right'><a href='#' class='btn default' disabled> <b>".number_format($RS2->fields['plfond'],2,".",",")."</b></a></td>";
                            echo "<td align='right'><a href='#' class='btn default' disabled> <b>".number_format($RS2->fields['outstanding'],2,".",",")."</b></a></td>";
                            echo "<td align='right'><a href='#' class='btn default' disabled> <b>".number_format($RS2->fields['cash_colateral'],2,".",",")."</b></a></td>";
                            echo "<td><b> ".$status." </b></td>";
                            echo "<td align='right'><a href='#' class='btn default' disabled> <b>".number_format($RS2->fields['unused'],2,".",",")."</b></a></td>";
                            echo "</tr>";
                            $i++;
                            $RS2->MoveNext();
                                    }
                            ?>


                            </tbody>
                            </table>
                        </div>
                    </div>
                                        <a href="<?php echo "$page&id=1"?>" class="btn btn dark" >
                                    <b> BACK  </b>  <i class="fa fa-reply"></i> </a>


    </div>

<!-- =============== END HOME FRONT ============ -->
<?php 
}

?>



<?php 
if (isset($_GET['id']) && $_GET['id']=="13") {

?>
<!-- =============== START HOME PIHAK TIDAK TERKAIT BUKAN KELOMPOK PEMINJAM ============ -->
 
<div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        
                        <div class="m-heading-1 border-green m-bordered">
                                     <h1> <i class="fa fa-home"></i> PIHAK  TERKAIT CREDIT CARD </h1> 

                                     <p> Pihak Terkait Bank Credit Card </p>
                                        <!-- <a class="btn red btn-outline" href="http://jqueryvalidation.org"
                                            target="_blank">the official documentation</a> -->
                                    
                                </div>
                        <!-- Sidebar Toggle Button -->
                       
                        <!-- Sidebar Toggle Button -->
                    </div>

                   
                                                    <!--  portlet box grey-gallery -->
                        <div class="portlet light grey-steel bordered ">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-equalizer font-red-sunglo"></i>
                                            <span class="caption-subject font-red-sunglo bold uppercase"> Pihak Terkait Credit Card </span>
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
                                <th><b>Nama Debitur</b></th>
                                <th><b>Fasilitas</b></th>
                                <th><b>Plafond</b></th>
                                <th><b>Outstanding</b></th>
                                <th><b>Cash Collateral</b></th>
                                <th><b>Status</b></th>
                                <th><b>Unused</b></th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            $query =" select * from bmpk_bank_creditcard order by nama_debitur asc ";
                            
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
                            echo "<td> <b>".$RS2->fields['nama_debitur']." </b></td>";
                            echo "<td> <b>".$RS2->fields['jenis_fasilitas']." </b></td>";
                            echo "<td align='right'><a href='#' class='btn default' disabled> <b>".number_format($RS2->fields['plfond'],2,".",",")."</b></a></td>";
                            echo "<td align='right'><a href='#' class='btn default' disabled> <b>".number_format($RS2->fields['outstanding'],2,".",",")."</b></a></td>";
                            echo "<td align='right'><a href='#' class='btn default' disabled> <b>".number_format($RS2->fields['cash_colateral'],2,".",",")."</b></a></td>";
                            echo "<td><b> ".$status." </b></td>";
                            echo "<td align='right'><a href='#' class='btn default' disabled> <b>".number_format($RS2->fields['unused'],2,".",",")."</b></a></td>";
                            echo "</tr>";
                            $i++;
                            $RS2->MoveNext();
                                    }
                            ?>


                            </tbody>
                            </table>
                        </div>
                    </div>
                                        <a href="<?php echo "$page&id=1"?>" class="btn btn dark" >
                                    <b> BACK  </b>  <i class="fa fa-reply"></i> </a>


    </div>

<!-- =============== END HOME FRONT ============ -->
<?php 
}

?>

<?php 
if (isset($_GET['id']) && $_GET['id']=="14") {

?>
<!-- =============== START HOME PIHAK TIDAK TERKAIT BUKAN KELOMPOK PEMINJAM ============ -->
 
<div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        
                        <div class="m-heading-1 border-green m-bordered">
                                     <h1> <i class="fa fa-home"></i> PIHAK  TERKAIT BANK GUARANTEE </h1> 

                                     <p> Pihak Terkait Bank Guarantee </p>
                                        <!-- <a class="btn red btn-outline" href="http://jqueryvalidation.org"
                                            target="_blank">the official documentation</a> -->
                                    
                                </div>
                        <!-- Sidebar Toggle Button -->
                       
                        <!-- Sidebar Toggle Button -->
                    </div>

                   
                                                    <!--  portlet box grey-gallery -->
                        <div class="portlet light grey-steel bordered ">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-equalizer font-red-sunglo"></i>
                                            <span class="caption-subject font-red-sunglo bold uppercase"> Pihak Terkait Bank Guarantee </span>
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
                                <th><b>Nama Debitur</b></th>
                                <th><b>Fasilitas</b></th>
                                <th><b>Plafond</b></th>
                                <th><b>Outstanding</b></th>
                                <th><b>Cash Collateral</b></th>
                                <th><b>Status</b></th>
                                <th><b>Unused</b></th>
                                
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            $query =" select * from bmpk_bank_guarantee order by nama_debitur asc ";
                            
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
                            echo "<td> <b>".$RS2->fields['nama_debitur']." </b></td>";
                            echo "<td> <b>".$RS2->fields['jenis_fasilitas']." </b></td>";
                            echo "<td align='right'><a href='#' class='btn default' disabled> <b>".number_format($RS2->fields['plfond'],2,".",",")."</b></a></td>";
                            echo "<td align='right'><a href='#' class='btn default' disabled> <b>".number_format($RS2->fields['outstanding'],2,".",",")."</b></a></td>";
                            echo "<td align='right'><a href='#' class='btn default' disabled> <b>".number_format($RS2->fields['cash_colateral'],2,".",",")."</b></a></td>";
                            echo "<td><b> ".$status." </b></td>";
                            echo "<td align='right'><a href='#' class='btn default' disabled> <b>".number_format($RS2->fields['unused'],2,".",",")."</b></a></td>";
                            echo "</tr>";
                            $i++;
                            $RS2->MoveNext();
                                    }
                            ?>


                            </tbody>
                            </table>
                        </div>
                    </div>
                                        <a href="<?php echo "$page&id=1"?>" class="btn btn dark" >
                                    <b> BACK  </b>  <i class="fa fa-reply"></i> </a>


    </div>

<!-- =============== END HOME FRONT ============ -->
<?php 
}

?>







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
                                <th><b>Plafond</b></th>
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

<!-- modal insert -->   
        <div class="modal fade" id="input-reserve" tabindex="-1" role="basic" aria-hidden="true">
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
                                                    <span class="caption-subject font-dark sbold uppercase"> Input Reserve  </span>
                                        </div>       
                                </div>
                        <div class="portlet-body">
                            <!-- BEGIN FORM-->
                            <form action="<?php echo "modules/actions_master.php?module=$module&pm=$pm&act=ins_reserve_bmpk"; ?>" id="form_sample_3" class="form-horizontal"  method="POST" >
                                <div class="form-body">
                                    <div class="alert alert-danger display-hide">
                                        <button class="close" data-close="alert"></button> You have some form errors. Please check below. </div>
                                    <div class="alert alert-success display-hide">
                                        <button class="close" data-close="alert"></button> Your form validation is successful! </div>
                                                       
                                                        
                                                        <div class="form-group">
                                                            <label class="control-label col-md-4 bold">Nama Divisi 
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
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
                                                        <div class="form-group">
                                                            <label class="col-md-4 control-label bold">Amount
                                                                <span class="required"> * </span>
                                                            </label>
                                                            <div class="col-md-8">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-gears"></i>
                                                                    </span>
                                                                    <input type="text" name="nominal" id="nominal" class="form-control" placeholder="Amount "> </div>
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
                                                                    <input type="text" name="remarks" id="remarks" class="form-control" placeholder="Remarks"> </div>
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





        <div class="modal fade" id="list-reserves" tabindex="-1"  aria-hidden="true">
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
                                                    <span class="caption-subject font-dark sbold uppercase"> List Data Reserve  </span>
                                        </div>       
                                </div>
                        <div class="portlet-body">
                                                    <div class="portlet light grey-steel bordered ">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-equalizer font-red-sunglo"></i>
                                            <span class="caption-subject font-red-sunglo bold uppercase"> LIST RESERVE </span>
                                            <span class="caption-helper"> </span>
                                        </div>
                                        <div class="actions">
                                            
                                        </div>
                                    </div>

                        
                        
                            
                            <table class="table table-striped table-bordered table-hover" id="sample_3">
                            <thead>
                            <tr>
                                <th><b>No</b></th>
                                <th><b>Nama Divisi </b></th>
                                <th><b>Amount</b></th>
                                <th><b>Remarks</b></th>
                                <th><b>Create Date</b></th>
                                <th><b>Create By</b></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $ix=1;
                            $query_reserve =" select * from reserve_bmpk  ";
                           
                            $RS_RES  = $db->Execute($query_reserve);
                           
                            while(!$RS_RES->EOF){
                            echo "<tr>";
                            echo "<td>$ix</td>";
                            echo "<td> <b> ".getNamaDivisi($RS_RES->fields['id_div'])."</b></td>";
                            echo "<td align='right'><a href='#' class='btn default' disabled> <b>".number_format($RS_RES->fields['amount'],2,".",",")."</b></a></td>";
                            echo "<td><b> ". " <a href='#' class='btn green' disabled ><b>".$RS_RES->fields['remarks']."</b></a> </b></td>";
                            echo "<td ><a href='#' class='btn default' disabled> <b>".date('d-m-Y H:i',strtotime($RS_RES->fields['adddt']))."</b></a></td>";
                           echo "<td><b> ". " <a href='#' class='btn green' disabled ><b>".$RS_RES->fields['addby']."</b></a> </b></td>";
                
                            echo "</tr>";
                            $ix++;
                            $RS_RES->MoveNext();
                                    }
                            ?>


                            </tbody>
                            </table>
                      
                    </div>
                            
                            <!-- END FORM-->
                        </div>
                        <!-- END VALIDATION STATES-->
                        </div>   

                    </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                                
                                                            </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
