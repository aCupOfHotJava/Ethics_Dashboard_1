 function  drawScreen () {
    context.fillStyle = '#EEEEEE';
    context.fillRect(0, 0, theCanvas.width, theCanvas.height);
    //Box
    context.strokeStyle = '#000000'; 
    context.strokeRect(1,  1, theCanvas.width-2, theCanvas.height-2);
    ball.x += xunits;
    ball.y += yunits;
    context.fillStyle = "#000000";
    context.beginPath();
    context.arc(ball.x,ball.y,15,0,Math.PI*2,true);
    context.closePath();
    context.fill();
    
    if (ball.x > theCanvas.width || ball.x < 0 ) {
      angle = 180 - angle;
      updateBall();
    } else if (ball.y > theCanvas.height || ball.y < 0) {
      angle = 360 - angle;
      updateBall(); 
    }
        
  }
  
  function updateBall() {
    radians = angle * Math.PI/ 180;
    xunits = Math.cos(radians) * speed;
    yunits = Math.sin(radians) * speed;
  }
  
  let speed = 2.5;
  let p1 = {x:20,y:20};
  let angle = 35;
  let radians =0;
  let xunits = 0;
  let yunits = 0; 
  let ball = {x:p1.x, y:p1.y};
  updateBall();
  
    theCanvas = document.getElementById('canvas');
  context = theCanvas.getContext('2d');
  
  function gameLoop() {
      window.setTimeout(gameLoop,30);
      drawScreen()  
    }
    
    
  gameLoop();
