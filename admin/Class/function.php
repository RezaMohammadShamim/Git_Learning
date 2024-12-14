<?php
    Class adminBlog{
        private $conn;
        
        public function __construct()
        {
            //database host, database user, database pass, database name;
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = "";
            $dbname = 'blogproject';

            $this->conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);            

            if(!$this->conn){
                die ("Database Connection Error!");
            }
        }
        
       

$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Set character set to utf8mb4
$connection->set_charset("utf8mb4");

// Sample text with various characters
$text_with_various_characters = "This is a test 😊 with various characters including Chinese: 中文 and emojis.";

// Using prepared statements to insert text
$stmt = $connection->prepare("INSERT INTO example_table (content) VALUES (?)");
$stmt->bind_param('s', $text_with_various_characters);

if ($stmt->execute()) {
    echo "Record inserted successfully.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$connection->close();



        public function admin_login($admin_data){
            $admin_email = $admin_data['admin_email'];
            $admin_pass = md5($admin_data['admin_pass']);

            $query = "SELECT * FROM admin_info WHERE admin_email='$admin_email' && admin_pass='$admin_pass'";

            if(mysqli_query($this->conn, $query)){
                $admin_info = mysqli_query($this->conn, $query);

                if($admin_info){
                    header("location: dashboard.php");
                    $data = mysqli_fetch_assoc($admin_info);
                    session_start();
                    $_SESSION['adminID'] = $data['id'];
                    $_SESSION['admin_name'] = $data['admin_name'];
                }
                
            }
        }

        public function adminLogout(){
            unset($_SESSION['adminID']);
            unset($_SESSION['admin_name']);
            header("location: index.php");
        }

        public function add_category($add_cat){
            $cat_name = $add_cat['cat_name'];
            $cat_des = $add_cat['cat_des'];

            $query = "INSERT INTO category(cat_name,cat_des) VALUE('$cat_name','$cat_des')";

            if(mysqli_query($this->conn, $query)){
                return "Category Added Successfully!";
            }

        }

        public function display_category(){
            $query = "SELECT * FROM category";

            if(mysqli_query($this->conn, $query)){
                $data = mysqli_query($this->conn, $query);
                return $data; //for display data "return" must be execute
            }
        }

        public function delete_category($id){
            $query = "DELETE FROM category WHERE cat_id=$id";

            if(mysqli_query($this->conn, $query)){
                return "Category Deleted Successfully!";
            }
        }


        public function add_post($data){
            $post_title = $data['post_title'];
            $post_content = $data['post_content'];
            $post_img = $_FILES['post_img']['name'];
            $post_img_tmp = $_FILES['post_img']['tmp_name'];
            $post_category  = $data['post_category'];
            $post_summary = $data['post_summary'];
            $post_tag = $data['post_tag'];
            $post_status = $data['post_status'];

            $query = "INSERT INTO posts(post_title,post_content,post_img,post_ctg,post_author,post_date,post_comment_count,post_summary,post_tag,post_status) VALUE('$post_title','$post_content','$post_img',$post_category,'admin',now(),3,'$post_summary','$post_tag',$post_status)";

            if(mysqli_query($this->conn, $query)){
                move_uploaded_file($post_img_tmp,'../upload/'.$post_img);
                return "Post Added Successfully!";
            }            
        }

        public function display_post(){
            $query = "SELECT * FROM post_with_ctg";

            if(mysqli_query($this->conn, $query)){
                $data = mysqli_query($this->conn, $query);
                return $data;
            }
        }

        public function delete_post($id){
            $query = "DELETE FROM posts WHERE post_id=$id";

            if(mysqli_query($this->conn, $query)){
                return "Post Deleted Successfully!";
            }
        }

        public function display_post_public(){
            $query = "SELECT * FROM post_with_ctg WHERE post_status=1";

            if(mysqli_query($this->conn, $query)){
                $data = mysqli_query($this->conn, $query);
                return $data;
            }
        }

        public function update_img($data){
            $id = $data['edit_img_id'];
            $img_name = $_FILES['change_img']['name'];
            $img_tmp_name = $_FILES['change_img']['tmp_name'];
            $query = "UPDATE posts SET post_img='$img_name' WHERE post_id=$id";

            if(mysqli_query($this->conn, $query)){
                move_uploaded_file($img_tmp_name,'../upload/'.$img_name);
                return "Thumbnail Updated Successfully!";
            }
        }

        public function update_post($data){
            $id = $data['edit_post_id'];
            $u_title = $data['change_title'];
            $u_content = $data['change_content'];
            $u_author = $data['change_author'];
            $u_category = $data['change_category'];
            $u_status = $data['change_status'];
            
            $query = "UPDATE posts SET post_title='$u_title',post_content='$u_content',post_author='$u_author',post_date=now(),post_ctg='$u_category',post_status= $u_status WHERE post_id=$id";

            if(mysqli_query($this->conn, $query)){
                return "Post Updated Successfully";
            }
        }

        public function display_post_edit($id){            
            $query = "SELECT * FROM post_with_ctg WHERE post_id=$id";

            if(mysqli_query($this->conn, $query)){
                $data = mysqli_query($this->conn, $query);
                return $data;
            }
        }

       

        
    }
?>