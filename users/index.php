<?php
include('ini/header.php');
$s = "SELECT * FROM book LEFT JOIN category ON book.cat_id = category.cat_id";
$r = mysqli_query($con, $s); // Use $s instead of $sql
?>
<br>
<br>
<br>
<br>
<br>
<br>

<div class="container-fluid py-5 mb-5 hero-header">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-md-12 col-lg-7">
                <h4 class="mb-3 text-secondary">Online Library</h4>
                <h1 class="mb-5 display-3 text-primary">Library Management System</h1>
                <form class="position-relative mx-auto" action="search.php" method="post">
                    <input class="form-control border-2 border-secondary w-75 py-3 px-4 rounded-pill" type="text" name="search" placeholder="Search">
                    <button type="submit" name="submit" class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100" style="top: 0; right: 25%;">Search</button>
                </form>
            </div>
            <div class="col-md-12 col-lg-5">
                <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active rounded">
                            <img src="slider/1.jpg" class="img-fluid w-100 h-100 bg-secondary rounded" alt="First slide">
                            <a href="#" class="btn px-4 py-2 text-white rounded">Online Library</a>
                        </div>
                        <div class="carousel-item rounded">
                            <img src="slider/2.jpg" class="" alt="Second slide" height="475">
                            <a href="#" class="btn px-4 py-2 text-white rounded">E Library</a>
                        </div>
                        <div class="carousel-item rounded">
                            <img src="slider/3.jpg" class="" alt="Second slide" height="475" width="700">
                            <a href="#" class="btn px-4 py-2 text-white rounded">E Library</a>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid featurs py-5">
            <div class="container py-5">
                <div class="row g-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fas fa-users fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>Easy Use</h5>
                                <p class="mb-0">User Friendly E-libery</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fas fa-user-shield fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>100% Dependable</h5>
                                <p class="mb-0">We Care You</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fas fa-exchange-alt fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>Easy Return Proccess</h5>
                                <p class="mb-0">Return prossecc easy</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="featurs-item text-center rounded bg-light p-4">
                            <div class="featurs-icon btn-square rounded-circle bg-secondary mb-5 mx-auto">
                                <i class="fa fa-phone-alt fa-3x text-white"></i>
                            </div>
                            <div class="featurs-content text-center">
                                <h5>24/7 Support</h5>
                                <p class="mb-0">Support every time fast</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<div class="container-fluid vesitable py-5">
    <div class="container py-5">
        <h1 class="mb-0">Books</h1>
        <div class="owl-carousel vegetable-carousel justify-content-center">
            <?php
            while ($book = mysqli_fetch_assoc($r)) {
            ?>
                <div class="border border-primary rounded position-relative vesitable-item">
                    <div class="vesitable-img">
                        <img src="../admins/img/books/<?php echo $book['photo'] ?>" class="rounded-top" alt="" height="250" width="100">
                    </div>
                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Book</div>
                    <div class="p-4 rounded-bottom">
                        <h4><?php echo $book['book_name']; ?></h4>
                        <p><?php echo $book['description'] ?></p>
                        <div class="d-flex justify-content-between flex-lg-wrap">
                            <p class="text-dark fs-5 fw-bold mb-0">Available:  <?php echo $book['qty'] ?> </p>
                            <a href="sbookview.php?id=<?php echo $book['book_id']?>" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-eye me-2 text-primary"></i> View</a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<?php include('ini/footer.php'); ?>
