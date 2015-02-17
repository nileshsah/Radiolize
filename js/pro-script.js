

var page = '#content';
var _bid = 0;
 if( location.hash.indexOf('#profile|') == 0)
	_bid = location.hash.substr(9, location.hash.length);

function profile( temp ) {

var bid = 0;
 if( location.hash.indexOf('#profile|') == 0)
	bid = location.hash.substr(9, location.hash.length); 
if( temp == "#inbox" )
	{ pageid = "#inbox"; toggle(pageid); }
else if( temp == "#req" )
	{ pageid = "#req"; toggle(pageid); }
else if( (bid != _bid) && temp != 1 )
 {  _bid = bid;	pageid = '#content';  toggle(pageid);}
else
	$(page).show(); 

$.getJSON('_getstream.php?uid='+bid, function(data) {
		if( data !== "" )
			$("#smallbox text").text( data[0].song );
		else
			$("#smallbox text").text("Radio Offline");
	});

$('.message').css("background", "#DDDDDD");

$(function (){
	$('#postbox').keypress(function(e){
      if(e.keyCode==13) {
		
		var bid = 0;
		if( location.hash.indexOf('#profile|') == 0)
			bid = location.hash.substr(9, location.hash.length);   
			
		$("#notif").text("Posting..");
		$("#notif").show();
  
		$.post('content.php?q=msg', { broid: bid, msg: $('#postbox').val() }, function(data) {
			//$('#stories').prepend(data); $('#postbox').val(''); 
			changeView(); refresh(); $("#notif").empty(); $("#notif").hide();
		});
		}
		
    });
	
	$('#msgbox').keypress(function(e){
      if(e.keyCode==13) {
			pm();
		}
		
    });
	
	$('#recbut').on('click', function() {
		if($("#sortable2 li").first().attr("id") == "nothing")
		{	alert("List Empty"); return; }
		
		$("#notif").text("Recommending..");
		$("#notif").show();
		
		var bid = 0;
		if( location.hash.indexOf('#profile|') == 0)
			bid = location.hash.substr(9, location.hash.length);  

		var songname = [];
		var songhref = [];
		var songtime = [];
		
		$("#sortable2 li").each(function() { 
			songname.push( $(this).closest("li").children("div").children("p").children("a").html() );
			songhref.push( $(this).closest("li").children("div").children("p").children("a").attr('href') );
			songtime.push( $(this).closest("li").children("div").children("p").children("a").attr('duration') );
		});
	
		$.post('content.php?q=rec', { broid: bid, text: $("#rectext").val(), name: JSON.stringify(songname), href: JSON.stringify(songhref), time: JSON.stringify(songtime) }, function(data) { 
			 $('.message').load('profile.php?id=' + bid +' #profile', function() { profile(1); refresh(); $("#notif").empty(); $("#notif").hide(); } );
		});
 
	});
	
	$("._msg ul li a").on("click", function(e) { e.preventDefault(); });
	
	
});

$("#artist").autocomplete({
      source: "artist.php",
      minLength: 3,
      select: function( event, ui ) {
		$("ul#artistList").prepend("<li><i class='fa fa-fw fa-times' />"+ui.item.id+"</li>");
		$("#artist").val("");
		$('ul#artistList li i').click(function () {
			$(this).closest("li").remove(); });
	
      }
    });
	
			$('ul#artistList li i').click(function () {
			$(this).closest("li").remove(); });
$("#artist").keypress( function(e) {
	if( e.keyCode == 13 ) {
		$("ul#artistList").prepend("<li><i class='fa fa-fw fa-times' />"+$("#artist").val()+"</li>");
		$("#artist").val("");
		$('ul#artistList li i').click(function () {
			$(this).closest("li").remove(); });
	}
});
	


}

function pm() {

	var bid = 0;
		if( location.hash.indexOf('#profile|') == 0)
			bid = location.hash.substr(9, location.hash.length);
			
	$.post('content.php?q=msg&pvc=1', { broid: bid, msg: $('#msgbox').val() }, function(data) {
			$('#msgbox').text(' '); changeView();
		});
		
	$("#msgbox").focus();
}

function toggle( tag ) {
	$(page).hide();
	$(tag).show();
	
	var bid = 0;
		if( location.hash.indexOf('#profile|') == 0)
			bid = location.hash.substr(9, location.hash.length);
	
	if( tag == "#inbox" )
		$.post("content.php?q=check", { id: bid }, function () { });
	
	
	page = tag;
}

function refup() {
	$.getJSON("content.php?q=data", function (data) {
		$("#msgno").text(data[0].message);
		$("#reqno").text(data[0].request);
	});
}
	

function addfrnd() {
	var bid = 0;
		if( location.hash.indexOf('#profile|') == 0)
			bid = location.hash.substr(9, location.hash.length);
			
	$.post('content.php?q=req', { broid: bid }, function() { 
		notify("Request Sent"); $("#addbut").hide();
	});
}

function reqacc( bid ) {
	$.post('content.php?q=reqacc', { broid: bid }, function() { 
		notify("Request Accepted"); $("#req-" + bid).empty();
	});
}

refup();
setInterval( refup, 10000 );

function reqdec( bid ) {
	$.post('content.php?q=reqdec', { broid: bid }, function() { 
		notify("Request Declined"); $("#req-" + bid).empty();
	});
}

function playRadio( data ) {
  window.open('listen.php?radio='+data,'1388067655243','width=410,height=240,toolbar=0,menubar=0,location=0,status=0,scrollbars=0,resizable=0,left=0,top=0');
  return;
}
  
	
function fan( stat ) {
	
	var bid = 0;
		if( location.hash.indexOf('#profile|') == 0)
			bid = location.hash.substr(9, location.hash.length);
			
	var buf = '';	
	if( stat == 1 )
		buf = 'fan';
	else
		buf = 'defan';
		
	$.post('content.php?q='+ buf, { broid: bid }, function() { $('.message').load('profile.php?id=' + bid +' #profile', function() { profile(1); refresh(); } ); });
}		

function postLike( hash ){

	$.post("content.php?q=like", { hash: hash }, function () {
	});
	
	$("#" + hash + " .hr a").text("Liked");
		$("#" + hash + " .hr a").contents().unwrap();
		
		$("#" + hash + " .hr like").text(  parseInt($("#" + hash + " .hr like").text()) + 1 );
}

function delPost( hash ) {
	if( $("#"+hash+" .delPost").text().length < 1)
		$("#"+hash + " .delPost").text("Delete ?");
	else {
		$.post("content.php?q=del", { hash: hash }, function () {
			$("#"+hash).remove(); notify("Deleted");
		});
	}
		
}

function updateProfile() {
		
		var list = "";
		$("input:checkbox").each(function(){
			var $this = $(this);    
			if( $this.is(":checked") ) {
				console.log($this);
				list +=  $this.attr("value") + ","; }
		});
		
		var alist = "";
		$("#artistList li").each( function() {
			alist += $(this).closest("li").text() + ",";
		});
		
		$.post('content.php?q=update', { aboutme: $("#aboutmebox").val(), genre: list, artist: alist }, function () {
			notify("Updated");
			changeView();
		});
}
		