<?php

include_once "dbcon.php";
$name = $_POST['name'];
$uname=$_POST['uname'];
$passw=$_POST['pass'];




$sql="insert into users values (NULL,'$name','$uname','$passw','NULL','NULL','NULL','usr',NULL,NULL,NULL)";
//$sql="insert into users values (NULL,'Tejas Kolhe','tejas','tejas123','tejas@123','7/e','7066','usr')";




$result = mysqli_query($conn,$sql);
$cnt = mysqli_num_rows($result);

if($sql)
{

echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Added');
    window.location.href='mainpage.html';
    
    </script>");
}

else
echo ("<script LANGUAGE='JavaScript'>
    window.alert('Failed To Add Account');
    window.location.href='mainpage.html';
    
    </script>");

?>


