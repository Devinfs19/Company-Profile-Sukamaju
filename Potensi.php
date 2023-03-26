<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Potensi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_potensi');
	}

	public function index()
	{
		$data = array(
			'title' => 'Desa Sukamaju',
			'title2' => 'Data Desa',
			'potensi' => $this->m_potensi->lists(),
			'isi' => 'admin/potensi/v_potensi' 
		);
		$this->load->view('admin/layout/v_wrapper',$data,FALSE);
	}

	public function tambahkan()
	{
		$this->form_validation->set_rules('nama_potensi','Nama potensi','required');
		$this->form_validation->set_rules('isi_potensi','Isi potensi','required',array('required'=>'%s Tidak Boleh Dikosongkan..!!'));
			if ($this->form_validation->run() == FALSE) {

						$data = array(
					'title' => 'Desa Sukamaju',
					'title2' => 'Data Desa',
					'isi' => 'admin/potensi/v_tambahkan'
					);
				$this->load->view('admin/layout/v_wrapper',$data,FALSE); 	
			}else{

					$data = array(
									'nama_potensi' => $this->input->post('nama_potensi'),
									'isi_potensi' => $this->input->post('isi_potensi')
								);
					$this->m_potensi->tambahkan($data);
					$this->session->set_flashdata('pesan','Data Berhasil Di Tambahkan !!!');
					redirect('potensi');
			}	
	}

	public function edit($id_potensi)
	{
		$this->form_validation->set_rules('nama_potensi','Nama potensi','required');
		$this->form_validation->set_rules('isi_potensi','Isi potensi','required',array('required'=>'%s Tidak Boleh Dikosongkan..!!'));
			if ($this->form_validation->run() == FALSE) {

						$data = array(
					'title' => 'Desa Sukamaju',
					'title2' => 'Data Desa',
					'potensi' => $this->m_potensi->detail($id_potensi),
					'isi' => 'admin/potensi/v_edit'
					);
				$this->load->view('admin/layout/v_wrapper',$data,FALSE); 	
			}else{

					$data = array(	
									'id_potensi' => $id_potensi,
									'nama_potensi' => $this->input->post('nama_potensi'),
									'isi_potensi' => $this->input->post('isi_potensi')
								);
					$this->m_potensi->edit($data);
					$this->session->set_flashdata('pesan','Data Berhasil Di Edit !!!');
					redirect('potensi');
			}	
	}

	public function delete($id_potensi)
	{
		//menghapus file foto lama
					$potensi=$this->m_potensi->detail($id_potensi);
					if ($potensi->foto_potensi !="") {
						unlink('./img/foto_potensi/'.$potensi->foto_potensi);
					}
					//end menghapus foto lama

					$data = array('id_potensi' => $id_potensi);
					$this->m_potensi->delete($data);
					$this->session->set_flashdata('pesan','Data Berhasil Di Hapus !!!');
					redirect('potensi');
	}
}