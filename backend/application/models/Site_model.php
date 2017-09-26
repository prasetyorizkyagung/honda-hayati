<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site_model extends CI_Model {

	public function get_auth($usr, $pwd)
	{
     	$pwds 	= md5($pwd);
     	$this->db->where('username',$usr);
     	$this->db->where('password',$pwds);
     	
     	$query	= $this->db->get('users');
     	if ($query->num_rows()>0) 
     	{
     		foreach ($query->result() as $row) {
                    $status = $row->status;
                    if($status=='admin')
                    {
                         $session_data = array(
                         'id' => $row->id, 
                         'nama' => $row->nama, 
                         'username' => $row->username, 
                         'password' => $row->password, 
                         'no_telp' => $row->no_telp, 
                         'email' => $row->email, 
                         'status' => $row->status
                         );
                         $this->session->set_userdata($session_data);
                         redirect('admin');
                    }
                    elseif ($status=='bengkel') 
                    {
                         $session_data = array(
                         'id' => $row->id, 
                         'nama' => $row->nama, 
                         'username' => $row->username, 
                         'password' => $row->password, 
                         'no_telp' => $row->no_telp, 
                         'email' => $row->email, 
                         'status' => $row->status
                         );
                         $this->session->set_userdata($session_data);
                         redirect('bengkel');
                    }
     			
     		}
     	}
     	else
     	{
     		$this->session->set_flashdata('info', '<br>Username atau Password yang anda masukkan salah.');
               redirect('Site_controller');
     	}
	}

}

/* End of file Site_model.php */
/* Location: ./application/models/Site_model.php */