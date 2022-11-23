<?php
// include database 
include "db.php";


if (isset($_POST['input'])) {

  $input = $_POST['input'];
  $query = "SELECT * FROM products WHERE p_name LIKE '{$input}%' OR p_category LIKE '{$input}%' ";
  $result = mysqli_query($con, $query);

  if (mysqli_num_rows($result) > 0) {
?>

    <div class="card-group row" style="display: flex;">

      <?php
      while ($row = mysqli_fetch_assoc($result)) {

      ?>

        <script>
          function clearSearch() {
            document.getElementById('live_search').value = '';
            $("#searchresult").css("display", "none");
            $("#post-placeholder").css("display", "block");
          }
        </script>
        <div class="card col">
          <img class="card-img-top" src='<?php echo $row['p_src']; ?>/1.jpg ' height="200px" width="200px" alt="">
          <div class="card-body">
            <h5 class="card-title"><?php echo $row['p_name']; ?></h5>
            <p class="card-text">US $ :<?php echo $row['p_price']; ?></p>
            <a href="../index.php" onclick="clearSearch()" call_type="product" class=" btn_load_screen btn " p_atr='<?php echo $row['p_id']; ?> '>
              View
            </a>
          </div>
        </div>
      <?php

      }
      ?>
    </div>
  <?php
  } else {
  ?>
    <div class="  container  ">
      <h5>No Result Found </h5>
      <h5><strong>Try again with Recent serches</strong></h5>
      <ul style="border:10px solid black ;">
        <?php
        $query = $con->prepare("SELECT * FROM products ORDER BY p_id ASC");
        $query->execute();
        $result = $query->get_result();

        if (mysqli_num_rows($result) > 0) {

          while ($row = mysqli_fetch_array($result)) {

        ?>
            <li>
              <hr>
              <p><?php echo $row['p_name']; ?></p>
            </li>
        <?php
          }
        }
        ?>
      </ul>

    </div>

<?php
  }
}

?>