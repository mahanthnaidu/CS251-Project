function Dictionary() {
  this.words = [];
  this.indices = {};
}

function add(word) {
  if (this.indices[word] == null) {
      this.words.push(word);
      this.indices[word] = this.words.length - 1;
  }
}

function randum() {
  var index = Math.floor(Math.random() * this.words.length);
  return this.words[index];
}

Object.assign(Dictionary.prototype, { add, randum });
var dict = new Dictionary();
dict.add('clock');
dict.add('apple');
dict.add('waterfall');
dict.add('shower');
dict.add('tree');
dict.add('mountain');
dict.add('camel');
dict.add('boy');
dict.add('girl');
dict.add('kangaroo');
dict.add('bus');
dict.add('train');
dict.add('waterbottle');
dict.add('gun');
dict.add('ghost');
dict.add('laptop');
dict.add('bag');
dict.add('ocean');
dict.add('movie');
dict.add('chair');
dict.add('crown');
dict.add('helmet');
dict.add('ring');
dict.add('shirt');
dict.add('trouser');
dict.add('plane');
dict.add('cycle');
dict.add('car');
dict.add('hammer');
dict.add('shield');
dict.add('arrow');
dict.add('knife');
dict.add('grapes');
dict.add('watch');
dict.add('shoe');
dict.add('coat');
dict.add('cricketbat');
dict.add('rain');
dict.add('sun');
dict.add('moon');
dict.add('earth');
dict.add('plate');
dict.add('glass');
dict.add('plant');
dict.add('dog');
dict.add('snake');
dict.add('pig');
dict.add('elephant');
dict.add('bucket');
dict.add('rocket');

function check(){
  var d = dict.randum();
  var input = document.getElementById("name").value ;
  if(input==d){
      alert("You guessed the word !!")
  }
  else{
      alert("Oops ! Try Again ")
  }
}
const express = require('express');
const app = express();
const http = require('http');
const server = http.createServer(app);
const { Server } = require("socket.io");
const io = new Server(server);
var sleep = require('system-sleep');


app.get('/', (req, res) => {
res.sendFile(__dirname + '/game.html');
});
app.get('/styles.css', function(req, res) {
res.sendFile(__dirname + "/" + "styles.css");
});
app.get('/style.css', function(req, res) {
res.sendFile(__dirname + "/" + "style.css");
});
app.get('/canvas.js', function(req, res) {
res.sendFile(__dirname + "/" + "canvas.js");
});

server.listen(3000, () => {
console.log('listening on *:3000');
});

