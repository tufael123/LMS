<?php 
include('dbcon.php');
$id = $_GET['id'];
$sql= "DELETE FROM book WHERE book_id=$id";
$run = mysqli_query($con,$sql);
if ($run) {
	 echo "<script>
    		   window.alert('Deleted & Clicked book is deleted');
	           window.open('view_book.php','_self');
	        </script>";
}else{
	echo "error";
}
?>