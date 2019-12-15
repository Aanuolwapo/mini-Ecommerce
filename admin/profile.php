<?php include('includes/header.php')?>
<div class="pageheader">
  <h2><i class="fa fa-home"></i> <?php echo $row['fullname']; ?>'s Dashboard</h2>
  <div class="breadcrumb-wrapper">
    <span class="label">You are here:</span>
    <ol class="breadcrumb">
      <li>Presage ENT Blog</li>
      <li><a href="admin_dashboard.php">Admin</a></li>
      <li class="active">Profile</li>
    </ol>
  </div>
</div>

<div class="contentpanel">
          <div class="row">
        <div class="col-sm-3">
          <img src="<?php echo $image; ?>" class="thumbnail img-responsive" alt="" />
          
          <div class="mb30"></div>
          
          <h5 class="subtitle">About</h5>
          <p class="mb30"><?php echo $description; ?></p>
          
          <h5 class="subtitle">Connect</h5>
          <ul class="profile-social-list">
            <li><i class="fa fa-twitter"></i> <a href=""><?php echo $twitter; ?></a></li>
            <li><i class="fa fa-facebook"></i> <a href=""><?php echo $facebook; ?></a></li>
            <li><i class="fa fa-envelope"></i> <a href=""><?php echo $email; ?></a></li>
          </ul>
          
          <div class="mb30"></div>
            
        </div><!-- col-sm-3 -->
        <div class="col-sm-9">
          
          <div class="profile-header">
            <h2 class="profile-name"><?php echo $fullname; ?></h2>
            <div class="profile-position"><i class="fa fa-briefcase"></i><span style="text-transform: capitalize;"> <?php echo $rank; ?> </span> at <a href="">Presage Entertainment</a></div>
            
            <div class="mb20"></div>
            
          </div><!-- profile-header -->
          
          <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-justified nav-profile">
          <li class="active"><a href="#activities" data-toggle="tab"><strong>Post Activities</strong></a></li>
           <li><a href="#followers" data-toggle="tab"><strong>Breaking News Activities</strong></a></li>
            <li><a href="#following" data-toggle="tab"><strong>Edit Your Details</strong></a></li>
          <li><a href="#events" data-toggle="tab"><strong>Update Social Links</strong></a></li>
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="activities">
            <div class="activity-list">
              <?php while($blog_post_act_data = mysqli_fetch_array($blog_post_act_result)) {
                    $admin_name = $blog_post_act_data['admin_name'];
                  $admin_image_query = "SELECT image FROM admin WHERE username = '$admin_name'";
                  $admin_image_result = mysqli_query($connection, $admin_image_query);
                  $admin_image_data = mysqli_fetch_array($admin_image_result);
                  $admin_image = $admin_image_data['image'];
                ?>
              <div class="media act-media">
                <a class="pull-left" href="#">
                  <img class="media-object act-thumb" src="<?php echo $admin_image; ?>" alt="" />
                </a>
                <div class="media-body act-media-body">
                  <strong><?php echo $blog_post_act_data['admin_name']; ?></strong> posted a new blog. <br />
                  <small class="text-muted"><?php $blog_post_act_data['posted_at']; ?></small>
                      
                  <div class="media blog-media">
                    <a class="pull-left" href="#">
                      <img class="media-object" src="<?php echo $blog_post_act_data['post_image_1']?>" alt="" />
                    </a>
                    <div class="media-body">
                      <h4 class="media-title"><a href=""><?php echo $blog_post_act_data['post_title']; ?></a></h4>
                      <p><?php echo $blog_post_act_data['post_description']; ?> <a href="">Read more</a></p>
                    </div>
                  </div><!-- media -->
                  
                  <strong>Publish Status: <?php echo $blog_post_act_data['publish_status']; ?></strong><?php if($blog_post_act_data['publish_status'] == 'unpublish' && $rank == 'admin') { ?> <form action="" method="POST"> <input type="hidden" value="<?php echo $blog_post_act_data['id'] ?>" name="id" /> <button type="submit" name="publish_post" class="btn btn-primary"> Publish</button> <?php } else {?> <button type="submit" name="unpublish_post" class="btn btn-primary"> Unpublish</button> <br /> </form>
                <?php } ?>
                    
                </div>
              </div><!-- media -->
            <?php } ?>
              
            </div><!-- activity-list -->
          </div>
        
          <div class="tab-pane active" id="followers">
            <div class="activity-list">
              <?php while($bn_act_data = mysqli_fetch_array($breaking_news_act_result)) {
                    $admin_name = $bn_act_data['admin_name'];
                  $admin_image_query = "SELECT image FROM admin WHERE username = '$admin_name'";
                  $admin_image_result = mysqli_query($connection, $admin_image_query);
                  $admin_image_data = mysqli_fetch_array($admin_image_result);
                  $admin_image = $admin_image_data['image'];
                ?>
              <div class="media act-media">
                <a class="pull-left" href="#">
                  <img class="media-object act-thumb" src="<?php echo $admin_image; ?>" alt="" />
                </a>
                <div class="media-body act-media-body">
                  <strong><?php echo $bn_act_data['admin_name']; ?></strong> posted a breaking news <br />
                  <small class="text-muted"><?php $bn_act_data['posted_at']; ?></small>
                      
                  <div class="media blog-media">
                    <div class="media-body">
                      <p><?php echo $bn_act_data['breaking_news']; ?>
                    </div>
                  </div><!-- media -->
                  
                  <strong>Publish Status: <?php echo $bn_act_data['publish_status']; ?></strong><?php if($bn_act_data['publish_status'] == 'unpublish' && $rank == 'admin') { ?> <form action="" method="POST"> <input type="hidden" value="<?php echo $bn_act_data['id'] ?>" name="id" /> <button type="submit" name="publish_bn" class="btn btn-primary"> Publish</button> <?php } else {?> <button type="submit" name="unpublish_bn" class="btn btn-primary"> Unpublish</button> <br /> </form>
                <?php } ?>
                    
                </div>
              </div><!-- media -->
            <?php } ?>
              
            </div><!-- activity-list -->
          </div>
            
        <div class="tab-pane" style="height: 700px; overflow: auto;" id="following">
            <div class="activity-list">
              
              <div class="media act-media">
                <div class="media-body act-media-body">
                    <form action="" method="POST">
                     <h5>Change Name</h5>
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <div class="panel-body">
                        <div class="form-group">
                            <input type="text" name="lastname" placeholder="Lastname Goes Here!!!" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" name="firstname" placeholder="Firstname Goes Here!!!" class="form-control" required />
                        </div>
                    </div><!-- panel-body -->
                    <div class="panel-footer">
                        <button name="update_name" class="btn btn-primary">Send</button>
                    </div>
                </form> 
                <hr><hr><hr>

                 <form action="" method="POST">
                     <h5>Change Password</h5>
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <div class="panel-body">
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Enter New Password" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <input type="password" name="password1" placeholder="Retype-Password" class="form-control" required />
                        </div>
                    </div><!-- panel-body -->
                    <div class="panel-footer">
                        <button name="update_password" class="btn btn-primary">Send</button>
                    </div>
                </form> 
                <hr><hr><hr>
                <form action="" method="POST">
                     <h5>Change Your Description</h5>
                    <p class="text-center"><strong>Previous Description:</strong> <?php echo $description; ?></p>
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <div class="panel-body">
                        <div class="form-group">
                            <textarea class="form-control" name="description" required></textarea>
                        </div>
                    </div><!-- panel-body -->
                    <div class="panel-footer">
                        <button name="update_description" class="btn btn-primary">Send</button>
                    </div>
                </form>
                <hr><hr>
                <form action="" method="POST" enctype="multipart/form-data">
                    <h5>Change Your Profile Image</h5>
                    <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <div class="panel-body">
                        <div class="form-group">
                            <input type="file" class="form-control" name="image" />
                        </div>
                    </div><!-- panel-body -->
                    <div class="panel-footer">
                        <button name="update_image" class="btn btn-primary">Upload Image</button>
                    </div>
                </form>
                </div>
              </div><!-- media -->
            </div><!-- activity-list -->  
          </div>
            
                  <div class="tab-pane" id="events">
            <div class="events">
              <div class="row">
                <div class="col-sm-12">
                  <div class="media">
                    
                     <h5>Update Social Media Links</h5>
                    <div class="panel-body">
                        <form action="" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <div class="input-group mb15">
                          <input name="email" type="email" placeholder="Email goes here" class="form-control" required />
                          <span class="input-group-btn">
                            <button type="submit" name="update_email" type="button" class="btn btn-primary">Update Email</button>
                          </span>
                        </div>
                        </form>
                        <form action="" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <div class="input-group mb15">
                          <input name="email" type="facebook" placeholder="Facebook link goes here" class="form-control" required />
                          <span class="input-group-btn">
                            <button type="submit" name="update_fb" type="button" class="btn btn-primary">Update Facebook</button>
                          </span>
                        </div>
                        </form>
                        <form action="" method="POST">
                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                        <div class="input-group mb15">
                          <input name="email" type="twitter" placeholder="Twitter Link goes here" class="form-control" required />
                          <span class="input-group-btn">
                            <button type="submit" name="update_tw" type="button" class="btn btn-primary">Update Twitter</button>
                          </span>
                        </div>
                        </form>
                    </div><!-- panel-body -->
                  </div><!-- media -->
                </div><!-- col-sm-6 -->
           
                
               

             
              </div>
              
            </div><!-- events -->
          </div>
            
        </div><!-- tab-content -->
          
        </div><!-- col-sm-9 -->
      </div><!-- row -->

    </div><!-- contentpanel -->
</div><!-- mainpanel -->
<?php include('includes/footer.php')?> 