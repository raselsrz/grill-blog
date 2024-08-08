<?php

global $conn,$title;

$title = "Localhost-Admin All User";

if (is_logged() && !is_admin()) { 
    
    redirect('/404');
   exit();
}
if (!is_logged() && !is_admin()) {
  header("Location: /login");
}

 get_admin_header();

 ?>

        <div class="h-screen flex-grow-1 overflow-y-lg-auto">

          <main class="py-6 bg-surface-secondary">
            <div class="container-fluid">
                <!-- Card stats -->
                <div class="card shadow border-0 mb-7">
                    <div class="card-header">
                        <h5 class="mb-0">All User</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Password</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                            $results_per_page = 5;
                            $page = isset($_GET['page']) ? $_GET['page'] : 1;
                            $start_from = ($page - 1) * $results_per_page;

                            $result = mysqli_query($conn, "SELECT * FROM users_data ORDER BY id DESC LIMIT $start_from, $results_per_page");

                              while ($data = mysqli_fetch_assoc($result)) {

                                
                              ?>
                                <tr>
                                    <td class="profile_img">
                                        <img alt="" width="30" src="https://img.icons8.com/bubbles/100/000000/user.png"></a href="#">
                                        <?php echo $data['full_name']; ?></a>
                                       
                                    </td>
                                    <td>
                                        <?php echo $data['phone']; ?>
                                    </td>
                                    <td>
                                        <a class="text-heading font-semibold" href="#">
                                            <?php echo $data['email']; ?>
                                        </a>
                                    </td>
                                    <td>
                                       <?php echo $data['password']; ?>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer border-0 py-5">
                        <span class="text-muted text-sm">Showing 10 items out of <?php echo get_user_count(); ?> results found</span>
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