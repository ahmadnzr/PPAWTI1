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
                <h3 class="panel-title"><i class="fa fa-book"></i> Tambah Data Buku</h3>
              </div>
              <div class="panel-body">
                <form action="<?php echo site_url('Perpustakaan/simpanData') ?>" method = "post">
                    <div class = "form-group">
                        <label>Kode Buku</label>
                        <input type="text" name="kode_buku" class="form-control" size="10">
                    </div>
                    <div class = "form-group">
                        <label>Judul Buku</label>
                        <input type="text" name="judul" class="form-control">
                    </div>
                    <div class = "form-group">
                        <label>Pengarang Buku</label>
                        <input type="text" name="pengarang" class="form-control">
                    </div>
                    <div class = "form-group">
                        <label>Penerbit Buku</label>
                        <input type="text" name="penerbit" class="form-control">
                    </div>
                    <div class = "form-group">
                        <label>Tahun Terbit</label>
                        <input type="text" name="tahun_terbit" class="form-control">
                    </div>
                    <div class = "form-group">
                        <label>Kategori Buku</label>
                        <select name="id_kategori" class="form-control">
                            <?php foreach ($tb_kategori as $kategori): ?>
                                <option value="<?php echo $kategori->id ?>"><?php echo $kategori->nama ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <input type="submit" class="btn btn-success" value="Simpan">
                </form>
              </div>
            </div>
        </div>
    </div>
</div>
	<?php $this->load->view("_isi/footer.php"); ?>
	<?php  $this->load->view("_isi/js.php");?>
</body>
</html>
