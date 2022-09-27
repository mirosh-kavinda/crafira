<?php

include('db.php');
if (isset($_POST['input'])) {

    $input = $_POST['input'];
    $query = "SELECT * FROM products WHERE p_name LIKE '{$input}%' OR p_category LIKE '{$input}%' ";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {
?>
        <link rel="stylesheet" href="css/search.css">
        <div class="card-container row  ">
            <?php
            while ($row = mysqli_fetch_assoc($result)) {

            ?>
                <div class="col s6 m4 l3">
                    <a call_type="product" class=" card btn_load_screen ">
                        <div class="card-container-inner ">
                            <img class="img" src='<?php echo $row['p_src']; ?>/1.jpg ' height="200px" width="200px" alt="">
                            <div class="title-div">'<?php echo $row['p_name']; ?></div>
                            <span class="price-span">US $<h2 class="price-label">'<?php echo $row['p_price']; ?></h2></span>
                        </div>
                    </a>
                </div>
                <?php
            }
            ?>
                <div class="col  ">
                    <h5><strong>Recent serches</strong></h5>
                    <ul >
                        <?php
                        $query = $con->prepare("SELECT * FROM products ORDER BY p_id ASC");
                        $query->execute();
                        $result = $query->get_result();

                        if (mysqli_num_rows($result) > 0) {

                            while ($row = mysqli_fetch_array($result)) {

                        ?>
                                <li ><hr>
                                    <p ><?php echo $row['p_name']; ?></p>
                                </li>
                        <?php
                            }
                        }
                        ?>
                    </ul>
                </div>

          

    <?php
    } else {
        echo "<script>alert('No data found on Search! Try again or go to categories ');</script>";
    }
}
    ?>
        </div>