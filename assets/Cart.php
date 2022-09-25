<?php
session_start();
//veriable for hold total bill
$total = 0;
?>

<!-- cart page style sheet  -->
<style>
a {
    text-decoration: none;
    color: #555;
}

p {
    color: #555;
}

.container {
    max-width: 1300px;
    margin: auto;
    padding-left: 25px;
    padding-right: 25px;
}

.btn {
    display: inline-block;
    background-image: linear-gradient(92.6deg,
            rgb(5, 108, 131) 0.6%,
            rgb(129, 156, 156) 153.1%);
    color: #fff;
    cursor: pointer;
    padding: 8px 30px;
    margin: 30px 0;
    border-radius: 30px;
    transition: background 0.5s;
}

.btn:hover {
    background: #563434;
}

.small-container {
    max-width: 1080px;
    margin: auto;
    padding-left: 25px;
    padding-right: 25px;
}

small {
    color: #555;
}

/*-------------------------------------Cart Page-------------------------------------*/

.cart-page {
    margin: 80px auto;
}

table {
    width: 100%;
    border-collapse: collapse;
}

.cart-info {
    display: flex;
    flex-wrap: wrap;
    margin-left: 10px;
}

th {
    text-align: left;
    padding: 5px;
    color: #fff;
    background-color: rgb(5, 108, 131);
    font-weight: normal;
}

td {
    padding: 10px 5px;
}

td input {
    width: 40px;
    height: 30px;
    padding: 5px;
}

td a {
    color: #74b9ff;
    font-size: 12px;
}

td img {
    width: 80px;
    height: 80px;
    margin-right: 10px;
}

.total-price {
    display: flex;
    justify-content: flex-end;
}

.total-price table {
    border-top: 3px solid #74b9ff;
    width: 100%;
    max-width: 400px;
}

td:last-child {
    text-align: right;
}

.placeOrder {
    position: relative;
    display: flex;
    left: 88%;
}

.removeBtn {
    cursor: pointer;
}

.checkBox {
    width: 21px;
    margin-top: 25px;
    margin-right: 13px;
}
</style>

