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


    $aColumns = array('no','cfcif','acctno','cfsnme','cpgdes', 'cpplaf','cpouts', 'type','jenis','bihub1' );
	$aColumns_sorting =array('cfcif','cfcif','acctno','cfsnme','cpgdes', 'cpplaf','cpouts', 'type','jenis','bihub1' );

    /* Indexed column (used for fast and accurate table cardinality) */
    $sIndexColumn = "cfclas";

  
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

 
    $sWhere = " ";


   // $aColumnsSearch= array('cfsnme','cfcif','acctno','type','jenis' );
    $aColumnsSearch= array('cfsnme','type','jenis',' cast (cfcif as text) ','cast (acctno as text)');
    if ( $_GET['sSearch'] != "" )
    {
        $sWhere = "WHERE (";
        for ( $i=0 ; $i<count($aColumnsSearch) ; $i++ )
        {
            if ( $_GET['bSearchable_'.$i] == "true" )
            {
                $sWhere .= "".$aColumnsSearch[$i]." ILIKE '%".pg_escape_string( $_GET['sSearch'] )."%' OR ";
            }
        }
        $sWhere = substr_replace( $sWhere, "", -3 );
        $sWhere .= ")   ";


        
    }


//echo $sWhere;

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

    $sQuery  = " select cfsnme, cpplaf,cpouts,cfcif,acctno,type,jenis,bihub1  from pihak_tdk_terkait_ng  ";
    $sQuery .=" $sWhere ".

    //$sQuery .=" where a.username='".getUsername()."' ".
    
    $sOrder." ".
	$sLimit;
    //echo $sQuery."<br>";
    //die();
    //$rResult = pg_query( $connection, $sQuery ) or die(pg_last_error());
    $rResult  = $db->Execute($sQuery);
	
    $sQuery2  =" select count(*) as jumlah  from pihak_tdk_terkait_ng ";
    $sQuery2 .=" $sWhere ";
    //$sQuery .=" where a.username='".getUsername()."' ";
   //echo $sQuery2."<br>";
   // die();
    //echo $sQuery."<br>";
    //die();
	$rResultTotal  = $db->Execute($sQuery2);
    $iTotal=$rResultTotal->fields['jumlah'];		 	 


    
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


    $no=1;
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
            else if ( $aColumns[$i] == "no" )
            {
               
               $row[] = $no; 
            }
            else if ($aColumns[$i] == "cfcif") 
            {  
               $row[] = "<div>  <a href='#' class='btn default' disabled> <b>".$rResult->fields['cfcif']."</b></a></div>"; 
            } 
            else if ($aColumns[$i] == "acctno") 
            {  
               $row[] = "<div><a href='#' class='btn default' disabled> <b>".$rResult->fields['acctno']."</b></a></div>"; 
            } 
            else if ($aColumns[$i] == "cfsnme")
            {
               $row[] = "<div><a href='#' class='btn dark' disabled> <b>".$rResult->fields['cfsnme']."</b></a></div>"; 
            }
        
            else if ($aColumns[$i] == "cpgdes") 
            {   
               $row[] = "<div align='right'>  <a href='#' class='btn default' disabled> <b>".number_format(getCashCollFix($rResult->fields['acctno']),2,".",",")."</b></a></div>";
            }
            else if ($aColumns[$i] == "cpplaf") 
            {  
               $row[] = "<div align='right'>  <a href='#' class='btn default' disabled> <b>".number_format($rResult->fields['cpplaf'],2,".",",")."</b></a></div>"; 
            }       
                
            else if ($aColumns[$i] == "cpouts") 
            {  
               $row[] = "<div align='right'> <a href='#' class='btn default' disabled><b>".number_format($rResult->fields['cpouts'],2,".",",")."</b></a></div>"; 
            }
            else if ($aColumns[$i] == "type") 
            {  
               $row[] = "<div> <b>".$rResult->fields['type']."</b></div>"; 
            }
            
            else if ($aColumns[$i] == "jenis") 
            {               
               
                //$nama_action="<a  href='#' > <button class='btn red'> <b> Detail </b> <i class='fa fa-get-pocket'></i> </button></a>";
                $row[] = "<div> <b>".$rResult->fields['jenis']."</b></div>"; 


               //$row[] = $nama_action; 
            }
            else if ($aColumns[$i] == "bihub1") 
            {  
                 $row[] = "<div> <b>".$rResult->fields['bihub1']."</b></div>"; 
            }
            else if ( $aColumns[$i] != ' ' )
            {
                /* General output */
                $row[] = $rResult[ $aColumns[$i] ];
            }
        }
        $output['aaData'][] = $row;

        $no++;
        $rResult->MoveNext();

    }

    echo json_encode( $output );
?>
