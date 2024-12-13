<?php
    $data = $obj->display_post();    

    if(isset($_GET['status'])){
        if($_GET['status']=='delete'){
            $del_id = $_GET['id'];
            $del_post = $obj->delete_post($del_id);
        }
    }
?>
<h2>Manage Post Page</h2>
<?php if(isset($del_post)){echo $del_post;} ?>
<div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Thumb</th>
                <th>Author</th>
                <th>Date</th>
                <th>Category</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($post = mysqli_fetch_assoc($data)){ ?>
            <tr>
                <td><?php echo $post['post_id'];?></td>
                <td><?php echo $post['post_title'];?></td>
                <td><?php echo $post['post_content'];?></td>
                <td>
                <img height="100px" src="../upload/<?php echo $post['post_img']; ?>"><br>
                <a href="edit_img.php?status=edit_img&&id=<?php echo $post['post_id'];?>"> Change Thumb</a>
                </td>                
                <td><?php echo $post['post_author'];?></td>
                <td><?php echo $post['post_date'];?></td>
                <td><?php echo $post['cat_name'];?></td>
                <td><?php if($post['post_status']==1){
                    echo "Published";
                }else{
                    echo "Unpublished";
                }?><td>
                    <a class="btn btn-primary" href="edit_post.php?status=edit_post&&id=<?php echo $post['post_id'];?>">Edit</a>
                    <a class="btn btn-danger" href="?status=delete&&id=<?php echo $post['post_id'];?>">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>