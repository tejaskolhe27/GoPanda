<!DOCTYPE html>
<html lang="en">
<style>


</style>
    <head>
        <meta charset="utf-8">
        <title>RESTRAURANT</title>
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
	
	    <!-- Nav Bar Start -->
    <div class="navbar navbar-expand-lg bg-light navbar-light">
        <div class="container-fluid">
            <img class="img-fluid" src="img/logo2.png" style="height:50px;">
            <a href="menu.html" class="navbar-brand">Go<span>Panda</span></a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto">

                    <a href="" class="nav-item nav-link active">Home</a>
					
					<div class="nav-item dropdown">
                            <a href="menu.html" class="nav-link dropdown-toggle active" data-toggle="dropdown">Category</a>
                            <div class="dropdown-menu">
                                <a href="groceries.php" class="dropdown-item">Groceries And Essential</a>
                                <a href="fruits.php" class="dropdown-item">Fruits And Vegetable</a>
                                <a href="meat.php" class="dropdown-item">Meat and Fishes</a>
								<a href="pet.php" class="dropdown-item">Pet Supplies</a>
                                
                            </div>
                        </div>
                    <a href="checkout.php" class="nav-item nav-link" data-toggle="modal" data-target="#signupPage">Checkout</a>
                      <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
					<a href="mainpage.html" class="nav-item nav-link">Logout <i class="fas fa-sign-out-alt" aria-hidden="true"></i></a>
					
                </div>
            </div>
        </div>
    </div>
    <!-- Nav Bar End -->
		<br><br><br><br>
		
		
<div>
<center><h4>RESTRAURANT</h4></center>
<br><br>

 <!-- Displaying Products Start -->
    <div class="container">
    <div id="message"></div>
    <div class="row mt-2 pb-3">
      <?php
  			include 'dbcon.php';
  			$stmt = $conn->prepare("SELECT * FROM product where cat_id='3'");
  			$stmt->execute();
  			$result = $stmt->get_result();
  			while ($row = $result->fetch_assoc()):
  		?>
      <div class="col-sm-6 col-md-4 col-lg-3 ">
        <div class="card-deck">
          <div class="card p-2 border-secondary mb-2">
            <img src="img/db/groceries/<?= $row['product_image'] ?>" class="card-img-top" width='80' height='150'>
            <div class="card-body p-1">
              <h4 class="card-title text-center text-info"><?= $row['product_name'] ?></h4>
              <h5 class="card-text text-center text-danger"><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?= number_format($row['product_price'],2) ?>/-</h5>

            </div>
            <div class="card-footer p-1">
              <form action="" class="form-submit">
                <div class="row p-2">
                  <div class="col-md-6 py-1 pl-4">
                    <b>Quantity : </b>
                  </div>
                  <div class="col-md-6">
                    <input type="number" class="form-control pqty" value="<?= $row['product_qty'] ?>">
                  </div>
                </div>
                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                <input type="hidden" class="pname" value="<?= $row['product_name'] ?>">
                <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                <input type="hidden" class="pimage" value="<?= $row['product_image'] ?>">
                <input type="hidden" class="pcode" value="<?= $row['product_code'] ?>">
                <button class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to
                  cart</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
  
  
  
  
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
		
		
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

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
