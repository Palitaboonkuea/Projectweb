<?php include "connect.php" ?>
<?php
    session_start();
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $sql = "SELECT * FROM member WHERE username='$username' && password = '$password'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    if($row > 0)
    {
        $_SESSION["username"] = $row["username"];
        $_SESSION["address"] = $row["address"];
        header("location:homepage.php");
    }
    else
    {
        $_SESSION['ERROR'] = "username or password is incorrect";
        header("location:login_form.php");
    }
?>