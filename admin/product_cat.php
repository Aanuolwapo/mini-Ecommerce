<?php include('includes/header.php')?>
<div class="pageheader">
  <h2><i class="fa fa-home"></i> <?php echo $row['fullname']; ?>'s Dashboard</h2>
  <div class="breadcrumb-wrapper">
    <span class="label">You are here:</span>
    <ol class="breadcrumb">
      <li>Presage Store</li>
      <li><a href="store_dashboard.php">Admin</a></li>
      <li class="active">Add New Store Category</li>
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
          <h4 class="panel-title">Add Store Category</h4>
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
                  <label class="col-sm-3 control-label">Store Category</label>
                  <div class="col-sm-6">
                    <input type="text" name="category" placeholder="Category" class="form-control" />
                  </div>
                </div>
                <div class="form-group">
                <label class="col-sm-3 control-label"></label>
                  <div class="col-sm-6">
                    <button type="submit" name="pro_cat" class="btn btn-primary btn-block"><i class="fa-paper-plane"></i> Add Category </button> 
                  </div>
                </div>
             </form>
         </div><!-- panel-body -->
     </div>

    </div><!-- contentpanel -->
</div>
</div><!-- mainpanel -->
<?php include('includes/footer.php')?>