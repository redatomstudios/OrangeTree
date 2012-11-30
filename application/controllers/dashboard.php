<?php
class Dashboard extends CI_Controller{
	
	

	public function __construct(){
	
		parent::__construct();

		if($this->session->userdata('name') == FALSE && $this->uri->uri_string() != 'dashboard/login' && $this->uri->uri_string() != 'dashboard/echoImage'){
			redirect('/dashboard/login');
		}

		$this->load->helper('form');
		$this->load->helper('html');
		$this->load->model('adminModel');
	}


	public function index(){
		

		$data['pageNames'] = $this->adminModel->getPageNames();
		$data['pageId'] = 0;
		$data['currentPage'] = 'general';
		$this->load->view('admin/sidebar', $data);
		$this->load->view('admin/general', $data);
		$this->load->view('admin/footer');

	}


	public function login(){


		if(!$this->input->post()){
			$this->load->view('public/login');
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


	public function editPage($pageId = 0)
	{
		# code...

		$data['pageId'] = $pageId;
		$data['pageNames'] = $this->adminModel->getPageNames();

		//Adding a new page
		if($pageId ==0){
			$data['currentPage'] = 'addPage';
			$this->load->view('admin/sidebar', $data);
			$this->load->view('admin/addPage',$data);
		}

		//Editing a page
		else{
		
			$data['currentPage'] = $pageId;
			$data['pageDetails'] = $this->adminModel->getPage($pageId);
			$sliderImages = explode(';', $data['pageDetails']->SliderImages);

			
			if($sliderImages != ''){
				$imageNames = array();
				foreach ($sliderImages as $image) {
					# code...
					$imageNames[] = explode(':', $image)[0];
				}
				$data['pageDetails']->SliderImages = $imageNames;
			}

			$params = array('allowedExtensions' => array('jpg', 'jpeg'), 'sizeLimit' =>1.5 * 1024 * 1024);
			$this->load->library('MyqqFileUploader',$params);
			

			// echo "<pre>";
			// print_r($imageNames);
			// echo isset($imageNames) sizeof($imageNames);
			// print_r($data);
			

			// $this->load->view('admin/sidebar', $data);
			// $this->load->view('admin/addPage', $data);	
		}
		$this->load->view('admin/footer');
		
	}

	public function echoImage($pageId){

		$sliderImage = base64_decode($this->adminModel->getSliderImage($pageId));
		header("Content-Type: image/jpeg");
		echo $sliderImage;

		//echo "Fuck You";
	}


	// To display back
	// header("Content-Type: image/jpg");
	// echo base64_decode($encoded);
	

	public function editRooms()
	{
		echo "Edit rooms code!!";
	}

	public function generalSettings()
	{
		echo "Edit General Settings here!!";
	}

	public function uploadSliderImage()
	{
		# code...
		$params = array('allowedExtensions' => array('jpg', 'jpeg'), 'sizeLimit' =>1.5 * 1024 * 1024);
		$this->load->library('MyqqFileUploader',$params);
		
		
		$returnArray = $this->MyqqFileUploader->handleUpload('../resources/images/slider/',FALSE,$_POST['pageId']);
		echo $returnArray['fileName'] ;//. " " . $extension . " " . $pageId;
		//$this->adminModel->editSliderImage($fileName, $extension, $pageId);
	}
}


?>