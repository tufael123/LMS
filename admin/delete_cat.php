<?php 
include('dbcon.php');
$id = $_GET['id'];
$sql= "DELETE FROM category WHERE cat_id=$id";
$run = mysqli_query($con,$sql);
if ($run) {
	 echo "<script>
    		   window.alert('Deleted & Clicked category is deleted');
	           window.open('all_category.php','_self');
	        </script>";
}else{
	echo "error";
}
?>