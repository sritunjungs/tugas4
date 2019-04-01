<?php
$getfile = file_get_contents('people.json');
$jsonfile = json_decode($getfile);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="ilmu-detil.blogspot.com">
	<title>DATA MHS</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/ilmudetil.css">
</head>
<body>
<div class="container">
	<div class="btn-toolbar">
		<a class="btn btn-primary" href="insert.php"><i class="icon-plus"></i> Insert Data</a>
		<div class="btn-group"> </div>
	</div>
</div>
<br>
<br>
<div class="container">
	<div class ="row">
		<div class="col-md-9">
			<table class="table table-striped table-bordered table-hover">
				<tr>
					<th>No.</th>
					<th>nim</th>
					<th>Name</th>
					<th>Fakultas</th>
					<th>Progdi</th>
					<th>Action</th>
				</tr>		
				<?php $no=0;foreach ($jsonfile->records as $index => $obj): $no++;  ?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $obj->nim; ?></td>
					<td><?php echo $obj->nama; ?></td>
					<td><?php echo $obj->fakultas; ?></td>
					<td><?php echo $obj->progdi; ?></td>
					<td>
						<a class="btn btn-xs btn-primary" href="update.php?id=<?php echo $index; ?>">Edit</a>
						<a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $index; ?>">Delete</a>
					</td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div> 
	</div>
</div>
</body>
</html>
