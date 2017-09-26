<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales_promotion_model extends CI_Model {

	public $table = 'sales_promotion';
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

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
}

/* End of file Sales_promotion_model.php */
/* Location: ./application/models/Sales_promotion_model.php */