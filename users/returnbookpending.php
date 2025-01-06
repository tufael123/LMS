<?php
include('ini/header.php');
include('dbcon.php');
$sql = "SELECT * FROM issued_book
        LEFT JOIN book ON issued_book.book_id = book.book_id
        LEFT JOIN book_request ON issued_book.req_id = book_request.req_id
        LEFT JOIN user ON issued_book.user_id = user.id
        WHERE DATE_ADD(issued_book.datee, INTERVAL issued_book.days DAY) < CURDATE() AND return_status = 0 AND issued_book.user_id = $id";

$run = mysqli_query($con,$sql);
$qty = mysqli_num_rows($run);


?>
<br>
<br>
<br><br>
<br>
<br><br>
<div class="container">
	<?php if($qty == 0){ ?>
		<h1 class="text-center text-danger">No Data</h1>
	<?php }else{ ?>
	<table class="table table-dark text-center table-bordered">
		<thead>
             <tr>
                 <td>Book Name</td>
                 <td>Book Author</td>
                 <td>Book Category</td>
                 <td>Granted Quantity</td>
                 <td>Available Quantity Now</td>
                 <td>For How Many Days</td>
                 <td>Possible Return Date</td>
                 <td>Over Days</td>
             </tr>
		</thead>
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
					            <td><?php echo $data['poss_return_date'] ?></td>
					            <td><?php echo $overDays ?></td> 
					        </tr>
					    <?php } ?>
					</tbody>
	</table>
<?php } ?>
</div>

<?php include('ini/footer.php'); ?>