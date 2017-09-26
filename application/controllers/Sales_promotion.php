<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales_promotion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sales_promotion_model');
	}

	public function index()
	{
		$sales_promotion = $this->Sales_promotion_model->get_all();
		$data = array(
			'sales_promotion_data' => $sales_promotion,
			'title' => 'Sales Promotion',
			'content' => 'sales_promotion/sales_promotion_list',
		);
		$this->load->view('template/main',$data);
	}

	public function read($id) 
    {
        $row = $this->Sales_promotion_model->get_by_id($id);
        if ($row) {
            $data = array(
			'id' => $row->id,
			'judul' => $row->judul,
			'tgl_upload' => $row->tgl_upload,
			'gambar' => $row->gambar,
			'ket_sales_promotion' => $row->ket_sales_promotion,
	        'content' => 'sales_promotion/sales_promotion_read',
	        'title' => 'Products',
	    );
            $this->load->view('template/main', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sales_promotion'));
        }
    }

}

/* End of file Sales_promotion.php */
/* Location: ./application/controllers/Sales_promotion.php */