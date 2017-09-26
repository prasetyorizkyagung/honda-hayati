<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Konsumen_admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Konsumen_admin_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'konsumen_admin/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'konsumen_admin/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'konsumen_admin/index.html';
            $config['first_url'] = base_url() . 'konsumen_admin/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Konsumen_admin_model->total_rows($q);
        $konsumen_admin = $this->Konsumen_admin_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'konsumen_admin_data' => $konsumen_admin,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'konsumen_admin/konsumen_list',
            'title' => 'Konsumen',
        );
        $this->load->view('template/main', $data);
    }

    public function read($id) 
    {
        $row = $this->Konsumen_admin_model->get_by_id($id);
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
        'content' => 'konsumen_admin/konsumen_read',
        'title' => 'Konsumen',
	    );
            $this->load->view('template/main', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('konsumen_admin'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('konsumen_admin/create_action'),
	    'id' => set_value('id'),
	    'nama_konsumen' => set_value('nama_konsumen'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'no_telp' => set_value('no_telp'),
	    'email' => set_value('email'),
	    'alamat' => set_value('alamat'),
	    'activated' => set_value('activated'),
        'content' => 'konsumen_admin/konsumen_form',
        'title' => 'Konsumen',
	);
        $this->load->view('template/main', $data);
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
            $this->Konsumen_admin_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('konsumen_admin'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Konsumen_admin_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('konsumen_admin/update_action'),
		'id' => set_value('id', $row->id),
		'nama_konsumen' => set_value('nama_konsumen', $row->nama_konsumen),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
		'no_telp' => set_value('no_telp', $row->no_telp),
		'email' => set_value('email', $row->email),
		'alamat' => set_value('alamat', $row->alamat),
		'activated' => set_value('activated', $row->activated),
        'content' => 'konsumen_admin/konsumen_form',
        'title' => 'Konsumen',
	    );
            $this->load->view('template/main', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('konsumen_admin'));
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
            $this->Konsumen_admin_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('konsumen_admin'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Konsumen_admin_model->get_by_id($id);

        if ($row) {
            $this->Konsumen_admin_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('konsumen_admin'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('konsumen_admin'));
        }
    }

    public function app_konsumen($id) 
    {
        $data = array(
            'activated' => $this->session->userdata('id'),
        );

        $this->Konsumen_admin_model->appapprove($id,$data);
        $this->session->set_flashdata('message', 'Activated Record Success');
        redirect(site_url('konsumen_admin'));
    }

    public function btl_konsumen($id) 
    {
        $data = array(
            'activated' => $this->session->userdata('id'),
        );

        $this->Konsumen_admin_model->btlapprove($id,$data);
        $this->session->set_flashdata('message', 'Activated Record Success');
        redirect(site_url('konsumen_admin'));
    }

}

/* End of file Konsumen_admin.php */
/* Location: ./application/controllers/Konsumen_admin.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-20 10:33:15 */
/* http://harviacode.com */