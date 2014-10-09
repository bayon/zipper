<?php include_once("combo_head.php"); ?>
  <body>
  	<?php include_once("combo_nav.php"); ?>
    <div class="container">
      <p>Tab with Dropdown Menu</p>
      <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          Tutorials <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">HTML</a></li>
            <li><a href="#">CSS</a></li>
            <li><a href="#">JavaScript</a></li>                        
          </ul>
        </li>
      </ul>
    </div>

 	<div class="shape" id="shape1"></div>
    <div class="shape" id="shape2"></div>
    <div class="shape" id="shape3"></div>
    
    <!-- post scripts (notes):
    		- bootstrap.js (has to get called here instead of the head for the nav to work)
    -->
    <?php include_once('js/post_scripts.php'); ?>
   
    
    
  </body>

</html>
