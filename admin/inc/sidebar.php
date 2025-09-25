 <?php include 'inc/header.php' ; ?>
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="image/user/<?php echo $_SESSION['image'] ?>" style="height=50%" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['user_name'];?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Category
                <i class="fas fa-angle-left right"></i>
               
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="category.php?do=Manage" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage All Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="category.php?do=add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add new Category</p>
                </a>
              </li>
  
            </ul>
          </li>

          <li class="nav-item">
                <a href="index.php" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Post
                    <i class="fas fa-angle-left right"></i>
                  
                  </p>
                </a>
              <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="post.php?do=Manage" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Manage All Posts</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="post.php?do=Add" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add new Post</p>
                      </a>
                    </li>
        
              </ul>
            </li>

             <li class="nav-item">
                <a href="index.php" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Comments
                    <i class="fas fa-angle-left right"></i>
                  
                  </p>
                </a>
              <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="comment.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Manage All Comments</p>
                      </a>
                    </li>
                    
        
              </ul>
            </li>


             <li class="nav-item">
                <a href="index.php" class="nav-link">
                  <i class="nav-icon fas fa-copy"></i>
                  <p>
                    Users
                    <i class="fas fa-angle-left right"></i>
                  
                  </p>
                </a>
              <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="users.php" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Manage All Users</p>
                      </a>
                    </li>
                    
        
              </ul>
            </li>


        <li class="nav-item">
          <a href="logout.php" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Logout
            </p>
          </a>
        </li>


      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>