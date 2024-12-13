<?php
  include("admin/Class/function.php");

  $obj = new adminBlog();
  $cat_name = $obj->display_category();
?>
<header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html"><h2>Stand Blog<em>.</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <?php while($catagory = mysqli_fetch_assoc($cat_name)){ ?>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <?php echo $catagory['cat_name']; ?>
                </a>
              </li>
              <?php } ?>              
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact Us</a>
              </li>              
            </ul>
          </div>
        </div>
      </nav>
    </header>