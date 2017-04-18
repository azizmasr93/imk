<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proker_model extends CI_Model {

	public function add($data)
	{
		return $this->db->insert('tb_proker', $data);
	}

	public function find($id_proker)
	{
		return  $this->db->get_where('tb_proker', array('id_proker' => $id_proker))->row();
	}

	public function all()
	{
		return $this->db->get('tb_proker')->result();
	}

	public function update($id_proker, $data)
	{
		return $this->db->update('tb_proker', $data, array('id_proker' => $id_proker));
	}

	public function delete($id_proker)
	{
		return $this->db->delete('tb_proker', array('id_proker' => $id_proker));
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