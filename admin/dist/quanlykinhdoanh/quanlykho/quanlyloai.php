<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Quản Lý Kho Hàng</title>
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
        $sql="SELECT * From loai";
        $stm=$obj->query($sql);
        $data=$stm->fetchALL();
        $soluongloai=0;
        $soluongloai=$stm->rowCount();
    ?>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar tim kiem-->
            <form action="quanlyloai.php" method="post" class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
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
                            <a class="nav-link" href="quanlykho.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="quanlysanpham.php" >
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Quản lý sản phẩm
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            
                            <a class="nav-link collapsed" href="quanlyloai.php" >
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Quản lý Loại
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <a class="nav-link collapsed" href="quanlykhonggian.php"  >
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Quản lý không gian
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <a class="nav-link collapsed" href="quanlynhapxuat.php"  >
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Quản lý Nhập/Xuất
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <!-- kết quả tìm kiêm -->
                
                <!-- /kết quả tìm kiếm -->
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Quản Lý Loại Sản Phẩm</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"><?php echo "Số lượng loại Sản Phẩm: $soluongloai"?></li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Danh mục loại sản phẩm
                                <div class="btn btn-mini" style="background-color:brown; float:right;"><a style="color:white;" href="loai.php">ADD NEWS</a></div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id=""  width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th> STT</th>
                                                <th>Mã loại</th>
                                                <th>Tên loại</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <?php
                                            
                                            $sqlloai="";
                                            $sotrang=0;
                                            $noidung=isset($_POST['noidung'])?$_POST['noidung']:'';// kiểm tra sự tồn tại của nội dung tìm kiếm
                                            if($noidung!='')
                                            {
                                                $sqlloai="SELECT * from loai where loai.tenloai like '%$noidung%' ";
                                                $stmloai= $obj->query($sqlloai);
                                                $soluongloai=$stmloai->rowCount();
                                                $so_loai_1trang=5;
                                                $sotrang= ceil($soluongloai/$so_loai_1trang);
                                                $trang =1;
                                                
                                                if(isset($_GET['trang']))
                                                {
                                                    $trang=$_GET['trang'];  
                                                }
                                                $tung_trang= ($trang-1)*$so_loai_1trang; // vị trí loại bat dau
                                                $sqlloai="SELECT * from loai  where loai.tenloai like '%$noidung%' LIMIT $tung_trang,$so_loai_1trang ";// phan trang cho ket qua tim kiem
                                                $stmloai= $obj->query($sqlloai);    
                                            }
                                            else{
                                                $so_loai_1trang=5;
                                                $sotrang= ceil($soluongloai/$so_loai_1trang);
                                                $trang =1;
                                                
                                                if(isset($_GET['trang']))
                                                {
                                                    $trang=$_GET['trang'];  
                                                }
                                                $tung_trang= ($trang-1)*$so_loai_1trang;
                                                $sqlloai="SELECT * from loai  LIMIT $tung_trang,$so_loai_1trang";
                                                $stmloai= $obj->query($sqlloai);
                                            }
                                            $loai=$stmloai->fetchALL();
                                            foreach($loai as $k => $v)
                                            {
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $k?></td>
                                                <td><?php echo $v['maloai']?></td>
                                                <td><?php echo $v['tenloai']?></td>
                                                <td>
                                                    <a  href="loai.php?maloai=<?php echo $v['maloai']?>">
                                                        <div style="background-color:#007bff; color:white;" class="btn btn-mini">Edit</div>
                                                    </a>
                                                    <a  href="cn_loai_kg.php?action=xoa&maloai=<?php echo $v['maloai']?>">
                                                        <div style="color:white;background-color:#dc3545;"class="btn btn-mini">Xóa</div>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <?php
                                            }
                                            

                                        ?>
                                    </table>
                                    <div style="margin-left:500px;">
                                        <?php 
                                        echo "Trang: ";
                                        for($i=1;$i<=$sotrang;$i++)
                                        {
                                            ?>
                                            <a href="quanlyloai.php?trang=<?php echo $i?>"><?php echo $i?></a>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    
                                </div>
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
