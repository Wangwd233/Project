<?php
require_once "dbh.inc.php";
require_once "functions.inc.php";

if (isset($_POST["submit"])) {
    $ContractName = $_POST["ContractName"];
    $CreditsAmount = $_POST["CreditsAmount"];
    $Definition = $_POST["Definition"];
    $sponsorId = "38";

    try{
        $sql = "INSERT INTO Contract(`ContractName`,`CreditsAmount`,`Definition`,`Sponsor_id`) VALUES ('$ContractName', '$CreditsAmount', '$Definition', '$sponsorId');";
        echo $sql;
        $conn->query($sql);
        header("location: ../newContract.php");
    }
    catch(Exception $e){
        die($e->getMessage());
    }

} else {
    header("location: ../main.php");
    exit();
}

?>