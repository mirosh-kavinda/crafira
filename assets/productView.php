<?php

// fetch products from database with particular id 
include("db.php");
$p_id = 1;
$stmt = $con->prepare("SELECT * FROM products where p_id=?");
$stmt->bind_param("s", $p_id);
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
}

?>
<style>
    /* product view from eshadi  */

a{
    text-decoration: none;
    color: #555;
}
p{
    color: #555;
}
.ProductDetails{
    max-width: 1300px;
    padding-left: 25px;
    padding-right: 25px;
}
.row{
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    justify-content: space-around;
}
.col-2{
    flex-basis: 50%;
    min-width: 250px;
}
.col-2 img{
    max-width: 100%;
    padding: 50px 0;
}

.col-2 h1{
    font-size: 35px;
    line-height: 37px;
    margin: 25px 0;
}
.btn{
    display: inline-block;
    background: #437c90;
    color: #fff;
    cursor: pointer;
    padding: 8px 30px;
    margin: 30px 0;
    border-radius: 30px;
    transition: background 0.5s;
}
.btn:hover{
    background: #373f51;
}


.categories{
    margin: 70px;
}
.col-3{
    flex-basis: 30%;
    min-width: 250px;
    margin-bottom: 30px;
}
.col-3 img{
    width: 100%;
}
.small-container{
    max-width: 1080px;
    margin: auto;
    padding-left: 25px;
    padding-right: 25px;
}
.col-4{
    flex-basis: 25%;
    padding: 10px;
    min-width: 200px;
    margin-bottom: 50px;
    transition: transform 0.5s;
}
.col-4 img{
    width: 100%;
}
.title{
    text-align: center;
    margin: 0 auto 80px;
    position: relative;
    line-height: 60px;
    color: #555;
}
.title::after{
    content: '';
    background: #437c90;
    width: 80px;
    height: 5px;
    border-radius: 5px;
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translate(-50%);
}
h4{
    color: #555;
    font-weight: normal;
}
.col-4 p{
    font-size: 14px;
}
.rating .fas{
    color: #437c90;
}
.rating .far{
    color: #437c90;
}
.col-4:hover{
    transform: translateY(-5px);
}
.offer{
    background: radial-gradient(#74b9ff,#dfe6e9);
    margin-top: 80px;
    padding: 30px 0;
}
.col-2 .offer-img{
    padding: 50px;
}
small{
    color: #555;
}

.testimonial{
    padding-top: 100px;
}
.testimonial .col-3{
    text-align: center;
    padding: 40px 20px;
    box-shadow: 0 0 20px 0px rgba(0,0,0,0.1);
    cursor: pointer;
    transition: transform 0.5s;
}
.testimonial .col-3 img {
    width: 50px;
    margin-top: 20px;
    border-radius: 50%;
}
.testimonial .col-3:hover{
    transform: translateY(-10px);
}
.fas.fa-quote-left{
    font-size: 34px;
    color: #437c90;
}
.col-3 p{
    font-size: 12px;
    margin: 12px 0;
    color: #777;
}
.testimonial .col-3 h3{
    font-weight: 600;
    color: #555;
    font-size: 16px;
}
.brands{
    margin: 100px auto;
}
.col-5{
    width: 160px;
}
.col-5 img{
    width: 100%;
    cursor: pointer;
    filter: grayscale(100%);
}
.col-5 img:hover{
    filter: grayscale(0%);
}

ul{
    list-style-type: none;
}
.app-logo{
    margin-top: 20px;
}
.app-logo img{
    width: 140px;
}
.footer hr{
    border: none;
    background: #b5b5b5;
    height: 1px;
    margin: 20px 0;
}
.copyright{
    text-align: center;
}

.row-2{
    justify-content: space-between;
    margin: 100px auto 50px;
}
select{
    border: 1px solid #437c90;
    padding: 5px;
}
select:focus{
    outline: none;
}
.page-btn{
    margin: 0 auto 80px;
}
span{
    display: inline-block;
    border: 1px solid #437c90;
    margin-left: 0;
    height: 20px;
    width: 40px;
    text-align: center;
    line-height: 17px;
    cursor: pointer;
}
.page-btn span:hover{
    background: #437c90;
    color: white;
}

.single-product{
    margin-top: 80px;
}
.single-product .col-2 img{
    padding: 0;
}
.single-product .col-2{
    padding: 20px;
}
.single-product h4{
    margin: 20px 0;
    font-size: 22px;
    font-weight: bold;
}
.single-product select{
    display: block;
    padding: 10px;
    margin-top: 20px;
}
.single-product input{
    width: 50px;
    height: 40px;
    padding-left: 10px;
    font-size: 20px;
    margin-right: 10px;
    border: 1px solid #437c90;
}
input:focus{
    outline: none;
}
.single-product .fas{
    color: #437c90;
    margin-left: 10px;
}
.small-img-row{
    display: flex;
    justify-content: space-between;
}
.small-img-col{
    flex-basis: 24%;
    cursor: pointer;
}

</style>
<!-- product image generate script -->
<script>
    var m_img = document.getElementById('ProductImg');
    m_img.src = '<?php print_r($_SESSION["p_src"]) ?>' + '1.jpg';

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
<div id="ProductDetails">
    <p id="cartNumber"></p>
    <div class="small-container single-product">
        <div class="row">
            <div class="col-6">
                <img src="" width="100%" id="ProductImg">
                <div class="small-img-row">
                    <div id="products-cards-container"></div>
                </div>
            </div>

            <div class="col-6">
                <form method='post' action="index.php?action=add&id=<?php $p_id ?>">
                    <p><?php print_r($_SESSION["p_category"]) ?></p>
                    <h1 id="ProductDetailsName"><?php print_r($_SESSION["p_name"]) ?></h1>
                    <h4 id="ProductDetailsPrice"><?php print_r($_SESSION["p_price"]) ?></h4>
                    
                    <!-- this for pass value to the cart  -->
                    <input type="hidden" name="hidden_name" value="<?php print_r($_SESSION["p_name"]) ?>">
                    <input type="hidden" name="hidden_price" value="<?php print_r($_SESSION["p_price"]) ?>">
                    <input type="hidden" name="hidden_src" value="<?php print_r($_SESSION["p_src"]) ?>">
                    <input type="number" name="quantity" id='qty' class="form-control col-2" value="1">
                    <label for="qty">Available : <?php print_r($_SESSION["p_stock"]) ?></label>
                    <input type="submit" name="add" class="btn " value="Add to Cart">

                    <h3>Product Details</h3>
                    <br>
                    <p><?php print_r($_SESSION["p_desc"]) ?></p>
                </form>
            </div>
        </div>
    </div>

    <!-- alternative products -->
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