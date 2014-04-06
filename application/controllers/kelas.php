<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kelas extends CI_Controller {

	/*
		***	Controller : guru.php
		***	by Angga
	*/
	   public function __construct()
       {
            parent::__construct();
            $this->load->model('kelas_model');
       }
	public function index()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$d['judul'] ="Kelas";
			
			$page=$this->uri->segment(3);
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $offset;
			if (empty($_GET)) {
				$tot_hal = $this->app_model->getAllData("kelas");
			}
			else{
				$tot_hal = $this->app_model->searchGetAllData('kelas',array('kode_kelas','guru'),$_GET['cari']);	
			}
			
			$config['base_url'] = site_url() . '/kelas/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			if (empty($_GET)) {
				$d['data'] = $this->kelas_model->getAllDataLimited("kelas",$limit,$offset);
			}
			else{
				$d['data'] = $this->kelas_model->searchGetAllDataLimited("kelas",$limit,$offset,array('nama','kode_bukutamu'),$_GET['cari']);
			}
			
			$d['content']= $this->load->view('kelas/list',$d,true);
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
			$d['judul'] ="Input Kelas";
			$d['kode_kelas']= '';
			
			$d['readonly'] = '';
			$d['content']= $this->load->view('kelas/form',$d,true);
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
			$d['judul'] ="Edit Kelas";
			$id = $this->uri->segment(3);
			$d['kode_kelas']= $id;
			
			$d['readonly'] = 'readonly';

			$d['content']= $this->load->view('kelas/form',$d,true);
			$this->load->view('home',$d);
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}
	public function cari_data(){
		if($this->session->userdata('logged_in')!="")
		{
			$id = $this->input->post('kode_kelas');
			$text = "SELECT * FROM kelas WHERE kode_kelas='$id'";
			$d = $this->app_model->manualQuery($text);
			$row = $d->num_rows();
			if($row>0){
				$sql = $this->db->query("SELECT * FROM kelas WHERE kode_kelas='$id'");
				foreach ($sql->result() as  $t) {
					$up['kode_kelas']=$t->kode_kelas;
					$up['cabang'] =$t->cabang;
					$up['level'] =$t->level;
					$up['ruang'] =$t->ruang;
					$up['hari'] = $t->hari;
					$up['jam'] = $t->jam;
					$up['tanggal_mulai'] = $this->app_model->tgl_str($t->tgl_mulai);
					$up['tanggal_ujian'] = $this->app_model->tgl_str($t->tgl_ujian);
					$up['tanggal_selesai'] = $this->app_model->tgl_str($t->tgl_selesai);
					$up['guru'] = $t->guru;
					$up['harga'] = $t->harga;
					$up['jumlah_pertemuan'] = $t->jumlah_pertemuan;
					echo json_encode($up);
				}
			}
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}				
			
	}
	public function get_kode_kelas(){
		$cabang = $this->session->userdata('cabang');
		$level = $this->input->post('level');
		$last_kode = $this->kelas_model->get_last_kode($cabang,$level);
		if ($last_kode!='') {
			$last_kode = (int)$last_kode;
		}else{
			$last_kode=0;
		}
		$new_kode=$last_kode+1;
		$new_kode = str_pad($new_kode, 3, '0', STR_PAD_LEFT);
		$kode_kelas['kode'] = $cabang.'-'.$level.'-'.date("Y").date("m").$new_kode;
		echo json_encode($kode_kelas);
	}

	public function simpan()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$up['kode_kelas'] = $this->input->post('kode_kelas');
			$up['cabang'] = $this->input->post('cabang');
			$up['level'] = $this->input->post('level');
			$up['hari'] = $this->input->post('pilihan_hari');
			$up['jam'] = $this->input->post('pilihan_jam');
			$up['ruang'] = $this->input->post('ruang');
			$up['guru'] = $this->input->post('guru');
			$up['jumlah_pertemuan'] = $this->input->post('jumlah_pertemuan');
			$up['tgl_mulai'] = $this->app_model->tgl_sql($this->input->post('tanggal_mulai'));
			$up['tgl_ujian'] = $this->app_model->tgl_sql($this->input->post('tanggal_ujian'));
			$up['tgl_selesai'] = $this->app_model->tgl_sql($this->input->post('tanggal_selesai'));
			$up['harga'] = $this->input->post('harga');

			
			$id['kode_kelas'] = $this->input->post('kode_kelas');
			
			$hasil = $this->app_model->getSelectedData("kelas",$id);
			$row = $hasil->num_rows();
			if($row>0){
				$this->app_model->updateData("kelas",$up,$id);
				echo "Data sukses diubah";
			}else{
				$this->app_model->insertData("kelas",$up);
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
			$id = $this->input->post('kode_kelas');
			$this->app_model->manualQuery("DELETE FROM kelas WHERE kode_kelas='$id'");
			echo "Data Sukese dihapus";
		}else{
			header('location:'.base_url());
		}
	}

	public function detail()
	{
		if($this->session->userdata('logged_in')!="")
		{
			if ($this->uri->segment(3)!='') {
				$d['judul'] ="Detail Kelas";
				$kode_kelas = $this->uri->segment(3);
				$page=$this->uri->segment(4);
				$limit=$this->config->item('limit_data');
				if(!$page):
				$offset = 0;
				else:
				$offset = $page;
				endif;
				
				$d['tot'] = $offset;
				if (empty($_GET)) {
					$tot_hal = $this->app_model->getAllData("nilai");
				}
				
				$config['base_url'] = site_url() . '/kelas/detail/';
				$config['total_rows'] = $tot_hal->num_rows();
				$config['per_page'] = $limit;
				$config['uri_segment'] = 4;
				$config['first_link'] = 'Awal';
				$config['last_link'] = 'Akhir';
				$config['next_link'] = 'Selanjutnya';
				$config['prev_link'] = 'Sebelumnya';
				$this->pagination->initialize($config);
				$d["paginator"] =$this->pagination->create_links();
				if (empty($_GET)) {
					$d['data'] = $this->kelas_model->getKelasSiswaLimited($kode_kelas,"nilai",$limit,$offset);
				}
				$d['content']= $this->load->view('kelas/list_siswa',$d,true);
				$this->load->view('home',$d);
			}
			else{
				header('location:'.base_url().'index.php/kelas');		
			}
			
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}
	public function tambahKelasSiswa()
	{
		if($this->session->userdata('logged_in')!="")
		{
			if ($this->uri->segment(3)!='') {
				$d['judul'] ="Tambah Siswa";
				$d['kode_kelas']= $this->uri->segment(3);
				$cabang = $this->session->userdata('cabang');
				$d['list_siswa']  = $this->kelas_model->getListSiswaKelas($cabang);
				$d['readonly'] = '';
				$d['content']= $this->load->view('kelas/KelasSiswaForm',$d,true);
				$this->load->view('home',$d);
			}
			else{
				header('location:'.base_url().'index.php/kelas');		
			}
			
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}
	public function getDataSiswa(){
		if($this->session->userdata('logged_in')!="")
		{
			$id = $this->input->post('nis');
			$text = "SELECT * FROM siswa WHERE nis='$id'";
			$d = $this->app_model->manualQuery($text);
			$row = $d->num_rows();
			if($row>0){
				$sql = $this->db->query("SELECT * FROM siswa WHERE nis='$id'");
				foreach ($sql->result() as  $t) {
					$up['nis'] =$t->nis;
					$up['tempat_lahir'] =$t->tempat_lahir;
					$up['tanggal_lahir'] = $this->app_model->tgl_str($t->tanggal_lahir);
					$up['alamat'] =$t->alamat;
					$up['telepon'] = $t->telepon;
					echo json_encode($up);
				}
			}
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}				
			
	}
	public function kelasSiswaSimpan()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$up['nis'] = $this->input->post('nis');
			$up['kode_kelas'] = $this->input->post('kode_kelas');
			$up['cabang'] = $this->session->userdata('cabang');
			$this->app_model->insertData("nilai",$up);
			$data_kelas = $this->kelas_model->getKelasData($this->input->post('kode_kelas'));
			$up2['nis'] = $this->input->post('nis');
			$up2['jenis_tagihan'] = 'Biaya Masuk Kelas';
			$up2['notes'] = 'Biaya Masuk Kelas '.$this->input->post('kode_kelas');
			$up2['besar_tagihan'] = $data_kelas->harga;
			$up2['cabang'] = $this->session->userdata('cabang');
			$up2['tanggal_buat'] = date('Y-m-d');
			$this->app_model->insertData("tagihan",$up2);
			echo "Data sukses disimpan";
		}	
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}
	public function penilaian()
	{
		if($this->session->userdata('logged_in')!="")
		{
			if ($this->uri->segment(3)!='') {
				$d['judul'] ="Penilaian";
				$kode_kelas = $this->uri->segment(3);
				$page=$this->uri->segment(4);
				$limit=$this->config->item('limit_data');
				if(!$page):
				$offset = 0;
				else:
				$offset = $page;
				endif;
				
				$d['tot'] = $offset;
				if (empty($_GET)) {
					$tot_hal = $this->app_model->getAllData("nilai");
				}
				
				$config['base_url'] = site_url() . '/kelas/penilaian/';
				$config['total_rows'] = $tot_hal->num_rows();
				$config['per_page'] = $limit;
				$config['uri_segment'] = 4;
				$config['first_link'] = 'Awal';
				$config['last_link'] = 'Akhir';
				$config['next_link'] = 'Selanjutnya';
				$config['prev_link'] = 'Sebelumnya';
				$this->pagination->initialize($config);
				$d["paginator"] =$this->pagination->create_links();
				if (empty($_GET)) {
					$d['data'] = $this->kelas_model->getKelasSiswaLimited($kode_kelas,"nilai",$limit,$offset);
				}
				$d['content']= $this->load->view('kelas/penilaian',$d,true);
				$this->load->view('home',$d);
				}
			else{
				header('location:'.base_url().'index.php/kelas');		
			}
			
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}
	public function penilaianSimpan()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$up= $this->input->post('nilai');
			foreach ($up as $key) {
				$id['nis'] = $key['nis'];
				$id['kode_kelas'] = $key['kode_kelas'];
				$this->app_model->updateData("nilai",$key,$id);
			}
			
			
			echo "Data sukses disimpan";
		}	
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}
	public function penilaianCariData(){
		if($this->session->userdata('logged_in')!="")
		{
			$id = $this->input->post('kode_kelas');
			$text = "SELECT * FROM nilai WHERE kode_kelas='$id'";
			$d = $this->app_model->manualQuery($text);
			$row = $d->num_rows();
			if($row>0){
				$sql = $this->db->query("SELECT * FROM nilai WHERE kode_kelas='$id'");
				// foreach ($sql->result_array() as  $t) {
				// 	 echo json_encode($t);
				// }
				echo json_encode($sql->result_array());
			}
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}				
			
	}
	public function studentprogress()
	{
		if($this->session->userdata('logged_in')!="")
		{
			if ($this->uri->segment(3)!='') {
				$d['judul'] ="Student Progress";
				$kode_kelas = $this->uri->segment(3);
				$page=$this->uri->segment(4);
				$limit=$this->config->item('limit_data');
				if(!$page):
				$offset = 0;
				else:
				$offset = $page;
				endif;
				
				$d['tot'] = $offset;
				if (empty($_GET)) {
					$tot_hal = $this->app_model->getAllData("nilai");
				}
				
				$config['base_url'] = site_url() . '/kelas/studentprogress/';
				$config['total_rows'] = $tot_hal->num_rows();
				$config['per_page'] = $limit;
				$config['uri_segment'] = 4;
				$config['first_link'] = 'Awal';
				$config['last_link'] = 'Akhir';
				$config['next_link'] = 'Selanjutnya';
				$config['prev_link'] = 'Sebelumnya';
				$this->pagination->initialize($config);
				$d["paginator"] =$this->pagination->create_links();
				if (empty($_GET)) {
					$d['data'] = $this->kelas_model->getKelasSiswaLimited($kode_kelas,"nilai",$limit,$offset);
				}
				$d['content']= $this->load->view('kelas/studentprogress',$d,true);
				$this->load->view('home',$d);
				}
			else{
				header('location:'.base_url().'index.php/kelas');		
			}
			
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}
	public function studentProgressSimpan()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$up= $this->input->post('nilai');
			foreach ($up as $key) {
				$id['nis'] = $key['nis'];
				$id['kode_kelas'] = $key['kode_kelas'];
				$this->app_model->updateData("nilai",$key,$id);
			}
			echo "Data sukses disimpan";
		}	
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}
	public function studentProgressCariData(){
		if($this->session->userdata('logged_in')!="")
		{
			$id = $this->input->post('kode_kelas');
			$text = "SELECT * FROM nilai WHERE kode_kelas='$id'";
			$d = $this->app_model->manualQuery($text);
			$row = $d->num_rows();
			if($row>0){
				$sql = $this->db->query("SELECT * FROM nilai WHERE kode_kelas='$id'");
				// foreach ($sql->result_array() as  $t) {
				// 	 echo json_encode($t);
				// }
				echo json_encode($sql->result_array());
			}
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}				
			
	}
	public function pertemuan()
	{
		if($this->session->userdata('logged_in')!="")
		{
			if ($this->uri->segment(3)!='') {
				$d['judul'] ="Pertemuan";
				$kode_kelas=$this->uri->segment(3);
				$d['data'] = $this->kelas_model->getListPertemuan($kode_kelas);
				$d['content']= $this->load->view('kelas/pertemuan',$d,true);
				$this->load->view('home',$d);
			}
			else{
				header('location:'.base_url().'index.php/kelas');		
			}
			
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}
	public function tambahPertemuan()
	{
		if($this->session->userdata('logged_in')!="")
		{
			if ($this->uri->segment(3)!='') {
				$d['judul'] ="Input Pertemuan";
				$d['id']= '';
				$d['readonly'] = '';
				$d['content']= $this->load->view('kelas/formTambahPertemuan',$d,true);
				$this->load->view('home',$d);
			}
			else{
				header('location:'.base_url().'index.php/kelas');		
			}
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}

	public function editPertemuan()
	{
		if($this->session->userdata('logged_in')!="")
		{
			if ($this->uri->segment(3)!='') {
				$d['judul'] ="Edit Kelas";
				$id = $this->uri->segment(4);
				$d['id']= $id;
				
				$d['readonly'] = 'readonly';

				$d['content']= $this->load->view('kelas/formTambahPertemuan',$d,true);
				$this->load->view('home',$d);
			}
			else{
				header('location:'.base_url().'index.php/kelas');		
			}
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}
	public function simpanPertemuan()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$up['kode_kelas'] = $this->input->post('kode_kelas');
			$up['tanggal'] = $this->app_model->tgl_sql($this->input->post('tanggal'));

			
			$id['id'] = $this->input->post('id');
			
			$hasil = $this->app_model->getSelectedData("kelas_pertemuan",$id);
			$row = $hasil->num_rows();
			if($row>0){
				$this->app_model->updateData("kelas_pertemuan",$up,$id);
				echo "Data sukses diubah";
			}else{
				$this->app_model->insertData("kelas_pertemuan",$up);
				echo "Data sukses disimpan";
			}
			$data_siswa = $this->kelas_model->getKelasSiswa();
			foreach ($data_siswa->result_array() as $key) {
				$up2['id_pertemuan'] = $this->kelas_model->getPertemuanId($up['kode_kelas'],$up['tanggal']);
				$up2['nis']=$key['nis'];
				$this->app_model->insertData("presensi",$up2);
			}
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}
	public function cariDataPertemuan(){
		if($this->session->userdata('logged_in')!="")
		{
			$id = $this->input->post('id');
			$text = "SELECT * FROM kelas_pertemuan WHERE id='$id'";
			$d = $this->app_model->manualQuery($text);
			$row = $d->num_rows();
			if($row>0){
				$sql = $this->db->query("SELECT * FROM kelas_pertemuan WHERE id='$id'");
				foreach ($sql->result() as  $t) {
					$up['tanggal'] = $this->app_model->tgl_str($t->tanggal);
					echo json_encode($up);
				}
			}
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}				
			
	}
	public function hapusPertemuan()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){			
			$id = $this->input->post('id');
			$this->app_model->manualQuery("DELETE FROM kelas_pertemuan WHERE id='$id'");
			echo "Data Sukese dihapus";
		}else{
			header('location:'.base_url());
		}
	}
	public function absensi()
	{
		if($this->session->userdata('logged_in')!="")
		{
			if ($this->uri->segment(3)!='') {
				$d['judul'] ="Absensi";
				$id_pertemuan=$this->uri->segment(4);
				$d['data'] = $this->kelas_model->getListAbsensi($id_pertemuan);
				$d['content']= $this->load->view('kelas/absensi',$d,true);
				$this->load->view('home',$d);
			}
			else{
				header('location:'.base_url().'index.php/kelas');		
			}
			
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}
	public function absensiCariData(){
		if($this->session->userdata('logged_in')!="")
		{
			$id = $this->input->post('id_pertemuan');
			$text = "SELECT * FROM presensi WHERE id_pertemuan='$id'";
			$d = $this->app_model->manualQuery($text);
			$row = $d->num_rows();
			if($row>0){
				$sql = $this->db->query("SELECT * FROM presensi WHERE id_pertemuan='$id'");
				echo json_encode($sql->result_array());
			}
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}				
			
	}
	public function absensiSimpan()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$up= $this->input->post('absen');
			foreach ($up as $key) {
				$id['nis'] = $key['nis'];
				$id['id_pertemuan'] = $key['id_pertemuan'];
				$this->app_model->updateData("presensi",$key,$id);
			}
			echo "Data sukses disimpan";
		}	
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}



	
}

/* End of file welcome.php */
/* Location: ./application/controllers/login.php */