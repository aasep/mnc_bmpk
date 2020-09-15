<?php
session_start();

    require_once "../../library/adodb5/adodb.inc.php";
    require_once '../../config/config.php';
    require_once '../../function/function.php';
    require_once '../../session_login.php';

date_default_timezone_set("Asia/Jakarta"); 
$current_date = date('Y-m-d');

error_reporting(-1);

/*

if (!$connection) {
echo "connection Failed";
exit;
}
*/

$page_tmp = "?module=$_GET[module]&pm=$_GET[pm]";
$page=str_replace(".php","",$page_tmp);




//&srcby=$srcby&srckey=$srckey

################   SRCKEY   ########################
if (isset($_GET['srckey']) ) {
    $srckey=$_GET['srckey'];
} else  {
    $srckey=""; // no filter
}



/*
if (isset($_GET['srcby']) && ($_GET['srcby'])!="" ) {


    switch ($_GET['srcby']) {
         case '1' : $var_srcby=" AND a.ticket_number LIKE '%$srckey%' "; break; //ticket_number
         case '2' : $var_srcby=" AND a.customer_name LIKE '%$srckey%' "; break; //customer_name
         case '3' : $var_srcby=" AND a.account_number LIKE '%$srckey%' "; break; //account_number
         case '4' : $var_srcby=" AND a.credit_card_number LIKE '%$srckey%' "; break; //credit_card_number
         case '5' : $var_srcby=" AND a.atm_number LIKE '%$srckey%' "; break; //atm_number
         }

} else {
    $var_srcby=" ";  //no filter
}
*/

