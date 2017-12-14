<html lang="en">

<?php require 'header.php';
require 'database.php';

$db = new Database(); 
 $flowers = $db->getFlowers();
 $locations = $db->getFeatures();
 $message = null;
 $success = null;
 $name = null;
 $person = null;
 $location = null;
 $sighted = null;

   /* if(isset($_GET) && isset($_GET['flower'])){
        $algomas = "this is a thing";
        if($_GET['flower']== -1){
            $message = "Please select a flower.";
         }else{
             $flower = $_GET['flower'];
         }
         if(isset($_GET) &&isset($_GET['location'])){
         $algo = "this is a thing";
                 if($_GET['location']== -1){
                     $message = "Please select a location.";
                  }else{
                      $location = $_GET['location'];
                  }
                 if(isset($_POST) &&isset($_POST['person']) &&isset($_POST['sighted'])){
                 $masdealgo = "this is a thing";
                    $algo = "one";
                    $person = $_POST['person'];
                    $sighted = $_POST['sighted'];
                    $algomas = "two";
                    $r = $db->addSighting($flower, $person, $location, $sighted);
                    			if($r){
                    				$message = "Sighitng of ". $flower ." was added!";
                    			}else{
                    				$message = $reqs_flower."Not added.";
                    			}
                    $masdealgo = "three";
                 }


             }
    }*/
    if(isset($_POST) && isset($_POST['addflower'])){
        if(($_POST['flower'])==-1 || ($_POST['person'])== null || ($_POST['location'])==-1 || ($_POST['sighted'])== null){
            $message = "Please fill in all fields.";
			$success = False;
        }else{
            $name = $_POST['flower'];
            $person = $_POST['person'];
            $location = $_POST['location'];
            $sighted = $_POST['sighted'];
        }
        $r = $db->addSighting($name, $person, $location, $sighted);
        if($r){
            $message = $name." was added";
			$success = True;
        }else{
            $message = "nothing was added";
			$success = False;
        }
    }

?>
<div class="container">
	<?php
    if(!is_null($message) && $success == False){
        echo('<div class="panel panel-default "><div class="bg-danger panel-body">'.$message . '</div></div>');
    }
	else if(!is_null($message) && $success == True){
        echo('<div class="panel panel-default "><div class="bg-success panel-body">'.$message . '</div></div>');
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
                        <option value = "<?= $l["location"]?>"><?php echo $l ["location"]; ?></option>
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
	<input name="addflower" value="<?=$sightings['name']?>" type="hidden">
	<div style="text-align: center;"><button type="submit" class="btn btn-success">Add New Sighting</button></div>
</form>

</html>