<?php 
include "inc/header.php" ;
include  "admin/inc/db.php";
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">The NewsBlog Project</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse justify-content-end navbar-collapse" id="navbarNavDropdown">
      
          <ul class="nav ms-auto">

          <?php
          $query = "SELECT cat_name AS 'navCategoryName' , cat_id AS 'navCategoryId' FROM category_tbl WHERE status = 1 AND is_parent = 0 ORDER BY cat_name ASC ";

          $result = mysqli_query($db,$query);
          while ($row = mysqli_fetch_assoc($result)) {
            extract($row);
            $subCategoryQuery = "SELECT cat_name AS 'navSubCatName' , cat_id AS 'navSubCatId' FROM category_tbl WHERE is_parent= '$navCategoryId' AND status = 1";
            
            $subCategoryResult = mysqli_query($db,$subCategoryQuery);
            $countSubCategory = mysqli_num_rows($subCategoryResult);
          
          ?>
          <?php
          if($countSubCategory == 0 ){

          ?>
            <li class="nav-item">
            <a class="nav-link"  href="category.php?cat=<?=$navCategoryId;?>"><?=$navCategoryName;?></a>
          </li>
            <?php }
            else{

             ?>

          
          
          <li class="nav-item dropdown">
            <a href="category.php?cat=<?=$countSubCategory ;?>" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <?= $navCategoryName ; ?> </a>

           
                 <div class="dropdown-menu bs-dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <?php
                    while ($row = mysqli_fetch_assoc($subCategoryResult)){
                        extract($row);
                    
                    ?>
                    <a class="dropdown-item" href="category.php?cat=<?=str_replace(" ", "", $navSubCatName);?>"><?= $navSubCatName ; ?></a>
                    <?php } ?>
                    
                    </div>
        </li>
        <?php } 
        } ?>
      </ul>
      
    </div>
  </div>
</nav>
  

  <body>
    <!-- :::::::::: Header Section Start :::::::: -->
    
    <!-- ::::::::::: Header Section End ::::::::: -->

    
    <!-- :::::::::: Page Banner Section Start :::::::: -->
    <section class="blog-bg background-img">
        <div class="container">
            <!-- Row Start -->
            <div class="row">
                <div class="col-md-12">
                    <h2 class="page-title">Blog Page</h2>
                    <!-- Page Heading Breadcrumb Start -->
                    <nav class="page-breadcrumb-item">
                        <ol>
                            <li><a href="index.php">Home <i class="fa fa-angle-double-right"></i></a></li>
                            <!-- Active Breadcrumb -->
                            <li class="active">Blog</li>
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
                <!-- Blog Posts Start -->
                <div class="col-md-8">
                     <?php
                             $sql = "SELECT * FROM post ORDER BY post_id DESC";
                             $all_post = mysqli_query($db,$sql);
                             $i = 0 ;
                             while($row = mysqli_fetch_assoc($all_post)){
                             $post_id = $row['post_id'];
                             $title = $row['title'];
                             $discription = $row['description'];
                             $image = $row['image'];
                            $category_id = $row['category_id'];
                             $author_id = $row['author_id'];
                             $status = $row['status'];
                             $meta = $row['tags'];
                             $post_date = $row['post_date'];
                             $i++;

                                            
                     ?>

                    <!-- Single Item Blog Post Start -->
                    <div class="blog-post">
                        <!-- Blog Banner Image -->
                        <div class="blog-banner">
                            <a href="single.php?post=<?php echo $post_id ; ?>">
                                <img src="admin/image/post/<?php echo $image ; ?>">
                                <!-- Post Category Names -->
                                <div class="blog-category-name">
                                    <h6>Technology</h6>
                                </div>
                            </a>
                        </div>
                        <!-- Blog Title and Description -->
                        <div class="blog-description">
                            <a href="#">
                                <h3 class="post-title"> <?php echo $title ; ?> </h3>
                            </a>
                            <p> <?php echo substr($discription , 0, 450) . "..."; ?></p>
                            <!-- Blog Info, Date and Author -->
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="blog-info">
                                        <ul>
                                            <li><i class="fa fa-calendar"></i><?php echo  $post_date  ?></li>
                                            <li><i class="fa fa-user"></i>by - admin</li>
                                            <li><i class="fa fa-heart"></i>(50)</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-4 read-more-btn">
                                    <a href="single.php?post=<?php echo $post_id ; ?>"><button type="button" class="btn-main">Read More <i class="fa fa-angle-double-right"></i></button> </a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                  

                    <?php } ?>
                    <!-- Single Item Blog Post End -->


                    <!-- Blog Paginetion Design Start -->
                    <div class="paginetion">
                        <ul>
                            <!-- Next Button -->
                            <li class="blog-prev">
                                <a href=""><i class="fa fa-long-arrow-left"></i>  Previous</a>
                            </li>
                            <li><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li class="active"><a href="">3</a></li>
                            <li><a href="">4</a></li>
                            <li><a href="">5</a></li>
                            <!-- Previous Button -->
                            <li class="blog-next">
                                <a href=""> Next <i class="fa fa-long-arrow-right"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!-- Blog Paginetion Design End -->               
                </div>



                <!-- Blog Right Sidebar -->
             <?php include "sidebar.php" ?>
                <!-- Right Sidebar End -->
            </div>
        </div>
    </section>
    <!-- ::::::::::: Blog With Right Sidebar End ::::::::: -->
    



    <!-- :::::::::: Footer Buy Now Section Start :::::::: -->
    <section class="buy-now">
        <div class="container">
            <!-- But Now Row Start -->
            <div class="row">
                <!-- Left Side Content -->
                <div class="col-md-9">
                    <h4><span>Blue Chip</span> - Multipurpose Business Corporate Website Template</h4>
                </div>
                <!-- Right Side Button -->
                <div class="col-md-3">
                    <button type="button" class="btn-main"><i class="fa fa-cart-plus"></i> Buy Now</button>
                </div>
            </div>
            <!-- But Now Row End -->
        </div>
    </section>
    <!-- ::::::::::: Footer Buy Now Section End ::::::::: -->


    <!-- :::::::::: Footer Section Start :::::::: -->
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