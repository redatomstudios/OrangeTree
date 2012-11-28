<?php
class Dashboard extends CI_Controller{
	

	public function __construct(){
	
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->model('adminModel');
	}


	public function index(){
		if($this->session->userdata('uname') == FALSE){
			redirect('/dashboard/login');
		}
		$this->load->view('dashboardView');
	}


	public function login(){
		if(!$this->input->post()){
			$this->load->view('loginView');
		}
		else{

			$data =  array();
			$data['username'] = $this->input->post('username');
			$data['password'] = $this->input->post('password');

			if(!$name = $this->adminModel->login($data)){
				echo "Login failed!!<br> GO HOME!!";
			}
			else{
				//echo "Login success!! <br> ".$name;
				$this->session->set_userdata(array('uname' => $name));

				redirect('/dashboard');

			}

		}
	}


	public function editPages()
	{
		# code...
		echo "Edit pages code!!";
	}

	public function editRooms()
	{
		# code...
		echo "Edit rooms code!!";
	}

	public function generalSettings()
	{
		# code...
		echo "Edit General Settings here!!";
	}
}


?>