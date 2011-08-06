<?php
error_reporting(0);
include_once '../controller/controllerScore.php';
?>
<head>
<style type="text/css">
	body
	{
		margin: 20px;
		padding: 0;
		font: normal 85% arial, helvetica, sans-serif;
		color: #000;
		background-color: #fff;
	}
	
	.rank
	{
		width: 50px;
		
		overflow:hidden;
		float: left;
	}

	.name{
		width: 200px;
		
		overflow:hidden;
		float: left;
	}
		
	.score{
		width: 200px;

		overflow:hidden;
		float:left;
	}
	
	.date{
		width: 200px;

		overflow:hidden;
		float:left;
	}
	
	.scoreTitle
	{
		font-size: 40pt;
		text-align: center;
	}
	
	.copyright
	{
		font-size: 12pt;
		text-align: center;
	}
	
	.title
	{
		font-size: 85pt;
		text-align: center;
		text-decoration: underline
	}
	
	#scoreContent{
		width: 700px ;
		margin-left: auto ;
		margin-right: auto ;
		border: 1px solid #000;
	}
	
	.infoBox
	{
		position:absolute;
		height:200px;
		width:200px;
		margin-left: 10px ;
		margin-right: 10px ;
		padding: 10;
		border: 3px solid #3322ff;
		font-size: 15pt;
	}
	
	.directions
	{
		position:absolute;
		height:200px;
		width:200px;
		top: 250px;
		margin-left: 10px ;
		margin-right: 10px ;
		padding: 10;
		border: 3px solid #3322ff;
		font-size: 15pt;
	}

</style>
</head>
<!-- GOOGLE ANALYTICS -->
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var pageTracker = _gat._getTracker("UA-1833916-2");
pageTracker._trackPageview();
</script>

<body>
<div class="infoBox">
Want to know the Latest News about Evade?<br>
<b>Check our <a href="http://evadegame.tumblr.com">Blog</a><b>
<br><BR>
Evade is a game! Click Go and Play!
</div>

<div class="directions">
<b>Directions</b><BR>
<b>1.</b> Stay away from the Red Blocks<BR>
<b>2.</b> Don't touch the Blue Border<BR>
<b>3.</b> Do 1 & 2 for as long as possible <BR>
</div>

<div class="title">E V A D E</div><BR>
<center>
<object type="application/x-shockwave-flash" data="evade.swf" id="audioplayer1" height="500" width="500">;
<param name="movie" value="evade.swf">;
<param name="quality" value="high">;
<param name="menu" value="false">;
<param name="wmode" value="transparent">;
</object>
<BR>
</center>

<div id="scoreContent">
<div class="scoreTitle">BEST EVADERS EVER</div>
<div>
<div class='rank'><b>Rank</b></div>
<div class='name'><b>Name</b></div>
<div class='score'><b>Score</b></div>
<div class='date'><b>Date</b></div><BR>
<div><BR>

<?php
$contScore = new controllerScore();
$data = $contScore->getTopScore(-1, "game = 'evade'", 0, 25);
//var_dump($data);
$rank=1;
foreach($data as $r)
{
	
	echo "<div>";
	echo "<div class='rank'>" . $rank . "</div>";
	echo "<div class='name'>" . $r['name'] . "</div>";
	echo "<div class='score'>" . $r['score'] . " Secs </div>";
	echo "<div class='date'>" . $r['date'] . "</div><BR>";
	echo "<div><BR>";
	$rank++;
}
?>
</div>
<div class="copyright">© 2008 Mobouy inc</div>
</body>