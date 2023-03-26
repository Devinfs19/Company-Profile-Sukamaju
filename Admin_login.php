<?php
defined('BASEPATH') OR exit('no direct script access allowed');

class Admin_login 
{
	protected $ci;

	public function __construct()
	{
		$this->ci=& get_instance(); 
		$this->ci->load->model('m_login');
	}
	public function login($username,$password)
	{
		$cek=$this->ci->m_login->login($username,$password);
		if($cek){
			$username = $cek->username;
			$nama_admin = $cek->nama_admin;
			$level = $cek->level;
			//buat session
			$this->ci->session->set_userdata('username',$username);
			$this->ci->session->set_userdata('nama_admin',$nama_admin);
			$this->ci->session->set_userdata('level',$level);
			redirect('admin');
		}else{
			$this->ci->session->set_flashdata('pesan','Username atau Password Salah !!!');
			redirect('login');
		}

	}
	public function cek_login()
	{
	if ($this->ci->session->userdata('username')=='') {
		$this->ci->session->set_flashdata('pesan','Anda Belum Login !!!');
		redirect('login');
		}	
	}
	public function logout()
	{
		$this->ci->session->unset_userdata('username');
		$this->ci->session->unset_userdata('nama_admin');
		$this->ci->session->unset_userdata('level');
		$this->ci->session->set_flashdata('pesan','Logout Sukses !!!');
		redirect('login');
	}

	public function count_penduduk()
	{
		$this->ci->load->model('penduduk');
		return $this->ci->penduduk->get()->num_rows();
	}
} 
