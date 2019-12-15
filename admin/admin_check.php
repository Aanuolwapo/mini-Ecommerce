<?php 
include("session.php");

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
    $password = $row['password'];
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
    
$error = '';
$message = '';
    
if(isset($_POST['set_password'])){
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $password1 = mysqli_real_escape_string($connection, $_POST['password1']);
    
    $password_query = "UPDATE admin SET password = md5('$password') WHERE username = '$username'";
    
    if($password == $password1){
        
        $save_password = mysqli_query($connection, $password_query);
        print '<script type="text/javascript">alert("Password set successfully");</script>';
    }else{
        $error = "Password does not match";
    }
}

if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    
    $query = "SELECT id FROM admin WHERE username = '$username' AND password = md5('$password')";
    
    $result = mysqli_query($connection, $query);
    $rower = mysqli_fetch_array($result, MYSQLI_ASSOC);

    $admin_rank = $rower['rank'];

    $count = mysqli_num_rows($result);

    if($count == 1) {
        $_SESSION['username'] = $username;
        
        header("location: store_dashboard.php");
    } else {
        $error = "Your Password is Invalid";
    }
}

if(isset($_POST['set_twitter'])){
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $twitter = mysqli_real_escape_string($connection, $_POST['twitter']);
    
    $query = "UPDATE admin SET twitter = '$twitter' WHERE username = '$username'";
    

    if(mysqli_query($connection, $query)) {
        print '<script type="text/javascript">alert("Twitter Set successful");</script>';
    } else {
        $error = "Twitter link fail to update";
    }
}
    
if(isset($_POST['set_description'])){
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    
    $query = "UPDATE admin SET description = '$description' WHERE username = '$username'";
    

    if(mysqli_query($connection, $query)) {
        print '<script type="text/javascript">alert("Description Set successful");</script>';
    } else {
        $error = "Description fail to update";
    }
}

if(isset($_POST['set_email'])){
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    
    $query = "UPDATE admin SET email = '$email' WHERE username = '$username'";
    

    if(mysqli_query($connection, $query)) {
        print '<script type="text/javascript">alert("Email Set successful");</script>';
    } else {
        $error = "Email fail to update";
    }
}
    
if(isset($_POST['set_facebook'])){
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $facebook = mysqli_real_escape_string($connection, $_POST['facebook']);
    
    $query = "UPDATE admin SET facebook = '$facebook' WHERE username = '$username'";
    

    if(mysqli_query($connection, $query)) {
        print '<script type="text/javascript">alert("Facebook link Set successful");</script>';
    } else {
        $error = "Facebook link fail to update";
    }
}

