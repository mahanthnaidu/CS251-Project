<?php 

session_start();

include "../db_conn.php";
?>
<!DOCTYPE html>
<html style="font-size: 16px;" lang="en"><head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>Home</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="Home.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.21.5, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alfa+Slab+One:400">
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"logo": "images/nullcmd.webp"
}</script>
<script type="text/javascript">
    var score = window.location.search;
    if(score != ''){score=score.substring(1);
    score = parseInt(score);
  }
    else{
      score=0;
    }
    var username = '<?php echo $_SESSION['username']?>';
    console.log(username); 
    var highscore = '<?php  echo $_SESSION['highscore'] ?>';
    highscore_i = parseInt(highscore);
    if(score>highscore_i){
      highscore_i=Math.max(score,highscore_i);
      highscore = highscore_i.toString();
      <?php
      $txt = $_SERVER['REQUEST_URI']; ;
      $arr = explode("?",$txt);
      $name = $_SESSION['username'];
      $score = $arr[1];
      $sql=$sql = "UPDATE users SET highscore='$score' WHERE username='$name'";
      $result = $conn->query($sql);

      ?>
    }
    highscore = highscore_i.toString();
    console.log(highscore);
    function redirect(){
      window.location.href = "http://localhost:3000/?"+username+"&"+highscore;
    }
    function change(){
      document.getElementById('private').className = 'show';
    }
    function redirect1(){

      roomname =  document.getElementById('roomname').value

      window.location.href = "http://localhost:3000/?"+username+"&"+highscore+"&"+roomname;
    }
    function show(){
      if(document.getElementById('table').className=="hide"){
    document.getElementById('table').className="show1";
    }
    else{
    document.getElementById('table').className="hide"; 
    p=1;
    }
    document.getElementById('table').innerHTML= "<tr><th>Username</th><th>HIGH-SCORE</th></tr>"
    <?php 
    $sql = "SELECT username,highscore FROM users ORDER BY highscore DESC";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
     ?>
     document.getElementById('table').innerHTML+="<tr><td><?php echo  $row["username"]?></td><td><?php echo $row["highscore"]?></td></tr>"
    <?php }
    ?>
    }

</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="Home">
    <meta property="og:type" content="website">
  </head>
  <body data-home-page="Home.html" data-home-page-title="Home" class="u-body u-xl-mode" data-lang="en"><header class="u-clearfix u-header u-header" id="sec-7b58"><div class="u-clearfix u-sheet u-sheet-1">
        <a href="https://nicepage.com" class="u-image u-logo u-image-1" data-image-width="256" data-image-height="256">
          <img src="images/nullcmd.webp" class="u-logo-image u-logo-image-1">
        </a>
        <nav class="u-menu u-menu-one-level u-offcanvas u-menu-1">
          <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px; font-weight: 700; text-transform: uppercase;">
            <a class="u-button-style u-custom-active-border-color u-custom-active-color u-custom-border u-custom-border-color u-custom-borders u-custom-hover-border-color u-custom-hover-color u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-text-active-color u-custom-text-color u-custom-text-decoration u-custom-text-hover-color u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
              <svg class="u-svg-link" viewBox="0 0 24 24"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
              <svg class="u-svg-content" version="1.1" id="menu-hamburger" viewBox="0 0 16 16" x="0px" y="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg"><g><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</g></svg>
            </a>
          </div>
          <div class="u-custom-menu u-nav-container">
            <ul class="u-nav u-spacing-30 u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-grey-90 u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-palette-1-base" href="Home.html" style="padding: 16px 38px;">Home</a>
</li><li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-grey-90 u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-palette-1-base" href="About-Us.html" style="padding: 16px 38px;">About Us</a>
</li><li class="u-nav-item"><a class="u-border-2 u-border-active-palette-1-base u-border-grey-90 u-border-hover-palette-1-base u-border-no-left u-border-no-right u-border-no-top u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-palette-1-base" href="Help-support.html" style="padding: 16px 38px;">Help support</a>
</li></ul>
          </div>
          <div class="u-custom-menu u-nav-container-collapse">
            <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
              <div class="u-inner-container-layout u-sidenav-overflow">
                <div class="u-menu-close"></div>
                <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Home.html">Home</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="About-Us.html">About Us</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Help-support.html">Help support</a>
