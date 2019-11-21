<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="author" content="Nasution">
	<?php $this->load->view("_isi/head.php"); ?>
</head>

<body>
	<?php $this->load->view("_isi/navbar.php"); ?>
	<div class="container">
		<table class="table">
			<legend class="text-center">Table Data Buku</legend>
			<div>
				<a href="<?php echo site_url('Perpustakaan/tambahData')?>" class="btn btn-success" >Tambah</a>
			</div>
			<?php if($this->session->flashdata('msg_success')): ?>
				<div class="alert alert-success"><?php echo $this->session->flashdata('msg_success') ?>
				</div>
			<?php endif ?>
			<?php if ($this->session->flashdata('msg_error')): ?>
				<div class="alert alert-danger"><?php echo $this->session->flashdata('msg_error'); ?>
				</div>
			<?php endif ?>

			<thead class="thead_dark">
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Kode</th>
					<th scope="col">Judul</th>
					<th scope="col">Pengarang</th>
					<th scope="col">Penerbit</th>
					<th scope="col">Tahun Terbit</th>
					<th scope="col">Kategori</th>
					<th scope="col">Aksi</th>	
				</tr>
			</thead>
			<tbody>
				<?php 
					$no = 1;
					foreach ($tb_buku as $buku):	
				?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $buku->kode_buku ?></td>
							<td><?php echo $buku->judul ?></td>
							<td><?php echo $buku->pengarang ?></td>
							<td><?php echo $buku->penerbit ?></td>
							<td><?php echo $buku->tahun_terbit ?></td>
							<td><?php echo $buku->nama ?></td>
							<td>
								 <a href="<?php echo site_url('Perpustakaan/edit/'.$buku->id)?>" class="btn btn-primary">Edit</a>

								<a href="<?php echo site_url('Perpustakaan/delete/'.$buku->id)?>" class="btn btn-danger" onclick="return confirm('Apakah kamu yakin?')">Hapus</a>
							</td> 
						</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<?php $this->load->view("_isi/footer.php"); ?>
	<?php  $this->load->view("_isi/js.php");?>
</body>
</html>