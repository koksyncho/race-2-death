var background = function(backgroundParameter) {
  //NOTE: we put the whole thing into a function so that we can call multiple canvases in one page
  var clouds;

  var CANVAS_X = 400;
  var CANVAS_Y = 200;

  backgroundParameter.setup = function() {
    backgroundParameter.createCanvas(CANVAS_X, CANVAS_Y);
    clouds = new backgroundParameter.Group();
    for (var i = 0; i < 5; i++) {
      var cloud = backgroundParameter.createSprite(
      backgroundParameter.random(backgroundParameter.width), backgroundParameter.random(backgroundParameter.height),
      backgroundParameter.random(25, 100), backgroundParameter.random(25, 100));
      cloud.shapeColor = backgroundParameter.color(backgroundParameter.random(200, 255));
      clouds.add(cloud);
    }
  };

  backgroundParameter.draw = function() {
    backgroundParameter.background(0, 150, 240);
    for (var i = 0; i < clouds.length; i++) {
      clouds[i].position.x += clouds[i].width * 0.01;
      if (clouds[i].position.x > backgroundParameter.width) {
        clouds[i].position.x = 0;
      }
    }
    backgroundParameter.drawSprites();
  };  
};

var myp5 = new p5(background);