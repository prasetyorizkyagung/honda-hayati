<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bengkel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data['refresh'] = '';
		$data['title'] = 'Halaman Utama';
		$data['content'] = 'site/index2.php';
		$this->load->view('template/bengkel/main',$data);
	}

}

/* End of file Bengkel.php */
/* Location: ./application/controllers/Bengkel.php */