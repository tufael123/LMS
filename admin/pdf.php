<?php
session_start();

if(isset($_SESSION['admin_email'])){
    $idd = $_SESSION['id'];
    $id = $_GET['id'];
    include('dbcon.php');
    
    // Query to get user details
    $sql = "SELECT * FROM user WHERE id = '$id'";
    $exe = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($exe);
    
    // Include FPDF library
    require('fpdf182/fpdf.php');
    $pdf = new FPDF();
    $pdf->AddPage();
    
    // Set font for title
    $pdf->SetFont('Arial','B',22);
    $pdf->Cell(190,20,'Download '.$row['s_name'].'`s Information',1,1,'C');
    
    // Set font for content
    $pdf->SetFont('Arial','',14);
    
    // Display user email
    $pdf->SetFont('Arial','B',22);
    $pdf->Cell(190,20, $row['email'],1,1,'C');
    
    // Add some space
    $pdf->SetFont('Arial','',14);
    $pdf->cell(0,10,'',0,2);
    
    // Name Section
    $pdf->cell(20,8,'Name',1,0,'C');
    $pdf->SetFont('Arial','B',14);
    $pdf->cell(2,0,'',0,0,'C');
    $pdf->cell(150,8,$row['s_name'],1,1,'C');
    $pdf->cell(0,6,'',0,1,'C');
    
    // Father's Name Section
    $pdf->SetFont('Arial','',14);
    $pdf->cell(40,8,'Father`s Name',1,0,'C');
    $pdf->cell(2,0,'',0,0,'C');
    $pdf->cell(150,8,$row['f_name'],1,1,'C');
    $pdf->cell(0,6,'',0,1,'C');
    
    // Mother's Name Section
    $pdf->SetFont('Arial','',14);
    $pdf->cell(40,8,'Mother`s Name',1,0,'C');
    $pdf->cell(2,0,'',0,0,'C');
    $pdf->cell(150,8,$row['m_name'],1,1,'C');
    $pdf->cell(0,6,'',0,1,'C');
    
    // Date of Birth Section
    $pdf->SetFont('Arial','',14);
    $pdf->cell(40,8,'Date Of Birth',1,0,'C');
    $pdf->cell(2,0,'',0,0,'C');
    $pdf->cell(150,8,$row['dod'],1,1,'C');
    $pdf->cell(0,6,'',0,1,'C');
    
    // Contact Section
    $pdf->SetFont('Arial','',14);
    $pdf->cell(40,8,'Contact',1,0,'C');
    $pdf->cell(2,0,'',0,0,'C');
    $pdf->cell(150,8,$row['phone'],1,1,'C');
    $pdf->cell(0,6,'',0,1,'C');
    
    // Guardian Phone Section
    $pdf->SetFont('Arial','',14);
    $pdf->cell(40,8,'Guardian Phone',1,0,'C');
    $pdf->cell(2,0,'',0,0,'C');
    $pdf->cell(150,8,$row['g_phone'],1,1,'C');
    $pdf->cell(0,6,'',0,1,'C');
    
    // Permanent Address Section
    $pdf->SetFont('Arial','',14);
    $pdf->cell(70,8,'Permanent Address Care Of',1,0,'C');
    $pdf->cell(2,0,'',0,0,'C');
    $pdf->cell(120,8,$row['per_careof'],1,1,'C');
    $pdf->cell(0,6,'',0,1,'C');
    
    // Permanent Village Section
    $pdf->SetFont('Arial','',14);
    $pdf->cell(50,8,'Permanent Village',1,0,'C');
    $pdf->cell(2,0,'',0,0,'C');
    $pdf->cell(120,8,$row['per_village'],1,1,'C');
    $pdf->cell(0,6,'',0,1,'C');
    
    // Permanent Division Section
    $pdf->SetFont('Arial','',14);
    $pdf->cell(50,8,'Permanent Division',1,0,'C');
    $pdf->cell(2,0,'',0,0,'C');
    $pdf->cell(120,8,$row['pdivi'],1,1,'C');
    $pdf->cell(0,6,'',0,1,'C');
    
    // Permanent District Section
    $pdf->SetFont('Arial','',14);
    $pdf->cell(50,8,'Permanent District',1,0,'C');
    $pdf->cell(2,0,'',0,0,'C');
    $pdf->cell(120,8,$row['pdist'],1,1,'C');
    $pdf->cell(0,6,'',0,1,'C');
    
    // Permanent PS/Thana Section
    $pdf->SetFont('Arial','',14);
    $pdf->cell(50,8,'Permanent PS/Thana',1,0,'C');
    $pdf->cell(2,0,'',0,0,'C');
    $pdf->cell(120,8,$row['p_posto'],1,1,'C');
    $pdf->cell(0,6,'',0,1,'C');
    
    // Output the PDF
    $pdf->Output();

} else {
    header('location: ../login.php');
}
?>
