<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Site_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$products 		 = $this->Site_model->get_data_products();
		$motorcycle	 	 = $this->Site_model->get_data_motorcycle();
		$safety_riding	 	 = $this->Site_model->get_data_safety_riding();
		$sales_promotion	 	 = $this->Site_model->get_data_sales_promotion();
		$corporate	 	 = $this->Site_model->get_data_corporate();
		
		$config = array(
			'products_data' => $products,
			'safety_riding_data' => $safety_riding,
			'sales_promotion_data' => $sales_promotion,
			'corporate_data' => $corporate,
			// 'motorcycle_data' => $motorcycle,
			'title' => 'PT. Hayati Pratama Mandiri',
            'content' => 'site/index',
        );

		$this->load->view('template/main',$config);
	}

	public function about()
	{
		$config = array(
			'title' => 'Tentang',
            'content' => 'about/about',
        );
        $this->load->view('template/main',$config);
	}

	public function signin()
	{
		$config = array(
			'button' => 'Sign In',
			'action' => site_url('site/auth'),
			'title' => 'Sign In',
            'content' => 'site/signin',
        );
        $this->load->view('template/main',$config);
	}

	public function auth()
	{
		$this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->signin();
        } else {
        	$usr = $this->input->post('username');
			$pwd = $this->input->post('password');

			$this->Site_model->get_auth($usr, $pwd);
        }
	}

	public function signout()
	{
		$this->session->sess_destroy();
		redirect('site');
	}

	public function _rules() 
    {
	$this->form_validation->set_rules('username', 'username', 'trim|required');
	$this->form_validation->set_rules('password', 'password', 'trim|required');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Site.php */
/* Location: ./application/controllers/Site.php */