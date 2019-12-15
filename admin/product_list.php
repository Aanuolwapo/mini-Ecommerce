<?php include('includes/header.php')?>
<div class="pageheader">
  <h2><i class="fa fa-home"></i> <?php echo $row['fullname']; ?>'s Dashboard</h2>
  <div class="breadcrumb-wrapper">
    <span class="label">You are here:</span>
    <ol class="breadcrumb">
      <li>Presage Store</li>
      <li><a href="store_dashboard.php">Admin</a></li>
      <li class="active">Product Lists</li>
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
          <h4 class="panel-title">Product Lists</h4>
        </div>
         <div class="panel-body panel-body-nopadding">
               
           <div class="table-responsive">
               <table class="table table-responsive" id="table2">
                  <thead>
                     <tr>
                        <th>Product Name</th>
                        <th>Catergory</th>
                        <th>Product Price</th>
                        <th>Product Description</th>
                        <th>Quantity Sold</th>
                        <th>Post At</th>
                        <th>Actions</th>
                     </tr>
                  </thead>
                   <?php while($product_data = mysqli_fetch_array($product_result)) { ?>
                  <tbody>
                    <tr class="odd gradeX">
                        <td><?php echo $product_data['product_name']; ?></td>
                        <td><?php echo $product_data['cat']; ?></td>
                        <td><?php echo $product_data['product_price']; ?></td>
                        <td><?php echo $product_data['product_description']; ?></td>
                        <td><?php 
                            $product_id = $product_data['id'];
                            $post_like = "SELECT * FROM store_orders WHERE product_id = '$product_id'";
                            $post_like_result = mysqli_query($connection, $post_like);
                            $likes = mysqli_num_rows($post_like_result);
                             echo $likes;
                            ?></td>
                        <td><?php echo date('M j Y g:i A', strtotime($product_data['created_at']));?></td>
                        <td><form action="" method="POST"><input type="hidden" value="<?php echo $product_data['id']?>" name="id"> <button type="submit" name="delete_product" class="fa fa-trash-o btn btn-danger"> Delete</button></form><form action="edit_product.php" method="POST"><input type="hidden" value="<?php echo $product_data['id']?>" name="id"> <button type="submit" name="edit_pro" class="fa fa-edit btn btn-primary"> Edit</button></form></td>
                    </tr>
                   </tbody>
                   <?php } ?>
               </table>
             </div>


         </div><!-- panel-body -->
     </div>

    </div><!-- contentpanel -->
</div>
</div><!-- mainpanel -->
<?php include('includes/footer.php')?>