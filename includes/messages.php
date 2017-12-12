<?php

function setErrorMessage($message) {
    $_SESSION['error_messages'] = $message;
    unset($_SESSION['success_messages']);
}

function setSuccessMessage($message) {
    $_SESSION['success_messages'] = $message;
    unset($_SESSION['error_messages']);
}

?>