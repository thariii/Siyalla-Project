<?php
$inputFname = $_POST['inputFname'];
$inputLname = $_POST['inputLname'];
$email = $_POST['email'];
$inputPnumber = $_POST['inputPnumber'];
$inputAddress = $_POST['inputAddress'];
$password = $_POST['password'];
$hashpass=md5($password);
if (!empty($inputFname) || !empty($inputLname) || !empty($email) || !empty($inputPnumber) || !empty($inputAddress) || !empty($hashpass)) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "register";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT email From register Where email = ? Limit 1";
     $INSERT = "INSERT Into register (fname  , lname  , email , pnumber  , address  , password) values(?, ?, ?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssss", $inputFname, $inputLname, $email, $inputPnumber, $inputAddress, $hashpass);
      $stmt->execute();
      header("location: login.html");
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>
