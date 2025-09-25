<?php include "inc/header.php" ; 
  include "admin/inc/db.php" ;
 ?>

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
        <div class="container ">
            <div class="row">
                <!-- Blog Single Posts -->
                <div class="col-md-8">


                            <?php
                                if (isset($_GET['cat'])){
                                    $singlepost = $_GET['cat'];
                                           
                                    $sql = "SELECT * FROM post WHERE category_id = '$singlepost' ORDER BY post_id DESC";
                                    $all_post = mysqli_query($db,$sql);
                                    
                            while($row = mysqli_fetch_assoc($all_post)) {
                                    $post_id = $row['post_id'];
                                    $title = $row['title'];
                                    $discription = $row['description'];
                                    $image = $row['image'];
                                    $category_id = $row['category_id'];
                                    $status = $row['status'];
                                    $meta = $row['tags'];
                                    $post_date = $row['post_date'];
                                   

                                            
                            ?>


                    <div class="blog-single">
                        <!-- Blog Title -->
                        <a href="#">
                            <h3 class="post-title"> <?php echo $title ; ?></h3>
                        </a>

                        <!-- Blog Categories -->
                     
                        
                        <!-- Blog Thumbnail Image Start -->
                        <div class="blog-banner">
                            <a href="single.php?post=<?php echo $post_id ; ?>">
                                <img src="admin/image/post/<?php echo $image ; ?>">
                           

                               <div class="single-categories">
                                    <span> <?php
                                    $sql = "SELECT * FROM category_tbl WHERE cat_id = '$category_id'";
                                                            $all_product = mysqli_query($db,$sql);
                                                            while($row = mysqli_fetch_assoc($all_product)){
                                                                $product_id = $row['cat_id'];
                                                                $category_name = $row['cat_name'];

                                                                echo $category_name ;
                                                            }  ?> </span>
                                    
                                </div>
                             </a>
                        </div>
                        <!-- Blog Thumbnail Image End -->

                        <!-- Blog Description Start -->
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

                        <!-- <div class="blog-description-quote">
                            <p><i class="fa fa-quote-left"></i>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<i class="fa fa-quote-right"></i></p>
                        </div> -->

                     
                    </div>
                  <?php } 
                   } ?>

                    <!-- Single Comment Section Start -->
                    <div class="single-comments">
                        <!-- Comment Heading Start -->
                        <div class="row">
                            <div class="col-md-12">
                                <h4>All Latest Comments (3)</h4>
                                <div class="title-border"></div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                            </div>
                        </div>
                        <!-- Comment Heading End -->

                        <!-- Single Comment Post Start -->
                        <div class="row each-comments">
                            <div class="col-md-2 ">
                                  <?php
                                $sql = "SELECT * FROM comment WHERE status = 1 AND cmt_post_id = '$singlepost' ORDER BY  cmt_post_id  DESC";
                                $all_comment = mysqli_query($db,$sql);
                                $i =0 ;
                                while($row = mysqli_fetch_assoc($all_comment)){

                                    $cmt_id = $row['id'];
                                    $cmt_name = $row['cmt_name'];
                                    $comment = $row['comment'];
                                    $cmt_post_id = $row['cmt_post_id'];
                                    $email	 = $row['email'];
                                    $status	 = $row['status'];
                                    $cmt_date	 = $row['cmt_date'];
                                   $i++ ;
                                

                                ?>
                                <!-- Commented Person Thumbnail -->
                                <div class="comments-person">
                                    <img src="assets/images/corporate-team/team-1.jpg">
                   
                                </div>
                            </div>

                            <div class="col-md-10 no-padding ">
                                <!-- Comment Box Start -->
                                <div class="comment-box ">
                                    <div class="comment-box-header">
                                        <ul>
                                            <li class="post-by-name"><?php echo $cmt_name ; ?></li>
                                            <li class="post-by-hour"><?php echo $cmt_date ; ?></li>
                                        </ul>
                                    </div>
                                    <p> <?php echo $comment ; ?></p>
                                </div>
                                <!-- Comment Box End -->
                                 
                            </div>
                            <?php }  ?>
                        </div>
                        <!-- Single Comment Post End -->




                    <!-- Post New Comment Section Start -->
                    <div class="post-comments">
                        <h4>Post Your Comments</h4>
                        <div class="title-border"></div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        <!-- Form Start -->
                        <form action="" method="POST" class="contact-form">
                            <!-- Left Side Start -->
                            <div class="row">
                                <div class="col-md-6">
                                    <!-- First Name Input Field -->
                                    <div class="form-group">
                                        <input type="text" name="cmt_name" placeholder="Your Name" class="form-input" autocomplete="off" required="required">
                                        <i class="fa fa-user-o"></i>
                                    </div>
                                </div>
                                <!-- Email Address Input Field -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email" placeholder="Email Address" class="form-input" autocomplete="off" required="required">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- Left Side End -->

                            <!-- Right Side Start -->
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Subject Input Field -->
                                    <!-- <div class="form-group">
                                        <input type="text" name="subject" placeholder="Subject" class="form-input" autocomplete="off" required="required">
                                        <i class="fa fa-diamond"></i>
                                    </div> -->
                                    <!-- Comments Textarea Field -->
                                    <div class="form-group">
                                        <textarea name="comment" class="form-input" placeholder="Your Comments Here..."></textarea>
                                        <i class="fa fa-pencil-square-o"></i>
                                    </div>
                                    <!-- Post Comment Button -->
                                        <input type="hidden" name="post_id" value="<?= $post_id ?>">

                                    <input type="submit" name="commentbtn" value="Post Your Comments" class="btn-main">
                                </div>
                            </div>
                            <!-- Right Side End -->
                        </form>
                        <!-- Form End -->
                    </div>


                    <!-- Post New Comment Section End -->    
                    
                 <?php
                 if(isset($_POST['commentbtn'])) {
                        $username = $_POST['cmt_name'];
                        $email = $_POST['email'];
                        $comment = $_POST['comment'];
                        $cmt_post_id =  $_POST['post_id'];
                            
                        // $cmt_post_id = $_POST['post_id'];
                        
                        $formerror = array();
                        if(strlen($username) < 3){
                            $formerror = 'Your name is too short';
                        }
                        if (strlen($comment) < 2) {
                            $formerror = 'please Write a Meaningful Word ';
                        }
                        if(!empty($formerror)){
                            $_SESSION['status'] = "$formerror";
                            $_SESSION['status_code']= "error";
                        }
                        else{
                            $sql = "INSERT INTO comment (cmt_name , comment ,cmt_post_id , email, status ,cmt_date) VALUES ('$username','$comment' ,' $cmt_post_id','$email',2 ,now())";
                            $addcomment = mysqli_query($db,$sql);
                            if($addcomment){
                                echo " Comment Added Successfully";
                            }
                            else{
                                die("Data not inserted" . mysqli_error($db));
                            }
                        }
                    } 
            
                    ?>
                    
               
               
                
                
                </div>     
           
                <!-- Blog Right Sidebar -->
               
                <!-- Sidebar End -->
            </div> 
            <?php include "sidebar.php" ; ?>
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