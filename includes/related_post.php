<!-- Relate Product -->
    <?php 
        
        $related_post_query = "SELECT * FROM store_product WHERE cat = '$item_cat' ORDER BY id DESC LIMIT 0, 8";
        $related_post_result = mysqli_query($connection, $related_post_query);



    ?>
	<section class="relateproduct bgwhite p-t-45 p-b-138">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Related Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
                    <?php while($related_post_data = mysqli_fetch_array($related_post_result)) {?>
					<div class="item-slick2 p-l-15 p-r-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
								<img src="<?php echo $related_post_data['product_image_2']; ?>" alt="IMG-PRODUCT">

								<div class="block2-overlay trans-0-4"> 

									<div class="block2-btn-addcart w-size1 trans-0-4">
										<!-- Button -->
										<?php if(!empty($username)) { ?>
                                            <form action="" method="POST">
                                                 <input type="hidden" name="user_id" value="<?php echo $user_id; ?>" />
                                                 <input type="hidden" name="product_name" value="<?php echo $related_post_data['product_name']; ?>" />
                                                 <input type="hidden" name="product_id" value="<?php echo $related_post_data['id']; ?>"/>
                                                 <input type="hidden" name="product_price" value="<?php echo $related_post_data['product_price']; ?>"/>
                                                <button name="add_to_cart" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                                    Add to Cart
                                                </button>
                                            </form>
                                            <?php }else{?>
                                            <a href = "login.php" class="btn btn-primary">Pls login to add to cart</a>
                                        <?php } ?>
									</div>
								</div>
							</div>

							<div class="block2-txt p-t-20">
								<a href="product-detail.php?product_id=<?php echo $related_post_data['id']; ?>" class="block2-name dis-block s-text3 p-b-5">
									<?php echo $related_post_data['product_name']; ?>
								</a>

								<span class="block2-price m-text6 p-r-5">
									#<?php echo $related_post_data['product_price']; ?>
								</span>
							</div>
						</div>
					</div>
                    <?php } ?>
                    
				</div>
			</div>
            </div>
	</section>
