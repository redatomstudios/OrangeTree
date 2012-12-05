<!DOCTYPE html>
<html>
<head>
	<style>
		body {
			padding: 0;
			margin: 0;
			background: #150500;
		}

		body > div {
			width: 300px;
			height: 200px;
			text-align: center;
			margin: auto;
			margin-top: 150px;
		}

		input[type='text'], input[type='password'] {
			height: 44px; 
			width: 90%;
			line-height: 44px;
			font-size: 16px;
			background: #FFF;
			border: solid thin #FFF;
			border-radius: 5px;
			box-shadow: inset 1px 2px 5px rgba(0, 0, 0, 0.7);
			margin-top: 10px;
			padding: 0 5%;
		}

		input[type='submit'] {
			height: 44px;
			width: 50%;
			line-height: 44px;
			border: 0;
			border: solid thin white;
			border-radius: 5px;
			margin-top: 20px;
		}
	</style>
	<script src="<?= base_url() ?>resources/js/jquery-1.8.2.min.js"></script>
	<script>
		jQuery(document).ready(function($){
		$.each($('input[type="text"], input[type="password"]'), function(){
				if(this.attributes['data-hint']) {
					this.value = this.attributes['data-hint'].value;
					this.style.color = "rgba(0, 0, 0, 0.3)";
				}
			});

			$('input[type="text"], input[type="password"]').focus(function(){
				if(this.attributes['data-hint']) {
					if(this.value == this.attributes['data-hint'].value) {
						this.value = "";
						this.style.color = "#000";
					}
				}
			}).blur(function(){
				if(this.value == '') {
					if(this.attributes['data-hint']) {
						this.value = this.attributes['data-hint'].value;
						this.style.color = "rgba(0, 0, 0, 0.3)";
					}
				}
			});
		});
	</script>
</head>
<body>
<div>
	<img src="<?= base_url() ?>resources/branding/Logo.png" style="width: 100%;" />
<?php
echo form_open('/dashboard/login');
echo form_input(array('name' => 'username', 'id' => 'username', 'data-hint' => 'Username'));
echo form_input(array('name' => 'password', 'id' => 'password', 'type' => 'password', 'data-hint' => '********'));
echo form_submit('Submit','Submit');
form_close();
 ?>
</div>
</body>
</html>