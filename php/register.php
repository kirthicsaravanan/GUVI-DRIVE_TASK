<?php

require '../vendor/autoload.php';
    $sname = "localhost";
    $unmae = "root";
    $password = "";
    $db_name = "guvi_db";

    $conn = mysqli_connect($sname, $unmae, $password, $db_name);
    if(!$conn){
        echo "Connection failed!";
    }

    $runame = $_POST['runame'];
    $rname = $_POST['rname'];
    $rpassword = $_POST['r1password'];
    $remail = $_POST['remail'];
    $rage = $_POST['rage'];
    $rbio = $_POST['rbio'];
    $rjob = $_POST['rjob'];
    $rinterest = $_POST['rinterest'];
    
    if($rname!=''){
        $sql = "INSERT INTO login (user_name,password,name) VALUES ('$rname', '$rpassword','$runame')";
    }

    $conn = new MongoDB\Client("mongodb://localhost:27017");

    $client = new MongoDB\Client("mongodb://localhost:27017");
$guvidb = $client->selectCollection('mydb', 'profile');

$user = array(
    'email'=>$_POST['remail'],
    'bio' => $_POST['rbio'],
    'job' => $_POST['rjob'],
    'age' => $_POST['rage']
);



    
    $result = mysqli_query($conn, $sql);
    echo "$name";
    if(mysqli_num_rows($result)===1){
        $row = mysqli_fetch_assoc($result);
    }
    else{
        header("Location: login.php?error=incorrect username or password");
        $guvidb->insertOne($user);
        echo "User registered successfully in database";
    }

?>

