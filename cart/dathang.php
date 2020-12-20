<?php
    if(!isset($_SESSION)) session_start();
    include '../config/config.php';
    $tien=0;
    $thanhtoan=isset($_SESSION['thanhtoan'])?$_SESSION['thanhtoan']:[];
    if(!isset($_SESSION['khachhang']))
    {
        header('location:../khachhang/login.php');
        exit;
    }
    $makh=$_SESSION['khachhang']['makhachhang'];
    if($thanhtoan=='')
    {
        echo $err="giỏ hàng của bạn rỗng";
        exit;
    }
    if(!isset($err))
    {
        foreach( $thanhtoan as $k => $v)
        {
            $tien+=$v['thanhtien'];
        }
        $sqldh="INSERT INTO donhang(makhachhang,ngaytao,thanhtien,trangthai) values('$makh',NOW(),$tien,'chờ xác nhận')";
        $stmdh=$obj->query($sqldh);
        include 'chitietdh.php';
        header('location:cart.php');
    }