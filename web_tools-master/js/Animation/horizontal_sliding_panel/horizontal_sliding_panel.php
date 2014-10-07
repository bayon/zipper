<?php 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Horizontal Panel Sliding With animate() function</title>
<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js?ver=1.3.2'></script>
<script type='text/javascript' src='easing.js'></script>

<script type="text/javascript">
    $(document).ready(function() {

      $("a#controlbtn").click(function(e) {
      
        e.preventDefault();
        
        var slidepx=$("div#linkblock").width() + 10;
    	
    	if ( !$("div#maincontent").is(':animated') ) { 
        
			if (parseInt($("div#maincontent").css('marginLeft'), 10) < slidepx) {

     			$(this).removeClass('close').html('Hide your stuffs');

      			margin = "+=" + slidepx;

    		} else {

     			$(this).addClass('close').html('Show your stuffs');

      			margin = "-=" + slidepx;
      		

    		}
    	
        	$("div#maincontent").animate({ 
        		marginLeft: margin
      		}, {
                    duration: 'slow',
                    easing: 'easeOutQuint'
                });
    	
    	
    	} 


      }); 

    });
</script>

<style type="text/css">
<!--

body {
	background-color: #EDEDED;
	font-family: Helvetica, Arial, sans-serif;
	font-size: 13px;
	margin: 0px;
	padding: 0px;
}

div#wrap {
  	position: relative;
	width: 800px;
	overflow: hidden;
	margin: 100px auto 0px auto;
}

a#controlbtn{
	color: #333;
	text-decoration: none;
	display: inline-block;
	padding-left: 20px;
}

a#controlbtn.open {
	background: transparent url(images/toggle_minus.png) no-repeat left center;
}

a#controlbtn.close {
	background: transparent url(images/toggle_plus.png) no-repeat left center;
}



div#linkblock {
	float: left;
	width: 140px;
	margin-left: -150px;
	border-right: solid 1px #DDDDDD;
}

div#maincontent {
	position: relative;
	margin-left: 150px;
}

#yourlist {
	list-style: none;
	margin: 0px;
	padding: 0px;
}
#yourlist li {
	padding: 3px 5px 3px 0px;
	position: relative;
	margin-top: 0;
	margin-right: 0;
	margin-bottom: 5px;
	margin-left: 0;

}

#yourlist li a {
	color: #D4432F;
	padding: none;
	margin: none;
}

h4 {
	margin: 0px;
	font-size: 16px;
	line-height: 26px;
	color: #333333;
	font-family: Helvetica, Arial, sans-serif;
	font-weight: bold;
	clear: none;
}
-->
</style>
</head>

<body>
<div style="position: relative; height: 50px;">
	<div style="width: 720px; margin:25px auto 0 auto; padding-top: 5px; text-align: left;">
		<span style="color: #333; font-family:'Arial Black',Gadget,sans-serif; font-size: 35px; font-weight: bold; letter-spacing: -5px;"><a href="http://aext.net" style="color: #333; text-decoration: none;" title="AEXT.NET">AEXT</a></span> - <a style="color: #333; font-size: 18px; font-family: Georgia, 'Times New Roman', Times, serif; font-style:italic; font-weight:bold;" href="http://aext.net/2009/11/learning-jquery-horizontal-panel-sliding-with-animate-function/" title="Learning jQuery: Horizontal Panel Sliding With animate() function">Horizontal Panel Sliding With animate() function</a>
	</div>
</div>

<div id="wrap">
  <div id="control">

  	<a id="controlbtn" class="open" href="http://aext.net" alt="Show/View your stuffs">Hide your stuffs</a>
  </div>
  
  <div id="maincontent">

     <div id="linkblock">
    
      <h4>All tags</h4>
      <ul id="yourlist">
        <li> 
          <a href="http://aext.net/category/css/" title="CSS & XHTML"> CSS & XHTML</a>

        </li>
        <li> 
          <a href="http://aext.net/category/php/" title="Resources"> PHP</a>
        </li>
        <li> 
          <a href="http://aext.net/category/resources/" title="Resources"> Resources</a>
        </li>
        <li> 
          <a href="http://aext.net/category/theme-layout/" title="Themes & Layouts"> Themes & Layouts</a>

        </li>
      </ul>
    
    </div>
  
  	<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi .... </p>
  
  </div>

</div>
</body>
</html>