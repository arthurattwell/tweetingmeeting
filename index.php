<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>TweetingMeeting | Big-screen Twitter for meetings and conferences</title>
		<link href="default.css" rel="stylesheet" type="text/css" />

		<script>
		<!--

		/*
		Auto Refresh Page with Time script
		By JavaScript Kit (javascriptkit.com)
		*/

		//enter refresh time in "minutes:seconds" Minutes should range from 0 to inifinity. Seconds should range from 0 to 59
		var limit="1:00"

		if (document.images){
		var parselimit=limit.split(":")
		parselimit=parselimit[0]*60+parselimit[1]*1
		}
		function beginrefresh(){
		if (!document.images)
		return
		if (parselimit==1)
		window.location.reload()
		else{
		parselimit-=1
		curmin=Math.floor(parselimit/60)
		cursec=parselimit%60
		if (curmin!=0)
		curtime=curmin+" minutes and "+cursec+" seconds left until page refresh!"
		else
		curtime=cursec+" seconds left until page refresh!"
		window.status=curtime
		setTimeout("beginrefresh()",1000)
		}
		}

		window.onload=beginrefresh
		//-->
		</script>

		<script language="javascript" type="text/javascript">
		function showHide(shID) {
		   if (document.getElementById(shID)) {
			  if (document.getElementById(shID+'-show').style.display != 'none') {
				 document.getElementById(shID+'-show').style.display = 'none';
				 document.getElementById(shID).style.display = 'block';
			  }
			  else {
				 document.getElementById(shID+'-show').style.display = 'inline';
				 document.getElementById(shID).style.display = 'none';
			  }
		   }
		}
		</script>

		<!--[if IE]>
			<link href="ie.css" rel="stylesheet" type="text/css" />
		<![endif]-->

		<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-5570316-20']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>

	</head>

	<body>

		<div id="header">

			<div id="logo">
				<h1 title="TweetingMeeting">
					<a href="http://tweetingmeeting.com/">
						<img src="images/logo.png" />
					</a>
				</h1>
			</div><!--#logo-->

			<div id="navigation">
				<p>
					Big-screen Twitter for meetings and conferences
					<a href="#" id="howto-show" class="showLink" onclick="showHide('howto');return false;">| How-to</a>
					<a href="#" id="ads-show" class="showLink" onclick="showHide('ads');return false;">| Maybe useful</a>
					<a href="#" id="about-show" class="showLink" onclick="showHide('about');return false;">| Feedback</a>
				</p>
				<div id="howto" class="more">
					<p>
						TweetingMeeting is the easiest way to show a live Twitter stream about your conference or meeting. <br />
						Just type your meeting's hashtag below (skip the # sign), hit enter, and open this page up on a public screen. <br />
						We suggest you switch your browser to full-screen mode too (hit F11 in most browsers).
					</p>
					<p>
						Tweets refresh every minute. If there aren't any related tweets from the last few days, nothing will show here.
					<div id="search">
						<form action="" method="get">
							<label>#</label>
							<input type="text" name="q" id="searchbox" />
							<!--<input type="submit" name="submit" id="submit" value="Submit" />-->
						</form>
					</div><!--#search-->
					<p>
					<a href="#" id="howto-hide" class="hideLink" onclick="showHide('howto');return false;"><img class="hide-button" alt="Hide" src="images/hide-button.png" /></a>
					</p>

				</div><!--#howto-->
				<div id="ads" class="more">
					<p>
						Advertising Google thinks is in your area of interest.
					</p>

						<script type="text/javascript"><!--
						google_ad_client = "ca-pub-7957920664590663";
						/* TweetingMeeting 1 */
						google_ad_slot = "0093757499";
						google_ad_width = 728;
						google_ad_height = 90;
						//-->
						</script>
						<script type="text/javascript"
						src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
						</script>
						<br />
						<script type="text/javascript"><!--
						google_ad_client = "ca-pub-7957920664590663";
						/* TweetingMeeting 2 */
						google_ad_slot = "4448835360";
						google_ad_width = 728;
						google_ad_height = 90;
						//-->
						</script>
						<script type="text/javascript"
						src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
						</script>

					<p>
						<a href="#" id="ads-hide" class="hideLink" onclick="showHide('ads');return false;"><img class="hide-button" alt="Hide" src="images/hide-button.png" /></a>
					</p>
				</div><!--#ads-->
				<div id="about" class="more">
					<p>
						Is TweetingMeeting working for you? Giving you problems? Let us know: mail <a href="mailto:info@tweetingmeeting.com">info@tweetingmeeting.com</a> or DM <a href="http://twitter.com/52sites">52sites</a>.
					</p>
					<p>
						TweetingMeeting is a <a href="http://52sites.com">52sites</a> project.
					</p>
					<p>
						<a href="#" id="about-hide" class="hideLink" onclick="showHide('about');return false;"><img class="hide-button" alt="Hide" src="images/hide-button.png" /></a>
					</p>
				</div><!--#about-->
			</div><!--#navigation-->



			<div class='clear'></div><!--.clear-->

		</div><!--#header-->



		<?php



		//Search API Script

		$q=$_GET['q'];

		if($_GET['q']==''){

		$q = 'conference';}

		$search = "http://search.twitter.com/search.atom?q=".$q."";

		$tw = curl_init();

		curl_setopt($tw, CURLOPT_URL, $search);
		curl_setopt($tw, CURLOPT_RETURNTRANSFER, TRUE);
		$twi = curl_exec($tw);
		$search_res = new SimpleXMLElement($twi);

		/*echo "<h3 id="currently-showing" class="current-query">Currently showing '".$q."'</h3>";*/

		## echo search results

		foreach ($search_res->entry as $twit1) {

		$description = $twit1->content;

		$description = preg_replace("#(^|[\n ])@([^ \"\t\n\r<]*)#ise", "'\\1<a href=\"http://www.twitter.com/\\2\" >@\\2</a>'", $description);
		$description = preg_replace("#(^|[\n ])([\w]+?://[\w]+[^ \"\n\r\t<]*)#ise", "'\\1<a href=\"\\2\" >\\2</a>'", $description);
		$description = preg_replace("#(^|[\n ])((www|ftp)\.[^ \"\t\n\r<]*)#ise", "'\\1<a href=\"http://\\2\" >\\2</a>'", $description);

		$retweet = strip_tags($description);


		$date =  strtotime($twit1->updated);
		$dayMonth = date('d M', $date);
		$year = date('y', $date);
		$message = $row['content'];

		echo "<div class='tweet'>
				<div class='text'>".$description."
					<div class='metadata'>
						<a href=\"",$twit1->author->uri,"\" target=\"_blank\">
							<img border=\"0\" width=\"48\" class=\"twitter_thumb\" src=\"",$twit1->link[1]->attributes()->href,"\" title=\"", $twit1->author->name, "\" />
						</a>
						&nbsp;", $twit1->author->name,"
						<!--<a href='http://twitter.com/home?status=RT: ".$retweet."' target='_blank'>Retweet!</a>-->
					</div><!--#metadata-->
			</div><!--#text-->
			<div class='clear'></div><!--.clear-->
			</div><!--#tweet-->";

		}


		curl_close($tw);

		?>

	</body>
</html>