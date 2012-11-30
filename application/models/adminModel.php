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


	/*
	*If start = 0, get full table



	*/
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

		$query = $this->db->get_where('pages',array('Id' => $Id));
		return($query->row());
	}

	public function insertSliderImage($fileName,$pageId){
		
		
		$this->db->set('SliderImages','CONCAT("'.$fileName.';",pages.SliderImages)', FALSE );
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
		return $query->row_array()['SliderImages'];
	}

}


?>