<?php 
include('ini/header.php');
include('dbcon.php');
$sql = "SELECT * FROM issued_book
        LEFT JOIN book ON issued_book.book_id = book.book_id
        LEFT JOIN book_request ON issued_book.req_id = book_request.req_id
        LEFT JOIN user ON issued_book.user_id = user.id";

$run = mysqli_query($con,$sql);	
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
                            <td>Book Category</td>
                            <td>Granted Quantity</td>
                            <td>Available Quantity Now</td>
                            <td>For How Many Days</td>
                            <td>User's Name</td>
                            <td>User's Email</td>
                            <td>Return Date</td>
                            <td>Over Days</td>
                            <td>Return Status</td>
                            <td>User Return Date</td>
                        </tr>
                    </thead>
                    <tfoot>
                       <tr>
                            <td>Book Name</td>
                            <td>Book Author</td>
                            <td>Book Category</td>
                            <td>Granted Quantity</td>
                            <td>Available Quantity Now</td>
                            <td>For How Many Days</td>
                            <td>User's Name</td>
                            <td>User's Email</td>
                            <td>Return Date</td>
                            <td>Over Days</td>
                            <td>Return Status</td>
                            <td>User Return Date</td>
                        </tr>
                    </tfoot>
                   <tbody>
					    <?php while ($data = mysqli_fetch_assoc($run)) {
					        $return_date = strtotime($data['poss_return_date']); // Correct variable name
					        $current_date = strtotime(date('Y-m-d'));
					        $difference = $current_date - $return_date; // Calculate difference in seconds
					        $overDays = floor($difference / (60 * 60 * 24)); // Convert seconds to days

					        // Make sure $overDays is not negative
					        if ($overDays < 0) {
					            $overDays = 0;
					        }
					    ?>
					        <tr>
					            <td><?php echo $data['book_name'] ?></td>
					            <td><?php echo $data['author'] ?></td>
					            <td><?php echo $data['cat_name'] ?></td>
					            <td><?php echo $data['gqty'] ?></td>
					            <td><?php echo $data['qty'] ?></td>
					            <td><?php echo $data['days'] ?></td>
					            <td><?php echo $data['s_name'] ?></td>
					            <td><?php echo $data['email'] ?></td>
					            <td><?php echo $data['poss_return_date'] ?></td>
					            <td><?php echo $overDays ?></td>  
					            <td><?php if($data['return_status'] == 0){ ?>Not Returned<?php }else{ ?>Return Done<?php } ?></td>
					            <td><?php echo $data['user_return_date'] ?></td>
					        </tr>
					    <?php } ?>
					</tbody>

                </table>
            </div>
        </div>
    </div>
</div>


<?php include('ini/footer.php'); ?>