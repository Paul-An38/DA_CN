
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>THẾ GIỚI NỘI THẤT CỦA BẠN</title>
	<link rel="favicon" href="../assets/images/favicon.png">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/font-awesome.min.css">
	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="../assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
	<!-- Fixed navbar -->
    <div class="navbar navbar-inverse " >
		
		<div class="container">
			<div class="navbar-header"  >
                <h1 style="margin-top: -5px;">
                <a href="../index.php" style="font-family: 'Times New Roman', Times, serif;">OTAKU</a></h1>
			</div>
			<div class="navbar-collapse collapse">
				     
                <ul class="nav navbar-nav pull-right" style="margin-left: 100px;">
                    <li><a href="../products.php">Products</a></li>
                    <li><a href="#">Service</a></li>
                    <li><a href="#">About</a></li>
					
                    <li><a href="register.php"><img src="../assets/hinh/buy.png" alt="">CART </a></li>
                    <li><a href="register.php"> Account</a></li>
                </ul>              
            </div>
            <div>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
			<!--/.nav-collapse -->
		</div>
    </div>
	<!-- /.navbar -->
	<header id="head" class="secondary">
		<div class="container">
			<div class="row">
				<div class="col-sm-8">
					<h1>Phiếu đăng ký thông tin khách hàng</h1>
				</div>
			</div>
		</div>
	</header>
	<!-- container -->
	<div class="container" style="background-color: whitesmoke; height:600px;">
				<div class="row">
					<div class="col-md-6">
						<form action="them.php" method="post" enctype="multipart/form-data" class="form-light mt-20" role="form">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Usernames:</label>
										<input type="text" name="Username" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Password</label>
										<input type="password" name="pass" class="form-control">
									</div>
									
								</div>
								<div class="col-md-6" class="form-group" style="float:right;">
										<label>Confim Password</label>
										<input type="password" name="confimpass" class="form-control">
									</div>
							</div>
                            <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Họ và tên :</label>
										<input type="text" name="hoten" class="form-control">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Số điện thoại :</label>
										<input type="text" name="sdt" class="form-control" >
									</div>
								</div>
							</div>
                            <div class="row">
                                <div class="col-md-6">
									<div class="form-group">
										<label>Địa chỉ :</label>
										<input type="text" name="diachi" class="form-control" >
									</div>
								</div>
							
								<div class="col-md-6">
									<div class="form-group">
										<label> Email :</label>
										<input type="email" name="email" class="form-control" id="">
									</div>
								</div>
							</div>
							<div>
                            	<input class="btn btn-two" type="submit" name="submit" value="Đăng Ký">
								<input type="reset" class="btn btn-two" value="Nhập Lại">
							</div>
						</form>
					</div>
					<div class="col-md-6">
						<h1>Đã có Tài Khoản!</h1><br>
						<a href="login.php"><button class="btn btn-two">Đăng nhập</button></a>
						
					</div>
				</div>
			</div>
	<!-- /container -->

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
								<a href="index.html">Home</a> | 
								<a href="about.html">About</a> |
								<a href="services.html">Services</a> |
								<a href="price.html">Price</a> |
								<a href="projects.html">Projects</a> |
								<a href="contact.html">Contact</a>
							</p>
						</div>
					</div>

					<div class="col-md-6 panel">
						<div class="panel-body">
							<p class="text-right">
								Copyright &copy; 2015. Template by <a href="http://webthemez.com/" rel="develop">WebThemez.com</a>
							</p>
						</div>
					</div>

				</div>
				<!-- /row of panels -->
			</div>
		</div>
	</footer>
	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>

	<!-- Google Maps -->
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	<script src="assets/js/google-map.js"></script>


</body>
</html>