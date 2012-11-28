		<h1>Add/Edit Page</h1> <!-- Replace this with each page title! -->
		<p>Edit the contents for this page here:</p>

		<?php
			if(isset($pageDetails)){
				$title = $pageDetails->Title;
				$template = $pageDetails->Template;
				$pageContent = $pageDetails->PageContent;
				$mediaContent = $pageDetails->MediaContent;
			}
			else{

				$title = '';
				$template = '';
				$pageContent = '';
				$mediaContent = '';
			}
			

		?>
		<?= form_open_multipart('dashboard/addPage') ?>
			<label for="pageTitle">Page Title:</label> <?= form_input(array('id' => 'pageTitle', 'value' => $title)) ?> <div class="hinting">This is the title of the pages that appears in the sidebar and the browser.</div> <br />
			<label for="pageTemplate">Page Template:</label> <?= form_dropdown('pageTemplate', array('Default Template'), 'Default Template', 'id = "pageTemplate" name = "pageTemplate"') ?> <div class="hinting">Select a template to arrange according to. This will always be Default Template.</div> <br />
			<div id='sliderPreview'>
				<img class="slideControl" id="slideControlLeft" src="<?= base_url() ?>/resources/images/slider/sliderLeft.png" alt="Previous" />
				<img class="slideControl" id="slideControlRight" src="<?= base_url() ?>/resources/images/slider/sliderRight.png" alt="Next" />
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
			<label for="sliderImage">Slider Images:</label> <span class="imageUpload"><?= form_upload(array('id' => 'sliderImage','name' => 'sliderImage', 'size' => 50)) ?></span> <div class="hinting">Upload the slider images here. Click the button below each thumbnail to delete that slide. <br /> If no images are uploaded, the slider will not be displayed on the page. <br /> If only a single image is uploaded, then a static image will be displayed.</div>
			<label for="pageContent">Page Content:</label> <?= form_textarea(array('id' => 'pageContent', 'name' => 'pageContent', 'value' => $pageContent)) ?><div class="hinting">Enter the page text here</div>
			<label for="mediaContent">Media Content:</label> <?= form_dropdown('mediaContent', array('None', 'Room Prices'), 'Room Prices', 'id = "mediaContent" name = "mediaContent"') ?><div class="hinting">Special content such as tables etc.</div>

			<?= form_submit('submit','Submit Me') ?>
		<?= form_close() ?>
		<div id='patterBottom'></div>