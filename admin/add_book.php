<?php
include('ini/header.php');
 $d = "SELECT * FROM category";
include('dbcon.php');
$r = mysqli_query($con,$d);
?>


        <h1 class="text-center">Add Books :</h1>
        <div class="row">
            <div class="col-md-6 offset-3 card text-success" style="background: white; font-weight: bold;">
                <div class="card-body">
                    	<form method="post" action="" enctype="multipart/form-data" class="container">
                                <label class="form-group">Book Name :</label>
       							<input type="text" name="book_name" required="" placeholder="book name" class="form-control"><br>
                                <label class="form-group">Book Auttor :</label>
       							<input type="text" name="author" required="" placeholder="author name" class="form-control"><br>
                                <label class="form-group">Book Description :</label>
                                <textarea class="form-control" name="description"></textarea><br>
                                <label class="form-group">Book Quantity :</label>
       							<input type="number" name="qty" required="" placeholder="qty" class="form-control"><br>
                                <label class="form-group">Book Photo :</label>
                                <input type="file" name="photo" class="form-control">
                                <br>
                                <label class="form-group">Select Category : </label>
                                <select name="cat_id" class="form-control">
                                	<option>select category</option>
                                	<?php while( $ta = mysqli_fetch_assoc($r)){ ?>
                                    <option value="<?php echo $ta['cat_id'] ?>"><?php echo $ta['cat_name'] ?></option>
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
        $sql = "INSERT INTO book(book_name, author, description, cat_id, qty, photo) VALUES('$book_name','$author', '$description', '$cat_id','$qty','$photo')";
        $run = mysqli_query($con,$sql);
        if ($run) {
           ?>
            <script>
               swal("Success!!","data inserted","success");
            </script>
            <?php
        }else{
            ?>
            <script>
               swal("oise na!!","data inserted","error");
            </script>
            <?php
        }
    }
	// echo $book_name, $author, $qty,  $cat_id;
}
?>