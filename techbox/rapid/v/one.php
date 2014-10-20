<?php include_once('head.php'); ?>
<?php include_once('slideMenuNav.php'); ?>
<div class='page_content'>
	

<div class='page_title'>one</div>
	<div style='height:50px;'><p>one</p></div>
	<div style='height:50px;'><p>one</p></div>
	<div style='height:50px;'><p>one</p></div>
	<div style='height:50px;'><p>one</p></div>
	 
<form method='get' action='<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>'>
	<input type='hidden' name='controller' value='one.php'/>
	<input type='hidden' name='method' value='getSomeData'/>
	<input type='submit' name='submit' value='go'/>
</form>
	<?php if(isset($data)){ ?>
	<div style='height:50px;'> 
	<div><br><?php print_r($data);?>"</br></div> 
	</div>
	<div style='height:50px;'><p>one</p></div>
	<div style='height:50px;'><p>one</p></div>
	<div style='height:50px;'><p>one</p></div>
	<div style='height:50px;'><p>one</p></div>
	<div style='height:50px;'><p>one</p></div>
	<div style='height:50px;'><p>one</p></div>
	<div style='height:50px;'><p>one</p></div>
	<div style='height:50px;'><p>one</p></div>
	<div style='height:50px;'><p>one</p></div>
	<div style='height:50px;'><p>one</p></div>
	<div style='height:50px;'><p>one</p></div>
	<?php } ?>
</div>
<?php include_once('foot.php'); ?>