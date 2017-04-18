<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proker extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('SESS_MEMBER_IS_LOGIN') || ($this->session->userdata('SESS_MEMBER_IS_LOGIN') && $this->session->userdata('SESS_MEMBER_USER_PRIV') !== 1)) 
        {
            redirect(base_url('login'));
        }
		
		$this->load->model('proker_model');
	}

	public function index()
	{
		// ambil semua data
		$data['list'] = $this->proker_model->all();

		// load view
		$this->load->view('global/head');
		$this->load->view('list_proker', $data);
		$this->load->view('global/foot');
	}

	public function add()
	{
		// bikin rule validation
		$this->form_validation->set_rules('namaproker', 'namaproker', 'trim|xss_clean');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|xss_clean');
		$this->form_validation->set_rules('tujuan', 'tujuan', 'trim|xss_clean');
		

		// cek apakah validation is run
		if ($this->form_validation->run() === FALSE) {
			// tampilkan form
			redirect(base_url('proker'));
		} else {
			// lakukan logic buat add
			
			$namaproker = $this->input->post('namaproker');
			$deskripsi = $this->input->post('deskripsi');
			$tujuan = $this->input->post('tujuan');
			
			
			// masukkan ke array data untuk di pass ke model agar di masukkan ke database
			$data = array(
				'namaproker' => $namaproker ,
				'deskripsi' => $deskripsi ,
				'tujuan' => $tujuan 
				
				// kalau lebih dari satu, pisahkan dengan koma (,)
			);

			if ($this->proker_model->add($data)) {
				// set message berhasil
				$this->session->set_flashdata('message', 'Data anda berhasil dimasukkan');

				// arahkan ke list
				redirect(base_url('proker'));
			} else {
				// set message gagal
				$this->session->set_flashdata('message', 'Data anda gagal dimasukkan');

				// arahkan ke form untuk diisi kembali
				redirect(base_url('proker'));
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
			
			$this->form_validation->set_rules('namaproker', 'namaproker', 'trim|xss_clean');
			$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|xss_clean');
			$this->form_validation->set_rules('tujuan', 'tujuan', 'trim|xss_clean');
			
		
			// cek apakah validation is run
			if ($this->form_validation->run() === FALSE) {
				//tidak memenuhi syarat
				
			} else {
				
			
				// masukkan ke array data untuk di pass ke model agar di masukkan ke database
				$data = array(
					
					'namaproker' => $this->input->post('namaproker'),
					'deskripsi' => $this->input->post('deskripsi'),
					'tujuan' => $this->input->post('tujuan')
					
					 // kalau lebih dari satu, pisahkan dengan koma (,)
				);

				if ($this->proker_model->update($this->input->post('id'),$data)) {
					// set message berhasil
					$this->session->set_flashdata('message', 'data berhasil di ubah');

					// arahkan ke list
					redirect(base_url('proker'));
				} else {
					// set message gagal
					$this->session->set_flashdata('message', 'data gagal di ubah');

					// arahkan ke form untuk diisi kembali
					redirect(base_url('proker'));
				}
			}
	}
	public function delete($id_proker)
	{
		// ambil data dari database yang mempunyai id = $id
		
		$delete_proker= $this->proker_model->find($id_proker);
	
		// cek terlebih dahulu apakah data tersebut ada atau tidak
		if ($delete_proker) {
			// jika ada datanya maka jalankan blok berikut
			// awal blok
			if ($this->proker_model->delete($id_proker)) {
				// set message berhasil
				$this->session->set_flashdata('message', 'data berhasil di hapus');

				redirect(base_url('proker'));
			} else {
				// set message gagal
				$this->session->set_flashdata('message', 'data gagal di hapus');

				// arahkan ke form untuk diisi kembali
				redirect(base_url('proker'));
			}
			// akhir blok
		} else {
			// kalau tidak ada arahkan ke list
			redirect(base_url('proker'));
		}
	}
	public function edit_modal($id_proker)
	{
		
		
		$data['proker'] = $this->proker_model->find($id_proker);

		
		$this->load->view('proker_modal', $data);
		
	}

	
}



	/*$data = array(
				'populasi_awal' => $populasi_awal,
				'pakan_stok' =>$pakan_stok,
				'bobot_doc' =>$bobot_doc
			);*/
/* End of file ex_controller.php */
/* Location: ./application/modules/laporan/controllers/ex_controller.php */