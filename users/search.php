<?php 
if(isset($_POST['submit'])){
    $search_item = $_POST['search']; 
    include('dbcon.php');
    $s = "SELECT * FROM book LEFT JOIN category ON book.cat_id = category.cat_id WHERE book.book_name LIKE '%$search_item%' OR book.author LIKE '%$search_item%' OR category.cat_name LIKE '%$search_item%'"; 
    $r = mysqli_query($con, $s);
    include('ini/header.php');
}
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
                <div class="col-lg-5 text-start">
                    <h1>Showing result of <span class="text-danger">"<?php echo $search_item ?>"</span></h1>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="row g-4">
                                <?php
                                if(isset($r)) { // Check if search results are available
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
                                <?php 
                                    }
                                } else {
                                   ?> <h2 class="text-center">No Data</h2>
                                <?php 
                                }
                                ?>                                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>      
    </div>
</div>
<?php include('ini/footer.php') ?>
