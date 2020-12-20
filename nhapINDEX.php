<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Interior-Design-Responsive-Website-Templates-StyleInn">
	<meta name="author" content="webThemez.com">
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
    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse " >
		
		<div class="container">
			<div class="navbar-header"  >
                <h1 style="margin-top: -5px;">
                <a href="index.php" style="font-family: 'Times New Roman', Times, serif;">OTAKU</a></h1>
			</div>
			<div class="navbar-collapse collapse">
				     
                <ul class="nav navbar-nav pull-right" style="margin-left: 100px;">
                    <li><a href="#"> Products</a> </li>
                    <li><a href="#">Service</a></li>
                    <li><a href="#">About</a></li>
					
                    <li><a href="#"><img src="assets/hinh/buy.png" alt="">CART </a></li>
                    <li><a href="khachhang/login.php"> Account</a></li>
                </ul>              
            </div>
            <div>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
			<!--/.nav-collapse -->
		</div>
    </div>
	<!-- /.navbar -->

	<!-- Header -->
	<header id="head">
		<div class="container">
					<div class="fluid_container">
                    <div class="camera_wrap camera_emboss pattern_1" id="camera_wrap_4">
                        <div data-thumb="assets/hinh/noi_that1.jpg" data-src="assets/hinh/noi_that1.jpg">
                        </div> 
                        <div data-thumb="assets/hinh/noi_that2.jpg" data-src="assets/hinh/noi_that2.jpg">
                        </div>
                        <div data-thumb="assets/hinh/noi_that3.jpg" data-src="assets/hinh/noi_that3.jpg">
                        </div> 

                    </div><!-- #camera_wrap_3 -->
                </div><!-- .fluid_container -->
		</div>
	</header>
    <!-- /Header -->
    <div  class="news-box top-margin" class="container" style="background-color: whitesmoke;">
        <marquee><h2><span style="color:red; height:20px;">WELCOME TO THE FURNITURE STORE</span></h2> </marquee>    
    </div>
    <hr>
    <div class="container" style="background-color: whitesmoke" >
            <h2><span style="color:red;">Lời mở đầu</span></h2>
            <div class="col-md-6"><figure><img src="assets/hinh/noi_that3.jpg"></figure></div>
            <div class="col-md-6"  style="margin-top: 15px;">
                <ul style="color:red;"> Ngôi nhà chính là nơi bình yên nhất trong cuộc sống của mỗi chúng ta.
                    Ở trong ngôi nhà của mình, chúng ta sẽ cảm nhận được những vui buồn hay những trạng thái cảm xúc được thể hiện một cách tự nhiên nhất.
                    Thiết kế nội thất nhà phố không chỉ giúp cho không gian sống thêm ấn tượng mà còn ảnh hưởng trực tiếp đến tinh thần (tâm trạng, tình cảm), 
                    sức khỏe của các thành viên trong gia đình.
                </ul>
                <ul style="color:red;"> 
                    Bởi vậy, khi cần thiết kế nội thất nhà ống, nhà phố cần phải lựa chọn những đơn vị thiết kế có kinh nghiệm lâu năm và hiểu rõ được tâm tư, nguyện vọng của gia chủ.
                    Đó là một không gian sống với màu sắc hài hòa, dễ chịu. Đồ nội thất trong nhà ở được bố trí khoa học để mọi sinh hoạt trong gia đình trở nên dễ dàng hơn.
                    Đồng thời căn nhà cũng cần phải được đảm bảo về yếu tố phong thủy nhằm mang đến nhiều may mắn và tài lộc cho gia chủ và gia đình.
                </ul>
            </div>
    </div>
    
    <hr>
    <!-- slide top -->
    <section class="container" style="background-color: whitesmoke">
    
        
        <h2><span style="color:red;">KHUYẾN MÃI</span></h2>
            <div class="carousel slide" id="myCarousel">
                <div class="carousel-inner">
                    <div class="item active">
                            <ul class="thumbnails">
                                <?php
                                    include 'config/config.php';
                                    $sql="SELECT * FROM khuyenmai join chitiet_km on khuyenmai.makhuyenmai=chitiet_km.makhuyen";
                                    $stm=$obj->prepare($sql);
                                    $stm->execute();
                                    $data= $stm->fetchALL(PDO::FETCH_ASSOC);
                                    foreach($data as $k => $v)
                                    {
                                ?>
                                <li class="col-md-3">
                                    <div class="thumbnail">
                                        <a href="#"><img src="assets/images/portfolio/<?php echo $v ?>" alt=""></a>
                                    </div>
                                    <div class="caption">
                                        <div>
                                            <div>ten</div>
                                            <div>gia</div>
                                        </div>
                                        <div><a class="btn btn-mini" href="#">BUY NOW</a></div>
                                        
                                    </div>
                                </li>
                                <?php 
                                    }
                                ?>
                                <li class="col-md-3">
                                    <div class="thumbnail">
                                        <a href="#"><img src="assets/images/portfolio/img2.jpg" alt=""></a>
                                    </div>
                                    <div class="caption">
                                        <h4>Praesent commodo</h4>
                                        <p>Nullam Condimentum Nibh Etiam Sem</p>
                                        <a class="btn btn-mini" href="#">BUY NOW</a>
                                    </div>
                                </li>
                                <li class="col-md-3">
                                    <div class="thumbnail">
                                        <a href="#"><img src="assets/images/portfolio/img3.jpg" alt=""></a>
                                    </div>
                                    <div class="caption">
                                        <h4>Praesent commodo</h4>
                                        <p>Nullam Condimentum Nibh Etiam Sem</p>
                                        <a class="btn btn-mini" href="#">BUY NOW</a>
                                    </div>
                                </li>
                                <li class="col-md-3">
                                    <div class="thumbnail">
                                        <a href="#"><img src="assets/images/portfolio/img4.jpg" alt=""></a>
                                    </div>
                                    <div class="caption">
                                        <h4>Praesent commodo</h4>
                                        <p>Nullam Condimentum Nibh Etiam Sem</p>
                                        <a class="btn btn-mini" href="#">BUY NOW</a>
                                    </div>
                                </li>
                            </ul>
                    </div><!-- /Slide1 --> 
                    <div class="item">
                            <ul class="thumbnails">
                                <li class="col-md-3">
                                    <div class="thumbnail">
                                        <a href="#"><img src="assets/images/portfolio/img5.jpg" alt=""></a>
                                    </div>
                                    <div class="caption">
                                        <h4>Praesent commodo</h4>
                                        <p>Nullam Condimentum Nibh Etiam Sem</p>
                                        <a class="btn btn-mini" href="#">BUY NOW</a>
                                    </div>
                                </li>
                                <li class="col-md-3">
                                    <div class="thumbnail">
                                        <a href="#"><img src="assets/images/portfolio/img6.jpg" alt=""></a>
                                    </div>
                                    <div class="caption">
                                        <h4>Praesent commodo</h4>
                                        <p>Nullam Condimentum Nibh Etiam Sem</p>
                                        <a class="btn btn-mini" href="#">BUY NOW</a>
                                    </div>
                                </li>
                                <li class="col-md-3">
                                    <div class="thumbnail">
                                        <a href="#"><img src="assets/images/portfolio/img7.jpg" alt=""></a>
                                    </div>
                                    <div class="caption">
                                        <h4>Praesent commodo</h4>
                                        <p>Nullam Condimentum Nibh Etiam Sem</p>
                                        <a class="btn btn-mini" href="#">BUY NOW</a>
                                    </div>
                                </li>
                                <li class="col-md-3">
                                    <div class="thumbnail">
                                        <a href="#"><img src="assets/images/portfolio/img8.jpg" alt=""></a>
                                    </div>
                                    <div class="caption">
                                        <h4>Praesent commodo</h4>
                                        <p>Nullam Condimentum Nibh Etiam Sem</p>
                                        <a class="btn btn-mini" href="#">BUY NOW</a>
                                    </div>
                                </li>
                            </ul>
                    </div><!-- /Slide2 --> 
                    <div class="item">
                            <ul class="thumbnails">
                                <li class="col-md-3">
                                    <div class="thumbnail">
                                        <a href="#"><img src="assets/images/portfolio/img1.jpg" alt=""></a>
                                    </div>
                                    <div class="caption">
                                        <h4>Praesent commodo</h4>
                                        <p>Nullam Condimentum Nibh Etiam Sem</p>
                                        <a class="btn btn-mini" href="#">BUY NOW</a>
                                    </div>
                                </li>
                                <li class="col-md-3">
                                    <div class="thumbnail">
                                        <a href="#"><img src="assets/images/portfolio/img2.jpg" alt=""></a>
                                    </div>
                                    <div class="caption">
                                        <h4>Praesent commodo</h4>
                                        <p>Nullam Condimentum Nibh Etiam Sem</p>
                                        <a class="btn btn-mini" href="#">BUY NOW</a>
                                    </div>
                                </li>
                                <li class="col-md-3">
                                    <div class="thumbnail">
                                        <a href="#"><img src="assets/images/portfolio/img3.jpg" alt=""></a>
                                    </div>
                                    <div class="caption">
                                        <h4>Praesent commodo</h4>
                                        <p>Nullam Condimentum Nibh Etiam Sem</p>
                                        <a class="btn btn-mini" href="#">BUY NOW</a>
                                    </div>
                                </li>
                                <li class="col-md-3">
                                    <div class="thumbnail">
                                        <a href="#"><img src="assets/images/portfolio/img4.jpg" alt=""></a>
                                    </div>
                                    <div class="caption">
                                        <h4>Praesent commodo</h4>
                                        <p>Nullam Condimentum Nibh Etiam Sem</p>
                                        <a class="btn btn-mini" href="#">BUY NOW</a>
                                    </div>
                                </li>
                            </ul>
                    </div><!-- /Slide3 --> 
                </div>
                
                <div class="control-box " >  
                    <ul >                          
                    <a data-slide="prev" href="#myCarousel" class="carousel-control left">‹</a><a></a>
                    <a data-slide="next" href="#myCarousel" class="carousel-control right">›</a>
                </ul>
                </div><!-- /.control-box -->   
                                    
            </div><!-- /#myCarousel -->
                

        </div><!-- /.span12 -->          
        </div><!-- /.row --> 
    </section>
    <!-- / slide top -->
    <hr>
    <!-- section noi dung -->
    <?php 
                include 'config/config.php';
                $stm= $obj-> query("SELECT * FROM khonggian");
                $kg=$stm->fetchALL();
                foreach($kg as $k => $value)
                {
            ?>
    <section class="news-box top-margin" >
        
        <div class="container" style="background-color: whitesmoke">
            
            <div class="row">
                <h2><span style="color:red;">Sản phẩm dành cho: <?php echo $value['tenkhonggian']?></span></h2>
                <?php 
                    include 'config/config.php';
                    $a= $value['makhonggian'];
                    $sql="SELECT * FROM `loai` where loai.makhonggian= '$a' ";
                    $stm=$obj->prepare($sql);
                    $stm->execute();
                    $data= $stm->fetchALL(PDO::FETCH_ASSOC);
                    foreach($data as $k => $v)
                    {
                ?>
                <a href="phong/phongan.php">
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="newsBox">
                        <div class="thumbnail">
                            <figure><img src="assets/image/phongan/<?php echo $v['hinh'] ?>" style="width:350px;height:350px;"alt=""></figure>
                            <div class="caption maxheight2">
                                <div class="box_inner">
                                    <div class="box" style="text-align: center;">
                                        <ul class="title" style="font-family: 'Times New Roman', Times, serif;align-content: center;font-size: 25px;">
                                        <p><strong style="color:blue;"><?php echo $v['tenloai']?></strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div></a>
                <?php
                    }
                ?>
                
            </div>
            
        </div>
    </section>
    <?php
                }
            ?>
    <!--/ section noi dung-->
    <hr>
    <!-- section noi dung -->
    <section class="news-box top-margin" >
        
        <div class="container" style="background-color: whitesmoke">
            
            <div class="row">
                <h2><span style="color:red;">Sản phẩm dành cho Phòng Ngủ</span></h2>
                <?php 
                    include 'config/config.php';

                    $sql="SELECT * FROM `loai` where loai.makhonggian='PN' ";
                    $stm=$obj->prepare($sql);
                    $stm->execute();
                    $data= $stm->fetchALL(PDO::FETCH_ASSOC);
                    foreach($data as $k => $v)
                    {
                ?>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="newsBox">
                        <div class="thumbnail">
                            <figure><img src="assets/image/phongngu/<?php echo $v['hinh'] ?>" style="width:350px;height:350px;" alt=""></figure>
                            <div class="caption maxheight2">
                                <div class="box_inner">
                                    <div class="box" style="text-align: center;">
                                        <ul class="title" style="font-family: 'Times New Roman', Times, serif;align-content: center;font-size: 25px;">
                                        <a href="phong/phongngu.php"><p><strong><?php echo $v['tenloai']?></strong></p></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
                
            </div>
        </div>
    </section>
    <!--/ section noi dung-->
    <hr>
    <!-- section noi dung -->
    <section class="news-box top-margin" >
        
        <div class="container" style="background-color: whitesmoke">
            
            <div class="row">
                <h2><span style="color:red;">Sản phẩm dành cho Phòng Khách</span></h2>
                <?php 
                    include 'config/config.php';

                    $sql="SELECT * FROM `loai` where loai.makhonggian='PK' ";
                    $stm=$obj->prepare($sql);
                    $stm->execute();
                    $data= $stm->fetchALL(PDO::FETCH_ASSOC);
                    foreach($data as $k => $v)
                    {
                ?>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="newsBox">
                        <div class="thumbnail">
                            <figure><img src="assets/image/phongkhach/<?php echo $v['hinh'] ?>" style="width:350px;height:350px;" alt=""></figure>
                            <div class="caption maxheight2">
                                <div class="box_inner">
                                    <div class="box" style="text-align: center;">
                                        <ul class="title" style="font-family: 'Times New Roman', Times, serif;align-content: center;font-size: 25px;">
                                        <a href="phong/phongkhach.php"><p><strong><?php echo $v['tenloai']?></strong></p></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
                
            </div>
        </div>
    </section>
    <!--/ section noi dung-->
    <hr>
    <!-- section noi dung -->
    <section class="news-box top-margin" >
        
        <div class="container" style="background-color: whitesmoke">
            
            <div class="row">
                <h2><span style="color:red;">Sản phẩm dành cho Phòng làm việc</span></h2>
                <?php 
                    include 'config/config.php';

                    $sql="SELECT * FROM `loai` where loai.makhonggian='PLV' ";
                    $stm=$obj->prepare($sql);
                    $stm->execute();
                    $data= $stm->fetchALL(PDO::FETCH_ASSOC);
                    foreach($data as $k => $v)
                    {
                ?>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="newsBox">
                        <div class="thumbnail">
                            <figure><img src="assets/image/phonglamviec/<?php echo $v['hinh'] ?>" style="width:350px;height:350px;" alt=""></figure>
                            <div class="caption maxheight2">
                                <div class="box_inner">
                                    <div class="box" style="text-align: center;">
                                        <ul class="title" style="font-family: 'Times New Roman', Times, serif;align-content: center;font-size: 25px;">
                                        <a href="phong/phonglamviec.php"><p><strong><?php echo $v['tenloai']?></strong></p></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
                
            </div>
        </div>
    </section>
    <!--/ section noi dung-->
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
