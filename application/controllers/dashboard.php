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
		$data['generalSettings'] = $this->adminModel->getGeneralSettings();
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
				redirect('/dashboard/login');
			}
			else{
				$this->session->set_userdata(array('name' => $name));
				 redirect('/dashboard');
			}

		}
	}

	public function logout(){

		$this->session->sess_destroy();
		redirect('/home');
	}


	public function editPage($pageId = 0){

		$data['pageId'] = $pageId;

		if(!$_POST){
			$data['pageNames'] = $this->adminModel->getPageNames();

			//Adding a new page
			if($pageId ==0){
				$data['currentPage'] = 'addPage';
				$this->load->view('admin/sidebar', $data);
				$this->load->view('admin/addPage', $data);
			}

			//Editing a page
			else{
			
				$data['currentPage'] = $pageId;
				$data['pageDetails'] = $this->adminModel->getPage($pageId);
				$sliderImages = explode(';', $data['pageDetails']['SliderImages']);

				//echo "No of images: ".sizeof($sliderImages);
				
				if($sliderImages != ''){
					$imageNames = array();
					foreach ($sliderImages as $image) {
						# code...
						$v = explode(':', $image);
						$imageNames[] = $v[0];
					}
					$data['pageDetails']['SliderImages'] = $imageNames;
				}

				

				$this->load->view('admin/sidebar', $data);
				$this->load->view('admin/addPage', $data);	
			}
			$this->load->view('admin/footer');
		}
		else{
			if($this->adminModel->updatePage($this->input->post()))
				redirect('/dashboard/editPage/'.$pageId);
			else
				echo "Page Update Failed";
		}
	}

	

	public function editRooms(){
		if(!$_POST){

			$prices = $this->adminModel->getRoomPrices();

			// echo "<pre>";
			// print_r($prices);
			foreach ($prices as $room) {
				 
				 $priceTemp = explode(';', $room['Prices']);

				 $data['RoomPrices'][$room['Id']] = $priceTemp;
			}
			$dat['pageNames'] = $this->adminModel->getPageNames();
			$dat['pageId'] = 0;
			$dat['currentPage'] = 'editRooms';
			$this->load->view('admin/sidebar', $dat);
			$this->load->view('admin/editRoomPrices',$data);
			$this->load->view('admin/footer');
		}
		else{
			$data = $this->input->post();

			// echo "<pre>";
			// print_r($data);
			foreach ($data as $key => $value) {
				$keySplit = explode('_', $key);

				if($keySplit[0] == '1'){
					$twi[$keySplit[1]] = $value;
				}
				elseif ($keySplit[0] == '2') {
					$dou[$keySplit[1]] = $value;
				}
				elseif ($keySplit[0] == '3') {
					$kin[$keySplit[1]] = $value;
				}
			}

			$str = '';
			for($i=0;$i<sizeof($twi);$i++) {
				$str.=$twi[$i].';'; 
			}
			$str = substr($str, 0, -1);
			$dat[1] = $str;

			$str = '';
			for($i=0;$i<sizeof($dou);$i++) {
				$str.=$dou[$i].';'; 
			}
			$str = substr($str, 0, -1);
			$dat[2] = $str;
			$str = '';
			for($i=0;$i<sizeof($kin);$i++) {
				$str.=$kin[$i].';'; 
			}
			$str = substr($str, 0, -1);
			$dat[3] = $str;

			// echo "<pre>";
			// print_r($twi);
			// print_r($dou);
			// print_r($kin);
			// print_r($dat);

			$this->adminModel->updateRoomPrices($dat);

			redirect('dashboard/editRooms');
		}
	}

	public function updateGeneralSettings()	{
		if($this->adminModel->updateGeneralSettings($this->input->post()))
			redirect('dashboard');
		else
			echo "General Settings Update Failed";
	}

	public function uploadSliderImage()	{
		
		$config['upload_path']     = './resources/images/slider/';
        $config['allowed_types']   = 'jpg|jpeg';
        $config['max_size']        = '2048';
        $config['max_width']       = '1600';
        $config['max_height']      = '1200';
        $config['overwrite']       = 'TRUE';
        $config['file_name']       = 'img'.time().'.jpg';
        
        $this->load->library('upload', $config);
        if($this->upload->do_upload('sliderImage')){
        	//echo '<img src="'.base_url().'resources/images/slider/'.$config['file_name'].'" />';
        	if($this->adminModel->insertSliderImage($config['file_name'], $this->input->post('pageId'))){
        		redirect('dashboard/editPage/'.$this->input->post('pageId'));
        	}
        	else
        		echo "Database not updated";
        }
        else{
			echo "Image not updated";
        }
		
	}
}


?>