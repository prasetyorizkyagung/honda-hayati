<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Products_model');
	}

	public function index()
	{
		$Products = $this->Products_model->get_all();
		$data = array(
			'products_data' => $Products,
			'title' => 'Products',
			'content' => 'products/products_list',
		);
		$this->load->view('template/main',$data);
	}

	public function read($id) 
    {
        $row = $this->Products_model->get_by_id($id);
        if ($row) {
            $data = array(
			'id' => $row->id,
			'judul' => $row->judul,
			'tgl_upload' => $row->tgl_upload,
			'gambar' => $row->gambar,
			'ket_products' => $row->ket_products,
	        'content' => 'products/products_read',
	        'title' => 'Products',
	    );
            $this->load->view('template/main', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('products'));
        }
    }
}

/* End of file Products.php */
/* Location: ./application/controllers/Products.php */