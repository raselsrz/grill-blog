<?php

global $conn,$title;

$title = "Localhost-Admin- Contact User Message";

 get_admin_header();

 ?>

         <div class="h-screen flex-grow-1 overflow-y-lg-auto">

          <main class="py-6 bg-surface-secondary">
            <div class="container-fluid">
                <!-- Card stats -->
                <div class="card shadow border-0 mb-7">
                    <div class="card-header">
                        <h5 class="mb-0">Contact Us Message</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover table-nowrap">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Address</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php
                              global $conn;
                              $result = mysqli_query($conn, "select * from contact");

                              while ($data = mysqli_fetch_assoc($result)) {

                                
                              ?>
                                <tr>
                                    <td class="profile_img"></a href="#">
                                        <?php echo $data['name']; ?></a>
                                       
                                    </td>
                                    <td>
                                        <a class="text-heading font-semibold" href="#">
                                            <?php echo $data['email']; ?>
                                        </a>
                                    </td>
                                    
                                    <td>
                                        <span class="badge badge-lg badge-dot">
                                            <?php echo $data['message']; ?>
                                        </span>
                                    </td>
                                    <td>
                                    	<span class="badge badge-lg badge-dot">
                                            <?php echo $data['address']; ?>
                                        </span>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- <div class="card-footer border-0 py-5">
                        <span class="text-muted text-sm">Showing 10 items out of 250 results found</span>
                        <nav aria-label="Page navigation example">
                          <ul class="pagination">
                            <li class="page-item"><a class="page-link disabled" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link bg-info text-white" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                          </ul>
                        </nav>
                    </div> -->
                </div>
            </div>
        </main>
      </div>


 <?php get_admin_footer(); ?>