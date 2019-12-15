<?php include('includes/header.php')?>
<div class="pageheader">
  <h2><i class="fa fa-home"></i> <?php echo $row['fullname']; ?>'s Dashboard</h2>
  <div class="breadcrumb-wrapper">
    <span class="label">You are here:</span>
    <ol class="breadcrumb">
      <li>Presage ENT Blog</li>
      <li><a href="admin_dashboard.php">Admin</a></li>
      <li class="active">Subscribers</li>
    </ol>
  </div>
</div>

<div class="contentpanel">
    <div class="row"> 
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="" class="panel-close">&times;</a>
            <a href="" class="minimize">&minus;</a>
          </div>
          <h4 class="panel-title"> People Directory</h4>
        </div>
         <div class="panel-body panel-body-nopadding">
             
            <div class="mb30"></div>
              <div class="people-list">
                <div class="row"> 
                <?php while($admin_data = mysqli_fetch_array($admin_data_result)) {?>
                  <div class="col-md-6">
                    <div class="people-item">
                      <div class="media">
                        <a href="#" class="pull-left">
                          <img alt="" src="<?php echo $admin_data['image']?>" style="width: 110px; height: 110px;" class="thumbnail media-object">
                        </a>
                        <div class="media-body">
                          <h4 class="person-name"><?php echo $admin_data['fullname']; ?></h4>
                          <div class="text-muted"><i class="fa fa-info-circle"></i><?php echo $admin_data['description']?></div>
                          <div class="text-muted"><i class="fa fa-briefcase"></i><?php echo $admin_data['rank']?> @ <a href=""> Presage Entertainment</a></div>
                          <ul class="social-list">
                            <li><a href="mailto::<?php echo $admin_data['email']; ?>" class="tooltips" data-toggle="tooltip" data-placement="top" title="Email"><i class="fa fa-envelope-o"></i></a></li>
                            <li><a href="<?php echo $admin_data['facebook']; ?>" class="tooltips" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="<?php echo $admin_data['twitter']; ?>" class="tooltips" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div><!-- col-md-6 -->
                <?php } ?>
              </div>
             </div>
                    
         </div><!-- panel-body -->
     </div>

    </div><!-- contentpanel -->
</div>
</div><!-- mainpanel -->
<?php include('includes/footer.php')?>