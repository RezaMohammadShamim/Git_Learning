<?php
    $data = $obj->display_category();

    if(isset($_GET['status'])){
        if($_GET['status']=='delete'){
            $del_id = $_GET['id'];
            $del_msg = $obj->delete_category($del_id);
        }
    }
?>

<h2>Manage Category Page</h2>
<div class="table-responsive">
    <table class="table">
        <?php if(isset($del_msg)){echo $del_msg;} ?>
        <thead>
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Catgory Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($display_data = mysqli_fetch_assoc($data)){ ?>
            <tr>
                <td><?php echo $display_data['cat_id'] ?></td>
                <td><?php echo $display_data['cat_name'] ?></td>
                <td><?php echo $display_data['cat_des'] ?></td>
                <td>
                    <a class="btn btn-primary" href="#">Edit</a>
                    <a
                        class="btn btn-danger"
                        href="?status=delete&&id=<?php echo $display_data['cat_id'] ?>">Delete</a>
                </td>
                <?php } ?>
            </tr>
        </tbody>
    </table>
</div>