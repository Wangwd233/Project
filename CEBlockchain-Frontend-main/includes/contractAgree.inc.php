<?php
/**$hostname = "35.244.118.88";
$database = "collab";
$username = "collab_user";
$password = 'C7E9JqE?$y8iJs9?';*/

if (isset($_POST["submit"])){
 $contractId = $_POST["ContractId"];
 $subscriberId = "1";
 $subscribeAmount = $_POST["Amount"];

 require_once "dbh.inc.php";

 try{
    //$conn = new mysqli($hostname,$username,$password,$database);
    $sql = "INSERT INTO member_contract(`contract_id`,`subscriber_id`,`amount`) VALUES ('$contractId', '$subscriberId', '$subscribeAmount');";
    echo $sql;
    $conn->query($sql);
    header("location: ../view_detail.php");
}
catch(Exception $e){
    die($e->getMessage());
}

} else {
    header("location: ../index.php");
    exit();
}

?>
