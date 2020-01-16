<?php

  @$page = $_GET['page'];
  if (!isset($page)) {
    $page = 'home';
  }

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/mdb.min.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/hover.css" rel="stylesheet">
</head>

<body>


  <?php
    include('header.php');
    include($page . '.php');
    include('nav.php');
  ?>
  <!-- Start your project here-->
  
  



  <!-- /Start your project here-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="../js/popper.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/mdb.min.js"></script>

  <script>
    $(window).scroll(function (event) {
      var scroll = $(window).scrollTop();
      if (scroll >= 190) {
        $(".nav-stick").addClass('slideInUp');
        $(".nav-stick").removeClass('slideOutDown');
      } else {
        $(".nav-stick").addClass('slideOutDown');
        $(".nav-stick").removeClass('slideInUp');
      }
    });
  </script>
</body>

</html>
