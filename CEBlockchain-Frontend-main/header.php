<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head class="no-js">
  <meta charset="utf-8" />
  <title>Collaboration Earth</title>
  <link rel="stylesheet" type="text/css" media="screen" href="CE.css" />
  <link rel="stylesheet" type="text/css" media="print" href="CEprint.css" />
  <link rel="shortcut icon" href="favicon.ico" />
  <script src="scripts/modernizr-1.6.min.js"></script> 
  <style type="text/css">
    figureL {
      margin: 1px 10px 0 0
    }

    figureR {
      margin: 1px 10px 0 0
    }
  </style>

</head>

<body>
  <div id="box">
    <p id="skipnav"><a href="#main"><span id="skiplink">Skip navigation</span></a></p>
    <header>
      <img src="images/logo.jpg" height=200 /img><img src="images/CE Logo2.jpg" width="650" /img>

    </header>

    <nav>
      <hr>
      <ul id="mainnav">

        <li><a href="index.php">Home</a></li>



        <?php
        if (isset($_SESSION["username"])) {
          echo "<li><a href='about.php'>About CE</a></li>";
          echo "<li><a href='news.php'>News</a></li>";
          echo "<li><a href='main.php'>Members Only</a></li>";
          echo "<li><a href='view_update.php'>View/Update Details</a></li>";
          echo "<li><a href='links.php'>Links</a></li>";
          echo "<li><a href='contract.php'>Contract</a></li>";
          echo "<li><a href='includes/logout.inc.php'>Log Out</a></li>";
        } else {
          echo "<li><a href='about.php'>About CE</a></li>";
          echo "<li><a href='signup.php'>Signup</a></li>";
          echo "<li><a href='login.php'>Login</a></li>";
          echo "<li><a href='contract.php'>Contract</a></li>";
          echo "<li><a href='links.php'>Links</a></li>";
        }


        ?>



      </ul>
    </nav>
    <hr>