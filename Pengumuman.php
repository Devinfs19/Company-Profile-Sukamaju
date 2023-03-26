<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_pengumuman');
	}

	public function index()
	{
		$data = array(
			'title' => 'Desa Sukamaju',
			'title2' => 'Data Pengumuman',
			'pengumuman' => $this->m_pengumuman->lists(),
			'isi' => 'admin/pengumuman/v_pengumuman' 
		);
		$this->load->view('admin/layout/v_wrapper',$data,FALSE);
	}

	public function tambahkan()
	{
		$this->form_validation->set_rules('judul_pengumuman','Judul pengumuman','required');
		$this->form_validation->set_rules('isi_pengumuman','Isi pengumuman','required',array('required'=>'%s Tidak Boleh Dikosongkan..!!'));

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './img/foto_pengumuman/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] =  20000;
			$this->upload->initialize($config);
				if (!$this->upload->do_upload('foto_pengumuman')) 
				{
					
					$data = array(
						'title' => 'Desa Sukamaju',
						'title2' => 'Tambahkan pengumuman',
						'error' => $this->upload->display_errors(),
						'isi' => 'admin/pengumuman/v_tambahkan');
				$this->load->view('admin/layout/v_wrapper',$data,FALSE);
				}
				else
				{
					$upload_data = array('uploads' => $this->upload->data());
					$config['image_library'] = 'gd2';
					$config['source_image'] = './img/foto_pengumuman/'.$upload_data['uploads']['file_name'];
					$this->load->library('image_lib', $config);

					$data = array(
									'judul_pengumuman' => $this->input->post('judul_pengumuman'),
									'slug_pengumuman' => url_title($this->input->post('judul_pengumuman'),'dash',TRUE),
									'isi_pengumuman' => $this->input->post('isi_pengumuman'),
									'tgl_pengumuman' => date('Y-m-d'),
									'foto_pengumuman' => $upload_data['uploads']['file_name']
								);
					$this->m_pengumuman->tambahkan($data);
					$this->session->set_flashdata('pesan','Data Berhasil Di Posting !!!');
					redirect('pengumuman');
				}
		} 

		$data = array(
						'title' => 'Desa Sukamaju',
						'title2' => 'Tambahkan pengumuman',
						'isi' => 'admin/pengumuman/v_tambahkan' 
		);
		$this->load->view('admin/layout/v_wrapper',$data,FALSE);

	}

	public function edit($id_pengumuman)
	{
		$this->form_validation->set_rules('judul_pengumuman','Judul pengumuman','required');
		$this->form_validation->set_rules('isi_pengumuman','Isi pengumuman','required',array('required'=>'%s Tidak Boleh Dikosongkan..!!'));

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './img/foto_pengumuman/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] =  20000;
			$this->upload->initialize($config);
				if (!$this->upload->do_upload('foto_pengumuman')) 
				{
					
					$data = array(
						'title' => 'Desa Sukamaju',
						'title2' => 'Edit pengumuman',
						'error' => $this->upload->display_errors(),
						'pengumuman' => $this->m_pengumuman->detail($id_pengumuman),
						'isi' => 'admin/pengumuman/v_edit');
				$this->load->view('admin/layout/v_wrapper',$data,FALSE);
				}
				else
				{
					$upload_data = array('uploads' => $this->upload->data());
					$config['image_library'] = 'gd2';
					$config['source_image'] = './img/foto_pengumuman/'.$upload_data['uploads']['file_name'];
					$this->load->library('image_lib', $config);
					//menghapus file foto lama
					$pengumuman=$this->m_pengumuman->detail($id_pengumuman);
					if ($pengumuman->foto_pengumuman !="") {
						unlink('./img/foto_pengumuman/'.$pengumuman->foto_pengumuman);
					}
					//end menghapus foto lama
					$data = array(
									'id_pengumuman' => $id_pengumuman,
									'judul_pengumuman' => $this->input->post('judul_pengumuman'),
									'slug_pengumuman' => url_title($this->input->post('judul_pengumuman'),'dash',TRUE),
									'isi_pengumuman' => $this->input->post('isi_pengumuman'),
									'foto_pengumuman' => $upload_data['uploads']['file_name']
								);
					$this->m_pengumuman->edit($data);
					$this->session->set_flashdata('pesan','Data Berhasil Di Reposting !!!');
					redirect('pengumuman');
				}

					$data = array(
									'id_pengumuman' => $id_pengumuman,
									'judul_pengumuman' => $this->input->post('judul_pengumuman'),
									'slug_pengumuman' => url_title($this->input->post('judul_pengumuman'),'dash',TRUE),
								);
					$this->m_pengumuman->edit($data);
					$this->session->set_flashdata('pesan','Data Berhasil Di Reposting !!!');
					redirect('pengumuman');
		} 

		$data = array(
						'title' => 'Desa Sukamaju',
						'title2' => 'Edit Pengumuman',
						'pengumuman' => $this->m_pengumuman->detail($id_pengumuman),
						'isi' => 'admin/pengumuman/v_edit' 
		);
		$this->load->view('admin/layout/v_wrapper',$data,FALSE);

	}

	public function delete($id_pengumuman)
	{
		//menghapus file foto lama
					$pengumuman=$this->m_pengumuman->detail($id_pengumuman);
					if ($pengumuman->foto_pengumuman !="") {
						unlink('./img/foto_pengumuman/'.$pengumuman->foto_pengumuman);
					}
					//end menghapus foto lama

					$data = array('id_pengumuman' => $id_pengumuman);
					$this->m_pengumuman->delete($data);
					$this->session->set_flashdata('pesan','Data Berhasil Di Hapus !!!');
					redirect('pengumuman');
	}
}