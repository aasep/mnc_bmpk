<?php

/*######################################################################*\
#            				FUNCTION LIBRARY			                 #
# -----------------------------------------------------------------------#
# 																		 #
#  																		 #
#  	Developed by:	Asep Arifyan						    			 #
#	License:		Commercial											 #
#  	Copyright: 		2016. All Rights Reserved.		                     #
#                                                                        #
#  	Additional modules (embedded): 										 #
#	-- Metronic (Themes) 												 #
#																		 #
#																		 #
# -----------------------------------------------------------------------#
#	Designed and built with all the love and loyalty.					 #
\*######################################################################*/
//date_default_timezone_set("US/Pacific"); 
date_default_timezone_set("Asia/Jakarta");
$user_agent     =   $_SERVER['HTTP_USER_AGENT'];	  

function getUsername(){
		$username = $_SESSION['USERNAME'];
		return $username;
	}
function getStatusAccount(){
		$status = $_SESSION['STATUS_ACCOUNT'];
		return $status;
	}
function getPassword(){
		$pass = $_SESSION['PASSWORD'];
		return $pass;
	}
function getGroupUser(){
		$group = $_SESSION['GROUP_USER'];
		return $group;
	}
function isDosen(){
        if ($_SESSION['GROUP_USER']=='5'){
            return true;
        }else{
            return false;
        } 
    }
function ModalBankStatus($idModal){
        global $db;
        $query = " SELECT status FROM modal_bank  where id_modal='$idModal'  ";
        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        if ($found >=1){
                $status=$RS->fields['status'];
          }else{
                $status=0;
            }

        if ($status=='1'){
            return true;
        }else{
            return false;
        } 
    }
function isTreasuryInp(){

        if ($_SESSION['GROUP_USER']=='9' ){
            return true;
        }else{
            return false;
        } 
    }
function isTreasuryApp(){
        global $db;
        $query = " SELECT count(status) as jml FROM bmpk_bank_treasury  where status='0'  ";
        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        if ($found >=1){
                $jumlah=$RS->fields['jml'];
          }else{
                $jumlah=0;
            }

        if ($_SESSION['GROUP_USER']=='5' && $jumlah >=1 ){
            return true;
        }else{
            return false;
        } 
    }
function isCcInp(){

        if ($_SESSION['GROUP_USER']=='10' ){
            return true;
        }else{
            return false;
        } 
    }
function isCcApv(){
        global $db;
        $query = " SELECT count(status) as jml FROM bmpk_bank_creditcard  where status='0'  ";
        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        if ($found >=1){
                $jumlah=$RS->fields['jml'];
          }else{
                $jumlah=0;
            }

        if ($_SESSION['GROUP_USER']=='7' && $jumlah >=1 ){
            return true;
        }else{
            return false;
        } 
    }
function isBgInp(){

        if ($_SESSION['GROUP_USER']=='12' ){
            return true;
        }else{
            return false;
        } 
    }
function isBgApv(){
        global $db;
        $query = " SELECT count(status) as jml FROM bmpk_bank_guarantee  where status='0'  ";
        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        if ($found >=1){
                $jumlah=$RS->fields['jml'];
          }else{
                $jumlah=0;
            }


        if ($_SESSION['GROUP_USER']=='6' && $jumlah >=1 ){
            return true;
        }else{
            return false;
        } 
    }
function isFinconModal(){
        global $db;
        $query = " SELECT count(status) as jml FROM modal_bank  where status='0'  ";
        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        if ($found >=1){
                $jumlah=$RS->fields['jml'];
          }else{
                $jumlah=0;
            }
        //------------------------- CEK   ---------------------------------------------
        if ($_SESSION['GROUP_USER']=='2' && $jumlah >=1 ){
            return true;
        }else{
            return false;
        } 
    }
function isFinconKurs(){
        global $db;
        $query = " SELECT count(status) as jml FROM kurs_bank  where status='0'  ";
        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        if ($found >=1){
                $jumlah=$RS->fields['jml'];
          }else{
                $jumlah=0;
            }
        //------------------------- CEK   ---------------------------------------------
        if ($_SESSION['GROUP_USER']=='2' && $jumlah >=1 ){
            return true;
        }else{
            return false;
        } 
    }
function isFinconPro(){
        global $db;
        $query = " SELECT count(status) as jml FROM prosentase_modal  where status='0'  ";
        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
         if ($found >=1){
                $jumlah=$RS->fields['jml'];
          }else{
                $jumlah=0;
            }
        //------------------------- CEK   ---------------------------------------------
        if ($_SESSION['GROUP_USER']=='2' && $jumlah >=1 ){
            return true;
        }else{
            return false;
        } 
    }
// function getNamaLengkap(){
// 		$fix_nama_lengkap = $_SESSION['PSAK71_NAMA_LENGKAP'];
// 		return $fix_nama_lengkap;
// 	}
function getEmail(){
		$fix_email = $_SESSION['EMAIL'];
		return $fix_email;
	}



function getImage(){
        $fix_image = $_SESSION['IMAGE'];
        return $fix_image;
    }

function getNamaDivisi($id_div){
        global $db;
        $query = " SELECT nama_divisi FROM master_division  where id_div='$id_div' ";
        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        if ($found >=1)
        {
            $nama_group=$RS->fields['nama_divisi'];
            return $nama_group;
            }
    }
function getTotalReserve(){
        global $db;
        $query = " SELECT sum(amount) as jml FROM reserve_bmpk  ";
        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        if ($found >=1)
        {
            $nama_group=$RS->fields['jml'];
            return $nama_group;
        }else{
            return 0;

            }

    }
function getCashColl($cif){
        global $db;
        $query  = " SELECT ccolateral as jml FROM cash_coll_pt where ccdcif='$cif' ";
        $query .= " UNION ALL  ";
        $query .= " SELECT ccolateral as jml FROM cash_coll_pttkp where ccdcif='$cif' ";
        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        if ($found >=1)
        {
            $cashcoll=$RS->fields['jml'];
            return $cashcoll;
        }else{
            return 0;

            }

    }
