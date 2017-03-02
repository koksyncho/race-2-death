function Obstacle() {
	//the same as this.radius from car.js 
	var car_radius = 64;

	this.top = 50//random(height/2);
	//this.bottom = random(height/2);
	this.x = width/(2 + round(random(1)));
	this.y = 0;
	this.w = 20;
	this.speed = 2;

	this.highlight = false;

	var width_increase = round(this.y/10);
	var height_increase = round(this.y/10);

	this.hits = function(car) {
		width_increase = round(this.y/10);
		height_increase = round(this.y/10);
		

		/*NOTE: The first if doesn't work when it 'jumps'*/
		//is in the height of the obstacles
		//console.log((car.y < (this.top + height_increase) + this.y) + " " + (car.y > (this.top + height_increase) - this.y));

		if (car.y < (this.top + height_increase) + this.y && car.y > (this.top + height_increase) - this.y/*this.top || car.y > height - this.bottom*/) {
        	//is in the same width as the obstacles
        	if (car.x > (this.x - width_increase/2) - (this.w + round(this.y/5)) && car.x < (this.x - width_increase/2) + (this.w + round(this.y/5))){
			//if (car.x /*+ car_radius/2 *//*car radius can be deleted*/ > (this.x - width_increase/2) - (this.w + round(this.y/5)) && (this.x - width_increase/2)/* - car_radius/2 *//*car radius can be deleted*/ < (this.x - width_increase/2) + (this.w + round(this.y/5))){
				this.highlight = true;
				return true;
        	}
		}
		this.highlight = false;
		return false;
	}

	this.hasCollided = function() {
		if (this.highlight) {
			return true;
		}
		return false;
	}

	this.show = function() {
		fill(255);

		if (this.highlight) {
			fill(255, 0, 0);
		}

		width_increase = round(this.y/10);
		height_increase = round(this.y/10);
		/*NOTE: The cars only come from the top*/
		rect((this.x - width_increase/2), this.y/*0*/, this.w + width_increase, (this.top + height_increase));
		//rect(this.x, height - this.bottom, this.w, this.bottom);
	}

	//moves the obstacles
	this.update = function() {
		//this.x -= this.speed;
		this.y += this.speed;
	}

	this.offscreen = function() {
		//if the object leaves the screen

		//NOTE: leaves the screen from top to bottom
		if(this.y >= height) {
			console.log("left from the bottom");
			return true;
		} else if (this.y < height) {
			return false;
		}

		//NOTE: leaves the screen from left to right
		if (this.x < -this.w) {
			console.log("left from the left");
			return true;
		} else if (this.x >= -this.w) {
			return false;
		}
	}
}