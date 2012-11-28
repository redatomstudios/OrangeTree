<div>
<table border="1">
	<thead>
		<td>Name</td>
		<td>Title</td>
		<td>Template</td>
		<td>Slider Image</td>
		<td>Page Content</td>
		<td>Media Content</td>
	</thead>


	<?php 
	foreach ($pages as $page) {
?>
	<tr>
		<td><?php echo $page['Name']   ?></td>
		<td><?php echo $page['Title']   ?></td>
		<td><?php echo $page['Template']   ?></td>
		<td><?php echo $page['SliderImages']   ?></td>
		<td><?php echo $page['PageContent']   ?></td>
		<td><?php echo $page['MediaContent']   ?></td>
	</tr>



<?php	} ?>
</table>



</div>