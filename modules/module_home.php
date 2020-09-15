<?php
$module=$_GET['module'];
$pm=$_GET['pm'];
$page_tmp = $_SERVER['PHP_SELF']."?module=$module&pm=$pm";
$page=str_replace(".php","",$page_tmp);

###########################################################

?>


<div class="page-content">
                    <!-- BEGIN BREADCRUMBS -->
                    <div class="breadcrumbs">
                        
                        <div class="m-heading-1 border-green m-bordered">
                                     <h1> <i class="fa fa-home"></i> My Profile</h1> 

                                     <p> Profile user</p> 
                                        <!-- <a class="btn red btn-outline" href="http://jqueryvalidation.org"
                                            target="_blank">the official documentation</a> -->
                                    
                                </div>
                        <!-- Sidebar Toggle Button -->
                       
                        <!-- Sidebar Toggle Button -->
                    </div>





                    <!-- END BREADCRUMBS -->
                    <!-- BEGIN SIDEBAR CONTENT LAYOUT -->
                    <div class="page-content-container">
                        <div class="page-content-row">
                            <!-- BEGIN PAGE SIDEBAR -->
                          
                            <!-- END PAGE SIDEBAR -->
                            <div class="page-content-col">
                                <!-- BEGIN PAGE BASE CONTENT -->
                                
                            
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- BEGIN VALIDATION STATES-->
                                       
                                            <div class="portlet light grey-steel bordered ">
                                            <div class="portlet-title">
                                                <div class="caption">
                                                    <i class="icon-settings font-red"></i>
                                                    <span class="caption-subject font-red sbold uppercase">Information User</span>
                                                </div>
                                                
                                            </div>
                                            <div class="portlet-body">
                                                <div class="table-scrollable table-scrollable-borderless">
                                                    <table class="table table-hover table-light">
                                                        <thead>
                                                            <tr class="uppercase">
                                                                
                                                                <th class="col-md-1"> Nama Lengkap </th>
                                                                <th class="col-md-1" align="right"> : </th>
                                                                <th class="col-md-9" align="left"> <?=$_SESSION['NAMALENGKAP']?> </th>
                                                                
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="uppercase ">
                                                                
                                                                <td> USERNAME   </td>
                                                                <td> : </td>
                                                                <td> <?=$_SESSION['USERNAME']?> </td>
                                                                <!-- 
                                                                    <span class="label label-sm label-success"> Approved </span>
                                                                </td> -->
                                                            </tr>
                                                            <tr>
                                                                
                                                                <td> GROUP USER </td>
                                                                <td>: </td>
                                                                <td> <?=getGroupUserName()?> </td>
                                                               
                                                                  <!--   <span class="label label-sm label-info"> Pending </span>
                                                                </td> -->
                                                            </tr>
                                                            <tr>
                                                               
                                                                <td> Email  </td>
                                                                <td> : </td>
                                                                <td> <?=$_SESSION['EMAIL']?> </td>
                                                             
                                                                  <!--   <span class="label label-sm label-warning"> Suspended </span>
                                                                </td> -->
                                                            </tr>
                                                            <tr>
                                                                
                                                                <td> Status Account </td>
                                                                <td> : </td>
                                                                <td> <span class="label label-sm label-success"> <i class="fa fa-check-circle"></i> aktif </span></td>
                                                           
                                                                    <!-- <span class="label label-sm label-danger"> Blocked </span>
                                                                </td> -->
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- END PAGE BASE CONTENT -->
                            </div>
                        </div>
                    </div>
                    <!-- END SIDEBAR CONTENT LAYOUT -->
                
                </div>



               <!--  <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script> -->