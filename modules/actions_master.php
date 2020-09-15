<?php
session_start();
  require_once "../library/adodb5/adodb.inc.php";
	require_once '../config/config.php';
	require_once '../function/function.php';
	require_once '../session_login.php';

//error_reporting(0);


date_default_timezone_set("Asia/Jakarta");
#######################################################################################################################################
#################################################    ADD USER   #######################################################################
#######################################################################################################################################
    if (($_GET['module'])==sha1('2') && ($_GET['act']=='add_user')){

          $username=strtolower($_POST['username']);
          $password=hashEncrypted($_POST['password']);
          $status_account=$_POST['status'];
          $group_user=$_POST['group_user'];
          $namalengkap=$_POST['nama_lengkap'];
          $email=trim($_POST['email']);

         // echo $_POST['password']."<br>";
          #############  CEK PASSWORD      ########################
          if( !is_numeric($_POST['password'])){
              $varx=" Password tidak mengandung Angka ";
              logActivity("FAILED QUERY ADD USER","MENU=2, username=$username,password=$password,groupid=$group_user,email=$email,namalengkap=$namalengkap,status=$status_account,UserIDAction=".getUsername());
              header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=errorx&varx=$varx");
              die();
          }
          if( !ctype_upper($_POST['password'])){
              $varx=" Password tidak mengandung Huruf Besar ";
              logActivity("FAILED QUERY ADD USER","MENU=2, username=$username,password=$password,groupid=$group_user,email=$email,namalengkap=$namalengkap,status=$status_account,UserIDAction=".getUsername());
              header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=errorx&varx=$varx");
              die();
          }
          if( !ctype_lower($_POST['password'])){
              $varx=" Password tidak mengandung Huruf Kecil ";
              logActivity("FAILED QUERY ADD USER","MENU=2, username=$username,password=$password,groupid=$group_user,email=$email,namalengkap=$namalengkap,status=$status_account,UserIDAction=".getUsername());
              header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=errorx&varx=$varx");
              die();
          }

          #############  CEK ALREADY USER  #########################

          $SQLcek =" SELECT * FROM user_account where username='$username' ";
          $RScek  = $db->Execute($SQLcek);
          $found  = $RScek->Rowcount();

          if($found==0){

                        //###################  INSERT USER   ################//

                      $SQL =" INSERT INTO user_account (username,password,namalengkap,email,groupid,status, ";
                      $SQL.=" adddt,addby) ";
                      $SQL.=" VALUES('$username','$password','$namalengkap','$email','$group_user','$status_account', ";
                      $SQL.=" current_timestamp,'".trim(getUsername())."') ";

                       /*echo $SQL;
                       die();*/
                      $RS  = $db->Execute($SQL);

                      if ($RS !=false){ 

                                logActivity("ADD USER","MENU=2, username=$username,password=$password,groupid=$group_user,email=$email,namalengkap=$namalengkap,status=$status_account,UserIDAction=".getUsername());
                        
                                $from='noreplay@no-reply.com';
                                $subject=' Notifikasi Create Account User ';
                                $message =" <b>Notifikasi Email User Aplikasi ".constant("TITLE_APP")." </b> <br>";
                                $message.=" ############################################################################ <br><br>";
                                $message.=" Selamat Anda telah berhasil membuat Akun Baru dengan identitas sbb: <br>";
                                $message.=" Username : <b>$username</b> <br>"; 
                                $message.=" Password : $_POST[password] <br>"; 
                                $message.=" <br><br><br><br>"; 
                                $message.=" Klik <a href='http://".$_SERVER['SERVER_ADDR'].":".$_SERVER['SERVER_PORT'].str_replace("/modules/actions_master.php", "", $_SERVER['PHP_SELF'])."' > <b> disini </b> </a> untuk login "; 
                                $message.=" <br><br>"; 
                                //$message.=" Untuk Login Klik Link Berikut : <a href='http://10.5.19.69:81/projectdulu.co.id/login'> Login </a><br>";
                                $message.=" </i> *catatan: anda bisa mengganti password anda sewaktu-waktu </i><br><br>";
                                $message.=" <br><br><br><br>"; 
                                $message.=" ---------------------------------- <br>";
                                $message.=" PT. Bank Mnc Internasional, Tbk <br>";
                                $message.=" <b>Admin BMPK System</b> <br>";
                                $message.=" <i>Email : admin.bmpk@mncbank.co.id </i> <br>";
                                
                                $headers = 'From: '.$from. "\r\n" .
                                      'Reply-To: '.$from . "\r\n" .
                                      'X-Mailer: PHP/' . phpversion(). "\r\n";
                                $headers .= 'MIME-Version: 1.0' . "\r\n";
                                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                                mail($email, $subject, $message, $headers);
                                header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success");
                        } else  {
                                logActivity("FAILED QUERY ADD USER","MENU=2, username=$username,password=$password,groupid=$group_user,email=$email,namalengkap=$namalengkap,status=$status_account,UserIDAction=".getUsername());
                                header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error");
                            }

          }else{
                      logActivity("FAILED ALREADY EXIST USER","MENU=2, username=$username,password=$password,groupid=$group_user,email=$email,namalengkap=$namalengkap,status=$status_account,UserIDAction=".getUsername());
                      header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error1&var=$username");
            }
    }
#######################################################################################################################################
#################################################    UPDATE USER   ####################################################################
#######################################################################################################################################
          if (($_GET['module'])==sha1('2') && ($_GET['act']=='edit_user')){


                      $ed_username=$_POST['username'];
                      $ed_status_account=$_POST['status'];
                      $ed_group_user=$_POST['group_user'];
                      $ed_nama_lengkap=$_POST['nama_lengkap'];
                      $ed_email=$_POST['email'];
                      $ed_password=$_POST['password'];
          #############  CEK PASSWORD      ########################
          if( !is_numeric($_POST['password']) && isset($ed_password) && $ed_password!="" ){
              $varx=" Password tidak mengandung Angka ";
              logActivity("FAILED QUERY ADD USER","MENU=2, username=$username,password=$password,groupid=$group_user,email=$email,namalengkap=$namalengkap,status=$status_account,UserIDAction=".getUsername());
              header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=errorx&varx=$varx");
              die();
          }
          if( !ctype_upper($_POST['password']) && isset($ed_password) && $ed_password!="" ){
              $varx=" Password tidak mengandung Huruf Besar ";
              logActivity("FAILED QUERY ADD USER","MENU=2, username=$username,password=$password,groupid=$group_user,email=$email,namalengkap=$namalengkap,status=$status_account,UserIDAction=".getUsername());
              header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=errorx&varx=$varx");
              die();
          }
          if( !ctype_lower($_POST['password']) && isset($ed_password) && $ed_password!="" ){
              $varx=" Password tidak mengandung Huruf Kecil ";
              logActivity("FAILED QUERY ADD USER","MENU=2, username=$username,password=$password,groupid=$group_user,email=$email,namalengkap=$namalengkap,status=$status_account,UserIDAction=".getUsername());
              header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=errorx&varx=$varx");
              die();
          }




                          if (isset($ed_password) && $ed_password!="" ){
                                $password=hashEncrypted($ed_password);
                                $var_password=" ,password='$password' ";
                                $flag_pass=1;
                          } else {
                                $var_password=" ";
                                $flag_pass=0;
                              }


                      $query =" UPDATE user_account SET groupid='$ed_group_user', email='$ed_email', namalengkap='$ed_nama_lengkap', ";
                      $query.=" status='$ed_status_account'  $var_password WHERE  username='$ed_username' ";
                     /* echo $query;
                      die();*/
                      $RS  = $db->Execute($query);
        
                    	if ($RS != false ){
                            if ($flag_pass=='1'){
                                $from='noreplay@no-reply.com';
                                $subject=' Notifikasi Update Password ';
                                $message =" <b>Notifikasi Update Password User Aplikasi ".constant("TITLE_APP")."</b> <br>";
                                $message.=" ############################################################################ <br><br>";
                                $message.=" Selamat Anda telah berhasil mengupdate password dg identitas sbb: <br>";
                                $message.=" Username : <b>$ed_username</b> <br>"; 
                                $message.=" Password : $_POST[password] <br>"; 
                                $message.=" <br><br>"; 
                                $message.=" Klik <a href='http://".$_SERVER['SERVER_ADDR'].":".$_SERVER['SERVER_PORT'].str_replace("/modules/actions_master.php", "", $_SERVER['PHP_SELF'])."' > <b> disini </b> </a> untuk login "; 
                                $message.=" <br><br>"; 
                               /* $message.=" Untuk Login Klik Link Berikut : <a href='http://localhost:81/PSAK71/login'> Login </a><br>";*/
                                $message.=" </i> *catatan: anda bisa mengganti password anda sewaktu-waktu </i><br><br>";
                                $message.=" <br><br><br><br>"; 
                                $message.=" ---------------------------------- <br>";
                                $message.=" PT. Bank Mnc Internasional, Tbk <br>";
                                $message.=" <b>Admin BMPK System</b> <br>";
                                $message.=" <i>Email : admin.bmpk@mncbank.co.id </i> <br>";
                                $headers = 'From: '.$from. "\r\n" .
                                      'Reply-To: '.$from . "\r\n" .
                                      'X-Mailer: PHP/' . phpversion(). "\r\n";
                                $headers .= 'MIME-Version: 1.0' . "\r\n";
                                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                                mail($ed_email, $subject, $message, $headers);
                            }


                      			logActivity("EDIT USER","MENU=2, groupid=$ed_group_user, email=$ed_email, namalengkap=$ed_nama_lengkap, status=$ed_status_account,updateby=".getUsername()." $var_password ");
                      			header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success3");
                      } else  {
                      			header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error3");

                      		}


          }
