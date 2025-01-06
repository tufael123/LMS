<?php
include('ini/header.php');
include('dbcon.php');
$sql = "SELECT * FROM book LEFT JOIN category ON book.cat_id = category.cat_id";
$run = mysqli_query($con, $sql);
?>
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Books</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <td>Book Name</td>
                            <td>Book Author</td>
                            <td>Book Quantity</td>
                            <td>Book Category</td>
                            <td>Book Image</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td>Book Name</td>
                            <td>Book Author</td>
                            <td>Book Quantity</td>
                            <td>Book Category</td>
                            <td>Book Image</td>
                            <td>Action</td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php while ($data = mysqli_fetch_assoc($run)) { ?>
                            <tr>
                                <td><?php echo $data['book_name'] ?></td>
                                <td><?php echo $data['author'] ?></td>
                                <td><?php echo $data['qty'] ?></td>
                                <?php if(is_null($data['cat_id'])) { ?>
                                    <td style="color: red; font-weight: bolder;">Category Deleted</td>
                                <?php } else { ?>
                                    <td><?php echo $data['cat_name'] ?></td> 
                                <?php } ?>
                                <td><img src="img/books/<?php echo $data['photo'] ?>" height="100" width="80"></td> 
                                <td>
                                    <a href="sviewbook.php?id=<?php echo $data['book_id']?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                    <a href="update_book.php?id=<?php echo $data['book_id']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    <a href="delete_book.php?id=<?php echo $data['book_id']?>" class="btn btn-danger btn-sm"><i class="fa fa-close"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('ini/footer.php'); ?>