/*if (isset($_GET['act1']) ) {

    switch ($_GET['act1']) {
         case '1' : $varsrc= " where a.status='1' and b.id_pic='".getIdPic()."' and  to_char(a.date_sla, 'YYYY-MM-DD') >='".$current_date."' $var_srcby  "; $ket="Unprocessed"; break; //ticket_number
         case '2' : $varsrc= " where a.status='2' and b.id_pic='".getIdPic()."' and  to_char(a.date_sla, 'YYYY-MM-DD') >='".$current_date."' $var_srcby "; $ket="OnProgress"; break; //customer_name
         case '3' : $varsrc= " where a.status='3' and b.id_pic='".getIdPic()."' $var_srcby "; $ket="Done"; break; //account_number
         case '4' : $varsrc= " where a.status in ('1','2') and b.id_pic='".getIdPic()."' and  to_char(date_sla, 'YYYY-MM-DD') < '".$current_date."' $var_srcby "; $ket=" Exipred "; break; // credit_card_number
         }

}*/




    $aColumns = array('rek_id','nama_pasien','diagnosis', 'divid','id_dosen', 'action' );
	$aColumns_sorting = array('rek_id','nama_pasien','diagnosis', 'divid','id_dosen', 'adddt');

    /* Indexed column (used for fast and accurate table cardinality) */
    $sIndexColumn = "rek_id";

  
    $sLimit = "";
    if ( isset( $_GET['iDisplayStart'] ) && $_GET['iDisplayLength'] != '-1' )
    {
        $sLimit = "LIMIT ".intval( $_GET['iDisplayLength'] )." OFFSET ".
            intval( $_GET['iDisplayStart'] );
    }

    /*
     * Ordering
     */
    if ( isset( $_GET['iSortCol_0'] ) )
    {
        $sOrder = "ORDER BY  ";
        for ( $i=0 ; $i<intval( $_GET['iSortingCols'] ) ; $i++ )
        {
            if ( $_GET[ 'bSortable_'.intval($_GET['iSortCol_'.$i]) ] == "true" )
            {
                $sOrder .= $aColumns_sorting[ intval( $_GET['iSortCol_'.$i] ) ]."
                    ".($_GET['sSortDir_'.$i]==='asc' ? 'asc' : 'desc').", ";
            }
        }

        $sOrder = substr_replace( $sOrder, "", -2 );
        if ( $sOrder == "ORDER BY" )
        {
            $sOrder = "";
        }
    }

    /*
     * Filtering
     * NOTE This assumes that the field that is being searched on is a string typed field (ie. one
     * on which ILIKE can be used). Boolean fields etc will need a modification here.
     */

 
    $sWhere = " WHERE a.id_dosen='".getUsername()."' and a.status='0' ";


    $aColumnsSearch= array('nama_pasien','diagnosis','id_dosen', 'no_rek_medis','username' );
    if ( $_GET['sSearch'] != "" )
    {
        $sWhere = "WHERE (";
        for ( $i=0 ; $i<count($aColumnsSearch) ; $i++ )
        {
            if ( $_GET['bSearchable_'.$i] == "true" )
            {
                $sWhere .= "a.".$aColumnsSearch[$i]." ILIKE '%".pg_escape_string( $_GET['sSearch'] )."%' OR ";
            }
        }
        $sWhere = substr_replace( $sWhere, "", -3 );
        $sWhere .= ") and a.id_dosen='".getUsername()."' and a.status='0' ";


        
    }

    /* Individual column filtering */



 /*   for ( $i=0 ; $i<count($aColumns) ; $i++ )
    {
        if ( $_GET['bSearchable_'.$i] == "true" && $_GET['sSearch_'.$i] != '' )
        {
            if ( $sWhere == "" )
            {
                $sWhere = "WHERE ";
            }
            else
            {
                $sWhere .= " AND ";
            }
            $sWhere .= $aColumns[$i]." ILIKE '%".pg_escape_string($_GET['sSearch_'.$i])."%' and a.username='".getUsername()."' ";
        }
    }
*/
	
	






	$no=$_GET['iDisplayStart'];

    $sQuery  = " select a.status,a.before_img,a.after_img,a.rek_id,a.username,a.no_rek_medis,a.nama_pasien,a.sex,a.age,a.divid,b.divname,c.dosen_name,a.adddt,a.id_dosen,a.diagnosis from rekam_medik a ";
    $sQuery .=" left join division b on a.divid=b.divid ";
    $sQuery .=" left join master_dosen c on a.id_dosen=c.dosenid ";

    $sQuery .=" $sWhere ".

    //$sQuery .=" where a.username='".getUsername()."' ".
    
    $sOrder." ".
	$sLimit;
    //echo $sQuery."<br>";
    //$rResult = pg_query( $connection, $sQuery ) or die(pg_last_error());
    $rResult  = $db->Execute($sQuery);
	
    $sQuery  =" select count(a.rek_id) as jumlah from rekam_medik a ";
    $sQuery .=" left join division b on a.divid=b.divid ";
    $sQuery .=" left join master_dosen c on a.id_dosen=c.dosenid ";
    $sQuery .=" $sWhere ";
    //$sQuery .=" where a.username='".getUsername()."' ";

    //echo $sQuery."<br>";
    //die();
	$rResultTotal  = $db->Execute($sQuery);
    $iTotal=$rResultTotal->fields['jumlah'];		 	 
	/*$rResultTotal = pg_query( $connection, $sQuery ) or die(pg_last_error());
    $iTotal = pg_num_rows($rResultTotal);*/
    //$iTotal = $rResultTotal->RecordCount();

 /*   if ( $sWhere != "" )
    {
        $sQuery  =" select count(a.rek_id) as jumlah from rekam_medik a ";
        $sQuery .=" left join division b on a.divid=b.divid ";
        $sQuery .=" left join master_dosen c on a.id_dosen=c.dosenid ";
        $sQuery .=" $sWhere ";

        $rResultTotal2  = $db->Execute($sQuery);
        $iFilteredTotal=$rResultTotal2->fields['jumlah'];    
    }
    else
    {
        $iFilteredTotal = $iTotal;
    }
*/

    
    $iFilteredTotal = $iTotal;

    /*
     * Output
     */
    $output = array(
        "sEcho" => intval($_GET['sEcho']),
        "iTotalRecords" => $iTotal,
        "iTotalDisplayRecords" => $iFilteredTotal,
        "query" => $sWhere,
        "aaData" => array()
    );



    while(!$rResult->EOF)
    {
        $row = array();
        for ( $i=0 ; $i<count($aColumns) ; $i++ )
        {
            if ( $aColumns[$i] == "version" )
            {
                /* Special output formatting for 'version' column */
                $row[] = ($rResult[ $aColumns[$i] ]=="0") ? '-' : $rResult[ $aColumns[$i] ];
            }
            else if ( $aColumns[$i] == "rek_id" )
            {
               $id_temp="<i class='fa fa-ticket'></i> <b>".$rResult->fields['rek_id']."</b><br>"."<i class='fa fa-calendar'></i> <b>".$rResult->fields['no_rek_medis']."</b><br>"."<i class='fa fa-user-secret'></i> <b>".$rResult->fields['username'];
               $row[] = $id_temp; 
            }
            else if ($aColumns[$i] == "nama_pasien")
            {
                $jk= $rResult->fields['sex']=="L" ? "'fa fa-male'" : "'fa fa-female'";

               $row[] = "<i class=$jk ></i> ".$rResult->fields['nama_pasien']."<br> "."<i class='fa fa-hourglass-half'></i> ".$rResult->fields['age']." Tahun";
            }
        
            else if ($aColumns[$i] == "diagnosis") 
            {   
               $nama_action=$rResult->fields['diagnosis']; 
               $row[] = $rResult->fields['diagnosis'] ."<br>";
            }
            else if ($aColumns[$i] == "divid") 
            {               
               
               $nama_action=$rResult->fields['divid']."<br>".$rResult->fields['divname']; 
               $row[] = $nama_action; 
            }       
                
            else if ($aColumns[$i] == "id_dosen") 
            {               
               
               $nama_action=$rResult->fields['id_dosen']."<br>".$rResult->fields['dosen_name']; 
               $row[] = $nama_action; 
            }
            
            else if ($aColumns[$i] == "action") 
            {               
               
              /* $nama_action="<a class='detailEdit' data-toggle='modal' data-target='#basic' href='#' id-username='".trim($rResult->fields['username'])."'  id-rek_id='".$rResult->fields['rek_id']."' id-no_rek_medis='".$rResult->fields['no_rek_medis']."' id-nama_pasien='".$rResult->fields['nama_pasien']."' id-age='".$rResult->fields['age']."' id-diagnosis='".$rResult->fields['diagnosis']."' id-divid='".$rResult->fields['divid']."' id-id_dosen='".$rResult->fields['id_dosen']."' id-sex='".$rResult->fields['sex']."' id-before_img='".$rResult->fields['before_img']."' id-after_img='".$rResult->fields['after_img']."'><button class='btn red'> <b> Nilai </b> <i class='fa fa-get-pocket'></i> </button></a>";  */

                /*$nama_action="<a class='detailEdit' data-toggle='modal' data-target='#basic' href='#' id-username='".trim($rResult->fields['username'])."'  id-rek_id='".$rResult->fields['rek_id']."' id-no_rek_medis='".$rResult->fields['no_rek_medis']."' id-nama_pasien='".$rResult->fields['nama_pasien']."' id-age='".$rResult->fields['age']."' id-diagnosis='".$rResult->fields['diagnosis']."' id-divid='".$rResult->fields['divid']."' id-id_dosen='".$rResult->fields['id_dosen']."' id-sex='".$rResult->fields['sex']."' id-before_img='".$rResult->fields['before_img']."' id-after_img='".$rResult->fields['after_img']."'><button class='btn red'> <b> Nilai </b> <i class='fa fa-get-pocket'></i> </button></a>"; */
               //$nama_action="123";  b

                $nama_action="<a  href='$page&ext=detail&id=".$rResult->fields['rek_id']."' > <button class='btn red'> <b> Nilai </b> <i class='fa fa-get-pocket'></i> </button></a>";



               $row[] = $nama_action; 
            }
             
            else if ( $aColumns[$i] != ' ' )
            {
                /* General output */
                $row[] = $rResult[ $aColumns[$i] ];
            }
        }
        $output['aaData'][] = $row;


        $rResult->MoveNext();

    }

    echo json_encode( $output );
?>
