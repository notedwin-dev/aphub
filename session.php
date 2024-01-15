<?php

if (!(session_start())) {
    session_start();
} else {
    if (!isset($_SESSION['user_id'])) {
        header("location: select-role.php?action=login");
    }
}

?>