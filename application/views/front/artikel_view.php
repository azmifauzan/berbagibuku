<?php $this->load->view('front/header'); ?>

<!-- Page heading -->
  <!-- Give background color class on below line (bred, bgreen, borange, bviolet, blightblue, bblue) -->
  <div class="page-heading blightblue">
    <div class="container">
      <div class="row">
        <div class="span12">
          <h2 class="pull-left"><i class="icon-pencil title-icon"></i> Artikel</h2>
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
                        <div class="entry">
                           <h2><?php echo $artikel->judul; ?></h2>
                           
                           <!-- Meta details -->
                           <div class="meta">
                              <i class="icon-calendar"></i><?php echo date('d M Y',strtotime($artikel->tgl_dibuat)); ?><i class="icon-user"></i> <a href="<?php echo site_url('penulis/profil/'.$artikel->creator); ?>"><?php echo $artikel->creator; ?></a> <i class="icon-folder-open"></i> <a href="<?php echo site_url('home/kategori/'.$artikel->kategori_id.'/'.url_title($artikel->nama,'-',TRUE)); ?>"><?php echo $artikel->nama; ?></a>
                              <span class="pull-right"><span class='st_facebook_hcount' displayText='Facebook'></span><span class='st_twitter_hcount' displayText='Tweet'></span><span class='st__hcount' displayText=''></span></span>
                           </div>
                           
                           <?php if($artikel->image != '') : ?>
                           <!-- Thumbnail -->
                           <!-- <div class="bthumb2"> -->
                           <div class="well tengah">
                              <img src="<?php echo base_url('uploads/crop/'.$artikel->image); ?>" alt="<?php echo $artikel->judul; ?>" />
                           </div>
                           <?php endif; ?>
                           
                           <?php echo $artikel->isi; ?>
                           <div class="clearfix"></div>
                        </div>                        

                        <div class="comments">
                        <ul class="comment-list">
                          <li class="comment">
                          <div class="comment-author">Penulis:</div>
                            <a class="pull-left" href="<?php echo site_url('penulis/profil/'.$penulis->username); ?>">
                              <img class="avatar" src="<?php if($penulis->avatar != '') echo site_url('uploads/avatar/'.$penulis->avatar); else echo site_url('uploads/avatar/default.png'); ?>">
                            </a>
                            <div class="comment-author"><a href="<?php echo site_url('penulis/profil/'.$penulis->username); ?>"><?php echo $penulis->nama; ?></a></div>
                            <p>&nbsp;<?php echo '"'.$penulis->biodata.'"'; ?></p>
                          </li>
                        </ul>
                        </div>

                        <hr/>

                        <div class="post-foot well">
                           <!-- Social media icons -->
                           <div class="social">
                              <h6>Bagikan cerita hebat ini: </h6>
                              <span class='st_facebook_vcount' displayText='Facebook'></span>
                              <span class='st_twitter_vcount' displayText='Tweet'></span>
                              <span class='st_linkedin_vcount' displayText='LinkedIn'></span>
                              <span class='st_email_vcount' displayText='Email'></span>
                              <span class='st_plusone_vcount' displayText='Google +1'></span>
                           </div>
                        </div>
                        
                        <hr/>

                        <div class="comments">
                        <div class="fb-comments" data-href="<?php echo site_url('artikel/baca/'.$artikel->artikel_id.'/'.$artikel->url); ?>" data-numposts="10" data-width="750"></div>
                        </div>

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
          <span class="twitter-icon text-center"><i class="icon-comment"></i></span>
          <p><em>"<?php echo $quote->isi; ?>"</em><br/><strong><?php echo $quote->penulis; ?></strong></p>        
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('front/footer'); ?>