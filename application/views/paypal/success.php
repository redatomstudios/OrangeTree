<!DOCTYPE html>
<html>
<head>
	<title>Payment Completed</title>
	<META HTTP-EQUIV="refresh" CONTENT="10;URL=<?= base_url() ?>">
	<style>
		body {
			padding: 0;
			margin: 0;
			background: #150500;
			font-family: Arial, Verdana, sans-serif;
			font-size: 14px;
		}

		body > div {
			width: 300px;
			height: 200px;
			text-align: center;
			margin: auto;
			margin-top: 150px;
			color: #FFF;
		}
	</style>
</head>
<body>
<div>
	<?php
		if($verified) {
			$message = 'A confirmation email has been sent to '. $_POST['payer_email'] .', please save the email for your records.';
		} else {
			$message = 'Your payment could not be confirmed, please contact sales@theorangetreehotel.com. Your Booking ID is '. $_POST['item_number'] .'.';
		}
	?>
	<img src="<?= base_url() ?>resources/branding/Logo.png" style="width: 100%;" />
	<p><?= $message ?></p>
	<p>If your browser doesn't redirect in 10 seconds, please click <a href="<?= base_url() ?>">here</a>.</p>
</div>
</body>
</html>