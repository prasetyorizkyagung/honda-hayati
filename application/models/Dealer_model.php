<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dealer_model extends CI_Model {

	public $table = 'dealer';
    public $id = 'id';
    public $order = 'DESC';

	public function __construct()
	{
		parent::__construct();
		
	}

	// get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
}

/* End of file Products_model.php */
/* Location: ./application/models/Products_model.php */