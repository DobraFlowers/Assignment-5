<html lang="en">

<?php require 'header.php';
require 'database.php';

$db = new Database(); 
 $flowers = $db->getFlowers();
 $locations = $db->getFeatures();
 $message = null;
 if(isset($_GET) && isset($_GET['flower'])){
  if(isset($_POST) && isset($_POST['editflower'])){
			$reqs_flower = $_POST['editflower'];
			$flower = $_POST['flower'];
			$person = $_POST['person'];
			$location = $_POST['location'];
			$sighted = $_POST['sighted'];
			$r = $db->addSighting($flower, $person, $location, $sighted);
			if($r){
				$message = $reqs_flower ."Sighting inserted";
			}
	 }
	 }
?>

<form method="post" class="form-horizontal">
    <div class="form-group">
	<label for="flower" class="col-sm-2 control-label">Flower Name</label>
	<div class="col-sm-10">
        <select class="form-control" id="flower" name = "flower">
            <option value="-1">Select Flower</option>
            <?php
                foreach ($flowers as $f) { ?>
                    <option value = "<?= $f["comname"]?>"><?php echo $f ["comname"]; ?></option>
                <?php
                }
                ?>
        </select>
    </div>
    </div>
	<div class="form-group">
	<label for="person" class="col-sm-2 control-label">Seen by</label>
	<div class="col-sm-10">
		<input type="text" class="form-control" id="person" name="person" placeholder="First Name">
	</div>
	</div>
	<div class="form-group">
    	<label for="location" class="col-sm-2 control-label">Location</label>
    	<div class="col-sm-10">
            <select class="form-control" id="location" name = "location">
                <option value="-1">Select Location</option>
                <?php
                    foreach ($locations as $l) { ?>
                        <option value = "<?= $l["location"]?>"><?php echo $f ["location"]; ?></option>
                    <?php
                    }
                    ?>
            </select>
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