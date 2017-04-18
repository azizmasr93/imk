<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Anggota extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('SESS_MEMBER_IS_LOGIN') || ($this->session->userdata('SESS_MEMBER_IS_LOGIN') && $this->session->userdata('SESS_MEMBER_USER_PRIV') !== 1)) 
        {
            redirect(base_url('login'));
        }
		
		$this->load->model('anggota_model');
	}

	public function index()
	{
		// ambil semua data
		$data['list'] = $this->anggota_model->all();

		// load view
		$this->load->view('global/head');
		$this->load->view('list_anggota', $data);
		$this->load->view('global/foot');
	}

	public function add()
	{
		// bikin rule validation
		$this->form_validation->set_rules('nama', 'nama', 'trim|xss_clean');
		$this->form_validation->set_rules('umur', 'umur', 'trim|xss_clean');
		$this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|xss_clean');
		$this->form_validation->set_rules('no_hp', 'no_hp', 'trim|xss_clean');
		$this->form_validation->set_rules('stat', 'stat', 'trim|xss_clean');

		// cek apakah validation is run
		if ($this->form_validation->run() === FALSE) {
			// tampilkan form
			redirect(base_url('anggota'));
		} else {
			// lakukan logic buat add
			
			$nama = $this->input->post('nama');
			$umur = $this->input->post('umur');
			$pekerjaan = $this->input->post('pekerjaan');
			$no_hp = $this->input->post('no_hp');
			$stat = $this->input->post('stat');
			
			// masukkan ke array data untuk di pass ke model agar di masukkan ke database
			$data = array(
				'nama' => $nama ,
				'umur' => $umur , 
				'pekerjaan' => $pekerjaan ,
				'no_hp' => $no_hp ,
				'stat' => '1' 
				// kalau lebih dari satu, pisahkan dengan koma (,)
			);

			if ($this->anggota_model->add($data)) {
				// set message berhasil
				$this->session->set_flashdata('message', 'Data anda berhasil dimasukkan');

				// arahkan ke list
				redirect(base_url('anggota'));
			} else {
				// set message gagal
				$this->session->set_flashdata('message', 'Data anda gagal dimasukkan');

				// arahkan ke form untuk diisi kembali
				redirect(base_url('anggota'));
			}
		}
	}

	// public function detail($id)
	// {
	// 	// ambil data dari database yang mempunyai id = $id
	// 	$variabel_bebas = $this->ex_model->find($id);

	// 	// cek terlebih dahulu apakah data tersebut ada atau tidak
	// 	if ($variabel_bebas) {
	// 		// load view
	// 		$this->load->view('path/to/view', $data);
	// 	} else {
	// 		// kalau tidak ada arahkan ke list
	// 		redirect(base_url('path_ke_list'));
	// 	}
	// }

	public function update()
	{
		// bikin rule validation
			
			$this->form_validation->set_rules('nama', 'nama', 'trim|xss_clean');
			$this->form_validation->set_rules('umur', 'umur', 'trim|xss_clean');
			$this->form_validation->set_rules('pekerjaan', 'pekerjaan', 'trim|xss_clean');
			$this->form_validation->set_rules('no_hp', 'pekerjaan', 'trim|xss_clean');
			
		
			// cek apakah validation is run
			if ($this->form_validation->run() === FALSE) {
				//tidak memenuhi syarat
				
			} else {
				
			
				// masukkan ke array data untuk di pass ke model agar di masukkan ke database
				$data = array(
					
					'nama' => $this->input->post('nama'),
					'umur' => $this->input->post('umur'),
					'pekerjaan' => $this->input->post('pekerjaan'),
					'no_hp' => $this->input->post('no_hp')
					 // kalau lebih dari satu, pisahkan dengan koma (,)
				);

				if ($this->anggota_model->update($this->input->post('id'),$data)) {
					// set message berhasil
					$this->session->set_flashdata('message', 'data berhasil di ubah');

					// arahkan ke list
					redirect(base_url('anggota'));
				} else {
					// set message gagal
					$this->session->set_flashdata('message', 'data gagal di ubah');

					// arahkan ke form untuk diisi kembali
					redirect(base_url('anggota'));
				}
			}
	}
	public function delete($id_anggota)
	{
		// ambil data dari database yang mempunyai id = $id
		$delete_anggota= $this->anggota_model->find($id_anggota);
	
		// cek terlebih dahulu apakah data tersebut ada atau tidak
		if ($delete_anggota) {
			// jika ada datanya maka jalankan blok berikut
			// awal blok
			if ($this->anggota_model->delete($id_anggota)) {
				// set message berhasil
				$this->session->set_flashdata('message', 'data berhasil di hapus');

				redirect(base_url('anggota'));
			} else {
				// set message gagal
				$this->session->set_flashdata('message', 'data gagal di hapus');

				// arahkan ke form untuk diisi kembali
				redirect(base_url('anggota'));
			}
			// akhir blok
		} else {
			// kalau tidak ada arahkan ke list
			redirect(base_url('anggota'));
		}
	}
	public function edit_modal($id_anggota)
	{
		
		
		$data['anggota'] = $this->anggota_model->find($id_anggota);

		
		$this->load->view('anggota_modal', $data);
		
	}

	
}



	/*$data = array(
				'populasi_awal' => $populasi_awal,
				'pakan_stok' =>$pakan_stok,
				'bobot_doc' =>$bobot_doc
			);*/
/* End of file ex_controller.php */
/* Location: ./application/modules/laporan/controllers/ex_controller.php */