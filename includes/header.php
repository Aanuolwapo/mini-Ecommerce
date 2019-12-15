<?php 

include('includes/session_process.php');

$error = "";
$message = "";
$size = "";
$color = "";

if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 10;
        $offset = ($pageno-1) * $no_of_records_per_page;
//================================================================================================================================================================================================================================================================================================

$ww_pages_sql = "SELECT COUNT(*) FROM store_product WHERE cat ='Wrist-Watches'";
        $ww_result = mysqli_query($connection,$ww_pages_sql);
        $ww_rows = mysqli_fetch_array($ww_result)[0];
        $ww_pages = ceil($ww_rows / $no_of_records_per_page);
    
    $ww_post_query = "SELECT * FROM store_product WHERE cat ='Wrist-Watches' ORDER BY id DESC LIMIT $offset, $no_of_records_per_page";
    $ww_post_result = mysqli_query($connection, $ww_post_query);


$ct_pages_sql = "SELECT COUNT(*) FROM store_product WHERE cat ='Clothes'";
        $ct_result = mysqli_query($connection,$ct_pages_sql);
        $ct_rows = mysqli_fetch_array($ct_result)[0];
        $ct_pages = ceil($ct_rows / $no_of_records_per_page);
    
    $ct_post_query = "SELECT * FROM store_product WHERE cat ='Clothes' ORDER BY id DESC LIMIT $offset, $no_of_records_per_page";
    $ct_post_result = mysqli_query($connection, $ct_post_query);


$bg_pages_sql = "SELECT COUNT(*) FROM store_product WHERE cat ='Bags'";
        $bg_result = mysqli_query($connection,$bg_pages_sql);
        $bg_rows = mysqli_fetch_array($bg_result)[0];
        $bg_pages = ceil($bg_rows / $no_of_records_per_page);
    
    $bg_post_query = "SELECT * FROM store_product WHERE cat ='Bags' ORDER BY id DESC LIMIT $offset, $no_of_records_per_page";
    $bg_post_result = mysqli_query($connection, $bg_post_query);


$sh_pages_sql = "SELECT COUNT(*) FROM store_product WHERE cat ='Shoes'";
        $sh_result = mysqli_query($connection,$sh_pages_sql);
        $sh_rows = mysqli_fetch_array($sh_result)[0];
        $sh_pages = ceil($sh_rows / $no_of_records_per_page);
    
    $sh_post_query = "SELECT * FROM store_product WHERE cat ='Shoes' ORDER BY id DESC LIMIT $offset, $no_of_records_per_page";
    $sh_post_result = mysqli_query($connection, $sh_post_query);


$bk_pages_sql = "SELECT COUNT(*) FROM store_product WHERE cat ='Books'";
        $bk_result = mysqli_query($connection,$bk_pages_sql);
        $bk_rows = mysqli_fetch_array($bk_result)[0];
        $bk_pages = ceil($bk_rows / $no_of_records_per_page);
    
    $bk_post_query = "SELECT * FROM store_product WHERE cat ='Books' ORDER BY id DESC LIMIT $offset, $no_of_records_per_page";
    $bk_post_result = mysqli_query($connection, $bk_post_query);


//================================================================================================================================================================================================================================================================================================
//Menu Function

$menu1_query = "SELECT * FROM store_cat";
$menu1_result = mysqli_query($connection, $menu1_query);

$menu2_query = "SELECT * FROM store_cat";
$menu2_result = mysqli_query($connection, $menu2_query);

$menu3_query = "SELECT * FROM store_cat";
$menu3_result = mysqli_query($connection, $menu3_query);

$menu4_query = "SELECT * FROM store_cat";
$menu4_result = mysqli_query($connection, $menu4_query);
    
$catmenu_query = "SELECT * FROM store_cat";
$catmenu_result = mysqli_query($connection, $catmenu_query);

//================================================================================================================================================================================================================================================================================================
//Product Function

$product_query = "SELECT * FROM store_product ORDER BY id DESC LIMIT 0, 30";
$product_result = mysqli_query($connection, $product_query);


//================================================================================================================================================================================================================================================================================================
//SEO Function

$seo_facebook_query = "SELECT * FROM seo WHERE social_media = 'Facebook'";
$seo_facebook_result = mysqli_query($connection, $seo_facebook_query);
$seo_facebook_data = mysqli_fetch_array($seo_facebook_result);
$facebook = $seo_facebook_data['social_media_link'];

