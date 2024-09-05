<?php
session_start();
 echo "Logging You Out. Please wait...";
session_unset();
session_destroy();
header("location:/");
?>