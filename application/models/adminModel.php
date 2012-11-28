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
	public function getPages($start = 0, $limit = 0){

		if($limit != 0 ){
			$query = $this->db->get('pages',$start,$limit);
		}
		else if($start != 0){
			$query = $this->db->get('pages',$start);
		}
		else{
			$query = $this->db->get('pages');
		}

		if($query->num_rows() > 0){
			//echo "No results";
			return $query->result_array();
		}
		else{
			echo "No results";
			return false;
		}
	}

}


?>