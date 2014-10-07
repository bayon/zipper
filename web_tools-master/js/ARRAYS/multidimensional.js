
 <script>
 var myCars=new Array(); // regular array (add an optional integer
 myCars['make']=["Honda","VW","Subaru"]; // literal array
 myCars['year']=["2008","2009","2010"]; // literal array
 myCars['color']=["Red","Yellow","Green"]; // literal array

  
 for (x in myCars)
 {
 document.write(myCars[x] + " ");
 }
 </script>