function getValasCashColl($cif){
        global $db;
        $query  = " SELECT cccurr as valas FROM cash_coll_pt where ccdcif='$cif' ";
        $query .= " UNION ALL  ";
        $query .= " SELECT cccurr as valas FROM cash_coll_pttkp where ccdcif='$cif' ";
        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        if ($found >=1)
        {
            $valas=$RS->fields['valas'];
            return $valas;
        }else{
            return 0;

            }

    }
/*function isAppModalBank(){
        global $db;
        $query = " SELECT status FROM modal_bank  where status='0' limit 1 ";
        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        if ($found >=1)
        {
            $nama_group=$RS->fields['groupname'];
            return $nama_group;
            }
    }*/

function getGroupUserName(){
		global $db;
		$query = " SELECT groupname FROM group_user  where groupid='$_SESSION[GROUP_USER]' ";
        $RS    = $db->Execute($query);
		$found = $RS->RecordCount();
		if ($found >=1)
		{
			$nama_group=$RS->fields['groupname'];
			return $nama_group;
			}
	}
function JmlModalInti(){
        global $db;
        $query = " SELECT nominal as jml from modal_bank where nama_modal ilike '%inti%' and status='1' ";
        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        if ($found >=1)
        {
            $jml=$RS->fields['jml'];
            return $jml;
            }
        else return 0;
    }
function JmlModalpelengkap(){
        global $db;
        $query = " SELECT nominal as jml from modal_bank where nama_modal ilike '%lengkap%' and status='1' ";
        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        if ($found >=1)
        {
            $jml=$RS->fields['jml'];
            return $jml;
            }
        else return 0;
    }

function TotalmodalBank(){
        global $db;
        $query1 = " SELECT nominal as jml from modal_bank where nama_modal ilike '%inti%' and status='1' ";
        $RS1    = $db->Execute($query1);
        $jml1   = $RS1->fields['jml'];

        $query2 = " SELECT nominal as jml from modal_bank where nama_modal ilike '%lengkap%' and status='1' ";
        $RS2    = $db->Execute($query2);
        $jml2   = $RS2->fields['jml'];

        $total  = $jml1+$jml2;

        return $total;
}   

function getNamaModal($idModal){
        global $db;

        if($idModal=='99'){
            $nama_modal= "Total Modal Bank";
        }else{

            $query = " SELECT nama_modal from modal_bank where id_modal='$idModal'  ";
            $RS    = $db->Execute($query);
            $found = $RS->RecordCount();
            if ($found >=1){
                $nama_modal=$RS->fields['nama_modal'];
            
            }

        }
        return $nama_modal;

    }
function getIdModal($id_pro){
        global $db;

            $query = " SELECT kode_modal from prosentase_modal where id_pro='$id_pro'  ";
            $RS    = $db->Execute($query);
            $found = $RS->RecordCount();
            if ($found >=1){
                $kode_modal=$RS->fields['kode_modal'];
            
            }


        return $kode_modal;

    }
function kursValas($valas){
        global $db;
        $query = " select nominal  from kurs_bank where kode_kurs='".trim($valas)."' and status='1' ";
        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        if ($found >=1)
        {
            $jml=$RS->fields['nominal'];
            return $jml;
            }
        else return 1;
    }
/*function getCashCollFix($acctno){
        global $db;
        $query = " select cash_coll as nominal  from mapp_cashcoll where acctno='".trim($acctno)."' and status='1' ";
        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        if ($found >=1)
        {
            $jml=$RS->fields['nominal'];
            return $jml;
            }
        else return 0;
    }*/
function getCashCollFix($acctno){
        global $db;
        $query_count = " select count(*) as total  from mapp_cashcoll where acctno='".trim($acctno)."' and status='1' ";
        $RS_count    = $db->Execute($query_count);
        $total       = $RS_count->fields['total'];


        $query = " select cash_coll as nominal,valas  from mapp_cashcoll where acctno='".trim($acctno)."' and status='1' ";
        $RS    = $db->Execute($query);
        //$found = $RS->RecordCount();
            if ($total >=1)
            {
                    $jml       =$RS->fields['nominal'];
                    $currency  =trim($RS->fields['valas']);
                
            }else{
                    $jml       =0;
                    $currency  ="";
                }

            switch ($currency) {

                case 'IDR':
                    $cashcoll = $jml;
                    break;
                case 'USD':
                    $cashcoll = $jml*kursValas('USD');
                    break;
                case 'AUD':
                    $cashcoll = $jml*kursValas('AUD');
                    break;
                case 'EUR':
                    $cashcoll = $jml*kursValas('EUR');
                    break;
                case 'HKD':
                    $cashcoll = $jml*kursValas('HKD');
                    break;
                case 'JPY':
                    $cashcoll = $jml*kursValas('JPY');
                    break;
                case 'SGD':
                    $cashcoll = $jml*kursValas('SGD');
                    break;
                case 'CNY':
                    $cashcoll = $jml*kursValas('CNY');
                    break;
                case 'MYR':
                    $cashcoll = $jml*kursValas('MYR');
                    break;
                case 'GBP':
                    $cashcoll = $jml*kursValas('GBP');
                    break;
                case '':
                    $cashcoll = 0;
                    break;
            }

         return $cashcoll;
    }
function limitBMPK_PT(){
        global $db;
        $query = " select limit_bmpk  from prosentase_modal where id_pro='1' and status='1'  ";
        $RS    = $db->Execute($query); 
        $found = $RS->RecordCount();
        if ($found >=1)
        {
            $jml=$RS->fields['limit_bmpk'];
            return $jml;
            }
        else return 0;
    }
function limitBMPK_PTKP(){
        global $db;
        $query = " select limit_bmpk  from prosentase_modal where id_pro='12' and status='1'  ";
        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        if ($found >=1)
        {
            $jml=$RS->fields['limit_bmpk'];
            return $jml;
            }
        else return 0;
    }
