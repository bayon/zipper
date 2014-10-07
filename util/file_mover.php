<?php
   move_uploaded_file($_FILES["file"]["tmp_name"], "/var/www/upload/".$fileName);
?>