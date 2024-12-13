<?php
    $CategoryName = $obj->display_category();

    if(isset($_POST['add_post'])){
        $post_msg = $obj->add_post($_POST);
    }
?>

<h2>Add Post Page</h2>
<?php if(isset($post_msg)){echo $post_msg;} ?>
<form action="" method="post" enctype="multipart/form-data">    
    <div class="form-group">
        <label class="mb-1" for="post_title">Post Title</label>
        <input class="form-control py-4" id="post_title" type="text" name="post_title"/>
    </div>
    <div class="form-group">
        <label class="mb-1" for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="post_content" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label class="mb-1" for="post_img">Upload Thumbnail</label><br>
        <input class="py-4" id="post_img" type="file" name="post_img"/>
    </div>
    <div class="form-group">
        <label class="mb-1" for="post_category">Select Post Category</label>
        <select class="form-control" name="post_category" id="post_category">
            <?php while($category = mysqli_fetch_assoc($CategoryName)){ ?>
                <option value="<?php echo $category['cat_id']; ?>">
                    <?php echo $category['cat_name']; ?>
                </option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label class="mb-1" for="post_summary">Post Summary</label>
        <input class="form-control py-4" id="post_summary" type="text" name="post_summary"/>
    </div>    
    <div class="form-group">
        <label class="mb-1" for="post_tag">Post Tag</label>
        <input class="form-control py-4" id="post_tag" type="text" name="post_tag"/>
    </div>
    <div class="form-group">
        <label class="mb-1" for="post_status">Post Status</label>
        <select class="form-control" name="post_status" id="post_status">
            <option value="1">Published</option>
            <option value="0">Unpublished</option>
        </select>
    </div>
    <input class="form-control btn btn-block btn-primary" type="submit" name="add_post" value="Add Post"/>    
</form>