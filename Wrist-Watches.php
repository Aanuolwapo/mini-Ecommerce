<?php include('includes/header.php')?>
<!-- Title Page -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(images/heading-pages-02.jpg);">
		<h2 class="l-text2 t-center">
			Wrist-Watches
		</h2>
		<p class="m-text13 t-center">
			New Arrivals Wrist-Watches Collection <script>document.write(new Date().getFullYear())</script>
		</p>
	</section>

	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							Categories
						</h4>
						<?php  include('includes/cat_menu.php')?>
					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<!-- Product -->
					<div class="row">
                        <?php while($ww_post_data = mysqli_fetch_array($ww_post_result)) { ?>
                        
						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-img wrap-pic-w of-hidden pos-relative">
									<img src="<?php echo $ww_post_data['product_image_1'] ?>" alt="IMG-PRODUCT">

									<div class="block2-overlay trans-0-4">

										<div class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button -->
											<?php if(!empty($username)) { ?>
                                                <form action="" method="POST">
                                                     <input type="hidden" name="user_id" value="<?php echo $user_id ?>" />
                                                      <input type="hidden" name="product_name" value="<?php echo $ww_post_data['product_name']; ?>" />
                                                     <input type="hidden" name="product_id" value="<?php echo $ww_post_data['id']; ?>"/>
                                                     <input type="hidden" name="product_price" value="<?php echo $ww_post_data['product_price']; ?>"/>
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
									<a href="product-detail.php?product_id=<?php echo $ww_post_data['id']; ?>" class="block2-name dis-block s-text3 p-b-5">
										<?php echo $ww_post_data['product_name']; ?>
									</a>

									<span class="block2-price m-text6 p-r-5">
										#<?php echo $ww_post_data['product_price']; ?>
									</span>
								</div>
							</div>
						</div>
                        <?php } ?>
					</div>

					<!-- Pagination -->
					<div class="pagination flex-m flex-w p-t-26">
						<a href="?pageno=1" class="item-pagination flex-c-m trans-0-4">1</a>
						<a href="?pageno=2" class="item-pagination flex-c-m trans-0-4">2</a>
                        <a href="?pageno=3" class="item-pagination flex-c-m trans-0-4">3</a>
                        <a href="?pageno=4" class="item-pagination flex-c-m trans-0-4">4</a>
                        <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="item-pagination flex-c-m trans-0-4">Prev</a>
                        <a href="<?php if($pageno >= $ww_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>" class="item-pagination flex-c-m trans-0-4">Next</a>
                        <a href="?pageno=<?php echo $ww_pages; ?>" class="item-pagination flex-c-m trans-0-4">Last</a> 
					</div>
				</div>
			</div>
		</div>
	</section>

<?php include('includes/footer.php')?>