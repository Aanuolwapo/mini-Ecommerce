<?php include('includes/header.php')?>
<div class="pageheader">
  <h2><i class="fa fa-home"></i> <?php echo $row['fullname']; ?>'s Dashboard</h2>
  <div class="breadcrumb-wrapper">
    <span class="label">You are here:</span>
    <ol class="breadcrumb">
      <li>Presage Store</li>
      <li><a href="store_dashboard.php">Admin</a></li>
      <li class="active">New Product</li>
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
              <h4 class="panel-title">Add New Product</h4>
            </div>
             <div class="panel-body panel-body-nopadding" style="overflow: auto; height: 1200px;">
                          <!-- BASIC WIZARD -->
            
                <form class="form"  action="" method="POST" enctype="multipart/form-data" > 
                    <?php include('includes/error_message.php')?>
                  <?php include('includes/success_message.php')?>
                <div class="tab-content">
                     <div class="form-group">
                        <div class="col-sm-4">
                            <label for="post_title" class="control-label">Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name Goes Here..." required />
                        </div>
                        <div class="col-sm-4">
                            <label for="post_title" class="control-label">Product Price In Naira</label>
                            <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Product Price Goes Here..." required />
                        </div>
                        <div class="col-sm-4">
                         <label for="cat" class="col-sm-4 control-label">Category</label>
                                <select id="cat" name="cat" class="select2" data-placeholder="Choose a Category...">
                                  <?php while($pro_cat_data = mysqli_fetch_array($product_cat_result)) {
                                  echo '<option value="' . htmlspecialchars($pro_cat_data['store_cat']) . '">' . htmlspecialchars($pro_cat_data['store_cat']) . '</option>'; } ?>
                                </select>
                        </div>
                      </div>
                    <hr>
                        <hr>
                     <div class="form-group">
                         <div id="" class="col-sm-6 fallback">
                              <label for="post_title" class="control-label">Product Image 1</label>
                              <input type="file" name="product_image_1" />
                         </div>
                         <div id="" class="col-sm-6 fallback" >
                              <label for="post_title" class="control-label">Product Image 2</label>
                              <input type="file" name="product_image_2" />
                         </div>
                    </div>
                        <hr>
                        <hr> 
                        <hr>
                        <hr>
                      <div class="form-group">
                        <div class="col-sm-12">
                            <textarea id="ckeditor" name="description" placeholder="Enter product description here..." class="form-control" rows="10"></textarea>
                        </div>
                      </div>
                    <hr><hr>
                    <br />
                              
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button type="submit" name="add_product" class="btn btn-primary btn-block"> Post</button>
                        </div>
                      </div>
           
                  </div><!-- tab-content -->
                </form>
              
           
              
            </div><!-- panel-body -->
          </div>

        </div><!-- contentpanel -->
        </div>
    </div><!-- mainpanel -->
  <?php include('includes/footer.php')?>

