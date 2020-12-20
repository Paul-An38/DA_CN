<?php
	include 'config/config.php';
    $masanpham=isset($_GET['masanpham'])?$_GET['masanpham']:'';

    $sql=" SELECT *  FROM sanpham where sanpham.masanpham='{$masanpham}'";
    $stm=$obj->query($sql);
	$data=$stm->fetchall();
	$ml='';

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Interior-Design-Responsive-Website-Templates-StyleInn">
	<meta name="author" content="webThemez.com">
	<title>Thế Giới Nội Thất Của Bạn</title>
	<link rel="favicon" href="assets/imagess/favicon.png">
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
                    <li><a href="products.php">Products</a></li>
                    <li><a href="services.html">Service</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="khachhang/login.php"><img src="assets/hinh/buy.png" alt="">CART </a></li>
                    <li><a href="khachhang/login.php"> Account</a></li>
                </ul>              
            </div>
            <div>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
			<!--/.nav-collapse -->
        </div>
        <div  style="background-color: whitesmoke;  margin-right:50px" >
            <form action="search.php" enctype="multipart/form-data" method="post" style="background-color: whitesmoke; float:right;height:30px; margin-right:50px">
                <input type="search" style="width:200px; height:30px "name="noidung" id="">
                <input type="submit" value="Search" style="float:right; height:30px">
            </form>
        </div>
    </div>


<!--/. product  -->


	<section  class="news-box top-margin">
		<div class="container"  style="background-color: white; margin-top: -15px;" >
		
			<div class="col-md-6" style="margin-top: 10px" > 
				<?php
						foreach ($data as $key => $value) 
						{
							$ml=$value['maloai'];
				?>
				<ul >
					<img style="width: 400px;height: 400px" src="assets/images/<?php echo $value['hinh'] ?>">
				</ul>
				<ul>
					<img style="width: 50px;height: 50px" src="assets/images/<?php echo $value['hinh'];?>">
							
				</ul>
				<?php
				 }
				 
					?>
			</div>
			<div class="col-md-6" style="color:black;font-family: timesnewroman ; background-color: whitesmoke;margin-top: 20px " >

				<ul><?php foreach ($data as $key => $value) {echo $value['makhonggian'];} ?> > <?php foreach ($data as $key => $value) {echo $value['maloai'];} ?> </ul>
				<ul style="font-size: 30px; "><?php foreach ($data as $key => $value) {echo $value['tensanpham'];} ?></ul>
				<table style="width: 100%">
					<td width="">
						<ul style="font-size: 30px;color: red ">
							<?php foreach ($data as $key => $value) {echo number_format($value['gia']);} ?> vnd 
						</ul>
					</td>
					<td>
						<a	class="btn btn-mini" href="cart/qlyCart.php?action=them&masanpham=<?php echo $masanpham?>">BUY NOW</a>			
					</td>

				</table>
				
				<ul style="font-size: 20px"><?php foreach ($data as $key => $value) {echo $value['mota'];} ?></ul>

				<hr style="height:2px;border-width:0;color:gray;background-color:gray" >
				<div class="col-md-6">Kich thuoc : <?php foreach ($data as $key => $value) {echo $value['kichthuoc'];}?></div>
				<div class="col-md-6">Khoi luong : <?php foreach ($data as $key => $value) {echo $value['khoiluong'];}?> kg</div>
				<div class="col-md-6">Chat lieu : <?php foreach ($data as $key => $value) {echo $value['chatlieu'];}?> </div>


			</div>

		</div>
		
	</section>
	<hr>	
		<!-- các sản phẩm cùng loại -->
		
    <!-- noi dung -->
    <section class="news-box top-margin" >
				 
        <div class="container" style="background-color: whitesmoke ; width:1200px;text-align:center;">
            <div class="row" style="width:1200px;">
			<h2 style="color:red;">Sản phẩm cùng Loại: <?php echo $ml ?></h2>
            <!-- tiến hành hiển thị sô lượng sản phẩm của 1 trang. -->
            <?php
                $sql="SELECT * FROM `sanpham` where  sanpham.maloai='{$ml}'";
                $stm=$obj->prepare($sql);
				$stm->execute();
				$sosanpham= $stm->rowcount();
				$sp_tung_trang=3;   //// hiện 3 sản phẩm trong 1 trang
				$sotrang=ceil($sosanpham/$sp_tung_trang);//tìm ra số lượng trang tương ứng với sô sp hiển thị
				$trang=1;// mặc định trang ban đầu là 1
				if(isset($_GET['trang']))
				{
					$trang=$_GET['trang'];
				}
				$tung_trang= ($trang-1)*$sp_tung_trang;// lấy vị trí  sản phẩm bắt đầu của từng trang. 
                $sql="SELECT * FROM `sanpham` where  sanpham.maloai='{$ml}' LIMIT $tung_trang,$sp_tung_trang";
				$stml=$obj->query($sql);
				$data=$stml->fetchALL();
				foreach($data as $k => $v)
                {
            ?>
                <div class="col-lg-4 col-md-4 col-sm-12" style="width:400px; height:500px; ">
                    <div class="newsBox">
                        <div class="thumbnail" style="background-color:green;">
                           <div>
                               <a href="product_in.php?masanpham=<?php echo $v['masanpham']?>"><img style="height:300px; width:300px;" src="assets/images/<?php echo $v['hinh'] ?>" alt=""></a>
                           </div>
                            
                            <div >
                                <div style="text-align:center;float:left; width:170px;" ><a href=""><h3><?php echo $v['tensanpham'] ?></h3></a></div>
                                <div style="text-align:center;float:right; color:blue ; width:170px;"><h3><?php echo number_format($v['gia']) ?>   VND </h3></div>
                            </div>
                            <div style="float:left;"> <a class="btn btn-mini" href="cart/qlyCart.php?action=them&masanpham=<?php echo $v['masanpham']?>">BUY NOW</a></div>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
            <?php    
                   // hiển thị thữ tự các trang
                echo " Trang: ";
                for($i=1;$i<=$sotrang;$i++)
                {
                ?>
                    <a href="product_in.php?trang=<?php echo$i ?>&masanpham=<?php echo $masanpham?>"><?php echo$i ?></a>
                <?php
                    }
                ?>
        </div>
        
    </section>
    <!-- dong các sản phẩm cùng loại -->


    <!-- dong noi dung -->


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
				imagePath: 'assets/imagess/'
			});

		});
	</script>
    
</body>
</html>
