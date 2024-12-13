<?php
    if(isset($_GET['status'])){
        if($_GET['status']=='edit_post'){
            $id = $_GET['id'];
            $u_data = $obj->display_post_edit($id);
        }
    }

    $CategoryName = $obj->display_category();

    if(isset($_POST['update_post'])){
        $msg = $obj->update_post($_POST);
    }

?>

<h2>Update Post Page</h2>

<div class="shadow m-5 p-5">
    <?php if(isset($msg)){echo $msg;} ?>
    <?php while($data = mysqli_fetch_assoc($u_data)){ ?>
    <form action="" method="POST">
        <input type="hidden" name="edit_post_id" value="<?php echo $id ?>">
        <div class="form-group">
            <label class="mb-1" for="change_title">Change Title</label>
            <input
                class="form-control"
                id="change_title"
                type="text"
                name="change_title"
                value="<?php echo $data['post_title'];?>"/>
        </div>
        <div class="form-group">
            <label class="mb-1" for="change_content">Change Content</label>
            <textarea
                class="form-control"
                name="change_content"
                id="change_content"
                cols="30"
                rows="10"
                value="<?php echo $data['post_content'];?>"></textarea>
        </div>
        <div class="form-group">
            <label class="mb-1" for="change_author">Change Author</label>
            <input
                class="form-control"
                id="change_author"
                type="text"
                name="change_author"
                value="<?php echo $data['post_author'];?>"/>
        </div>        
        <div class="form-group">
            <label class="mb-1" for="change_category">Change Post Category</label>
            <select class="form-control" name="change_category" id="change_category">
                <?php while($category = mysqli_fetch_assoc($CategoryName)){ ?>
                <option value="<?php echo $category['cat_id'];?>">
                    <?php echo $category['cat_name'];?>
                </option>
                <?php }?>
            </select>
        </div>
        <div class="form-group">
            <label class="mb-1" for="change_status">Change Status</label>
            <select
                class="form-control"
                name="change_status"
                id="change_status"
                value="<?php echo $data['post_status'];?>">
                <option value="1">Published</option>
                <option value="0">Unpublished</option>
            </select>
        </div>
        <?php } ?>
        <input
            class="form-control btn btn-block btn-primary"
            type="submit"
            name="update_post"
            value="Update Post"/>
    </form>
</div>