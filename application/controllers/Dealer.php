<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dealer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dealer_model');
	}

	public function index()
	{
		$dealer = $this->Dealer_model->get_all();
		$data = array(
			'dealer_data' => $dealer,
			'title' => 'Dealer',
			'content' => 'dealer/dealer_list',
		);
		$this->load->view('template/main',$data);
	}
}

/* End of file Products.php */
/* Location: ./application/controllers/Products.php */