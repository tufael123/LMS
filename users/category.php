<?php
$idd = $_GET['id'];
include('ini/header.php');
$s = "SELECT * FROM book LEFT JOIN category ON book.cat_id = category.cat_id WHERE book.cat_id = $idd"; 
$r = mysqli_query($con, $s);
$sql = "SELECT cat_name FROM category WHERE cat_id = $idd";
$run = mysqli_query($con,$sql);
$category_data = mysqli_fetch_assoc($run);
$category_name = $category_data['cat_name'];
?>
<br>
<br>
<br><br>
<br>
<br><br>
        <div class="container-fluid fruite py-5">
            <div class="container py-5">
                <div class="tab-class text-center">
                    <div class="row g-4">
                        <div class="col-lg-8 text-start mb-2">
                            <h1>Showing <span class="text-info">"<?php echo $category_name; ?>"</span> Category Book: </h1>
                        </div>
                        
                    </div>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                            	
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                    	<?php
						            		while ($book = mysqli_fetch_assoc($r)) {
						         		?>
                                        <div class="col-md-6 col-lg-4 col-xl-3">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="../admins/img/books/<?php echo $book['photo'] ?>" class="w-100 rounded-top" style="height: 250px;" alt="">
                                                </div>
                                                <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Books</div>
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4><?php echo $book['book_name'] ?></h4>
                                                    <p><?php echo $book['description'] ?></p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">Available: <span class="text-info"><?php echo $book['qty']; ?></span></p>
                                                        <a href="sbookview.php?id=<?php echo $book['book_id']?>" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> View</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>      
            </div>
        </div>
<?php include('ini/footer.php') ?>