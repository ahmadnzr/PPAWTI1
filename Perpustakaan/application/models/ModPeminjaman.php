<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 */
class ModPeminjaman extends CI_Model
{

	public function getTable(){
		$this->db->select('tb_buku.*, tb_kategori.nama');
		$this->db->from('tb_buku');
		$this->db->join('tb_kategori', 'tb_kategori.id = tb_buku.id_kategori');
		$query = $this->db->get();
		return $query->result();
	}
	public function insert($data){
		return $this->db->insert('tb_buku', $data);
	}
	public function get($id){
		return $this->db->where('id', $id)->get('tb_buku')->row();
	}
	public function update($data, $id){
		return $this->db->where('id',$id)->update('tb_buku',$data);
	}
	public function delete($id){
		return $this->db->where('id',$id)->delete('tb_buku');
	}
}
 ?>
