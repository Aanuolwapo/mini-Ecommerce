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
        </div>
         <div class="panel-body panel-body-nopadding">
             
                 <div class="signuppanel">
        
        <div class="row">
            
            <div class="col-md-3">
        
            
            </div><!-- col-sm-3 -->
            
            <div class="col-md-6">
                
                <form method="POST" action="">
                    
                    <h3 class="nomargin">Add New Admin</h3>
                    <br/>
                    <div class="row mb10">
                       <?php include('includes/error_message.php')?>
                      <?php include('includes/success_message.php')?>
                      </div>
                    <hr>
                    <hr>
                    <label class="control-label">Name</label>
                    <div class="row mb10">
                        <div class="col-sm-6">
                            <input name="firstname" type="text" class="form-control" placeholder="Firstname" required />
                        </div>
                        <div class="col-sm-6">
                            <input name="lastname" type="text" class="form-control" placeholder="Lastname" required />
                        </div>
                    </div>
                    
                    <div class="mb10">
                        <label class="control-label">Username</label>
                        <input name="username" type="text" class="form-control" placeholder="Username goes here!!!" required />
                    </div>
                    
                   <label class="control-label">Rank</label>
                    <div class="row mb10">
                            <select name="rank" class="select2" data-placeholder="Rank" required>
                                <option value=""></option>
                                <option value="admin">Admin</option>
                                <option value="Manager">Manager</option>
                                <option value="Reporter">Reporter</option>
                                <option value="Editor">Editor</option>
                            </select>
                    </div>
                    
                    <div class="mb10">
                        <label class="control-label">Email Address</label>
                        <input name="email" type="email" class="form-control" placeholder="Email goes here!!!" required />
                    </div>
                    
                    <br />
                    
                    <button name="add_admin" class="btn btn-success btn-block">Add Admin</button>     
                </form>
            </div><!-- col-sm-6 -->
             
            <div class="col-md-3">
        
            
            </div><!-- col-sm-3 -->
            
        </div><!-- row -->
        
        
    </div><!-- signuppanel -->
             <br/>
         </div><!-- panel-body -->
     </div>

    </div><!-- contentpanel -->
</div>
</div><!-- mainpanel -->
<?php include('includes/footer.php')?>