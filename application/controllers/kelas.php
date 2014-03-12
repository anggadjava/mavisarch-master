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
				$d['data'] = $this->app_model->getAllDataLimited("kelas",$limit,$offset);
			}
			else{
				$d['data'] = $this->app_model->searchGetAllDataLimited("kelas",$limit,$offset,array('nama','kode_bukutamu'),$_GET['cari']);
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
			$kodetamu = $this->get_kode_tamu();
			$d['judul'] ="Input Buku Tamu";
			$d['kode_bukutamu'] = $kodetamu;
			$d['cabang'] = '';
			$d['nama'] = '';
			$d['tempat_lahir'] = '';
			$d['tanggal_lahir'] = '';
			$d['hp'] = '';
			$d['alamat'] = '';
			$d['email'] = '';
			$d['telepon'] = '';
			$d['keperluan'] = '';
			$d['pilihan_hari'] = '';
			$d['pilihan_jam'] = '';
			
			$d['readonly'] = '';
			$d['content']= $this->load->view('buku_tamu/form',$d,true);
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
			$d['judul'] ="Edit Buku Tamu";
			$id = $this->uri->segment(3);
			$d['kode_bukutamu']= $id;
			
			$d['readonly'] = 'readonly';

			$d['content']= $this->load->view('buku_tamu/form',$d,true);
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
			$id = $this->input->post('kode');
			$text = "SELECT * FROM bukutamu WHERE kode_bukutamu='$id'";
			$d = $this->app_model->manualQuery($text);
			$row = $d->num_rows();
			if($row>0){
				$sql = $this->db->query("SELECT * FROM bukutamu WHERE kode_bukutamu='$id'");
				foreach ($sql->result() as  $t) {
					$up['kode_bukutamu']=$t->kode_bukutamu;
					$up['cabang'] =$t->cabang;
					$up['nama'] =$t->nama;
					$up['tempat_lahir'] = $t->tempat_lahir;
					$up['tanggal_lahir'] = $this->app_model->tgl_str($t->tanggal_lahir);
					$up['alamat'] = $t->alamat;
					$up['hp'] = $t->hp;
					$up['email'] = $t->email;
					$up['keperluan'] = $t->keperluan;
					$up['pilihan_jam'] = $t->pilihan_jam;
					$up['pilihan_hari'] = $t->pilihan_hari;
					$up['sekolah_asal'] = $t->sekolah_asal;
					$up['program'] = $t->program;
					$up['sumber_informasi'] = $t->sumber_informasi;
					$up['sumber_lain'] = $t->sumber_lain;
					echo json_encode($up);
				}
			}
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}				
			
	}
	public function get_kode_tamu(){
		$cabang = $this->session->all_userdata()['cabang'];
		$last_kode = $this->buku_tamu_model->get_last_kode($cabang);
		if ($last_kode!='') {
			$last_kode = (int)$last_kode;
		}else{
			$last_kode=0;
		}
		$new_kode=$last_kode+1;
		$new_kode = str_pad($new_kode, 3, '0', STR_PAD_LEFT);
		$kode_bukutamu = 'BT-'.$cabang.'-'.date("Y").date("m").$new_kode;
		return $kode_bukutamu;
	}

	public function simpan()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$up['kode_bukutamu'] = $this->input->post('kode_bukutamu');
			$up['cabang'] = $this->input->post('cabang');
			$up['nama'] = $this->input->post('nama');
			$up['tempat_lahir'] = $this->input->post('tempat_lahir');
			$up['tanggal_lahir'] = $this->app_model->tgl_sql($this->input->post('tanggal_lahir'));
			$up['alamat'] = $this->input->post('alamat');
			$up['email'] = $this->input->post('email');
			$up['hp'] = $this->input->post('hp');
			$up['keperluan'] = $this->input->post('keperluan');
			$up['pilihan_hari'] = $this->input->post('pilihan_hari');
			$up['pilihan_jam'] = $this->input->post('pilihan_jam');
			$up['sekolah_asal'] = $this->input->post('sekolah_asal');
			$up['program'] = $this->input->post('program');
			$up['sumber_informasi'] = $this->input->post('sumber_informasi');
			$up['sumber_lain'] = $this->input->post('sumber_lain');

			
			$id['kode_bukutamu'] = $this->input->post('kode_bukutamu');
			
			$hasil = $this->app_model->getSelectedData("bukutamu",$id);
			$row = $hasil->num_rows();
			if($row>0){
				$this->app_model->updateData("bukutamu",$up,$id);
				echo "Data sukses diubah";
			}else{
				$this->app_model->insertData("bukutamu",$up);
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
			$id = $this->input->post('kode_bukutamu');
			$this->app_model->manualQuery("DELETE FROM bukutamu WHERE kode_bukutamu='$id'");
			echo "Data Sukese dihapus";
		}else{
			header('location:'.base_url());
		}
	}
	public function followup(){
		if($this->session->userdata('logged_in')!="")
		{
			$d['judul'] ="Follow Up";
			$d['kode_bukutamu'] = $this->uri->segment(3);
			$page=$this->uri->segment(4);
			$limit=20;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $offset;
			if (empty($_GET)) {
				$tot_hal = $this->buku_tamu_model->followup_getAllData("bukutamu_followup",$d['kode_bukutamu']);
			}
			
			$config['base_url'] = site_url() . '/buku_tamu/followup/';
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
				$d['data'] = $this->buku_tamu_model->followup_getAllDataLimited("bukutamu_followup",$d['kode_bukutamu'],$limit,$offset);
			}
			
			$d['content']= $this->load->view('buku_tamu/followup',$d,true);
			$this->load->view('home',$d);
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}
	public function followup_tambah()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$d['judul'] = 'Tambah Follow Up';
			$d['kode_bukutamu'] = $this->uri->segment(3);
			$d['tanggal'] = '';
			$d['via'] = '';
			$d['hasil'] = '';
			
			$d['readonly'] = '';
			$d['content']= $this->load->view('buku_tamu/followup_form',$d,true);
			$this->load->view('home',$d);
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}
	public function followup_simpan()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$up['kode_bukutamu'] = $this->input->post('kode_bukutamu');
			$up['tanggal'] = $this->app_model->tgl_sql($this->input->post('tanggal'));
			$up['via'] = $this->input->post('via');
			$up['hasil'] = $this->input->post('hasil');

			
			$id['id'] = $this->input->post('id');
			
			$hasil = $this->app_model->getSelectedData("bukutamu_followup",$id);
			$row = $hasil->num_rows();
			if($row>0){
				$this->app_model->updateData("bukutamu_followup",$up,$id);
				echo "Data sukses diubah";
			}else{
				$this->app_model->insertData("bukutamu_followup",$up);
				echo "Data sukses disimpan";
			}
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}
	public function followup_edit()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$d['judul'] ="Edit Follow Up";
			$id = $this->uri->segment(3);
			$d['id']= $id;
			
			$d['readonly'] = 'readonly';

			$d['content']= $this->load->view('buku_tamu/followup_form',$d,true);
			$this->load->view('home',$d);
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}
	public function followup_cari_data(){
		if($this->session->userdata('logged_in')!="")
		{
			$id = $this->input->post('id');
			$text = "SELECT * FROM bukutamu_followup WHERE id='$id'";
			$d = $this->app_model->manualQuery($text);
			$row = $d->num_rows();
			if($row>0){
				$sql = $this->db->query("SELECT * FROM bukutamu_followup WHERE id='$id'");
				foreach ($sql->result() as  $t) {
					$up['id'] = $t->id;
					$up['kode_bukutamu'] = $t->kode_bukutamu;
					$up['tanggal'] = $this->app_model->tgl_str($t->tanggal);
					$up['via'] = $t->via;
					$up['hasil'] = $t->hasil;
					echo json_encode($up);
				}
			}else{
				$data['kode_bukutamu'] = '';
				echo json_encode($data);
			}
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}				
			
	}
	public function placement_test()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$d['pic_data']=$this->app_model->getAllData('guru');
			$kodetamu = $this->uri->segment(3);
			$d['judul'] ="Placement Test";
			$d['kode_bukutamu'] = $kodetamu;
			$d['pt_tanggal'] = '';
			$d['pt_pic'] = '';
			$d['pt_structure_scr'] = '';
			$d['pt_written_scr'] = '';
			$d['pt_expression_scr'] = '';
			$d['pt_rata'] = '';
			$d['pt_rec_level'] = '';
			
			$d['readonly'] = '';
			$d['content']= $this->load->view('buku_tamu/placement_test',$d,true);
			$this->load->view('home',$d);
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}
	public function pt_cari_data(){
		if($this->session->userdata('logged_in')!="")
		{
			$id = $this->input->post('kode_bukutamu');
			$text = "SELECT * FROM bukutamu WHERE kode_bukutamu='$id'";
			$d = $this->app_model->manualQuery($text);
			$row = $d->num_rows();
			if($row>0){
				$sql = $this->db->query("SELECT * FROM bukutamu WHERE kode_bukutamu='$id'");
				foreach ($sql->result() as  $t) {
					$up['kode_bukutamu'] = $t->kode_bukutamu;
					$up['pt_tanggal'] = $this->app_model->tgl_str($t->pt_tanggal);
					$up['pt_pic'] = $t->pt_pic;
					$up['pt_structure_scr'] = $t->pt_structure_scr;
					$up['pt_written_scr'] = $t->pt_written_scr;
					$up['pt_expression_scr'] = $t->pt_expression_scr;
					$up['pt_rata'] = $t->pt_rata;
					$up['pt_rec_level'] = $t->pt_rec_level;
					echo json_encode($up);
				}
			}else{
				$data['kode_bukutamu'] = $id;
				echo json_encode($data);
			}
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}				
			
	}
	public function pt_simpan()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$up['kode_bukutamu'] = $this->input->post('kode_bukutamu');
			$up['pt_tanggal'] = $this->app_model->tgl_sql($this->input->post('pt_tanggal'));
			$up['pt_pic'] = $this->input->post('pt_pic');
			$up['pt_structure_scr'] = $this->input->post('pt_structure_scr');
			$up['pt_written_scr'] = $this->input->post('pt_written_scr');
			$up['pt_expression_scr'] = $this->input->post('pt_expression_scr');
			$up['pt_rata'] = $this->input->post('pt_rata');
			$up['pt_rec_level'] = $this->input->post('pt_rec_level');

			
			$id['kode_bukutamu'] = $this->input->post('kode_bukutamu');
			
			$hasil = $this->app_model->getSelectedData("bukutamu",$id);
			$row = $hasil->num_rows();
			if($row>0){
				$this->app_model->updateData("bukutamu",$up,$id);
				echo "Data sukses diubah";
			}else{
				echo "Data Tidak Dapat Disimpan";
			}
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}
	public function pendaftaran()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$nis = $this->get_nis();
			$d['judul'] ="Pendaftaran Siswa Baru";
			$kodetamu = $this->uri->segment(3);
			$d['kode_bukutamu'] = $kodetamu;
			$d['nis'] = $nis;
			$d['cabang'] = '';
			$d['nama'] = '';
			$d['tempat_lahir'] = '';
			$d['tanggal_lahir'] = '';
			$d['hp'] = '';
			$d['alamat'] = '';
			$d['email'] = '';
			$d['telepon'] = '';
			$d['keperluan'] = '';
			$d['pilihan_hari'] = '';
			$d['pilihan_jam'] = '';
			
			$d['readonly'] = '';
			$d['content']= $this->load->view('buku_tamu/pendaftaran_form',$d,true);
			$this->load->view('home',$d);
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}	
	}
	public function get_nis(){
		$cabang = $this->session->all_userdata()['cabang'];
		$last_kode = $this->buku_tamu_model->get_nis($cabang);
		if ($last_kode!='') {
			$last_kode = (int)$last_kode;
		}else{
			$last_kode=0;
		}
		$new_kode=$last_kode+1;
		$new_kode = str_pad($new_kode, 3, '0', STR_PAD_LEFT);
		$kode_bukutamu = $cabang.'-'.date("Y").date("m").$new_kode;
		return $kode_bukutamu;
	}
	public function pendaftaran_cari_data(){
		if($this->session->userdata('logged_in')!="")
		{
			$id = $this->input->post('kode_bukutamu');
			$text = "SELECT * FROM bukutamu WHERE kode_bukutamu='$id'";
			$d = $this->app_model->manualQuery($text);
			$row = $d->num_rows();
			if($row>0){
				$sql = $this->db->query("SELECT * FROM bukutamu WHERE kode_bukutamu='$id'");
				foreach ($sql->result() as  $t) {
					$up['kode_bukutamu']=$t->kode_bukutamu;
					$up['cabang'] =$t->cabang;
					$up['nama'] =$t->nama;
					$up['tempat_lahir'] = $t->tempat_lahir;
					$up['tanggal_lahir'] = $this->app_model->tgl_str($t->tanggal_lahir);
					$up['alamat'] = $t->alamat;
					$up['hp'] = $t->hp;
					$up['email'] = $t->email;
					$up['pilihan_jam'] = $t->pilihan_jam;
					$up['pilihan_hari'] = $t->pilihan_hari;
					$up['sekolah_asal'] = $t->sekolah_asal;
					echo json_encode($up);
				}
			}
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}				
			
	}
	public function uploadFoto(){
		$this->load->helper('blueimp');
		$upload_handler = new Blueimp();
	}
	public function pendaftaran_simpan()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$up['nama']=$this->input->post('nama');
			$up['tempat_lahir']=$this->input->post('tempat_lahir');
			$up['tanggal_lahir']=$this->app_model->tgl_sql($this->input->post('tanggal_lahir'));;
			$up['alamat']=$this->input->post('alamat');
			$up['agama']=$this->input->post('agama');
			$up['rt']=$this->input->post('rt');
			$up['rw']=$this->input->post('rw');
			$up['kecamatan']=$this->input->post('kecamatan');
			$up['kota']=$this->input->post('kota');
			$up['telepon']=$this->input->post('telepon');
			$up['email']=$this->input->post('email');
			$up['pekerjaan']=$this->input->post('pekerjaan');
			$up['sekolah_asal']=$this->input->post('sekolah_asal');
			$up['pilihan_hari']=$this->input->post('pilihan_hari');
			$up['pilihan_jam']=$this->input->post('pilihan_jam');
			$up['foto']=$this->input->post('foto');
			$up['kode_bukutamu']=$this->input->post('kode_bukutamu');
			$up['cabang']=$this->input->post('cabang');
			$up['nis']=$this->input->post('nis');
			$up['tanggal_buat']=date("Y-m-d");
			$this->app_model->insertData("siswa",$up);
			$update['sudah_daftar']='1';
			$this->db->update('bukutamu', $update); 
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