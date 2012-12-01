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
	public function index($pageId = 1)
	{
		
		//echo $pageId;
		$this->load->model('adminModel');

		$data = $this->adminModel->getPage($pageId);
		$sliderImages = explode(';', $data['SliderImages']);

		$genSettings = $this->adminModel->getGeneralSettings();
		$data['HotelName'] = $genSettings['HotelName'];
		$data['HotelAddress'] = $genSettings['HotelAddress'];
		//echo "No of images: ".sizeof($sliderImages);
		
		if($sliderImages != ''){
			$imageNames = array();
			foreach ($sliderImages as $image) {
				# code...
				$v = explode(':', $image);

				$imageNames[] = $v[0];
				//array_push($imageNames, explode(':', $image)[0])
			}
			$data['SliderImages'] = $imageNames;
		}

		$data['pageId'] = $pageId;
		$data['pageNames'] = $this->adminModel->getPageNames();
		$this->load->view('public/public',$data);
	}

	/*public function viewPages($pageId){
		# code...
		$this->load->model('adminModel');

		$data = $this->adminModel->getPage($pageId);
		$sliderImages = explode(';', $data['SliderImages']);

		$genSettings = $this->adminModel->getGeneralSettings();
		$data['HotelName'] = $genSettings['HotelName'];
		$data['HotelAddress'] = $genSettings['HotelAddress'];
		//echo "No of images: ".sizeof($sliderImages);
		
		if($sliderImages != ''){
			$imageNames = array();
			foreach ($sliderImages as $image) {
				# code...
				$v = explode(':', $image);

				$imageNames[] = $v[0];
				//array_push($imageNames, explode(':', $image)[0])
			}
			$data['SliderImages'] = $imageNames;
		}
		$this->load->view('public/public',$data);
	}*/

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */