<?php
include 'link.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql="delete from `CRUD` where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        // echo "DELETED SUCESSFULLY..";
        header('location:show.php');
    }else{
        die(mysqli_error($conn));
    }
}
?>