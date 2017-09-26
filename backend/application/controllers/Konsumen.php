<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Konsumen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Konsumen_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'konsumen/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'konsumen/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'konsumen/index.html';
            $config['first_url'] = base_url() . 'konsumen/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Konsumen_model->total_rows($q);
        $konsumen = $this->Konsumen_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'konsumen_data' => $konsumen,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'konsumen/konsumen_list',
            'title' => 'Konsumen',
            'refresh' => '<meta http-equiv="refresh" content="10">',
        );
        $this->load->view('template/bengkel/main', $data);
    }

    public function read($id) 
    {
        $row = $this->Konsumen_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama_konsumen' => $row->nama_konsumen,
		'username' => $row->username,
		'password' => $row->password,
		'no_telp' => $row->no_telp,
		'email' => $row->email,
		'alamat' => $row->alamat,
		'activated' => $row->activated,
        'content' => 'konsumen/konsumen_read',
        'title' => 'Konsumen',
        'refresh' => '',
	    );
            $this->load->view('template/bengkel/main', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('konsumen'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('konsumen/create_action'),
	    'id' => set_value('id'),
	    'nama_konsumen' => set_value('nama_konsumen'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'no_telp' => set_value('no_telp'),
	    'email' => set_value('email'),
	    'alamat' => set_value('alamat'),
	    'activated' => set_value('activated'),
        'content' => 'konsumen/konsumen_form',
        'title' => 'Konsumen',
        'refresh' => '',
	);
        $this->load->view('template/bengkel/main', $data);
    }
    
    public function create_action() 
    {
        $this->form_validation->set_rules('nama_konsumen', 'nama konsumen', 'trim|required');
        $this->form_validation->set_rules('username','username','required|trim|is_unique[konsumen.username]');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('no_telp', 'no telp', 'trim|required');
        $this->form_validation->set_rules('email','email','required|trim|is_unique[konsumen.email]');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $nama_konsumen = $this->input->post('nama_konsumen',TRUE);
            $username = $this->input->post('username',TRUE);
            $password = $this->input->post('password',TRUE);
            $passwords = md5($password);
            $no_telp = $this->input->post('no_telp',TRUE);
            $email = $this->input->post('email',TRUE);
            $alamat = $this->input->post('alamat',TRUE);
            $data = array(
                'nama_konsumen' => $nama_konsumen,
                'username' => $username,
                'password' => $passwords,
                'no_telp' => $no_telp,
                'email' => $email,
                'alamat' => $alamat,
                'activated' => '',
            );
            $this->Konsumen_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('konsumen'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Konsumen_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('konsumen/update_action'),
		'id' => set_value('id', $row->id),
		'nama_konsumen' => set_value('nama_konsumen', $row->nama_konsumen),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
		'no_telp' => set_value('no_telp', $row->no_telp),
		'email' => set_value('email', $row->email),
		'alamat' => set_value('alamat', $row->alamat),
		'activated' => set_value('activated', $row->activated),
        'content' => 'konsumen/konsumen_form',
        'title' => 'Konsumen',
        'refresh' => '',
	    );
            $this->load->view('template/bengkel/main', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('konsumen'));
        }
    }
    
    public function update_action() 
    {
        $this->form_validation->set_rules('nama_konsumen', 'nama konsumen', 'trim|required');
        $this->form_validation->set_rules('username','username','required|trim');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('no_telp', 'no telp', 'trim|required');
        $this->form_validation->set_rules('email','email','required|trim');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $nama_konsumen = $this->input->post('nama_konsumen',TRUE);
            $username = $this->input->post('username',TRUE);
            $password = $this->input->post('password',TRUE);
            $passwords = md5($password);
            $no_telp = $this->input->post('no_telp',TRUE);
            $email = $this->input->post('email',TRUE);
            $alamat = $this->input->post('alamat',TRUE);
            $data = array(
        		'nama_konsumen' => $nama_konsumen,
        		'username' => $username,
        		'password' => $passwords,
        		'no_telp' => $no_telp,
        		'email' => $email,
        		'alamat' => $alamat,
        		'activated' => '',
        	);
            $this->Konsumen_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('konsumen'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Konsumen_model->get_by_id($id);

        if ($row) {
            $this->Konsumen_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('konsumen'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('konsumen'));
        }
    }

    public function app_konsumen($id) 
    {
        $data = array(
            'activated' => $this->session->userdata('id'),
        );

        $this->Konsumen_model->appapprove($id,$data);
        $this->session->set_flashdata('message', 'activated Record Success');
        redirect(site_url('konsumen'));
    }

    public function btl_konsumen($id) 
    {
        $data = array(
            'activated' => $this->session->userdata('id'),
        );

        $this->Konsumen_model->btlapprove($id,$data);
        $this->session->set_flashdata('message', 'activated Record Success');
        redirect(site_url('konsumen'));
    }
}

/* End of file Konsumen.php */
/* Location: ./application/controllers/Konsumen.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-15 12:41:45 */
/* http://harviacode.com */