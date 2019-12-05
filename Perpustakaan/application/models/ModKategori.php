<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class ModKategori extends CI_Model {
		public function getAll()
		{
			return $this->db->get('tb_kategori')->result();
		}
	}
 ?>
