<h1 class="center heading ">Home & Living Items</h1>
<div class=" card-container">
    <div class="row">
        <?php
        include("../assets/db.php");
        $query = $con->prepare("SELECT * FROM products where p_category LIKE 'HOME & LIVING'");

        $query->execute();
        $result = $query->get_result();

        if (mysqli_num_rows($result) > 0) {
            $count = 1;


            while ($row = mysqli_fetch_array($result)) {

        ?>
                <div class="col s6 m4 l3">
                    <div class="card medium">
                    <div class="card-image waves-effect waves-block waves-light btn_load_screen  "   call_type="product"  p_atr="<?php echo $row["p_id"]; ?>">
                            <img class="activator" src="<?php print_r($row["p_src"]) ?>/1.jpg">
                        </div>
                        <div class="card-content">
                            <span class="card-title activator grey-text text-darken-4"><?php echo $row["p_name"]; ?></span>
                            <p><?php echo $row["p_desc"]; ?></p>
                        </div>

                    </div>
                </div>
        <?php
            }
        }

        ?>
    </div>
</div>