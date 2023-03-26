<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class M_home extends CI_Model {
	public function keuangan()
	{
		$this->db->select('*');
		$this->db->from('tbl_keuangan');
		$this->db->order_by('id_keuangan','desc');
		return $this->db->get()->result();
	}

	public function aparatur()
	{
		$this->db->select('*');
		$this->db->from('tbl_aparatur');
		$this->db->order_by('id_aparatur','desc');
		return $this->db->get()->result();
	}

	//memunculkan berita dengan paging
	public function berita($limit,$start)
	{
		$this->db->select('*');
		$this->db->from('tbl_berita');
		$this->db->order_by('id_berita','desc');
		$this->db->limit($limit,$start);
		return $this->db->get()->result();
	}

	public function total_berita()
	{
		$this->db->select('*');
		$this->db->from('tbl_berita');
		$this->db->order_by('id_berita','desc');
		return $this->db->get()->result();
	}

	public function detail_berita($slug_berita)
	{
		$this->db->select('*');
		$this->db->from('tbl_berita');
		$this->db->where('slug_berita',$slug_berita);
		return $this->db->get()->row();
	}

	public function latest_berita()
	{
		$this->db->select('*');
		$this->db->from('tbl_berita');
		$this->db->order_by('id_berita','desc');
		$this->db->limit(10);
		return $this->db->get()->result();
	}

	public function penduduk()
	{
		$this->db->select('*');
		$this->db->from('tbl_kependudukan');
		$this->db->order_by('id_penduduk','desc');
		return $this->db->get()->result();
	}

	//memunculkan pengumuman dengan paging
	public function pengumuman($limit,$start)
	{
		$this->db->select('*');
		$this->db->from('tbl_pengumuman');
		$this->db->order_by('id_pengumuman','desc');
		$this->db->limit($limit,$start);
		return $this->db->get()->result();
	}

	public function total_pengumuman()
	{
		$this->db->select('*');
		$this->db->from('tbl_pengumuman');
		$this->db->order_by('id_pengumuman','desc');
		return $this->db->get()->result();
	}

	public function detail_pengumuman($slug_pengumuman)
	{
		$this->db->select('*');
		$this->db->from('tbl_pengumuman');
		$this->db->where('slug_pengumuman',$slug_pengumuman);
		return $this->db->get()->row();
	}

	public function latest_pengumuman()
	{
		$this->db->select('*');
		$this->db->from('tbl_pengumuman');
		$this->db->order_by('id_pengumuman','desc');
		$this->db->limit(10);
		return $this->db->get()->result();
	}

	public function sejarah()
	{
		$this->db->select('*');
		$this->db->from('tbl_sejarah');
		$this->db->order_by('id_sejarah','desc');
		return $this->db->get()->row();
	}

	public function potensi()
	{
		$this->db->select('*');
		$this->db->from('tbl_potensi');
		$this->db->order_by('id_potensi','desc');
		return $this->db->get()->row();
	}

	public function slider_berita()
	{
		$this->db->select('*');
		$this->db->from('tbl_berita');
		$this->db->order_by('id_berita','desc');
		$this->db->limit(3);
		return $this->db->get()->result();
	}

	public function slider_pengumuman()
	{
		$this->db->select('*');
		$this->db->from('tbl_pengumuman');
		$this->db->order_by('id_pengumuman','desc');
		$this->db->limit(3);
		return $this->db->get()->result();
	}

}