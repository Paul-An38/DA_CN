<?php
    if(!isset($_SESSION)) session_start();

    include '../config/config.php';
    $thanhtoan=isset($_SESSION['thanhtoan'])?$_SESSION['thanhtoan']:[];
    //////gji du lieu vai don hang thanh cong////////
    ///////////////lay du lieu tu don hang////////////////////
    $sql="SELECT * FROM donhang";
    $stm=$obj->query($sql);
    $data=$stm->fetchALL();
    foreach($data as $k => $v)
    {
        $ma=$v['madonhang'];
        // echo "<br> $ma";
        $que="INSERT INTO chitiet_dh(madonhang) values('$ma')";
        $stmq=$obj->query($que);// ghi ma don hang vao chi tiet don hang
        //thong tin cua mang tanhtoan("masanpham"=>$data['masanpham'],"tensanpham"=>$data['tensanpham'],"gia"=>$data['gia'],"soluong"=>$v,"thanhtien"=>$v*$data['gia']);
               
        foreach($thanhtoan as $k =>$v)
        {
            $masp=$v['masanpham'];$soluong=$v['soluong'];$dongia=$v['gia'];
            $sqlc="INSERT INTO chitiet_dh(madonhang,masanpham,soluong,dongia) values('$ma','$masp','$soluong','$dongia')";
            $stmc=$obj->query($sqlc);
            
        }

    }
    
     unset($_SESSION['cart']);
     unset($_SESSION['thanhtoan']);