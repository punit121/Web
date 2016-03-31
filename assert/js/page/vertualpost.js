$(document).ready(function(){

	

	$('#topic').keyup(function(e) {	

	var loc= document.getElementById("topic").value;

	if (loc.indexOf(',') == -1) {

	$.post(baseurl+'users/alltopicofcategory/'+maincat+'/'+loc,function(data){

			//console.log(data);

			//alert(baseurl+'users/findAllServices/'+loc);

			var availableTags = data.split(",");

			

			//console.log(availableTags);

			$('#topic').autocomplete({

				html:true,

			source: availableTags,

			select: function (event, ui) {

  event.preventDefault();

  var selectedObj = ui.item;

  

  var a=(eval(selectedObj));

 var b=(a.label);

  $('#topic').autocomplete('close');

    //$(".ui-menu-item").hide();

  b=$.trim(b);

  $('#topic').val('');

  gotname(b);

}

			}).data("ui-autocomplete")._renderItem = function (ul, item) {

         return $("<li></li>")

             .data("item.autocomplete", item)

             .append("<a>" + item.value + "</a>")

             .appendTo(ul);

     };

		});	}

		else if(e.which == 13){

			

			var edited = loc.replace(/^,|,$/g,'');

		

		 $('#topic').autocomplete('close');

		 

		 $('#topic').val('');

		  edited=$.trim(edited);

		  gotname(edited);

			}

	else{

		var edited = loc.replace(/^,|,$/g,'');

		

		 $('#topic').autocomplete('close');

		 

		 $('#topic').val('');

		  edited=$.trim(edited);

		  gotname(edited);

		

		}	

	});

	

	 $("#vpform").submit(function(){

   

		$count=parseInt($('#countrow').val());

		//alert($count);

if($count >= 4){

//$('#submitdiv').hide();

$('#loding').show();

return true;	

	}

else{

//alert("Submitted");



$('#error').text("Please Insert at least 5 Caption Texts");

return false;

}

return false;

});

	});// JavaScript Document

		

function gotname(c)

{

	 var a= document.getElementById("realtopic").value;

	var m= "'"+c+"'"

	$('#topicbtn').append('<span class="blockDelete" id="'+c+'">'+c+'<a onClick="removename('+m+')" title="Delete"><i class="fa fa-times"></i></a></span>');

	if(a!=="")

	document.getElementById("realtopic").value=a+","+c;

 else

 document.getElementById("realtopic").value=c;

	}

	

function removename(id)

{

	var a= document.getElementById("realtopic").value;	

	var b=a.replace(id,'');

	b = b.replace(/ +(?= )/g,'');

	b=b.trim();

	document.getElementById(id).remove();

	if(b.substring(0, 1)==',')

	{

		b = b.substring(1);

		}

	document.getElementById("realtopic").value=b;

	}