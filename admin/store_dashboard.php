    <?php include('includes/header.php')?>
    <div class="pageheader">
      <h2><i class="fa fa-home"></i> <?php echo $row['fullname']; ?>'s Dashboard</h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li>Presage Store</li>
          <li><a href="">Admin</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </div>
    </div>
    
    <div class="contentpanel">
      
      <div class="row">
        
        <div class="col-sm-6 col-md-3">
          <div class="panel panel-success panel-stat">
            <div class="panel-heading">
              
              <div class="stat">
                <div class="row">
                  <div class="col-xs-4">
                    <img src="images/is-user.png" alt="" />
                  </div>
                  <div class="col-xs-8">
                    <small class="stat-label">Online Users</small>
                    <h1><?php echo $count_online; ?></h1>
                  </div>
                </div><!-- row -->
                
                <div class="mb15"></div>
              </div><!-- stat -->
              
            </div><!-- panel-heading -->
          </div><!-- panel -->
        </div><!-- col-sm-6 -->
        
        <div class="col-sm-6 col-md-3">
          <div class="panel panel-danger panel-stat">
            <div class="panel-heading">
              
              <div class="stat">
                <div class="row">
                  <div class="col-xs-4">
                    <img src="images/is-document.png" alt="" />
                  </div>
                  <div class="col-xs-8">
                    <small class="stat-label">Number Of Product</small>
                    <h1><?php echo $product_count ?></h1>
                  </div>
                </div><!-- row -->
                
                <div class="mb15"></div>
              </div><!-- stat -->
              
            </div><!-- panel-heading -->
          </div><!-- panel -->
        </div><!-- col-sm-6 -->
        
        <div class="col-sm-6 col-md-3">
          <div class="panel panel-dark panel-stat">
            <div class="panel-heading">
              
              <div class="stat">
                <div class="row">
                  <div class="col-xs-4">
                    <img src="images/is-document.png" alt="" />
                  </div>
                  <div class="col-xs-8">
                    <small class="stat-label">Number Of Undelivered Orders</small>
                    <h1><?php echo $unde_count ?></h1>
                  </div>
                </div><!-- row -->
                
                <div class="mb15"></div>
              </div><!-- stat -->
              
            </div><!-- panel-heading -->
          </div><!-- panel -->
        </div><!-- col-sm-6 -->
          
        <div class="col-sm-6 col-md-3">
          <div class="panel panel-primary panel-stat">
            <div class="panel-heading">
              
              <div class="stat">
                <div class="row">
                  <div class="col-xs-4">
                    <img src="images/is-user.png" alt="" />
                  </div>
                  <div class="col-xs-8">
                    <small class="stat-label">registered users</small>
                    <h1><?php echo $subcount ?></h1>
                  </div>
                </div><!-- row -->
                
                <div class="mb15"></div>
              </div><!-- stat -->
              
            </div><!-- panel-heading -->
          </div><!-- panel -->
        </div><!-- col-sm-6 -->
      </div><!-- row -->
      
      <div class="row">
        
        <div class="col-sm-12">
          
          <div class="table-responsive">
            <table class="table table-bordered table-responsive" id="table2">
                <h3>Orders</h3>
            <thead>
              <tr>
                <th>Customer's Name</th>
                <th>Customent's Mobile</th>
                <th>Postal Code</th>
                <th>City</th>
                <th>Address</th>
                <th>Product Bought</th>
                <th>Amount Paid</th>
                <th>Payment Status</th>
                <th>Payment At</th>
                <th>Actions</th>  
              </tr>
            </thead>
            <?php while($order_data = mysqli_fetch_array($order_result)){?>
            <tbody>
              <tr>
                <td style="text-transform: capitalize"><?php echo $order_data['user_fullname']; ?></td>
                <td style="text-transform: capitalize"><?php echo $order_data['user_mobile']; ?></td>
                <td style="text-transform: capitalize"><?php echo $order_data['postal_code']; ?></td>
                <td style="text-transform: capitalize"><?php echo $order_data['city']; ?></td>
                <td style="text-transform: capitalize"><?php echo $order_data['address']; ?></td>
                <td style="text-transform: capitalize"><?php echo $order_data['product_names']; ?></td>
                <td style="text-transform: capitalize"><?php echo $order_data['total_payable']; ?></td>
                <td style="text-transform: capitalize"><?php echo $order_data['payment_status']; ?></td>
                <td><?php  echo date('M j Y g:i A', strtotime($order_data['payment_at']));?></td>
                <td><form action="" method="POST"><input type="hidden" value="<?php echo $order_data['id']?>" name="id"> <button type="submit" name="deliver" class="fa fa-check-o btn btn-primary"> Delivered</button></form>
              </tr>
            </tbody>
            <?php } ?>
          </table>
          </div><!-- table-responsive -->
          
        </div><!-- col-sm-7 -->
        
      <!--  <div class="col-sm-5">
          
          <div class="panel panel-success">
            <div class="panel-heading padding5">
              <div id="line-chart" class="ex-line-chart"></div>
            </div>
            <div class="panel-body">
              <div class="tinystat pull-left">
                <div id="sparkline" class="chart mt5"></div>
                <div class="datainfo">
                  <span class="text-muted">Average Sales</span>
                  <h4>$630,201</h4>
                </div>
              </div><!-- tinystat 
              <div class="tinystat pull-right">
                <div id="sparkline2" class="chart mt5"></div>
                <div class="datainfo">
                  <span class="text-muted">Total Sales</span>
                  <h4>$139,201</h4>
                </div>
              </div><!-- tinystat >
            </div>
          </div><!-- panel 
          
        </div><!-- col-sm-6 -->
      </div><!-- row -->
      
    </div><!-- contentpanel -->
    
  </div><!-- mainpanel -->
<?php include('includes/footer.php')?>
  