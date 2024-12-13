<?php
    if(isset($_POST['add_category'])){
        $msg = $obj->add_category($_POST);
    }
?>

<h2>Add Category Page</h2>
<?php if(isset($msg)){echo $msg;} ?>
<form action="" method="POST">    
    <div class="form-group">
        <label class="mb-1" for="cat_name">Category Name</label>
        <input class="form-control py-4" id="cat_name" type="text" name="cat_name"/>
    </div>
    <div class="form-group">
        <label class="mb-1" for="cat_des">Category Description</label>
        <input class="form-control py-4" id="cat_des" type="text" name="cat_des"/>
    </div>
    <input class="form-control btn btn-block btn-primary" type="submit" name="add_category" value="Add Category"/>
    
</form>