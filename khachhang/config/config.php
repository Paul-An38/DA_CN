<?php
try{
    $obj=new PDO("mysql:host=localhost;dbname=noithat",'root','');
    $obj->query("set names utf8");
}catch(Exeption $e){
    echo $e->getMessage('chua kêt nối');
}
    

?>