		<h1>General Settings</h1> <!-- Replace this with each page title! -->
		<p>Modify general website settings here</p>
		<?= form_open('dashboard/updateGeneralSettings') ?>
			<label for="hotelName">Hotel Name:</label> <?= form_input(array('id' => 'hotelName','name' => 'hotelName', 'value' => $generalSettings['HotelName'])) ?> <div class="hinting">This is the name of the hotel that appears throughout the site.</div> <br />
			<label for="hotelAddress">Hotel Address:</label> <?= form_input(array('id' => 'hotelAddress','name' => 'hotelAddress', 'value' => $generalSettings['HotelAddress'])) ?> <div class="hinting">This is the address of the hotel that will appear in the footer.</div> <br />
			<input type="submit" />
		<?= form_close() ?>
		<?= form_open_multipart('server/logoHandler.php') ?>
			<label for="hotelLogo">Hotel Logo:</label> <span id="file-uploader"> </span> <div class="clearFix"></div>
			<div class="hinting">This is the hotel logo which will appear throughout the site.<br /> Only PNG files are allowed.<br /> <span class="caution">CAUTION: UPLOADING A FILE WILL REPLACE THE CURRENT LOGO. <br /> IF YOU'RE UNSURE, PLEASE MAKE A BACKUP OF THE CURRENT LOGO BEFORE UPLOADING.</span></div>
		<?= form_close() ?>	
		<div id="logoPreview"></div>
		<div id='patterBottom'></div>
		<script>
			jQuery(document).ready(function(){$('.qq-upload-list').hide();});
		</script>