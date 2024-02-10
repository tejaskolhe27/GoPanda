<?php

include_once "dbcon.php";
$img = $_POST['img'];
$pname=$_POST['pname'];
$category=$_POST['category'];
$price=$_POST['price'];
$pcode=$_POST['pcode'];


$sql="insert into product values(NULL,'$pname','$price','1','$img','$pcode','$category')";


//echo"$img,$pname,$category,$price";
$result = mysqli_query($conn,$sql);
$cnt = mysqli_num_rows($result);


if($sql)
{
	echo ("<script LANGUAGE='JavaScript'>
    window.alert('Succesfully Added');
    window.location.href='admin_chart.html';
    
    </script>");
}
else{
	echo ("<script LANGUAGE='JavaScript'>
    window.alert('NOT ADDED');
    window.location.href='admin_chart.html';
    
    </script>");
}
?>
