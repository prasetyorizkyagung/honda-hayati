<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Safety_riding extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Safety_riding_model');
	}

	public function index()
	{
		$safety_riding = $this->Safety_riding_model->get_all();
		$data = array(
			'safety_riding_data' => $safety_riding,
			'title' => 'Safety Riding',
			'content' => 'safety_riding/safety_riding_list',
		);
		$this->load->view('template/main',$data);
	}

	public function read($id) 
    {
        $row = $this->Safety_riding_model->get_by_id($id);
        if ($row) {
            $data = array(
			'id' => $row->id,
			'judul' => $row->judul,
			'tgl_upload' => $row->tgl_upload,
			'gambar' => $row->gambar,
			'ket_safety_riding' => $row->ket_safety_riding,
	        'content' => 'safety_riding/safety_riding_read',
	        'title' => 'Products',
	    );
            $this->load->view('template/main', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('safety_riding'));
        }
    }

}

/* End of file Safety_riding.php */
/* Location: ./application/controllers/Safety_riding.php */