#######################################################################################################################################
#################################################    DELETE USER   ####################################################################
#######################################################################################################################################
          
          if (($_GET['module'])==sha1('2') && ($_GET['act']=='delete_user')){

                    $username=strtolower($_POST['username']);
                    $SQL=" DELETE from user_account where username='$username' ";
                    $RS  = $db->Execute($SQL);
                    //$result=odbc_exec($connection, $query);

                    if ($RS != false)
                      		{ 
                      			logActivity("DELETE USER","MENU=2,username=$username, MENU=2");
                      			header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success2");
                      	} else  {
                           logActivity("FAILED DELETE USER","MENU=2,username=$username, MENU=2");
                      			header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error2");

                      		}



          }
#######################################################################################################################################
################################################# ADD GROUP USER ######################################################################
#######################################################################################################################################

            if (($_GET['module'])==sha1('3') && ($_GET['act']=='add_group_user')){

                    $nama_group=trim($_POST['name']);
                    $inisial=trim($_POST['inisial']);
                

                    ############   Query CEK BEFORE INSERT   ###########################################
                    $SQLcek=" SELECT * FROM  group_user WHERE groupname='$nama_group'  ";
                    $RScek  = $db->Execute($SQLcek);
                    $found=$RScek->Rowcount();
                    ############   END CHECK   ###################################################
                    if ($found ==0 ){

                              $query =" INSERT into group_user (groupname,inisial,adddt,addby) values ('$nama_group',";
                              $query.=" '$inisial',current_timestamp,'$_SESSION[USERNAME]')";
                              $RS  = $db->Execute($query);

                            	if ($RS != false)
                              		{
                              			logActivity("ADD GROUP USER","MENU=3, groupname=$nama_group,inisial=$inisial ");
                              			header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success");
                              	} else  {
                                    logActivity("FAILED ADD GROUP USER","MENU=3, groupname=$nama_group,inisial=$inisial ");
                              			header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error");

                              		}


                    }else{

                                  logActivity("ALREADY EXIST GROUP USER","MENU=3, groupname=$nama_group,inisial=$inisial");
                                  header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error1&var=$nama_group ");


                    }
            }
#######################################################################################################################################
################################################# UPDATE GROUP USER ###################################################################
#######################################################################################################################################

            if (($_GET['module'])==sha1('3') && ($_GET['act']=='edit_group_user')){
                    $groupid=trim($_POST['groupid']);
                    $nama_group=trim($_POST['name']);
                    $inisial=trim($_POST['inisial']);

                    ############   Query CEK BEFORE INSERT   ###########################################
                    $SQLcek=" SELECT * FROM  group_user WHERE groupid='$groupid'  ";
                    $RScek  = $db->Execute($SQLcek);
                    $found=$RScek->Rowcount();
                    ############   END CHECK   ###################################################
                    if ($found ==1 ){
                              $query =" UPDATE  group_user set groupname='$nama_group',inisial='$inisial',updatedt=current_timestamp, ";
                              $query.=" updateby='$_SESSION[USERNAME]' WHERE groupid='$groupid' "; 
                              $RS  = $db->Execute($query);

                              	if ($RS !=false)
                                		{
                                			logActivity("EDIT GROUP MENU","MENU=3, groupname=$nama_group,inisial=$inisial");
                                			header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success3");
                                } else  {
                                      logActivity("FAILED EDIT GROUP MENU","MENU=3, groupname=$nama_group,inisial=$inisial");
                                			header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error3");
                                		}
                    }else{


                                    logActivity("ALREADY EXIST GROUP USER","MENU=3, groupname=$nama_group,inisial=$inisial");
                                    header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error1&var=$nama_group ");


                    }



            }
#######################################################################################################################################
################################################# DELETE GROUP USER ###################################################################
#######################################################################################################################################
            if (($_GET['module'])==sha1('3') && ($_GET['act']=='delete_group_user')){


                    $groupid=$_POST['groupid'];
                    $query=" DELETE FROM group_user where groupid='$groupid'";
                    $RS  = $db->Execute($query);
                    //echo $query;
                    //die();


                    if ($RS !=false)
                      		{
                      			logActivity("DELETE GROUP USER","MENU=3, groupid=$groupid");
                      			header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success2");
                    } else  {
                            logActivity("FAILED DELETE GROUP USER","MENU=3, groupid=$groupid");
                      			header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error2");

                      	}


            }
#######################################################################################################################################
####################################################### ADD MENU ######################################################################
#######################################################################################################################################

    if (($_GET['module'])==sha1('5') && ($_GET['act']=='add_menu')){


            $nama_menu=trim($_POST['name']);
            $address=trim($_POST['address']);
            $parent=$_POST['parent'];

            $query =" INSERT INTO menu (menuname,parentmenu,address,adddt,addby,src,icon) values ('$nama_menu','$parent','$address',current_timestamp, ";
            $query.=" '$_SESSION[USERNAME]','-','icon-settings') returning idmenu  ";

            $RS  = $db->Execute($query);

            if ( $RS->fields['idmenu'] !="" ){

                            $id_menu=$RS->fields['idmenu'];
                            $id_menu_encrypt=sha1($RS->fields['idmenu']);
                            //$parent=$RS2->fields['ParentMenu'];
                            if ($parent != 0) {
                                $query3=" UPDATE menu set src='$id_menu_encrypt' where idmenu='$id_menu' ";
                                $RS2  = $db->Execute($query3);
                            }

            } else {

                    logActivity("FAILED ADD MENU","MENU=5, menuname=$nama_menu,parent=$parent");
                    header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error");
                }
           /* echo $RS->fields['idmenu'];
            die();*/
            /*
            $query2=" SELECT * from menu where menuname='$nama_menu' and ParentMenu='$parent' ";
            $RS2  = $db->Execute($query2);
            $num_menu=$RS2->Rowcount();

            if ($num_menu =='1' ){

                            $id_menu=$RS2->fields['IdMenu'];
                            $id_menu_encrypt=sha1($RS2->fields['IdMenu']);
                            $parent=$RS2->fields['ParentMenu'];
                            if ($parent != 0) {
                                $query3=" UPDATE PS_MENU set Src='$id_menu_encrypt' where IdMenu='$id_menu' ";
                                $RS3  = $db->Execute($query3);
                            }

            } else {

                    header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error");
                }

            */







            	if (($RS != false)  )
              		{
                    logActivity("ADD MENU","MENU=5, menuname=$nama_menu,parent=$parent,idmenu=$id_menu");
              			header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success");
              } else  {
                    logActivity("FAILED ADD MENU","MENU=5, menuname=$nama_menu,parent=$parent");
              			header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error");

              	}


    }

