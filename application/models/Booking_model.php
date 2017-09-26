s<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booking_model extends CI_Model {

	public $table = 'booking';
    public $id = 'id';
    public $order = 'DESC';

	public function __construct()
	{
		parent::__construct();
		
	}

    function get_booking($tgl_booking,$jam_booking) {

        $this->db->where('tgl_booking',$tgl_booking);
        $this->db->where('jam_booking',$jam_booking);

        $q_date = $this->db->query('SELECT tgl_booking FROM booking WHERE tgl_booking="'.$tgl_booking.'"');

        if ($q_date->num_rows()>28) 
        {
            foreach ($q_date->result() as $row) 
            {
                $this->session->set_flashdata('info', '<span class="text-danger">Booking Untuk Tanggal Yang Anda Pilih Penuh, Silahkan Pilih Tanggal Lain.</span>');
                redirect('booking/index');
            }
        }
        else {
            $q_time = $this->db->query('SELECT tgl_booking, jam_booking FROM booking WHERE tgl_booking="'.$tgl_booking.'" AND jam_booking="'.$jam_booking.'"');
            if ($q_time->num_rows()>4) 
            {
                foreach ($q_time->result() as $row) {
                    $this->session->set_flashdata('jam', '<span class="text-danger">Booking Untuk Jam Yang Anda Pilih Penuh, Silahkan Pilih Jam Lain.</span>');
                redirect('booking/index');
                }
            }
        }
    }

	// get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->limit(1);
        return $this->db->get($this->table)->result();
    }

	// insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }
}

/* End of file Booking_model.php */
/* Location: ./application/models/Booking_model.php */