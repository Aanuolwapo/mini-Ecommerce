<?php include('includes/header.php')?>
        
    <div class="pageheader">
      <h2><i class="fa fa-envelope"></i> Compose Email</h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="index.html">Bracket</a></li>
          <li><a href="email.html">Email</a></li>
          <li class="active">Compose Email</li>
        </ol>
      </div>
    </div>
    
    <div class="contentpanel panel-email">
    <div class="pageheader">
  <h2><i class="fa fa-home"></i> <?php echo $row['fullname']; ?>'s Dashboard</h2>
  <div class="breadcrumb-wrapper">
    <span class="label">You are here:</span>
    <ol class="breadcrumb">
      <li>Presage ENT Blog</li>
      <li><a href="admin_dashboard.php">Admin</a></li>
      <li class="active">Compose Email</li>
    </ol>
  </div>
</div>

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
                     <?php include('includes/error_message.php')?>
                  <?php include('includes/success_message.php')?>
                <form action="" method="POST">
                    <input type="hidden" name="sender" value="<?php echo $fullname; ?>" />
                    <input type="hidden" name="sender_image" value="<?php echo $image; ?>" />
                    <div class="panel-body">
                         <div class="form-group">
                         <label for="cat" class="col-sm-4 control-label">Repicient</label>
                                <select id="cat" name="receiver" class="select2">
                                  <?php while($admnmail_data = mysqli_fetch_array($adminmail_data_result)) {
                                  echo '<option value="' . htmlspecialchars($admnmail_data['fullname']) . '">' . htmlspecialchars($admnmail_data['fullname']) . '</option>'; } ?>
                                </select>
                        </div> 
                        <br/>
                        <div class="form-group">
                            <input type="text" name="message_title" placeholder="Subject" class="form-control" />
                        </div>
                        
                        <textarea id="wysiwyg" name="message_body" placeholder="Your message here..." class="form-control" rows="20"></textarea>
                        
                    </div><!-- panel-body -->
                    <div class="panel-footer">
                        <button name="send_message" class="btn btn-primary">Send</button>
                    </div>
                </form>
                </div><!-- panel -->
                
            </div><!-- col-sm-9 -->
            
        </div><!-- row -->
    
    </div>
    
  </div><!-- mainpanel -->
    <?php include('includes/footer.php')?>