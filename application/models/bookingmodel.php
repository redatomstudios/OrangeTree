<?php

class BookingModel extends CI_Model{

	public function getRoomCount($roomId,$date){
		# code...
		$this->db->select('count(Id) as count');
		$res = $this->db->get_where('booking',array('RoomId' => $roomId, 'Date' => $date));

		// echo $this->db->last_query();
		$count = $res->row();

		$count = $count->count;

		// echo "<br>". $count;
		return $count;

	}

	public function bookRoom($roomId, $dateExtracted, $roomNumber, $itemName, $itemNumber, $transactionId, $price){
		
		$values = array(
			'RoomId' => $roomId,
			'Date' => $dateExtracted,
			'RoomNumber' => $roomNumber,
			'ItemName' => $itemName,
			'ItemNumber' => $itemNumber,
			'TransactionId' => $transactionId,
			'Price' => $price
			);
		if($this->db->insert('booking', $values))
			return TRUE;
		else
			return FALSE;
	}

}
?>