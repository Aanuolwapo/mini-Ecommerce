<?php include('includes/header.php')?>
<div class="pageheader">
  <h2><i class="fa fa-home"></i> <?php echo $row['fullname']; ?>'s Dashboard</h2>
  <div class="breadcrumb-wrapper">
    <span class="label">You are here:</span>
    <ol class="breadcrumb">
      <li>Presage Store</li>
      <li><a href="admin_dashboard.php">Admin</a></li>
      <li class="active">Store Category Lists</li>
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
          <h4 class="panel-title">List Store Category</h4>
        </div>
         <div class="panel-body panel-body-nopadding">
               
           <div class="row table-responsive">
               <div class="col-md-2"></div>
               <div class="col-md-8">
               <table class="table table-responsive" id="table2">
                  <thead>
                     <tr>
                        <th>Catergory</th>
                        <th>Created At</th>
                     </tr>
                  </thead>
                   <?php while($pro_cat_data = mysqli_fetch_array($product_cat_result)) {?>
                  <tbody>
                    <tr class="odd gradeX">
                        <td><?php echo $pro_cat_data['store_cat']; ?></td>
                        <td><?php echo date('M j Y g:i A', strtotime($pro_cat_data['created_at'])); ?></td>
                        <td>
                            <form action="" method="POST"><input type="hidden" name="id" value="<?php echo $pro_cat_data['id']; ?>"> 
                            <div class="input-group mb15">
                              <input name="cat" type="text" placeholder="Category" class="form-control" required />
                              <span class="input-group-btn">
                                <button type="submit" name="edit_cat" type="button" class="btn btn-primary">Update Category</button>
                              </span>
                            </div>
                            </form>
                            <form action="" method="POST"><input type="hidden" name="id" value="<?php echo $pro_cat_data['id']; ?>"> <button type="submit" name="delete_cat" class="fa fa-trash-o btn btn-danger"> Delete</button></form></td>
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