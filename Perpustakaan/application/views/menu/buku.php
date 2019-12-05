<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="author" content="Nasution">
	<?php $this->load->view("_isi/head.php"); ?>
</head>

<body>
	<?php $this->load->view("_isi/navbar.php"); ?>
	<div class="container" style="margin-top: 80px">
    <div class="row">
        <?php $this->load->view("_isi/menu.php"); ?>
        <div class="col-md-9">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-book"></i> Data Buku</h3>
              </div>
              <div class="panel-body">
                <table class="table">
			<div>
				<a href="<?php echo site_url('Perpustakaan/tambahData')?>" class="fa fa-plus-circle" > Tambah</a>
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
								 <a href="<?php echo site_url('Perpustakaan/edit/'.$buku->id)?>" class="fa fa-pencil-square-o"> Edit </a>&nbsp;&nbsp;&nbsp;
								<a href="<?php echo site_url('Perpustakaan/delete/'.$buku->id)?>" class="fa fa-trash-o" onclick="return confirm('Apakah kamu yakin?')"> Hapus</a>
							</td>
						</tr>
					<?php endforeach ?>
			</tbody>
		</table>
              </div>
            </div>
        </div>
    </div>
</div>
	<?php $this->load->view("_isi/footer.php"); ?>
	<?php  $this->load->view("_isi/js.php");?>
</body>
</html>
