<?php
include 'link.php';
$id=$_GET['updateid'];
$sql="Select * from `CRUD` where id=$id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['name'];
$email=$row['email'];
$address=$row['address'];
$mobile=$row['mobile'];
$password=$row['password'];

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];
    $error = array();
    if(empty($name)){
        $error['rname'] = "Username Is Required!!";
    }
    if(empty($email)){
        $error['remail'] = "Email  Is Required!!";
    }
    if(empty($address)){
        $error['raddress'] = "Address Is Required!!";
    }
    if(empty($mobile)){
      $error['rmobile'] = "Mobile No Required!!";
  }
  if(empty($password)){
    $error['rpassword'] = "Password Is Required!!";
}
    if(count($error) == 0){
    $sql="update `CRUD` set id=$id,name='$name',email='$email',address='$address',mobile='$mobile',password='$password'where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        // echo "DATA HAS BEEN UPDATED SUCESSFULLY..";
        header('location:show.php');
    }else{
        die(mysqli_error($con));
    }
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UPDATE | CRUD</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <div class="container">
    <form method="post">
  <div class="form-group">
    <label>NAME</label>
    <input type="text" class="form-control" placeholder="ENTER YOUR NAME" name="name" autocomplete="off" value="<?php echo $name; ?>">
    <p class="require" style="color: red;">
            <?php
            if(isset($error['rname'])){
                echo $error['rname'];
            }
            ?>
        </p>
</div>
<div class="form-group">
    <label style="margin-bottom: 5%;">EMAIL</label>
    <input type="email" class="form-control" placeholder="ENTER YOUR EMAIL" name="email"autocomplete="off"value="<?php echo $email;?>">
    <p class="require" style="color: red;">
    <?php
            if(isset($error['remail'])){
                echo $error['remail'];
            }
            ?>
    </p>
</div>
<div class="form-group">
    <label>ADDRESS</label>
    <input type="text" class="form-control" placeholder="ENTER YOUR ADDRESS" name="address"autocomplete="off"value="<?php echo $address;?>">
    <p class="require" style="color: red;">
    <?php
            if(isset($error['raddress'])){
                echo $error['raddress'];
            }
            ?>
    </p>
</div>
<div class="form-group">
    <label>MOBILE</label>
    <input type="text" class="form-control" placeholder="ENTER YOUR NUMBER" name="mobile"autocomplete="off"value="<?php echo $mobile;?>">
    <p class="require" style="color: red;">
    <?php
            if(isset($error['rmobile'])){
                echo $error['rmobile'];
            }
            ?>
    </p>
</div>
<div class="form-group">
    <label>PASSWORD</label>
    <input type="password" class="form-control" placeholder="ENTER YOUR PASSWORD" name="password"autocomplete="off"value="<?php echo $password;?>">
    <p class="require" style="color:red;">
            <?php
            if(isset($error['rpassword'])){
                echo $error['rpassword'];
            }
            ?>
        </p>
</div>
  <button type="submit" class="btn btn-primary" name="submit">UPDATE</button>
</form>
    </div>
  </body>
</html>