<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class M_aparatur extends CI_Model {
	public function lists()
	{
		$this->db->select('*');
		$this->db->from('tbl_aparatur');
		$this->db->order_by('id_aparatur','desc');
		return $this->db->get()->result();
	}

	public function detail($id_aparatur)
	{
	$this->db->select('*');
	$this->db->from('tbl_aparatur');
	$this->db->where('id_aparatur', $id_aparatur);
	return $this->db->get()->row();
	}

public function tambahkan($data)
{
	$this->db->insert('tbl_aparatur', $data);
}

public function edit($data)
{
	$this->db->where('id_aparatur', $data['id_aparatur']);
	$this->db->update('tbl_aparatur',$data);

}

public function delete($data)
{
	$this->db->where('id_aparatur', $data['id_aparatur']);
	$this->db->delete('tbl_aparatur',$data);

}

} 