<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="<?= base_url() ?>resources/css/main.css" type="text/css" media="screen">
	<script src="<?= base_url() ?>resources/js/jquery-1.8.2.min.js"></script>
	<script>
		var siteBase = '<?= base_url() ?>';
	</script>
	<script src="<?= base_url() ?>resources/js/h2o.js"></script>

	<title><?= $Title . ' :: ' . ($HotelName ? $HotelName : '')?></title>
</head>
<body>
<div class="logoWrapper">
	<img id="logo" src="/resources/branding/Logo.png">
</div>
<div class="wrapper">
	<div id="slider">
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
					<?php foreach($pageNames as $pageName) { ?> 
					<li<?= $pageId == $pageName['Id'] ? ' class="current"' : '' ?>><a href="<?= base_url() ?>home/index/<?php echo $pageName['Id']; ?>"><?= $pageName['Title'] ?></a></li>
					<?php  }  ?>
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