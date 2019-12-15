<?php include('includes/header.php')?>
<div class="pageheader">
  <h2><i class="fa fa-home"></i> <?php echo $row['fullname']; ?>'s Dashboard</h2>
  <div class="breadcrumb-wrapper">
    <span class="label">You are here:</span>
    <ol class="breadcrumb">
      <li>Presage ENT Blog</li>
      <li><a href="admin_dashboard.php">Admin</a></li>
      <li class="active">Email</li>
    </ol>
  </div>
</div>
    
    <div class="contentpanel panel-email">

        <div class="row">
            <div class="col-sm-3 col-lg-2">
                <a href="compose.php" class="btn btn-danger btn-block btn-compose-email">Compose Email</a>
                
                <ul class="nav nav-pills nav-stacked nav-email">
                    <li>
                    <a href="email.php">
                        <span class="badge pull-right"><?php echo $message_count; ?></span>
                        <i class="glyphicon glyphicon-inbox"></i> Inbox
                    </a>
                    </li>
                    <li class="active"><a href="sentmail.php"><i class="glyphicon glyphicon-send"></i> Sent Mail</a></li>
                </ul>
                
                <div class="mb30"></div>
            </div><!-- col-sm-3 -->
            
            <div class="col-sm-9 col-lg-10">
                
                <div class="panel panel-default">
                    <div class="panel-body">
                        
                        <div class="pull-right">    
                            <div class="btn-group">
                                <button class="btn btn-sm btn-white" type="button"><i class="glyphicon glyphicon-chevron-left"></i></button>
                                <button class="btn btn-sm btn-white" type="button"><i class="glyphicon glyphicon-chevron-right"></i></button>
                            </div>
                        </div><!-- pull-right -->
                        
                        <h5 class="subtitle mb5">Sent Mail</h5>
                        <p class="text-muted"></p>
                        
                        <div class="table-responsive">
                            <table class="table table-email">
                              <tbody>
                                <?php while($messagest_data = mysqli_fetch_array($messagest_result)) { ?>
                                <tr <?php if($messagest_data['message_status'] == 'unread') {?> class="unread" <?php } ?>>
                                  <td>
                                    <a href="" class="star"><i class="glyphicon glyphicon-star"></i></a>
                                  </td>
                                  <td>
                                    <div class="media">
                                        <a href="read.php" class="pull-left">
                                          <img alt="" src="<?php echo $messagest_data['sender_image']; ?>" class="media-object">
                                        </a>
                                        <a href="read.php?post_id=<?php echo $messagest_data['id']; ?>">
                                        <div class="media-body">
                                            <span class="media-meta pull-right"><?php  echo date('M j Y g:i A', strtotime($messagest_data['sent_at']));?></span>
                                            <h4 class="text-primary">sent to: <?php echo $messagest_data['receiver']; ?></h4>
                                            <small class="text-muted"></small>
                                            <p class="email-summary"><?php echo $messagest_data['message_title']; ?></p>
                                        </div>
                                        </a> 
                                    </div>
                                  </td>
                                </tr>
                                <?php } ?>  
                              </tbody>
                            </table>
                        </div><!-- table-responsive -->
                        
                    </div><!-- panel-body -->
                </div><!-- panel -->
                
            </div><!-- col-sm-9 -->
            
        </div><!-- row -->
    
    </div>
    
  </div><!-- mainpanel -->
  
<?php include('includes/footer.php')?>