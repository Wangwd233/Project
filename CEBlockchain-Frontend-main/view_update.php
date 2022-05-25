<?php
include_once "header.php";
include_once "includes/dbh.inc.php";
include_once "includes/functions.inc.php";
?>
<?php
// If user not signed in
if (!isset($_SESSION["username"])) {
  echo "<br><br><br>";
  echo "<H1>Please Login or Sign Up to access this page</H1>";
  echo "<br><br><br>";
  exit();
}
?>
<?php

// If user signed in
if (isset($_SESSION["username"])) {
  $username = $_SESSION["username"];
}
echo "<article>";
echo "<center>";

/* ------------------------------------------------------------------------------------------------------------------------------------------------------------------------ */
/* Details Section */

echo '<div id="main" class="main-container">'; // opening container div
echo '<div class="sub-div left-div">'; // opening left div
echo "<h2>Details for $username</h2>";

// Gets the logged in users details
$userData = getMemberDetails();
echo '<table class="table-width">';
// For each json key in userData, $value is the value of the key's element
foreach ($userData as $key => $value) {
  // Output each element into a table
  if ($key !== 'id') {
    echo '
      <tr>
        <th>' . ucfirst($key) . '</th>
        <td width = 150 align = "center">' . $value . '</td>
      </tr>
    ';
  }
}
echo '</table>';
echo '</div>'; // closing left div

// Update details section
echo '<div class="sub-div right-div">'; // opening right div
echo '<h2>Update your Details</h2>
<form action="includes/update.inc.php" method="post">
  <p class="update-title">Update Name:</p>
  <input type="name" name="name" placeholder="Update Name..." value="' . $userData["name"] . '" style="width: 100%;">
  <p class="update-title">Update City:</p>
  <input type="city" name="city" placeholder="Update City..."  value="' . $userData["city"] . '" style="width: 100%;">
  <p class="update-title">Update State:</p>
  <input type="state" name="state" placeholder="Update State..." value="' . $userData["state"] . '" style="width: 100%;">
  <p class="update-title">Update Country:</p>
  <input type="country" name="country" placeholder="Update Country..." value="' . $userData["country"] . '" style="width: 100%; margin-bottom: 20px;">
  
  <button class="button" type="submit" name="submit" style="width: 100%;">Submit</button><br><br>
</form>';

// Error checking
if (isset($_GET["error"])) {
  if ($_GET["error"] == "emptyinput") {
    echo "<p>No info updated</p>";
  } else if ($_GET["error"] == "invaliduid") {
    echo "<p>Please check name is correct!</p>";
  } elseif ($_GET["error"] == "invalidemail") {
    echo "<p>Please enter a proper email!</p>";
  } elseif ($_GET["error"] == "passwordsdontmatch") {
    echo "<p>Passwords don't match!</p>";
  } elseif ($_GET["error"] == "stmtfailed") {
    echo "<p>Somthing went wrong!</p>";
  } else if ($_GET["error"] == "usernametaken") {
    echo "<p>Username/Email taken, please choose another!</p>";
  } else if ($_GET["error"] == "none") {
    echo "<p>Info Updated!</p>";
  }
}

echo '</div>'; // closing right div
echo '</div>'; // closing container div
echo '<br><hr style="width: 85%;">';

/* ------------------------------------------------------------------------------------------------------------------------------------------------------------------------ */
/* Wallet Section */

$email = $userData["email"];
$mnemonicPhrase = getMnemonicPhrase();
$publicAddress = getPublicAddress();

echo '<div class="main-container">';
echo "<h2>Wallet</h2>";
echo '<table class="table-width">
        <tr>
          <th>Email</th>
          <td width = 150 align = "center">' . $email . '</td>
        </tr>
        <tr>
          <th>Token Adress</th>
          <td width = 150 align = "center">' . $publicAddress["address"] . '</td>
        </tr>
        <tr>
          <th>Mnemonic Phrase</th>
          <td width = 150 align = "center">' . $mnemonicPhrase["phrase"] . '</td>
        </tr>
    </table>';

echo '</div>';
echo '<br><hr style="width: 85%;">';

/* ------------------------------------------------------------------------------------------------------------------------------------------------------------------------ */
/* Transactions Section */

$transactionHistory = getTransactions();

echo '<div class="main-container">';
echo "<h2>Transaction History</h2>";
if ($transactionHistory["transactions"]) {
  for ($i = 0; $i < count($transactionHistory["transactions"]); $i++) {
    echo '<table class="table-width">';

    foreach ($transactionHistory["transactions"][$i] as $key => $value) {
      echo '<tr>';
      echo '<th>' . ucfirst($key) . '</th>
      <td width = 150 align = "center">' . strtoupper($value) . '</td>';
      echo '</tr>';
    }

    echo '</table>';
  }
} else {
  echo 'You have no transaction history.';
}
echo '</div>';
echo '<br><br>';
?>

</center>
</article>
<hr>

<?php
include_once "footer.php";
?>