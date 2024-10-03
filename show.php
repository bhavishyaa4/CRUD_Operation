<?php
include 'link.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CURD OPERATION</title>
    <link rel="stylesheet" href="show.css">
</head>
<body>
    <div class ="show">
        <button class="start"> <a href="./user.php">ADD USER</a></button>
        <table border="2">
  <thead>
    <tr>
      <th>ID</th>
      <th>NAME</th>
      <th>EMAIL</th>
      <th>ADDRESS</th>
      <th>MOIBLE</th>
      <!-- <th>PASSWORD</th> -->
      <th>OPERATION</th>
    </tr>
  </thead>
  <tbody>
    <?php
            $sql="Select * from `CURD`";
            $result=mysqli_query($con,$sql);
            if($result){
               while($row=mysqli_fetch_assoc($result)){
                $id=$row['ID'];
                $name=$row['NAME'];
                $email=$row['EMAIL'];
                $address=$row['ADDRESS'];
                $mobile=$row['MOBILE'];
                // $password=$row['PASSWORD'];
                echo '<tr>
                <th>'.$id.'</th>
                <td>'.$name.'</td>
                <td>'.$email.'</td>
                <td>'.$address.'</td>
                <td>'.$mobile.'</td>
                <td>
                <button class="update"><a href="./update.php?updateid='.$id.'">UPDATE</a></button>
                <button class="delete"><a href="./delete.php?deleteid='.$id.'">DELETE</a></button>
            </td>
              </tr>';
               }
            }
    ?>
  </tbody>
</table>
</div> 
</body>
</html>