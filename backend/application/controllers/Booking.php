<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Booking extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Booking_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'booking/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'booking/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'booking/index.html';
            $config['first_url'] = base_url() . 'booking/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Booking_model->total_rows($q);
        $booking = $this->Booking_model->get_limit_data($config['per_page'], $start, $q);
        

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'booking_data' => $booking,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            'content' => 'booking/booking_list',
            'title' => 'Booking',
            'refresh' => '<meta http-equiv="refresh" content="10">',
        );
        $this->load->view('template/bengkel/main', $data);
    }
       

    public function read($id) 
    {
        $row = $this->Booking_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'nama_konsumen' => $row->nama_konsumen,
		'plat_nomor' => $row->plat_nomor,
		'no_telp' => $row->no_telp,
		'nama_mtr' => $row->nama_mtr,
		'jenis_service' => $row->jenis_service,
		'tgl_booking' => $row->tgl_booking,
		'jam_booking' => $row->jam_booking,
		'activated' => $row->activated,
        'content' => 'booking/booking_read',
        'title' => 'Booking',
        'refresh' =>''
	    );
            $this->load->view('template/bengkel/main', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('booking'));
        }
    }

    public function create() 
    {
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
        'content' => 'booking/booking_form',
        'title' => 'Booking',
        'refresh' => '',
        // 'count_time' => $zxc
	);
        $this->load->view('template/bengkel/main', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $nama_konsumen = $this->input->post('nama_konsumen',TRUE);
            $plat_nomor = $this->input->post('plat_nomor',TRUE);
            $no_telp = $this->input->post('no_telp',TRUE);
            $nama_mtr = $this->input->post('nama_mtr',TRUE);
            $jenis_service = $this->input->post('jenis_service',TRUE);
            $tgl_booking = $this->input->post('tgl_booking',TRUE);
            $jam_booking = $this->input->post('jam_booking',TRUE);
            //-------------------------------------------------------------------------------------
            $query = $this->db->query('SELECT id FROM booking ORDER BY id DESC LIMIT 1');
            // $query = $this->db->query('SELECT * FROM booking WHERE plat_nomor = $plat_nomor');
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
            //---------------------------------------------------------------------------------------
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
            redirect(site_url('booking'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Booking_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('booking/update_action'),
		'id' => set_value('id', $row->id),
		'nama_konsumen' => set_value('nama_konsumen', $row->nama_konsumen),
		'plat_nomor' => set_value('plat_nomor', $row->plat_nomor),
		'no_telp' => set_value('no_telp', $row->no_telp),
		'nama_mtr' => set_value('nama_mtr', $row->nama_mtr),
		'jenis_service' => set_value('jenis_service', $row->jenis_service),
		'tgl_booking' => set_value('tgl_booking', $row->tgl_booking),
		'jam_booking' => set_value('jam_booking', $row->jam_booking),
		'activated' => set_value('activated', $row->activated),
        'content' => 'booking/booking_form',
        'title' => 'Booking',
        'refresh' => '',
	    );
            $this->load->view('template/bengkel/main', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('booking'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'nama_konsumen' => $this->input->post('nama_konsumen',TRUE),
		'plat_nomor' => $this->input->post('plat_nomor',TRUE),
		'no_telp' => $this->input->post('no_telp',TRUE),
		'nama_mtr' => $this->input->post('nama_mtr',TRUE),
		'jenis_service' => $this->input->post('jenis_service',TRUE),
		'tgl_booking' => $this->input->post('tgl_booking',TRUE),
		'jam_booking' => $this->input->post('jam_booking',TRUE),
		'activated' => $this->input->post('activated',TRUE),
	    );

            $this->Booking_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('booking'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Booking_model->get_by_id($id);

        if ($row) {
            $this->Booking_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('booking'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('booking'));
        }
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

     public function app_booking($id) 
    {
        $data = array(
            'actived' => $this->session->userdata('id'),
        );

        $this->Booking_model->appapprove($id,$data);
        $this->session->set_flashdata('message', 'activated Record Success');
        redirect(site_url('booking'));
    }

    public function btl_booking($id) 
    {
        $data = array(
            'activated' => $this->session->userdata('id'),
        );

        $this->Booking_model->btlapprove($id,$data);
        $this->session->set_flashdata('message', 'activated Record Success');
        redirect(site_url('booking'));
    }
}

/* End of file Booking.php */
/* Location: ./application/controllers/Booking.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-09-17 18:17:27 */
/* http://harviacode.com */