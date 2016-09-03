<?php

include "config.php";

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>SK2RWJ /SM2 Repeater link</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css.css">
<link href="dist/skin/blue.monday/css/jplayer.blue.monday.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="lib/jquery.min.js"></script>
<script type="text/javascript" src="dist/jplayer/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="dist/add-on/jplayer.playlist.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<link rel="stylesheet" href="lib/css/bootstrap.min.css">



<script src="http://openlayers.org/api/OpenLayers.js"></script>

<!--[if IE]><script language="JavaScript" type="text/JavaScript" src="EventSource.js"></script><![endif]-->
<script type="text/javascript" src="svx_stat.js"></script>

<!-- Optional theme -->
<link rel="stylesheet" href="lib/css/bootstrap-theme.min.css" >
<!-- Latest compiled and minified JavaScript -->
<script src="lib/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>


<script type="text/javascript">
//<![CDATA[
$(document).ready(function(){
$( "#datepicker" ).datepicker({firstDay: 1, dateFormat: 'yy-mm-dd' });

	var myPlaylist = new jPlayerPlaylist({
		jPlayer: "#jquery_jplayer_N",
		cssSelectorAncestor: "#jp_container_N"
	}, [
	], {
		playlistOptions: {
			enableRemoveControls: true
		},
		swfPath: "../../dist/jplayer",
		supplied: "webmv, ogv, m4v, oga, mp3",
		useStateClassSkin: true,
		autoBlur: false,
		smoothPlayBar: true,
		
		keyEnabled: true
	});
var d = new Date();

var month = d.getMonth()+1;
var day = d.getDate();

var output = d.getFullYear() + '-' +
    (month<10 ? '0' : '') + month + '-' +
    (day<10 ? '0' : '') + day;    

	get_audio_from_date(output )

	// Click handlers for jPlayerPlaylist method demo

});
//]]>
function listen_live()
{
var myPlaylist = new jPlayerPlaylist({
		jPlayer: "#jquery_jplayer_N",
		cssSelectorAncestor: "#jp_container_N"
	}, [], {
		playlistOptions: {
			enableRemoveControls: true
		},
		swfPath: "../dist/jplayer",
		supplied: "webmv, ogv, m4v, oga, mp3",
		useStateClassSkin: true,
		autoBlur: false,
		smoothPlayBar: true,
		keyEnabled: true
	});

  myPlaylist.add({
    title:"SM2 Link",
    artist:"SK2HG",
    oga:"http://44.140.76.19:8000/kalixlinjen.ogg"  
  });
  myPlaylist.play();
}

function get_audio_from_date(date)
{
var myPlaylist = new jPlayerPlaylist({
		jPlayer: "#jquery_jplayer_N",
		cssSelectorAncestor: "#jp_container_N"
	}, [], {
		playlistOptions: {
			enableRemoveControls: true
		},
		swfPath: "../dist/jplayer",
		supplied: "webmv, ogv, m4v, oga, mp3",
		useStateClassSkin: true,
		autoBlur: false,
		smoothPlayBar: true,
		keyEnabled: true
	});


$.getJSON('test.php?date='+date, function (data) {
   
  for (i = 0; i < data.length; i++) {
    
  myPlaylist.add({
    title:data[i].text,
    artist:"Svxlink",
    oga:data[i].file,
    poster: "http://www.rfwireless-world.com/images/VHF-UHF-repeater.jpg"
  });
    
    
  }
  
  
  
   });
myPlaylist.play();
}


</script>
</head>
<body>
<div class="container">

<div class="row">
  <div class="col-md-12"><h1>SM2 Repeaters - SK2RWJ repeater monitor</h1></div>
</div>

<ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
    <li class="active"><a href="#listen" data-toggle="tab">Listen</a></li>
    <li><a href="#Echolink" data-toggle="tab">Echolink</a></li>
    <li><a href="#Recivers" data-toggle="tab">Recivers</a></li>
    <li><a href="#map_repeater" data-toggle="tab">Map</a></li>


</ul>

