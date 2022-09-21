<?php
include '../php/productfetch.php';
?>

<link rel="stylesheet" href="css/productView.css">
<div id="ProductDetails">
    <p id="cartNumber"></p>

    <div class="small-container single-product">
        <div class="row">
            <div class="col-2">
                <img src="images/Catogery/<?php print_r($category_obj[0][0]->product_category); ?>/1/1.jpg" width="100%" id="ProductImg">

                <div class="small-img-row">
                    <div class="small-img-col">
                        <img src="images/Catogery/<?php print_r($category_obj[0][0]->product_category); ?>/1/2.jpg" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="images/Catogery/<?php print_r($category_obj[0][0]->product_category); ?>/1/3.jpg" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="images/Catogery/<?php print_r($category_obj[0][0]->product_category); ?>/1/4.jpg" class="small-img">
                    </div>
                    <div class="small-img-col">
                        <img src="images/Catogery/<?php print_r($category_obj[0][0]->product_category); ?>/1/1.jpg" class="small-img">
                    </div>
                </div>
            </div>
            <div class="col-2">
                <p><?php print_r($category_obj[0][0]->product_category)?></p>
                <h1 id="ProductDetailsName"><?php print_r($category_obj[0][0]->name); ?></h1>
                <h4 id="ProductDetailsPrice"><?php print_r($category_obj[0][0]->price); ?></h4>
                <select id="selectSize">
                    <option>Select Color</option>
                    <option>White</option>
                    <option>Brown</option>
                    <option>Black</option>
                    <option>Yellow</option>
                </select>
                <input id="cartQty" type="number" value="1">
                <a id="btnAddCart" class="btn">Add to Cart</a>
                <h3>Product Details</h3>
                <br>
                <p>
                    <?php print_r($category_obj[0][0]->description); ?></p>
            </div>
        </div>
    </div>

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