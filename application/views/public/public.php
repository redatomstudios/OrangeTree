<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="<?= base_url() ?>resources/css/main.css" type="text/css" media="screen">
	<script src="<?= base_url() ?>resources/js/jquery-1.8.2.min.js"></script>
	<script src="<?= base_url() ?>resources/js/h2o.js"></script>

	<title><?= $Title . ' :: ' . ($HotelName ? $HotelName : '')?></title>
</head>
<body>
<div class="logoWrapper">
	<img id="logo" src="<?= ($Logo ? $Logo : '') ?>">
</div>
<div class="wrapper">
	<div id="slider">
		<img class="slideControl" id="slideControlLeft" src="<?= base_url() ?>resources/images/slider/sliderLeft.png" alt="Previous" />
		<img class="slideControl" id="slideControlRight" src="<?= base_url() ?>resources/images/slider/sliderRight.png" alt="Next" />
		<ul>
		<?php  foreach($SliderImages as $image) {
			if($image != ''){
		  ?>
			<li style="background: url('<?= base_url() ?>resources/images/slider/<?= $image ?>') center center no-repeat; background-size: 978px 400px;"></li>
		<?php }  }  ?>		
		</ul>
	</div>
	<div id="contentWrapper">
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
		<div style="display: none;">
			<p><?php echo anchor('dashboard','Admin Dashboard') ?></p>
		</div>

		<div id="contentContainer">
			<div id="textContainer">
				<?= $PageContent ?>
			</div>
		</div>

		<div id="address">
		  <strong><?= $HotelName ? $HotelName : '' ?></strong><br />
		    <?= $HotelAddress ? $HotelAddress : '' ?><br />
		</div>

		<div id="signature">
		  Site designed by <a href="http://redatomstudios.com/" target="_blank"><strong>redAtom Studios</strong></a><br />
		  Built &amp; maintained by <a href="http://redatomstudios.com/" target="_blank"><strong>redAtom Studios</strong></a>
		</div>
		<div class="clear"></div>
	</div>
</div>
<div id="patterBottom">
	<div id="footer">
	</div>
	<div class="clear"></div>
</div>
</body>
</html>