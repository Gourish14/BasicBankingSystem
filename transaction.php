<?php
session_start();
$server="localhost";
$username="root";
$password="";
$db="bank";
$port=3306;
$con=mysqli_connect($server,$username,$password,$db,$port);
if(! $con)
{
    die ("Connection failed due to".mysqli_connect_error());
}
$q="select * from statement;";
$result=mysqli_query($con,$q);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transactions</title>
    <link rel="stylesheet" href="table.css">
</head>
<body>
<img src="bank.jpg" alt="Bank">
<br>
<a href="index.php">
<input type="image" src="homebutton.jpg" class="home"/></a>
<h1>Transactions</h1>
<br><br>
<table>
   <thead>
      <th>ID</th>
      <th>SENDER</th>
      <th>RECIEVER</th>
      <th>AMOUNT</th>
   </thead>
   <tbody>
       <tr>
          <?php while($row = mysqli_fetch_array($result)) { ?>
         <td style="width:52px;"> <?php echo $row['ID']; ?></td>
         <td> <?php echo $row['Sender']; ?></td>
         <td><?php echo $row['Reciever']; ?></td>
         <td><?php echo $row['Amount']; ?></td>
     </tr>
     <?php } ?>
    </tbody>
</table>
</body>
</html>