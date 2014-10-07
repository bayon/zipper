<?php
//mysql_connect("iccDbCall01int.smoothstone.com", "cmax_web", "vjXEhfLqF9NeFKEd");
$connection = ssh2_connect('http://www.iccDbCall01int.smoothstone.com', 22);
ssh2_auth_password($connection, 'bforte', 'Bay0nF0rt3!');

$stream = ssh2_exec($connection, '/usr/local/bin/php -i');
?>