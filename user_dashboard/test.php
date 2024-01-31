<div class="page-content fade-in-up">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-head">
                                <div class="ibox-title">Video  Details</div>
                                <div class="ibox-tools">
                                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                                </div>
                            </div>
                            <div class="ibox-body">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th class="">Site Name</th>
                                            <th class="">Sponsor Links</th>
                                            <th class="">Your Links</th>
                                            <th class="">Submission Date</th>
                                           
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    <?php
                                    //`adv_id`, `user_id`, `parent_user_id`, `site_name`, `site_category`, `adv_status`, `submittion_date` SELECT * FROM `training_module_stage_iii` WHERE 1
                                    //<!-- `eop_site_id`, `eop_category_id`, `eop_site_name`, `eop_site_description`, `eop_site_status` SELECT * FROM `earning_opportunities_site_description` WHERE 1-->
                                        
                                    $sql1="SELECT * FROM training_module_stage_iii WHERE user_id=$session_user_id";
                                    $query1=mysqli_query($conn,$sql1);
                                    while($prd=mysqli_fetch_array($query1)) 
                                        {

                                            $site_name=$prd['site_name'];
                                            $sql2="SELECT * FROM earning_opportunities_site_description WHERE eop_site_id=$site_name";
                                            $query2=mysqli_query($conn,$sql2);
                                            if($prd2=mysqli_fetch_array($query2)) {
                                                $eop_site_name=$prd2['eop_site_name'];
                                            }

                                            $parent_user_id=$prd['parent_user_id'];
                                            $sql3="SELECT * FROM training_module_stage_iii WHERE user_id=$parent_user_id";
                                            $query3=mysqli_query($conn,$sql3);
                                            if($prd3=mysqli_fetch_array($query3)) {
                                                $parent_site_category=$prd3['site_category'];
                                            }
                                        ?>
                                            <tr>
                                                
                                                <td><b><?php echo $eop_site_name;?></b></td>
                                                <td><b><?php echo $parent_site_category;?></b></td>
                                                <td><b><?php echo $prd['site_category'];?></b></td>
                                                <td><b><?php echo $prd['submittion_date'];?></b></td>
                                                <!--========= Impotant sweet alert js =================-->

                                                
                                                <form method="post" action="" enctype="multipart/form-data" onsubmit="return myFunction();">          
                                                    <input type="hidden" name="adv_id" value="<?php echo $prd['adv_id'];?>"/>

                                                <td class="d-flex"><a href="training_module_stage_iii.php?xedit=1&adv_id=<?php echo $prd['adv_id'];?>"><i class="fa fa-pencil-square" aria-hidden="true" style="font-size:25px;"></i></a><button  style="border:none; color:#007bff" type="submit" name="delete"><i class="fa fa-trash" aria-hidden="true" style="font-size:25px;"></i></a></button></td>
                                              </form>

                                            </tr>
                                        <?php
                                        }
                                        ?>     

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <style>
                    .visitors-table tbody tr td:last-child {
                        display: flex;
                        align-items: center;
                    }

                    .visitors-table .progress {
                        flex: 1;
                    }

                    .visitors-table .progress-parcent {
                        text-align: right;
                        margin-left: 10px;
                    }
                </style>

            </div>