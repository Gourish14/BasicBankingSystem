<?php
   session_start();
   $server="localhost";
   $username="root";
   $password="";
   $db="bank";
   $con=mysqli_connect($server,$username,$password,$db);
   if(! $con)
   {
       die("Connection failed due to".mysqli_connect_error());
   }
   $name=$_POST['name'];
   $_SESSION['Name']=$name;
   if($name==null)
    $name=$_SESSION['Name'];
   $q="select * from user where Name='$name';";
   $result = mysqli_query($con,$q);
   $row_count=mysqli_num_rows($result);
   $row=mysqli_fetch_array($result);
   $id=$row['ID'];
   $mail=$row['Email'];
   $amount=$row['Amount'];
   $_SESSION['Name']=$name;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $name ?></title>
    <link rel="stylesheet" href="table.css">
</head>
<body>
<img src="bank.jpg" alt="Bank">
<br>
<a href="index.php">
<input type="image" src="homebutton.jpg" class="home"/></a>
<h1>Customer Details</h1>
<br><br><br>
<table>
      <thead>
           <th>ID</th>
           <th>Name</th>
           <th>Email</th>
           <th>Amount</th>
       </thead>
       <tbody>
           <tr>
               <?php
               $row=mysqli_fetch_array($result);
               ?>
               <td style="width:50px";> <?php echo $id ?> </td>
               <td> <?php echo $name?> </td>
               <td> <?php echo $mail ?> </td>
               <td> <?php echo $amount ?> </td>
          </tr>   
       </tbody>  
</table>
<br><br><br>
<a href="transferto.php">
<button class="transferto" href="transferto.php">Transfer To</button></a>
<br>
<a href="getdetails.php">
<button class="transferto" href="getdetails.php">Back</button></a>
</body>
</html>