<?php
class Dashboard extends CI_Controller{
	

	public function __construct(){
	
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('html');	
	}


	public function index(){
		if($this->session->userdata('uname') == FALSE){
			redirect('/dashboard/login');
		}
		$this->load->view('dashboardView');
	}


	public function login(){
		$this->load->view('loginView');
	}
}


?>