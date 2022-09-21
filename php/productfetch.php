<?php
session_start();
include 'db.php';
class Product
{
    public $name;
    public $description;
    public $price;
    public $quantity;
    public $image_count;
    public $product_category;
}


$category_list = array("ART_COL", "Brassware", "Cloth_Shoes", "Home_Live", "Jew", "Toy_Entertain", "Wed_Party");
$category_obj=array();

foreach ($category_list as $category) {
    $sql = mysqli_query($con, "select * from products where category='$category'");

    ${$category} = array();
    $product_data = array();
    $x = 0;
    while ($product_data = mysqli_fetch_array($sql)) {
        ${$category}[$x] = new Product();
        ${$category}[$x]->name = $product_data['name'];
        ${$category}[$x]->description = $product_data['description'];
        ${$category}[$x]->quantity = $product_data['quantity'];
        ${$category}[$x]->price = $product_data['price'];
        ${$category}[$x]->image_count = $product_data['product_count'];
        ${$category}[$x]->product_category=$category;
        $category_obj[$x]=${$category};
        $x += 1;
       
    }

}

?>


