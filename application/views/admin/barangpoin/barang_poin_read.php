<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Barang_poin Read</h2>
        <table class="table">
	    <tr><td>Barang</td><td><?php echo $barang; ?></td></tr>
	    <tr><td>Deskripsi</td><td><?php echo $deskripsi; ?></td></tr>
	    <tr><td>Poin</td><td><?php echo $poin; ?></td></tr>
	    <tr><td>Stock</td><td><?php echo $stock; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('barangpoin') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>