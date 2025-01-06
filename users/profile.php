<?php 
include('ini/header.php');
$idd = $_GET['id'];
$sql = "SELECT * FROM user WHERE id = $id";
include('dbcon.php');
$exe = mysqli_query($con,$sql);
$data = mysqli_fetch_assoc($exe);
?>
<br>
<br>
<br><br>
<br>
<br><br>
<div class="container">
	<div class="row">
		
		<div class="col-md-6 mt-3">
			<h5 class="offset-6">Information Of <span class="text-danger"><?php echo $data['s_name']; ?></span></h5>
		</div>
		<div class="col col-md-2 ">
			<a href="pdf.php?id=<?php echo $id; ?>" class="btn btn-success btn-sm mt-3">Print as PDF</a>
		</div>
		<div class="col-md-2">
			<img class="float-right" src="../user_img/<?php echo $data['image']; ?>" height="200px" width=160px>
		</div>
	</div>

<div class="pcontent mt-4">
	<table class="table table-hover table-striped" width="50%">
		<tr>
			<td class="font-weight-bold">User Name</td>
			<td><?php echo $data['s_name'] ?></td>
		</tr>
		<tr>
			<td class="font-weight-bold">Father's Name</td>
			<td><?php echo $data['f_name'] ?></td>
		</tr>
		<tr>
			<td class="font-weight-bold">Mother's Name</td>
			<td><?php echo $data['m_name'] ?></td>
		</tr>
		<tr>
			<td class="font-weight-bold">Date of Birth</td>
			<td><?php echo $data['dod'] ?></td>
		</tr>
		<tr>
		</tr>
		<tr>
			<td class="font-weight-bold">Blood Group</td>
			<td><?php echo $data['blood'] ?></td>
		</tr>
		<tr>
			<td class="font-weight-bold">Gender</td>
			<td><?php echo $data['gender'] ?></td>
		</tr>
		<tr>
		<tr>
		</tr>
		<tr>
			<td class="font-weight-bold">Phone</td>
			<td><?php echo $data['phone'] ?></td>
		</tr>
		<tr>
			<td class="font-weight-bold">Guardain Phone</td>
			<td><?php echo $data['g_phone'] ?></td>
		</tr>
		<tr>
		</tr>
	</table>
	<p class="text-danger text-center" style="font-size: 24px;">Address</p>
	<table class="table table-hover table-striped" width="50%">
		<tr colspan="2">
			<th colspan="2" class="text-center">Permanent Address</th>
		</tr>
		<tr>
			<td class="font-weight-bold">Care Of</td>
			<td><?php echo $data['per_careof']; ?></td>
		</tr>
		<tr>
			<td class="font-weight-bold">Village/Town/Road</td>
			<td><?php echo $data['per_village'] ?></td>
		</tr>
		<tr>
			<td class="font-weight-bold">Division</td>
			<td><?php echo $data['pdivi'] ?></td>
		</tr>
		<tr>
			<td class="font-weight-bold">District</td>
			<td><?php echo $data['pdist'] ?></td>
		</tr>
		<tr>
			<td class="font-weight-bold">Post Office</td>
			<td><?php echo $data['p_posto'] ?></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><?php echo $data['email'] ?></td>
		</tr>
	</table>
	<a href="editprofile.php?id=<?php echo $data['id']?>" class="btn btn-info form-control"><i class="fa fa-edit me-2 text-dark text-center"></i></a>
</div>

</div>
<?php include('ini/footer.php') ?>

