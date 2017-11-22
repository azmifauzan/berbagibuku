<?php $this->load->view('admin/header'); ?> 
            
<div class="span9">
    
    <h1 class="page-title">
        <i class="icon-book"></i>
        Kategori
    </h1>
        
        <div class="stat-container">
            
            <div class="span8">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>

            <div class="span6" align="left">
                <form action="<?php echo site_url('adminpanel/kategori/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('adminpanel/kategori'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
            <div class="span2" align="right">
                <?php echo anchor(site_url('adminpanel/kategori/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
        
            <table class="table table-bordered" style="margin-bottom: 10px">
                <tr>
                    <th>No</th>
    		<th>Nama</th>
    		<th>Keterangan</th>
    		<th>Group</th>
    		<th>Action</th>
                </tr><?php
                foreach ($kategori_data as $kategori)
                {
                    ?>
                    <tr>
    			<td width="80px"><?php echo ++$start ?></td>
    			<td><?php echo $kategori->nama ?></td>
    			<td><?php echo $kategori->keterangan ?></td>
    			<td><?php echo $kategori->group ?></td>
    			<td style="text-align:center" width="15%">
    				<?php 
    				echo anchor(site_url('adminpanel/kategori/update/'.$kategori->kategori_id),'Update'); 
    				echo ' | '; 
    				echo anchor(site_url('adminpanel/kategori/delete/'.$kategori->kategori_id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
    				?>
    			</td>
    		</tr>
                    <?php
                }
                ?>
            </table>
            
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
	        </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
            
        </div>
    </div>
<?php $this->load->view('admin/footer'); ?>