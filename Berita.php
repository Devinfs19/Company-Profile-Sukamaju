<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_berita');
	}

	public function index()
	{
		$data = array(
			'title' => 'Desa Sukamaju',
			'title2' => 'Data Berita',
			'berita' => $this->m_berita->lists(),
			'isi' => 'admin/berita/v_berita' 
		);
		$this->load->view('admin/layout/v_wrapper',$data,FALSE);
	}

	public function tambahkan()
	{
		$this->form_validation->set_rules('judul_berita','Judul Berita','required');
		$this->form_validation->set_rules('isi_berita','Isi Berita','required',array('required'=>'%s Tidak Boleh Dikosongkan..!!'));

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './img/foto_berita/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] =  20000;
			$this->upload->initialize($config);
				if (!$this->upload->do_upload('foto_berita')) 
				{
					
					$data = array(
						'title' => 'Desa Sukamaju',
						'title2' => 'Tambahkan Berita',
						'error' => $this->upload->display_errors(),
						'isi' => 'admin/berita/v_tambahkan');
				$this->load->view('admin/layout/v_wrapper',$data,FALSE);
				}
				else
				{
					$upload_data = array('uploads' => $this->upload->data());
					$config['image_library'] = 'gd2';
					$config['source_image'] = './img/foto_berita/'.$upload_data['uploads']['file_name'];
					$this->load->library('image_lib', $config);

					$data = array(
									'judul_berita' => $this->input->post('judul_berita'),
									'slug_berita' => url_title($this->input->post('judul_berita'),'dash',TRUE),
									'isi_berita' => $this->input->post('isi_berita'),
									'tgl_berita' => date('Y-m-d'),
									'foto_berita' => $upload_data['uploads']['file_name']
								);
					$this->m_berita->tambahkan($data);
					$this->session->set_flashdata('pesan','Data Berhasil Di Posting !!!');
					redirect('berita');
				}
		} 

		$data = array(
						'title' => 'Desa Sukamaju',
						'title2' => 'Tambahkan berita',
						'isi' => 'admin/berita/v_tambahkan' 
		);
		$this->load->view('admin/layout/v_wrapper',$data,FALSE);

	}

	public function edit($id_berita)
	{
		$this->form_validation->set_rules('judul_berita','Judul Berita','required');
		$this->form_validation->set_rules('isi_berita','Isi Berita','required',array('required'=>'%s Tidak Boleh Dikosongkan..!!'));

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './img/foto_berita/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] =  20000;
			$this->upload->initialize($config);
				if (!$this->upload->do_upload('foto_berita')) 
				{
					
					$data = array(
						'title' => 'Desa Sukamaju',
						'title2' => 'Edit Berita',
						'error' => $this->upload->display_errors(),
						'berita' => $this->m_berita->detail($id_berita),
						'isi' => 'admin/berita/v_edit');
				$this->load->view('admin/layout/v_wrapper',$data,FALSE);
				}
				else
				{
					$upload_data = array('uploads' => $this->upload->data());
					$config['image_library'] = 'gd2';
					$config['source_image'] = './img/foto_berita/'.$upload_data['uploads']['file_name'];
					$this->load->library('image_lib', $config);
					//menghapus file foto lama
					$berita=$this->m_berita->detail($id_berita);
					if ($berita->foto_berita !="") {
						unlink('./img/foto_berita/'.$berita->foto_berita);
					}
					//end menghapus foto lama
					$data = array(
									'id_berita' => $id_berita,
									'judul_berita' => $this->input->post('judul_berita'),
									'slug_berita' => url_title($this->input->post('judul_berita'),'dash',TRUE),
									'isi_berita' => $this->input->post('isi_berita'),
									'foto_berita' => $upload_data['uploads']['file_name']
								);
					$this->m_berita->edit($data);
					$this->session->set_flashdata('pesan','Data Berhasil Di Reposting !!!');
					redirect('berita');
				}

					$data = array(
									'id_berita' => $id_berita,
									'judul_berita' => $this->input->post('judul_berita'),
									'slug_berita' => url_title($this->input->post('judul_berita'),'dash',TRUE),
								);
					$this->m_berita->edit($data);
					$this->session->set_flashdata('pesan','Data Berhasil Di Reposting !!!');
					redirect('berita');
		} 

		$data = array(
						'title' => 'Desa Sukamaju',
						'title2' => 'Edit berita',
						'berita' => $this->m_berita->detail($id_berita),
						'isi' => 'admin/berita/v_edit' 
		);
		$this->load->view('admin/layout/v_wrapper',$data,FALSE);

	}

	public function delete($id_berita)
	{
		//menghapus file foto lama
					$berita=$this->m_berita->detail($id_berita);
					if ($berita->foto_berita !="") {
						unlink('./img/foto_berita/'.$berita->foto_berita);
					}
					//end menghapus foto lama

					$data = array('id_berita' => $id_berita);
					$this->m_berita->delete($data);
					$this->session->set_flashdata('pesan','Data Berhasil Di Hapus !!!');
					redirect('berita');
	}
}