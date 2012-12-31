<html>
<head>
	<title>::Processing Payment::</title>
	<script src="<?= base_url() ?>resources/js/jquery-1.8.2.min.js"></script>
	<script>
		jQuery(document).ready(function($) {
			document.paypal_form.submit();
			$('body').empty();
		});
	</script>
</head>
<body onload="">
<form method="post" name="paypal_form" action="<?=$url ?>" target="_top">
	<input type="hidden" name="business" value="<?=$business ?>">
	<input type="hidden" name="cmd" value="<?=$cmd ?>">
	
	<input type="hidden" name="return" value="<?php echo $success_url; ?>">
	<input type="hidden" name="cancel_return" value="<?php echo $cancel_url; ?>">
	<input type="hidden" name="notify_url" value="<?php echo $notify_url; ?>">
	<input type="hidden" name="rm" value="<?=$return_method ?>">
	<input type="hidden" name="currency_code" value="<?=$currency_code ?>">
	<input type="hidden" name="lc" value="<?=$lc ?>">
	<input type="hidden" name="bn" value="<?=$bn ?>">
	<input type="hidden" name="cbt" value="<?=$continue_button_text ?>">
	<input type="hidden" name="cpp_header_image" value= <?= base_url() ?>"/resources/branding/Logo.png">


	


	<input type="hidden" name="item_name" value="<?=$item_name ?>">
	<input type="hidden" name="amount" value="<?=$amount ?>">

	<input type="hidden" name="item_number" value="<?=$item_number ?>">

	<input type="hidden" name="on0" value="<?=$on0 ?>">
	<input type="hidden" name="os0" value="<?=$os0 ?>">

	<center><font face="Verdana, Arial, Helvetica, sans-serif" size="3" color="333333">Processing Your Transaction & Redirecting To Paypal . . . </font></center>
	<noscript><input type="submit" value="Click Here To Continue With Your Purchase"></noscript>
</form>
</body>
</html>