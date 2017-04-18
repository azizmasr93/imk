<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('SESS_MEMBER_IS_LOGIN') || ($this->session->userdata('SESS_MEMBER_IS_LOGIN') && $this->session->userdata('SESS_MEMBER_USER_PRIV') !== 1)) 
        {
            redirect(base_url('login'));
        }
		
		$this->load->model('barang_model');
	}

	public function index()
	{
		// ambil semua data
		$data['list'] = $this->barang_model->all();

		// load view
		$this->load->view('global/head');
		$this->load->view('list_barang', $data);
		$this->load->view('global/foot');
	}

	public function add()
	{
		// bikin rule validation
		$this->form_validation->set_rules('kodebarang', 'kodebarang', 'trim|xss_clean');
		$this->form_validation->set_rules('namabarang', 'namabarang', 'trim|xss_clean');
		$this->form_validation->set_rules('sumber', 'sumber', 'trim|xss_clean');
		

		// cek apakah validation is run
		if ($this->form_validation->run() === FALSE) {
			// tampilkan form
			redirect(base_url('barang'));
		} else {
			// lakukan logic buat add
			
			$kodebarang = $this->input->post('kodebarang');
			$namabarang = $this->input->post('namabarang');
			$sumber	 = $this->input->post('sumber');
			
			
			// masukkan ke array data untuk di pass ke model agar di masukkan ke database
			$data = array(
				'kodebarang' => $kodebarang ,
				'namabarang' => $namabarang ,
				'sumber' => $sumber  				
				
				// kalau lebih dari satu, pisahkan dengan koma (,)
			);

			if ($this->barang_model->add($data)) {
				// set message berhasil
				$this->session->set_flashdata('message', 'Data anda berhasil dimasukkan');

				// arahkan ke list
				redirect(base_url('barang'));
			} else {
				// set message gagal
				$this->session->set_flashdata('message', 'Data anda gagal dimasukkan');

				// arahkan ke form untuk diisi kembali
				redirect(base_url('barang'));
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
			
			$this->form_validation->set_rules('kodebarang', 'kodebarang', 'trim|xss_clean');
			$this->form_validation->set_rules('namabarang', 'namabarang', 'trim|xss_clean');
			$this->form_validation->set_rules('sumber', 'sumber', 'trim|xss_clean');
			
			
		
			// cek apakah validation is run
			if ($this->form_validation->run() === FALSE) {
				//tidak memenuhi syarat
				
			} else {
				
			
				// masukkan ke array data untuk di pass ke model agar di masukkan ke database
				$data = array(
					
					'kodebarang' => $this->input->post('kodebarang'),
					'namabarang' => $this->input->post('namabarang'),
					'sumber' => $this->input->post('sumber')
					
					 // kalau lebih dari satu, pisahkan dengan koma (,)
				);

				if ($this->barang_model->update($this->input->post('id'),$data)) {
					// set message berhasil
					$this->session->set_flashdata('message', 'data berhasil di ubah');

					// arahkan ke list
					redirect(base_url('barang'));
				} else {
					// set message gagal
					$this->session->set_flashdata('message', 'data gagal di ubah');

					// arahkan ke form untuk diisi kembali
					redirect(base_url('barang'));
				}
			}
	}
	public function delete($id_barang)
	{
		// ambil data dari database yang mempunyai id = $id
		$delete_barang= $this->barang_model->find($id_barang);
	
		// cek terlebih dahulu apakah data tersebut ada atau tidak
		if ($delete_barang) {
			// jika ada datanya maka jalankan blok berikut
			// awal blok
			if ($this->barang_model->delete($id_barang)) {
				// set message berhasil
				$this->session->set_flashdata('message', 'data berhasil di hapus');

				redirect(base_url('barang'));
			} else {
				// set message gagal
				$this->session->set_flashdata('message', 'data gagal di hapus');

				// arahkan ke form untuk diisi kembali
				redirect(base_url('barang'));
			}
			// akhir blok
		} else {
			// kalau tidak ada arahkan ke list
			redirect(base_url('barang'));
		}
	}
	public function edit_modal($id_barang)
	{
		
		
		$data['barang'] = $this->barang_model->find($id_barang);

		
		$this->load->view('barang_modal', $data);
		
	}

	
}



	/*$data = array(
				'populasi_awal' => $populasi_awal,
				'pakan_stok' =>$pakan_stok,
				'bobot_doc' =>$bobot_doc
			);*/
/* End of file ex_controller.php */
/* Location: ./application/modules/laporan/controllers/ex_controller.php */