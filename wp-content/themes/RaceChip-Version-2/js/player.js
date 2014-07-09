// JavaScript Document

//Variable Player global deklarieren
var player = null;


// Hier werden die benötigten Parameter eingetragen.
var params = "autohide=1";

// Video beim Start
	var id = 'YTDlJK4fkfE';


// Wenn Dokument geladen
window.onload = function() {
	
	//Wenn kein Objekt mit der id "my-player" existiert, lege es an.
	if(document.getElementById("my-player") == null) {
		//Inhalt von div#player durch iframe ersetzen
		document.getElementById('player').innerHTML='<iframe id="my-player" width="100%" height="100%" src="" frameborder="0" allowfullscreen></iframe>';
	}
		
	//iframe der Variable 'player' zuweisen.
	player = document.getElementById('my-player');

	var url = player.src;
	
	if(url.indexOf("youtube") >= 0){
		var id_start = url.lastIndexOf("/");
		var id_ende = url.lastIndexOf("?");
		if(id_ende < id_start){ 
			id_ende = url.length
		}
		id = url.substring(id_start+1, id_ende);
		if(url.substring(id_ende+1, url.length) > 0){
			params = url.substring(id_ende+1, url.length);
		}
	}	
	
	
	// GET Parameter überprüfen
	if(get_GET_param('v')) {
		id = get_GET_param('v');
	}
	
	url = 'http://www.youtube.com/embed/' + id;
	if (params.length > 0) {
		url += '?' + params;
	}
	
	
	if(player.src != url){
		player.src = url;
	}
	

	
	
}



// Alle GET Parameter extrahieren und in Array übertragen.
function get_GET_params() {
	var GET = new Array();
	if(location.href.search.length > 0) {
		var get_param_str = location.search.substring(1,location.search.length);
		var get_params = get_param_str.split("&");
		for(i = 0; i < get_params.length; i++) {
			var key_value = get_params[i].split("=");
			if(key_value.length == 2) {
				GET[key_value[0]] = key_value[1];
			}
		}
	}
	return(GET)
}


// einzelnen GET Parameter abrufen.
function get_GET_param(key) {
	var get_params = get_GET_params();
	if(get_params[key])
		return get_params[key];
	else
		return false;
}




// Video wiedergeben
function loadVideo (id, goto) {
		var url = "http://www.youtube.com/embed/" + id + '?autoplay=1';
		if(goto) location.hash = '#videoplayer'
		if (params.length > 0) {
			url += "&amp;" + params;
		}
		player.src = url;
	}