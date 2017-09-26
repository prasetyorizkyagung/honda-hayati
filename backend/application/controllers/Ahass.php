<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ahass extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Ahass_model');
        $this->load->library('form_validation');
        $this->load->model('Security_model');
    }

    public function index()
    {
        $this->Security_model->get_security();
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'ahass/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'ahass/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'ahass/index.html';
            $config['first_url'] = base_url() . 'ahass/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Ahass_model->total_rows($q);
        $ahass = $this->Ahass_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'ahass_data' => $ahass,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'ahass/ahass_list',
            'title' => 'AHASS',
        );
        $this->load->view('template/main', $data);
    }

    public function read($id) 
    {
        $this->Security_model->get_security();
        $row = $this->Ahass_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama_ahass' => $row->nama_ahass,
		'alamat' => $row->alamat,
		'kota' => $row->kota,
		'no_telp' => $row->no_telp,
		'gambar' => $row->gambar,
        'content' => 'ahass/ahass_read',
        'title' => 'AHASS',
	    );
            $this->load->view('template/main', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ahass'));
        }
    }

    public function create() 
    {
        $this->Security_model->get_security();
        $data = array(
            'button' => 'Create',
            'action' => site_url('ahass/create_action'),
	    'id' => set_value('id'),
	    'nama_ahass' => set_value('nama_ahass'),
	    'alamat' => set_value('alamat'),
	    'kota' => set_value('kota'),
	    'no_telp' => set_value('no_telp'),
	    'gambar' => set_value('gambar'),
        'content' => 'ahass/ahass_form',
        'title' => 'AHASS',
	);
        $this->load->view('template/main', $data);
    }
    
    public function create_action() 
    {
        $this->form_validation->set_rules('nama_ahass','nama ahass','required|trim|is_unique[ahass.nama_ahass]');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('kota', 'kota', 'trim|required');
        $this->form_validation->set_rules('no_telp', 'no telp', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            //load library file upload
            $config['upload_path']         = '../uploads/jaringan/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 9072;
            $config['max_width']            = 9000;
            $config['max_height']           = 9000;

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
                    'nama_ahass' => set_value('nama_ahass'),
                    'alamat' => set_value('alamat'),
                    'kota' => set_value('kota'),
                    'no_telp' => set_value('no_telp'),
                    'gambar' => $gambar['file_name'],
                );
                $this->Ahass_model->insert($data);
                $this->session->set_flashdata('message', 'Create Record Success');
                redirect(site_url('ahass'));
            }
        }
    }
    
    public function update($id) 
    {
        $this->Security_model->get_security();
        $row = $this->Ahass_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('ahass/update_action'),
		'id' => set_value('id', $row->id),
		'nama_ahass' => set_value('nama_ahass', $row->nama_ahass),
		'alamat' => set_value('alamat', $row->alamat),
		'kota' => set_value('kota', $row->kota),
		'no_telp' => set_value('no_telp', $row->no_telp),
		'gambar' => set_value('gambar', $row->gambar),
        'content' => 'ahass/ahass_form',
        'title' => 'AHASS',
	    );
            $this->load->view('template/main', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ahass'));
        }
    }
    
    public function update_action() 
    {
        $this->form_validation->set_rules('nama_ahass','nama ahass','required|trim');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('kota', 'kota', 'trim|required');
        $this->form_validation->set_rules('no_telp', 'no telp', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            //load library file upload
            $config['upload_path']         = '../uploads/jaringan/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 9072;
            $config['max_width']            = 9000;
            $config['max_height']           = 9000;

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
                    'nama_ahass' => set_value('nama_ahass'),
                    'alamat' => set_value('alamat'),
                    'kota' => set_value('kota'),
                    'no_telp' => set_value('no_telp'),
                    'gambar' => $gambar['file_name'],
                );
                $this->Ahass_model->update($this->input->post('id', TRUE), $data);
                $this->session->set_flashdata('message', 'Update Record Success');
                redirect(site_url('ahass'));
            }
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Ahass_model->get_by_id($id);

        if ($row) {
            $this->Ahass_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('ahass'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ahass'));
        }
    }
}

/* End of file Ahass.php */
/* Location: ./application/controllers/Ahass.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-14 18:16:33 */
/* http://harviacode.com */