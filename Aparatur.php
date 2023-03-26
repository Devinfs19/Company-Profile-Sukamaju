<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Aparatur extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_aparatur');
	}

	public function index()
	{
		$data = array(
			'title' => 'Desa Sukamaju',
			'title2' => 'Profil Aparatur',
			'aparatur' =>  $this->m_aparatur->lists(),
			'isi' => 'admin/aparatur/v_aparatur' 
		);
		$this->load->view('admin/layout/v_wrapper',$data,FALSE);
	}

	public function tambahkan()
	{
		$this->form_validation->set_rules('nik','NIK','required');
		$this->form_validation->set_rules('nama_aparatur','Nama Aparatur','required');
		$this->form_validation->set_rules('jabatan','Jabatan','required');
		$this->form_validation->set_rules('tugas','Tugas','required');
		$this->form_validation->set_rules('fungsi','Fungsi','required');

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './img/foto_aparatur/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] =  10000;
			$this->upload->initialize($config);
				if (!$this->upload->do_upload('foto_aparatur')) 
				{
					
					$data = array(
						'title' => 'Desa Sukamaju',
						'title2' => 'Tambahkan Profil Aparatur',
						'error' => $this->upload->display_errors(),
						'isi' => 'admin/aparatur/v_tambahkan');
				$this->load->view('admin/layout/v_wrapper',$data,FALSE);
				}
				else
				{
					$upload_data = array('uploads' => $this->upload->data());
					$config['image_library'] = 'gd2';
					$config['source_image'] = './img/foto_aparatur/'.$upload_data['uploads']['file_name'];
					$this->load->library('image_lib', $config);

					$data = array(
									'nik' => $this->input->post('nik'),
									'nama_aparatur' => $this->input->post('nama_aparatur'),
									'jabatan' => $this->input->post('jabatan'),
									'tugas' => $this->input->post('tugas'),
									'fungsi' => $this->input->post('fungsi'),
									'foto_aparatur' => $upload_data['uploads']['file_name']
								);
					$this->m_aparatur->tambahkan($data);
					$this->session->set_flashdata('pesan','Data Berhasil Di Tambahkan !!!');
					redirect('aparatur');
				}
		} 

		$data = array(
						'title' => 'Desa Sukamaju',
						'title2' => 'Tambahkan Profil Aparatur',
						'isi' => 'admin/aparatur/v_tambahkan' 
		);
		$this->load->view('admin/layout/v_wrapper',$data,FALSE);

	}

	public function edit($id_aparatur)
	{
		$this->form_validation->set_rules('nik','NIK','required');
		$this->form_validation->set_rules('nama_aparatur','Nama Aparatur','required');
		$this->form_validation->set_rules('jabatan','Jabatan','required');
		$this->form_validation->set_rules('tugas','Tugas','required');
		$this->form_validation->set_rules('fungsi','Fungsi','required');

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './img/foto_aparatur/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] =  10000;
			$this->upload->initialize($config);
				if (!$this->upload->do_upload("foto_aparatur")) 
				{
					
					$data = array(
						'title' => 'Desa Sukamaju',
						'title2' => 'Edit Data Profil Aparatur',
						'error' => $this->upload->display_errors(),
						'aparatur' => $this->m_aparatur->detail($id_aparatur),
						'isi' => 'admin/aparatur/v_edit');
		$this->load->view('admin/layout/v_wrapper',$data,FALSE);
				}
				else
				{
					$upload_data = array('uploads' => $this->upload->data());
					$config['image_library'] = 'gd2';
					$config['source_image'] = './img/foto_aparatur/'.$upload_data['uploads']['file_name'];
					$this->load->library('image_lib', $config);
					//menghapus file foto lama
					$aparatur=$this->m_aparatur->detail($id_aparatur);
					if ($aparatur->foto_aparatur !="") {
						unlink('./img/foto_aparatur/'.$aparatur->foto_aparatur);
					}
					//end menghapus foto lama

					$data = array(

									'id_aparatur' => $id_aparatur,
									'nik' => $this->input->post('nik'),
									'nama_aparatur' => $this->input->post('nama_aparatur'),
									'jabatan' => $this->input->post('jabatan'),
									'tugas' => $this->input->post('tugas'),
									'fungsi' => $this->input->post('fungsi'),
									'foto_aparatur' => $upload_data['uploads']['file_name']
								);
					$this->m_aparatur->edit($data);
					$this->session->set_flashdata('pesan', 'Data Berhasil Di Edit !!!');
					redirect('aparatur');
				}
				$upload_data = array('uploads' => $this->upload->data());
					$config['image_library'] = 'gd2';
					$config['source_image'] = './img/foto_aparatur/'.$upload_data['uploads']['file_name'];
					$this->load->library('image_lib', $config);

					$data = array(

									'id_aparatur' => $id_aparatur,
									'nik' => $this->input->post('nik'),
									'nama_aparatur' => $this->input->post('nama_aparatur'),
									'jabatan' => $this->input->post('jabatan'),
									'tugas' => $this->input->post('tugas'),
									'fungsi' => $this->input->post('fungsi'),
								);
					$this->m_aparatur->edit($data);
					$this->session->set_flashdata('pesan','Data Berhasil Di Edit !!!');
					redirect('aparatur');
		} 

		$data = array(
						'title' => 'Desa Sukamaju',
						'title2' => 'Edit Data Profil Aparatur',
						'aparatur' => $this->m_aparatur->detail($id_aparatur),
						'isi' => 'admin/aparatur/v_edit' 
		);
		$this->load->view('admin/layout/v_wrapper',$data,FALSE);
	}

	public function delete($id_aparatur)
	{
		//menghapus file foto lama
					$aparatur=$this->m_aparatur->detail($id_aparatur);
					if ($aparatur->foto_aparatur !="") {
						unlink('./img/foto_aparatur/'.$aparatur->foto_aparatur);
					}
					//end menghapus foto lama

					$data = array('id_aparatur' => $id_aparatur);
					$this->m_aparatur->delete($data);
					$this->session->set_flashdata('pesan','Data Berhasil Di Hapus !!!');
					redirect('aparatur');
	}
}