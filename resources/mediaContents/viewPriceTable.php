<?php





ob_start();

?>

<style>
	div.clearFix {
		clear: both;
	}
	div.tabWrapper {
		padding: 10px;
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
	}

	div.tabWrapper table {
		width: 100%;
		background: #EEE;
	}

	table.hidden {
		position: absolute;
		left: -99999px;
	}

	div.tabWrapper th {
		font-weight: bold;
		padding: 10px 0;
	}

	div.tabWrapper td {
		text-align: center;
		border: solid 1px white;
		cursor: pointer;
		padding-bottom: 30px;
	}

	div.tabWrapper td:hover {
		box-shadow: inset 0 0 10px rgba(0, 255, 0, 0.5);
	}

	div.tabWrapper td.selected {
		box-shadow: inset 0 0 10px #0F0;
	}

	div.tabWrapper td div.date {
		text-align: left;
		padding: 5px;
	}

	div.tabWrapper td span.price {
		font-size: 1.3em;
	}

	div.tabWrapper td div.bookButton {
		line-height: 2em;
		width: 100%;
		background: rgba(0, 255, 0, 0.5);
		margin-top: 10px;
		opacity: 0.2;
	}

	div.bookButton a:hover {
		text-decoration: none;
	}

	div.tabWrapper li > h3 {
		margin: 0;
		padding: 0;
	}

	div.tabWrapper #bookButton {
		background: rgba(0, 255, 0, 0.3);
		padding: 14px;
		font-size: 1.4em;
		float: right;
		cursor: pointer;
	}

	div.tabWrapper #bookButton:hover {
		background: rgba(0, 255, 0, 0.7);
	}

	div.tabWrapper #bookText {
		line-height: 3.5em;
	}

/*	#content_2, #content_3 {
		display: none;
	}*/

	.tabs li {
		font-size: 1.2em;
		cursor: pointer;
	}

	.tabs li.selected {
		background: #EEE;
		font-size: 1.3em;
	}

	#sButton {
		padding: 10px;
	}
</style>

<script>
	
	var updateConfirmData = function($source) {
		var roomType = $source[0],
				month = $source[1],
				day = $source[2],
				year = $source[3],
				amount = $source[4],
				updateString = 'Book a ' + roomType + ' room on ' + month + ' ' + day + ', ' + year + ' for &pound;' + amount + '. Check out to continue.';
		
		$('#bookText').html(updateString);
		document.getElementById('roomType').value = roomType;
		document.getElementById('month').value = month;
		document.getElementById('day').value = day;
		document.getElementById('year').value = year;
		$('#sButton').show();
	}

	jQuery(document).ready(function(){
		// $('div.tabWrapper table').on('mouseover', 'td', function(){
		// 	$($(this).children('div.bookButton')[0]).queue('fx', []).animate({opacity: 1});
		// }).on('mouseout', 'td', function(){
		// 	$($(this).children('div.bookButton')[0]).queue('fx', []).animate({opacity: 0.2});
		// });

		$('#content_1').removeClass('hidden');

		$('div.tabWrapper table').on('click', 'td', function(){
			$('div.tabWrapper table td.selected').removeClass('selected');
			$(this).addClass('selected');

			// Get the parameters of the selected room and inject
			// Into the PayPal form
			var $inputObject = $(this).children('input[type="hidden"]')[0];
			var $dataToInject = $inputObject.value.split(', ');

			updateConfirmData($dataToInject);
		});

		$('ul.tabs').on('click', 'li', function(){
			$('ul.tabs li.selected').removeClass('selected');
			$(this).addClass('selected');
			
			$index = this.id.split('_')[1];
			
			$('.tabContent').addClass('hidden');
			$('#content_' + $index).removeClass('hidden');
		});

		$('#bookButton').click(function(){
			document.getElementById('dataForm').submit();
		});
	});
</script>

