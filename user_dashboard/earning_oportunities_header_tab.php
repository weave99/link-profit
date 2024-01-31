    
    
    

    <div class="col-lg-12">
    <?php
    //`eop_category_id`, `eop_category_name` SELECT * FROM `earning_opportunities_category_master` WHERE 1
    $sql_eop_category="SELECT * FROM earning_opportunities_category_master WHERE 1";
    $query_eop_category=mysqli_query($conn,$sql_eop_category);
    while($fetch_eop_category=mysqli_fetch_array($query_eop_category)) 
    {?>        
        <a href="earning_opportunities_category_page.php?page_category=<?php echo $fetch_eop_category['eop_category_id'];?>"><div class="btn" style="background-color:#629dad; color:#fff;"><?php echo $fetch_eop_category['eop_category_name'];?></div></a>
    <?php
    }
    ?>    
    </div>