function limitBMPK_PTBKP(){
        global $db;
        $query = " select limit_bmpk  from prosentase_modal where id_pro='13' and status='1'  ";
        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        if ($found >=1)
        {
            $jml=$RS->fields['limit_bmpk'];
            return $jml;
            }
        else return 0;
    }
function prosentase_limitBMPK_PT(){
        global $db;
        $query = " select prosentase  from prosentase_modal where id_pro='1' and status='1'  ";
        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        if ($found >=1)
        {
            $jml=$RS->fields['prosentase'];
            return $jml;
            }
        else return 0;
    }
function prosentase_limitBMPK_PTKP(){
        global $db;
        $query = " select prosentase  from prosentase_modal where id_pro='12' and status='1' ";
        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        if ($found >=1)
        {
            $jml=$RS->fields['prosentase'];
            return $jml;
            }
        else return 0;
    }
function prosentase_limitBMPK_PTBKP(){
        global $db;
        $query = " select prosentase  from prosentase_modal where id_pro='13' and status='1'  ";
        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        if ($found >=1)
        {
            $jml=$RS->fields['prosentase'];
            return $jml;
            }
        else return 0;
    }
/*function TotalPlafonPT(){
        global $db;
        $query = " select sum(cpplaf) as plafon from pihak_terkait ";
        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        if ($found >=1)
        {
            $jml=$RS->fields['plafon'];
            return $jml;
            }
        else return 0;
    }*/
function TotalEkpsBMPK_trPT(){
        global $db;
        $query = " select sum(outstanding) as eksposure , sum(cash_colateral) as cashcoll from bmpk_bank_treasury where status='1' and pihak_terkait='1' ";
      

        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();

        if($found >=1){
            $eksposure   = trim($RS->fields['eksposure']);
            $cashcoll    = trim($RS->fields['cashcoll']);
        }else{
            $eksposure   = 0;
            $cashcoll    = 0;
        }

        $total_eks_bmpk  = $eksposure-$cashcoll;

        return $total_eks_bmpk;
    }
function TotalEkpsBMPK_bgPT(){
        global $db;
        $query = " select  sum (a.eksposure) as eksposure, sum (a.cashcoll) as cashcoll from ( " ;
        $query.= " select sum(outstanding) as eksposure , sum(cash_colateral) as cashcoll from bmpk_bank_guarantee where status='1' and unused > 0 and pihak_terkait='1'  ";
        $query.= " union all  ";
        $query.= " select sum(plfond) as eksposure ,  sum(cash_colateral) as cashcoll from bmpk_bank_guarantee where status='1' and unused = 0 and pihak_terkait='1' ) a ";

        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();

        if($found >=1){
            $eksposure   = trim($RS->fields['eksposure']);
            $cashcoll    = trim($RS->fields['cashcoll']);
        }else{
            $eksposure   = 0;
            $cashcoll    = 0;
        }

        $total_eks_bmpk  = $eksposure-$cashcoll;

        return $total_eks_bmpk;
    }

function TotalEkpsBMPK_bdsPT(){
        global $db;
        $query = " select a.cpplaf as plafon,a.cpouts as outstanding, a.currency,b.prod_type from pihak_terkait a ";
        $query.= " left join mapp_product b on replace(b.product,' ','')=replace(a.type,' ','')  ";

        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        $i=1;
        $total_mybmpk = 0;
        //$total_outs   = 0;

        while(!$RS->EOF){
            
            $currency   = trim($RS->fields['currency']);
            $prod_type  = trim($RS->fields['prod_type']);
            if ($prod_type=="ANGSURAN"){
                    $mybmpk  = trim($RS->fields['outstanding']);
            }else if($prod_type=="NON-ANGSURAN") {
                    $mybmpk  = trim($RS->fields['plafon']);
            }else{
                    $mybmpk  = 0;
            }

            switch ($currency) {

                case 'IDR':
                    $mybmpk = $mybmpk;
                    break;
                case 'USD':
                    $mybmpk = $mybmpk*kursValas('USD');
                    break;
                case 'AUD':
                    $mybmpk = $mybmpk*kursValas('AUD');
                    break;
                case 'EUR':
                    $mybmpk = $mybmpk*kursValas('EUR');
                    break;
                case 'HKD':
                    $mybmpk = $mybmpk*kursValas('HKD');
                    break;
                case 'JPY':
                    $mybmpk = $mybmpk*kursValas('JPY');
                    break;
                case 'SGD':
                    $mybmpk = $mybmpk*kursValas('SGD');
                    break;
                case 'CNY':
                    $mybmpk = $mybmpk*kursValas('CNY');
                    break;
                
            }

            $total_mybmpk = $total_mybmpk + $mybmpk ;

            $i++;
            $RS->MoveNext();
        }

        $total_eks_bmpk  = $total_mybmpk-TotalCcollateralBDS_PT();

        return $total_eks_bmpk;
    }

function TotalEkpsBMPK_bdsPTTKP(){
        global $db;
        $query = " select a.cpplaf as plafon,a.cpouts as outstanding, a.currency,b.prod_type from pihak_tdk_terkait a ";
        $query.= " left join mapp_product b on replace(b.product,' ','')=replace(a.type,' ','')  ";

        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        $i=1;
        $total_mybmpk = 0;
        //$total_outs   = 0;

        while(!$RS->EOF){
            
            $currency   = trim($RS->fields['currency']);
            $prod_type  = trim($RS->fields['prod_type']);
            if ($prod_type=="ANGSURAN"){
                    $mybmpk  = trim($RS->fields['outstanding']);
            }else if($prod_type=="NON-ANGSURAN") {
                    $mybmpk  = trim($RS->fields['plafon']);
            }else{
                    $mybmpk  = 0;
            }

            switch ($currency) {

                case 'IDR':
                    $mybmpk = $mybmpk;
                    break;
                case 'USD':
                    $mybmpk = $mybmpk*kursValas('USD');
                    break;
                case 'AUD':
                    $mybmpk = $mybmpk*kursValas('AUD');
                    break;
                case 'EUR':
                    $mybmpk = $mybmpk*kursValas('EUR');
                    break;
                case 'HKD':
                    $mybmpk = $mybmpk*kursValas('HKD');
                    break;
                case 'JPY':
                    $mybmpk = $mybmpk*kursValas('JPY');
                    break;
                case 'SGD':
                    $mybmpk = $mybmpk*kursValas('SGD');
                    break;
                case 'CNY':
                    $mybmpk = $mybmpk*kursValas('CNY');
                    break;
                
            }

            $total_mybmpk = $total_mybmpk + $mybmpk ;

            $i++;
            $RS->MoveNext();
        }

        $total_eks_bmpk  = $total_mybmpk-TotalCcollateralBDS_PTTKP();

        return $total_eks_bmpk;
    }


