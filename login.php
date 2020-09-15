<?php
#########################################
#        BISMILLAH                      #
#########################################
#          DEV                          #
# OS : WINDOWS                          #
# DB : POSTGRESQL                       #
# CREATOR : ASEP ARIFYAN                #
# EMAIL : asep.arifyan@mncbank.co.id    #
#########################################

######################################

//error_reporting(-1);
    session_start();
    require_once "library/adodb5/adodb.inc.php" ;
    require_once('config/config.php');
    require_once('function/function.php');
    //$param_login=getParameterLogin();
    //include("library/encrypt/class.encryption.php");
    //$crypt = new hash_encryption('4d17369a9f261e55ae4b25815e019704fad79910');
   // $newpasscrypt = $crypt->encrypt("Project123");

    //echo $newpasscrypt;
    //echo "<br>";
    //echo $crypt->decrypt($newpasscrypt);

    //echo hashEncrypted('Project123');
    //die();
/*echo hashEncrypted("Instance@123");
die();*/



    if ( !isset ($_GET['status'])) {
        $_SESSION['rnd1']=generateRandomString(40);
        $_SESSION['rnd2']=generateRandomString(40);
        $_SESSION['rnd3']=generateRandomString(40);
        $_SESSION['rnd4']=generateRandomString(40);
    }
  
    if (isset($_SESSION['USERNAME']) && isset($_SESSION['STATUS_ACCOUNT']) && isset($_SESSION['PASSWORD'])) {
        header("location: home");
        die();
    }

    if (isset($_POST['username']) && isset($_POST['password']) ){  
   
        //$password=$crypt->encrypt($_POST['password']);
        $password=hashEncrypted($_POST['password']);

        ############## cek username ########################

        //$tmp_username= isUsername($_POST['username']); 


        ############## end check username ##################

        // echo $password;
        // echo "<br>";
        // echo $crypt->decrypt($password);
        // die();

                    $SQL = " SELECT * FROM user_account WHERE  username='".trim(strtolower($_POST['username']))."' and Password='$password' ";

                   /* echo $SQL;
                    die();*/
                    $RS  = $db->Execute($SQL);

                        if(!empty($RS->fields['username']) ){
                                $num = $RS->RecordCount();
                        }

                             if (isset($num) && $num >= 1){


                                /*echo "sukses";
                                die();*/
                                    $fix_username        = ($RS->fields['username']) ;
                                    $fix_password        = ($RS->fields['password']) ;
                                    $fix_group_user      = ($RS->fields['groupid']) ;
                                    $fix_email           = ($RS->fields['email']) ;
                                    $fix_namalengkap     = ($RS->fields['namalengkap']) ;
                                    $fix_status          = ($RS->fields['status']) ;
                                    $fix_image           = ($RS->fields['image']) ;
                                    /*$fix_date_create     = (date("Y-m-d",strtotime($RS->fields['CreateDate'])));
                                    $fix_date_modified   = (date("Y-m-d",strtotime($RS->fields['ModifiedDate'])));*/

                                    

                                  ######## Cek again for password injection ##########
                                 
                                  if ($fix_password != $password){
                                        $var=$_SESSION['rnd1'];
                                        logLogin("LOGIN","$_POST[username]","FAILED PASSWORD");
                                        
                                        header("location: login?status=$var&id=1");
                                        die();
                                  }
                                 
                                  ########  CHECK account status Active or inactive =======
                                  if ($fix_status == 0){
                                        logLogin("LOGIN","$_POST[username]","FAILED INACTIVE");
                                        header('location: temp_session_login?status=inactive');
                                        die();
                                  }
                                  
                                    $_SESSION['USERNAME']       =$fix_username;
                                    $_SESSION['STATUS_ACCOUNT'] =$fix_status;
                                    $_SESSION['PASSWORD']       = $fix_password;
                                    $_SESSION['GROUP_USER']     = $fix_group_user;
                                    $_SESSION['EMAIL']          = $fix_email;
                                    $_SESSION['NAMALENGKAP']    = $fix_namalengkap;
                                    $_SESSION['IMAGE']          = $fix_image;
                                    
                                    //update FailedLogin=0 once in user table 
                                    //refreshFailedLogin();
                                    logActivity("LOGIN","SUCCESS");
                                    //die();
                                    header("location: home");


                             } else {
                            
                                $var=$_SESSION['rnd1'];
                                //update FailedLogin+1 in user table 
                                //updateFailedLogin($_POST['username']);
                                logLogin("login","$_POST[username]","FAILED USER OR PASSWORD");
                                header("location: login?status=$var&id=2");

                                 } // else not found


        }else{
            $var=$_SESSION['rnd4'];
            //logLogin("login","empty user or password","username or password empty");
        }  //end isset post username


