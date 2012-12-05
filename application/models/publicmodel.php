<?php
class PublicModel extends CI_Model{

	public function getTemplate(){
		# code...
		$this->db->select('FileName');
		$query = $this->db->get_where('templates',array('Selected' => 1));
		$res = $query->row_array();
		return $res['FileName'];
	}

	public function getMediaContents(){
		# code...
		$this->db->select('ContentName,ReplaceWithFileName');
		$query = $this->db->get('mediacontent');
		return $query->result_array();
	}

}


?>