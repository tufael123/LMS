<?php 
include('dbcon.php');
$id = $_GET['id'];
$sql = "SELECT * FROM issued_book LEFT JOIN book ON issued_book.book_id = book.book_id  WHERE issued_book.issue_id = $id";
$exe = mysqli_query($con,$sql);
$data = mysqli_fetch_assoc($exe);
$bookid = $data['book_id'];
$update_qty = $data['gqty'] + $data['qty'];
$current_date = date('Y-m-d');
$sql1 = "UPDATE issued_book SET return_status = 1, user_return_date = '$current_date' WHERE issue_id = $id";
$exe1 = mysqli_query($con,$sql1);
if($exe1){
    $sql2 = "UPDATE book SET qty = $update_qty WHERE book_id = $bookid";
    $run = mysqli_query($con,$sql2);
    if($run){
        echo "
            <script>
                window.alert('Book Returned And QTY Updated');
                window.open('bookreturnpending.php','_self');
            </script>";
    }
}
?>
