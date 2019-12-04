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
                <h3 class="panel-title"><i class="fa fa-book"></i> Pengembalian Buku</h3>
              </div>
              <div class="panel-body">

              </div>
            </div>
        </div>
    </div>
</div>
	<?php $this->load->view("_isi/footer.php"); ?>
	<?php  $this->load->view("_isi/js.php");?>
</body>
</html>
