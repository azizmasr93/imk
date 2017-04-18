<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		// if ($this->session->userdata('SESS_MEMBER_IS_LOGIN') && $this->session->userdata('SESS_MEMBER_USER_PRIV') === 1) {
		// 	redirect(base_url('home'));
		// }

		$this->load->model('login_model');
	}

	public function index()
	{
		$this->load->helper('date');
		date_default_timezone_set('Asia/Jakarta');
		$tanggal = date('Y-m-d H:i:s');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		// $this->form_validation->set_rules('tanggal', 'tanggal', 'trim|required|xss_clean');


		if ($this->form_validation->run() === FALSE) {
			
			$this->load->view('login');
			
		} else {
			
			$pwd = md5($this->input->post('password'));
			$data = array(
				'username' => $this->input->post('username'),
				'password'	 => $pwd,
			);
			$username = $this->input->post('username');
			if ($this->login_model->cek_user($data) > 0) {
				$user = $this->login_model->select_user($data);

				if ($user->hak_akses == 1) {
					$session = array(
						'SESS_MEMBER_ID_USER' => $user->id_user,
						'SESS_MEMBER_USER_NAME' => $user->username,
						'SESS_MEMBER_USER_PRIV' => 1,
						'SESS_MEMBER_IS_LOGIN' => TRUE
					);

					if ($this->login_model->update($tanggal, $username)) {
						$this->session->set_userdata( $session );
						redirect('home');
					}
					
					
				} else {
					// bukan admin, intinya user/email salah
					$this->session->set_flashdata('message', 'Username atau Password anda salah');
					redirect('login');
				}
			} else {
				// tidak ada data, sama saja user/email salah
				$this->session->set_flashdata('message', 'Username atau Password anda salah');
				redirect('login');
			}
		}
	}

	public function logout()
	{
		
		$this->load->view('logout');
	}

	public function logout_konfirm()
	{
		$this->session->sess_destroy();
		
		redirect(base_url('login'));
	}


}


/* End of file login.php */
/* Location: ./application/modules/member/controllers/login.php */