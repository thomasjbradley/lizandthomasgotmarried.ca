<?php
session_start();

$arStyles = array(
	'html { background: #8f87be url("images/bg-purple.gif") repeat left top; } button, input[type="text"] { background-color: #8f87be; } form label.help { color: #8f87be; }',
	'html { background: #98cdcd url("images/bg-aqua.gif") repeat left top; } button, input[type="text"] { background-color: #98cdcd; } form label.help { color: #98cdcd; }',
	'html { background: #acd2a1 url("images/bg-green.gif") repeat left top; } button, input[type="text"] { background-color: #acd2a1; } form label.help { color: #acd2a1; }'
	);
	
if( !isset( $_SESSION['styles'] ) )
	$_SESSION['styles'] = array_rand( $arStyles );
	

$boNameValid = null;
$boKeyValid = null;
$boAttendingValid = null;
$boGuestsValid = null;


if( !empty( $_POST ) ){
	
	$boNameValid = false;
	$boKeyValid = false;
	$boAttendingValid = false;
	
	if( isset( $_POST['name'] ) && !empty( $_POST['name'] ) ){
		$boNameValid = true;
	}
	
	if( isset( $_POST['key'] ) && !empty( $_POST['key'] ) && is_numeric( $_POST['key'] ) && $_POST['key'] >= 25 && $_POST['key'] <= 46 ){
		$boKeyValid = true;
	}
	
	if( isset( $_POST['attending'] ) && !empty( $_POST['attending'] ) && in_array( $_POST['attending'], array( 'yes', 'no' ) ) ){
		
		$boAttendingValid = true;
		
		if( $_POST['attending'] == 'yes' ){
		
			if( isset( $_POST['guests'] ) && !empty( $_POST['guests'] ) && is_numeric( $_POST['guests'] ) && $_POST['guests'] > 0 && $_POST['guests'] < 10 ){
				$boGuestsValid = true;
			}else{
				$boGuestsValid = false;
			}
		
		}else{
			$boGuestsValid = true;
		}
		
	}
	
	if( $boKeyValid && $boAttendingValid && $boGuestsValid ){
		
		$stSubject = 'RSVP '.$_POST['key'].': ';
		
		if( $_POST['attending'] == 'yes' ){
			$stSubject .= $_POST['guests'].' guests';
		}else{
			$stSubject .= 'not attending';
		}
		
		mail( 'lizkerrison@gmail.com', $stSubject.' (eom)', $_POST['name'], 'From: thomasjbradley@gmail.com' );
	}
	
}

?><!DOCTYPE html>
<html lang="en-ca">
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Language" content="en-ca">
<title>Liz &amp; Thomas Are Getting Married—Ottawa, Canada</title>
<meta name="keywords" content="liz,kerrison,thomas,bradley,marriage,engaged,ottawa,canada">
<meta name="description" content="Liz Kerrison &amp; Thomas J Bradley are getting married. Stay tuned for more details.">
<meta name="ICBM" content="45.3333333,-75.5841666">
<meta name="geo.position" content="45.3333333,-75.5841666">
<meta name="geo.placename" content="Ottawa,Ontario,Canada">
<meta name="geo.region" content="ca-on">
<link rel="stylesheet" href="common/general.css" type="text/css" media="screen,print" charset="utf-8">
<!--[if IE]><link rel="stylesheet" href="common/ie.css" type="text/css" media="screen,print" charset="utf-8"><![endif]-->
<!--[if IE 6]><link rel="stylesheet" href="common/ie-6.css" type="text/css" media="screen,print" charset="utf-8"><![endif]-->
<style type="text/css">
	<?php echo $arStyles[ $_SESSION['styles'] ]; ?>
</style>
<!--[if lt IE 7]><script type="text/javascript" src="common/unitpngfix.js"></script><![endif]-->
<link rel="icon" href="favicon.png" type="image/png">
</head>
<body<?php if( $boKeyValid === false || $boAttendingValid === false || $boGuestsValid === false ){ echo ' id="error"'; } ?>>

