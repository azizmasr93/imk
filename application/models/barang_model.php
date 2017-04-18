<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Barang_model extends CI_Model {

	public function add($data)
	{
		return $this->db->insert('tb_barang', $data);
	}

	public function find($id_barang)
	{
		return  $this->db->get_where('tb_barang', array('id_barang' => $id_barang))->row();
	}

	public function all()
	{
		return $this->db->get('tb_barang')->result();
	}

	public function update($id_barang, $data)
	{
		return $this->db->update('tb_barang', $data, array('id_barang' => $id_barang));
	}

	public function delete($id_barang)
	{
		return $this->db->delete('tb_barang', array('id_barang' => $id_barang));
	}
	// public function select_name($value)
	// {
	// 	$where = array('id_supplier' => $value );
	// 	$this->db->where($where);
	// 	return $this->db->get('table_supplier')->row();
	// }
}

/* End of file ex_model.php */
/* Location: ./application/modules/laporan/models/ex_model.php */