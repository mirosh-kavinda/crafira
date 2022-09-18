<?php

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

  include 'php/Signin.php';
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
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script type="text/javascript">

   $(function () {
  $("#post-placeholder").load("pages/landingPage.html");
});

    $(document).ready(function($) {
      var page_url = '<?php echo $app_url ?>/';

      $(document).on('click', '.btn_load_screen', function(event) {
        event.preventDefault();

        var call_type = $(this).attr('call_type');

        $.getJSON(page_url + 'php/ajax.php', {
          call_type: call_type
        }, function(data, textStatus, xhr) {

          $(document).attr("title", data.title);
          $('#post-placeholder').load(data.url);
          // window.current.pushState("", "", data.url);
        });
      });


    });
    
  </script>

</head>

<body>

  <!--Navigation bar-->
  <div id="nav-placeholder" class="scrollspy"></div>

  <div id="post-placeholder"></div>

  <!--Footer placeholder-->
  <div id="footer-placeholder"></div>

  <!--  Scripts-->
  <script src="js/materialize.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/main.js"></script>

</body>

</html>