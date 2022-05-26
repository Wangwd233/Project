<?php
/**$hostname = "35.244.118.88";
$database = "collab";
$username = "collab_user";
$password = 'C7E9JqE?$y8iJs9?';*/

/**echo $_POST["ContractId"];
echo "<br>";
echo $_POST["remainAmount"];
echo "<br>";
echo $subscribeAmount = $_POST["Amount"];*/
require_once "dbh.inc.php";
require_once "functions.inc.php";

 $contractId = $_POST["ContractId"];
 $subscribeAmount = $_POST["Amount"];
 $remainAmount = $_POST["remainAmount"];
 $subscriberId = $_SESSION['userid']; //get user id

//when the user donated amount is not 
if ($subscribeAmount != $remainAmount){
    try{
    //$conn = new mysqli($hostname,$username,$password,$database);
       $sql = "INSERT INTO member_contract(`contract_id`,`subscriber_id`,`amount`) VALUES ('$contractId', '$subscriberId', '$subscribeAmount');";
       echo $sql;
       $conn->query($sql);
       header("location: ../view_contract.php");
    }
    catch(Exception $e){
        die($e->getMessage());
    }
} else {
    try{
        $sql = "DELETE FROM Contract WHERE Contractid='$contractId'";
        echo $sql;
        $conn->query($sql);
        $sql1 = "DELETE FROM member_contract WHERE contract_id='$contractId'";
        echo $sql1;
        $conn->query($sql1);
        header("location: ../view_contract.php");
    }
    catch(Exception $e){
        die($e->getMessage());
    }
}

?>
