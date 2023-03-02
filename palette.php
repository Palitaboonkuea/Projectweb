<?php
$pdo = new PDO("mysql:host=localhost;dbname=shop;charset=utf8", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $pdo->prepare("SELECT ชื่อสินค้า,รหัสสินค้า,img FROM product WHERE รหัสประเภทสินค้า = 'BO'");
$stmt->execute();
?>
<html>
<head>
<link rel="stylesheet" href="web.css">
<meta charset="utf-8">

    <script>
      function confirmDelete(รหัสสินค้า) { 
var ans = confirm("ต้องการลบสินค้ารหัส " + รหัสสินค้า); 
if (ans==true) 
document.location = "delete.php?รหัสสินค้า=" + รหัสสินค้า; 
}
</script>

</head>
<body>

        <?php include "menu.php";?>
       
        <span class="add"><a href="http://localhost/addform.html"></a></span><br>
        <div class="container">
<?php while ($row = $stmt->fetch()) 
{ ?>
<br><img src='img/<?=$row["img"]?>' width='100'><br>
        <?=$row ["ชื่อสินค้า"]?>
        <button class="custom-btn btn-1">
        <?php echo "<a href='editform.php?รหัสสินค้า=" . $row ["รหัสสินค้า"] . "'>แก้ไข</a>"; ?>
</button>
<button class="custom-btn2 btn-1">

         <?php echo "<a href='#' onclick=confirmDelete('".$row["รหัสสินค้า"]. "')>ลบ</a> "; ?> 
           </button><br> 
       
        
        
      <?php } ?>
      

</body>
</html>