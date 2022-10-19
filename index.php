<!-- welcome to crafira website -->
<?php

// php code using for load web content without refreshing the webpage 
if (
  isset($_SERVER['HTTPS']) &&
  ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
  isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
  $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'
) {
  $ssl = 'https';
} else {
  $ssl = 'http';
}
$app_url = ($ssl)
  . "://" . $_SERVER['HTTP_HOST']
  . (dirname($_SERVER["SCRIPT_NAME"]) == DIRECTORY_SEPARATOR ? "" : "/")
  . trim(str_replace("\\", "/", dirname($_SERVER["SCRIPT_NAME"])), "/");


include 'assets/functions.php';
// this for hide undeclared error
error_reporting(E_ALL);
ini_set("display_errors", NULL);

//This keep user loged in until they signed out
if ($_SESSION["ID"]) {
  echo '<style>#signout{display:block !important;}</style>';
  echo '<style>#signin{display:none !important;}</style>';
} else {
  echo '<style>#signout{display:none !important;}</style>';
  echo '<style>#signin{display:block !important;}</style>';
}

//cart status update
if (!empty($_SESSION["cart"])) {
  echo '<style>#badge{display:block !important;}</style> ';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Crafira</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection" />
  <link rel="stylesheet" href="css/index.css" />

  <!-- this use for use jquery in our website -->
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>

  <!-- this use for use sweet alert in our website -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.24/sweetalert2.all.js"></script>

  <!-- // script   for load web content without refreshing the webpage -->
  <script type="text/javascript">

    //load home page
    $(function() {
      $("#post-placeholder").load("pages/landingPage.php");
    });



    $(document).ready(function($) {
      var page_url = '<?php echo $app_url ?>/';

      $(document).on('click', '.btn_load_screen', function(event) {
        event.preventDefault();

        var call_type = $(this).attr('call_type');
        if (call_type == 'product') {
          var p_id = $(this).attr('p_atr');


          $(document).ready(function() {

            var cookies = document.cookie.split(";")
            var cookiePair = cookies[0].split("=");
            var cookie_user = cookiePair[1]; // remove ending parenthesis here  
            createCookie("product_id", p_id, "10");
          });

          // Function to create the cookie 
          function createCookie(name, value, days) {
            var expires;

            if (days) {
              var date = new Date();
              date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
              expires = "; expires=" + date.toGMTString();
            } else {
              expires = "";
            }

            document.cookie = escape(name) + "=" +
              escape(value) + expires + "; path=/";
          }

        }

        $.getJSON(page_url + 'assets/pageinfo.php', {
          call_type: call_type
        }, function(data, textStatus, xhr) {


          $(document).attr("title", data.title);
          $('#post-placeholder').load(data.url);


        });
      });
    });
  </script>

</head>


<body>

  <!-- Error handelling alert box -->
  <script type="text/javascript">
    var e_message = '<?php echo $e_message ?>';
    var e_icon = '<?php echo $e_icon ?>';
    var e_text = '<?php echo $e_text ?>';

    if (e_message) {
      $(document).ready(function func() {
        Swal.fire({
          title: e_message,
          text: e_text,
          icon: e_icon,
          button: "Ok",
          timer: 3300,
          confirmButtonColor: "#437C90"

        });
      });
    }
  </script>


  <!--Navigation bar-->
  <div id="nav-placeholder" class="scrollspy"></div>

  <!-- Content load here -->
  <div class='content' id="post-placeholder"></div>

  <!--Footer placeholder-->
  <div id="footer-placeholder"></div>

  <!--  General Scripts-->
  <script src="js/materialize.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/main.js"></script>



</body>

</html>