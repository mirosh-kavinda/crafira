
<?php
// fetch products from database with particular id 

include "db.php";
$p_get = isset($_COOKIE['product_id']) ? $_COOKIE['product_id'] : "cookie not set";

$stmt = $con->prepare("SELECT * FROM products where p_id=?");
$stmt->bind_param("s", $p_get);
$stmt->execute();
$stmt_result = $stmt->get_result();


if ($stmt_result->num_rows > 0) {

    $data = $stmt_result->fetch_assoc();
    $_SESSION["p_name"] = $data['p_name'];
    $_SESSION["p_variety"] = $data['p_variety'];
    $_SESSION["p_category"] = $data['p_category'];
    $_SESSION["p_desc"] = $data['p_desc'];
    $_SESSION["p_price"] = $data['p_price'];
    $_SESSION["p_src"] = $data['p_src'];
    $_SESSION["p_stock"] = $data['p_stock'];
} else {
    echo '<script>alert("product not exist !")</script>';
    die;
}

?>

<!-- product image generate script -->
<script>
    var m_img = document.getElementById('ProductImg');
    m_img.src = '<?php print_r($_SESSION["p_src"]) ?>' + '2.jpg';

    const container = document.getElementById('products-cards-container');
    var img_arr = [];
    for (var i = 1; i <= <?php print_r($_SESSION["p_variety"]) ?>; i++) {
        img_arr.push({
            img: '<?php print_r($_SESSION["p_src"]) ?>' + i + '.jpg'
        });
    }

    function returnCards() {
        return "<div class=\"small-img-col\">" + img_arr.map(data => `
             <img src="${data.img}" class="small-img"/>
             `).join('') + "</div>";
    }
    container.innerHTML = returnCards(img_arr);
</script>


<link rel="stylesheet" href="css/productView.css">
<div id="ProductDetails ">
    <p id="cartNumber"></p>
    <div class="small-container single-product">
        <div class="row">
            <div class="col-2">
                <img src="" width="100%" id="ProductImg">
                <div class="small-img-row ">
                    <div id="products-cards-container"></div>
                </div>
            </div>

            <div class="col-2">
                <form method='post' action="index.php?action=add&id=<?php echo $p_get ?>">
                    <p><?php print_r($_SESSION["p_category"]) ?></p>
                    <h1 id="ProductDetailsName"><?php print_r($_SESSION["p_name"]) ?></h1>
                    <h4 id="ProductDetailsPrice"><?php print_r($_SESSION["p_price"]) ?></h4>

                    <!-- this for pass value to the cart  -->
                    <input type="hidden" name="hidden_name" value="<?php print_r($_SESSION["p_name"]) ?>">
                    <input type="hidden" name="hidden_price" value="<?php print_r($_SESSION["p_price"]) ?>">
                    <input type="hidden" name="hidden_src" value="<?php print_r($_SESSION["p_src"]) ?>">
                    <input type="number" name="quantity" id='qty' class="form-control" value="1">
                    <label for="qty">Available : <?php print_r($_SESSION["p_stock"]) ?></label>
         
                    <input id="Addbtn"class="waves-effect waves-light btn ADDbtn" style="width: 80px; height:50px;padding:10px 10px;" type="submit" name="add" value="Add">
              
               

                    <h3>Product Details</h3>
                    <br>
                    <p><?php print_r($_SESSION["p_desc"]) ?></p>
                </form>
            </div>
        </div>
    </div>

    <!-- alternative products-Static -->
    <div class="small-container">
        <h2 class="center">You also llke</h2>
    </div>
    <div class="small-container">
        <div class="row">
            <div class="col-4">
                <img src="images/ProductView/1.jfif">
                <h4>Seashell Earring</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>$50.0</p>
            </div>
            <div class="col-4">
                <img src="images/ProductView/2.jfif">
                <h4>Seashell Necklace</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <p>$20.0</p>
            </div>
            <div class="col-4">
                <img src="images/ProductView/3.jfif">
                <h4>Seashell Necklace</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>$70.0</p>
            </div>
            <div class="col-4">
                <img src="images/ProductView/4.jfif">
                <h4>Seashell Necklace</h4>
                <div class="rating">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>$40.0</p>
            </div>
        </div>
    </div>

</div>