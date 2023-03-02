<?php include "connect.php";?>
<?php 
    $keyword = $_GET["username"];
    $sql = $pdo->prepare("SELECT username FROM member WHERE username=?");
    $sql->bindParam(1,$keyword);
    $sql->execute();
    $row=$sql->fetch();
    if(!empty($row))
    {
        echo "denied";
    }
    else
    {
        echo "okay";
    }
    echo echo "<script> alert('ไม่ได้โว้ยไอสัส');</script>";
?>