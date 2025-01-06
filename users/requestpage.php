<?php 
session_start();
if (isset($_SESSION['email'])) {
    $id = $_SESSION['id'];
    include('dbcon.php');

   
    $sql = "SELECT * FROM user WHERE id = $id";
    $exe = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($exe);

    

    $idd = $_GET['id'];
    $sql1 = "SELECT * FROM book LEFT JOIN category ON book.cat_id = category.cat_id WHERE book.book_id = $idd";
    $run1 = mysqli_query($con, $sql1);
    $data1 = mysqli_fetch_assoc($run1);

    

   
    
} else {
    header('location: ../login.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Request Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script type="text/javascript" src="js/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="js/sweetalert.min.js"></script>
</head>
<body>
<a href="sbookview.php?id=<?php echo $idd ?>" class="mt-3 col-md-2"><i class="fa fa-long-arrow-left fa-5x"></i></a>
<h3 class="text-center">Book Request Form</h3>

<div class="container bg-success mb-5">
    <p class="text-light font-weight-bold" style="font-size: 22px;"><u>Book Information</u></p>
    <form class="pb-3" action="" method="post">
        <div class="row">
            <div class="col-md-4 form-group">
                <label class="text-light"><i style="font-weight: bolder; font-size: 18px;">Book's Name:</i></label>
                <input type="text" readonly="" value="<?php echo $data1['book_name'] ?>" name="book_name" class="form-control">
            </div>
            <div class="col-md-4 form-group">
                <label class="text-light"><i style="font-weight: bolder; font-size: 18px;">Book's Author:</i></label>
                <input type="text" readonly="" value="<?php echo $data1['author'] ?>" name="author" class="form-control">
            </div>
            <div class="col-md-4 form-group">
                <label class="text-light"><i style="font-weight: bolder; font-size: 18px;">Book's Category:</i></label>
                <input type="text" readonly="" value="<?php echo $data1['cat_name'] ?>" name="cat_name" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 form-group">
                <label class="text-light"><i style="font-weight: bolder; font-size: 18px;">Qty you Want?: </i></label>
                <input type="number" name="hqty" required="" class="form-control">
            </div>
            <div class="col-md-4 form-group">
                <label class="text-light"><i style="font-weight: bolder; font-size: 18px;">How Many days you Want?: </i></label>
                <input type="number" name="days" required="" class="form-control">
            </div>
            <div class="col-md-4">
                <p style="margin-top: 35px;" class="text-danger font-weight-bold">Available Qty: <?php echo $data1['qty'] ?></p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <br>
                    <label class="text-light ml-3"><i style="font-weight: bolder; font-size: 18px;">Book Photo: </i></label><br>
                    <img src="../admins/img/books/<?php echo $data1['photo'] ?>" class="ml-2" style="height: 250px; width: 300px; border-radius: 20%;">
                </div>
            </div>
        </div>
       
        <input type="submit" name="submit" class="form-control btn btn-primary mt-3">
    </form>
</div>
</body>
</html>

<?php 
if (isset($_POST['submit'])) {
    $book_name = $_POST['book_name'];
    $author = $_POST['author'];
    $cat_name = $_POST['cat_name'];
    $hqty = $_POST['hqty'];
    $days = $_POST['days'];
    if ($hqty > $data1['qty']) {
        echo "<script>swal('Error!!','Qty Shortage','error');</script>";
    } elseif ($days > 20) {
        echo "<script>swal('Error!!','Invalid Days select days under 5','error');</script>";
    }elseif($hqty ==0 OR $days==0) {
    	echo "<script>swal('Error!!','Invalid Input','error');</script>";
    }
     else {
    	if ($prow && $prow['pid'] != null){
        $sql3 = "INSERT INTO book_request (book_name, author, cat_name, hqty, days, book_id, user_id,) VALUES ('$book_name','$author','$cat_name','$hqty','$days','$idd','$id')";
        $exe = mysqli_query($con, $sql3);
        if ($exe) {
            echo "<script>swal('Success!!','data inserted','success');</script>";
          }
        }else{
        	 $sql3 = "INSERT INTO book_request (book_name, author, cat_name, hqty, days, book_id, user_id) VALUES ('$book_name','$author','$cat_name','$hqty','$days','$idd','$id')";
	        $exe = mysqli_query($con, $sql3);
	        if ($exe) {
	            echo "<script>swal('Success!!','data inserted','success');</script>";
	          }
        }
    }
}
?>
