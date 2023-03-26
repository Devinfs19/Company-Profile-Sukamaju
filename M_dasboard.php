<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class M_dasboard extends CI_Model {
	public function lists()
	{
		$this->db->select('*');
		$this->db->from('tbl_kependudukan');
		$this->db->order_by('id_penduduk','desc');
		return $this->db->get()->result();
	}

	public function detail($penduduk)
	{
	$this->db->select('*');
	$this->db->from('tbl_kependudukan');
	$this->db->where('id_penduduk', $id_penduduk);
	return $this->db->count_number_all_result();
	}

}