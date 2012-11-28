<?php
class Dashboard extends CI_Controller{
	
	

	public function __construct(){
	
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->model('adminModel');
	}


	public function index(){


		if($this->session->userdata('name') == FALSE){
			redirect('/dashboard/login');
		}
		
		$data['uname'] = $this->session->userdata['name'];
		$this->load->view('dashboardView',$data);

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
				$this->session->set_userdata(array('name' => $name));
				 redirect('/dashboard');
			}

		}
	}

	public function logout(){

		$this->session->sess_destroy();
		redirect('\dashboard');
	}


	public function editPages()
	{
		# code...

		$this->load->model('adminModel');

		if(!$pages = $this->adminModel->getPages()){
			echo "No Pages Found!";
		}
		else{
			$this->load->view('editPages',$pages);
		}

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