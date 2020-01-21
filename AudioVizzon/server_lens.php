<?php

// Attributes Common For All The Devices
$ItemCatlogId="";
$ItemCatlogName="";
$itemDescription="";
$itemAvailability="";
$getErrors = array(); 

 $dbHost='localhost';
 $dbName='databasecw';

// connect to the database
$connection = mysqli_connect($dbHost, 'root', '', $dbName);

if(!$connection){
	die("Cannot Connect".mysqli_error());
}

// echo "Succefully Connected";

///////////////////////////////////////// Add Lens ////////////////////////////////////////////

// Attributes Common for Lens

$serailNumber="";
$visionType="";
$lensTint="";
$thinessLevel="";
$lensFlag=1;


if(isset($_POST['add_lens'])){

	// Get Values From the form
	$ItemCatlogId=mysqli_real_escape_string($connection,$_POST["ItemCatlogId"]);
	$ItemCatlogName=mysqli_real_escape_string($connection,$_POST["catLogName"]);
  $serailNumber=mysqli_real_escape_string($connection,$_POST["serailNumber"]);
  $visionType=mysqli_real_escape_string($connection,$_POST["visionType"]);
  $thinessLevel=mysqli_real_escape_string($connection,$_POST["thinessLevel"]);
	$itemDescription=mysqli_real_escape_string($connection,$_POST["Description"]);
	$itemAvailability=mysqli_real_escape_string($connection,$_POST["Availability"]);
  $lensTint=mysqli_real_escape_string($connection,$_POST["lensTint"]);



// Check If Required Fields are Empty or Not
  if (empty($ItemCatlogId)) { array_push($getErrors, "Item Catlog Id is Required"); }
  if (empty($ItemCatlogName)) { array_push($getErrors, "Item Catlog Name is Required"); }
  if (empty($itemDescription)) { array_push($getErrors, "Item Description is Required"); } 
  if (empty($serailNumber)) { array_push($getErrors, "Lens Serail Number is Required"); }
  if (empty($visionType)) { array_push($getErrors, "Lens Vision Type is Required"); }
  if (empty($lensTint)) { array_push($getErrors, "Lens Tint is Required"); }
  if (empty($thinessLevel)) { array_push($getErrors, "Lens Thiness Level Number is Required"); }
 
// Check Given device is Already avilable in the Database
  $check_already_available="SELECT * FROM w1742097_device WHERE w1742097_deviceCatlogId='$ItemCatlogId' LIMIT 1";
  $check_result=mysqli_query($connection, $check_already_available);
  $getResult=mysqli_fetch_assoc($check_result);


  if($getResult){
  	array_push($getErrors,"Sorry This Device is Already Available in the Database");
  }

// If there are no problems add device to database
  if (count($getErrors) == 0) {

  	$add_quary_device_table = "INSERT INTO w1742097_device 
    (w1742097_deviceCatlogId,w1742097_deviceCatlogName,w1742097_deviceDescrip,w1742097_availableStatus) 
  	VALUES('$ItemCatlogId','$ItemCatlogName','$itemDescription' ,'$itemAvailability')";
  	mysqli_query($connection, $add_quary_device_table);

    $add_quary_visual_table = "INSERT INTO w142097_visualdevice
    (w1742097_deviceCatlogId , w1742097_frame_Flag, w1742097_frBrand , w1742097_frModel , w1742097_lens_Flag , w1742097_lensSerialNo, w1742097_lensVisionType ,w1742097_lensTint, w1742097_lensThinessLevel)
    VALUES ('$ItemCatlogId','','','','$lensFlag','$serailNumber','$visionType','$lensTint','$thinessLevel')";
    mysqli_query($connection,$add_quary_visual_table);
    header('location: end.php');
  
  }
    
  }

?>