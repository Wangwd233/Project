<?php
include_once 'header.php';
?>


<article>
  <center>
    <h2>Log In</h2>
    <form action="includes/login.inc.php" method="post">

      <input type="text" name="email" placeholder="Email...">
      <br><br>
      <input type="password" name="pwd" placeholder="Password...">
      <br><br>

      <button type="submit" name="submit" class="button" style="width: 30%;">Log In</button><br><br>
    </form>

    <?php

    if (isset($_GET["error"])) {
      if ($_GET["error"] == "emptyinput") {
        echo "<p>Please fill in all fields!</p>";
      } else if ($_GET["error"] == "wronglogin") {
        echo "<p>Incorrect Login Information!</p>";
      }
    }
    ?>
  </center>
</article>
<hr>

<?php
include_once 'footer.php';
?>