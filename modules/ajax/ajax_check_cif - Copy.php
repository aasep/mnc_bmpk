<?php
require_once "../../library/adodb5/adodb.inc.php" ;
require_once '../../config/config.php';
require_once '../../function/function.php';
error_reporting(0);
//include('db.php');
if($_POST['cif']){
        $cif=$_POST['cif']; 
        $module=$_POST['module']; 
                                                    
//echo "test".$cif;

//die();
/*        $query=" SELECT * from master_dosen WHERE divid='$id' order by dosen_name asc ";
        $RS  = $db->Execute($query);
        $found=$RS->Rowcount();

            if($found>=1){
                    while(!$RS->EOF){
                        echo "<option value='".$RS->fields['dosenid']."'>".$RS->fields['dosen_name']."</option>";
                        $RS->MoveNext();
                    }
            }else{

                        echo "<option value=''> Nothing Consultant </option>";
            }  */    
            $query=" SELECT cfcif,acctno,cfsnme,ccolateral from pihak_terkait WHERE cfcif='$cif'  ";
            $RS  = $db->Execute($query);
            $found=$RS->Rowcount();
            if ($found>=1) {               
                $i=1;
                echo "<div class='alert alert-success pull-right'><b> Total Cash Collateral = ".number_format(getCashColl($cif),2,".",",")." </b> </div>";
?>

<div class="table-scrollable">
                                        <table class="table table-striped table-bordered table-advance table-hover" id="list_cif" width="100%">
                                            <thead>
                                                <tr>
                                                    <th width="5%"><b> NO</b> </th>
                                                    <th width="10%"><b> CIF </b> </th>
                                                    <th width="20%"><b> ACCOUNT NUMBER </b> </th>
                                                    <th width="20%"><b> ACCOUNT NAME</b> </th>
                                                    <th width="10%"><b> BOBOT (%)</b> </th>
                                                    <th width="20%"><b> CASH COLLATERAL </b> </th>
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
                     echo "<td align='right'> <div class='col-md-8'><input type='text' name='bobot_$i' id='bobot_$i' class='form-control'> </div></td>";
                     echo "<td align='right'> <div class='col-md-8'><input type='text' name='cash_coll_$i' id='cash_coll_$i' class='form-control'> </div></td>";
/*                     echo "<td><a href='#' class='detailEdit' data-toggle='modal' data-target='#basic' id-cif='".$RS->fields['cfcif']."  id-acctno='".$RS->fields['acctno']." id-cfsnme='".$RS->fields['cfsnme']." id-ccolateral='".$RS->fields['ccolateral']." '> <button class='btn blue' > <i class='fa fa-share'></i> <b> Input Bobot </b>
                            </button></a> </td>";*/
                     echo "</tr>";







                $i++;
                $RS->MoveNext();
                }
                $jml_input=$i-1;

?>


                                               

                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <input type="hidden" id='jml_input' value="<?php echo $jml_input;?>" >
                                    <input type="hidden" id='tot_cash_coll' value="<?php echo getCashColl($cif);?>" >   
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
    echo "<div class='alert alert-danger'><b>CIF Tidak Boleh Kosong.....  ! </b> </div>";

}  
?>

