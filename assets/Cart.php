<?php
session_start();

//veriable for hold total bill
$total = 0;
?>

<!-- cart page style sheet  by eshadi  -->
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
                                    <div>
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
                    $_SESSION["total"] = $total;

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


        <!-- <---------------------checkout  code sniphet by sachith--------------------------------------------->
        <?php

        error_reporting(E_ALL);
        ini_set("display_errors", NULL);

        if ($_SESSION["ID"]) {
            echo '<style>.userdetails{display:none !important;}</style>';
        } else {
            echo '<style>.userdetails{display:block !important;}</style>';
        }
        ?>

        <ul class="collapsible ">
            <li>
                <div class="collapsible-header">Checkout</div>
                <div class="collapsible-body"><span>
                        <div class="chekout_container">
                            <form action="index.php?cart-checkout" method="post" class="chekout" id="checkout_proceed">
                                <div class="row">
                                    <div class="col ">
                                        <h3 class="title userdetails">Billing address</h3>
                                        <div class="inputBox_common userdetails">
                                            <span>Full name :</span>
                                            <input type="text" name="f_name" placeholder="Enter full name or signin">

                                            <a class="center modal-trigger submit-btn" href="#modal1">
                                                Sign In</a>
                                        </div>
                                        <br><br>
                                        <div class="<?php echo $_SESSION["u_address"] ? 'inputBox_common userdetails' : 'inputBox_common'; ?>">
                                            <span>phone Number:</span>
                                            <input type="text" name="phone_no" placeholder="Enter Phone NO ">

                                        </div>
                                        <br><br>
                                        <div class="<?php echo $_SESSION["u_address"] ? 'inputBox_common userdetails' : 'inputBox_common'; ?>">
                                            <span>Address :</span>
                                            <input type="text" name='addressl1' placeholder="House Name-Street-Village">
                                        </div>
                                        <div class="<?php echo $_SESSION["u_address"] ? 'inputBox_common userdetails' : 'inputBox_common'; ?>">
                                            <span>City :</span>
                                            <input type="text" name='city' placeholder="City">
                                        </div>

                                        <div class="flex ">
                                            <div class="<?php echo $_SESSION["u_address"] ? 'inputBox_common userdetails' : 'inputBox_common'; ?>" require>
                                                <span>Province :</span>
                                                <input name="province" type="text" placeholder="Southern">
                                            </div>
                                            <div class="<?php echo $_SESSION["u_address"] ? 'inputBox_common userdetails' : 'inputBox_common'; ?>">
                                                <span>Postal code :</span>
                                                <input type="text" name='postal' maxlength="5" placeholder="Zip code">
                                            </div>
                                        </div>

                                        <h3 class="title">Return Policy</h3>
                                        <div class="scroll">
                                            <p class="center">
                                                We accept returns within 30 days from item arrival.<br>

                                                If you are not satisfied with the item or you haven't received your parcel in time, we
                                                sincerely request that you contact us through? My Message? or "Ask Seller Questions"
                                                BEFORE giving us neutral or negative feedback, or 1-4 Detailed seller ratings, or open
                                                cases, we will try our best to solve the problem to make you satisfied. Thanks for your
                                                understanding.
                                                All emails will be answered within 1 business day. If you do not receive our reply, please
                                                kindly re-sent your emails and we will reply to you asap.
                                            </p>
                                        </div>
                                        <label class="center">
                                            <input type="checkbox" />
                                            <span>I Agree to the return policy</span>
                                        </label>
                                    </div>
                                    <div class="col payment">
                                        <h3 class="title">payment</h3>
                                        <div class="inputBox_common">
                                            <span>Name on card :</span>
                                            <input type="text" size="50" maxlength="25" placeholder="Name">
                                        </div>
                                        <div class="inputBox_common">
                                            <span>Credit card number :</span>
                                            <input type="text" size="16" maxlength="16" placeholder="1111 2222 3333 4444">
                                        </div>

                                        <div class="flex">
                                            <div class="inputBox_common">
                                                <span>Exp : Month/year </span>
                                                <input type="number/number" maxlength="5" size="5" placeholder="10/24">
                                            </div>
                                            <div class="inputBox_common">
                                                <span>CVV :</span>
                                                <input type="text" size="3" maxlength="3" placeholder="123">
                                            </div>
                                        </div>

                                        <div class="inputBox_common">
                                            <span>Total Price :</span>

                                            $ <?php echo $_SESSION["total"];  ?>
                                        </div>
                                        <button type="submit" name='cart-checkout' id='cart-checkout' class="submit-btn center">Proceed To Checkout</button>
                                        <a type="submit" name='chekout-p' id='proceed_chekout' class="submit-btn center" href="index.php?clear-checkout">Clear Checkout</a>
                                        <!-- <input type="submit" value="Clear Checkout" id='cancell_checkout' class="submit-btn"> -->
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

<script type="text/javascript">
    $(document).ready(function() {
        $('.collapsible').collapsible();
    });
</script>