<div class="tabWrapper">
	<!-- <h2 class="heading">Select room type:</h2> -->
	<ul class="tabs">
		<li class="selected" id="tab_1">
			<h3>Twin Room</h3>
		</li>
		<li id="tab_2">
			<h3>Double Room</h3>
		</li>
		<li id="tab_3">
			<h3>King Double</h3>
		</li>
	</ul>
	<!-- <div class="clearFix"></div> -->
	<!-- <h2 class="heading">Select date:</h2> -->
	<?php
		$days = array('Mon', 'Tue', 'Wed', 'Thu','Fri', 'Sat', 'Sun');
		$months = array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
		$roomType = array('Twin', 'Double', 'King Double');
		
		// These months have 31 days. Good job guys.
		$filterMonths = array(1, 3, 5, 7, 8, 10, 12);
		$tableIndex = 1;
	?>
	<?php  
	foreach($dat as $room) {  
		// $today is incremented with each loop, $realDay stays the same. 
		// This is so we can add the name of the month when today is displayed
		// or when a new month starts
		$today = $realDay = date('j');
		$thisMonth = date('n');
		if(in_array($thisMonth, $filterMonths)) {
			// These months have 31 days
			$maxDaysInMonth = 31;
		} else {
			// Others have 30...
			$maxDaysInMonth = 30;
		}

		// Unless you're february, then you're special. :D Even more special if it's a leap year. 
		if($thisMonth == 2) {
			$maxDaysInMonth = (date('L') ? 29 : 28); 
		}

		// Get the year, so we can increment if December overflows into Jan
		$thisYear = date('Y');
	?>
	<form>
		<table class="tabContent hidden" id="content_<?= $tableIndex ?>">
			<tr>
				<?php for($nameOfDay = 0; $nameOfDay < 7; $nameOfDay++) { ?>
				<th><?= $days[(date('N') - 1 + $nameOfDay) % 7] ?></th>
				<?php } ?>
			</tr>
			<?php for($week = 0; $week < 4; $week++) { ?>
			<tr>
				<?php for($day = 0; $day < 7; $day++) { ?>
				<td>
					<?php 
					$roomData = '';
					// Only throw in the month if it's today, or if it's the first 
					?>
					<div class="date"><?= ($today == $realDay || $today == 1 ? $months[$thisMonth - 1] . ' ' : '') . $today ?></div>
					<span class="price">&pound;<?= $room[(date('N') - 1 + $day) % 7] ?></span>
					<?php 
						// Gather data about this room and store it in a hidden field so we can retrieve it later
						$roomData = array($roomType[$tableIndex - 1], $months[$thisMonth - 1], $today, $thisYear, $room[(date('N') - 1 + $day) % 7]); 
					?>
					<input type="hidden" value="<?= implode(', ', $roomData) ?>" />
					<!-- <div class="bookButton"><a href="<?php /* PayPal button code goes here */ ?>">Book Now</div> -->
					<?php
					// Check if it's the next month yet, if so, roll over.
					if($today >= $maxDaysInMonth) {
						// I'm pretty sure every month starts with 1....:P
						$today = 1;
						// Well, this month is over. Onwards!
						if($thisMonth == 12) {
							$thisMonth = 1;
							$thisYear++;
						} else {
							$thisMonth++;
						}
					} else {
						// Lets go to tomorrow now!
						$today++;
					}
					?>
				</td>
				<?php } // End of day loop ?>
			</tr>
			<?php
			} // End of week loop 
			// Going to next table...
			$tableIndex++;
			?>
		</table>
	</form>
	<?php  }  ?>
	<div class="clearFix"></div>
	<span id="bookText">Please select a date to book a room.</span><!-- <span id="bookButton">Confirm</span> -->
	<form name="dataForm" action="" method="post" class="hidden" id="dataForm">
		<input type="hidden" id="roomType" name="roomType" value="" /> 
		<input type="hidden" id="month" name="month" value="" />
		<input type="hidden" id="day" name="day" value="" />
		<input type="hidden" id="year" name="year" value="" />
		<input id="sButton" style="display: none;" type="submit" value="Checkout" style="padding: 10px;" />
	</form>
</div>


<?php
$str = ob_get_clean();

// echo "<pre>";
// print_r($data);

$this->adminModel->updateMediaContent(1,$str);
//echo $str;


?>