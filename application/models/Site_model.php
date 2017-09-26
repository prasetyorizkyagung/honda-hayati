<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site_model extends CI_Model {

	public function get_auth($usr, $pwd)
	{
     	$pwds 	= md5($pwd);
     	$this->db->where('username',$usr);
     	$this->db->where('password',$pwds);
     	
     	$query	= $this->db->get('konsumen');
     	if ($query->num_rows()>0) 
     	{
     		foreach ($query->result() as $row) {
                    $activated = $row->activated;
                    if($activated =='activated')
                    {
                         $session_data = array(
                         'id' => $row->id, 
                         'nama_konsumen' => $row->nama_konsumen, 
                         'username' => $row->username, 
                         'password' => $row->password, 
                         'no_telp' => $row->no_telp, 
                         'email' => $row->email, 
                         'alamat' => $row->alamat,
                         'activated' => $row->activated
                         );
                         $this->session->set_userdata($session_data);
                         redirect('booking');
                    }
                    elseif ($activated=='') 
                    {
                        $this->session->set_flashdata('info', '<br>Username atau Password yang anda masukkan belum terdaftar.');
               			redirect('site/signin');
                    }
     			
     		}
     	}
     	else
     	{
     		$this->session->set_flashdata('info', '<br>Username atau Password yang anda masukkan salah.');
               redirect('site/signin');
     	}
	}

	public function get_data_products()
	{
		$this->db->order_by('id','DESC');
		$this->db->limit(2);
        return $this->db->get('products')->result();
	}

     public function get_data_motorcycle()
     {
          $this->db->order_by('id','DESC');
          $this->db->limit(2);
        return $this->db->get('motorcycle')->result();
     }

     public function get_data_safety_riding()
     {
          $this->db->order_by('id','DESC');
          $this->db->limit(2);
        return $this->db->get('safety_riding')->result();
     }

     public function get_data_sales_promotion()
     {
          $this->db->order_by('id','DESC');
          $this->db->limit(2);
        return $this->db->get('sales_promotion')->result();
     }

	public function get_data_corporate()
	{
		$this->db->order_by('id','DESC');
		$this->db->limit(2);
        return $this->db->get('corporate')->result();
	}
}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */