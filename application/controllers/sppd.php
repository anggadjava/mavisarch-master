<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sppd extends CI_Controller {

	/**
	 * @keterangan : Controller untuk halaman profil
	 **/
	
	public function index()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['instansi'] = $this->config->item('nama_instansi');
			$d['alamat'] = $this->config->item('alamat_instansi');
			
			$page=$this->uri->segment(3);
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $offset;
			$tot_hal = $this->app_model->getAllData("tbsppd");
			$config['base_url'] = site_url() . '/sppd/index/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data'] = $this->app_model->getAllDataLimited("tbsppd",$limit,$offset);
			
			$d['content']= $this->load->view('sppd/daftar',$d,true);
			
			$this->load->view('home',$d);
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}
	
	public function cari()
	{
		if($this->session->userdata('logged_in')!="")
		{
			
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['instansi'] = $this->config->item('nama_instansi');
			$d['alamat'] = $this->config->item('alamat_instansi');
			
			if($this->input->post("cari")=="" && $this->input->post("cari_tgl")=="")
			{
				$where = " "; 
			}
			else
			{
				$tgl = $this->app_model->tgl_sql($this->input->post('cari_tgl'));
				$kata = $this->input->post("cari");
				if(!empty($kata) && !empty($tgl)){
					$where = " WHERE tglsurat='$tgl' AND (nama LIKE '%$kata%' OR tujuan  LIKE '%$kata%')";
				}
				if(!empty($kata) && empty($tgl)){
					$where = " WHERE nama LIKE '%$kata%' OR tujuan  LIKE '%$kata%'";
				}
				if(empty($kata) && !empty($tgl)){
					$where = " WHERE tglsurat='$tgl'";
				}
			}
		
			$page=$this->uri->segment(3);
			$limit=$this->config->item('limit_data');
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;
			
			$d['tot'] = $offset;
			$tot_hal = $this->app_model->manualQuery("SELECT * FROM tbsp $where");
			$config['base_url'] = site_url() . '/surat_tugas/cari/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$d["paginator"] =$this->pagination->create_links();
			
			$d['data'] = $this->app_model->manualQuery("SELECT * FROM tbsp $where LIMIT $limit OFFSET $offset");
			
			$d['content']= $this->load->view('surat_tugas/daftar',$d,true);
					
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
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['instansi'] = $this->config->item('nama_instansi');
			$d['alamat'] = $this->config->item('alamat_instansi');
			
			$d['id'] = '';
			$d['nomor'] = '';
			$d['tgl'] = date('d-m-Y');
			$d['nip'] = '';
			$d['nama'] = '';
			$d['gol'] = '';
			$d['pangkat'] = '';
			$d['jab'] = '';
			$d['tujuan'] = '';
			$d['maksud'] = '';
			$d['catatan'] = '';
			
			
			$d['l_jab'] = $this->app_model->getAllData("jabatan");
			
			$d['content']= $this->load->view('surat_tugas/form',$d,true);
			
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
			$d['judul_lengkap'] = $this->config->item('nama_aplikasi_full');
			$d['judul_pendek'] = $this->config->item('nama_aplikasi_pendek');
			$d['credit'] = $this->config->item('credit_aplikasi');
			$d['instansi'] = $this->config->item('nama_instansi');
			$d['alamat'] = $this->config->item('alamat_instansi');
			
			$id['id'] = $this->uri->segment(3);
			$data = $this->app_model->getSelectedData("tbsp",$id);
			foreach($data->result() as $t){
				$d['id'] = $t->id;
				$d['nomor'] = $t->nomor;
				$d['tgl'] = $this->app_model->tgl_str($t->tglsurat);
				$d['nip'] = $t->nip;
				$d['nama'] = $t->nama;
				$d['gol'] = $t->gol;
				$d['pangkat'] = $t->pangkat;
				$d['jab'] = $t->jabatan;
				$d['tujuan'] = $t->tujuan;
				$d['maksud'] = $t->maksud;
				$d['catatan'] = $t->catatan;
			}
			
			$d['l_jab'] = $this->app_model->getAllData("jabatan");
			
			$d['content']= $this->load->view('surat_tugas/form',$d,true);
			
			$this->load->view('home',$d);
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}
	
	public function Hapus()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){
			$id['id'] = $this->uri->segment(3); 
			
			$hasil = $this->app_model->getSelectedData("tbsp",$id);
			if($hasil->num_rows()>0){
				$this->app_model->deleteData("tbsp",$id);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/surat_tugas'>";			
			}
	
		}else{
				header('location:'.base_url().'index.php/login');
		}
	}
	
	public function simpan()
	{
		if($this->session->userdata('logged_in')!="")
		{	
			$tgl = $this->app_model->tgl_sql($this->input->post('tgl'));
			
			$up['nomor'] = $this->input->post('nomor');
			$up['tglsurat'] = $tgl;
			$up['nip'] = $this->input->post('nip');
			$up['nama'] = $this->input->post('nama');
			$up['gol'] = $this->input->post('gol');
			$up['pangkat'] = $this->input->post('pangkat');
			$up['jabatan'] = $this->input->post('jabatan');
			$up['tujuan'] = $this->input->post('tujuan');
			$up['maksud'] = $this->input->post('maksud');
			$up['catatan'] = $this->input->post('catatan');
			$up['userid'] = $this->session->userdata('username');
			$up['tglinsert'] = date('Y-m-d h:m:s');
			
			$id['nomor'] = $this->input->post('nomor');
			
			$hasil = $this->app_model->getSelectedData("tbsp",$id);
			$row = $hasil->num_rows();
			if($row>0){
				$this->app_model->updateData("tbsp",$up,$id);
				echo "Data sukses diubah";
			}else{
				$this->app_model->insertData("tbsp",$up);
				echo "Data sukses disimpan";
			}
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}
	public function cetak()
	{
		if($this->session->userdata('logged_in')!="")
		{	
			$dt['id'] = $this->uri->segment(3);
			$hasil = $this->app_model->getSelectedData("tbsp",$dt);
			$row = $hasil->num_rows();
			if($row>0){
				foreach($hasil->result() as $t){
					$document = file_get_contents("./asset/dok/surat_tugas.rtf");
					$tgl		= $this->app_model->tgl_indo($t->tglsurat);
					$document = str_replace("=Nomor=", $t->nomor, $document);
					$document = str_replace("=Nama=", $t->nama, $document);
					$document = str_replace("=Gol=", $t->gol, $document);
					$document = str_replace("=Pangkat=", $t->pangkat, $document);
					$document = str_replace("=Jabatan=", $t->jabatan, $document);
					$document = str_replace("=Maksud=", $t->maksud, $document);
					$document = str_replace("=Tanggal=", $tgl, $document);
					
					header("Content-type: application/msword");
					header("Content-disposition: inline; filename=surat_tugas.rtf");
					header("Content-length: " . strlen($document));
					echo $document;
				}
			}
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}		
}

/* End of file profil.php */
/* Location: ./application/controllers/profil.php */