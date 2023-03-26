<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sejarah extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_sejarah');
	}

	public function index()
	{
		$data = array(
			'title' => 'Desa Sukamaju',
			'title2' => 'Data Desa',
			'sejarah' => $this->m_sejarah->lists(),
			'isi' => 'admin/sejarah/v_sejarah' 
		);
		$this->load->view('admin/layout/v_wrapper',$data,FALSE);
	}

	public function tambahkan()
	{
		$this->form_validation->set_rules('nama_sejarah','Nama sejarah','required');
		$this->form_validation->set_rules('isi_sejarah','Isi sejarah','required',array('required'=>'%s Tidak Boleh Dikosongkan..!!'));
			if ($this->form_validation->run() == FALSE) {

						$data = array(
					'title' => 'Desa Sukamaju',
					'title2' => 'Data Desa',
					'isi' => 'admin/sejarah/v_tambahkan'
					);
				$this->load->view('admin/layout/v_wrapper',$data,FALSE); 	
			}else{

					$data = array(
									'nama_sejarah' => $this->input->post('nama_sejarah'),
									'isi_sejarah' => $this->input->post('isi_sejarah')
								);
					$this->m_sejarah->tambahkan($data);
					$this->session->set_flashdata('pesan','Data Berhasil Di Tambahkan !!!');
					redirect('sejarah');
			}	
	}

	public function edit($id_sejarah)
	{
		$this->form_validation->set_rules('nama_sejarah','Nama sejarah','required');
		$this->form_validation->set_rules('isi_sejarah','Isi sejarah','required',array('required'=>'%s Tidak Boleh Dikosongkan..!!'));
			if ($this->form_validation->run() == FALSE) {

						$data = array(
					'title' => 'Desa Sukamaju',
					'title2' => 'Data Desa',
					'sejarah' => $this->m_sejarah->detail($id_sejarah),
					'isi' => 'admin/sejarah/v_edit'
					);
				$this->load->view('admin/layout/v_wrapper',$data,FALSE); 	
			}else{

					$data = array(	
									'id_sejarah' => $id_sejarah,
									'nama_sejarah' => $this->input->post('nama_sejarah'),
									'isi_sejarah' => $this->input->post('isi_sejarah')
								);
					$this->m_sejarah->edit($data);
					$this->session->set_flashdata('pesan','Data Berhasil Di Edit !!!');
					redirect('sejarah');
			}	
	}

	public function delete($id_sejarah)
	{
		//menghapus file foto lama
					$sejarah=$this->m_sejarah->detail($id_sejarah);
					if ($sejarah->foto_sejarah !="") {
						unlink('./img/foto_sejarah/'.$sejarah->foto_sejarah);
					}
					//end menghapus foto lama

					$data = array('id_sejarah' => $id_sejarah);
					$this->m_sejarah->delete($data);
					$this->session->set_flashdata('pesan','Data Berhasil Di Hapus !!!');
					redirect('sejarah');
	}
}