</li></ul>
              </div>
            </div>
            <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
          </div>
        </nav>
      </div></header>
    <section class="u-clearfix u-image u-section-1" id="sec-6e18" data-image-width="1920" data-image-height="1080">
      <div class="u-clearfix u-sheet u-sheet-1">
        <a href="http://localhost/demo/index.php" class="u-btn u-btn-round u-button-style u-gradient u-hover-palette-1-base u-none u-radius-50 u-text-body-alt-color u-text-hover-palette-3-base u-btn-1"><span class="u-icon u-text-white u-icon-1"><svg class="u-svg-content" viewBox="0 0 490.667 490.667" x="0px" y="0px" style="width: 1em; height: 1em;"><circle cx="245.333" cy="160" r="74.667"></circle><circle cx="394.667" cy="224" r="53.333"></circle><circle cx="97.515" cy="224" r="53.333"></circle><path d="M245.333,256c-76.459,0-138.667,62.208-138.667,138.667c0,5.888,4.779,10.667,10.667,10.667h256    c5.888,0,10.667-4.779,10.667-10.667C384,318.208,321.792,256,245.333,256z"></path><path d="M115.904,300.971c-6.528-1.387-13.163-2.304-19.904-2.304c-52.928,0-96,43.072-96,96c0,5.888,4.779,10.667,10.667,10.667    h76.629c-1.195-3.349-1.963-6.912-1.963-10.667C85.333,359.659,96.768,327.339,115.904,300.971z"></path><path d="M394.667,298.667c-6.741,0-13.376,0.917-19.904,2.304c19.136,26.368,30.571,58.688,30.571,93.696    c0,3.755-0.768,7.317-1.963,10.667H480c5.888,0,10.667-4.779,10.667-10.667C490.667,341.739,447.595,298.667,394.667,298.667z"></path></svg><img></span>&nbsp;LOGIN&nbsp;
        </a>
        <a onclick="onButtonClick()" class="u-btn u-button-style u-hover-palette-4-base u-palette-1-base u-btn-2"><span class="u-icon u-text-white u-icon-2"><svg class="u-svg-content" viewBox="0 0 330 330" x="0px" y="0px" style="width: 1em; height: 1em;"><path d="M165,0C74.019,0,0,74.02,0,165.001C0,255.982,74.019,330,165,330s165-74.018,165-164.999C330,74.02,255.981,0,165,0z M165,300c-74.44,0-135-60.56-135-134.999C30,90.562,90.56,30,165,30s135,60.562,135,135.001C300,239.44,239.439,300,165,300z"></path><path d="M164.998,70c-11.026,0-19.996,8.976-19.996,20.009c0,11.023,8.97,19.991,19.996,19.991 c11.026,0,19.996-8.968,19.996-19.991C184.994,78.976,176.024,70,164.998,70z"></path><path d="M165,140c-8.284,0-15,6.716-15,15v90c0,8.284,6.716,15,15,15c8.284,0,15-6.716,15-15v-90C180,146.716,173.284,140,165,140z"></path></svg><img></span>
        </a>
        <!-- <a href="https://nicepage.me" class="u-border-2 u-border-hover-palette-2-base u-border-palette-1-base u-btn u-btn-round u-button-style u-none u-radius-50 u-btn-3"><span class="u-icon u-text-palette-1-base u-icon-3"><svg class="u-svg-content" viewBox="0 0 512 512" x="0px" y="0px" style="width: 1em; height: 1em;"><circle cx="181.333" cy="437.333" r="53.333"></circle><path d="M509.867,89.6c-2.133-2.133-4.267-4.267-8.533-4.267H96L85.333,29.867c-2.133-4.267-6.4-8.533-10.667-8.533h-64 C4.267,21.333,0,25.6,0,32s4.267,10.667,10.667,10.667h55.467l51.2,260.267c8.533,34.133,38.4,59.733,74.667,59.733h245.333 c6.4,0,10.667-4.267,10.667-10.667c0-6.4-4.267-10.667-10.667-10.667H192c-17.067,0-34.133-8.533-42.667-23.467L460.8,275.2 c4.267,0,8.533-4.267,8.533-8.533L512,96C512,96,512,91.733,509.867,89.6z"></path><circle cx="394.667" cy="437.333" r="53.333"></circle></svg><img></span>
        </a> -->
        <a href="http://localhost/demo/logout.php" class="u-btn u-btn-round u-button-style u-gradient u-hover-palette-1-base u-none u-radius-50 u-text-body-alt-color u-text-hover-palette-3-base u-btn-4"><span class="u-icon u-text-white u-icon-4"><svg class="u-svg-content" viewBox="0 0 490.667 490.667" x="0px" y="0px" style="width: 1em; height: 1em;"><circle cx="245.333" cy="160" r="74.667"></circle><circle cx="394.667" cy="224" r="53.333"></circle><circle cx="97.515" cy="224" r="53.333"></circle><path d="M245.333,256c-76.459,0-138.667,62.208-138.667,138.667c0,5.888,4.779,10.667,10.667,10.667h256    c5.888,0,10.667-4.779,10.667-10.667C384,318.208,321.792,256,245.333,256z"></path><path d="M115.904,300.971c-6.528-1.387-13.163-2.304-19.904-2.304c-52.928,0-96,43.072-96,96c0,5.888,4.779,10.667,10.667,10.667    h76.629c-1.195-3.349-1.963-6.912-1.963-10.667C85.333,359.659,96.768,327.339,115.904,300.971z"></path><path d="M394.667,298.667c-6.741,0-13.376,0.917-19.904,2.304c19.136,26.368,30.571,58.688,30.571,93.696    c0,3.755-0.768,7.317-1.963,10.667H480c5.888,0,10.667-4.779,10.667-10.667C490.667,341.739,447.595,298.667,394.667,298.667z"></path></svg><img></span>&nbsp;LOGOUT
        </a>
        <?php 
            if (isset($_SESSION['username'])) {
            ?>
        <p class="u-custom-font u-text u-text-1">SCORE:&nbsp;<br><script type="text/javascript">
        document.write(score)
      </script><br>HIGHSCORE:<br><script type="text/javascript" name='highscore'>
        document.write(highscore_i)
      </script>
          <br>
        </p>
        <p class="u-custom-font u-text u-text-default u-text-palette-2-base u-text-2">USERNAME:&nbsp;<br>&nbsp; &nbsp; &nbsp;<?php echo $score;  ?>

        </p>
        <?php 
            }
            ?>
        <!-- <a onclick="redirect()" class="u-black u-border-2 u-border-black u-btn u-button-style u-hover-white u-text-hover-palette-2-base u-text-palette-2-base u-btn-5">LEADERBOARDS
        </a> -->
        <a onclick="show()" style=" background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  position: absolute;
  top: 30px;
  left: 800px;">LEADERBOARDS</a>
        <a onclick="redirect()" class="u-black u-border-2 u-border-black u-btn u-button-style u-hover-white u-text-hover-palette-2-base u-text-palette-2-base u-btn-5">PLAY<br>NOW
        </a>
        <a onclick="change()" class="u-border-2 u-border-palette-2-base u-btn u-btn-round u-button-style u-hover-palette-2-base u-none u-radius-6 u-text-body-color u-text-hover-white u-btn-6">CREATE/JOIN PRIVATE GAME</a>
      </div>
    </section>
    <script>
    function onButtonClick(){
    if(document.getElementById('textInput').className=="hide"){
    document.getElementById('textInput').className="show";
    }
    else{
    document.getElementById('textInput').className="hide"; 
    p=1;
    }
    }
    </script>
    <style>
    .hide{
    display:none;
    }
    .show{
      position: absolute ;
      left: 400px;
      top: 500px;
     margin: auto;
     border: 2px solid red;
     width: fit-content;
    padding: 15px;
    text-align: center;
    background-color: white;
    }
    table, th, td {
  border:1px solid black;
}
.show1{
  width:50%;
 background-color: white;
position: absolute;
  top: 500px;
  left: 300px;
}
</style>
<p class="hide" id="textInput">INSTRUCTIONS TO PLAY THE GAME<br>1)U WILL BE QUEUED WITH 5 OTHER PALYERS<br>2)PLAYERS TAKE TURNS TO DRAW THE GIVEN FIGURE AND OTHERS NEED
TO GUESS THE GIVEN NAME<br>3)PLAYER WITH HIGHEST POINTS WIN<br>CLICK THE 'i' ICON TO EXIT</P>

<p class="hide" id="private">ENTER CODE TO ENTER EXISISTING ROOM/CREATE A NEW ROOM<br><br><br><input id="roomname"></input><br><br><br><input type="submit"  onclick="redirect1()"></input></P>
  
<table class="hide" id='table'>
  <tr>
    <th>Username</th>
    <th>HIGH-SCORE</th>
</tr>
</table>
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-9ede"><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">THIS IS OUR GROUP PROJECT MADE BY NULLCMD GROUP</p>
      </div></footer>
    <section class="u-backlink u-clearfix u-grey-80">
      <a class="u-link" href="https://nicepage.com/website-templates" target="_blank">
        <span>Website Templates</span>
      </a>
      <p class="u-text">
        <span>created with</span>
      </p>
      <a class="u-link" href="" target="_blank">
        <span>Website Builder Software</span>
      </a>. 
    </section>
    

</body></html>