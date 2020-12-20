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
    $masp= isset($_REQUEST['masanpham'])?$_REQUEST['masanpham']:"";
    $tensp= isset($_POST['tensanpham'])?$_POST['tensanpham']:"";
    $maloai= isset($_POST['maloai'])?$_POST['maloai']:"";
    $makhonggian= isset($_POST['makhonggian'])?$_POST['makhonggian']:"";
    $gia= isset($_POST['gia'])?$_POST['gia']:"";
    $khoiluong= isset($_POST['khoiluong'])?$_POST['khoiluong']:"";
    $mausac= isset($_POST['mausac'])?$_POST['mausac']:"";
    $kichthuoc= isset($_POST['kichthuoc'])?$_POST['kichthuoc']:"";
    $chatlieu= isset($_POST['chatlieu'])?$_POST['chatlieu']:"";
    $mota= isset($_POST['mota'])?$_POST['mota']:"";
    $action=isset($_GET['action'])?$_GET['action']:'';
    /////////////////////////////////hình/////////
    
    if($action=="them")
    {   
        $errFile =$_FILES['hinh']['error'];
        echo $masp.$maloai.$makhonggian.$tensp.$gia.$khoiluong.$mausac.$kichthuoc.$chatlieu.$mota;
        if(!$masp||!$maloai||!$makhonggian||!$tensp||!$gia||!$khoiluong||!$mausac||!$kichthuoc||!$chatlieu||!$mota)
        {
            echo "nhập đầy đủ thông tin";

        }
        else
        {   
            if($errFile>0)
            {
                echo $err ="loi file hinh";
            }
            
            if(!isset($err))
            {
                $hinh= $_FILES['hinh']['name'];
                if($hinh=='')
                {
                    echo "hinh rông";
                }
                $tmp=$_FILES['hinh']['tmp_name'];
                if(!move_uploaded_file($tmp,"../../assets/images/$hinh"))
                {
                    echo "khoong up hinh dc";
                    exit;
                }
                $sql="INSERT INTO sanpham(masanpham,maloai,tensanpham,khoiluong,hinh,gia,trangthai,mausac,chatlieu,kichthuoc,mota,makhonggian)
                                    values('$masp','$maloai','$tensp','$khoiluong','$hinh','$gia','0','$mausac','$chatlieu','$kichthuoc','$mota','$makhonggian')";
                $stm=$obj->query($sql);
                echo "them thành công";
                header('location:sanpham.php');
            }
        }
    }
    if($action=="sua")
    {   
        $arrIMG=array("image/jpeg","image/png","image/bmp");
        $errFile =$_FILES['hinh']['error'];
        if($errFile>0)
        {
            $sql="UPDATE `sanpham` SET `maloai`='$maloai',`tensanpham`='$tensp',`khoiluong`='$khoiluong',`gia`='$gia',`mausac`='$mausac',`chatlieu`='$chatlieu',`kichthuoc`='$kichthuoc',`mota`='$mota',`makhonggian`='$makhonggian' WHERE masanpham='$masp' ";
            $stm=$obj->query($sql);
            echo "sua thành công";
            header('location:quanlysanpham.php');
        }
        
        if(!isset($err))
        {
            $type=$_FILES['hinh']['type'];
            if(!in_array($type,$arrIMG))
            {
                echo $err="hinh phải có đuôi .jpg,.png,.bmp";
                exit;
            }
            $hinh= $_FILES['hinh']['name'];
            if($hinh=='')
            {
                echo "hinh rong";
            }
            
            $tmp=$_FILES['hinh']['tmp_name'];
            if(!move_uploaded_file($tmp,"../../assets/images/$hinh"))
            {
                echo "khoong up hinh dc";
                exit;
            }
            $sql="UPDATE `sanpham` SET `maloai`='$maloai',`tensanpham`='$tensp',`khoiluong`='$khoiluong',`hinh`='$hinh',`gia`='$gia',`mausac`='$mausac',`chatlieu`='$chatlieu',`kichthuoc`='$kichthuoc',`mota`='$mota',`makhonggian`='$makhonggian' WHERE masanpham='$masp' ";
            $stm=$obj->query($sql);
            echo "sua thành công";
            header('location:quanlysanpham.php');
        }
        
    }
    if($action=="xoa")
    {
        
        $sql=" UPDATE `sanpham` SET trangthai='0' WHERE masanpham='{$masp}' ";
        $stm=$obj->query($sql);
        echo "sua thành công";
        header('location:quanlysanpham.php');
    }
    if($action=="kichhoat")
    {
        $masp=isset($_REQUEST['masanpham'])?$_REQUEST['masanpham']:'';
        $sql="UPDATE sanpham SET trangthai='1' where masanpham='{$masp}'";
        $stm=$obj->query($sql);
        $data=$stm->fetchALL(); $ten=$data['tensanpham'];
        header("location:quanlysanpham.php");
       
    }
    if($action=="ngung")
    {
        $masp=isset($_REQUEST['masanpham'])?$_REQUEST['masanpham']:'';
        $sql="UPDATE sanpham SET trangthai='0' where masanpham='{$masp}'";
        $stm=$obj->query($sql);
        $data=$stm->fetchALL(); $ten=$data['tensanpham'];
        header("location:quanlynhapxuat.php");
       
    }