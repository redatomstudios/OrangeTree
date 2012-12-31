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

	public $genSettings;

	public function index($pageId = 1)
	{
		
		//echo $pageId;
		$this->load->model('adminModel');
		$this->load->model('publicModel');


		$data = $this->adminModel->getPage($pageId);
		$sliderImages = explode(';', $data['SliderImages']);

		function replace($matches) {
			$obj = new Home();
			$obj->load->model('adminModel');
			$obj->load->model('publicModel');

			$genSettings = $obj->adminModel->getGeneralSettings();
			$mediaContents = $obj->publicModel->getMediaContents();
			//print_r($mediaContents);


			foreach ($matches as $match) {
				$str = substr($match,3,strlen($match)-6);
				if($str == 'HotelName'){ return $genSettings['HotelName'];}
				elseif($str == 'Logo') return '<img src="'. base_url(). 'resources/branding/Logo.png" id="logo" />';
				else{
					foreach ($mediaContents as $mediaContent) {
						if($str == $mediaContent['ContentName']){
							return $mediaContent['ViewString'];
						}
					}
				}
			}
		}
		//$string = "The hotel,{{{HotelName}}} is a stupid stupid hotel with a logo,{{{Logo}}}";
		$data['PageContent'] = preg_replace_callback('/\{\{\{[a-zA-Z 0-9_]*\}\}\}/', 'replace', $data['PageContent']);

		//echo $data['PageContent'];


		$genSettings = $this->adminModel->getGeneralSettings();
		//echo $genSettings['HotelName'];
		//echo preg_replace_callback('/\{\{\{[a-zA-Z 0-9_]*\}\}\}/', "replace", $data['PageContent']);





		
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
		$this->load->view('templates/'.$this->publicModel->getTemplate(),$data);

		//print_r($_SERVER);
	}

	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */