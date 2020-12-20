
<?php

if(!isset($_SESSION)) session_start();
include '../../../../config/config.php';

$action=isset($_GET['action'])?$_GET['action']:'';
$madh=isset($_GET['madonhang'])?$_GET['madonhang']:'';
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
$maqt=$quantri['maquantri'];

if($action=="xacnhan")// xác nhận đơn hàng
{
    $sql="UPDATE donhang Set ngaytao=NOW(), trangthai='Đã xác nhận',maquantri='$maqt' where madonhang='{$madh}'";
    $stm=$obj->query($sql);
     header('location:xacnhandh.php');
}
if($action=="huy")// hủy đơn hàng khi chưa giao hàng với nguyên nhân
{   
    $ghichu=isset($_GET['ghichu'])?$_GET['ghichu']:'';
    
    if($ghichu=="")
    {
        echo "vui lòng nhập lý do hủy đơn hàng! <br>";
        exit;
    }
    // echo "avcha: ".$madh.$ghichu;exit;
    $sql="UPDATE donhang Set ngaytao=NOW(), trangthai='Đơn hàng đã bị hủy do ($ghichu)' ,maquantri='$maqt' where madonhang='{$madh}'";
    $stm=$obj->query($sql);
    header('location:quanlydonhang.php');
}
if($action=="khoiphuc")// khôi phục lại trạng thái ban đầu cho đơn hàng khi hủy sai.
{
    $sql="UPDATE donhang Set ngaytao=NOW(), trangthai='chờ xác nhận',maquantri='$maqt' where madonhang='{$madh}'";
    $stm=$obj->query($sql);
    header('location:quanlydonhang.php');
}
if($action=="giaohang")// chức năng giao hàng cho khách hàng. thực hiện trừ số lượng.
{
   // echo $madh;exit; 
   $sqlc="SELECT * FROM chitiet_dh where chitiet_dh.madonhang='{$madh}'";
   $stmc= $obj->query($sqlc);
   $da=$stmc->fetchALL();// tiến hành lấy thông tin chi tiết đơn hàng.
   foreach($da as $k => $v)
   {
       $masp=$v['masanpham'];
       $soluong_inCT=$v['soluong'];// lấy số lượng của sản phẩm trong đơn hàng
       $sqlsp="SELECT * FROM sanpham where sanpham.masanpham='{$masp}'";
       $stmsp=$obj->query($sqlsp);
       $sp=$stmsp->fetchALL(); // tiến hành lấy thông tin từng sản phẩm trong đơn hàng.
       foreach($sp as $key => $va)
       {
           $soluong_inSP= $va['soluong'];// lấy số lượng sản phẩm trong bảng sản phẩm.
           $soluong_conlai= $soluong_inSP-$soluong_inCT;// tính số lượng còn lại của bảng sản phẩm.
           $sqlgh="UPDATE sanpham SET soluong='{$soluong_conlai}' where masanpham='{$masp}'";
           $stmgh=$obj->query($sqlgh);
        }
   }
   $sqldh="UPDATE donhang Set ngaytao=NOW(), trangthai='Đang giao hàng',maquantri='$maqt' where madonhang='{$madh}' ";
   $stmdh=$obj->query($sqldh);
   header('location:xacnhandh.php');
}

if($action=="thanhcong")// thực hiện khi giao hàng thành công
{
    $sql= "UPDATE donhang SET ngaytao=NOW(), trangthai='Giao hàng thành công',maquantri='$maqt' where madonhang='{$madh}' ";
    $stm= $obj->query($sql);
    header('location:quanlydonhanggiao.php');

}
if($action=="thatbai")// thực hiện khi giao hàng thất bại cập nhật lại số lượng cho sản phẩm
{
    // echo $madh.$action;exit;
    $sql_ct="SELECT * from chitiet_dh where chitiet_dh.madonhang='{$madh}' ";
    $stm_ct=$obj->query($sql_ct);
    $chitiet=$stm_ct->fetchALL();
    
    foreach($chitiet as $k => $v)
    {
        $masanpham= $v['masanpham'];// lấy các mã sản phẩm trong đơn hàng
        $soluongsp_in_ctDH =$v['soluong'];// lấy số lượng theo mã sản phẩm trong chi tiết dh
        $sql_sp="SELECT * from sanpham where sanpham.masanpham= '{$masanpham}' ";
        $stm_sp=$obj->query($sql_sp);
        $sanpham=$stm_sp->fetchALL();
        foreach($sanpham as $key => $value)
        {
            $soluongsp_inKHO=$value['soluong'];//lấy số lượng tồn hiện tại trong kho
            $soluong=$soluongsp_in_ctDH+$soluongsp_inKHO;
            $que="UPDATE sanpham set soluong='$soluong' where sanpham.masanpham= '{$masanpham}' ";
            $stmq=$obj->query($que);
        }
    }
    $sqldh="UPDATE donhang Set ngaytao=NOW(), trangthai='Đơn hàng đã bị hủy khi giao hàng',maquantri='$maqt' where madonhang='{$madh}' ";
    $stmdh=$obj->query($sqldh);
    header('location:quanlydonhanggiao.php');
}
if($action=="xoadh_huy")// chỉ chủ kinh doanh có thể dùng khi thực hiện xóa đơn hàng đã hủy ra khỏi database. 
{
    if(isset($_SESSION['quanlykinhdoanh']))
    {
        echo '<script language="javascript">';
        echo 'alert("Bạn không có quyền xóa ")';
        echo '</script>';
        echo '<a style="color:red" href="dshuydonhang.php">Trở lại</a>';
    }
    
    if(isset($_SESSION['boss']))
    {
        $sql="DELETE FROM `chitiet_dh` WHERE madonhang='{$madh}' ";
        $stm=$obj->query($sql);
        $sqldh="DELETE FROM donhang WHERE madonhang= '{$madh}' ";
        $stmdh=$obj->query($sqldh);
        header("location:dshuydonhang.php");
    }
}
else
{
    echo '<script language="javascript">';
    echo 'alert("chức năng $action  chưa viết ")';
    echo '</script>';
    echo '<a style="color:red" href="nhanviencu.php">Trở lại</a>';
    
}