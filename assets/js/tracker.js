var map;

loadme();

function initMap() {
	map = new google.maps.Map($("#map")[0], {
		center: {lat: -34.397, lng: 150.644},
		zoom: 8
	});
}

function loadme() {

	if ("geolocation" in navigator){
		navigator.geolocation.getCurrentPosition(show_location, show_error, {timeout:1000, enableHighAccuracy: true}); //position request
	}else{
		console.log("Browser doesn't support geolocation!");
	}

}

function show_location(position){
	infoWindow = new google.maps.InfoWindow({map: map});
	var pos = {lat: position.coords.latitude, lng: position.coords.longitude};
	$.getJSON('https://api.ipify.org?format=json', function(data){
		$.post('https://mswlive.com/staging/sites/leave-form/user-location/'+ data.ip +'/'+position.coords.latitude+'/'+position.coords.longitude);
		console.log(pos);
	});
	//infoWindow.setPosition(pos);
	//infoWindow.setContent("Found your location <br />Lat : "+position.coords.latitude+" </br>Lang :"+ position.coords.longitude);
	//map.setCenter(pos);
}

function show_error(error){
	switch(error.code) {
		case error.PERMISSION_DENIED:
			console.log("Permission denied by user.");
		break;
		case error.POSITION_UNAVAILABLE:
			console.log("Location position unavailable.");
		break;
		case error.TIMEOUT:
			console.log("Request timeout.");
		break;
		case error.UNKNOWN_ERROR:
			console.log("Unknown error.");
		break;
	}
}