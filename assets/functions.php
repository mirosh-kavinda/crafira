<?php
session_start();

// include database 
include "db.php";

// Error message variable initialize
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
      $_SESSION["u_address"] = $data['address'];

      $e_message = 'Welcome to the Crafira \n';
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
    $e_message = 'User Already Exist!';
    $e_icon = 'error';
    $e_text = 'Please login to the system  using creditionals ';
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

  //Cart item removal happen here 
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


  // user product chekcout and update customer address  function 
} else if (isset($_POST["cart-checkout"])) {

  $tot = $_SESSION["total"];
  $address = $_POST["addressl1"];
  $city = $_POST["city"];
  $province = $_POST["province"];
  $postal = $_POST["postal"];
  $phone_no = $_POST["phone_no"];
  $add_str = $address . $province . $city . $postal;

  //check whether user log in to system 
  if (isset($_SESSION['ID'])) {
    $user = $_SESSION['ID'];
    $user_name = $_SESSION['First_Name'];

    //check whether user already save contact information
    if ($_SESSION["u_address"]) {
      $add_str = $_SESSION["u_address"];
    } else {

      // update the users table address
      $sql = "UPDATE users SET address=? ,telephone=? WHERE id=?";
      $stmt = $con->prepare($sql);
      $stmt->bind_param("ssi", $address, $phone_no, $user);
      $stmt->execute();
    }
  } else {
    $user_name = $_POST["f_name"];
    $user = rand(110, 1000);
  }
  //update the cart table anonyomous user has random number and registered user has exact user-id number 
  $sql = "INSERT INTO cart (total,userId,c_address,phone_no,c_name) VALUES (?,?,?,?,?)";
  $stmnt = $con->prepare($sql);
  $result = $stmnt->execute([$tot, $user, $add_str, $phone_no, $user_name]);

  if ($result) {
    unset($_SESSION["cart"]);
    $e_message = ' Order Placed Succesfully ';
    $e_icon = 'success';
  }
}

//user logout function 
else if (isset($_GET["logout"])) {

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
}

// cart clear function
else if (isset($_GET["clear-checkout"])) {
  unset($_SESSION["cart"]);
}
