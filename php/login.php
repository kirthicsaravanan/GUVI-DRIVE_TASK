<?php
require '../vendor/autoload.php';
$sname = "localhost";
$uname = "root";
$password = "";
$db_name = "guvi_db";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if(!$conn){
    echo "Connection failed!";
}


if(isset($_POST['lname']) && isset($_POST['lpassword'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $lname = validate($_POST['lname']);
    $lpassword = validate($_POST['lpassword']);

    if(empty($lname)){
            header("Location: login.php?error=username is required");
            exit();
    }else if(empty($lpassword)){
        header("Location: login.php?error=password is required");
        exit();
    }else{
        $sql = "SELECT * FROM login WHERE user_name='$lname' AND password='$lpassword'";
        $result = mysqli_query($conn, $sql);
        $redis = new Predis\Client();
        $cacheentry = $redis->get($email);



        if(mysqli_num_rows($result)===1){
            $row = mysqli_fetch_assoc($result);
            if($row['user_name']===$lname && $row['password']===$lpassword){
                // header("Location: http://localhost/guvi/profile.html");
                echo 'Yes';
                exit(); 
            }else{
                echo 'No';
                // header("Location: login.html?error=incorrect username or password");
            exit();
            }
        }else{
            echo 'No';
            // header("Location: login.html?error=incorrect username or password");
        exit();
        }
    }
}else{
    header("Location: login.html");
    exit();
} 
?>  