<?php session_start(); ?>
<html>
    <head>
        <title>
            Drop
        </title>
        <link rel="stylesheet" href="style1.css">
        <link rel="stylesheet" href="style.css">
        <link href="https://fonts.googleapis.com/css?family=Prompt" rel="stylesheet">
    </head>
    <body>
    <header>
        <a href="homepage.php" class ="logo"><b>samaang</b></a>
            <ul>
                
                <?php if(isset($_SESSION['username']))
                { ?> 
                    <li ><a class="button" href="homepage.php">HOME</a></li>
                    <li ><a class="button" href="logout.php">LOGOUT</a></li>
                    <li ><a class="button" href="delivery.php">Send</a></li>
                    <li ><a class="button" href="report-sale.php">Report</a></li>
                    <scrip>
                        <li><a class="button"> <?php  echo $_SESSION['username']; ?></a></li>
                    </scrip>
                    <li class="profile"><a href="#"><img src="https://i.pinimg.com/564x/33/c3/7c/33c37cb8ddf5abc2e557369f15be69b8.jpg" width="30px" height="30px" style="border-radius: 50px;"></a></li>
            <?php }else
            { ?>
                <li><a class="button" href="homepage.php">HOME</a></li>
                <li ><a class="button" href="login_form.php">LOGIN</a></li>
                <li class="profile"><a href=""><img src="img/profile.jpeg" width="30px" height="30px" style="border-radius: 50px;"></a></li>
           <?php }  ?>

            </ul>
        </header>

    
    <div class="container">
        <div class="box">
          <a href="skincare.php">
          <img src="https://images.everydayhealth.com/images/what-are-natural-skin-care-products-alt-1440x810.jpg?w=1110/1000x800">
        </a>
        <span>Skincare</span>
        </div>
        
        <div class="box">
         <a href="lipstick.php">
          <img src="https://media.timeout.com/images/103770834/750/422/image.jpg/1000x802">
        </a>
         <span>Lipstick</span>
      
        
        </div>
     
        <div class="box">
          <a href="powder.php">
          <img src="https://burst.shopifycdn.com/photos/makeup-powder-foundation-brushes.jpg?width=925&format=pjpg&exif=1&iptc=1/1000x804">
        </a>
        <span>Powder</span>
        </div>
        <div class="box">
          <a href="blush.php">
          
          <img src="https://images.unsplash.com/photo-1646500821831-84fd6f2b6e71?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1634&q=80/1000x806">
        </a>
          <span>Blush</span>
        </div>

          <div class="box">
          <a href="palette.php">
          
            <img src="https://i0.wp.com/www.beautybucketeer.com/wp-content/uploads/2016/04/Battle-of-the-Drugstore-Nude-Palettes-1-1.jpg?resize=1080%2C810/1000x806">
        </a>
          <span>Palette</span>
        </div>
</div>
    </body>
</html>