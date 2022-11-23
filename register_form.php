

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style1.css">

</head>
<body>
   
<div class="form-container"  style=" background-image: url('login_background.webp');">

   <form action="register.php" method="post">
      <h3>register now</h3>
      <?php if (isset($_GET['error'])) { ?>

      <p style="color: crimson"><?php echo $_GET['error']; ?></p>

         <?php } ?>

      <input type="text" name="name" required placeholder="Choose your Gamer_tag">
      <input type="text" name="email" required placeholder="enter your email">
      <input type="password" name="password" required placeholder="enter your password">
      <input type="password" name="cpassword" required placeholder="confirm your password">
      <input type="submit" name="submit" value="register now" class="form-btn">
      <p>already have an account? <a href="index.php">login now</a></p>
   </form>

</div>

</body>
</html>