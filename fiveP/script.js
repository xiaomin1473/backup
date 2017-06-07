// ****************************************fiveP
var me = true;
var chessBoard = [];
var over = false;

// ****************************************AI
//赢法数组
var wins = [];

//赢法统计数组
var myWin = [];
var computerWin = [];

for(var i = 0; i < 15; i++) {
   chessBoard[i] = [];
   for(var j = 0; j < 15; j++) {
      chessBoard[i][j] = 0;
   }
}

for (var i = 0; i<15; i++) {
      wins[i] = [];
      for (var j = 0; j<15; j++) {
         wins[i][j] = [];
      }
   }

var count = 0;
for (var i = 0; i<15; i++) {
   for ( var j = 0; j<11; j++) {
      for (var k = 0; k<5; k++) {
         wins[i][j+k][count] =true;
      }
   }
}

for (var i = 0; i<15; i++) {
   for ( var j = 0; j<11; j++) {
      for (var k = 0; k<5; k++) {
         wins[j+k][i][count] =true;
      }
   }
}

for (var i = 0; i<11; i++) {
   for ( var j = 0; j<11; j++) {
      for (var k = 0; k<5; k++) {
         wins[i+k][j+k][count] =true;
      }
   }
}

for (var i = 0; i<11; i++) {
   for ( var j = 14; j<11; j--) {
      for (var k = 0; k<5; k++) {
         wins[i+k][j-k][count] =true;
      }
      count++;
   }
}

console.log(count);

for (var i = 0; i<count; i++) {
   myWin[i] = 0;
   computerWin[i] = 0;
}
// ****************************************AI end
var chess = document.getElementById('chess');
var context = chess.getContext('2d');

context.strokeStyle ="#a6a6a6";

var drawChessBoard =function() {
   for(var i = 0; i < 15; i++) {
      context.moveTo(15 +i*30, 15);
      context.lineTo(15 +i*30, 435);
      context.stroke();
      context.moveTo(15, 15 +i*30);
      context.lineTo(435, 15 +i*30);
      context.stroke();
   }
}

drawChessBoard();

var oneStep = function(i, j, me) {
   context.beginPath();
   context.arc(15 + i*30, 15 + j*30, 13, 0, 2*Math.PI);
   context.closePath();
   var gradient = context.createRadialGradient(15 + i*30 + 2, 15 + j*30 - 2, 13, 15 + i*30 + 2, 15 + j*30 - 2, 0);
   if(me) {
      gradient.addColorStop(0, "#0A0A0A");
      gradient.addColorStop(1, "#636766");
   }else {
      gradient.addColorStop(0, "#d1d1d1");
      gradient.addColorStop(1, "#f9f9f9");
   }
   context.fillStyle= gradient;
   context.fill();
}

chess.onclick = function(e) {
   if(over) {
      return;
   }
   var x = e.offsetX;
   var y = e.offsetY;
   var i = Math.floor(x / 30);
   var j = Math.floor(y / 30);
   if (0 == chessBoard[i][j]) {
      oneStep(i, j, me);
      if(me) {
         chessBoard[i][j] = 1;
      } else {
         chessBoard[i][j] = 2;
      }
      me = !me;
      for (var k = 0; k<count; k++) {
         if(wins[i][j][k]) {
            myWin[k]++;
            computerWin[k] = 6;
            if(myWin[k] == 5) {
               window.alert("你赢了");
               over = true;
            }
         }
      }
   }        
}
// ****************************************fiveP end

