
var loaded = "#dashboard";
changeView();
loaded = "#dashboard";

var term = "";

var as;
  audiojs.events.ready(function() {
     as = audiojs.createAll();
  });

//$('.message').jScrollPane();
 $( ".search" ).autocomplete({
      source: "q.php",
      minLength: 2,
      select: function( event, ui ) {
        $('.search').val(ui.item.id);
		getData();
      }
    });

var links = [];
$(function()
    {
        $('.search').keypress(function(e)
        {
            code= (e.keyCode ? e.keyCode : e.which);
            if (code == 13) 
			{
			getData();
            e.preventDefault();
			}
        });

    });


function getData()
{
 
 $('.message-list').empty();
 $('.message-list').append('<div class="srch">Searching...</div>'); 
 			
		
var url='http://zend-nellex.rhcloud.com/new_get.php?song='+ $('.search').val()+'&pid=0';
// var url='http://nellex.3owl.com/get.php?song='+ $('.search').val();
 
 
 $.getJSON(url, function(data) { 

	term = $('.search').val();
$('.message-list').empty();
	for( var i = 1; i < data.length; i++ )
	{	 
		if( data[i].data == null ) data[i].data = " ";
		$('.message-list').append('<li class="" ><div class="preview"><h3>' + data[i].data.replace(/\<br \/\>/g, "  ") + '</h3><p><a target="_blank" duration='+data[i].dur+' href="'+ data[i].href +'">'+data[i].song+'</a></p></div> <button class="fa fa-pencil fa-fw button-edit button-list" ></button><button class="fa fa-trash-o fa-fw button-list button-delete" onclick="alert("del");"></button><button class="fa fa-play fa-fw button-play button-list" onclick=playaudio("'+encodeURIComponent(data[i].href) +'")></button></li>');
		links[i] = data[i].href;
	}

	if( data[0].pid < data[0].Total )
			$('.message-list').append('<div id="more" onClick="Loadurl('+data[0].pid+');">Load More Results</div>');
 });
	  
}

function Loadurl( pid ) {
	var url='http://medispectra.net/new_get.php?song='+ term +'&pid=' + pid;
	$("#more").text('Loading...');
	
	$.getJSON(url, function(data) { 
		
	$("#more").remove();
	for( var i = 1; i < data.length; i++ )
	{	 
		if( data[i].data == null ) data[i].data = " ";
		$('.message-list').append('<li class="" ><div class="preview"><h3>' + data[i].data.replace(/\<br \/\>/g, "  ") + '</h3><p><a target="_blank" duration='+data[i].dur+' href="'+ data[i].href +'">'+data[i].song+'</a></p></div> <button class="fa fa-pencil fa-fw button-edit button-list" ></button><button class="fa fa-trash-o fa-fw button-list button-delete" onclick="alert("del");"></button><button class="fa fa-play fa-fw button-play button-list" onclick=playaudio("'+encodeURIComponent(data[i].href) +'")></button></li>');
		links[i] = data[i].href;
	}

	if( data[0].pid < data[0].Total )
			$('.message-list').append('<div id="more" onClick="Loadurl('+data[0].pid+');">Load More Results</div>');
 });
}

function playaudio( url )
{	
	$("#jquery_jplayer_1").jPlayer("destroy");
	$("#jquery_jplayer_1").jPlayer({ consoleAlerts: true, ready: function () {  $(this).jPlayer("setMedia", {   mp3: decodeURIComponent(url) }).jPlayer("play");; }, swfPath: "/js", supplied: "mp3" });
	$('#jquery_jplayer_1').jPlayer("play");
	
	document.getElementById('player').style.bottom = '0px'
}

$(document).on('click', '.message-list li', function(e) {
	e.preventDefault();
	var song = $(this).closest("li").children("div").children("p").children("a").attr('href');
	playaudio( encodeURIComponent(song) );
});

$(document).on('click', '#sortable2 li', function(e) {
	e.preventDefault();
});

$(document).on('click', '#sortable2 li .button-edit', function(e) {
	var song = $(this).closest("li").children("div").children("p").children("a").html();
	var input = prompt(" Edit: "+song, song);
			
			if( input != null)
			  $(this).closest("li").children("div").children("p").children("a").html(input);
});

$(document).on('click', '#sortable2 li .button-delete', function(e) {		 
	
		$(this).closest("li").remove();
		if( $("ul#sortable2 li").length == 0) 
			{  $('#sortable2').append('<li id="nothing" class="ui-state-default">Drop Songs Here</li>'); }
		
});
	
function refresh() {  

	var copyHelper= null;
     $( "#sortable1" ).sortable({

      connectWith: "#sortable2",
      forcePlaceholderSize: true,
      helper: function(e,li) {
				copyHelper= li.clone().insertAfter(li);
				return li.clone();
			},
	 placeholder: 'myPlaceholder',
			stop: function() {
				copyHelper && copyHelper.remove();
			}
    }).disableSelection();
    
    
    	$("#sortable2").sortable({
			receive: function(e,ui) {
			document.getElementById("nothing").remove(); 
				copyHelper= null;
			},

		}).disableSelection();

	}

 
