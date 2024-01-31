<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php
    //Fetch Users Details End
        $user_sql="SELECT * FROM users WHERE membership_id='$session_membership_id'";
        $user_query=mysqli_query($conn,$user_sql);
        if($find_user_details=mysqli_fetch_array($user_query)){
            $member_name=$find_user_details['name'];
            $member_profile_picture=$find_user_details['profile_picture'];
        }
    //Fetch Users Details End
    ?>
  <!-- START HEADER-->
        <header class="header">
            <div class="page-brand" style="background-color:#629dad;">
                <a class="link" href="index.html">
                    <span class="brand"><?php echo $session_role_name;?>
                        <span class="brand-tip"></span>
                    </span>
                    <span class="brand-mini">AC</span>
                </a>
            </div>
            <div class="flexbox flex-1"  style="background-color:#487380;">
                <!-- START TOP-LEFT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li>
                        <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
                    </li>
                    <li class="header-name">
                        <h3><b>Earnify</b></h3>
                    </li>
                    <li class="header-name pl-3">
                        <a href=""><h6>Today : <?php echo date("jS \of F Y");?> </h6></a>
                    </li>
                    <li class="header-name pl-3">
                        <h6>Time : <span id='live_time' class="text-center cal-container"></span></h6>
                    </li>
                    <li class="header-name pl-3">
                        <a href=""><h6>Server Time : <?php echo date("h:i:s A"); ?></h6></a>
                    </li>

                </ul>
                <!-- END TOP-LEFT TOOLBAR-->
                <!-- START TOP-RIGHT TOOLBAR-->
                <ul class="nav navbar-toolbar">

                <!-- START Notification TOOLBAR--> 
                    <li class="dropdown dropdown-notification">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell-o rel"><span class="notify-signal"></span></i></a>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                            <li class="dropdown-menu-header">
                                <div>
                                    <span><strong>5 New</strong> Notifications</span>
                                    <a class="pull-right" href="javascript:;">view all</a>
                                </div>
                            </li>
                            <li class="list-group list-group-divider scroller" data-height="240px" data-color="#71808f">
                                <div>
                                    <a class="list-group-item">
                                        <div class="media">
                                            <div class="media-img">
                                                <span class="badge badge-success badge-big"><i class="fa fa-check"></i></span>
                                            </div>
                                            <div class="media-body">
                                                <div class="font-13">4 task compiled</div><small class="text-muted">22 mins</small></div>
                                        </div>
                                    </a>
                                    <a class="list-group-item">
                                        <div class="media">
                                            <div class="media-img">
                                                <span class="badge badge-default badge-big"><i class="fa fa-shopping-basket"></i></span>
                                            </div>
                                            <div class="media-body">
                                                <div class="font-13">You have 12 new orders</div><small class="text-muted">40 mins</small></div>
                                        </div>
                                    </a>
                                    <a class="list-group-item">
                                        <div class="media">
                                            <div class="media-img">
                                                <span class="badge badge-danger badge-big"><i class="fa fa-bolt"></i></span>
                                            </div>
                                            <div class="media-body">
                                                <div class="font-13">Server #7 rebooted</div><small class="text-muted">2 hrs</small></div>
                                        </div>
                                    </a>
                                    <a class="list-group-item">
                                        <div class="media">
                                            <div class="media-img">
                                                <span class="badge badge-success badge-big"><i class="fa fa-user"></i></span>
                                            </div>
                                            <div class="media-body">
                                                <div class="font-13">New user registered</div><small class="text-muted">2 hrs</small></div>
                                        </div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>



                    <li class="dropdown dropdown-user">
                        <a class="nav-link dropdown-toggle link text-white" data-toggle="dropdown">
                            <?php
                            if($member_profile_picture!="")
                            {?>
                                <img src="../user_dashboard/users_image/<?php echo $member_profile_picture; ?>" class="rounded-circle" />
                            <?php 
                            } 
                            else{?>

                                <img src="dashboard-source/assets/img/admin-avatar.png" />
                                                            
                            <?php
                            }?>
                            
                            <span></span><?php echo $member_name; ?>
                            
                            <i class="fa fa-angle-down m-l-5"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="profile.php"><i class="fa fa-user"></i>Profile</a>
                            <a class="dropdown-item" href="profile.php"><i class="fa fa-cog"></i>Settings</a>
                            <li class="dropdown-divider"></li>
                            <a class="dropdown-item" href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
                        </ul>
                    </li>
                </ul>
                <!-- END TOP-RIGHT TOOLBAR-->
            </div>
        </header>
        <!-- END HEADER-->
        <!-- START SIDEBAR-->
        <nav class="page-sidebar" id="sidebar custom_scroll" style="background-color:#487380; position:fixed; height:100%; overflow-y: auto;" >
            <div id="sidebar-collapse">
                <div class="admin-block d-flex">
                    <div>
                        <?php
                        if($member_profile_picture!="")
                        {?>
                            <img src="../user_dashboard/users_image/<?php echo $member_profile_picture; ?>" width="45px" class="rounded-circle" />
                        <?php 
                        } 
                        else{?>

                            <img src="dashboard-source/assets/img/admin-avatar.png" width="45px" />
                                                        
                        <?php
                        }?>
                       
                    </div>
                    <div class="admin-info">
                        
                        <div class="font-strong"><?php echo $member_name;?></div>
                        <small><?php echo $session_membership_id;?></small>
                    </div>
                </div>

                

                <?php
                /// Super Admin Menu start
                if(strcmp(strtoupper($session_role_name),"SUPER ADMIN")==0)
                { 
                ?>

                <ul class="side-menu metismenu">
                    <li>
                        <a  href="dashboard.php" style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a  href="user_activity_log.php" style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label"> User Activity Log</span>
                        </a>
                    </li>
                   
                    <li>
                        <a href="" style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Login History</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label"> Aff.Requirement Rate<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">Fullfill Within No. Of Days</a>
                            </li>
                            <li>
                                <a href="">Aff.Requirement Rate Report</a>
                            </li>

                            
                        </ul>
                    </li>
                   
                    <li>
                        <a href="product_details.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Create a Login Massage </span>
                        </a>
                    </li>
                    <li>
                        <a href="product_details.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Display a Message</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Create Notification<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="notification_type_master.php">Notification Type Master</a>
                            </li>
                            <li>
                                <a href="notification_master.php">Notification Master</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Add a Site<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="earning_opportunities_category_master.php">Site Category</a>
                            </li>
                            <li>
                                <a href="earning_opportunities_site_description.php">Site Description</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="product_details.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Show Site Rating</span>
                        </a>
                    </li>
                    <li>
                        <a href="product_details.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Withdraw Affiliates</span>
                        </a>
                    </li>
                    <li>
                        <a href="product_details.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Advertise Urls</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Upgrade Account<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">Upgrade User</a>
                            </li>
                            <li>
                                <a href="">Upgraded Users  Report</a>
                            </li>

                            
                        </ul>
                    </li>
                    <li>
                        <a href="product_details.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Upload Videos</span>
                        </a>
                    </li>
                    <li>
                        <a href="product_details.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Post in  Forum</span>
                        </a>
                    </li>
                    <li>
                        <a href="product_details.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Comment Thread </span>
                        </a>
                    </li>


                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Search Users<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">Incomplete Profile</a>
                            </li>
                            <li>
                                <a href="">All Profile</a>
                            </li>
                            <li>
                                <a href="">Affilites Assignment</a>
                            </li>
                            <li>
                                <a href="">Affilites  Aquiring Report</a>
                            </li>
                            <li>
                                <a href="">Promo Aff Aquiring Report</a>
                            </li>
                            <li>
                                <a href="">Users Ad Report</a>
                            </li>
                            <li>
                                <a href="">Traffic Report</a>
                            </li>
                        </ul>
                    </li>



                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Affilites<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="javascript:;">
                                    <span class="nav-label">Signup Bonus</span><i class="fa fa-angle-left arrow"></i></a>
                                <ul class="nav-3-level collapse">
                                    <li>
                                        <a href="javascript:;"> Benifit Master</a>
                                    </li>
                                    <li>
                                        <a href="javascript:;"> Member Benifit Master</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="">Requirement  Report</a>
                            </li>
                            <li>
                                <a href="">Assignment  Report</a>
                            </li>
                            <li>
                                <a href="">Remain Report</a>
                            </li>
                            
                        </ul>
                    </li>

                    <li>
                    <a href="verify_accounts.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label"> Accounts Verification</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Monthly Promotion<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">User Promotion</a>
                            </li>
                            <li>
                                <a href="">Admin Promotion</a>
                            </li>                            
                        </ul>
                    </li>
                    <li>
                    <a href="banner_code_master.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Banner Code</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Track Traffic<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">Stop Receiveing Traffic</a>
                            </li>                          
                        </ul>
                    </li>
                    <li>
                        <a href="verify_accounts.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Convertion Report</span>
                        </a>
                    </li>
                    <li>
                        <a href="verify_accounts.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Max Limit of External Url</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Review Sites<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="add_review_site.php">Add Sites</a>
                            </li>    
                            <li>
                                <a href="review_site_report.php">Publish Review Report</a>
                            </li>                       
                        </ul>
                    </li>
                    <li>
                        <a href="verify_accounts.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Payment Proof  &nbsp; <b>200</b></span>
                        </a>
                    </li>
                    <li>
                        <a  href="member_category_master.php" style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Member Category Master</span>
                        </a>
                    </li>             
                    <li>
                        <a  href="admin_role_master.php" style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Admin Role Master</span>
                        </a>
                    </li>
                    <li>
                        <a href="create_administrator.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Create Administrator</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Lock Account<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">User Account</a>
                            </li>
                            <li>
                                <a href="">Admin Account</a>
                            </li>                            
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Unlock Account<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">User Account</a>
                            </li>
                            <li>
                                <a href="">Admin Account</a>
                            </li>                            
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Count Users<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">By Category</a>
                            </li>
                            <li>
                                <a href="">By Location</a>
                            </li>                            
                        </ul>
                    </li>
                    <li>
                        <a href="logout.php" style="color:#fff;"><i class="sidebar-item-icon fa fa-sign-out"></i>
                            <span class="nav-label">Logout</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" style="color:#fff;">
                            <span class="nav-label">&nbsp;</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" style="color:#fff;">
                            <span class="nav-label">&nbsp;</span>
                        </a>
                    </li>
                </ul>

                <?php
                }
                 /// Super Admin Menu End
                ?>



                <?php
                /// Admin Menu start
                if(strcmp(strtoupper($session_role_name),"ADMIN")==0)
                { 
                ?>

                <ul class="side-menu metismenu">
                    <li>
                        <a  href="dashboard.php" style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a  href="user_activity_log.php" style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label"> User Activity Log</span>
                        </a>
                    </li>
                    <li>
                        <a href="" style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Login History</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label"> Aff.Requirement Rate<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">Fullfill Within No. Of Days</a>
                            </li>
                            <li>
                                <a href="">Aff.Requirement Rate Report</a>
                            </li>

                            
                        </ul>
                    </li>
                    <li>
                        <a href="product_details.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Upload Videos</span>
                        </a>
                    </li>
                    <li>
                        <a href="product_details.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Create a Login Massage </span>
                        </a>
                    </li>
                    <li>
                        <a href="product_details.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Display a Message</span>
                        </a>
                    </li>
                    <li>
                        <a href="product_details.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Create Notification</span>
                        </a>
                    </li>

                    <li>
                        <a href="product_details.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Show Site Rating</span>
                        </a>
                    </li>
                    <li>
                        <a href="product_details.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Advertise Urls</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Search Users<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">Incomplete Profile</a>
                            </li>
                            <li>
                                <a href="">All Profile</a>
                            </li>
                            <li>
                                <a href="">Affilites Assignment</a>
                            </li>
                            <li>
                                <a href="">Affilites  Aquiring Report</a>
                            </li>
                            <li>
                                <a href="">Promo Aff Aquiring Report</a>
                            </li>
                            <li>
                                <a href="">Users Ad Report</a>
                            </li>
                            <li>
                                <a href="">Traffic Report</a>
                            </li>
                        </ul>
                    </li>



                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Affilites<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">Assign Affilites</a>
                            </li>
                            <li>
                                <a href="">Requirement  Report</a>
                            </li>
                            <li>
                                <a href="">Assignment  Report</a>
                            </li>
                            <li>
                                <a href="">Remain Report</a>
                            </li>
                            
                        </ul>
                    </li>

                    <li>
                        <a href="verify_accounts.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label"> Accounts Verification</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Monthly Promotion<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">User Promotion</a>
                            </li>
                            <li>
                                <a href="">Admin Promotion</a>
                            </li>                            
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Track Traffic<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">Stop Receiveing Traffic</a>
                            </li>                          
                        </ul>
                    </li>
                    <li>
                        <a href="verify_accounts.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Convertion Report</span>
                        </a>
                    </li>
                    <li>
                        <a href="verify_accounts.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Test Sites</span>
                        </a>
                    </li>
                    <li>
                        <a href="verify_accounts.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Payment Proof  &nbsp; <b>200</b></span>
                        </a>
                    </li>              
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Lock Account<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">User Account</a>
                            </li>
                            <li>
                                <a href="">Admin Account</a>
                            </li>                            
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Unlock Account<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">User Account</a>
                            </li>
                            <li>
                                <a href="">Admin Account</a>
                            </li>                            
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Count Users<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">By Category</a>
                            </li>
                            <li>
                                <a href="">By Location</a>
                            </li>                            
                        </ul>
                    </li>
                    <li>
                        <a href="logout.php" style="color:#fff;"><i class="sidebar-item-icon fa fa-sign-out"></i>
                            <span class="nav-label">Logout</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" style="color:#fff;">
                            <span class="nav-label">&nbsp;</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" style="color:#fff;">
                            <span class="nav-label">&nbsp;</span>
                        </a>
                    </li>
                </ul>

                <?php
                }
                 /// Admin Menu End
                ?>




                <?php
                /// SITE TESTER Menu start
                if(strcmp(strtoupper($session_role_name),"SITE TESTER")==0)
                { 
                ?>

                <ul class="side-menu metismenu">
                    <li>
                        <a  href="dashboard.php" style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="" style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Login History</span>
                        </a>
                    </li>
                    <li>
                        <a href="product_details.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Show Site Rating</span>
                        </a>
                    </li>                  
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Search Users<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">Incomplete Profile</a>
                            </li>
                            <li>
                                <a href="">All Profile</a>
                            </li>
                            <li>
                                <a href="">Affilites Assignment</a>
                            </li>
                            <li>
                                <a href="">Affilites  Aquiring Report</a>
                            </li>
                            <li>
                                <a href="">Promo Aff Aquiring Report</a>
                            </li>
                            <li>
                                <a href="">Users Ad Report</a>
                            </li>
                            <li>
                                <a href="">Traffic Report</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="verify_accounts.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label"> Accounts Verification</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Monthly Promotion<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">User Promotion</a>
                            </li>
                            <li>
                                <a href="">Admin Promotion</a>
                            </li>                            
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Track Traffic<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">Stop Receiveing Traffic</a>
                            </li>                          
                        </ul>
                    </li>
                    <li>
                        <a href="verify_accounts.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Convertion Report</span>
                        </a>
                    </li>
                    <li>
                        <a href="verify_accounts.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Test Sites</span>
                        </a>
                    </li>
                    <li>
                        <a href="verify_accounts.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Payment Proof  &nbsp; <b>200</b></span>
                        </a>
                    </li>              
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Lock Account<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">User Account</a>
                            </li>
                            <li>
                                <a href="">Admin Account</a>
                            </li>                            
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Unlock Account<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">User Account</a>
                            </li>
                            <li>
                                <a href="">Admin Account</a>
                            </li>                            
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Count Users<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">By Category</a>
                            </li>
                            <li>
                                <a href="">By Location</a>
                            </li>                            
                        </ul>
                    </li>
                    <li>
                        <a href="logout.php" style="color:#fff;"><i class="sidebar-item-icon fa fa-sign-out"></i>
                            <span class="nav-label">Logout</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" style="color:#fff;">
                            <span class="nav-label">&nbsp;</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" style="color:#fff;">
                            <span class="nav-label">&nbsp;</span>
                        </a>
                    </li>
                </ul>

                <?php
                }
                 /// SITE TESTER Menu End
                ?>





                <?php
                /// PLANNER Menu start
                if(strcmp(strtoupper($session_role_name),"PLANNER")==0)
                { 
                ?>

                <ul class="side-menu metismenu">
                    <li>
                        <a  href="dashboard.php" style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a  href="user_activity_log.php" style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label"> User Activity Log</span>
                        </a>
                    </li>
                    <li>
                        <a href="" style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Login History</span>
                        </a>
                    </li>
                    <li>
                        <a href="product_details.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Create a Login Massage </span>
                        </a>
                    </li>
                    <li>
                        <a href="product_details.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Display a Message</span>
                        </a>
                    </li>
                    <li>
                        <a href="product_details.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Create Notification</span>
                        </a>
                    </li>
                    <li>
                        <a href="product_details.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Add a Site</span>
                        </a>
                    </li>
                    <li>
                        <a href="product_details.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Show Site Rating</span>
                        </a>
                    </li>
                    <li>
                        <a href="product_details.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Advertise Urls</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Search Users<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">Incomplete Profile</a>
                            </li>
                            <li>
                                <a href="">All Profile</a>
                            </li>
                            <li>
                                <a href="">Affilites Assignment</a>
                            </li>
                            <li>
                                <a href="">Affilites  Aquiring Report</a>
                            </li>
                            <li>
                                <a href="">Promo Aff Aquiring Report</a>
                            </li>
                            <li>
                                <a href="">Users Ad Report</a>
                            </li>
                            <li>
                                <a href="">Traffic Report</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="verify_accounts.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label"> Accounts Verification</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Monthly Promotion<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">User Promotion</a>
                            </li>
                            <li>
                                <a href="">Admin Promotion</a>
                            </li>                            
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Track Traffic<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">Stop Receiveing Traffic</a>
                            </li>                          
                        </ul>
                    </li>
                    <li>
                        <a href="verify_accounts.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Convertion Report</span>
                        </a>
                    </li>
                    <li>
                        <a href="verify_accounts.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Payment Proof  &nbsp; <b>200</b></span>
                        </a>
                    </li>              
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Lock Account<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">User Account</a>
                            </li>
                            <li>
                                <a href="">Admin Account</a>
                            </li>                            
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Unlock Account<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">User Account</a>
                            </li>
                            <li>
                                <a href="">Admin Account</a>
                            </li>                            
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Count Users<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">By Category</a>
                            </li>
                            <li>
                                <a href="">By Location</a>
                            </li>                            
                        </ul>
                    </li>
                    <li>
                        <a href="logout.php" style="color:#fff;"><i class="sidebar-item-icon fa fa-sign-out"></i>
                            <span class="nav-label">Logout</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" style="color:#fff;">
                            <span class="nav-label">&nbsp;</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" style="color:#fff;">
                            <span class="nav-label">&nbsp;</span>
                        </a>
                    </li>
                </ul>

                <?php
                }
                 /// PLANNER  Menu End
                ?>





                <?php
                /// MODERATOR Menu start
                if(strcmp(strtoupper($session_role_name),"MODERATOR")==0)
                { 
                ?>

                <ul class="side-menu metismenu">
                    <li>
                        <a  href="dashboard.php" style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="" style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Login History</span>
                        </a>
                    </li>

                    <li>
                        <a href="product_details.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Show Site Rating</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Search Users<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">Incomplete Profile</a>
                            </li>
                            <li>
                                <a href="">All Profile</a>
                            </li>
                            <li>
                                <a href="">Affilites Assignment</a>
                            </li>
                            <li>
                                <a href="">Affilites  Aquiring Report</a>
                            </li>
                            <li>
                                <a href="">Promo Aff Aquiring Report</a>
                            </li>
                            <li>
                                <a href="">Users Ad Report</a>
                            </li>
                            <li>
                                <a href="">Traffic Report</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="verify_accounts.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Payment Proof  &nbsp; <b>200</b></span>
                        </a>
                    </li>              
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Lock Account<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">User Account</a>
                            </li>
                            <li>
                                <a href="">Admin Account</a>
                            </li>                            
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Unlock Account<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">User Account</a>
                            </li>
                            <li>
                                <a href="">Admin Account</a>
                            </li>                            
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Count Users<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">By Category</a>
                            </li>
                            <li>
                                <a href="">By Location</a>
                            </li>                            
                        </ul>
                    </li>
                    <li>
                        <a href="logout.php" style="color:#fff;"><i class="sidebar-item-icon fa fa-sign-out"></i>
                            <span class="nav-label">Logout</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" style="color:#fff;">
                            <span class="nav-label">&nbsp;</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" style="color:#fff;">
                            <span class="nav-label">&nbsp;</span>
                        </a>
                    </li>
                </ul>

                <?php
                }
                 /// MODERATOR  Menu End
                ?>






                <?php
                /// MEDIA PARTNER Menu start
                if(strcmp(strtoupper($session_role_name),"MEDIA PARTNER")==0)
                { 
                ?>

                <ul class="side-menu metismenu">
                    <li>
                        <a  href="dashboard.php" style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="" style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Login History</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Monthly Promotion<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">User Promotion</a>
                            </li>
                            <li>
                                <a href="">Admin Promotion</a>
                            </li>                            
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Track Traffic<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">Stop Receiveing Traffic</a>
                            </li>                          
                        </ul>
                    </li>
                    <li>
                        <a href="verify_accounts.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Convertion Report</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Count Users<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">By Category</a>
                            </li>
                            <li>
                                <a href="">By Location</a>
                            </li>                            
                        </ul>
                    </li>
                    <li>
                        <a href="logout.php" style="color:#fff;"><i class="sidebar-item-icon fa fa-sign-out"></i>
                            <span class="nav-label">Logout</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" style="color:#fff;">
                            <span class="nav-label">&nbsp;</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" style="color:#fff;">
                            <span class="nav-label">&nbsp;</span>
                        </a>
                    </li>
                </ul>

                <?php
                }
                 /// MEDIA PARTNER  Menu End
                ?>





                <?php
                /// MEDIA PROMOTER Menu start
                if(strcmp(strtoupper($session_role_name),"MEDIA PROMOTER")==0)
                { 
                ?>

                <ul class="side-menu metismenu">
                    <li>
                        <a  href="dashboard.php" style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="" style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Login History</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Monthly Promotion<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">User Promotion</a>
                            </li>
                            <li>
                                <a href="">Admin Promotion</a>
                            </li>                            
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Track Traffic<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">Stop Receiveing Traffic</a>
                            </li>                          
                        </ul>
                    </li>
                    <li>
                        <a href="verify_accounts.php"style="color:#fff;"><i class="sidebar-item-icon fa fa-file-text"></i>
                            <span class="nav-label">Convertion Report</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Count Users<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">By Category</a>
                            </li>
                            <li>
                                <a href="">By Location</a>
                            </li>                            
                        </ul>
                    </li>
                    <li>
                        <a href="logout.php" style="color:#fff;"><i class="sidebar-item-icon fa fa-sign-out"></i>
                            <span class="nav-label">Logout</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" style="color:#fff;">
                            <span class="nav-label">&nbsp;</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" style="color:#fff;">
                            <span class="nav-label">&nbsp;</span>
                        </a>
                    </li>
                </ul>

                <?php
                }
                 /// MEDIA PROMOTER  Menu End
                ?>




            </div>
        </nav>
        <!-- END SIDEBAR-->






     <!--////////////// Live Clock js ///////////////-->
     <?php
			$date = new DateTime();
			$current_timestamp = $date->getTimestamp();
		?>

		<script>
		    flag_time = true;
			timer = '';
			setInterval(function(){phpJavascriptClock();},1000);
			
			function phpJavascriptClock()
			{
				if ( flag_time ) {
				timer = <?php echo $current_timestamp;?>*1000;
				}
				var d = new Date(timer);
				months = new Array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec');
				
				month_array = new Array('January', 'Febuary', 'March', 'April', 'May', 'June', 'July', 'Augest', 'September', 'October', 'November', 'December');
				
				day_array = new Array( 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
				
				currentYear = d.getFullYear();
				month = d.getMonth();
				var currentMonth = months[month];
				var currentMonth1 = month_array[month];
				var currentDate = d.getDate();
				currentDate = currentDate < 10 ? '0'+currentDate : currentDate;
				
				var day = d.getDay();
				current_day = day_array[day];
				var hours = d.getHours();
				var minutes = d.getMinutes();
				var seconds = d.getSeconds();
				
				var ampm = hours >= 12 ? 'PM' : 'AM';
				hours = hours % 12;
				hours = hours ? hours : 12; // the hour ’0′ should be ’12′
				minutes = minutes < 10 ? '0'+minutes : minutes;
				seconds = seconds < 10 ? '0'+seconds : seconds;
				var strTime = hours + ':' + minutes+ ':' + seconds + ' ' + ampm;
				timer = timer + 1000;

				document.getElementById("live_time").innerHTML= strTime ;

				flag_time = false;
			}
		</script>
        <!--////////////// Live Clock js ///////////////-->

<style>
    ::-webkit-scrollbar {
  width: 5px;
}

::-webkit-scrollbar-track {
  background: #f1f1f1; 
}

::-webkit-scrollbar-thumb {
  background: #629dad; 
}
::-webkit-scrollbar-thumb:hover {
  background: #629dad; 
}
</style>