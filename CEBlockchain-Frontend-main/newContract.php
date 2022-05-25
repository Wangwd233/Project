<?php
include_once 'header.php';
?>

<article>
    <center>
        <h2>newContract</h2>
        <br>
        <form action="includes/newContracts2.inc.php" method="post">
            <?php
            if (isset($_SESSION["userid"])) {
                echo '<input type="number" name="sponsorId" value="'.$_SESSION["userid"].'" hidden>';
            }
            ?>
            <p>Contract Name:</p>
            <input type="text" name="contractname" placeholder="Enter Contract Name" required>
            <br>
            <p>Credits amount:</p>
            <input type="number" step="0.01" name="Credits" placeholder="Enter the Amount of Credits" required>
            <br>
            <p>Definition:</p>
            <input type="text" name="definition" placeholder="The simple introduction about the contract" style="width:250px; height: 100px;" required>
            <br>
            <br>
            <button type="submit" value="submit">Create</button>
        </form>
        <br>
        <br>
        <br>
        <br>
    </center>
</article>


<?php
include_once 'footer.php';
?>