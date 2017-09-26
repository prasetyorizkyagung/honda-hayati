<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('Security_model');
	}

	public function index()
	{
		$this->Security_model->get_security();
		
		$products 		 = $this->Admin_model->get_data_products();
		$sales_promotion = $this->Admin_model->get_data_sales_promotion();
		$safety_riding 	 = $this->Admin_model->get_data_safety_riding();
		$corporate	 	 = $this->Admin_model->get_data_corporate();
		$dealer		 	 = $this->Admin_model->get_data_dealer();
		$ahass		 	 = $this->Admin_model->get_data_ahass();
		$motorcycle	 	 = $this->Admin_model->get_data_motorcycle();

		$config = array(
			'products_data' => $products,
			'sales_promotion_data' => $sales_promotion,
			'safety_riding_data' => $safety_riding,
			'corporate_data' => $corporate,
			'dealer_data' => $dealer,
			'ahass_data' => $ahass,
			'motorcycle_data' => $motorcycle,
			'title' => 'Halaman Utama',
            'content' => 'site/index',
        );

		$this->load->view('template/main',$config);
	}
}

/* End of file Admin_controller.php */
/* Location: ./application/controllers/Admin_controller.php */