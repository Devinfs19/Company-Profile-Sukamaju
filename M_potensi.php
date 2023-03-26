<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class M_potensi extends CI_Model {
	public function lists()
	{
		$this->db->select('*');
		$this->db->from('tbl_potensi');
		$this->db->order_by('id_potensi','desc');
		return $this->db->get()->result();
	}

	public function detail($id_potensi)
	{
	$this->db->select('*');
	$this->db->from('tbl_potensi');
	$this->db->where('id_potensi', $id_potensi);
	return $this->db->get()->row();
	}

public function tambahkan($data)
{
	$this->db->insert('tbl_potensi', $data);
}

public function edit($data)
{
	$this->db->where('id_potensi', $data['id_potensi']);
	$this->db->update('tbl_potensi',$data);

}

public function delete($data)
{
	$this->db->where('id_potensi', $data['id_potensi']);
	$this->db->delete('tbl_potensi',$data);

}

} 