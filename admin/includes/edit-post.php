<?php
    if(isset($_GET['p_id'])) {
        $the_get_post_id = $_GET['p_id'];
    }
    $query = "SELECT * FROM posts WHERE post_id = $the_get_post_id";
    $select_post_by_id = mysqli_query($connection, $query);
    confirmQuery($select_post_by_id);
    while($row = mysqli_fetch_assoc($select_post_by_id)) {
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_date = $row['post_date'];
        $post_content = $row['post_content'];
    }
    if (isset($_POST['update_post'])) {
        $post_title = $_POST['post_title'];
        $post_category_id = $_POST['post_category_id'];
        $post_author = $_POST['post_author'];
        $post_status = $_POST['post_status'];
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_image = $_FILES['post_image']['name'];
        $post_image_temp = $_FILES['post_image']['tmp_name'];

        move_uploaded_file($post_image_temp, "../images/$post_image");
        if (empty($post_image)) {
            $query = "SELECT * FROM posts WHERE post_id = $the_get_post_id";
            $select_post_image_query = mysqli_query($connection, $query);
            confirmQuery($select_post_image_query);
            while($row = mysqli_fetch_assoc($select_post_image_query)) {
                $post_image = $row['post_image'];
            }
        }
        $query = "UPDATE posts SET post_title = '{$post_title}', post_category_id = {$post_category_id}, post_author = '{$post_author}', post_status = '{$post_status}', post_tags = '{$post_tags}', post_content = '{$post_content}', post_image = '{$post_image}' WHERE post_id = {$the_get_post_id}";
        $update_post_query = mysqli_query($connection, $query);
        confirmQuery($update_post_query);
    }
?>
<form action="" method="post" enctype=multipart/form-data>
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" name="post_title" id="post_title" class="form-control" value="<?php echo $post_title; ?>">
    </div>
    <div class="form-group">
        <label for="post_category_id">Category</label>
        <select name="post_category_id" id="post_category_id" class="form-control">
            <?php
                $query = "SELECT * FROM categories";
                $select_categories = mysqli_query($connection, $query);
                confirmQuery($select_categories);
                while($row = mysqli_fetch_assoc($select_categories)) {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    echo "<option value='{$cat_id}'>{$cat_title}</option>";
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" name="post_author" id="post_author" class="form-control" value="<?php echo $post_author; ?>">
    </div>
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" name="post_status" id="post_status" class="form-control" value="<?php echo $post_status; ?>">
    </div>
    <div class="form-group">
        <img src="../images/<?php echo $post_image; ?>" alt="" width="200px">
    </div>
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="post_image" id="post_image" class="form-control-file">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" name="post_tags" id="post_tags" class="form-control" value="<?php echo $post_tags; ?>">
    </div>
    <div class="form-group">
        <label for="post_content">Post content</label>
        <textarea type="text" name="post_content" id="post_content" class="form-control" cols="30" rows="10"><?php echo $post_content; ?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" name="update_post" value="Update Post" class="btn btn-primary">
    </div>
</form>