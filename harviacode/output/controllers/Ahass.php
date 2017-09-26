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
    }

    public function index()
    {
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
        );
        $this->load->view('ahass/ahass_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Ahass_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama_ahass' => $row->nama_ahass,
		'alamat' => $row->alamat,
		'kota' => $row->kota,
		'no_telp' => $row->no_telp,
		'gambar' => $row->gambar,
	    );
            $this->load->view('ahass/ahass_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ahass'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('ahass/create_action'),
	    'id' => set_value('id'),
	    'nama_ahass' => set_value('nama_ahass'),
	    'alamat' => set_value('alamat'),
	    'kota' => set_value('kota'),
	    'no_telp' => set_value('no_telp'),
	    'gambar' => set_value('gambar'),
	);
        $this->load->view('ahass/ahass_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_ahass' => $this->input->post('nama_ahass',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'no_telp' => $this->input->post('no_telp',TRUE),
		'gambar' => $this->input->post('gambar',TRUE),
	    );

            $this->Ahass_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('ahass'));
        }
    }
    
    public function update($id) 
    {
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
	    );
            $this->load->view('ahass/ahass_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('ahass'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nama_ahass' => $this->input->post('nama_ahass',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'kota' => $this->input->post('kota',TRUE),
		'no_telp' => $this->input->post('no_telp',TRUE),
		'gambar' => $this->input->post('gambar',TRUE),
	    );

            $this->Ahass_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('ahass'));
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

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_ahass', 'nama ahass', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('kota', 'kota', 'trim|required');
	$this->form_validation->set_rules('no_telp', 'no telp', 'trim|required');
	$this->form_validation->set_rules('gambar', 'gambar', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Ahass.php */
/* Location: ./application/controllers/Ahass.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-19 09:37:34 */
/* http://harviacode.com */