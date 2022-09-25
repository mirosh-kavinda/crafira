
//   <!-- live search script -->
  $(document).ready(function () {
    $("#live_search").keyup(function () {
      var input = $(this).val();

      if (input != "") {
        $.ajax({
          url: 'assets/livesearch.php',
          method: "POST",
          data: { input: input },

          success: function (data) {
            $("#searchresult").html(data);
            $("#searchresult").css("display", "block");
            $("#post-placeholder").css("display", "none");
          }
        });
      } else {
        $("#searchresult").css("display", "none");
        $("#post-placeholder").css("display", "block");
      }
    });
  });



// <!-- side navigation bar script -->

  $(document).ready(function () {
    $('.sidenav').sidenav();
  });

  setTimeout(function () {
    $('loader_bg').fadeToggle();
  }, 1500);

  $(document).ready(function () {
    $('.modal').modal({
      opacity: 1,
      preventScrolling: true,
      dismissible: false,
      closeIcon: true
    });

  });

//   login form  content load  with this script
  $(function () {
    $("#login-placeholder").load("assets/login.html");
  });