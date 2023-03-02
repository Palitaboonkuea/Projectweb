<?php 
    session_start();

    if(isset($_SESSION['ERROR']))
    {
        echo "<script> alert('password not match');</script>";
        session_destroy();
    }

?>
<html>
    <head><meta charset="utf-8"></head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Sriracha&display=swap');
        *{
            font-family: 'Sriracha', cursive;
        }
        header
        {
            
        }
       
        body
        {
            
            margin:0;
            padding: 0;
            display:flex;
            background-color:pink;
            background-image:url(https://i.pinimg.com/originals/68/86/70/688670102029cea9a51f8579dbe5a0f0.jpg);
        }
        img
        {
            max-width: 100%;
        }
        .container
        {
            background:rgb(247, 156, 156,0.5);
            display: block;
            margin: auto;
            border-radius:30px;
            width: 600px;
            height: 600px;
            display: table-cell;
            text-align: center;
            vertical-align: middle
        }
        input
        {
            
            border-radius:30px;
            border-color:#F6C6C7;
            width: 300px;

        }
        input:focus {

            background-color: #E7DCFC;
            border-color:#F6C6C7;
        }
        input[type=submit]
        {
            margin-top:10px;
            border-radius:5px;
            padding:10px;
            width: 100px;
            background: -webkit-linear-gradient(#F6C6C7, #E8CFF8); 
            color:white;
        }
        div
        {
            box-shadow: 10px 10px ;
            color:white;
        }

        
    </style>
    <script>
    </script>
    
    <body>
    <div class="container">
        <h1>SIGN UP</h1>
        <form action="save.php" method="post">
            <label>
                <b>username</b><br>
                <input type = "text" name="username" id="username" onblur="checkUsername()" required><br>
            </label>

            <label>
                <b>password</b><br>
                <input type = "password" name ="password" id="password"required><br>
            </label>

            <label>
            <b>confirm password</b><br>
                <input type="password" name="c_password"id="c_password"required><br>
            </label>

            <label>
            <b>name</b><br>
                <input type = "text" name = "name" id="name"required><br>
            </label>

            <label>
            <b>email</b><br>
                <input type="email" name ="email" id="email" required><br>
            </label>
            <label>
            <b>phone</b><br>
                <input type = "tel" name="phone" id="phone" pattern="[0-9]{10}" required><br>
            </label>

            <label>
            <b>address</b><br>
                <input type="text" name="address" id="address"required><br>
            </label>

            <label>
                <input type="submit" class="button-56" role="button" value="Register">
            </label>
            <label>
            <b>already have accont?</b> <a href="login_form.php" style="text-decoration:none; color:#695A5B;">click</a><br>
            </label>

    </form>
    </div>
    </body>
</html>




