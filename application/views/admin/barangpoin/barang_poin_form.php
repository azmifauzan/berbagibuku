<?php $this->load->view('admin/header'); ?> 
            
<div class="span9">
    
    <h1 class="page-title">
        <i class="icon-time"></i>
        Poin
    </h1>

</div> <!-- /span9 -->

<div class="row">                   
    <div class="span9">
        <div class="widget">
            <div class="widget-header">
                <i class="icon-folder-open"></i>
                <h3>Tambah Barang Poin</h3>
            </div> <!-- /widget-header -->

            <div class="widget-content">

            <form action="<?php echo $action; ?>" method="post">
        	    <div class="form-group">
                    <label for="varchar">Barang <?php echo form_error('barang') ?></label>
                    <input type="text" class="form-control" name="barang" id="barang" placeholder="Barang" value="<?php echo $barang; ?>" />
                </div>
        	    <div class="form-group">
                    <label for="deskripsi">Deskripsi <?php echo form_error('deskripsi') ?></label>
                    <textarea class="form-control" rows="5" cols="50" name="deskripsi" id="deskripsi" placeholder="Deskripsi"><?php echo $deskripsi; ?></textarea>
                </div>
        	    <div class="form-group">
                    <label for="int">Poin <?php echo form_error('poin') ?></label>
                    <input type="text" class="form-control" name="poin" id="poin" placeholder="Poin" value="<?php echo $poin; ?>" />
                </div>
        	    <div class="form-group">
                    <label for="int">Stock <?php echo form_error('stock') ?></label>
                    <input type="text" class="form-control" name="stock" id="stock" placeholder="Stock" value="<?php echo $stock; ?>" />
                </div>
        	    <input type="hidden" name="tid" value="<?php echo $tid; ?>" /> 
        	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        	    <a href="<?php echo site_url('barangpoin') ?>" class="btn btn-default">Cancel</a>
        	</form>

            </div>
        </div>
    </div>
</div>

<?php $this->load->view('admin/footer'); ?>