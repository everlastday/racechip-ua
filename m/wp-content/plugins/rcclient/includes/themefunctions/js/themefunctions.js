/* =========[ Inintialisierung Http Request: Currency Calculator auf Detailseite ]======= */
  var XMLHTTP = null;
  if (window.XMLHttpRequest) {
      XMLHTTP = new XMLHttpRequest();
  } else if (window.ActiveXObject) {
      try {
          XMLHTTP = new ActiveXObject("Msxml2.XMLHTTP");
      } catch (ex) {
          try {
              XMLHTTP = new ActiveXObject("Microsoft.XMLHTTP");
          } catch (ex) {
          }
      }
  }
/* =========[ Inintialisierung Http Request: Currency Calculator auf Detailseite End ]======= */

/* =========[ Inintialisierung Http Request: Versandkostenschorschau im Warenkorb ]======= */
  var countriesCosts = new Array();
  function changeCountryShippingCost(field) {
      if (countriesCosts[field.options[field.selectedIndex].value]) {
          document.getElementById('shipping_cost').innerHTML = countriesCosts[field.options[field.selectedIndex].value][0];
          document.getElementById('total').innerHTML = countriesCosts[field.options[field.selectedIndex].value][1];
      }
      return true;
  }
/* =========[ Inintialisierung Http Request: Versandkostenschorschau im Warenkorb End ]======= */

/* =========[ Payments ]======= */

    var installedPayments = new Array();
    
    function startPayment() {
        document.getElementById("paymentform").submit();
    }
  
    function updatePaymentMethod() {
        if (document.getElementById('other_addr')) {
            if (document.getElementById('other_addr').checked == true) {
                countrySelect = document.getElementById('delivery_country');
            } else {
                countrySelect = document.getElementById('country');
            }
            selectedIndex = countrySelect.selectedIndex;
            value = countrySelect.options[selectedIndex].value;
            selectedCountry = value.substr(0,2);
        
            allowedString = allowedPayments[selectedCountry];
            allowedArray = allowedString.split(',');

            for (i=0; i<installedPayments.length; i++) {
                module = installedPayments[i];
                found = false;
                for (j=0; j<allowedArray.length; j++) {
                    if (allowedArray[j]==module) {
                        found = true;
                    }
                }
          
                if (found == true) {
                    document.getElementById(module).style.display = 'block';
                } else {
                    document.getElementById('opt_' + module).checked = false;
                    document.getElementById(module).style.display = 'none';
                }
            }
        }
    }
  
/* =========[ Payments End ]======= */

/* =========[ jQuery onload ]======= */
jQuery(document).ready(function($) {

/* =========[ Toggle Container ]======= */
	// Show the toggle Links on load
	$(".trigger").show();

	// Hide (Collapse) the toggle containers on load
	$(".toggle_container").hide();

	// Switch the "Open" and "Close" state per click then slide up/down
	// (depending on open/close state)
	$(".trigger").click(function() {
		$(this).toggleClass("active");
		$(".toggle_container").slideToggle("slow");
		return false; // Prevent the browser jump to the link anchor
	});

	// Hide (Collapse) the other_imput toggle container on load, if not checked
	// if ($(".other_imput_toggle_container").not(":checked")) {
		// $(".other_imput_toggle_container").hide();
	// }
	$(".other_imput_trigger:not(:checked)").each(function() {
		$(".other_imput_toggle_container").hide();
	});

	// Switch the "Open" and "Close" state per click then slide up/down
	// (depending on open/close state)
	$(".other_imput_trigger").click(function() {
		
		$(".other_imput_toggle_container").slideToggle("slow");
		
	});

/* =========[ Toggle Container End ]======= */

/* =========[ onload Payments ]======= */
    if (document.getElementById('paymentform')) {
      //alert('is Ingo');
      window.setTimeout("startPayment()", 6000);
    }
   
    // var installedPayments = new Array();
    inputElements = document.getElementsByTagName('input');
    for (i=0; i<inputElements.length; i++) {
      if (inputElements[i].name=='info[payment_class]') {
        installedPayments.push(inputElements[i].value);
      }
    }
    updatePaymentMethod();

    
  
  /* =========[ onload Payments End ]======= */
  
  /* =========[ Diesel <-> Benziner Filter ]======= */
  
    $("#filter").show();
    $(".diesel_row").hide().fadeIn("slow");
    $(".petrol_row").hide().fadeIn("slow");
    $("#filter_all").addClass("selected");
    $("#filter_diesel").removeClass("selected");
    $("#filter_petrol").removeClass("selected");
        
    $("#filter_all").click( function () {

        var diesel_status = $(".diesel_row").css("display");
        var petrol_status = $(".petrol_row").css("display");

        if(diesel_status != "table-row"){			
            $(".diesel_row").fadeIn("slow");										
        }

         if(petrol_status != "table-row"){
            $(".petrol_row").fadeIn("slow");
        }
            
        $("#filter_all").addClass("selected");
        $("#filter_diesel").removeClass("selected");
        $("#filter_petrol").removeClass("selected");

    });

    $("#filter_diesel").click( function () {

        var diesel_status = $(".diesel_row").css("display");
        var petrol_status = $(".petrol_row").css("display");

        if(diesel_status != "table-row"){									
            $(".diesel_row").fadeIn("slow");
        }

        if(petrol_status == "table-row"){
            $(".petrol_row").fadeOut("slow");
        }
            
        $("#filter_all").removeClass("selected");
        $("#filter_diesel").addClass("selected");
        $("#filter_petrol").removeClass("selected");

    });
							
    $("#filter_petrol").click( function () {

        var diesel_status = $(".diesel_row").css("display");
        var petrol_status = $(".petrol_row").css("display");

        if(petrol_status != "table-row"){									
            $(".petrol_row").fadeIn("slow");
        }

        if(diesel_status == "table-row"){
            $(".diesel_row").fadeOut("slow");
        }
            
        $("#filter_all").removeClass("selected");
        $("#filter_diesel").removeClass("selected");
        $("#filter_petrol").addClass("selected");

    });
  /* =========[ Diesel <-> Benziner Filter End ]======= */
  
  /* =========[ TipTip Options ]======= */
        
//        $(".tooltip_c").tipTip({
//            maxWidth:        "250px",
//            defaultPosition: "right",
//            edgeOffset:      10
//        });
//
//        $(".tooltip").tipTip({
//            maxWidth:        "250px",
//            defaultPosition: "right",
//            edgeOffset:      10,
//            keepAlive:       true
//        });

/* =========[ TipTip Options End ]======= */

});

