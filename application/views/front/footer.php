<br/>
<footer>
  <div class="container">
    <div class="row">

      <div class="span12">
          <div class="copy">
                <p>Copyright &copy; <a href="<?php echo base_url(); ?>">Greatnesia</a> - <a href="<?php echo base_url(); ?>">Home</a> | <a href="<?php echo site_url('home/about'); ?>">About Us</a> | <a href="<?php echo site_url('home/faq'); ?>">FAQ</a> | <a href="<?php echo site_url('home/contact'); ?>">Contact Us</a></p>
          </div>
      </div>

    </div>
  <div class="clearfix"></div>
  </div>
</footer> 

<!-- JS -->
<script src="<?php echo base_url(); ?>front/js/jquery.js"></script> <!-- jQuery -->
<script src="<?php echo base_url(); ?>front/js/bootstrap.js"></script> <!-- Bootstrap -->
<script src="<?php echo base_url(); ?>front/js/jquery.prettyPhoto.js"></script> <!-- prettyPhoto -->
<script src="<?php echo base_url(); ?>front/js/jquery.isotope.js"></script> <!-- isotope -->
<script src="<?php echo base_url(); ?>front/js/ddlevelsmenu.js"></script> <!-- Navigation menu -->
<script src="<?php echo base_url(); ?>front/js/jquery.cslider.js"></script> <!-- jQuery cSlider -->
<script src="<?php echo base_url(); ?>front/js/modernizr.custom.28468.js"></script> <!-- Extra script for cslider -->

<script src="<?php echo base_url(); ?>front/js/filter.js"></script> <!-- Support -->
<script src="<?php echo base_url(); ?>front/js/custom.js"></script> <!-- Custom JS -->
<?php if(isset($footer)): ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" id="st_insights_js" src="http://w.sharethis.com/button/buttons.js?publisher=8e099eaf-452c-43a6-bb38-26b81b3a4532"></script>
<script type="text/javascript">stLight.options({publisher: "8e099eaf-452c-43a6-bb38-26b81b3a4532", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
<?php endif; ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-23140175-8', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>