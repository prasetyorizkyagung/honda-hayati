<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Safety_riding extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Safety_riding_model');
        $this->load->library('form_validation');
        $this->load->model('Security_model');
    }

    public function index()
    {
        $this->Security_model->get_security();
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'safety_riding/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'safety_riding/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'safety_riding/index.html';
            $config['first_url'] = base_url() . 'safety_riding/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Safety_riding_model->total_rows($q);
        $safety_riding = $this->Safety_riding_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'safety_riding_data' => $safety_riding,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'safety_riding/safety_riding_list',
            'title' => 'Safety Riding',
        );
        $this->load->view('template/main', $data);
    }

    public function read($id) 
    {
        $this->Security_model->get_security();
        $row = $this->Safety_riding_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'judul' => $row->judul,
		'tgl_upload' => $row->tgl_upload,
		'gambar' => $row->gambar,
		'ket_safety_riding' => $row->ket_safety_riding,
        'content' => 'safety_riding/safety_riding_read',
        'title' => 'Safety Riding',
	    );
            $this->load->view('template/main', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('safety_riding'));
        }
    }

    public function create() 
    {
        $this->Security_model->get_security();
        $data = array(
            'button' => 'Create',
            'action' => site_url('safety_riding/create_action'),
	    'id' => set_value('id'),
	    'judul' => set_value('judul'),
	    'tgl_upload' => set_value('tgl_upload'),
	    'gambar' => set_value('gambar'),
	    'ket_safety_riding' => set_value('ket_safety_riding'),
        'content' => 'safety_riding/safety_riding_form',
        'title' => 'Safety Riding',
	);
        $this->load->view('template/main', $data);
    }
    
    public function create_action() 
    {
        $this->form_validation->set_rules('judul','judul','required|trim|is_unique[products.judul]');
        $this->form_validation->set_rules('tgl_upload', 'tgl upload', 'trim|required');
        $this->form_validation->set_rules('ket_safety_riding', 'ket safety riding', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            //load library file upload
            $config['upload_path']         = '../uploads/safety_riding/';
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
                    'ket_safety_riding' => set_value('ket_safety_riding'),
                    'gambar' => $gambar['file_name'], 
                );
                $this->Safety_riding_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('safety_riding'));
            }
        }
    }
    
    public function update($id) 
    {
        $this->Security_model->get_security();
        $row = $this->Safety_riding_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('safety_riding/update_action'),
		'id' => set_value('id', $row->id),
		'judul' => set_value('judul', $row->judul),
		'tgl_upload' => set_value('tgl_upload', $row->tgl_upload),
		'gambar' => set_value('gambar', $row->gambar),
		'ket_safety_riding' => set_value('ket_safety_riding', $row->ket_safety_riding),
        'content' => 'safety_riding/safety_riding_form',
        'title' => 'Safety Riding',
	    );
            $this->load->view('template/main', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('safety_riding'));
        }
    }
    
    public function update_action() 
    {
        $this->form_validation->set_rules('judul','judul','required');
        $this->form_validation->set_rules('tgl_upload', 'tgl upload', 'trim|required');
        $this->form_validation->set_rules('ket_safety_riding', 'ket safety riding', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            //load library file upload
            $config['upload_path']         = '../uploads/safety_riding/';
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
                    'ket_safety_riding' => set_value('ket_safety_riding'),
                    'gambar' => $gambar['file_name'], 
                );
                $this->Safety_riding_model->update($this->input->post('id', TRUE), $data);
                $this->session->set_flashdata('message', 'Update Record Success');
                redirect(site_url('safety_riding'));
            }
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Safety_riding_model->get_by_id($id);

        if ($row) {
            $this->Safety_riding_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('safety_riding'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('safety_riding'));
        }
    }
}

/* End of file Safety_riding.php */
/* Location: ./application/controllers/Safety_riding.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-14 16:42:07 */
/* http://harviacode.com */