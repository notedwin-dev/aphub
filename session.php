<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    header("location: select-role.php?action=login");
}

?>