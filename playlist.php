<?php
include 'php/logged.php';
include 'php/db.php';
?>

<html class=" -webkit-"><head><meta charset="UTF-8"><script src="/assets/libs/prefixfree.min.js"></script>      <script style="display: none !important;">      function getSafeJS(js) {        js = js.replace(/location(s+)?=/mi, '');        js = js.replace(/top.location.+=('|")/mi, '');        js = js.replace(/location.replace/mi, '');        js = js.replace(/window(s+)?\[(s+)?("|')l/mi, '');        js = js.replace(/self(s+)?\[(s+)?("|')loc/mi, '');        return js;      }      _ogEval        = window.eval;      window.eval    = function(text) {_ogEval(getSafeJS(text));};      window.innerWidth = window.outerWidth; // Fixes browser bug with it innerWidth reports 0      window.innerHeight = window.outerHeight; // Fixes browser bug with it innerHeight reports 0      </script>

<head><body>


<div id="playlist">
    <div class="meta-data">
          <p style="font-size: 20pt;">
            <img src="images/40x40.gif" class="avatar" alt="">
            <?php echo $_SESSION['FirstName']."'s"; ?> <span class="user">Playlist</span>
          </p>
        </div>
   <br/>
<div id="container-list">
 <div id="user-playlist">
  <ul class="downloads">
	  <?php
		
		 $data = mysql_query("SELECT id, name, playtime FROM user_playlist WHERE userid ='".$_SESSION['id']."'");
		 while($info = mysql_fetch_array( $data ))
          {		 
			  $hash = '#view|'.$info['id'];
			  echo '<li playlist-id="'.$info['id'].'"data-text="'.gmdate("H:i:s", $info['playtime']).'">'.
					 $info['name'].'
					<button id="edit" class="fa fa-pencil fa-fw button" onClick="editPlaylist('.$info['id'].'); ">  Edit</button>
					<button id="play" class="fa fa-play fa-fw button" onclick="window.location.hash=\''.$hash.'\'; ">  View</button>
					<button id="delete" class="fa fa-play fa-fw button">  Delete</button>
					
					</li>';
          }

		?>

  </ul>
  </div>
</div>
  
 
</div>
    
</body></html>
