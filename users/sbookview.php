<?php 
$idd = $_GET['id'];
include('ini/header.php');
include('dbcon.php');
$sql = "SELECT * FROM book LEFT JOIN category ON book.cat_id = category.cat_id WHERE book.book_id = $idd";
$run = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($run);
?>
<br>
<br>
<br><br>
<br>
<br><br>
<div class="row mb-5 mt-2">
            <div class="col-md-6 offset-3 card text-success" style="background: white; font-weight: bold;">
                <div class="card-body">
                	<table class="table table-hover table-striped" width="50%">
						<tr>
							<td class="font-weight-bold" style="width: 150px;">Book Name :</td>
							
							<td style="width: 400px;"><?php echo $data['book_name'] ?></td>
						</tr>
						<tr>
							<td class="font-weight-bold" style="width: 150px;">Book Author :</td>
							
							<td style="width: 400px;"><?php echo $data['author'] ?></td>
						</tr>
						<tr>
							    <td class="font-weight-bold" style="width: 150px;">Book Category :</td>
							    
							    <?php if(is_null($data['cat_id'])) { ?>
							        <td style="color: red; font-weight: bolder;">Category Deleted</td>
							    <?php } else { ?>
							        <td><?php echo $data['cat_name'] ?></td> 
							    <?php } ?>
						</tr>
						<tr>
							<td class="font-weight-bold" style="width: 150px;">Book Quantity :</td>
							
							<td style="width: 200px;"><?php echo $data['qty'] ?></td>
						</tr>
						<?php 

						 ?>
						<tr>
							<td style="height: 130px;"><img src="../admins/img/books/<?php echo $data['photo'] ?>" style="height: 140px; width: 150px; border-radius: 20%;"></td>
							<td class="text-danger"><span style="margin-left: 40px; margin-top:25px;"><a href="requestpage.php?id=<?php echo $data['book_id']; ?>" class="btn btn-success btn-md">Request</a></span></td>
							
						</tr>

					</table>
                </div>

            </div>
             
</div>
<?php include('ini/footer.php') ?>
