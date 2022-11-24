<?php 

session_start();

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>CS 251 PROJECT</title>
        <link href = "style.css" rel = "stylesheet">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <script src="script.js"></script>
    </head>
    <body style="background-image: url('wa.jpg');">
        <h1 class="glow"><span style="color:yellow">SCRIBBLE IT!</span></h1>
            <button class="button1">     <b>PLAY </b> <br>NOW    </button>
            <button class="button2">  <b>PRIVATE</b> <br>ROOMS  </button>



            
            <!-- <form action="index.php">
            <button class="button3">      <b>LOGIN</b>     </button>
            </form> -->
            <!-- <button class="button5">  DAILY BONUS </button>
            <button class="button6"> SHOP  </button> -->
            <button class="button7"> LEADER BOARDS  </button>
            <!-- <button class="button8"> STREAK AND  </button>
            <button class="button9"> AVAILABLE <br>  <span style="color:yellow">COLLECT NOW!</span></button> -->
            <!--<button class="button10"> GET NEW TOOLS,<br> COLOURS,AND <br>MORE   </button>-->
            <?php 
            if (isset($_SESSION['username'])) {
            ?>
            <button class="button3" style="position: absolute ;left: 400px; top: 100px;">CURRENT : <br> <?php echo 0; ?> 
             <br> BEST :   <br> <?php echo $_SESSION['highscore']; ?> </button>
            <button class="button3" style="position: absolute ;left: 1200px; top: 200px;">
            USERNAME:<br> <?php echo $_SESSION['username']; ?> <br></button>
            <form action="logout.php">
            <button class="button3"style=" position: absolute ;left: 30px;top: 140px;"><b>LOGOUT</b></button>
            </form>
             <?php
            }else{?>
                <form action="index.php">
            <button class="button3">      <b>LOGIN</b>     </button>
            </form>
            <?php
            }
            ?>
        </body>
        </html>

