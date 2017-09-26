<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Corporate extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Corporate_model');
	}

	public function index()
	{
		$corporate = $this->Corporate_model->get_all();
		$data = array(
			'corporate_data' => $corporate,
			'title' => 'Corporate',
			'content' => 'corporate/corporate_list',
		);
		$this->load->view('template/main',$data);
	}

	public function read($id) 
    {
        $row = $this->Corporate_model->get_by_id($id);
        if ($row) {
            $data = array(
			'id' => $row->id,
			'judul' => $row->judul,
			'tgl_upload' => $row->tgl_upload,
			'gambar' => $row->gambar,
			'ket_corporate' => $row->ket_corporate,
	        'content' => 'corporate/corporate_read',
	        'title' => 'Corporate',
	    );
            $this->load->view('template/main', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('corporate'));
        }
    }
}

/* End of file Products.php */
/* Location: ./application/controllers/Products.php */