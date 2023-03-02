<?php include "connect.php" ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
   <!-- Bootstrap CSS-->
    <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script> scr="bootstrap/js/bootstrap.bundle.min.js"</script>  -->
    <link rel="stylesheet" href="detail-pro.css">
</head>
<body>
        <header>
        <?php include "menu.php";?>
    </header>
    <div class="container">
        <div class="sidebar">
            <input type="text" class="sidebar-search" placeholder="Search something...">
      
            <a href="pre-skincare.php" class="sidebar-items">
               Skincare
            </a>
            <a href="pre-lipstick.php" class="sidebar-items">
                Lipstick
            </a>
            <a href="pre-powder.php" class="sidebar-items">
                Powder
            </a>
            <a href="pre-blush.php" class="sidebar-items">
                Blush
            </a>
            <a href="pre-palette.php" class="sidebar-items">
                Palette
            </a>
        </div>
    
    <div class="detail">
    <h1>Detail</h1>
    <?php 
    $keyword = $_GET["รหัสสินค้า"];
    $sql = "SELECT * FROM product WHERE รหัสสินค้า LIKE '%$keyword'";
    $result = mysqli_query($conn,$sql);
    while($row=mysqli_fetch_array($result))
    {?>
    
    <div align="center"><img src='imgs/<?=$row["รหัสสินค้า"]?>.jpg' width="200px" height="200px"></div>
    <div style="padding: 30px;" class="info">
    รหัสสินค้า: <?=$row ["รหัสสินค้า"]?><br>
    ชื่อสินค้า: <?=$row ["ชื่อสินค้า"]?><br>
    ราคาสินค้า: <?=$row ["ราคาสินค้า"]?><br>
    จำนวนสินค้า: <?=$row ["จำนวนสินค้า"]?><br>
    รายละเอียดสินค้า: <?=$row ["รายละเอียดสินค้า"]?><br>
    รหัสประเภทสินค้า: <?=$row ["รหัสประเภทสินค้า"]?><br>
    <div align='center'>
        <a href="con-order.php?รหัสสินค้า=<?=$row["รหัสสินค้า"]?>" > <button>เพิ่มในตะกร้า</button> </a>
    </div>
    </div>                  
    <?php } ?>
  </div>
  </div>    
</body>
</html>