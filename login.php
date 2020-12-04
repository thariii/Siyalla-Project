<?php

$email = $_POST['email'];
$password = $_POST['password'];
$hashpass=md5($password);

if (!empty($email) || !empty($hashpass)) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "register";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT_email = "SELECT email From register Where email = ? Limit 1";
     $SELECT_password = "SELECT password From register Where password = ? Limit 1";
     //Prepare statement
     $stmt = $conn->prepare($SELECT_email);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     $stmt2 = $conn->prepare($SELECT_password);
     $stmt2->bind_param("s", $hashpass);
     $stmt2->execute();
     $stmt2->bind_result($hashpass);
     $stmt2->store_result();
     $rnum2 = $stmt2->num_rows;
     if ($rnum==1 && $rnum2==1) {
        header("location: index.html");
     } else {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        echo "<script>alert('Invalid login details');</script>";
        die(header('refresh: 0.1; url=login.html').'Invalid Credentials, wait 3 seconds or just click <a href="login.html">HERE</a> to check again.');

     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>
