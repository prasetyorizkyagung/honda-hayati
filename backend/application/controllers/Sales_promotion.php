<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sales_promotion extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sales_promotion_model');
        $this->load->library('form_validation');
        $this->load->model('Security_model');
    }

    public function index()
    {
        $this->Security_model->get_security();
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'sales_promotion/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'sales_promotion/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'sales_promotion/index.html';
            $config['first_url'] = base_url() . 'sales_promotion/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Sales_promotion_model->total_rows($q);
        $sales_promotion = $this->Sales_promotion_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'sales_promotion_data' => $sales_promotion,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'sales_promotion/sales_promotion_list',
            'title' => 'Sales Promotion',
        );
        $this->load->view('template/main', $data);
    }

    public function read($id) 
    {
        $this->Security_model->get_security();
        $row = $this->Sales_promotion_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'judul' => $row->judul,
		'tgl_upload' => $row->tgl_upload,
		'gambar' => $row->gambar,
		'ket_sales_promotion' => $row->ket_sales_promotion,
        'content' => 'sales_promotion/sales_promotion_read',
        'title' => 'Sales Promotion',
	    );
            $this->load->view('template/main', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sales_promotion'));
        }
    }

    public function create() 
    {
        $this->Security_model->get_security();
        $data = array(
            'button' => 'Create',
            'action' => site_url('sales_promotion/create_action'),
	    'id' => set_value('id'),
	    'judul' => set_value('judul'),
	    'tgl_upload' => set_value('tgl_upload'),
	    'gambar' => set_value('gambar'),
	    'ket_sales_promotion' => set_value('ket_sales_promotion'),
        'content' => 'sales_promotion/sales_promotion_form',
        'title' => 'Sales Promotion',
	);
        $this->load->view('template/main', $data);
    }
    
    public function create_action() 
    {
        $this->form_validation->set_rules('judul','judul','required|trim|is_unique[products.judul]');
        $this->form_validation->set_rules('tgl_upload', 'tgl upload', 'trim|required');
        $this->form_validation->set_rules('ket_sales_promotion', 'ket sales promotion', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
           //load library file upload
            $config['upload_path']         = '../uploads/sales_promotion/';
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
                    'ket_sales_promotion' => set_value('ket_sales_promotion'),
                    'gambar' => $gambar['file_name'], 
                );
                $this->Sales_promotion_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('sales_promotion'));
            }
        }
    }
    
    public function update($id) 
    {
        $this->Security_model->get_security();
        $row = $this->Sales_promotion_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('sales_promotion/update_action'),
		'id' => set_value('id', $row->id),
		'judul' => set_value('judul', $row->judul),
		'tgl_upload' => set_value('tgl_upload', $row->tgl_upload),
		'gambar' => set_value('gambar', $row->gambar),
		'ket_sales_promotion' => set_value('ket_sales_promotion', $row->ket_sales_promotion),
        'content' => 'sales_promotion/sales_promotion_form',
        'title' => 'Sales Promotion',
	    );
            $this->load->view('template/main', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sales_promotion'));
        }
    }
    
    public function update_action() 
    {
        $this->form_validation->set_rules('judul','judul','required');
        $this->form_validation->set_rules('tgl_upload', 'tgl upload', 'trim|required');
        $this->form_validation->set_rules('ket_sales_promotion', 'ket sales promotion', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            //load library file upload
            $config['upload_path']         = '../uploads/sales_promotion/';
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
                    'ket_sales_promotion' => set_value('ket_sales_promotion'),
                    'gambar' => $gambar['file_name'], 
                );
                $this->Sales_promotion_model->update($this->input->post('id', TRUE), $data);
                $this->session->set_flashdata('message', 'Update Record Success');
                redirect(site_url('sales_promotion'));
            }
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Sales_promotion_model->get_by_id($id);

        if ($row) {
            $this->Sales_promotion_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('sales_promotion'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('sales_promotion'));
        }
    }
}

/* End of file Sales_promotion.php */
/* Location: ./application/controllers/Sales_promotion.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-14 17:16:33 */
/* http://harviacode.com */