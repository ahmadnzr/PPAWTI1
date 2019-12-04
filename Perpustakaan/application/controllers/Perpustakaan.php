<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perpustakaan extends Ci_Controller{

	public function __construct(){
		parent:: __construct();
		$this->load->model("ModBuku");
	}
	public function index(){
		$data["tb_buku"] = $this->ModBuku->getTable();
		$this->load->view("ruang.php", $data);
	}
	public function Peminjaman(){
			//$data["tb_buku"] = $this->ModBuku->getTable();
			$this->load->view('menu/peminjaman.php');
		}
	public function Pengembalian(){
				//$data["tb_buku"] = $this->ModBuku->getTable();
				$this->load->view('menu/pengembalian.php');
		}
	public function user(){
			//$data["tb_buku"] = $this->ModBuku->getTable();
					$this->load->view('menu/user.php');
				}
	public function Logout(){

		$this->load-view('actions/logout.php');
	}
	public function dataBuku(){
		$data["tb_buku"] = $this->ModBuku->getTable();
		$this->load->view('menu/buku.php',$data);
	}
	public function tambahData(){
		$this->load->model('ModKategori');
		$data['tb_kategori'] = $this->ModKategori->getAll();
		$this->load->view('actions/tambah-buku', $data);
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
