<html>
<?php include 'inc/header.php'; ?>

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
                if($_SESSION['role'] == 1){

             $do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
                if ($do == 'Manage') {

                
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
                                            SI
                                        </th>
                                        <th scope="col" >
                                            Image
                                        </th>
                                        <th scope="col" >
                                             User Name 
                                        </th>
                                        <th scope="col" >
                                            Email
                                        </th>

                                        <th scope="col" >
                                            Status
                                        </th>
                                            <th scope="col" >
                                            Role
                                        </th>
                                          <th scope="col" >
                                            Action
                                        </th>

                                    </tr>

                                </thead>
                               
                                <tbody>

                                <?php
                                $sql = "SELECT * FROM users  ORDER BY  user_id DESC";
                                $all_user = mysqli_query($db,$sql);
                                $i = 0;
                                while($row = mysqli_fetch_assoc($all_user)){

                                    $user_id = $row['user_id'];
                                    $user_name = $row['user_name'];
                                    $email = $row['email'];
                                    $status	 = $row['status'];
                                    $role	 = $row['role'];
                                   
                                    $i++;

                                ?>
                                <tr>
                                    <th scope = "row">
                                        <?php echo "$i";
                                        ?>
                                    </th>
                                    <th>
                                      <img src="admin/image/user<?php echo $image; ?> " alt="">   
                                    </th>
                                   
                                    <th scope = "row">
                                        <?php echo "$user_name";
                                        ?>
                                    </th>
                                    <th scope = "row">
                                        <?php echo "$email";
                                        ?>
                                    </th>
                                    
                                    <th scope = "row">
                                        <?php if($status == 2){ ?>
                                            <div class="badge badge-primary">Inactive

                                            </div>
                                            <?php
                                            }
                                             elseif ($status == 1) {
                                               ?>
                                            <div class="badge badge-primary">Active

                                            </div>
                                            <?php
                                             }
                                             elseif ($status == 0 ) {
                                                  ?>
                                            <div class="badge badge-primary">Suspanded

                                            </div>
                                            <?php
                                            }
                                            
                                         ?>
                                        

                                            </div>
                                           
                                        
                                    </th>
                                    <th scope = "row">
                                        <?php
                                         if($role == 1){
                                            echo "Admin";
                                        }
                                       if($role == 2) {
                                            echo "Reporter";
                                        } 
                                        ?>
                                    </th>
                                  
                                    <td>
                                        <a class="btn btn-info btn-sm" href="users.php?do=Edit&edit=<?php echo $user_id ;?>">
                                            <i class="fas fa-pencil-alt"></i>
                                            Edit
                                        </a>
                                         <a class="btn btn-info btn-sm" href="#" data-toggle = "modal" data-target= "#delete<?php echo $user_id ; ?>">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </a>

                                    </td>
                                </tr>

                                <div class="modal fade" id="delete<?php echo $user_id; ?>" tabindex = "-1" role="dialog"
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
                                                <li><a href="users.php?do=Delete&delete=<?php echo $user_id; ?>"
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
                             <?php }
                                            ?>
                        </div>
                    </div>
                </div>


                <!-- Add -->


                <?php }  ?>
      
       <?php
        if( $do == 'Edit') {

  
           if (isset($_GET['edit'])){
                $editid = $_GET['edit'] ;
                $sql = "SELECT * FROM users WHERE user_id = '$editid' ";
                $allstd = mysqli_query($db,$sql);


                while( $row = mysqli_fetch_assoc($allstd)) {

                   $user_id = $row['user_id'];
                   $user_name = $row['user_name'];
                   $email = $row['email'];
                   $status	 = $row['status'];
                   $role	 = $row['role'];
              
                
                ?>

          
                 <div class="col-lg-10 offset-lg-2">
                         <div class="card">
                             <div class="card-header">
                                 <div class="card-title">
                                     <h3>
                                      Update User Information    
                                     </h3>
                                   
                                 </div>
                 </div>
                                
                      <div class="card-body" style="display:block;">
                          <form action="users.php?do=update" method= "POST" enctype="multipart/form-data">
                              <div class="row">
                                            
                                  <div class="col-md-6 offset-md-3">

                                          <div class="form-group">
                                                 <label for="">User Name</label>
                                                     <input name="user_name" type="text"  class="form-control" id="" value="<?php echo $user_name ; ?>" require = "required">
                                                       <div class="form-group">
                                                 <label for="">Email</label>
                                                     <input name="email" type="text"  class="form-control" id="" value="<?php echo $email ; ?>" require = "required">

                                              <div class="form-group mt-3">
                                                     <label for="" class="">Role</label>

                                                       
                                                 <select name="role" class="form-control" id="">
                                                        
                                                     <option value="">
                                                             Please Select Users role
                                                         </option>

                                                        
                                                             <option 
                                                         value="1"> 1
                                                        
                                                     </option>   
                                                       <option 
                                                         value="2"> 2
                                                        
                                                     </option> 
                                                         

                                                 </select>
                                                    
                                                 </div>
                                                
                                         </div>

                                     </div>
                                             <div class="col-md-6 offset-md-3">
                                                   <div class="form-group">
                                             <label for="">Status</label>
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
                                             <input type="hidden" name="updatePostid" value=" <?php echo $user_id ; ?>">
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
             $user_id   = $_POST['updatePostid'];
            $user_name = $_POST['user_name'];
            $email     = $_POST['email'];
            $status    = $_POST['status'];
            $role      = $_POST['role'];
                $sql = "UPDATE users SET user_name = '$user_name', email = '$email', role = '$role', status = '$status' WHERE user_id = '$user_id'";
                
                $updateUser = mysqli_query($db,$sql);
                if($updateUser){
                    header("Location: users.php?do=Manage");
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