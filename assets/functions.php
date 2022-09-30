<?php
session_start();

include "db.php";

// Error message variables
$e_message = '';
$e_icon = '';
$e_text = '';


// user login  function  

if (isset($_POST["login"])) {

  $email = $_POST['email'];
  $password = $_POST['password'];

  $stmt = $con->prepare("select * from users where email=?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt_result = $stmt->get_result();

  if ($stmt_result->num_rows > 0) {
    $data = $stmt_result->fetch_assoc();

    if ($data['password'] === $password) {
      $_SESSION["ID"] = $data['id'];
      $_SESSION["Email"] = $data['email'];
      $_SESSION["First_Name"] = $data['firstName'];
      $_SESSION["Address"] = $data['address'];
      $_SESSION["Telephone"] = $data['telephone'];

      $e_message = 'Welcome  ';
      $e_message .= $_SESSION["First_Name"];
      $e_icon = 'success';
      $e_text = 'Have a Nice Day!';
    } else {
      $e_message = 'Password is mismatched';
      $e_icon = 'error';
      $e_text = 'Please provide valid password for ';
      $e_text .= $email;
    }
  } else {
    $e_message = $email;
    $e_message .= '>> not registered ';
    $e_icon = 'question';
    $e_text = 'If you do not have an account please sign up ! ';
  }
}


// user Registration   function  

else if (isset($_POST['signup'])) {
  $firstName = $_POST["uname"];
  $email = $_POST["email"];
  $password = $_POST["psw"];

  $stmt = $con->prepare("select * from users where email=?");
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt_result = $stmt->get_result();

  if ($stmt_result->num_rows > 0) {
    echo "user exixt";
  } else {
    $sql = "INSERT INTO users (firstName,email,password) VALUES (?,?,?)";
    $stmnt = $con->prepare($sql);
    $result = $stmnt->execute([$firstName, $email, $password]);

    if ($result) {
      $e_message = 'New User registered  successfully ';
      $e_icon = 'success';
      $e_text = 'Please login with your Creditionals  ';
    } else {
      $e_message = 'Error in User Registration  ';
      $e_icon = 'error';
      $e_text = 'Welcome to CRAFIRA! ';
    }
  }
}


// Product add to cart function 


else if (isset($_POST['add'])) {

  $e_message = 'Product Added to the cart  ';
  $e_icon = 'success';
  $e_text = 'click on cart icon to view chosen items ! ';

  if (isset($_SESSION["cart"])) {
 
    $item_array_id = array_column($_SESSION["cart"], "product_id");
  

    if (!in_array($_GET["id"], $item_array_id)) {
      $count = count($_SESSION["cart"]);
      
      $item_array = array(
        'product_id' => $_GET["id"],
        'item_name' => $_POST["hidden_name"],
        'product_price' => $_POST["hidden_price"],
        'item_quantity' => $_POST["quantity"],
        'item_src' => $_POST["hidden_src"],
        
      );

    
      $_SESSION["cart"][$count] = $item_array;

    } else {
      $e_message = 'Product Is Already added to the cart !';
      $e_icon = 'warning';
      $e_text = 'If you want to increase quantity simply remove it and again add it. ';
    }
  } else {
    $item_array = array(
      'product_id' => $_GET["id"],
      'item_name' => $_POST["hidden_name"],
      'product_price' => $_POST["hidden_price"],
      'item_quantity' => $_POST["quantity"],
      'item_src' => $_POST["hidden_src"],
    );
    $_SESSION["cart"][0] = $item_array;
  }
} elseif (isset($_GET["action"])) {

  // cart items removing work in here 
  if ($_GET["action"] == "delete") {

    foreach ($_SESSION["cart"] as $keys => $value) {
      if ($value["product_id"] == $_GET["id"]) {

        unset($_SESSION["cart"][$keys]);
        $e_message = 'Product Removed from cart successfully  ';
        $e_icon = 'success';
        $e_text = ' ';
      }
    }
  }

  // user product chekcout  function <upcomming feature>

  // } else if (isset($_POST["checkout_proceed"])) {
  //   if (isset($_SESSION['ID'])) {
  //     $address = $_POST["address"];
  //     $city = $_POST["city"];
  //     $province = $_POST["province"];
  //     $postal = $_POST["postal"];

  //     $stmt = $con->prepare("select * from users where id=?");
  //     $stmt->bind_param("s", $_SESSION['ID']);
  //     $stmt->execute();
  //     $stmt_result = $stmt->get_result();
  //     if ($stmt_result->num_rows > 0) {
  //       $sql = "INSERT INTO users (address,telephone) VALUES (?,?)";
  //       $stmnt = $con->prepare($sql);
  //       $result = $stmnt->execute([$address, $postal]);
  //       if ($result) {

  //       }
  //     }
  //   }



  //user logout function 

} else if (isset($_GET["logout"])) {

  if (isset($_SESSION['ID'])) {
    $e_message = 'See you again  \n';
    $e_message .= $_SESSION["First_Name"];
    $e_icon = 'success';

    unset($_SESSION["ID"]);
    unset($_SESSION["Email"]);
    unset($_SESSION["First_Name"]);
    unset($_SESSION["Address"]);
    unset($_SESSION["Telephone"]);
  }

  // user search  function  
} else if (isset($_POST['input'])) {

  $input = $_POST['input'];
  $query = "SELECT * FROM products WHERE p_name LIKE '{$input}%' OR p_category LIKE '{$input}%' ";
  $result = mysqli_query($con, $query);

  if (mysqli_num_rows($result) > 0) {
?>
    <link rel="stylesheet" href="css/search.css">
    <div class="card-container row  ">

      <?php
      while ($row = mysqli_fetch_assoc($result)) {

      ?>
        <div class="col s6 m4 l3">
          <a call_type="product" class=" card btn_load_screen " p_atr='<?php echo $row['p_id']; ?> '>
            <div class="card-container-inner ">
              <img class="img" src='<?php echo $row['p_src']; ?>/1.jpg ' height="200px" width="200px" alt="">
              <div class="title-div">'<?php echo $row['p_name']; ?></div>
              <span class="price-span">US $<h2 class="price-label">'<?php echo $row['p_price']; ?></h2></span>
            </div>
          </a>
        </div>
      <?php
      }
      ?>
      <div class="col  ">
        <h5><strong>Recent serches</strong></h5>
        <ul style="border:1px solid black ;">
          <?php
          $query = $con->prepare("SELECT * FROM products ORDER BY p_id ASC");
          $query->execute();
          $result = $query->get_result();

          if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_array($result)) {

          ?>
              <li>
                <hr>
                <p><?php echo $row['p_name']; ?></p>
              </li>
          <?php
            }
          }
          ?>
        </ul>
      </div>


  <?php
  } else {
    echo '<h1 class="center"> No result Found</h1> ';
  }
}
  ?>
    </div>

