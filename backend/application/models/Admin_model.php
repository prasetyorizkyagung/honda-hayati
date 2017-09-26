<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function get_data_products()
	{
		$this->db->order_by('id','DESC');
		$this->db->limit(2);
        return $this->db->get('products')->result();
	}

	public function get_data_sales_promotion()
	{
		$this->db->order_by('id','DESC');
		$this->db->limit(2);
        return $this->db->get('sales_promotion')->result();
	}

	public function get_data_safety_riding()
	{
		$this->db->order_by('id','DESC');
		$this->db->limit(2);
        return $this->db->get('safety_riding')->result();
	}

	public function get_data_corporate()
	{
		$this->db->order_by('id','DESC');
		$this->db->limit(2);
        return $this->db->get('corporate')->result();
	}

	public function get_data_dealer()
	{
		$this->db->order_by('id','DESC');
		$this->db->limit(5);
        return $this->db->get('dealer')->result();
	}

	public function get_data_ahass()
	{
		$this->db->order_by('id','DESC');
		$this->db->limit(5);
        return $this->db->get('ahass')->result();
	}

	public function get_data_motorcycle()
	{
		$this->db->order_by('id','DESC');
		$this->db->limit(5);
        return $this->db->get('motorcycle')->result();
	}
}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */