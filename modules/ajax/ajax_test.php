<?php
require_once "../../library/adodb5/adodb.inc.php" ;
//require_once '../../config/config.php';
//require_once '../../function/function.php';
/*$Host       ="10.5.37.2";
$DBName     ="-";
$Port       ="-1";
$dsn        ="10.5.37.2";
$User       ="SSADMIN";
$Password   ="SSADMIN";
$db = ADONewConnection('odbc');
     $dsn = "DRIVER={iSeries Access ODBC Driver};SYSTEM=$Host;DATABASE=$DBName;PROTOCOL=TCPIP;PORT=$Port;";
     if ($db->Connect($dsn,$User,$Password)){
        echo "It worked";
         $sql = "SELECT table_name, table_type, table_schema, system_table_name  FROM qsys2.systables";
         $rs = $db->Execute($sql);
         if (!$rs) echo "<p>no records</p>";
         else {
             $result = $rs->GetArray();
             echo "<pre>";
             print_r($result);
             echo "</pre>";
         }
     } else {
         echo "Not working";
         echo 'SQLSTATE: '.$db->ErrorNo()."<br>";
         echo 'Message: '.$db->ErrorMsg()."<br><br>";
     }*/

$dsn = "hostname=10.5.37.2;protocol=tcpip;port=-1;database=-;uid=ssadmin;pwd=ssadmin";
$conn = ADOnewConnection('db2');
$db->connect($dsn);

if (!$db->IsConnected()){
            echo  "error,,,,,";
            //header('location: 123456789?status=failed_conn');
            exit;
        }



?>