#######################################################################################################################################
####################################################### EDIT MENU #####################################################################
#######################################################################################################################################

        if (($_GET['module'])==sha1('5') && ($_GET['act']=='edit_menu')){


        $id_menu=$_POST['idmenu'];
        $ed_address=trim($_POST['address']);
        $parent=$_POST['parent'];
        $nama_menu=$_POST['name'];


        $query=" UPDATE menu set   menuname='$nama_menu',parentmenu='$parent',address='$ed_address' where  idmenu='$id_menu'";
        $RS=$db->Execute($query);

        	if ($RS !=false)
          		{
          			logActivity("EDIT MENU","MENU=5,menuname=$nama_menu,parentmenu=$parent,idmenu=$id_menu");
          			header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success3");
          	} else  {
                logActivity("FAILED EDIT MENU","MENU=5,menuname=$nama_menu,parentmenu=$parent,idmenu=$id_menu");
          			header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error3");

          		}


        }
#######################################################################################################################################
####################################################### DELETE MENU ###################################################################
#######################################################################################################################################

        if (($_GET['module'])==sha1('5') && ($_GET['act']=='delete_menu')){
        $id_menu=$_POST['idmenu'];
        $query=" DELETE from menu where idmenu='$id_menu'";
        $RS=$db->Execute($query);

        if ($RS !=false)
          		{	logActivity("DELETE MENU","MENU=5, idmenu=$id_menu");
          			header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success2");
          	} else  {
          			header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error2");

          		}


        }
#######################################################################################################################################
#################################################    ADD MODAL BANK   #################################################################
#######################################################################################################################################

            if (($_GET['module'])==sha1('19') && ($_GET['act']=='add_modal_bank')){

                    $nama_modal   =trim($_POST['nama_modal']);

                    $nominal      =trim($_POST['nominal']);
                    $status       =trim($_POST['status']);

                    ############   Query CEK BEFORE INSERT   ###########################################
                    $SQLcek=" SELECT * FROM  modal_bank WHERE nama_modal='$nama_modal'  ";
                    
                   // echo $SQLcek."<br>";
                    $RScek  = $db->Execute($SQLcek);
                    $found=$RScek->Rowcount();
                    ############   END CHECK   ###################################################
                    if ($found ==0 ){

                              $query =" INSERT into modal_bank (nama_modal,nominal,adddt,addby,updatedt,updateby,status) " ;
                              $query.=" values ('$nama_modal','$nominal',current_timestamp,'$_SESSION[USERNAME]', ";
                              $query.=" current_timestamp,'$_SESSION[USERNAME]','0')";
                              //echo $query."<br>";
                              //die();
                              $RS  = $db->Execute($query);

                              if ($RS != false)
                                  {
                                    logActivity("ADD MODAL BANK","MENU=19, nama_modal=$nama_modal,nominal=$nominal,status=$status");
                                    header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success");
                                } else  {
                                    logActivity("FAILED ADD MODAL BANK","MENU=19, nama_modal=$nama_modal,nominal=$nominal,status=$status");
                                    header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error");

                                  }


                    }else{

                                  logActivity("ALREADY EXIST MODAL BANK","MENU=19, nama_modal=$nama_modal,nominal=$nominal,status=$status ");
                                  header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error1&var=$nama_modal ");


                    }
            }
#######################################################################################################################################
################################################# UPDATE MODAL BANK  ##################################################################
#######################################################################################################################################

            if (($_GET['module'])==sha1('19') && ($_GET['act']=='edit_modal_bank')){
                    $id_modal=trim($_POST['ed_id_modal']);
                    $nama_modal=trim($_POST['ed_nama_modal']);
                    $nominal=trim($_POST['ed_nominal']);
                    $status=trim($_POST['ed_status']);
                    ############   Query CEK BEFORE INSERT   ###########################################
                    $SQLcek=" SELECT * FROM  modal_bank WHERE id_modal='$id_modal'  ";
                     //echo $SQLcek."<br>";
                     //die();
                    $RScek  = $db->Execute($SQLcek);
                    $found  =$RScek->Rowcount(); 
                    ############   END CHECK   ###################################################
                    if ($found ==1 ){
                              $query =" UPDATE  modal_bank set nama_modal='$nama_modal',nominal='$nominal',updatedt=current_timestamp, ";
                              $query.=" updateby='$_SESSION[USERNAME]',status='0' WHERE id_modal='$id_modal' "; 

                             /* echo $query;
                              die();*/
                              $RS  = $db->Execute($query);

                                if ($RS !=false)
                                    {
                                      logActivity("EDIT MODAL BANK","MENU=19, nama_modal=$nama_modal,nominal=$nominal,id_modal=$id_modal");
                                      header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success3");
                                } else  {
                                      logActivity("FAILED EDIT MODAL BANK","MENU=19, nama_modal=$nama_modal,nominal=$nominal,id_modal=$id_modal");
                                      header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error3");
                                    }
                    }else{


                                    logActivity("ALREADY EXIST MODAL BANK","MENU=19, nama_modal=$nama_modal,nominal=$nominal,id_modal=$id_modal");
                                    header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error1&var=$nama_modal ");


                    }



            }
#######################################################################################################################################
################################################# DELETE MODAL BANK   ###################################################################
#######################################################################################################################################
            if (($_GET['module'])==sha1('19') && ($_GET['act']=='delete_modal_bank')){

                    $id_modal=$_POST['id_modal'];
                    $query=" DELETE FROM modal_bank where id_modal='$id_modal'";
                    $RS  = $db->Execute($query);
                    //echo $query;
                    //die();


                    if ($RS !=false)
                          {
                            logActivity("DELETE MODAL BANK","MENU=19, id_modal=$id_modal");
                            header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success2");
                    } else  {
                            logActivity("FAILED MODAL BANK","MENU=19, id_modal=$id_modal");
                            header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error2");

                        }


            }

#######################################################################################################################################
################################################# APPROVE MODAL BANK   ###################################################################
#######################################################################################################################################
            if (($_GET['module'])==sha1('19') && ($_GET['act']=='approve_modal_bank')){

                   
                    $query=" UPDATE modal_bank SET status='1', updatedt=current_timestamp  ";
                    $RS  = $db->Execute($query);
                    //echo $query;
                    //die();


                    if ($RS !=false)
                          {
                            logActivity("APPROVE MODAL BANK","MENU=19, Approve Success");
                            header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success4");
                    } else  {
                            logActivity("FAILED APPROVE MODAL BANK","MENU=19, Approve Failed");
                            header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error4");

                        }


            }


