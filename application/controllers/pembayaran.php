<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	 public function __construct()
       {
            parent::__construct();
            $this->load->model('pembayaran_model');
       }
	public function index()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$nis= $this->input->post('nis');
			$d['data'] = $this->pembayaran_model->getAllData($nis);
			$d['content']= $this->load->view('pembayaran/daftar',$d);
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
			$cabang = $this->session->userdata('cabang');
			$d['judul']='Tambah Pembayaran';
			$d['nis']=$this->uri->segment(3);
			$d['cabang']=$cabang;
			$d['content']= $this->load->view('pembayaran/form',$d,true);
			$this->load->view('home',$d);
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}
	public function cari_jenis_tagihan(){
		if($this->session->userdata('logged_in')!="")
		{
			$id = $this->input->post('id');
			$text = "SELECT * FROM jenis_tagihan WHERE nama_tagihan='$id'";
			$d = $this->app_model->manualQuery($text);
			$row = $d->num_rows();
			if($row>0){
				$sql = $this->db->query("SELECT * FROM jenis_tagihan WHERE nama_tagihan='$id'");
				foreach ($sql->result() as  $t) {
					$up['besar_tagihan'] = $t->besar_tagihan;
					$up['deskripsi_tagihan'] = $t->deskripsi_tagihan;
					echo json_encode($up);
				}
			}
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
			$d['judul'] ="Edit Tagihan";
			
			$id = $this->input->post('id');
			$sql = $this->db->query("SELECT * FROM tagihan WHERE id='$id'");
			foreach ($sql->result() as  $t) {
				//$up['No_LP']=$t->No_LP;
				$up['nis'] = $t->nis;
				$up['cabang'] =$t->cabang;
				$up['besar_tagihan'] = $t->besar_tagihan;
				$up['jenis_tagihan'] = $t->jenis_tagihan;
				$up['notes'] = $t->notes;
				$up['potongan'] = $t->potongan;
				echo json_encode($up);
			}
		}else{
			header('location:'.base_url().'index.php/login');
		}
	}

	public function simpan()
	{
		if($this->session->userdata('logged_in')!="")
		{
			$kwitansi['id'] = $this->getKwitansiId($this->input->post('cabang'));
			$kwitansi['nis'] = $this->input->post('nis');
			$kwitansi['cabang'] =$this->input->post('cabang');
			$kwitansi['keterangan'] = $this->input->post('keterangan');
			$kwitansi['tanggal'] = $this->app_model->tgl_sql($this->input->post('tanggal'));
			$totbay=0;
			foreach ($this->input->post('item') as $key) {
				$item_kwitansi['id_kwitansi'] = $kwitansi['id'];
				$item_kwitansi['id_tagihan'] = $key['id_tagihan'];
				$item_kwitansi['jumlah_bayar'] = $key['jumlah_bayar'];
				$item_kwitansi['notes'] = $key['notes'];
				$this->app_model->insertData("kwitansi_item",$item_kwitansi);
				// print_r($item_kwitansi);
				$totbay = $totbay+$key['jumlah_bayar'];
			}
			$kwitansi['total_bayar'] = $totbay;
			$this->app_model->insertData("kwitansi",$kwitansi);
			// print_r($kwitansi);

			echo "Data sukses disimpan";
		}
		else
		{
			header('location:'.base_url().'index.php/login');
		}
	}
	public function getKwitansiId($cabang){
		$last_kode = $this->pembayaran_model->getLastKode($cabang);
		if ($last_kode!='') {
			$last_kode = (int)$last_kode;
		}else{
			$last_kode=0;
		}
		$new_kode=$last_kode+1;
		$new_kode = str_pad($new_kode, 3, '0', STR_PAD_LEFT);
		$kode_bukutamu = 'KWI-'.$cabang.'-'.date("Y").date("m").$new_kode;
		return $kode_bukutamu;
	}

	public function hapus()
	{
		$cek = $this->session->userdata('logged_in');
		if(!empty($cek)){			
			$id = $this->input->post('id');
			$this->app_model->manualQuery("DELETE FROM tagihan WHERE id='$id'");
			echo "Data Sukese dihapus";
		}else{
			header('location:'.base_url());
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/login.php */