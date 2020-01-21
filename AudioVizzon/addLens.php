
<?php 
require('server_lens.php') 
?>

<!DOCTYPE html>
<html>
<head>
  <title>Insert Lens</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body class="body">
  <header> <a href="index.php"><img id="logo" src="ll.png"></a>  </header>
  <div class="header">
  	<h2> Insert Lens</h2>
  </div>
	
  <form method="post" action="addLens.php">
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
      <label>Lens Serial Number</label>
      <input type="text" name="serailNumber" value="<?php echo $serailNumber; ?>">
    </div>

    <div class="inputs">
      <label>Lens Vision Type</label>
      <input type="text" name="visionType" value="<?php echo $visionType; ?>">
    </div>

    <div class="inputs">
      <label>Lens Tint</label>
      <input type="text" name="lensTint" value="<?php echo $lensTint; ?>">
    </div>

    <div class="inputs">
      <label>Lens Thiness Level</label>
      <input type="text" name="thinessLevel" value="<?php echo $thinessLevel; ?>">
    </div>

    

    <div class="inputs">
      <label>Availability Status</label>   
    </div>


    <div>
    <select name="Availability" style="font-size: 18px; width: 580px;">
        <option value="In Stock" name="option">In Stock</option>
        <option value="Out Of Stock" name="option">Out Of Stock</option>
        <option value="Currently Being Ordered" name="option">Currently Being Ordered</option>
      </select>
    </div>

   
  	<div class="inputs">
  	  <button type="submit" class="btn" name="add_lens">Submit</button>
  	 
      <button class="btn" name="go_back" style="float: right;"> <a href="index.php" class="link">Back </a></button>
   
    </div>

  </form>

  <<br>
</body>
</html>
