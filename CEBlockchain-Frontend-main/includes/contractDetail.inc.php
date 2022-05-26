<?php
 $hostname = "35.244.118.88";
 $database = "collab";
 $username = "collab_user";
 $password = 'C7E9JqE?$y8iJs9?';
 $id = $_GET["id"];
 $temp = 0.0;
 $subscribed = FALSE;
 $sponsor = FALSE;

 //open connection and query the contract by id in the database
 try{
    $conn = new mysqli($hostname,$username,$password,$database);
    $sql = "SELECT * FROM Contract WHERE Contractid='$id'";
    $result = $conn->query($sql);
    //get user id to see if the use is the sponsor of the contract
    $row = $result->fetch_assoc();
    if ($row['Sponsor_id'] == $_SESSION['userid']) {
       $sponsor = TRUE;
    }
    echo '<h1>Contract Name: '.$row['ContractName'].'</h1>';
    echo '<h2>Total Amount of Contract: '.$row['CreditsAmount'].' CE Points</h2>';

    //open anpther connection to calculate the remain amount of the contract
    $temp = $row['CreditsAmount'];
    $sql1 = "SELECT * FROM member_contract WHERE contract_id='$id'";
    $result1 = $conn->query($sql1);
    while( $row1 = $result1->fetch_assoc()){
       $temp = $temp - $row1['amount'];
       if ($row1['subscriber_id'] == $_SESSION['userid']){
          $subscribed = TRUE;
       }
    }
    
    //print detail on the page
    echo '<h2>Remain Amount to Achieve the Goal: '.$temp.' CE Points</h2>';

    echo '<hr><h2>Contract Definition: </h2>';
    echo '<p>'.$row['Definition'].'</p><hr>';
     
    // print different information for user, sponsor or subscriber
    if($subscribed) {
       echo "<h2>You have supported this contract. Thank you for supporting!</h2>";
    }elseif ($sponsor){
       echo "<h2>Here is your contract detail.</h2>";
    }else{
      echo '<form action="includes/contractAgree.inc.php" method="post">
      <h2>Donate credits</h2>
      <input type="number" name="ContractId" value="'.$id.'" hidden>
      <input type="number" name="remainAmount" value="'.$temp.'" hidden>
      <input type="number" step="0.01" name="Amount" placeholder="enter donate amount" max="'.$temp.'" required>
      <br>
      <br>
      <button type="submit" value="submit">Confirm</button>
      </form>';
    }
 }catch(Exception $e){
    die($e->getMessage());
 } 
?>
