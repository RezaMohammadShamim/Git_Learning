<?php
  $posts = $obj->display_post_public();


?>

<div class="col-lg-8">
            <div class="all-blog-posts">
              <div class="row">
                <?php while($post = mysqli_fetch_assoc($posts)){ ?>
                <div class="col-lg-12">
                  <div class="blog-post">
                    <div class="blog-thumb">
                    <img src="upload/<?php echo $post['post_img']; ?>">
                    </div>
                    <div class="down-content">
                      <span><?php echo $post['post_title'];?></span>
                      <a href="#"><h4><?php echo $post['cat_name'];?></h4></a>
                      <ul class="post-info">
                        <li><a href="#"><?php echo $post['post_author'];?></a></li>
                        <li><a href="#"><?php echo $post['post_date'];?></a></li>
                        <li><a href="#"><?php echo $post['post_comment_count'];?> Comments</a></li>
                      </ul>
                      <p><?php echo $post['post_content'];?></p>
                      <div class="post-options">
                        <div class="row">
                          <div class="col-6">
                            <ul class="post-tags">
                              <li><i class="fa fa-tags"></i></li>
                              <li><a href="#"><?php echo $post['post_tag'];?></a>,</li>                              
                            </ul>
                          </div>                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                  <div class="main-button">
                    <a href="blog.html">View All Posts</a>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>