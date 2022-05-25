<?php
include_once 'header.php';
?>

<?php
if (!isset($_SESSION["username"])) {
        echo "<br><br><br>";
        echo "<H1>Please Login or Sign Up to access this page</H1>";
        echo "<br><br><br>";
        exit();
}
?>

<article>
        <h1 id="main">News</h1><br>
        <h2>Site under development</h2><br>
        <hr>
</article>;