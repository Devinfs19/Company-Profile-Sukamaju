<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Keuangan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_keuangan');
	}

	public function index()
	{
		$data = array(
			'title' => 'Desa Sukamaju',
			'title2' => 'Keuangan Desa',
			'keuangan' =>  $this->m_keuangan->lists(),
			'isi' => 'admin/keuangan/v_keuangan' 
		);
		$this->load->view('admin/layout/v_wrapper',$data,FALSE);
	}

	public function tambahkan()
	{
		$this->form_validation->set_rules('keterangan','keterangan','required');

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './img/file_keuangan/';
			$config['allowed_types'] = 'doc|docx|ppt|pptx|pdf|txt|xlsx|xls';
			$config['max_size'] =  20000;
			$this->upload->initialize($config);
				if (!$this->upload->do_upload('file_keuangan')) 
				{
					
					$data = array(
						'title' => 'Desa Sukamaju',
						'title2' => 'Tambahkan File',
						'error' => $this->upload->display_errors(),
						'isi' => 'admin/keuangan/v_tambahkan');
				$this->load->view('admin/layout/v_wrapper',$data,FALSE);
				}
				else
				{
					$upload_data = array('uploads' => $this->upload->data());
					$config['image_library'] = 'gd2';
					$config['source_image'] = './img/file_keuangan/'.$upload_data['uploads']['file_name'];
					$this->load->library('image_lib', $config);

					$data = array(
									'keterangan' => $this->input->post('keterangan'),
									'file_keuangan' => $upload_data['uploads']['file_name']
								);
					$this->m_keuangan->tambahkan($data);
					$this->session->set_flashdata('pesan','Data Berhasil Di Tambahkan !!!');
					redirect('keuangan');
				}
		} 

		$data = array(
						'title' => 'Desa Sukamaju',
						'title2' => 'Tambahkan File Keuangan',
						'isi' => 'admin/keuangan/v_tambahkan' 
		);
		$this->load->view('admin/layout/v_wrapper',$data,FALSE);

	}

	public function edit($id_keuangan)
	{
		$this->form_validation->set_rules('keterangan','keterangan','required');

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './img/file_keuangan/';
			$config['allowed_types'] = 'doc|docx|ppt|pptx|pdf|txt|xlsx|xls';
			$config['max_size'] =  20000;
			$this->upload->initialize($config);
				if (!$this->upload->do_upload('file_keuangan')) 
				{
					
					$data = array(
						'title' => 'Desa Sukamaju',
						'title2' => 'Tambahkan File',
						'error' => $this->upload->display_errors(),
						'keuangan' => $this->m_keuangan->detail($id_keuangan),
						'isi' => 'admin/keuangan/v_edit');
				$this->load->view('admin/layout/v_wrapper',$data,FALSE);
				}
				else
				{
					$upload_data = array('uploads' => $this->upload->data());
					$config['image_library'] = 'gd2';
					$config['source_image'] = './img/file_keuangan/'.$upload_data['uploads']['file_name'];
					$this->load->library('image_lib', $config);
					//menghapus file foto lama
					$keuangan=$this->m_keuangan->detail($id_keuangan);
					if ($keuangan->file_keuangan !="") {
						unlink('./img/file_keuangan/'.$keuangan->file_keuangan);
					}
					//end menghapus foto lama

					$data = array(
									'id_keuangan' => $id_keuangan,
									'keterangan' => $this->input->post('keterangan'),
									'file_keuangan' => $upload_data['uploads']['file_name']
								);
					$this->m_keuangan->edit($data);
					$this->session->set_flashdata('pesan','Data Berhasil Di Tambahkan !!!');
					redirect('keuangan');
				}

				$upload_data = array('uploads' => $this->upload->data());
					$config['image_library'] = 'gd2';
					$config['source_image'] = './img/file_keuangan/'.$upload_data['uploads']['file_name'];
					$this->load->library('image_lib', $config);

					$data = array(
									'id_keuangan' => $id_keuangan,
									'keterangan' => $this->input->post('keterangan'),
								);
					$this->m_keuangan->edit($data);
					$this->session->set_flashdata('pesan','Data Berhasil Di Tambahkan !!!');
					redirect('keuangan');
		} 

		$data = array(
						'title' => 'Desa Sukamaju',
						'title2' => 'Tambahkan File Keuangan',
						'keuangan' => $this->m_keuangan->detail($id_keuangan),
						'isi' => 'admin/keuangan/v_edit' 
		);
		$this->load->view('admin/layout/v_wrapper',$data,FALSE);
	}

	public function delete($id_keuangan)
	{
		//menghapus file foto lama
					$keuangan=$this->m_keuangan->detail($id_keuangan);
					if ($keuangan->file_keuangan !="") {
						unlink('./img/file_keuangan/'.$keuangan->file_keuangan);
					}
					//end menghapus foto lama

					$data = array('id_keuangan' => $id_keuangan);
					$this->m_keuangan->delete($data);
					$this->session->set_flashdata('pesan','Data Berhasil Di Hapus !!!');
					redirect('keuangan');
	}
}