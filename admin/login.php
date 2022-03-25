<?php

    require '../config/db.php';

    $msg = "";
    $msgClass = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])  ) {

        $username = strtolower(htmlentities($_POST['username']));
        $password = htmlentities($_POST['password']);

        if (!$username || !$password) {
            $msg = "All fields are required";
            $msgClass = "alert-danger";
        } else {
            $sql = "select username, password from admins where username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $username );
            $stmt->execute();
            $stmt->bind_result($u_name, $u_password);
            $stmt->fetch();
            if ($username !== $u_name || $password !== $u_password) {
                $msg = "Incorrect credentials";
                $msgClass = "alert-danger";
            } else {
                $msg = "Admin exists. You'll be redirected shortly";
                $msgClass = "alert-success";
                // header('location: dashboard');
            }
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
     <!-- Site Metas -->
    <title>PhotoShoot - Photography &amp; Portfolio Template</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="../style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="../css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/custom.css">
	<script src="../js/modernizr.js"></script> <!-- Modernizr -->


</head>
<body id="page-top" class="politics_version">

    <!-- LOADER -->
    <div id="preloader">
		<div class="loader-rd"></div>
		<div class="loader-rd"></div>
		<div class="loader-rd"></div>
		<div class="loader-rd"></div>
    </div> <!-- end loader -->
    <!-- END LOADER -->
	
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-sm-12 col-lg-6 mx-auto my-auto">
                <div class="text-center">
                    <span>
                        <img class="img-fluid" src="../images/b_x.png" style="height: 90px !important; width: 90px;" alt="" />
                    </span>
                </div>
                <?php if($msg): ?>
                    <div class="mt-3 alert <?= $msgClass ?>" role="alert">
                        <span><?= $msg ?></span>
                    </div>
                <?php endif; ?>
                <form action="<?= htmlentities($_SERVER['PHP_SELF']) ?>" method="POST">
                    <div class="form-group">
                        <label for="Username">Username</label>
                        <input type="text" name="username" autocomplete="off" id="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" name="password" autocomplete="off" id="password" class="form-control">
                    </div>
                    <div class="">
                        <button type="submit" name="submit" class="btn btn-secondary hover-effect-new btn-lg btn-block text-truncate">
                            <span>Log in</span>
                        </button>
                    </div>
                    <div class="pull-right my-3">
                        <span>
                            <a href="#">Forgot Password?</a>
                        </span>
                    </div>
                </form>
            </div>
        </div>

    </div>


<!-- ALL JS FILES -->
<script src="../js/all.js"></script>
	<!-- Camera Slider -->
	<script src="../js/jquery.mobile.customized.min.js"></script>
	<script src="https://js.paystack.co/v2/inline.js"></script>
	<script src="../js/jquery.easing.1.3.js"></script> 
	<script src="../js/parallaxie.js"></script>
	<script src="../js/jquery.appear.min.js"></script>
	<script src="../js/skill.bars.jquery.js"></script>
	<script src="../js/responsiveslides.min.js"></script>
	<!-- Contact form JavaScript -->
    <script src="../js/jqBootstrapValidation.js"></script>
    <script src="../js/contact_me.js"></script>
    <!-- ALL PLUGINS -->
	<script src="../js/jquery.fatNav.min.js"></script>
	<script src="../js/menu-overlay.js"></script>
    <script src="../js/custom.js"></script>
	<script src="../js/zepto.min.js"></script>
	<script src="../js/imagesloaded.pkgd.min.js"></script>
	<script src="../js/slider.js"></script>
	<script src="../js/payment.js"></script>
	
</body>
</html>