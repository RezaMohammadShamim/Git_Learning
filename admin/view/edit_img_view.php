<?php
    if(isset($_GET['status'])){
        if($_GET['status']=='edit_img'){
            $id = $_GET['id'];            
        }
    }

    

    if(isset($_POST['update_img'])){
        $msg = $obj->update_img($_POST);

    }

?>
<h2>Change Thumbanil Page</h2>
<div class="shadow m-5 p-5">
    <?php if(isset($msg)){echo $msg;} ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="edit_img_id" value="<?php echo $id ?>">
        <div class="form-group">
            <label class="mb-1" for="change_img">Choose Thumbnail</label>
            <input class="form-control" id="change_img" type="file" name="change_img"/>
        </div>
        <input
            class="form-control btn btn-block btn-primary"
            type="submit"
            name="update_img"
            value="Update Thumbnail"/>
    </form>
</div>