<?php
function gcodeCheckSession($redirectUrl) {
    session_start();
    if (!isset($_SESSION['secToken'])) {
        header("Location: $redirectUrl");
        exit();
    }
}