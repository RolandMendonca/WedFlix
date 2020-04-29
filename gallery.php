<?php

 session_start();

include('dbconnection.php');
  
$email = $_SESSION['email'];

    $sql = "SELECT * from user where u_email='$email'";
    $query = $dbh -> prepare($sql);
    $query -> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);

$ref = $results[0]->v_ref;
    

     $sql = "SELECT * FROM vid where v_ref='$ref'";
    $query = $dbh -> prepare($sql);
    $query -> execute();
    $result = $query->fetchAll(PDO::FETCH_OBJ); 

?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
    <center>
        <h2>Hi <?php echo  $_SESSION['email'];?></h2>

        <iframe width="956" height="538" src="<?php print_r($result[0]->v_url); ?> " frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        
        
        
    </center>
    <center><a class="w3-button w3-black" href="logout.php">Logout</a></center>
</body>

</html>
