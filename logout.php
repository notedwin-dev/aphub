<?php
session_start();
session_destroy();
echo "<script>alert('Account logged out successfully'); window.location.href='home/';</script>";
exit();
?>