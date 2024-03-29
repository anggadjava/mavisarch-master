<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Petugas extends CI_Controller {

	/*
		***	Controller : bap.php
		***	by Nita
		***	http://deddyrusdiansyah.blogspot.com
	*/

	public function index()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$d['judul'] ="Manajemen User / Petugas";
			
			$page=$this->uri->segment(3);
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $offset;
			$tot_hal = $this->app_model->getAllData("t_petugas");
			$config['base_url'] = site_url() . '/Petugas/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data'] = $this->app_model->getAllDataLimited("t_petugas",$limit,$offset);
			
			$d['content']= $this->load->view('petugas/daftar',$d,true);
			$this->load->view('home',$d);
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
			$d['judul'] ="Manajemen User / Petugas";
			
			$d['content']= $this->load->view('petugas/form',$d,true);
			$this->load->view('home',$d);
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
			$d['judul'] ="Manajemen User / Petugas";
			
			
			$id = $this->uri->segment(3);
			$sql = $this->db->query("SELECT * FROM t_kecelakaan WHERE No_LP='$id'");
			foreach ($sql->result() as  $t) {
				$d['No_LP']=$t->No_LP;
			}

			//$d['l_petugas'] = $this->app_model->getAllData("t_petugas");

			$d['content']= $this->load->view('bap/form',$d,true);
			$this->load->view('home',$d);
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
			$up['No_LP'] = $this->input->post('No_LP');
			$up['ID_Petugas'] = $this->session->userdata('username');;
			$up['Waktu_Kejadian'] = $this->app_model->tgl_jam_sql($this->input->post('Waktu_Kejadian'));
			$up['Waktu_Dilaporkan'] = $this->app_model->tgl_jam_sql($this->input->post('Waktu_Dilaporkan'));
			$up['Waktu_Diterima'] = $this->app_model->tgl_jam_sql($this->input->post('Waktu_Diterima'));
			$up['Alamat_Kejadian'] = $this->input->post('Alamat_Kejadian');
			$up['Keadaan_Pengemudi'] = $this->input->post('Keadaan_Pengemudi');
			$up['Keadaan_Cuaca'] = $this->input->post('Keadaan_Cuaca');
			$up['Posisi'] = $this->input->post('Posisi');
			$up['Kerusakan_Benda'] = $this->input->post('Kerusakan_Benda');
			$up['Kerugian_Materi'] = $this->input->post('Kerugian_Materi');
			$up['Ket_Singkat'] = $this->input->post('Ket_Singkat');
			$up['Kesimpulan'] = $this->input->post('Kesimpulan');
			$up['BB'] = $this->input->post('BB');
			$up['Orang_Ditahan'] = $this->input->post('Orang_Ditahan');
			
			$id['No_LP'] = $this->input->post('No_LP');
			
			$hasil = $this->app_model->getSelectedData("t_kecelakaan",$id);
			$row = $hasil->num_rows();
			if($row>0){
				$this->app_model->updateData("t_kecelakaan",$up,$id);
				echo "Data sukses diubah";
			}else{
				$this->app_model->insertData("t_kecelakaan",$up);
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
			//$id = $this->uri->segment(3);
			$id = $this->input->post('id');
			$this->app_model->manualQuery("DELETE FROM t_kecelakaan WHERE No_LP='$id'");
			//echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/barang'>";			
			echo "Data Sukese dihapus";
		}else{
			header('location:'.base_url());
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/login.php */