<html>
	<head>
		<title><?=$Title ?></title>
	</head>
	<body>
		<p>
			<?=$PageContent?>
		</p>

		<p>
			<ul>
					<?php  foreach($SliderImages as $image) {
						if($image != ''){
					  ?>
					<li><img src="<?= base_url() ?>resources/images/slider/<?= $image ?>" /></li>
					<?php }  }  ?>					
			</ul>
		</p>

	</body>
</html>