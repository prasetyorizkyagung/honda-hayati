<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Konsumen_model extends CI_Model {

	public $table = 'konsumen';
    public $id = 'id';
    public $order = 'DESC';

	public function __construct()
	{
		parent::__construct();
		
	}

	// insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

}

/* End of file Konsumen_model.php */
/* Location: ./application/models/Konsumen_model.php */