<?php

include_once "dbcon.php";

$u_name=$_POST['uname'];
$u_pass=$_POST['pass'];

session_start();
$_SESSION['adminuser']=$u_name;

//echo "Form Data ".$u_name." ".$u_pass."<br>";



$sql="select * from users where uid='$u_name' and pwd='$u_pass' and u_type='adm' ";

$result=mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);


//echo "Database Data ".$row['uid']." ". $row['pwd']." ". $row['u_typ'];

if($row['uid'] !='' or $row['uid'] != null)
{
	
	header("location:admin_chart.html");
}
else
{
	echo ("<script LANGUAGE='JavaScript'>
    window.alert('Failed');
    window.location.href='mainpage.html';
	</script>");
}



?>