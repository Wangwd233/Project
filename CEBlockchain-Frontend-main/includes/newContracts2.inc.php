<?php


if (isset($_POST["submit"])) {
    $ContractName = $_POST["ContractName"];
    $CreditsAmount = $_POST["CreditsAmount"];
    $Definition = $_POST["Definition"];
    $sponsorId = $_POST["sponsorId"];

    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    try{
        $sql = "INSERT INTO Contract(`ContractName`,`CreditsAmount`,`Definition`,'Sponsor_id') VALUES ('$ContractName', '$CreditsAmount', '$Definition', '$sponsorId');";
        echo $sql;
        $conn->query($sql);
        header("location: ../newContract.php");
    }
    catch(Exception $e){
        die($e->getMessage());
    }
    
} else {
    header("location: ../signup.php?error=none");
    exit();
}

?>