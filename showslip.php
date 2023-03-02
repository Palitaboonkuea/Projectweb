<?php include "condb.php"; ?>
<html>
    <head>

    </head>
    <body>
        <?php
        $sql ="SELECT `order`.`Slip_img` FROM `order` JOIN send ON `order`.`เลขออเดอร์`=send.เลขออเดอร์;";
        $res =mysqli_query($conn, $sql);

        if(mysqli_num_rows($res)>0){
            while($images = mysqli_fetch_assoc()){ ?>
                  <div class="alb">
                    <img src="slip/<?=$images['Slip_img']?>">
                  </div>
           <?php }
        }?>
    </body>
</html>
