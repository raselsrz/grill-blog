<?php

global $conn, $title;

$title = "Localhost-Admin-Edit Blog Post";

$data = get_post_data_id($id);

if ($data == false) {
    redirect('/login?error=no_posts');
}

$is_try = false;
$msg = '';
$is_error = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $is_try = true;

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $supported_extensions = ['jpg', 'png', 'webp', 'jpeg'];
    $new_dir = '';

    if (isset($_FILES['img']) && $_FILES['img']['error'] == 0) {
        $name = $_FILES['img']['name'];
        $tmp_dir = $_FILES['img']['tmp_name'];
        $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));

        if (!in_array($ext, $supported_extensions)) {
            $msg = 'Only image files (jpg, png, webp, jpeg) are supported';
            $is_error = true;
        } else {
            $new_dir = 'assets/img/' . $name;
            if (file_exists($new_dir)) {
                $new_dir = 'assets/img/copy-' . $name;
                $msg = 'Image already exists, saved as copy-' . $name;
            }
            if (!move_uploaded_file($tmp_dir, $new_dir)) {
                $msg = 'Failed to upload image';
                $is_error = true;
            }
        }
    }

    $slug = make_slug($title);

    if (!$is_error) {
        $sql = "UPDATE post_data SET title='$title',slug='$slug', content='$content', img='$new_dir', post_category='$category' WHERE id='$id'";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            $msg = 'Something went wrong: ' . mysqli_error($conn);
            $is_error = true;
        } else {
            $msg = "Update successful!";
            $data = get_post_data_id($id);
        }
    }
}

get_admin_header();

?>
<div class="h-screen flex-grow-1 overflow-y-lg-auto">
    <main class="py-6 bg-surface-secondary">
        <div class="container-fluid">
            <div class="card shadow border-0 mb-7">
                <div class="card-header">
                    <h5 class="mb-0">Edit Post</h5>
                </div>
                <?php if ($is_try) { ?>
                <div class="card-header">
                    <h5 class="mb-0"><?php echo htmlspecialchars($msg); ?></h5>
                </div>
                <?php } ?>
            </div>

            <div class="card shadow border-0 mb-7 add-container">
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="title" class="form-label">Post Title:</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($data['title'] ?? ''); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Post Content:</label>
                            <textarea class="form-control" id="content" name="content" rows="4" required><?php echo htmlspecialchars($data['content'] ?? ''); ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="img" class="form-label">Image:</label>
                            <input type="file" class="form-control" id="img" name="img" <?php echo empty($data['img']) ? 'required' : ''; ?>>
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Category:</label>
                            <select class="form-control" id="category" name="category" required>
                                <option value="0">Uncategorized</option>
                                <?php
                                $result = mysqli_query($conn, "SELECT * FROM category");
                                while ($cat = mysqli_fetch_assoc($result)) {
                                    $name = $cat['name'];
                                    $cat_id = $cat['id'];
                                    $selected = ($data['post_category'] == $cat_id) ? 'selected' : '';
                                    echo '<option value="' . $cat_id . '" ' . $selected . '>' . htmlspecialchars($name) . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Post</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>

<?php get_admin_footer(); ?>
