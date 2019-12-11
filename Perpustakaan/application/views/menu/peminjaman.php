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
                <h3 class="panel-title"><i class="fa fa-dashboard"></i> Peminjaman Buku</h3>
              </div>
              <div class="panel-body">
								<table class="table">
									<div>
										<a href="<?php echo site_url('Perpustakaan/tambahDataPeminjaman'); ?>" class="fa fa-plus-circle">Tambah Data Peminjaman</a>
									</div>
									<?php if ($this->session->flashdata('msg_success')):?>
										<div class="alert alert-success"><<?php echo $this->session->flashdata('msg_success'); ?>
										</div>
									<?php endif ?>
									<?php if ($this->session->flashdata('msg_error')):?>
										<div class="alert alert-success"><<?php echo $this->session->flashdata('msg_error'); ?>
										</div>
									<?php endif ?>
									<thead class="thead_dark">
										<tr>
											<th scope="col">Id</th>
											<th scope="col">Tanggal Peminjaman</th>
											<th scope="col">Kode Buku</th>
											<th scope="col">Buku</th>
											<th scope="col">Mahasiswa</th>
											<th scope="col">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$no = 1;
											foreach ($tb_peminjaman as $peminjaman):
										?>
										<tr>
											<td><?php echo $no++ ?></td>
											<td><?php echo $peminjaman->tgl ?></td>
											<td><?php echo $peminjaman->kode_buku; ?></td>
											<td><?php echo $peminjaman->judul ?></td>
											<td><?php echo $peminjaman->nama ?></td>
											<td>
												<a href="#" class="fa fa-pencil-square-o"> Edit </a>&nbsp;&nbsp;&nbsp;
									 			<a href="#" class="fa fa-trash-o" onclick="return confirm('Apakah kamu yakin?')"> Hapus</a>
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
