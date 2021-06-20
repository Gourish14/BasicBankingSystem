<?php
session_start();
$server="localhost";
$username="root";
$password="";
$db="bank";
$con=mysqli_connect($server,$username,$password,$db);
if(! $con)
{
    die ("Connection failed due to".mysqli_connect_error());
}
$name1 = $_SESSION['Name'];
$q="select * from user where name not like '$name1'";
$result=mysqli_query($con, $q);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer</title>
    <link rel="stylesheet" href="transferto.css">
</head>
<body>
<img src="bank.jpg" alt="Bank">
<br>
<a href="index.php">
<input type="image" src="homebutton.jpg" class="home"/></a>
<br>
<h1>Transfer Amount</h1>
<div >
<form action="checktransfer.php" method="post">
  <table>
       <tr class="data">
          <td >
            <label for="sender" style:align="left">Reciever Name:</label>
            </td>
            <td>
               <select name="reciever" style="width:230px; height:28px; cursor:pointer; font-size:medium">
               <?php while($row =  $result->fetch_assoc()) {  ?>
               <option value="<?php echo $row['Name']; ?>"> <?php echo $row['Name']; ?>  </option>
               <?php } ?>
            </select>
          </td>
       </tr>
       <br>
       <tr>
          <td>
              <label for="transfer" >Amount:</label>
          </td>
          <br><br>
          <td>
              <input type="number" name="transfer" required style="width:223px; height:23px;">
          </td>
       </tr>
       <tr>
          <td>
                <button type="submit" value="credit"  class="view">Transfer</button>
          </td>
       </tr>
  </table>
</form>
</div>
<br>
<form action="user.php" method="post">
    <button type="submit" class="transferto" name="name" value=<?php echo $name1 ?>>
    Back
    </button>
</form>
</body>
</html>