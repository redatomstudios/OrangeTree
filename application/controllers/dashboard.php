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


	public function editPage($pageId = 0,$mid)
	{
		# code...
		if(!$_POST){

			$this->load->model('adminModel');

			$data['pageId'] = $pageId;
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

		

	}


	// To display back
	// header("Content-Type: image/jpg");
	// echo base64_decode($encoded);
	public function uploadSliderImage()
	{

		$pageId = $this->input->post('pageId');
		if($_FILES['sliderImage']['type'] == 'image/jpeg' || $_FILES['sliderImage']['type'] == 'image/jpg'){
			
			$this->load->model('adminModel');

			$handle = FOPEN($_FILES['sliderImage']['tmp_name'],'r');
			$file_content = FREAD($handle,FILESIZE($_FILES['sliderImage']['tmp_name']));
			FCLOSE($handle);
			$encoded = CHUNK_SPLIT(BASE64_ENCODE($file_content)); 

			if($this->adminModel->insertSliderImage($pageId,$encoded)){
				echo "Slider Images uploaded Successfullt!!";
			}
			else
				echo "Upload failed!!";

		}
		else{
			echo "Not the right type";
		}
		
		//echo $data;

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