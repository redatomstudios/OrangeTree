<style>
	div.clearFix {
		clear: both;
	}
	div.tabWrapper {
		padding: 10px;
		width: 90%;
	}

	div.tabWrapper ul {
		list-style-type: none;
	}

	div.tabWrapper li {
		float: left;
		height: 2em;
		line-height: 2em;
		width: 150px;
		text-align: center;
		border: solid thin black;
		cursor: pointer;
		opacity: 0.9;
	}

	div.trabWrapper li:hover, div.trabWrapper li.selected {
		background: 1;
	}

	div.tabWrapper table {
		width: 100%;
	}

	div.tabWrapper th {
		padding: 10px 0;
		font-weight: bold;
		font-size: 1em;
	}

	div.tabWrapper th.tableHeader {
		padding: 30px 0 20px 0;
		font-weight: bold;
		font-size: 1.2em;
	}

	div.tabWrapper td {
		text-align: center;
	}

	div.tabWrapper td div.date {
		text-align: left;
		padding: 5px;
		padding-bottom: 0;
	}

	div.tabWrapper td span.price {
		font-size: 1.5em;
	}

	div.tabWrapper li > h3 {
		margin: 0;
		padding: 0;
	}

	div.tabWrapper input[type="text"] {
		width: 90%;
		text-align: center;
		margin: 0 5px;
	}

	div.tabWrapper input[type="submit"]  {
		margin-top: 20px;
	}
</style>

<script>
	jQuery(document).ready(function($){
		// $('div.tabWrapper table').on('mouseover', 'td', function(){
		// 	$($(this).children('.bookButton')[0]).show().animate({opacity: 1});
		// }).on('mouseout', 'td', function(){
		// 	$($(this).children('.bookButton')[0]).animate({opacity: 0}, function(){$(this).hide();});
		// });
	});
</script>

<h1>Room Pricing</h1>
<div class="tabWrapper">
<?= form_open('dashboard/editRooms') ?>
	<?php
		$today = date('d');
		$days = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
		$roomTypes = array('Twin Room', 'Double Room', 'King Double');
		$roomType = 0;
	?>
	<?php  foreach($RoomPrices as $roomId => $room) {  ?>
	<table>
		<tr><th colspan="7" class="tableHeader"><?= $roomTypes[$roomType++] ?></th></tr>
		<tr>
			<?php for($nameOfDay = 0; $nameOfDay < 7; $nameOfDay++) { ?>
			<th><?= $days[(date('N') - 1 + $nameOfDay) % 7] ?></th>
			<?php } ?>
		</tr>
		<?php  for($week = 0; $week < 1; $week++) {  ?>
		<tr>
			<?php for($day = 0; $day < 7; $day++) { ?>
			<td>
				<!-- <div class="date"><?= $today++ ?></div> -->
				<input type="text" name="<?= $roomId.'_'.(date('N') - 1 + $day) % 7  ?>" class="price" value="<?= $room[(date('N') - 1 + $day) % 7] ?>"/>
			</td>
			<?php } ?>
		</tr>
		<?php  }  ?>
	</table>
	<?php  }  ?>
	<input type="submit" />
</form>
</div>