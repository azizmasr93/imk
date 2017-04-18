<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Anggota_model extends CI_Model {

	public function add($data)
	{
		return $this->db->insert('tb_anggota', $data, array('stat'=>'1'));
	}

	public function find($id_anggota)
	{
		return  $this->db->get_where('tb_anggota', array('id_anggota' => $id_anggota ))->row();
		
	}

	public function all()
	{
		return $this->db->get_where('tb_anggota', array('stat'=>'1'))->result();
	}

	public function update($id_anggota, $data)
	{
		return $this->db->update('tb_anggota', $data, array('id_anggota' => $id_anggota));
	}

	public function delete($id_anggota)
	{
		
		return $this->db->where('id_anggota', $id_anggota)
		->update('tb_anggota', array('stat' => '0'));
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