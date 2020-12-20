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
    $tam=isset($_SESSION['phieunhap'])?$_SESSION['phieunhap']:[];
    $action=isset($_GET['action'])?$_GET['action']:'';
    
    if($action=="kichhoat")
    {
        $masp=isset($_REQUEST['masanpham'])?$_REQUEST['masanpham']:'';
        $sql="UPDATE sanpham SET trangthai='1' where masanpham='{$masp}'";
        $stm=$obj->query($sql);
        $data=$stm->fetchALL(); $ten=$data['tensanpham'];
        header("location:quanlynhapxuat.php");
       
    }