<div id="my-tab-content" class="tab-content">
<div class="tab-pane active" id="listen">

	<div class="row">
	<div class="col-md-6">
	<div id="jp_container_N" class="jp-video jp-video-270p" role="application" aria-label="media player">
		<div class="jp-type-playlist">
			<div id="jquery_jplayer_N" class="jp-jplayer"></div>
			<div class="jp-gui">
				<div class="jp-video-play">
					<button class="jp-video-play-icon" role="button" tabindex="0">play</button>
				</div>
				<div class="jp-interface">
					<div class="jp-progress">
						<div class="jp-seek-bar">
							<div class="jp-play-bar"></div>
						</div>
					</div>
					<div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
					<div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
					<div class="jp-controls-holder">
						<div class="jp-controls">
							<button class="jp-previous" role="button" tabindex="0">previous</button>
							<button class="jp-play" role="button" tabindex="0">play</button>
							<button class="jp-next" role="button" tabindex="0">next</button>
							<button class="jp-stop" role="button" tabindex="0">stop</button>
						</div>
						<div class="jp-volume-controls">
							<button class="jp-mute" role="button" tabindex="0">mute</button>
							<button class="jp-volume-max" role="button" tabindex="0">max volume</button>
							<div class="jp-volume-bar">
								<div class="jp-volume-bar-value"></div>
							</div>
						</div>
						<div class="jp-toggles">
							<button class="jp-repeat" role="button" tabindex="0">repeat</button>
							<button class="jp-shuffle" role="button" tabindex="0">shuffle</button>
							<button class="jp-full-screen" role="button" tabindex="0">full screen</button>
						</div>
					</div>
					<div class="jp-details">
						<div class="jp-title" aria-label="title">&nbsp;</div>
					</div>
				</div>
			</div>
			<div class="jp-playlist">
				<ul>
					<!-- The method Playlist.displayPlaylist() uses this unordered list -->
					<li>&nbsp;</li>
				</ul>
			</div>
			<div class="jp-no-solution">
				<span>Update Required</span>
				To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
			</div>
		</div>
	</div>
	</div>
	  <div class="col-md-6">
	<br />
	<button type="button" onclick="listen_live()" class="btn btn-default">Listen LIVE</button>
	<hr />
	<h3>Select date to listen</h3>
	<p><input type="text" id="datepicker" value="<?=date("Y-m-d")?>" onchange="get_audio_from_date(this.value)"></p>
	<hr />
	  <table class="table table-striped">
		<thead>
		  <tr>
			<th>Name</th>
			<th>Openings</th>
			<th>Nag</th>
		  </tr>
		</thead>
	   <tbody>
	   <tr>

	<?php


	$result=mysqli_query($link,"SELECT * FROM `repeater");

	// Numeric array

	// Associative array
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

	echo "<td>".$row["Name"]."</td>";
	echo "<td>".$row["Openings"]."</td>";
	echo "<td>".$row["Nag"]."</td>";


	?>
	</tr>
	</tbody>
	</table>


	</div>



	</div>

          
</div>
	<div class="tab-pane" id="Echolink">
		<h1> Echolink commands</h1>
		<pre>
			<?
			$myfile = fopen("echolink.txt", "r") or die("Unable to open file!");
			echo utf8_encode(fread($myfile,filesize("echolink.txt")));
			fclose($myfile);
			?>
		</pre>
	</div>


	<div class="tab-pane" id="Recivers">
	<div class=recivers>
<p><div class="head">Signal values at <span id="callsign">repeater</span>
<span id="freq"></span><span style="float:right;"><span id="tx"><img src="/icons/ball.red.png"></span><span id="stream"></span></span></div>
<p>
<table>
<tr><th>Receiver</th><th>Sql</th><th>Signal</th><th>Bargraph</th></tr>
<tr id="sigtab"><td colspan="4">This page requires Javascript and a modern browser.</td></tr>
</table>
	</div>
	</div>


	<div class="tab-pane" id="map_repeater">
      		      <div style="width:1000px; height:500px" id="map"></div>
<script>
map = new OpenLayers.Map( 'map');
          layer = new OpenLayers.Layer.OSM( "Repeater map");
          map.addLayer(layer);
          map.zoomToMaxExtent();

$.getJSON( "repeater-info.json", function( data ) {
  
  
  for (var k in data.antenna) {
    console.log(data.antenna[k].location)
    
    var lonLat = new OpenLayers.LonLat( data.antenna[k].location.lon ,data.antenna[k].location.lat )
          .transform(
            new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
            map.getProjectionObject() // to Spherical Mercator Projection
          );

    var markers = new OpenLayers.Layer.Markers( k );
    map.addLayer(markers);
    
    markers.addMarker(new OpenLayers.Marker(lonLat));
   }
    var zoom = 10;
    map.setCenter(lonLat, zoom);

  
});

</script>


	</div>


</div>
</div>
</body>

</html>
