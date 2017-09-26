<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Products extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Products_model');
        $this->load->library('form_validation');
        $this->load->model('Security_model');
    }

    public function index()
    {
        $this->Security_model->get_security();
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'products/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'products/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'products/index.html';
            $config['first_url'] = base_url() . 'products/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Products_model->total_rows($q);
        $products = $this->Products_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'products_data' => $products,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'products/products_list',
            'title' => 'Products',
        );
        $this->load->view('template/main', $data);
    }

    public function read($id) 
    {
        $this->Security_model->get_security();
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

    public function create() 
    {
        $this->Security_model->get_security();
        $data = array(
            'button' => 'Create',
            'action' => site_url('products/create_action'),
	    'id' => set_value('id'),
	    'judul' => set_value('judul'),
	    'tgl_upload' => set_value('tgl_upload'),
	    'gambar' => set_value('gambar'),
	    'ket_products' => set_value('ket_products'),
        'content' => 'products/products_form',
        'title' => 'Products'
	);
        $this->load->view('template/main', $data);
    }
    
    public function create_action() 
    {
        $this->form_validation->set_rules('judul','judul','required|trim|is_unique[products.judul]');
        $this->form_validation->set_rules('tgl_upload', 'tgl upload', 'trim|required');
        $this->form_validation->set_rules('ket_products', 'ket products', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            //load library file upload
            $config['upload_path']         = '../uploads/products';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 9072;
            $config['max_width']            = 5000;
            $config['max_height']           = 5000;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('gambar'))
            {
                $error = array('error' => $this->upload->display_errors());
                $this->create();
            }
            else
            {
                $gambar = $this->upload->data();
                $data = array(
                    'judul' => set_value('judul'),
                    'tgl_upload' => set_value('tgl_upload'),
                    'ket_products' => set_value('ket_products'),
                    'gambar' => $gambar['file_name'], 
                );
                $this->Products_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('products'));
            }
        }
    }
    
    public function update($id) 
    {
        $this->Security_model->get_security();
        $row = $this->Products_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('products/update_action'),
		'id' => set_value('id', $row->id),
		'judul' => set_value('judul', $row->judul),
		'tgl_upload' => set_value('tgl_upload', $row->tgl_upload),
		'gambar' => set_value('gambar', $row->gambar),
		'ket_products' => set_value('ket_products', $row->ket_products),
        'content' => 'products/products_form',
        'title' => 'Products',
	    );
            $this->load->view('template/main', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('products'));
        }
    }
    
    public function update_action() 
    {
        $this->form_validation->set_rules('judul','judul','required');
        $this->form_validation->set_rules('judul','judul','required|trim|is_unique[products.judul]');
        $this->form_validation->set_rules('tgl_upload', 'tgl upload', 'trim|required');
        $this->form_validation->set_rules('ket_products', 'ket products', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            //load library file upload
            $config['upload_path']         = '../uploads/products';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 9072;
            $config['max_width']            = 5000;
            $config['max_height']           = 5000;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('gambar'))
            {
                $error = array('error' => $this->upload->display_errors());
                $this->create();
            }
            else
            {
                $gambar = $this->upload->data();
                $data = array(
                    'judul' => set_value('judul'),
                    'tgl_upload' => set_value('tgl_upload'),
                    'ket_products' => set_value('ket_products'),
                    'gambar' => $gambar['file_name'], 
                );
                $this->Products_model->update($this->input->post('id', TRUE), $data);
                $this->session->set_flashdata('message', 'Update Record Success');
                redirect(site_url('products'));
            }
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Products_model->get_by_id($id);

        if ($row) {
            $this->Products_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('products'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('products'));
        }
    }
}

/* End of file Products.php */
/* Location: ./application/controllers/Products.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-14 14:43:30 */
/* http://harviacode.com */