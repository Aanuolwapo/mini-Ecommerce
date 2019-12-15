<?php include('includes/header.php');?>
	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/heading-pages-01.jpg);">
		<h2 class="l-text2 t-center">
			Cart
		</h2>
	</section>
	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1"></th>
							<th class="column-2">Product</th>
							<th class="column-3">Price</th>
							<th class="column-4 p-l-70">Quantity</th>
							<th class="column-5">Total</th>
                            <th class="column-6">Action</th>
						</tr>
                        <?php while($cartmain_data = mysqli_fetch_array($cartmain_result)) {
                         
                            $product_id = $cartmain_data['product_id'];
                            $cartmain_product_query = "SELECT * FROM store_product WHERE id = '$product_id'";
                            $cartmain_product_result = mysqli_query($connection, $cartmain_product_query);
                            $cartmain_product_data = mysqli_fetch_array($cartmain_product_result);
                        ?>
						<tr class="table-row">
							<td class="column-1">
								<div class="cart-img-product b-rad-4 o-f-hidden">
									<img src="<?php echo $cartmain_product_data['product_image_1']; ?>" alt="IMG-PRODUCT">
								</div>
							</td>
							<td class="column-2"><?php echo $cartmain_data['product_name']; ?></td>
							<td class="column-3">#<?php echo $cartmain_data['product_price']; ?></td>
							<td class="column-5"><?php echo $cartmain_data['item_quantity']; ?></td>
							<td class="column-4">#
                            <?php 
                            $productmain_total_price = $cartmain_data['item_quantity'] * $cartmain_data['product_price'];
                              $pricesmain[] = $productmain_total_price;
                             $total_mainprice = array_sum($pricesmain);
                            
                             $grandtotal = $total_mainprice;
                            $maincart_product_names[] = $cartmain_data['product_name'];
                            echo $productmain_total_price;
                            ?>
                            </td>
                            <td style="border-left: 1px solid gray; padding: 10px;" class="column-4">
                                <form action="" method="POST"><input type="hidden" name="id" value="<?php echo $cartmain_data['id']; ?>"/>
                                    <button name="delete_cart" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
                                       Delete
                                    </button> 
                                </form>
                            </td>
						</tr>
                        <?php } ?>
            
					</table>
				</div>
			</div> 

			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
				<div class="flex-w flex-m w-full-sm">
					<div class="size11 bo4 m-r-10">
						<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="coupon-code" placeholder="Coupon Code">
					</div>

					<div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
						<!-- Button -->
						<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
							Apply coupon
						</button>
					</div>
				</div>
			</div>

			<!-- Total -->
			<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h5 class="m-text20 p-b-24">
					Cart Totals
				</h5>
            <?php
                
                date_default_timezone_get('West-Africa/Lagos'); $date = date('m/d/Y h:i:s a', time());
                
                //notice incase of adding shipping fee---- just add it to grandtotal
                
                
                 $pb_key = "FLWPUBK-13ac0b6f59c8fb7c30970f1c6b1ab0b3-X"; 
                 $customer_id = $user_id;
                 $amount_in_naira =1; // $grandtotal; 
                 $customer_email = $user_email;
                 $customer_firstname = $user_firstname; 
                 $customer_lastname = $user_lastname; 
                 $txref = 'presagestore/'.$date.'-'.substr(md5($user_email), 0, 8);
                 $pmethod = "both"; 
                 $seckey = "FLWSECK-1ef65306ac472ed62bb8c8e71648e845-X"; 
                 $country = "NG"; 
                 $currency = "NGN"; 
                 $custom_description = "Payment for products"; 
                 $custom_logo = "https://personalresume/favicon-32x32.png"; 
                 $custom_title = "Presage Store Payment"; 
                 $customer_phone = $user_mobile;
                 $customer_products = implode(', ', $maincart_product_names);

                 $options = array( 
                 "PBFPubKey" => $pb_key,
                 "customer_id" => $customer_id,
                 "customer_products" => $customer_products,
                 "customer_email" => $customer_email, 
                 "customer_firstname" => $customer_firstname, 
                 "customer_lastname" => $customer_lastname, 
                 "amount" => $amount_in_naira, 
                 "txref" => $txref, 
                 "payment_method" => $pmethod, 
                 "customer_phone" => $customer_phone, 
                 "country" => $country, 
                 "currency" => $currency, 
                 "custom_description" => $custom_description, 
                 "custom_logo" => $custom_logo, 
                 "custom_title" => $custom_title
                 );

                 ksort($options);

                 $hashedPayload = '';
                 foreach($options as $key => $value){
                 $hashedPayload .= $value;
                 }
                 $completeHash = $hashedPayload.$seckey;

                 $hash = hash('sha256', $completeHash);

                    
            ?>

     
				<!--  -->
                <div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Products:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
                        <?php echo implode(', ', $maincart_product_names)?>
					</span>
				</div>
                
				<div class="flex-w flex-sb-m bo10 p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Subtotal:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
                        <?php 
                        
                          echo '#'.$total_mainprice;
                        ?>
					</span>
				</div>

                
				<!--  -->
				<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
					<span class="s-text18 w-size19 w-full-sm">
						Shipping:
					</span>

					<div class="w-size20 w-full-sm">
						<p class="s-text8 p-b-23">
							We are running free shipping at this moment
						</p>

						<span class="s-text19">
							Shipping Address
						</span>

						<div class="size13 bo4 m-b-12">
						  <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="state" placeholder="State" required>
						</div>
                        
                        <div class="size13 bo4 m-b-12">
						<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="city" placeholder="City" required>
						</div>

						<div class="size13 bo4 m-b-22">
							<input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="postcode" placeholder="Postcode / Zip" required>
						</div>
                        
                        <div class="size13 bo4 m-b-12">
						  <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="address" placeholder="Address" required>
						</div>
					</div>
				</div>

				<!--  -->
				<div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						 <?php 
                          echo '#'.$grandtotal;
                        ?>
					</span>
				</div>

				<div class="size15 trans-0-4">
					<!-- Button -->
					<button id="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Proceed to Checkout
					</button>
				</div>
    
			</div>
		</div>
	</section>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script type="text/javascript" src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
    <script>

         document.addEventListener("DOMContentLoaded", function(event) {

             const paybutton = document.getElementById("submit");

             paybutton.addEventListener("click", function(e) {

                 getpaidSetup({
                    PBFPubKey: "<?php echo $pb_key; ?>",
                    amount: "<?php echo $amount_in_naira; ?>",
                    country: "<?php echo $country; ?>",
                    currency: "<?php echo $currency; ?>",
                    custom_description: "<?php echo $custom_description; ?>",
                    custom_logo: "<?php echo $custom_logo; ?>",
                    custom_title: "<?php echo $custom_title; ?>",
                    customer_id: "<?php echo $customer_id; ?>",
                    customer_products: "<?php echo $customer_products; ?>",
                    customer_email: "<?php echo $customer_email; ?>",
                    customer_firstname: "<?php echo $customer_firstname; ?>",
                    customer_lastname: "<?php echo $customer_lastname; ?>",
                    customer_phone: "<?php echo $customer_phone; ?>",
                    payment_method: "<?php echo $pmethod; ?>",
                    txref: "<?php echo $txref; ?>",
                    integrity_hash: "<?php echo $hash; ?>",
                    onclose: function() {},
                        callback: function(response) {
                            var flw_ref = response.tx.flwRef; // collect flwRef returned and pass to a  server page to complete status check.
                                console.log("This is the response returned after a charge", response);
                            if (response.tx.chargeResponseCode == "00" || response.tx.chargeResponseCode == "0") {
                                // redirect success page
                                axios.post('update.php').then((res)=>{
                                    console.log(res);
                                    window.location = "cart.php";
                                }).catch((error) =>{
                                    console.log(error.data);
                                 swal("Error!", "Payment update was not successful, please contact support", "error")
                                 .then((value) => {
                                 window.location = "index.php";
                                 });
                                });
                            } else {
                            window.location = "register.php";
                            }
                        }
                 });
             });
         });
     </script>

<?php include('includes/footer.php')?>