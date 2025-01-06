<?php
session_start();

if(isset($_SESSION['admin_email'])) {
    $idd = $_SESSION['id'];

    $req_id = $_GET['id'];
    $grant_qty = isset($_GET['granted_qty']) ? $_GET['granted_qty'] : ''; 
    include('dbcon.php');
    $sql1 = "SELECT * FROM book_request
             LEFT JOIN book ON book_request.book_id = book.book_id 
             LEFT JOIN user ON book_request.user_id = user.id 
             WHERE book_request.req_id = $req_id AND book_request.req_status = 0";

    $run1 = mysqli_query($con, $sql1);
    $data1 = mysqli_fetch_assoc($run1);

    if(!$data1) {
        echo "
            <script>
                window.alert('Invalid Request ID');
                window.open('bookrequestlist.php','_self');
            </script>";
        exit; // Exit script if request ID is invalid
    }

    $book_id = $data1['book_id'];
    $bookname = $data1['book_name'];
    $author = $data1['author'];
    $user_id = $data1['user_id'];
    $req_id = $data1['req_id'];
    $gqty = $grant_qty;
    $days = $data1['days'];
    $datee = date('Y-m-d');
    $poss_return_date = date('Y-m-d', strtotime($datee . ' + ' . $days . ' days'));
    $available_qty = $data1['qty'];

    // Check if requested quantity exceeds available quantity
    if($gqty > $available_qty) {
        echo "
            <script>
                window.alert('Error!! This book only ".$available_qty." Available');
                window.open('bookrequestlist.php','_self');
            </script>";
    } else {
        $updated_qty = $available_qty - $gqty;
        $sql2 = "INSERT INTO issued_book(book_id, user_id, req_id, gqty, days, datee, poss_return_date) 
                 VALUES ('$book_id', '$user_id', '$req_id', '$gqty', '$days', '$datee', '$poss_return_date')";
        $run2 = mysqli_query($con, $sql2);

        $sql3 = "UPDATE book SET qty = '$updated_qty' WHERE book.book_id = $book_id";
        $run3 = mysqli_query($con, $sql3);

        $sql4 = "UPDATE book_request SET req_status = 1 WHERE book_request.req_id = $req_id";
        $run4 = mysqli_query($con, $sql4);

        if ($run2 && $run3 && $run4) {
            // Approval was successful, no email being sent
            echo "<script>
                      window.alert('Book Request Approved');
                      window.open('bookrequestlist.php','_self');
                  </script>";
        } else {
            // Handle failure in query execution
            echo "<script>
                      window.alert('Failed to approve request. Please try again.');
                      window.open('bookrequestlist.php','_self');
                  </script>";
        }
    }
} else {
    header('location: ../login.php');
}
?>
