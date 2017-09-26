<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Motorcycle extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Motorcycle_model');
        $this->load->library('form_validation');
        $this->load->model('Security_model');
    }

    public function index()
    {
        $this->Security_model->get_security();
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'motorcycle/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'motorcycle/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'motorcycle/index.html';
            $config['first_url'] = base_url() . 'motorcycle/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Motorcycle_model->total_rows($q);
        $motorcycle = $this->Motorcycle_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'motorcycle_data' => $motorcycle,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'motorcycle/motorcycle_list',
            'title' => 'Motor',
        );
        $this->load->view('template/main', $data);
    }

    public function read($id) 
    {
        $this->Security_model->get_security();
        $row = $this->Motorcycle_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama_mtr' => $row->nama_mtr,
		'jenis_mtr' => $row->jenis_mtr,
		'gambar' => $row->gambar,
		'keterangan' => $row->keterangan,
        'content' => 'motorcycle/motorcycle_read',
        'title' => 'Motor',
	    );
            $this->load->view('template/main', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('motorcycle'));
        }
    }

    public function create() 
    {
        $this->Security_model->get_security();
        $data = array(
            'button' => 'Create',
            'action' => site_url('motorcycle/create_action'),
	    'id' => set_value('id'),
	    'nama_mtr' => set_value('nama_mtr'),
	    'jenis_mtr' => set_value('jenis_mtr'),
	    'gambar' => set_value('gambar'),
	    'keterangan' => set_value('keterangan'),
        'content' => 'motorcycle/motorcycle_form',
        'title' => 'Motor',
	);
        $this->load->view('template/main', $data);
    }
    
    public function create_action() 
    {
        $this->form_validation->set_rules('nama_mtr','nama motor','required|trim|is_unique[motorcycle.nama_mtr]');
        $this->form_validation->set_rules('jenis_mtr', 'jenis mtr', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            //load library file upload
            $config['upload_path']         = 'uploads/motorcycle';
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
                    'nama_mtr' => set_value('nama_mtr'),
                    'jenis_mtr' => set_value('jenis_mtr'),
                    'keterangan' => set_value('keterangan'),
                    'gambar' => $gambar['file_name'],
                );
                $this->Motorcycle_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('motorcycle'));
            }
        }
    }
    
    public function update($id) 
    {
        $this->Security_model->get_security();
        $row = $this->Motorcycle_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('motorcycle/update_action'),
		'id' => set_value('id', $row->id),
		'nama_mtr' => set_value('nama_mtr', $row->nama_mtr),
		'jenis_mtr' => set_value('jenis_mtr', $row->jenis_mtr),
		'gambar' => set_value('gambar', $row->gambar),
		'keterangan' => set_value('keterangan', $row->keterangan),
        'content' => 'motorcycle/motorcycle_form',
        'title' => 'Motor',
	    );
            $this->load->view('template/main', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('motorcycle'));
        }
    }
    
    public function update_action() 
    {
        $this->form_validation->set_rules('nama_mtr','nama motor','required');
        $this->form_validation->set_rules('jenis_mtr', 'jenis mtr', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            //load library file upload
            $config['upload_path']         = 'uploads/motorcycle';
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
                    'nama_mtr' => set_value('nama_mtr'),
                    'jenis_mtr' => set_value('jenis_mtr'),
                    'keterangan' => set_value('keterangan'),
                    'gambar' => $gambar['file_name'],
                );
                $this->Motorcycle_model->update($this->input->post('id', TRUE), $data);
                $this->session->set_flashdata('message', 'Update Record Success');
                redirect(site_url('motorcycle'));
            }
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Motorcycle_model->get_by_id($id);

        if ($row) {
            $this->Motorcycle_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('motorcycle'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('motorcycle'));
        }
    }
}

/* End of file Motorcycle.php */
/* Location: ./application/controllers/Motorcycle.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-14 19:24:29 */
/* http://harviacode.com */