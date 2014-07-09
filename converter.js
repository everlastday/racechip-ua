function file_get_contents( url ) {	// Reads entire file into a string
	// 
	// +   original by: Legaev Andrey
	// %		note 1: This function uses XmlHttpRequest and cannot retrieve resource from different domain.

	var req = null;
	try { req = new ActiveXObject("Msxml2.XMLHTTP"); } catch (e) {
		try { req = new ActiveXObject("Microsoft.XMLHTTP"); } catch (e) {
			try { req = new XMLHttpRequest(); } catch(e) {}
		}
	}
	if (req == null) throw new Error('XMLHttpRequest not supported');

	req.open("GET", url, false);
	req.send(null);

	return req.responseText;
}

function converter() {

	var num = document.getElementById('europrice').innerHTML;
	var num1 = document.getElementById('europrice1').innerHTML;
	var num2 = document.getElementById('europrice2').innerHTML;
	var price = file_get_contents('http://gd-laguna.kz/diz/wp-content/themes/RaceChip-NEU/kurs.php');
	
	num = document.getElementById('europrice').innerHTML = num*price;
	num1 = document.getElementById('europrice1').innerHTML = num1*price;
	num2 = document.getElementById('europrice2').innerHTML = num2*price;
	
}
converter();