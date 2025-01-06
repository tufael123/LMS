<?php
session_start();

if(isset($_SESSION['admin_email'])){
    $idd = $_SESSION['id'];

    $req_id = $_GET['id'];
    $dec_reason = isset($_GET['dec_reason']) ? $_GET['dec_reason'] : ''; 
    include('dbcon.php');
    
    // Get the book request details
    $sql1 = "SELECT * FROM book_request 
             LEFT JOIN user ON book_request.user_id = user.id 
             WHERE req_id = $req_id AND req_status = 0";

    $run1 = mysqli_query($con, $sql1);
    $data = mysqli_fetch_assoc($run1);

    // If no matching record is found, show an error
    if (!$data) {
        echo "
            <script>
                window.alert('Invalid Request ID or Request Already Processed');
                window.open('bookrequestlist.php', '_self');
            </script>";
        exit;
    }

    // Delete the request record from the database (decline)
    $sql = "DELETE FROM book_request WHERE req_id = '$req_id'";
    $run = mysqli_query($con, $sql);

    if ($run) {
        // If deletion is successful, show a success message
        echo "<script>
                window.alert('Book request declined successfully.');
                window.open('bookrequestlist.php', '_self');
              </script>";
    } else {
        // If there's an issue with the deletion
        echo "<script>
                window.alert('Failed to decline the request. Please try again.');
                window.open('bookrequestlist.php', '_self');
              </script>";
    }
} else {
    header('location: ../login.php');
}
?>
