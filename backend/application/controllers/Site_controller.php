<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Site_model');
        $this->load->library('form_validation');
        $this->load->model('Security_model');
	}

	public function index()
	{
		$data['action'] = site_url('Site_controller/auth'); 
		$this->load->view('login/login',$data);
	}

	public function auth()
	{
		$this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
        	$usr = $this->input->post('username');
			$pwd = $this->input->post('password');

			$this->Site_model->get_auth($usr, $pwd);
        }
	}

	public function signout()
	{
		$this->session->sess_destroy();
		redirect('Site_controller');
	}

	public function _rules() 
    {
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Site_controller.php */
/* Location: ./application/controllers/Site_controller.php */