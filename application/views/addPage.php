		<h1>Add/Edit Page</h1> <!-- Replace this with each page title! -->
		<p>Edit the contents for this page here:</p>
		<?= form_open_multipart() ?>
			<label for="pageTitle">Page Title:</label> <?= form_input(array('id' => 'pageTitle')) ?> <div class="hinting">This is the title of the pages that appears in the sidebar and the browser.</div> <br />
			<label for="pageTemplate">Page Template:</label> <?= form_input(array('id' => 'pageTemplate')) ?> <div class="hinting">This is the address of the hotel that will appear in the footer.</div> <br />
			<div id='sliderPreview'>
				<img class="slideControl" id="slideControlLeft" src="resources/images/slider/sliderLeft.png" alt="Previous" />
				<img class="slideControl" id="slideControlRight" src="resources/images/slider/sliderRight.png" alt="Next" />
				<ul>
					<?php /* foreach($sliderimage as $image) { */ ?>
					<li style="background: url('<?php /* image url */ ?>) center center no-repeat; background-size: 978px 400px;"></li>
					<?php /* } */ ?>
				</ul>
			</div>
			<div id="sliderThumbs">
				<ul>
					<?php /* foreach($sliderimage as $image) { */ ?>
					<li style="background: url('<?php /* image url */ ?>) center center no-repeat; background-size: 122px 50px;"></li>
					<?php /* } */ ?>
				</ul>
			</div>
			<label for="sliderImage">Slider Images:</label> <span class="imageUpload"><input id="sliderImage" type="file" /></span> <div class="hinting">Upload the slider images here. Click the button below each thumbnail to delete that slide. If no image are uploaded, the slider will not be displayed on the page.</div>
			<label for="pageContent">Page Content:</label> <?= form_textarea(array('id' => 'pageContent')) ?><div class="hinting">Enter the page text here</div>
			<label for="mediaContent">Media Content:</label> <?= form_input(array('id' => 'mediaContent')) ?><div class="hinting">Special content such as tables etc.</div>
		<?= form_close() ?>