#######################################################################################################################################
#################################################    ADD KURS BANK   ##################################################################
#######################################################################################################################################

            if (($_GET['module'])==sha1('20') && ($_GET['act']=='add_kurs_bank')){

                    $kode_kurs   =trim($_POST['kode_kurs']);
                    $nominal      =trim($_POST['nominal']);
                    $status       =trim($_POST['status']);

                    ############   Query CEK BEFORE INSERT   ###########################################
                    $SQLcek=" SELECT * FROM  kurs_bank WHERE kode_kurs='$kode_kurs'  ";
                    
                   // echo $SQLcek."<br>";
                    $RScek  = $db->Execute($SQLcek);
                    $found=$RScek->Rowcount();
                    ############   END CHECK   ###################################################
                    if ($found ==0 ){

                              $query =" INSERT into kurs_bank (kode_kurs,nominal,status,adddt,addby,updatedt,updateby,status) " ;
                              $query.=" values ('$kode_kurs','$nominal','$status',current_timestamp,'$_SESSION[USERNAME]', ";
                              $query.=" current_timestamp,'$_SESSION[USERNAME]','0')";
                             // echo $query."<br>";
                             // die();
                              $RS  = $db->Execute($query);

                              if ($RS != false)
                                  {
                                    logActivity("ADD KURS BANK","MENU=20, kode_kurs=$kode_kurs,nominal=$nominal,status=$status");
                                    header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success");
                                } else  {
                                    logActivity("FAILED ADD KURS BANK","MENU=20, kode_kurs=$kode_kurs,nominal=$nominal,status=$status");
                                    header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error");

                                  }


                    }else{

                                  logActivity("ALREADY EXIST KURS BANK","MENU=20, kode_kurs=$kode_kurs,nominal=$nominal,status=$status");
                                  header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error1&var=$nama_modal ");


                    }
            }
#######################################################################################################################################
################################################# UPDATE KURS BANK  ##################################################################
#######################################################################################################################################

            if (($_GET['module'])==sha1('20') && ($_GET['act']=='edit_kurs_bank')){
                    $id_kurs=trim($_POST['ed_id_kurs']);
                    $kode_kurs=trim($_POST['ed_kode_kurs']);
                    $nominal=trim($_POST['ed_nominal']);
                    $status=trim($_POST['ed_status']);
                    ############   Query CEK BEFORE INSERT   ###########################################
                    $SQLcek=" SELECT * FROM  kurs_bank WHERE id_kurs='$id_kurs'  ";
                     //echo $SQLcek."<br>";
                     //die();
                    $RScek  = $db->Execute($SQLcek);
                    $found  =$RScek->Rowcount(); 
                    ############   END CHECK   ###################################################
                    if ($found ==1 ){
                              $query =" UPDATE  kurs_bank set kode_kurs='$kode_kurs',nominal='$nominal',updatedt=current_timestamp, ";
                              $query.=" updateby='$_SESSION[USERNAME]',status='0' WHERE id_kurs='$id_kurs' "; 

                             /* echo $query;
                              die();*/
                              $RS  = $db->Execute($query);

                                if ($RS !=false)
                                    {
                                      logActivity("EDIT KURS BANK","MENU=20, kode_kurs=$kode_kurs,nominal=$nominal,id_kurs=$id_kurs");
                                      header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success3");
                                } else  {
                                      logActivity("FAILED EDIT KURS BANK","MENU=20, kode_kurs=$kode_kurs,nominal=$nominal,id_kurs=$id_kurs");
                                      header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error3");
                                    }
                    }else{


                                    logActivity("ALREADY EXIST KURS BANK","MENU=20, kode_kurs=$kode_kurs,nominal=$nominal,id_kurs=$id_kurs");
                                    header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error1&var=$kode_kurs ");


                    }



            }
#######################################################################################################################################
################################################# DELETE KURS BANK   #################################################################
#######################################################################################################################################
            if (($_GET['module'])==sha1('20') && ($_GET['act']=='delete_kurs_bank')){

                    $id_kurs=$_POST['id_kurs'];
                    $query=" DELETE FROM kurs_bank where id_kurs='$id_kurs'";
                    $RS  = $db->Execute($query);
                    //echo $query;
                    //die();


                    if ($RS !=false)
                          {
                            logActivity("DELETE KURS BANK","MENU=20, id_kurs=$id_kurs");
                            header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success2");
                    } else  {
                            logActivity("FAILED KURS BANK","MENU=20, id_kurs=$id_kurs");
                            header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error2");

                        }


            }

#######################################################################################################################################
################################################# APPROVE KURS BANK   ################################################################
#######################################################################################################################################
            if (($_GET['module'])==sha1('20') && ($_GET['act']=='approve_kurs_bank')){

                   
                    $query=" UPDATE kurs_bank SET status='1', updatedt=current_timestamp  ";
                    $RS  = $db->Execute($query);
                    //echo $query;
                    //die();


                    if ($RS !=false)
                          {
                            logActivity("APPROVE KURS BANK","MENU=20, Approve Success");
                            header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success4");
                    } else  {
                            logActivity("FAILED APPROVE KURS BANK","MENU=20, Approve Failed");
                            header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error4");

                        }


            }
#######################################################################################################################################
#################################################    ADD PROSENTASE MODAL #############################################################
#######################################################################################################################################

            if (($_GET['module'])==sha1('21') && ($_GET['act']=='add_pro_modal')){

                    $nama_tipe    =trim($_POST['nama_tipe']);
                    $prosentase   =trim($_POST['prosentase']);
                    $fr_modal     =trim($_POST['fr_modal']);

                    $modal_inti       = JmlModalInti();
                    $modal_pelengkap  = JmlModalpelengkap();
                    $total_modal_bank = (JmlModalInti()+JmlModalpelengkap());

 

                    if($fr_modal=='99'){
                      $nominal_modal  = $total_modal_bank;
                    }else if ($fr_modal=='1') {
                      $nominal_modal  = $modal_inti;
                    }else if ($fr_modal=='4') {
                      $nominal_modal  = $modal_pelengkap;
                    }
                    

                    // $formula =number_format((JmlModalInti()+JmlModalpelengkap())*($RS2->fields['prosentase']/100),2,".",",");
                              
                    $formula = $nominal_modal * ($prosentase/100);

                    $status       ='0';

                    ############   Query CEK BEFORE INSERT   ###########################################
                    $SQLcek=" SELECT * FROM  prosentase_modal WHERE nama_tipe='$nama_tipe'  ";
                    
                    //echo $SQLcek."<br>";
                    $RScek  = $db->Execute($SQLcek);
                    $found=$RScek->Rowcount();
                    ############   END CHECK   ###################################################
                    if ($found ==0 ){

                              $query =" INSERT into prosentase_modal (nama_tipe,prosentase,status,adddt,addby,updatedt,updateby,kode_modal,limit_bmpk) " ;
                              $query.=" values ('$nama_tipe','$prosentase','$status',current_timestamp,'$_SESSION[USERNAME]', ";
                              $query.=" current_timestamp,'$_SESSION[USERNAME]','$fr_modal','$formula')";
                              //echo $query."<br>";
                              //die();
                              $RS  = $db->Execute($query);

                              if ($RS != false)
                                  {
                                    logActivity("ADD PROSENTASE MODAL","MENU=21, nama_tipe=$nama_tipe,prosentase=$prosentase,status=$status");
                                    header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success");
                                } else  {
                                    logActivity("FAILED ADD PROSENTASE MODAL","MENU=21, nama_tipe=$nama_tipe,prosentase=$prosentase,status=$status");
                                    header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error");

                                  }


                    }else{

                                  logActivity("ALREADY EXIST PROSENTASE MODAL","MENU=21, nama_tipe=$nama_tipe,prosentase=$prosentase,status=$status");
                                  header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error1&var=$nama_tipe ");


                    }
            }

