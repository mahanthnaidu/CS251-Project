<!DOCTYPE html>

<html>

<head>

    <title>LOGIN</title>

    <link rel="stylesheet" type="text/css" href="style1.css">

</head>

<body>
    <div class="form-container" style=" background-image: url('login_background.webp');">

     <form action="login.php" method="post">

        <h2>LOGIN</h2>

        <?php if (isset($_GET['error'])) { ?>

            <p style="color: crimson"><?php echo $_GET['error']; ?></p>

        <?php } ?>


        <input type="text" name="uname" placeholder="enter your email"><br>


        <input type="password" name="password" placeholder="enter your password"><br> 

        <input type="submit" name="submit" value="login now" class="form-btn">

        <p text-align:center; >don't have an account? <a href="register_form.php">register now</a></p>
     </form>

     </div>

</body>

</html>



