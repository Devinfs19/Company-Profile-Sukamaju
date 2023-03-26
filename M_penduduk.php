<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class M_penduduk extends CI_Model {
	public function lists()
	{
		$this->db->select('*');
		$this->db->from('tbl_kependudukan');
		$this->db->order_by('id_penduduk','desc');
		return $this->db->get()->result();
	}

	public function detail($id_penduduk)
	{
	$this->db->select('*');
	$this->db->from('tbl_kependudukan');
	$this->db->where('id_penduduk', $id_penduduk);
	return $this->db->get()->row();
	}

public function tambahkan($data)
{
	$this->db->insert('tbl_kependudukan', $data);
}

public function edit($data)
{
	$this->db->where('id_penduduk', $data['id_penduduk']);
	$this->db->update('tbl_kependudukan',$data);

}

public function delete($data)
{
	$this->db->where('id_penduduk', $data['id_penduduk']);
	$this->db->delete('tbl_kependudukan',$data);

}

public function jml_penduduk($data)
{
	$this->db->where('id_penduduk', $data['id_penduduk']);
	$this->db->delete('tbl_kependudukan',$data);

}

} 