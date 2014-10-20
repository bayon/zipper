

<button id="scrollToTopBtn" onclick="scrollToTop();";>^</button>	

</body>
 
</html>
<script type="text/javascript">
var timeOut;
function scrollToTop() {
	 
	 
  if (document.body.scrollTop!=0 || document.documentElement.scrollTop!=0){
    window.scrollBy(0,-50);
    timeOut=setTimeout('scrollToTop()',30);
  }
  else clearTimeout(timeOut);
   
  
}
</script>