function TotalPlafonPT(){
        global $db;
        $query = " select sum(cpplaf) as plafon,currency from pihak_terkait group by currency  ";

        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        $i=1;
        $total_plafon = 0;
        //$total_outs   = 0;

        while(!$RS->EOF){
            
            $currency   = trim($RS->fields['currency']);

            switch ($currency) {

                case 'IDR':
                    $myplafon = $RS->fields['plafon'];
                    break;
                case 'USD':
                    $myplafon = $RS->fields['plafon']*kursValas('USD');
                    break;
                case 'AUD':
                    $myplafon = $RS->fields['plafon']*kursValas('AUD');
                    break;
                case 'EUR':
                    $myplafon = $RS->fields['plafon']*kursValas('EUR');
                    break;
                case 'HKD':
                    $myplafon = $RS->fields['plafon']*kursValas('HKD');
                    break;
                case 'JPY':
                    $myplafon = $RS->fields['plafon']*kursValas('JPY');
                    break;
                case 'SGD':
                    $myplafon = $RS->fields['plafon']*kursValas('SGD');
                    break;
                case 'CNY':
                    $myplafon = $RS->fields['plafon']*kursValas('CNY');
                    break;
                
            }

            $total_plafon = $total_plafon + $myplafon ;
            //$total_outs   = $total_outs + $myouts ;

            $i++;
            $RS->MoveNext();
        }

        //$total['plafon']      =$total_plafon;
        //$total['outstanding'] =$total_outs;

        return $total_plafon;
    }



function TotalPTTkp(){
        global $db;
        $query = " select currency,sum(cpplaf) as plafon ,sum(cpouts) as outs from pihak_tdk_terkait
                   group by currency  ";

        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        $i=1;
        $total_plafon = 0;
        $total_outs   = 0;

        while(!$RS->EOF){
            
            $currency   = trim($RS->fields['currency']);

            switch ($currency) {

                case 'IDR':
                    $myplafon = $RS->fields['plafon'];
                    $myouts   = $RS->fields['outs'];
                    break;
                case 'USD':
                    $myplafon = $RS->fields['plafon']*kursValas('USD');
                    $myouts   = $RS->fields['outs']*kursValas('USD');
                    break;
                case 'AUD':
                    $myplafon = $RS->fields['plafon']*kursValas('AUD');
                    $myouts   = $RS->fields['outs']*kursValas('AUD');
                    break;
                case 'EUR':
                    $myplafon = $RS->fields['plafon']*kursValas('EUR');
                    $myouts   = $RS->fields['outs']*kursValas('EUR');
                    break;
                case 'HKD':
                    $myplafon = $RS->fields['plafon']*kursValas('HKD');
                    $myouts   = $RS->fields['outs']*kursValas('HKD');
                    break;
                case 'JPY':
                    $myplafon = $RS->fields['plafon']*kursValas('JPY');
                    $myouts   = $RS->fields['outs']*kursValas('JPY');
                    break;
                case 'SGD':
                    $myplafon = $RS->fields['plafon']*kursValas('SGD');
                    $myouts   = $RS->fields['outs']*kursValas('SGD');
                    break;
                case 'CNY':
                    $myplafon = $RS->fields['plafon']*kursValas('CNY');
                    $myouts   = $RS->fields['outs']*kursValas('CNY');
                    break;
                
            }

            $total_plafon = $total_plafon + $myplafon ;
            $total_outs   = $total_outs + $myouts ;

            $i++;
            $RS->MoveNext();
        }

        $total['plafon']      =$total_plafon;
        $total['outstanding'] =$total_outs;

        return $total;
    }
//function GroupPTTkp($cifgroup,$cif,$jenis){
function GroupPTTkp($cifgroup,$cif){

        global $db;
            
       /* if ($jenis=="" or $jenis ==NULL){
            $jenisq =" jenis is null ";
        }else{
            $jenisq =" jenis = '$jenis' ";
        }*/


/*        $query = " select currency,sum(cpplaf) as plafon ,sum(cpouts) as outs from pihak_tdk_terkait 
                   where cpgcde='".trim($cifgroup)."' and  cfcif='$cif' and  $jenisq  
                   group by currency  ";*/
        $query = " select currency,sum(cpplaf) as plafon ,sum(cpouts) as outs from pihak_tdk_terkait 
                   where cpgcde='".trim($cifgroup)."' and  cfcif='$cif'  
                   group by currency  ";

        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        $i=1;
        $total_plafon = 0;
        $total_outs   = 0;

        while(!$RS->EOF){
            
            $currency   = trim($RS->fields['currency']);

            switch ($currency) {

                case 'IDR':
                    $myplafon = $RS->fields['plafon'];
                    $myouts   = $RS->fields['outs'];
                    break;
                case 'USD':
                    $myplafon = $RS->fields['plafon']*kursValas('USD');
                    $myouts   = $RS->fields['outs']*kursValas('USD');
                    break;
                case 'AUD':
                    $myplafon = $RS->fields['plafon']*kursValas('AUD');
                    $myouts   = $RS->fields['outs']*kursValas('AUD');
                    break;
                case 'EUR':
                    $myplafon = $RS->fields['plafon']*kursValas('EUR');
                    $myouts   = $RS->fields['outs']*kursValas('EUR');
                    break;
                case 'HKD':
                    $myplafon = $RS->fields['plafon']*kursValas('HKD');
                    $myouts   = $RS->fields['outs']*kursValas('HKD');
                    break;
                case 'JPY':
                    $myplafon = $RS->fields['plafon']*kursValas('JPY');
                    $myouts   = $RS->fields['outs']*kursValas('JPY');
                    break;
                case 'SGD':
                    $myplafon = $RS->fields['plafon']*kursValas('SGD');
                    $myouts   = $RS->fields['outs']*kursValas('SGD');
                    break;
                case 'CNY':
                    $myplafon = $RS->fields['plafon']*kursValas('CNY');
                    $myouts   = $RS->fields['outs']*kursValas('CNY');
                    break;
                
            }

            $total_plafon = $total_plafon + $myplafon ;
            $total_outs   = $total_outs + $myouts ;

            $i++;
            $RS->MoveNext();
        }

        $total['plafon']      =$total_plafon;
        $total['outstanding'] =$total_outs;

        return $total;
    }