#######################################################################################################################################
################################################# UPDATE PROSENTASE MODAL  ############################################################
#######################################################################################################################################

            if (($_GET['module'])==sha1('21') && ($_GET['act']=='edit_pro_modal')){
                    $id_pro=trim($_POST['ed_id_pro']);
                    $prosentase=trim($_POST['ed_prosentase']);
                    $nama_tipe=trim($_POST['ed_nama_tipe2']);
                    $fr_modal     =trim($_POST['ed_fr_modal']);

                    $modal_inti       = JmlModalInti();
                    $modal_pelengkap  = JmlModalpelengkap();
                    $total_modal_bank = (JmlModalInti()+JmlModalpelengkap());

 
                    if($fr_modal=='99'){
                      $nominal_modal  = $total_modal_bank * ($prosentase/100);
                    }else if ($fr_modal=='1') {
                      $nominal_modal  = $modal_inti * ($prosentase/100);
                    }else if ($fr_modal=='4') {
                      $nominal_modal  = $modal_pelengkap * ($prosentase/100);
                    }

                    ############   Query CEK BEFORE INSERT   ###########################################
                    $SQLcek=" SELECT * FROM  prosentase_modal WHERE id_pro='$id_pro' ";
                     //echo $SQLcek."<br>";
                     //die();
                    $RScek  = $db->Execute($SQLcek);
                    $found  =$RScek->Rowcount(); 
                    ############   END CHECK   ###################################################
                    if ($found ==1 ){
                              $query =" UPDATE  prosentase_modal set prosentase='$prosentase',status='0',updatedt=current_timestamp, ";
                              $query.=" updateby='$_SESSION[USERNAME]',kode_modal='$fr_modal',limit_bmpk='$nominal_modal' WHERE id_pro='$id_pro' "; 

                            /*  echo $query;
                              die();*/
                              $RS  = $db->Execute($query);

                                if ($RS !=false)
                                    {
                                      logActivity("EDIT PROSENTASE MODAL","MENU=21, kode_modal=$fr_modal, prosentase=$prosentase,id_pro=$id_pro");
                                      header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success3");
                                } else  {
                                      logActivity("FAILED EDIT PROSENTASE MODAL","MENU=21, kode_modal=$fr_modalprosentase=$prosentase,id_pro=$id_pro");
                                      header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error3");
                                    }
                    }else{
                                    logActivity("ALREADY EXIST PROSENTASE MODAL","MENU=21, kode_modal=$fr_modalprosentase=$prosentase,id_pro=$id_pro");
                                    header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error1&var=$nama_tipe ");


                    }



            }
#######################################################################################################################################
################################################# DELETE KURS BANK   #################################################################
#######################################################################################################################################
            if (($_GET['module'])==sha1('21') && ($_GET['act']=='delete_pro_bank')){

                    $id_pro=$_POST['id_pro'];
                    $query=" DELETE FROM prosentase_modal where id_pro='$id_pro'";
                    $RS  = $db->Execute($query);
                    //echo $query;
                    //die();


                    if ($RS !=false)
                          {
                            logActivity("DELETE PROSENTASE MODAL","MENU=21, id_pro=$id_pro");
                            header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success2");
                    } else  {
                            logActivity("FAILED PROSENTASE MODAL","MENU=21, id_pro=$id_pro");
                            header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error2");

                        }


            }

#######################################################################################################################################
################################################# APPROVE KURS BANK   ################################################################
#######################################################################################################################################
            if (($_GET['module'])==sha1('21') && ($_GET['act']=='approve_pro_modal')){

                   
                    $query=" UPDATE prosentase_modal SET status='1', updatedt=current_timestamp  ";
                    $RS  = $db->Execute($query);
                    //echo $query;
                    //die();

                    if ($RS !=false)
                          {
                            logActivity("APPROVE PROSENTASE MODAL","MENU=21, Approve Success");
                            header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success4");
                    } else  {
                            logActivity("FAILED PROSENTASE MODAL","MENU=21, Approve Failed");
                            header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error4");

                        }


            }

























#######################################################################################################################################
################################################# ADD DIVISION MASTER #################################################################
#######################################################################################################################################

            if (($_GET['module'])==sha1('14') && ($_GET['act']=='add_division')){

                    $divname=trim($_POST['name']);

                    ############   Query CEK BEFORE INSERT   ###########################################
                    $SQLcek=" SELECT * FROM  division WHERE divname='$divname'  ";
                    
                   // echo $SQLcek."<br>";
                    $RScek  = $db->Execute($SQLcek);
                    $found=$RScek->Rowcount();
                    ############   END CHECK   ###################################################
                    if ($found ==0 ){

                              $query =" INSERT into division (divname,adddt,addby) values ('$divname',";
                              $query.=" current_timestamp,'$_SESSION[USERNAME]')";
                             // echo $query."<br>";
                             // die();
                              $RS  = $db->Execute($query);

                              if ($RS != false)
                                  {
                                    logActivity("ADD DIVISION","MENU=14, divname=$divname");
                                    header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success");
                                } else  {
                                    logActivity("FAILED ADD DIVISION","MENU=14, divname=$divname");
                                    header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error");

                                  }


                    }else{

                                  logActivity("ALREADY EXIST DIVISION","MENU=14, divname=$divname");
                                  header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error1&var=$divname ");


                    }
            }
#######################################################################################################################################
################################################# UPDATE DIVISION   ###################################################################
#######################################################################################################################################

            if (($_GET['module'])==sha1('14') && ($_GET['act']=='edit_division')){
                    $divid=trim($_POST['divid']);
                    $divname=trim($_POST['name']);

                    ############   Query CEK BEFORE INSERT   ###########################################
                    $SQLcek=" SELECT * FROM  division WHERE divid='$divid'  ";
                    $RScek  = $db->Execute($SQLcek);
                    $found=$RScek->Rowcount(); 
                    ############   END CHECK   ###################################################
                    if ($found ==1 ){
                              $query =" UPDATE  division set divname='$divname' ";
                              $query.=" WHERE divid='$divid' "; 

                             /* echo $query;
                              die();*/
                              $RS  = $db->Execute($query);

                                if ($RS !=false)
                                    {
                                      logActivity("EDIT DIVISION","MENU=14, divname=$divname,divname=$divname");
                                      header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success3");
                                } else  {
                                      logActivity("FAILED EDIT DIVISION","MENU=14, divname=$divname,divname=$divname");
                                      header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error3");
                                    }
                    }else{


                                    logActivity("ALREADY EXIST DIVISION","MENU=14, divname=$divname,divname=$divname");
                                    header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error1&var=$divname ");


                    }



            }
#######################################################################################################################################
################################################# DELETE DIVISION   ###################################################################
#######################################################################################################################################
            if (($_GET['module'])==sha1('14') && ($_GET['act']=='delete_division')){

                    $divid=$_POST['divid'];
                    $query=" DELETE FROM division where divid='$divid'";
                    $RS  = $db->Execute($query);
                    //echo $query;
                    //die();


                    if ($RS !=false)
                          {
                            logActivity("DELETE DIVISION","MENU=14, divid=$divid");
                            header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success2");
                    } else  {
                            logActivity("FAILED DIVISION","MENU=14, divid=$divid");
                            header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error2");

                        }


            }



#######################################################################################################################################
################################################# ADD DOSEN #################################################################
#######################################################################################################################################

            if (($_GET['module'])==sha1('15') && ($_GET['act']=='add_dosen')){

                    $nama_dosen=trim($_POST['name']);
                    $dosenid=trim($_POST['nik']);
                    $division=trim($_POST['division']);

                    ############   Query CEK BEFORE INSERT   ###########################################
                    $SQLcek=" SELECT * FROM  master_dosen WHERE dosenid='$dosenid'  ";
                    $RScek  = $db->Execute($SQLcek);
                    $found=$RScek->Rowcount();
                    ############   END CHECK   ###################################################
                    if ($found ==0 ){

                              $query =" INSERT into master_dosen (dosenid,dosen_name,divid,adddt,addby) values ('$dosenid',";
                              $query.=" '$nama_dosen','$division',current_timestamp,'$_SESSION[USERNAME]')";
                              $RS  = $db->Execute($query);

                              if ($RS != false)
                                  {
                                    logActivity("ADD DOSEN","MENU=15, dosenid=$dosenid,dosen_name=$nama_dosen");
                                    header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success");
                                } else  {
                                    logActivity("FAILED ADD DOSEN","MENU=15, dosenid=$dosenid,dosen_name=$nama_dosen");
                                    header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error");

                                  }


                    }else{

                                  logActivity("ALREADY EXIST DOSEN","MENU=15, dosenid=$dosenid,dosen_name=$nama_dosen");
                                  header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error1&var=$dosenid ");


                    }
            }
