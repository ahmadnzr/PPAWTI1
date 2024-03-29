<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perpustakaan extends Ci_Controller{

	public function __construct(){
		parent:: __construct();
		$this->load->model("admin");
		$this->load->model("ModBuku");
		$this->load->model("ModPeminjaman");
	}
	public function index(){
		if ($this->admin->logged_id()) {
			$this->load->view("ruang.php");
			// code...
		}else {
			// code...
			redirect('login');
		}
	}
	public function logout()
	{
			$this->session->sess_destroy();
			redirect('login');
	}
//peminjaman
	public function Peminjaman(){
		if ($this->admin->logged_id()) {
			$data["tb_peminjaman"] = $this->ModPeminjaman->getTable();
			$this->load->view('menu/peminjaman.php',$data);
		}else {
			// code...
			redirect('login');
		}
		}
		public function tambahDataPeminjaman(){
			if ($this->admin->logged_id()) {
				$this->load->model('ModBuku');
				$data['tb_buku'] = $this->ModBuku->getAll();
				$this->load->view('actions/tambah-pinjam',$data);
			}else {
				// code...
				redirect('login');
			}

		}
//pengembalian
	public function Pengembalian(){
		if ($this->admin->logged_id()) {
			//$data["tb_buku"] = $this->ModBuku->getTable();
			$this->load->view('menu/pengembalian.php');
		}else {
			// code...
			redirect('login');
		}

		}
	public function user(){
		if ($this->admin->logged_id()) {
			//$data["tb_buku"] = $this->ModBuku->getTable();
			$this->load->view('menu/user.php');
		}else {
			// code...
			redirect('login');
		}
				}
//Buku
	public function dataBuku(){
		if ($this->admin->logged_id()) {
			$data["tb_buku"] = $this->ModBuku->getTable();
			$this->load->view('menu/buku.php',$data);
		}else {
			// code...
			redirect('login');
		}

	}
	public function tambahData(){
		if ($this->admin->logged_id()) {
			$this->load->model('ModKategori');
			$data['tb_kategori'] = $this->ModKategori->getAll();
			$this->load->view('actions/tambah-buku', $data);
		}else {
			// code...
			redirect('login');
		}

	}
	public function simpanData(){
		$this->load->model('ModBuku');
		$kode = $this->input->post('kode_buku');
		$judul = $this->input->post('judul');
		$pengarang = $this->input->post('pengarang');
		$penerbit = $this->input->post('penerbit');
		$tahun_terbit = $this->input->post('tahun_terbit');
		$id_kategori = $this->input->post('id_kategori');

		$data = [
			'kode_buku' => $kode,
			'judul' => $judul,
			'pengarang' => $pengarang,
			'penerbit' => $penerbit,
			'tahun_terbit' => $tahun_terbit,
			'id_kategori' => $id_kategori
		];

		$simpan = $this->ModBuku->insert($data);
		if ($simpan) {
			$this->session->set_flashdata('msg_success', 'Data sudah tersimpan');
			# code...
		}else{
			$this->session->set_flashdata('msg_error','Data gagal disimpan');
		}
		redirect('Perpustakaan');
	}
	public function edit($id){
		$this->load->model('ModKategori');
		$this->load->model('ModBuku');

		$data['tb_kategori'] = $this->ModKategori->getAll();
		$data['tb_buku'] = $this->ModBuku->get($id);

		$this->load->view('actions/update-buku',$data);
	}
	public function update(){
		$this->load->model('ModBuku');
		$id = $this->input->post('id');
		$kode = $this->input->post('kode_buku');
		$judul = $this->input->post('judul');
		$pengarang = $this->input->post('pengarang');
		$penerbit = $this->input->post('penerbit');
		$tahun_terbit = $this->input->post('tahun_terbit');
		$id_kategori = $this->input->post('id_kategori');

		$data = [
			'kode_buku' => $kode,
			'judul' => $judul,
			'pengarang' => $pengarang,
			'penerbit' => $penerbit,
			'tahun_terbit' => $tahun_terbit,
			'id_kategori' => $id_kategori
		];
	$save = $this->ModBuku->update($data,$id);
	if($save) {
            $this->session->set_flashdata('msg_success', 'Data telah diubah!');
        } else {
            $this->session->set_flashdata('msg_error', 'Data gagal disimpan, silakan isi ulang!');
        }
        redirect('Perpustakaan');
	}
	public function delete($id){
        $this->load->model('ModBuku');

        $delete = $this->ModBuku->delete($id);

        if ($delete) {
            $this->session->set_flashdata('msg_success', 'Data yang anda pilih telah terhapus');
        } else {
            $this->session->set_flashdata('msg_error', 'Tidak bisa hapus pesan');
        }
        redirect('Perpustakaan');
		}
}
 ?>
