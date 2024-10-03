<?php
$severname = "localhost";
$username = "root";
$password = "";
$dbname = "new";

$conn = mysqli_connect($severname, $username, $password, $dbname);
if(!$conn) {
            die(mysqli_error($con));
}else{
    // echo"connected sucessfully";
}
?>
