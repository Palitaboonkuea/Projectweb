<!-- <?php  session_start(); ?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href=menu.css> -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sriracha&display=swap');

@media (max-width:480px) {
    body
{
    background-color: rgb(253, 238, 238);
    margin: 0;
    padding: 0;
}
header
{
            justify-content: space-between;
            display: flex;
            align-items: center;
            background:white;
            flex-direction: column;
}

header ul 
{
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
    
}
header ul li
{
    list-style: none;
    margin-left: 5px;
}
.profile
{
    margin-right:30px ;
}
.button 
{
    
    border-radius:20px ;
    padding: 0.2em 0.5em 0.2em 0.5em;
    
    color: rgb(39, 37, 37);
    text-decoration: none;
    font-family: 'Sriracha', cursive;
    
}
.logo 
{
    text-decoration: none;
    color:black;
    font-size: 2em;
    margin-left: 30px;
    padding: 0px;
}
}

@media(min-width: 481px) and (max-width:600px) {
    body
{
    background-color: rgb(253, 238, 238);
    margin: 0;
    padding: 0;
}
header
{
            justify-content: space-between;
            display: flex;
            align-items: center;
            background:white;
}

header ul 
{
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
    
}
header ul li
{
    list-style: none;
    margin-left: 5px;
}
.profile
{
    margin-right:30px ;
}
.button 
{
    
    border-radius:20px ;
    padding: 0.2em 0.5em 0.2em 0.5em;
    
    color: rgb(39, 37, 37);
    text-decoration: none;
    font-family: 'Sriracha', cursive;
    
}
.logo 
{
    text-decoration: none;
    color:black;
    font-size: 2em;
    margin-left: 30px;
    padding: 0px;
}
}

@media(min-width:601px) {
    body
{
    background-color: rgb(253, 238, 238);
    margin: 0;
    padding: 0;
}
header
{
            justify-content: space-between;
            display: flex;
            align-items: center;
            background:white;
}

header ul 
{
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
    
}
header ul li
{
    list-style: none;
    margin-left: 30px;
}
.profile
{
    margin-right:30px ;
}
.button 
{
    
    border-radius:20px ;
    padding: 0.2em 0.5em 0.2em 0.5em;
    
    color: rgb(39, 37, 37);
    text-decoration: none;
    font-family: 'Sriracha', cursive;
    
}
.logo 
{
    text-decoration: none;
    color:black;
    font-size: 2em;
    margin-left: 30px;
    padding: 0px;
}
}
    </style>
    
</head>
<body>
<header>
            <a href="homepage.php" class ="logo"><b>samaang</b></a>
            <ul>
                
                <?php if(isset($_SESSION['username']))
                { ?> 
                    <li ><a class="button" href="homepage.php">HOME</a></li>
                    <li ><a class="button" href="logout.php">LOGOUT</a></li>
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
        <!-- <a href="homepage.html" class ="logo"><b>samaang</b></a>
            <ul>
                <li ><a class="button" href="homepage.php">HOME</a></li>
                <li ><a class="button" href="#">LOGIN</a></li>
                <li ><a class="button" href="#"></a></li>
                <li class="profile"><a href="#"><img src="img/profile.jpeg" width="30px" height="30px" style="border-radius: 50px;"></a></li>
            </ul> -->
        </header>
</body>
</html>