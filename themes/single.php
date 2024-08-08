<?php

global $conn, $title;

$data = get_post_by_slug($slug);

if ($data == false) {
    redirect('/404');
    exit();
}

$title = "Localhost - Single POST " . htmlspecialchars($data['slug']);
$post_id = $data['id'];
$category = get_category_by_id($data['post_category']);
$category = is_array($category) ? $category : [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!is_logged()) {
        redirect('/login');
        exit();
    } else {
        if (!empty($_POST['comment'])) {
            $comment = mysqli_real_escape_string($conn, $_POST['comment']);
            $user_id = $_SESSION['user_data']['id'];
            $sql = "INSERT INTO blog_comment (user_id, comment, post_id) VALUES ('$user_id', '$comment', $post_id)";
            mysqli_query($conn, $sql);
        }
    }
}

get_header();
?>

<div id="heading">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-content">
                    <h2>Single Product</h2>
                    <span>Home / <a href="#">Single Post</a></span>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="product-post">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-section">
                    <h2>Single Blog Post</h2>
                    <img src="/assets/images/under-heading.png" alt="" />
                </div>
            </div>
        </div>
        <div id="single-blog" class="page-section first-section">
            <div class="container">
                <div class="row">
                    <div class="product-item col-md-12">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="image">
                                    <div class="image-post">
                                        <img src="<?php echo htmlspecialchars($data['img']); ?>" alt="" />
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-title">
                                        <h2><?php echo htmlspecialchars($data['title']); ?></h2>
                                        <h3><?php 
                                            if (isset($category['name'])) {
                                                echo '<a href="/category/' . htmlspecialchars($category['slug']) . '">' . htmlspecialchars($category['name']) . '</a>';
                                            } else {
                                                echo 'Uncategorized';
                                            } 
                                        ?></h3>
                                        <span class="subtitle">4 comments</span>
                                    </div>
                                    <p><?php echo nl2br(htmlspecialchars($data['content'])); ?></p>
                                </div>
                                <div class="divide-line">
                                    <img src="/assets/images/under-heading.png" alt="" />
                                </div>
                                <div class="comments-title">
                                    <div class="comment-section">
                                        <h4><span></span> Comments</h4>
                                    </div>
                                </div>
                                <div class="all-comments">
                                    <?php
                                    $sql = "SELECT blog_comment.comment, blog_comment.added, users_data.full_name AS name 
                                            FROM blog_comment 
                                            JOIN users_data ON blog_comment.user_id = users_data.id 
                                            WHERE blog_comment.post_id = $post_id";

                                    $result = mysqli_query($conn, $sql);

                                    while ($datasx = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <div class="view-comments">
                                            <div class="comments">
                                                <div class="author-thumb">
                                                    <img src="https://img.icons8.com/bubbles/100/000000/user.png" alt="" />
                                                </div>
                                                <div class="comment-body">
                                                    <h6><?php echo htmlspecialchars($datasx['name']); ?></h6>
                                                    <span class="date"><?php echo htmlspecialchars($datasx['added']); ?></span>
                                                    <a href="#" class="hidden-xs">Reply</a>
                                                    <p><?php echo nl2br(htmlspecialchars($datasx['comment'])); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="divide-line">
                                    <img src="/assets/images/under-heading.png" alt="" />
                                </div>
                                <div class="leave-comment">
                                    <div class="leave-one">
                                        <h4>Leave a comment</h4>
                                    </div>
                                </div>
                                <?php if (is_logged()) { ?>
                                    <div class="leave-form">
                                        <form action="#" method="POST" class="leave-comment">
                                            <div class="row">
                                                <div class="text col-md-12">
                                                    <textarea name="comment" placeholder="Comment"></textarea>
                                                </div>
                                            </div>
                                            <div class="send">
                                                <button type="submit">Send</button>
                                            </div>
                                        </form>
                                    </div>
                                <?php } else { ?>
                                    <a href="/login" class="btn d-inline-flex btn-primary">Login first if you want to comment</a>
                                <?php } ?>
                            </div>
                            <div class="col-md-3 col-md-offset-1">
                                <div class="side-bar">
                                    <div class="recent-post">
                                        <h4>Recent Posts</h4>
                                        <div class="posts">
                                            <?php
                                            $results_per_page = 3;
                                            $result = mysqli_query($conn, "SELECT * FROM post_data ORDER BY id DESC LIMIT $results_per_page");

                                            while ($side_data = mysqli_fetch_assoc($result)) { ?>
                                                <div class="recent-post">
                                                    <div class="recent-post-thumb">
                                                        <img src="<?php echo htmlspecialchars($side_data['img']); ?>" alt="" />
                                                    </div>
                                                    <div class="recent-post-info">
                                                        <h6><a href="/post/<?php echo htmlspecialchars($side_data['slug']); ?>"><?php echo htmlspecialchars($side_data['title']); ?></a></h6>
                                                        
                                                        
                                                        <span><?php echo get_time($side_data['created_at']); ?></span>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>
