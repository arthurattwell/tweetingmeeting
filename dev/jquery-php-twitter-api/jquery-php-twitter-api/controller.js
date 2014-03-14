/*!
 * http://www.reynoldsftw.com
 *
 * Created by Steve Reynolds
 */

var timer;   
  
$(document).ready(function() {   
  
getSearch(); 
  
});   
  
function getSearch()   
{

	clearTimeout(timer);   
	var results = "";   
	var theQuery = "stevereynolds";   
  
	$.post("/getSearch.php", {query: theQuery},  function(xml){   
		$('entry',xml).each(function(i){   
			var title = $(this).find("title").text();   
			results = results + title + "<BR>";   
		});   
	$("#container").html(results);   
	});   
  
	timer = setTimeout('getSearch()', 30000);   
}