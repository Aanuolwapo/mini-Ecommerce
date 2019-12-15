<?php include('includes/header.php');

$product_id = $_GET['product_id'];

$item_query = "SELECT * FROM store_product WHERE id = '$product_id'";
$item_result = mysqli_query($connection, $item_query);
$item_data = mysqli_fetch_array($item_result);
$item_id = $item_data['id'];
$item_cat = $item_data['cat'];
$item_name = $item_data['product_name'];
$item_image_1 = $item_data['product_image_1'];
$item_image_2 = $item_data['product_image_2'];
$item_price = $item_data['product_price'];
$item_description = $item_data['product_description'];
?>


<!-- breadcrumb -->
	<div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
		<a href="index.html" class="s-text16">
			Home
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<a href="product.html" class="s-text16">
			<?php echo $item_cat; ?>
			<i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
		</a>

		<span class="s-text17">
			<?php echo $item_name; ?>
		</span>
	</div>

	<!-- Product Detail -->
	<div class="container bgwhite p-t-35 p-b-80">
		<div class="flex-w flex-sb">
			<div class="w-size13 p-t-30 respon5">
				<div class="wrap-slick3 flex-sb flex-w">
					<div class="wrap-slick3-dots"></div>

					<div class="slick3">
						<div class="item-slick3" data-thumb="<?php echo $item_image_1; ?>">
							<div class="wrap-pic-w">
								<img src="<?php echo $item_image_1; ?>" alt="IMG-PRODUCT">
							</div>
						</div>

						<div class="item-slick3" data-thumb="<?php echo $item_image_2; ?>">
							<div class="wrap-pic-w">
								<img src="<?php echo $item_image_2; ?>" alt="IMG-PRODUCT">
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="w-size14 p-t-30 respon5">
				<h4 class="product-detail-name m-text16 p-b-13">
						<?php echo $item_name; ?>
				</h4>

				<span class="m-text17">
						#<?php echo $item_price; ?>
				</span>


				<!--  -->
                <form action="" method="POST">
				<div class="p-t-33 p-b-60">
                    <?php if($item_cat == 'Clothes' || $item_cat == 'Shoes' || $item_cat == 'Bags' ) {?>
					<div class="flex-m flex-w p-b-10">
						<div class="s-text15 w-size15 t-center">
							Size
						</div>

						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
							<select class="selection-2" name="size">
								<option>Choose an option</option>
								<option>Size S</option>
								<option>Size M</option>
								<option>Size L</option>
								<option>Size XL</option>
							</select>
						</div>
					</div>
                   

					<div class="flex-m flex-w">
						<div class="s-text15 w-size15 t-center">
							Color
						</div>

						<div class="rs2-select2 rs3-select2 bo4 of-hidden w-size16">
							<select class="selection-2" name="color">
								<option>Choose an option</option>
								<option>Gray</option>
								<option>Red</option>
								<option>Black</option>
								<option>Blue</option>
							</select>
						</div>
					</div>
                     <?php } ?>
                    
					<div class="flex-r-m flex-w p-t-10">
						<div class="w-size16 flex-m flex-w">
							<div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
								<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
								</button>

								<input class="size8 m-text18 t-center num-product" type="number" name="num_product" value="1">

								<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
									<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
								</button>
							</div>

							<div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
								<!-- Button -->
                                <?php if(!empty($username)) { ?>
                                         <input type="hidden" name="user_id" value="<?php echo $user_id ?>" />
                                         <input type="hidden" name="item_name" value="<?php echo $item_name ?>" />
                                         <input type="hidden" name="product_id" value="<?php echo $item_id ?>"/>
                                         <input type="hidden" name="product_price" value="<?php echo $item_price ?>"/>
                                        <button name="add_to_cart2" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                            Add to Cart
                                        </button>
                                    <?php }else{?>
                                    <a href = "login.php" class="btn btn-primary">Pls login to add to cart</a>
                                <?php } ?>
							</div>
						</div>
					</div>
				</div>
                </form>


				<!--  -->
				<div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Description
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div class="dropdown-content dis-none p-t-15 p-b-23">
						<p class="s-text8">
							<?php echo $item_description; ?>
						</p>
					</div>
				</div>

				<div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
					<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
						Reviews ( <?php  
                                            $product_id = $item_id; 
                                            $post_comment_count_query = "SELECT * FROM comment WHERE product_id = '$product_id'";
                                            $post_comment_count_result = mysqli_query($connection, $post_comment_count_query);
                                            $comment_count = mysqli_num_rows($post_comment_count_result);    
                                            echo $comment_count;
                                        ?> )
                        
                        <?php 
                         if(isset($_POST['comments'])) {
                            $product_id = mysqli_real_escape_string($connection, $_POST['product_id']);
                            $username = mysqli_real_escape_string($connection, $_POST['username']);
                            $comment =  mysqli_real_escape_string($connection, $_POST['review']);

                            $query_post = "INSERT INTO comment (product_id, username, comment) VALUES ('$product_id', '$username', '$comment')";
                            if(mysqli_query($connection, $query_post)) {
                                print '<script type="text/javascript">alert("Review posted successfully");</script>';
                            } else {
                                print '<script type="text/javascript">alert("Error Posting Review");</script>';
                            }
                        }
                        
                        $product_id = $item_id; 
                        $product_comment_query = "SELECT * FROM comment WHERE product_id = '$product_id' ORDER BY id DESC LIMIT 0,20";
                        $product_comment_result = mysqli_query($connection, $product_comment_query);
                        ?>
						<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
						<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
					</h5>

					<div style="overflow: auto;"  class="dropdown-content dis-none p-t-15 p-b-23">
                        <?php while($comment_data = mysqli_fetch_array($product_comment_result)) {?>
                        
						<p style="padding: 10px;" class="s-text8">
							<?php echo $comment_data['comment']; ?> By <br/> <?php echo $comment_data['username']; ?> 
						</p>
                        <?php } ?>
                        <?php if(!empty($username)) { ?>
                        <form class="leave-comment" action="" method="POST">
                        <input  type="hidden" name="product_id" value="<?php echo $item_id; ?>">
                        <input  type="hidden" name="username" value="<?php echo $username; ?>">
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="review" placeholder="Drop a review" required>
						</div>
                        <div class="w-size25">
							<!-- Button -->
							<button name="comments" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
								Submit
							</button>
						</div>
                        </form>
                         <?php }else{?>
                            <a href = "login.php" class="btn btn-primary">Pls login to submit a review</a>
                        <?php } ?>
					</div>
				</div>
			</div>
		</div>
	</div>
    <?php include('includes/related_post.php');?>

<?php include('includes/footer.php')?>