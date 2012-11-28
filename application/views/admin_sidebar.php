<html>
<head>
<title>Dashboard</title>
<link rel="stylesheet" href="<?= base_url() ?>/resources/css/admin.css" />
<script src="<?= base_url() ?>/resources/js/jquery-1.8.2.min.js" ></script>
<script src="<?= base_url() ?>/resources/js/h2o.admin.js/"></script>
</head>
<body>
	<div id="sidebar">
		<img src="<?= base_url() ?>/resources/branding/Logo.png" style="width: 100%;" />
		<span id="name"><?= isset($uname) ? 'Welcome, ' . $uname : '' ?></span>
		<nav>
			<ul>
				<li<?= $currentPage == 'general' ? ' class="current"' : '' ?>><?php echo anchor('/dashboard/generalSettings', 'General Settings'); ?></li>
				<li><?php echo anchor('', 'Add New Page'); ?></li>
				<li><?php echo anchor('/dashboard/editRooms', 'Edit Room Pricing'); ?></li>
				<li class="spacer"></li>
				<?php foreach($pageNames as $pageName) { ?>
				<li><a href="dashboard/viewPage/<?php echo $pageName['Id']; ?>"><?php echo $pageName['Title']; ?></a></li>
				<?php  }  ?>

				<li class="spacer"></li>
				<li><?php echo anchor('/dashboard/logout', 'Logout'); ?></li>
			</ul>
		</nav>
	</div>
	<div id="dashContents">