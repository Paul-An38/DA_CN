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
    $maloai= isset($_POST['maloai'])?$_POST['maloai']:'';
    $tenloai= isset($_POST['tenloai'])?$_POST['tenloai']:'';

    $action=isset($_GET['action'])?$_GET['action']:'';

    if($action=="them")
    {
        if(isset($maloai))
        {
            
            $sqll="INSERT INTO loai(maloai,tenloai) values('$maloai','$tenloai')";
            $stml=$obj->query($sqll);
            header('location:quanlyloai.php');
        }
    }
    if($action=="sua")
    {
        if(isset($maloai))
        {
            $sqll="UPDATE loai SET tenloai='$tenloai' where maloai='{$maloai}'";
            $stm=$obj->query($sqll);
            header('location:quanlyloai.php');
        }
    }
    