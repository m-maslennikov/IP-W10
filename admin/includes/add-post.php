<?php
    if (isset($_POST['create_post'])) {
        $post_title = $_POST['post_title'];
        $post_category_id = $_POST['post_category_id'];
        $post_author = $_POST['post_author'];
        $post_status = $_POST['post_status'];
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date('y-m-d');
        $post_comment_count = 0;
        $post_image = $_FILES['post_image']['name'];
        $post_image_temp = $_FILES['post_image']['tmp_name'];

        move_uploaded_file($post_image_temp, "../images/$post_image");
        $query = "INSERT INTO posts (post_title, post_category_id, post_author, post_status, post_tags, post_content, post_date, post_comment_count, post_image) 
                VALUES ('{$post_title}',{$post_category_id},'{$post_author}','{$post_status}','{$post_tags}','{$post_content}',now(),0,'{$post_image}')";
        $create_post_query = mysqli_query($connection, $query);
        confirmQuery($create_post_query);
    }
?>
<form action="" method="post" enctype=multipart/form-data>
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" name="post_title" id="post_title" class="form-control">
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
        <input type="text" name="post_author" id="post_author" class="form-control">
    </div>
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" name="post_status" id="post_status" class="form-control">
    </div>
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="post_image" id="post_image" class="form-control-file">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" name="post_tags" id="post_tags" class="form-control">
    </div>
    <div class="form-group">
        <label for="post_content">Post content</label>
        <textarea type="text" name="post_content" id="post_content" class="form-control" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" name="create_post" value="Publish Post" class="btn btn-primary">
    </div>
</form>