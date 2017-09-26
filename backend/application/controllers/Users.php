<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->library('form_validation');
        $this->load->model('Security_model');
    }

    public function index()
    {
        $this->Security_model->get_security();
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'users/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'users/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'users/index.html';
            $config['first_url'] = base_url() . 'users/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Users_model->total_rows($q);
        $users = $this->Users_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'users_data' => $users,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'users/users_list',
            'title' => 'Users',
        );
        $this->load->view('template/main', $data);
    }

    public function read($id) 
    {
        $this->Security_model->get_security();
        $row = $this->Users_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama' => $row->nama,
		'username' => $row->username,
		'password' => $row->password,
		'no_telp' => $row->no_telp,
		'email' => $row->email,
		'status' => $row->status,
        'content' => 'users/users_read',
            'title' => 'Users',
	    );
            $this->load->view('template/main', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }

    public function create() 
    {
        $this->Security_model->get_security();
        $data = array(
            'button' => 'Create',
            'action' => site_url('users/create_action'),
	    'id' => set_value('id'),
	    'nama' => set_value('nama'),
	    'username' => set_value('username'),
	    'password' => set_value('password'),
	    'no_telp' => set_value('no_telp'),
	    'email' => set_value('email'),
	    'status' => set_value('status'),
        'content' => 'users/users_form',
        'title' => 'Users',
	);
        $this->load->view('template/main', $data);
    }
    
    public function create_action() 
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('username','username','required|trim|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('no_telp', 'no telp', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('status', 'status', 'trim|required');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $nama       = $this->input->post('nama',TRUE);
            $username   = $this->input->post('username',TRUE);
            $password   =  $this->input->post('password',TRUE);
            $passwords  = md5($password);
            $no_telp    = $this->input->post('no_telp',TRUE);
            $email      = $this->input->post('email',TRUE);
            $status     = $this->input->post('status',TRUE);
            $data = array(
        		'nama' => $nama,
        		'username' => $username,
        		'password' => $passwords,
        		'no_telp' => $no_telp,
        		'email' => $email,
        		'status' => $status,
    	    );
            $this->Users_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('users'));
        }
    }
    
    public function update($id) 
    {
        $this->Security_model->get_security();
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('users/update_action'),
		'id' => set_value('id', $row->id),
		'nama' => set_value('nama', $row->nama),
		'username' => set_value('username', $row->username),
		'password' => set_value('password', $row->password),
		'no_telp' => set_value('no_telp', $row->no_telp),
		'email' => set_value('email', $row->email),
		'status' => set_value('status', $row->status),
        'content' => 'users/users_form',
        'title' => 'Users',
	    );
            $this->load->view('template/main', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }
    
    public function update_action() 
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('username','username','trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('no_telp', 'no telp', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('status', 'status', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $nama       = $this->input->post('nama',TRUE);
            $username   = $this->input->post('username',TRUE);
            $password   =  $this->input->post('password',TRUE);
            $passwords  = md5($password);
            $no_telp    = $this->input->post('no_telp',TRUE);
            $email      = $this->input->post('email',TRUE);
            $status     = $this->input->post('status',TRUE);
            $data = array(
                'nama' => $nama,
                'username' => $username,
                'password' => $passwords,
                'no_telp' => $no_telp,
                'email' => $email,
                'status' => $status,
            );
            $this->Users_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('users'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Users_model->get_by_id($id);

        if ($row) {
            $this->Users_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('users'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('users'));
        }
    }
}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-14 19:52:20 */
/* http://harviacode.com */