<?php
   session_start();
   $server="localhost";
   $username="root";
   $password="";
   $db="bank";
   $con=mysqli_connect($server,$username,$password,$db);
   //check connection
   if(! $con)
   {
       die("Connection failed due to".mysqli_connect_error());
   }
$q="select * from user";
$result = mysqli_query($con,$q);
$row_count=mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Customers</title>
    <link rel="stylesheet" href="table.css">
</head>
<body>
<img src="bank.jpg" alt="Bank">
<br>
<a href="index.php">
<input type="image" src="homebutton.jpg" class="home"/>
</a>
<br><h1>Customers</h1>
    <table>
       <thead>
           <th>ID</th>
           <th>Name</th>
           <th>Email</th>
           <th>Amount</th>
           <th></th>
       </thead>
       <tbody>

       <?php
       for ($i=0;$i<mysqli_num_rows($result);$i++){
       ?>
           <tr>
               <?php
               $row=mysqli_fetch_array($result);
               ?>
               <td> <?php echo $row["ID"]; ?> </td>
               <td> <?php echo $row["Name"]; ?> </td>
               <td> <?php echo $row["Email"]; ?> </td>
               <td> <?php echo $row["Amount"]; ?> </td>
               <td>
                   <form action="user.php" method="post">
                       <button type="submit" name="name" value="<?php echo $row['Name']; ?>" class="view">View</button>
                   </form>
               </td>
          </tr>   
        
        <?php
       }
       ?>
        </tbody>
    </table>
</body>
</html>
© 2021 GitHub, Inc.