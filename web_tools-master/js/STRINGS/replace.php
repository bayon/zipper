<script type="text/javascript">

var str="Visit Microsoft!";
document.write(str.replace("Microsoft", "W3Schools"));


var str = "(123)abc123-1234def";
document.write(str.replace(/[A-Za-z$-]/g, ""));
 
</script> 

<script language="JavaScript"><!--
var temp = new String('This is a te!!!!st st>ring... So??? What...123(333)');
document.write(temp + '<br>');
temp =  temp.replace(/[^a-zA-Z 0-9]+/g,'');
document.write(temp + '<br>');
//--></script>

<script language="JavaScript"><!--
var temp = new String('123-333-4433');
document.write(temp + '<br>');
temp =  temp.replace(/[^a-zA-Z 0-9]+/g,'');
document.write(temp + '<br>');
//--></script>



<?php /*  REPLACE ALL SPACES  */?>
<script>
var myString = "foo bar ddd";
myString = myString.replace(/ /g, "");
</script>