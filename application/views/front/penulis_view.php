<?php $this->load->view('front/header'); ?>

<!-- Page heading -->  
  <div class="page-heading blightblue">
    <div class="container">
      <div class="row">
        <div class="span12">
          <h2 class="pull-left"><i class="icon-user title-icon"></i> Profil Penulis</h2>
          <div class="pull-right heading-meta">Pesona Indonesia<span class="lightblue"> Zamrud Khatulistiwa</span></div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page heading ends -->

  <!-- Content starts -->
  <div class="content">
    <div class="container">

      <div class="blog">
         <div class="row">
            <div class="span12">               
               <!-- Blog Posts -->
               <div class="row">
                  <div class="span8">

                    <div class="well">
                      <?php 
                        if($penulis->website == '') $web = 'http://www.greatnesia.com'; else $web = $penulis->website;
                        if($penulis->facebook == '') $fb = 'https://www.facebook.com/Greatnesia'; else $fb = 'https://www.facebook.com/'.$penulis->facebook;
                        if($penulis->twitter == '') $tw = 'https://twitter.com/greatnesia'; else $tw = 'https://twitter.com/'.$penulis->twitter;
                      ?>
                      <div class="pull-left2">
                      <?php if($penulis->avatar != ''): ?>
                        <img src="<?php echo base_url('uploads/avatar/'.$penulis->avatar); ?>" alt="<?php echo $penulis->nama; ?>" />
                      <?php else: ?>
                        <img src="<?php echo base_url('uploads/avatar/default.png'); ?>" alt="<?php echo $penulis->nama; ?>" />
                      <?php endif; ?>
                      </div>
                      <h4><strong><?php echo $penulis->nama; ?></strong></h4>
                      <p><?php echo $penulis->biodata; ?></p>
                      <div class="social">
                      <a href="<?php echo $fb; ?>" class="bblue" target="_blank"><i class="icon-facebook"></i></a>                      
                      <a href="<?php echo $tw; ?>" class="blightblue"><i class="icon-twitter"></i></a>
                      <a href="<?php echo $web; ?>" class="borange"><i class="icon-globe"></i></a>
                      </div>
                    </div>

                    <h4>Tulisan dari <?php echo $penulis->nama; ?>:</h4><hr/>
                     <div class="posts">                                             
                        <?php if($artikel->num_rows() > 0) : ?>
                        <?php foreach($artikel->result() as $ar) : ?>
                        <div class="entry">
                           <h2><a href="<?php echo site_url('artikel/baca/'.$ar->artikel_id.'/'.$ar->url); ?>"><?php echo $ar->judul; ?></a></h2>
                           
                           <!-- Meta details -->
                           <div class="meta">
                              <i class="icon-calendar"></i><?php echo date('d M Y',strtotime($ar->tgl_dibuat)); ?><i class="icon-user"></i> <?php echo $ar->creator; ?> <i class="icon-folder-open"></i> <a href="<?php echo site_url('home/kategori/'.$ar->kategori_id.'/'.url_title($ar->nama,'-',TRUE)); ?>"><?php echo $ar->nama; ?></a>
                           </div>
                           
                           <?php if($ar->image != '') : ?>
                           <!-- Thumbnail -->
                           <div class="bthumb2">
                              <img src="<?php echo base_url('uploads/crop/'.$ar->image); ?>" alt="<?php echo $ar->judul; ?>" />
                           </div>
                           <?php endif; ?>
                           
                           <?php echo word_limiter($ar->isi,120); ?>
                           <br/><a href="<?php echo site_url('artikel/baca/'.$ar->artikel_id.'/'.$ar->url); ?>" class="btn btn-info">Baca Lebih Lanjut...</a>
                           <div class="clearfix"></div>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>                        
                        
                        <!-- Pagination -->
                        <?php echo $this->pagination->create_links(); ?>
                        
                        <div class="clearfix"></div>
                        
                     </div>
                  </div>                        
                  
<?php $this->load->view('front/sidebar'); ?>

               </div>
            </div>
         </div>
      </div>
    </div>
  </div>
  <!-- Content ends -->

<!-- Footer -->
<div class="foot blightblue">
  <div class="container">
    <div class="row">
      <div class="span12">    
          <span class="twitter-icon text-center"><i class="icon-comment"></i></span>
          <p><em>"<?php echo $quote->isi; ?>"</em><br/><strong><?php echo $quote->penulis; ?></strong></p>        
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('front/footer'); ?>