<?php session_start();
if(isset($_SESSION['admin_email'])){
    $idd = $_SESSION['id'];
    include('dbcon.php');
    $sql = "SELECT * FROM admin WHERE id = $idd";
    $exe = mysqli_query($con,$sql);
    $data = mysqli_fetch_assoc($exe);
    $sql2 = "SELECT * FROM user WHERE status = 0";
    $sql3 = "SELECT * FROM issued_book WHERE DATE_ADD(issued_book.datee, INTERVAL issued_book.days DAY) < CURDATE() AND return_status = 0";
    $exe3 = mysqli_query($con,$sql3);
    $retbokqty = mysqli_num_rows($exe3);
    $sql1 = "SELECT * FROM book_request WHERE req_status = 0";
    $exe1 = mysqli_query($con,$sql1);
    $reqbokqty = mysqli_num_rows($exe1);


}
else{
    header('location: ../login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LMS</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="js/sweetalert.min.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                
                <div class="sidebar-brand-text mx-3">Libery Management</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Admin Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="add_book.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Add Books</span>
                </a>
                
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="view_book.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>View Books</span>
                </a>
                
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="add_category.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Add Books Category</span>
                </a>
                
            </li>

           <li class="nav-item">
                <a class="nav-link collapsed" href="add_user.php">
                    <i class="fas fa-fw fa-cog"></i>

                    <span>Add user</span>
                </a>
                
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="all_category.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Book Category List</span>
                </a>
                
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="all_user.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>User List</span>
                </a>
                
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="bookrequestlist.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Book Requests List</span>
                    <span class="badge badge-danger"><?php echo $reqbokqty; ?></span>
                </a>
                
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="bookreturnpending.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Book Return Pending</span>
                    <span class="badge badge-danger"><?php echo $retbokqty; ?></span>

                </a>
                
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="allissuedbook.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>All Issued Book</span>
                </a>
                
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="bookrequestreport.php">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Book Request Report</span>
                </a>
                
            </li>

         

            <!-- Nav Item - Utilities Collapse Menu -->
        

            <!-- Nav Item - Tables -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $data['name'] ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Hello <?php echo $data['name']; ?></h1>
                        
                    </div>