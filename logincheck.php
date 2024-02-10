<?php
//echo "Hi...";
include_once "dbcon.php";

$u_name=$_POST['uname'];
$u_pass=$_POST['pass'];

session_start();
$_SESSION['adminuser']=$u_name;

$sql="select * from users where uid='$u_name' and pwd='$u_pass' and u_type='usr' ";

$result=mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);





if($row['uid'] !='' or $row['uid'] != null)
{
	header("location:menu.html");

}
else
{
	
echo ("<script LANGUAGE='JavaScript'>
    window.alert('login failed');
    window.location.href='mainpage.html';
</script>");
	
}



?>