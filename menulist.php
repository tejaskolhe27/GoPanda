<html>
<title>Fudophia</title>
<link rel="shortcut icon" href="logo.png">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2">
<style>


*{
  margin:0;
  padding:0;
  font-family:verdana;
}
#abc{
  width:100%;
  height:100vh;
  background-image: url(img2.jpg);
  background-size: cover;
}
nav{
  width: 100%;
  height: 50px;
  background-color: #0005;
  line-height: 50px;
  position:fixed;
}
nav ul{
  float: right;
  margin-right: 30px;
}
nav ul li{
  list-style-type: none;
  display: inline-block;
  transition: 0.7s all;
}
nav ul li:hover{
  background-color:#088;
}
nav ul li a{
  text-decoration: none;
  color: #fff;
  padding: 30px;
}


.save{
	width:65px;
	height:35px;
	cursor:pointer;	
}

.save:hover{
	background-color:green;
	color:white;
}


.box{
border-style:solid;
border-radius: 10px;
border-color:#f5f3f0;
height:40px;
width:350px;



}

.box:hover{
height:40px;
border-color:43A422;


}

button.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 30%;
  heigth:70%;  /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
cursor: pointer;}
  
.menu{
	background-color:#fce8e8;
	height:160px;
	width:600px;
  border: 2px solid #ffa8a8;
  padding: 10px;
  border-radius: 50px 20px;
	
}

.menuphoto{	
	height:160px;
	width:100px;
	float:left;
	}
	
.menuname{
	
	font-family: 'Amatic SC', cursive;
	height:50px;
	width:300px;
	float:left;
	font-size:23px;
	
}
.description{
	font-family:'Amatic SC',cursive;
	color:#9a989e;
	height:50px;
	width:300px;
	float:left;
	font-size:17px;
}
.price{
	height:80px;
	width:200px;
	float:right;
	font-family: 'Amatic SC', cursive;
	font-size:25px;
}
mark{
	background-color:#aeb58d;
	border-radius:9px;
}

</style>
</head>
<body>


	

<?php
session_start();
  if(isset($_SESSION['adminuser'])){
   $u_name=$_SESSION['adminuser'];
}

include"../../dbcon.php";

$sql="select * from users where uid='$u_name'";


$result = mysqli_query($conn,$sql);
$cnt = mysqli_num_rows($result);
?>
    <nav>
        <ul>
            <li><a href="restromain.php">Home</a></li>
            <li><a href="order.php">ORDERS</a></li>
   
        </ul>
    </nav>
<?php 
while($row=mysqli_fetch_array($result)) 
{ 
echo "
<center>
<img src=".$row['res_image']."  width='1600' height='900'/>
</center>
";
}

?>
<!------------------------------------------------------  FORM Panel ---------------------------------------------------------------- -->

			
<div id="id01" class="modal">

<center>  
  <form class="modal-content animate" action="../addmenu.php" method = "Post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</button>
    </div>
	
								<label><b style="font-family:georgia; font-size:25px;">MENU LIST<b></label><br><br>
								
								<input  type="hidden" name="id">
								
								
								<input  type="hidden" name="uid"><br>
								
									<?php
									$sql="insert into category_list where uid='$u_name'";

								$result = mysqli_query($conn,$sql);			
								$cnt = mysqli_num_rows($result);
								?>
							     
								<input class="box" placeholder ="MENU NAME"  type="text"  name="name"><br><br>
						
								<textarea class="box" placeholder ="WRITE DISCRIPTION ..." cols="30" rows="3" name="description"></textarea><br><br>

								<select  class="box"  name="category_id" id="" >
									<option value="0">SELECT CATEGORY</option>
									<?php
									$cat = $conn->query("SELECT * FROM category_list order by name asc ");
									while($row=$cat->fetch_assoc()):
									?>
									<option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
									<?php endwhile; ?>
								</select><br><br>
								

								<input class="box" placeholder ="ENTER PRICE"  type="number" name="price" step="any"><br><br>


								<input  type="file" name="img" onchange="displayImg(this,$(this))">					
								<img src="<?php echo isset($image_path) ? '..img/'.$cover_img :'' ?>" alt="" id="cimg"><br><br>
								
								<button  class="save" type="submit" >SUBMIT </button>
	  
  </form>
</div>
</center>
	
	<!------------------------------------------------------  FORM Panel ---------------------------------------------------------------- -->
<br><br><br><br>
	<!------------------------------------------------------  Table Panel --------------------------------------------------------------- -->
<!-- <center>
						<table>
							<thead>
								<tr>
									<th>#</th>
									<th>Img</th>
									<th>Name</th>
									<th>Description</th>
									<th>Price</th>
									
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$cats = $conn->query("SELECT * FROM product_list order by id asc");
								while($row=$cats->fetch_assoc()):
								?>
								<tr>
									<td style = "text-align:center;"><?php echo $i++ ?></td>

								
									<td>
										<img src="<?php echo isset($row['img_path']) ? '../assets/img/'.$row['img_path'] :'' ?>" alt="" id="cimg">
									</td>
									<td class="">
										<p><b><?php echo $row['name'] ?></b></p>
									</td>
									
									<td>
										<p><b class="truncate"><?php echo $row['description'] ?></b></p>
									</td>
									
									<td>
										<p><b><?php echo "Rs.".number_format($row['price'],2) ?></b></p>
									</td>
									<td>
										<button type="button" data-id="<?php echo $row['id'] ?>" data-name="<?php echo $row['name'] ?>" data-status="<?php echo $row['status'] ?>" data-description="<?php echo $row['description'] ?>" data-price="<?php echo $row['price'] ?>" data-img_path="<?php echo $row['img_path'] ?>">Edit</button>
										<button type="button" data-id="<?php echo $row['id'] ?>">Delete</button>
									</td>
								</tr>
								<?php endwhile; ?>
							
									
							</tbody>
					</table>
<button onclick="document.getElementById('id01').style.display='block'" class="getlogin">ADD MENU</button></center> -->					
<!------------------------------------------------------  Table Panel --------------------------------------------------------------- -->
<!-- -----------------------------------------------------menu ---------------------------------------------------------------- -->
<?php 
	$i = 1;
	$cats = $conn->query("SELECT * FROM product_list order by id asc");
	while($row=$cats->fetch_assoc()):
	?>
<center>
<div class ="menu">
		<div class="menuphoto">
		<br><br>
			<img src = "<?php echo isset($row['img_path']) ? '../assets/img/'.$row['img_path'] :'' ?>" height="80">
		</div>
		
		<div class = "menuname">
			<h2><?php echo $row['name'] ?></h2>
		</div>
		<br><br><br>
		<div class ="price">
			<mark><?php echo "Rs.".number_format($row['price'],2) ?></mark>
		</div>
		<br>
		<div class="description">
			<p><?php echo $row['description'] ?><p>
		</div>
		
</div>
<br>
<?php endwhile; ?>

<button onclick="document.getElementById('id01').style.display='block'" class="getlogin">ADD MENU</button></center>	
</center>
	</body>
<script>
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</html>