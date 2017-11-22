<?php $this->load->view('front/header'); ?>

<!-- Page heading -->
  <div class="page-heading blightblue">
    <div class="container">
      <div class="row">
        <div class="span12">        
          <h2 class="pull-left"><i class="icon-user title-icon"></i> About Us</h2>
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
                        <div class="entry">
                          <h2>Tentang Kami</h2>
                          <p><i>Stories of Optimistic - Sanguine - Positive to be Greater Indonesia.</i></p>
                          <p>Greatnesia, berawal dari keprihatinan kami terhadap berita yang beredar dimedia online dan media sosial, dimana setiap harinya selalu saja diisi dengan berita seputar kejahatan, keprihatinan, kejelekan, politik dan berita jelek lainnya. Sangat jarang sekali, kalaupun ada porsinya hampir dibawah 10% yang menyajikan ataupun menyebarkan berita positif. Untuk itulah kami bermaksud untuk membuat greatnesia.com ini sebagai wadah dan penyeimbang berita dan informasi positif di Indonesia khususnya dan didunia pada umumnya. Semoga dengan adanya wadah ini, dapat menjadi pembangkit semangat dan pemicu motivasi bagi yang membacanya.</p>                          
                          <div class="clearfix"></div>
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
          <!-- User icon -->
          <span class="twitter-icon text-center"><i class="icon-comment"></i></span>
          <p><em>"<?php echo $quote->isi; ?>"</em><br/><strong><?php echo $quote->penulis; ?></strong></p>        
      </div>
    </div>
  </div>
</div>

<?php $this->load->view('front/footer'); ?>