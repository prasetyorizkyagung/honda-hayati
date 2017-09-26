<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Konsumen extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Konsumen_model');
        $this->load->library('form_validation');
	}

	public function index()
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
            'title' => 'Konsumen',
            'content' => 'konsumen/konsumen_form',
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

            $this->Konsumen_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('konsumen/message'));
        }
    }

    public function message()
    {
    	$data = array(
    		'title' => 'Konsumen',
    		'content' => 'konsumen/message',
    	);
    	$this->load->view('template/main',$data);
    }
}

/* End of file Konsumen.php */
/* Location: ./application/controllers/Konsumen.php */