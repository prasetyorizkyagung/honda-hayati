<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Excel_export_model extends CI_Model {

	function  fetch_data()
	{
		$this->db->order_by("id","ASC");
		$query = $this->db->query("SELECT * FROM `booking` WHERE tgl_booking=DATE(NOW()) AND activated='activated'");
		return $query->result();
	}

}

/* End of file Excel_export_model.php */
/* Location: ./application/models/Excel_export_model.php */
