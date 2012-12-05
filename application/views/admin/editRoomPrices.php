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
	}

	div.tabWrapper td {
		text-align: center;
		width: 80px;
		border: solid thin black;
	}

	div.tabWrapper td div.date {
		text-align: left;
		padding: 5px;
		padding-bottom: 0;
	}

	div.tabWrapper td span.price {
		font-size: 1.5em;
	}

	div.tabWrapper td div.bookButton {
		height: 20px;
		width: 100%;
		border: solid thin black;
	}

	div.tabWrapper li > h3 {
		margin: 0;
		padding: 0;
	}

	div.tabWrapper input[type="text"] {
		width: 100px;
		text-align: center;
		margin: 0 5px;
	}
</style>

<script>
	jQuery(document).ready(function($){
		$('div.tabWrap table').on('mouseover', 'td', function(){
			$($(this).children('.bookButton')[0]).show().animate({opacity: 1});
			console.log('oopserwew');
		}).on('mouseout', 'td', function(){
			$($(this).children('.bookButton')[0]).animate({opacity: 0}, function(){$(this).hide();});
		});
	});
</script>

<div class="tabWrapper">
<?= form_open('dashboard/editRooms') ?>
	<h2 class="heading">Select room type:</h2>
	<ul class="tabs">
		<li>
			<h3>Twin Room</h3>
		</li>
		<li>
			<h3>Double Room</h3>
		</li>
		<li>
			<h3>King Double</h3>
		</li>
	</ul>
	<div class="clearFix"></div>
	<h2 class="heading">Select date:</h2>
	<?php
		$today = date('d');
		$days = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
	?>
	<?php  foreach($RoomPrices as $roomId => $room) {  ?>
	<table>
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