<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class M_keuangan extends CI_Model {
	public function lists()
	{
		$this->db->select('*');
		$this->db->from('tbl_keuangan');
		$this->db->order_by('id_keuangan','desc');
		return $this->db->get()->result();
	}

	public function detail($id_keuangan)
	{
	$this->db->select('*');
	$this->db->from('tbl_keuangan');
	$this->db->where('id_keuangan', $id_keuangan);
	return $this->db->get()->row();
	}

public function tambahkan($data)
{
	$this->db->insert('tbl_keuangan', $data);
}

public function edit($data)
{
	$this->db->where('id_keuangan', $data['id_keuangan']);
	$this->db->update('tbl_keuangan',$data);

}

public function delete($data)
{
	$this->db->where('id_keuangan', $data['id_keuangan']);
	$this->db->delete('tbl_keuangan',$data);

}

} 