$(function () { 
	
$('.pop-up').hide(0);
$('.pop-up-container').hide(0);

$('#cp').on('click', function(){
  $('.pop-up-container').show(0);
  $('.pop-up').fadeIn(300);
  //$('.pop-up-button').hide(0);
});

$('.pop-up span.x').click(function() {
  $('.pop-up-container').hide(0);
  $('.pop-up').hide(0);
});

$(window).hashchange( function(e){
		if( location.hash != '#edit')			
			changeView();
       
	});
});

function changeView( view )
{
//alert(loaded);
	$("#notif").text("Loading..");
	$("#notif").show();
    
	if(location.hash == '#dashboard')
            $('.message').load('dashboard.php #profile', function(){ 
				$("._msg ul li a").on("click", function(e) { e.preventDefault(); });
				profile(); $("#notif").empty(); $("#notif").hide();
			});
    else if(location.hash == '#create')
            $('.message').load('create.php #create', function() { refresh(); $("#notif").empty(); $("#notif").hide();});
	else if(location.hash == '#help')
          {  $('.message').html('<object data="help.php"/>'); $("#notif").empty(); $("#notif").hide(); }
    else if(location.hash == '#playlist')
			$('.message').load('playlist.php #playlist', function() { $("#notif").empty(); $("#notif").hide();});
	else if(location.hash == '#profile')
			$('.message').load('profile.php #profile', function() { profile(view); refresh(); $("#notif").empty(); $("#notif").hide(); });   
	else if( location.hash.indexOf('#profile|') == 0)
			$('.message').load('profile.php?id=' + location.hash.substr(9, location.hash.length) +' #profile', function() { profile( view ); refresh(); $("#notif").empty(); $("#notif").hide();});   
    else if(location.hash == '#radio')
			$('.message').load('radio.php', function() { refresh(); radiolize(); $("#notif").empty(); $("#notif").hide(); });
    else if( location.hash.indexOf('#view|') == 0 ) 
		$('.message').load('view.php?id='+ location.hash.substr(6, location.hash.length) +' .player-wrapper', function () { $("#notif").empty(); $("#notif").hide(); });
	else if( location.hash == "#charts" )
		{ $('.message').load('charts.php #charts', function () { $("#notif").empty(); $("#notif").hide(); }); }
    else 
		 $('.message').load('dashboard.php #profile', function(){ 
				$("._msg ul li a").on("click", function(e) { e.preventDefault(); });
				profile(); $("#notif").empty(); $("#notif").hide();
			});
			
	refresh();
	refup();
	loaded = location.hash;
	$( "body" ).scrollTop( 0 );
	$('.message').css("background", "white");
	

}

function refup() {
	$.getJSON("content.php?q=data", function (data) {
		$("#msgno").text(data[0].message);
		$("#reqno").text(data[0].request);
	});
}
	
	
function createPlaylist() {
	
	var songname = [];
	var songhref = [];
	var songtime = [];
	
	if($("#sortable2 li").first().attr("id") == "nothing")
		{	alert("Playlist Empty"); return; }
	if( $("#playlist_name").val() == "" )
		{ alert("Enter Playlist Name"); return; }
	$("#sortable2 li").each(function() { 
		songname.push( $(this).closest("li").children("div").children("p").children("a").html() );
		songhref.push( $(this).closest("li").children("div").children("p").children("a").attr('href') );
		songtime.push( $(this).closest("li").children("div").children("p").children("a").attr('duration') );
	});
	
	$.post('insert.php', { playlist: $("#playlist_name").val(), hashtag: encodeURIComponent($("span.hashtag").html()), name: JSON.stringify(songname), href: JSON.stringify(songhref), time: JSON.stringify(songtime) }, function(data) { 
    alert(data); notify("Saved");
});

}

function editPlaylist(id)
{
	$('.message').load('create.php?id='+id+' #create', function() { refresh(); loaded = "#edit"; location.href = "#edit";});	
	refresh();
}

function notify( msg )
{		
		$("#notif").text(msg);
		$("#notif").show();
		$("#notif").fadeIn("slow", function(){  setTimeout(function() { $("#notif").fadeOut("slow"); }, 1000 ); });
}

$(".main-nav li a").on('click', function(e) { e.preventDefault(); window.location.hash = $(this).attr('href'); } );

function newPlaylist() {
	
	if( $("#playlist-name").val() == "" )
		{ alert("Enter Playlist Name"); return; }
	if( $("#playlist-hashtag").val() == "" )
		{ alert("Enter Some HashTags Describing Your Playlist"); return; }
	
	
	$('.pop-up span.x').click(); 
        $('.message').load('create.php?name='+ $("#playlist-name").val() + '&hashtag='+ encodeURIComponent($("#playlist-hashtag").val()) +'  #create', function() 	 { refresh(); }); 
}

