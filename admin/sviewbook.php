<?php 
$id = $_GET['id'];
include('ini/header.php');
include('dbcon.php');
$sql = "SELECT * FROM book LEFT JOIN category ON book.cat_id = category.cat_id WHERE book.book_id = $id";
$run = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($run);
?>
 <h1 class="text-center">View Books :</h1>
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
							<td class="font-weight-bold" style="width: 150px;">Book Description :</td>
							
							<td style="width: 400px;"><?php echo $data['description'] ?></td>
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
							
							<td style="width: 400px;"><?php echo $data['qty'] ?></td>
						</tr>
						
						<tr>
							<td style="height: 130px;"><img src="img/books/<?php echo $data['photo'] ?>" style="height: 140px; width: 150px; border-radius: 20%;"></td>
						</tr>
					</table>
                </div>

            </div>
            <div class="col-md-6 offset-3 mt-4">
            	<a href="update_book.php?id=<?php echo $data['book_id']; ?>" class="btn btn-primary btn-lg form-control"><i class="fa fa-edit" style="font-size: 25px;"></i></a>
            </div>
             
</div>

<?php include('ini/footer.php'); ?>