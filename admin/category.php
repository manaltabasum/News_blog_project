<html>
 

<?php include 'inc/header.php'; ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

  <!-- Navbar -->
  <?php include 'inc/topbar.php'; ?>
  <!-- /.navbar -->
   <?php // ob_start() ; ?>

  <!-- Main Sidebar Container -->

    <?php include 'inc/sidebar.php'; ?>


<div class="container-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
                </div>

                <div class="col-sm-6">
                    <div class="ol breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>

                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </div>
                </div>



            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

            <!-- Manage -->

                <?php
             $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
                if ($do == 'Manage'){

                
                ?>
                <div class="col-md-10 offset-md-2">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Manage All Categories</h3>
                        </div>
                        <div class="card-body " style="display:block;">
                            <table id="allstd" class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" >
                                            #SI
                                        </th>
                                        <th scope="col" >
                                            Category Name
                                        </th>
                                        <th scope="col" >
                                            Category Type
                                        </th>
                                        <th scope="col" >
                                            Status
                                        </th>
                                        <th scope="col" >
                                            Action
                                        </th>

                                    </tr>

                                </thead>
                               
                                <tbody>

                                <?php
                                $sql = "SELECT * FROM category_tbl ORDER BY cat_id";
                                $all_posts = mysqli_query($db,$sql);
                                $i = 0;
                                while($row = mysqli_fetch_assoc($all_posts)){

                                    $cat_id = $row['cat_id'];
                                    $cat_name = $row['cat_name'];
                                    $is_parent = $row['is_parent'];
                                    $status = $row['status'];

                                    $i++;

                                ?>
                                <tr>
                                    <th scope = "row">
                                        <?php echo "$i";
                                        ?>
                                    </th>
                                    <th scope = "row">
                                        <?php echo "$cat_name";
                                        ?>
                                    </th>
                                    <th scope = "row">
                                        <?php if($is_parent == 0){ ?>
                                            <div class="badge badge-primary">Primary Category

                                            </div>
                                            <?php
                                            }else {
                                                $query = "SELECT * FROM category_tbl where cat_id = '$is_parent'";
                                                $showparent = mysqli_query($db,$query);
                                                while($row = mysqli_fetch_assoc($showparent)){
                                                    $cat_id = $row['cat_id'];
                                                    $cat_name = $row['cat_name'];
                                                }
                                             
                                            ?>
                                            <div class="badge badge-success">
                                            <?php echo "$cat_name";
                                            
                                         ?>
                                            </div>
                                            <?php }
                                            ?>
                                        
                                    </th>
                                    <th >
                                        <?php if($status == 1){
                                            ?>
                                            <span class="badge badge-success">Published</span>
                                            <?php
                                        } else{
                                            ?>
                                            <span class="badge badge-danger"
                                            >Draft</span>
                                            <?php
                                            
                                        }
                                        ?>
                                        
                                    </th>
                                    <td>
                                        <a class="btn btn-info btn-sm" href="category.php?do=Edit&edit=<?php echo $cat_id ;?>">
                                            <i class="fas fa-pencil-alt"></i>
                                            Edit
                                        </a>
                                         <a class="btn btn-info btn-sm" href="#" data-toggle = "modal" data-target= "#delete<?php echo $cat_id ; ?>">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </a>

                                    </td>
                                </tr>

                                <div class="modal fade" id="delete<?php echo $cat_id; ?>" tabindex = "-1" role="dialog"
                                aria-labelleby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete this information?

                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal">
                                                <span aria-hidden="true">
                                                    &times;
                                                </span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <ul>
                                                <li><a href="category.php?do=Delete&delete=<?php echo $cat_id; ?>"
                                                class="btn btn-danger ">Delete</a></li>


                                                <li><button type="button" class="btn btn-primary" data-dismiss="modal">Cancel

                                                </button></li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>

                                </div>
                                    

                                <?php }
                                ?>

                                </tbody>
                                   
                            </table>
                            <?php  ?>
                        <!-- </div>
                    </div>
                </div> -->


                <!-- Add -->


                <?php } 
         if ($do == 'add'){
                ?>
                <div class="container">
                    <div class="row">
                     <div class="col-md-10 offset-md-2">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Add new Category
                            </h3>
                        </div>
                        <div class="card-body" style="display: block;">
                            <div class="row">
                                <div class="col-lg-6 offset-md-3">
                                    <form action="category.php?do=Insert" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for=""> Category Name</label>
                                            <input type="text" name="cat_name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="" > Category Type</label>
                                            <select name="is_parent" class="form-control" id="">
                                                <option value=""> Please Select one option</option>
                                                <button></button>
                                                <?php

                                                $query = "SELECT * FROM category_tbl where is_parent = '0' ";
                                                $showparent = mysqli_query($db, $query);
                                                while($row = mysqli_fetch_assoc($showparent)){
                                                    $cat_id = $row['cat_id'];
                                                    $cat_name = $row['cat_name'];
                                                ?>
                                                <option value="<?php echo $cat_id ; ?>"> <?php echo $cat_name ; ?>
                                                </option>
                                               <?php } ?>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <label for="">Author Status</label>
                                            <select name="status" class="form-control" id="">
                                                <option value="">Please Select User Account Status</option>
                                                <option value="0">
                                                    Draft
                                                </option>
                                                <option value="1">
                                                    Published
                                                </option>
                                            </select>
                                        </div>


                                        <div class="form-group">
                                            <input type="submit" name="addpost" class="btn btn-block btn-primary " value = "Publish Post">
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
                    </div>
                </div>
               


<?php } 

            // Insert

    elseif( $do == 'Insert'){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $cat_name = $_POST['cat_name'];
            $is_parent = $_POST['is_parent'];
            $status = $_POST['status'];

            $sql = "INSERT INTO category_tbl ( `cat_name`,`is_parent`,`status`) VALUES ('$cat_name','$is_parent','$status') ";

            $addUser = mysqli_query($db,$sql);
            
            if($addUser){
                 header ("location: category.php?do=Manage") ;
                
                // exit();

            }
            else{
                die("MySqli query failed" . mysqli_error($db)); 
            }

        }
    }