$seo_instagram_query = "SELECT * FROM seo WHERE social_media = 'Instagram'";
$seo_instagram_result = mysqli_query($connection, $seo_instagram_query);
$seo_instagram_data = mysqli_fetch_array($seo_instagram_result);
$instagram = $seo_instagram_data['social_media_link'];

$seo_twitter_query = "SELECT * FROM seo WHERE social_media = 'Twitter'";
$seo_twitter_result = mysqli_query($connection, $seo_twitter_query);
$seo_twitter_data = mysqli_fetch_array($seo_twitter_result);
$twitter = $seo_twitter_data['social_media_link'];

$seo_youtube_query = "SELECT * FROM seo WHERE social_media = 'youtube'";
$seo_youtube_result = mysqli_query($connection, $seo_youtube_query);
$seo_youtube_data = mysqli_fetch_array($seo_youtube_result);
$youtube = $seo_youtube_data['social_media_link'];

$seo_email_query = "SELECT * FROM seo WHERE social_media = 'Email'";
$seo_email_result = mysqli_query($connection, $seo_email_query);
$seo_email_data = mysqli_fetch_array($seo_email_result);
$email = $seo_email_data['social_media_link'];

//================================================================================================================================================================================================================================================================================================
    //Registration Function
    if(isset($_POST['register'])) {
        $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $phone_number = mysqli_real_escape_string($connection, $_POST['phone_number']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        $email = mysqli_real_escape_string($connection, $_POST['email']);
        $password_retype = mysqli_real_escape_string($connection, $_POST['password_retype']);
    
        $query = "SELECT * FROM subscribers WHERE username = '$username' OR email = '$email'";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
        $count = mysqli_num_rows($result);
    
        if($count == 1) {
          $error = "Email or Username already used, try another details";
    
        } elseif($password != $password_retype) {
          $error = "Password Mismatch";
        }else{
            $reg_query = "INSERT INTO subscribers (firstname, lastname, phone_number, username, password, email) VALUES ('$firstname', '$lastname', '$phone_number', '$username', md5('$password'), '$email')";
             if(mysqli_query($connection, $reg_query)){
               $message = "Registration Successful. Proceed to Login";
             }else{
                 $error = "Registration Fail";
             }
            
        }
    }
    
    //Login Function
    
    if(isset($_POST['login'])) {
    
        $details = mysqli_real_escape_string($connection, $_POST['details']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
    
        $query = "SELECT id FROM subscribers WHERE username = '$details' OR email = '$details' AND password = md5('$password')";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
        $count = mysqli_num_rows($result);
    
        if($count == 1) {
            $_SESSION['username'] = $details;
            $_SESSION['email'] = $details;
        
            header("location: index.php");
        } else {
           print '<script type="text/javascript">alert("Incorrect Login Details");</script>';
        }
    }
    
    if(isset($_POST['update_password'])) {
    
        $username = mysqli_real_escape_string($connection, $_POST['username']);
        $password = mysqli_real_escape_string($connection, $_POST['password']);
        $password1 = mysqli_real_escape_string($connection, $_POST['password1']);
    
       if($password != $password1) {
           print '<script type="text/javascript">alert("Password Mismatch");</script>';
        }else{
            $update_query = "UPDATE subscribers SET password = md5('$password') WHERE username = '$username'";
             if(mysqli_query($connection, $update_query)){
                print '<script type="text/javascript">alert("Password Changes Saved");</script>';
             }else{
                 $error = "Fail to save changes";
             }
            
        }
    }
    
    if(isset($_POST['forget_password'])) {
        $details = mysqli_real_escape_string($connection, $_POST['details']);
    
        $query = "SELECT * FROM subscribers WHERE email = '$details' OR username = '$details'";
        $query_reset = mysqli_query($connection, $query);
        $count = mysqli_num_rows($query_reset);
        	if($count == 1) {
                while($row = mysqli_fetch_array($query_reset)) {
                    $email = $row['email'];
                    $username = $row['username'];
                    $email_reset = md5($row['email']);
                    $username_reset = md5($row['username']);
                    $fullname = $row['username'];
                
                $link = "https://presagestore.com.ng/reset_password.php?key=".$email_reset."&reset=".$username_reset;
                $name       = "Presage Online Store"; 
                $from       = "support@presagestore.com.ng"; 
                $subject    = "Presage Reset Password"; 
                $compose_message    = $username;
                $compose_message_line = "if this is not from you, kindly ignore.";
                $message = "<!doctype html>
                                <html>
                                  <head>
                                    <meta name='viewport' content='width=device-width'>
                                    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
                                    <title>Email from our website</title>
                                    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css' integrity='sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy' crossorigin='anonymous'>
                                    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
                                    <style>
                                    @media only screen and (max-width: 620px) {
                                      table[class=body] h1 {
                                        font-size: 28px !important;
                                        margin-bottom: 10px !important;
                                      }
                                      table[class=body] p,
                                            table[class=body] ul,
                                            table[class=body] ol,
                                            table[class=body] td,
                                            table[class=body] span,
                                            table[class=body] a {
                                        font-size: 16px !important;
                                      }
                                      table[class=body] .wrapper,
                                            table[class=body] .article {
                                        padding: 10px !important;
                                      }
                                      table[class=body] .content {
                                        padding: 0 !important;
                                      }
                                      table[class=body] .container {
                                        padding: 0 !important;
                                        width: 100% !important;
                                      }
                                      table[class=body] .main {
                                        border-left-width: 0 !important;
                                        border-radius: 0 !important;
                                        border-right-width: 0 !important;
                                      }
                                      table[class=body] .btn table {
                                        width: 100% !important;
                                      }
                                      table[class=body] .btn a {
                                        width: 100% !important;
                                      }
                                      table[class=body] .img-responsive {
                                        height: auto !important;
                                        max-width: 100% !important;
                                        width: auto !important;
                                      }
                                    }
                                    /* -------------------------------------
                                        PRESERVE THESE STYLES IN THE HEAD
                                    ------------------------------------- */
                                    @media all {';

                                    $message.=' .ExternalClass {
                                        width: 100%;
                                      }
                                      .ExternalClass,
                                            .ExternalClass p,
                                            .ExternalClass span,
                                            .ExternalClass font,
                                            .ExternalClass td,
                                            .ExternalClass div {
                                        line-height: 100%;
                                      }
                                      .apple-link a {
                                        color: inherit !important;
                                        font-family: inherit !important;
                                        font-size: inherit !important;
                                        font-weight: inherit !important;
                                        line-height: inherit !important;
                                        text-decoration: none !important;
                                      }
                                      .btn-primary table td:hover {
                                        background-color: #34495e !important;
                                      }
                                      .btn-primary a:hover {
                                        background-color: #34495e !important;
                                        border-color: #34495e !important;
                                      }
                                    }
                                    </style>
                                  </head>
                                  <body class='' style='background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;'>
                                    <table border='0' cellpadding='0' cellspacing='0' class='body' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;'>
                                      <tr>
                                        <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;'>&nbsp;</td>
                                        <td class='container' style='font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;'>
                                          <div class='content' style='box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;'>

                                            <!-- START CENTERED WHITE CONTAINER -->
                                            <table class='main' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;'>

                                              <!-- START MAIN CONTENT AREA -->
                                              <tr>
                                                <td class='wrapper' style='font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;'>
                                                  <table border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;'>
                                                    <tr>
                                                      <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;'>
                                                          <p style='text-align: center; margin-bottom: 20px;'><img style='width: 100%; height: 100%;' src='https://presagestore.com.ng/ban.jpg' />  </p>                        <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;'>Hi there,</p>
                                                        <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;'> "; $message.= $compose_message. "<br/> <br /> Click the link to reset password. <br/> if this is not from you, kindly ignore   <br/>" .  $link;  $message.=" </p>
                                                        <table border='0' cellpadding='0' cellspacing='0' class='btn btn-primary' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; box-sizing: border-box;'>
                                                        </table>
                                                        <p style='text-align: right; font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;'>Thank You<br>Presage</p>
                                                        <p style='text-align: right; font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;'><img src='https://presagestore.com.ng/favicon-32x32.png' />  </p>
                                                      </td>
                                                    </tr>
                                                  </table>
                                                </td>
                                              </tr>

                                            <!-- END MAIN CONTENT AREA -->
                                            </table>

                                            <!-- START FOOTER -->
                                            <div class='footer' style='clear: both; Margin-top: 10px; text-align: center; width: 100%;'>
                                              <table border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;'>
                                                <tr>
                                                  <td class='content-block powered-by' style='font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;'>
                                                  </td>
                                                </tr>
                                              </table>
                                            </div>
                                            <!-- END FOOTER -->

                                          <!-- END CENTERED WHITE CONTAINER -->
                                          </div>
                                        </td>
                                        <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;'>&nbsp;</td>
                                      </tr>
                                    </table>
                                  </body>
                                  <script src='https://code.jquery.com/jquery-3.2.1.slim.min.js' integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'></script>
                                <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js' integrity='sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q' crossorigin='anonymous'></script>
                                <script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js' integrity='sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4' crossorigin='anonymous'></script>
                                </html>";
            
            $to   		= $email;//replace with your email
                
            $headers   = "";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=UTF-8\r\n";
            $headers .= "From: {$name} <{$from}>\r\n";
            $headers .= "Reply-To: <{$from}>\r\n";
            $headers .= "Subject: {$subject}\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
    
          }
		  
			   mail($to, $subject, $message, $headers);
			  $message = "Password reset link has been sent to your email.";
			} else {
				$error = "The details supplied is Invalid";
			}

}

if(isset($_POST['newsletter'])) {

    $email = mysqli_real_escape_string($connection, $_POST['email']);

    $query = "SELECT * FROM newsletter WHERE email = '$email'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);

    if($count == 1) {
       print '<script type="text/javascript">alert("You have already registered for our newsletter");</script>';
    }else{
        $reg_query = "INSERT INTO newsletter (email) VALUES ('$email')";
         if(mysqli_query($connection, $reg_query)){
            print '<script type="text/javascript">alert("Registration successfully");</script>';
         }else{
             $error = "Registration Fail";
         }
        
    }
}
//================================================================================================================================================================================================================================================================================================
//Shopping Cart Function
if(isset($_POST['add_to_cart2'])) {

    $user_id = mysqli_real_escape_string($connection, $_POST['user_id']);
    $product_id = mysqli_real_escape_string($connection, $_POST['product_id']);
    $product_price = mysqli_real_escape_string($connection, $_POST['product_price']);
    $item_name = mysqli_real_escape_string($connection, $_POST['item_name']);
    $size = mysqli_real_escape_string($connection, $_POST['size']);
    $color = mysqli_real_escape_string($connection, $_POST['color']);
    $num_product = mysqli_real_escape_string($connection, $_POST['num_product']);

    $query = "SELECT * FROM cart WHERE product_id = '$product_id'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);

    if($count == 1) {
       print '<script type="text/javascript">alert("This product have been added to your cart before, pls proceed to check out");</script>';
    }else{
        
        $reg_query = "INSERT INTO cart (user_id, product_id, product_price, product_name, item_quantity, size, color, status) VALUES ('$user_id', '$product_id', '$product_price', '$item_name', '$num_product', '$size', '$color', pending)";
         if(mysqli_query($connection, $reg_query)){
             print '<script type="text/javascript">alert("Item added to cart successfully");</script>';
         }else{
            print '<script type="text/javascript">alert("Item failed to add to cart");</script>';
         }
        
    }
}

if(isset($_POST['add_to_cart'])) {

    $user_id = mysqli_real_escape_string($connection, $_POST['user_id']);
    $product_id = mysqli_real_escape_string($connection, $_POST['product_id']);
    $product_price = mysqli_real_escape_string($connection, $_POST['product_price']);
    $product_name = mysqli_real_escape_string($connection, $_POST['product_name']);
   

    $query = "SELECT * FROM cart WHERE product_id = '$product_id'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $count = mysqli_num_rows($result);

    if($count == 1) {
       print '<script type="text/javascript">alert("This product have been added to your cart before, pls proceed to check out");</script>';
    }else{
        
        $reg_query = "INSERT INTO cart (user_id, product_id, product_price, product_name, item_quantity, size, status) VALUES ('$user_id', '$product_id', '$product_price', '$product_name', '1', 'size M', 'pending')";
         if(mysqli_query($connection, $reg_query)){
            
         }else{
            print '<script type="text/javascript">alert("Item failed to add to cart");</script>';
         }
        
    }
}

if(isset($_POST['delete_cart'])) {

    $id = mysqli_real_escape_string($connection, $_POST['id']);
        
        $del_cart = "DELETE FROM cart WHERE id = '$id'";
         if(mysqli_query($connection, $del_cart)){
            print '<script type="text/javascript">alert("Item deleted from cart");</script>'; 
         }else{
            print '<script type="text/javascript">alert("Item failed to delete from cart");</script>';
         }
        
    }

//==================================================================================================================================================================================================================================================================================================================================================================================================================================================================================================================================================================================================
//Cart Math Funtion

if(!empty($username)) { 

$count_cart_user_query = "SELECT * FROM cart WHERE user_id = '$user_id' AND status = 'pending'";
$count_cart_user_result = mysqli_query($connection, $count_cart_user_query);
$count_cart = mysqli_num_rows($count_cart_user_result);

$cartmenu_query = "SELECT * FROM cart WHERE user_id = '$user_id' AND status = 'pending'";
$cartmenu_result = mysqli_query($connection, $cartmenu_query);

$cartmenu1_query = "SELECT * FROM cart WHERE user_id = '$user_id' AND status = 'pending'";
$cartmenu1_result = mysqli_query($connection, $cartmenu1_query);

$cartmenu2_query = "SELECT * FROM cart WHERE user_id = '$user_id' AND status = 'pending'";
$cartmenu2_result = mysqli_query($connection, $cartmenu2_query);

//Main Cart Function and Payout using Ravepay Api
$cartmain_query = "SELECT * FROM cart WHERE user_id = '$user_id' AND status = 'pending'";
$cartmain_result = mysqli_query($connection, $cartmain_query);

}

//===============================================================================================================================================
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Presage Stores</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">

	<!-- header fixed -->
	<div class="wrap_header fixed-header2 trans-0-4">
		<!-- Logo -->
		<a href="index.php" class="logo">
			<img src="images/icons/logo.png" alt="IMG-LOGO">
		</a>

		<!-- Menu -->
		<div class="wrap_menu">
			<nav class="menu">
				<ul class="main_menu">
					<li>
						<a href="index.php">Home</a>
					</li>

					<?php while($menu1_data = mysqli_fetch_array($menu1_result)) { ?>
                            <li>
								<a href="<?php echo $menu1_data['store_cat']; ?>.php"><?php echo $menu1_data['store_cat']; ?></a>
							</li>
				    <?php } ?>

					<li>
						<a href="contact.html">Contact</a>
					</li>
				</ul>
			</nav>
		</div>

		<!-- Header Icon -->
		<div class="header-icons">
            <?php if(!empty($username)) { ?>
			<a href="profile.php" class="header-wrapicon1 dis-block">
				<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
                <span><?php echo $username; ?></span>
			</a>
            
            <span class="linedivide1"></span>
            
            <a href="logout.php" class="header-wrapicon1 dis-block">
				<i class="fa fa-sign-out fa-2x"></i>
			</a>
            
            <span class="linedivide1"></span>

			<div class="header-wrapicon2">
				<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
				<span class="header-icons-noti"><?php echo $count_cart; ?></span>

				<!-- Header cart noti -->
                 <div class="header-cart header-dropdown">
					<ul class="header-cart-wrapitem">
                <?php while ($cartmenu1_data = mysqli_fetch_array($cartmenu1_result)) {?>
                <li class="header-cart-item">
                    <div class="header-cart-item-img">
                        <?php 
                            $product_id = $cartmenu1_data['product_id'];
                            $cart1_product_query = "SELECT * FROM store_product WHERE id = '$product_id'";
                            $cart1_product_result = mysqli_query($connection, $cart1_product_query);
                            $cart1_product_data = mysqli_fetch_array($cart1_product_result);
                        ?>
                        <img src="<?php echo $cart1_product_data['product_image_1']?>" alt="IMG">
                    </div>

                    <div class="header-cart-item-txt">
                        <a href="#" class="header-cart-item-name">
                            <?php echo $cartmenu1_data['product_name']?>
                        </a>

                        <span class="header-cart-item-info">
                            <?php echo $cartmenu1_data['item_quantity']?> x <?php echo $cartmenu1_data['product_price']?> = #<?php 
                            $product_total_price1 = $cartmenu1_data['item_quantity'] * $cartmenu1_data['product_price'];
    
                             $prices1[] = $product_total_price1;
                             $total_price1 = array_sum($prices1);
                            echo $product_total_price1;
                            ?>
                        </span>
                    </div>
                </li>
                <?php } ?>
                </ul>
                
                <div class="header-cart-total">
						Total: #<?php echo $total_price1; ?>
					</div>

					<div class="header-cart-buttons">
						<div class="header-cart-wrapbtn">
							<!-- Button -->
							<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
								View Cart
							</a>
						</div>

						<div class="header-cart-wrapbtn">
							<!-- Button -->
							<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
								Check Out
							</a>
						</div>
					</div>
                <?php }else{ ?>
                    <a href="login.php" class="header-wrapicon1 dis-block">
                        <img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
                        <span>Login</span>
                    </a>

                    <span class="linedivide1"></span>

                    <a href="register.php" class="header-wrapicon1 dis-block">
                        <img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
                        <span>Register</span>
                    </a>
                <?php } ?>
				</div>
				</div>
				</div>
			</div>
	<!-- top noti -->
	<div class="flex-c-m size22 bg0 s-text21 pos-relative">
		20% off everything!
		<a href="product.html" class="s-text22 hov6 p-l-5">
			Shop Now
		</a>

		<button class="flex-c-m pos2 size23 colorwhite eff3 trans-0-4 btn-romove-top-noti">
			<i class="fa fa-remove fs-13" aria-hidden="true"></i>
		</button>
	</div>

	<!-- Header -->
	<header class="header2">
		<!-- Header desktop -->
		<div class="container-menu-header-v2 p-t-26">
			<div class="topbar2">
				<div class="topbar-social">
					<a href="<?php echo $facebook; ?>" class="topbar-social-item fa fa-facebook"></a>
					<a href="<?php echo $instagram; ?>" class="topbar-social-item fa fa-instagram"></a>
					<a href="<?php echo $twitter; ?>" class="topbar-social-item fa fa-twitter"></a>
					<a href="<?php echo $youtube; ?>" class="topbar-social-item fa fa-youtube-play"></a>
					<a href="<?php echo $email; ?>" class="topbar-social-item fa fa-envelope"></a>
				</div>

				<!-- Logo2 -->
				<a href="index.php" class="logo2">
					<img src="images/icons/logo.png" alt="IMG-LOGO">
				</a>

				<div class="topbar-child2">

					<!--  -->
					<?php if(!empty($username)) { ?>
                        <a href="profile.php" class="header-wrapicon1 dis-block">
                            <img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
                            <span><?php echo $username; ?></span>
                        </a>
                    
                    <span class="linedivide1"></span>
                    <a href="logout.php" class="header-wrapicon1 dis-block">
                        <i class="fa fa-sign-out fa-2x"></i>
                    </a>

                    <span class="linedivide1"></span>

					<div class="header-wrapicon2 m-r-13">
						<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti"><?php echo $count_cart; ?></span>

						<!-- Header cart noti -->
                        <div class="header-cart header-dropdown">
					<ul class="header-cart-wrapitem">
                        <?php while ($cartmenu_data = mysqli_fetch_array($cartmenu_result)) {?>
						<li class="header-cart-item">
							<div class="header-cart-item-img">
                                <?php 
                                    $product_id = $cartmenu_data['product_id'];
                                    $cart_product_query = "SELECT * FROM store_product WHERE id = '$product_id'";
                                    $cart_product_result = mysqli_query($connection, $cart_product_query);
                                    $cart_product_data = mysqli_fetch_array($cart_product_result);
                                ?>
								<img src="<?php echo $cart_product_data['product_image_1']?>" alt="IMG">
							</div>

							<div class="header-cart-item-txt">
								<a href="#" class="header-cart-item-name">
									<?php echo $cartmenu_data['product_name']?>
								</a>

								<span class="header-cart-item-info">
									<?php echo $cartmenu_data['item_quantity']?> x <?php echo $cartmenu_data['product_price']?> = #<?php 
                                    $product_total_price = $cartmenu_data['item_quantity'] * $cartmenu_data['product_price'];
    
                                     $prices[] = $product_total_price;
                                     $total_price = array_sum($prices);
                                    echo $product_total_price;
                                    ?>
								</span>
							</div>
						</li>
                        <?php } ?>
					</ul>

					<div class="header-cart-total">
						Total: #<?php echo $total_price; ?>
					</div>

					<div class="header-cart-buttons">
						<div class="header-cart-wrapbtn">
							<!-- Button -->
							<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
								View Cart
							</a>
						</div>

						<div class="header-cart-wrapbtn">
							<!-- Button -->
							<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
								Check Out
							</a>
						</div>
					</div>
                        <?php }else{ ?>
                        <a href="login.php" class="header-wrapicon1 dis-block">
                            <img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
                            <span>Login</span>
                        </a>

                        <span class="linedivide1"></span>

                        <a href="register.php" class="header-wrapicon1 dis-block">
                            <img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
                            <span>Register</span>
                        </a>
                        <?php } ?>

				</div>
					</div>
				</div>
			</div>

			<div class="wrap_header">

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li>
								<a href="index.php">Home</a>
							</li>
                            <?php while($menu2_data = mysqli_fetch_array($menu2_result)) { ?>
                            <li>
								<a href="<?php echo $menu2_data['store_cat']; ?>.php"><?php echo $menu2_data['store_cat']; ?></a>
							</li>
							<?php } ?>
							<li>
								<a href="contact.php">Contact</a>
							</li>
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">

				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="index.php" class="logo-mobile">
				<img src="images/icons/logo.png" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					<?php if(!empty($username)) { ?>
                        <a href="profile.php" class="header-wrapicon1 dis-block">
                            <img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
                            <span><?php echo $username; ?></span>
                        </a>
                    <span class="linedivide2"></span>
                    
                     <a href="logout.php" class="header-wrapicon1 dis-block">
                        <i class="fa fa-sign-out fa-2x"></i>
                    </a>

                    <span class="linedivide1"></span>

					<div class="header-wrapicon2">
						<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti"><?php echo $count_cart; ?></span>

						<!-- Header cart noti -->
                         <div class="header-cart header-dropdown">
					<ul class="header-cart-wrapitem">
						<?php while ($cartmenu2_data = mysqli_fetch_array($cartmenu2_result)) {?>
						<li class="header-cart-item">
							<div class="header-cart-item-img">
                                <?php 
                                    $product_id = $cartmenu2_data['product_id'];
                                    $cart2_product_query = "SELECT * FROM store_product WHERE id = '$product_id'";
                                    $cart2_product_result = mysqli_query($connection, $cart2_product_query);
                                    $cart2_product_data = mysqli_fetch_array($cart2_product_result);
                                ?>
								<img src="<?php echo $cart2_product_data['product_image_1']?>" alt="IMG">
							</div>

							<div class="header-cart-item-txt">
								<a href="#" class="header-cart-item-name">
									<?php echo $cartmenu2_data['product_name']?>
								</a>

								<span class="header-cart-item-info">
									<?php echo $cartmenu2_data['item_quantity']?> x <?php echo $cartmenu2_data['product_price']?> = #<?php 
                                    $product_total_price2 = $cartmenu2_data['item_quantity'] * $cartmenu2_data['product_price'];
                                    
                                        $prices2[] = $product_total_price2;
                                        $total_price2 = array_sum($prices2);
                                    echo $product_total_price2;
                                    ?>
								</span>
							</div>
						</li>
                        <?php } ?>
                    </ul>
                    <div class="header-cart-total">
						Total: #<?php echo $total_price2; ?>
					</div>

					<div class="header-cart-buttons">
						<div class="header-cart-wrapbtn">
							<!-- Button -->
							<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
								View Cart
							</a>
						</div>

						<div class="header-cart-wrapbtn">
							<!-- Button -->
							<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
								Check Out
							</a>
						</div>
					</div>
                        <?php }else{ ?>
                        <a href="login.php" class="header-wrapicon1 dis-block">
                            <img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
                            <span>Login</span>
                        </a>

                        <span class="linedivide1"></span>

                        <a href="register.php" class="header-wrapicon1 dis-block">
                            <img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
                            <span>Register</span>
                        </a>
                        <?php } ?>

				</div>         
					</div>
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">

					<li class="item-topbar-mobile p-l-10">
						<div class="topbar-social-mobile">
							<a href="#" class="topbar-social-item fa fa-facebook"></a>
							<a href="#" class="topbar-social-item fa fa-instagram"></a>
							<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
							<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
							<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
						</div>
					</li>

					<li class="item-menu-mobile">
						<a href="index.php">Home</a>
						<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
					</li>
                        <?php while($menu3_data = mysqli_fetch_array($menu3_result)) { ?>
                                <li class="item-menu-mobile">
                                    <a href="<?php echo $menu3_data['store_cat']; ?>.php"><?php echo $menu3_data['store_cat']; ?></a>
                                </li>
                       <?php } ?>
					<li class="item-menu-mobile">
						<a href="contact.html">Contact</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>
