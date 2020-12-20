<?php
    include '../../../config/config.php';
    include '../../../config/config.php';
    if(!isset($_SESSION)) session_start();
    if(!isset($_SESSION['boss']))
    {
        header('location:../logout.php');
        exit;
    }
    else if(isset($_SESSION['quanlykinhdoanh']))
    {
        header('location:../logout.php');
        exit;
    }
    else if(isset($_SESSION['quanlymarketting']))
    {
        header('location:../logout.php');
        exit;
    }
    $action=isset($_GET['action'])?$_GET['action']:'';
    $user =isset($_POST["Username"])?$_POST["Username"]:'';
    $pass=isset($_POST["Password"])?$_POST["Password"]:'';
    $ten=isset($_POST["tenquantri"])?$_POST["tenquantri"]:'';
    $quyen=isset($_POST["quyen"])?$_POST["quyen"]:'';
    

    if($action=="them")
    {   $hinh=$_FILES['hinh']['error']==0?$_FILES['hinh']['name']:'';
        if(!$user||!$pass||!$ten||!$quyen||!$hinh)
        {
            echo $err= "khong được để trống";
            exit;
        }
        $que="SELECT * from quantri";
        $stm=$obj->query($que);
        $da=$stm->fetchALL();
        foreach($da as $k => $v)
        {
            if($user==$v['Username'])
            {
                echo $err="tên đăng nhập đã tồn tại"; exit;
            }
        }
        if(!isset($err))
        {
            if(!move_uploaded_file($_FILES['hinh']['tmp_name'],"../assets/images/$hinh"))
            {
                echo "up hình lỗi";exit;
            }
            $sql="INSERT INTO quantri(Username,Passwords,tenquantri,hinh,quyen) values('$user','$pass','$ten','$hinh','$quyen')";
            $stm=$obj->query($sql);
            header('location:create.php');
        }
    }
    if($action=="thuhoi")
    {
        $maqt=isset($_GET['maquantri'])?$_GET['maquantri']:'';
        $sql="UPDATE quantri SET quyen='đã thu hồi' where maquantri='{$maqt}'";
        $stm=$obj->query($sql);
        header('location:danhsach.php');
    }
    
    else
    {
        echo '<script language="javascript">';
        echo 'alert("chức năng $action  chưa viết ")';
        echo '</script>';
        echo '<a style="color:red" href="nhanviencu.php">Trở lại</a>';
        
    }
?>