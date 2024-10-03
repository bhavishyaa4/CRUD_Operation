<?php
include 'link.php';
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $mobile=$_POST['mobile'];
    $password=$_POST['password'];
    $error = array();
    $u = "SELECT email FROM CURD WHERE email = '$email'";
    $uu = mysqli_query($con,$u);
    if(empty($name)){
        $error['rname'] = "Username Is Required!!";
    }
    if(empty($email)){
        $error['remail'] = "Email Is Required!!";
    }
    if(empty($address)){
        $error['raddress'] = "Address Is Required!!";
    }
    if(empty($mobile)){
      $error['rmobile'] = "Mobile No Is Required!!";
  }
  if(empty($password)){
    $error['rpassword'] = "Password Is Required!!";
}
  if(count($error) == 0){
    $sql="insert into  `CURD` (name,email,address,mobile,password) values('$name','$email', '$address', '$mobile', '$password')";
    $result=mysqli_query($con,$sql);
    if($result){
        // echo "DATA HAS BEEN INSERTED SUCESSFULLY..";
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
    <title>CRUD OPERATION</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="container">
    <form method="post">
  <div class="form-group">
    <label>NAME</label>
    <input type="text" class="form-control" placeholder="ENTER YOUR NAME" name="name" autocomplete="off" value="">
    <p class="require">
            <?php
            if(isset($error['rname'])){
                echo $error['rname'];
            }
            ?>
        </p>
</div>
<div class="form-group">
    <label>EMAIL</label>
    <input type="email" class="form-control" placeholder="ENTER YOUR EMAIL" name="email"autocomplete="off"value="">
    <p class="require">
            <?php
            if(isset($error['remail'])){
                echo $error['remail'];
            }
            ?>
        </p>

</div>
<div class="form-group">
    <label>ADDRESS</label>
    <input type="text" class="form-control" placeholder="ENTER YOUR ADDRESS" name="address"autocomplete="off">
    <p class="require">
            <?php
            if(isset($error['raddress'])){
                echo $error['raddress'];
            }
            ?>
        </p>
</div>
<div class="form-group">
    <label>MOBILE</label>
    <input type="text" class="form-control" placeholder="ENTER YOUR NUMBER" name="mobile"autocomplete="off"value="">
    <p class="require">
            <?php
            if(isset($error['rmobile'])){
                echo $error['rmobile'];
            }
            ?>
        </p>
</div>
<div class="form-group">
    <label>PASSWORD</label>
    <input type="password" class="form-control" placeholder="ENTER YOUR PASSWORD" name="password"autocomplete="off">
    <p class="require">
            <?php
            if(isset($error['rpassword'])){
                echo $error['rpassword'];
            }
            ?>
        </p>
</div>
<div class ="form-footer">
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</div>
</form>
    </div>
  </body>
</html>