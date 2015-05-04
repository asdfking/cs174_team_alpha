/*
  script.js - Javascript for the automobile database.
  Put all javascript code in here.
*/

function submit(){
    make = document.getElementsByName("make")[0].value;
    model = document.getElementsByName("model")[0].value;
    year = document.getElementsByName("year")[0].value;
    id = document.getElementsByName("id")[0].value;

    //$.post("newsearch.php", {"type": type, color: "color", make: "make", model: "model"}, loadTable);

    $.get("newsearch.php", 
	  showResults);
}

function showResults(event, ui)
{
    make = document.getElementsByName("make")[0].value;
    model = document.getElementsByName("model")[0].value;
    year = document.getElementsByName("year")[0].value;
    id = document.getElementsByName("id")[0].value;
    type = $('#selectmenu').val();
    color = $('#selectColor').val();

    $("#output").load( "newsearch.php", {"make": make, "model": model, "year": year, "id": id, "color": color} );

}

//Not used
function loadTable(data, status)
{
    $("#output").html(data);
}

//Not used for now
function changeBackground(){
    var cars = ["url('http://wallpapers55.com/wp-content/uploads/2013/10/Car-Dekstop-Background-Wallpaper.jpg')",
		"url('http://www.ibackgroundwallpaper.com/wp-content/uploads/2014/04/lamborghini-gallardo-luxury-car-wallpaper.jpg')",
		"url('http://beautyhdpics.com/wp-content/uploads/2014/08/luxury-cars-wallpapers-desktop.jpg')",
		"url('http://beautyhdpics.com/wp-content/uploads/2014/08/luxury-cars-wallpaper.jpg')",
		"url('http://beautyhdpics.com/wp-content/uploads/2014/08/luxury-cars-wallpapers-download.jpg')",
		"url('http://beautyhdpics.com/wp-content/uploads/2014/08/super-luxury-cars-wallpapers.jpg')",
		"url('http://p1.pichost.me/i/67/1917519.jpg')",
		"url('http://beautyhdpics.com/wp-content/uploads/2014/09/2015-dodge-challenger-hellcat-wallpaper.jpg')",
		"url('http://beautyhdpics.com/wp-content/uploads/2014/08/expensive-luxury-cars-wallpaper.jpg')",
		"url('http://beautyhdpics.com/wp-content/uploads/2014/08/cool-super-luxury-cars-wallpapers.jpg')"
	       ];
    document.body.style.backgroundImage = cars[Math.floor((Math.random() * 10))];
}
