<!--Carousel Content-->
<div>
    <link rel="stylesheet" href="css/landingPage.css" />
    <p class="center heading">Fresh finds fit for cozy season.</p>
    <script type="text/javascript" src="js/Carousel.js"> </script>

    <div class="carousel ">
        <?php
        include("../assets/db.php");
        $query = $con->prepare("SELECT * FROM products ORDER BY p_id ASC");
        $query->execute();
        $result = $query->get_result();

        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_array($result)) {
                // for ($i; $i <= $row['p_variety']; $i++) {
        ?>
                <a call_type="product" class="carousel-item   btn_load_screen ">
                    <img src="<?php echo $row["p_src"]; ?>/1.jpg" class="responsive-image">
            <?php
            }
        }
            ?>
    </div>

    <!-- Scroll icon animation-->
    <div class=" icon-scroll"></div>
    <br><br>

    <!--list container-->
    <h1 class="center heading">Popular Crafts right now</h1>
    <div class="grid-container">
        
    
    <div class="grid-item item1"><img src="images/ProductView/2.jfif" class="responsive-img "></div>
        <div class="grid-item item2"><img src="images/ProductView/2.jfif" class="responsive-img "></div>
        <div class="grid-item item3"><img src="images/ProductView/2.jfif" class="responsive-img "></div>
        <div class="grid-item item4"><img src="images/ProductView/2.jfif" class="responsive-img "></div>
        <div class="grid-item item5"><img src="images/ProductView/2.jfif" class="responsive-img "></div>
        <div class="grid-item item6"><img src="images/ProductView/2.jfif" class="responsive-img "></div>
        <div class="grid-item item6"><img src="images/ProductView/2.jfif" class="responsive-img "></div>
        <div class="grid-item item6"><img src="images/ProductView/2.jfif" class="responsive-img "></div>
        <div class="grid-item item6"><img src="images/ProductView/2.jfif" class="responsive-img "></div>
        <div class="grid-item lastitem"><img src="images/ProductView/2.jfif" class="responsive-img "></div>
    </div>
    <!-- shop list -->

    <h1 class="center heading">shops</h1>
    <div class=" container shop-list ">
        <div class="row center">
            <div class="col s6 m4 l3">
                <a href="#" id='dahami'>
                    <img src="images/ProductView/3.jfif" class="circle">
                    <h5>Dahami shop</h5>
                </a>
            </div>
            <div class="col s6 m4 l3">
                <a href="#" id='dahami'>
                    <img src="images/ProductView/3.jfif" class="circle">
                    <h5>Dahami shop</h5>
                </a>
            </div>
            <div class="col s6 m4 l3">
                <a href="#" id='dahami'>
                    <img src="images/ProductView/3.jfif" class="circle">
                    <h5>Dahami shop</h5>
                </a>
            </div>
            <div class="col s6 m4 l3">
                <a href="#" id='dahami'>
                    <img src="images/ProductView/3.jfif" class="circle">
                    <h5>Dahami shop</h5>
                </a>
            </div>
            <div class="col s6 m4 l3">
                <a href="#" id='dahami'>
                    <img src="images/ProductView/1.jfif" class="circle">
                    <h5>Dahami shop</h5>
                </a>
            </div>
            <div class="col s6 m4 l3">
                <a href="#" id='dahami'>
                    <img src="images/ProductView/3.jfif" class="circle">
                    <h5>Dahami shop</h5>
                </a>
            </div>
            <div class="col s6 m4 l3">
                <a href="#" id='dahami'>
                    <img src="images/ProductView/3.jfif" class="circle">
                    <h5>Dahami shop</h5>
                </a>
            </div>
            <div class="col s6 m4 l3">
                <a href="#" id='dahami'>
                    <img src="images/ProductView/3.jfif" class="circle">
                    <h5>Dahami shop</h5>
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
        <div class="col s12 m4 a">
            <h5 class="center">A community doing good</h5>
            <p class="light">Crafira is a global online marketplace, where people come together to make, sell, buy, and
                collect unique Handmade items. We’re also a community pushing for positive change for small businesses,
                people, and
                the planet. Here are some of the ways we’re making a positive impact, together.</p>
        </div>
        <hr>
        <div class="col s12 m4">
            <h5 class="center">Support independent creators</h5>
            <p class="light">There’s no crafira warehouse – just millions of people selling the things they love. We
                make
                the whole process easy, helping you connect directly with makers to find something extraordinary.</p>
        </div>
        <hr>
        <div class="col s12 m4">
            <h5 class="center">Peace of mind</h5>
            <p class="light">Your privacy is the highest priority of our dedicated team. And if you ever need
                assistance,
                we are always ready to step in for support.</p>
        </div>
    </div>
</div>