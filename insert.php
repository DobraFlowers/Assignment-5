<html lang="en">

<?php require 'header.php';
require 'database.php';
?>

<form method="post" class="form-horizontal">
<div class="form-group">
	<label for="genus" class="col-sm-2 control-label">Genus</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="genus" name="genus">
	</div>
	</div>
	<div class="form-group">
	<label for="species" class="col-sm-2 control-label">Species</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="species" name="species">
	</div>
	</div>
	<div class="form-group">
	<label for="comname" class="col-sm-2 control-label">Common Name</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="comname" name="comname">
	</div>
	</div>
	<input name="addflower" value="Flower" type="hidden">
	<div style="text-align: center;"><button type="submit" class="btn btn-success">Submit</button></div>
	</form>

</html>