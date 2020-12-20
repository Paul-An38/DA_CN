<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Interior-Design-Responsive-Website-Templates-StyleInn">
	<meta name="author" content="webThemez.com">
	<title>Thế Giới Nội Thất Của Bạn</title>
	<link rel="favicon" href="../assets/imagess/favicon.png">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/font-awesome.min.css"> 
	<link rel="stylesheet" href="../assets/css/bootstrap-theme.css" media="screen"> 
	<link rel="stylesheet" href="../assets/css/style.css">
    <link rel='stylesheet' id='camera-css'  href='../assets/css/camera.css' type='text/css' media='all'> 
</head>
<body>
    <?php
        include '../config/config.php';
        if(!isset($_SESSION)) session_start();
    ?>
    
    <!-- menu -->
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
                    <li><a href="cart.php"><img src="../assets/images/buy.png" alt="">MY CART </a></li>
                    <li><a href="../khachhang/login.php">Account </a></li>
                </ul>              
            </div>
            <div>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
			<!--/.nav-collapse -->
        </div>
       
    </div>
     <!-- tìm kiếm -->
     <div  style="background-color: whitesmoke;  margin-right:50px" >
                <form action="../search.php" enctype="multipart/form-data" method="post" style="background-color: whitesmoke; float:right;height:30px; margin-right:50px">
                    <input type="search" style="width:200px; height:30px "name="noidung" id="">
                    <input type="submit" value="Search" style="float:right; height:30px">
                </form>
            </div>
            <!-- /tìm kiếm -->
    <hr>
	<!-- /.menu -->

    <div  class="news-box top-margin" class="container" style="background-color: whitesmoke;">
        <marquee><h2><span style="color:red;height:20px;">Giỏ hàng của bạn</span></h2> </marquee>    
    </div>
    <hr>
    <!-- noi dung -->
    <section class="news-box top-margin"style="width:1200px; margin-left:200px; float:center;" >
        <div class="table-responsive" style="background-color: whitesmoke ;float:center;">
            <form action="dathang.php" method="post"   >
            
                <table class="table table-bordered" id=""  width="100%" cellspacing="0" >
                    <thead>
                        <th>STT</th>
                        <th>Mã sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá </th>
                        <th>Số lượng</th>
                        <th>hình</th>
                        <th>Thành tiền</th>
                        <th>Thao tác</th>
                    </thead>
                    <?php 
                        
                        $tam=isset($_SESSION['cart'])?$_SESSION['cart']:[];
                        $arr=array();
                        $i=0;//biến stt
                        $thanhtien=0;
                        $gia;
                        foreach($tam as $k => $v)
                        {
                        
                            $sql="SELECT * from sanpham where masanpham= '{$k}' ";
                            $stm = $obj->query($sql);
                            $data = $stm->fetch();
                            $i++;
                            
                    ?>
                    <tbody style="text-align:center;">
                        <td><?php echo $i?></td>
                        <td><?php echo $k //mã sản phẩm ?></td>
                        <td><?php echo $data['tensanpham'] //ten san pham?></td>
                        <td style="color:blue;"> <?php echo number_format( $data['gia']) //gia?><h7 style="color:red;"> VND</h7></td>
                        <td>
                                <div><a href="qlyCart.php?action=them&masanpham=<?php echo $data['masanpham']?>"><img src="../assets/images/tang.jpg" style="width:30px;height:30px;" alt=""></a></div>
                                <div style="color:blue;"><?php echo $v?></div><!-- so luong -->
                                <div><a href="qlyCart.php?action=giam&masanpham=<?php echo $data['masanpham']?>"><img src="../assets/images/giam.jpg" style="width:30px;height:30px;" alt=""></a></div>
                            
                        </td>
                        <td><img src="../assets/images/<?php echo $data['hinh']?>" style="width:200px; height:100px;" alt=""></td>
                        <td style="color:blue;"><?php echo number_format($v*$data['gia'])?>  <h7 style="color:red;">VND</h7></td> <!--thanh tien -->
                        <td><a href="qlyCart.php?action=xoa&masanpham=<?php echo $data['masanpham']?>">XOA</a></td>
                        </tbody>
                    <?php 
                        
                        $r=array("masanpham"=>$data['masanpham'],"tensanpham"=>$data['tensanpham'],"gia"=>$data['gia'],"soluong"=>$v,"thanhtien"=>$v*$data['gia']);
                        $arr[]=$r;
                        }
                        
                        $_SESSION['thanhtoan']=$arr;
                    ?>
                    <tfoot>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>
                            <?php 
                                echo "Tổng tiền là :";
                                $tt=0;
                                foreach($arr as $k => $v)
                                {
                                    $tt+=$v['thanhtien'];
                                }           
                                echo number_format($tt).". VND";
                            ?>
                        </th> 
                        <th>
                            <input class="btn btn-mini"type="submit" name="submit" value=" THANH TOÁN"style="height:40px;width:150px; background-color:blue;"> 
                        </th>

                    </tfoot>
                    
                    
                    
                </table>
                
            </form>
        </div>
    </section><!-- /.container -->
    <hr>

        
                       
    <footer id="footer" >
		<div class="container"style="margin-bottom:0px;float:bottom;">
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
