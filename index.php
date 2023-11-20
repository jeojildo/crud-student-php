<!DOCTYPE html>
<html>
<head>
	<title>CRUD With PHP</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script src="bootstrap/js/jquery-3.7.0.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="DataTables/datatables.min.css">
	<script src="DataTables/datatables.min.js"></script>
</head>
<body>
	<div class="container">
			<h3> CRUD With PHP - MariaDB </h3>
			<hr>
			<a href='student/f_add.php'><button class="btn btn-success">Add New Data</button></a>
			<h6 class="text-center">List Of Student</h6>
			<hr>
			<div class="table-responsive">
			<table id="datatables" class="table table-bordered table-striped table-hover data">
				<thead>
					<tr>
						<th>No.</th>
						<th>SRN</th>
						<th>Student Name</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
			<?
			include "config/connection.php";
			$result = mysqli_query($conn, "SELECT * FROM student");
			$no = 1; 
			while($row=mysqli_fetch_array($result))
			{
			echo "<td>$no</td>";
			echo "<td>$row[srn]</td>";
			echo "<td>$row[studentname]</td>";
			echo "<td> <a href='student/updateview.php?srn=$row[srn]'>Update</a> | 
			<a href='student/delete.php?srn=$row[srn]' onClick=\"return confirm('Do you want to delete $row[studentname]?')\">Delete</a></td></tr>";
			$no++;
			}
			echo "</table>";
			?>
			<script>
			    $(document).ready(function () {
			        $('#datatables').DataTable();
			    });
			</script>
	</div>
</body>
</html>