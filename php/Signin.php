
<?php
session_start();
include "db.php";
$userLoged=0;
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
        $userLoged=1;
        $_SESSION["ID"] = $data['id'];
        $_SESSION["Email"] = $data['email'];
        $_SESSION["First_Name"] = $data['firstName'];
        $_SESSION["Address"] = $data['address'];
        $_SESSION["Telephone"] = $data['telephone'];
        
      } else {
        echo '<script>alert("Invalid password Try again !")</script>';
      }
    } else {
      echo '<script>alert("Invalid email or password !")</script>';
    }
  }else if (isset($_POST['signup'])) {
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
      $userLoged=1;
      echo '<script>alert("New User registered  successfully")</script>';
    } else {
      echo '<script>alert("Error in record creation!")</script>';
    }
  }
 }

if ($userLoged){
  echo '<style>#signout{display:block !important;}</style>';
  echo '<style>#signin{display:none !important;}</style>';

}

?>