#######################################################################################################################################
################################################# UPDATE DOSEN   ###################################################################
#######################################################################################################################################

            if (($_GET['module'])==sha1('15') && ($_GET['act']=='edit_dosen')){
                    $nama_dosen=trim($_POST['name']);
                    $dosenid=trim($_POST['nik']);
                    $division=trim($_POST['division']);

                    ############   Query CEK BEFORE INSERT   ###########################################
                    $SQLcek=" SELECT * FROM  master_dosen WHERE dosenid='$dosenid'  ";
                    $RScek  = $db->Execute($SQLcek);
                    $found=$RScek->Rowcount(); 
                    ############   END CHECK   ###################################################
                    if ($found ==1 ){
                              $query =" UPDATE  master_dosen set dosen_name='$nama_dosen', divid='$division' ";
                              $query.=" WHERE dosenid='$dosenid' "; 

                             /* echo $query;
                              die();*/
                              $RS  = $db->Execute($query);

                                if ($RS !=false)
                                    {
                                      logActivity("EDIT DOSEN","MENU=15, dosen_name=$nama_dosen,divid=$division");
                                      header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success3");
                                } else  {
                                      logActivity("FAILED EDIT DOSEN","MENU=15, dosen_name=$nama_dosen,divid=$division");
                                      header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error3");
                                    }
                    }else{


                                    logActivity("ALREADY EXIST DOSEN","MENU=15, dosen_name=$nama_dosen,divid=$division");
                                    header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error1&var=$dosenid ");


                    }



            }
#######################################################################################################################################
################################################# DELETE DOSEN   ###################################################################
#######################################################################################################################################
            if (($_GET['module'])==sha1('15') && ($_GET['act']=='delete_dosen')){

                    $dosenid=$_POST['dosenid'];
                    $query=" DELETE FROM master_dosen where dosenid='$dosenid'";
                    $RS  = $db->Execute($query);
                    //echo $query;
                    //die();


                    if ($RS !=false)
                          {
                            logActivity("DELETE DOSEN","MENU=15, dosenid=$dosenid");
                            header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success2");
                    } else  {
                            logActivity("FAILED DOSEN","MENU=15, dosenid=$dosenid");
                            header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error2");

                        }


            }

#######################################################################################################################################
################################################# REKAM MEDIK   ###################################################################
#######################################################################################################################################
            if (($_GET['module'])==sha1('13') && ($_GET['act']=='rekam_medik')){



                                                       
$age         = $_POST['age'];                                                        
$nama_pasien = $_POST['nama_pasien'];
$no_rm       = $_POST['no_rm'];                                              
$sex         = $_POST['sex'];
$division    = $_POST['division'];                                                
$diagnosis   = $_POST['diagnosis'];
$management  = $_POST['management'];
$consultant  = $_POST['consultant'];


/*$file_img    = $_POST['file_img'];
$file_img2   = $_POST['file_img2'];*/
$image_temp1=$_FILES['file_img']['tmp_name'];
$image_temp2=$_FILES['file_img2']['tmp_name'];
echo $image_temp1."<br>";
echo $image_temp2."<br>";
        if(isset($_FILES['file_img']['tmp_name']) && $_FILES['file_img']['tmp_name']!="" && $_FILES['file_img']['tmp_name']!=NULL){
              $image_temp1=$_FILES['file_img']['tmp_name'];
              $nama1=$_FILES['file_img']['name'];
              $type1=$_FILES['file_img']['type'];
              $ext1 = pathinfo($nama1, PATHINFO_EXTENSION);

              //echo $ext1."<br>";
          }
        if(isset($_FILES['file_img2']['tmp_name']) && $_FILES['file_img2']['tmp_name']!="" && $_FILES['file_img2']['tmp_name']!=NULL){
              $image_temp2=$_FILES['file_img2']['tmp_name'];
              $nama2=$_FILES['file_img2']['name'];
              $type2=$_FILES['file_img2']['type'];
              $ext2 = pathinfo($nama2, PATHINFO_EXTENSION);
              //echo $ext2."<br>";
          }

         
//die();

  $query =" insert into rekam_medik (username,no_rek_medis,nama_pasien,alamat,sex,age,divid,diagnosis,management,id_dosen,before_img,before_ket, ";
  $query.=" after_img,after_ket,nilai,komentar,field1,field2,field3,tgl_komentar,adddt,addby) ";
  $query.=" values('$_SESSION[USERNAME]','$no_rm','$nama_pasien','alamat','$sex','$age','$division','$diagnosis','$management','$consultant', ";
  $query.=" 'before_img','before_ket','after_img','after_ket','-','','field1','field2','field3',current_timestamp,current_timestamp,'$_SESSION[USERNAME]') ";
  $query.=" returning rek_id ";


/*echo $query;
die();*/
  $RS  = $db->Execute($query);
  $image_name = $RS->fields['rek_id'];
    if ($RS !=false){

        $directory1="../images/img_pict1/".$image_name.".$ext1";
        $directory2="../images/img_pict2/".$image_name.".$ext2";
        copy($image_temp1,$directory1);
        copy($image_temp2,$directory2);

        $query2 = " update rekam_medik set before_img='$image_name.$ext1',after_img='$image_name.$ext2' where rek_id='".$RS->fields['rek_id']."' ";
        $RS2    = $db->Execute($query2);
 }




                    if ($RS !=false)
                          {
                            logActivity("ADD REKAM MEDIK","MENU=13, rek_id=$image_name");
                            header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success");
                    } else  {
                            logActivity("FAILED REKAM MEDIK","MENU=13, rek_id=$image_name");
                            header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error");

                        }


            }
#######################################################################################################################################
####################################################### PENILAIAN DOSEN ###############################################################
#######################################################################################################################################
            if (($_GET['module'])==sha1('16') && ($_GET['act']=='penilaian_rm')){


                    $rek_id=trim($_POST['rek_id']);
                    $recomendation=trim($_POST['recomendation']);
                    $nilai=trim($_POST['nilai']);

                    ############   Query CEK BEFORE INSERT   ###########################################
                    $SQLcek=" SELECT * FROM  rekam_medik WHERE rek_id='$rek_id'  ";
                    $RScek  = $db->Execute($SQLcek);
                    $found=$RScek->Rowcount(); 
                    ############   END CHECK   ###################################################
                    if ($found ==1 ){
                              $query =" UPDATE  rekam_medik set nilai='$nilai', komentar='$recomendation', status='1', tgl_komentar=current_timestamp ";
                              $query.=" WHERE rek_id='$rek_id' "; 

                             /* echo $query;
                              die();*/
                              $RS  = $db->Execute($query);

                                if ($RS !=false)
                                    {
                                      logActivity("ADD NILAI","MENU=16, nilai=$nilai, komentar=$recomendation, status=1 , rek_id=$rek_id ");
                                      header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success");
                                } else  {
                                      logActivity("FAILED ADD NILAI","MENU=16, nilai=$nilai, komentar=$recomendation, status=1 , rek_id=$rek_id ");
                                      header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error");
                                    }
                    }else{


                                    logActivity("DATA NOT FOUND","MENU=16, nilai=$nilai, komentar=$recomendation, status=1 , rek_id=$rek_id ");
                                    header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error1");


                    }



            }
#######################################################################################################################################
####################################################### EDIT BRANCH ###################################################################
#######################################################################################################################################


#######################################################################################################################################
####################################################### CHANGE PARAMETER LOGIN USER ###################################################
#######################################################################################################################################


#######################################################################################################################################
#######################################################  BLOCK USER IN AUDIT TRAIL  ###################################################
#######################################################################################################################################

