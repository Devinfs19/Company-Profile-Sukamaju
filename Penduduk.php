<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Penduduk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_penduduk');
	}
	
	public function index()
	{
		$data = array(
			'title' => 'Desa Sukamaju',
			'title2' => 'Data Kependudukan',
			'penduduk' => $this->m_penduduk->lists(),
			'isi' => 'admin/penduduk/v_penduduk' 
		);
		$this->load->view('admin/layout/v_wrapper',$data,FALSE);
	}

	public function tambahkan()
	{
		$this->form_validation->set_rules('nik','NIK','required');
		$this->form_validation->set_rules('nama_penduduk','Nama Penduduk','required');
		$this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required');
		$this->form_validation->set_rules('tgl_lahir','Tanggal Lahir','required');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
		$this->form_validation->set_rules('agama','Agama','required');
		$this->form_validation->set_rules('alamat','Nama Alamat Tinggal','required');
		$this->form_validation->set_rules('alamat_asal','Alamat Asal','required');
		$this->form_validation->set_rules('status','Status','required');
		$this->form_validation->set_rules('no_kk','No. KK','required');
			if ($this->form_validation->run() == FALSE) {

						$data = array(
					'title' => 'Desa Sukamaju',
					'title2' => 'Data Kependudukan',
					'isi' => 'admin/penduduk/v_tambahkan'
					);
				$this->load->view('admin/layout/v_wrapper',$data,FALSE); 	
			}else{

					$data = array(
									
									'nik' => $this->input->post('nik'),
									'nama_penduduk' => $this->input->post('nama_penduduk'),
									'tempat_lahir' => $this->input->post('tempat_lahir'),
									'tgl_lahir' => $this->input->post('tgl_lahir'),
									'jenis_kelamin' => $this->input->post('jenis_kelamin'),
									'agama' => $this->input->post('agama'),
									'alamat' => $this->input->post('alamat'),
									'alamat_asal' => $this->input->post('alamat_asal'),
									'status' => $this->input->post('status'),
									'no_kk' => $this->input->post('no_kk')
								);
					$this->m_penduduk->tambahkan($data);
					$this->session->set_flashdata('pesan','Data Berhasil Di Tambahkan !!!');
					redirect('penduduk');
			}	
	}

	public function edit($id_penduduk)
	{
		$this->form_validation->set_rules('nik','NIK','required');
		$this->form_validation->set_rules('nama_penduduk','Nama Penduduk','required');
		$this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required');
		$this->form_validation->set_rules('tgl_lahir','Tanggal Lahir','required');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
		$this->form_validation->set_rules('agama','Agama','required');
		$this->form_validation->set_rules('alamat','Nama Alamat Tinggal','required');
		$this->form_validation->set_rules('alamat_asal','Alamat Asal','required');
		$this->form_validation->set_rules('status','Status','required');
		$this->form_validation->set_rules('no_kk','No. KK','required');
			if ($this->form_validation->run() == FALSE) {

						$data = array(
					'title' => 'Desa Sukamaju',
					'title2' => 'Data Kependudukan',
					'penduduk' => $this->m_penduduk->detail($id_penduduk),
					'isi' => 'admin/penduduk/v_edit'
					);
				$this->load->view('admin/layout/v_wrapper',$data,FALSE); 	
			}else{

					$data = array(	
									'id_penduduk' => $id_penduduk,
									'nik' => $this->input->post('nik'),
									'nama_penduduk' => $this->input->post('nama_penduduk'),
									'tempat_lahir' => $this->input->post('tempat_lahir'),
									'tgl_lahir' => $this->input->post('tgl_lahir'),
									'jenis_kelamin' => $this->input->post('jenis_kelamin'),
									'agama' => $this->input->post('agama'),
									'alamat' => $this->input->post('alamat'),
									'alamat_asal' => $this->input->post('alamat_asal'),
									'status' => $this->input->post('status'),
									'no_kk' => $this->input->post('no_kk')
								);
					$this->m_penduduk->edit($data);
					$this->session->set_flashdata('pesan','Data Berhasil Di Edit !!!');
					redirect('penduduk');
			}	
	}

	public function delete($id_penduduk)
	{
		//menghapus file foto lama
					$penduduk=$this->m_penduduk->detail($id_penduduk);
					if ($penduduk->foto_penduduk !="") {
						unlink('./img/foto_penduduk/'.$penduduk->foto_penduduk);
					}
					//end menghapus foto lama

					$data = array('id_penduduk' => $id_penduduk);
					$this->m_penduduk->delete($data);
					$this->session->set_flashdata('pesan','Data Berhasil Di Hapus !!!');
					redirect('penduduk');
	}
}