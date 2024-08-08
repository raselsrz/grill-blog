<?php
if (!defined('app_dir')) {
    echo 'No access';
    exit();
}

global $conn;

$supput = ['jpg', 'png', 'webp', 'jpeg'];

if (isset($_FILES['img'])) {
    $name = $_FILES['img']['name'];
    $tam_dir = $_FILES['img']['tmp_name'];
    $type = $_FILES['img']['type'];

    $ext_arry = explode('.', $name);
    $ext = end($ext_arry);

    if (in_array($ext, $supput) == false) {
        echo 'Only image files are supported.';
        exit();
    }

    $new_dir = 'assets/img/'.$name;
    if (file_exists($new_dir)) {
        $new_dir = 'assets/img/copy-'.$name;
        echo 'Image already exists, saving as a copy.';
    }
    move_uploaded_file($tam_dir, $new_dir);
}

$title = isset($_POST['title']) && !empty($_POST['title']) ? mysqli_escape_string($conn, $_POST['title']) : '';
$content = isset($_POST['content']) && !empty($_POST['content']) ? mysqli_escape_string($conn, $_POST['content']) : '';
$category = isset($_POST['category']) && !empty($_POST['category']) ? mysqli_escape_string($conn, $_POST['category']) : '';

$slug = make_slug($title); // Make sure make_slug function is defined

$user_id = $_SESSION['user_data']['id'];

// Assuming created_at should be set to the current time. You can omit this if your database handles it automatically.
$created_at = date('Y-m-d H:i:s');

$sql = "INSERT INTO `post_data` (`title`, `content`, `slug`, `author`, `img`, `post_category`, `created_at`)
    VALUES ('$title', '$content', '$slug', '$user_id', '$new_dir', '$category', '$created_at')";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo 'Error: ' . mysqli_error($conn);
    exit();
}

header('Location: /admin/allpost');
exit();
?>