<div id="Cart">
    <h1 style="display:none;" id="saveCartNumber"></h1>
    <div class="small-container cart-page">
        <table class="table">
            <thead>
                <th>Product</th>
                <th>Price</th>
                <th>Qty</th>
                <th>SubTotal</th>
            </thead>
            <tbody id="tblCart">
                <?php
                if (!empty($_SESSION["cart"])) {
                    foreach ($_SESSION["cart"] as $key => $value) {
                ?>
                <tr>
                    <td>
                        <div class="cart-info">
                            <input id="checkBox" value="true" class="checkBox" type="checkbox"
                                style=" width: 21px;margin-top: 23px;margin-right: 13px;">
                            <img class="orderImg" src="<?php echo $value["item_src"]; ?>/1.jpg " width="200px"
                                height="200px">
                            <div>
                                <p id="ProductBuyName"><?php echo $value["item_name"]; ?></p>
                                <small id="ProductBuyPrice"><?php echo $value["product_price"]; ?></small>
                                <br>
                                <a class="removeBtn" href="index.php?action=delete&id=<?php $p_id ?>"
                                    id="RemoveProduct">Remove</a>
                            </div>
                        </div>
                    </td>
                    <td><?php echo $value["product_price"]; ?></td>
                    <td> <?php echo $value["item_quantity"]; ?></td>
                    <td>$<?php echo number_format($value["item_quantity"] * $value["product_price"], 2); ?></td>
                </tr>
                <?php

                        $total = $total + ($value["item_quantity"] * $value["product_price"]);
                    }
                    ?>
                <tr>
                    <td colspan="3" align="right">Total</td>
                    <th align="right">$ <?php echo number_format($total, 2); ?></th>
                    <td></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>


        <!-- <---------------------chekckout component--------------------------------------------->


        <style>
        form {
            padding: 10px;
            width: cover;
            border-radius: 15px;
            background: #E3E3E5;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
        }

        form .row {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        form .row .col {
            flex: 1 1 250px;
        }

        form .row .col .title {
            font-size: 20px;
            color: #333;
            padding-bottom: 5px;
            text-transform: uppercase;
        }

        form .row .col .inputBox {
            margin: 15px 0;
        }

        form .row .col .inputBox span {
            margin-bottom: 10px;
            display: block;
        }

        form .row .col .inputBox input {
            width: 100%;
            border: 1px solid #ccc;
            padding: 10px 15px;
            font-size: 15px;
            text-transform: none;
        }

        form .row .col .inputBox input:focus {
            border: 1px solid #000;
        }

        form .row .col .flex {
            display: flex;
            gap: 15px;
        }

        form .row .col .flex .inputBox {
            margin-top: 5px;
        }

        form .row .col .inputBox img {
            height: 34px;
            margin-top: 5px;
            filter: drop-shadow(0 0 1px #000);
        }

        form .submit-btn {
            width: 100%;
            padding: 12px;
            font-size: 17px;
            background: #437C90;
            color: #fff;
            margin-top: 5px;
            cursor: pointer;
            border-radius: 15px;

        }

        form .submit-btn:hover {
            background: #c5d0d4;

        }
        </style>
        <ul class="collapsible">
            <li>
                <div class="collapsible-header">Checkout</div>
                <div class="collapsible-body"><span>
                        <form action="" method="post" class="chekout">
                            <div class="row">
                                <div class="col">
                                    <h3 class="title">billing address</h3>
                                    <div class="inputBox">
                                        <span>full name :</span>
                                        <input type="text" placeholder="H.G. Name">
                                    </div>
                                    <div class="dd">
                                        <label for="Shipping">Choose Shipping Method:</label>
                                        <select id="Shipping">
                                            <option value="ES">Economy shipping</option>
                                            <option value="SS">Standard shipping</option>
                                            <option value="ESH">Expedided shipping</option>
                                        </select>
                                    </div>
                                    <div class="inputBox">
                                        <span>address :</span>
                                        <input type="text" placeholder="No or House Name-Street-Village">
                                    </div>
                                    <div class="inputBox">
                                        <span>city :</span>
                                        <input type="text" placeholder="Matara">
                                    </div>

                                    <div class="flex">
                                        <div class="inputBox">
                                            <span>Province :</span>
                                            <input type="text" placeholder="Southern">
                                        </div>
                                        <div class="inputBox">
                                            <span>Postal code :</span>
                                            <input type="text" placeholder="81000">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">

                                    <h3 class="title">payment</h3>

                                    <div class="dd">
                                        <label for="card">Card Type:</label>

                                        <select id="card">
                                            <option value="Vsa">Visa</option>
                                            <option value="Mas">Master</option>

                                        </select>
                                    </div>

                                    <div class="inputBox">
                                        <span>name on card :</span>
                                        <input type="text" placeholder="Name">
                                    </div>
                                    <div class="inputBox">
                                        <span>credit card number :</span>
                                        <input type="text" placeholder="1111 2222 3333 4444">
                                    </div>

                                    <div class="flex">
                                        <div class="inputBox">
                                            <span>exp Month/year :</span>
                                            <input type="number/number" placeholder="10/24">
                                        </div>
                                        <div class="inputBox">
                                            <span>CVV :</span>
                                            <input type="text" placeholder="1234">
                                        </div>
                                    </div>

                                    <div class="inputBox">
                                        <span>Total Price :</span>
                                        $ <?php echo number_format($total, 2); ?>
                                    </div>
                                    <input type="submit" value="Proceed To Checkout" class="submit-btn">

                                    <input type="submit" value="Cancel Order" class="submit-btn">
                                </div>
                            </div>
                        </form>
                    </span>
                </div>
            </li>
    </div>
</div>


<script>
$(document).ready(function() {
    $('.collapsible').collapsible();
});
</script>