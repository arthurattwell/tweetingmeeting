<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>jquery search box</title>
<style type="text/css">
body{
font-family:Arial, Helvetica, sans-serif;

}
*{margin:0;padding:0;}
a
{
color:#DF3D82;
text-decoration:none

}
a:hover
{
color:#DF3D82;
text-decoration:underline;

}
b
{


}
	ol.update
	{list-style:none;font-size:1.1em; margin-top:20px }
	ol.update li{ height:70px; border-bottom:#dedede dashed 1px; text-align:left;}
	ol.update li:first-child{ border-top:#dedede dashed 1px; height:70px; text-align:left}
	#flash
	{
	margin-top:20px;
	text-align:left;
	
	}
	#searchword
	{
	text-align:left; margin-top:20px; display:none;
	font-family:Arial, Helvetica, sans-serif;
	font-size:16px;
	color:#000;
	}
	.searchword
	{
	font-weight:bold;
	color:#000000;
	
	}
	#search_box
	{
	padding:4px; border:solid 1px #666666; width:300px; height:30px; font-size:18px;-moz-border-radius: 6px;-webkit-border-radius: 6px;
	}
	.search_button
	{
	background:url(http://static.twitter.com/images/bg-btn-signup.png); border:#000000 solid 1px; padding-left:9px;padding-right:9px;padding-top:9px;padding-bottom:9px; color:#000; font-weight:bold; font-size:16px;-moz-border-radius: 6px;-webkit-border-radius: 6px;
	}
</style>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">

$(function() {
//-------------- Update Button-----------------


$(".search_button").click(function() {
    var search_word = $("#search_box").val();
    var dataString = 'search_word='+ search_word;
	
	if(search_word=='')
	{
	}
	else
	{
	$.ajax({
	type: "GET",
    url: "searchdata.php",
    data: dataString,
    cache: false,
    beforeSend: function(html) {
   
	document.getElementById("insert_search").innerHTML = ''; 
	$("#flash").show();
	$("#searchword").show();
	 $(".searchword").html(search_word);
	$("#flash").html('<img src="ajax-loader.gif" align="absmiddle">&nbsp;Loading Results...');
	
	
               
            },
  success: function(html){
   $("#insert_search").show();
  
   $("#insert_search").append(html);
   $("#flash").hide();
	
  }
});
		
	}
		

    return false;
	});
//---------------- Delete Button----------------


});
</script>

</head>

<body>
<div style="margin-top:10px; margin-left:10px">Tutorial link <a href="">click here</a></div>
<div align="center">
<div style="width:600px">
<div style="margin-top:20px; text-align:left">
<form method="get" action="">
			  <input type="text" name="search" id="search_box" class='search_box'/>
			  <input type="submit" value="Search" class="search_button" /><br />
			  <span style="color:#666666; font-size:14px; font-family:Arial, Helvetica, sans-serif;"><b>Eg :</b> jquery, ajax, facebook, php, twitter</span>
			  
			  
			  </form>
		</div>	  
			  <div>
			  <div id="searchword">Search results for <span class="searchword"></span></div>
			  <div id="flash"></div>
			  <ol id="insert_search" class="update">
			  </ol>
			  
			  </div>
			  </div>
			  </div>
</body>
</html>
