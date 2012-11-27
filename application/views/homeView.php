<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="resources/css/main.css" type="text/css" media="screen">
	<script src="resources/js/jquery-1.8.2.min.js"></script>
	<script src="resources/js/h2o.js"></script>

	<title>The Orange Tree Hotel</title>
</head>
<body>
<div class="logoWrapper">
	<img id="logo" src="resources/branding/Logo.png">
</div>
<div class="wrapper">
	<div id="slider">
		<img class="slideControl" id="slideControlLeft" src="resources/images/slider/sliderLeft.png" alt="Previous" />
		<img class="slideControl" id="slideControlRight" src="resources/images/slider/sliderRight.png" alt="Next" />
		<ul>
			<li style="background: url('resources/images/slider/exterior.jpg') center center no-repeat; background-size: 978px 400px;">
			</li>
			<li style="background: url('resources/images/slider/interior.jpg') center center no-repeat; background-size: 978px 400px;">
			</li>
			<li style="background: url('resources/images/slider/conference.jpg') center center no-repeat; background-size: 978px 400px;">
			</li>
		</ul>
	</div>
	<div id="contentWrapper">
	<div id="borderWrapper">
	<div id="innerWrapper">
		<div class="clear"></div>

		<div id="sidebar">
			<nav>
				<ul>
				<li class="selected"><a href="">Home</a></li>
				<li><a href="">About us</a></li>
				<li><a href="">Our Rooms and Rates</a></li>
				<li><a href="">Conservatory Restaurant</a></li>
				<li><a href="">La Brasserie</a></li>
				<li><a href="">The Gigot Bar</a></li>
				<li><a href="">How to find us</a></li>
				</ul>
			</nav>
		</div>
		<div>
			<p><?php echo anchor('dashboard','Admin Dashboard') ?></p>
		</div>

		<div id="contentContainer">
			<div id="textContainer">
				<p>The Orange Tree Hotel is set in the historic market town of Stow-on-the-Wold, amid the warm honey coloured Cotswold stone buildings and rolling countryside, this 17th Century hotel has become justly renowned for its warm hospitality and delicious food.&nbsp; It is in the heart of the Cotswolds making it the ideal location from which to explore the beautiful Cotswold countryside.</p>
				<p>Named after the ancient vine that shades the hotel's Conservatory restaurant (the second oldest indoor Orange Tree in the land, over 110 years old), The Orange Tree Hotel also has 22 individually furnished bedrooms.</p>
				<p>Alternatively you can enjoy a selection of tapas or a homemade pizza and a glass of chilled Pinot Grigio in the Orange Tree Bar.</p>
				<p>For Christmas and New Year join us for festivities under the lovely Orange Tree.</p>
				<p><strong> </strong></p>
				<p><strong>We look forward to welcoming you</strong> <strong> </strong><a title="Conservatory Restaurant" href=""><img src="./index_files/banner_conservatory.gif" border="0" alt="The Conservatory Restaurant" width="640" height="135"></a> <a title="La Vigna Brasserie" href=""></a> <a title="The Gigot Bar" href=""></a></p>
			</div>
		</div>

		<div id="address">
		  <strong>The Orange Tree Hotel</strong><br />
		    Sheep Street, Stow-on-the-Wold, Gloucestershire GL54 1AU <br />
		</div>

		<div id="signature">
		  Site designed by <a href="http://redatomstudios.com/" target="_blank"><strong>redAtom Studios</strong></a><br />
		  Built &amp; maintained by <a href="http://redatomstudios.com/" target="_blank"><strong>redAtom Studios</strong></a>
		</div>
		<div class="clear"></div>
	</div>
<div id="patterBottom">
	<div id="footer">
	</div>
	<div class="clear"></div>
</div>
</div>
</body>
</html>