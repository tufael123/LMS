<?php 
session_start();
if(isset($_SESSION['email'])){
	$id = $_SESSION['id'];
	include('dbcon.php');
	$sql = "SELECT * FROM user WHERE id = $id";
	$exe = mysqli_query($con,$sql);
	$data = mysqli_fetch_assoc($exe);
	$sql2 = "SELECT * FROM issued_book
        LEFT JOIN book ON issued_book.book_id = book.book_id
        LEFT JOIN book_request ON issued_book.req_id = book_request.req_id
        LEFT JOIN user ON issued_book.user_id = user.id
        WHERE DATE_ADD(issued_book.datee, INTERVAL issued_book.days DAY) < CURDATE() AND return_status = 0 AND issued_book.user_id = $id";
    $exe2 = mysqli_query($con,$sql2);
	$rtn_qty = mysqli_num_rows($exe2);
}
else{
	header('location: ../login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>LMS E Libery</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar start -->
        <div class="container-fluid fixed-top">
            <div class="container topbar bg-primary d-none d-lg-block">
                <div class="d-flex justify-content-between">
                    <div class="top-info ps-2">
                        <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#" class="text-white">VVR6+29P, Sheikhghat - Kazirbazar Rd, Sylhet 3100</a></small>
                        
                    </div>
                    <div class="top-link pe-2">
                        <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                        <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
                    </div>
                </div>
            </div>
            <div class="container">
                <nav class="navbar navbar-light bg-white navbar-expand-xl">
                    <a href="index.php" class="navbar-brand"><h1 class="text-primary display-6">E Libery</h1></a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="index.php" class="nav-item nav-link active">Home</a>
                            <a href="all_book.php" class="nav-item nav-link">All Books</a>
                            <a href="returnbookpending.php" class="nav-item nav-link">Return Pending<sup style="font-size: 15px; font-weight: bolder;" class="text-danger"><?php echo $rtn_qty; ?></sup></a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Category</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                	<?php 
                                		$sql1="SELECT * FROM category";
                                		$run1 = mysqli_query($con,$sql1);
                                		while($data1=mysqli_fetch_assoc($run1)){ 
                                	?>
                                   <a href="category.php?id=<?php echo $data1['cat_id'] ?>" class="dropdown-item"><?php echo $data1['cat_name']; ?></a>


                                <?php } ?>
                                </div>
                            </div>
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="d-flex">
                            <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white mt-1" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search text-primary"></i></button>
                            
                            <a href="#" class="my-auto">
                                
                                 <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-user fa-2x"></i></a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="profile.php?id=<?php echo $data['id'] ?>" class="dropdown-item"><?php echo $data['s_name'];  ?></a>
                                    <a href="request_report.php" class="dropdown-item">Requested Book</a>
                                    <a href="logout.php" class="dropdown-item">Logout</a>
                                    
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
       

       