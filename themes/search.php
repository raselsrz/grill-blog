<?php

global $conn,$title;



$searchTerm =mysqli_escape_string($conn,$_GET['s']);
 
 $sql = "SELECT * FROM post_data WHERE title LIKE '%$searchTerm%' OR content LIKE '%$searchTerm%'";
$searchTerm= htmlspecialchars($searchTerm);
$search_result = mysqli_query($conn, $sql);

$datas = mysqli_num_rows($search_result);

$title = "Localhost-Search Result For : ". $searchTerm;

get_header();
?>


<div id="latest-blog">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading-section">
                                <h2>Latest blog posts</h2>
                                <img src="/assets/images/under-heading.png" alt="" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php 

                            if ($datas > 0) {
                                while ($data = mysqli_fetch_assoc($search_result)) {
                                   

                        ?>

 
                            <div class="col-md-4 col-sm-6">
                            <div class="blog-post">
                                <div class="blog-thumb">
                                    <img src="<?php echo $data['img']; ?>" alt="" />
                                </div>
                                <div class="blog-content">
                                    <div class="content-show">
                                        <h4><a href="/<?php echo $data['slug']; ?>"><?php echo $data['title']; ?></a></h4>
                                        <div class="date_category">
                                            <span><a href="">Date</a> </span>
                                            <span> <a href="#" class="btn">Show More</a> </span>
                                            <span> <a href="#">Category</a> </span>
                                        </div>
                                    </div>
                                    <div class="content-hide">
                                        <p><?php echo $data['content']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
             

                   <?php } }else{

                    ?>

                    <div id='notfound'>
                        <div class='notfound'>
                            <div class='notfound-404'></div>
                            <h1>Oops!</h1>
                                <h2>Search result for: "<?php echo ($searchTerm);?>"</h2>
                                <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
                            <a href='/'>Back to home</a>
                        </div>
                    </div>

                        <?php
                    }
                ?>
                    
                    </div>
                </div>
            </div>

            <?php

get_footer();


?>