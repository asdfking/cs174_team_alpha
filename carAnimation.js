
function drawStaticCar()
{
    var canvas = document.getElementById('canvas');
    var con = canvas.getContext('2d');
	con.clearRect(0,0,canvas.width,canvas.height);
    con.strokeStyle = "black";
    con.strokeRect (0,0,canvas.width,canvas.height);
    
    con.beginPath();
    con.moveTo(50,75);
    con.lineTo(250,75);
    con.lineTo(250,115);
    con.lineTo(50,115);
    con.closePath();
    con.fillStyle = 'blue';
    con.fill()
    con.stroke();

    con.beginPath();
    con.moveTo(250,85);
    con.lineTo(250,105);
    con.lineTo(255,105);
    con.lineTo(255,85);
    con.closePath();
    con.fillStyle = 'green';
    con.fill()
    con.stroke();

    con.beginPath();
    con.moveTo(50,85);
    con.lineTo(50,105);
    con.lineTo(45,105);
    con.lineTo(45,85);
    con.closePath();
    con.fillStyle = 'green';
    con.fill()
    con.stroke();

    con.beginPath();
    con.moveTo(50,75);
    con.lineTo(90,50);
    con.lineTo(210,50);
    con.lineTo(250,75);
    con.closePath();
    con.fillStyle = 'red';
    con.fill()
    con.stroke();

    con.beginPath();
    con.arc(100, 115, 20, 0, 2*Math.PI, false);
    con.fillStyle = 'grey';
    con.fill()
    con.stroke();

    con.beginPath();
    con.arc(200, 115, 20, 0, 2*Math.PI, false);
    con.fillStyle = 'grey';
    con.fill()
    con.stroke();
}


const CANVAS_W = 1000;
const CANVAS_H = 200;
const IMAGE_W  = 150;
const IMAGE_H  = 150;

var con;
var image;
var x=0;

function init()
{
    con = document.getElementById("mov")
        .getContext("2d");
    image = new Image();
    image.src = "http://www.clker.com/cliparts/R/7/e/b/5/X/red-car.svg";
    
    setInterval(draw, 30);
}

function draw()
{
    con.clearRect(0,0,CANVAS_W,CANVAS_H);
    con.strokeStyle = "white";
    con.fillStyle = "transparent";
    con.fillRect(0, 0, CANVAS_W, CANVAS_H);
    con.strokeRect(0, 0, CANVAS_W, CANVAS_H);                   
    con.save();
    
    con.drawImage(image, x, 50, IMAGE_W, IMAGE_H);
    
    x += 4;
    if(x > 700) {
	x=0;
    }
    
    con.restore();
    
}    
