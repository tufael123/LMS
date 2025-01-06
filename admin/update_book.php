<?php 
$id = $_GET['id'];
include('ini/header.php');
include('dbcon.php');
$sql = "SELECT * FROM book LEFT JOIN category ON book.cat_id = category.cat_id WHERE book.book_id=$id";
$run = mysqli_query($con, $sql);
$data = mysqli_fetch_assoc($run);
?>

<h1 class="text-center">Update Books :</h1>
        <div class="row">
            <div class="col-md-6 offset-3 card text-success" style="background: white; font-weight: bold;">
                <div class="card-body">
                    	<form method="post" action="" enctype="multipart/form-data" class="container">
                                <label class="form-group">Book Name :</label>
       							<input type="text" name="book_name" required="" value="<?php echo $data['book_name'] ?>" class="form-control"><br>
                                <label class="form-group">Book Auttor :</label>
       							<input type="text" name="author" required="" value="<?php echo $data['author'] ?>" class="form-control"><br>
                                <label class="form-group">Book Description :</label>
                                <textarea class="form-control" name="description" value="<?php echo $data['description'] ?>"><?php echo $data['description'] ?></textarea>
                                <label class="form-group">Book Quantity :</label>
                                <input type="number" name="qty" value="<?php echo $data['qty'] ?>" class="form-control"><br>
                                
                                <label class="form-group">Book Photo :</label>
                                <input type="file" name="photo" class="form-control" required="">
                                <br>
                                <label class="form-group">Select Category : </label>
                                <br>
                                <br>
                                <?php 
                                 	$d = "SELECT * FROM category";
                                 	$r = mysqli_query($con,$d);
                                 ?>
                                <select name="cat_id" class="form-control">
                                	<?php if(is_null($data['cat_id'])) { ?>
                                		<option>Category Deleted</option>
                                		<?php while( $ta = mysqli_fetch_assoc($r)){ ?>
                                    	<option value="<?php echo $ta['cat_id'] ?>"><?php echo $ta['cat_name'] ?></option>
                                		<?php } ?>
                                	<?php }else{ ?> 
                                		<option value="<?php echo $data['cat_id'] ?>"><?php echo $data['cat_name'] ?></option>
                                	<?php while( $ta = mysqli_fetch_assoc($r)){ ?>
                                    	<option value="<?php echo $ta['cat_id'] ?>"><?php echo $ta['cat_name'] ?></option>
                                		<?php } ?>
                                	<?php } ?>
                                	
                                </select>
                                <br>
                                <br>
                                <input type="submit" name="submit" class="btn btn-success form-control">
                            </form>
                    </div>
                </div>

            </div>


<?php 

include('ini/footer.php');
 if ((isset($_POST['submit']))) {
	$book_name = $_POST['book_name'];
    $author = $_POST['author'];
	$description = $_POST['description'];
    $qty = $_POST['qty'];
	$cat_id = $_POST['cat_id'];
    $photo = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $upload_path = 'img/books/';
    $upload_check = move_uploaded_file($tmp_name, $upload_path.$photo);

    if ($upload_check == 0) {
        echo "<script>window.alert('Faild to load files');</script>";
    }else{
        $sql = "UPDATE  book SET book_name = '$book_name', author = '$author', description = '$description', qty = '$qty', cat_id = '$cat_id', photo = '$photo' WHERE book.book_id = $id";

        $run = mysqli_query($con,$sql);
        if ($run) {
           echo "
			<script>
	           window.alert('Updated');
	           window.open('view_book.php','_self');
	        </script>";
        }else{
            ?>
            <script>
               swal("Error!!","data update error","error");
            </script>
            <?php
        }
    }
	// echo $book_name, $author, $qty,  $cat_id;
}

 ?>