
<?php include "inc/header.php" ; ?>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="weapper">
        <?php include "inc/topbar.php" ; ?>
        <?php include "inc/sidebar.php" ; ?>
        
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">

                </div>
            </div>

            <div class="content">
                <div class="container-fluid">
                    <div class="container">
                        <div class="row">

                                            <!-- Manage -->

                            <?php
                            $do = isset($_GET['do']) ? $_GET['do'] : 'Manage' ;
                            if ($do == 'Manage'){

                            
                            ?>

                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            Manage All Posts
                                        </h3>
                                    </div>
                                    <div class="card-body" style="display: block ;">
                                    <table id="allstd" class="table">
                                        <thead class="thead-dark">
                                            <th scope="col">#SI</th>
                                            <th scope="col">Image</th>
                                              <th scope="col">Title</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Status</th>
                                              <th scope="col">Post Date</th>
                                            <th scope="col">Action</th>

                                        </thead>
                                        <tbody>
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
                                            <tr>
                                                <th scope="row">
                                                    <?php echo "$i";
                                                    ?>
                                                </th>
                                                <td>
                                                    <img src="image/post/<?php echo $image ?>" class="img-table" alt="">
                                                </td>

                                                <td><?php echo $title ; ?></td>

                                                <td><?php
                                                if ($category_id == 0){
                                                    echo "NO category";
                                                } 
                                                else{
                                                    $sql = "SELECT * FROM category_tbl WHERE cat_id = '$category_id'";
                                                    $all_product = mysqli_query($db,$sql);
                                                    while($row = mysqli_fetch_assoc($all_product)){
                                                        $product_id = $row['cat_id'];
                                                        $category_name = $row['cat_name'];

                                                        echo $category_name ;
                                                    }
                                                }
                                                 ?></td>

                                                <!-- <td>
                                                    <?php
                                                // $sql = "SELECT * FROM post WHERE "
                                                // echo $author_id ?>
                                                </td> -->

                                               
                                                
                                                <td>
                                                    <?php 
                                                    if ($status == 1){?>
                                                        <span class="badge badge-success"> Published</span>

                                                    <?php
                                                    }
                                                    else{
                                                        ?>
                                                        <span class="badge badge-danger">Draft</span>
                                                        <?php

                                                    }
                                                    ?>
                                                </td>

                                                 <td><?php echo $post_date ?></td>

                                                <td>
                                                    <a href="post.php?do=Edit&edit =<?php echo $post_id ?>" class= "btn btn-info btn-md mb-2"><i class="fas fa-pencil-alt"></i>Edit</a>


                                                    <a href="#" class= "btn btn-danger btn-sm p-2" data-toggle = "modal" data-target="#delete<?php echo $post_id ; ?>"><i class="fas fa-trash"></i>Delete</a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>   
                                    

                                    </div>
                                </div>
                            </div>



                   <?php
                      }


                                             //   start add new post

             else if($do == "Add"){

                 ?>
                 <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                             <h3 class= "card-title">
                                            Add new Post
                                </h3>
                   </div>
            <div class="container-fluid">
             <div class="row">
                <div class="col-md-6 p-3">
                <form action="post.php?do=Insert" method="POST" enctype="multipart/form-data"> 
                    <div class="form-group">
                        <label for="">
                             Title
                     </label>
                     <input type="text " name="title" class="form-control" require="required">
                    </div>

                      
                        <div class="form-group">
                            <label for="">Category</label>
                            <select name="category_id" class="form-control" id="">
                                <option value="">Please select one option</option>
                                    <?php
                                    $sql = "SELECT * FROM category_tbl" ;
                                    $all_product = mysqli_query($db,$sql);
                                    while($row = mysqli_fetch_assoc($all_product)){
                                        $product_id = $row['cat_id'];
                                        $category_name = $row['cat_name'];
                                    
                                    ?>
                                <option value="<?php echo $product_id ?>"> <?php echo $category_name ?></option>
                                        <?php } ?>
                            </select>
                        </div>
                      

                        <div class="form-group">
                            <label for="">Author Status</label>
                            <select name="status" class="form-control" id="">
                                <option value=""> Please Select User Account Status</option>
                                <option value="0"> Draft</option>
                                <option value="1">Published</option>

                            </select>
                                    </div>
                        <div class="form-group">
                            <label for="">Meta tags</label>
                            <input type="text " name ="tags" class="form-control" required = "required">
                        </div>

                        <div class="form-group">
                            <label for="" > Upload Image</label>
                            <input type="file" name="image" class="form-control-file">
                        </div>  
                 </div>

                    
                     <div class="col-md-6 p-3">
                        <div class="form-group">
                            <label for=""> Description</label>
                            <textarea name="description" rows = "15" class="form-control" id=""></textarea>
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" name = "addpost" class= "btn btn-block btn-primary btn-flat" value="Publish Post">
                        </div>
                     </div>

                        </form>
                         </div>
                        </div>
                       </div>
                 </div>
             </div>
<?php }


                                        // data insert
    
    elseif ($do == 'Insert') {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $title = $_POST['title'];
            $category_id = $_POST['category_id'];
            $status = $_POST['status'];
            $meta = $_POST['tags'];
            $description = $_POST['description'];

            $imagename = $_FILES['image']['name'];
            $imagesize = $_FILES['image']['size'];
            $imageTmp = $_FILES['image']['tmp_name'];

            $explode = explode('.', $_FILES['image']['name']);
            $last_element = end($explode);
            $imageExtention = strtolower($last_element);
            $imageAllowerExtention = array("jpg" , "jpeg" , "png");
            
            $formerrors = array();
            if(strlen($title) < 3){
                $formerrors = 'Username is too short';

            }
            if (!empty($imagename)){
                if (!empty($imagename) && !in_array($imageExtention, $imageAllowerExtention)){
                    $formerrors = 'invalid Image Format';

                }
                if(!empty($imagesize) && $imagesize>1097152){
                    $formerrors = 'Invalid id Too large ! Allowed image size is 2MB';
                }
                if(!empty($formerrors)){
                    header("Location: post.php?do=Add") ;
                    exit();
                }
                if(empty($formerrors)){
                    $image = rand(0,9999999).'_'.$imagename;
                    move_uploaded_file($imageTmp, "image/post/" . $image);

                    $sql = "INSERT INTO post ( `title` , `description`, `image`, `category_id`, `status`, `tags`, `post_date` ) VALUES ('$title' ,'$description','$image','$category_id','$status','$meta', now() )";
                   
                    $addUser = mysqli_query($db, $sql) ; 
                    if ($addUser){
                        header("Location:post.php?do=Manage");
                        exit();
                    }
                    else{
                        die("Mysqli Query Failed ." . mysqli_error($db));
                    }

                }
                
            }
        }
    }
    ?>

       </div>
           </div>
        </div>
      </div>



          

        </div>
    </div>

    
    <?php include "inc/footer.php"; ?>
</body>
