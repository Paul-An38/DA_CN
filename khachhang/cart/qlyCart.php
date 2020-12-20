<?php
    include '../../config/config.php';
    if(!isset($_SESSION)) session_start();
    $tam=isset($_SESSION['cart'])?$_SESSION['cart']:[];
    $action = isset($_GET['action'])?$_GET['action']:'';
    $user=isset($_SESSION['khachhang'])?$_SESSION['khachhang']:[];
    
    if($action=="huy")
    {
        $madh= isset($_GET['madonhang'])?$_GET['madonhang']:'';
        $sql="UPDATE donhang Set ngaytao=NOW(), trangthai='Đơn hàng đã bị hủy bởi khách hàng'  where madonhang='{$madh}'";
        $stm=$obj->query($sql);
        header('location:cart.php');
    }
    if($action=='them')
    {
        $masp=isset($_GET['masanpham'])?$_GET['masanpham']:'';
        $gia=isset($_POST['gia'])?$_POST['gia']:'';
        $soluong= 1;
        if($masp!='')
        {
            if(isset($tam[$masp]))
            {
                $tam[$masp]+=$soluong;
            }
            else
            {
                $tam[$masp]=$soluong;
            }
        }
        echo $gia;
    }
    if($action=='giam')
    {
        $masp = isset($_GET['masanpham'])?$_GET['masanpham']:'';
        $soluong=$tam[$masp];
        if($masp!='')
        {
           $tam[$masp]-=1;
           if($tam[$masp]<=0)
           {
               unset($tam[$masp]);
           }
        }
    }
    if($action=='xoa')
    {   
        $masp= isset($_GET['masanpham'])?$_GET['masanpham']:'';
        unset($tam[$masp]);
    }
    
    $_SESSION['cart']=$tam;
    // print_r($user);
    // print_r($thanhtien));
    
    header('location:cart.php');
?>