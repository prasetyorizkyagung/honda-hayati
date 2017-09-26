<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ahass extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Ahass_model');
	}

	public function index()
	{
		$ahass = $this->Ahass_model->get_all();
		$data = array(
			'ahass_data' => $ahass,
			'title' => 'AHASS',
			'content' => 'ahass/ahass_list',
		);
		$this->load->view('template/main',$data);
	}
}

/* End of file Products.php */
/* Location: ./application/controllers/Products.php */