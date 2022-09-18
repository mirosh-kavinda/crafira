<?php

$con=new mysqli("localhost","root","","Crafira");

if ($con->connect_error){
  die("Failed to connect  :" .$con->connect_error);
}
else{
  if (isset($_POST['signup'])){
    $firstName = $_POST["uname"];
    $email=$_POST["email"];
    $password = $_POST["psw"];
  

    $sql="INSERT INTO users (firstName,email,password) VALUES (?,?,?)";
    $stmnt=$con->prepare($sql);
    $result= $stmnt->execute([$firstName,$email,$password]);
   
    if ($result) {
        echo "New record created successfully";
      } else {
        echo "Error: ";
      }
}elseif(isset($_POST["login"])){

$email=$_POST['email'];
$password=$_POST['password'];

$con=new mysqli("localhost","root","","Crafira");
if ($con->connect_error){
    die("Failed to connect  :" .$con->connect_error);
}else{
    $stmt=$con->prepare("select * from users where email=?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    $stmt_result=$stmt->get_result();
    
    if($stmt_result->num_rows>0){
        $data=$stmt_result->fetch_assoc();
        if($data['password']=== $password){
            echo '<style>#signout{display:block !important;}</style>';
            echo '<style>#signin{display:none !important;}</style>';
           
        }else {
            echo " login failed";
        }

    }else{
        echo "<h2> Invalid email or password</h2>";
    }
}
}
}

?>
