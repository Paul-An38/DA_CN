<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Interior-Design-Responsive-Website-Templates-StyleInn">
	<title>Thế Giới Nội Thất Của Bạn</title>
	<link rel="favicon" href="assets/images/favicon.png">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css"> 
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen"> 
	<link rel="stylesheet" href="assets/css/style.css">
    <link rel='stylesheet' id='camera-css'  href='assets/css/camera.css' type='text/css' media='all'> 
</head>
<body>
    <?php
        if(!isset($_SESSION)) session_start();
        if(!isset($_SESSION['khachhang']))
        {
            header('location:login.php');
            exit;
        }
    ?>
    
    <!-- menu -->
    <div class="navbar navbar-inverse " >
		
		<div class="container">
			<div class="navbar-header"  >
                <h1 style="margin-top: -5px;">
                <a href="index.php" style="font-family: 'Times New Roman', Times, serif;">OTAKU</a></h1>
			</div>
			<div class="navbar-collapse collapse">
				     
                <ul class="nav navbar-nav pull-right" style="margin-left: 100px;">
                    <li><a href="products.php">Products</a></li>
                    <li><a href="services.html">Service</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="cart/cart.php"><img src="assets/images/buy.png" alt="">MY CART </a></li>
                    <li><a href="thongtin.php"> <img src="assets/images/<?php echo $_SESSION['khachhang']['hinh']?>" style="width:50px; height:50px;" alt=""> <?php echo $_SESSION['khachhang']['tenkhachhang']?> </a></li>
                </ul>              
            </div>
            <div>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
			<!--/.nav-collapse -->
		</div>
    </div>
	<!-- /.menu -->
    <!-- thông tin -->
    <div class="container"  class="news-box top-margin"style="background-color: whitesmoke ; height:700px; float:center;" >
        <form action="" style="background-color: whitesmoke ;margin-left:200px; " method="post">
            <table style=" float:center;">

                <thead>
                    <img style="width:150px; height:150px; margin-top: 100px;" src="assets/images/<?php echo $_SESSION['khachhang']['hinh']?>" alt="">
                </thead>
                <br>
                <thead  style="height:150px;">
                    <th>ID</th>
                    <th><input type="text" name="" value="<?php echo $_SESSION['khachhang']['makhachhang']?>" id=""></th>
                </thead><br>
                <thead style="height:150px;">
                    <th>tên</th>
                    <th><input type="text" name="" value="<?php echo $_SESSION['khachhang']['tenkhachhang']?>" id=""></th>
                </thead><br>
                <thead style="height:150px;">
                    <th>số điện thoại</th>
                    <th><input type="text" name="" value="<?php echo $_SESSION['khachhang']['sdt']?>" id=""></th>
                </thead><br>
                <thead style="height:150px;">
                    <th>Email</th>
                    <th><input type="text" name="" value="<?php echo $_SESSION['khachhang']['email']?>" id=""></th>
                </thead><br>
                <thead style="height:150px;">
                    <th>địa chỉ</th>
                    <th><input type="text" name="" value="<?php echo $_SESSION['khachhang']['diachi']?>" id=""></th>
                </thead><br>
                <thead style="height:150px;">
                    <th><a href="logout.php">Đăng Xuất</a></th>
                    <th></th>
                </thead><br>
                <thead>
                    <th></th>
                    <th></th>
                </thead>
            </table>
        
        </form>
    
    </div>
    <!-- /thông tin -->
    <footer id="footer">
		<div class="container">
			<div class="social text-center">
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-dribbble"></i></a>
				<a href="#"><i class="fa fa-flickr"></i></a>
				<a href="#"><i class="fa fa-github"></i></a>
			</div>

			<div class="clear"></div>
			<!--CLEAR FLOATS-->
		</div>
		<div class="footer2">
			<div class="container">
				<div class="row">

					<div class="col-md-6 panel">
						<div class="panel-body">
							<p class="simplenav">
								<a href="index.php">Home</a> | 
								<a href="about.html">About</a> |
								<a href="services.html">Services</a> |
								<a href="price.html">Price</a> |
								<a href="projects.html">Projects</a> |
								<a href="contact.html">Contact</a>
							</p>
						</div>
					</div>


				</div>
				<!-- /row of panels -->
			</div>
		</div>
	</footer>

	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="assets/js/modernizr-latest.js"></script> 
	<script type='text/javascript' src='assets/js/jquery.min.js'></script>
    <script type='text/javascript' src='assets/js/fancybox/jquery.fancybox.pack.js'></script>
    
    <script type='text/javascript' src='assets/js/jquery.mobile.customized.min.js'></script>
    <script type='text/javascript' src='assets/js/jquery.easing.1.3.js'></script> 
    <script type='text/javascript' src='assets/js/camera.min.js'></script> 
    <script src="assets/js/bootstrap.min.js"></script> 
	<script src="assets/js/custom.js"></script>
    <script>
		jQuery(function(){
			
			jQuery('#camera_wrap_4').camera({
				height: '600',
				loader: 'bar',
				pagination: false,
				thumbnails: false,
				hover: false,
				opacityOnGrid: false,
				imagePath: 'assets/images/'
			});

		});
	</script>
    
</body>
</html>
