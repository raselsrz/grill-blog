<?php
global $conn,$title;



$sql1 = "SELECT * FROM category WHERE slug='$slug'";
$result1 = mysqli_query($conn, $sql1);
$total1 = mysqli_num_rows($result1);

if ($total1 <= 0) {
    redirect('/404');
}

$data1 = mysqli_fetch_assoc($result1);

$category_id = $data1['id'];

$title = "Localhost-Category " . $data1['name'];

get_header();

?>

<div id="latest-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="heading-section">
                    <h2>Category <span style="color:#f78e21; "><?php echo $data1['name']; ?></span> </h2>
                    <img src="/assets/images/under-heading.png" alt="">
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            $sql = "SELECT * FROM post_data WHERE post_category=$category_id";
            $result = mysqli_query($conn, $sql);

            while ($datas = mysqli_fetch_assoc($result)) {

            ?>
                <div class="col-md-4 col-sm-6">
                            <div class="blog-post">
                                <div class="blog-thumb">
                                    <img src="<?php echo $datas['img']; ?>" alt="" />
                                </div>
                                <div class="blog-content">
                                    <div class="content-show">
                                        <h4><a href="/<?php echo $datas['slug']; ?>"><?php echo $datas['title']; ?></a></h4>
                                        <div class="date_category">
                                            <span><a href="">Date</a> </span>
                                            <span> <a href="#" class="btn">Show More</a> </span>
                                            <span> <a href="#"><?php echo $data1['name']; ?></a> </span>
                                        </div>
                                    </div>
                                    <div class="content-hide">
                                        <p><?php echo $datas['content']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
            <?php } ?>

        </div>
    </div>
</div>

<?php
get_footer();
?>
