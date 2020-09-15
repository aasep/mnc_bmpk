<?php
require_once "../../library/adodb5/adodb.inc.php" ;
require_once '../../config/config.php';
require_once '../../function/function.php';
error_reporting(0);
//include('db.php');
if($_POST['id']){
        $id=$_POST['id']; 
                                                    

        $query=" SELECT * from master_dosen WHERE divid='$id' order by dosen_name asc ";
        $RS  = $db->Execute($query);
        $found=$RS->Rowcount();

            if($found>=1){
                    while(!$RS->EOF){
                        echo "<option value='".$RS->fields['dosenid']."'>".$RS->fields['dosen_name']."</option>";
                        $RS->MoveNext();
                    }
            }else{

                        echo "<option value=''> Nothing Consultant </option>";
            }                        
}

?>