function CcollateralPTTkp($cifgroup){
        global $db;
        $query = " select distinct cpgcde,cpgdes,ccolateral,currency from pihak_tdk_terkait
                   where cpgcde='".trim($cifgroup)."' and ccolateral is not null
                   order by cpgcde asc ";

        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        $i=1;
        $total_coll = 0;

        while(!$RS->EOF){
            
            $currency   = trim($RS->fields['currency']);

            switch ($currency) {

                case 'IDR':
                    $mycoll[$i] = $RS->fields['ccolateral'];
                    break;
                case 'USD':
                    $mycoll[$i] = $RS->fields['ccolateral']*kursValas('USD');
                    break;
                case 'AUD':
                    $mycoll[$i] = $RS->fields['ccolateral']*kursValas('AUD');
                    break;
                case 'EUR':
                    $mycoll[$i] = $RS->fields['ccolateral']*kursValas('EUR');
                    break;
                case 'HKD':
                    $mycoll[$i] = $RS->fields['ccolateral']*kursValas('HKD');
                    break;
                case 'JPY':
                    $mycoll[$i] = $RS->fields['ccolateral']*kursValas('JPY');
                    break;
                case 'SGD':
                    $mycoll[$i] = $RS->fields['ccolateral']*kursValas('SGD');
                    break;
                case 'CNY':
                    $mycoll[$i] = $RS->fields['ccolateral']*kursValas('CNY');
                    break;
                
            }
                //$total_coll = $mycoll[$i] ;

                if ($i > 1){

                    if($mycoll[$i] == $mycoll[$i-1]){
                        $total_coll = $mycoll[$i];
                    }else{
                        $total_coll =0;
                        for ($x=1; $x <= $i  ; $x++) { 
                            $total_coll = $total_coll+$mycoll[$x];
                        }
                        
                    }


                } else{

                        $total_coll = $mycoll[$i];
                }
            

            $i++;
            $RS->MoveNext();
            }
   

        if ($found >=1){
           
            return $total_coll;

        }else return 0;

        
    }

function NamaGroupCIF($cifgroup){
        global $db;
        $query = " select distinct cpgdes  from pihak_tdk_terkait where cpgcde='$cifgroup'  ";
        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        if ($found >=1)
        {
            $jml=$RS->fields['cpgdes'];
            return $jml;
            }
        else return 0;
    }


function TotalOutstandingBDS(){
        global $db;
        $query = " select sum(cpouts) as outstanding from pihak_terkait";
        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        if ($found >=1)
        {
            $jml=$RS->fields['outstanding'];
            return $jml;
            }
        else return 0;
    }
function TotalCcollateralBDS_PT(){
        global $db;
        $query = " select sum(ccolateral) as ccolateral, cccurr as currency from cash_coll_pt group by cccurr  ";

        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        $i=1;
        $total_ccoll = 0;
        //$total_outs   = 0;

        while(!$RS->EOF){
            
            $currency   = trim($RS->fields['currency']);

            switch ($currency) {

                case 'IDR':
                    $mycc = $RS->fields['ccolateral'];
                    break;
                case 'USD':
                    $mycc = $RS->fields['ccolateral']*kursValas('USD');
                    break;
                case 'AUD':
                    $mycc = $RS->fields['ccolateral']*kursValas('AUD');
                    break;
                case 'EUR':
                    $mycc = $RS->fields['ccolateral']*kursValas('EUR');
                    break;
                case 'HKD':
                    $mycc = $RS->fields['ccolateral']*kursValas('HKD');
                    break;
                case 'JPY':
                    $mycc = $RS->fields['ccolateral']*kursValas('JPY');
                    break;
                case 'SGD':
                    $mycc = $RS->fields['ccolateral']*kursValas('SGD');
                    break;
                case 'CNY':
                    $mycc = $RS->fields['ccolateral']*kursValas('CNY');
                    break;
                
            }

            $total_ccoll = $total_ccoll + $mycc ;

            $i++;
            $RS->MoveNext();
        }



        return $total_ccoll;
    }
function TotalCcollateralBDS_PTTKP(){
        global $db;
        $query = " select sum(ccolateral) as ccolateral, cccurr as currency from cash_coll_pttkp group by cccurr  ";

        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        $i=1;
        $total_ccoll = 0;
        //$total_outs   = 0;

        while(!$RS->EOF){
            
            $currency   = trim($RS->fields['currency']);

            switch ($currency) {

                case 'IDR':
                    $mycc = $RS->fields['ccolateral'];
                    break;
                case 'USD':
                    $mycc = $RS->fields['ccolateral']*kursValas('USD');
                    break;
                case 'AUD':
                    $mycc = $RS->fields['ccolateral']*kursValas('AUD');
                    break;
                case 'EUR':
                    $mycc = $RS->fields['ccolateral']*kursValas('EUR');
                    break;
                case 'HKD':
                    $mycc = $RS->fields['ccolateral']*kursValas('HKD');
                    break;
                case 'JPY':
                    $mycc = $RS->fields['ccolateral']*kursValas('JPY');
                    break;
                case 'SGD':
                    $mycc = $RS->fields['ccolateral']*kursValas('SGD');
                    break;
                case 'CNY':
                    $mycc = $RS->fields['ccolateral']*kursValas('CNY');
                    break;
                
            }

            $total_ccoll = $total_ccoll + $mycc ;

            $i++;
            $RS->MoveNext();
        }



        return $total_ccoll;
    }
