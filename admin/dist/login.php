<?php
    
    if(isset($_SESSION))
    {
        unset($_SESSION);
        session_unset();
    } session_start();
    include '../../config/config.php';

    $user=isset($_POST['Username'])?$_POST['Username']:'';
    $pass=isset($_POST['Password'])?$_POST['Password']:'';

    if(!$user||!$pass)
    {
        echo "vui long nhap day du thong tin";exit;
    }
    else
    {
        $sql="SELECT * from quantri  where Username=? and Passwords=? ";
        $stm=$obj->prepare($sql);
        $stm->execute([$user,$pass]);
        $data=$stm->fetch();

        if($data['quyen']=='1')//quản lý kinh doanh quyền bằng 1
        {
            $_SESSION['quanlykinhdoanh']=$data;
            header('location:quanlykinhdoanh/quanlykinhdoanh.php');
        }
        if($data['quyen']=='2')
        {
            $_SESSION['quanlymarketting']=$data;
            header('location:quanlymarketting/quanlymarketting.php');
        }
        if($data['quyen']=='boss')
        {
            $_SESSION['boss']=$data;
            header('location:boss/index.php');
        }
        else
        {
            echo "Tài khoản không tồn tại";exit;
        }



    }
