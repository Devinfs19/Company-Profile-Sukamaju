<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class M_sejarah extends CI_Model {
	public function lists()
	{
		$this->db->select('*');
		$this->db->from('tbl_sejarah');
		$this->db->order_by('id_sejarah','desc');
		return $this->db->get()->result();
	}

	public function detail($id_sejarah)
	{
	$this->db->select('*');
	$this->db->from('tbl_sejarah');
	$this->db->where('id_sejarah', $id_sejarah);
	return $this->db->get()->row();
	}

public function tambahkan($data)
{
	$this->db->insert('tbl_sejarah', $data);
}

public function edit($data)
{
	$this->db->where('id_sejarah', $data['id_sejarah']);
	$this->db->update('tbl_sejarah',$data);

}

public function delete($data)
{
	$this->db->where('id_sejarah', $data['id_sejarah']);
	$this->db->delete('tbl_sejarah',$data);

}

} 