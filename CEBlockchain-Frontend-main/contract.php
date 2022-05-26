<?php
include_once 'header.php';
?>

<article>
    <center>
        <h2>Contract</h2>
        <br>
        <?php
          echo "<li><a href='newContract.php'>Create new contract</a></li>";
          echo "<li><a href='view_contract.php'>Show Contract List</a></li>";
        /**if (isset($_SESSION["userid"])) {
          echo $_SESSION["userid"];
        } else {
          echo "No login";
        }*/
        ?>
        <br>
        <br>
        <br>
        <br>
        <br>
    </center>
</article>


<?php
include_once 'footer.php';
?>