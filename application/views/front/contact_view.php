<?php $this->load->view('front/header'); ?>

<!-- Page heading -->
  <!-- Give background color class on below line (bred, bgreen, borange, bviolet, blightblue, bblue) -->
  <div class="page-heading blightblue">
    <div class="container">
      <div class="row">
        <div class="span12">        
          <h2 class="pull-left"><i class="icon-globe title-icon"></i> Contact Us</h2>
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
                          <h2>Hubungi Kami</h2>
                          <p>Saran, kritik, pertanyaan dan lain sebagainya dapat disampaikan kepada kami melalui email : greatnesia (at) gmail (dot) com. <br/>Atau dapat juga disampaikan melalui facebook page dan twitter kami.</p>                          
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