function CcollateralBDS_PTTKP($cif){
        global $db;
        $query = " select sum(ccolateral) as ccolateral, cccurr as currency from cash_coll_pttkp where ccdcif='$cif' group by cccurr  ";

        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        $i=1;
        $total_ccoll = 0;
        //$total_outs   = 0;

        while(!$RS->EOF){
            
            $currency   = trim($RS->fields['currency']);

            switch ($currency) {

                case 'IDR':
                    $mycc = $RS->fields['ccolateral'];
                    break;
                case 'USD':
                    $mycc = $RS->fields['ccolateral']*kursValas('USD');
                    break;
                case 'AUD':
                    $mycc = $RS->fields['ccolateral']*kursValas('AUD');
                    break;
                case 'EUR':
                    $mycc = $RS->fields['ccolateral']*kursValas('EUR');
                    break;
                case 'HKD':
                    $mycc = $RS->fields['ccolateral']*kursValas('HKD');
                    break;
                case 'JPY':
                    $mycc = $RS->fields['ccolateral']*kursValas('JPY');
                    break;
                case 'SGD':
                    $mycc = $RS->fields['ccolateral']*kursValas('SGD');
                    break;
                case 'CNY':
                    $mycc = $RS->fields['ccolateral']*kursValas('CNY');
                    break;
                
            }

            $total_ccoll = $total_ccoll + $mycc ;

            $i++;
            $RS->MoveNext();
        }



        return $total_ccoll;
    }




function TotalCcollateralBDS_PTTBKP(){
        global $db;
        $query = " select sum(ccolateral) as ccolateral, cccurr as currency from cash_coll_pttbkp group by cccurr  ";

        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        $i=1;
        $total_ccoll = 0;
        //$total_outs   = 0;

        while(!$RS->EOF){
            
            $currency   = trim($RS->fields['currency']);

            switch ($currency) {

                case 'IDR':
                    $mycc = $RS->fields['ccolateral'];
                    break;
                case 'USD':
                    $mycc = $RS->fields['ccolateral']*kursValas('USD');
                    break;
                case 'AUD':
                    $mycc = $RS->fields['ccolateral']*kursValas('AUD');
                    break;
                case 'EUR':
                    $mycc = $RS->fields['ccolateral']*kursValas('EUR');
                    break;
                case 'HKD':
                    $mycc = $RS->fields['ccolateral']*kursValas('HKD');
                    break;
                case 'JPY':
                    $mycc = $RS->fields['ccolateral']*kursValas('JPY');
                    break;
                case 'SGD':
                    $mycc = $RS->fields['ccolateral']*kursValas('SGD');
                    break;
                case 'CNY':
                    $mycc = $RS->fields['ccolateral']*kursValas('CNY');
                    break;
                
            }

            $total_ccoll = $total_ccoll + $mycc ;

            $i++;
            $RS->MoveNext();
        }



        return $total_ccoll;
    }
function TotalCcollateralBDS(){
        global $db;
        $query = "     select sum (a.colateral) as colateral from ( select  distinct cfcif , ccolateral as colateral from pihak_terkait ) a ";
        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        if ($found >=1)
        {
            $jml=$RS->fields['colateral'];
            return $jml;
            }
        else return 0;
    }

function TotalcreditCard(){
        global $db;

        $query = " select sum (outstanding) as outs, sum(cash_colateral) as colat, sum (plfond) as plaf from bmpk_bank_creditcard ";
        $query.= " where  pihak_terkait='1' and status='1'  ";
        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        if ($found >=1)
        {
            $jml['outstanding'] =$RS->fields['outs'];
            $jml['ccollateral'] =$RS->fields['colat'];
            $jml['plafon']      =$RS->fields['plaf'];

            return $jml;
            }
        else return 0;
    }
function Totaltreasury(){
        global $db;

        $query = " select sum (outstanding) as outs, sum(cash_colateral) as colat, sum (plfond) as plaf from bmpk_bank_treasury  ";
        $query.= " where  pihak_terkait='1' and status='1'  ";
        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        if ($found >=1)
        {
            $jml['outstanding'] =$RS->fields['outs'];
            $jml['ccollateral'] =$RS->fields['colat'];
            $jml['plafon']      =$RS->fields['plaf'];

            return $jml;
            }
        else return 0;
    }
function TotalbankGuarantee(){
        global $db;

        $query = " select sum (outstanding) as outs, sum(cash_colateral) as colat, sum (plfond) as plaf from bmpk_bank_guarantee ";
        $query.= " where  pihak_terkait='1' and status='1'  ";
        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        if ($found >=1)
        {
            $jml['outstanding'] =$RS->fields['outs'];
            $jml['ccollateral'] =$RS->fields['colat'];
            $jml['plafon']      =$RS->fields['plaf'];

            return $jml;
            }
        else return 0;
    }
function JmlPihakTerkait(){
        global $db;
        $query = " SELECT count(*) as jml  from pihak_terkait  ";
        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        if ($found >=1)
        {
            $jml=$RS->fields['jml'];
            return $jml;
            }
        else return 0;
    }
function JmlPihakTdkTerkait(){
        global $db;
        $query = " SELECT count(*) as jml  from pihak_tdk_terkait  ";
        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        if ($found >=1)
        {
            $jml=$RS->fields['jml'];
            return $jml;
            }
        else return 0;
    }
