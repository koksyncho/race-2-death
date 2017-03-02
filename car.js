function Car() {
	this.y = 64;
	this.x = width/2;
	this.radius = 64;

	this.gravity = 0.6;
	this.lift = -15; 
	this.velocity = 0;

	this.show = function() {
		fill(255);
		ellipse(this.x, this.y, this.radius, this.radius);
	}

	this.up = function() {
		this.velocity += this.lift;
	}

	this.left = function() {
		this.x += this.lift;
	}

	this.right = function() {
		this.x -= this.lift;
	}

	this.update = function() {
		this.velocity += this.gravity;
		this.y += this.velocity;

		if (this.y > height) {
			this.y = height;
			this.velocity = 0;
		}

		if (this.y < 0) {
			this.y = height;
			this.velocity = 0;
		}		
	}

} 