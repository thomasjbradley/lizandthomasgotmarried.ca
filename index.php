<?php
$arStyles = array(
	'body { background: #8f87be url("images/bg-purple.gif") repeat left top; }',
	'body { background: #98cdcd url("images/bg-aqua.gif") repeat left top; }',
	'body { background: #acd2a1 url("images/bg-green.gif") repeat left top; }'
	);
$randBg = $arStyles[array_rand($arStyles)];

?><!DOCTYPE html>
<html lang="en-ca">
<head>
<meta charset="utf-8">
<title>Liz &amp; Thomas Got Married August 2nd, 2009—Ottawa, Canada</title>
<meta name="keywords" content="liz,kerrison,thomas,bradley,marriage,engaged,ottawa,canada">
<meta name="description" content="Liz Kerrison &amp; Thomas J Bradley got married August 2nd, 2009.">
<meta name="ICBM" content="45.3333333,-75.5841666">
<meta name="geo.position" content="45.3333333,-75.5841666">
<meta name="geo.placename" content="Ottawa,Ontario,Canada">
<meta name="geo.region" content="ca-on">
<link rel="stylesheet" href="common/general.css" type="text/css">
<!--[if IE 6]><link rel="stylesheet" href="common/ie-6.css" type="text/css"><![endif]-->
<style type="text/css">
	<?php echo $randBg; ?>
</style>
<!--[if lt IE 7]><script type="text/javascript" src="common/unitpngfix.js"></script><![endif]-->
<link rel="icon" href="favicon.png" type="image/png">
<link rel="apple-touch-icon" href="apple-touch-icon.png">
<meta name="viewport" content="width=1010">
</head>
<body>
<div id="section">
	<div id="content">
		<h1><img src="images/logo.png" width="500" height="290" alt="Liz &amp; Thomas Got Married"></h1>
		<img src="images/date.png" id="date" width="470" height="55" alt="August 2nd, 2009 at 2:30">
	</div>
	<div id="graphics">
		<a href="http://lizkerrison.ca" id="liz" rel="external"><img src="images/liz.png" width="285" height="300" alt="Liz Kerrison"></a>
		<a href="http://thomasjbradley.ca" id="thomas" rel="external"><img src="images/thomas.png" width="225" height="300" alt="Thomas J Bradley"></a>
	</div>
</div>

<div id="photos">
	<div class="scroll-wrap">
		<a id="prev"><span>Previous</span></a>
		<div id="scroll-photos" class="scrollable">
			<ul class="items">
				<li class="active"><img src="photos/wedding-33.jpg" width="752" height="500" alt="">
				<li><img src="photos/wedding-31.jpg" width="332" height="500" alt="">
				<li><img src="photos/wedding-32.jpg" width="752" height="500" alt="">
				<li><img src="photos/wedding-34.jpg" width="331" height="500" alt="">
				<li><img src="photos/wedding-35.jpg" width="752" height="500" alt="">
				<li><img src="photos/wedding-01.jpg" width="748" height="500" alt="">
				<li><img src="photos/wedding-02.jpg" width="748" height="500" alt="">
				<li><img src="photos/wedding-03.jpg" width="335" height="500" alt="">
				<li><img src="photos/wedding-04.jpg" width="306" height="500" alt="">
				<li><img src="photos/wedding-05.jpg" width="332" height="500" alt="">
				<li><img src="photos/wedding-06.jpg" width="324" height="500" alt="">
				<li><img src="photos/wedding-07.jpg" width="335" height="500" alt="">
				<li><img src="photos/wedding-08.jpg" width="760" height="500" alt="">
				<li><img src="photos/wedding-09.jpg" width="752" height="500" alt="">
				<li><img src="photos/wedding-10.jpg" width="747" height="500" alt="">
				<li><img src="photos/wedding-11.jpg" width="752" height="500" alt="">
				<li><img src="photos/wedding-12.jpg" width="778" height="500" alt="">
				<li><img src="photos/wedding-13.jpg" width="332" height="500" alt="">
				<li><img src="photos/wedding-14.jpg" width="747" height="500" alt="">
				<li><img src="photos/wedding-15.jpg" width="761" height="500" alt="">
				<li><img src="photos/wedding-16.jpg" width="757" height="500" alt="">
				<li><img src="photos/wedding-17.jpg" width="330" height="500" alt="">
				<li><img src="photos/wedding-18.jpg" width="334" height="500" alt="">
				<li><img src="photos/wedding-19.jpg" width="748" height="500" alt="">
				<li><img src="photos/wedding-20.jpg" width="748" height="500" alt="">
				<li><img src="photos/wedding-21.jpg" width="748" height="500" alt="">
				<li><img src="photos/wedding-22.jpg" width="757" height="500" alt="">
				<li><img src="photos/wedding-23.jpg" width="308" height="500" alt="">
				<li><img src="photos/wedding-24.jpg" width="326" height="500" alt="">
				<li><img src="photos/wedding-25.jpg" width="332" height="500" alt="">
				<li><img src="photos/wedding-26.jpg" width="752" height="500" alt="">
				<li><img src="photos/wedding-27.jpg" width="335" height="500" alt="">
				<li><img src="photos/wedding-28.jpg" width="332" height="500" alt="">
				<li><img src="photos/wedding-29.jpg" width="321" height="500" alt="">
				<li><img src="photos/wedding-30.jpg" width="794" height="500" alt="">
			</ul>
		</div>
		<a id="next"><span>Next</span></a>
	</div>
</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="common/jquery.tools.min.js"></script>
<script type="text/javascript">
$(function(){
	$('body').addClass('js-active');
	
	var scrollable = $('#scroll-photos').scrollable({
		size:1,
		loop:true,
		api:true,
		clickable:false,
		onSeek:function(){ 
			$('#scroll-photos li').removeClass('active');
        	$('#scroll-photos li').eq( this.getPageIndex() ).addClass('active');
		}
	});
	$('#scroll-photos img').click(function(){ scrollable.next(); });
	$('#prev').click(function(){
		if( scrollable.getIndex() == 0 ){
			scrollable.end();
		}else{
			scrollable.prev();
		}
	});
	$('#next').click(function(){ scrollable.next(); });
});
</script>
<script type="text/javascript">
var _gaq = _gaq || []; _gaq.push(['_setAccount', 'UA-3659916-4']); _gaq.push(['_trackPageview']);
(function(){
var ga = document.createElement('script');
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
ga.setAttribute('async', 'true');
document.documentElement.firstChild.appendChild(ga);
})();
</script>
</body>
</html>
