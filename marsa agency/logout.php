
<?php
session_start();
session_destroy();
die(Header("Location: index.php"));
?>