<?php  if (count($getErrors) > 0) : ?>
  <div class="error">
  	<?php foreach ($getErrors as $error) : ?>
  	  <p><?php echo $error ?></p>
  	<?php endforeach ?>
  </div>
<?php  endif ?>

