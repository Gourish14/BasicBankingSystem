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
//sender
$name = $_SESSION['Name'];
$q="select * from user where name='$name'";
$result=mysqli_query($con,$q);
$row=mysqli_fetch_array($result);
$from=$row['Name'];
$var1 =$row['Amount'];
//Reciever
$to=$_POST['reciever'];
$q1="select * from user where name='$to'";
$result1=mysqli_query($con,$q1);
$row1=mysqli_fetch_array($result1);
$var2=$row1['Amount'];
session_destroy();
if($var1 >= $_POST["transfer"])
{
    //update in users table
    $sub=$var1-$_POST["transfer"];
    $q="update user set amount='$sub' where name='$from' ";
    $result=mysqli_query($con,$q);

    $sum=$var2+$_POST["transfer"];
    $q="update user set amount='$sum' where name='$to' ";
    $result=mysqli_query($con,$q);

    //update in mini_statement table
    $c=$_POST["transfer"];
    $q="insert into statement(sender , Reciever , amount)
    values('$from','$to','$c')";
    $result=mysqli_query($con,$q);

    include 'getdetails.php';
    $message="Transfer Successfull";
    echo "<script type='text/javascript'>
          alert('$message');
          </script>";

}
else
{
	include 'getdetails.php';
    $message="Insufficient Balance";
   echo"<script type='text/javascript'>
   alert('$message');
   </script>";
}
?>