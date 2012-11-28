<html>
<head>
<title> Dashboard </title>
</head>
<body>
This is the dashboard
<br>
Welcome <?php  echo $uname; ?>

<div align="right">
	<?php echo anchor('/dashboard/logout', 'Logout'); ?>
</div>
<br>
<div>
	<?php echo anchor('/dashboard/editPages', 'Edit Pages'); ?>
<br>
	<?php echo anchor('/dashboard/editRooms', 'Edit Rooms'); ?>
<br>
	<?php echo anchor('/dashboard/generalSettings', 'Change general settings'); ?>


</div>
</body>
</html>