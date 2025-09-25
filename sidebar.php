   <?php 
include "inc/header.php" ;
include  "admin/inc/db.php";
?>
 <body>
                 

                   <div class="col-md-4">

                    <!-- Latest News -->
                     <div class="widget">
                        <h4>Latest News</h4>
                        <div class="title-border"></div>
                        
                        <!-- Sidebar Latest News Slider Start -->
                        <div class="sidebar-latest-news owl-carousel owl-theme">
                            <!-- First Latest News Start -->


                             <?php
                             $sql = "SELECT * FROM post ORDER BY post_id DESC";
                             $all_post = mysqli_query($db,$sql);
                             $i = 0 ;
                             while($row = mysqli_fetch_assoc($all_post)){
                             $post_id = $row['post_id'];
                             $title = $row['title'];
                             $description = $row['description'];
                             $image = $row['image'];
                            $category_id = $row['category_id'];
                             $author_id = $row['author_id'];
                             $status = $row['status'];
                             $meta = $row['tags'];
                             $post_date = $row['post_date'];
                             $i++;

                                            
                     ?>


                            <div class="item">
                                <div class="latest-news">
                                    <!-- Latest News Slider Image -->
                                    <div class="latest-news-image">
                                        <a href="#">
                                            <img src="admin/image/post/<?php echo $image ?>">
                                        </a>
                                    </div>
                                    <!-- Latest News Slider Heading -->
                                    <h5> <?php echo $title ?></h5>
                                    <!-- Latest News Slider Paragraph -->
                                    <p> <?php echo substr($description , 0, 350) . "..."; ?></p>
                                </div>
                            </div>
                            <!-- First Latest News End -->
                            
                            <?php } ?>

                        </div>
                        <!-- Sidebar Latest News Slider End -->
                    </div>

                    <!-- Search Bar Start -->
                    <div class="widget"> 
                            <!-- Search Bar -->
                            <h4>Blog Search</h4>
                            <div class="title-border"></div>
                            <div class="search-bar">
                                <!-- Search Form Start -->
                                <form method="POST" action= "search.php">
                                    <div class="form-group">
                                        <input type="text" name="search" placeholder="Search Here" autocomplete="off" class="form-input">
                                        
                                         <input type="submit" name="searchbtn" class="btn-main" value="Search">
                                       
                                    </div>
                                </form>
                                <!-- Search Form End -->
                            </div>
                    </div>
                    <!-- Search Bar End -->

                    <!-- Recent Post -->
                    <div class="widget">
                        <h4>Recent Posts</h4>
                        
                        <div class="recent-post ">
                            <!-- Recent Post Item Content Start -->
                            <div class="recent-post-item ">
                                <div class="row ">

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

                                    <!-- Item Image -->
                                    <div class="col-md-4 pt-3">
                                        <img src="admin/image/post/<?php echo $image ; ?>">
                                    </div>
                                    <!-- Item Tite -->
                                    <div class="col-md-8 pt-3">
                                        <h5><?php echo $title ; ?></h5>
                                        <ul>
                                            <li><i class="fa fa-clock-o"></i><?php echo $post_date ; ?></li>
                                            <li><i class="fa fa-comment-o"></i>15</li>
                                        </ul>
                                                                    

                                    </div>
                                    <?php }   ?>
                                </div>
                                
                            </div>

                        </div>
                    </div>

                    <!-- All Category -->
                    <div class="widget">
                        <h4>Blog Categories</h4>
                        <div class="title-border"></div>
                        <!-- Blog Category Start -->
                        <div class="blog-categories">
                            <ul>
                                <!-- Category Item -->
                                <li>
                                    <i class="fa fa-check"></i>
                                    Information Technology 
                                    <span>[22]</span>
                                </li>
                                <!-- Category Item -->
                                <li>
                                    <i class="fa fa-check"></i>
                                    Corporate News 
                                    <span>[20]</span>
                                </li>
                                <!-- Category Item -->
                                <li>
                                    <i class="fa fa-check"></i>
                                    Web Design and Development 
                                    <span>[35]</span>
                                </li>
                                <!-- Category Item -->
                                <li>
                                    <i class="fa fa-check"></i>
                                    Social Media Marketing 
                                    <span>[29]</span>
                                </li>
                                <!-- Category Item -->
                                <li>
                                    <i class="fa fa-check"></i>
                                    Search Engine Optimization 
                                    <span>[27]</span>
                                </li>
                            </ul>
                        </div>
                        <!-- Blog Category End -->
                    </div>

                    <!-- Recent Comments -->
                    <div class="widget">
                        <h4>Recent Comments</h4>
                        <div class="title-border"></div>
                        <div class="recent-comments">
                            
                            <!-- Recent Comments Item Start -->
                            <div class="recent-comments-item">
                                <div class="row">
                                    <!-- Comments Thumbnails -->
                                    <div class="col-md-4">
                                        <i class="fa fa-comments-o"></i>
                                    </div>
                                    <!-- Comments Content -->
                                    <div class="col-md-8 no-padding">
                                        <h5>admin on blog posts</h5>
                                        <!-- Comments Date -->
                                        <ul>
                                            <li>
                                                <i class="fa fa-clock-o"></i>Dec 15, 2018
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Recent Comments Item End -->

                            <!-- Recent Comments Item Start -->
                            <div class="recent-comments-item">
                                <div class="row">
                                    <!-- Comments Thumbnails -->
                                    <div class="col-md-4">
                                        <i class="fa fa-comments-o"></i>
                                    </div>
                                    <!-- Comments Content -->
                                    <div class="col-md-8 no-padding">
                                        <h5>admin on blog posts</h5>
                                        <!-- Comments Date -->
                                        <ul>
                                            <li>
                                                <i class="fa fa-clock-o"></i>Dec 15, 2018
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Recent Comments Item End -->

                            <!-- Recent Comments Item Start -->
                            <div class="recent-comments-item">
                                <div class="row">
                                    <!-- Comments Thumbnails -->
                                    <div class="col-md-4">
                                        <i class="fa fa-comments-o"></i>
                                    </div>
                                    <!-- Comments Content -->
                                    <div class="col-md-8 no-padding">
                                        <h5>admin on blog posts</h5>
                                        <!-- Comments Date -->
                                        <ul>
                                            <li>
                                                <i class="fa fa-clock-o"></i>Dec 15, 2018
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- Recent Comments Item End -->

                        </div>
                    </div>

                    <!-- Meta Tag -->
                    <div class="widget">
                        <h4>Tags</h4>


                        <div class="title-border"></div>
                        <!-- Meta Tag List Start -->
                        <div class="meta-tags">
                             <?php
                                 $sql = "SELECT * FROM post ORDER BY post_id DESC";
                             $all_post = mysqli_query($db,$sql);
                             $i = 0 ;
                             while($row = mysqli_fetch_assoc($all_post)){
                             $meta = $row['tags'];
                           
                             $i++;
                        ?>
                            <span name ="seartag"><a  style="color: white;" href="search.php?searchtag=<?php echo $meta ; ?>" ><?php echo $meta ?></a></span>
                                    <?php } ?> 
                        </div>
                        
                        <!-- Meta Tag List End -->
                    </div>

                </div>


 