<html>
<head>
  <link type="text/css" href="skin/jplayer.blue.monday.css" rel="stylesheet" />
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery.jplayer.min.js"></script>
   
</head>

<body>

<div>
  <div id="jp1" class="jp-jplayer"></div>
  <div id="jp_container_1" class="jp-audio">
    <div class="jp-type-single">
      <div class="jp-gui jp-interface">
        <ul class="jp-controls">
          <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
          <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
          <li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
          <li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
          <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
          <li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
        </ul>
        <div class="jp-progress">
          <div class="jp-seek-bar">
            <div class="jp-play-bar"></div>
          </div>
        </div>
        <div class="jp-volume-bar">
          <div class="jp-volume-bar-value"></div>
        </div>
        <div class="jp-time-holder">
          <div class="jp-current-time"></div>
          <div class="jp-duration"></div>
          <ul class="jp-toggles">
            <li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat">repeat</a></li>
            <li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off">repeat off</a></li>
          </ul>
        </div>
      </div>
      <div class="jp-title">
        <ul>
          <li>Bubble</li>
        </ul>
      </div>
      <div class="jp-no-solution">
        <span>Update Required</span>
        To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
      </div>
    </div>
  </div>
  
  <div id="jp2" class="jp-jplayer"></div>
  <div id="jp_container_2" class="jp-audio">
    <div class="jp-type-single">
      <div class="jp-gui jp-interface">
        <ul class="jp-controls">
          <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
          <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
          <li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
          <li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
          <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
          <li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
        </ul>
        <div class="jp-progress">
          <div class="jp-seek-bar">
            <div class="jp-play-bar"></div>
          </div>
        </div>
        <div class="jp-volume-bar">
          <div class="jp-volume-bar-value"></div>
        </div>
        <div class="jp-time-holder">
          <div class="jp-current-time"></div>
          <div class="jp-duration"></div>
          <ul class="jp-toggles">
            <li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat">repeat</a></li>
            <li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off">repeat off</a></li>
          </ul>
        </div>
      </div>
      <div class="jp-title">
        <ul>
          <li>Bubble</li>
        </ul>
      </div>
      <div class="jp-no-solution">
        <span>Update Required</span>
        To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
      </div>
    </div>
  </div>
 
</div> 
 
<script type="text/javascript">
  
  	var link;
	var id = null;
	var seek = 1;
	var link2;
	var seek2;
  var radio = 'nick';
  
  $(document).ready(function(){
 
    $("#jp2").jPlayer("option", "cssSelectorAncestor", "#jp_container_2"); // Set the cssSelector for the play method.
	
	var url='_getstream.php?radio=' + radio;
	
	$.getJSON(url, function(data) {
	   link = data[0].url;
	   seek = data[0].seek;
	   id = data[0].id;
	   console.log("Loaded p1: " + data[0].song);
	   
	   		
      $("#jp1").jPlayer({  errorAlerts: true, ready: function () {  $(this).jPlayer("setMedia", {   mp3: link }); }, swfPath: "/js", supplied: "mp3" });
      
     //  $("#jp1").bind($.jPlayer.event.ended + ".repeat", function() {   $(this).jPlayer("play"); });
	   	
  });
		
	  
 });
	
	$("#jp1").bind($.jPlayer.event.loadeddata, function(event) { 
	  var per = (seek / $("#jp1").data("jPlayer").status.duration)*100;
	 
	  $("#jp1").jPlayer("playHead", per);
	  if( seek != 0 )
	     { $("#jp1").jPlayer("play"); }
	   seek = 0;
	   
	      id++;
	  url='_getstream.php?radio='+radio+'&id='+ id;
	   
	  $.getJSON(url, function(data) {
	   
	   link1 = data[0].url;
	   id = data[0].id;
	   console.log("Loaded p2: " + data[0].song );
	   
	   $("#jp2").jPlayer({ consoleAlerts: true, ready: function () { $(this).jPlayer("setMedia", {  mp3: link1 }); }, swfPath: "/js", supplied: "mp3", cssSelectorAncestor: "#jp_container_2"  });
	   timer();
    });
	  	$("#jp1").unbind($.jPlayer.event.loadeddata );
	});
	
	

	
	var player = $('#jp1');
	var sw = 0;
	var songg;
	var vol = 1;
	var ratio = vol/10;
	var ini, blur;
	id++;
	
function timer() {
	
	var nlink;
	var flag = 0;
	
	
	setInterval(function() {
    
	player.jPlayer("play"); 
	 	
      if( player.data("jPlayer").status.paused || (( player.data("jPlayer").status.currentTime > player.data("jPlayer").status.duration - 5 ) && player.data("jPlayer").status.duration != 0 ) )
      {		
				ini = player;
				console.log("Swap; " + ini.data("jPlayer").status.currentTime);
				
				if( sw%2 == 0 )
			 	 { console.log("PLayer2");
					player = $("#jp2");
				}
				else
				{ console.log("PLayer1");
					player = $("#jp1");
				}
				sw++;
				
				player.jPlayer("volume", 0.25);
				player.jPlayer("play");
				
				//console.log(player);
				
				vol = vol - 0.001;
				
				setTimeout( function() {
					
					ini.jPlayer("destroy");
						
					id++;
					var url='_getstream.php?radio='+radio+'&id='+ id;
			
					$.getJSON(url, function(data) {
						nlink = data[0].url;
						songg = data[0].song;
						flag = 1;
						id = data[0].id;
						
						ini.jPlayer({ errorAlerts: true, ready: function () {  $(this).jPlayer("setMedia", {   mp3: nlink }); }, swfPath: "/js", supplied: "mp3" });
						$("#jp2").jPlayer("option", "cssSelectorAncestor", "#jp_container_2"); // Set the cssSelector for the play method.
						flag = 0;
					
						console.log("Next: " + songg);
					});

				}, 5000);

	  }
	  
	 if( vol != 1 ) 
	 {
					  console.log(ini.data("jPlayer").status.currentTime);
				
					  vol = vol - ratio; 
					  player.jPlayer("volume", 1-vol); 
					  ini.jPlayer("volume", vol); 
					  if(vol <= 0) { clearInterval(blur); vol = 1; }
	 }
	
}, 500);

}



  </script>
</body>


</html>
