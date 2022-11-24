<?Php
 include 'index.php';
 if(!$name) 
   $name = null;
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
    <title>Drawing app</title>
</head>
<body>
    <section class="container" style="background-color: white;">
        <div id="toolbar">
            <h1>Draw.</h1>
            <label for="stroke">Stroke</label>
            <input id="stroke" name='stroke' type="color">
            <label for="lineWidth">Line Width</label>
            <input id="lineWidth" name='lineWidth' type="number" value="5">
            <button id="clear">Clear</button>
        </div>
        <div class="drawing-board" style="background-color: white; border: 10px solid black;max-height: 410px;">
            <canvas id="drawing-board"></canvas>
        </div>
    </section>
    <script src="./canvas.js"></script>
    <div class="chat-container">
        <header class="chat-header">
          <a href="Site1/index.php" class="btn" onclick="leavegame()">Leave GAME</a>
        </header>
        <main class="chat-main">
          <div class="chat-sidebar">
            <!-- <h3><i class="fas fa-comments"></i> Room Name:</h3>
            <h2 id="room-name">JavaScript</h2> -->
            <h3><i class="fas fa-users"></i> Users</h3>
            <ul id="users">
              <li>Brad</li>
              <li>John</li>
              <li>Mary</li>
              <li>Paul</li>
              <li>Mike</li>
            </ul>
          </div>
          <div class="chat-messages" id="message">
                        <div class="message">
                            <p class="meta">Brad</p>
                            <p class="text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi,
                                repudiandae.
                            </p>
                        </div>
                        <div class="message">
                            <p class="meta">Mary</p>
                            <p class="text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi,
                                repudiandae.
                            </p>
                        </div>
          </div>
        </main>
        <div class="chat-form-container">
          <form id="chat-form">
            <input
              id="msg"
              type="text"
              placeholder="Enter Message"
              required
              autocomplete="off"
            />
            <button class="btn"><i class="fas fa-paper-plane"></i> Send</button>
          </form>
        </div>
      </div>
      <script src="/socket.io/socket.io.js"></script>
      <script>
        var socket = io();
        var name = <?php echo $name ?>
        var highscore = localStorage.getItem("highscore");
        var messages = document.getElementById('message');
        var form = document.getElementById('chat-form');
        var input = document.getElementById('msg');
        var players = document.getElementById('users');
      
        form.addEventListener('submit', function(e) {
          e.preventDefault();
          if (input.value) {
            socket.emit('chat message', input.value);
            input.value = '';
          }
        });
        socket.on('user',function(name){
          players.innerHTML=players.innerHTML+"<li>"+name+"</li>"
        });
        socket.on('chat message', function(msg) {
          messages.innerHTML=messages.innerHTML+" <div class=\"message\"><p class=\"meta\">"+name+"</p><p class=\"text\">"+msg+"</p> </div>";
        });
      
      </script>
</body>
</html>