<div id="content">

	<h1><img src="images/logo.png" width="470" height="290" alt="Liz &amp; Thomas Are Getting Married"></h1>
	<img src="images/date.png" id="date" width="470" height="55" alt="August 2nd, 2009 at 2:30">
	<p>at our home, 6 Medhurst Dr, Ottawa</p>
	<p class="details">Snacks and a light dinner to follow<br>Relaxed, semi-formal dress</p>
	
</div>

<div id="graphics">
	<a href="http://lizkerrison.ca" id="liz" rel="external"><img src="images/liz.png" width="285" height="300" alt="Liz Kerrison"></a>
	<a href="http://thomasjbradley.ca" id="thomas" rel="external"><img src="images/thomas.png" width="225" height="300" alt="Thomas J Bradley"></a>
</div>

<?php if( $boKeyValid === true && $boAttendingValid === true && ( $boGuestsValid === true || $boGuestsValid === null ) ): ?>
<div class="rsvp-wrapper">
	<div class="rsvp-box"><p>Thanks for sending in your RSVP!</p></div>
</div>
<?php else: ?>
<form method="post" action="index.php">
	<fieldset class="rsvp-box">
		<legend>RSVP Online</legend>
		<div class="col" id="name-wrapper">
			<label for="name">Name</label>
			<input type="text" name="name" id="name" size="12" value="<?php if( isset( $_POST['name'] ) ){ echo $_POST['name']; }?>">
			<?php if( $boNameValid === false ): ?>
			<label for="key" class="error">Enter your name</label>
			<?php endif; ?>
		</div>
		<div class="col" id="key-wrapper">
			<label for="key">Key</label>
			<input type="text" name="key" id="key" size="3" maxlength="2" value="<?php if( isset( $_POST['key'] ) ){ echo $_POST['key']; }?>">
			<label for="key" id="key-help" class="help hide">Two-digit number written on the back of your invitation</label>
			<?php if( $boKeyValid === false ): ?>
			<label for="key" class="error down">Enter a valid RSVP key</label>
			<?php endif; ?>
		</div>
		<div class="radio" id="attending-wrapper">
			<input type="radio" name="attending" id="attending" value="yes"<?php if( isset( $_POST['attending'] ) && $_POST['attending'] == 'yes' ){ echo ' checked'; }?>>
			<label for="attending">Attending</label><br>
			<input type="radio" name="attending" id="not-attending" value="no"<?php if( isset( $_POST['attending'] ) && $_POST['attending'] == 'no' ){ echo ' checked'; }?>>
			<label for="not-attending">Not Attending</label>
			<?php if( $boAttendingValid === false ): ?>
			<label for="key" class="error attending">Are you attending?</label>
			<?php endif; ?>
		</div>
		<div class="col" id="guests-wrapper">
			<label for="guests">Guests</label>
			<input type="text" name="guests" id="guests" size="2" maxlength="1" value="<?php if( isset( $_POST['guests'] ) ){ echo $_POST['guests']; }?>">
			<label for="guests" id="guests-help" class="help hide">Total number of guests attending from your party, including you</label>
			<?php if( $boGuestsValid === false ): ?>
			<label for="key" class="error down">Enter total guests</label>
			<?php endif; ?>
		</div>
		<div id="buttons"><button type="submit">RSVP</button><!--[if IE 6]><input type="submit" value="RSVP"><![endif]--></div>
	</fieldset>
</form>
<!--[if IE 6]>
<div class="ie-errors">
<?php if( $boNameValid === false ): ?>
<label for="key" class="error">Enter your name</label>
<?php endif; ?>
<?php if( $boKeyValid === false ): ?>
<p class="error down">Enter a valid RSVP key</p>
<?php endif; ?>
<?php if( $boAttendingValid === false ): ?>
<p class="error">Are you attending?</p>
<?php endif; ?>
<?php if( $boGuestsValid === false ): ?>
<p class="error">Enter total guests</p>
<?php endif; ?>
</div>
<![endif]-->
<?php endif; ?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" charset="utf-8"></script>
<script type="text/javascript" src="common/functions.js" charset="utf-8"></script>

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-3659916-4");
pageTracker._trackPageview();
} catch(err) {}</script>

</body>
</html>
