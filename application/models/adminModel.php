<?php

class AdminModel extends CI_Model{

	/*
	 Parameters : username, password
	 Returns the username if login success
	 Returns false if login fails
	*/
	public function login($data){

		$uname = $data['username'];
		$password = sha1($data['password']);

		$this->db->select('Name');
		$res = $this->db->get_where('admin',array('Username' => 'admin', 'AccessCode' => $password));

		if($res->num_rows() > 0){
			return $res->row()->Name;
		}
		else{
			return false;
		}
	}


	public function getGeneralSettings(){
		# code...
		return $this->db->get('generalsettings')->row_array();
	}

	public function updateGeneralSettings($data){
		# code...
		if($this->db->update('generalsettings', array('HotelName' => $data['hotelName'], 'HotelAddress' => $data['hotelAddress'])))
			return TRUE;
		else
			return FALSE;
	}
	
	public function getPageNames(){

		$this->db->select('Id,Title');
		$query = $this->db->get('pages');
		

		if($query->num_rows() > 0){
			//echo "No results";
			return $query->result_array();
		}
		else{
			echo "No results";
			return false;
		}
	}

	public function getPage($Id){

		$query = $this->db->get_where('pages', array('Id' => $Id));
		return($query->row_array());
	}

	public function updatePage($data){
		# code...
		if($this->db->update('pages', array('Title' => $data['pageTitle'], 'PageContent' => $data['pageContent']),array('Id' => $data['pageId'])))
			return TRUE;
		else
			return FALSE;
	}

	public function insertSliderImage($fileName,$pageId){
		
		
		$this->db->set('SliderImages', 'CONCAT("'.$fileName.';", pages.SliderImages)', FALSE );
		$this->db->where(array('Id' => $pageId));	
		$res = $this->db->update('pages');
		if($res){
			return TRUE;
		}
		else
			return FALSE;

		// $query = "update pages set sliderimages = '$encodedImage' where id = $pageId";
		// echo $query;
	}

	public function getSliderImage($pageId){
		# code...

		$this->db->select('SliderImages');
		$query = $this->db->get_where('pages', array('Id' => $pageId));
		$res = $query->row_array();
		return $res['SliderImages'];
	}

	public function updateMediaContent($id,$str){
		# code...
		$this->db->update('mediacontent',array('ViewString' => $str),array('Id' => $id));
	}
	
	public function updateRoomPrices($data){
		
		$data['Twin Rooms'] = array(27.50,27.50,27.50,27.50,27.50,47.50,67.50);
		$data['Double Rooms'] = array(42.50,42.50,42.50,42.50,42.50,67.50,95.00);
		$data['King Double'] = array(77.50,77.50,77.50,77.50,77.50,105.00,155.00);

		$string = '';

		foreach ($data as $room) {

			$checkDay = 0;
			$checkPrice = $room[0];
			$str[$room] = '0';
			foreach ($room as $day => $price) {
				if($day != $checkDay){
					$str.= '-'.($day-1).':'.$checkPrice;
				}

			}
		}
	}

	public function getRoomPrices(){
		# code...
		$prices = $this->db->get('rooms');
		return($prices->result_array());
	}
	
}


?>