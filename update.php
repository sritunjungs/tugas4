<?php
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];
    $getfile = file_get_contents('people.json');
    $jsonfile = json_decode($getfile, true);
    $jsonfile = $jsonfile["records"];
    $jsonfile = $jsonfile[$id];
}

if (isset($_POST["id"])) {
    $id = (int) $_POST["id"];
    $getfile = file_get_contents('people.json');
    $all = json_decode($getfile, true);
    $jsonfile = $all["records"];
    $jsonfile = $jsonfile[$id];

    $post["nim"] = isset($_POST["nim"]) ? $_POST["nim"] : "";
    $post["nama"] = isset($_POST["nama"]) ? $_POST["nama"] : "";
    $post["fakultas"] = isset($_POST["fakultas"]) ? $_POST["fakultas"] : "";
    $post["progdi"] = isset($_POST["progdi"]) ? $_POST["progdi"] : "";



    if ($jsonfile) {
        unset($all["records"][$id]);
        $all["records"][$id] = $post;
        $all["records"] = array_values($all["records"]);
        file_put_contents("people.json", json_encode($all));
    }
    header("Location:index_crudjson.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="tutorial-boostrap-merubaha-warna">
	<title>Tutorial Boostrap </title>
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
        <div class="row">
            <h3>edit data mahasiswa</h3>
        </div>
            
        <?php if (isset($_GET["id"])): ?>
		<form method="POST" action="update.php">
		<div class="col-md-6">
			<input type="hidden" value="<?php echo $id ?>" name="id"/>
			<div class="form-group">
				<label for="nim">nim</label>
				<input type="number" class="form-control" required="required" id="nim" value="<?php echo $jsonfile["nim"] ?>" name="nim" placeholder="nim">
				<span class="help-block"></span>
			</div>
			
			<div class="form-group">
				<label for="nama">nama</label>
				<input type="text" class="form-control" required="required" id="nama" value="<?php echo $jsonfile["nama"] ?>" name="nama" placeholder="nama">
				<span class="help-block"></span>
			</div>
			
			<div class="form-group">
				<label for="fakultas">fakultas</label>
				<input type="text" required="required" class="form-control" id="fakultas" value="<?php echo $jsonfile["fakultas"] ?>" 
				 name="fakultas" placeholder="fakultas">
				<span class="help-block"></span>
			</div>
			
			<div class="form-group">
				<label for="progdi">progdi</label>
				<input type="text" required="required" class="form-control" id="progdi" value="<?php echo $jsonfile["progdi"] ?>" 
				 name="progdi" placeholder="progdi">
				<span class="help-block"></span>
			</div>
    
			<div class="form-actions">
				<button type="submit" class="btn btn-primary">Update</button>
				<a class="btn btn btn-default" href="index_crudjson.php">Back</a>
			</div>
		</div>
		</form>
		<?php endif; ?>
		
                
    </div> <!-- /row -->
</div> <!-- /container -->
</body>
</html>
