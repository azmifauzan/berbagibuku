<?php $this->load->view('front/header'); ?>

<!-- Page heading -->
  <!-- Give background color class on below line (bred, bgreen, borange, bviolet, blightblue, bblue) -->
  <div class="page-heading blightblue">
    <div class="container">
      <div class="row">
        <div class="span12">        
          <h2 class="pull-left"><i class="icon-question-sign title-icon"></i> FAQ</h2>
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
                          <h2>Pertanyaan yang sering ditanyakan</h2>
                          <!-- FAQ -->
                          <div class="accordion" id="accordion2">

                            <div class="accordion-group">
                              <div class="accordion-heading blightblue">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                   <!-- Title with experience details. -->
                                  <h3>Apa itu Greatnesia ?</h3>
                                </a>
                              </div>
                              <div id="collapseOne" class="accordion-body collapse in">
                                <div class="accordion-inner">
                                  <p>Berawal dari keprihatinan kami terhadap berita yang beredar dimedia online dan media sosial, dimana setiap harinya selalu saja diisi dengan berita seputar kejahatan, keprihatinan, kejelekan, politik dan berita jelek lainnya. Sangat jarang sekali, kalaupun ada porsinya hampir dibawah 10% yang menyajikan ataupun menyebarkan berita positif. Untuk itulah kami bermaksud untuk membuat greatnesia.com ini sebagai wadah dan penyeimbang berita dan informasi positif di Indonesia khususnya dan didunia pada umumnya. Semoga dengan adanya wadah ini, dapat menjadi pembangkit semangat dan pemicu motivasi bagi yang membacanya.</p>
                                </div>
                              </div>
                            </div>

                            <div class="accordion-group">
                              <div class="accordion-heading blightblue">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                                  <h3>Saya tertarik untuk berkontribusi di Greatnesia.</h3>
                                </a>
                              </div>
                              <div id="collapseTwo" class="accordion-body collapse">
                                <div class="accordion-inner">                                 
                                  <p>Siapa saja, termasuk Anda dapat dengan mudah berkontribusi berita dan informasi positif di Greatnesia.com. Cara cukup mudah: cukup dengan mendaftar sebagai kontributor <a href="<?php echo site_url('daftar'); ?>">dihalaman berikut ini</a>, setelah itu Anda langsung dapat mulai untuk berkontribusi dan menjadi bagian di Greatnesia.com.</p>
                                </div>
                              </div>
                            </div>

                            <div class="accordion-group">
                              <div class="accordion-heading blightblue">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                                  <h3>Apa itu Poin Greatnesia ?</h3>
                                </a>
                              </div>
                              <div id="collapseThree" class="accordion-body collapse">
                                <div class="accordion-inner">                                 
                                  <p>Setiap tulisan atau informasi positif yang dikirimkan oleh kontributor dan telah disetujui oleh moderator kami, maka sebagai bentuk terima kasih, greatnesia akan memberikan poin untuk setiap tulisan atau informasi positif tersebut. Poin yang telah dikumpulkan nantinya dapat ditukarkan dengan beragam hadiah yang dapat diakses melalui halaman khusus kontributor. Untuk saat ini, poin yang berlaku di Greatnesia.com adalah sebagai berikut :</p>
                                  <p><strong>1 poin </strong>: Untuk setiap tulisan yang disetujui oleh moderator dalam bentuk berita atau informasi yang disadur dari sumber lain (buku, website, koran, dsb).</p>
                                  <p><strong>10 poin </strong>: Untuk Untuk setiap tulisan yang disetujui oleh moderator dalam bentuk berita atau informasi yang merupakan hasil pemikiran kontributor sendiri dan belum pernah dipublikasikan dimedia apapun.</p>
                                </div>
                              </div>
                            </div>

                          </div>                           
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