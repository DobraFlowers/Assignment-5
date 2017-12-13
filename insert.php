<html lang="en">

<?php require 'header.php';
require 'database.php';
?>

<form method="post" class="form-horizontal">
<div class="form-group">
	<label for="name" class="col-sm-2 control-label">Flower Name</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="name" name="name" placeholder="Common Name">
	</div>
	</div>
	<div class="form-group">
	<label for="person" class="col-sm-2 control-label">Seen by</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="person" name="person" placeholder="First Name">
	</div>
	</div>
	<div class="form-group">
	<label for="Location" class="col-sm-2 control-label">Location</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="location" name="location" placeholder="Enter location">
	</div>
	</div>
	<div class="form-group">
    	<label for="Sighted" class="col-sm-2 control-label">Sighted</label>
    	<div class="col-sm-10">
    		<input type="text" class="form-control" id="sighted" name="sighted" placeholder="YYYY-MM-DD">
    	</div>
    	</div>
	<input name="addflower" value="Flower" type="hidden">
	<div style="text-align: center;"><button type="submit" class="btn btn-success">Add New Sighting</button></div>
	</form>

</html>