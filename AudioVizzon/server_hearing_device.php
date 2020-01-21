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

//////////////////////////////////// Add Hearing Device ////////////////////////////

// Attributes Common for Hearing Devices
$ItemBrand="";
$itemModel="";


if(isset($_POST['add_hearing'])){

	// Get Values From the form

	$ItemCatlogId=mysqli_real_escape_string($connection,$_POST["ItemCatlogId"]);
	$ItemCatlogName=mysqli_real_escape_string($connection,$_POST["catLogName"]);
	$ItemBrand=mysqli_real_escape_string($connection,$_POST["ItemBrand"]);
	$itemModel=mysqli_real_escape_string($connection,$_POST["ItemModel"]);
	$itemDescription=mysqli_real_escape_string($connection,$_POST["Description"]);
	$itemAvailability=mysqli_real_escape_string($connection,$_POST["Availability"]);


// Check If Required Fields are Empty or Not
  if (empty($ItemCatlogId)) { array_push($getErrors, "Item Catlog Id is Required"); }
  if (empty($ItemCatlogName)) { array_push($getErrors, "Item Catlog Name is Required"); }
  if (empty($itemModel)) { array_push($getErrors, "Item Model is Required"); }
  if (empty($itemDescription)) { array_push($getErrors, "Item Description is Required"); }
  if (empty($ItemBrand)) { array_push($getErrors, "Item Make is Required"); }
 
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

    $add_quary_hearing_table = "INSERT INTO w1742097_hearing_device
    (w1742097_hdMake,w1742097_hdModel,w1742097_deviceCatlogId)
    VALUES ('$ItemBrand','$itemModel','$ItemCatlogId')";
    mysqli_query($connection,$add_quary_hearing_table);
    header('location: end.php');
  
  }
    
  }

?>