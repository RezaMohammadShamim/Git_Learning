<?php include_once("includes/head.php"); ?>

  <body>

    <!-- ***** Preloader Start ***** -->
    <?php include_once("includes/preloader.php"); ?>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <?php include_once("includes/header.php"); ?>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <?php include_once("includes/banner.php"); ?>
    <!-- Banner Ends Here -->

    <?php include_once("includes/cta.php"); ?>


    <section class="blog-posts">
      <div class="container">
        <div class="row">
        <?php include_once("includes/blogpost.php"); ?>
          <div class="col-lg-4">
            <div class="sidebar">
              <div class="row">
                <?php include_once("includes/search.php"); ?>
                <?php include_once("includes/recentpost.php"); ?>
                <?php include_once("includes/catagories.php"); ?>
                <?php include_once("includes/sidetag.php"); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    
    <?php include_once("includes/footer.php"); ?>

    <!-- Bootstrap core JavaScript -->
    <?php include_once("includes/script.php"); ?>