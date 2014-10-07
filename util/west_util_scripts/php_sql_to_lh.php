<?php
mysql_connect('localhost','root','');
$sql = "INSERT INTO test.sandbox (name,description,mid) VALUES('mac','the big guy','77'), 
('jac','the big guy','66'),
('zac','the big guy','45'),
('tac','the big guy','67');
";
$res = mysql_query($sql);
echo(mysql_error());

?>