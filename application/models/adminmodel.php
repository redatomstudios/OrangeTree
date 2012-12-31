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
			return FALSE;
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
		if($this->db->update('mediacontent',array('ViewString' => $str),array('Id' => $id)))
			return TRUE;
		else
			return FALSE;
	}
	
	public function updateRoomPrices($data){
		
		foreach ($data as $key => $value) {
			if(!$this->db->update('rooms',array('Prices' => $value), array('Id' => $key)))
				return FALSE;
		}
		return TRUE;
	}

	public function getRoomPrices(){
		$prices = $this->db->get('rooms');
		return($prices->result_array());
	}
	
	public function getRoomCount($roomId,$date){
		# code...
		$res = $this->db->get_where('booking',array('RoomId' => $roomId, 'Date' => $date));
		$count = $res->num_rows();
	}
}


?>