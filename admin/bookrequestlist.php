<?php 
include('ini/header.php');
$sql = "SELECT * FROM book_request 
        LEFT JOIN book ON book_request.book_id = book.book_id 
        LEFT JOIN user ON book_request.user_id = user.id WHERE book_request.req_status = 0";

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
                            <td>Available Quantity</td>
                            <td>Requested Quantity</td>
                            <td>For How Many Days</td>
                            <td>User's Name</td>
                            <td>User's Email</td>
                            <td>Granted Qty</td>
                            <td>Action</td>
                            <td>Decline Reason</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tfoot>
                         <tr>
                            <td>Book Name</td>
                            <td>Book Author</td>
                            <td>Book Category</td>
                            <td>Available Quantity</td>
                            <td>Requested Quantity</td>
                            <td>For How Many Days</td>
                            <td>User's Name</td>
                            <td>User's Email</td>
                            <td>Granted Qty</td>
                            <td>Action</td>
                            <td>Decline Reason</td>
                            <td>Action</td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php while ($data = mysqli_fetch_assoc($run)) { ?>
                            <tr>
                            	<?php if(is_null($data['book_id'])) { ?>
                            		<td style="color: red; font-weight: bolder;">Book Deleted</td>
                            		<td style="color: red; font-weight: bolder;">Book Deleted</td>
                            		<td style="color: red; font-weight: bolder;">Book Deleted</td>
                            		<td style="color: red; font-weight: bolder;">Book Deleted</td>
                            	<?php }else{ ?>
                            		<td><?php echo $data['book_name'] ?></td>
	                                <td><?php echo $data['author'] ?></td>
	                                <td><?php echo $data['cat_name'] ?></td>
	                                <td><?php echo $data['qty'] ?></td>
                            	<?php } ?>
                                
                                <td><?php echo $data['hqty'] ?></td>
                                <td><?php echo $data['days'] ?></td>
							    <?php if(is_null($data['user_id'])) { ?>
							        <td style="color: red; font-weight: bolder;">User Doesn't Exist</td>
							    <?php } else { ?>
							        <td><?php echo $data['s_name'] ?></td>
							    <?php } ?>
                                 <?php if(is_null($data['user_id'])) { ?>
							        <td style="color: red; font-weight: bolder;">User Doesn't Exist</td>
							    <?php } else { ?>
							        <td><?php echo $data['email'] ?></td>
							    <?php } ?>
                                
							    <td>
							    <form action="req_approve.php" method="get">
							        <input type="number" name="granted_qty" style="width: 40px; height: 30px;" required="">
							    <!-- Include any hidden input fields if needed -->
							    <input type="hidden" name="id" value="<?php echo $data['req_id']; ?>">
							    <td>
							        <button type="submit" class="btn btn-success btn-lg form-control mt-1"><i class="fa fa-check-circle"></i></button>
								</form>
									
							    </td>
							    <td>
							    <form action="req_dec.php" method="get">
							        <textarea name="dec_reason" style="width: 100px; height: 100px;" required=""></textarea>
							    <!-- Include any hidden input fields if needed -->
							    <input type="hidden" name="id" value="<?php echo $data['req_id']; ?>">
							    <td>
							        <button type="submit" class="btn btn-danger btn-lg form-control mt-1"><i class="fa fa-close"></i></button>
								</form>
									
							    </td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('ini/footer.php') ?>
