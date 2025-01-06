<?php  
session_start();
if(isset($_SESSION['admin_email'])){
$idd = $_SESSION['id'];
$id = $_GET['id'];
include('dbcon.php');
$sql = "DELETE FROM book_request WHERE req_id = '$id'";
$run = mysqli_query($con,$sql);
if ($run) {
	 echo "<script>
    		   window.alert('Deleted & Clicked book request is deleted');
	           window.open('bookdecreport.php','_self');
	        </script>";
}else{
	echo "error";
}


}

?>