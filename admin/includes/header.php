<?php 
include("./session.php");

$error = '';
$message = '';

if (!isset($_GET['id'])) {
    $query = "SELECT * FROM admin WHERE username = '".$login_session."'";
} else {
    $query = "SELECT * FROM admin WHERE username = '". $_GET['username']."'";
}


$data = mysqli_query($connection, $query);


if (mysqli_num_rows($data) == 1) {
    $row = mysqli_fetch_array($data); 
    $id = $row['id'];
    $username = $row['username'];
    $email = $row['email'];
    $facebook = $row['facebook'];
    $twitter = $row['twitter'];
    $fullname = $row['fullname'];
    $description = $row['description'];
    $rank = $row['rank'];
    $image = $row['image'];
    $in_at = $row['in_at'];
    $out_at = $row['out_at'];
    $created_at = $row['created_at'];


$admin_query = "SELECT * FROM admin";
$admin_count_result = mysqli_query($connection, $admin_query);
$admin_count = mysqli_num_rows($admin_count_result);
    
$admin_data_query = "SELECT * FROM admin";
$admin_data_result = mysqli_query($connection, $admin_data_query);
    
$subcount_query = "SELECT * FROM subscribers";
$subcount_result = mysqli_query($connection, $subcount_query);
$subcount = mysqli_num_rows($subcount_result);
    
$sub_data_query = "SELECT * FROM subscribers";
$subscriber_data_result = mysqli_query($connection, $sub_data_query);

$adminmail_data_query = "SELECT * FROM admin";
$adminmail_data_result = mysqli_query($connection, $adminmail_data_query);
    
$messagesst_query = "SELECT * FROM message WHERE sender = '$fullname' ORDER BY id DESC LIMIT 0, 10";
$messagest_result = mysqli_query($connection, $messagesst_query);


$messagesrd_query = "SELECT * FROM message WHERE receiver = '$fullname' ORDER BY id DESC LIMIT 0, 10";
$messagerd_result = mysqli_query($connection, $messagesrd_query);
    
$messages_query = "SELECT * FROM message WHERE receiver = '$fullname' ORDER BY id DESC LIMIT 0, 5";
$message_result = mysqli_query($connection, $messages_query);

$message_query = "SELECT * FROM message WHERE message_status = 'unread' AND receiver = '$fullname'";
$message_count_result = mysqli_query($connection, $message_query);
$message_count = mysqli_num_rows($message_count_result);

    
$facebook_query = "SELECT *  FROM seo WHERE social_media ='Facebook'";
$facebook_result = mysqli_query($connection, $facebook_query);
$facebook_count = mysqli_num_rows($facebook_result);
    
$email_query = "SELECT *  FROM seo WHERE social_media ='Email'";
$email_result = mysqli_query($connection, $email_query);
$email_count = mysqli_num_rows($email_result);
    
$insta_query = "SELECT *  FROM seo WHERE social_media ='Instagram'";
$insta_result = mysqli_query($connection, $insta_query);
$insta_count = mysqli_num_rows($insta_result);
    
$twit_query = "SELECT *  FROM seo WHERE social_media ='Twitter'";
$twit_result = mysqli_query($connection, $twit_query);
$twit_count = mysqli_num_rows($twit_result);
    
$ytube_query = "SELECT *  FROM seo WHERE social_media ='Youtube'";
$ytube_result = mysqli_query($connection, $ytube_query);
$ytube_count = mysqli_num_rows($ytube_result);
    
    
$seo_query = "SELECT * FROM seo";
$seo_result = mysqli_query($connection, $seo_query);
    
    
$query_count = "SELECT * FROM subscribers WHERE in_at > DATE_SUB(NOW(), INTERVAL 5 MINUTE )";
$result_count = mysqli_query($connection, $query_count);
$count_online = mysqli_num_rows($result_count);
    
$query_admin_count = "SELECT * FROM admin WHERE in_at > DATE_SUB(NOW(), INTERVAL 5 MINUTE )";
$result_admin_count = mysqli_query($connection, $query_admin_count);
$count_admin_online = mysqli_num_rows($result_admin_count);
    
$custom_post_query = "SELECT * FROM blog_post WHERE publish_status = 'published' ORDER BY id DESC LIMIT 0, 5";
$custom_post_result = mysqli_query($connection, $custom_post_query);

$custom_bn_query = "SELECT * FROM breaking_news WHERE publish_status = 'published' ORDER BY id DESC LIMIT 0, 5";
$custom_bn_result = mysqli_query($connection, $custom_bn_query);


    
//SEO Functions

//Add SEO
if(isset($_POST['add_seo'])) {
    $social_media = mysqli_real_escape_string($connection, $_POST['social_media']);
    $social_media_link = mysqli_real_escape_string($connection, $_POST['social_media_link']);
    
    $add_seo_query = "INSERT INTO seo (social_media, social_media_link) VALUES ('$social_media', '$social_media_link')";
    
    if(mysqli_query($connection, $add_seo_query)){
         $message = 'SEO Added Successfully';
         } else {
           $error = 'Error in adding SEO';
         }
        
}

//Edit SEO
if(isset($_POST['edit_seo'])){
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    $social_media_link = mysqli_real_escape_string($connection, $_POST['social_media_link']);
    
    $edit_seo = mysqli_query($connection, "UPDATE seo SET social_media_link ='$social_media_link' WHERE id = '$id'");
    
     if($edit_seo) {
        print '<script type="text/javascript">alert("SEO Updated Successfully");</script>';
        header("location: seo_list.php");
    }
    
}

//Delete SEO
if(isset($_POST['delete_seo'])) {
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    
    $del_seo_query = mysqli_query($connection, "DELETE FROM seo WHERE id = '$id'");
    if($del_seo_query){
         print '<script type="text/javascript">alert("SEO Deleted Successfully");</script>';
        header("location: seo_list.php");
    }
}

    
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//Send Mail Function
$user_query = "SELECT * FROM subscribers";
$user_result = mysqli_query($connection, $user_query);
$address_count = mysqli_num_rows($user_result);
    while($user_row = mysqli_fetch_array($user_result)){
        $addresses[] = $user_row['email'];
    }
    

        if(isset($_POST['send_mail'])) {
            $name       = "Presage Entertainment"; 
            $from       = "support@Presage ENT.com.ng"; 
            $subject    = $_POST['subject']; 
            $compose_message   = $_POST['message']; 
            $message    =   "<!doctype html>
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
                                                          <p style='text-align: center; margin-bottom: 20px;'><img style='width: 100%; height: 100%;' src='https://Presage ENT.com.ng/ban.jpg' />  </p>                        <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;'>Hi there,</p>
                                                        <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;'> '; $message.= $compose_message; $message.=' </p>
                                                        <table border='0' cellpadding='0' cellspacing='0' class='btn btn-primary' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; box-sizing: border-box;'>
                                                        </table>
                                                        <p style='text-align: right; font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;'>Thank You<br>Presage Entertainment</p>
                                                        <p style='text-align: right; font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;'><img src='https://Presage ENT.com.ng/favicon-32x32.png' />  </p>
                                                      </td>
                                                      <tr>
                                                        <td style='text-align: center; font-family: sans-serif; font-size: 14px; vertical-align: top;'>
                                                          <a href='https://presagestore.com.ng' class='btn btn-xl' style='background: red; color: #fff; text-align: right; font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;'>Unsubscribe</a>
                                                        </td>
                                                      </tr>
                                                      <tr>
                                                        <style media='screen'>
                                                        @media (min-width: 1200px){
                                                          .social-icons{
                                                            margin: 0 20%;
                                                          }
                                                        }
                                                        </style>
                                                      </tr>
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
            for($address = $addresses; $address <= $address_count; $address++) {
                $to   		= implode(", ", $address); //replace with your email
            }
            
            $headers   = "";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=UTF-8\r\n";
            $headers .= "From: {$name} <{$from}>\r\n";
            $headers .= "Reply-To: <{$from}>\r\n";
            $headers .= "Subject: {$subject}\r\n";
            $headers .= "X-Mailer: PHP/" . phpversion() . "\r\n";
    
            $message1 = '';

            if(mail($to, $subject, $message, $headers)) {
                $message1 = 'Mail Sent.';
              } else {
                $message1 = 'Error in sending mail';
              }
          }
                            
    
    
//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

//Mail Function
if(isset($_POST['send_message'])) {
     $sender =  mysqli_real_escape_string($connection, $_POST['sender']);
     $sender_image = mysqli_real_escape_string($connection, $_POST['sender_image']);
     $receiver = mysqli_real_escape_string($connection, $_POST['receiver']);
     $message_title = mysqli_real_escape_string($connection, $_POST['message_title']);
     $message_body = mysqli_real_escape_string($connection, $_POST['message_body']);
     

       $query_send_mail = "INSERT INTO message (sender, sender_image, receiver, message_title, message_body, message_status) VALUES ('$sender', '$sender_image', '$receiver', '$message_title', '$message_body', 'unread')";


         if(mysqli_query($connection, $query_send_mail)) {
           $message = 'Message Sent Successfully';
         } else {
           $error = 'Message fail to send';
         }
   }

//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//Change Password
if(isset($_POST['update_name'])) {
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    $lastname = mysqli_real_escape_string($connection, $_POST['lastname']);
    $firstname = mysqli_real_escape_string($connection, $_POST['firstname']);
    
        
    $query = "UPDATE admin SET fullname = '$lastname, $firstname' WHERE id = '$id'";
    
       if(mysqli_query($connection, $query)) {
            print '<script type="text/javascript">alert("Changes Saved");</script>';
        } else {
            $error = "Changes not saved";
        }
}
    
//Change Password
if(isset($_POST['update_password'])) {
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $password1 = mysqli_real_escape_string($connection, $_POST['password1']);
    
    if($password != $password1) {
         print '<script type="text/javascript">alert("Password Mismatch");</script>';
    }else {
        $query = "UPDATE admin SET password = md5('$password') WHERE id = '$id'";
        if(mysqli_query($connection, $query)) {
            print '<script type="text/javascript">alert("Changes Saved");</script>';
            header("location: logout.php");
        } else {
            $error = "Changes not saved";
        }
    }
}

//Change Description
if(isset($_POST['update_description'])) {
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    
    $query = "UPDATE admin SET description = '$description' WHERE id = '$id'";
   if(mysqli_query($connection, $query)) {
        print '<script type="text/javascript">alert("Changes Saved");</script>';
    } else {
        $error = "Changes not saved";
    }
}
    
//Change image
if(isset($_POST['update_image'])) {
 $id = mysqli_real_escape_string($connection, $_POST['id']);
 $imageFileType_image = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
 $check_image = getimagesize($_FILES["image"]["tmp_name"]);
 $image = "admin/uploads/admin/images/".$username.'.'.$imageFileType_image;
  
 $moving_image =  "../admin/uploads/admin/images/".$username.'.'.$imageFileType_image;   
    $del_file = "SELECT * FROM admin WHERE id = '$id'";
    $del_result = mysqli_query($connection, $del_file);
    $del_data = mysqli_fetch_array($del_result);
    
    $del_file_data = $del_data['image'];
    
        unlink($del_file_data);
    
    $update_upload = "UPDATE admin SET image = '$image' WHERE id = '$id'";
    if(mysqli_query($connection, $update_upload)){
        $move_image = move_uploaded_file($_FILES["image"]["tmp_name"], $moving_image);

        print '<script type="text/javascript">alert("Image upload successfully");</script>';
    }else{
        print '<script type="text/javascript">alert("Fail to upload image");</script>';                    
    }
    
}

if(isset($_POST['update_email'])){
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    
    $query = "UPDATE admin SET email = '$email' WHERE id = '$id'";
    

    if(mysqli_query($connection, $query)) {
        print '<script type="text/javascript">alert("Email update successful");</script>';
    } else {
        $error = "Email fail to update";
    }
}
    
    
if(isset($_POST['update_fb'])){
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    $facebook = mysqli_real_escape_string($connection, $_POST['facebook']);
    
    $query = "UPDATE admin SET facebook = '$facebook' WHERE id = '$id'";
    

    if(mysqli_query($connection, $query)) {
        print '<script type="text/javascript">alert("Facbook link update successful");</script>';
    } else {
        $error = "Facebook fail to update";
    }
}
 
if(isset($_POST['update_tw'])){
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    $twitter = mysqli_real_escape_string($connection, $_POST['twitter']);
    
    $query = "UPDATE admin SET twitter = '$twitter' WHERE id = '$id'";
    

    if(mysqli_query($connection, $query)) {
        print '<script type="text/javascript">alert("Twitter link update successful");</script>';
    } else {
        $error = "Twitter fail to update";
    }
}
    
    
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------GENERAL ST0RE FUNCTION----------------------------------------------------------

//Show category
    $product_cat_query = "SELECT * FROM store_cat";
    $product_cat_result = mysqli_query($connection, $product_cat_query);
    
    $product_query = "SELECT * FROM store_product";
    $product_result = mysqli_query($connection, $product_query);
    $product_count = mysqli_num_rows($product_result);
    
    $order_query = "SELECT * FROM store_orders ORDER BY id DESC";
    $order_result = mysqli_query($connection, $order_query);
    
    $unde_order_query = "SELECT * FROM store_orders WHERE delivery_status = 'not yet delivered'";
    $unde_order_result = mysqli_query($connection, $unde_order_query);
    $unde_count = mysqli_num_rows($unde_order_result);
    
//Add category
if(isset($_POST['pro_cat'])) {
     $category =  mysqli_real_escape_string($connection, $_POST['category']);
     
    if(empty($category)){
        
       $error = "Pls put a category";
        
    }else {

       $query_add_cat = "INSERT INTO store_cat (store_cat) VALUES ('$category')";


         if(mysqli_query($connection, $query_add_cat)) {
           $message = 'Category Successfully Created';
         } else {
           $error = 'Error in creating category';
         }
   }

 }
    
//Delete category
if(isset($_POST['del_pro_cat'])) {
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    
    $del_cat_query = mysqli_query($connection, "DELETE FROM store_cat WHERE id = '$id'");
    if($del_cat_query){
         print '<script type="text/javascript">alert("Category Deleted Successfully");</script>';
        header("location: product_cat_list.php");
    }
}
    
if(isset($_POST['edit_cat'])){
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    $cat = mysqli_real_escape_string($connection, $_POST['cat']);
    
    $edit_cat = mysqli_query($connection, "UPDATE store_cat SET store_cat ='$cat' WHERE id = '$id'");
    
     if($edit_cat) {
        print '<script type="text/javascript">alert("Category Updated Successfully");</script>';
        header("location: product_cat_list.php");
    }
    
}
    
    
if(isset($_POST['add_product'])) {
    $product_name = mysqli_real_escape_string($connection, $_POST['product_name']);
    $product_price = mysqli_real_escape_string($connection, $_POST['product_price']);
    $cat = mysqli_real_escape_string($connection, $_POST['cat']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $product_slug = preg_replace('/[^a-z0-9]/', '-', strtolower(trim(strip_tags($product_name))));
    
    
    $imageFileType_image1 = pathinfo($_FILES["product_image_1"]["name"], PATHINFO_EXTENSION);
    $check_image1 = getimagesize($_FILES["product_image_1"]["tmp_name"]);
    $image_1 = "admin/uploads/store/".$product_slug.'1'.'.'.$imageFileType_image1;
    $moving_image_1 = "../admin/uploads/store/".$product_slug.'1'.'.'.$imageFileType_image1;
    
    $imageFileType_image2 = pathinfo($_FILES["product_image_2"]["name"], PATHINFO_EXTENSION);
    $check_image2 = getimagesize($_FILES["product_image_2"]["tmp_name"]);
    $image_2 = "admin/uploads/store/".$product_slug.'2'.'.'.$imageFileType_image2;
    
    $moving_image_2 = "../admin/uploads/store/".$product_slug.'2'.'.'.$imageFileType_image2;

    if(!is_numeric($product_price)){
        $error = "Product price is expected to be numeric";
    }elseif(file_exists($image_1)) {
        print '<script type="text/javascript">alert("Sorry, Image 1 name already exist, pls rename the file otherwise choose another file");</script>';
    }elseif(file_exists($image_2)) {
         print '<script type="text/javascript">alert("Sorry, Image 2 name already exist, pls rename the file otherwise choose another file");</script>';
    }elseif(!empty($image_1) && !empty($image_2)) {
        $reg_query = "INSERT INTO store_product (product_name, product_price, cat, product_description, product_image_1, product_image_2) VALUES ('$product_name', '$product_price', '$cat', '$description', '$image_1', '$image_2')";
         if(mysqli_query($connection, $reg_query)){
             $move_image1 = move_uploaded_file($_FILES["product_image_1"]["tmp_name"], $moving_image_1); 
             $move_image2 = move_uploaded_file($_FILES["product_image_2"]["tmp_name"], $moving_image_2); 
             $message = "Product Posted Successfully";
         }else{
             $error = "Product Fail To Post";
         }
    }
}
    

    
if(isset($_POST['edit_product'])) {
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    $product_name = mysqli_real_escape_string($connection, $_POST['product_name']);
    $product_price = mysqli_real_escape_string($connection, $_POST['product_price']);
    $cat = mysqli_real_escape_string($connection, $_POST['cat']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $product_slug = preg_replace('/[^a-z0-9]/', '-', strtolower(trim(strip_tags($product_name))));
    
    
    $imageFileType_image1 = pathinfo($_FILES["product_image_1"]["name"], PATHINFO_EXTENSION);
    $check_image1 = getimagesize($_FILES["product_image_1"]["tmp_name"]);
    $image_1 = "admin/uploads/store/".$product_slug.'1'.'.'.$imageFileType_image1;
    $moving_image_1 = "../admin/uploads/store/".$product_slug.'1'.'.'.$imageFileType_image1;
    
    $imageFileType_image2 = pathinfo($_FILES["product_image_2"]["name"], PATHINFO_EXTENSION);
    $check_image2 = getimagesize($_FILES["product_image_2"]["tmp_name"]);
    $image_2 = "admin/uploads/store/".$product_slug.'2'.'.'.$imageFileType_image2;
    
    $moving_image_2 = "../admin/uploads/store/".$product_slug.'2'.'.'.$imageFileType_image2;

    if(!is_numeric($product_price)){
        $error = "Product price is expected to be numeric";
    }elseif(file_exists($image_1)) {
        print '<script type="text/javascript">alert("Sorry, Image 1 name already exist, pls rename the file otherwise choose another file");</script>';
    }elseif(file_exists($image_2)) {
         print '<script type="text/javascript">alert("Sorry, Image 2 name already exist, pls rename the file otherwise choose another file");</script>';
    }elseif(!empty($image_1) && !empty($image_2)) {
        $reg_query = "UPDATE store_product SET product_name = '$product_name', product_price = '$product_price', product_description = '$description', product_image_1 = '$image_1', product_image_2 = '$image_2' WHERE id = '$id'";
         if(mysqli_query($connection, $reg_query)){
             $move_image1 = move_uploaded_file($_FILES["product_image_1"]["tmp_name"], $moving_image_1); 
             $move_image2 = move_uploaded_file($_FILES["product_image_2"]["tmp_name"], $moving_image_2); 
             print '<script type="text/javascript">alert("Changes Saved Successfully");</script>';
         }else{
             $error = "Product Fail To Post";
         }
    }
}
    
if(isset($_POST['delete_product'])) {
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    
    $del_cat_query = mysqli_query($connection, "DELETE FROM store_product WHERE id = '$id'");
    if($del_cat_query){
         print '<script type="text/javascript">alert("Category Deleted Successfully");</script>';
        header("location: product_list.php");
    }
}

if(isset($_POST['deliver'])){
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    
    $query = "UPDATE store_orders SET delivery_status = 'delivered' WHERE id = '$id'";
    

    if(mysqli_query($connection, $query)) {
        print '<script type="text/javascript">alert("Product Successfully Delivered");</script>';
    } else {
        print '<script type="text/javascript">alert("Error in delivered");</script>';
    }
}
?>
<!DOCTYPE html>
<html style="zoom: 90%;" lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
   <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />

  <title>Presage Store || Admin </title>

  <link href="css/style.default.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap-wysihtml5.css" />
  <link rel="stylesheet" href="css/dropzone.css" />
  <link href="css/prettyPhoto.css" rel="stylesheet">
  <link href="css/helvetica.css" rel="stylesheet">
    
  

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

<body class="stickyheader">
<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>
  
  <div class="leftpanel sticky-leftpanel">
    
    <div class="logopanel">
        <h1> Presage </h1>
    </div><!-- logopanel -->
        
    <div class="leftpanelinner">    
        
        <!-- This is only visible to small devices -->
        <div class="visible-xs hidden-sm hidden-md hidden-lg">   
            <div class="media userlogged">
                <img alt="" src="<?php echo '../'.$image; ?>" class="media-object">
                <div class="media-body">
                    <h4><?php echo $username; ?></h4>
                    <span><?php echo $rank; ?></span>
                </div>
            </div>
          
            <h5 class="sidebartitle actitle">Account</h5>
            <ul class="nav nav-pills nav-stacked nav-bracket mb30">
              <li><a href="profile.php"><i class="fa fa-user"></i> <span>Profile</span></a></li>
              <li><a href="logout.php"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
            </ul>
        </div>
      
      <h5 class="sidebartitle">Navigation</h5>
      <ul class="nav nav-pills nav-stacked nav-bracket">
          <li class=""><a href="store_dashboard.php"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
          <li><a href="email.php"><span class="pull-right badge badge-success"><?php echo $message_count; ?></span><i class="fa fa-envelope-o"></i> <span>Message(s)</span></a></li>
           <li class="nav-parent"><a href=""><i class="fa fa-star"></i> <span>Manage Product</span></a>
               <ul class="children">
                <li><a href="add_product.php"><i class="fa fa-caret-right"></i> Add Product</a></li>
                <li><a href="product_list.php"><i class="fa fa-caret-right"></i> Product List</a></li>
              </ul>
            </li>
           <li class="nav-parent"><a href=""><i class="fa fa-cube"></i> <span>Product Categories</span></a>
          <ul class="children">
            <li><a href="product_cat.php"><i class="fa fa-caret-right"></i> New Category</a></li>
            <li><a href="product_cat_list.php"><i class="fa fa-caret-right"></i> Category List</a></li>
          </ul>
        </li>

          <?php if($rank == 'admin'){?>
         <li class="nav-parent"><a href=""><i class="fa fa-users"></i> <span>Suscribers</span></a>
          <ul class="children">
            <li><a href="subscribers.php"><i class="fa fa-caret-right"></i> List Subscribers</a></li>
            <li><a href="mail_all.php"><i class="fa fa-caret-right"></i> Mail All</a></li>
          </ul>
        </li>
        <li class="nav-parent"><a href=""><i class="fa fa-user"></i> <span>Admin User</span></a>
          <ul class="children">
            <li><a href="add_admin.php"><i class="fa fa-caret-right"></i> Add Admin</a></li>
            <li><a href="admin_list.php"><i class="fa fa-caret-right"></i> Admin List</a></li>
          </ul>
        </li>
        <li class="nav-parent"><a href=""><i class="fa fa-facebook"></i> <span>SEO</span></a>
          <ul class="children">
            <li><a href="add_seo.php"><i class="fa fa-caret-right"></i> Add Social Media Links</a></li>
            <li><a href="seo_list.php"><i class="fa fa-caret-right"></i> SEO List</a></li>
          </ul>
        </li>
    <?php } ?>
        </ul>
    </div><!-- leftpanelinner -->
  </div><!-- leftpanel -->
  
  <div class="mainpanel">
    
    <div class="headerbar">
      
      <a class="menutoggle"><i class="fa fa-bars"></i></a>
      
      <form class="searchform" action="#" method="post">
        <input type="text" class="form-control" name="keyword" placeholder="Search here..." />
      </form>
      
      <div class="header-right">
        <ul class="headermenu">
        <?php if($rank == 'admin'){?>
          <li>
            <div class="btn-group">
              <button class="btn btn-default dropdown-toggle tp-icon" data-toggle="dropdown">
                <i class="glyphicon glyphicon-user"></i>
                <span class="badge"><?php echo $admin_count; ?></span>
              </button>
              <div class="dropdown-menu dropdown-menu-head pull-right">
                <h5 class="title"><?php echo $admin_count; ?> Registered Admin</h5>
                <ul class="dropdown-list user-list">
                <?php while ($admin_data = mysqli_fetch_array($admin_count_result)) { ?>
                  <li class="new">
                    <div class="thumb"><a href=""><img src="<?php echo $admin_data['image']; ?>" alt="" /></a></div>
                    <div class="desc">
                      <h5><a href=""><?php echo $admin_data['fullname']; ?></a> <span class="badge badge-success"><?php echo $admin_data['rank']; ?></span></h5>
                    </div>
                  </li>
                <?php } ?> 
                  <li class="new"><a href="add_admin.php">Add New Admin</a></li>
                </ul>
              </div>
            </div>
          </li>
        <?php } ?>
          <li>
            <div class="btn-group">
              <button class="btn btn-default dropdown-toggle tp-icon" data-toggle="dropdown">
                <i class="glyphicon glyphicon-envelope"></i>
                <span class="badge"><?php echo $message_count; ?></span>
              </button>
              <div class="dropdown-menu dropdown-menu-head pull-right">
                <h5 class="title">You Have <?php echo $message_count; ?> New Message</h5>
                <ul class="dropdown-list gen-list">
                <?php while ($message_data = mysqli_fetch_array($message_result)) { ?>
                  <li class="new">
                    <a href="email">
                    <span class="thumb"><img src="<?php echo $message_data['sender_image']; ?>" alt="" /></span>
                    <span class="desc">
                      <span class="name"><?php echo $message_data['sender']; ?> <span class="badge badge-success"><?php if($message_data['message_status'] == 'unread'){echo 'new'; }?></span></span>
                      <span class="msg">Subject: <?php echo $message_data['message_title']?></span>
                    </span>
                    </a>
                  </li>
                  <?php } ?>
                  <li class="new"><a href="email.php">Read All Messages</a></li>
                </ul>
              </div>
            </div>
          </li>
          <li>
            <div class="btn-group">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo '../'.$image; ?>" alt="" />
                <?php echo $username; ?>
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
               <li><a href="profile.php"><i class="fa fa-user"></i> <span>Profile</span></a></li>
              <li><a href="logout.php"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
              </ul>
            </div>
          </li>
        </ul>
      </div><!-- header-right -->
      
    </div><!-- headerbar -->
    <?php } ?>