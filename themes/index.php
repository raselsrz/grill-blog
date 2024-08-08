<?php
global $conn, $title;

$title = 'Localhost-The Blog Website';

get_header();
?>

<div id="slider">
                <div class="flexslider">
                  <ul class="slides">
                    <?php
                    
                    $result = mysqli_query($conn, "select * from post_data order by id desc");
                

                    while ($data = mysqli_fetch_assoc($result)) { 

                        ?>

                        <li>
                        <div class="slider-caption">
                         <div class="slider-captions" >
                            <div class="text">
                            <a href="/<?php echo $data['slug']; ?>"><h2><?php echo $data['title']; ?></h2></a> 
                            </div>
                         </div>
                        </div>
                      <img src="<?php echo $data['img']; ?>" alt="" />
                    </li>

                  <?php  }
                    ?>
                  </ul>
                </div>
            </div>

<div id="latest-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-section">
                    <h2>Latest blog posts</h2>
                    <img src="/assets/images/under-heading.png" alt="">
                </div>
            </div>
        </div>
        <div class="row">
            <?php

            $results_per_page = 6;
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $start_from = ($page - 1) * $results_per_page;

            $result = mysqli_query($conn, "SELECT * FROM post_data ORDER BY id DESC LIMIT $start_from, $results_per_page");

            while ($data = mysqli_fetch_assoc($result)) {

                $content = substr($data['content'], 180);

            ?>
                <div class="col-md-4 col-sm-6">
    <div class="blog-post">
        <div class="blog-thumb">
            <img src="<?php echo htmlspecialchars($data['img']); ?>" alt="<?php echo htmlspecialchars($data['title']); ?>" />
        </div>
        <div class="blog-content">
            <div class="content-show">
                <h4><a href="/<?php echo htmlspecialchars($data['slug']); ?>"><?php echo htmlspecialchars($data['title']); ?></a></h4>
                <div class="date_category">
                    <span><a href=""><?php echo date('F j, Y', strtotime($data['created_at'])); ?></a> </span>
                    <span> <a href="/<?php echo htmlspecialchars($data['slug']); ?>" class="btn">Show More</a> </span>
                </div>
            </div>
            <div class="content-hide">
                <p><?php echo htmlspecialchars($content); ?> <a href="/<?php echo htmlspecialchars($data['slug']); ?>">_show more....</a> </p>
            </div>
        </div>
    </div>
</div>

            <?php } ?>
        </div>

        <!-- Pagination Links -->
        <div class="row">
            <div class="col-md-12">
                <ul class="pagination">
                    <?php
                    $sql = "SELECT COUNT(*) AS total FROM post_data";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $total_pages = ceil($row['total'] / $results_per_page);

                    for ($i = 1; $i <= $total_pages; $i++) {
                        
                        echo "<li class='" . ($page == $i ? "active" : "") . "'><a href='?page=$i'>$i</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>