?>
<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.5
Version: 4.5.2
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title><?= constant("TITLE_APP");?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="assets/google/google_css_p2.css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />

<!--         <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" /> -->
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="assets/pages/css/login-5.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="images/icon.png" />  </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN : LOGIN PAGE 5-1 -->
        <div class="user-login-5">
            <div class="row bs-reset">
                <div class="col-md-6 bs-reset">
                    <div class="login-bg" style="background-image:url(assets/pages/img/login/bg1.jpg)">
                        <img class="login-logo" src="images/logo.png" width="350" /> </div>
                </div>
                <div class="col-md-6 login-container bs-reset">
                    <div class="login-content">
                        <h1><b>BMPK Application System</b></h1>
                       
                        <!-- <a href="javascript:;" id="register-btn"> Create an account </a> -->
                   
                        <!-- <form action="javascript:;" class="login-form" method="post"> -->
                            <form class="login-form" action="login" method="post">
                            <div class="row">
                                <div class="col-xs-6">
                                    <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" required/> </div>
                                <div class="col-xs-6">
                                    <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" required/> </div>
                            </div>
                            <br>
                            <br>
                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button>
                                <span> <b>Enter any username and password.</b> </span>
                            </div>
                <?php
        if ( isset ($_GET['status']) && ($_GET['status'])=="$_SESSION[rnd1]")
        {
        echo "<div class='alert alert-danger'></button><span> <i>username or password is wrong...!</i> </span></div>";
        }
        if ( isset ($_GET['status']) && ($_GET['status'])=="$_SESSION[rnd2]")
        {
        echo "<div class='alert alert-danger'></button><span> <i> User Is Expired Please Contact Administrator...!</i> </span></div>";
       // die();
        }
         if ( isset ($_GET['status']) && ($_GET['status'])=="$_SESSION[rnd3]")
        {
        echo "<div class='alert alert-danger'></button><span> <i> failed 3 times login, your account has been blocked  ...!</i> </span></div>";
        }
        if ( isset ($_GET['status']) && ($_GET['status'])=="$_SESSION[rnd4]")
        {
        echo "<div class='alert alert-danger'></button><span> <i> Empty Username or Password  ...!</i> </span></div>";
        }
        ?>



                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="rem-password">
                                        
                                    </div>
                                </div>
                                <div class="col-sm-8 text-right">
                                    <div class="forgot-password">
                                        
                                    </div>
                                    <button class="btn blue" type="submit"> <b>Sign In </b></button>
                                </div>
                            </div>
                        </form>
                        <!-- BEGIN FORGOT PASSWORD FORM -->
<!--                         <form class="forget-form" action="javascript:;" method="post">
                            <h3 class="font-green">Forgot Password ?</h3>
                            <p> Enter your e-mail address below to reset your password. </p>
                            <div class="form-group">
                                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
                            <div class="form-actions">
                                <button type="button" id="back-btn" class="btn grey btn-default">Back</button>
                                <button type="submit" class="btn blue btn-success uppercase pull-right">Submit</button>
                            </div>
                        </form> -->
                        <!-- END FORGOT PASSWORD FORM -->
                    </div>
                    <div class="login-footer">
                        <div class="row bs-reset">
                            <div class="col-xs-4 bs-reset">
                                <ul class="login-social">
                                    <li>
                                        
                                    </li>
                                    <li>
                                        
                                    </li>
                                    <li>
                                        
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xs-8 bs-reset">
                                <div class="login-copyright text-right">
                                    <p>Copyright 2019  PT Bank MNC Internasional, Tbk  </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END : LOGIN PAGE 5-1 -->
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/pages/scripts/login-5.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>