#######################################################################################################################################
#################################################    ADD DIVISI   ##################################################################
#######################################################################################################################################

            if (($_GET['module'])==sha1('29') && ($_GET['act']=='add_divisi_bmpk')){

                    $nama_divisi   =trim($_POST['nama_divisi']);

                    ############   Query CEK BEFORE INSERT   ###########################################
                    $SQLcek=" SELECT * FROM  master_division WHERE nama_divisi='$nama_divisi'  ";
                    
                   // echo $SQLcek."<br>";
                    $RScek  = $db->Execute($SQLcek);
                    $found=$RScek->Rowcount();
                    ############   END CHECK   ###################################################
                    if ($found ==0 ){

                              $query =" INSERT into master_division (nama_divisi,adddt,addby) " ;
                              $query.=" values ('$nama_divisi',current_timestamp,'$_SESSION[USERNAME]') ";
                             // echo $query."<br>";
                             // die();
                              $RS  = $db->Execute($query);

                              if ($RS != false)
                                  {
                                    logActivity("ADD DIVISI","MENU=29, nama_divisi=$nama_divisi");
                                    header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success");
                                } else  {
                                    logActivity("FAILED ADD DIVISI","MENU=29,nama_divisi=$nama_divisi");
                                    header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error");

                                  }


                    }else{

                                  logActivity("ALREADY EXIST DIVISI","MENU=29, nama_divisi=$nama_divisi");
                                  header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error1&var=$nama_modal ");


                    }
            }
#######################################################################################################################################
################################################# UPDATE DIVISI  ##################################################################
#######################################################################################################################################

            if (($_GET['module'])==sha1('29') && ($_GET['act']=='edit_div_bmpk')){

                                                       
                    $nama_divisi=trim($_POST['ed_nama_divisi']);
                    $id_div=trim($_POST['ed_id_div']);
                    ############   Query CEK BEFORE INSERT   ###########################################
                    $SQLcek=" SELECT * FROM  master_division WHERE id_div='$id_div'  ";
                     //echo $SQLcek."<br>";
                     //die();
                    $RScek  = $db->Execute($SQLcek);
                    $found  =$RScek->Rowcount(); 
                    ############   END CHECK   ###################################################
                    if ($found ==1 ){
                              $query =" UPDATE  master_division set nama_divisi='$nama_divisi',updatedt=current_timestamp ";
                              $query.=" WHERE id_div='$id_div' "; 

                             /* echo $query;
                              die();*/
                              $RS  = $db->Execute($query);

                                if ($RS !=false)
                                    {
                                      logActivity("EDIT DIVISI","MENU=29, nama_divisi=$nama_divisi,id_div=$id_div");
                                      header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success3");
                                } else  {
                                      logActivity("FAILED DIVISI","MENU=29, nama_divisi=$nama_divisi,id_div=$id_div");
                                      header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error3");
                                    }
                    }else{


                                    logActivity("ALREADY EXIST DIVISI","MENU=29, nama_divisi=$nama_divisi,id_div=$id_div");
                                    header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error1&var=$kode_kurs ");


                    }



            }
#######################################################################################################################################
#################################################     DELETE DIVISI   #################################################################
#######################################################################################################################################
            if (($_GET['module'])==sha1('29') && ($_GET['act']=='delete_div_bmpk')){

                    $divid=$_POST['divid'];
                    $query=" DELETE FROM master_division where id_div='$divid'";
                    $RS  = $db->Execute($query);
                    //echo $query;
                    //die();


                    if ($RS !=false)
                          {
                            logActivity("DELETE DIVISI","MENU=29, id_div=$divid");
                            header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success2");
                    } else  {
                            logActivity("FAILED DIVISI","MENU=29, id_div=$divid");
                            header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error2");

                        }


            }

#######################################################################################################################################
#################################################    ADD RESERVE     ##################################################################
#######################################################################################################################################

            if (($_GET['act']=='ins_reserve_bmpk')){

                    $id_div     =trim($_POST['id_div']);
                    $nominal    =trim($_POST['nominal']);
                    $remarks    =trim($_POST['remarks']);

                    ############   Query CEK BEFORE INSERT   ###########################################
                    

                              $query =" INSERT into reserve_bmpk (id_div,amount,remarks,adddt,addby) " ;
                              $query.=" values ('$id_div','$nominal','$remarks',current_timestamp,'$_SESSION[USERNAME]') ";
                             // echo $query."<br>";
                             // die();
                              $RS  = $db->Execute($query);

                              if ($RS != false)
                                  {
                                    logActivity("ADD RESERVE","MENU=RESERVE, id_div=$id_div,nominal=$nominal,remarks=$remarks");
                                    header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success-reserve");
                                } else  {
                                    logActivity("FAILED RESERVE","MENU=RESERVE,id_div=$id_div,nominal=$nominal,remarks=$remarks");
                                    header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error-reserve");

                                  }


                   
            }
#######################################################################################################################################
#################################################     ADD RESERVE     #################################################################
#######################################################################################################################################

      if (($_GET['module'])==sha1('30') && ($_GET['act']=='insert_reserve_bmpk')){



                    $id_div     =trim($_POST['id_div']);
                    $nominal    =trim($_POST['nominal']);
                    $remarks    =trim($_POST['remarks']);

                    ############   Query CEK BEFORE INSERT   ###########################################
                    

                              $query =" INSERT into reserve_bmpk (id_div,amount,remarks,adddt,addby) " ;
                              $query.=" values ('$id_div','$nominal','$remarks',current_timestamp,'$_SESSION[USERNAME]') ";
                             // echo $query."<br>";
                             // die();
                              $RS  = $db->Execute($query);

                              if ($RS != false)
                                  {
                                    logActivity("ADD RESERVE","MENU=RESERVE, id_div=$id_div,nominal=$nominal,remarks=$remarks");
                                    header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success");
                                } else  {
                                    logActivity("FAILED RESERVE","MENU=RESERVE,id_div=$id_div,nominal=$nominal,remarks=$remarks");
                                    header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error");

                                  }


                   
      }
#######################################################################################################################################
#################################################    DELETE RESERVE   #################################################################
#######################################################################################################################################
            if (($_GET['module'])==sha1('30') && ($_GET['act']=='delete_reserve_bmpk')){

                    $id_reserve=$_POST['id_reserve'];
                    $query=" DELETE FROM reserve_bmpk where id_reserve='$id_reserve'";
                    $RS  = $db->Execute($query);
                    //echo $query;
                    //die();


                    if ($RS !=false)
                          {
                            logActivity("DELETE RESERVE","MENU=30, id_reserve=$id_reserve");
                            header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success2");
                    } else  {
                            logActivity("FAILED RESERVE","MENU=30, id_reserve=$id_reserve");
                            header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error2");

                        }


            }
#######################################################################################################################################
################################################# EDIT RESERVE  ###################################################################
#######################################################################################################################################
            if (($_GET['module'])==sha1('30') && ($_GET['act']=='edit_reserve_bmpk')){

                    $ed_id_reserve  = trim($_POST['ed_id_reserve']);
                    $ed_remarks     = trim($_POST['ed_remarks']);
                    $ed_nominal     = trim($_POST['ed_nominal']);

                    $query=" UPDATE reserve_bmpk SET amount='$ed_nominal', remarks='$ed_remarks' where id_reserve='$ed_id_reserve' ";
                    $RS  = $db->Execute($query);
                    //echo $query;
                    //die();


                    if ($RS !=false)
                          {
                            logActivity("UPDATE RESERVE","MENU=30, Update Success");
                            header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success3");
                    } else  {
                            logActivity("FAILED UPDATE RESERVE","MENU=30, Update Failed");
                            header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error3");

                        }


            }
