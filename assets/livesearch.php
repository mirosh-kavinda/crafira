<?php

include('db.php');

if (isset($_POST['input'])) {

    $input = $_POST['input'];
    $query = "SELECT * FROM products WHERE p_name LIKE '{$input}%' OR p_category LIKE '{$input}%' ";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) > 0) {

?>

        <div>


<style>
            .card-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    margin-top: 16px;
    margin-left: 5vw;
    margin-right: 5vw;

}

.card {
    all: unset;
    border-radius: 10px;
    border: 1px solid #eee;
    width: 150px;
    margin: 0 8px 16px;
    padding: 16px;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    transition: all 0.2s ease-in-out;
    line-height: 24px;

}

.card-container .card:not(:last-child) {
    margin-right: 0;
}


.card-container .card:not(.highlight-card) {
    cursor: pointer;
}

.card-container .card:not(.highlight-card):hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 17px rgba(0, 0, 0, 0.35);
}
.img {
    width: 180px;
    flex: 20;
    height: 180px;
    padding: 10px;
    border-radius: 15px;
}

.title-div {
    flex: 1;
    text-align: center;
    font-size: 11px;
    line-height: 15px;
}
.price-label{
    text-align: center;
    margin-top: 10px;
}
.price-span{
    display: flex;
    align-items: flex-end;
    justify-content: center;
}
           </style>
            <div class="card-container ">
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['p_id'];
                    $pname = $row['p_name'];
                    $quantity = $row['p_stock'];
                    $image = $row['p_src'];
                    $category = $row['p_category'];
                    $desc = $row['p_desc'];
                    $price = $row['p_price'];

                ?>
                    <a class="card " href="">
                        <div class="card-container-inner ">
                            <img class="img" src='<?php echo $image; ?>/1.jpg ' height="200px" width="200px" alt="">
                            <div class="title-div">'<?php echo $pname; ?></div>
                            <span class="price-span">US $<h2 class="price-label">'<?php echo $price; ?></h2></span>
                        </div>
                    </a>
                <?php
                }
                ?>
            </div>
    <?php
    } else {
        echo "<h6 class='text-danger text-center mt-3'>No data found</h6>";
    }
}

    ?>
        </div>