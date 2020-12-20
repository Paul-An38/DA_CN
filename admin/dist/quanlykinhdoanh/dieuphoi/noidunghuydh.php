<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Quản Lý Đơn hàng giao</title>
        <link href="../../css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <?php
        include '../../../../config/config.php';
        if(!isset($_SESSION)) session_start();
        $quantri=array();
        if(!isset($_SESSION['quanlykinhdoanh']))
        {
            if(!isset($_SESSION['boss']))
            {
                header('location:../../login.html');
                exit;
            }
            else{
            $quantri=$_SESSION['boss'];

            }
        }
        else{
                
            $quantri=$_SESSION['quanlykinhdoanh'];
        }
        $sql="SELECT * From donhang where trangthai = 'Đang giao hàng'";
        $stm=$obj->query($sql);
        $data=$stm->fetchALL();
        $soluongdh=0;
        $soluongdh=$stm->rowCount();
        
    ?>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar tim kiem-->
            <form action="quanlydonhang.php" method="post" class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" name="noidung" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div style="height:47px; margin-left:-2px; background-color: blue ; color:white; ">

                        <input type="submit" style="color:white;"  class="btn btn-mini" value="Search" >
                    </div>
                    
                </div>
            </form>
            <!-- Navbar right-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img style="width:50px; height:50px;" src="../../assets/images/<?php echo $quantri['hinh']; ?>" alt=""></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../../logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="dieuphoi.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="quanlydonhang.php" >
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Quản lý Đơn Hàng
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            
                            <a class="nav-link collapsed" href="quanlydonhanggiao.php" >
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Quản lý Đơn hàng giao
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <a class="nav-link collapsed" href="dshuydonhang.php" >
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Danh sách đơn hàng hủy
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Nguyên nhân đơn hàng bị hủy</h1>
                        <ol class="breadcrumb mb-4">
                            
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                    Form hủy đơn hàng
                                <button class="btn btn-mini" style="background-color:brown; color:white; float:right;" onclick="quaylai()">Trở lại</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                <form action="noidunghuydh.php" method="post">
                                    <table class="table table-bordered" id=""  width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Mã Đơn hàng</th>
                                                <th>Mã Khách</th>
                                                <th>Ngày tạo</th>
                                                <th>Thành tiền</th>
                                                <th>Trạng thái</th>
                                                <th style="color:red">Nguyên Nhân</th>
                                                <th>Hủy đơn</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            $madh=isset($_GET['madonhang'])?$_GET['madonhang']:'';
                                            
                                            $sotrang=0;
                                            $so_dh_1trang=3;
                                            $sotrang= ceil($soluongdh/$so_dh_1trang);
                                            $trang =1;
                                            
                                            if(isset($_GET['trang']))
                                            {
                                                $trang=$_GET['trang'];  
                                            }
                                            $tung_trang= ($trang-1)*$so_dh_1trang;
                                            $sqldh="SELECT * from donhang where madonhang= '{$madh}' LIMIT $tung_trang,$so_dh_1trang ";
                                            $stmdh= $obj->query($sqldh);
                                        
                                            $dh=$stmdh->fetchALL();
                                            
                                            foreach($dh as $k => $v)
                                            {

                                        ?>
                                        <tbody>
                                            <tr>
                                                <!-- <td> <a href="chitiet_DH.php?madonhang=<?php echo $v['madonhang']?>"><?php echo $v['madonhang']?></a></td> -->
                                                <td><input type="text" name="madonhang" value="<?php echo $v['madonhang']?>" id=""></td>
                                                <td><?php echo $v['makhachhang']?></td>
                                                <td><?php echo $v['ngaytao']?></td>
                                                <td><?php echo number_format($v['thanhtien']).".VND"?></td>
                                                <td><?php echo $v['trangthai']?></td>
                                                <td><textarea name="ghichu" id="" cols="25" rows="3"></textarea></td>
                                                <td><input style="background-color:#007bff; color:white;" class="btn btn-mini" type="submit" value="Xác nhận nội dung"></td>
                                                    <!-- chưa lấy đcượ nội dung. lấy nội dung từ textarea  -->
                                                    
                                            </tr>
                                        </tbody>
                                        <?php
                                            }
                                        ?>
                                    </table>
                                    <div style="margin-left:500px;">
                                        <!-- <?php 
                                        echo "Trang: ";
                                        for($i=1;$i<=$sotrang;$i++)
                                        {
                                            ?>
                                            <a href="noidunghuydh.php?trang=<?php echo $i?>"><?php echo $i?></a>
                                            <?php
                                        }
                                        ?> -->
                                    </div>
                                    </form>
                                </div>
                                
                                <?php  
                                    $ma=isset($_POST['madonhang'])?$_POST['madonhang']:'';
                                    $ghichu=isset($_POST['ghichu'])?$_POST['ghichu']:'';
                                        echo " Bạn có muốn hủy đơn hàng: $ma <br> Nguyên nhân: $ghichu";
                                ?>
                                    <br>
                                    <a href="chucnang.php?action=huy&madonhang=<?php echo $ma?>&ghichu=<?php echo $ghichu?>">
                                        <div  style="background-color:#007bff; color:white;" class="btn btn-mini">Xác nhận</div> 
                                    </a> 
                                    
                                    <button style="color:white;background-color:#dc3545;"class="btn btn-mini" onclick="quaylai()">Cancel</button>  
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        
        <script>function quaylai(){ history.back(); }</script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