/* =========[ Toggle Container Advanced ]======= */

    function toggleDiv(element){
    
        /*
        if(document.getElementById(element).style.display == 'none') {
            document.getElementById(element).style.display = 'block';
            document.getElementById('title_' + element).setAttribute('title', 'ausblenden');
            document.getElementById('toggle_' + element).innerHTML = '&#9660;';
        }
        else {
            document.getElementById(element).style.display = 'none';
            document.getElementById('title_' + element).setAttribute('title', 'einblenden');
            document.getElementById('toggle_' + element).innerHTML = '&#9654;';
        }
        */
        
        jQuery(function($) {
            $("#" + element).toggle("normal" , function(){
                if ( $(this).css("display") == 'none' ) {
                    $('#title_' + element).attr('title', 'einblenden');
                    $('#toggle_' + element).fadeOut("fast" , function(){
                        $(this).html('&#9654;')
                    }).fadeIn("fast");
                }
                else {
                    $('#title_' + element).attr('title', 'ausblenden');
                    $('#toggle_' + element).fadeOut("fast" , function(){
                        $(this).html('&#9660;')
                    }).fadeIn("fast");
                }
            });
        });
    
    }
    
/* =========[ Toggle Container Advanced End ]======= */
/* =========[ curreny converter ]======= */    

  document.write('<link rel="stylesheet" type="text/css" href="/wp-content/plugins/rcclient/includes/themefunctions/currencies/3col.css" /\>');

  var currencyConverterData = null;
  var pageScrollX  = 0;
  var pageScrollY  = 0;
  var pageAvHeight = 0;
  var fog   = null;
  var ccc   = null;
  var body  = null;
  var calc1 = null;
  var calc2 = null;
  var calc3 = null;
  var rcPrice1 = 0;
  var rcPrice2 = 0;
  var rcPrice3 = 0;
  var calcInit = false;
    
  function initCalculator() {
    if ( typeof XMLHTTP != 'undefined' ) {
      XMLHTTP.open('GET', '/wp-content/plugins/rcclient/includes/themefunctions/currencies/currency_data.php');
      XMLHTTP.onreadystatechange = function() {
        if (XMLHTTP.readyState == 4) {
          currencyConverterData = JSON.parse(XMLHTTP.responseText);
          fillCurrencyTable();
        }
      };
      XMLHTTP.send(null);
    }
  }
  
  function fillCurrencyTable() {
    fog   = document.getElementById('fog');
    ccc   = document.getElementById('currency-converter');
    body  = document.getElementsByTagName('body')[0];
    calc1 = document.getElementById('price-calc1');
    calc2 = document.getElementById('price-calc2');
    calc3 = document.getElementById('price-calc3');
    calcInit = true;
    
    var theDoc = window.document;
    var theTable = theDoc.getElementById('currency-listing');
    for (i=0; i<currencyConverterData.length; i++) {
      var newRow  = theDoc.createElement('tr');
      var newCol0 = theDoc.createElement('td');
      var newCol1 = theDoc.createElement('td');
      newRow.setAttribute('onmouseover', "this.className='hover'");
      newRow.setAttribute('onmouseout', "this.className='main'");
      newRow.setAttribute('onclick', "setCurrency('" + currencyConverterData[i]['code'] + "'," + currencyConverterData[i]['value'] + ")");
      newCol0.className = 'name';
      newCol1.className = 'code';
      newCol0.innerHTML = currencyConverterData[i]['name'];
      newCol1.innerHTML = currencyConverterData[i]['code'];
      newRow.appendChild(newCol0);
      newRow.appendChild(newCol1);
      theTable.appendChild(newRow);
    }
  }
  
  function getScrollPos() {
    if (typeof(window.pageYOffset) == 'number') {
      pageScrollX  = window.pageXOffset;
      pageScrollY  = window.pageYOffset;
	  pageAvHeight = window.innerHeight;
    } else if (document.body && (document.body.scrollLeft || document.body.scrollTop)) {
      pageScrollX = document.body.scrollLeft;
      pageScrollY = document.body.scrollTop;
    } else if (document.documentElement && (document.documentElement.scrollLeft || document.documentElement.scrollTop)) {
      pageScrollX  = document.documentElement.scrollLeft;
      pageScrollY  = document.documentElement.scrollTop;
	  pageAvHeight = document.documentElement.clientHeight;
    }
  }
 
  function showCalculator() {
    if (calcInit == false) {
      return false;
    }
    document.getElementById('price-rc1').innerHTML = 'EUR ' + number_format(rcPrice1, 2);
    document.getElementById('price-rc2').innerHTML = 'EUR ' + number_format(rcPrice2, 2);
    document.getElementById('price-rc3').innerHTML = 'EUR ' + number_format(rcPrice3, 2);
    getScrollPos();
    fog.style.height = body.clientHeight + 'px';
    fog.style.display = 'block';
    ccc.style.display = 'block';
    ccc.style.top  = '300px';
    ccc.style.left = (body.clientWidth/2-350) + 'px';
    if (pageAvHeight > 0) {
      ccc.style.top = parseInt((pageAvHeight-330)/2) + 'px';
    } else {
      ccc.style.top = '10px';
    }
  }
  
  function hideCalculator() {
    fog.style.display = 'none';
    ccc.style.display = 'none';
  }
  
  function setCurrency(code,value) {
    calc1.innerHTML = code + ' ' + number_format(rcPrice1 * value, 2);
    calc2.innerHTML = code + ' ' + number_format(rcPrice2 * value, 2);
    calc3.innerHTML = code + ' ' + number_format(rcPrice3 * value, 2);
  }
  
  function number_format(number, decimals, decimal_point, thousands_sep) { 
    var neu = ''; 
    if (!decimals || decimals<0) {
      decimals = 0; 
    }
    if (!decimal_point || (decimal_point!='.' && decimal_point!=',')) {
      decimal_point = ','; 
    }
    if (!thousands_sep || (thousands_sep!='.' && thousands_sep!=',')) {
      thousands_sep = '.'; 
    }
    var f = Math.pow(10, (decimals+1)); 
    number = '' + parseInt(number * f + (5 * (number > 0 ? 1 : -1)) ) / f ; 
    var idx = number.indexOf('.'); 
    number += (idx == -1 ? '.' : '' ) + f.toString().substring(1);  
    var sign = number < 0; 
    if (sign) {
      number = number.substring(1); 
    }
    idx = number.indexOf('.');  
    if (idx == -1) {
      idx = number.length; 
    } else {
      neu = decimal_point + number.substr(idx + 1, decimals);
    }
    while (idx > 0) { 
      if (idx - 3 > 0) { 
        neu = thousands_sep + number.substring( idx - 3, idx) + neu; 
      } else {
        neu = number.substring(0, idx) + neu;
      }
      idx -= 3; 
    } 
    return (sign ? '-' : '') + neu; 
  } 

/* =========[ curreny converter end ]======= */

    function popup(w,h,site) {
        x = screen.availWidth/2-w/2;
        y = screen.availHeight/2-h/2;
        var popupWindow = window.open(
            '','','width='+w+',height='+h+',left='+x+',top='+y+',screenX='+x+',screenY='+y+',scrollbars=yes');
        popupWindow.document.write(site);
    }
    