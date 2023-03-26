<?php

defined('BASEPATH') OR exit('no direct script access allowed');

class HOME extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_home');
		$this->load->model('m_aparatur');
	}
	public function index()
	{
		$data = array(
			'title' => 'web desa',
			'berita' => $this->m_home->slider_berita(),
			'pengumuman' => $this->m_home->slider_pengumuman(),
			'aparatur' => $this->m_aparatur->lists(),
			'isi' => 'v_home'
		);
		$this->load->view('layout/v_wrapperhome.php',$data,FALSE);
	}

	public function keuangan()
	{
		$data = array(
			'title' => 'Keuangan',
			'keuangan'  => $this->m_home->keuangan(),
			'isi' => 'v_keuangan' 
		);
		$this->load->view('layout/v_wrapper.php',$data,FALSE);
	}

	public function aparatur()
	{
		$data = array(
			'title' => 'Aparatur',
			'aparatur'  => $this->m_home->aparatur(),
			'isi' => 'v_aparatur' 
		);
		$this->load->view('layout/v_wrapper.php',$data,FALSE);
	}

	public function berita()
	{
		$this->load->library('pagination');
		$config['base_url'] = base_url('home/berita');
		$config['total_rows'] = count($this->m_home->total_berita());
		$config['per_page'] = 8;
		$config['uri_segmen'] = 3;
		//start dan limit
			$limit= $config['per_page'];
			$start= ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;
		//~~~~~~~~~~
			$config['first_link'] = 'First';
			$config['last_link'] = 'Last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
			$config['full_tag_open'] = '<div class="pagination_container d-flex flex-row align-items-center justify-content-start text-center"><ul class="pagination_list">';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a>';
			$config['cur_tag_close'] = '</a></li>';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['full_tag_close'] = '</ul></div>';
			//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
			$this->pagination->initialize($config);

		$data = array(
			'pagination'=> $this->pagination->create_links(),
			'latest_berita' => $this->m_home->latest_berita(),
			'berita'  => $this->m_home->berita($limit,$start),
			'title' => 'Berita',
			'isi' => 'v_berita' 
		);
		$this->load->view('layout/v_wrapper.php',$data,FALSE);
	}

	public function detail_berita($slug_berita)
	{
		$data = array(
			'title' => 'Baca Berita',
			'latest_berita' => $this->m_home->latest_berita(),
			'berita'  => $this->m_home->detail_berita($slug_berita),
			'isi' => 'v_detail_berita' 
		);
		$this->load->view('layout/v_wrapper.php',$data,FALSE);
	}

	public function penduduk()
	{
		$data = array(
			'title' => 'Kependudukan',
			'penduduk'  => $this->m_home->penduduk(),
			'isi' => 'v_penduduk' 
		);
		$this->load->view('layout/v_wrapper.php',$data,FALSE);
	}

	public function pengumuman()
	{
		$this->load->library('pagination');
		$config['base_url'] = base_url('home/pengumuman');
		$config['total_rows'] = count($this->m_home->total_pengumuman());
		$config['per_page'] = 8;
		$config['uri_segmen'] = 3;
		//start dan limit
			$limit= $config['per_page'];
			$start= ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 0;
		//~~~~~~~~~~
			$config['first_link'] = 'First';
			$config['last_link'] = 'Last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
			$config['full_tag_open'] = '<div class="pagination_container d-flex flex-row align-items-center justify-content-start text-center"><ul class="pagination_list">';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = '<li class="active"><a>';
			$config['cur_tag_close'] = '</a></li>';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['full_tag_close'] = '</ul></div>';
			//~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
			$this->pagination->initialize($config);

		$data = array(
			'pagination'=> $this->pagination->create_links(),
			'latest_pengumuman' => $this->m_home->latest_pengumuman(),
			'pengumuman'  => $this->m_home->pengumuman($limit,$start),
			'title' => 'Pengumuman',
			'isi' => 'v_pengumuman' 
		);
		$this->load->view('layout/v_wrapper.php',$data,FALSE);
	}

	public function detail_pengumuman($slug_pengumuman)
	{
		$data = array(
			'title' => 'Baca Pengumuman',
			'latest_pengumuman' => $this->m_home->latest_pengumuman(),
			'pengumuman'  => $this->m_home->detail_pengumuman($slug_pengumuman),
			'isi' => 'v_detail_pengumuman' 
		);
		$this->load->view('layout/v_wrapper.php',$data,FALSE);
	}

	public function sejarah()
	{
		$data = array(
			'title' => 'Sejarah',
			'sejarah' => $this->m_home->sejarah(),
			'isi' => 'v_sejarah' 
		);
		$this->load->view('layout/v_wrapper.php',$data,FALSE);
	}

	public function potensi()
	{
		$data = array(
			'title' => 'Potensi',
			'potensi' => $this->m_home->potensi(),
			'isi' => 'v_potensi' 
		);
		$this->load->view('layout/v_wrapper.php',$data,FALSE);
	}

	public function peta()
	{
		$data = array(
			'title' => 'Peta Desa',
			'peta' => $this->m_home->peta(),
			'isi' => 'v_peta' 
		);
		$this->load->view('layout/v_wrapper.php',$data,FALSE);
	}

} 

/*End of file Home.php*/