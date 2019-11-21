<!DOCTYPE html>
<html>
    <head>
        <?php $this->load->view("_isi/head.php"); ?>
    </head>
    <body>
        <?php $this->load->view("_isi/navbar.php"); ?>
        <div class="container">
            <div class="col-md-9">
                <h3>Update data Buku</h3>
                <hr>
                <form action="<?php echo site_url('Perpustakaan/update') ?>" method = "post">
                    <input type="hidden" name="id" value=" <?php echo $tb_buku->id ?> ">
                    <div class = "form-group">
                        <label>Kode Buku</label>
                        <input type="text" name="kode_buku" class="form-control" value="<?php echo $tb_buku->kode_buku ?> ">
                    </div>
                    <div class = "form-group">
                        <label>Judul Buku</label>
                        <input type="text" name="judul" class="form-control" value="<?php echo $tb_buku->judul ?> ">
                    </div>
                    <div class = "form-group">
                        <label>Pengarang Buku</label>
                        <input type="text" name="pengarang" class="form-control" value="<?php echo $tb_buku->pengarang ?> ">
                    </div>
                    <div class = "form-group">
                        <label>Penerbit Buku</label>
                        <input type="text" name="penerbit" class="form-control" value="<?php echo $tb_buku->penerbit ?> ">
                    </div>
                    <div class = "form-group">
                        <label>Tahun Terbit</label>
                        <input type="text" name="tahun_terbit" class="form-control" value="<?php echo $tb_buku->tahun_terbit ?> ">
                    </div>
                    <div class = "form-group">
                        <label>Kategori</label>
                        <select name="id_kategori" class="form-control">
                            <?php foreach ($tb_kategori as $kategori):?>
                            <option value="<?php echo $kategori->id ?>" <?php if($kategori->id == $tb_buku->id) echo 'selected'; ?>><?php echo $kategori->nama ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>


                   
                    <input type="submit" class="btn btn-success" value="Simpan">
                </form>
            </div>
        </div>
        <?php $this->load->view("_isi/footer.php"); ?>
        <!--javascript-->
        <?php $this->load->view("_isi/js.php"); ?>
    </body>
</html>