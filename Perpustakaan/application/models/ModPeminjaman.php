<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class ModPeminjaman extends CI_Model
{

	public function getTable(){
		$this->db->select('tb_peminjaman.*, tb_mahasiswa.nama, tb_buku.id,tb_buku.judul');
		$this->db->from('tb_peminjaman');
		$this->db->join('tb_buku', 'tb_buku.id = tb_peminjaman.buku_id');
		$this->db->join('tb_mahasiswa', 'tb_mahasiswa.id = tb_peminjaman.mahasiswa_id');
		$query = $this->db->get();
		return $query->result();
	}
	public function insert($data){
		return $this->db->insert('tb_peminjaman', $data);
	}
	public function get($id){
		return $this->db->where('id', $id)->get('tb_peminjaman')->row();
	}
	public function update($data, $id){
		return $this->db->where('id',$id)->update('tb_peminjaman',$data);
	}
	public function delete($id){
		return $this->db->where('id',$id)->delete('tb_peminjaman');
	}
}
 ?>
