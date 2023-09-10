<?php
   session_start();
   session_destroy();
   session_unset();
   ob_start();
   header("Refresh: 0; url=./");
?>