let last_client_ids = [];
let room_ids = [];
let Clients={};
let names={};
let lastroomsize = 0, lastroomnames = [];
let final_scores={};
let final_names={};
io.on("connection" ,socket =>{
  console.log('a user connected');
  socket.on('disconnect', () => {
      console.log('user disconnected');
    });
  socket.on('chat message', (msg) => {
      console.log('message: ' + msg);
    });
    socket.on("Join private lobby" ,(roomname,name)=>{
      if( Clients[roomname] === undefined){
          Clients[roomname] = [];
          names[roomname] = [];
          Clients[roomname].push(socket.id);
          names[roomname].push(name);
          socket.join(roomname);
      } else{
          if( Clients[roomname].length === 6 ){
            io.to(socket.id).emit('private lobby full',socket.id);
          }
          else{
            socket.join(roomname);
            Clients[roomname].push(socket.id);
            names[roomname].push(name);
            console.log(name);
          }
    }
    io.to(roomname).emit('for_users _in_lobby',names[roomname],roomname);
    if(Clients[roomname].length  === 6){
        io.to(roomname).emit('lobby_full' ,names[roomname],roomname);
        var word = dict.randum();
        io.to(roomname).emit('drawing option',word,Clients[roomname][0]);
        io.to(roomname).emit('new_round' , names[roomname],roomname,Clients[roomname],Clients[roomname][0],word);
        
        
    }

    socket.on('got the answer',function(room_id_,name){
      var msg =name + "guessed correctly";
      io.to(room_id_).emit('chat message', msg,'server',room_id_);
    });

    socket.on('send_answer',function(room_id,name,word){
      let msg='Correct answer is :' + word;
      io.to(room_id).emit('chat message', msg,name,room_id) 
    })

    socket.on('next_turn', function(lastroomnames,room_id,last_client_ids,current_turn,word){
      
      let found=false;
      let next;
      for (var i = 0; i < 6; i++){
      if(found){
        next=last_client_ids[i];
        break;
      }
      else{
        if(last_client_ids[i]=== current_turn) found=true;
      }
      }
      var word = dict.randum();
      io.to(room_id).emit('drawing option',word,next);
      io.to(room_id).emit('new_round' ,lastroomnames,room_id,Clients[roomname],next,word);
      
      
    });
    socket.on('last_round',function(lastroomnames_,room_id,last_client_ids_,current_turn){
      io.to(room_id).emit('send_scores',lastroomnames_,room_id,last_client_ids_,current_turn);
    });

    socket.on('my_score',function(lastroomnames_,room_id,last_client_ids_,score,name){
      
      if(final_scores[room_id]===undefined){
        final_scores[room_id]=[];
        final_names[room_id]=[];
        final_names[room_id].push(name);
        final_scores[room_id].push(score);

      }
      else{
        if(final_names[room_id].length===5){
          console.log('heqkwjfnvakn,')
 
          final_names[room_id].push(name);
          final_scores[room_id].push(score);
          let scores={};
          for(let i=0 ; i<6 ; i++){
            
           
            scores[final_names[room_id][i]]=final_scores[room_id][i];
            
          }
          io.to(room_id).emit('final_scores',lastroomnames_,room_id,last_client_ids_,scores)
        }else{
         
          final_names[room_id].push(name);
          final_scores[room_id].push(score);
        }
      }
    })

    socket.on('time_update',  function(time,room_id){
      
      socket.to(room_id).emit('time_update',time,room_id);
    })
})
  socket.on("Join lobby" , name=>{
      if( room_ids.length === 0){
          room_ids.push("room");
          socket.join(room_ids[0]);
          lastroomsize=1;
          last_client_ids.push(socket.id);
          lastroomnames.push(name);
      } else{
          if( lastroomsize === 6 ){
              let roomno = room_ids.length;
              room_ids.push("room" + roomno.toString());
              socket.join("room" + roomno.toString());
              lastroomsize=1;
              lastroomnames=[];
              last_client_ids=[];
              last_client_ids.push(socket.id);
              lastroomnames.push(name);
              
          }
          else{
            socket.join(room_ids[room_ids.length-1]);
            lastroomsize= lastroomsize + 1;
            lastroomnames.push(name);
            last_client_ids.push(socket.id);
            console.log(name);
        }
    }
    let room_id=room_ids[room_ids.length-1]
    io.to(room_id).emit('for_users _in_lobby' , lastroomnames,room_id)
    if(lastroomsize === 6){
        io.to(room_id).emit('lobby_full' , lastroomnames,room_id);
        var word = dict.randum();
        io.to(room_id).emit('drawing option',word,last_client_ids[0]);
        io.to(room_id).emit('new_round' , lastroomnames,room_id,last_client_ids,last_client_ids[0],word);
      
    }

    socket.on('next_turn', function(lastroomnames_,room_id,last_client_ids_,current_turn,word_){
      
      let found=false;
      let next;
      for (var i = 0; i < 6; i++){
      if(found){
        next=last_client_ids[i];
        break;
      }
      else{
        if(last_client_ids[i]=== current_turn) found=true;
      }
      }
      var word = dict.randum();
      io.to(room_id).emit('drawing option',word,next);
      io.to(room_id).emit('new_round' , lastroomnames_,room_id,last_client_ids_,next,word);
      
    
    });

    socket.on('send_answer',function(room_id,name,word){
      let msg='Correct answer is :' + word;
      io.to(room_id).emit('chat message', msg,name,room_id) 
    })

    socket.on('last_round',function(lastroomnames_,room_id,last_client_ids_,current_turn){
      io.to(room_id).emit('send_scores',lastroomnames_,room_id,last_client_ids_,current_turn);
    });

    socket.on('my_score',function(lastroomnames_,room_id,last_client_ids_,score,name){
      
      if(final_scores[room_id]===undefined){
        final_scores[room_id]=[];
        final_names[room_id]=[];
        final_names[room_id].push(name);
        final_scores[room_id].push(score);

      }
      else{
        if(final_names[room_id].length===5){
          console.log('heqkwjfnvakn,')
          final_names[room_id].push(name);
          final_scores[room_id].push(score);
          let scores={};
          for(let i=0 ; i<6 ; i++){
            scores[final_names[room_id][i]]=final_scores[room_id][i];
            
          }
          io.to(room_id).emit('final_scores',lastroomnames_,room_id,last_client_ids_,scores)
        }else{
          final_names[room_id].push(name);
          final_scores[room_id].push(score);
        }
      }
    })

    socket.on('got the answer',function(room_id_,name){
      var msg =name + " guessed correctly";
      io.to(room_id_).emit('chat message', msg,'server',room_id_);
    });

    socket.on('time_update',  function(time,room_id){
      
      socket.to(room_id).emit('time_update',time,room_id);
    })
})
socket.on('mouse',
(data,room_id)=>{
// Data comes in as whatever was sent, including objects
// Send it to all other clients
socket.to(room_id).emit('mouse', data,room_id);
// This is a way to send to everyone including sender
// io.sockets.emit('message', "this goes to everyone");
}
);

socket.on('reset',
// When we receive data
(room_id)=> {
    socket.to(room_id).emit('reset',room_id);
}
);
socket.on('clear',
// When we receive data
(room_id)=> {
    socket.to(room_id).emit('clear',room_id);
}
);
socket.on('stroke',
// When we receive data
(t,room_id)=> {
    socket.to(room_id).emit('stroke',t,room_id);
}
);
socket.on('linewidth',
// When we receive data
(t,room_id)=>{
    socket.to(room_id).emit('linewidth',t,room_id);
}
);
socket.on('chat message', (msg,user,room_id) => {
    io.to(room_id).emit('chat message', msg, user,room_id);
  });
});