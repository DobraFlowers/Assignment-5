<?php
class Database{
	public $conn = null;

	public function getConnection(){
	if(!isset($conn)|| is_null($conn)){
		$this->conn = new PDO('sqlite:./flowers.db');
}
}
public function getFlowers(){
	$this->getConnection();
	$sql = "SELECT * FROM FLOWERS ORDER BY comname";
	$results = $this->conn->query($sql);
	$result_array = array();
	foreach($results as $row){ 
		$cur_row = array();
		$cur_row['comname']=$row['COMNAME'];
		$cur_row['genus']=$row['GENUS'];
		$cur_row['species']= $row['SPECIES'];
		$result_array[$row['COMNAME']] = $cur_row;

}
	return $result_array;
}
public function getFeatures(){
	$this->getConnection();
	$sql = "SELECT * FROM FEATURES ORDER BY location";
	$results = $this->conn->query($sql);
	$result_array = array();
	foreach($results as $row){ 
		$cur_row = array();
		$cur_row['location']=$row['LOCATION'];
		$cur_row['class']=$row['CLASS'];
		$cur_row['latitude']=$row['LATITUDE'];
		$cur_row['longitude']= $row['LONGITUDE'];
		$result_array[$row['LOCATION']] = $cur_row;

}
	return $result_array;
}
public function getSightings($flower){
    $this->getConnection();
    $sql = "SELECT * FROM SIGHTINGS WHERE NAME = :flower";
    $stmt = $this->conn->prepare($sql); 
    if($stmt === False){
        return null;
    }
    $stmt->execute(array(':flower'=>$flower));
	$results = $stmt->fetchAll();
	$result_array = array();
    foreach($results as $row){
        $cur_row = array();
        $cur_row['name'] = $row['NAME'];
        $cur_row['person'] = $row['PERSON'];
        $cur_row['location'] = $row['LOCATION'];
        $cur_row['sighted'] = $row['SIGHTED'];
        $result_array[] = $cur_row;
    }
    return $result_array;
}
public function updateFlower($flower, $genus, $species, $comname){
	$this->getConnection();
	$sql = "UPDATE FLOWERS SET COMNAME = :comname, GENUS = :genus, SPECIES = :species WHERE COMNAME = :flower";
	$stmt = $this->conn->prepare($sql);
	if($stmt === False) return False;
	return $stmt->execute(array(':comname'=>$comname, ':genus'=>$genus, ':species'=>$species, ':flower'=>$flower));
	
}
public function addSighting($name, $person, $location, $sighted){
	$this->getConnection();
	$sql = "INSERT INTO SIGHTINGS(NAME, PERSON, LOCATION, SIGHTED) VALUES(:name, :person, :location, :sighted)";
	$stmt = $this->conn->prepare($sql);
	if($stmt === False) return False;
	return $stmt->execute(array(':name'=>$name, ':person'=>$person, ':location'=>$location, ':sighted'=>$sighted));
}
public function close(){
	$conn = null;
}
}
