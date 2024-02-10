<!DOCTYPE html>
<html lang="en">
<style>
.category{

box-sizing: content-box;
width: 260px;
height: 200px;
padding-top:1.75em;
padding-right:1.75em;
padding-bottom:1.75em;
padding-left:1.75em; 
border-radius:8px;
}

img{
border-radius:8px;
}
.abo{
margin-left:50px;

}


</style>
    <head>
        <meta charset="utf-8">
        <title>GoPanda</title>
		<link rel="shortcut icon" href="img/logo2.png">
		
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
		
       

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Nunito:600,700" rel="stylesheet"> 
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
       

       
        <link href="css/style1.css" rel="stylesheet">
    </head>

    <body>
	
	<?php
session_start();
  if(isset($_SESSION['adminuser'])){
   $u_name=$_SESSION['adminuser'];
}

include_once "dbcon.php";


$sql="select * from users where uid='$u_name'";

$result = mysqli_query($conn,$sql);
$cnt = mysqli_num_rows($result);

?>
	
	 <!-- Nav Bar Start -->
        <div class="navbar navbar-expand-lg bg-light navbar-light">
            <div class="container-fluid">
				<img class="img-fluid" src="img/logo2.png" style="height:50px;width:50px;">
                <a href="menu.html" class="navbar-brand">Go<span>Panda</span></a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto">
					<a href="checkout.php" class="nav-item nav-link" data-toggle="modal" data-target="#signupPage">Checkout</a>
                      <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
					
                     <a href="mainpage.html" class="nav-item nav-link">Logout <i class="fas fa-sign-out-alt" aria-hidden="true"></i></a>
					 <?php  echo"<img src=".$row['res_image']."  class = 'img'/>";?>
					    
                    </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Nav Bar End -->
		<br><br><br><br>
		<div class="abo">
		<center>
		<p style="color:#171511; font-family:georgia;">Why step out when you can get everything delivered home with the tap of a button? Your favourite delivery app gets you Food,<br>
		Grocery,Pet Supplies, Fruits & Vegetables, Meat & Fish and Send Packages from one end of the city to the other.<br> 
		From your local kirana stores to your favourite brands, grocery shopping to your forgotten charger, we are always<br>
		on the move for you. Why worry about your chores, when you can get it all GoPanda!!
		</p></center></div>
	
    <center><div>
 
		<div>
				
				<a href="groceries.php">
				<img  alt="Groceries" src="img/Groceries & Essential.png" class="category" >
				</a>
				
				<a href="fruits.php">
				<img  alt="fruits" src="img/Fruits & Vegitable.png" class="category" >
				</a>
			
				<a href="restro.php">
				<img  alt="restro" src="img/Restaurants.png" class="category" >
				</a>
		</div>	
		<div>
				<a href="meat.php">
				<img  alt="meat" src="img/meat.png" class="category">
				</a>
			
				<a href="pet.php">
				<img  alt="Pet Supplies" src="img/Pet Supplies.png" class="category" >
				</a>
		</div>	
	</div></center>
 
<br><br>
 <center>
            <div class="copyright">
                <div class="container">
                    <p>Copyright &copy; <a href="#">GoPanda</a>, All Right Reserved.</p>
                
                </div>
            </div></center>
   
	

 
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
      
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
		  <script type="text/javascript">
  $(document).ready(function() {

    // Send product details in the server
    $(".addItemBtn").click(function(e) {
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var pid = $form.find(".pid").val();
      var pname = $form.find(".pname").val();
      var pprice = $form.find(".pprice").val();
      var pimage = $form.find(".pimage").val();
      var pcode = $form.find(".pcode").val();

      var pqty = $form.find(".pqty").val();

      $.ajax({
        url: 'action.php',
        method: 'post',
        data: {
          pid: pid,
          pname: pname,
          pprice: pprice,
          pqty: pqty,
          pimage: pimage,
          pcode: pcode
        },
        success: function(response) {
          $("#message").html(response);
          window.scrollTo(0, 0);
          load_cart_item_number();
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>
    </body>
</html>
