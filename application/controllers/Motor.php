<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Motor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Motor_model');
	}

	public function index()
	{
		$motorcycle = $this->Motor_model->get_all();
		$data = array(
			'motorcycle_data' => $motorcycle,
			'title' => 'Motor',
			'content' => 'motor/motor_list',
		);
		$this->load->view('template/main',$data);
	}

	public function read($id) 
    {
        $row = $this->Motor_model->get_by_id($id);
        if ($row) {
            $data = array(
			'id' => $row->id,
			'nama_mtr' => $row->nama_mtr,
			'jenis_mtr' => $row->jenis_mtr,
			'gambar' => $row->gambar,
			'keterangan' => $row->keterangan,
	        'content' => 'motor/motor_read',
	        'title' => 'Motor',
	    );
            $this->load->view('template/main', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('motor'));
        }
    }
}

/* End of file Products.php */
/* Location: ./application/controllers/Products.php */