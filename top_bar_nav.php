<div class="topbar-actions">
                                <!-- BEGIN GROUP NOTIFICATION -->
                            <!--     <?php  if(isDosen()){ ?>
                                <div class="btn-group-notification btn-group" id="header_notification_bar">
                                    <a href="http://home-apps.com/medicapps/home?module=1574bddb75c78a6fd2251d61e2993b5146201319&pm=7b52009b64fd0a2a49e6d8a939753077792b0554" class="btn btn-sm md-skip dropdown-toggle"> <i class="icon-bell"></i>
                                        <span class="badge"><?=countTaskLecturer($_SESSION['USERNAME'])?></span>
                                </a>
                                </div>
                                <?php  } ?> -->
                                <!-- END GROUP NOTIFICATION -->
                                <!-- BEGIN GROUP INFORMATION -->
                                <!-- <div class="btn-group-red btn-group">
                                     <a href="#" class="btn btn-sm md-skip dropdown-toggle"><i class="fa fa-commenting"></i> 
                                    </a>
                                </div> -->
                                <!-- END GROUP INFORMATION -->
                                <!-- BEGIN USER PROFILE -->
                                <div class="btn-group-img btn-group">
                                    <button type="button" class="btn btn-sm md-skip dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        <span> <b>Hi, <?=$_SESSION['NAMALENGKAP'];?> </b></span>
                                        <img src="assets/layouts/layout5/img/admin.png" alt=""> </button>
                                    <ul class="dropdown-menu-v2" role="menu">
                                        <li>
                                            <a href="home">
                                                <i class="icon-home"></i> My Home
                                               <!--  <span class="badge badge-danger">1</span> -->
                                            </a>
                                        </li>
                                        
                                        <li class="divider"> </li>
                                        
                                        <li>
                                            <a href="logout">
                                                <i class="icon-key"></i> Log Out </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- END USER PROFILE -->
                                <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                                
                                <!-- END QUICK SIDEBAR TOGGLER -->
                            </div>