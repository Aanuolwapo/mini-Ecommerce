<?php include('includes/header.php'); ?>


<!-- content page -->
	<section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
                <div class="col-md-2 p-b-30"></div>
				<div class="col-md-8 p-b-30">
					<form class="leave-comment" action="" method="POST">
						<h4 class="m-text26 p-b-36 p-t-15">
							Login
						</h4>
                        <div class="m-b-20">
							 <?php include('includes/error_message.php')?>
                             <?php include('includes/success_message.php')?>
						</div>
                       
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" name="details" placeholder="Email or Username" required>
						</div>
                        
                        <div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="password" name="password" placeholder="Password">
						</div>
                        
                        <p>Forget password? <a href="forget_password.php">Here!!</a></p><br/>
                        
						<div class="w-size25">
							<!-- Button -->
							<button name="login" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
								Login
							</button>
						</div>
					</form>
				</div>
                <div class="col-md-2 p-b-30"></div>
			</div>
		</div>
	</section>

<?php include('includes/footer.php'); ?>