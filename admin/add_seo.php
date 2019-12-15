<?php include('includes/header.php')?>
<div class="pageheader">
  <h2><i class="fa fa-home"></i> <?php echo $row['fullname']; ?>'s Dashboard</h2>
  <div class="breadcrumb-wrapper">
    <span class="label">You are here:</span>
    <ol class="breadcrumb">
      <li>Presage ENT Blog</li>
      <li><a href="admin_dashboard.php">Admin</a></li>
      <li class="active">Add New Category (Menu)</li>
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
          <h4 class="panel-title">Add Category</h4>
        </div>
         <div class="panel-body panel-body-nopadding">
             
             <form class="form-horizontal form-bordered" action="" method="POST"> 
                 <div class="form-group">
                  <label class="col-sm-3 control-label"></label>
                  <div class="col-sm-6">
                   <?php include('includes/error_message.php')?>
                  <?php include('includes/success_message.php')?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Social Media</label>
                  <div class="col-sm-6">
                    <select name="social_media" class="select2" data-placeholder="Social Media">
                        <option value=""></option>
                        <?php if($email_count == 0) {?><option value="Email">Email</option><?php }?>
                        <?php if($facebook_count == 0) {?><option value="Facebook">Facebook</option><?php }?>
                        <?php if($insta_count == 0) {?><option value="Instagram">Instagram</option><?php }?>
                        <?php if($twit_count == 0) {?><option value="Twitter">Twitter</option><?php }?>
                        <?php if($ytube_count == 0) {?><option value="Youtube">Youtube</option><?php }?>
                    </select>
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-3 control-label">Social Media Link</label>
                  <div class="col-sm-6">
                    <input name="social_media_link" type="text" placeholder="Link" class="form-control" />
                  </div>
                </div>
                <div class="form-group">
                <label class="col-sm-3 control-label"></label>
                  <div class="col-sm-6">
                    <button type="submit" name="add_seo" class="btn btn-primary btn-block"><i class="fa-paper-plane"></i> Add SEO </button> 
                  </div>
                </div>
             </form>
         </div><!-- panel-body -->
     </div>

    </div><!-- contentpanel -->
</div>
</div><!-- mainpanel -->
<?php include('includes/footer.php')?>