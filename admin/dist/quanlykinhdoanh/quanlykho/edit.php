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
        $masp=isset($_GET['masanpham'])?$_GET['masanpham']:'';
        
        $sql="SELECT * From sanpham  where masanpham='{$masp}'";
        $stm=$obj->query($sql);
        $data=$stm->fetchALL();
        
    ?>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar tim kiem-->
            <form action="quanlysanpham.php" method="post" class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
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
                        <img style="width:50px; height:50px;" src="../../assets/images/<?php echo $_SESSION['quanlykinhdoanh']['hinh']; ?>" alt=""></i></a>
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
                    <?php
                    
                        foreach($data as $k => $v)
                        {
                            
                    ?>
                    <div class="container-fluid">
                        <h1 class="mt-4">Quản Lý Sản Phẩm</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Sản Phẩm Edit: <?php echo $v['tensanpham'] ?></li>
                        </ol>
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Edit Sản Phẩm
                                
                            </div>
                            <div class="card-body">
                                <form action="chucnang.php?action=sua" enctype="multipart/form-data" method="post" style="width:1300px">
                                    <div style="width:550px; float:left;height:300px">
                                        <table > 
                                            <tr>
                                                <td>Mã SP:</td>
                                                <td><input type="text" name="masanpham" value="<?php echo$masp?>" placeholder="" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Loại:</td>
                                                <td >
                                                    <select style="width:228px;"name="maloai" id="">
                                                    <?php
                                                            $sqll="SELECT * from loai join sanpham on loai.maloai=sanpham.maloai where sanpham.masanpham='{$masp}'";
                                                            $stml=$obj->query($sqll);
                                                            $loai=$stml->fetchALL();
                                                            foreach($loai as $k => $l)
                                                            {
                                                                ?>
                                                        <option value="<?php echo $l['maloai']?>"><?php echo $l['tenloai']?></option>
                                                        <?php
                                                            }
                                                           //////////láy loại mới
                                                            $sqll="SELECT * from loai ";
                                                            $stml=$obj->query($sqll);
                                                            $loai=$stml->fetchALL();
                                                            foreach($loai as $k => $l)
                                                            {
                                                                ?>
                                                        <option value="<?php echo $l['maloai']?>"><?php echo $l['tenloai']?></option>
                                                        <?php
                                                            }
                                                            ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Không Gian:</td>
                                                <td >
                                                    <select style="width:228px;"name="makhonggian" id="">
                                                        <?php
                                                            $sqlk="SELECT * from khonggian join sanpham on khonggian.makhonggian=sanpham.makhonggian where sanpham.masanpham='{$masp}'";
                                                            $stmk=$obj->query($sqlk);
                                                            $kg=$stmk->fetchALL();
                                                            foreach($kg as $k => $kg)
                                                            {
                                                                ?>
                                                        <option value="<?php echo $kg['makhonggian']?>"><?php echo $kg['tenkhonggian']?></option>
                                                        <?php
                                                            }
                                                            
                                                            
                                                            $sqlk="SELECT * from khonggian";
                                                            $stmk=$obj->query($sqlk);
                                                            $kg=$stmk->fetchALL();
                                                            foreach($kg as $k => $kg)
                                                            {
                                                                ?>
                                                        <option value="<?php echo $kg['makhonggian']?>"><?php echo $kg['tenkhonggian']?></option>
                                                        <?php
                                                            }
                                                            ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Tên SP:</td>
                                                <td><input type="text" name="tensanpham" value="<?php echo $v['tensanpham']?>" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Khối Lượng:</td>
                                                <td><input type="text" name="khoiluong" value="<?php echo $v['khoiluong']?>" id="">KG</td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Giá:</td>
                                                <td><input type="text" value="<?php echo $v['gia']?>" name="gia" id="">VND</td>
                                            </tr>
                                            <tr>
                                                <td>Màu sắc:</td>
                                                <td><input type="text" value="<?php echo $v['mausac']?>" name="mausac" id=""></td>
                                            </tr>
                                            <tr>
                                                <td>Chất liệu:</td>
                                                <td><input type="text" value="<?php echo $v['chatlieu']?>" name="chatlieu" id=""></td>
                                            </tr>
                                           
                                            <tr>
                                                <td>Kích thước:</td>
                                                <td><input type="text" value="<?php echo $v['kichthuoc']?>" name="kichthuoc" id=""></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div style="float:right; width:550px; height:300px; margin-right:200px; ">
                                        <table>
                                            <tr>
                                                <td>Hình:</td>
                                                <td><img style="width:100px; height:90px;"src="../../assets/images/<?php echo $v['hinh']?>" alt=""><input multiple="multiple"  type="file"  name="hinh" id=""></td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Mô tả:</td>
                                                <td><textarea name="mota" value="<?php echo $v['mota']?>" id="" cols="30" rows="6"></textarea></td>
                                            </tr>
                                                
                                            
                                        </table>
                                        
                                    </div>
                                    <div >
                                        <input type="submit"class="btn btn-mini" style="background-color:blue; color:white; float:right; margin-right:350px; " value="UPDATE">
                                    </div>
                                            
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
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
