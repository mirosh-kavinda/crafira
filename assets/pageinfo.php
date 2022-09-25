<?php
// this php file use for load content between footer and nav bar 
if(isset($_GET['call_type']))
  {
    $call_type = $_GET['call_type'];
  
    if($call_type == "home")
    {
      echo json_encode(array(
        'status'=>'success',
        'title'=> 'Crafira',
        'url' => 'pages/landingPage.php',
        
      ));
    }
    else if($call_type == "jewel")
    {
      echo json_encode(array(
        'status'=>'success',
        'title'=> 'Jewelery & Acc',
        'url' => 'pages/Jew&Acc.html',
        
      ));
    }
    else if($call_type == "cloth")
    {
      echo json_encode(array(
        'status'=>'success',
        'title'=> 'Clothing & Shoes',
        'url' => 'pages/Clo&Shoe.html',
        
      ));
    }
    else if($call_type == "live")
    {
      echo json_encode(array(
        'status'=>'success',
        'title'=> 'Home & living',
        'url' => 'pages/Home&liv.html',
        
      ));
    }
    else if($call_type == "wed")
    {
      echo json_encode(array(
        'status'=>'success',
        'title'=> 'Wedding & party',
        'url' => 'pages/Wedding&part.html',
        
      ));
    }
    else if($call_type == "toy")
    {
      echo json_encode(array(
        'status'=>'success',
        'title'=> 'Toys & Entertainment',
        'url' => 'pages/Toy&Entertain.html',
        
      ));
    }
    
    else if($call_type == "art")
    {
      echo json_encode(array(
        'status'=>'success',
        'title'=> 'Art & Collectibles',
        'url' => 'pages/Art&Collect.html',
        
      ));
    }
    else if($call_type == "product")
    {
      echo json_encode(array(
        'status'=>'success',
        'title'=> 'Product view',
        'url' => 'assets/productView.php',
        
      ));
    }
    else if($call_type == "cart")
    {
      echo json_encode(array(
        'status'=>'success',
        'title'=> 'Cart',
        'url' => 'assets/Cart.php',
        
      ));
    }

    
  }

?>

