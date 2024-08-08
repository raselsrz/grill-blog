<?php

global $conn,$title;

$title = "Localhost-Admin-Add Blog Post";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $category = mysqli_escape_string($conn, $_POST['add_category']);

    $slug = make_category($category);

    $sql = "INSERT INTO `category`(`name`,`slug`) VALUES ('$category','$slug')";

    $rasult = mysqli_query($conn, $sql);


}



 get_admin_header();

 ?><div class="h-screen flex-grow-1 overflow-y-lg-auto">

    <main class="py-6 bg-surface-secondary">
        <div class="container-fluid">

            <div class="card shadow border-0 mb-7">
                
                <div class="card-header add_cat">
                    <h5 class="mb-0">Add Post</h5>
                    <form method="POST" class="d-inline-block">
                                <div class="mb-3">
                                    <label for="category" class="form-label">Add Category:</label>
                                    <input type="text" class="form-control" id="category" name="add_category" required>
                                </div>
                                <button class="btn btn-sm btn-neutral">Add</button>
                    </form>
                </div>
                </div>

            <div class="card shadow border-0 mb-7 add-container">
                <div class="card-body">
                    <form action="/admin/insert_post" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="title" class="form-label">Post Title:</label>
                            <input type="text" name="title" class="form-control" id="title" name="title" required>
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Post Content:</label>
                            <textarea class="form-control" name="content" id="content" name="content" rows="4" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="img" class="form-label">Image Url:</label>
                            <input type="file" name="img" class="form-control" id="img" name="img" required>
                        </div>

                        <div class="mb-3">
                            <label for="category" class="form-label">Category:</label>
                            <select class="form-control" id="category" name="category" required>
                                <option value="0">Uncategorized</option>
                                <?php

                                  $result = mysqli_query($conn, "select * from category");
                                  while ($user = mysqli_fetch_assoc($result)) {

                                      $name = $user['name'];
                                      $id = $user['id'];

                                    ?>
                                    
                                        <?php echo"<option value='$id'>$name</option>\n"; ?>
                                    

                                <?php } ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Add Post</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>


  <?php get_admin_footer(); ?>