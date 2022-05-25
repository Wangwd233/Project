<?php
include_once 'header.php';
?>

<article>
  <center>
    <h2>Sign Up</h2>
    <form action="includes/signup.inc.php" method="post">

      <input type="text" name="name" placeholder="Full Name...">
      <br><br>
      <input type="text" name="email" placeholder="Email...">
      <br><br>
      <input type="text" name="username" placeholder="Username...">
      <br><br>

      Select your member type<br>
      <select name="memberType" id="member-select">
        <option value="" selected disabled>-Select Membership-</option>
        </option>
        <option value="Consumer">Consumer</option>
        <option value="Vender">Vendor</option>
        <option value="Sequester">Sequester</option>
      </select>

      <br><br>
      <input type="city" name="city" placeholder="City...">
      <br><br>
      <input type="state" name="state" placeholder="State...">
      <br><br>
      <input type="country" name="country" placeholder="Country...">
      <br><br>
      <input type="password" name="pwd" placeholder="Password...">
      <br><br>
      <input type="password" name="pwdrepeat" placeholder="Repeat Pwd...">
      <br><br>
      <button type="submit" name="submit" class="button" style="width: 30%;">Sign Up</button><br><br>
    </form>
    <?php
    if (isset($_GET["error"])) {
      if ($_GET["error"] == "emptyinput") {
        echo "<p>Please fill in all fields!<br> Hit Back button/arrow to try again!</p>";
      } else if ($_GET["error"] == "invaliduid") {
        echo "<p>Please check name is correct!<br> Hit Back button/arrow to try again!</p>";
      } elseif ($_GET["error"] == "invalidemail") {
        echo "<p>Please enter a proper email!<br> Hit Back button/arrow to try again!</p>";
      } elseif ($_GET["error"] == "passwordsdontmatch") {
        echo "<p>Passwords don't match!<br> Hit Back button/arrow to try again!</p>";
      } elseif ($_GET["error"] == "stmtfailed") {
        echo "<p>Somthing went wrong!<br> Hit Back button/arrow to try again!</p>";
      } else if ($_GET["error"] == "usernametaken") {
        echo "<p>Username/Email taken, <br> Hit Back button/arrow to choose try again!</p>";
      } else if ($_GET["error"] == "none") {
        echo "<p>You have signed up! <br>Logging you in.</p>";
      }
    }
    ?>
  </center>
</article>
<hr>

<?php
include_once "footer.php";
?>