function JmlPihakTdkTerkaitNg(){
        global $db;
        $query = " SELECT count(*) as jml  from pihak_tdk_terkait_ng  ";
        $RS    = $db->Execute($query);
        $found = $RS->RecordCount();
        if ($found >=1)
        {
            $jml=$RS->fields['jml'];
            return $jml;
            }
        else return 0;
    }
function getNamaMenu($src){
        global $db;
        $query = " SELECT menuname FROM menu  where src='$src' ";
        $RS    = $db->Execute($query);
        //$result=odbc_exec($connection,$query);
        $found = $RS->RecordCount();
        if ($found >=1)
        {
            $nama_menu=$RS->fields['menuname'];
            return $nama_menu;
            }
    }
function getParentMenu($src){
        global $db;
        $query = " SELECT parentmenu FROM menu  where src='$src' ";
        $RS    = $db->Execute($query);
        //$result=odbc_exec($connection,$query);
        $found = $RS->RecordCount();
        if ($found >=1)
        {
            $IdMenu=$RS->fields['parentmenu'];
            return $IdMenu;
            }
    }
function getParentMenuName($IdMenu){
        global $db;
        $query = " SELECT menuname FROM menu  where  idmenu='$IdMenu' ";
        $RS    = $db->Execute($query);
        //$result=odbc_exec($connection,$query);
        $found = $RS->RecordCount();
        if ($found >=1)
        {
            $MenuName=$RS->fields['menuname'];
            return $MenuName;
            }
    }
function countTaskLecturer($idDosen){
        global $db;
        //$data=array();
        $query = " select count(rek_id) as jumlah from rekam_medik where id_dosen='".trim($idDosen)."' and status='0' ";

       /* echo $query;
        die();*/
        $RS    = $db->Execute($query);
        $jumlah = $RS->fields['jumlah'];
        return $jumlah;
    }
function getRekamMedikNew($id){
        global $db;
        $data=array();
        $query = " select * from rekam_medik where rek_id='$id' ";
        $RS    = $db->Execute($query);
        $data = $RS->fetchRow();
        return $data;
    }
function consultantName($idDosen){
        global $db;
        $query = " select dosen_name from master_dosen where dosenid='$idDosen' ";
        $RS    = $db->Execute($query);
        $data = $RS->fields['dosen_name'];
        return $data;
    }
function mhsName($username){
        global $db;
        $query = " select namalengkap from user_account where username='$username' ";
        $RS    = $db->Execute($query);
        $data = $RS->fields['namalengkap'];
        return $data;
    }
    /*
function getParameterLogin(){
        global $db;
        $data=array();
        $query = " SELECT * FROM PS_Login_Parameter ";
        $RS    = $db->Execute($query);
        $data = $RS->fetchRow();
        return $data;
    }
function isUsername($username){
        global $db;
        $data=array();
        $query = " SELECT * FROM PS_USER WHERE UserID='$username' ";
        $RS    = $db->Execute($query);
        $data  = $RS->fetchRow();
       
        return $data;
            // if (!empty($data)){
            //         return $data;
            // }else{
            //         return false;
            // }
    }
function refreshFailedLogin(){
        global $db;
        $query = " UPDATE PS_USER SET FailedLogin=0 WHERE UserID='$_SESSION[PSAK71_USERNAME]' ";
        $RS    = $db->Execute($query);
        return 1;
    }
function updateFailedLogin($username){
        global $db;
        $data=array();

        $query_cek    = " SELECT * FROM PS_USER  WHERE UserID='$username' ";
        // echo "$query_cek";
        // die();
        $RCEK         = $db->Execute($query_cek);
        $data         = $RCEK->fetchRow();

        if ($RCEK != false ){

            $newFailed    = $data['FailedLogin']+1;
            $query        = " UPDATE PS_USER SET FailedLogin='$newFailed' WHERE UserID='$username' ";
            $RS           = $db->Execute($query);

            if ($RS != false) {
                    return true;
            } else {
                    return false;
                }

        } else {

            return false;

        }
        

        

    }
*/
function getIp(){
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    		$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
   			 $ip = $_SERVER['REMOTE_ADDR'];
		}

return $ip;

	}

function getBrowser(){
		if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== FALSE)
   			$browser='Internet explorer';
 			elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== FALSE) //For Supporting IE 11
    			$browser='Internet explorer';
				 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE)
   					$browser='Mozilla Firefox';
 					elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== FALSE)
 					  $browser='Google Chrome';
						 elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera Mini') !== FALSE)
   							$browser="Opera Mini";
 								elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') !== FALSE)
   									$browser="Opera";
 									elseif(strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== FALSE)
   										$browser="Safari";
 											else
  											 $browser='Browser Lain';
return $browser;

	}

function getBrowser2() 
{ 
    $u_agent = $_SERVER['HTTP_USER_AGENT']; 
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }

    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Internet Explorer'; 
        $ub = "MSIE"; 
    } 
    elseif(preg_match('/Firefox/i',$u_agent)) 
    { 
        $bname = 'Mozilla Firefox'; 
        $ub = "Firefox"; 
    } 
    elseif(preg_match('/Chrome/i',$u_agent)) 
    { 
        $bname = 'Google Chrome'; 
        $ub = "Chrome"; 
    } 
    elseif(preg_match('/Safari/i',$u_agent)) 
    { 
        $bname = 'Apple Safari'; 
        $ub = "Safari"; 
    } 
    elseif(preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Opera'; 
        $ub = "Opera"; 
    } 
    elseif(preg_match('/Netscape/i',$u_agent)) 
    { 
        $bname = 'Netscape'; 
        $ub = "Netscape"; 
    } 

    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }

    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }

    // check if we have a number
    if ($version==null || $version=="") {$version="?";}

    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
} 

