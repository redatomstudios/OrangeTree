		<h1>Add/Edit Page</h1> <!-- Replace this with each page title! -->
		<p>Edit the contents for this page here:</p>
		<?= form_open_multipart() ?>
			<label for="hotelName">Page Title:</label> <?= form_input(array('id' => 'hotelName')) ?> <div class="hinting">This is the title of the pages that appears in the sidebar and the browser.</div> <br />
			<label for="hotelAddress">Page Template:</label> <?= form_input(array('id' => 'hotelAddress')) ?> <div class="hinting">This is the address of the hotel that will appear in the footer.</div> <br />
			<label for="hotelLogo">Slider Images:</label> <span class="imageUpload"><input type="file" /></span> <div class="hinting">Upload the slider images here. Click the button below each thumbnail to delete that slide. If no image are uploaded, the slider will not be displayed on the page.</div>
			<label for="pageContent">Page Content:</label> <?= form_textarea() ?><div class="hinting">Enter the page text here</div>
		<?= form_close() ?>
		<div id="logoPreview"></div>