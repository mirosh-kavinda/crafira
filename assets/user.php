
<?php
session_start();
include "db.php";


// registered users login snipet 
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
    } else {
      // echo "<script> M.toast({html: ''});</script>";


    }
  } else {
    // echo "<script> M.toast({html: 'Invalid email or password !'});</script>";
    echo "<script> Materialize.toast({html: 'I am a toast!'})</script>";
  }
}

// new users register snipet 
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

      echo '<script>alert("New User registered  successfully")</script>';
    } else {
      echo '<script>alert("Error in record creation!")</script>';
    }
  }
}
// Product add to cart function work in here
else if (isset($_POST['add'])) {
  if (isset($_SESSION["cart"])) {
    $item_array_id = array_column($_SESSION["cart"], "product_id");
    echo '<style>#badge{display:block !important;}</style>';

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
      echo '<script>alert("Product is succesfully added to cart")</script>';
    } else {
      echo '<script>alert("Product is already Added to Cart")</script>';
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
        echo '<script>alert("Product has been Removed...!")</script>';
      }
    }
  }
} else if (isset($_POST["checkout_proceed"])) {
  if (isset($_SESSION['ID'])) {
    $address = $_POST["address"];
    $city = $_POST["city"];
    $province = $_POST["province"];
    $postal = $_POST["postal"];

    $stmt = $con->prepare("select * from users where id=?");
    $stmt->bind_param("s", $_SESSION['ID']);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if ($stmt_result->num_rows > 0) {
      $sql = "INSERT INTO users (address,telephone) VALUES (?,?)";
      $stmnt = $con->prepare($sql);
      $result = $stmnt->execute([$address, $postal]);
      if ($result) {

        echo '<script>alert("hello")</script>';
      }
    }
  }
}


?>