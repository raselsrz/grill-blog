<?php

global $conn,$title;

$title = "Localhost-Admin-All Blog Post";

 get_admin_header();

 ?>

<div class="h-screen flex-grow-1 overflow-y-lg-auto">
        
        <main class="py-6 bg-surface-secondary">
            <div class="container-fluid">
                <!-- Card stats -->
                
                <div class="card shadow border-0 mb-7">
                    <div class="card-header">
                        <h5 class="mb-0">All Post</h5>
                    </div>
                    <div class="table-responsive">

                            <?php

                            $results_per_page = 10;
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $start_from = ($page - 1) * $results_per_page;

                            $result = mysqli_query($conn, "SELECT * FROM post_data ORDER BY id DESC LIMIT $start_from, $results_per_page");



                              while ($data = mysqli_fetch_assoc($result)) {
                                  $content = substr($data['content'], 0, 90);
                                  $title = substr($data['title'], 0, 45);
                              ?>

                            <div class="blog-post">
                                <h4><?php echo $title; ?> <span>more...</span></h4>
                                <p><?php echo $content; ?> <span>more...</span></p>
                                <div class="btn-container">
                                    <a href="/admin/edit/<?php echo $data['id'];  ?>" class="btn btn-sm btn-neutral">Edit</a>

                                            <a href="/admin/delete/<?php echo $data['id']; ?>" onclick="return confirm('Are you sure you delete post?')" class="btn btn-sm btn-square btn-neutral text-danger-hover"><i class="bi bi-trash"></i></a>


                                      </div>
                            </div>

                          <?php } ?>

                    </div>
                   
                    <div class="card-footer border-0 py-5">
                        <span class="text-muted text-sm">Showing 10 items out of <?php echo get_post_count(); ?> results found</span>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                            <li class="page-item">
                            <?php
                                $sql = "SELECT COUNT(*) AS total FROM post_data";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_assoc($result);
                                $total_pages = ceil($row['total'] / $results_per_page);

                                for ($i = 1; $i <= $total_pages; $i++) {

                                    
                                    echo "<li class='page-item " . ($page == $i ? "active" : "") . "'><a class='page-link' href='?page=$i'>$i</a></li>";
                                    } ?>  
                          </ul>
                         
                        </nav>
                    </div>
                </div>
            </div>
        </main>
    </div>
            

 <?php get_admin_footer(); ?>