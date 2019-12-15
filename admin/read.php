<?php include('includes/header.php');

$post_id = $_GET['post_id'];

$read_email_query = "SELECT * FROM message WHERE id = '$post_id'";
$read_email_result = mysqli_query($connection, $read_email_query);
$read_data = mysqli_fetch_array($read_email_result);

$sender = $read_data['sender'];
$sender_image = $read_data['sender_image'];
$message_title = $read_data['message_title'];
$message_body = $read_data['message_body'];
$sent_at = date('M j Y g:i A', strtotime($read_data['sent_at']));

$update_read = mysqli_query($connection, "UPDATE message SET message_status = 'read' WHERE id = '$post_id'");


?>        
       <div class="pageheader">
  <h2><i class="fa fa-home"></i> <?php echo $row['fullname']; ?>'s Dashboard</h2>
  <div class="breadcrumb-wrapper">
    <span class="label">You are here:</span>
    <ol class="breadcrumb">
      <li>Presage ENT Blog</li>
      <li><a href="admin_dashboard.php">Admin</a></li>
      <li class="active">Read Email</li>
    </ol>
  </div>
</div>
    
    <div class="contentpanel panel-email">

        <div class="row">
             <div class="col-sm-3 col-lg-2">
                <a href="compose.php" class="btn btn-danger btn-block btn-compose-email">Compose Email</a>
                
                <ul class="nav nav-pills nav-stacked nav-email">
                    <li class="active">
                    <a href="email.php">
                        <span class="badge pull-right"><?php echo $message_count; ?></span>
                        <i class="glyphicon glyphicon-inbox"></i> Inbox
                    </a>
                    </li>
                    <li><a href="sentmail.php"><i class="glyphicon glyphicon-send"></i> Sent Mail</a></li>
                </ul>
                
                <div class="mb30"></div>
                
            </div><!-- col-sm-3 -->
            
            <div class="col-sm-9 col-lg-10">
                
                <div class="panel panel-default">
                    <div class="panel-body">
                        
                        <div class="btn-group mr10">
                            <button class="btn btn-sm btn-white tooltips" type="button" data-toggle="tooltip" title="Read Previous Email"><i class="glyphicon glyphicon-chevron-left"></i></button>
                            <button class="btn btn-sm btn-white tooltips" type="button" data-toggle="tooltip" title="Read Next Email"><i class="glyphicon glyphicon-chevron-right"></i></button>
                        </div>
                        
                        <div class="read-panel">
                            
                            <div class="media">
                                <a href="#" class="pull-left">
                                    <img alt="" src="<?php echo $sender_image; ?>" class="media-object">
                                </a>
                                <div class="media-body">
                                    <span class="media-meta pull-right"><?php echo $sent_at; ?></span>
                                    <h4 class="text-primary"><?php echo $sender; ?></h4>
                                </div>
                            </div><!-- media -->
                            
                            <h4 class="email-subject"><strong>Subject: </strong><?php echo $message_title; ?></h4>
                            
                            <hr><hr>
                            
                            <p><?php echo $message_body; ?></p>
                            
                            <div class="media">
                                <a href="#" class="pull-left">
                                    <img alt="" src="images/photos/user2.png" class="media-object">
                                </a>
                                <div class="media-body">
                                    <a href="compose.php" class="btn btn_primary"> Reply</a>
                                </div>
                            </div><!-- media -->
                        
                        </div><!-- read-panel -->
                        
                    </div><!-- panel-body -->
                </div><!-- panel -->
                
            </div><!-- col-sm-9 -->
            
        </div><!-- row -->
    
    </div>
    
  </div><!-- mainpanel -->
  
<?php include('includes/footer.php')?>
