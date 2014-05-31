<?php

	$API_KEY = "...";
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		
		<!-- jQuery and jQuery UI -->
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js" type="text/javascript"></script>
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.min.css" type="text/css"/>

		<!-- Bootstrap 3 -->
		<link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>

		<!-- Project Default -->
		<link href="css/style.css" rel="stylesheet">
		<script src="js/default.js"></script>

		<!-- Map Style -->
		<style type="text/css">
		  html { height: 100% }
      	  body { height: 100%; margin: 0; padding: 0 }
	      #map-canvas { height: 360px; width: 640px; }
	    </style>


		<!-- Google Maps -->
		<script type="text/javascript"
	      src="https://maps.googleapis.com/maps/api/js?key=<?= $API_KEY?>&sensor=FALSE">
	    </script>

	        <script type="text/javascript">
	          // http://snazzymaps.com/
	          var mapStyle = [{"featureType":"administrative","stylers":[{"visibility":"off"}]},{"featureType":"poi","stylers":[{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"visibility":"simplified"}]},{"featureType":"water","stylers":[{"visibility":"simplified"}]},{"featureType":"transit","stylers":[{"visibility":"simplified"}]},{"featureType":"landscape","stylers":[{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"visibility":"off"}]},{"featureType":"road.local","stylers":[{"visibility":"on"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"water","stylers":[{"color":"#84afa3"},{"lightness":52}]},{"stylers":[{"saturation":-17},{"gamma":0.36}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"color":"#3f518c"}]}];

	          var infowindow = null;
	          var customMarkers = [
	          	{ 
	          		name:'Dan and Sarah',
	          		lat: 42.376485, 
	          		lon: -71.235611, 
	          		zindex: 1,
	          		spanText: "This is the house where Dan and Sarah live.  It's nice, they have 2 cats and a baby on the way.",
	          		image: {
	          			url: "assets/images/markers/red.png",
	          			origin: new google.maps.Point(0, 0),
	          			scaledSize: new google.maps.Size(30, 45),
	          			anchor: new google.maps.Point(0, 32)
	          		}
	          	},
	          	{ 
	          		name:'Tom and Karen',
	          		lat: 42.366969,
	          		lon: -71.239311, 
	          		zindex: 2,
	          		spanText: "This is where Tom and Karen live.  They have a new prius which drives quietly",
	          		image: {
	          			url: "assets/images/markers/blue.png",
	          			scaledSize: new google.maps.Size(30, 45),
	          			origin: new google.maps.Point(0, 0),
	          			anchor: new google.maps.Point(0, 32)
	          		}
	          	}
	          ];

	          function setMarkers(map, locations)
	          {
	          	for (var i = 0; i < customMarkers.length; i++)
	          	{
	          		// add the markers
	          		var marker = new google.maps.Marker({
	          			map: map,
	          			position: new google.maps.LatLng(customMarkers[i].lat, customMarkers[i].lon),
	          			icon: customMarkers[i].image,
	          			title: customMarkers[i].name,
	          			zIndex: customMarkers[i].zindex,

	          			// custom property for popup info
	          			spanText: customMarkers[i].spanText
	          		});

	          		//  add the infoWindow
	          		google.maps.event.addListener(marker, 'click', function() {
					    infowindow.setContent(getInfoWindow(this.title, this.spanText));
					    infowindow.open(map, this);
					});

			
	          			          		
	          	}
	          }
	          // function to populate infoWindow
	          function getInfoWindow(title, text) {
	          	return "<div class='contentString'>"
								+ "<h3 style='width:100%;text-align:center'>" + title + "</h3><br/>"
								+ "<span class='spanText'>" + text + "</span>"
						+ "</div>";
	          }

	          // initialize function for the map
		      function initialize() {
		        var mapOptions = {
		          center: new google.maps.LatLng(42.376485, -71.235611),
		          zoom: 13,
		          styles: mapStyle
		        };

		        // define the infowindow
          		infowindow = new google.maps.InfoWindow({
          			content: "loading",
          			maxWidth: 300,
          		});

		        // create the map
		        var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

		        // place the markers on the map
		        setMarkers(map, customMarkers);
		      }

		      // load the map
		      google.maps.event.addDomListener(window, 'load', initialize);


		    </script>
	</head>
	<body>
		<div id="map-canvas"/>
	</body>
</html>
