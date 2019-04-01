<?php 
    if ( !empty($_POST)) { 
        // post values
        $nim = $_POST['nim'];
        $nama  = $_POST['nama'];
        $fakultas    = $_POST['fakultas'];
        $progdi = $_POST['progdi'];
      
		$file = file_get_contents('people.json');
		$data = json_decode($file, true);
		unset($_POST["add"]);
		$data["records"] = array_values($data["records"]);
		array_push($data["records"], $_POST);
		file_put_contents("people.json", json_encode($data));
		header("Location: index_crudjson.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="tutorial-boostrap-merubaha-warna">
	<title>DATA MHS</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<style type="text/css">
	.navbar-default {
		background-color: #3b5998;
		font-size:18px;
		color:#ffffff;
	}
	</style>
</head>
<body>

<div class="container">
        <div class="row">
		<div class="col-sm-5 col-sm-offset-3"><h3>tambah data mahasiswa</h3>
        <form method="POST" action="">
			<div class="form-group">
				<label for="nim">nim</label>
				<input type="number" class="form-control" required="required" id="nim" name="nim" placeholder="nim">
				<span class="help-block"></span>
			</div>
			
			<div class="form-group ">
				<label for="nama">Name</label>
				<input type="text" class="form-control" required="required" id="nama" name="nama" placeholder="Nama">
        		<span class="help-block"></span>
			</div>
			
			<div class="form-group">
				<label for="fakultas">fakultas</label>
				<input type="text" required="required" class="form-control" id="fakultas" name="fakultas" placeholder="fakultas">
				<span class="help-block"></span>
			</div>
				<div class="form-group">
					<label for="progdi">progdi</label>
				<input type="text" required="required" class="form-control" id="progdi" name="progdi" placeholder="progdi">
				<span class="help-block"></span>
        		</div>
    
			<div class="form-actions">
					<button type="submit" class="btn btn-success">Create</button>
					<a class="btn btn btn-default" href="index_crudjson.php">Back</a>
			</div>
		</form>
        </div></div>        
</div>
</body>
</html>
