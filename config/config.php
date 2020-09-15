<?php
//require_once "../library/adodb5/adodb.inc.php" ;
##########################################################################
#            -= YOU MAY NOT REMOVE OR CHANGE THIS NOTICE -=              #
# -----------------------------------------------------------------------#
# 																		 #
#  																		 #
#  	Developed by:	Asep Arifyan						    			 #
#	License:		Commercial											 #
#  	Copyright: 		2018. All Rights Reserved.		                     #
#                                                                        #
#  	Additional modules (embedded): 										 #
#	-- Metronic (Themes) 												 #
#																		 #
#																		 #
# -----------------------------------------------------------------------#
#	Designed and built with all the love ,patience, and loyalty.		 #
##########################################################################

###### FOR URL  ############################## 
$document_root 			= $_SERVER['SERVER_NAME'] == "127.0.0.1" ? str_replace('/', '\\', $_SERVER['DOCUMENT_ROOT']) : $_SERVER['DOCUMENT_ROOT'];
$this_directory_path 	= str_replace('\\', '/', str_replace($document_root, '', getcwd())).'/';
$this_nama_domain 		= str_replace('www.', '', $_SERVER['HTTP_HOST']);

######  FOR CONSTANT ############################

//require_once "constant.php" ;
include "constant.php" ;
//include("library/encrypt/class.encryption.php");
//$crypt = new hash_encryption('4d17369a9f261e55ae4b25815e019704fad79910');

###  CONNECTION  DATABASE MS SQL SERVER #############################

/* try{
 		$db = ADONewConnection('odbc_mssql');
 		$dsn = "Driver={".$global["DRIVER"]."};Server=$global[HOST];Database=$global[DATABASE];";
 		$db->Connect($dsn,"$global[DB_USER]","$global[PASSWORD]");
 		$db->SetFetchMode(ADODB_FETCH_ASSOC);
 		$db->debug = false;
 		if (!$db->IsConnected()){
 			header('location: 123456789?status=failed_conn');
 			exit;
 		}
 	}catch (Exception $e) {
		header('location: 123456789?status=failed_conn');
		die();
 		
 	}
*/

#######################   POSTGRESQL  #######################################3

try {
		$db = ADONewConnection('postgres');
		$db->connect("host=".$global["HOST"]." user=".$global["DB_USER"]." password=".$global["PASSWORD"]." dbname=".$global["DATABASE"]." port=5432");
		$db->SetFetchMode(ADODB_FETCH_ASSOC);
 		$db->debug = false;
 		if (!$db->IsConnected()){
 			//echo  "error,,,,,";
 			header('location: 123456789?status=failed_conn');
 			exit;
 		}

}catch (Exception $e) {
		//echo  "ada yg error";
		header('location: 123456789?status=failed_conn');
		die();
 		#die($e);
 	}





/*
$query_group="select * from user_account  ";
$RS  = $db->Execute($query_group);
while(!$RS->EOF){
echo $RS->fields['username']." ".$RS->fields['email']."<br>";
$RS->MoveNext();
}*/

































/*
// FOR LOCAL SERVER  PSAK71
$dsn="project.dulu711";
$usr="sa";
$pass="Instance12";
$connection = odbc_connect($dsn, $usr, $pass);
	


if (!$connection  ) {
	header('location: 123456789?status=failed_conn');
	die();
}


*/


?>