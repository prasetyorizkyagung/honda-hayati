<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booking extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Booking_model');
		$this->load->model('Security_model');
	}

	public function index()
	{
		$this->Security_model->get_security();

        $tgl_booking = set_value('tgl_booking');
        $jam_booking = set_value('jam_booking');
        $this->Booking_model->get_booking($tgl_booking, $jam_booking);
        
		$data = array(
            'button' => 'Create',
            'action' => site_url('booking/create_action'),
		    'id' => set_value('id'),
		    'nama_konsumen' => set_value('nama_konsumen'),
		    'plat_nomor' => set_value('plat_nomor'),
		    'no_telp' => set_value('no_telp'),
		    'nama_mtr' => set_value('nama_mtr'),
		    'jenis_service' => set_value('jenis_service'),
		    'tgl_booking' => set_value('tgl_booking'),
		    'jam_booking' => set_value('jam_booking'),
		    'activated' => set_value('activated'),
		    'title' => 'Booking',
		    'content'=> 'booking/booking_form',
	);
        $this->load->view('template/main', $data);
    }

    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $nama_konsumen = $this->session->userdata('nama_konsumen');
            $plat_nomor = $this->input->post('plat_nomor',TRUE);
            $no_telp = $this->input->post('no_telp',TRUE);
            $nama_mtr = $this->input->post('nama_mtr',TRUE);
            $jenis_service = $this->input->post('jenis_service',TRUE);
            $tgl_booking = $this->input->post('tgl_booking',TRUE);
            $jam_booking = $this->input->post('jam_booking',TRUE);
            //------------------------------------------------------------------------------
            $query = $this->db->query('SELECT id FROM booking ORDER BY id DESC LIMIT 1');
            $cek = $query->num_rows();
            foreach ($query->result() as $row) {
                $id = $row->id;
            }
            if ($cek<>0) {
                $kode = intval($id)+1;
            }else{
                $kode = 1;
            }
            $kodemax = str_pad($kode, 5, "0", STR_PAD_LEFT);
            //------------------------------------------------------------------------------
            $this->Booking_model->get_booking($tgl_booking, $jam_booking);
            $data = array(
              'id' => $kodemax,
    		  'nama_konsumen' => $nama_konsumen,
	       	  'plat_nomor' => $plat_nomor,
		      'no_telp' => $no_telp,
		      'nama_mtr' => $nama_mtr,
		      'jenis_service' => $jenis_service,
		      'tgl_booking' => $tgl_booking,
		      'jam_booking' => $jam_booking,
		      'activated' => '',
	    );

            $this->Booking_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('booking/message'));
        }
    }

    public function message()
    {
    	$booking = $this->Booking_model->get_all();
    	$data = array(
    		'booking_data' => $booking,
    		'title' => 'Booking',
    		'content' => 'booking/message',
    	);
    	$this->load->view('template/main',$data);
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_konsumen', 'nama konsumen', 'trim|required');
	$this->form_validation->set_rules('plat_nomor', 'plat nomor', 'trim|required');
	$this->form_validation->set_rules('no_telp', 'no telp', 'trim|required');
	$this->form_validation->set_rules('nama_mtr', 'nama mtr', 'trim|required');
	$this->form_validation->set_rules('jenis_service', 'jenis service', 'trim|required');
	$this->form_validation->set_rules('tgl_booking', 'tgl booking', 'trim|required');
	$this->form_validation->set_rules('jam_booking', 'jam booking', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Booking.php */
/* Location: ./application/controllers/Booking.php */