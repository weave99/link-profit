<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <?php
        $fetch_user_qre=mysqli_query($conn,"SELECT * FROM users where email='$session_user_name'");
        if($fetch_user=mysqli_fetch_array($fetch_user_qre))
        {
        ?>

        <!-- START HEADER-->
        <header class="header">
            <div class="page-brand" style="background-color:#629dad;">
                <a class="link" href="index.html">
                    <span class="brand">Earnify
                        <span class="brand-tip"></span>
                    </span>
                    <span class="brand-mini">E</span>
                </a>
            </div>
            <div class="flexbox flex-1" style="background-color:#487380;">
                <!-- START TOP-LEFT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li>
                        <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
                    </li>
                    <li class="header-name">
                        <a href="earning_oportunities_default.php"><h6>Earning Opportunities</h6></a>
                    </li>
                    <li class="header-name">
                        <a href="under_review_default.php"><h6>Under Review</h6></a>
                    </li>
                    <li class="header-name">
                        <a href=""><h6>Help Desk</h6></a>
                    </li>
                    <li class="header-name">
                        <a href="traning_module_default.php"><h6>Training Module</h6></a>
                    </li>
                    <li class="header-name">
                        <a href="frequently_asked_questions_default.php"><h6>FAQ</h6></a>
                    </li>
                    <li class="header-name">
                        <a href="forum_default.php"><h6>Forum</h6></a>
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
                                </div>
                            </li>
                        </ul>
                    </li>
                    



                    <li class="dropdown dropdown-user">
                        <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                            <img src="../admin/dashboard-source/assets/img/admin-avatar.png" />
                            <span></span><?php echo $fetch_user['email'];?>
                            
                            <i class="fa fa-angle-down m-l-5"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="dashboard.php"><i class="fa fa-user"></i>Dashboard</a>
                            <a class="dropdown-item" href="profile.php"><i class="fa fa-user"></i>Profile</a>
                            <a class="dropdown-item" href="update_profile.php"><i class="fa fa-cog"></i>Settings</a>
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
        <nav class="page-sidebar" id="sidebar" style="background-color:#487380;"><!--  position:fixed;-->
            <div id="sidebar-collapse">
                <div class="admin-block d-flex">
                    <div>
                        <img src="../admin/dashboard-source/assets/img/admin-avatar.png" width="45px" />
                    </div>
                    <div class="admin-info">
                        <div class="font-strong"><?php echo $fetch_user['name'];?></div><small>ID - <?php echo $fetch_user['membership_id'];?></small></div>
                </div>
                <ul class="side-menu metismenu">
                <li>
                        <a href="javascript:;" class="text-white"><i class="sidebar-item-icon fa fa-user"></i>
                            <span class="nav-label">Account</span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="javascript:;">
                                    <span class="nav-label">Membership</span><i class="fa fa-angle-left arrow"></i></a>
                                <ul class="nav-3-level collapse">
                                    <li>
                                        <a href="javascript:;" class="text-success"> <i class="fa fa-check-circle" aria-hidden="true"></i> &nbsp; <b><?php echo $fetch_user['membership_category'];?></b></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <span class="nav-label">Account Status</span><i class="fa fa-angle-left arrow"></i></a>
                                <ul class="nav-3-level collapse">
                                    <li>

                                        <?php 
                                        if($fetch_user['membership_status']==1)
                                        {?>
                                            <a href="javascript:;" class="text-success"><i class="fa fa-check-circle" aria-hidden="true"></i> &nbsp; <b>Verified</b></a>  
                                        <?php
                                        }
                                        else
                                        {?>
                                            <a href="javascript:;" class="text-danger"><i class="fa fa-times-circle" aria-hidden="true"></i> &nbsp; <b>Not Verified</b></a>
                                        <?php
                                        }
                                        ?>
                                        
                                        
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <span class="nav-label">Your are Since</span><i class="fa fa-angle-left arrow"></i></a>
                                <ul class="nav-3-level collapse">
                                    <li>
                                        <a href="javascript:;"  class="text-success"><i class="fa fa-check-circle" aria-hidden="true"></i> &nbsp; <b>24 Dec 2023</b></a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <span class="nav-label">Upgraded On (Hide on program)</span><i class="fa fa-angle-left arrow"></i></a>
                                <ul class="nav-3-level collapse">
                                    <li>
                                        <a href="javascript:;"  class="text-success"><i class="fa fa-check-circle" aria-hidden="true"></i> &nbsp; <b>24 Jan 2023</b></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a  href="verify_account.php" style="color:#fff;"><i class="sidebar-item-icon fa fa-user"></i>
                            <span class="nav-label">Verify Account</span>
                        </a>
                    </li>
                    <li>
                        <a  href="user_rate_site_master.php" style="color:#fff;"><i class="sidebar-item-icon fa fa-user"></i>
                            <span class="nav-label">Rate Your Site</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Affiliates Assigned &nbsp;<b>600</b></span><i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="javascript:;" data-toggle="tooltip" data-placement="right" title="Please allot the number minimum in 12 sites. Complete allotment within 14days form DOJ. If failed allotment will be removed."><i class="fa fa-gift" aria-hidden="true"></i> Welcome Gift  &nbsp;<span><b>200</b></span></a>
                            </li>
                            <li>
                                <a href="javascript:;" data-toggle="tooltip"  data-placement="right" title="Please complete allotment within 7days form the allotment date. If failed allotment will be removed.">Addl. From Promotion  &nbsp;<span><b>400</b></span></a>
                            </li>
                            <li>
                                <a href="">Assign To Sites</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Your Links<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="user_adv_addlink_master.php">Add Links</a>
                            </li>
                            <li>
                                <a href="user_adv_link_master.php">Advertise Links</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a  href="" style="color:#fff;"><i class="sidebar-item-icon fa fa-user"></i>
                            <span class="nav-label">Your Affiliates</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Training Module<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="training_module_stage_I.php" data-toggle="tooltip"  data-placement="right" title="Please upload payment proofs you received from your earning sites.">Stage I</a>
                            </li>
                            <li>
                                <a href="training_module_stage_II.php" data-toggle="tooltip"  data-placement="right" title="Please upload training videos for your fellow users.">Stage II</a>
                            </li>
                            <li>
                                <a href="training_module_stage_III.php" data-toggle="tooltip"  data-placement="right" title="Please upload training videos for your fellow users.">Stage III</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Connect Affiliates<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">Email</a>
                            </li>
                            <li>
                                <a href="">Chat</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Upload<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="user_upload_payment_proof.php" data-toggle="tooltip"  data-placement="right" title="Please upload payment proofs you received from your earning sites.">Payment Proof</a>
                            </li>
                            <li>
                                <a href="training_module_stage_III_upload.php" data-toggle="tooltip"  data-placement="right" title="Please upload training videos for your fellow users.">Training Video</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a  href="" style="color:#fff;" data-toggle="tooltip"  data-placement="right" title="Please upload payment proofs you received from your earning sites."><i class="sidebar-item-icon fa fa-user"></i>
                            <span class="nav-label">Your Queries</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Statistics<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">Affiliates Joining</a>
                            </li>
                            <li>
                                <a href="">Links Advertisement</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a  href="promote_us.php" style="color:#fff;"><i class="sidebar-item-icon fa fa-user"></i>
                            <span class="nav-label">Promote Us</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Promotion Statistics<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">Valid sites for promotion</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a  href="" style="color:#fff;"><i class="sidebar-item-icon fa fa-user"></i>
                            <span class="nav-label">FAQ</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;"class="text-white"><i class="sidebar-item-icon fa fa-bar-chart"></i>
                            <span class="nav-label">Like & Share<i class="fa fa-angle-left arrow"></i></a>
                        <ul class="nav-2-level collapse">
                            <li>
                                <a href="">Facebook</a>
                            </li>
                            <li>
                                <a href="">Twitter</a>
                            </li>
                            <li>
                                <a href="">Linkdin</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a  href="" style="color:#fff;"><i class="sidebar-item-icon fa fa-user"></i>
                            <span class="nav-label">Login History</span>
                        </a>
                    </li>
                     <li>
                        <a href="logout.php" style="color:#fff;"><i class="sidebar-item-icon fa fa-sign-out"></i>
                            <span class="nav-label">Logout</span>
                        </a>
                    </li>


                    
                </ul>
            </div>
        </nav>
        <!-- END SIDEBAR-->



    <?php
    }
    ?>

    <script>
        $(function () {
        $('[data-toggle="tooltip"]').tooltip()
        })
    </script>