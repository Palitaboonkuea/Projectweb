<?php 
    session_start();
    if(isset($_SESSION['ERROR']))
    {
        echo "<script> alert('username or password is incorrect');</script>";
        session_destroy();
    }
?>
<html>
    <head>
        <link rel = "stylesheet" href = "style_login.css">
    </head>
    <body>
    <div class="container">
        <h1>LOGIN</h1>
        <form action ="login_check.php" method="post">
            USERNAME
            <input type="text" name="username" onblur="checkUsername"><br>
            PASSWORD
            <input type="password" name ="password"><br>
            <input type = "submit" name = "submit" value ="LOGIN">
        </form>
        <b>don't have account? <a href="register_form.php">click me</a></b>
    </div>
    </body>
</html>