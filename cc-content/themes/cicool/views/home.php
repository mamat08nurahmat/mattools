<?= get_header(); ?>
<body id="page-top">
   <?= get_navigation(); ?>

     <header>
      <div class="header-content" >
         <div class="header-content-inner">
            <h1 id="homeHeading">Welcome</h1>
            <hr>
            <!-- <p> you can customize this page by editing this on location <br><code><?=  './cc-content/themes/cicool/view/home.php' ?> </code></p> -->
            <a href="<?=site_url('administrator/login')?>" class="btn btn-primary btn-xl page-scroll" target="blank"><i class="fa fa-login"></i> LOGIN</a>
         </div>
      </div>
   </header>
   <?= get_footer(); ?>


