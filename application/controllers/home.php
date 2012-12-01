<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('public/public');
	}

	public function viewPages($pageId){
		# code...
		$this->load->model('adminModel');

		$data = $this->adminModel->getPage($pageId);
		$sliderImages = explode(';', $data->SliderImages);

		//echo "No of images: ".sizeof($sliderImages);
		
		if($sliderImages != ''){
			$imageNames = array();
			foreach ($sliderImages as $image) {
				# code...
				$imageNames[] = explode(':', $image)[0];
			}
			$data->SliderImages = $imageNames;
		}
		$this->load->view('public\template',$data);
	}

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */