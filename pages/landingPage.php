<?php
include("../assets/db.php");
?>
<div>

    <link rel="stylesheet" href="css/landingPage.css" />
    <p class="center heading ">Fresh finds fit for cozy season.</p>
    <script type="text/javascript" src="js/main.js"> </script>

    <div class="carousel ">
        <?php
        $query = $con->prepare("SELECT * FROM products ORDER BY p_id ASC");
        $query->execute();
        $result = $query->get_result();

        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_array($result)) {
        ?>
                <a call_type="product" class="carousel-item  btn_load_screen " p_atr="<?php echo $row["p_id"]; ?>">
                    <img src="<?php echo $row["p_src"]; ?>/1.jpg">
                </a>
        <?php
            }
        }
        ?>
    </div>

    <!-- Scroll icon animation-->
    <div class=" icon-scroll"></div>
    <br><br>

    <!--list container-->
    <h1 class="center heading mt-5">Popular Crafts right now</h1>
    <div class=" card-container">
        <div class="row">

            <?php
            $query = $con->prepare("SELECT * FROM products where (p_id %2)=0");
            $query->execute();
            $result = $query->get_result();

            if (mysqli_num_rows($result) > 0) {
                $counter = 0;
                while ($row = mysqli_fetch_array($result)) {
                    $counter++;
            ?>
                    <img call_type="product" class=" btn_load_screen  materialboxed  col s6 m4 l3" height="300px" width="300px" src="<?php echo $row["p_src"]; ?>3.jpg" p_atr="<?php echo $row["p_id"]; ?>">

            <?php
                    if ($counter >= 12) {
                        break;
                    }
                }
            }

            ?>
        </div>
    </div>

    <!-- shop list -->

    <h1 class="center heading">shops</h1>
    <div class=" container shop-list ">
        <div class="row center">
            <div class="col s6 m4 l4">
                <a call_type="shop" class=" btn_load_screen " id='dahami'>
                    <img src="images/shops/dahami.png" class="circle">
                    <h5>Dahami Crafts</h5>
                </a>
            </div>
            <div class="col s6 m4 l4">
                <a call_type="shop" class=" btn_load_screen " id='dahami'>
                    <img src="images/shops/sadunart.png" class="circle">
                    <h5>Sadun Art</h5>
                </a>
            </div>
            <div class="col s6 m4 l4">
                <a call_type="shop" class=" btn_load_screen " id='dahami'>
                    <img src="images/shops/leather.png" class="circle">
                    <h5>Leather Craft SL</h5>
                </a>
            </div>
            <div class="col s6 m4 l4">
                <a call_type="shop" class=" btn_load_screen " id='dahami'>
                    <img src="images/shops/crafty.png" class="circle">
                    <h5>CRAFTY shop</h5>
                </a>
            </div>
            <div class="col s6 m4 l4">
                <a call_type="shop" class=" btn_load_screen " id='dahami'>
                    <img src="images/shops/maskfest.png" class="circle">
                    <h5>Mask fest </h5>
                </a>
            </div>
            <div class="col s6 m4 l4">
                <a call_type="shop" class=" btn_load_screen " id='dahami'>
                    <img src="images/shops/craftersl.png" class="circle">
                    <h5>Crafter SL </h5>
                </a>
            </div>
            <div class="col s6 m4 l4">
                <a call_type="shop" class=" btn_load_screen " id='dahami'>
                    <img src="images/shops/cottonon.png" class="circle">
                    <h5>Cotton on </h5>
                </a>
            </div>
            <div class="col s6 m4 l3">
                <a call_type="shop" class=" btn_load_screen " id='dahami'>
                    <img src="images/shops/fashionmake.png" class="circle">
                    <h5>Fashion Maker</h5>
                </a>
            </div>
        </div>
    </div>
</div>

<!--What is the crafira content?-->
<div class="row ">
    <h1 class="center heading ">What is Crafira?</h1>
    <br><br>
    <div class="what-is-crafira row">
        <div class="col s12 m4 para">
            <h5 class="center">A community doing good</h5>
            <p class="light">Crafira is a global online marketplace, where people come together to make, sell, buy, and
                collect unique Handmade items. We’re also a community pushing for positive change for small businesses,
                people, and
                the planet. Here are some of the ways we’re making a positive impact, together.</p>
        </div>
        <hr>
        <div class="col s12 m4 para">
            <h5 class="center">Support independent creators</h5>
            <p class="light">There’s no crafira warehouse – just millions of people selling the things they love. We
                make
                the whole process easy, helping you connect directly with makers to find something extraordinary.</p>
        </div>
        <hr>
        <div class="col s12 m4 para">
            <h5 class="center">Peace of mind</h5>
            <p class="light">Your privacy is the highest priority of our dedicated team. And if you ever need
                assistance,
                we are always ready to step in for support.</p>
        </div>
    </div>
</div>

