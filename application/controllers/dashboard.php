<?php
class Dashboard extends CI_Controller{
	
	

	public function __construct(){
	
		parent::__construct();

		if($this->session->userdata('name') == FALSE && $this->uri->uri_string() != 'dashboard/login'){
			redirect('/dashboard/login');
		}

		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->model('adminModel');
	}


	public function index(){
		
		$this->load->model('adminModel');

		$data['pageNames'] = $this->adminModel->getPageNames();
		$data['currentPage'] = 'general';
		$this->load->view('admin_sidebar', $data);
		$this->load->view('dashboardView', $data);
		$this->load->view('admin_pageclose');

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


	public function editPage($id = 0)
	{
		# code...
		if(!$_POST){

			$this->load->model('adminModel');

			$data['pageNames'] = $this->adminModel->getPageNames();
			if($id ==0){
				$data['currentPage'] = 'addPage';
				$this->load->view('admin_sidebar', $data);
				$this->load->view('addPage');
			}
			else{
				$data['currentPage'] = '' . $id;
				$data['pageDetails'] = $this->adminModel->getPage($id);
				$this->load->view('admin_sidebar', $data);
				$this->load->view('addPage',$data);	
			}
			$this->load->view('admin_pageclose');
		}
	}

	public function addPage(){

echo $_SERVER['HTTP_ORIGIN'].base_url().'uploads/'.'<br><pre>';
//print_r($_SERVER);
		$config['upload_path'] = $_SERVER['HTTP_ORIGIN'].base_url().'uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '1500';
        $config['max_width']  = '1024';
        $config['max_height']  = '768';
		 
		// You can give video formats if you want to upload any video file.
		 
		$this->load->library('upload', $config);
		 
		if ( ! $this->upload->do_upload('myFile'))
		{
			$error = array('error' => $this->upload->display_errors());
			echo "<pre>";
			print_r($error);
		// uploading failed. $error will holds the errors.
		}
		else
		{
		$data = array('upload_data' => $this->upload->data());
		 print_r($data);
		// uploading successfull, now do your further actions
		}

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