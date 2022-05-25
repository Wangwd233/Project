<?php
 $hostname = "35.244.118.88";
 $database = "collab";
 $username = "collab_user";
 $password = 'C7E9JqE?$y8iJs9?';
?>
 <table><thead>
             <th> Contact Name </th>
             <th> Credits Amount </th>
             </thead>
<?php
 try{
     $conn = new mysqli($hostname,$username,$password,$database);
     $sql = "SELECT * FROM Contract";
     $result = $conn->query($sql);
     
     while( $row = $result->fetch_assoc()){
         echo'<tr><td><li><a href="contract_detail.php?id='.$row['Contractid'].'">'.$row['ContractName'].'</a></li></td><td>'.$row['CreditsAmount'].'</td>';
        }
 }
 catch(Exception $e){
     die($e->getMessage());
}

?>
</table>