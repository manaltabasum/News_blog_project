<?php include "inc/header.php" ; 
  include "admin/inc/db.php" ;
 ?>

<body>

<section class="blog-bg background-img">
        <div class="container">
            <!-- Row Start -->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">Single Blog Page</h2>
                    <!-- Page Heading Breadcrumb Start -->
                    <nav class="page-breadcrumb-item">
                        <ol>
                            <li><a href="index.php">Home <i class="fa fa-angle-double-right"></i></a></li>
                            <li><a href="">Blog <i class="fa fa-angle-double-right"></i></a></li>
                            <!-- Active Breadcrumb -->
                            <li class="active">Single Right Sidebar</li>
                        </ol>
                    </nav>
                    <!-- Page Heading Breadcrumb End -->
                </div>
                  
            </div>
            <!-- Row End -->
        </div>
    </section>
    <!-- ::::::::::: Page Banner Section End ::::::::: -->



    <!-- :::::::::: Blog With Right Sidebar Start :::::::: -->
    <section>
        <div class="container">
            <div class="row">
                <!-- Blog Single Posts -->
                <div class="col-md-8">


                            <?php
                                if (isset($_POST['searchbtn']))
                                    {
                                    $searchitem = $_POST['search'];
                                    $sql = "SELECT * FROM post WHERE title LIKE '%$searchitem%' OR description LIKE '%$searchitem%' ORDER BY post_id DESC ";
                                    $all_post = mysqli_query($db,$sql);
                                    $countsearch = mysqli_num_rows($all_post);
                                    if ($countsearch == 0){
                                        ?>
                                        <h3 class="mb-4"> Search Result For <?php echo $searchitem ; ?>
                                    Total Found - </h3>
                                    <div class="alert alert-warning">No Result Found </div>
                                        <?php
                                 }
                                else{

                                    
                                   while($row = mysqli_fetch_assoc($all_post)) {
                                    $post_id = $row['post_id'];
                                    $title = $row['title'];
                                    $discription = $row['description'];
                                    $image = $row['image'];
                                    $category_id = $row['category_id'];
                                    $author_id = $row['author_id'];
                                    $status = $row['status'];
                                    $meta = $row['tags'];
                                    $post_date = $row['post_date'];
                                     

                                            
                            ?>
                        <h3>Search Result For - <?php echo "$searchitem" ?> Total Found <?php echo "$countsearch" ;?></h3>
                        
                        <!-- Blog Thumbnail Image Start -->
                        <div class="blog-banner">
                            <a href="single.php?post=<?php echo $post_id ; ?>">
                                <img src="admin/image/post/<?php echo $image ; ?>">
                                <div class="blog-category-name">

                                    <?php
                                    $sql = "SELECT * FROM category_tbl where cat_id = '$category_id'";
                                    $all_product = mysqli_query($db, $sql);
                                    while($row = mysqli_fetch_assoc($all_product)){
                                        $product_id = $row['cat_id'];
                                        $category_name = $row['cat_name'];
                                    
                                     ?>
                                     <h6><?php echo $category_name ?></h6>
                                </div>
                               
                            </a>
                            
                        </div>
                        <!-- Blog Thumbnail Image End -->

                        <!-- Blog Description Start -->
                         <div class="blog_description">
                                <a href="single.php?post=<?php echo  $post_id ; ?>">
                                    <h3 class="post-title"><?php echo $title ; ?>
                                    </h3>
                                </a>
                                <p> <?php echo  substr($discription, 0 , 300) . "..." ; ?></p>

                            <div class="row">
                                <div class="col-md-8">
                                    <ul>
                                        <li>
                                            <i class="fa fa-calender" >
                                            </i><?php echo $post_date ; ?>
                                        </li>
                                         <li><i class="fa fa-user"></i>by - admin</li>
                                            <li><i class="fa fa-heart"></i>(50)</li>
                                    </ul>
                                </div>
                                <div class="col-md-4 read-more-btn">
                                    <a href="single.php?post=<?php echo $post_id ?>" class="btn-main">Read morei
                                        <i class="fa fa-angle-double-right"></i>
                                    </a>

                                </div>
                            </div>


                         </div>
                        
                    <?php } ?>

                       

                </div>
                <?php  include "sidebar.php" ; ?>
                               
                </div>
                 

           <?php } 
                 
                  
                    }
                  }
                  if (isset($_GET['seartag'])) 
                  {
                    $searbtn = $_GET['seartag'];
                    $sql = "SELECT * FROM post WHERE title LIKE '%$searbtn%' OR description LIKE '%$searbtn%' ORDER BY post_id DESC";
                    $all_product = mysqli_query($db,$sql);
                    $countsearch = mysqli_num_rows($all_product);
                    if ($countsearch == 0 ){
                        ?>
                        <h3>Post For Meta Tag <?php echo "%$searbtn" ;?> Total found <?php echo "$countsearch" ; ?></h3>
                        <div class="alert alert-warning">No Result Found</div>
                        <?php
                    }
                    else{
                        while ($row = mysqli_fetch_assoc($all_product))
                        {
                            $post_id = $row['post_id'];
                            $title = $row['title'];
                            $discription = $row['description'];
                            $image = $row['image'];
                            $category_id = $row['category_id'];
                            $author_id = $row['author_id'];
                            $status = $row['status'];
                            $meta = $row['tags'];
                            $post_date = $row['post_date'];

                            ?>
                            <h3>Post For Meta Tag <?php echo $searbtn ; ?>Total Found  <?php echo $countsearch ; ?></h3>

                            <div class="blog-banner">
                                <a href="single.php?post=<?php echo $post_id ; ?>">
                                    <img src="admin/image/post/<?php echo $image ; ?>" alt="">
                                    <div class="blog-category-name">

                                    <?php
                                    $sql = "SELECT * FROM category_tbl WHERE cat_id = '$category_id'";
                                    $all_product = mysqli_query($db,$sql);
                                    while ($row = mysqli_fetch_assoc($all_product)){
                                        $product_id = $row['cat_id'];
                                        $category_name = $row['cat_name'];
                                    }

                                    ?>
                                    <h6><?php echo $category_name ; ?></h6>
                                    </div>
                                </a>
                            </div>
                            <div class="blog-description">
                                <a href="single.php?post=<?php echo $post_id ; ?>"><h3 class="post-title"><?php echo $title ; ?></h3></a>
                                <p><?php echo substr($discription,0 ,300) . "..." ?></p>
                            </div>
                            <?php
                        }
                    }
                  }
                  
                  

                  ?>
 
        </div>

        
    </section>
        <footer>
        <!-- Footer Widget Section Start -->
        <div class="footer-widget background-img section">
            <div class="container">
                <div class="row">

                    <!-- Footer Widget One Start-->
                    <div class="col-md-3">
                        <div class="widget-title">
                            <h4><span>Blue</span> Chip</h4>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard Lorem Ipsum has been the</p>
                        <!-- Social Media -->
                        <div class="widget-title">
                            <h4><span>Social</span> Media</h4>
                        </div>

                        <div class="social-media">
                            <ul>
                                <li>
                                    <a href=""><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-linkedin"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-google-plus"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-instagram"></i></a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Footer Widget One End-->

                    <!-- Footer Widget Two Start -->
                    <div class="col-md-3">
                        <div class="widget-title">
                            <h4><span>Useful</span> Links</h4>
                        </div>
                        <div class="useful-links">
                            <ul>
                                <li><a href="">About Us</a></li>
                                <li><a href="">Portfolio</a></li>
                                <li><a href="">Pages</a></li>
                                <li><a href="">FAQ</a></li>
                                <li><a href="">Terms of Use</a></li>
                                <li><a href="">Privacy Policy</a></li>
                                <li><a href="">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Footer Widget Two End -->

                    <!-- Footer Widget Three Start -->
                    <div class="col-md-3">
                        <div class="widget-title">
                            <h4><span>Contact</span> With Us</h4>
                        </div>
                        <div class="contact-with-us">
                            <ul>
                                <li>
                                    <a><i class="fa fa-home"></i>7/H, Banani, Dhaka-1213</a>
                                </li>
                                <li>
                                    <a><i class="fa fa-envelope-o"></i>example@yourdomain.com</a>
                                </li>
                                <li>
                                    <a><i class="fa fa-fax"></i>+880 123 456 789</a>
                                </li>
                                <li>
                                    <a><i class="fa fa-phone"></i>+880 123 456 789</a>
                                </li>
                                <li>
                                    <a><i class="fa fa-clock-o"></i>9.00 am - 5.00 pm</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Footer Widget Three End -->

                    <!-- Footer Widget Four Start -->
                    <div class="col-md-3">
                        <div class="widget-title">
                            <h4><span>Subscribe</span> Here</h4>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                        <!-- Subscribe From Start -->
                        <form action="" method="">
                            <div class="form-group ">
                                <input type="email" name="email" placeholder="Enter Your Email" autocomplete="off" class="form-input" required="required">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                            <!-- Subscribe Button -->
                            <div class="">
                                <button type="submit" class="btn-main"><i class="fa fa-paper-plane-o"></i> Subscribe</button>
                            </div>
                        </form>
                        <!-- Subscribe From End -->
                    </div>
                    <!-- Footer Widget Four End -->

                </div>
            </div>
        </div>
        <!-- Footer Widget Section End -->


        <!-- CopyRight Section Start -->
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <!-- Copyright Left Content -->
                    <div class="col-md-6">
                        <p><a href="">Theme Express</a> © 2018 All rights reserved. Terms of use and Privacy Policy</p>
                    </div>

                    <!-- Copyright Right Footer Menu Start -->
                    <div class="col-md-6">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="">About</a></li>
                                <li><a href="">FAQ</a></li>
                                <li><a href="">Privacy Policy</a></li>
                                <li><a href="">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Copyright Right Footer Menu End -->
                </div>
            </div>
        </div>
        <!-- CopyRight Section End -->
    
    </footer>
    <!-- ::::::::::: Footer Section End ::::::::: -->


    <!-- JQuery Library File -->
    <script type="text/javascript" src="assets/js/jquery-1.12.4.min.js"></script>
    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script-->

    <!-- Bootstrap JS -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>

    <!-- Owl Carousel JS -->
    <script src="assets/js/owl.carousel.min.js"></script>

    <!-- Isotop JS -->
    <script src="assets/js/isotop.min.js"></script>

    <!-- Fency Box JS -->
    <script src="assets/js/jquery.fancybox.min.js"></script>

    <!-- Easy Pie Chart JS -->
    <script src="assets/js/jquery.easypiechart.js"></script>

    <!-- JQuery CounterUp JS -->
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>

    <!-- BlueChip Extarnal Script -->
    <script type="text/javascript" src="assets/js/main.js"></script>

  </body>
</html>

</body>
