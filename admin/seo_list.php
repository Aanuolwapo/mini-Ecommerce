<?php include('includes/header.php')?>
<div class="pageheader">
  <h2><i class="fa fa-home"></i> <?php echo $row['fullname']; ?>'s Dashboard</h2>
  <div class="breadcrumb-wrapper">
    <span class="label">You are here:</span>
    <ol class="breadcrumb">
      <li>Presage ENT Blog</li>
      <li><a href="admin_dashboard.php">Admin</a></li>
      <li class="active">Category Lists</li>
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
          <h4 class="panel-title">List SEO</h4>
        </div>
         <div class="panel-body panel-body-nopadding">
               
           <div class="row table-responsive">
               <div class="col-md-2"></div>
               <div class="col-md-8">
               <table class="table table-responsive" id="table2">
                  <thead>
                     <tr>
                        <th>Social Media</th>
                        <th>Social Media Link</th>
                     </tr>
                  </thead>
                   <?php while($seo_data = mysqli_fetch_array($seo_result)) {?>
                  <tbody>
                    <tr class="odd gradeX">
                        <td><?php echo $seo_data['social_media']; ?></td>
                        <td><?php echo $seo_data['social_media_link']; ?></td>
                        <td>
                            <form action="" method="POST"><input type="hidden" name="id" value="<?php echo $seo_data['id']; ?>"> 
                            <div class="input-group mb15">
                              <input name="social_media_link" type="text" placeholder="Link" class="form-control" required />
                              <span class="input-group-btn">
                                <button type="submit" name="edit_seo" type="button" class="btn btn-primary">Update SEO Link</button>
                              </span>
                            </div>
                            </form>
                    <form action="" method="POST"><input type="hidden" name="id" value="<?php echo $seo_data['id']; ?>"> <button type="submit" name="delete_seo" class="fa fa-trash-o btn btn-danger"> Delete SEO</button></form></td>
                    </tr>
                   </tbody>
                   <?php } ?>
               </table>
               </div>
                <div class="col-md-2"></div>
             </div>


         </div><!-- panel-body -->
     </div>

    </div><!-- contentpanel -->
</div>
</div><!-- mainpanel -->
<?php include('includes/footer.php')?>