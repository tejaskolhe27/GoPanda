<?php

include_once "dbcon.php";
$pname=$_POST['pname'];
$pprice=$_POST['pprice'];
$pimg=$_POST['pimg'];
$pdetails=$_POST['pdetails'];
$shop=$_POST['shop'];


$sql="insert into fruits values ('$shop','$pname','$pdetails','$pprice','$pimg')";





$result = mysqli_query($conn,$sql);
$cnt = mysqli_num_rows($result);

if($sql)
{

echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Added');
    window.location.href='admin_fruits_vegetables.html';
    
    </script>");
}

else
echo ("<script LANGUAGE='JavaScript'>
    window.alert('Failed To Add ');
    window.location.href='admin_fruits_vegetables.html';
    
    </script>");

?>