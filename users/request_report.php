<?php 
include('ini/header.php');
$sql = "SELECT * FROM book_request 
        LEFT JOIN book ON book_request.book_id = book.book_id 
        LEFT JOIN user ON book_request.user_id = user.id WHERE book_request.user_id = $id";

$run = mysqli_query($con,$sql);
$c=1; 
?>
<br>
<br>
<br><br>
<br>
<br><br>
<div class="container">
	<table class="table table-dark text-center table-bordered">
	  <thead>
	    <tr>
	    	<th scope="col">SL</th>
	      	<td>Book Name</td>
             <th scope="col">Book Author</th>
             <th scope="col">Book Category</th>
             <th scope="col">Available Quantity</th>
             <th scope="col">Requested Quantity</th>
			 <th scope="col">For How Many Days</th>
             <th scope="col">Request Status</th>
	    </tr>
	  </thead>
	  <tbody>
	    <?php while ($data = mysqli_fetch_assoc($run)) { ?>
                            <tr>
                            	<td><?php echo $c++; ?></td>
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
                                
							   <td>
							    <?php if($data['req_status'] == 0) {?>
							        <button class="btn btn-warning btn-sm" disabled="">Pending</button>
							    <?php } elseif($data['req_status'] == 2) {?>
							        <button class="btn btn-danger btn-sm" disabled="">Declined</button>
							    <?php } else { ?>
							        <button class="btn btn-success btn-sm" disabled="">Approved</button>
							    <?php } ?>
							</td>

							
                            </tr>
                        <?php } ?>
	   
	  </tbody>
	</table>
</div>
<?php include('ini/footer.php'); ?>