function versionBrowser() { 
$ua=getBrowser2();
$yourbrowser= $ua['name'] . " " . $ua['version'] ;
return $yourbrowser;
}
function getOS() { 

    global $user_agent;

    $os_platform    =   "Unknown OS Platform";

    $os_array       =   array(
                            '/windows nt 10/i'     =>  'Windows 10',
                            '/windows nt 6.3/i'     =>  'Windows 8.1',
                            '/windows nt 6.2/i'     =>  'Windows 8',
                            '/windows nt 6.1/i'     =>  'Windows 7',
                            '/windows nt 6.0/i'     =>  'Windows Vista',
                            '/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
                            '/windows nt 5.1/i'     =>  'Windows XP',
                            '/windows xp/i'         =>  'Windows XP',
                            '/windows nt 5.0/i'     =>  'Windows 2000',
                            '/windows me/i'         =>  'Windows ME',
                            '/win98/i'              =>  'Windows 98',
                            '/win95/i'              =>  'Windows 95',
                            '/win16/i'              =>  'Windows 3.11',
                            '/macintosh|mac os x/i' =>  'Mac OS X',
                            '/mac_powerpc/i'        =>  'Mac OS 9',
                            '/linux/i'              =>  'Linux',
                            '/ubuntu/i'             =>  'Ubuntu',
                            '/iphone/i'             =>  'iPhone',
                            '/ipod/i'               =>  'iPod',
                            '/ipad/i'               =>  'iPad',
                            '/android/i'            =>  'Android',
                            '/blackberry/i'         =>  'BlackBerry',
                            '/webos/i'              =>  'Mobile'
                        );

    foreach ($os_array as $regex => $value) { 

        if (preg_match($regex, $user_agent)) {
            $os_platform    =   $value;
        }

    }   

    return $os_platform;

}

function logActivity($name,$info){
		global $db;
		$SQL="insert into log_activity (username,time_activity,ip,browser,name_activity,info,os,browser_ver) values ('$_SESSION[USERNAME]',CURRENT_TIMESTAMP,'".getIp()."','".getBrowser()."','$name','$info','".getOS()."','".versionBrowser()."')";
        $RS  = $db->Execute($SQL);
		//$result=odbc_exec($connection,$query);
       /* echo  $SQL."<br>";
        die();*/
      // return $query;
	}
    //[//idLtrans
/*function logTransaction($name,$info){
        global $db;
        $SQL="insert into tlog_transaction (user_id,time_activity,ip,browser,name_activity,tinfo) values ('$_SESSION[PSAK71_USERNAME]',GETDATE(),'".getIp()."','".getBrowser()."','$name','$info') ";
        $RS  = $db->Execute($SQL);

        //$result=odbc_exec($connection,$query);
      // return $query;
        //echo  $query."<br>";
    }
function insertTupload($SessId,$FileName,$JmlData,$UserId){
        global $connection;
        $query="insert into tUpload (SessId,FileName,JmlData,UserId,Adddt) VALUES ('$SessId','$FileName','$JmlData','$UserId',GETDATE() ) ";
        

        $result=odbc_exec($connection,$query);
      // return $query;
        //echo  $query."<br>";
    }*/

function logLogin($name,$user,$info){
        global $db;
        $SQL="insert into tlog_activity (username,time_activity,ip,browser,name_activity,info,os,browser_ver) values ('$user',getdate(),'".getIp()."','".getBrowser()."','$name','$info','".getOS()."','".versionBrowser()."')";
        $RS  = $db->Execute($SQL);
        //$result=odbc_exec($connection,$query);
      // return $query;
    }




function lastLogin(){
		global $db;
		$query="select top 2 time_activity from tlog_activity where name_activity='login' order by time_activity desc   ";
		//$result=odbc_exec($connection,$query);
        $RS  = $db->Execute($query);



        if(!empty($RS->fields['time_activity'])){
                    
                                $num = $RS->RecordCount();

                               // while(!$RS->EOF){

    		if ($num >=1)
    		{



    			$i=1;
    			//while ($row = odbc_fetch_array($result)){
                while(!$RS->EOF){
        			if ($i==2){
            			$last_login= $RS->fields['time_activity'];
            		} 
                        $i++;
                        $RS->MoveNext();
        		}
    			return $last_login;
    		}
        }
	}




function hashEncrypted($password){

		$encrypted = hash('sha512',$password);
		return $encrypted;
	}


function Milion_format($n) {
        // first strip any formatting;
        $n = (0+str_replace(",","",$n));
        
        // is this a number?
        if(!is_numeric($n)) return false;
        
       // $n=round(($n/1000000),9);
        // now filter it;
        /*
        if($n>1000000000000) return round(($n/1000000000000),1).' trillion';
        else if($n>1000000000) return round(($n/1000000000),1).' billion';
        else if($n>1000000) return round(($n/1000000),1).' million';
        else if($n>1000) return round(($n/1000),1).' thousand';
        */
        return  number_format($n,2,",",".");
        //return number_format($n);
    }


function shortNews( $str, $wordCount = 20 ) {
  $str=explode(' ', strip_tags($str)); 
  return implode( 
    '', 
    array_slice( 
      preg_split(
        '/([\s,\.;\?\!]+)/', 
        $str, 
        $wordCount*2+1, 
        PREG_SPLIT_DELIM_CAPTURE
      ),
      0,
      $wordCount*2-1
    )
  );
}

function wordlimit($string,$words=20 ) { 
   $length = 20;
   $ellipsis = "...";
   $words = explode(' ', strip_tags($string)); 
   if (count($words) > $length) 
       return implode(' ', array_slice($words, 0, $length)) . $ellipsis; 
   else 
       return $string; 
}



function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function getModalInti() {
    global $db;
        $query="select nominal from modal_bank where id_modal='1' ";
        $RS  = $db->Execute($query);
        $data = $RS->fields['nominal'];
        return $data;
    
}
function getModalPelengkap() {
    global $db;
        $query="select nominal from modal_bank where id_modal='2' ";
        $RS  = $db->Execute($query);
        $data = $RS->fields['nominal'];
        return $data;
    
}
	
	
	
?>