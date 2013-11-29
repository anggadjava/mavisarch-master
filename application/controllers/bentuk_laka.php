<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bentuk_laka extends CI_Controller {

	/*
		***	Controller : bap.php
		***	by Nita
		***	http://deddyrusdiansyah.blogspot.com
	*/

	public function index()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$id['No_LP'] = $this->input->post('id');
			$d['data'] = $this->app_model->getSelectedData("t_bentuk_laka",$id);
			$d['content']= $this->load->view('bentuk_laka/daftar',$d);
			//$this->load->view('home',$d);
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}
	
	public function tambah()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$no = $this->app_model->No_Urut("t_bentuk_laka","Kd_Bentuk_Laka");
			
			$d['Kd_Bentuk_Laka']=$no;
			
			$d['Nama_Bentuk_Laka']='';
			$d['Golongan_Kecelakaan']='';
			$d['Keadaan_Lantas']='';
			$d['Kondisi_Jalan']='';
			//$d['Kondisi_Permukaan_Jln']='';
			$d['Situasi_Jalan']='';
			$d['Perbaikan_Jalan']='';
			$d['Bentuk_Simpangan']='';
			$d['Arus_Lalulintas']='';
			$d['Batas_Kecepatan']='';
			$d['Lingkungan_Sekitar']='';
			$d['Fungsi_Jalan']='';
			$d['Berdasarkan_Jalur']='';
			$d['Lokasi_Laka']='';
			$d['Penyebab_Laka']='';
			$d['Laka_Fungsi_Jalan']='';
			$d['Kawasan_Laka']='';

			$d['l_lokasi_laka'] = $this->app_model->manualQuery("SELECT * FROM m_lokasi_laka");
			$d['content']= $this->load->view('bentuk_laka/form',$d);
			//$this->load->view('home',$d);
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}

	public function edit()
	{
		if($this->session->userdata('logged_in')!="")
		{
		
			$id = $this->input->post('id');
			$sql = $this->db->query("SELECT * FROM t_bentuk_laka WHERE Kd_Bentuk_Laka='$id'");
			foreach ($sql->result() as  $t) {
				$data['Nama_Bentuk_Laka']=$t->Nama_Bentuk_Laka;
				$data['Golongan_Kecelakaan']=$t->Golongan_Kecelakaan;
				$data['Keadaan_Lantas']=$t->Keadaan_Lantas;
				$data['Kondisi_Jalan']=$t->Kondisi_Jalan;
				//$data['Kondisi_Permukaan_Jalan']=$t->Kondisi_Permukaan_Jln;
				$data['Situasi_Jalan']=$t->Situasi_Jalan;
				$data['Perbaikan_Jalan']=$t->Perbaikan_Jalan;
				$data['Bentuk_Simpangan']=$t->Bentuk_Simpangan;
				$data['Arus_Lalulintas'] = $t->Arus_Lalulintas;
				$data['Batas_Kecepatan'] = $t->Batas_Kecepatan;
				$data['Lingkungan_Sekitar'] = $t->Lingkungan_Sekitar;
				$data['Fungsi_Jalan'] = $t->Fungsi_Jalan;
				$data['Berdasarkan_Jalur'] = $t->Berdasarkan_Jalur;
				$data['Lokasi_Laka'] = $t->Lokasi_Laka;
				$data['Penyebab_Laka'] = $t->Penyebab_Laka;
				$data['Laka_Fungsi_Jalan'] = $t->Laka_Fungsi_Jalan;
				$data['Kawasan_Laka'] = $t->Kawasan_Laka;
				
				echo json_encode($data);
			}
			//$d['Nama_Bentuk_Laka'] ='AA';
			//$d['l_lokasi_laka'] = $this->app_model->manualQuery("SELECT * FROM m_lokasi_laka");
			//$d['content']= $this->load->view('bentuk_laka/form',$d);
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}

	public function simpan()
	{
		if($this->session->userdata('logged_in')!="")
		{
			
			$up['Kd_Bentuk_Laka'] = $this->input->post('Kd_Bentuk_Laka');
			$up['No_LP'] = $this->input->post('No_LP');
			$up['Nama_Bentuk_Laka'] = $this->input->post('Nama_Bentuk_Laka');
			$up['Golongan_Kecelakaan'] = $this->input->post('Golongan_Kecelakaan');
			$up['Keadaan_Lantas'] = $this->input->post('Keadaan_Lantas');
			$up['Kondisi_Jalan'] = $this->input->post('Kondisi_Jalan');
			//$up['Kondisi_Permukaan_Jln'] = $this->input->post('Kondisi_Permukaan_Jalan');
			$up['Situasi_Jalan'] = $this->input->post('Situasi_Jalan');
			$up['Perbaikan_Jalan'] = $this->input->post('Perbaikan_Jalan');
			$up['Bentuk_Simpangan'] = $this->input->post('Bentuk_Simpangan');
			$up['Arus_Lalulintas'] = $this->input->post('Arus_Lalulintas');
			$up['Batas_Kecepatan'] = $this->input->post('Batas_Kecepatan');
			$up['Lingkungan_Sekitar'] = $this->input->post('Lingkungan_Sekitar');
			$up['Fungsi_Jalan'] = $this->input->post('Fungsi_Jalan');
			$up['Berdasarkan_Jalur'] = $this->input->post('Berdasarkan_Jalur');
			$up['Lokasi_Laka'] = $this->input->post('Lokasi_Laka');
			$up['Penyebab_Laka'] = $this->input->post('Penyebab_Laka');
			$up['Laka_Fungsi_Jalan'] = $this->input->post('Laka_Fungsi_Jalan');
			$up['Kawasan_Laka'] = $this->input->post('Kawasan_Laka');
			
			$id['Kd_Bentuk_Laka'] = $this->input->post('Kd_Bentuk_Laka');
			
			$hasil = $this->app_model->getSelectedData("t_bentuk_laka",$id);
			$row = $hasil->num_rows();
			if($row>0){
				$this->app_model->updateData("t_bentuk_laka",$up,$id);
				echo "Data sukses diubah";
			}else{
				$this->app_model->insertData("t_bentuk_laka",$up);
				echo "Data sukses disimpan";
			}
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}

	public function hapus()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){			
			$id = $this->input->post('id');
			$this->app_model->manualQuery("DELETE FROM t_bentuk_laka WHERE Kd_Bentuk_Laka='$id'");
			echo "Data Sukese dihapus";
		}else{
			header('location:'.base_url());
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/login.php */