function radio() {
	var list = "0";
	var count = 0;
	if ( $("#slideThree").is(':checked') ) {
			
		$("input:checkbox").each(function(){
			var $this = $(this);    
			if($this.is(":checked") && $.isNumeric($this.attr("id")) ) {
				list += "," + $this.attr("id"); count = count + 1; }
		});
		
		if(count > 0)		
			$.post( 'manage.php?radio=on&list=' + list, { }, function() { window.location.hash = "#radio"; changeView(); notify("Radio On"); $("#rad-but").text("On"); });
		else {
			alert("Please select atleast one playlist"); $("#slideThree").prop('checked', false); }
			
	
	}
	else
		$.post( 'manage.php?radio=off', { }, function() { notify("Radio Off"); $("#rad-but").text("Off"); changeView(); });
		
}


var id = 0,  tick;

function radiolize( radio ) {

	var url='_getstream.php?radio=' + radio;
	var nxt, dur, startTime;
	
	$.getJSON(url, function(data) {
	   seek = data[0].seek;
	   id = data[0].id;   
	   
	   seek = data[0].dur - seek - 4;
	   $("li.song").text("Now Playing:  " + data[0].song); 
	   
	   var startTime = new Date().getTime();
	   
	   	id++;
		url='_getstream.php?radio='+radio+'&id='+ id;
	   
	  
		$.getJSON(url, function(data) {
	   
			nxt = data[0].song;
			id = data[0].id;
			dur = data[0].dur;
			$("li.album").text("Next:  " + nxt );
			
			loadList( parseInt(id) + 1 );	
		});
		
		

	   clearInterval(tick);
	   tick = setInterval( function update() {
	   
	    var elapsedTime = ((new Date().getTime()) - startTime)/1000;
			//console.log(elapsedTime + "  " + seek);
		
		if( elapsedTime > seek ) {
			radiolize();
			clearInterval(tick);
			}
		}, 1000);			
	
	});
}
$("._msg ul li a").on("click", function(e) { e.preventDefault(); });

function loadList( id ) {
		
	url='manage.php?pid='+ id;
	$.getJSON(url, function(data) {
		$(".loadList").empty();
		for( var i = 0; i < data.length; i++ )
			$(".loadList").append('<li class=""><div class="preview"><p><a duration='+ data[i].dur +' target="_blank" href="'+ data[i].href +'" >'+ data[i].song + ' </a> </a></p></div><button class="fa fa-pencil fa-fw button-edit button-list"></button><button class="fa fa-trash-o fa-fw button-delete button-list" ></button><button class="fa fa-play fa-fw button-play button-list" onclick="playaudio(\''+encodeURIComponent(data[i].href) +'\'); "></button></li>');
     
	 if( data.length == 0) 
			{  $('#sortable2').append('<li id="nothing" class="ui-state-default">Drop Songs Here</li>'); }
		
	});	
}

function updateList()
{
	if ( !$("#slideThree").is(':checked') ) return false;
	
	var songname = [];
	var songhref = [];
	var songtime = [];

		$("#sortable2 li").each(function() { 
		songname.push( $(this).closest("li").children("div").children("p").children("a").html() );
		songhref.push( $(this).closest("li").children("div").children("p").children("a").attr('href') );
		songtime.push( $(this).closest("li").children("div").children("p").children("a").attr('duration') );
	});
	
	var url='_getstream.php?radio=';
	
	$.getJSON(url, function(data) {
	   seek = data[0].seek;
	   idd = parseInt(data[0].id) + 2;  
		console.log( idd + " id:" + (parseInt(id)+1) );
		
		if( idd == ( parseInt(id)+1) )
			$.post('manage.php?up=' + (idd) , { seek: seek, id: idd-2, name: JSON.stringify(songname), href: JSON.stringify(songhref), time: JSON.stringify(songtime) }, function(data) { notify("Updated"); changeView(); } );
		else 
			notify("Failed To Update");
		
		clearInterval(tick);
		radiolize();
	});
}

$(function() {

    $("#search_box").autocomplete({
        source: "search.php",
        minLength: 1,
		select: function( event, ui ) {
			location.hash = "#profile|" + ui.item.id;
			$("#search_box").val( ui.item.name );
      }
    }).data( "autocomplete" )._renderItem = function( ul, item ) {
        var inner_html = '<a><div class="list_item_container"><div class="image"><img src="propic/' + item.pic + '"></div><div class="label">' + item.name + '</div><div class="description">' + item.gender + ', '+ item.age + '<br>'+ item.loc +'</div></div></a>';
        return $( "<li></li>" )
            .data( "item.autocomplete", item )
            .append(inner_html)
            .appendTo( ul );
    };
});

$(document).bind('keydown', function(e) {
    if( (e.which === 116) || (e.which === 82 && e.ctrlKey) ) {
       changeView(); //notify("Refreshed");
       return false;
    }
});
    
