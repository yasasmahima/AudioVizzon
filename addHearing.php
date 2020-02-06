
<?php 
require('server_hearing_device.php') 
?>

<!DOCTYPE html>
<html>
<head>
  <title>Insert Hearing Device</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body class="body">
  <header> <a href="index.php"><img id="logo" src="ll.png"></a>  </header>
  <div class="header">
  	<h2> Insert Hearing Device</h2>
  </div>
	
  <form method="post" action="addHearing.php">
    <?php include('errors.php'); ?>
  	
      <div class="inputs">
      <label>Device Catlog Id</label>
      <input type="text" name="ItemCatlogId" value="<?php echo $ItemCatlogId; ?>">
    </div>

  <div class="inputs">
      <label>Device Catlog Name</label>
      <input type="text" name="catLogName" value="<?php echo $ItemCatlogName; ?>">
    </div>
  
  	<div class="inputs">
  	  <label>Device Description</label>
  	  <input type="Description" name="Description" value="<?php echo $itemDescription; ?>">
  	</div>

    <div class="inputs">
      <label>Hearing Device Brand</label>
      <input type="text" name="ItemBrand" value="<?php echo $ItemBrand; ?>">
    </div>

    <div class="inputs">
      <label>Hearing Device Model</label>
      <input type="text" name="ItemModel" value="<?php echo $itemModel; ?>">
    </div>

      <div class="inputs">
      <label>Availability Status</label>   
    </div>

    <div class="inputs">
    
      <select name="Availability" style="font-size: 18px; width: 580px;">
        <option value="In Stock" name="option">In Stock</option>
        <option value="Out Of Stock" name="option">Out Of Stock</option>
        <option value="Currently Being Ordered" name="option">Currently Being Ordered</option>
      </select>
    </div>

   
  	<div class="inputs">
  	  <button type="submit" class="btn" name="add_hearing">Submit</button>
  	

   
      <button class="btn" name="go_back" style="float: right;"> <a href="index.php" class="link">Back </a></button>
   
    </div>

  </form>

  <<br>
</body>
</html>
