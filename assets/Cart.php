<?php
session_start();

//veriable for hold total bill
$total = 0;
?>
<!-- cart page style sheet  code sniphet by eshadi  -->

<link rel="stylesheet" href="css/cart.css">
<div id="Cart">
    <h1 style="display:none;" id="saveCartNumber"></h1>
    <div class="mg4-small-container mg4-cart-page">
        <table class="mg4-table">
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
                                <div class="mg4-cart-info">
                                   
                                    <img class="mg4-orderImg " src="<?php echo $value["item_src"]; ?>/1.jpg " width="200px" height="200px">
                                    <div >
                                        <p id="ProductBuyName"><?php echo $value["item_name"]; ?></p>
                                        <small id="ProductBuyPrice"><?php echo $value["product_price"]; ?></small>
                                        <br>
                                        <a class="removeBtn" href="index.php?action=delete&id=<?php echo $value["product_id"]; ?>" id="RemoveProduct">Remove</a>
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


        <!-- <---------------------checout  code sniphet by sachith--------------------------------------------->

        <?php

        error_reporting(E_ALL);
        ini_set("display_errors", NULL);

        if ($_SESSION["ID"]) {
            echo '<style>#name_box{display:none !important;}</style>';
        } else {
            echo '<style>##name_box{display:block !important;}</style>';
        }
        ?>

        <ul class="collapsible ">
            <li>

                <div class="collapsible-header">Checkout</div>
                <div class="collapsible-body"><span>
                        <div class="chekout_container">
                            <form action="index.php" method="post" class="chekout">
                                <div class="row">
                                    <div class="col">
                                        <h3 class="title">Billing address</h3>
                                        <div class="inputBox_common" id='name_box'>
                                            <span>full name :</span>
                                            <input type="text" placeholder="Enter full name or signin">
                                            <a class="center modal-trigger submit-btn" href="#modal1">
                                                Sign In</a>
                                        </div>
                                        <br><br>
                                        <div class="inputBox_common">
                                            <span>Address :</span>
                                            <input type="text" name='address' placeholder="House Name-Street-Village">
                                        </div>
                                        <div class="inputBox_common">
                                            <span>City :</span>
                                            <input type="text" name='city' placeholder="Matara">
                                        </div>

                                        <div class="flex">
                                            <div class="inputBox_common">
                                                <span>Province :</span>
                                                <input type="text" placeholder="Southern">
                                            </div>
                                            <div class="inputBox_common">
                                                <span>Postal code :</span>
                                                <input type="text" name='postal' placeholder="81000">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col payment">
                                        <h3 class="title">payment</h3>
                                        <div class="dd">
                                            <label for="card">Card Type:</label>
                                            <select id="card">
                                                <option value="Vsa" class="fab fa-cc-visa">Visa</option>
                                                <option value="Mas" class="fab fa-cc-mastercard">Master</option>

                                            </select>
                                        </div>

                                        <div class="inputBox_common">
                                            <span>Name on card :</span>
                                            <input type="text" placeholder="Name">
                                        </div>
                                        <div class="inputBox_common">
                                            <span>Credit card number :</span>
                                            <input type="text" placeholder="1111 2222 3333 4444">
                                        </div>

                                        <div class="flex">
                                            <div class="inputBox_common">
                                                <span>Exp : Month/year </span>
                                                <input type="number/number" placeholder="10/24">
                                            </div>
                                            <div class="inputBox_common">
                                                <span>CVV :</span>
                                                <input type="text" placeholder="1234">
                                            </div>
                                        </div>

                                        <div class="inputBox_common">
                                            <span>Total Price :</span>
                                            $ <?php echo number_format($total, 2); ?>
                                        </div>
                                        <input type="submit" name='chekout-proceed' value="Proceed To Checkout" id='proceed_chekout' class="submit-btn">
                                        <input type="submit" value="Cancel Order" id='cancell_checkout' class="submit-btn">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </span>
                </div>
            </li>
        </ul>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('.collapsible').collapsible();
    });

    $("#proceed_chekout").click(function() {
        alert("Order will placed!.");

    });
</script>