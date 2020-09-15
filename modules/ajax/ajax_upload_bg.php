<?php
session_start();
require_once "../../library/adodb5/adodb.inc.php" ;
require_once '../../config/config.php';
require_once '../../function/function.php';
require_once 'Classes/PHPExcel.php';
require_once 'Classes/PHPExcel/IOFactory.php';

error_reporting(0);

$nama_saya=session_id();

                  $arr_content=array();

                          ###################################### FOR START PROGRESS BAR #################################
                                $arr_content['percent'] = 2;
                                $arr_content['message'] = "<b>initialitation......</b>";
                                file_put_contents("tmp/" . session_id() . ".txt", json_encode($arr_content));
                          ##########################################################################################


                    
                      $nama_file_cek=$_FILES["nama_file"]["name"];
                      $file=$_FILES['nama_file']['tmp_name'];
                      $tgl_file=date('Y_m_d_H_i_s');
                      $directory= "../../data/upload/bg/";
                      copy ($file,$directory.$tgl_file.$nama_file_cek);
                      $dataFile_cek = $directory.$tgl_file.$nama_file_cek;


//echo "copy file success...."."<br>" ;



                      $objPHPExcel = PHPExcel_IOFactory::load($dataFile_cek);
//echo "Load file success...."."<br>" ;


                      $sheet = $objPHPExcel->getActiveSheet();
                      $objPHPExcel->setActiveSheetIndex(0);
                      $highestRow_cek = $sheet->getHighestRow(); 
            
/*echo "Load High success...."."<br>" ;
echo $highestRow_cek;
echo "<br>";*/
                      $myformat= strtoupper($objPHPExcel->getActiveSheet()->getCell("B3")->getValue());
                      if ($myformat != "BANK GARANSI"){

                          echo    "<div class='alert alert-danger' >";
                          echo    "<button class='close' data-close='alert'></button>";
                          echo    "<strong> Failed Excel Format . . . ! , Please Check Format.... !  </strong>";
                          echo    "</div>"; 
                          die();
                      }




                      $x1=5;
                      $data1_cek = $sheet->rangeToArray("A$x1:Q$highestRow_cek");
                      $i=1;
                      $z=0;

                         ###################################### FOR START PROGRESS BAR #################################
                                $arr_content['percent'] = 10;
                                $arr_content['message'] = "<b>Successful Copy & Read excel .....................</b>";
                                file_put_contents("tmp/" . session_id() . ".txt", json_encode($arr_content));
                                sleep(2);
                          ##########################################################################################

                     /* echo $dataFile_cek."<br>";
                      echo count($data1_cek);
                      echo "<br>";*/
                      //die();



                    $curr_tanggal=strtolower(date("j-M-y"));





                    $setengah=intval($highestRow_cek/2);
                    $report_error=0;  
                    $report_baris=" ";


                    ########### Truncate table ################
                 //   if (count($data1_cek)>=4){
                        $sql_truncate   = " truncate table bmpk_bank_guarantee ";
                        $RS_TRUNCATE    = $db->Execute($sql_truncate);

                //    }
                    ###########################################
                    foreach ($data1_cek as $row => $value) { 
                                  $nama_debitur      = $value[1];
                                  $pihak_terkait     = $value[2];
                                  $jenis_fasilitas   = $value[3];
                                  $sifat_fasilitas   = $value[4];
                                  //$plfond            = $value[5];
                                  $plfond            = $objPHPExcel->getActiveSheet()->getCell("F$x1")->getValue();
                                  //$outstanding       = $value[6];
                                  $outstanding       = ($x1==5) ? $objPHPExcel->getActiveSheet()->getCell("G$x1")->getCalculatedValue() : $objPHPExcel->getActiveSheet()->getCell("G$x1")->getValue();
                                  //$unused            = $value[7];
                                  $unused            = $objPHPExcel->getActiveSheet()->getCell("H$x1")->getCalculatedValue();
                                  $cash_colateral    = $objPHPExcel->getActiveSheet()->getCell("I$x1")->getValue();
                                  //$cash_colateral    = ($cash_colateral < 100) ? $cash_colateral*100 : $cash_colateral; 
                                  $keterangan        = str_replace("'", "", $value[9]);
                                  $special_condition = $value[10];
                                 
                                   $add_by            = getUsername();
                                  // $adddt             = 


                                if( ($value[0] != "")){

                                            
                                            // echo "".$i." ";
                                    // echo "".$value[1]." - ".$value[2]." - ".$value[3]." - ".$value[4]." - ".$plfond." - ".$outstanding." - ".$unused;
                                    // echo " - ".$cash_colateral." - ".$value[9]." - ".$value[10];
                                    // echo "</br>";

                                    $sql_insert =" insert into bmpk_bank_guarantee (nama_debitur,pihak_terkait,jenis_fasilitas,sifat_fasilitas, ";
                                    $sql_insert.=" plfond,outstanding,unused,cash_colateral,keterangan,special_condition,add_by,adddt) values  ";
                                    $sql_insert.=" ('$nama_debitur','$pihak_terkait','$jenis_fasilitas','$sifat_fasilitas','$plfond','$outstanding', ";
                                    $sql_insert.=" '$unused','$cash_colateral','$keterangan','$special_condition','$add_by',CURRENT_TIMESTAMP) ";
                                    //echo $sql_insert."<br>";
                                    //die();
                                    $RS_INSERT  = $db->Execute($sql_insert);


                                            if ($i==$setengah) {
                                $arr_content['percent'] = 50;
                                $arr_content['message'] = "<b>Inserting ................</b>";
                                file_put_contents("tmp/" . session_id() . ".txt", json_encode($arr_content));
                                sleep(1);
                                            }

                                         


                         $i++;
                         $x1++;

                        }
                           
                    }

                          ###################################### FOR START PROGRESS BAR #################################
                                $arr_content['percent'] = 90;
                                $arr_content['message'] = "<b>Inserting ......................</b>";
                                file_put_contents("tmp/" . session_id() . ".txt", json_encode($arr_content));
                                sleep(2);
                          ##########################################################################################



                          ###################################### FOR START PROGRESS BAR #################################
                                $arr_content['percent'] = 100;
                                $arr_content['message'] = "<b>Finished ..................</b>";
                                file_put_contents("tmp/" . session_id() . ".txt", json_encode($arr_content));
                          ##########################################################################################
                                //sleep(2);
//echo $report_baris;


                echo    "<div class='alert alert-success' >";
                echo    "<button class='close' data-close='alert'></button>";
                echo    "<strong> Successfull Upload . . . . . . . . . !   </strong>";
                echo    "</div>"; 









?>