#######################################################################################################################################
################################################# APPROVE CREDIT CARD   ###################################################################
#######################################################################################################################################
            if (($_GET['module'])==sha1('23') && ($_GET['act']=='approve_creditcard')){

                   
                    $query=" UPDATE bmpk_bank_creditcard SET status='1', updatedt=current_timestamp  ";
                    $RS  = $db->Execute($query);
                    //echo $query;
                    //die();


                    if ($RS !=false)
                          {
                            logActivity("APPROVE UPLOAD CREADITCARD","MENU=23, Approve Success");
                            header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success4");
                    } else  {
                            logActivity("FAILED APPROVE UPLOAD CREADITCARD","MENU=23, Approve Failed");
                            header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error4");

                        }


            }

#######################################################################################################################################
################################################# APPROVE BG   ###################################################################
#######################################################################################################################################
            if (($_GET['module'])==sha1('24') && ($_GET['act']=='approve_bank_guarantee')){

                   
                    $query=" UPDATE bmpk_bank_guarantee SET status='1', updatedt=current_timestamp  ";
                    $RS  = $db->Execute($query);
                    //echo $query;
                    //die();


                    if ($RS !=false)
                          {
                            logActivity("APPROVE UPLOAD BG","MENU=24, Approve Success");
                            header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success4");
                    } else  {
                            logActivity("FAILED APPROVE UPLOAD BG","MENU=24, Approve Failed");
                            header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error4");

                        }


            }

#######################################################################################################################################
################################################# TREASURY  ###################################################################
#######################################################################################################################################
            if (($_GET['module'])==sha1('22') && ($_GET['act']=='approve_treasury1')){

                   
                    $query=" UPDATE bmpk_bank_treasury SET status='1', updatedt=current_timestamp  ";
                    $RS  = $db->Execute($query);
                    //echo $query;
                    //die();


                    if ($RS !=false)
                          {
                            logActivity("APPROVE UPLOAD TREASURY","MENU=22, Approve Success");
                            header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success4");
                    } else  {
                            logActivity("FAILED APPROVE UPLOAD TREASURY","MENU=22, Approve Failed");
                            header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error4");

                        }


            }

#######################################################################################################################################
################################################# MAP CASH COLLATERAL  ################################################################
#######################################################################################################################################
            if (($_GET['module'])==sha1('31') && ($_GET['act']=='inp_bobot')){
             // echo "oke.............";
               //    die();
                   $acctno = array();
                   $id_valas       = trim($_POST['id_valas']);
                   $xcif           = trim($_POST['xcif']);
                   $jml_input      = trim($_POST['jml_input']);
                   $tot_cash_coll  = trim($_POST['tot_cash_coll']);
                   $total_bobot=0;
                   $total_ccol=0;

                   for ($i=1; $i <=$jml_input ; $i++) { 
                     $total_bobot= $total_bobot+$_POST["bobot_$i"];
                     $total_ccol=$total_ccol+$_POST["cash_coll_$i"];
                     $acctno[$i]=$_POST["acct_$i"];
                   }
                  // echo $total_bobot;
                   //die();

                   if ($total_bobot=="100" && ($tot_cash_coll==$total_ccol)  ){
                        for ($i=1; $i <=$jml_input ; $i++) { 

                               $total_bobot= $total_bobot+$_POST["bobot_$i"];
                               $total_ccol=$total_ccol+$_POST["cash_coll_$i"];
                               $acctno[$i]=$_POST["acct_$i"];

                               $query =" insert into  mapp_cashcoll (cfcif,acctno,prosentase,cash_coll,cash_colltot,status,valas,adddt,addby)  ";
                               $query.=" values ('$xcif','".$acctno[$i]."','".$_POST["bobot_$i"]."','".$_POST["cash_coll_$i"]."','$tot_cash_coll','0','$id_valas',current_timestamp,'$_SESSION[USERNAME]')  ";
                               //echo $query;
                               //die();
                               $RS  = $db->Execute($query);

                       }

                       logActivity("INPUT BOBOT CASH COLL","MENU=31, Input Bobot cash coll");
                       header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success");

                   }else{

                       logActivity("FAILED INPUT BOBOT CASH COLL","MENU=31, Failed Input Bobot cash coll");
                       header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error");

                   }




            }
#######################################################################################################################################
#################################################    DELETE MAP CASH COLL   ###########################################################
#######################################################################################################################################
            if (($_GET['module'])==sha1('31') && ($_GET['act']=='delete_map_cashcoll')){

                    $id_cif=$_POST['id_cif'];
                    $query=" DELETE FROM mapp_cashcoll where cfcif='$id_cif'";
                    $RS  = $db->Execute($query);
                    //echo $query;
                    //die();


                    if ($RS !=false)
                          {
                            logActivity("DELETE MAP CASH COLL","MENU=31, cfcif=$id_cif");
                            header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success2");
                    } else  {
                            logActivity("FAILED DELETE MAP CASH COLL"," MENU=31, cfcif=$id_cif");
                            header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error2");

                        }


            }
#######################################################################################################################################
#################################################    DELETE MAP CASH COLL   ###########################################################
#######################################################################################################################################
            if (($_GET['module'])==sha1('32') && ($_GET['act']=='approve_map_cashcoll')){

                    $id_cif=$_POST['id_cif'];
                    $query=" UPDATE mapp_cashcoll set status='1',updatedt=current_timestamp,updateby='$_SESSION[USERNAME]' where cfcif='$id_cif'";
                    $RS  = $db->Execute($query);
                    //echo $query;
                    //die();


                    if ($RS !=false)
                          {
                            logActivity("APPROVE MAP CASH COLL","MENU=32, cfcif=$id_cif");
                            header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success3");
                    } else  {
                            logActivity("FAILED APPROVE MAP CASH COLL"," MENU=32, cfcif=$id_cif");
                            header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error3");

                        }


            }

#######################################################################################################################################
#################################################     ADD MAPP PRODUCT     #################################################################
#######################################################################################################################################

      if (($_GET['module'])==sha1('33') && ($_GET['act']=='insert_mapp_product')){



                    $product     =trim($_POST['product']);
                    $prod_type   =trim($_POST['prod_type']);
                    $id_div      =trim($_POST['id_div']);

                    ############   Query CEK BEFORE INSERT   ###########################################
                    $SQLcek=" SELECT * FROM  mapp_product WHERE product='$product'  ";
                     //echo $SQLcek."<br>";
                     //die();
                    $RScek  = $db->Execute($SQLcek);
                    $found  =$RScek->Rowcount(); 


                    if ($found ==0) {

                    

                              $query =" INSERT into mapp_product (product,prod_type,divisi,adddt,addby) " ;
                              $query.=" values ('$product','$prod_type','$id_div',current_timestamp,'$_SESSION[USERNAME]') ";
                             // echo $query."<br>";
                             // die();
                              $RS  = $db->Execute($query);

                              if ($RS != false)
                                  {
                                    logActivity("ADD MAPP PRODUCT","MENU=33, product=$product,prod_type=$prod_type");
                                    header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success");
                                } else  {
                                    logActivity("FAILED MAPP PRODUCT","MENU=33,product=$product,prod_type=$prod_type");
                                    header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error");

                                  }

                    }else{


                          logActivity("ALREADY MAPP PRODUCT","MENU=33,product=$product,prod_type=$prod_type");
                          header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error3");

                    }
                   
      }
      //
#######################################################################################################################################
#################################################    DELETE MAPP PRODUCT   ############################################################
#######################################################################################################################################
            if (($_GET['module'])==sha1('33') && ($_GET['act']=='delete_mapp_product')){

                    $id_product=$_POST['id_product'];
                    $query=" DELETE FROM mapp_product where id_product='$id_product'";
                    $RS  = $db->Execute($query);
                    echo $query;
                    die();


                    if ($RS !=false)
                          {
                            logActivity("DELETE MAPP PRODUCT","MENU=33, id_product=$id_product");
                            header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=success2");
                    } else  {
                            logActivity("FAILED MAPP PRODUCT","MENU=33, id_product=$id_product");
                            header("location: ../home?module=$_GET[module]&pm=$_GET[pm]&message=error2");

                        }


            }

?>