<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Login_model extends CI_Model {

		public function cek_user($data) {
			return $this->db->get_where('tb_pengguna', $data)->num_rows();
			
		}

		public function select_user($data)
		{
			
			
			return $this->db->get_where('tb_pengguna', $data)->row();
		}
		public function update($tanggal, $username)
		{
			$this->db->where('username',$username);
			$this->db->set('login_terakhir',$tanggal);
			return $this->db->update('tb_pengguna');
		}

	}

?>