if(isset($_POST['set_image'])){
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $imageFileType_image = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    $admin_image = "admin/uploads/admin/images/".$username.'.'.$imageFileType_image;
    
     $moving_admin_image = "../admin/uploads/admin/images/".$username.'.'.$imageFileType_image;
    
    if(file_exists($admin_image)) {
    # code.. 
    print '<script type="text/javascript">alert("Sorry, Image name already exist, pls rename the file otherwise choose another file");</script>';
    }elseif($imageFileType_image != "jpg"){
         print '<script type="text/javascript">alert(" Only jpg files allowed");</script>';
    }elseif(!empty($admin_image)) {         
        $query_admin_image = "UPDATE admin SET image = '$admin_image' WHERE username = '$username'";
        $move_admin_image = move_uploaded_file($_FILES["image"]["tmp_name"], $moving_admin_image); 
        if(mysqli_query($connection, $query_admin_image)){
            print '<script type="text/javascript">alert("Image upload successful");</script>';
            header("location: admin_check.php");
        }else{
            print '<script type="text/javascript">alert("Image upload failed");</script>';                    
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />

  <title>Presage Stores || Admin </title>

  <link href="css/style.default.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <![endif]-->
</head>

<body style="background: #b5bf17; color: black;"  class="signin">


<section>
  
    <div class="signinpanel">
        
        <div class="row">
            
            <div class="col-md-7">
               <div class="signin-info text-center">
                    <div class="logopanel">
                        <h1>Presage Online Stores</h1>
                    </div><!-- logopanel -->
                
                    
                
                     <p class="text-center"><img src="images/preent.png" width="50%" height="50%" /></p>
                    
                    <div class="mb20"></div>
                </div><!-- signin0-info -->
            
            </div><!-- col-sm-7 -->
            
            <?php if($password == ""){?>
            <div class="col-md-5">
                
                <form method="POST" action="">
                    <h4 class="nomargin">Set Password</h4>
                    <p class="mt5 mb20">Welcome <?php echo $fullname; ?>, Set your password to access your account.</p>
                    <?php include('includes/error_message.php')?>
                    <?php include('includes/success_message.php')?>
                    <input type="hidden" name="username" value="<?php echo $username; ?>" />
                    <input type="password" class="form-control pword" name="password" placeholder="Password goes here!!" required />
                    <input type="password" class="form-control pword" name="password1" placeholder="Retype Password" required />
                    <button name="set_password" class="btn btn-success btn-block">Set Password</button>
                    
                </form>
            </div><!-- col-sm-5 -->
            <?php }elseif($image == ''){?>
             <div class="col-md-5">
                
                <form method="POST" action="" enctype="multipart/form-data">
                    <h4 class="nomargin">Upload Image</h4>
                    <p class="mt5 mb20">Welcome <?php echo $fullname; ?>, please upload a picture</p>
                    <?php include('includes/error_message.php')?>
                    <input type="hidden" name="username" value="<?php echo $username; ?>" />
                    <input type="file" class="form-control" name="image" required />
                    <button name="set_image" class="btn btn-success btn-block">Upload image</button>
                    
                </form>
            </div><!-- col-sm-5 -->
            <?php }elseif($description == '') { ?>
                <div class="col-md-5">
                
                <form method="POST" action="" enctype="multipart/form-data">
                    <h4 class="nomargin">Description</h4>
                    <p class="mt5 mb20">Welcome <?php echo $fullname; ?>, please give a little info about you</p>
                    <?php include('includes/error_message.php')?>
                    <input type="hidden" name="username" value="<?php echo $username; ?>" />
                    <textarea class="form-control" name="description"></textarea>
                    <button name="set_description" class="btn btn-success btn-block">Save Info</button>
                    
                </form>
            </div>
        <?php }elseif(empty($email)){?>
             <div class="col-md-5">
                
                <form method="POST" action="">
                    <h4 class="nomargin">Social Media Links</h4>
                    <p class="mt5 mb20">Welcome <?php echo $fullname; ?>, please insert your social media links</p>
                    <?php include('includes/error_message.php')?>
                    <input type="hidden" name="username" value="<?php echo $username; ?>" />
                   
                    <div class="input-group mb15">
                        <input name="email" type="text" placeholder="Email goes here!" class="form-control" required />
                            <span class="input-group-btn">
                                <button type="submit" name="set_email" type="button" class="btn btn-primary">Set Email</button>
                            </span>
                    </div>
                 </form>
            </div><!-- col-sm-5 -->
            <?php }elseif(empty($facebook)){?> 
             <div class="col-md-5">
                
                <form method="POST" action="">
                    <h4 class="nomargin">Social Media Links</h4>
                    <p class="mt5 mb20">Welcome <?php echo $fullname; ?>, please insert your social media links</p>
                    <?php include('includes/error_message.php')?>
                    <input type="hidden" name="username" value="<?php echo $username; ?>" />
                   
                    <div class="input-group mb15">    
                        <input name="facebook" type="text" placeholder="Facebook link goes here!" class="form-control" required />
                            <span class="input-group-btn">
                                <button type="submit" name="set_facebook" type="button" class="btn btn-primary">Set Facebook</button>
                            </span>
                    </div>
                 </form>
             </div><!-- col-sm-5 -->
            <?php }elseif(empty($twitter)){?> 
                    <div class="col-md-5">
                
                <form method="POST" action="">
                    <h4 class="nomargin">Social Media Links</h4>
                    <p class="mt5 mb20">Welcome <?php echo $fullname; ?>, please insert your social media links</p>
                    <?php include('includes/error_message.php')?>
                    <input type="hidden" name="username" value="<?php echo $username; ?>" />
                   
                    <div class="input-group mb15">    
                        <input name="twitter" type="text" placeholder="Twitter link goes here!" class="form-control" required />
                            <span class="input-group-btn">
                                <button type="submit" name="set_twitter" type="button" class="btn btn-primary">Set Twitter</button>
                            </span>
                    </div>
                 </form>
             </div><!-- col-sm-5 -->
         
            <?php }else{?>
            <div class="col-md-5">
                
                <form method="POST" action="">
                    <h4 class="nomargin">Login Here!</h4>
                    <p class="mt5 mb20">Welcome <?php echo $fullname; ?>, Login Here.</p>
                    <?php include('includes/error_message.php')?>
                    <input type="hidden" name="username" value="<?php echo $username; ?>" />
                    <input type="password" class="form-control pword" name="password" placeholder="Password goes here!!" required />
                    <button name="login" class="btn btn-success btn-block">Login</button>
                    
                </form>
            </div><!-- col-sm-5 -->
          <?php } ?>
        </div><!-- row -->
        
        <div class="signup-footer">
            <div class="pull-left">
                &copy; 2018. All Rights Reserved By Presage Stores.
            </div>
            <div class="pull-right">
                Created By: <a style="color: black;" href="" target="_blank">Koderia Nig</a>
            </div>
        </div>
        
    </div><!-- signin -->
  
</section>


<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/jquery-migrate-1.2.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/modernizr.min.js"></script>
<script src="js/jquery.sparkline.min.js"></script>
<script src="js/jquery.cookies.js"></script>

<script src="js/toggles.min.js"></script>
<script src="js/retina.min.js"></script>

<script src="js/custom.js"></script>
<script>
    jQuery(document).ready(function(){
        
        // Please do not use the code below
        // This is for demo purposes only
        var c = jQuery.cookie('change-skin');
        if (c && c == 'greyjoy') {
            jQuery('.btn-success').addClass('btn-orange').removeClass('btn-success');
        } else if(c && c == 'dodgerblue') {
            jQuery('.btn-success').addClass('btn-primary').removeClass('btn-success');
        } else if (c && c == 'katniss') {
            jQuery('.btn-success').addClass('btn-primary').removeClass('btn-success');
        }
    });
</script>

</body>
</html>
<?php } ?>