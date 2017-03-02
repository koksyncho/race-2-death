var car;
var obstacles = [];

var FRAME_COUNT = 250;
var CANVAS_X = 400;
var CANVAS_Y = 600;

var car_health = 100;

function preload() {
	
}

function setup() {
	createCanvas()
	createCanvas(CANVAS_X, CANVAS_Y);
	car = new Car();
	obstacles.push(new Obstacle());
}

function draw() {
	if(car_health > 0) {
		background(0);
	
		for (var i = 0; i < obstacles.length; i++) {
			obstacles[i].show();
			obstacles[i].update();

			//if the car collides with an obstacle
			if (obstacles[i].hits(car)) {
				//detects it multiple times
				console.log("HIT");
				/*NOTE: on hit lowers the hp of the car*/
				car_health -= round(random(100));
				console.log("HP: " + car_health);
				/*NOTE: updates the HP shown in the html file*/
				document.getElementById('car_health_points').innerHTML = "HP: "+car_health;
			}

			if (obstacles[i].offscreen() || obstacles[i].hasCollided()) {
				obstacles.splice(i, 1);
			}
		}

		car.update();
		car.show();

		//generate new obstace each x frames
		if (frameCount % FRAME_COUNT == 0) {
			obstacles.push(new Obstacle());
		}
	}
	 
	else if (car_health <= 0) {
		background(123, 0, 0);

		textSize(32);
		text("GAME OVER", 10, 30);
		fill(0, 102, 153);
		text("GAME OVER", 10, 60);
		fill(0, 102, 153, 51);
		text("GAME OVER", 10, 90);

		console.log("GAME OVER!\nPress Spacebar to try again or ^ to return to the menu...");
		document.getElementById('car_health_points').innerHTML = "GAME OVER!";
	} 

	if (keyIsDown('37')) {
		car.left();
		console.log("left");
	}

	if (keyIsDown('39')) {
		car.right();
		console.log("right");
	}
}

function keyPressed() {
	if (key == ' ' && car_health > 0) {
		car.up();
	}

	if (key == ' ' && car_health <= 0) {
		alert("Pressed Spacebar to restart the game!");
	}

	if (keyCode == '38' && car_health <= 0) {
		alert("Pressed ^ to return to the menu!");
	}

	/*NOTE: keyCode checks for the key code of each key (> is 39 and < is 37)*/
	if (keyCode == '37') {
		car.left();
		console.log("left");
	}

	if (keyCode == '39') {
		car.right();
		console.log("right");
	}
}
