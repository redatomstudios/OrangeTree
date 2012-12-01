		<h1>Add/Edit Page</h1> <!-- Replace this with each page title! -->
		<p>Edit the contents for this page here:</p>

		<?php
			if(isset($pageDetails)) {
				$title = $pageDetails['Title'];
				$template = $pageDetails['Template'];
				$pageContent = $pageDetails['PageContent'];
				$sliderImages = $pageDetails['SliderImages'];
				$mediaContent = $pageDetails['MediaContent'];
			} else {

				$title = '';
				$template = '';
				$pageContent = '';
				$mediaContent = '';
			}
			

		?>
		<?= form_open('dashboard/editPage/'.$pageId) ?>
			<input type="hidden" name="pageId" value="<?=$pageId?>">
			<label for="pageTitle">Page Title:</label> <?= form_input(array('id' => 'pageTitle','name' => 'pageTitle', 'value' => $title)) ?> <div class="hinting">This is the title of the pages that appears in the sidebar and the browser.</div> <br />
			<?= form_submit(array('name' => 'deletePage', 'id' => 'delPage'), 'Delete Page') ?>
			<label for="pageTemplate">Page Template:</label> <?= form_dropdown('pageTemplate', array('Default Template'), 'Default Template', 'id = "pageTemplate" name = "pageTemplate"') ?> <div class="hinting">Select a template to arrange according to. This will always be Default Template.</div> <br />
			<label for="pageContent">Page Content:</label> <?= form_textarea(array('id' => 'pageContent','name' => 'pageContent', 'name' => 'pageContent', 'value' => $pageContent)) ?><div class="hinting">Enter the page text here</div>
			<label for="mediaContent">Media Content:</label> <?= form_dropdown('mediaContent', array('None', 'Room Prices'), 'Room Prices', 'id = "mediaContent" name = "mediaContent"') ?><div class="hinting">Special content such as tables etc.</div>
			<?= form_submit('submit','Save') ?>
		<?= form_close() ?>
		<?= form_open_multipart('dashboard/uploadSliderImage') ?>
			<input type="hidden" name="pageId" value="<?=$pageId?>">
			<label for="sliderImage">Slider Images:</label> <span><?= form_upload('sliderImage')?></span> <div class="clearfix"></div> 
			<div class="hinting">
				Upload the slider images here. Click the button below each thumbnail to delete that slide. <br /> 
				If no images are uploaded, the slider will not be displayed on the page. <br /> 
				If only a single image is uploaded, then a static image will be displayed.<br />
				<span class="caution">
					CAUTION: ONLY UPLOAD JPEG/JPG IMAGES OF DIMENSIONS 978x400px.
				</span>
			</div>
			<input type="submit" value="Submit" />
		<?= form_close() ?>
		<?= form_open_multipart('dashboard/deleteSliderImage') ?>
			<input type="hidden" name="pageId" value="<?=$pageId?>">
			<div id='sliderPreview'>
				<ul>
					<?php  foreach($sliderImages as $image) {
						if($image != ''){
					  ?>
					<li><img src="<?= base_url() ?>resources/images/slider/<?= $image ?>" /></li>
					<?php }  }  ?>
					<!-- The following LIs are just for testing! Remove these and use the ones above. -->
					<!-- <li><img src="<?= base_url() ?>resources/images/slider/interior.jpg" /></li>
					<li><img src="<?= base_url() ?>resources/images/slider/exterior.jpg" /></li>
					<li><img src="<?= base_url() ?>resources/images/slider/conference.jpg" /></li> -->
					
				</ul>
			</div>
			<div id="sliderThumbs">
				<ul>
					<?php  foreach($sliderImages as $image) {
						if($image != ''){
					  ?>
					<li><img src="<?= base_url() ?>resources/images/slider/<?= $image ?>" /></li>
					<?php }  }  ?>
					
					<!-- The following LIs are just for testing! Remove these and use the ones above. -->
					<!-- <li><img src="<?= base_url() ?>resources/images/slider/interior.jpg" /><input type="button" value="remove" /></li>
					<li><img src="<?= base_url() ?>resources/images/slider/exterior.jpg" /><input type="button" value="remove" /></li>
					<li><img src="<?= base_url() ?>resources/images/slider/conference.jpg" /><input type="button" value="remove" /></li> -->
					
				</ul>
			</div>
			<br class="clearFix" />
			<?= form_submit(array('name' => 'submit', 'style' => 'margin-top: 20px;'),'Save Slider') ?>
		<?= form_close() ?>

		<div id='patterBottom'></div>