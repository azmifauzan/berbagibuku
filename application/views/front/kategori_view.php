<?php $this->load->view('front/header'); ?>

<!-- Page heading -->
  <!-- Give background color class on below line (bred, bgreen, borange, bviolet, blightblue, bblue) -->
  <div class="page-heading blightblue">
    <div class="container">
      <div class="row">
        <div class="span12">
        <?php
          switch ($kat->kategori_id) {
            case 1:
              $ic = "icon-comments";
              break;
            case 2:
              $ic = "icon-leaf";
              break;
            case 3:
              $ic = "icon-heart";
              break;            
          }
        ?>
          <h2 class="pull-left"><i class="<?php echo $ic; ?> title-icon"></i> <?php echo $kat->nama; ?></h2>
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
                     <div class="posts">                     
                        <!-- Each posts should be enclosed inside "entry" class" -->
                        <!-- Post one -->
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

<!-- Below area is for Testimonial -->
<div class="foot blightblue">
  <div class="container">
    <div class="row">
      <div class="span12">          
          <!-- User icon -->
          <span class="twitter-icon text-center"><i class="icon-comment"></i></span>
          <p><em>"<?php echo $quote->isi; ?>"</em><br/><strong><?php echo $quote->penulis; ?></strong></p>        
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('front/footer'); ?>