?>
       <?php
        if( $do == 'Edit') {

  
           if (isset($_GET['edit'])){
                $editid = $_GET['edit'] ;
                $sql = "SELECT * FROM category_tbl WHERE cat_id = '$editid' ";
                $allstd = mysqli_query($db,$sql);


                while( $row = mysqli_fetch_assoc($allstd)) {

                    $cat_id = $row['cat_id'];
                    $cat_name = $row['cat_name'];
                    $is_parent = $row['is_parent'];
                    $status = $row['status'];
              
                
                ?>

          
                <div class="col-lg-10 offset-lg-2">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">
                                    <h3>
                                     Update Category Information    
                                    </h3>
                                   
                                </div>
                </div>
                                
                     <div class="card-body" style="display:block;">
                         <form action="category.php?do=update" method= "POST" enctype="multipart/form-data">
                             <div class="row">
                                            
                                 <div class="col-md-6 offset-md-3">

                                         <div class="form-group">
                                                <label for="">Category Name</label>
                                                    <input name="cat_name" type="text"  class="form-control" id="" value="<?php echo $cat_name ?>" require = "required">

                                             <div class="form-group mt-3">
                                                    <label for="" class="">Category type</label>

                                                       
                                                <select name="is_parent" class="form-control" id="">
                                                        
                                                    <option value="">
                                                            Please Select User Status
                                                        </option>

                                                        <?php
                                                        $query = "SELECT * FROM category_tbl where is_parent = '0'";
                                                        $showparent = mysqli_query($db,$query);
                                                        while($row = mysqli_fetch_assoc($showparent)){

                                                            $cat_id = $row['cat_id'];
                                                            $cat_name = $row['cat_name'];
                                                        
                                                            ?>
                                                         <option value="<?php echo $cat_id; ?>" <?php if($is_parent == $cat_id) echo 'selected'; ?>>
                                                            <?php echo $cat_name; ?>
                                                        </option>
                                                        <?php

                                                        }
                                                        ?>

                                                </select>
                                                    
                                                </div>
                                                
                                        </div>

                                    </div>
                                            <div class="col-md-6 offset-md-3">
                                                  <div class="form-group">
                                            <label for="">Author Status</label>
                                            <select name="status" class="form-control" id="">


                                                <option value="">Please Select User Account Status</option>

                                                  <option value="0">
                                                    <?php if($status == 0 )
                                                    echo 'selected';
                                                    ?>
                                                    Draft
                                                </option>

                                                  <option value="1">
                                                    <?php if($status == 1 )
                                                        echo 'selected';
                                                    
                                                    ?>
                                                    Published
                                                </option>

                                            </select>

                                        </div>
                                            </div>


                                            <div class="col-md-6 offset-md-3">

                                            <div class="form-group">
                                            <input type="hidden" name="updatePostid" value=" <?php echo $cat_id ; ?>">
                                            <input type="submit" name="updatepost" class="btn btn-block btn-primary btn-flat" value= "Save Changes"> 
                                        </div>
                                            </div>
                                        </div>
                                        

                                          
                                        

                                      

                                        
                                           
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
    

                    

                <?php
                }
        }

            else {
                die("Operation falied . " . mysqli_error($db));
                }
            }
  ?>


    <?php
    
      
        if( $do == 'update'){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $updatePostid = $_POST['updatePostid'];
                $cat_name = $_POST['cat_name'];
                $status = $_POST['status'];
                $sql = "UPDATE category_tbl SET cat_name = '$cat_name', status = '$status' WHERE cat_id = '$updatePostid'";
                
                $updateUser = mysqli_query($db,$sql);
                if($updateUser){
                    header("Location: category.php?do=Manage");
                }
                else{
                    die("MySqli Query Failed" . mysqli_error($db));
                }
            }
        } 
    
    ?>        


            </div>
        </div>

 


    </section>
 </div>


    <?php  ob_end_flush(); ?>
<?php include "inc/footer.php"; ?>