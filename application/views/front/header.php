<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <!-- Title and other stuffs -->
  <title><?php if(isset($title)) echo $title.' | '; ?>Greatnesia.com - Indonesia Zamrud Khatulistiwa!</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Greatnesia, Informasi positif dari masyarakat untuk Indonesia Hebat!">
  <meta name="keywords" content="indonesia, hebat, informasi, positif, masyarakat, cerita, alam, budaya, bangga">
  <meta name="author" content="Fauzan Azmi">

  <!-- Stylesheets -->
  <!-- Bootstrap -->
  <link href="<?php echo base_url(); ?>front/style/bootstrap.css" rel="stylesheet">
  <!-- Font awesome icon -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>front/style/font-awesome.css">
  <!-- Navigation menu -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>front/style/ddlevelsmenu-base.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>front/style/ddlevelsmenu-topbar.css">
  <!-- cSlider -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>front/style/slider.css">
  <!-- PrettyPhoto -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>front/style/prettyPhoto.css">
  <!-- Custom style -->
  <link href="<?php echo base_url(); ?>front/style/style3.css" rel="stylesheet">
  <!-- Responsive Bootstrap -->
  <link href="<?php echo base_url(); ?>front/style/bootstrap-responsive.css" rel="stylesheet">
  
  <!-- HTML5 Support for IE -->
  <!--[if lt IE 9]>
  <script src="js/html5shim.js"></script>
  <![endif]-->

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>icon.png">
</head>
<body>
  <!-- Sliding panel starts-->
  <div class="slidepanel">
    <div class="container">
      <div class="row">
        <div class="span8">
          <div class="spara"> 
            <!-- Contact details -->
            <p><a href="<?php echo site_url('home/kategori/1/great-story'); ?>">Great Story</a> | <a href="<?php echo site_url('home/kategori/2/great-nature'); ?>">Great Nature</a> | <a href="<?php echo site_url('home/kategori/3/great-culture'); ?>">Great Culture</a>
            </p>
          </div>
        </div>
        <div class="span4">
          <div class="social">
            <!-- Social media icons. Repalce # with your profile links -->
            <a href="https://www.facebook.com/Greatnesia" class="bblue" target="_blank"><i class="icon-facebook"></i></a>
            <a href="https://plus.google.com/117669026965744505091" class="borange"><i class="icon-google-plus"></i></a> 
            <a href="https://twitter.com/greatnesia" class="blightblue"><i class="icon-twitter"></i></a>
            <a href="<?php echo site_url('rss'); ?>" class="borange"><i class="icon-rss"></i></a>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>

  <!-- Sliding panel ends-->
  <!-- Header starts -->
  <header>
    <div class="container">
      <div class="row">
        <div class="span3">
          <!-- Logo starts -->
          <div class="logo">
            <div class="logo-image">
              <!-- Image link -->
              <a href="<?php echo base_url(); ?>"><img style="margin-top:25px;" src="<?php echo site_url('icon.png'); ?>" /></a>
            </div>
            <div class="logo-text">
              <h1><a href="<?php echo site_url('home'); ?>">Great<span class="lightblue">Nesia</span></a></h1>
              <div class="logo-meta">Wonderful Indonesia!</div>
            </div>

            <div class="clearfix"></div>
          </div>

          <!-- Logo ends -->

        </div>

        <div class="span9">

          <!-- Navbar starts -->

          <div class="navi pull-right">
            <div id="ddtopmenubar" class="mattblackmenu">
              <!-- Main navigation -->
              <ul>
                <li><a href="<?php echo site_url('home'); ?>" class="bblue"> <i class="icon-home"></i> Home</a></li>
                <li><a href="<?php echo site_url('home/kategori/1/great-story'); ?>" class="bviolet"> <i class="icon-comments"></i> Great Story</a></li>
                <li><a href="<?php echo site_url('home/kategori/2/great-nature'); ?>" class="bgreen"> <i class="icon-leaf"></i> Great Nature</a></li>
                <li><a href="<?php echo site_url('home/kategori/3/great-culture'); ?>" class="bred"> <i class="icon-heart"></i> Great Culture</a></li>
              </ul>
            </div>
          </div>

          <div class="navis"></div>

          <!-- Navbar ends -->

          <div class="clearfix"></div>

        </div>

      </div>
    </div>
  </header>

  <div class="clearfix"></div>

  <!-- Header ends -->